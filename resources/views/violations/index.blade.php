@extends('layouts.main')
@section('title', 'Violations')
@section('content')
<div class="row">

    {{-- Vertical Navigation bar --}}

    <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @can('isAdmin')
            <a class="nav-link" id="v-pills-personnels-tab" href="/users" role="tab" aria-controls="v-pills-users" aria-selected="false"><i class="fas fa-user"></i>&nbsp&nbsp&nbspUsers</a>
            @endcan
            <a class="nav-link" id="v-pills-dashboard-tab" href="/" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class="fas fa-chart-line"></i>&nbsp&nbsp&nbspDashboard</a>
            <a class="nav-link" id="v-pills-rooms-tab" href="/rooms" role="tab" aria-controls="v-pills-rooms" aria-selected="false"><i class="fas fa-home"></i>&nbsp&nbsp&nbspRooms</a>
            <a class="nav-link" id="v-pills-residents-tab"  href="/residents" role="tab" aria-controls="v-pills-residents" aria-selected="false"><i class="fas fa-users"></i>&nbsp&nbsp&nbspResidents</a>
            <a class="nav-link" id="v-pills-owners-tab" href="/owners" role="tab" aria-controls="v-pills-owners" aria-selected="false"><i class="fas fa-user-tie"></i>&nbsp&nbsp&nbspOwners</a>
            <a class="nav-link" id="v-pills-repairs-tab" href="/repairs" role="tab" aria-controls="v-pills-repairs" aria-selected="false"><i class="fas fa-hammer"></i>&nbsp&nbsp&nbspRepairs</a>
            <a class="nav-link active" id="v-pills-violations-tab" href="/violations" role="tab" aria-controls="v-pills-violations" aria-selected="false"><i class="fas fa-user-times"></i>&nbsp&nbsp&nbspViolations</a>
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
                    <h3 class="float-left">Violations</h3>
                    <form action="/search/violations" method="GET">
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
                                        <th>Committed</th>
                                        <th>Reported By</th>
                                        <th>Room No</th>
                                        <th>Name</th>
                                        <th>Desc</th>
                                        <th>Fine</th>
                                        <th>Repercussion</th>
                                        <th>Action</th>
                                    </tr>
                                  
                                </thead>
                                <tbody>
                                    @foreach ($violation as $row)
                                    <tr>
                                        <th>{{ $violationRow++ }}</th>
                                        <td>{{ $row->dateReported }}</td>
                                        <td>{{ $row->dateCommitted }}</td>
                                        <td>{{ $row->reportedBy }}</td>
                                        <td>{{ $row->roomNo }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->desc }}</td>
                                        <td>{{ $row->fine }}</td>
                                        <td>{{ $row->actionTaken }}</td>
                                        <td>
                                            <a href="#" class="btn edit-violation"><i class="fas fa-edit"></i>&nbspEDIT</a>

                                            <div id="edit-violation" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="width:1320px; margin-left:-80%">

                                                            <div class="modal-header">
                                                                <h4 class="edit-violation-title float-left"></h4>
                                                                <button class="close" type="button" data-dismiss="modal" >&times;</button>
                                                            </div>

                                                            <form method="POST" action="/violations/{{ $row->violationId}}" >

                                                                {{-- Additional security feature laravel provides. --}}
                                                                @method('PATCH')

                                                                @csrf

                                                                <div class="modal-body">

                                                                    <div class="form-group row" >
                                                                        <label for="dateReported" class=" col-form-label text-md-right" style="margin-left:3%">Date Reported:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                            <input name="dateReported" id="dateReported" type="date" class="form-control" value="{{ $row->dateReported }}" required>
                                                                        </div>    
                                                                        
                                                                        <label for="dateCommitted" class=" col-form-label text-md-right">Date Committed:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                            <input name="dateCommitted" id="dateStarted" type="date" class="form-control" value="{{ $row->dateCommitted }}">
                                                                        </div>
                                                
                                                                        <label for="reportedBy" class=" col-form-label text-md-right">Reported By:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                            <input name="reportedBy" id="reportedBy" type="text" class="form-control" value="{{ $row->reportedBy }}" style="text-transform:uppercase">
                                                                        </div>
                                                
                                                                        <label for="name" class=" col-form-label text-md-right">Name:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-1">
                                                                            <input name="name" id="name" type="text" class="form-control" value="{{ $row->name }}" style="text-transform:uppercase">
                                                                        </div>
                                                
                                                                    </div>
                                                
                                                                     <div class="form-group row" >
                                                                        <label for="desc" class=" col-form-label text-md-right" style="margin-left:3%">Description:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                            <select name="desc" id="desc" class="form-control" required>
                                                                                <option value="{{ $row->desc }}" selected>{{ $row->desc }}</option>
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
                                                                                <input name="details" id="details" type="textarea" class="form-control" value="{{ $row->details }}" style="text-transform:uppercase">
                                                                        </div>
                                                
                                                                        <label for="fine" class="col-form-label text-md-right">Fine:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                            <input name="fine" id="fine" type="number" class="form-control" value="{{ $row->fine }}" >
                                                                        </div>
                                                
                                                                        
                                                
                                                                    </div>
                                                
                                                                     <div class="form-group row" >
                                                                        <label for="actionTaken" class="col-form-label text-md-right" style="margin-left:3%">Action Taken:<span style="color:red">&nbsp*</span></label>
                                                                            <div class="col-md-2">
                                                                            <input name="actionTaken" id="actionTaken" type="string" class="form-control" value="{{ $row->actionTaken }}" style="text-transform:uppercase">
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
                <h3 class="text-center">Results found: {{count($violation)}}</h3>
            </div>
        </div>
    </div>
</div>


@endsection


