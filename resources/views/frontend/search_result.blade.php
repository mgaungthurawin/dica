@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">
    <!-- <div style="height: 300px;"><img src="{{ asset('frontend/images/slide-01.jpg') }}" alt="" class="img-responsive" style="width: 100%;"></div> 
           -->

    @if(MATERIAL == $category->prefix)
      <div class="bg-wrap" id="material"> 
    @elseif(FOOD == $category->prefix)
      <div class="bg-wrap" id="food">
    @else
      <div class="bg-wrap" id="textile">
    @endif
      <div class="container " >
            @if(MATERIAL == $category->prefix)
                <h1>{{trans('app.db_material')}}</h1><br>
              @elseif(TEXTILE == $category->prefix)
                <h1>{{trans('app.db_textile')}}</h1><br>
              @else
                <h1>{{trans('app.db_food')}}</h1><br>
          @endif
      </div>
  
    </div>  

    <div class="container">    
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box result-value">
                <h3>{{trans('app.search_result')}}</h3>
                    <table class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">{{trans('app.industry')}}</th>
                          <th scope="col">{{trans('app.name_of_company')}}</th>
                          <th scope="col">{{trans('app.state_region')}}</th>
                          @if(FOOD !== $category->prefix)
                            <th scope="col">{{trans('app.main_processing')}}</th>
                          @endif
                          <th scope="col">{{trans('app.main_products')}}</th>
                          <th scope="col">{{trans('app.company_profile')}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $index=1;?>
                          @foreach($companies as $company)
                              <?php
                                $processing = json_decode($company->processing_string, TRUE);
                                $product = json_decode($company->product_string, TRUE);
                              ?>
                            @if(isset($product_id))
                              @if($product_id == $product['411'] || $product_id == $product['412'])
                              <tr>
                                  <th scope="row">{{$index}}</th>
                                  <td>{{ $company->category->title }}</td>
                                  <td><a href="{{ url($company->id.'/industry') }}">{{ $company->name }}</a></td>
                                  <td>{{ main_location($company) }}</td>
                                  @if(FOOD !== $category->prefix)
                                    <td>{{ main_processing($processing['511']) }}</td>
                                    <td>{{ main_product($product['411']) }}</td>
                                  @else
                                    <td>{{ main_product($product['412']) }}</td>
                                  @endif
                                  <td>{{ limit_text($company->strong_point, 15) }}</td>
                              </tr>
                              <?php $index++;?>
                              @endif
                            @else
                              <tr>
                                  <th scope="row">{{$index}}</th>
                                  <td>{{ $company->category->title }}</td>
                                  <td><a href="{{ url($company->id.'/industry') }}">{{ $company->name }}</a></td>
                                  <td>{{ main_location($company) }}</td>
                                  @if(FOOD !== $category->prefix)
                                    <td>{{ main_processing($processing['511']) }}</td>
                                    <td>{{ main_product($product['411']) }}</td>
                                  @else
                                    <td>{{ main_product($product['412']) }}</td>
                                  @endif
                                  <td>{{ limit_text($company->strong_point, 15) }}</td>
                              </tr>
                              <?php $index++;?> 
                            @endif
                          @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->         
    </div>
</main>
@endsection