@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.slide')
<!-- *** START PAGE MAIN CONTENT *** -->
<div class="row about-container">
   <div class="container">
        <div class="col-lg-12 mb-12 text-center">
            <div  style="width: 100%;">
                <h2>{{trans('app.about_of_matching_service_program')}}</h2><br>
                <p>{{trans('app.the_matching_service')}}</p>
                 <p>{{trans('app.in_the_msp')}}</p>
                <a href="#" class="btn outline-btn">
                    {{trans('app.read_more')}}
                </a>
            </div>
        </div>
   </div>
</div> 
<main class="page_main_wrapper new-section">            
    <!-- <div class="container">    
       
        <div class="row">            
          <div class="col-lg-12 mb-3">
            <h1 class="my-4">{{trans('app.matching_service_program_news')}}</h1><br>
            @if(!empty($news))
                @foreach($news as $new)
                <div class="news-card">
                    <h4 >{{ languageSwitcher($new->title) }}</h4>
                    <div class="row">
                    <div class="col-md-10"><p class="card-text">{{ languageSwitcher($new->content) }}</p></div>
                      <div class="col-md-2"><a href="{{ url($new->id.'/new') }}" class="btn btn-primary outline-btn">{{trans('app.learn_more')}}</a></div>
                       
                       <div class="col-md-2"><a href="{{url('new_detail')}}"class="btn btn-primary outline-btn">{{trans('app.learn_more')}}</a></div> |
                    </div>
                </div>
                @endforeach
            @endif
           

          </div>
         
        </div> -->
        @include('frontend.layouts.carousel')
        <!-- /.row -->         
    </div>
</main>
<section class="link-card-warp">
    <div class="container">
    <div class="col-lg-12 mb-3">
            <h3 class="my-4 text-center">{{trans('app.links')}}</h3><br>
            <div class="justify-content-center row">
            <a  class="col-md-2"  href="https://www.mopfi.gov.mm/" title="myanmarindustries.org"> 
                    <div class=" text-center">
                        <!-- <h4 >{{trans('app.government_organization')}}</h4> -->
                        <img src="v2/images/moi_logo.png" alt="logo" width="50px"><br>
                        
                        {{trans('app.ministry_of_planning_finance_and_industry')}}<br>
                        
                    </div>
                </a>
                <a  class="col-md-2"  href="https://www.dica.gov.mm/" title="myanmarindustries.org">   
                    <div class=" text-center">
                        <img src="v2/images/logo-1.png" alt="logo" width="50px"><br>
                        
                    {{trans('app.dica')}}
                        
                    </div>
                </a>
                <a class="col-md-2" href="https://myanmarindustries.org/" title="myanmarindustries.org">
                    <div class=" text-center">
                        <!-- <h4 >{{trans('app.industrial_associations')}}</h4> -->
                        <img src="v2/images/logo-2.jpg" alt="logo" width="50px"><br>
                    {{trans('app.myanmar_industrial_associations')}}
                    </div>
                </a>
                
              
              
                <a  class="col-md-2"  href="https://mfpea.org/" title="myanmarindustries.org">   
                    <div class="text-center">
                        <img src="v2/images/logo-4.jpg" alt="logo" width="50px"><br>
                        
                    {{trans('app.myanmar_food_processors_and_exporters_association')}}
                        
                    </div>
                </a>

                <a   class="col-md-2"  href="https://www.myanmargarments.org/" title="myanmarindustries.org">   
                    <div class=" text-center">
                        <img src="v2/images/logo-5.jpg" alt="logo" width="50px"><br>
                        
                    {{trans('app.myanmar_garment_aanufacturers_association')}}
                        
                    </div>
                </a>
                <a  class="col-md-2"  href="https://mpiamyanmar.com/index.php/en/" title="myanmarindustries.org">   
                    <div class="text-center">
                        <img src="v2/images/logo-6.jpg" alt="logo" width="50px"><br>
                        
                    {{trans('app.myanmar_plastic_industries_association')}}
                        
                    </div>
                </a>
            </div>
          </div>
    </div>
</section>

@endsection