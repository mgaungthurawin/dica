@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Edit Main Processing
        </h1>
        <span class="breadcrumb"><a href='{{ url("admin/processing") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To Edit Main Processing</a></span>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                {!! Form::model($processing, ['url' => ['admin/processing/edit', $processing->id], 'method' => 'post']) !!}
                    <div class="form-group col-sm-4">
                        <label>Prefix</label>
                        <select name="prefix" class="form-control">
                            <option value="{{ MATERIAL }}"
                             @if(MATERIAL == $processing["prefix"])
                                  selected
                                @endif
                                >MATERIAL
                                
                            </option>
                            <option value="{{ TEXTILE }}"
                             @if(TEXTILE == $processing["prefix"])
                                  selected
                                @endif>TEXTILE
                                
                            </option>
                            <option value="{{ FOOD }}"
                             @if(FOOD == $processing["prefix"])
                                  selected
                                @endif>FOOD
                                
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('main_process', 'Main Process:') !!} <span class="text-danger">*</span>
                        {!! Form::text('main_process', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('main_process'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('main_process') }}</strong>
                            </span>
                       @endif
                    </div>
                    <div class="form-group col-sm-4 mmtext">
                        {!! Form::label('sorting', 'sorting:') !!} <span class="text-danger">*</span>
                        {!! Form::number('sorting', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('sorting'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('sorting') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="recommend">Recommend</label>
                        <input type="checkbox" value="1" id="recommend" name="recommend"
                          @if($processing->recommend)
                            checked
                          @endif
                        >  
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="main_classification">Main Classification</label>
                        <input type="checkbox" value="1" id="main_classification" name="main_classification"
                          @if($processing->main_classification)
                            checked
                          @endif
                        >  
                    </div>
                    <div class="form-group col-sm-12">
                       {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                       <a href="{{ url('admin/processing') }}" class="btn btn-default">Cancel</a>
                    </div>

               {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection