<li class="nav-item">
    <a class="nav-link {{ Request::url() == route('admin.profile.index') ? 'active' : '' }}" href="{{ route('admin.profile.index') }}">Edit Profile</a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::url() == route('admin.setting.edit') ? 'active' : '' }}" href="{{ route('admin.setting.edit') }}">Setting</a>
</li>

<li class="nav-item">
    <a class="nav-link " href="{{ route('admin.setting.security.edit') }}">Security Setting</a>
</li>

