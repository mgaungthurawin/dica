@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Create Location
        </h1>
        <span class="breadcrumb"><a href='{{ route("location.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To Location</a></span>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                {!! Form::open(['route' => 'location.store', 'files' => 'true']) !!}

                    <div class="form-group col-sm-12">
                        {!! Form::label('parent', 'Parent:') !!} <span class="text-danger">*</span>
                        <select class="form-control" name="parent">
                            <option value="0">Select One</option>
                            @foreach($locations as $location)
                                <option value="{{$location->id}}">{{$location->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('name'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                       @endif
                    </div>
                    <div class="form-group col-sm-12">
                       {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                       <a href="{!! route('location.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
               {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection