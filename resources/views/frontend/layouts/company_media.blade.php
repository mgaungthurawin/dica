<?php
	$medias = getAllMedia($company->id, COMPANY_UPLOAD)
?>



    <div class="row">
        <div class="col-lg-12 mb-12">
            <div class="container-box ">
            	@foreach($medias as $media)
            	    <?php
            	    $img_ext = array("jpg", "gif", "png", "jpeg");
            	    ?>
            	    @if(in_array($media->file_type, $img_ext))
                <div class="col-lg-4 col-sm-6 portfolio-item item-image">
                  @if(isset($media))
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="{{ asset($media->file_path . $media->file_name) }}" alt=""></a>
                    </div>
                  @endif
                </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>


