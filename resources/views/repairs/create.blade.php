@extends('layouts.main')
@section('title', 'Customer Concern Form')
@section('content')
    <div class="card" style="padding:2%; padding-left:3%;">
        @include('includes.notifications')
            <form method="POST" action="/repairs">
        @csrf
        <h2>Customer Concern Form</h2>
        <hr>
        <div class="form-group row" >
            <label for="dateReported" class=" col-form-label text-md-right">Date Reported:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="dateReported" id="dateReported" type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>    
             <div class="col-md-2" style="visibility:hidden">
                <input name="status" id="status" type="text" class="form-control" value="pending" required>
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label for="name" class=" col-form-label text-md-right">Unit Owner/Resident:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="name" id="name" type="text" class="form-control" value="">
            </div>

            <label for="room_id" class=" col-form-label text-md-right">Unit No:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <select name="room_id" id="room_id" class="form-control" required>
                    <option value="" selected>Select Unit</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->building }} {{ $room->roomNo }}</option>
                    @endforeach
                </select>
            </div>

            <label for="availableDate" class=" col-form-label text-md-right" >Date Available:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="availableDate" id="availableDate" type="date" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div> 

             <label for="availableTime" class=" col-form-label text-md-right" >Time Available:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="availableTime" id="availableTime" type="time" class="form-control" value="" required>
            </div> 

        </div>
        <hr>
         <div class="form-group row">
            <label for="contactNumber" class=" col-form-label text-md-right" >Contact Number:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="contactNumber" id="contactNumber" type="text" maxlength="11" class="form-control" value="" required>
            </div> 
        </div>
        <hr>

        <div class="form-group row">
            <label for="concernContent" class=" col-form-label text-md-right" >Concerns/ or Request:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-12">
                <textarea name="concernContent" id="concernContent" cols="500" rows="10" class="form-control"></textarea>
            </div> 
        </div>
        <hr>
         <div class="form-group row">
             <label for="desc" class=" col-form-label text-md-right">Description:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <select name="desc" id="desc" class="form-control" required>
                        <option value="" selected>Select Description</option>
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
                        <option value="doorWindow">Door/Window</option>
                        <option value="general">General</option>
                    </select>
                </div>     

              <label for="endorsedTo" class=" col-form-label text-md-right">Endorsed To:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <select name="endorsedTo" id="endorsedTo" class="form-control" required>
                        <option value="">Select Personnel</option>
                        @foreach ($personnels as $personnel)
                        <option value="{{ $personnel->id }}">{{ $personnel->firstName }} {{ $personnel->lastName }}</option>
                        @endforeach
                    </select>  
                </div>

                <label for="status" class="col-form-label text-md-right">Status:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <select name="status" id="status" class="form-control" required>
                        <option value="" selected>Select Status</option>
                        <option value="pending">Pending</option>
                        <option value="onGoing">On Going</option>
                        <option value="closed">Closed</option>
                    </select>
                </div>
        </div>
        <hr>
          <div class="form-group row" >
             <label for="dateFinished" class="col-form-label text-md-right">Duration &nbspFrom:</span></label>
                <div class="col-md-2">
                    <input name="dateFinished" id="dateFinished" type="date" class="form-control" value="{{ old('dateFinished') }}" >
                </div>
            <label for="dateFinished" class="col-form-label text-md-right">To:</span></label>
                <div class="col-md-2">
                    <input name="dateFinished" id="dateFinished" type="date" class="form-control" value="{{ old('dateFinished') }}" >
                </div>
        </div>

        <hr>
        <h3 class="text-center">CUSTOMER FEEDBACK FORM</h3>
         <p>
            In thinking about your most recent experience with North Cambridge Baguio Condominium, was the quality of customer service you received:
        </p>
        <div class="form-group row" >
            <label for="rating" class=" col-form-label text-md-right" >Rating:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <select name="rating" id="rating" class="form-control">
                        <option value="" selected>Select Rating</option>
                        <option value="lessSatisfactory">Very Poor</option>
                        <option value="somewhatSatisfactory">Somewhat unsatisfactory</option>
                        <option value="satisfactory">Average</option>
                        <option value="aboveSatisfactory">Very Satisfactory</option>
                        <option value="superior">Superior</option>
                    </select>
                </div> 
        </div>

        <hr>
        <button class="btn btn-primary float-right" type="submit"><i class="fas fa-check"></i>&nbspSUBMIT</button> 
        <a class="btn btn-danger" href="/repairs"><i class="fas fa-times"></i>&nbspCANCEL</a>
    </div>          
</form>
<br>
@endsection
    