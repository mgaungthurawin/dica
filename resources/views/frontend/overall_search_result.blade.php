@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">
        <div class="container " >
            <h1>Database On Matching Service Program</h1><br>
        </div>
        <br><br>
     </div>
    <div class="container">    
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
                            $processing = json_decode($company->processing_string, TRUE);
                            $product = json_decode($company->product_string, TRUE);
                          ?>
                            <tr>
                                <th scope="row">{{$index}}</th>
                                <td>{{ $company->category->title }}</td>
                                <td><a href="{{ url($company->id.'/industry') }}">{{ $company->name }}</a></td>
                                <td>{{ main_location($company) }}</td>
                                @if(FOOD == $company->type)
                                  <td></td>
                                  <td>{{ main_product($product['412']) }}</td>
                                @else
                                  <td>{{ main_processing($processing['511']) }}</td>
                                  <td>{{ main_product($product['411']) }}</td>
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