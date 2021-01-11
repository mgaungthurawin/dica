@include('frontend.layouts.css')
@include('frontend.layouts.fonts')
<!-- PAGE LOADER -->
<div class="se-pre-con"></div>
        
     <!-- *** START PAGE HEADER SECTION *** -->
        <header>
            <!-- START HEADER TOP SECTION -->
            <!-- END OF /. HEADER TOP SECTION -->
            <!-- START MIDDLE SECTION -->
            <div class="header">
                <div class="container">
                    <div class="col-xs-3 col-sm-3 col-md-4 hidden-xs pull-left contact-bar">
                        <a class="btn sitemap-btn" href="{{url('sitemap')}}">{{trans('app.sitemap')}}</a> | 
                        <a href="mailto:info@testing.com"><i class="fa fa-envelope"></i> info@testing.com</a> | 
                        <a href="tel:06754321"><i class="fa fa-phone"></i> 067-54321</a>
                    </div>
                    <div class="attr-nav col-md-8 hidden-xs">
                        <div class="pull-right language">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('v2/images/mm.png') }}" width="30px" height="20px">Myanmar</a>
                                <ul class="dropdown-menu animated">
                                    <li><a href="#" id="locale" value="mm"><img src="{{ asset('v2/images/mm.png') }}" width="30px" height="20px"> Myanmar</a></li>
                                    <li><a href="#" id="locale" value="en"><img src="{{ asset('v2/images/en.png') }}" width="30px" height="20px"> English</a></li> 
                                </ul>
                                 <input type="hidden" id="languageUrl" value="{{ url('changelanguage') }}">
                            </li>
                        </div>
                        
                        <div class="pull-right search-box">
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="{{trans('app.search_for')}}">
                              <!-- <span class="input-group-append">
                                <button class="btn btn-secondary" type="button">Go!</button>
                              </span> -->
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="header-mid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2  hidden-xs" >
                            <div class="logo">
                                <a href="#"><img src="{{ asset('v2/images/moi_logo.png') }}" class="img-responsive lazyload" alt=""></a>
                            </div>
                        </div>
                        
                        <div class="col-md-8 col-sm-12 text-left logo_title">
                            <a href="index.html"> <div class="hidden-md hidden-lg col-xs-12 col-sm-12"> <center><img src="{{ asset('images/moi_logo.png') }}" class="img-responsive lazyload" alt="" width="85px"></center><br> </div></a>
                            <h2 class="col-xs-12">{{trans('app.welcome_website')}}</h2>
                            <br><br>
                            <h3 class="col-xs-12">{{trans('app.linking_the_fdi')}}</h3>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF /. MIDDLE SECTION -->
            <!-- START NAVIGATION -->
            <nav class="navbar navbar-default navbar-sticky navbar-mobile bootsnav">
                <div class="container">
                 <!-- Start Atribute Navigation -->            
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i> {{trans('app.menu')}}
                        </button>                         
                    </div>
                    <!-- End Header Navigation -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu-bar" id="navbar-menu">
                        <ul class="nav navbar-nav col-md-8" data-in="" data-out="">
                            <li class="dropdown">
                                <a href="{{url('/')}}">{{trans('app.home')}}</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('app.about')}}</a>
                                <ul class="dropdown-menu animated">
                                    <li><a href="{{url('outline')}}">{{trans('app.outline')}}</a></li>
                                    <li><a href="{{url('usedatabase')}}">{{trans('app.how_to_use_database')}}</a></li> 
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{url('contact')}}">{{trans('app.contact')}}</a>
                            </li>
                            
                            <li class="dropdown">
                                 <a href="{{url('search')}}">{{trans('app.search')}}</a>
                            </li>
                            <li class="dropdown"><a href="{{url('news')}}">{{trans('app.news')}}</a></li>
                        </ul>

                        @if(NULL !== Auth::user())
                        <span>
                            <a href="{{url('logout')}}" class="float-right"><i class="fa fa-sign-out" aria-hidden="true"></i> 
                            {{trans('app.sign_out')}}</a>
                        </span>
                        @else
                        <span>
                            <a href="{{url('login')}}" class="float-right"><i class="fa fa-sign-in" aria-hidden="true"></i> 
                            {{trans('app.sign_in')}}</a> |  
                            <a href="{{url('register')}}" class="float-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            {{trans('app.user_registration')}}</a>
                        </span>
                        @endif   
                            
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
            <!-- END OF/. NAVIGATION -->
        </header>
@include('frontend.layouts.javascript')
<script>
$(document).ready(function () {
$(document).on('click', '#locale', function () {
    var locale = $(this).attr('value');
    var url = $('#languageUrl').val();
    var settings = {
        "url": url + "?locale=" + locale,
        "method": "GET",
        "timeout": 0,
    };
    $.ajax(settings).done(function (response) {
        location.reload();
        });
    });
});
</script>
