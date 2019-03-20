<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Workroom;
use App\WorkroomOpeningTimes;

class WorkroomController extends Controller
{
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
        return view('admin.workrooms.create');
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
            'brand_name' => 'required',
            'additional_info' => 'required',
            'brand_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8000'
        ]);



        $request->request->add(['company_id' => Auth::user()->id]); //add request
       Workroom::create($request->all());
       return redirect()->route('workrooms.index')->with('success', 'Workroom added successfully');
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
            if($workroom->company_id == Auth::user()->id) {
            return view('admin.workrooms.edit', compact('workroom'));
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
            'brand_name' => 'required',
            'additional_info' => 'required',
            'brand_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

       Workroom::find($id)->update($request->all());
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
