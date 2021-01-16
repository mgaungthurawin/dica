@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">            
    <div class="container">    
        <div class="row">
            <div class="login-container" id="container">
                <!-- login user -->
                <div class="form-container sign-in-container">

                    <form method="post" action="{{ url('/admin/register') }}">
                        @csrf                       
                        <h3>{{trans('app.registeration')}}</h3>
                        <input type="text" class="form-control" name="fname" required autofocus autocomplete="off" placeholder="{{trans('app.first_name')}}">
                        <input type="text" class="form-control" name="lname" required autofocus autocomplete="off" placeholder="{{trans('app.last_name')}}">
                        <input type="text" class="form-control" name="company" required autofocus autocomplete="off" placeholder="{{trans('app.company')}}">
                        <input type="text" class="form-control" name="email" required autofocus autocomplete="off" placeholder="{{trans('app.email')}}">
                        <input type="password" class="form-control" name="password" required placeholder="{{trans('app.password')}}">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ trans('app.confirm_password') }}">
                        <button type="submit">{{trans('app.register')}}</button>
                        <input type="hidden" name="user_type" value="CUSTOMER">
                    </form>
                </div>
            </div>
        <!-- /.row -->         
    </div>

</main>
 @endsection