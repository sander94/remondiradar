<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Workroom;
use App\Timeslots;
use App\WorkroomOpeningTimes;
use App\Regions;

class WorkroomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workrooms = Workroom::latest()->where('company_id', Auth::user()->id)->paginate(5);
        return view('admin.workrooms.index', compact('workrooms'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Regions::all();
        $timeslots = Timeslots::all();
        return view('admin.workrooms.create', compact('regions', 'timeslots'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
  
            'brand_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:80000'
        ]);



        $request->request->add(['company_id' => Auth::user()->id]); //add request
      
         $workroomStore = Workroom::create($request->all()); // create workroom

         $request->request->add(['wr_id' => $workroomStore->id]); // get id of latest workroom

         WorkroomOpeningTimes::create($request->all()); // store openingtimes to table

       return redirect()->route('workrooms.index')->with('success', 'Töökoda edukalt lisatud! Vaatame andmed üle ning aktiveerime selle peatselt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($workroom = Workroom::find($id)) {
            if($workroom_company_id == Auth::user()->id) {
            return view('admin.workrooms.show', compact('workroom'));
            }
            else {
            return redirect()->route('workrooms.index');
            }
        }
        else { return redirect()->route('workrooms.index'); }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if ($workroom = Workroom::find($id)) {
            $regions = Regions::all();
            $timeslots = Timeslots::all();
            if($workroom->company_id == Auth::user()->id) {
            return view('admin.workrooms.edit', compact('workroom', 'regions', 'timeslots'));
            }
            else {
            return redirect()->route('workrooms.index');
            }
        }

        else
           {
            return redirect()->route('workrooms.index');
           }


        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'brand_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

       Workroom::find($id)->update($request->all());
       WorkroomOpeningTimes::where('wr_id', $id)->first()->update($request->all());
       return redirect()->route('workrooms.edit', ['id' => $id])->with('success', 'Töökoja andmed uuendatud!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Workroom::find($id)->delete();
        return redirect()->route('workrooms.index');
    }
}
