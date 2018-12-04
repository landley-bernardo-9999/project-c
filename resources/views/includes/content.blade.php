<div class="tab-content" id="v-pills-tabContent">

    {{-- Dashboard content. --}}

    <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab" style="padding:3%; height: 600px">
       <h1>This is the dashboard</h1>
    </div>

    {{-- Rooms' content. --}}

    <div class="tab-pane fade" id="v-pills-rooms" role="tabpanel" aria-labelledby="v-pills-rooms-tab" style="padding:3%; height: 600px">
            <a  class="btn btn-warning create-room float-left " role="button" href="#"><i class="fas fa-plus-circle"></i>&nbspADD ROOM</a>
            <form action="/search/rooms" method="GET">
                <input type="text" class="form-control float-right" style="width:200px" aria-label="Text input with dropdown button" name="s" value="{{ Request::query('s') }}" placeholder="Search rooms"> 
            </form>
            
    </div>

 
 
    {{-- Residents' content. --}}

    <div class="tab-pane fade" id="v-pills-residents" role="tabpanel" aria-labelledby="v-pills-residents-tab" style="padding:3%">
        <h1>This  is the residents</h1>
    </div>

    {{-- Owners' content. --}}

    <div class="tab-pane fade" id="v-pills-owners" role="tabpanel" aria-labelledby="v-pills-owners-tab" style="padding:3%">
        <h1>This is the owners.</h1>
    </div>

    {{-- Repairs' content. --}}

    <div class="tab-pane fade" id="v-pills-repairs" role="tabpanel" aria-labelledby="v-pills-repairs-tab" style="padding:3%">
        <h1>This is the repairs.</h1>
    </div>

    {{-- Violations' content. --}}

    <div class="tab-pane fade" id="v-pills-violations" role="tabpanel" aria-labelledby="v-pills-violations-tab" style="padding:3%">
        <h1>This is the violations.</h1>
    </div>

    {{-- Supplies' content. --}}

    <div class="tab-pane fade" id="v-pills-supplies" role="tabpanel" aria-labelledby="v-pills-supplies-tab" style="padding:3%">
        <h1>This is the supplies.</h1>
    </div>
</div>

