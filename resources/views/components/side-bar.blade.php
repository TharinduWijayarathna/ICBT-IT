<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header text-center">
            <a class="navbar-brand text-primary" href="{{ url('/') }}">
                <img src="{{ asset('img/logo/logo2.png') }}" alt="homepage" class="dark-logo" />
            </a>
        </div>
        <div class="navbar-inner ">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url, ['my-documents.all', 'my-documents.view']) ? 'active' : '' }}"
                            href="{{ route('my-documents.all') }}">
                            <i class="fas fa-folder-open" aria-hidden="true"></i>
                            <span class="hide-menu">My Documents</span>
                        </a>
                    </li>

                    @can('read_documents')
                        <li class="nav-item">
                            <a class="nav-link {{ in_array($curr_url, ['documents.all', 'documents.edit']) ? 'active' : '' }}"
                                href="{{ route('documents.all') }}">
                                <i class="fas fa-folder-plus" aria-hidden="true"></i>
                                <span class="hide-menu">Document Management</span>
                            </a>
                        </li>
                    @endcan
                    @can('read_daily_report')
                        <li class="nav-item">
                            <a class="nav-link {{ in_array($curr_url, ['report.all']) ? 'active' : '' }}"
                                href="{{ route('report.all') }}">
                                <i class="fas fa-print" aria-hidden="true"></i>
                                <span class="hide-menu">Daily Report</span>
                            </a>
                        </li>
                    @endcan
                    @can('read_users')
                        <li class="nav-item">
                            <a class="nav-link {{ in_array($curr_url, ['users.all', 'users.edit']) ? 'active' : '' }}"
                                href="{{ route('users.all') }}">
                                <i class="fas fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">User Management</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
</nav>
