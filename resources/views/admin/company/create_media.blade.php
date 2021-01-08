
<div class="col-md-12">
      <div class="form-group">
        <label><strong>Upload Image</strong></label><span class="text-danger">*</span><br>
        <input type="file" name="image_media[]" id="image_media" accept="image/*" multiple="" required="">
        {{ Form::hidden('media_path', COMPANY_UPLOAD) }}
    </div>
</div>

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