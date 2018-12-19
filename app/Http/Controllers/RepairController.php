<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repair;
use DB;
use App\Resident;
use App\Personnel;

class RepairController extends Controller
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

        $repairRow = 1;

        $personnel = DB::table('personnels')->get();

        $repair = DB::table('repairs')
           ->join('rooms', 'repairs.room_id', '=', 'rooms.id')
           ->join('personnels', 'repairs.endorsedTo', 'personnels.id')
           ->select('rooms.*','repairs.*', 'repairs.id as repairId', 'personnels.*')
           ->where('repairs.status', 'like', "%$s%")
           ->orWhere('rooms.roomNo', 'like', "%$s%")
           ->orWhere('repairs.name', 'like', "%$s%")
           ->orderBy('repairs.created_at', 'desc')
           ->get();

           return view('repairs.index', compact('repair', 's', 'repairRow', 'personnel'));
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
            'name' => [],
            'dateReported' => [],
            'dateStarted' => [],
            'dateFinished' => [],
            'desc' => [],
            'endorsedTo' => ['required'],
            'totalCost' => ['required'],
            'status' => [],
            'rating' => [],
            'room_id' => [],
            'resident_id' => [],
        ]);

        Repair::create($validate);

        return redirect('/rooms/'.$request->room_id)->with('success','Repair has been added to the room');
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
        $repair = Repair::findOrFail($id);

        $this->validate($request,[
            'totalCost' => ['required'],
        ]);

        $repair->name = request('name');
        $repair->dateReported = request('dateReported');
        $repair->dateStarted = request('dateStarted');
        $repair->dateFinished = request('dateFinished');
        $repair->desc = request('desc');
        $repair->endorsedTo = request('endorsedTo');
        $repair->totalCost = request('totalCost');
        $repair->status = request('status');
        $repair->rating = request('rating');

        $repair->save();

        return redirect('/repairs/')->with('success','Repair has been updated!');
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
