<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use DB;

class RoomController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->query('s');

        $room = DB::table('rooms')->where('roomNo', 'like', "%$s%")->get();

        return view('rooms.index', compact('room', 's'));
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
        $validate =  request()->validate([
            'roomNo' => ['required', 'max:255', 'unique:rooms'],
            'building' => ['required', 'max:255'],
            'shortTermRent' => ['required'],
            'longTermRent' => ['required'],
            'status' => ['required'],
            'size' => ['required'],
            'capacity' => ['required']
        ]);  

        Room::create($validate);

        return redirect('/rooms')->with('success','Room has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        $rRow = 1;

        return view('rooms.show', compact('room', 'rRow'));
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
       $room = Room::find($id);

       $room->roomNo = request('roomNo');
       $room->building = request('building');
       $room->shortTermRent = request('shortTermRent');
       $room->longTermRent = request('longTermRent');
       $room->status = request('status');
       $room->capacity = request('capacity');
       $room->size = request('size');

       $room->save();

        return redirect('/rooms/'.$room->id)->with('success', 'Room has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Room::find($id)->delete();
        $room = Room::findOrFail($id)->delete();

        return redirect('/rooms')->with('success','Room has been deleted!');
    }
}
