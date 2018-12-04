@extends('layouts.rooms')
@include('includes.notifications')
@section('content')
<div class="row">

    {{-- Vertical Navigation bar --}}

    <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-dashboard-tab" href="/" role="tab" aria-controls="v-pills-dashboard" aria-selected="true"><i class="fas fa-chart-line"></i>&nbsp&nbsp&nbspDashboard</a>
                <a class="nav-link active" id="v-pills-rooms-tab" href="/rooms" role="tab" aria-controls="v-pills-rooms" aria-selected="false"><i class="fas fa-home"></i>&nbsp&nbsp&nbspRooms</a>
                <a class="nav-link" id="v-pills-residents-tab"  href="/residents" role="tab" aria-controls="v-pills-residents" aria-selected="false"><i class="fas fa-users"></i>&nbsp&nbsp&nbspResidents</a>
                <a class="nav-link" id="v-pills-owners-tab" href="/owners" role="tab" aria-controls="v-pills-owners" aria-selected="false"><i class="fas fa-user-tie"></i>&nbsp&nbsp&nbspOwners</a>
                <a class="nav-link" id="v-pills-repairs-tab" href="/repairs" role="tab" aria-controls="v-pills-repairs" aria-selected="false"><i class="fas fa-hammer"></i>&nbsp&nbsp&nbspRepairs</a>
                <a class="nav-link" id="v-pills-violations-tab" href="/violations" role="tab" aria-controls="v-pills-violations" aria-selected="false"><i class="fas fa-user-times"></i>&nbsp&nbsp&nbspViolations</a>
                <a class="nav-link" id="v-pills-supplies-tab" href="/supplies" role="tab" aria-controls="v-pills-supplies" aria-selected="false"><i class="fas fa-clipboard-list"></i>&nbsp&nbsp&nbspSupplies</a>
        </div> 
    </div>

    {{-- Content of the room section. --}}

    <div class="col-md-10">
        <div class="card">
            <div class="container-fluid" style="padding:3%; height: 600px">
                <div class="row">

                    {{-- Filter features of the page. --}}

                    <div class="col-md-2">
                       <div class="card">
                           <div class="card-header">
                               Filter rooms
                           </div>
                           <div class="card-body">

                           </div>
                       </div>
                    </div>

                    {{-- List of all the rooms. --}}

                    <div class="col-md-10">
                        <a  class="btn btn-warning create-room float-left " role="button" href="#"><i class="fas fa-plus-circle"></i>&nbspADD ROOM</a>
                        <form action="/search/rooms" method="GET">
                                <input type="text" class="form-control float-right" style="width:200px" aria-label="Text input with dropdown button" name="s" value="{{ Request::query('s') }}" placeholder="Search rooms"> 
                        </form>

                        <div class="card-body" style=" margin-top:10%">
                            <table class="table">
                                @foreach($room as $row)
                                    @if($row->status == 'occupied')
                                        <a href="/rooms/{{$row->id}}" class="btn btn-outline-danger" role="button">
                                            <i class="fas fa-home fa-2x"></i>
                                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-25%">
                                                <p style="font-size: 11px">{{$row->roomNo}}</p>
                                            </div>
                                        </a>
                                    @elseif($row->status == 'vacant')
                                        <a href="/rooms/{{$row->id}}" class="btn btn-outline-success" role="button">
                                            <i class="fas fa-home fa-2x"></i>
                                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-25%">
                                                <p style="font-size: 11px">{{$row->roomNo}}</p>
                                            </div>
                                        </a>
                                    @elseif($row->status == 'reserved')
                                        <a href="/rooms/{{$row->id}}" class="btn btn-outline-info" role="button">
                                            <i class="fas fa-home fa-2x"></i>
                                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-25%">
                                                <p style="font-size: 11px">{{$row->roomNo}}</p>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
            </div>    
        </div>
        </div>
    </div>      
</div>
@endsection

  
