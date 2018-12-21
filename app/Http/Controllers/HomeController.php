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
        // Room Stats

        $room = DB::table('rooms')->count();

        $occupiedRooms = DB::table('rooms')->where('status','occupied')->count();

        $vacantRooms = DB::table('rooms')->where('status','vacant')->count();

        $reservedRooms = DB::table('rooms')->where('status','reserved')->count();

        $occupancyRate = round(($occupiedRooms/$room) * 100);

        //Resident Stats

        $resident = DB::table('residents')->count();

        $harvardResident = DB::table('residents')
                ->join('rooms', 'residents.room_id', 'rooms.id')
                ->select('rooms.*', 'residents.*')
                ->where('rooms.building', 'harvard')
                ->count();

        $princetonResident = DB::table('residents')
                ->join('rooms', 'residents.room_id', 'rooms.id')
                ->select('rooms.*', 'residents.*')
                ->where('rooms.building', 'princeton')
                ->count();

        $whartonResident = DB::table('residents')
                ->join('rooms', 'residents.room_id', 'rooms.id')
                ->select('rooms.*', 'residents.*')
                ->where('rooms.building', 'wharton')
                ->count();

        $courtyardsResident = DB::table('residents')
                ->join('rooms', 'residents.room_id', 'rooms.id')
                ->select('rooms.*', 'residents.*')
                ->where('rooms.project', 'theCourtyards')
                ->count();

                
        $owner = DB::table('owners')->count();

        $harvardOwner = DB::table('owners')
                ->join('rooms', 'owners.room_id', 'rooms.id')
                ->select('rooms.*', 'owners.*')
                ->where('rooms.building', 'harvard')
                ->count();

        $princetonOwner = DB::table('owners')
                ->join('rooms', 'owners.room_id', 'rooms.id')
                ->select('rooms.*', 'owners.*')
                ->where('rooms.building', 'princeton')
                ->count();

        $whartonOwner = DB::table('owners')
                ->join('rooms', 'owners.room_id', 'rooms.id')
                ->select('rooms.*', 'owners.*')
                ->where('rooms.building', 'wharton')
                ->count();

        $courtyardsOwner = DB::table('owners')
                ->join('rooms', 'owners.room_id', 'rooms.id')
                ->select('rooms.*', 'owners.*')
                ->where('rooms.project', 'theCourtyards')
                ->count();
        

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

        return view('dashboard', compact('moveInRow', 'moveOutRow' ,'room', 'resident', 'owner','movein','moveout','onGoingRepair','pendingRepair', 
                'occupancyRate', 'occupiedRooms', 'vacantRooms', 'reservedRooms',
                'harvardResident', 'princetonResident', 'whartonResident', 'courtyardsResident',
                'harvardOwner', 'princetonOwner', 'whartonOwner', 'courtyardsOwner'));
    }

    
}
