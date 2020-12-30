@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Create News
        </h1>
        <span class="breadcrumb"><a href='{{ route("new.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To News</a></span>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                {!! Form::open(array('route' => 'new.store','method'=>'POST')) !!}

                    <div class="form-group col-sm-12">
                        <label for="description">Select Category</label><span class="text-danger">*</span>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id}}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 mmtext">
                        {!! Form::label('title', 'Title(eng):') !!} <span class="text-danger">*</span>
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('title'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-sm-12 mmtext">
                        {!! Form::label('title', 'Title(mm):') !!} <span class="text-danger">*</span>
                        {!! Form::text('mm_title', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('mm_title'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('mm_title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-sm-12 mmtext">
                        {!! Form::label('content', 'Content(eng):') !!} <span class="text-danger">*</span>
                        <textarea id="content" class="form-control" name="content" rows="10" cols="50">{{Request::old('content')}}</textarea>
                        @if ($errors->has('content'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-sm-12 mmtext">
                        {!! Form::label('content', 'Content(mm):') !!} <span class="text-danger">*</span>
                        <textarea id="content" class="form-control" name="mm_content" rows="10" cols="50">{{Request::old('mm_content')}}</textarea>
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