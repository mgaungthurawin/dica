@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">    
    <div class="container">    
        <div class="row">
            <div class="col-lg-12 mb-12">
                    <h1>{{trans('app.news')}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box">
                    <table class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">{{trans('app.date')}}</th>
                          <th scope="col">{{trans('app.category')}}</th>
                          <th scope="col">{{trans('app.contents')}}</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($news as $new)
                          <tr>
                            <th scope="row">{{ $new->created_at->format('Y-m-d') }}</th>
                            <td>{{ languageSwitcher($new->category->title) }}</td>
                            <td>{{ languageSwitcher($new->content) }}</td>
                            <td><a href="{{url($new->id.'/new_detail')}}">New Detail</a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="pull-right">
                        {{ $news->appends($_GET)->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->         
    </div>
</main>
@endsection