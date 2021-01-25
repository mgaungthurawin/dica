@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">


    <!-- <div style="height: 300px;"><img src="{{ asset('frontend/images/slide-01.jpg') }}" alt="" class="img-responsive" style="width: 100%;"></div>          -->
    @foreach($companies as $company)
        @if(MATERIAL == $company->type)
          <div class="bg-wrap" id="material"> 
        @elseif(FOOD == $company->type)
          <div class="bg-wrap" id="food">
        @else
          <div class="bg-wrap" id="textile">
        @endif
        <div class="container " >
          <h1>Database On Matching Service Program</h1><br>
        </div>
     </div>
  </div>  
   @endforeach    
    
<!-- =======
    @foreach($companies as $company)
    <div style="height: 300px;">
        @if(MATERIAL == $company->type)
            <img src="{{ asset('v2/images/s2.jpg') }}" alt="" class="img-responsive" style="width: 100%;">
        @elseif(FOOD == $company->type)
            <img src="{{ asset('v2/images/s7.jpg') }}" alt="" class="img-responsive" style="width: 100%;">
        @else
            <img src="{{ asset('v2/images/s4.jpg') }}" alt="" class="img-responsive" style="width: 100%;">
        @endif
    </div>  
    @endforeach       
>>>>>>> c396a4fdbd28642af50a00e9d8b0587336daafe7 -->
    <div class="container">    
        <!-- <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box" style="width: 100%;">
                    <h1>Database On Matching Service Program</h1><br>
                </div>

                <div class="container-box" style="width: 100%;">
                    <p>{{trans('app.search_result')}}</p>
                </div>
            </div>
        </div> -->
        
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box result-value">
                  
                <p>{{trans('app.search_result')}}</p>
                    <table class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">{{trans('app.industry')}}</th>
                          <th scope="col">{{trans('app.name_of_company')}}</th>
                          <th scope="col">{{trans('app.state_region')}}</th>
                          <th scope="col">{{trans('app.main_processing')}}</th>
                          <th scope="col">{{trans('app.main_products')}}</th>
                          <th scope="col">{{trans('app.company_profile')}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $index=1;?>
                        @foreach($companies as $company)
                          <?php
                            $processing = json_decode($company->processings, TRUE);
                            $product = json_decode($company->products, TRUE);
                          ?>
                            <tr>
                                <th scope="row">{{$index}}</th>
                                <td>{{ $company->category->title }}</td>
                                <td><a href="{{ url($company->id.'/industry') }}">{{ $company->name }}</a></td>
                                <td>{{ main_location($company) }}</td>
                                @if(FOOD !== $company->type)
                                  <td>{{ main_processing($processing['511']) }}</td>
                                  <td>{{ main_product($product['411']) }}</td>
                                @else
                                  <td>{{ main_product($product['412']) }}</td>
                                @endif
                                <td>{{ limit_text($company->strong_point, 15) }}</td>
                            </tr>
                            <?php $index++;?>
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