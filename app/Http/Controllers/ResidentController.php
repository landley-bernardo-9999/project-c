<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Resident;
use App\Transaction;
use Illuminate\Support\Facades\Storage;
use App\Room;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->query('s');
        
        $resident = DB::table('residents')->where('firstName', 'like', "%$s%")
                                          ->orWhere('lastName', 'like', "%$s%")
                                          ->orWhere('mobileNumber', 'like', "%$s%")
                                          ->orWhere('emailAddress', 'like', "%$s%")
                                          ->get();

        $rRow = 1;

        return view ('residents.index', compact('resident', 'rRow'));
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
        $this->validate($request,[
            'firstName' => ['max:255'],
            'middleName' => ['max:255'],
            'lastName' => ['max:255'],
            'birthDate' => ['nullable'],
            'emailAddress' => ['unique:residents', 'nullable'],
            'mobileNumber' => ['unique:residents', 'nullable'],           
            'houseNumber' => [],
            // 'roomNo' => [],
            'barangay' => ['max:255'],
            'municipality' => ['max:255'],
            'province' => ['max:255'],
            'zip' => ['max:255'],
            'school' => ['max:255'],
            'course' => ['max:255'],
            'yearLevel' => ['integer','nullable'],
            'guardian' => ['nullable','max:255'],
            'guardianPhoneNumber' => ['nullable','max:255'],
            'img' => ['nullable','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ]);

                //Handle File Upload
            if($request->hasFile('img')){
                //Get filename with the extension 
                $fileNameWithExt = $request->file('img')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //Get just extension
                $extension = $request->file('img')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore = $filename.' '.time().' '.$extension; 
                //Upload Image
                $path = $request->file('img')->storeAs('public/img/residents',$fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }

            $resident = new Resident();

            $resident->firstName = request('firstName');
            $resident->middleName = request('middleName');
            $resident->lastName = request('lastName');
            $resident->birthDate = request('birthDate');
            $resident->emailAddress = request('emailAddress');
            $resident->mobileNumber = request('mobileNumber');
            $resident->houseNumber = request('houseNumber');
            $resident->room_id = request('room_id');
            $resident->roomNo = request('roomNo');
            $resident->barangay = request('barangay');
            $resident->municipality = request('municipality');
            $resident->province = request('province');
            $resident->zip = request('zip');
            $resident->school = request('school');
            $resident->course = request('course');
            $resident->yearLevel = request('yearLevel');
            $resident->guardian = request('guardian');
            $resident->guardianPhoneNumber = request('guardianPhoneNumber');
            $resident->img = $fileNameToStore;

            $resident->save();

            return redirect('/residents/'.$resident->id)->with('success',$request->firstName.' '.$request->lastName .' has been registered as a resident. You may now add transaction.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $resident = Resident::findOrFail($id);

         $repair = DB::table('repairs')->where('resident_id',$id)->get();

         $violation = DB::table('violations')->where('room_id',$id)->get();

         $room = Room::all();

         $repairRow = 1;

         $violationRow = 1;

        $transaction = DB::table('transactions')
            ->join('residents', 'transactions.resident_id', '=', 'residents.id')
            ->select('residents.*','transactions.*')
            ->where('transactions.resident_id', $id)
            ->whereIn('transactions.transStatus',['active','pending','movingIn','movingOut'])
            ->distinct('residents.id')
            ->get();

        $resRow = 1;

        return view('residents.show',compact('resident', 'transaction','resRow', 'room', 'repair', 'repairRow','violation','violationRow'));
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
                //Handle File Upload
            if($request->hasFile('img')){
                //Get filename with the extension
                $fileNameWithExt = $request->file('img')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //Get just extension
                $extension = $request->file('img')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore = $filename.' '.time().' '.$extension;
                //Upload Image
                $path = $request->file('img')->storeAs('public/img/residents',$fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }

        $resident = Resident::findOrFail($id);

        $resident->firstName = request('firstName');
        $resident->middleName = request('middleName');
        $resident->lastName = request('lastName');
        $resident->birthDate = request('birthDate');
        $resident->emailAddress = request('emailAddress');
        $resident->mobileNumber = request('mobileNumber');
        $resident->houseNumber = request('houseNumber');
        
        $resident->barangay = request('barangay');
        $resident->municipality = request('municipality');
        $resident->province = request('province');
        $resident->zip = request('zip');
        $resident->school = request('school');
        $resident->course = request('course');
        $resident->yearLevel = request('yearLevel');
        $resident->guardian = request('guardian');
        $resident->guardianPhoneNumber = request('guardianPhoneNumber');
        if($request->hasFile('img')){
            $resident->img = $fileNameToStore;
        }  

        $resident->save();

        return redirect('/residents/'.$resident->id)->with('success',$request->firstName.' '.$request->lastName.'s information has been updated!');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resident = Resident::findOrFail($id);

        if($resident->img != 'noimage.jpg'){
            Storage::delete('storage/img/residents'.$resident->img);
        }
        $resident->delete();

        return redirect('/rooms/'.$resident->room_id)->with('success','Resident has been deleted!');
    }
}
