@extends('layouts.main')
@section('title', 'Vester')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Input for the user's first name. --}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">First Name:</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required autofocus>

                                @if ($errors->has('firstName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         {{-- Input for the user's last name. --}}

                         <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Last Name:</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>

                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Input for the user's email address. --}}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email Address:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="example@marthaservices.com" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         {{-- Input for the user's mobile number. --}}

                         <div class="form-group row">
                            <label for="mobileNumber" class="col-md-4 col-form-label text-md-right">Mobiel Number:</label>

                            <div class="col-md-6">
                                <input id="mobileNumber" type="text" class="form-control{{ $errors->has('mobileNumber') ? ' is-invalid' : '' }}" name="mobileNumber" value="{{ old('mobileNumber') }}" required autofocus>

                                @if ($errors->has('mobileNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobileNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         {{-- Input for the user's position. --}}

                         <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">Position:</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" id="position" required autofocus>
                                    <option value="" selected>Select your position</option>
                                    <option value="leasingOfficer" {{ old('position') == 'leasingOfficer' ? 'selected' : ''}} >Leasing Officer</option>
                                    <option value="leasingManager" {{ old('position') == 'leasingManager' ? 'selected' : ''}}>Leasing Manager</option>
                                    <option value="maintenance" {{ old('postion') == 'maintenance' ? 'selected': ''}}>Maintenance</option> 
                                </select>

                                @if ($errors->has('position'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Input for the user's password. --}}

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Input for the user to confirm the password. --}}
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row" style="visibility: hidden">
                            <label for="img" class="col-md-4 col-form-label text-md-right">Select your image:</label>
                            
                            <div class="col-md-6">
                                <input id="img" type="file" class="form-control{{ $errors->has('img') ? ' is-invalid' : '' }}" name="img" >
    
                                @if ($errors->has('img'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                   @endif
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
