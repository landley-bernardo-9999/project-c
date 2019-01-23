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
            <div class="card-body" style="padding:3%;">
               
                <div class="row">
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>        
                                        <th>Position</th>                                
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        
                                        <th colspan="2" class="text-center">Modify</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $row)
                                    <tr>
                                        <th>{{ $rRow++ }}</th>
                                        <td>{{ $row->firstName }} {{ $row->lastName }}</td>     
                                        <td>
                                            @if(empty($row->email_verified_at))
                                                <p class="btn-danger text-center">Not Verified</p>
                                            @else
                                                <p class="btn-success text-center">Verified</p>
                                            @endif
                                        </td> 
                                        <td>{{ $row->position }}</td>                                  
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->mobileNumber }}</td>                                        
                                        
                                        <td><a href="" class="btn btn-warning">Edit</a></td>
                                        <td><a href="" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>                         
            
                
        </div>
        
        <div class="card-footer">
           
        </div>

        </div>
    </div>      

    
           
            
        
</div>

@endsection

  
