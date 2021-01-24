@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper login text-centr register">            
    <div class="container">    
        <div class="row justify-content-center">
            <div class="col-md-8 login-register-container" id="container">
                <!-- login user -->
                
                <!-- <i class="fa fa-address-card-o" aria-hidden="true"></i> -->

                <h3 class="text-center">{{trans('app.registeration')}}</h3>
                <div class="col-md-5">
                <img src="v2/images/Artboard – 16.png" alt="logo" width="100%"><br>
                    <p>If you are interested for further information, please register.</p>
                </div>
                <div class="col-md-7">
                    <form method="post" action="{{ url('/admin/register') }}">
                    @csrf                       
                    
                    
                        <input type="text" class="form-control" name="fname" required autofocus autocomplete="off" placeholder="{{trans('app.first_name')}}">
                        <input type="text" class="form-control" name="lname" required autofocus autocomplete="off" placeholder="{{trans('app.last_name')}}">
                        <input type="text" class="form-control" name="company" required autofocus autocomplete="off" placeholder="{{trans('app.company')}}">
                        <input type="text" class="form-control" name="email" required autofocus autocomplete="off" placeholder="{{trans('app.email')}}">
                        <input type="password" class="form-control" name="password" required placeholder="{{trans('app.password')}}">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ trans('app.confirm_password') }}">
                        <button class="btn btn-primary outline-btn" type="submit">{{trans('app.register')}}</button>
                        <input type="hidden" name="user_type" value="CUSTOMER">
                    </form>
                </div>
            </div>
        <!-- /.row -->         
    </div>

</main>
 @endsection