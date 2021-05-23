<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('admin.main')}}">
        <i class="fas fa-chart-line"></i><span>Статистика</span>
    </a>
</li>

<li class="side-menus {{ Request::is('orders*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('orders.index') }}"><i class="fas fa-cash-register"></i><span>Заказы</span></a>
</li>

<li class="side-menus {{ Request::is('menus*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('menus.index') }}"><i class="fas fa-bars"></i></i><span>Меню</span></a>
</li>

<li class="side-menus {{ Request::is('statuses*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('statuses.index') }}"><i class="fas fa-palette"></i><span>Статус заказа</span></a>
</li>



