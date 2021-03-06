@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">
            
<div class="container" style="margin:20px auto;">
       
    <div class="row">
    <div class="col-md-12 text-center ">
                    <h1>{{trans('app.contact')}}</h1>
        </div>
            <div class="login-container" id="container" >
                <div class="panel-body row contact">
                    <div class="col-md-8">
                    <p>
                        If you have business inquiries or other questions, we would be
 pleased to assist you. Kindly give us the brief description of your
 interest through the following form. Thank you.
                        </p>
                        <form action="#" method="POST" id="contact_form">
                            @csrf                       
                                <div class="form-group">
                                    <label for="name">
                                       {{trans('app.name')}}</label>
                                    <input type="text" class="form-control" id="name" placeholder="{{trans('app.enter_name')}}" required="required" name="name" />
                                </div>

                                <div class="form-group">
                                    <label for="company">
                                        {{trans('app.company')}}</label>
                                    <input type="text" class="form-control" id="name" placeholder="{{trans('app.enter_company')}}" required="required" name="company" />
                                </div>

                                <div class="form-group">
                                    <label for="email">
                                        {{trans('app.email_address')}}</label>
                                    <div class="input-group">
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="{{trans('app.enter_email')}}" required="required"  />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">
                                        {{trans('app.inquiry_category')}}</label>
                                    <div class="input-group">
                                        </span>
                                        <select name="inquiry_category" class="form-control">
                                            <option value="0">{{trans('app.select_inquiry')}}</option>
                                            <option value="Material Processing">Material Processing</option>
                                            <option value="Textile">Textile</option>
                                            <option value="Food Processing">Food Processing</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">
                                        {{trans('app.message')}}</label>
                                    <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                        placeholder=" {{trans('app.message')}}"></textarea>
                                </div>
                            
                                <div class="form-group">
                                    <button type="submit" class="btn outline-btn" id="btnContactUs">
                                         {{trans('app.send_message')}}<span class="fa fa-send"></span>
                                    </button>
                                </div>
                            
                        </form>
                    </div>
                    <div class="col-md-4">
                        <legend>  {{trans('app.office_address')}}</legend>
                        <address>
                            <strong><span class="fa fa-map-marker"></span>  {{trans('app.address')}}</strong><br>
                           {{trans('app.npt_address')}}</address>
                        <address>
                            <strong><span class="fa fa-phone"></span> {{trans('app.phone_no')}}</strong><br>
                            +95067408455 (for current)</address>
                        <address>
                            <strong><span class="fa fa-envelope"></span> {{trans('app.email')}}</strong><br>
                            <a href="mailto:#">msmebusinessmatching@gmail.com</a>
                        </address>
                       
                    </div>
                </div>
            </div>
    </div>
      
</div>
</main>
@endsection