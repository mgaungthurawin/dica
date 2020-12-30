@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            News
        </h1>
        <span class="breadcrumb"><a href='{{ route("new.create") }}' class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Create News</a></span>
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
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">

                <table class="table table-striped table-hover tbl_repeat" id="sortable">
                    <thead>
                        <th>No.</th>
                        <th>Category Name</th>
                        <th>Title</th>
                        <th>MM Title</th>
                        <th>Content</th>
                        <th>En Content</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                    <?php $index = 1; ?>
                    @foreach($news as $new)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{!! $new->category->title !!}</td>
                            <td>{!! en($new->title) !!}</td>
                            <td>{!! mm($new->title) !!}</td>
                            <td>{!! en($new->content) !!}</td>
                            <td>{!! mm($new->content) !!}</td>
                            <td>
                            <a href="{!! route('new.edit', [$new->id]) !!}"
                               class='btn btn-xs btn-primary'><i class="fa fa-check-square-o"></i>&nbsp;Edit</a>
                            <a href="#" type="button" data-id="{{ $new->id }}"
                               class="btn btn-xs btn-danger" data-toggle="modal"
                               data-url="{{ url('admin/new/'.$new->id) }}"
                               data-target="#deleteFormModal"><i
                                    class="fa fa-trash-o"></i>&nbsp;Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {{ $news->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection