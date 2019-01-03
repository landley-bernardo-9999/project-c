@extends('layouts.main')
@include('includes.notifications')
@section('title', 'Dashboard')
@section('content')
<div class="row">

    {{-- Vertical Navigation bar --}}

    <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-dashboard-tab" href="/dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class="fas fa-chart-line"></i>&nbsp&nbsp&nbspDashboard</a>
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
        <div class="card">
            <div class="container-fluid" style="padding:3%;">

                <div class="row">
                    <div class="col-md-4 text-center" >
                        <div class="card ">
                            <div class="card-header">
                                <h4><b>Rooms</b></h4>
                            </div>
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <h1 style="font-size: 60px">{{$room}}</h1>
                                        <i class="fas fa-home fa-4x float-left"></i>
                                    </div>
                                            
                                        <div class="col-md-6 float-right">
                                            <p>Vacant  = <b style="font-size: 20px">{{ $vacantRooms }}</b></p>
                                            <p>Occupied  = <b style="font-size: 20px">{{ $occupiedRooms }}</b></p>
                                            <p>Reserved  = <b style="font-size: 20px">{{ $reservedRooms }}</b></p>
                                        </div>
                                    </div>   
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center" >
                            <div class="card ">
                                <div class="card-header">
                                    <h4><b>Residents</b></h4>
                                </div>
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <h1 style="font-size: 60px">{{$resident}}</h1>
                                            <i class="fas fa-users fa-4x"></i>
                                        </div>
                                                
                                            <div class="col-md-6 float-right">
                                                <p>Harvard  = <b style="font-size: 20px">{{ $harvardResident }}</b></p>
                                                <p>Princeton  = <b style="font-size: 20px">{{ $princetonResident }}</b></p>
                                                <p>Wharton  = <b style="font-size: 20px">{{ $whartonResident }}</b></p>
                                                <p>Courtyards  = <b style="font-size: 20px">{{ $courtyardsResident }}</b></p>
                                            </div>
                                        </div>   
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 text-center" >
                                <div class="card ">
                                    <div class="card-header">
                                        <h4><b>Owners</b></h4>
                                    </div>
                                    <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <h1 style="font-size: 60px">{{$owner}}</h1>
                                                <i class="fas fa-user-tie fa-4x"></i>
                                            </div>
                                                    
                                                <div class="col-md-6 float-right">
                                                    <p>Harvard  = <b style="font-size: 20px">{{ $harvardOwner }}</b></p>
                                                    <p>Princeton  = <b style="font-size: 20px">{{ $princetonOwner }}</b></p>
                                                    <p>Wharton  = <b style="font-size: 20px">{{ $whartonOwner }}</b></p>
                                                    <p>Courtyards  = <b style="font-size: 20px">{{ $courtyardsOwner }}</b></p>
                                                </div>
                                            </div>   
                                    </div>
                                </div>
                            </div>

                    
                </div>
                <br>
                <div class="row">
                        <div class="col-md-6 text-center" >
                            <div class="card ">
                                <div class="card-header">
                                    <h6><b>Moveins</b></h6>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Room No</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($movein as $row)
                                            <tr>
                                                <th>{{ $moveInRow++ }}</th>
                                                <td><a href="/residents/{{$row->residentId}}">{{ $row->firstName }} {{ $row->lastName }}</a></td>
                                                <td><a href="/rooms/{{$row->residentRoomNo}}">{{ $row->roomNo }}</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-6 text-center" >
                                <div class="card ">
                                    <div class="card-header">
                                        <h6><b>Moveouts</b></h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Room No</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($moveout as $row)
                                                <tr>
                                                    <th>{{ $moveOutRow++ }}</th>
                                                    <td><a href="/residents/{{$row->residentId}}">{{ $row->firstName }} {{ $row->lastName }}</a></td>
                                                    <td><a href="/rooms/{{$row->residentRoomNo}}">{{ $row->roomNo }}</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                                <div class="col-md-6 text-center" >
                                    <div class="card ">
                                        <div class="card-header">
                                            <h6><b>Expected Collection this Month</b></h6>
                                        </div>
                                        <div class="card-body">
                                            <h1 style="font-size: 60px">1,0000,000</h1>
                                            <i class="fas fa-coins fa-4x"></i>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-md-6 text-center" >
                                    <div class="card ">
                                        <div class="card-header">
                                            <h6><b>Collected Amount this Month</b></h6>
                                        </div>
                                        <div class="card-body">
                                            <h1 style="font-size: 60px">500,000</h1>
                                            <i class="fas fa-hand-holding-usd fa-4x"></i>  
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <br>        

                            <div class="row">
                            <div class="col-md-12 text-center" >
                                    <div class="card ">
                                        <div class="card-header">
                                            <h6><b>Delinquents</b></h6>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Room No</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($moveout as $row)
                                                    <tr>
                                                        <th>{{ $moveOutRow++ }}</th>
                                                        <td><a href="/residents/{{$row->residentId}}">{{ $row->firstName }} {{ $row->lastName }}</a></td>
                                                        <td><a href="/rooms/{{$row->residentRoomNo}}">{{ $row->roomNo }}</a></td>
                                                        <td>{{$row->mobileNumber}}</td>
                                                        <td>{{$row->emailAddress}}</td>
                                                        <td>6000</td>
                                                        
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <br><br>
                    <div class="row">
                            <div class="col-md-6 text-center" >
                                    <div class="card ">
                                            <div class="card-header">
                                                <h6><b>Pending Repairs</b></h6>
                                            </div>
                                            <div class="card-body">
                                                <h1 style="font-size: 60px">{{ $pendingRepair}}</h1>
                                                <i class="fas fa-hammer fa-4x"></i>
                                            </div>
                                        </div>
                            </div>
        
                            <div class="col-md-6 text-center" >
                                    <div class="card ">
                                            <div class="card-header">
                                                <h6><b>On-Going Repairs</b></h6>
                                            </div>
                                            <div class="card-body">
                                                <h1 style="font-size: 60px">{{ $onGoingRepair}}</h1>
                                                <i class="fas fa-hammer fa-4x"></i>
                                            </div>
                                        </div>
                            </div>
    
                    </div>
                    <br><br>

                    <div class="row">
                       <div class="col-md-12">
                           <h3>Occupancy Rate</h3>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $occupancyRate }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $occupancyRate }}%</div>
                            </div>
                       </div>

                       <br><br><br><br><br>

                       <div class="col-md-12">
                            <h3>Collection Rate</h3>
                             <div class="progress">
                                 <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                             </div>
                        </div>

                       <br><br><br><br><br>

                       <div class="col-md-12">
                            <h3>Customer Satisfaction</h3>
                             <div class="progress">
                                 <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                             </div>
                        </div>
                    </div>
                    <br><br>
                    <h1>Messaging App</h1>
                    
                            <example-component>dfsddfsdfsf</example-component> 
                   

            </div>
            
        </div>
        
    </div>    
    
</div>



@endsection

  
