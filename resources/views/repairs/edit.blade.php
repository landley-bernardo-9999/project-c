@extends('layouts.main')
@section('title', 'Add Repairs')
@section('content')
    <div class="card" style="padding:2%; padding-left:3%;">
        @include('includes.notifications')
        <form method="POST" action="/repairs/{{ $repairs->id }}">
        @method('PATCH')
        @csrf
        <h2>Customer Concern Form</h2>
        <hr>
        <div class="form-group row" >
            <label for="dateReported" class=" col-form-label text-md-right">Date Reported:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="dateReported" id="dateReported" type="date" class="form-control" value="{{ $repairs->dateReported }}" required>
            </div>    
        </div>
        <hr>
        <div class="form-group row">
            <label for="name" class=" col-form-label text-md-right">Unit Owner/Resident:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="name" id="name" type="text" class="form-control" value="{{ $repairs->name }}">
            </div>

            <label for="room_id" class=" col-form-label text-md-right">Unit No:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <select name="room_id" id="room_id" class="form-control" required>
                    <option value="{{ $repairs->room_id }}" selected>{{ $repairs->room_id }}</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->building }} {{ $room->roomNo }}</option>
                    @endforeach
                </select>
            </div>

            <label for="availableDate" class=" col-form-label text-md-right" >Date Available:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="availableDate" id="availableDate" type="date" class="form-control" value="{{ $repairs->availableDate }}">
            </div> 

             <label for="availableTime" class=" col-form-label text-md-right" >Time Available:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="availableTime" id="availableTime" type="time" class="form-control" value="{{ $repairs->availableTime }}">
            </div> 

        </div>
        <hr>
         <div class="form-group row">
            <label for="contactNumber" class=" col-form-label text-md-right" >Contact Number:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="contactNumber" id="contactNumber" type="text" maxlength="11" class="form-control" value="{{ $repairs->contactNumber }}">
            </div> 
        </div>
        <hr>

        <div class="form-group row">
            <label for="concernContent" class=" col-form-label text-md-right" >Concerns/ or Request:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-12">
                <textarea name="concernContent" id="concernContent" cols="500" rows="10" class="form-control">
                    {{ $repairs->concernContent }}
                </textarea>
            </div> 
        </div>
        <hr>
         <div class="form-group row">
             <label for="desc" class=" col-form-label text-md-right">Description:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <select name="desc" id="desc" class="form-control">
                        <option value="{{ $repairs->desc }}" selected>{{ $repairs->desc }}</option>
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
                    <select name="endorsedTo" id="endorsedTo" class="form-control">
                        <option value="{{ $repairs->endorsedTo }}">{{ $repairs->endorsedTo }}</option>
                        @foreach ($personnels as $personnel)
                        <option value="{{ $personnel->id }}">{{ $personnel->firstName }} {{ $personnel->lastName }}</option>
                        @endforeach
                    </select>  
                </div>

                <label for="status" class="col-form-label text-md-right">Status:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <select name="status" id="status" class="form-control">
                        <option value="{{ $repairs->status }}" selected>{{ $repairs->status }}</option>
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
                    <input name="dateFinished" id="dateFinished" type="date" class="form-control" value="{{ $repairs->dateStarted }}" >
                </div>
            <label for="dateFinished" class="col-form-label text-md-right">To:</span></label>
                <div class="col-md-2">
                    <input name="dateFinished" id="dateFinished" type="date" class="form-control" value="{{ $repairs->dateFinished }}" >
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
                        <option value="" selected>{{ $repairs->rating }}</option>
                        <option value="lessSatisfactory">Very Poor</option>
                        <option value="somewhatSatisfactory">Somewhat unsatisfactory</option>
                        <option value="satisfactory">Average</option>
                        <option value="aboveSatisfactory">Very Satisfactory</option>
                        <option value="superior">Superior</option>
                    </select>
                </div> 
        </div>


        <hr>  
           
        <div class="form-group">
        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-check"></i>&nbspUPDATE</button>
        <a class="btn btn-danger float-left" href="/repairs/{{ $repairs->id }}"><i class="fas fa-times"></i>&nbspCANCEL</a> 
            </div>     
    </div>
 </form>
<br>
@endsection
    