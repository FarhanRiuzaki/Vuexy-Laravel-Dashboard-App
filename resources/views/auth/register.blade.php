{{-- @php
$configData = Helper::applClasses();
@endphp --}}
@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
  <style>
    .page-register{
        height: 100%;
        display: block; 
    }
    .content-register{
        padding:0;
        overflow: scroll; overflow-x:hidden;
        height:100%
        /*-webkit-overflow-scrolling: touch;*/    
    }
    /* Hide scrollbar for Chrome, Safari and Opera */
    .content-register::-webkit-scrollbar {
      display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .content-register {
      -ms-overflow-style: none;  /* IE and Edge */
      scrollbar-width: none;  /* Firefox */
    }
  </style>
@endsection

@section('content')
<div class="auth-wrapper auth-v2">
  <div class="auth-inner row m-0">
    <!-- Brand logo-->
    <a class="brand-logo" href="{{ url('/') }}">
      <img src="{{ asset('landingPage/img/logo-light.png') }}" alt="" style="max-height: 50px">
      <h2 class="brand-text text-warning ml-1 mt-50"><i>Dashboard </i>MSMILE</h2>
    </a>
    <!-- /Brand logo-->
    <!-- Left Text-->
    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
      <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
        <img class="img-fluid" src="{{asset('images/pages/Data report-pana.svg')}}" alt="Login V2" />
        {{-- <img class="img-fluid" src="{{asset('images/pages/login-v2.svg')}}" alt="Login V2" /> --}}
      </div>
    </div>
    <!-- /Left Text-->
      <!-- Register-->
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-3 page-register">
      <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto content-register">
        <h2 class="card-title font-weight-bold mb-1">Register</h2>
        
        <form class="auth-register-form mt-2" method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group">
            <label for="register-username" class="form-label">Full Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="register-username" name="name" placeholder="full name" aria-describedby="register-username" tabindex="1" autofocus value="{{ old('name') }}" />
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="register-username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="register-username" name="username" placeholder="username" aria-describedby="register-username" tabindex="1" autofocus value="{{ old('username') }}" />
            @error('username')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="register-email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="register-email" name="email" placeholder="email" aria-describedby="register-email" tabindex="2" value="{{ old('email') }}" />
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="register-password" class="form-label">Password</label>
            <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
              <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" id="register-password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="register-password" tabindex="3" />
              <div class="input-group-append">
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="register-password-confirm" class="form-label">Confirm Password</label>

            <div class="input-group input-group-merge form-password-toggle">
              <input type="password" class="form-control form-control-merge" id="register-password-confirm" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="register-password" tabindex="3" />
              <div class="input-group-append">
                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
              </div>
            </div>
          </div>
          {{-- <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" id="register-privacy-policy" type="checkbox" tabindex="4" />
              <label class="custom-control-label" for="register-privacy-policy">I agree to<a href="javascript:void(0);">&nbsp;privacy policy & terms</a></label>
            </div>
          </div> --}}
          <button class="btn btn-warning btn-block" tabindex="5">Sign up</button>
        </form>
        <p class="text-center mt-2">
          <span>Already have an account?</span>
          @if (Route::has('login'))
          <a href="{{ route('login') }}">
            <span class="text-warning">Sign in instead</span>
          </a>
          @endif
        </p>
      </div>
    </div>
  <!-- /Register-->
  </div>
</div>
@endsection

@push('vendor-script')
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endpush

@push('page-script')
<script src="{{asset('js/scripts/pages/page-auth-register.js')}}"></script>
@endpush
