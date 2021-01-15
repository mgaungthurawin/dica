@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper"> 
    <div style="height: 150px;" class="hidden-xs"><img src="v2/images/banner-bg.jpg" alt="" class="img-responsive"></div>            
    <div class="container">
        <div class="row">
            <h2 style="text-align: center; color: #fff;">{{trans('app.database_on_potential')}}</h2><br>
            @foreach($categories as $category)
              <div class="col-lg-4 col-sm-6 portfolio-item">
                  <div class="card h-100">
                    <div class="card-body">
                      <h4 class="card-title">
                        <a href="{{url($category->id.'/material')}}">{{ $category->title }}</a>
                      </h4>
                    </div> 
                    <a href="{{url($category->id.'/material')}}"><img class="card-img-top" src="{{ asset($category->media->file_path . $category->media->file_name) }}" alt=""></a>
                  </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="container-box">
                    <p>{{trans('app.this_database_provides_information')}}<br>
                        {{trans('app.notes')}}
                    </p>       
                    <ol>
                        <li>{{trans('app.the_database_is_based')}}</li>
                        <li>{{trans('app.impotant_notice')}}</li>
                        <li>{{trans('app.the_database_contains')}}</li>
                        <li>{{trans('app.the_classification_in')}}</li>
                        <li>{{trans('app.machines_and_equipment_posted')}}</li>
                        <li>{{trans('app.after_a_company')}}</li>
                    </ol>
                </div>
            </div>
        </div>        
        <!-- /.row -->         
    </div>
</main>
@endsection