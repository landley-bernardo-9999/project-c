@extends('layouts.main')
@section('title', 'Users')
@section('content')
<div class="row">

{{-- Vertical Navigation bar --}}

    <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @can('isAdmin')
            <a class="nav-link active" id="v-pills-personnels-tab" href="/users" role="tab" aria-controls="v-pills-users" aria-selected="false"><i class="fas fa-user"></i>&nbsp&nbsp&nbspUsers</a>
            @endcan

            <a class="nav-link" id="v-pills-dashboard-tab" href="/dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class="fas fa-chart-line"></i>&nbsp&nbsp&nbspDashboard</a>
           
            <a class="nav-link" id="v-pills-rooms-tab" href="/rooms" role="tab" aria-controls="v-pills-rooms" aria-selected="false"><i class="fas fa-home"></i>&nbsp&nbsp&nbspRooms</a>
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
        <div class="card">
            <div class="card-header">
                <h3 class="float-left">Users</h3>
                <form action="/search/users" method="GET">
                    <input type="text" class="form-control float-right" style="width:200px" aria-label="Text input with dropdown button" name="s" value="{{ Request::query('s') }}" placeholder="Search users">
                </form>
            </div>
            <div class="card-body table-responsive" style="padding:3%;">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>        
                            <th>Position</th>                                
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th class="text-center" >
                                <a href="#" class="create-modal btn btn-success btn-sm">ADD</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
            </table>                        
        </div>
        <div class="card-footer">
           
        </div>
    </div>
</div>        

        {{-- Form create post --}}

    <div id="create" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group row add">
                            <label class="control-label col-sm-3" for="firstName">First Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required>
                                    <p class="error text-center alert alert-danger d-none"></p>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="control-label col-sm-3" for="lastName">Last Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required>
                                    <p class="error text-center alert alert-danger d-none"></p>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="control-label col-sm-3" for="position">Position:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="position" id="position" placeholder="Position" required>
                                    <p class="error text-center alert alert-danger d-none"></p>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="control-label col-sm-3" for="email">Email:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                                    <p class="error text-center alert alert-danger d-none"></p>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="control-label col-sm-3" for="mobileNumber">Mobile Number:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="mobileNumber" id="mobileNumber" placeholder="Mobile Number" required>
                                    <p class="error text-center alert alert-danger d-none"></p>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="saveUser()" id="save" type="button">
                        Save 
                    </button>
                    <button class="btn btn-warning" data-dismiss="modal" type="button">
                       Close 
                    </button>
                </div>
            </div>
        </div>


    </div>


</div>
@endsection


  
