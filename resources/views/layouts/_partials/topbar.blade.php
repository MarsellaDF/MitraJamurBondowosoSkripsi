<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" data-bs-toggle="dropdown">
                    <img src="{{ asset('backend/img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded me-1"
                        alt="Admin" /> <span class="text-dark">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('profile.edit', auth()->user()->id) }}"
                        data-toggle="dropdown"><i class="align-middle me-1" data-feather="user"></i>
                        Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                            class="fa fa-power-off"></i>Logout</a>

                </div>
            </li>
        </ul>
    </div>
</nav>
