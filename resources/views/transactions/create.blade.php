@extends('layouts.main')
@section('title', 'Add Contract')
@section('content')
    <div class="card" style="padding:2%">
            @include('includes.notifications')
            <form method="POST" action="/transactions">
        @csrf
        <h2>Add Contract</h2>
        <hr>

        <div class="form-group row" >
                <label for="transDate" class=" col-form-label text-md-right" style="margin-left:3%">Transaction Date:<span style="color:red">&nbsp*</span></label>
                    <div class="col-md-2">
                    <input name="transDate" id="transDate" type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div> 
                
                <label for="moveInDate" class=" col-form-label text-md-right" style="margin-left:3%">Move-in Date:<span style="color:red">&nbsp*</span></label>
                    <div class="col-md-2">
                    <input name="moveInDate" id="moveInDate" type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
                
                <label for="moveOutDate" class=" col-form-label text-md-right" style="margin-left:3%">Move-out Date:<span style="color:red">&nbsp*</span></label>
                    <div class="col-md-2">
                    <input name="moveOutDate" id="moveOutDate" type="date" class="form-control" value="{{ old('moveOutDate') }}" required>
                </div>  
            </div>

             <div class="form-group row" >
                <label for="resident_id" class=" col-form-label text-md-right" style="margin-left:3%">Resident:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <select name="resident_id" id="resident_id" class="form-control" required>
                        <option value="">Select Resident</option>
                        @foreach ($residents as $resident)
                            <option value="{{ $resident->id }}">{{ $resident->firstName }} {{ $resident->lastName }}</option>
                        @endforeach
                    </select>            
                 </div> 
                    
               <label for="room_id" class=" col-form-label text-md-right" style="margin-left:3%">Room No:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <select name="room_id" id="room_id" class="form-control" required>
                        <option value="">Select Room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->roomNo }}</option>
                        @endforeach
                    </select>            
                 </div> 

                 <input type="text" style="visibility:hidden" id="transStatus" name="transStatus" value="active">
                   
            </div>

            <div class="form-group row" >
                <label for="term" class=" col-form-label text-md-right" style="margin-left:3%">Term:<span style="color:red">&nbsp*</span></label>
                    <div class="col-md-2">
                    <select name="term" id="term" class="form-control" required>
                        <option value="" selected>Select Term</option>
                        <option value="longTerm">Long Term</option>
                        <option value="shortTerm">Short Term</option>
                        <option value="transient">Transient</option>
                    </select>
                </div> 
                    
                <label for="initialSecDep" class=" col-form-label text-md-right" style="margin-left:3%">Security Deposit:<span style="color:red">&nbsp*</span></label>
                    <div class="col-md-2">
                    <input name="initialSecDep" id="initialSecDep" type="number" class="form-control" value="{{ old('initialSecDep') }}" required>
                </div>
                   
            </div>
            <hr>
            <button class="btn btn-primary float-right" type="submit"><i class="fas fa-check"></i>&nbspMOVE IN</button> 
            <a class="btn btn-danger" href="/residents"><i class="fas fa-times"></i>&nbspCANCEL</a>
        
    </div>

        </div>           
    </form>
    <br><br>
</div>
@endsection
    