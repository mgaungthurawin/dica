@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper login text-centr register">            
    <div class="container">    
        <div class="row justify-content-center">
            <div class="col-md-8 login-register-container" id="container">
                <!-- login user -->
                <!-- <i class="fa fa-address-card-o" aria-hidden="true"></i> -->
                <h3 class="text-center">{{ __('Reset Password') }}</h3>
                <div class="col-md-5">
                <img src="{{ asset('v2/images/Artboard – 15.png') }}" alt="logo" width="100%">
                </div>
                <div class="col-md-7">
                    <form method="POST" action="{{ route('password.update') }}">
                    @csrf   
                        <input type="hidden" name="token" value="{{ $token }}">                      
                        <input id="email" type="email" placeholder="Email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"     name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <button class="btn btn-primary outline-btn" type="submit">{{ __('Reset Password') }}</button>
                    </form>
                </div>
            </div>
        <!-- /.row -->         
    </div>
</main>
@endsection