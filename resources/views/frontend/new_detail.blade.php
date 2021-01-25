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