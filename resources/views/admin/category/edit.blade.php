@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Edit  Industries
        </h1>
        <span class="breadcrumb"><a href='{{ route("category.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To  Industries</a></span>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                {!! Form::model($category, ['method' => 'PATCH','route' => ['category.update', $category->id], 'files' => 'true' ]) !!}
                    <div class="form-group col-sm-6">
                        <label>Prefix</label>
                        <select name="prefix" class="form-control">
                            <option value="{{ MATERIAL }}"
                                @if("20" == $category["prefix"])
                                        selected
                                      @endif>MATERIAL
                            </option>
                            <option value="{{ TEXTILE }}"
                                @if("21" == $category["prefix"])
                                        selected
                                      @endif>TEXTILE
                            </option>
                            <option value="{{ FOOD }}"
                                @if("22" == $category["prefix"])
                                        selected
                                      @endif>FOOD
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('title', 'Title:') !!} <span class="text-danger">*</span>
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('title'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                       @endif
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('description', 'Description:') !!} <span class="text-danger">*</span>
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '19', 'cols' => '50']) !!}
                         @if ($errors->has('description'))
                             <span class="text-danger">
                                 <strong>{{ $errors->first('description') }}</strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-md-6">
                          <div class="form-group">
                            <label><strong>Edit Image</strong></label><span class="text-danger">*</span><br>
                            <input type="file" name="image_media" id="image_media" accept="image/*" required="">
                            {{ Form::hidden('media_path', 'CATEGORY_UPLOAD') }}
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                       {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                       <a href="{!! route('category.index') !!}" class="btn btn-default">Cancel</a>
                    </div>

               {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/css/fileinput.min.css" media="all"
              rel="stylesheet" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/js/fileinput.min.js"></script>
    <script>
        var preview_image = "<?php echo url('images/default_preview.png') ?>";
        var initPreview = "<?php echo null != $category->media ? url($category->media->file_path . $category->media->file_name) : url('img/default_preview.png') ?>";
        var initPreviewAlt = "<?php echo null != $category->media ? $category->media->file_caption : '' ?>";
        var dataId = "<?php echo null != $category->media ? $category->media->id : '' ?>";
        var dataUrl = "<?php echo null != $category->media ? url('admin/media/' . $category->media->id) : '' ?>";
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
            initialPreview: [
                @if(isset($category->media))
                   '<img src="' + initPreview + '" class="file-preview-image" alt="' + initPreviewAlt + '" title="' + initPreviewAlt + '" style="width:200px;height:200px">'
                @endif
            ],
            defaultPreviewContent: '<img src="' + preview_image + '" alt="Your Avatar" class="img-rounded" style="width:250px">',
            layoutTemplates: {main2: '{preview} ' + ' {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });

        $('.kv-file-remove').attr('data-target', '#deleteMediaModal');
        $('.kv-file-remove').attr('data-id', dataId);
        $('.kv-file-remove').attr('data-url', dataUrl);
        $('.kv-file-remove').attr('data-toggle', 'modal');
    </script>
@endsection