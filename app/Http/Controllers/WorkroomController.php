<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Workroom;
use App\Timeslot;

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
        $times = generateDateRange(Carbon::parse("07:00:00"), Carbon::parse("20:00:00"));

        return view('admin.workrooms.create', compact('regions', 'times'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'brand_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:80000',
        ]);

        $request->request->add(['company_id' => Auth::user()->id]); //add request

        $workroomStore = Workroom::create($request->all()); // create workroom

        $request->request->add(['wr_id' => $workroomStore->id]); // get id of latest workroom

        foreach ($request->get('timeslots') as $timeslot) {
            /** @var \App\Timeslot $timeslot */
            $timeslot = Timeslot::make($timeslot);
            $timeslot->workroom()->associate($workroomStore);
            $timeslot->save();
        }

        return redirect()->route('workrooms.index')->with('success', 'Töökoda edukalt lisatud! Vaatame andmed üle ning aktiveerime selle peatselt!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($workroom = Workroom::find($id)) {
            if ($workroom_company_id == Auth::user()->id) {
                return view('admin.workrooms.show', compact('workroom'));
            } else {
                return redirect()->route('workrooms.index');
            }
        } else {
            return redirect()->route('workrooms.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Workroom $workroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Workroom $workroom)
    {
        $regions = Regions::all();
        $times = generateDateRange(Carbon::parse("07:00:00"), Carbon::parse("20:00:00"));
        $timeslots = $workroom->timeslots->keyBy(function ($item) {
            return $item['day_of_week']->value();
        });
        if ($workroom->company_id == Auth::user()->id) {
            return view('admin.workrooms.edit', compact('workroom', 'regions', 'times', 'timeslots'));
        } else {
            return redirect()->route('workrooms.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Workroom $workroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workroom $workroom)
    {
        request()->validate([
            'brand_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $workroom->update($request->all());

        $timeslots = $workroom->timeslots->keyBy(function ($item) {
            return $item['day_of_week']->value();
        });
        foreach ($timeslots as $key => $timeslot) {
            $timeslot->update(
                $request->get('timeslots')[$key]
            );
        }

        return redirect()->route('workrooms.edit', $workroom)->with('success', 'Töökoja andmed uuendatud!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Workroom::find($id)->delete();

        return redirect()->route('workrooms.index');
    }
}
