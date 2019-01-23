@extends('layouts.main')
@section('title', 'Personnels')
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
                     
                    

                </div>
                  
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fas fa-times"></i>&nbspCANCEL</button>              
                    <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i>&nbspADD</button>    
                </div>

                </form> 
            </div>
        </div>
    </div>

{{-- Vertical Navigation bar --}}

    <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @can('isAdmin')
            <a class="nav-link " id="v-pills-personnels-tab" href="/users" role="tab" aria-controls="v-pills-users" aria-selected="false"><i class="fas fa-user"></i>&nbsp&nbsp&nbspUsers</a>
            @endcan
            <a class="nav-link" id="v-pills-dashboard-tab" href="/dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="false"><i class="fas fa-chart-line"></i>&nbsp&nbsp&nbspDashboard</a>
            <a class="nav-link" id="v-pills-rooms-tab" href="/rooms" role="tab" aria-controls="v-pills-rooms" aria-selected="false"><i class="fas fa-home"></i>&nbsp&nbsp&nbspRooms</a>
            <a class="nav-link" id="v-pills-residents-tab"  href="/residents" role="tab" aria-controls="v-pills-residents" aria-selected="false"><i class="fas fa-users"></i>&nbsp&nbsp&nbspResidents</a>
            <a class="nav-link" id="v-pills-owners-tab" href="/owners" role="tab" aria-controls="v-pills-owners" aria-selected="false"><i class="fas fa-user-tie"></i>&nbsp&nbsp&nbspOwners</a>
            <a class="nav-link" id="v-pills-repairs-tab" href="/repairs" role="tab" aria-controls="v-pills-repairs" aria-selected="false"><i class="fas fa-hammer"></i>&nbsp&nbsp&nbspRepairs</a>
            <a class="nav-link" id="v-pills-violations-tab" href="/violations" role="tab" aria-controls="v-pills-violations" aria-selected="false"><i class="fas fa-user-times"></i>&nbsp&nbsp&nbspViolations</a>
            <a class="nav-link" id="v-pills-supplies-tab" href="/supplies" role="tab" aria-controls="v-pills-supplies" aria-selected="false"><i class="fas fa-clipboard-list"></i>&nbsp&nbsp&nbspSupplies</a>
            <a class="nav-link active" id="v-pills-personnels-tab" href="/personnels" role="tab" aria-controls="v-pills-personnels" aria-selected="true"><i class="fas fa-user-lock"></i>&nbsp&nbsp&nbspPersonnels</a>
        </div> 
    </div>

{{-- Content of the room section. --}}

    <div class="col-md-10">
        @include('includes.notifications')
        <div class="card">
               {{-- Search button for finding residents. --}}
            <div class="card-header">

                <a  href="#" class="add-personnel btn btn-primary float-left " role="button"><i class="fas fa-plus-circle"></i>&nbspADD PERSONNEL</a>

                <a href=""></a>
                <form action="/search/personnels" method="GET">
                    <input type="text" class="form-control float-right" style="width:200px" aria-label="Text input with dropdown button" name="s" value="{{ Request::query('s') }}" placeholder="Search personnels">
                </form>
            </div>

            <div class="card-body" style="padding:3%;" >

                <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personnel as $row)
                                <tr>
                                    <th>{{ $perRow++ }}</th>
                                    <td><a href="/personnels/{{ $row->id }}">{{ $row->firstName }} {{ $row->lastName }}</a></td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                </div>     
            </div>
            
            <div class="card-footer">
                <h3 class="text-center">Results found: {{count($personnel)}}</h3>
            </div>
        </div>      
    </div>


    {{-- Modal for creating room.  --}}

<div id="add-personnel" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width:1320px; margin-left:-80%">

                <div class="modal-header">
                    <h4 class="add-personnel-title float-left"></h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>
                <form method="POST" action="/personnels">

                    {{-- Additional security feature laravel provides. --}}

                    {{ csrf_field() }}

                <div class="modal-body">
                        <label for=""><b style="font-size:20px">Personal Information</b></label>

                        <div class="form-group row" >
                            <label for="firstName" class=" col-form-label text-md-right" style="margin-left:3%">First Name:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="firstName" id="firstName" type="text" class="form-control" value="{{ old('firstName') }}"  required>
                            </div>     
    
                            <label for="middleName" class=" col-form-label text-md-right">Middle Name:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="middleName" id="middleName" type="text" class="form-control" value="{{ old('middleName') }}" >
                            </div>
    
                            <label for="lastName" class="col-form-label text-md-right">Last Name:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="lastName" id="lastName" type="text" class="form-control" value="{{ old('lastName') }}"  required>
                            </div>
    
                            <label for="birthDate" class="col-form-label text-md-right">Birthdate:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="birthDate" id="birthDate" type="date" class="form-control" value="{{ old('birthDate') }}" >
                            </div>
                            
                        </div>

                        <div class="form-group row" >
                                <label for="empStatus" class=" col-form-label text-md-right" style="margin-left:3%">Employment Status:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <select name="empStatus" id="empStatus" class="form-control" required>
                                    <option value="{{ old('empStatus') }}" selected>{{ old('empStatus') }}</option>
                                    <option value="regular">Regular</option>
                                    <option value="onCall">On-Call</option>
                                </select>
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
                                <input name="houseNumber" id="houseNumber" type="text" class="form-control" value="{{ old('houseNumber') }}">
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
@endsection

  
