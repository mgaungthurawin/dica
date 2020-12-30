@extends('frontend.layouts.app')
@section('content')
    <!-- PAGE LOADER -->
   
<!-- *** END OF /. PAGE HEADER SECTION *** -->
<main class="page_main_wrapper">            
    <div class="container">    
        <div class="row">
            <div class="container-box" style="width: 100%;">
                <h2>{{trans('app.outline_of_matching_service_program')}}</h2>
                <p>{{trans('app.matching_service_program_1')}}</p>
                <p>{{trans('app.matching_service_program_2')}}</p>
            </div>
        </div> 
        <div class="row">
            <div class="container-box" style="width: 100%;">
                <h2>{{trans('app.outline_of_directorate')}}</h2>
                <p>{{trans('app.to_be_checked')}}</p>
            </div>
        </div> 
        <div class="row">
            <div class="container-box" style="width: 100%;">
                <h2>{{trans('app.outline_of_project')}}</h2>
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