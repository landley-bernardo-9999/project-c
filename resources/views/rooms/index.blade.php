@extends('layouts.main')
@include('includes.notifications')
@section('content')
<div class="row">

{{-- Modal for creating room.  --}}

<div id="create-room" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="create-room-title float-left"></h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>
                <form method="POST" action="/rooms">

                    {{-- Additional security feature laravel provides. --}}

                    {{ csrf_field() }}

                <div class="modal-body">
                     
                    {{-- Room number input.     --}}
                    <div class="form-group row">
                        <label for="roomNo" class="col-md-4 col-form-label text-md-right">Room No:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <input name="roomNo" id="roomNo" type="text" class="form-control" value="{{ old('roomNo') }}" required>
                        </div>     
                    </div>

                    {{-- Building input --}}

                    <div class="form-group row">
                        <label for="building" class="col-md-4 col-form-label text-md-right">Building:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" name="building" id="building" required>
                                <option value="{{ old('building') }}">{{ old('building') }}</option>
                                <option value="harvard">Harvard</option>
                                <option value="princeton">Princeton</option>
                                <option value="wharton">Wharton</option>
                            </select>
                        </div>     
                    </div>

                    {{-- Short term rent input. --}}

                    <div class="form-group row">
                        <label for="shortTermRent" class="col-md-4 col-form-label text-md-right">Short-term Rent:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <input name="shortTermRent" id="shortTermRent" type="number" min="1" class="form-control" value="{{ old('shortTermRent') }}" required>
                        </div>     
                    </div>

                    {{-- Long term rent input. --}}

                    <div class="form-group row">
                        <label for="longTermRent" class="col-md-4 col-form-label text-md-right">Long-term Rent:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <input name="longTermRent" id="longTermRent" type="number" min="1" class="form-control" value="{{ old('longTermRent') }}" required>
                        </div>     
                    </div>

                    {{-- Room status input. --}}

                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Status:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                           <select class="form-control" name="status" id="status" required>
                                <option value="{{ old('status') }}" selected>{{ old('status')}} </option>
                                <option value="occupied">Occupied</option>
                                <option value="reserved">Reserved</option>
                                <option value="vacant">Vacant</option>
                           </select>
                        </div>     
                    </div>

                    {{-- Size of the room input. --}}

                    <div class="form-group row">
                        <label for="size" class="col-md-4 col-form-label text-md-right">Size:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <input name="size" id="size" type="number" min="1" class="form-control" value="{{ old('size') }}" required>
                        </div>     
                    </div>

                    {{-- Capacity of the room input. --}}

                    <div class="form-group row">
                        <label for="capacity" class="col-md-4 col-form-label text-md-right">Capacity:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <input name="capacity" id="capacity" type="number" min="1" class="form-control" value="{{ old('capacity') }}" required>
                        </div>     
                    </div>

                </div>
                  
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fas fa-times"></i>&nbspCANCEL</button>              
                    <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i>&nbspCREATE</button>    
                </div>

                </form> 
            </div>
        </div>
    </div>

{{-- Vertical Navigation bar --}}

    <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" id="v-pills-dashboard-tab" href="/dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class="fas fa-chart-line"></i>&nbsp&nbsp&nbspDashboard</a>
            <a class="nav-link active" id="v-pills-rooms-tab" href="/rooms" role="tab" aria-controls="v-pills-rooms" aria-selected="false"><i class="fas fa-home"></i>&nbsp&nbsp&nbspRooms</a>
            <a class="nav-link" id="v-pills-residents-tab"  href="/residents" role="tab" aria-controls="v-pills-residents" aria-selected="false"><i class="fas fa-users"></i>&nbsp&nbsp&nbspResidents</a>
            <a class="nav-link" id="v-pills-owners-tab" href="/owners" role="tab" aria-controls="v-pills-owners" aria-selected="false"><i class="fas fa-user-tie"></i>&nbsp&nbsp&nbspOwners</a>
            <a class="nav-link" id="v-pills-repairs-tab" href="/repairs" role="tab" aria-controls="v-pills-repairs" aria-selected="false"><i class="fas fa-hammer"></i>&nbsp&nbsp&nbspRepairs</a>
            <a class="nav-link" id="v-pills-violations-tab" href="/violations" role="tab" aria-controls="v-pills-violations" aria-selected="false"><i class="fas fa-user-times"></i>&nbsp&nbsp&nbspViolations</a>
            <a class="nav-link" id="v-pills-supplies-tab" href="/supplies" role="tab" aria-controls="v-pills-supplies" aria-selected="false"><i class="fas fa-clipboard-list"></i>&nbsp&nbsp&nbspSupplies</a>
            <a class="nav-link" id="v-pills-personnels-tab" href="/personnels" role="tab" aria-controls="v-pills-personnels" aria-selected="false"><i class="fas fa-clipboard-list"></i>&nbsp&nbsp&nbspPersonnels</a>
        </div> 
    </div>

{{-- Content of the room section. --}}

    <div class="col-md-10">
        <div class="card">
            <div class="container-fluid" style="padding:3%; height: 600px">
                <div class="row">

                    {{-- Filter features of the page. --}}

                    <div class="col-md-2">
                       {{-- <div class="card">
                           <div class="card-header">
                               Filter rooms
                           </div>
                           <div class="card-body">
                                <div class="group-form">
                                    <input type="checkbox" role="button" href="/rooms/"> &nbspOccupied
                                    <br>
                                    <input type="checkbox"> &nbspVacant
                                    <br>
                                    <input type="checkbox"> &nbspReserved
                                </div>
                           </div>
                       </div> --}}
                   
                       <div class="card">
                            <div class="card-header">
                                Filter rooms
                            </div>
                            <div class="card-body text-center">
                                    <a href="/search/rooms?s=occupied" class="btn btn-outline-danger" role="button">
                                        <i class="fas fa-home fa-1x"></i>
                                    </a><br>
                                    Occupied
                                    <br><br>
                                    <a href="/search/rooms?s=vacant" class="btn btn-outline-success" role="button">
                                            <i class="fas fa-home fa-1x"></i>
                                    </a><br>
                                    Vacant
                                    <br><br>
                                    <a href="/search/rooms?s=reserved" class="btn btn-outline-info" role="button">
                                            <i class="fas fa-home fa-1x"></i>
                                    </a><br>
                                    Reserved
                            </div>
                        </div>
                    </div>

                        {{-- List of all the rooms. --}}

                    <div class="col-md-10">
                        <div class="card">
                        <div class="card-header">
 
                        {{-- Button for creating a new room. --}}

                        <a  href="#" class="create-room btn btn-warning float-left " role="button"><i class="fas fa-plus-circle"></i>&nbspCREATE ROOM</a>

                        {{-- Search button for finding rooms. --}}

                        <form action="/search/rooms" method="GET">
                            <input type="text" class="form-control float-right" style="width:200px" aria-label="Text input with dropdown button" name="s" value="{{ Request::query('s') }}" placeholder="Search rooms">
                        </form>

                                               
                    </div>
                        <div class="card-body" >
                            <table class="table">
                                @foreach($room as $row)
                                    @if($row->status == 'occupied')
                                        <a href="/rooms/{{$row->id}}" class="btn btn-outline-danger" role="button">
                                            <i class="fas fa-home fa-2x"></i>
                                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                                <p style="font-size: 11px">{{$row->roomNo}}</p>
                                            </div>
                                        </a>
                                    @elseif($row->status == 'vacant')
                                        <a href="/rooms/{{$row->id}}" class="btn btn-outline-success" role="button">
                                            <i class="fas fa-home fa-2x"></i>
                                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                                <p style="font-size: 11px">{{$row->roomNo}}</p>
                                            </div>
                                        </a>
                                    @elseif($row->status == 'reserved')
                                        <a href="/rooms/{{$row->id}}" class="btn btn-outline-primary" role="button">
                                            <i class="fas fa-home fa-2x"></i>
                                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                                <p style="font-size: 11px">{{$row->roomNo}}</p>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        <div class="card-footer">
                                <h3 class="text-center">Results found: {{count($room)}}</h3>
                        </div>
                    </div>
            </div>   
        </div> 
        </div>
        </div>
    </div>      
</div>

@endsection

  