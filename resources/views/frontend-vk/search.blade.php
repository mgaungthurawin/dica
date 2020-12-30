@extends('frontend.layouts.app')
@section('content')
<main class="page_main_wrapper">            
    <div class="container">    
        <div class="row">
            <h2 style="text-align: center;">{{trans('app.database_on_potential')}}</h2>

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
                    <p>This database provides information of potential supplier companies in Myanmar in three sectors, namely, Material Processing, Textile and Food Processing Industry. Companies in this database are selected by MoPFI with assistance of JICA project team.
                    Notes for using database</p>
                    <ol>
                        <li>The information of this database is based on the information provided by each company to JICA Project and/ or MOPFI.</li>
                        <li>Credibility check is not implemented. This website just show the information provided by each company.</li>
                        <li>Photos for products, production process and machines, etc. are posted in this website.</li>
                        <li>The classification items of product and processing are based on the major field of each company.</li>
                        <li>The list of machines and equipment posted in each company are the major machines and equipment only.</li>
                        <li>Production environments, technologies, etc. of a company are checked by interview survey after the company provided information. If you find any difference between actual information and the information on this website, kindly inform us.</li>
                    </ol>
                </div>
            </div>
        </div>        
        <!-- /.row -->         
    </div>
</main>
 @endsection