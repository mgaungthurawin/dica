@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper login text-centr register">            
    <div class="container">    
        <div class="row justify-content-center">
            <div class="col-md-8 login-register-container" id="container">
                <!-- login user -->
                <!-- <i class="fa fa-address-card-o" aria-hidden="true"></i> -->
                <h3 class="text-center">{{trans('app.sign_in')}}</h3>
                <div class="col-md-5">
                <img src="v2/images/Artboard – 15.png" alt="logo" width="100%"><br>
                <p>{{trans('app.register-title')}}<a href="{{ url('register') }}">{{trans('app.registration')}}</a></p>
                </div>
                <div class="col-md-7">
                    <form method="POST" action="{{ url('admin/login') }}">
                        @csrf                          
                        <input type="text" class="form-control" name="email" value="" required autofocus autocomplete="off" placeholder="{{trans('app.email')}}">
                        <input type="password" class="form-control" name="password" required placeholder="{{trans('app.password')}} ">
                        <p><a href="{{ url('admin/password/reset') }}">{{trans('app.forgot_your_password')}}</a></p>
                        <button class="btn btn-primary outline-btn" type="submit">{{trans('app.login')}}</button>
                    </form>
                </div>
            </div>
        <!-- /.row -->         
    </div>

</main>
<!-- <main class="page_main_wrapper login text-center">            
    <div class="container">    
        <div class="row">
            <div class="login-container" id="container">
                
                <div class="form-container sign-in-container">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>

                    <form method="POST" action="{{ url('admin/login') }}">
                        @csrf                        
                        <h3>{{trans('app.sign_in')}}</h3>                        
                        <input type="text" class="form-control" name="email" value="" required autofocus autocomplete="off" placeholder="{{trans('app.email')}}">
                        <input type="password" class="form-control" name="password" required placeholder="{{trans('app.password')}} ">
                        <a href="https://msmewebportal.gov.mm/admin/password/reset">{{trans('app.forgot_your_password')}}</a>
                        <button class="btn btn-primary outline-btn" type="submit">{{trans('app.login')}}</button>
                        <a href="{{ url('register') }}">{{trans('app.registration')}}</a>
                    </form>
                </div>
            </div>
    </div>
</main> -->
@endsection