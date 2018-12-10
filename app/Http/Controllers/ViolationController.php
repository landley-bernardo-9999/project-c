<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Violation;
use DB;
use App\Room;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->query('s');

        $violationRow = 1;

        $violation = DB::table('violations')
           ->join('rooms', 'violations.room_id', '=', 'rooms.id')
           ->select('rooms.*','violations.*', 'violations.id as violationId')
           ->orWhere('rooms.roomNo', 'like', "%$s%")
           ->orWhere('violations.name', 'like', "%$s%")
           ->orderBy('violations.created_at', 'desc')
           ->get();

        return view('violations.index', compact('violation', 's', 'violationRow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = request()->validate([
            'dateReported' => [],
            'dateCommitted' => [],
            'dateFinished' => [],
            'reportedBy' => [],
            'name' => [],
            'desc' => [],
            'details' => [],
            'fine' => [],
            'actionTaken' => [],
            'room_id' => [],
            'resident_id' => [],
        ]);

        Violation::create($validate);

        return redirect('/residents/'.$request->resident_id)->with('success','Violation has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $violation = Violation::findOrFail($id);

        $violation->dateReported = request('dateReported');
        $violation->name= request('name');
        $violation->dateCommitted = request('dateCommitted');
        $violation->reportedBy = request('reportedBy');
        $violation->desc = request('desc');
        $violation->details = request('details');
        $violation->fine = request('fine');
        $violation->actionTaken = request('actionTaken');
        $violation->save();

        return redirect('/violations/')->with('success','Violation has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
