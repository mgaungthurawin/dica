@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">
    <div style="height: 300px;"><img src="{{ asset('frontend/images/slide-01.jpg') }}" alt="" class="img-responsive" style="width: 100%;"></div>         
    <div class="container">    
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box" style="width: 100%;">
                    <p>{{trans('app.search_result')}}</p>
                    {{--<h1>
                      @if(MATERIAL == $companies->category_id->prefix)
                        <h1>Database on potential Material Processing companies in Myanmar</h1>
                        
                      @elseif(FOOD == $companies->category_id->prefix)
                        <h1>Database on potential Food Processing companies in Myanmar</h1>
                        <
                      @else
                        <h1>Database on potential Food Processing companies in Myanmar</h1>
                        
                      @endif
                    </h1>
                 --}}
                  
         
                    <!-- <h1>{{trans('app.database_on_material_processing')}}</h1><br> -->
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box">
                    <table class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">{{trans('app.industry')}}</th>
                          <th scope="col">{{trans('app.name_of_company')}}</th>
                          <th scope="col">{{trans('app.state_region')}}</th>
                          <th scope="col">Main Processing</th>
                          <th scope="col">{{trans('app.main_products')}}</th>
                          <th scope="col">{{trans('app.company_profile')}}</th>
                          <th scope="col">{{trans('app.strong_point')}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $index=1;?>
                        @foreach($companies as $company)
                            <tr>
                                <th scope="row">{{$index}}</th>
                                <td>{{ $company->category->title }}</td>
                                <td><a href="{{ url($company->id.'/industry') }}">{{ $company->name }}</a></td>
                                <td>{{ main_location($company) }}</td>
                                <td>{{ main_location($company) }}</td>
                                <td>{{ main_product($company) }}</td>
                                <td>{{ substr($company->description,0,20) }}</td>
                                <td>{{ substr($company->strong_point,0,20) }}</td>
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