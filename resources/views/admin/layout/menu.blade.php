<li class="{{ Request::is('user*') ? 'active' : '' }}">
    <a href="{{ route('user.index') }}"><i class="fa fa-edit"></i><span>User</span></a>
</li>
<li class="{{ Request::is('location*') ? 'active' : '' }}">
    <a href="{{ route('location.index') }}"><i class="fa fa-edit"></i><span>Location</span></a>
</li>
<li class="{{ Request::is('category*') ? 'active' : '' }}">
    <a href="{{ route('category.index') }}"><i class="fa fa-edit"></i><span>Industries</span></a>
</li>
<li class="{{ Request::is('product*') ? 'active' : '' }}">
    <a href="{{ route('product.index') }}"><i class="fa fa-edit"></i><span>Product</span></a>
</li>
<li class="{{ Request::is('new*') ? 'active' : '' }}">
    <a href="{{ route('new.index') }}"><i class="fa fa-edit"></i><span>News</span></a>
</li>
<li class="{{ Request::is('processing*') ? 'active' : '' }}">
    <a href="{{ url('admin/processing') }}"><i class="fa fa-edit"></i><span>Main Processing</span></a>
</li>
<li class="{{ Request::is('company*') ? 'active' : '' }}">
    <a href="{{ route('company.index') }}"><i class="fa fa-edit"></i><span>Company</span></a>
</li>
{{--<li class="{{ Request::is('material*') ? 'active' : '' }}">
    <a href="{{ url('admin/'.MATERIAL.'/create') }}"><i class="fa fa-edit"></i><span>Material Processing</span></a>
</li>
<li class="{{ Request::is('material*') ? 'active' : '' }}">
    <a href="{{ url('admin/'.TEXTILE.'/create') }}"><i class="fa fa-edit"></i><span>Textile</span></a>
</li>
<li class="{{ Request::is('material*') ? 'active' : '' }}">
    <a href="{{ url('admin/'.FOOD.'/create') }}"><i class="fa fa-edit"></i><span>Food Processing</span></a>
</li>--}}


