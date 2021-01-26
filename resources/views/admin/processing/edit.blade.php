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
                    <div class="form-group col-sm-6">
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
                    <div class="form-group col-sm-6">
                        {!! Form::label('main_process', 'Main Process:') !!} <span class="text-danger">*</span>
                        {!! Form::text('main_process', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('main_process'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('main_process') }}</strong>
                            </span>
                       @endif
                    </div>
                    <div class="form-group col-sm-6 mmtext">
                        {!! Form::label('sorting', 'sorting:') !!} <span class="text-danger">*</span>
                        {!! Form::number('sorting', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="description">Product ()</label><br/>
                        <select class="form-control" name="product_string[]" id="product_string" multiple="">
                            @foreach($products as $product)
                                <option value="{{ $product->id}}"
                                  @if(NULL !== $selected_product)
                                    @if(in_array($product->id, $selected_product))
                                      selected
                                    @endif
                                  @endif
                                  >{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="recommend">Recommend</label>
                        <input type="checkbox" value="1" id="recommend" name="recommend"
                          @if($processing->recommend)
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