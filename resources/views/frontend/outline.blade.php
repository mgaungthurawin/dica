@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper outline">            
    <div class="container">    
        <div class="row">
            <div class="container-box" style="width: 100%;">
                <h2>{{trans('app.outline_of_matching_service_program')}}</h2><br>
                <p>{{trans('app.matching_service_program_is_a_program')}}</p>
                <p>{{trans('app.in_this_program')}}</p>
            </div>
        </div> 
        <div class="row">
            <div class="container-box" style="width: 100%;">
                <h2>{{trans('app.outline_of_directorate')}}</h2><br>
                <p>{{trans('app.the_disi')}}</p>
            </div>
        </div> 
        <div class="row">
            <div class="container-box" style="width: 100%;">
                <h2>{{trans('app.outline_of_project')}}</h2><br>
                <p>{{trans('app.the_project')}}
                    <ul>
                        <li>{{trans('app.to_attract')}}</li>
                        <li>{{trans('app.the_strengthen')}}</li>
                    </ul>
                </p>
            </div>
        </div>
        <!-- /.row -->         
    </div>
</main>

@endsection