<!-- *** START FOOTER *** -->
<footer>
    <div class="container">
        <div class="row">
            <!-- START FOOTER BOX (About) -->
            <div class="col-sm-12 col-xs-12 footer-box">
               
                <div class="about-inner text-center ">
                    <h2 class="wiget-title">{{trans('app.contact_info')}}</h2>
                    <ul class="justify-content-center row">
                        <!-- <li class="col-sm-3 col-xs-6"><i class="fa fa-address-card"></i> <br> {{trans('app.name_of_officer')}} </li> -->
                        <li class="col-sm-3 col-xs-6"><i class="fa fa-envelope"></i> <br> msmebusinessmatching@gmail.com</a></li>
                        <li class="col-sm-3 col-xs-6"><i class="fa fa-phone"></i><br>  +95067408455</a></li>
                        <li class="col-sm-3 col-xs-6"><i class="fa fa-map-marker"></i><br>  {{trans('app.npt_address')}}</a></li>
                    </ul>
                </div>
            </div>
            <!--  END OF /. FOOTER BOX (About) -->   
            @if(empty(Auth::user()))
            <div id="alert" class="modal fade">    
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">LOGIN TO VIEW COMPANY LIST</h5>
                        </div>
                        <div class="modal-body">
                            <center>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500</p><br>
                                <a href="{{ url('login') }}" class="btn btn-primary">REGISTER HERE</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div> 
            @endif        
            
            <div class="col-sm-12 footer-text">
                <p>{{trans('app.ministry_of_planning')}}<p>
                <p>{{trans('app.website')}}<img src="{{ asset('v2/images/jica-logo.jpg') }}"></p>
            </div>
            
            
        </div>
    </div>
</footer>
<!-- *** END OF /. FOOTER *** -->
<!-- *** START SUB FOOTER *** -->
<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="copy">© Copyright 2020 Ministry of Planning, Finance and Industry in Myanmar All rights reserved.</div>
            </div>
        </div>
    </div>
</div>
<!-- *** END OF /. SUB FOOTER *** -->


@include('frontend.layouts.javascript')
