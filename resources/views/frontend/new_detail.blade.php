@extends('frontend.layouts.app')
@section('content')
<div class="whole-wrap"> 
    <section class="blog_area single-post-area section-padding">
      <div class="container">
      	<div class="col-lg-12">
               <div class="blog_right_sidebar service-category">
               		<div class="media post_item">
                        <div class="media-body">
                        	<center>
                              	<h3>{{ languageSwitcher($newdetail->title) }}</h3>
                              	
                              	 @if($newdetail->media) 
			                       <img class="card-img-top" src="{{ asset($newdetail->media->file_path . $newdetail->media->file_name) }}" alt="">
			                    @endif
                              	<p>{{ languageSwitcher($newdetail->content) }}</p>
                           		<p>
                           			<small>
                           				{{ $newdetail->created_at->diffForHumans() }}
                           			</small>
                           		</p>
                           </center>
                        </div>
                     </div>
                     <hr>
               </div>
            </div>
         </div>
      </div>
    </section>
</div>
@endsection