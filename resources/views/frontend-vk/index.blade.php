@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.slide')
<main class="page_main_wrapper">            
    <div class="container">    
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box" style="width: 100%;">
                    <p>The Matching Service Program (MSP)  is a program operated by the Ministry of Planning, Finance, and Industry (MoPFI) with the assistance of JICA to support business matching between supplier companies in Myanmar and both foreign and Myanmar manufacturing and assembly companies.</p>
                    <p>In the MSP, the MoPFI provides a database of potential supplier companies in the material processing, textile, and food-processing industries in Myanmar. In addition, the MoPFI selects and screens potential supplier companies in Myanmar on the basis of certain criteria. The database is updated regularly.</p>
                </div>
            </div>
        </div> 
        <h1 class="my-4">{{trans('app.matching_service_program_news')}}</h1>
        <!-- Marketing Icons Section -->
        <div class="row"> 
            @foreach($companies as $company)
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <h4 class="card-header">{{ $company->name }}</h4>
                        <div class="card-body">
                            <p class="card-text">{{ $company->description }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">{{trans('app.learn_more')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /.row -->         
    </div>
</main>
@endsection