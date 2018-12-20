@extends('layouts.main')
@section('title', $resident->firstName.' '.$resident->lastName )
@section('content')
<div class="row">

{{-- Vertical Navigation bar --}}

    <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" id="v-pills-dashboard-tab" href="/dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class="fas fa-chart-line"></i>&nbsp&nbsp&nbspDashboard</a>
            <a class="nav-link" id="v-pills-rooms-tab" href="/rooms" role="tab" aria-controls="v-pills-rooms" aria-selected="false"><i class="fas fa-home"></i>&nbsp&nbsp&nbspRooms</a>
            <a class="nav-link active" id="v-pills-residents-tab"  href="/residents" role="tab" aria-controls="v-pills-residents" aria-selected="false"><i class="fas fa-users"></i>&nbsp&nbsp&nbspResidents</a>
            <a class="nav-link" id="v-pills-owners-tab" href="/owners" role="tab" aria-controls="v-pills-owners" aria-selected="false"><i class="fas fa-user-tie"></i>&nbsp&nbsp&nbspOwners</a>
            <a class="nav-link" id="v-pills-repairs-tab" href="/repairs" role="tab" aria-controls="v-pills-repairs" aria-selected="false"><i class="fas fa-hammer"></i>&nbsp&nbsp&nbspRepairs</a>
            <a class="nav-link" id="v-pills-violations-tab" href="/violations" role="tab" aria-controls="v-pills-violations" aria-selected="false"><i class="fas fa-user-times"></i>&nbsp&nbsp&nbspViolations</a>
            <a class="nav-link" id="v-pills-supplies-tab" href="/supplies" role="tab" aria-controls="v-pills-supplies" aria-selected="false"><i class="fas fa-clipboard-list"></i>&nbsp&nbsp&nbspSupplies</a>
            <a class="nav-link" id="v-pills-personnels-tab" href="/personnels" role="tab" aria-controls="v-pills-personnels" aria-selected="false"><i class="fas fa-clipboard-list"></i>&nbsp&nbsp&nbspPersonnels</a>
        </div> 
    </div>

{{-- Content of the room section. --}}
<div class="col-md-10">
    @include('includes.notifications')
    <a href="#" class="btn nav-link edit-resident text-left float-left"><i class="fas fa-edit"></i>&nbspEDIT</a>
            
    {{-- <form method="POST" action="/residents/{{ $resident->id }}">
    @method('delete')
    @csrf
        <button id="FormDeleteTime" class=" float-right nav-link button btn btn-danger text-left"><i class="fas fa-trash-alt"></i>&nbspDELETE</button>
    </form>          --}}
             
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn float-right" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-plus-circle"></i>&nbspADD</a>
                <div class="dropdown-menu">
                    <a href="#" class=" dropdown-item add-transaction text-left">Transaction</a>
                    <a href="#" class=" dropdown-item add-repair text-left">Repair</a>
                    <a href="#" class=" dropdown-item add-violation text-left">Violation</a>
                    <a href="#" class=" dropdown-item add-billing text-left">Billing</a>
                    
                </div>
        </li>
    </ul>

    <div class="card">
        <div class="container-fluid" style="padding:3%;">
            <div class="row">                    
                <div class="col-md-8">
                    <h5 class="float-left"><span style="color:red; font-size: 25px;">&nbsp<b>{{ $resident->firstName }} {{$resident->middleName }} {{ $resident->lastName }}</b></span></h5>  
                        <table class="table">   
                            <thead>
                                <tr>
                                    <th>Birthdate</th>
                                    <td>{{Carbon\Carbon::parse( $resident->birthDate )->formatLocalized('%b %d %Y')}}</td>  
                                </tr>
                                <tr>
                                    <th>Email Address</th>
                                    <td>{{ $resident->emailAddress }}</td>  
                                </tr>
                                <tr>
                                    <th>Mobile Number</th>
                                    <td>{{ $resident->mobileNumber }}</td>  
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $resident->houseNumber }},{{ $resident->barangay }},{{ $resident->municipality }},{{ $resident->province }},{{ $resident->zip }} </td>  
                                </tr>
                                <tr>
                                    <th>School</th>
                                    <td>{{ $resident->school }}</td>  
                                </tr>
                                <tr>
                                    <th>Course</th>
                                    <td>{{ $resident->course }}</td>  
                                </tr>
                                <tr>
                                    <th>Year Level</th>
                                    <td>{{ $resident->yearLevel }}</td> 
                                </tr>
                                <tr>
                                    <th>Guardian</th>
                                    <td>{{ $resident->guardian }}</td> 
                                </tr>
                                <tr>
                                    <th>Guardian' Contact</th>
                                    <td>{{ $resident->guardianPhoneNumber }}</td> 
                                </tr>
                            </thead>
                        </table> 
                </div>
                
                <div class="col-md-4" style="padding:2%">
                    <div class="card">
                        <div class="card-body">
                            <img width="100%; height; 100%" src="/storage/img/residents/{{$resident->img}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
                <br>
                        {{-- List of residents --}}

                        <div class="row">
                                <h5 class="float-left">Transactions</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Transaction Date</th>
                                            <th>Room No</th>
                                            <th>Status</th>
                                            <th>Move-In Date</th>
                                            <th>Move-Out Date</th>
                                            <th>Term</th>
                                            <th>Security Deposit</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction as $transaction) 
                                        <tr>
                                            <th>{{ $resRow++ }}</th>
                                            <td>{{ Carbon\Carbon::parse($transaction->transDate)->formatLocalized('%b %d %Y') }}</td>
                                            <td>{{ $transaction->roomNo }}</td>
                                            <td>
                                                @if($transaction->transStatus == 'active')
                                                    <p class="btn-success text-center">{{ $transaction->transStatus }}</p>
                                                @elseif($transaction->transStatus == 'inactive')
                                                    <p class="btn-danger text-center">{{ $transaction->transStatus }}</p>
                                                @elseif($transaction->transStatus == 'pending')
                                                    <p class="btn-warning text-center">{{ $transaction->transStatus }}</p>
                                                @endif
                                            </td>
                                            <td>{{ Carbon\Carbon::parse($transaction->moveInDate)->formatLocalized('%b %d %Y') }}</td>
                                            <td>{{ Carbon\Carbon::parse($transaction->moveOutDate)->formatLocalized('%b %d %Y') }}</td>
                                            <td>{{ $transaction->term }}</td>
                                            <td>{{ $transaction->initialSecDep }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                             {{-- List of residents --}}

                        
                {{-- Repairs information. --}}

                <div class="row">
                        <h5 class="float-left">Repairs</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date Reported</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Endorsed To</th>
                                    <th>Total Cost</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($repair as $row)
                                   <tr>
                                    <th>{{ $repairRow++ }}</th>
                                    <td>{{ $row->dateReported }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->desc }}</td>
                                    <td>{{ $row->endorsedTo }}</td>
                                    <td>{{ $row->totalCost }}</td>
                                    <td>{{ $row->status }}</td>
                                   </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                             {{-- List of residents --}}

                        <div class="row">
                                <h5 class="float-left">Violations</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date Reported</th>
                                            <th>Date Committed</th>
                                            <th>Reported By</th>
                                            <th>Description</th>
                                            <th>Fine</th>
                                            <th>Action Taken</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($violation as $row) 
                                        <tr>
                                           <th>{{ $violationRow++ }}</th>
                                           <td>{{ $row->dateReported }}</td>
                                           <td>{{ $row->dateCommitted }}</td>
                                           <td>{{ $row->reportedBy }}</td>
                                           <td>{{ $row->desc }}</td>
                                           <td>{{ $row->fine }}</td>
                                           <td>{{ $row->actionTaken }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                            
</div>
</div>  
</div> 


{{-- Modal for editing resident information. --}}

<div id="edit-resident" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width:1320px; margin-left:-80%">

                <div class="modal-header">
                    <h4 class="edit-resident-title float-left"></h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>

                <form method="POST" action="/residents/{{ $resident->id }}" enctype="multipart/form-data">

                    @method('PATCH') 

                    {{-- Additional security feature laravel provides. --}}

                    @csrf

                <div class="modal-body">
                     <label for=""><b style="font-size:20px">Personal Information</b></label>

                    <div class="form-group row" >
                        <label for="firstName" class=" col-form-label text-md-right" style="margin-left:3%">First Name:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="firstName" id="firstName" type="text" class="form-control" value="{{ $resident->firstName }}" required >
                        </div>     

                        <label for="middleName" class=" col-form-label text-md-right">Middle Name:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="middleName" id="middleName" type="text" class="form-control" value="{{ $resident->middleName }}">
                        </div>

                        <label for="lastName" class="col-form-label text-md-right">Last Name:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="lastName" id="lastName" type="text" class="form-control" value="{{ $resident->lastName }}" required >
                        </div>

                        <label for="birthDate" class="col-form-label text-md-right">Birthdate:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="birthDate" id="birthDate" type="date" class="form-control" value="{{ $resident->birthDate }}" >
                        </div>
                    </div>
                    
                    <label for=""><b style="font-size:20px">Contact Information</b></label>

                    <div class="form-group row" >
                        <label for="emailAddress" class=" col-form-label text-md-right" style="margin-left:3%">Email Address:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="emailAddress" id="emailAddress" type="email" class="form-control" value="{{ $resident->emailAddress }}">
                        </div>  

                        <label for="mobileNumber" class=" col-form-label text-md-right">Mobile Number:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="mobileNumber" id="mobileNumber" type="text" class="form-control" value="{{ $resident->mobileNumber }}" >
                        </div>
                    </div>

                    <label for=""><b style="font-size:20px">Address Information</b></label>

                    <div class="form-group row" >
                        <label for="houseNumber" class=" col-form-label text-md-right" style="margin-left:3%">House No:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="houseNumber" id="houseNumber" type="text" class="form-control" value="{{ $resident->houseNumber }}" >
                        </div>     
    
                        <label for="barangay" class=" col-form-label text-md-right">Barangay:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="barangay" id="barangay" type="text" class="form-control" value="{{ $resident->barangay }}" >
                        </div>

                        <label for="municipality" class=" col-form-label text-md-right">Municipality:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="municipality" id="municipality" type="text" class="form-control" value="{{ $resident->municipality }}" >
                        </div>

                        <label for="province" class=" col-form-label text-md-right">Province:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="province" id="province" type="text" class="form-control" value="{{ $resident->province }}" >
                        </div>
                    </div>

                    <div class="form-group row" >
                            <label for="zip" class=" col-form-label text-md-right" style="margin-left:3%">Zipcode:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2">
                                <input name="zip" id="zip" type="text" class="form-control" value="{{ $resident->zip }}" >
                            </div>  

                            {{-- <label for="roomNo" class=" col-form-label text-md-right" style="visibility: hidden">Room No:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2" >
                                <input name="roomNo" id="roomNo" type="text" class="form-control" value="{{$resident->roomNo}}" >
                            </div>   --}}
                
        
                        </div>
                    <label for=""><b style="font-size:20px">Educational Information</b></label>

                    <div class="form-group row" >
                        <label for="school" class=" col-form-label text-md-right" style="margin-left:3%">School:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
<<<<<<< HEAD
                            <input name="school" id="school" type="text" class="form-control" value="{{ $resident->school }}" >
=======
<<<<<<< HEAD
                            <input name="school" id="school" type="text" class="form-control" value="{{ $resident->school }}">
=======
                            <input name="school" id="school" type="text" class="form-control" value="{{ $resident->school }}" >
>>>>>>> af49d4120303842bf7a3ff14573b971f087bb026
>>>>>>> 9eadc3ba3d2a755175ec25341f0a4b601db11d7e
                        </div>     
    
                        <label for="course" class=" col-form-label text-md-right">Course:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="course" id="course" type="text" class="form-control" value="{{ $resident->course }}" >
                        </div>

                        <label for="yearLevel" class=" col-form-label text-md-right">Year Level:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="yearLevel" id="yearLevel" type="number" min="1" class="form-control" value="{{ $resident->yearLevel }}" >
                        </div>
                    </div>

                    <label for=""><b style="font-size:20px">Guardian Information</b></label>

                    <div class="form-group row" >
                        <label for="guardian" class=" col-form-label text-md-right" style="margin-left:3%">Guardian's Name:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="guardian" id="guardian" type="text" class="form-control" value="{{ $resident->guardian }}" >
                        </div>
                        
                        <label for="guardianPhoneNumber" class=" col-form-label text-md-right" style="margin-left:3%">Contact:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="guardianPhoneNumber" id="guardianPhoneNumber" type="text" class="form-control" value="{{ $resident->guardianPhoneNumber }}" >
                        </div>
    
                    </div>

                    <label for=""><b style="font-size:20px">Upload Image</b></label>

                    <div class="form-group row" >
                        <label for="img" class=" col-form-label text-md-right" style="margin-left:3%">Image:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="img" id="img" type="file" class="form-control" value="{{ $resident->img }}" >
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

    {{-- Modal for adding resident's transaction. --}}

    <div id="add-transaction" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content" style="width:1320px; margin-left:-80%">
    
                    <div class="modal-header">
                        <h4 class="add-transaction-title float-left"></h4>
                        <button class="close" type="button" data-dismiss="modal" >&times;</button>
                    </div>
    
                    <form method="POST" action="/transactions">
    
                        {{-- Additional security feature laravel provides. --}}
    
                        @csrf
    
                    <div class="modal-body">

                            <div class="form-group row" >
                                <label for="transDate" class=" col-form-label text-md-right" style="margin-left:3%">Transaction Date:<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-2">
                                    <input name="transDate" id="transDate" type="date" class="form-control" value="{{ date('Y-m-d') }}" >
                                </div> 
                                
                                <label for="moveInDate" class=" col-form-label text-md-right" style="margin-left:3%">Move-in Date:<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-2">
                                    <input name="moveInDate" id="moveInDate" type="date" class="form-control" value="{{ old('moveInDate') }}" required>
                                </div>
                                
                                <label for="moveOutDate" class=" col-form-label text-md-right" style="margin-left:3%">Move-out Date:<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-2">
                                    <input name="moveOutDate" id="moveOutDate" type="date" class="form-control" value="{{ old('moveOutDate') }}" required>
                                </div>  
                            </div>

                            <div class="form-group row" >
                                <label for="term" class=" col-form-label text-md-right" style="margin-left:3%">Term:<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-2">
                                    <select name="term" id="term" class="form-control" required>
                                        <option value="{{ old('term') }}" selected>{{ old('term') }}</option>
                                        <option value="longTerm">Long Term</option>
                                        <option value="shortTerm">Short Term</option>
                                        <option value="transient">Transient</option>
                                    </select>
                                </div> 
                                    
                                <label for="initialSecDep" class=" col-form-label text-md-right" style="margin-left:3%">Security Deposit:<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-2">
                                    <input name="initialSecDep" id="initialSecDep" type="number" class="form-control" value="{{ old('initialSecDep') }}" required>
                                </div>
                                
                                <label for="transStatus" class=" col-form-label text-md-right" style="margin-left:3%">Status:<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-2">
                                    <select name="transStatus" id="transStatus" class="form-control" required>
                                        <option value="{{ old('transStatus') }}" selected>{{ old('transStatus') }}</option>
                                        <option value="pending">Pending</option>
                                        <option value="movingIn">Moving In</option>
                                        <option value="active">Active</option>
                                        <option value="movingOut">Moving Out</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div> 

                                <label for="room_id" class=" col-form-label text-md-right" style="margin-left:3%">Room No<span style="color:red">&nbsp*</span></label>
                                    <div class="col-md-1" >
                                        <select name="room_id" id="room_id" class="form-control">
                                            <option value="{{ $resident->room_id }}" selected>{{ $resident->roomNo }}</option>
                                            @foreach ($room as $row)
                                                <option value="{{ $row->id }}">{{ $row->roomNo }}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                
                                    <div class="col-md-1" style="visibility:hidden" >
                                    <input name="resident_id" id="resident_id" type="number" class="form-control" value="{{ $resident->id }}" required>
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


<div id="add-repair" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width:1320px; margin-left:-80%">

                <div class="modal-header">
                    <h4 class="add-repair-title float-left"></h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>

                <form method="POST" action="/repairs" >

                    {{-- Additional security feature laravel provides. --}}

                    @csrf

                <div class="modal-body">

                    <div class="form-group row" >
                        <label for="dateReported" class=" col-form-label text-md-right" style="margin-left:3%">Date Reported:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="dateReported" id="dateReported" type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>    
                        
                        <label for="name" class=" col-form-label text-md-right">Name<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="name" id="name" type="text" class="form-control" value="{{ $resident->firstName }}">
                        </div>

                        <label for="dateStarted" class=" col-form-label text-md-right">Date Started:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="dateStarted" id="dateStarted" type="date" class="form-control" value="{{ old('dateStarted') }}">
                        </div>

                        <label for="dateFinished" class="col-form-label text-md-right">Date Finished:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="dateFinished" id="dateFinished" type="date" class="form-control" value="{{ old('dateFinished') }}" >
                        </div>

                    </div>

                     <div class="form-group row" >
                        <label for="desc" class=" col-form-label text-md-right" style="margin-left:3%">Description:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <select name="desc" id="desc" class="form-control" required>
                                <option value="{{ old('desc') }}" selected>{{ old('desc') }}</option>
                                <option value="carpentry">Carpentry</option>
                                <option value="electrical">Electrical</option>
                                <option value="plumbing">Plumbing</option>
                                <option value="installation">Installation</option>
                                <option value="masonry">Masonry</option>
                                <option value="painting">Painting</option>
                                <option value="cleaning">Cleaning</option>
                                <option value="security">Security</option>
                                <option value="internet">Internet</option>
                                <option value="request">Request</option>
                                <option value="doorWindow">Door/Window</option>
                                <option value="general">General</option>
                            </select>
                        </div>     

                        <label for="endorsedTo" class=" col-form-label text-md-right">Endorsed To:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                                <select name="endorsedTo" id="endorsedTo" class="form-control" >
                                    <option value="{{ old('endorsedTo') }}" selected>{{ old('endorsedTo') }}</option>
                                    @foreach ($personnel as $row)
                                        <option value="{{ $row->id }}">{{ $row->firstName }} {{ $row->lastName }}</option>
                                    @endforeach
                                </select>
                        </div>

                        <label for="totalCost" class="col-form-label text-md-right">Total Cost:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="totalCost" id="totalCost" type="number" class="form-control" value="{{ old('totalCost') }}" >
                        </div>

                        <label for="status" class="col-form-label text-md-right">Status:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <select name="status" id="status" class="form-control" required>
                                <option value="{{ old('status') }}" selected>{{ old('status') }}</option>
                                <option value="pending">Pending</option>
                                <option value="onGoing">On Going</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>

                        
                    </div>

                     <div class="form-group row" >
                        <label for="rating" class=" col-form-label text-md-right" style="margin-left:3%">Rating:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                             <select name="rating" id="rating" class="form-control">
                                <option value="{{ old('rating') }}" selected>{{ old('rating') }}</option>
                                <option value="lessSatisfactory">Less Satisfactory</option>
                                <option value="somewhatSatisfactory">Somewhat Satisfactory</option>
                                <option value="satisfactory">Satisfactory</option>
                                <option value="aboveSatisfactory">Above Satisfactory</option>
                             </select>
                        </div> 
                        
                         <div class="col-md-2" style="visibility:hidden">
                            <input name="room_id" id="room_id" type="number" class="form-control" value="{{ $resident->room_id }}" >
                        </div> 

                         <div class="col-md-2" style="visibility:hidden">
                            <input name="resident_id" id="resident_id" type="number" class="form-control" value="{{ $resident->id }}" >
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

    {{-- Form for adding violation of the resident. --}}

    <div id="add-violation" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width:1320px; margin-left:-80%">

                <div class="modal-header">
                    <h4 class="add-violation-title float-left"></h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>

                <form method="POST" action="/violations" >

                    {{-- Additional security feature laravel provides. --}}

                    @csrf

                <div class="modal-body">

                    <div class="form-group row" >
                        <label for="dateReported" class=" col-form-label text-md-right" style="margin-left:3%">Date Reported:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="dateReported" id="dateReported" type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>    
                        
                        <label for="dateCommitted" class=" col-form-label text-md-right">Date Committed:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="dateCommitted" id="dateStarted" type="date" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>

                        <label for="reportedBy" class=" col-form-label text-md-right">Reported By:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
<<<<<<< HEAD
                            <input name="reportedBy" id="reportedBy" type="text" class="form-control" value="{{ old('reportedBy') }}" >
=======
                            <input name="reportedBy" id="reportedBy" type="text" class="form-control" value="{{ old('reportedBy') }}" >
>>>>>>> 9eadc3ba3d2a755175ec25341f0a4b601db11d7e
                        </div>

                        <label for="name" class=" col-form-label text-md-right">Name:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
<<<<<<< HEAD
                            <input name="name" id="name" type="text" class="form-control" value="{{ $resident->firstName }}" >
=======
                            <input name="name" id="name" type="text" class="form-control" value="{{ $resident->firstName }}" >
>>>>>>> 9eadc3ba3d2a755175ec25341f0a4b601db11d7e
                        </div>

                    </div>

                     <div class="form-group row" >
                        <label for="desc" class=" col-form-label text-md-right" style="margin-left:3%">Description:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <select name="desc" id="desc" class="form-control" required>
                                <option value="{{ old('desc') }}" selected>{{ old('desc') }}</option>
                                <option value="smoking">Smoking</option>
                                <option value="drinkingOfLiquor">Drinking of Liquor</option>
                                <option value="noisy">Noisy</option>
                                <option value="garbageDisposal">Garabage Disposal</option>
                                <option value="parkingPolicy">Parking Policy</option>
                                <option value="petPolicy">Pet Policy</option>
                                <option value="useOfCommonAreas">Use of Common Areas</option>
                                <option value="loitering">Loitering</option>
                                <option value="others">Others</option>
                            </select>
                        </div>     

                        <label for="details" class=" col-form-label text-md-right">Details:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
<<<<<<< HEAD
                                <input name="details" id="details" type="textarea" class="form-control" value="{{ old('details') }}" >
=======
                                <input name="details" id="details" type="textarea" class="form-control" value="{{ old('details') }}" style="text-transform:uppercase">
>>>>>>> 9eadc3ba3d2a755175ec25341f0a4b601db11d7e
                        </div>

                        <label for="fine" class="col-form-label text-md-right">Fine:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="fine" id="fine" type="number" class="form-control" value="{{ old('fine') }}" >
                        </div>

                        

                    </div>

                     <div class="form-group row" >
                        <label for="actionTaken" class="col-form-label text-md-right" style="margin-left:3%">Action Taken:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="actionTaken" id="actionTaken" type="string" class="form-control" value="{{ old('actionTaken') }}" style="text-transform:uppercase">
                        </div> 
                        
                         <div class="col-md-2" style="visibility:hidden">
                            <input name="room_id" id="room_id" type="number" class="form-control" value="{{ $resident->room_id }}" >
                        </div> 

                         <div class="col-md-2" style="visibility:hidden">
                            <input name="resident_id" id="resident_id" type="number" class="form-control" value="{{ $resident->id }}" >
                        </div> 

                        <div class="col-md-2" style="visibility:hidden">
                            <input name="roomNo" id="roomNo" type="text" class="form-control" value="{{ $resident->roomNo }}" >
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

  
