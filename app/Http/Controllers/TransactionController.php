<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Resident;
use App\Room;
use DB;

class TransactionController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $residents = Resident::all();

        $rooms = DB::table('rooms')->where('status', 'vacant')->get();
        

        return view('transactions.create', compact('residents', 'rooms'));
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
            'transDate' => ['required'],
            'transStatus' => ['required'],
            'room_id' => [],
            'resident_id' => [],
            'moveInDate' => ['required'],
            'moveOutDate' => ['required'],
            'term' => ['required'],
            'initialSecDep' => ['required'],
        ]);  

        Transaction::create($validate);

        return redirect('/residents/'.$request->resident_id)->with('success','Transaction is successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('residents.show', compact('transaction'));
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
        $transaction = Transaction::findOrFail($id);

        $transaction->transStatus = request('transStatus');

        $transaction->save();

        return redirect('/rooms/'.$transaction->room_id)->with('success','Resident has been moved out!');
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
