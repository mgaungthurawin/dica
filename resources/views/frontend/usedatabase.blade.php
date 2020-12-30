@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">            
    <div class="container">    
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box" style="width: 100%;">
                    <h2>{{trans('app.usage_of_database')}}</h2><br>
                    <p><i class="fa fa-server" style="padding-right: 10px;"></i>{{trans('app.before_user_registration')}}</p>
                    <ol>
                       <li>{{trans('app.usedatabase_o')}}</li>
                        <li>{{trans('app.you_can_directly')}}</li>
                        <li>{{trans('app.in_search_page')}}</li>
                        <li>{{trans('app.match_companie')}}</li>
                        <li>{{trans('app.you_can_go')}}</li>
                    </ol>
                    <hr />
                    <p><i class="fa fa-server" style="padding-right: 10px;"></i>{{trans('app.after_user_registration')}}</p>
                    <ol>
                        <li>{{trans('app.you_need_to')}}</li>
                        <li>{{trans('app.after_login')}}</li>
                        <li>{{trans('app.you_can_find')}}</li>
                    </ol>
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-lg-6 mb-6">
                <div class="container-box" style="width: 100%;">
                    {{trans('app.you_can_login')}}<br><br>
                    <a href="{{ url('login') }}" class="btn outline-btn">{{trans('app.login')}}</a>
                </div>
            </div>
            <div class="col-lg-6 mb-6">
                <div class="container-box" style="width: 100%;">
                    {{trans('app.link_button')}}<br><br>
                    <a href="#" class="btn outline-btn">{{trans('app.login')}}</a>
                </div>
            </div>
        </div>
        <!-- /.row -->         
    </div>
</main>
@endsection