<ul class="nav nav-tabs">
    <li class="nav-item active">
        <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="#">
            Summary
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
            Users
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/roles') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
            Roles
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/permissions') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}">
            Permissions
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
    </li>
</ul>
