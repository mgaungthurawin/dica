@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">
    <div style="height: 300px;"><img src="images/slide-02.jpg" alt="" class="img-responsive"></div>         
    <div class="container">    
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box" style="width: 100%;">
                    <p>{{trans('app.database_on_potential')}}</p>
                    <h1>{{trans('app.textile_companies')}}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="container-box">
                    <div class="input-group">
                      <label style="line-height: 30px; padding: 0px 20px 0px 0px;">
                      {{trans('app.free_word_search_function')}} </label> 
                      <input type="text" class="form-control" placeholder="{{trans('app.search_for')}}" style="margin-right: 20px;">
                      <span class="input-group-append">
                        <button class="btn btn-secondary" type="button" style="border-radius: 10px; background: linear-gradient(#6c757d,#4c4c4c)">{{trans('app.search')}}</button>
                      </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Marketing Icons Section -->
        <div class="row" style="margin-top: 20px;">            
          <div class="col-lg-8 mb-4">
            <h3>{{trans('app.list_of_products')}}</h3>
            <a href="#" class="list-group-item active">Spinning</a>
              <a href="#" class="list-group-item">Weaving</a>
              <a href="#" class="list-group-item">Dyeing</a>
              <a href="#" class="list-group-item">Printing</a>
              <a href="#" class="list-group-item">Sawing (Garment)</a>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="list-group">
              <h3>{{trans('app.list_of_state_region')}}</h3>  
              <a href="index.html" class="list-group-item">Yangon</a>
              <a href="about.html" class="list-group-item">Mandalay</a>
              <a href="services.html" class="list-group-item">Nay Pyi Taw</a>
              <a href="contact.html" class="list-group-item">Ayeyarwaddy</a>
              <a href="portfolio-1-col.html" class="list-group-item">Bago</a>
              <a href="portfolio-2-col.html" class="list-group-item">Kachin</a>
              <a href="portfolio-3-col.html" class="list-group-item">Kayah</a>
              <a href="portfolio-4-col.html" class="list-group-item">Kayin</a>
              <a href="portfolio-item.html" class="list-group-item">Magway</a>
              <a href="blog-home-1.html" class="list-group-item">Mon</a>
              <a href="blog-home-2.html" class="list-group-item">Rakhine</a>
              <a href="blog-post.html" class="list-group-item">Sagaing</a>
              <a href="full-width.html" class="list-group-item">Shan</a>
              <a href="sidebar.html" class="list-group-item active">Tanintharyi</a>
            </div>
          </div>
        </div>
        <!-- /.row -->         
    </div>
</main>

@endsection