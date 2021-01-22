@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper login text-center">            
    <div class="container">    
        <div class="row">
            <div class="login-container" id="container">
                <!-- login user -->
                <div class="form-container sign-in-container">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>

                    <form method="POST" action="{{ url('admin/login') }}">
                        @csrf                        
                        <h3>{{trans('app.sign_in')}}</h3>                        
                        <input type="text" class="form-control" name="email" value="" required autofocus autocomplete="off" placeholder="{{trans('app.email')}}">
                        <input type="password" class="form-control" name="password" required placeholder="{{trans('app.password')}} ">
                        <a href="https://msmewebportal.gov.mm/admin/password/reset">{{trans('app.forgot_your_password')}}</a>
                        <button type="submit">{{trans('app.login')}}</button>
                        <a href="{{ url('register') }}">{{trans('app.registration')}}</a>
                    </form>
                </div>
            </div>
        <!-- /.row -->         
    </div>
</main>
@endsection