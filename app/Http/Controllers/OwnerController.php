<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Owner;
use App\Room;
class OwnerController extends Controller
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

        $ownerRow = 1;

        $owner = DB::table('owners')
           ->join('rooms', 'owners.room_id', '=', 'rooms.id')
           ->select('rooms.*','owners.*', 'owners.id as ownerId')
           ->where('owners.firstName', 'like', "%$s%")
           ->orWhere('owners.lastName', 'like', "%$s%")
           ->orWhere('rooms.roomNo', 'like', "%$s%")
           ->get();

           return view('owners.index', compact('owner', 's', 'ownerRow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'firstName' => ['max:255','required'],
            'middleName' => ['max:255', 'nullable'],
            'lastName' => ['max:255', 'required'],
            'birthDate' => ['nullable'],
            'emailAddress' => ['unique:residents', 'nullable'],
            'mobileNumber' => ['unique:residents', 'nullable'],           
            'houseNumber' => ['nullable','max:255'],
            'roomNo' => ['required','max:255'],
            'room_id' => ['required','max:255'],
            'barangay' => ['max:255'],
            'municipality' => ['max:255','nullable'],
            'province' => ['max:255'],
            'zip' => ['max:255'],
            'rep' => ['nullable','max:255'],
            'repPhoneNumber' => ['nullable','max:255'],
        ]);

        Owner::create($validate);

        return redirect('/rooms/'.$request->room_id)->with('success','Owner has been added to the room');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owner = Owner::findOrFail($id);

        $room = DB::table('owners')
        ->join('rooms', 'owners.room_id', '=', 'rooms.id')
        ->select('rooms.*','owners.*', 'owners.id as ownerId')
        ->where('owners.id', $id)
        ->get();

        $ownerRow = 1;

        return view('owners.show', compact('owner', 'room', 'ownerRow'));
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

        $this->validate($request,[
            'firstName' => ['max:255'],
            'middleName' => ['max:255'],
            'lastName' => ['max:255'],
            'birthDate' => ['nullable'],
            'emailAddress' => ['unique:residents', 'nullable'],
            'mobileNumber' => ['unique:residents', 'nullable'],           
            'houseNumber' => [],
            'roomNo' => [],
            'room_id' => [],
            'barangay' => ['max:255'],
            'municipality' => ['max:255'],
            'province' => ['max:255'],
            'zip' => ['max:255'],
            'rep' => ['nullable','max:255'],
            'repPhoneNumber' => ['nullable','max:255'],
        ]);

        $owner = Owner::findOrFail($id);

        
        $owner->firstName = request('firstName');
        $owner->middleName = request('middleName');
        $owner->lastName = request('lastName');
        $owner->birthDate = request('birthDate');
        $owner->emailAddress = request('emailAddress');
        $owner->mobileNumber = request('mobileNumber');
        $owner->houseNumber = request('houseNumber');
        $owner->room_id = request('room_id');
        $owner->roomNo = request('roomNo');
        $owner->barangay = request('barangay');
        $owner->municipality = request('municipality');
        $owner->province = request('province');
        $owner->zip = request('zip');
        $owner->rep = request('rep');
        $owner->repPhoneNumber = request('repPhoneNumber');


        $owner->save();

        return redirect('/owners/'.$owner->id)->with('success',$request->firstName.' '.$request->lastName.'s information has been updated!');

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
