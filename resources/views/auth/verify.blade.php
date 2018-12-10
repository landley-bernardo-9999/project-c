@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Verify Your Email Address') }}</div> --}}
                <div class="card-header">{{ __('Account verification.') }}</div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Another request has been sent.') }}
                            {{-- {{ __('A fresh verification link has been sent to your email address.') }} --}}
                        </div>
                    @endif
                    {{ __('Our system will review your information in a moment.') }}
                    {{ __('Please reload this page within 60 seconds.  If you still do not have access') }}, <a href="{{ route('verification.resend') }}">{{ __('please click this link') }}</a> or contact your IT department.
                    {{-- {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>. --}}
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="text-center" style="background-color:white"> 
    <img src="/storage/img/others/copper-loader.gif" alt="loading-image" style="height: 250px">
</div>
<div class="container-fluid text-center">
    <!-- Footer -->
    <footer class="page-footer font-small blue">   
        <!-- Copyright -->
        <hr>
        <div class="footer-copyright text-center py-3">Copyright © 2018 
          <p>Visit Vester Corporation's blog at <a href="http://www.marthaservices.com">here</a></p>
        </div>
        <!-- Copyright -->
      
      </footer>
      <!-- Footer -->
</div>
@endsection
