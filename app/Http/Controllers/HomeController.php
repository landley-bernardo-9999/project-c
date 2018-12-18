<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Resident;
use App\Room;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = DB::table('rooms')->count();

        $occupiedRooms = DB::table('rooms')->where('status','occupied')->count();

        $occupancyRate = round(($occupiedRooms/$room) * 100);

        $resident = DB::table('residents')->count();

        $investor = DB::table('owners')->count();

        $onGoingRepair = DB::table('repairs')->where('status', 'onGoing')->count();

        $pendingRepair = DB::table('repairs')->where('status', 'pending')->count();

        $moveInRow = 1;

        $moveOutRow = 1;


        $dateToday = Carbon::today()->toDateString();

        $movein = DB::table('transactions')
            ->join('residents', 'transactions.resident_id', '=', 'residents.id')
            ->select('residents.*','residents.id as residentId','transactions.*','transactions.room_id as residentRoomNo')
            ->where('transactions.moveInDate','=',$dateToday)
            ->get();
        
        $moveout = DB::table('transactions')
            ->join('residents', 'transactions.resident_id', '=', 'residents.id')
            ->select('residents.*','residents.id as residentId','transactions.*','transactions.room_id as residentRoomNo')
            ->where('transactions.moveOutDate','=',$dateToday)
            ->get();

        return view('dashboard', compact('moveInRow', 'moveOutRow' ,'room', 'resident', 'investor','movein','moveout','onGoingRepair','pendingRepair', 'occupancyRate'));
    }

    
}
