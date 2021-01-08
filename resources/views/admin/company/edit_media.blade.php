<?php
    $medias = getAllMedia($company->id, COMPANY_UPLOAD);
?>
<div class="box-footer">
    <ul class="mailbox-attachments clearfix">
        @foreach($medias as $media)
            <?php
            $img_ext = array("jpg", "gif", "png", "jpeg");
            ?>
            @if(in_array($media->file_type, $img_ext))
                <li>
                    <span class="mailbox-attachment-icon has-img "><img
                            src="{{ url($media->file_path.$media->file_name) }}"
                            alt="{{ str_limit(strip_tags($media->file_caption), 20) }}"
                            style="height:140px"></span>
                    <div
                        class="mailbox-attachment-info"> {{ str_limit(strip_tags($media->file_caption), 20) }}</a>
                    <span class="mailbox-attachment-size">
                    {{ fileSizeFormat($media->file_size)}}
                    <a href="#" type="button" class="btn btn-danger btn-xs pull-right"
                       data-id="{{$media->id}}" data-toggle="modal"
                       data-url="{{ url('admin/media/'.$media->id) }}"
                       data-target="#deleteMediaModal"><i
                            class="fa fa-trash-o"></i></a>
                    </span>
                    </div>
                </li>
            @else
                <li>
        <span class="mailbox-attachment-icon has-img ">
            <video controls style="height:110px; width: 140px;">
                <source src="{{ url($media->file_path.$media->file_name) }}"
                        type="video/mp4">
                <source src="{{ url($media->file_path.$media->file_name) }}"
                        type="video/ogg">
              Your browser does not support the video tag.
            </video>
        </span>
                    <div
                        class="mailbox-attachment-info">{{ str_limit(strip_tags($media->file_caption), 20) }}</a>
        <span class="mailbox-attachment-size">{{ fileSizeFormat($media->file_size)}}
            <a href="#" type="button" class="btn btn-danger btn-xs pull-right"
           data-id="{{$media->id}}" data-toggle="modal"
           data-url="{{ url('admin/media/'.$media->id) }}"
           data-target="#deleteMediaModal"><i
                class="fa fa-trash-o"></i></a>
        </span>
                    </div>
                </li>
            @endif
        @endforeach
    </ul>
</div>

<div class="col-md-12">
      <div class="form-group">
        <label><strong>Upload Image</strong></label><span class="text-danger">*</span><br>
        <input type="file" name="image_media[]" id="image_media" accept="image/*" multiple="" required="">
        {{ Form::hidden('media_path', COMPANY_UPLOAD) }}
    </div>
</div>
<input type="hidden" name="medias" value="{{ $medias }}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/js/fileinput.min.js"></script>
<script>
    var preview_image = "<?php echo url('images/default_preview.png') ?>";
    $("#image_media").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: true,
        showUpload: false,
        browseLabel: 'Browse File',
        removeLabel: 'Remove File',
        uploadUrl: "/file-upload-batch/2",
        browseIcon: '<i class="fa fa-cloud-upload"></i>',
        removeIcon: '<i class="fa fa-trash-o"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<img src="' + preview_image + '" alt="Your Avatar" class="img-rounded" style="width:250px">',
        layoutTemplates: {main2: '{preview} ' + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
</script>