@extends('layouts.main')
@include('includes.notifications')
@section('content')
<div class="row">
{{-- Modal for creating room.  --}}
<div id="edit-room" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="edit-room-title float-left"></h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>

                <form method="POST" action="/rooms/{{ $room->id }}">
                
                {{-- A method to tell the browser that we are updating and not posting. --}}

                @method('PATCH') 

                    {{-- Additional security feature laravel provides. --}}

                    @csrf

                <div class="modal-body">
                     
                    {{-- Room number input.     --}}
                    <div class="form-group row">
                        <label for="roomNo" class="col-md-4 col-form-label text-md-right">Room No:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <input name="roomNo" id="roomNo" type="text" class="form-control" value="{{ $room->roomNo }}" required>
                        </div>     
                    </div>

                    {{-- Building input --}}

                    <div class="form-group row">
                        <label for="building" class="col-md-4 col-form-label text-md-right">Building:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" name="building" id="building" required>
                                <option value="{{ $room->building }}">{{ $room->building }}</option>
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
                            <input name="shortTermRent" id="shortTermRent" type="number" min="1" class="form-control" value="{{ $room->shortTermRent }}" required>
                        </div>     
                    </div>

                    {{-- Long term rent input. --}}

                    <div class="form-group row">
                        <label for="longTermRent" class="col-md-4 col-form-label text-md-right">Long-term Rent:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <input name="longTermRent" id="longTermRent" type="number" min="1" class="form-control" value="{{ $room->longTermRent }}" required>
                        </div>     
                    </div>

                    {{-- Room status input. --}}

                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Status:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                           <select class="form-control" name="status" id="status" required>
                                <option value="{{ $room->status }}" selected>{{ $room->status }}</option>
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
                            <input name="size" id="size" type="number" min="1" class="form-control" value="{{ $room->size }}" required>
                        </div>     
                    </div>

                    {{-- Capacity of the room input. --}}

                    <div class="form-group row">
                        <label for="capacity" class="col-md-4 col-form-label text-md-right">Capacity:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <input name="capacity" id="capacity" type="number" min="1" class="form-control" value="{{ $room->capacity }}" required>
                        </div>     
                    </div>

                </div>
                  
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fas fa-times"></i>&nbspCANCEL</button>              
                    <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i>&nbspUPDATE</button>    
                </div>

                </form> 
            </div>
        </div>
    </div>
{{-- Vertical Navigation bar --}}

    <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" id="v-pills-dashboard-tab" href="/" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class="fas fa-chart-line"></i>&nbsp&nbsp&nbspDashboard</a>
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
            <div class="container-fluid" style="padding:3%;">

                {{-- Room information. --}}

                <div class="row">
                    <div class="col-md-9">
                            
                            <h5 class="float-left">Room No <span style="color:red; font-size: 25px;">&nbsp<b>{{ $room->roomNo }}</b></span></h5>  
                        <table class="table">   
                            <thead>
                                <tr>
                                    <th>Building</th>
                                    <td>{{ $room->building }}</td>  
                                </tr>
                                <tr>
                                    <th>Long Term Rent</th>
                                    <td>{{ $room->longTermRent }}</td>  
                                </tr>
                                <tr>
                                    <th>Short Term Rent</th>
                                    <td>{{ $room->shortTermRent }}</td>  
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $room->status }}</td>  
                                </tr>
                                <tr>
                                    <th>Capacity</th>
                                    <td>{{ $room->capacity }}<span style="color:red">&nbsppax</span></td>  
                                </tr>
                                <tr>
                                    <th>Size</th>
                                    <td>{{ $room->size }}<span style="color:red">&nbspsqm</span></td>  
                                </tr>
                                <tr>
                                    <th>Principal Owner</th>
                                    <td>Juan Dela Cruz</td>
                                </tr>
                                <tr>
                                    <th>Representative</th>
                                    <td>Michael Smith</td>
                                </tr>
                            </thead>
                            
                    </table> 
                    </div>   
                    
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <b>Actions</b>
                            </div>
                            <div class="card-body">
                                <ul class="nav" >
                                    <li class="nav-link">
                                        <a href="#" style="width:150px" class="btn btn-primary edit-room text-left"><i class="fas fa-edit"></i>&nbspEDIT ROOM</a>
                                    </li>
                                    <li class="nav-link">
                                        <form method="POST" action="/rooms/{{ $room->id }}">
                                            @method('delete')
                                            @csrf
                                            <button style="width:150px" id="FormDeleteTime" class="button btn btn-danger text-left"><i class="fas fa-trash-alt"></i>&nbspDELETE ROOM</button>
                                        </form>           
                                    </li>
                                    <li class="nav-link">
                                        <a href="#" style="width:150px" class="btn btn-warning add-resident text-left"><i class="fas fa-user-plus"></i>&nbspADD RESIDENT</a>
                                    </li>
                                    <li class="nav-link">
                                        <a href="#" style="width:150px" class="btn btn-warning text-left"><i class="fas fa-plus-circle"></i>&nbspADD REPAIR</a>
                                    </li>
                                    <li class="nav-link">
                                        <a href="#" style="width:150px" class="btn btn-warning text-left"><i class="fas fa-plus-circle"></i>&nbspADD BILLING</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <b>Notice</b>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
                <br>

                {{-- List of residents --}}

                <div class="row">
                    <h5 class="float-left">Residents</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Status</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Move-in</th>
                                <th>Move-out</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction as $row) 
                            <tr>
                                <th>{{ $rRow++ }}</th>
                                <td>{{ $row->firstName }}</td>
                                <td>{{ $row->middleName }}</td>
                                <td>{{ $row->lastName }}</td>
                                <td>{{ $row->transStatus }}</td>
                                <td>{{ $row->emailAddress }}</td>
                                <td>{{ $row->mobileNumber }}</td>
                                <td>{{Carbon\Carbon::parse($row->moveInDate)->formatLocalized('%b %d %Y')}}</td>
                                <td>{{Carbon\Carbon::parse($row->moveOutDate)->formatLocalized('%b %d %Y')}}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $row->links() }} --}}
                </div>

                {{-- Repairs information. --}}

                <div class="row">
                    <h5 class="float-left">Repairs</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Move-in</th>
                                <th>Move-out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $rRow }}</th>
                                <td>Landley</td>
                                <td>Bernardo</td>
                                <td>lmbernardo@slu.edu.ph</td>
                                <td>09752826318</td>
                                <td>{{Carbon\Carbon::parse(Carbon\Carbon::now())->formatLocalized('%b %d %Y')}}</td>
                                <td>{{Carbon\Carbon::parse(Carbon\Carbon::now())->formatLocalized('%b %d %Y')}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Owner Information --}}

                <div class="row">
                    <h5 class="float-left">Bills</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Move-in</th>
                                <th>Move-out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $rRow }}</th>
                                <td>Landley</td>
                                <td>Bernardo</td>
                                <td>lmbernardo@slu.edu.ph</td>
                                <td>09752826318</td>
                                <td>{{Carbon\Carbon::parse(Carbon\Carbon::now())->formatLocalized('%b %d %Y')}}</td>
                                <td>{{Carbon\Carbon::parse(Carbon\Carbon::now())->formatLocalized('%b %d %Y')}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>    
        </div>
        </div>     
        {{-- Modal for addin resident.  --}}

<div id="add-resident" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width:1320px; margin-left:-80%">

                <div class="modal-header">
                    <h4 class="add-resident-title float-left"></h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>

                <form method="POST" action="/residents/" enctype="multipart/form-data">

                    {{-- Additional security feature laravel provides. --}}

                    @csrf

                <div class="modal-body">
                     <label for=""><b style="font-size:20px">Personal Information</b></label>

                    <div class="form-group row" >
                        <label for="firstName" class=" col-form-label text-md-right" style="margin-left:3%">First Name:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="firstName" id="firstName" type="text" class="form-control" value="{{ old('firstName') }}" required>
                        </div>     

                        <label for="middleName" class=" col-form-label text-md-right">Middle Name:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="middleName" id="middleName" type="text" class="form-control" value="{{ old('middleName') }}">
                        </div>

                        <label for="lastName" class="col-form-label text-md-right">Last Name:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="lastName" id="lastName" type="text" class="form-control" value="{{ old('lastName') }}" required>
                        </div>

                        <label for="birthDate" class="col-form-label text-md-right">Birthdate:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="birthDate" id="birthDate" type="date" class="form-control" value="{{ old('birthDate') }}" >
                        </div>
                    </div>
                    
                    <label for=""><b style="font-size:20px">Contact Information</b></label>

                    <div class="form-group row" >
                        <label for="emailAddress" class=" col-form-label text-md-right" style="margin-left:3%">Email Address:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="emailAddress" id="emailAddress" type="email" class="form-control" value="{{ old('emailAddress') }}" >
                        </div>  

                        <label for="mobileNumber" class=" col-form-label text-md-right">Mobile Number:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="mobileNumber" id="mobileNumber" type="text" class="form-control" value="{{ old('mobileNumber') }}" >
                        </div>
                    </div>

                    <label for=""><b style="font-size:20px">Address Information</b></label>

                    <div class="form-group row" >
                        <label for="houseNumber" class=" col-form-label text-md-right" style="margin-left:3%">House No:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="houseNumber" id="houseNumber" type="text" class="form-control" value="{{ old('houseNumber') }}" >
                        </div>     
    
                        <label for="barangay" class=" col-form-label text-md-right">Barangay:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="barangay" id="barangay" type="text" class="form-control" value="{{ old('barangay') }}" >
                        </div>

                        <label for="municipality" class=" col-form-label text-md-right">Municipality:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="municipality" id="municipality" type="text" class="form-control" value="{{ old('municipality') }}" >
                        </div>

                        <label for="province" class=" col-form-label text-md-right">Province:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="province" id="province" type="text" class="form-control" value="{{ old('province') }}" >
                        </div>
                    </div>

                    <div class="form-group row" >
                            <label for="zip" class=" col-form-label text-md-right" style="margin-left:3%">Zipcode:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="zip" id="zip" type="text" class="form-control" value="{{ old('zip') }}" >
                            </div>  

                            <label for="roomNo" class=" col-form-label text-md-right" style="visibility: hidden">Room No:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2" style="visibility: hidden">
                                <input name="roomNo" id="roomNo" type="text" class="form-control" value="{{$room->id}}" >
                            </div>  
                
        
                        </div>
                    <label for=""><b style="font-size:20px">Educational Information</b></label>

                    <div class="form-group row" >
                        <label for="school" class=" col-form-label text-md-right" style="margin-left:3%">School:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="school" id="school" type="email" class="form-control" value="{{ old('school') }}" >
                        </div>     
    
                        <label for="course" class=" col-form-label text-md-right">Course:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="course" id="course" type="text" class="form-control" value="{{ old('course') }}" >
                        </div>

                        <label for="yearLevel" class=" col-form-label text-md-right">Year Level:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="yearLevel" id="yearLevel" type="number" min="1" class="form-control" value="{{ old('yearLevel') }}" >
                        </div>
                    </div>

                    <label for=""><b style="font-size:20px">Guardian Information</b></label>

                    <div class="form-group row" >
                        <label for="guardian" class=" col-form-label text-md-right" style="margin-left:3%">Guardian's Name:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="guardian" id="guardian" type="text" class="form-control" value="{{ old('guardian') }}" >
                        </div>
                        
                        <label for="guardianPhoneNumber" class=" col-form-label text-md-right" style="margin-left:3%">Contact:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="guardianPhoneNumber" id="guardianPhoneNumber" type="text" class="form-control" value="{{ old('guardianPhoneNumber') }}" >
                        </div>
    
                    </div>

                    <label for=""><b style="font-size:20px">Upload Image</b></label>

                    <div class="form-group row" >
                        <label for="img" class=" col-form-label text-md-right" style="margin-left:3%">Image:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="img" id="img" type="file" class="form-control" value="{{ old('img') }}" >
                        </div>     
    
                    </div>

                </div>
                  
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fas fa-times"></i>&nbspCANCEL</button>              
                    <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i>&nbspADD</button>    
                </div>

                </form> 
            </div>
        </div>
    </div>
</div>


@endsection

  
