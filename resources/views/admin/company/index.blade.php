@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Company
        </h1>
        <span class="breadcrumb"><a href='{{ route("company.create") }}' class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Create New Company</a></span>
    </section>
    <div class="content">
        <div class="row">
            <form method="GET">
                <div class="form-group col-sm-3">
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    {!! Form::text('product', null, ['class' => 'form-control searchtitle', 'placeholder' => 'Company']) !!}
                </div>
                <a href="{!! route('company.index') !!}" class="btn btn-info">Clear</a>
                <button type="submit" class="btn btn-primary btnSearch">Search</button>
            </form>
        </div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @if($companies->isEmpty())
                    <div class="well text-center">No records were found.</div>
                @else
                    <table class="table table-striped table-hover tbl_repeat" id="sortable">
                        <thead>
                            <th>No.</th>
                            <th>Category Name</th>
                            <th>Company English Name</th>
                            <th>Company Myanmar Name</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                        <?php $index = 1; ?>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{!! $company->category->title !!}</td>
                                <td>{!! $company->name !!}</td>
                                <td>{!! $company->mm_name !!}</td>
                                <td>
                                <a href="{!! route('company.edit', [$company->id]) !!}"
                                   class='btn btn-xs btn-primary'><i class="fa fa-check-square-o"></i>&nbsp;Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{ $companies->appends($_GET)->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection