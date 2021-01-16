@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Locations
        </h1>
        <span class="breadcrumb"><a href='{{ route("location.create") }}' class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Create New Location</a></span>
    </section>
    <div class="content">
        <div class="row">
            <form method="GET">
                <div class="form-group col-sm-3 mmtext">
                    {!! Form::text('name', null, ['class' => 'form-control searchtitle', 'placeholder' => 'location']) !!}
                </div>
                <a href="{!! route('location.index') !!}" class="btn btn-info">Clear</a>
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
                        <th>Name</th>
                    </thead>
                    <tbody>
                    <?php $index = 1; ?>
                    @foreach($locations as $location)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{!! $location->name !!}</td>
                            <td>
                            <a href="{!! route('location.edit', [$location->id]) !!}"
                               class='btn btn-xs btn-primary'><i class="fa fa-check-square-o"></i>&nbsp;Edit</a>
                            <a href="#" type="button" data-id="{{ $location->id }}"
                               class="btn btn-xs btn-danger" data-toggle="modal"
                               data-url="{{ url('admin/location/'.$location->id) }}"
                               data-target="#deleteFormModal"><i
                                    class="fa fa-trash-o"></i>&nbsp;Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {{ $locations->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection