@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">
    <div style="height: 300px;"><img src="images/slide-01.jpg" alt="" class="img-responsive"></div>         
    <div class="container">    
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box" style="width: 100%;">
                    <p>{{trans('app.database_on_potential')}}</p>
                    <h1>{{trans('app.material_processing')}}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <form method="GET" action="{{ url($category->id.'/search_result') }}">
            <div class="col-lg-12 mb-12">
                <div class="container-box">
                    <div class="input-group">
                      <label style="line-height: 30px; padding: 0px 20px 0px 0px;">{{trans('app.free_word_search_function')}}</label> 
                        <input type="text" name="q" class="form-control" placeholder="{{trans('app.search_for')}}" style="margin-right: 20px;">
                        
                          <button class="btn btn-secondary" type="button" style="border-radius: 10px; background: linear-gradient(#6c757d,#4c4c4c)">{{trans('app.search')}}</button>
                        
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- Marketing Icons Section -->
        <div class="row" style="margin-top: 20px;">            
          <div class="col-lg-4 mb-4">
            <h3>Main Product</h3>
              @foreach($companies as $company)
                @foreach($company->products as $product)
                  <a href="{{url($category->id.'/search_result?product=' . $product->id)}}" class="list-group-item active">{{ $product->name }}</a>
                @endforeach
              @endforeach
          </div>
          <div class="col-lg-4 mb-4">
            <h3>Main Processing Classification</h3>
              @foreach($companies as $company)
                @foreach($company->processings as $processing)
                  <a href="{{url($category->id.'/search_result?processing='. $processing->id)}}" class="list-group-item active">{{ $processing->main_process }}</a>
                @endforeach
              @endforeach
          </div>
          <div class="col-lg-4 mb-4">
            <div class="list-group">
              <h3>{{trans('app.list_of_state_region')}}</h3> 
                @foreach($companies as $company)
                    @foreach($company->locations as $location)
                    <a href="{{url($category->id.'/search_result?location='. $location->id)}}" class="list-group-item">{{ $location->name }}</a>
                    @endforeach
                @endforeach
            </div>
          </div>
        </div>
        <!-- /.row -->         
    </div>
</main>
@endsection