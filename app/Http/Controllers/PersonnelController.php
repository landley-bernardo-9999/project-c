<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Personnel;
use App\Repair;

class PersonnelController extends Controller
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
        
        $personnel = DB::table('personnels')->where('firstName', 'like', "%$s%")
                                          ->orWhere('lastName', 'like', "%$s%")
                                          ->orWhere('mobileNumber', 'like', "%$s%")
                                          ->orWhere('emailAddress', 'like', "%$s%")
                                          ->get();

        $perRow = 1;

        return view ('personnels.index', compact('personnel', 'perRow'));
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
            'firstName' => ['max:255','required'],
            'middleName' => ['max:255', 'nullable'],
            'lastName' => ['max:255', 'required'],
            'birthDate' => ['nullable'],
            'empStatus' => ['nullable'],
             'emailAddress' => ['unique:residents', 'nullable'],
            'mobileNumber' => ['unique:residents', 'nullable'],           
            'houseNumber' => ['nullable','max:255'],
            'barangay' => ['max:255'],
            'municipality' => ['max:255','nullable'],
            'province' => ['max:255'],
            'zip' => ['max:255'],
        ]);

        Personnel::create($validate);

        return redirect('/personnels/'.$request->id)->with('success','Personnel has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personnel = Personnel::findOrFail($id);

        $rowNum = 1;

        $repair = DB::table('repairs')
            ->join('rooms', 'repairs.room_id', 'repairs.firstName')
            ->select('personnels.*','repairs.*')
            
            ->get();

        return view('personnels.show', compact('personnel', 'repair', 'rowNum'));
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
        $personnel = Personnel::findOrFail($id);

        $personnel->firstName = request('firstName');
        $personnel->middleName = request('middleName');
        $personnel->lastName = request('lastName');
        $personnel->birthDate = request('birthDate');
        $personnel->emailAddress = request('emailAddress');
        $personnel->mobileNumber = request('mobileNumber');
        $personnel->houseNumber = request('houseNumber');
        $personnel->barangay = request('barangay');
        $personnel->municipality = request('municipality');
        $personnel->province = request('province');
        $personnel->zip = request('zip');
        $personnel->empStatus = request('empStatus');

        $personnel->save();

        return redirect('/personnels/'.$personnel->id)->with('success','Information has been updated!');
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
