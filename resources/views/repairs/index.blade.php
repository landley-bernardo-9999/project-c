@extends('layouts.main')
@section('title', 'Repairs')
@section('content')
<div class="row">

    {{-- Vertical Navigation bar --}}

    <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" id="v-pills-dashboard-tab" href="/" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class="fas fa-chart-line"></i>&nbsp&nbsp&nbspDashboard</a>
            <a class="nav-link" id="v-pills-rooms-tab" href="/rooms" role="tab" aria-controls="v-pills-rooms" aria-selected="false"><i class="fas fa-home"></i>&nbsp&nbsp&nbspRooms</a>
            <a class="nav-link" id="v-pills-residents-tab"  href="/residents" role="tab" aria-controls="v-pills-residents" aria-selected="false"><i class="fas fa-users"></i>&nbsp&nbsp&nbspResidents</a>
            <a class="nav-link" id="v-pills-owners-tab" href="/owners" role="tab" aria-controls="v-pills-owners" aria-selected="false"><i class="fas fa-user-tie"></i>&nbsp&nbsp&nbspOwners</a>
            <a class="nav-link active" id="v-pills-repairs-tab" href="/repairs" role="tab" aria-controls="v-pills-repairs" aria-selected="false"><i class="fas fa-hammer"></i>&nbsp&nbsp&nbspRepairs</a>
            <a class="nav-link" id="v-pills-violations-tab" href="/violations" role="tab" aria-controls="v-pills-violations" aria-selected="false"><i class="fas fa-user-times"></i>&nbsp&nbsp&nbspViolations</a>
            <a class="nav-link" id="v-pills-supplies-tab" href="/supplies" role="tab" aria-controls="v-pills-supplies" aria-selected="false"><i class="fas fa-clipboard-list"></i>&nbsp&nbsp&nbspSupplies</a>
            <a class="nav-link" id="v-pills-personnels-tab" href="/personnels" role="tab" aria-controls="v-pills-personnels" aria-selected="false"><i class="fas fa-user-lock"></i>&nbsp&nbsp&nbspPersonnels</a>
        </div>
    </div>

    {{-- Content of the room section. --}}


{{-- Content of the room section. --}}

    <div class="col-md-10">
        @include('includes.notifications')
        <div class="card">
               {{-- Search button for finding residents. --}}
            <div class="card-header">
                
                    <h3 class="float-left">Repairs</h3>
                    
                    <form action="/search/repairs" method="GET">
                        <input type="text" class="form-control float-right" style="width:200px" aria-label="Text input with dropdown button" name="s" value="{{ Request::query('s') }}" placeholder="Search residents/rooms">
                    </form>
            </div>

            <div class="card-body" style="padding:3%;" >

                <div class="row">
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reported</th>
                                        <th>Started</th>
                                        <th>Resident</th>
                                        <th>Room No</th>
                                        <th>Description</th>
                                        <th>Endorsed</th>
                                        <th>Cost</th>
                                        <th>Status</th>
                                        <th>Finished</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($repair as $row)
                                    <tr>
                                        <th>{{ $repairRow++ }}</th>
                                        <td>{{Carbon\Carbon::parse($row->dateReported)->formatLocalized('%b %d %Y')}}</td>
                                        <td>{{Carbon\Carbon::parse($row->dateStarted)->formatLocalized('%b %d %Y')}}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->roomNo }}</td>
                                        <td>{{ $row->desc}}</td>
                                        <td>{{ $row->firstName }}</th>
                                        {{-- <td>{{ $row->dateFinished }}</td> --}}
                                        <td>{{ $row->totalCost }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>{{Carbon\Carbon::parse($row->dateFinished)->formatLocalized('%b %d %Y')}}</td>
                                        <td>
                                            <a href="#" class="btn edit-repair"><i class="fas fa-edit"></i>&nbspEDIT</a>

                                            <div id="edit-repair" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="width:1320px; margin-left:-80%">

                                                            <div class="modal-header">
                                                                <h4 class="edit-repair-title float-left"></h4>
                                                                <button class="close" type="button" data-dismiss="modal" >&times;</button>
                                                            </div>

                                                            <form method="POST" action="/repairs/{{ $row->repairId}}" >

                                                                {{-- Additional security feature laravel provides. --}}
                                                                @method('PATCH')

                                                                @csrf

                                                            <div class="modal-body">

                                                                <div class="form-group row" >
                                                                    <label for="dateReported" class=" col-form-label text-md-right" style="margin-left:3%">Date Reported:<span style="color:red">&nbsp*</span></label>
                                                                        <div class="col-md-2">
                                                                        <input name="dateReported" id="dateReported" type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                                                                    </div>

                                                                    <label for="name" class=" col-form-label text-md-right">Name<span style="color:red">&nbsp*</span></label>
                                                                        <div class="col-md-2">
                                                                        <input name="name" id="name" type="text" class="form-control" value="{{ $row->name }}">
                                                                    </div>

                                                                    <label for="dateStarted" class=" col-form-label text-md-right">Date Started:<span style="color:red">&nbsp*</span></label>
                                                                        <div class="col-md-2">
                                                                        <input name="dateStarted" id="dateStarted" type="date" class="form-control" value="{{ $row->dateStarted }}">
                                                                    </div>

                                                                    <label for="dateFinished" class="col-form-label text-md-right">Date Finished:<span style="color:red">&nbsp*</span></label>
                                                                        <div class="col-md-2">
                                                                        <input name="dateFinished" id="dateFinished" type="date" class="form-control" value="{{ $row->dateFinished }}" >
                                                                    </div>

                                                                </div>

                                                                 <div class="form-group row" >
                                                                    <label for="desc" class=" col-form-label text-md-right" style="margin-left:3%">Description:<span style="color:red">&nbsp*</span></label>
                                                                        <div class="col-md-2">
                                                                        <select name="desc" id="desc" class="form-control" required>
                                                                            <option value="{{ $row->desc }}" selected>{{ $row->desc }}</option>
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
                                                                            <option value="door/window">Door/Window</option>
                                                                            <option value="general">General</option>
                                                                        </select>
                                                                    </div>

                                                                    <label for="endorsedTo" class=" col-form-label text-md-right">Endorsed To:<span style="color:red">&nbsp*</span></label>
                                                                        <div class="col-md-2">
                                                                            <select name="endorsedTo" id="endorsedTo" class="form-control" >
                                                                                    <option value="{{ $row->endorsedTo }}" selected>{{ $row->endorsedTo }}</option>
                                                                                    @foreach ($personnel as $per)
                                                                            <option value="{{ $per->id }}">{{ $per->firstName }} {{ $per->lastName }}</option>
                                                                                    @endforeach
                                                                            </select>
                                                                    </div>

                                                                    <label for="totalCost" class="col-form-label text-md-right">Total Cost:<span style="color:red">&nbsp*</span></label>
                                                                        <div class="col-md-2">
                                                                        <input name="totalCost" id="totalCost" type="number" class="form-control" value="{{ $row->totalCost }}" >
                                                                    </div>

                                                                    <label for="status" class="col-form-label text-md-right">Status:<span style="color:red">&nbsp*</span></label>
                                                                        <div class="col-md-2">
                                                                        <select name="status" id="status" class="form-control" required>
                                                                            <option value="{{ $row->status }}" selected>{{ $row->status }}</option>
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
                                                                            <option value="{{ $row->rating }}" selected>{{ $row->rating }}</option>
                                                                            <option value="lessSatisfactory">Less Satisfactory</option>
                                                                            <option value="somewhatSatisfactory">Somewhat Satisfactory</option>
                                                                            <option value="satisfactory">Satisfactory</option>
                                                                            <option value="aboveSatisfactory">Above Satisfactory</option>
                                                                         </select>
                                                                    </div>

                                                                     <div class="col-md-2" style="visibility:hidden">
                                                                        <input name="room_id" id="room_id" type="number" class="form-control" value="{{ $row->room_id }}" >
                                                                    </div>

                                                                     <div class="col-md-2" style="visibility:hidden">
                                                                        <input name="resident_id" id="resident_id" type="number" class="form-control" value="{{ $row->id }}" >
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



                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>
            </div>
            <div class="card-footer">
                <h3 class="text-center">Results found: {{count($repair)}}</h3>
            </div>
        </div>
    </div>
</div>


@endsection


