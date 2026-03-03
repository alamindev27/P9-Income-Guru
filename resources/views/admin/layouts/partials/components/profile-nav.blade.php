<li class="nav-item">
    <a class="nav-link {{ Request::url() == route('admin.profile.index') ? 'active' : '' }}" href="{{ route('admin.profile.index') }}">Edit Profile</a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::url() == route('admin.setting.edit') ? 'active' : '' }}" href="{{ route('admin.setting.edit') }}">Setting</a>
</li>

<li class="nav-item">
    <a class="nav-link " href="">Meta Setting</a>
</li>

<li class="nav-item">
    <a class="nav-link " href="">Security Setting</a>
</li>

