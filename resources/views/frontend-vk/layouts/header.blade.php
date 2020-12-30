@include('frontend.layouts.fonts') 
@include('frontend.layouts.css')     
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<header>
<div class="se-pre-con"></div>
<div class="header">
    <div class="container">
            <div class="attr-nav">
                <div class="col-xs-3 col-sm-3 col-md-3 hidden-xs">
                    <a class="btn btn-primary" href="#">{{trans('app.sitemap')}}</a>
                </div>
                <div class="col-xs-8 col-sm-6 col-md-6">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="{{trans('app.search_for')}}">
                      <span class="input-group-append">
                        <button class="btn btn-secondary" type="button">Go!</button>
                      </span>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-3 col-md-3">
                        <div class="social_media_links">
                            <a href="#" id="locale" value="en" style="float: left; margin-right: 10px;"><img src="frontend/images/en.png" width="30px" height="20px"> </a>
                            <a href="#" id="locale" value="mm"> <img src="frontend/images/mm.png" width="30px" height="20px"></a>
                            <input type="hidden" id="languageUrl" value="{{ url('changelanguage') }}">
                        </div>  
                </div>
            </div>
        </div>
       
                        
  </div>
    </div>
    <div class="header-mid">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center hidden-xs" >
                    <div class="logo">
                        <a href="#"><img src="frontend/images/moi_logo.png" class="img-responsive lazyload" alt=""></a>
                    </div>
                </div>
                
                <div class="col-md-8 col-sm-12 text-center logo_title">
                    <a href="index.html"> <div class="hidden-md hidden-lg col-xs-12 col-sm-12"> <center><img src="frontend/images/moi_logo.png" class="img-responsive lazyload" alt="" width="85px"></center><br> </div></a>
                    <h2 class="col-xs-12">{{trans('app.welcome_website')}}</h2>
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
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav" data-in="" data-out="">
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

                    @if(NULL !== Auth::user())
                        <li class="dropdown">
                            <a href="{{ url('logout') }}">{{trans('app.sign_out')}}</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('app.login')}}</a>
                            <ul class="dropdown-menu animated">
                                <li><a href="{{url('login')}}">{{trans('app.sign_in')}}</a></li>
                                <li><a href="{{url('register')}}">{{trans('app.user_registration')}}</a></li> 
                            </ul>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a href="{{url('search')}}">{{trans('app.search')}}</a>
                    </li>
                    {{--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('app.search')}}</a>
                         <ul class="dropdown-menu animated">
                            <li><a href="{{url('#')}}">{{trans('app.material')}}</a></li>
                            <li><a href="{{url('textile')}}">{{trans('app.textile')}}</a></li> 
                            <li><a href="{{url('food')}}">{{trans('app.food')}}</a></li>
                        </ul>
                    </li>--}}
                    <li class="dropdown"><a href="{{url('news')}}">{{trans('app.news')}}</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <!-- END OF/. NAVIGATION -->
</header>
<!-- *** END OF /. PAGE HEADER SECTION *** -->
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
 

