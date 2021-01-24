@include('frontend.layouts.css')
@include('frontend.layouts.fonts')
<!-- PAGE LOADER -->
<div class="se-pre-con"></div>
<style>
    .sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
}
@media only screen and (min-width: 600px){
    .mobile-logo{
        display:none;
    }
}
</style>
        
     <!-- *** START PAGE HEADER SECTION *** -->
        <header>
            <!-- START HEADER TOP SECTION -->
            <!-- END OF /. HEADER TOP SECTION -->
            <!-- START MIDDLE SECTION -->
            <div class="header">
                <div class="container">
                    <div class="col-xs-3 col-sm-3 col-md-5 hidden-xs pull-left contact-bar">
                        <a class="btn sitemap-btn" href="{{url('sitemap')}}">{{trans('app.sitemap')}}</a> | 
                        <a href="{{ url('contact') }}"><i class="fa fa-envelope"></i> msmebusinessmatching@gmail.com</a> | 
                        <a href="tel:06754321"><i class="fa fa-phone"></i> 067-54321</a>
                    </div>
                    <div class="attr-nav col-md-7 hidden-xs">
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
                                <form id="orver-all-search">
                                    <input type="text" class="form-control" placeholder="{{trans('app.search_for')}}" name="q">
                                </form>
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
            <nav id="navbar" class="navbar  navbar-static-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header mobile-logo"> 
      
      <a class="navbar-brand" href="#">Brand</a>
      <a href="javascript:void(0)" class="pull-right navbar-brand">
      <i class="fa fa-bars" aria-hidden="true"></i>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"> <a href="{{url('/')}}">{{trans('app.home')}}</a></li>
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{trans('app.about')}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="{{url('outline')}}">{{trans('app.outline')}}</a></li>
            <li><a href="{{url('usedatabase')}}">{{trans('app.how_to_use_database')}}</a></li> 
          </ul>
        </li>
        <li >
            <a href="{{url('contact')}}">{{trans('app.contact')}}</a>
        </li>
        
        <li >
                <a href="{{url('search')}}">{{trans('app.search')}}</a>
        </li>
        <li ><a href="{{url('news')}}">{{trans('app.news')}}</a></li>
      </ul>
    
                            
      <ul class="nav navbar-nav navbar-right">
      @if(NULL !== Auth::user())
                        
        <li> <a href="{{url('logout')}}" class="float-right"><i class="fa fa-sign-out" aria-hidden="true"></i> 
            {{trans('app.sign_out')}}</a></li>
        
        @else
        <li> <a href="{{url('login')}}" class=""><i class="fa fa-sign-in" aria-hidden="true"></i> 
                            {{trans('app.sign_in')}}</a>
        </li>
        <li> <a href="{{url('register')}}" class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            {{trans('app.user_registration')}}</a>
                        </span>
        </li>
        @endif 
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
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
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
$(".navbar-header").click(function(){
    $(".navbar-collapse ").toggleClass('in');
})
</script>
