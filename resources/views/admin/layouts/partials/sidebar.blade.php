<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-inbox"></i>
                        <span class="hide-menu">Inbox </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="inbox-email.html" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu"> Email </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="inbox-email-detail.html" class="sidebar-link">
                                <i class="mdi mdi-email-alert"></i>
                                <span class="hide-menu"> Email Detail </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="inbox-email-compose.html" class="sidebar-link">
                                <i class="mdi mdi-email-secure"></i>
                                <span class="hide-menu"> Email Compose </span>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link " href="{{ route('admin.dashboard') }}"
                        aria-expanded="false">
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link " href="{{ route('admin.promos.index') }}"
                        aria-expanded="false">
                        <span class="hide-menu">Promos</span>
                    </a>
                </li>




                {{-- <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                        <span class="hide-menu">Log Out</span>
                    </a>
                </li> --}}
            </ul>
        </nav>

    </div>

</aside>
