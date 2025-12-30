<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('inc.__admin_head')
</head>

<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="admin-sidebar" id="adminSidebar">
            <!-- Sidebar Header -->
            <div class="sidebar-header">
                <a href="{{ route('home') }}" class="sidebar-logo">
                    <img src="https://old.toshkentinvest.uz/tild3636-3735-4861-a236-666663383164/TIC_white.png" alt="Logo">
                </a>
                <button class="sidebar-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="sidebar-nav">
                <!-- Dashboard -->
                <div class="nav-section">
                    <div class="nav-section-title">Bosh sahifa</div>
                    <a href="{{ route('home') }}" class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </div>

                <!-- Content Management -->
                <div class="nav-section">
                    <div class="nav-section-title">Kontent boshqaruvi</div>
                    <a href="{{ route('admin.news.index') }}" class="nav-item {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper"></i>
                        <span>Yangiliklar</span>
                    </a>
                    <a href="{{ route('projects.index') }}" class="nav-item {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                        <i class="fas fa-building"></i>
                        <span>Loyihalar</span>
                    </a>
                    <a href="{{ route('admin.investment-projects.index') }}" class="nav-item {{ request()->routeIs('admin.investment-projects.*') ? 'active' : '' }}">
                        <i class="fas fa-coins"></i>
                        <span>Investitsiya loyihalari</span>
                    </a>
                    <a href="{{ route('admin.tenders.index') }}" class="nav-item {{ request()->routeIs('admin.tenders.*') ? 'active' : '' }}">
                        <i class="fas fa-handshake"></i>
                        <span>Tenderlar</span>
                    </a>
                </div>

                <!-- CRM Section -->
                <div class="nav-section">
                    <div class="nav-section-title">CRM</div>
                    <a href="{{ route('admin.vacancy-applications.index') }}" class="nav-item {{ request()->routeIs('admin.vacancy-applications.*') ? 'active' : '' }}">
                        <i class="fas fa-file-alt"></i>
                        <span>Ish arizalari</span>
                        @php $newApps = \App\Models\VacancyApplication::where('status', 'new')->count(); @endphp
                        @if($newApps > 0)
                        <span class="nav-badge" style="background: #f59e0b;">{{ $newApps }}</span>
                        @endif
                    </a>
                    <a href="{{ route('frontend.investoram') }}" target="_blank" class="nav-item">
                        <i class="fas fa-users"></i>
                        <span>Investorlar</span>
                        <span class="nav-badge">Sayt</span>
                    </a>
                    <a href="{{ route('admin.statistics') }}" class="nav-item {{ request()->routeIs('admin.statistics') ? 'active' : '' }}">
                        <i class="fas fa-chart-line"></i>
                        <span>Statistika</span>
                    </a>
                </div>

                @if (auth()->user() && auth()->user()->roles[0]->name == 'Super Admin')
                <!-- Administration -->
                <div class="nav-section">
                    <div class="nav-section-title">Administratsiya</div>
                    <a href="{{ route('userIndex') }}" class="nav-item {{ request()->is('user*') ? 'active' : '' }}">
                        <i class="fas fa-user-cog"></i>
                        <span>@lang('cruds.user.title')</span>
                    </a>
                    <a href="{{ route('roleIndex') }}" class="nav-item {{ request()->is('role*') ? 'active' : '' }}">
                        <i class="fas fa-user-shield"></i>
                        <span>@lang('cruds.role.fields.roles')</span>
                    </a>
                    <a href="{{ route('permissionIndex') }}" class="nav-item {{ request()->is('permission*') ? 'active' : '' }}">
                        <i class="fas fa-key"></i>
                        <span>@lang('cruds.permission.title_singular')</span>
                    </a>
                    <a href="#" class="nav-item">
                        <i class="fas fa-cog"></i>
                        <span>Sozlamalar</span>
                    </a>
                </div>
                @endif
            </nav>

            <!-- Sidebar Footer -->
            <div class="sidebar-footer">
                <img src="{{ asset('assets/images/avatar-dafault.png') }}" alt="User" class="sidebar-user-avatar">
                <div class="sidebar-user-info">
                    @if (auth()->user())
                    <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
                    <div class="sidebar-user-role">{{ auth()->user()->roles[0]->name ?? 'User' }}</div>
                    @endif
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="#" class="sidebar-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <!-- Header -->
            <header class="admin-header">
                <div class="header-left">
                    <button class="sidebar-toggle" onclick="toggleMobileSidebar()" style="display: none;">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-search">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Qidirish...">
                    </div>
                </div>

                <div class="header-right">
                    <!-- Notifications -->
                    <div class="dropdown" id="notificationDropdown">
                        <div class="header-action" onclick="toggleDropdown('notificationDropdown')">
                            <i class="fas fa-bell"></i>
                            <span class="badge">3</span>
                        </div>
                        <div class="dropdown-menu" style="width: 320px;">
                            <div style="padding: 16px; border-bottom: 1px solid var(--gov-border);">
                                <strong>Bildirishnomalar</strong>
                            </div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file-alt" style="color: var(--gov-primary);"></i>
                                <div>
                                    <div style="font-weight: 500;">Yangi hujjat yuklandi</div>
                                    <small style="color: var(--gov-text-muted);">2 daqiqa oldin</small>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-check-circle" style="color: var(--gov-success);"></i>
                                <div>
                                    <div style="font-weight: 500;">Loyiha tasdiqlandi</div>
                                    <small style="color: var(--gov-text-muted);">15 daqiqa oldin</small>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" style="justify-content: center; color: var(--gov-primary);">
                                Barchasini ko'rish
                            </a>
                        </div>
                    </div>

                    <!-- Language -->
                    <div class="dropdown" id="langDropdown">
                        <div class="header-lang" onclick="toggleDropdown('langDropdown')">
                            @if (session('locale') == 'uz')
                            <img src="{{ asset('assets/images/flags/uzbekistan.jpg') }}" alt="UZ">
                            <span>O'zbekcha</span>
                            @else
                            <img src="{{ asset('assets/images/flags/russia.jpg') }}" alt="RU">
                            <span>Русский</span>
                            @endif
                            <i class="fas fa-chevron-down" style="font-size: 10px; margin-left: 4px;"></i>
                        </div>
                        <div class="dropdown-menu">
                            <a href="{{ route('changelang', 'uz') }}" class="dropdown-item">
                                <img src="{{ asset('assets/images/flags/uzbekistan.jpg') }}" alt="UZ" style="width: 20px; height: 14px; border-radius: 2px;">
                                O'zbekcha
                            </a>
                            <a href="{{ route('changelang', 'ru') }}" class="dropdown-item">
                                <img src="{{ asset('assets/images/flags/russia.jpg') }}" alt="RU" style="width: 20px; height: 14px; border-radius: 2px;">
                                Русский
                            </a>
                        </div>
                    </div>

                    <!-- User -->
                    <div class="dropdown" id="userDropdown">
                        <div class="header-user" onclick="toggleDropdown('userDropdown')">
                            <img src="{{ asset('assets/images/avatar-dafault.png') }}" alt="User">
                            @if (auth()->user())
                            <span class="header-user-name">{{ auth()->user()->name }}</span>
                            @endif
                            <i class="fas fa-chevron-down" style="font-size: 10px;"></i>
                        </div>
                        <div class="dropdown-menu">
                            @if (auth()->user())
                            <a href="{{ route('userEdit', auth()->user()->id) }}" class="dropdown-item">
                                <i class="fas fa-cog"></i>
                                @lang('global.settings')
                            </a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" style="color: var(--gov-error);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                @lang('global.logout')
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="admin-content">
                <!-- Flash Messages -->
                @if (session('success'))
                <div class="admin-alert success fade-in">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                @if (session('error'))
                <div class="admin-alert danger fade-in">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
                @endif

                @if ($errors->any())
                <div class="admin-alert danger fade-in">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div>
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <!-- Page Content -->
                <div class="fade-in">
                    @yield('content')
                </div>
            </div>

            <!-- Footer -->
            <footer class="admin-footer">
                <p>&copy; {{ date('Y') }} <a href="https://toshkentinvest.uz" target="_blank">Tashkent Invest</a> - Barcha huquqlar himoyalangan</p>
                <p><i class="fas fa-code"></i> v2.0.0</p>
            </footer>
        </main>
    </div>

    <!-- Core Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        // Sidebar Toggle
        function toggleSidebar() {
            document.getElementById('adminSidebar').classList.toggle('collapsed');
        }

        function toggleMobileSidebar() {
            document.getElementById('adminSidebar').classList.toggle('open');
        }

        // Dropdown Toggle
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            const wasActive = dropdown.classList.contains('active');

            // Close all dropdowns
            document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('active'));

            // Toggle clicked dropdown
            if (!wasActive) {
                dropdown.classList.add('active');
            }
        }

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('active'));
            }
        });

        // Auto-hide alerts
        setTimeout(function() {
            document.querySelectorAll('.admin-alert').forEach(function(alert) {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-10px)';
                setTimeout(() => alert.remove(), 300);
            });
        }, 5000);

        // Responsive sidebar
        function handleResize() {
            const sidebar = document.getElementById('adminSidebar');
            const toggleBtn = document.querySelector('.header-left .sidebar-toggle');
            if (window.innerWidth <= 992) {
                sidebar.classList.remove('collapsed');
                if (toggleBtn) toggleBtn.style.display = 'flex';
            } else {
                sidebar.classList.remove('open');
                if (toggleBtn) toggleBtn.style.display = 'none';
            }
        }

        window.addEventListener('resize', handleResize);
        handleResize();
    </script>

    @yield('scripts')
</body>

</html>
