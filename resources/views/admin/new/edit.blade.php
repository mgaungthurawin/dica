@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Edit News
        </h1>
        <span class="breadcrumb"><a href='{{ route("new.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To News</a></span>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                {!! Form::model($new, ['route' => ['new.update', $new->id], 'method' => 'patch']) !!}

                    <div class="form-group col-sm-12">
                        <label for="description">Edit Category</label><br/>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    @if($category->id == $new->category_id) selected @endif>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 mmtext">
                        {!! Form::label('title', 'Title(eng):') !!} <span class="text-danger">*</span>
                        <input type="text" name="title" value="{{ en($new->title) }}" class="form-control">
                        @if ($errors->has('title'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-sm-12 mmtext">
                        {!! Form::label('title', 'Title(mm):') !!} <span class="text-danger">*</span>
                        <input type="text" name="mm_title" value="{{ mm($new->title) }}" class="form-control">
                        @if ($errors->has('mm_title'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('mm_title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('content', 'Content(eng):') !!} <span class="text-danger">*</span>
                        <textarea name="content" class="form-control" rows="10" cols="50">{{ en($new->content) }}</textarea>
                         @if ($errors->has('content'))
                             <span class="text-danger">
                                 <strong>{{ $errors->first('content') }}</strong>
                             </span>
                        @endif
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('content', 'Content:(mm)') !!} <span class="text-danger">*</span>
                        <textarea name="mm_content" class="form-control" rows="10" cols="50">{{ mm($new->content) }}</textarea>
                         @if ($errors->has('mm_content'))
                             <span class="text-danger">
                                 <strong>{{ $errors->first('mm_content') }}</strong>
                             </span>
                        @endif
                    </div>

                    <div class="form-group col-sm-12">
                       {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                       <a href="{!! route('new.index') !!}" class="btn btn-default">Cancel</a>
                    </div>

               {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection