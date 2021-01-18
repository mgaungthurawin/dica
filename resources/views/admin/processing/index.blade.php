@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Main Processing
        </h1>
        <span class="breadcrumb"><a href="{{ url('/admin/processing/add') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Create Main Processing</a></span>
    </section>
    <div class="content">
        <div class="row">
            <form method="GET">
                <div class="form-group col-sm-3 mmtext">
                    {!! Form::text('name', null, ['class' => 'form-control searchtitle', 'placeholder' => 'News']) !!}
                </div>
                <a href="{!! route('new.index') !!}" class="btn btn-info">Clear</a>
                <button type="submit" class="btn btn-primary btnSearch">Search</button>
            </form>
        </div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <!-- Flash -->  
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">

                <table class="table table-striped table-hover tbl_repeat" id="sortable">
                    <thead>
                        <th>No.</th>
                        <th>Mian Process</th>
                        <th>Recommend</th>
                        <th>Mian Classification</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                    <?php $index = 1; ?>
                    @foreach($processings as $processing)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{!! $processing->main_process !!}</td>
                            <td>{!!showPrettyStatus($processing->recommend) !!}</td>
                            <td>{!!showPrettyStatus($processing->main_classification) !!}</td>
                            <td>
                            <a href='{{ url("admin/processing/edit/$processing->id") }}'
                               class='btn btn-xs btn-primary'><i class="fa fa-check-square-o"></i>&nbsp;Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {{ $processings->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection