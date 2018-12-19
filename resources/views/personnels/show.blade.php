@extends('layouts.main')
@include('includes.notifications')
@section('content')
<div class="row">

{{-- Vertical Navigation bar --}}

    <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" id="v-pills-dashboard-tab" href="/dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="false"><i class="fas fa-chart-line"></i>&nbsp&nbsp&nbspDashboard</a>
            <a class="nav-link" id="v-pills-rooms-tab" href="/rooms" role="tab" aria-controls="v-pills-rooms" aria-selected="false"><i class="fas fa-home"></i>&nbsp&nbsp&nbspRooms</a>
            <a class="nav-link" id="v-pills-residents-tab"  href="/residents" role="tab" aria-controls="v-pills-residents" aria-selected="false"><i class="fas fa-users"></i>&nbsp&nbsp&nbspResidents</a>
            <a class="nav-link" id="v-pills-owners-tab" href="/owners" role="tab" aria-controls="v-pills-owners" aria-selected="false"><i class="fas fa-user-tie"></i>&nbsp&nbsp&nbspOwners</a>
            <a class="nav-link" id="v-pills-repairs-tab" href="/repairs" role="tab" aria-controls="v-pills-repairs" aria-selected="false"><i class="fas fa-hammer"></i>&nbsp&nbsp&nbspRepairs</a>
            <a class="nav-link" id="v-pills-violations-tab" href="/violations" role="tab" aria-controls="v-pills-violations" aria-selected="false"><i class="fas fa-user-times"></i>&nbsp&nbsp&nbspViolations</a>
            <a class="nav-link" id="v-pills-supplies-tab" href="/supplies" role="tab" aria-controls="v-pills-supplies" aria-selected="false"><i class="fas fa-clipboard-list"></i>&nbsp&nbsp&nbspSupplies</a>
            <a class="nav-link  active" id="v-pills-personnels-tab" href="/personnels" role="tab" aria-controls="v-pills-personnels" aria-selected="true"><i class="fas fa-user-lock"></i>&nbsp&nbsp&nbspPersonnels</a>
        </div> 
    </div>

{{-- Content of the room section. --}}
<div class="col-md-10">
    <a href="#" class="btn nav-link edit-personnel text-left"><i class="fas fa-edit"></i>&nbspEDIT</a>
    {{-- <form method="POST" action="/residents/{{ $resident->id }}">
    @method('delete')
    @csrf
        <button id="FormDeleteTime" class=" float-right nav-link button btn btn-danger text-left"><i class="fas fa-trash-alt"></i>&nbspDELETE</button>
    </form>          --}}

    <div class="card">
        <div class="container-fluid" style="padding:3%;">
            <div class="row">                    
                <div class="col-md-8">
                    <h5 class="float-left"><span style="color:red; font-size: 25px;">&nbsp<b>{{ $personnel->firstName }} {{$personnel->middleName }} {{ $personnel->lastName }}</b></span></h5>  
                        <table class="table">   
                            <thead>
                                <tr>
                                    <th>Birthdate</th>
                                    <td>{{Carbon\Carbon::parse( $personnel->birthDate )->formatLocalized('%b %d %Y')}}</td>  
                                </tr>
                                <tr>
                                    <th>Email Address</th>
                                    <td>{{ $personnel->emailAddress }}</td>  
                                </tr>
                                <tr>
                                    <th>Mobile Number</th>
                                    <td>{{ $personnel->mobileNumber }}</td>  
                                </tr>
                                <tr>
                                    <th>Employment Status</th>
                                    <td>{{ $personnel->empStatus }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $personnel->houseNumber }},{{ $personnel->barangay }},{{ $personnel->municipality }},{{ $personnel->province }},{{ $personnel->zip }} </td>  
                                </tr>
                            </thead>
                        </table> 
                </div>
                
            </div>

                {{-- Repairs information. --}}

                <div class="row">
                        <h5 class="float-left">Repairs</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date Reported</th>
                                    <th>RoomNo</th>
                                    <th>Description</th>
                                    <th>Total Cost</th>
                                    <th>Status</th>
                                    <th>Satisfaction</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($repair as $row)
                                   <tr>
                                        <th>{{ $rowNum++ }}</th>
                                        <td>{{ $row->dateReported }}</td>
                                        <td>{{ $row->roomNo }}</td>
                                        <td>{{ $row->desc }}</td>
                                        <td>{{ $row->totalCost }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>{{ $row->rating }}</td>
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
</div>
</div>  
</div> 


   {{-- Modal for editing personnel's information.  --}}

   <div id="edit-personnel" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width:1320px; margin-left:-80%">

                <div class="modal-header">
                    <h4 class="edit-personnel-title float-left"></h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>
                <form method="POST" action="/personnels/{{ $personnel->id }}">

                    @method('PATCH')

                    {{ csrf_field() }}

                <div class="modal-body">
                        <label for=""><b style="font-size:20px">Personal Information</b></label>

                        <div class="form-group row" >
                            <label for="firstName" class=" col-form-label text-md-right" style="margin-left:3%">First Name:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="firstName" id="firstName" type="text" class="form-control" value="{{ $personnel->firstName }}"  required>
                            </div>     
    
                            <label for="middleName" class=" col-form-label text-md-right">Middle Name:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="middleName" id="middleName" type="text" class="form-control" value="{{ $personnel->middleName }}" >
                            </div>
    
                            <label for="lastName" class="col-form-label text-md-right">Last Name:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="lastName" id="lastName" type="text" class="form-control" value="{{ $personnel->lastName }}"  required>
                            </div>
    
                            <label for="birthDate" class="col-form-label text-md-right">Birthdate:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="birthDate" id="birthDate" type="date" class="form-control" value="{{ $personnel->birthDate }}" >
                            </div>
                            
                        </div>

                        <div class="form-group row" >
                                <label for="empStatus" class=" col-form-label text-md-right" style="margin-left:3%">Employment Status:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <select name="empStatus" id="empStatus" class="form-control" required>
                                    <option value="{{ $personnel->empStatus }}" selected>{{ $personnel->empStatus }}</option>
                                    <option value="regular">Regular</option>
                                    <option value="onCall">On-Call</option>
                                </select>
                            </div> 
                        </div>
                        
                        <label for=""><b style="font-size:20px">Contact Information</b></label>
    
                        <div class="form-group row" >
                            <label for="emailAddress" class=" col-form-label text-md-right" style="margin-left:3%">Email Address:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="emailAddress" id="emailAddress" type="email" class="form-control" value="{{ $personnel->emailAddress }}" >
                            </div>  
    
                            <label for="mobileNumber" class=" col-form-label text-md-right">Mobile Number:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="mobileNumber" id="mobileNumber" type="text" class="form-control" value="{{ $personnel->mobileNumber }}" >
                            </div>
                        </div>
    
                        <label for=""><b style="font-size:20px">Address Information</b></label>
    
                        <div class="form-group row" >
                            <label for="houseNumber" class=" col-form-label text-md-right" style="margin-left:3%">House No:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="houseNumber" id="houseNumber" type="text" class="form-control" value="{{ $personnel->houseNumber }}">
                            </div>     
        
                            <label for="barangay" class=" col-form-label text-md-right">Barangay:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="barangay" id="barangay" type="text" class="form-control" value="{{ $personnel->barangay }}" >
                            </div>
    
                            <label for="municipality" class=" col-form-label text-md-right">Municipality:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="municipality" id="municipality" type="text" class="form-control" value="{{ $personnel->municipality }}" >
                            </div>
    
                            <label for="province" class=" col-form-label text-md-right">Province:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="province" id="province" type="text" class="form-control" value="{{ $personnel->province }}" >
                            </div>
                        </div>
    
                        <div class="form-group row" >
                                <label for="zip" class=" col-form-label text-md-right" style="margin-left:3%">Zipcode:<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-2">
                                    <input name="zip" id="zip" type="text" class="form-control" value="{{ $personnel->zip }}" >
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

  
