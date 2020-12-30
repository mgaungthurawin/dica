@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <h1>
            Create User
        </h1>
        <span class="breadcrumb"><a href='{{ route("user.index") }}' class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To User</a></span>
    </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    {!! Form::open(array('route' => 'user.store','method'=>'POST')) !!}
                        <div class="form-group col-sm-6 mmtext">
                            {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-sm-6 mmtext">
                            {!! Form::label('email', 'Email:') !!} <span class="text-danger">*</span>
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-sm-6 mmtext">
                            {!! Form::label('password', 'Password:') !!} <span class="text-danger">*</span>
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            @if ($errors->has('password'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-sm-6 mmtext">
                            <strong>Confirm Password:</strong>
                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            @if ($errors->has('confirm-password'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('confirm-password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <input type="hidden" name="user_type" value="ADMIN">
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('user.index') !!}" class="btn btn-default">Cancel</a>
                        </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection