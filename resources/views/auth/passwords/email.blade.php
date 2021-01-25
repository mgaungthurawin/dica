@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper login text-centr register">            
    <div class="container">    
        <div class="row justify-content-center">
            <div class="col-md-8 login-register-container" id="container">

                <h3 class="text-center">{{ __('Reset Password') }}</h3>
                <div class="col-md-5">
                <img src="{{ asset('v2/images/Artboard – 15.png') }}" alt="logo" width="100%"><br>
                </div>
                <div class="col-md-7">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf                          
                        <input id="email" type="email" placeholder="Email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        <button class="btn btn-primary outline-btn" type="submit">{{ __('Send Password Reset Link') }}</button>
                    </form>
                </div>
            </div>
        <!-- /.row -->         
    </div>
</main>
@endsection