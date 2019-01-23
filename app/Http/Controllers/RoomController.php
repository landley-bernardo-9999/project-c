<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Room;
use App\Resident;
use App\Owner;
use DB;
use Carbon\Carbon;
use App\Personnel;
use App\Inventory;
use App\Transactions;
use Mail;
use Auth;
use Gate;

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

        $room = DB::table('rooms')->where('roomNo', 'like', "%$s%")
                                  ->orWhere('status', 'like', "%$s%") 
                                  ->orWhere('building', 'like', "%$s%") 
                                  ->orWhere('project', 'like', "%$s") 
                                 ->get();

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
        $attribute = $this->validateInput();

        Room::create($attribute);

        // Mail::to('webmaster@marthaservices.com')->send(
        //     new RoomCreated($room)
        // );

            

        return redirect('/rooms')->with('success','Room '.$request->roomNo.' has been created!');
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

        $resident = DB::table('residents')->where('room_id',$id)->get();

        $repair = DB::table('repairs')->where('room_id',$id)->get();

        $personnel = DB::table('personnels')->get();
        
        $rRow = 1;


            $resident_transaction = DB::table('transactions')->where('room_id', $id)->get();

            $repairRow = 1;
    
            $ownerRow = 1;
    
            $dateToday = Carbon::today()->toDateString();
    
            $transaction = DB::table('transactions')
                ->join('residents', 'transactions.resident_id', '=', 'residents.id')
                ->join('owners', 'transactions.room_id', 'owners.room_id')
                ->select('residents.*','residents.firstName as residentFirstName', 'residents.middleName as residentMiddleName', 'residents.lastName as residentLastName'
                ,'transactions.*', 'owners.*')
                ->where('transactions.room_id', $id)
               
                ->get();
    
            $room_owner = Owner::where('owners.room_id', $id)->get();
    
    
            $inventory = DB::table('inventories')
                ->join('residents', 'inventories.inventory_residentId', 'residents.id')
                ->join('rooms', 'inventories.inventory_roomId', 'rooms.id')
                ->select('residents.*', 'rooms.*', 'inventories.*')
                ->where('inventory_roomId', $id)
                ->get();
            
            $inventoryRow = 1;
    
    
            return view('rooms.show', compact('room', 'rRow', 'transaction', 'resident','repairRow', 'repair', 'room_owner', 'ownerRow', 'personnel', 'inventory', 'inventoryRow', 'resident_transaction', 'listOfRooms'));
    

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
        $attributes = request()->validate([
            'roomNo' => ['required', 'max:255'],
            'building' => ['required', 'max:255'],
            'shortTermRent' => ['required'],
            'longTermRent' => ['required'],
            'project' => ['required'],
            'status' => ['required'],
            'size' => ['required'],
            'capacity' => ['required'] 
        ]);

        Room::findOrFail($id)->update($attributes);

        Room::find($id)->update();


        return redirect('/rooms/'.$id)->with('success','Room '.$request->roomNo.' has been updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id)->delete();

        return redirect('/rooms')->with('success','Room has been deleted!');
    }

    protected function validateInput(){
        return request()->validate([
            'roomNo' => ['required', 'max:255', 'unique:rooms'],
            'building' => ['required', 'max:255'],
            'shortTermRent' => ['required'],
            'longTermRent' => ['required'],
            'project' => ['required'],
            'status' => ['required'],
            'size' => ['required'],
            'capacity' => ['required']
        ]);
    }
}
