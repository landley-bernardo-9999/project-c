@extends('layouts.main')
@section('title', 'Repairs')
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
            <a class="nav-link active" id="v-pills-repairs-tab" href="/repairs" role="tab" aria-controls="v-pills-repairs" aria-selected="false"><i class="fas fa-hammer"></i>&nbsp&nbsp&nbspRepairs</a>
            <a class="nav-link" id="v-pills-violations-tab" href="/violations" role="tab" aria-controls="v-pills-violations" aria-selected="false"><i class="fas fa-user-times"></i>&nbsp&nbsp&nbspViolations</a>
            <a class="nav-link" id="v-pills-supplies-tab" href="/supplies" role="tab" aria-controls="v-pills-supplies" aria-selected="false"><i class="fas fa-clipboard-list"></i>&nbsp&nbsp&nbspSupplies</a>
            <a class="nav-link" id="v-pills-personnels-tab" href="/personnels" role="tab" aria-controls="v-pills-personnels" aria-selected="false"><i class="fas fa-user-lock"></i>&nbsp&nbsp&nbspPersonnels</a>
        </div>
    </div>

    <div class="col-md-10">
        @include('includes.notifications')
        <div class="card">
               {{-- Search button for finding residents. --}}
            <div class="card-header">
                <h3 class="float-left">Repairs</h3>
                <form action="/search/repairs" method="GET">
                    <input type="text" class="form-control float-right" style="width:200px" aria-label="Text input with dropdown button" name="s" value="{{ Request::query('s') }}" placeholder="Search rooms">
                </form>
            </div>
            
            <div class="card-body" style="padding:3%;" >
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Reported</th>
                                <th>Room No</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rowNo = 1; ?>
                            @foreach ($repairs as $repair)
                            <tr>
                                <th>{{ $rowNo++}}.</th>
                                <td>{{ $repair->dateReported }}</td>
                                <td>{{ $repair->roomNo}}</td>
                                <td>
                                    @if($repair->repairStatus == 'pending')
                                    <p style="width:100px" class="btn-warning text-center">{{ $repair->repairStatus }}</p>
                                    @elseif($repair->repairStatus == 'onGoing')
                                    <p style="width:100px" class="btn-success text-center">{{ $repair->repairStatus }}</p>
                                    @elseif($repair->repairStatus == 'closed')
                                    <p style="width:100px" class="btn-danger text-center">{{ $repair->repairStatus }}</p>
                                    @endif
                                </td>
                                <td><a href="repairs/{{ $repair->repairId }}">SHOW</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $repairs->links() }}
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="/repairs/create">ADD REPAIR</a>
            </div>
        </div>
    </div>
</div>
<br>
@endsection


