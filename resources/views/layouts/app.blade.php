<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'ERP Factory')</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body>

<div
    class="app"
    x-data="{
        sidebarOpen: true,
        mobileSidebar: false,
        userMenu: false
    }"
>

    {{-- Sidebar --}}
    <aside
        class="sidebar"
        :class="{
            'sidebar-collapsed': !sidebarOpen,
            'sidebar-mobile-open': mobileSidebar
        }"
    >

        <div class="sidebar-header">

            <a href="{{ url('/') }}" class="brand">
                <div class="brand-logo">
                    E
                </div>

                <div
                    class="brand-text"
                    x-show="sidebarOpen"
                    x-transition
                >
                    <strong>ERP Factory</strong>
                    <span>سیستم مدیریت کارخانه</span>
                </div>
            </a>

        </div>


        <nav class="sidebar-nav">

            <a
                href="{{ route('dashboard') }}"
                class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >
                <span class="nav-icon">⌂</span>

                <span x-show="sidebarOpen">
                    داشبورد
                </span>
            </a>


            <div class="nav-title" x-show="sidebarOpen">
                مدیریت ارتباط با مشتری
            </div>


            <a href="#" class="nav-item">

                <span class="nav-icon">♙</span>

                <span x-show="sidebarOpen">
                    مشتریان
                </span>

            </a>


            <a href="#" class="nav-item">

                <span class="nav-icon">◎</span>

                <span x-show="sidebarOpen">
                    سرنخ‌ها
                </span>

            </a>


            <a href="#" class="nav-item">

                <span class="nav-icon">◇</span>

                <span x-show="sidebarOpen">
                    فرصت‌های فروش
                </span>

            </a>


            <div class="nav-title" x-show="sidebarOpen">
                فروش
            </div>


            <a href="#" class="nav-item">

                <span class="nav-icon">▤</span>

                <span x-show="sidebarOpen">
                    پیش‌فاکتورها
                </span>

            </a>


            <a href="#" class="nav-item">

                <span class="nav-icon">▣</span>

                <span x-show="sidebarOpen">
                    سفارش‌ها
                </span>

            </a>


            <a href="#" class="nav-item">

                <span class="nav-icon">□</span>

                <span x-show="sidebarOpen">
                    محصولات
                </span>

            </a>


            <div class="nav-title" x-show="sidebarOpen">
                مدیریت
            </div>


            <a href="#" class="nav-item">

                <span class="nav-icon">✓</span>

                <span x-show="sidebarOpen">
                    وظایف
                </span>

            </a>


            <a href="#" class="nav-item">

                <span class="nav-icon">◫</span>

                <span x-show="sidebarOpen">
                    گزارش‌ها
                </span>

            </a>


            <a href="#" class="nav-item">

                <span class="nav-icon">♚</span>

                <span x-show="sidebarOpen">
                    کاربران
                </span>

            </a>


            <a href="#" class="nav-item">

                <span class="nav-icon">⚙</span>

                <span x-show="sidebarOpen">
                    تنظیمات
                </span>

            </a>

        </nav>

    </aside>


    {{-- Mobile overlay --}}
    <div
        class="mobile-overlay"
        x-show="mobileSidebar"
        x-transition.opacity
        @click="mobileSidebar = false"
    ></div>


    {{-- Main --}}
    <div class="main-wrapper">

        {{-- Header --}}
        <header class="topbar">

            <div class="topbar-right">

                {{-- Desktop sidebar toggle --}}
                <button
                    class="icon-button desktop-only"
                    @click="sidebarOpen = !sidebarOpen"
                >
                    ☰
                </button>


                {{-- Mobile menu --}}
                <button
                    class="icon-button mobile-only"
                    @click="mobileSidebar = !mobileSidebar"
                >
                    ☰
                </button>


                <div class="page-title">

                    <h1>
                        @yield('page-title', 'داشبورد')
                    </h1>

                    <span>
                        @yield('page-description', 'مدیریت و مشاهده اطلاعات سیستم')
                    </span>

                </div>

            </div>


            <div class="topbar-left">

                {{-- Search --}}
                <div class="header-search">
                    <input
                        type="text"
                        placeholder="جستجو..."
                    >

                    <span>⌕</span>
                </div>


                {{-- Notification --}}
                <button class="icon-button notification-button">

                    ♢

                    <span class="notification-badge">
                        3
                    </span>

                </button>


                {{-- User dropdown --}}
                <div class="user-dropdown">

                    <button
                        class="user-button"
                        @click="userMenu = !userMenu"
                        @click.outside="userMenu = false"
                    >

                        <div class="user-avatar">
                            A
                        </div>

                        <div class="user-info">

                            <strong>
                                مدیر سیستم
                            </strong>

                            <span>
                                Administrator
                            </span>

                        </div>

                        <span class="dropdown-arrow">
                            ▾
                        </span>

                    </button>


                    <div
                        class="dropdown-menu"
                        x-show="userMenu"
                        x-transition
                        x-cloak
                    >

                        <a href="#">
                            پروفایل من
                        </a>

                        <a href="#">
                            تنظیمات حساب
                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="#" class="logout-link">
                            خروج از سیستم
                        </a>

                    </div>

                </div>

            </div>

        </header>


        {{-- Main content --}}
        <main class="main-content">

            {{-- Flash messages --}}
            @if(session('success'))

                <div
                    class="alert alert-success"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                >

                    <span>
                        {{ session('success') }}
                    </span>

                    <button @click="show = false">
                        ×
                    </button>

                </div>

            @endif


            @if(session('error'))

                <div
                    class="alert alert-error"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                >

                    <span>
                        {{ session('error') }}
                    </span>

                    <button @click="show = false">
                        ×
                    </button>

                </div>

            @endif


            @yield('content')

        </main>

    </div>

</div>

</body>
</html>
