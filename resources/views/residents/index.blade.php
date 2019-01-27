@extends('layouts.main')
@section('title', 'Residents')
@section('content')
<div class="row">

{{-- Vertical Navigation bar --}}

    <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @can('isAdmin')
            <a class="nav-link" id="v-pills-personnels-tab" href="/users" role="tab" aria-controls="v-pills-personnels" aria-selected="false"><i class="fas fa-user"></i>&nbsp&nbsp&nbspUsers</a>
            @endcan
            <a class="nav-link" id="v-pills-dashboard-tab" href="/dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class="fas fa-chart-line"></i>&nbsp&nbsp&nbspDashboard</a>
            <a class="nav-link" id="v-pills-rooms-tab" href="/rooms" role="tab" aria-controls="v-pills-rooms" aria-selected="false"><i class="fas fa-home"></i>&nbsp&nbsp&nbspRooms</a>
            <a class="nav-link active" id="v-pills-residents-tab"  href="/residents" role="tab" aria-controls="v-pills-residents" aria-selected="false"><i class="fas fa-users"></i>&nbsp&nbsp&nbspResidents</a>
            <a class="nav-link" id="v-pills-owners-tab" href="/owners" role="tab" aria-controls="v-pills-owners" aria-selected="false"><i class="fas fa-user-tie"></i>&nbsp&nbsp&nbspOwners</a>
            <a class="nav-link" id="v-pills-repairs-tab" href="/repairs" role="tab" aria-controls="v-pills-repairs" aria-selected="false"><i class="fas fa-hammer"></i>&nbsp&nbsp&nbspRepairs</a>
            <a class="nav-link" id="v-pills-violations-tab" href="/violations" role="tab" aria-controls="v-pills-violations" aria-selected="false"><i class="fas fa-user-times"></i>&nbsp&nbsp&nbspViolations</a>
            <a class="nav-link" id="v-pills-supplies-tab" href="/supplies" role="tab" aria-controls="v-pills-supplies" aria-selected="false"><i class="fas fa-clipboard-list"></i>&nbsp&nbsp&nbspSupplies</a>
            <a class="nav-link" id="v-pills-personnels-tab" href="/personnels" role="tab" aria-controls="v-pills-personnels" aria-selected="false"><i class="fas fa-user-lock"></i>&nbsp&nbsp&nbspPersonnels</a>
        </div> 
    </div>

{{-- Content of the resident section. --}}

    <div class="col-md-10">
        @include('includes.notifications')
        <div class="card">
            
               {{-- Search button for finding residents. --}}
            <div class="card-header">
                <h1>Residents</h1>        
            </div>

            <div class="card-body" >
                <div class="row">
                <div class="col-md-5">
                    <form class="float-left" action="/search/residents" method="GET">
                        <input type="text" class="form-control float-right" style="width:200px" aria-label="Text input with dropdown button" name="s" value="{{ Request::query('s') }}" placeholder="Search residents">
                    </form>    
                    &nbsp&nbsp<a class="btn btn-danger" href="{{ route('residents.index') }}">Clear search</a>
                <br><br>
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>      
                                                          
                        </tr>
                    </thead>
                    <tbody>
                    <?php $rowNo = 1; ?>
                    @foreach ($resident as $row)
                        <tr>
                            <th>{{ $rowNo++ }}</th>
                            <td><a href="/residents/{{$row->id}}">{{ $row->firstName }} {{ $row->lastName }}</a></td>     
                              
                        </tr>
                    @endforeach
                    </tbody>
                </table>  
                </div>
                <div class="col-md-3">
                    <a href="{{ route('residents.create') }}" class="btn btn-primary">CREATE NEW RESIDENT</a>
                </div> 
                
                 <div class="col-md-3">
                    <a href="{{ route('residents.create') }}" class="btn btn-primary">ADD ROOM TO EXISTING RESIDENT</a>
                </div> 
            </div>
        </div>      
    </div>
@endsection



