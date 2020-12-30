@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
            Admin User
        </h1>
        <span class="breadcrumb"><a href='{{ route("user.create") }}' class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Create New User</a></span>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @if($users->isEmpty())
                    <div class="well text-center">No records were found.</div>
                @else
                    <table class="table table-striped table-hover tbl_repeat" id="sortable">
                        <thead>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                        <?php $index = 1; ?>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td>{!! $user->user_type !!}</td>
                                <td>
                                <a href="{!! route('user.edit', [$user->id]) !!}"
                                   class='btn btn-xs btn-primary'><i class="fa fa-check-square-o"></i>&nbsp;Edit</a>
                                <a href="#" type="button" data-id="{{ $user->id }}"
                                   class="btn btn-xs btn-danger" data-toggle="modal"
                                   data-url="{{ url('admin/user/'.$user->id) }}"
                                   data-target="#deleteFormModal"><i
                                        class="fa fa-trash-o"></i>&nbsp;Delete</a>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{ $users->appends($_GET)->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection