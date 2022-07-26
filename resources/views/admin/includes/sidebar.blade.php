<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard.index') }}" class="brand-link">
        <span style="opacity: .8; font-weight: bold">ITWK </span>
        <span class="brand-text font-weight-light">| {{ __('blog.admin-panel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('blog.dashboard') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blog.category.index') }}" class="nav-link {{ request()->routeIs('admin.blog.category.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>
                            {{ __('blog.categories') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blog.tag.index') }}" class="nav-link {{ request()->routeIs('admin.blog.tag.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            {{ __('blog.tags') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blog.post.index') }}" class="nav-link {{ request()->routeIs('admin.blog.post.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clone"></i>
                        <p>
                            {{ __('blog.posts') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('auth.users') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.role.index') }}" class="nav-link {{ request()->routeIs('admin.role.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>
                            {{ __('auth.roles') }}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
