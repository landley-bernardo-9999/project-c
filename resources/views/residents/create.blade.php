@extends('layouts.main')
@section('title', 'Add Resident')
@section('content')
    <div class="card" style="padding:2%">
        @include('includes.notifications')
            <form method="POST" action="/residents" enctype="multipart/form-data">
        @csrf
        <h2>Add Resident</h2>
        <hr>
        <label for=""><b>Personal Information</b></label>
        
            <div class="form-group row" >
                <label for="firstName" class=" col-form-label text-md-right" style="margin-left:3%">First Name:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="firstName" id="firstName" type="text" class="form-control" value="{{ old('firstName') }}" required>
                </div>
            
                <label for="middleName" class=" col-form-label text-md-right">Middle Name:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="middleName" id="middleName" type="text" class="form-control" value="{{ old('middleName') }}">
                </div>
            
                <label for="lastName" class="col-form-label text-md-right">Last Name:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="lastName" id="lastName" type="text" class="form-control" value="{{ old('lastName') }}" required>
                </div>
            
                <label for="birthDate" class="col-form-label text-md-right">Birthdate:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="birthDate" id="birthDate" type="date" class="form-control" value="{{ old('birthDate') }}" >
                </div>
            </div>
            
        <label for=""><b>Contact Information</b></label>
            
            <div class="form-group row" >
                <label for="emailAddress" class=" col-form-label text-md-right" style="margin-left:3%">Email Address:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="emailAddress" id="emailAddress" type="email" class="form-control" value="{{ old('emailAddress') }}" style="text-transform:uppercase">
                </div>
            
                <label for="mobileNumber" class=" col-form-label text-md-right">Mobile Number:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="mobileNumber" id="mobileNumber" type="text" class="form-control" value="{{ old('mobileNumber') }}" >
                </div>
            </div>
            
        <label for=""><b>Address Information</b></label>
            
            <div class="form-group row" >
                <label for="houseNumber" class=" col-form-label text-md-right" style="margin-left:3%">House No:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="houseNumber" id="houseNumber" type="text" class="form-control" value="{{ old('houseNumber') }}">
                </div>
            
                <label for="barangay" class=" col-form-label text-md-right">Barangay:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="barangay" id="barangay" type="text" class="form-control" value="{{ old('barangay') }}" >
                </div>
            
                <label for="municipality" class=" col-form-label text-md-right">Municipality:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="municipality" id="municipality" type="text" class="form-control" value="{{ old('municipality') }}">
                </div>
            
                <label for="province" class=" col-form-label text-md-right">Province:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="province" id="province" type="text" class="form-control" value="{{ old('province') }}" >
                </div>
            </div>
            
            <div class="form-group row" >
                <label for="zip" class=" col-form-label text-md-right" style="margin-left:3%">Zipcode:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="zip" id="zip" type="text" class="form-control" value="{{ old('zip') }}" >
                </div>
            </div>
                
            <label for=""><b>Educational Background</b></label>
            
            <div class="form-group row" >
                <label for="school" class=" col-form-label text-md-right" style="margin-left:3%">School:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="school" id="school" type="text" class="form-control" value="{{ old('school') }}" >
                </div>
            
                <label for="course" class=" col-form-label text-md-right">Course:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="course" id="course" type="text" class="form-control" value="{{ old('course') }}">
                </div>
            
                <label for="yearLevel" class=" col-form-label text-md-right">Year Level:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="yearLevel" id="yearLevel" type="number" min="1" class="form-control" value="{{ old('yearLevel') }}" >
                </div>
            </div>
            
            <label for=""><b>Guardian Information</b></label>
            
            <div class="form-group row" >
                <label for="guardian" class=" col-form-label text-md-right" style="margin-left:3%">Guardian's Name:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                     <input name="guardian" id="guardian" type="text" class="form-control" value="{{ old('guardian') }}" >
                </div>
            
                <label for="guardianPhoneNumber" class=" col-form-label text-md-right" style="margin-left:3%">Contact:<span style="color:red">&nbsp*</span></label>
                    <div class="col-md-2">
                        <input name="guardianPhoneNumber" id="guardianPhoneNumber" type="text" class="form-control" value="{{ old('guardianPhoneNumber') }}" >
                </div>
            </div>
            
            <label for=""><b>Upload Image</b></label>
            
            <div class="form-group row" >
                <label for="img" class=" col-form-label text-md-right" style="margin-left:3%">Image:<span style="color:red">&nbsp*</span></label>
                <div class="col-md-2">
                    <input name="img" id="img" type="file" class="form-control" value="{{ old('img') }}" >
                </div>
            
            </div>
            <hr>
            <button class="btn btn-primary float-right" type="submit"><i class="fas fa-check"></i>&nbspSUBMIT</button> 
            <a class="btn btn-danger" href="/residents"><i class="fas fa-times"></i>&nbspCANCEL</a>
        </div>           
    </form>
    <br><br>
</div>
@endsection
    