@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">
    <div class="bg-wrap" >
     <div class="container ">
     <!-- <center>
              <h3>{{trans('app.database_on_potential')}}</h3>
              <h4>{{ $category->title }}</h4>
            </center> -->
            <div class="text-center">
            <h4>{{ $category->title }}</h4>
            </div>
            <h1>
              @if(MATERIAL == $category->prefix)
                <p>{{trans('app.the_material_processing_industry')}}<br><br>
                  {{trans('app.this_database_defines_material')}}
                </p>
              @elseif(FOOD == $category->prefix)
                <p>
                  {{trans('app.food_processing_industry_covers')}}
                </p>
              @else
                <p>{{trans('app.textile_one')}}</p>
              @endif
            </h1>
     </div>
  </div>         
    <div class="container">    
        <div class="row">
            <div class="col-lg-12 mb-12">
                <!-- <div class="container-box" style="width: 100%;">
                    <center>
                      <h3>{{trans('app.database_on_potential')}}</h3>
                      <h4>{{ $category->title }}</h4>
                    </center>
                    <h1>
                      @if(MATERIAL == $category->prefix)
                        <p>{{trans('app.the_material_processing_industry')}}<br><br>
                          {{trans('app.this_database_defines_material')}}
                        </p>
                      @elseif(FOOD == $category->prefix)
                        <p>
                          {{trans('app.food_processing_industry_covers')}}
                        </p>
                      @else
                        <p>{{trans('app.textile_one')}}</p>
                      @endif
                    </h1>
                </div>
            </div> -->
        </div>
        <div class="row">
            <form method="GET" action="{{ url($category->id.'/search_result') }}">
            <div class="col-lg-12 mb-12">
                <div class="container-box cat-search-box-wrap">
                    <div class="cat-search-box">
                      <label >Key word Search from {{ $category->title }} companies</label>
                      <input type="text" name="q" class="form-control" placeholder="{{trans('app.search_for')}}" style="margin-right: 20px;">
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- Marketing Icons Section -->
        <div class="row" style="margin-top: 20px;"> 
          @if(MATERIAL == $category->prefix)
            <div class="col-lg-6 mb-6">
                <h3>{{trans('app.main_processing_classification')}}</h3>
                  @foreach($processings as $processing)
                    <a href="{{url($category->id.'/search_result?processing='. $processing->id)}}" class="list-group-item active">{{ $processing->main_process }}</a>
                  @endforeach
            </div>
            <div class="col-lg-6 mb-6">
                <?php
                  $product_array = ['226', '227', '228'];
                  $pnc_array = ['229', '230', '231', '232', '233', '234'];
                  $sm_array = ['256', '236'];
                ?>
                <h3>{{trans('app.recommand_products')}}</h3>
                  <h3><u>Products</u></h3>
                  @foreach($products as $key => $recommand)
                    @if(in_array($recommand->id, $product_array))
                      <a href="{{url($category->id.'/search_result?product=' . $recommand->id)}}" class="list-group-item">{{ $recommand->name }}</a>
                    @endif
                  @endforeach
                  <h3><u>Parts and Components</u></h3>
                    @foreach($products as $key => $recommand)
                    @if(in_array($recommand->id, $pnc_array))
                      <a href="{{url($category->id.'/search_result?product=' . $recommand->id)}}" class="list-group-item">{{ $recommand->name }}</a>
                    @endif
                  @endforeach
                  <h3><u>Subsidiary Material</u></h3>
                  @foreach($products as $key => $recommand)
                    @if(in_array($recommand->id, $sm_array))
                      <a href="{{url($category->id.'/search_result?product=' . $recommand->id)}}" class="list-group-item">{{ $recommand->name }}</a>
                    @endif
                  @endforeach
            </div>
          @endif        
          @if(TEXTILE == $category->prefix)
            <div class="col-lg-6 mb-6">
                <h3>{{trans('app.main_processing_classification')}}</h3>
                  @foreach($processings as $processing)
                    <a href="{{url($category->id.'/search_result?processing='. $processing->id)}}" class="list-group-item active">{{ $processing->main_process }}</a>
                  @endforeach
            </div>
            <div class="col-lg-6 mb-6">
                <h3><u>{{trans('app.list_of_state_region')}}</u></h3>
              <div class="list-group">
                  @foreach($locations as $location)
                  <a href="{{url($category->id.'/search_result?location='. $location->id)}}" class="list-group-item">{{ $location->name }}</a>
                  @endforeach
              </div>
            </div>
          @endif 

          @if(FOOD == $category->prefix)
            <div class="col-lg-6 mb-6">
                <h3>{{trans('app.main_products')}}</h3>
                  @foreach($products as $product)
                    <a href="{{url($category->id.'/search_result?product=' . $product->id)}}" class="list-group-item">{{ $product->name }}</a>
                  @endforeach
            </div>
            <div class="col-lg-6 mb-6">
                <h3><u>{{trans('app.list_of_state_region')}}</u></h3>
              <div class="list-group">
                    @foreach($locations as $location)
                    <a href="{{url($category->id.'/search_result?location='. $location->id)}}" class="list-group-item">{{ $location->name }}</a>
                    @endforeach
              </div>
            </div>
          @endif
        </div>
        <div class="col-lg-12 mb-12 row">
            <div class="container-box" style="width: 100%;">
              @if(MATERIAL == $category->prefix)
              <p>
                When click category of processing technology/ recommended products, jump to “search result” sorted by the selected processing technology category/ Recommended products category.
              </p> 
              @elseif(TEXTILE == $category->prefix)
                <p>
                  When click Processing Category (Products)/ Location of factory, jump to “search result” sorted by the selected processing category/ location of factory.
                </p>
              @else
                <p>
                  When click Processing Category (Products)/ Location of factory, jump to “search result” sorted by the selected processing category/ location of factory.
                </p>
              @endif
            </div>
        </div>     
    </div>
</main>
@endsection