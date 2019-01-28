@extends('layouts.main')
@section('title', 'Add Repairs')
@section('content')
    <div class="card" style="padding:2%; padding-left:3%;">
        @include('includes.notifications')
        <h2>Customer Concern Form</h2>
        <hr>
        <div class="form-group row" >
            <label for="dateReported" class=" col-form-label text-md-right">Date Reported:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="dateReported" id="dateReported" type="date" class="form-control" value="{{ $repairs->dateReported }}" readonly>
            </div>    
        </div>
        <hr>
        <div class="form-group row">
            <label for="name" class=" col-form-label text-md-right">Unit Owner/Resident:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="name" id="name" type="text" class="form-control" value="{{ $repairs->name }}" readonly>
            </div>

            <label for="room_id" class=" col-form-label text-md-right">Unit No:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <select name="room_id" id="room_id" class="form-control" readonly>
                    <option value="" selected>{{ $repairs->room_id }}</option>
                </select>
            </div>

            <label for="availableDate" class=" col-form-label text-md-right" >Date Available:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="availableDate" id="availableDate" type="date" class="form-control" value="{{ $repairs->availableDate }}" readonly>
            </div> 

             <label for="availableTime" class=" col-form-label text-md-right" >Time Available:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="availableTime" id="availableTime" type="time" class="form-control" value="{{ $repairs->availableTime }}" readonly>
            </div> 

        </div>
        <hr>
         <div class="form-group row">
            <label for="contactNumber" class=" col-form-label text-md-right" >Contact Number:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-2">
                <input name="contactNumber" id="contactNumber" type="text" maxlength="11" class="form-control" value="{{ $repairs->contactNumber }}" readonly>
            </div> 
        </div>
        <hr>

        <div class="form-group row">
            <label for="concernContent" class=" col-form-label text-md-right" >Concerns/ or Request:<span style="color:red">&nbsp*</span></label>
            <div class="col-md-12">
                <textarea name="concernContent" id="concernContent" cols="500" rows="10" class="form-control" readonly>
                    {{ $repairs->concernContent }}
                </textarea>
            </div> 
        </div>
        <hr>
         <div class="form-group row">
             <label for="desc" class=" col-form-label text-md-right">Description:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <select name="desc" id="desc" class="form-control" readonly>
                        <option value="" selected>{{ $repairs->desc }}</option>
                    </select>
                </div>     

              <label for="endorsedTo" class=" col-form-label text-md-right">Endorsed To:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <select name="endorsedTo" id="endorsedTo" class="form-control" readonly>
                        <option value="">{{ $repairs->endorsedTo }}</option>
                    </select>  
                </div>

                <label for="status" class="col-form-label text-md-right">Status:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <select name="status" id="status" class="form-control" readonly>
                        <option value="" selected>{{ $repairs->status }}</option>
                    </select>
                </div>
        </div>
        <hr>
          <div class="form-group row" >
             <label for="dateFinished" class="col-form-label text-md-right">Duration &nbspFrom:</span></label>
                <div class="col-md-2">
                    <input name="dateFinished" id="dateFinished" type="date" class="form-control" value="{{ $repairs->dateStarted }}" readonly>
                </div>
            <label for="dateFinished" class="col-form-label text-md-right">To:</span></label>
                <div class="col-md-2">
                    <input name="dateFinished" id="dateFinished" type="date" class="form-control" value="{{ $repairs->dateFinished }}" readonly>
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
                    <select name="rating" id="rating" class="form-control" readonly>
                        <option value="" selected>{{ $repairs->rating }}</option>
                    </select>
                </div> 
        </div>
        <hr>  
        <div class="form-group">
        <a class="btn btn-primary float-right" href="/repairs/{{ $repairs->id}}/edit"><i class="fas fa-edit"></i>&nbspEDIT</a>
        <a class="btn btn-danger float-left" href="/repairs"><i class="fas fa-backward"></i>&nbspREPAIRS</a> 
            </div>     
    </div>
 
   
<br>
@endsection
    