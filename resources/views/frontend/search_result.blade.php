@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">
    <div style="height: 300px;"><img src="{{ asset('frontend/images/slide-01.jpg') }}" alt="" class="img-responsive" style="width: 100%;"></div>         
    <div class="container">    
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box" style="width: 100%;">
                    <p>{{trans('app.search_result')}}</p>
                    <h1>{{trans('app.database_on_material_processing')}}</h1>
                    <p>{{trans('app.products_name')}}<br />
                    {{trans('app.state_region')}}</p>
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
                          <th scope="col">{{trans('app.main_products')}}</th>{{trans('app.main_products')}}
                          <th scope="col">{{trans('app.company_profile')}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $company->category->title }}</td>
                                <td><a href="{{ url($company->id.'/industry') }}">{{ $company->name }}</a></td>
                                <td>{{ implode(",",$company->locations->pluck('name')->all()) }}</td>
                                <td>{{ implode(",",$company->products->pluck('name')->all()) }}</td>
                                <td>{{ $company->description }}</td>
                            </tr>
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