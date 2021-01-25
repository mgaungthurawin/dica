

   <!--slide--> 
     <div class="container">
        <div class="row">
            <div class="text-center full-width">
                <h3 class="mb-5">{{trans('app.matching_service_program_news')}} </h3>
            </div>
            
            <!-- <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div> -->
           
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                            @if(!empty($news))
                                @foreach($news as $new)
                               
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        @if($new->media)
                                            <img class="img-fluid" alt="100%x280" src="{{ asset($new->media->file_path . $new->media->file_name) }}">
                                        @else
                                            <img class="img-fluid" alt="100%x280" src="{{ asset('images/default_preview.png')}}">
                                        @endif
                                        <div class="card-body">
                                            <h4 class="card-title">{{ languageSwitcher($new->title) }}</h4>
                                            <p class="card-text">{{ languageSwitcher($new->content) }}</p>
                                            <span class="read-morebtn"><a href="{{url($new->id.'/new_detail')}}"class="btn btn-primary outline-btn">{{trans('app.learn_more')}}</a></span>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                             @endif

                            </div>
                            <!-- {{$news->count()}} -->
                        </div>
                        <!-- <div class="carousel-item ">
                            <div class="row">
                            @if(!empty($news))
                                @foreach($news as $new)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532781914607-2031eca2f00d?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ languageSwitcher($new->title) }}</h4>
                                            <p class="card-text">{{ languageSwitcher($new->content) }}</p>
                                            <a href="{{url('new_detail')}}"class="btn btn-primary outline-btn">{{trans('app.learn_more')}}</a>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                             @endif

                            </div>
                        </div> -->
                        
                    </div>
                </div>
            </div>
        </div>
       
    </div>
<!--end slide-->


