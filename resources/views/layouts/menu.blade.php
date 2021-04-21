<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('admin.main')}}">
        <i class=" fas fa-building"></i><span>Planetarium</span>
    </a>
</li>
<li class="side-menus {{ Request::is('menus*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('menus.index') }}"><i class="fas fa-building"></i><span>Меню</span></a>
</li>

<li class="side-menus {{ Request::is('statuses*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('statuses.index') }}"><i class="fas fa-building"></i><span>Статус заказа</span></a>
</li>

<li class="side-menus {{ Request::is('orders*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('orders.index') }}"><i class="fas fa-building"></i><span>Заказы</span></a>
</li>

