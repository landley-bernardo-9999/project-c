<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repair;
use DB;
use App\Resident;
use App\Personnel;
use App\Room;

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

        $personnel = DB::table('personnels')->get();

        $repairs = DB::table('repairs')
           ->join('rooms', 'repairs.room_id', '=', 'rooms.id')
           ->join('personnels', 'repairs.endorsedTo', 'personnels.id')
           ->select('rooms.*','repairs.*', 'repairs.id as repairId', 'personnels.*', 'repairs.status as repairStatus')
           ->orWhere('rooms.roomNo', 'like', "%$s%")
           ->orWhere('repairs.name', 'like', "%$s%")
            
           ->paginate(5);

           return view('repairs.index', compact('repairs', 'personnel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = DB::table('rooms')->orderBy('building', 'asc')->get();

        $personnels = Personnel::all();

        return view('repairs.create', compact('rooms', 'personnels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $request->all();

        $repair = Repair::create($data);

        return redirect('/repairs/'.$repair->id)->with('success','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repairs = Repair::findOrFail($id);

        return view('repairs.show', compact('repairs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repairs = Repair::findOrFail($id);

        $rooms = DB::table('rooms')->orderBy('building', 'asc')->get();

        $personnels = Personnel::all();

        return view('repairs.edit', compact('repairs', 'rooms', 'personnels'));
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
      $data = $request->all();

      Repair::findOrFail($id)->update($data);

      return redirect('/repairs/'.$id)->with('success','Updated Successfully!');
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
