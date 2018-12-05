<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Resident;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resident = DB::table('residents')->get();
        return view ('residents.index', compact('resident'));
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
            'firstName' => ['max:255'],
            'middleName' => ['max:255'],
            'lastName' => ['max:255'],
            'birthDate' => ['nullable'],
            'emailAddress' => ['unique:residents', 'nullable'],
            'mobileNumber' => ['unique:residents', 'nullable'],
            'mobileNumber' => [],
            'houseNumber' => ['max:255'],
            'roomNo' => [],
            'barangay' => ['max:255'],
            'municipality' => ['max:255'],
            'province' => ['max:255'],
            'zipcode' => ['max:255'],
            'school' => ['max:255'],
            'course' => ['max:255'],
            'yearLevel' => ['integer','nullable'],
            'img' => ['image','max:1999','nullable'],
        ]);

        Resident::create($validate);

        return redirect('/rooms')->with('success','Resident has been added!');
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
        //
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
