@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')

<div class="auth-wrapper auth-v2">
  <div class="auth-inner row m-0">
      <!-- Brand logo-->
      <a class="brand-logo" href="{{ url('/') }}" style="margin-left: 10% !important; margin-top: 2% !important">
        <img src="{{ asset('images/icons/mega (2).png') }}" alt="" style="max-height: 50px">
        <h2 class="brand-text text-warning ml-1 mt-50"><i>Dashboard Back office </i>Point System</h2>
      </a>
      <!-- /Brand logo-->
      <!-- Left Text-->
      <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
          <img class="img-fluid" src="{{asset('images/pages/login-svg.svg')}}" alt="Login V2" style="max-height: 500px"/>
          {{-- <img class="img-fluid" src="{{asset('images/pages/login-v2.svg')}}" alt="Login V2" /> --}}
        </div>
      </div>
      <!-- /Left Text-->
      <!-- Login-->
      <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-3">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
          <h2 class="card-title font-weight-bold mb-1">Welcome to Dashboard! &#x1F44B;</h2>
          <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
          <form class="auth-login-form mt-2" method="POST" action="{{ route('login') }}">
            @csrf
              <div class="form-group">
                <label for="login-email" class="form-label">Email/Username</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" placeholder="email / username" aria-describedby="login-email" tabindex="1" autofocus value="{{ old('email') }}" />
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
    
              <div class="form-group">
                <div class="d-flex justify-content-between">
                  <label for="login-password">Password</label>
                  {{-- @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}">
                    <small>Forgot Password?</small>
                  </a>
                  @endif --}}
                </div>
                <div class="input-group input-group-merge form-password-toggle">
                  <input type="password" class="form-control form-control-merge" id="login-password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                  <div class="input-group-append">
                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                  </div>
                </div>
              </div>

              <button class="btn btn-warning btn-block" tabindex="4">Sign in</button>
          </form>

          {{-- <p class="text-center mt-2">
            <span>New on our platform?</span>
            <a href="{{url('auth/register-v2')}}"><span>&nbsp;Create an account</span></a>
          </p> --}}
          {{-- <p class="text-center mt-2">
            <span>New on our platform?</span>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">
              <span class="text-warning">Create an account</span>
            </a>
            @endif
          </p> --}}

      </div>
    </div>
    <!-- /Login-->
  </div>
</div>
@endsection

@push('vendor-script')
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endpush

@push('page-script')
<script src="{{asset(mix('js/scripts/pages/page-auth-login.js'))}}"></script>
@endpush
