
<ul class="nav nav-tabs">
    <li class="nav-item active">
        <a class="nav-link {{ Request::is('community_home') ? 'active':''}}" href="#">
            Home
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('institution') ? 'active':''}}" href="{{route('institution')}}">
            Institution
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('department') ? 'active':''}}" href="{{route('department')}}">
            Department
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('directorate') ? 'active':''}}" href="{{route('directorate')}}">
            Directorate
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link disabled"
           href="#">Disabled</a>
    </li>
</ul>

