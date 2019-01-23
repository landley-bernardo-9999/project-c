@extends('layouts.main')
@section('title', $room->roomNo)
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
                @method('PATCH')
                    @csrf

                <div class="modal-body">

                    {{-- Room number input.     --}}
                    <div class="form-group row">
                        <label for="roomNo" class="col-md-4 col-form-label text-md-right">Room No:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <input name="roomNo" id="roomNo" type="text" class="form-control" value="{{ $room->roomNo }}" readonly>
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
                                <option value="loft">Loft</option>
                                <option value="manors">Manors</option>
                                <option value="arkansas">Arkansas</option>
                                <option value="colorado">Colorado</option>
                            </select>
                        </div>
                    </div>

                    {{-- Project Name Input --}}

                    <div class="form-group row">
                        <label for="project" class="col-md-4 col-form-label text-md-right">Project:<span style="color:red">&nbsp*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" name="project" id="project" required>
                                <option value="{{ $room->project }}">{{ $room->project }}</option>
                                <option value="northCambridge">North Cambridge</option>
                                <option value="theCourtyards">The Courtyards</option>
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
            <a class="nav-link" id="v-pills-dashboard-tab" href="/dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class="fas fa-chart-line"></i>&nbsp&nbsp&nbspDashboard</a>
            <a class="nav-link active" id="v-pills-rooms-tab" href="/rooms" role="tab" aria-controls="v-pills-rooms" aria-selected="false"><i class="fas fa-home"></i>&nbsp&nbsp&nbspRooms</a>
            <a class="nav-link" id="v-pills-residents-tab"  href="/residents" role="tab" aria-controls="v-pills-residents" aria-selected="false"><i class="fas fa-users"></i>&nbsp&nbsp&nbspResidents</a>
            <a class="nav-link" id="v-pills-owners-tab" href="/owners" role="tab" aria-controls="v-pills-owners" aria-selected="false"><i class="fas fa-user-tie"></i>&nbsp&nbsp&nbspOwners</a>
            <a class="nav-link" id="v-pills-repairs-tab" href="/repairs" role="tab" aria-controls="v-pills-repairs" aria-selected="false"><i class="fas fa-hammer"></i>&nbsp&nbsp&nbspRepairs</a>
            <a class="nav-link" id="v-pills-violations-tab" href="/violations" role="tab" aria-controls="v-pills-violations" aria-selected="false"><i class="fas fa-user-times"></i>&nbsp&nbsp&nbspViolations</a>
            <a class="nav-link" id="v-pills-supplies-tab" href="/supplies" role="tab" aria-controls="v-pills-supplies" aria-selected="false"><i class="fas fa-clipboard-list"></i>&nbsp&nbsp&nbspSupplies</a>
            <a class="nav-link" id="v-pills-personnels-tab" href="/personnels" role="tab" aria-controls="v-pills-personnels" aria-selected="false"><i class="fas fa-user-lock"></i>&nbsp&nbsp&nbspPersonnels</a>
        </div>
    </div>

{{-- Content of the room section. --}}

    <div class="col-md-10">
        @include('includes.notifications')
            <a href="#" class="btn edit-room float-left"><i class="fas fa-edit"></i>&nbspEDIT ROOM</a>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-plus-circle"></i>&nbspADD</a>
                        <div class="dropdown-menu">
                            <a href="#" class="btn dropdown-item add-resident">Resident</a>
                            <a href="#" class="btn dropdown-item add-repair">Repair</a>
                            <a href="#" class="btn dropdown-item add-owner">Owner</a>
                            <a href="#" class="btn dropdown-item">Billing</a>
                        </div>
                </li>
            </ul>

        <div class="card">
            <div class="container-fluid" style="padding:3%;">

                {{-- Room information. --}}

                <div class="row">
                    <div class="col-md-12">

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
                                @foreach($room_owner as $row)
                                <tr>
                                    <th>Principal Owner</th>
                                    <td> {{ $row->firstName }} {{ $row->lastName }}</td>
                                </tr>
                                <tr>
                                    <th>Representative</th>
                                    <td>{{ $row->rep }}</td>
                                </tr>
                                <tr>
                                    <th>Representative's Mobile</th>
                                    <td>{{ $row->repPhoneNumber }}</td>
                                </tr>

                                @endforeach

                            </thead>

                    </table>
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
                                <th>Name</th>
                                <th>Status</th>
                                <th>Move-in</th>
                                <th>Move-out</th>
                                <th style="text-align:center" colspan="3">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction as $row)
                            <tr>
                                <th>{{ $rRow++ }}</th>
                                <td>{{ $row->residentFirstName }} {{ $row->residentMiddleName }} {{ $row->residentLastName }}</td>
                                <td>
                                    @if($row->transStatus == 'active')
                                        <p class="btn-success text-center">{{ $row->transStatus }}</p>
                                    @elseif($row->transStatus == 'inactive')
                                        <p class="btn-danger text-center">{{ $row->transStatus }}</p>
                                    @elseif($row->transStatus == 'pending')
                                        <p class="btn-warning text-center">{{ $row->transStatus }}</p>
                                    @endif
                                </td>
                                {{-- <td>{{ $row->emailAddress }}</td>
                                <td>{{ $row->mobileNumber }}</td> --}}
                                <td>{{Carbon\Carbon::parse($row->moveInDate)->formatLocalized('%b %d %Y')}}</td>
                                <td>{{Carbon\Carbon::parse($row->moveOutDate)->formatLocalized('%b %d %Y')}}</td>
                                <td>
                                    <a href="#" class="add-inventory text-left">INVENTORY</a>

                                             
                                </td>
                                <td><a href="#" class="move-out-resident float-left">MOVE OUT</a></td>
                                <td><a href="#" class="renew-contract-resident float-left">RENEW </a></td>
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
                                <td>{{ $repairRow++ }}</td>
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

        {{-- Modal for adding resident.  --}}

<div id="add-resident" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width:1320px; margin-left:-80%">

                <div class="modal-header">
                    <h4 class="add-resident-title float-left"></h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>

                <form method="POST" action="/residents" enctype="multipart/form-data">

                    {{-- Additional security feature laravel provides. --}}

                    {{ csrf_field() }}

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
                            <input name="emailAddress" id="emailAddress" type="email" class="form-control" value="{{ old('emailAddress') }}" style="text-transform:uppercase">
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
                            <input name="municipality" id="municipality" type="text" class="form-control" value="{{ old('municipality') }}">
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

                            <label for="room_id" class=" col-form-label text-md-right" style="visibility: hidden">Room No:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2" style="visibility: hidden">
                                <input name="room_id" id="room_id" type="number" class="form-control" value="{{$room->id}}" >
                            </div>

                            <label for="roomNo" class=" col-form-label text-md-right" style="visibility: hidden">Room No:<span style="color:red">&nbsp*</span></label>
                                <div class="col-md-2" style="visibility: hidden">
                                <input name="roomNo" id="roomNo" type="text" class="form-control" value="{{$room->roomNo}}" >
                            </div>


                        </div>
                    <label for=""><b style="font-size:20px">Educational Information</b></label>

                    <div class="form-group row" >
                        <label for="school" class=" col-form-label text-md-right" style="margin-left:3%">School:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="school" id="school" type="text" class="form-control" value="{{ old('school') }}" >
                        </div>

                        <label for="course" class=" col-form-label text-md-right">Course:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                            <input name="course" id="course" type="text" class="form-control" value="{{ old('course') }}">
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




           {{-- Modal for addin resident.  --}}

<div id="add-repair" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width:1320px; margin-left:-80%">

                <div class="modal-header">
                    <h4 class="add-repair-title float-left"></h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>

                <form method="POST" action="/repairs" >
                    @csrf
                <div class="modal-body">

                    <div class="form-group row" >
                        <label for="dateReported" class=" col-form-label text-md-right" style="margin-left:3%">Date Reported:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                                <input name="dateReported" id="dateReported" type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
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

                        <div class="col-md-2" style="visibility: hidden">
                            <input name="room_id" id="room_id" type="number" class="form-control" value="{{ $room->id }}" >
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

 {{-- Modal for adding owner for the room.  --}}

 <div id="add-owner" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width:1320px; margin-left:-80%">
                <div class="modal-header">
                    <h4 class="add-owner-title float-left"></h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>

                <form method="POST" action="/owners">
                    @csrf
                <div class="modal-body">

                    {{-- Owner's Personal Information. --}}

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

                    {{-- Owners's Contact Information --}}

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


                    {{-- Owner's Address Information --}}

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
                                <input name="municipality" id="municipality" type="text" class="form-control" value="{{ old('municipality') }}">
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

                        <label for="room_id" class=" col-form-label text-md-right" style="visibility: hidden">Room No:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2" style="visibility: hidden">
                                <input name="room_id" id="room_id" type="number" class="form-control" value="{{$room->id}}" >
                            </div>

                        <label for="roomNo" class=" col-form-label text-md-right" style="visibility: hidden">Room No:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2" style="visibility: hidden">
                                <input name="roomNo" id="roomNo" type="text" class="form-control" value="{{$room->roomNo}}" >
                            </div>
                    </div>

                    {{-- Owner's Representative's Information. --}}

                    <label for=""><b style="font-size:20px">Representative's Information</b></label>

                    <div class="form-group row" >
                        <label for="rep" class=" col-form-label text-md-right" style="margin-left:3%">Name:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                                <input name="rep" id="rep" type="text" class="form-control" value="{{ old('rep') }}" >
                            </div>

                        <label for="repPhoneNumber" class=" col-form-label text-md-right" style="margin-left:3%">Mobile:<span style="color:red">&nbsp*</span></label>
                            <div class="col-md-2">
                                <input name="repPhoneNumber" id="repPhoneNumber" type="text" class="form-control" value="{{ old('repPhoneNumber') }}" >
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


    {{-- Modal for moving-out a resident --}}

    <div id="move-out-resident" class="modal fade" role="dialog">
        <div class="modal-dialog"   >
            <div class="modal-content" style="width:1320px; margin-left:-80%">
                <div class="modal-header">
                    <h4 class="move-out-resident-title float-left"></h4>
                    <button class="close" type="button" data-dismiss="modal" >&times;</button>
                </div>
                    
                @foreach ($resident_transaction as $transaction)
            <form action="/transactions/{{ $transaction->id }}" method="POST" >
                    @method('PATCH')
                    @csrf
                   
                <div class="modal-body">
                    <h5>Move out checklist:</h5>  
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Radio button for following text input" required>
                                </div>
                            </div>
                                <input type="text" class="form-control" value="Move out asdasda." readonly>
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Radio button for following text input" required>
                                </div>
                            </div>
                                <input type="text" class="form-control" value="Move out asdasda." readonly>
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Radio button for following text input" required>
                                </div>
                            </div>
                                <input type="text" class="form-control" value="Move out asdasda." readonly>
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Radio button for following text input" required>
                                </div>
                            </div>
                                <input type="text" class="form-control" value="Move out asdasda." readonly>
                        </div>
                        
                  
                        
                        <input style="visibility:hidden" name="transStatus" id="transStatus" type="text" class="form-control" value="inactive" required>
                </div>
                @endforeach
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fas fa-times"></i>&nbspCANCEL</button>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i>&nbspMOVE OUT</button>
                </div>
                </form>
            </div>
        </div>
    </div>

     {{-- Modal for renewing contract of a resident --}}

     <div id="renew-contract-resident" class="modal fade" role="dialog">
            <div class="modal-dialog"   >
                <div class="modal-content" style="width:1320px; margin-left:-80%">
                    <div class="modal-header">
                        <h4 class="renew-contract-resident-title float-left"></h4>
                        <button class="close" type="button" data-dismiss="modal" >&times;</button>
                    </div>
    
            
                    @foreach ($resident_transaction as $transaction)
                <form action="/transactions/" method="POST" >
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
                                        <input name="initialSecDep" id="initialSecDep" type="number" class="form-control" value="{{ $transaction->initialSecDep}}" required>
                                    </div>
                                    
                                   
                                        <div style = "visibility:hidden" class="col-md-2">
                                            <input name="transStatus" id="transStatus" type="text" class="form-control" value="active" required>
                                        </div> 
    
                                       
                                        <div class="col-md-2" style = "visibility:hidden" >
                                            <input name="resident_id" id="resident_id" type="number" class="form-control" value="{{ $transaction->resident_id }}" required>
                                        </div>  
                                    
                                        <div class="col-md-1" style="visibility:hidden" >
                                        <input name="room_id" id="room_id" type="number" class="form-control" value="{{ $transaction->room_id }}" required>
                                    </div>
                                </div>
                           
                    </div>
                    @endforeach
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fas fa-times"></i>&nbspCANCEL</button>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i>&nbspRENEW</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


           {{-- Modal for editing resident information. --}}

           <div id="add-inventory" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content" style="width:1320px; margin-left:-80%">

                        <div class="modal-header">
                            <h4 class="add-inventory-title float-left"></h4>
                            <button class="close" type="button" data-dismiss="modal" >&times;</button>
                        </div>
                        
                    <form action="/inventory/" method="POST" >
                            @csrf
                        <div class="modal-body">
                           <div class="card">
                                <div class="card-body">
                                        <h5>REMARKS:</h5> [<b>TR</b>: Transient] [<b>ST</b>: Short Term] [<b>LT</b>: Long Term] [<b>M</b>: Missing] [<b>PO</b>: Pulled Out] [<b>R</b>: Replaced] [<b>D</b>: Damaged]
                                        {{-- <input name="inventory_roomId" id="inventory_roomId" type="number" class="col-md-1" value="{{ $row->inventory_roomId }}"  > --}}
                                        {{-- <input name="inventory_residentId" id="inventory_residentId" type="number" class="col-md-1" value="{{ $row->inventory_residentId }}" > --}}
                                        <br>
                                        <label for=""><b style="font-size:20px">Date:</b></label>
                                        <input  class="col-md-2" name="inventory_date" id="inventory_date" type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                        <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Move-in Inventory</th>
                                                <th>Remarks</th>
                                                <th>Move-out Inventory</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        @foreach ($inventory as $row)
                                        <tbody>
                                            <tr>
                                                <th>{{ $inventoryRow++ }}</th>

                                                <td>
                                                    <input name="furn" id="furn" type="text" class="form-control" value="Bed" readonly>
                                                </td>
                                                <td>
                                                <input name="moveInInventory" id="moveInInventory" type="number" class="form-control" value="{{ $row->moveInInventory }}"  >
                                                </td>
                                                <td>
                                                    <input name="moveInRemarks" id="moveInRemarks" type="text" class="form-control" value="{{ $row->moveInRemarks }}"  >
                                                </td>
                                                <td>
                                                    <input name="moveOutInventory" id="moveOutInventory" type="number" class="form-control" value="{{ $row->moveOutInventory }}"  >
                                                </td>
                                                <td>
                                                    <input name="moveOutRemarks" id="moveOutRemarks" type="text" class="form-control" value="{{ $row->moveOutRemarks }}"  >
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
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


