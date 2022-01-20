<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" src="{!! asset('frontend/img/logo.png') !!}" width="100%"/>
                </div>
                <div class="logo-element">
                    VMG+
                </div>
            </li>
            <li class="{{ check_route('users') }}">
                <a href="{{ url('admin/users') }}">
                    <i class="menu menu_user fa fa-user-circle-o"></i>
                    <span class="nav-label">Users</span>
                </a>
            </li>
            <li class="{{ check_route('faqs') }}">
                <a href="{{ url('admin/faqs') }}">
                    <i class="menu menu_user fa fa-question-circle-o"></i>
                    <span class="nav-label">FAQ'S</span>
                </a>
            </li>
            <li class="{{ check_route('terms') }}">
                <a href="{{ url('admin/terms') }}">
                    <i class="menu menu_user fa fa-navicon"></i>
                    <span class="nav-label">Terms of Use</span>
                </a>
            </li>
            <li class="{{ check_route('policy') }}">
                <a href="{{ url('admin/policy') }}">
                    <i class="menu menu_user fa fa-navicon"></i>
                    <span class="nav-label">Privacy Policy</span>
                </a>
            </li>
        </ul>

    </div>
</nav>
