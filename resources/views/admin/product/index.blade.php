@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Product
        </h1>
        <span class="breadcrumb"><a href='{{ route("product.create") }}' class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Create New Product</a></span>
    </section>
    <div class="content">
        <div class="row">
            <form method="GET">
                <div class="form-group col-sm-3 mmtext">
                    {!! Form::text('name', null, ['class' => 'form-control searchtitle', 'placeholder' => 'product name']) !!}
                </div>
                <div class="form-group col-sm-3 mmtext">
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{!! route('product.index') !!}" class="btn btn-info">Clear</a>
                <button type="submit" class="btn btn-primary btnSearch">Search</button>
            </form>
        </div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @if($products->isEmpty())
                    <div class="well text-center">No records were found.</div>
                @else
                    <table class="table table-striped table-hover tbl_repeat" id="sortable">
                        <thead>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Category Name</th>
                            <th>Recommend</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                        <?php $index = 1; ?>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{!! $product->name !!}</td>
                                <td>@if(0 !== $product->parent)
                                        {!! pName($product->parent) !!}
                                    @endif
                                </td>
                                <td>{!! $product->category->title !!}
                                <!-- <td>{!! $product->recommend!!}</td> -->
                                <td>{!!showPrettyStatus($product->recommend) !!}</td>
                                <td>
                                <a href="{!! route('product.edit', [$product->id]) !!}"
                                   class='btn btn-xs btn-primary'><i class="fa fa-check-square-o"></i>&nbsp;Edit</a>
                                <a href="#" type="button" data-id="{{ $product->id }}"
                                   class="btn btn-xs btn-danger" data-toggle="modal"
                                   data-url="{{ url('admin/product/'.$product->id) }}"
                                   data-target="#deleteFormModal"><i
                                        class="fa fa-trash-o"></i>&nbsp;Delete</a>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{ $products->appends($_GET)->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection