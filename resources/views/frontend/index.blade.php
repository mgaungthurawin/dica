@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.slide')
<!-- *** START PAGE MAIN CONTENT *** -->
<div class="row about-container">
   <div class="container">
        <div class="col-lg-12 mb-12 text-center">
            <div  style="width: 100%;">
                <h2>{{trans('app.about_of_matching_service_program')}}</h2><br>
                <p>{{trans('app.matching_service_program_is_a_program')}}{{trans('app.in_this_program')}}</p><br>
                <a href="#" class="btn outline-btn">
                    {{trans('app.read_more')}}
                </a>
            </div>
        </div>
   </div>
</div> 
<main class="page_main_wrapper">            
    <div class="container">    
        <!-- Marketing Icons Section -->
        <div class="row">            
          <div class="col-lg-9 mb-3">
            <h1 class="my-4">{{trans('app.matching_service_program_news')}}</h1><br>
            @if(!empty($news))
                @foreach($news as $new)
                <div class="news-card">
                    <h4 >{{ languageSwitcher($new->title) }}</h4>
                    <div class="row">
                    <div class="col-md-10"><p class="card-text">{{ languageSwitcher($new->content) }}</p></div>
                      <!-- <div class="col-md-2"><a href="{{ url($new->id.'/new') }}" class="btn btn-primary outline-btn">{{trans('app.learn_more')}}</a></div> -->
                       
                       <div class="col-md-2"><a href="{{url('learn_more')}}"class="btn btn-primary outline-btn">{{trans('app.learn_more')}}</a></div> |
                    </div>
                </div>
                @endforeach
            @endif
           

          </div>
        
          <div class="col-lg-3 mb-3">
            <h1 class="my-4">{{trans('app.links')}}</h1><br>
            <div class="link-card-warp">
                <div class="link-card text-center">
                    <h4 >{{trans('app.industrial_associations')}}</h4>
                    <img src="v2/images/logo-2.png" alt="logo" width="50px"><br>
                    
                   {{trans('app.myanmar_industrial_associations')}}<br>
                    <a href="https://myanmarindustries.org/" title="myanmarindustries.org">https://myanmarindustries.org/</a>
                </div>
                <hr>
                <div class="link-card text-center">
                    <h4 >{{trans('app.government_organization')}}</h4>
                    <img src="v2/images/moi_logo.png" alt="logo" width="50px"><br>
                    
                    {{trans('app.ministry_of_planning_finance_and_industry')}}<br>
                    <a href="https://www.mopfi.gov.mm/" title="myanmarindustries.org">https://www.mopfi.gov.mm/</a>
                </div>
                <hr>
                <div class="link-card text-center">
                    <img src="v2/images/logo-1.png" alt="logo" width="50px"><br>
                    
                   {{trans('app.dica')}}
                    <a href="https://www.dica.gov.mm/" title="myanmarindustries.org">https://www.dica.gov.mm/</a>
                </div>
            </div>
          </div>
        </div>
        <!-- /.row -->         
    </div>
</main>

@endsection