<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'ERP Factory') }}
    </title>


    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body class="font-sans antialiased bg-gray-100">


<div
    x-data="{
        sidebarOpen: true,
        userMenu:false
    }"
    class="min-h-screen"
>


    {{-- Sidebar --}}

    <aside
        class="
        fixed
        top-0
        right-0
        h-screen
        w-72
        bg-gray-900
        text-white
        z-50
        transition-all
        duration-300
        "
        :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full'"
    >


        <div class="h-20 flex items-center px-6 border-b border-gray-700">


            <div>

                <h2 class="font-bold text-xl">
                    ERP Factory
                </h2>


                <span class="text-xs text-gray-400">
                    مدیریت کارخانه
                </span>

            </div>


        </div>



        <nav class="p-4 space-y-2">


            <a
                href="{{ route('dashboard') }}"
                class="
                block
                px-4
                py-3
                rounded-lg
                hover:bg-gray-800
                "
            >
                🏠 داشبورد
            </a>

            {{-- مدیریت سازمان --}}

            <div class="mt-6 mb-2 px-4 text-xs text-gray-400">
                مدیریت سازمان
            </div>


            <a
                href="{{ route('departments.index') }}"
                class="
    block
    px-4
    py-3
    rounded-lg
    hover:bg-gray-800
    "
            >
                🏢 واحدها
            </a>



            <a
                href="{{ route('processes.index') }}"
                class="
    block
    px-4
    py-3
    rounded-lg
    hover:bg-gray-800
    "
            >
                🔄 فرآیندها
            </a>



            {{-- عملیات --}}

            <div class="mt-6 mb-2 px-4 text-xs text-gray-400">
                عملیات
            </div>



            <a
                href="#"
                class="
    block
    px-4
    py-3
    rounded-lg
    hover:bg-gray-800
    "
            >
                📦 سفارش‌ها
            </a>



            <a
                href="#"
                class="
    block
    px-4
    py-3
    rounded-lg
    hover:bg-gray-800
    "
            >
                ✅ کارهای من
            </a>
            <a
                href="#"
                class="
                block
                px-4
                py-3
                rounded-lg
                hover:bg-gray-800
                "
            >
                👥 مشتریان
            </a>


            <a
                href="#"
                class="
                block
                px-4
                py-3
                rounded-lg
                hover:bg-gray-800
                "
            >
                🎯 سرنخ‌های فروش
            </a>


            <a
                href="#"
                class="
                block
                px-4
                py-3
                rounded-lg
                hover:bg-gray-800
                "
            >
                💰 فروش
            </a>


            <a
                href="#"
                class="
                block
                px-4
                py-3
                rounded-lg
                hover:bg-gray-800
                "
            >
                📦 سفارش‌ها
            </a>


            <a
                href="#"
                class="
                block
                px-4
                py-3
                rounded-lg
                hover:bg-gray-800
                "
            >
                📊 گزارش‌ها
            </a>


            <a
                href="#"
                class="
                block
                px-4
                py-3
                rounded-lg
                hover:bg-gray-800
                "
            >
                ⚙ تنظیمات
            </a>


        </nav>


    </aside>



    {{-- Main Content --}}

    <div
        class="
        min-h-screen
        transition-all
        duration-300
        "
        :class="sidebarOpen ? 'mr-72' : 'mr-0'"
    >



        {{-- Header --}}

        <header
            class="
            h-20
            bg-white
            shadow
            flex
            items-center
            justify-between
            px-6
            "
        >


            <button
                @click="sidebarOpen=!sidebarOpen"
                class="
                bg-gray-100
                px-3
                py-2
                rounded-lg
                "
            >

                ☰

            </button>



            <div class="relative">


                <button
                    @click="userMenu=!userMenu"
                    class="flex items-center gap-3"
                >

                    <div
                        class="
                        w-10
                        h-10
                        rounded-full
                        bg-blue-600
                        text-white
                        flex
                        items-center
                        justify-center
                        "
                    >

                        {{ substr(auth()->user()->name ?? 'U',0,1) }}

                    </div>


                    <span>

                        {{ auth()->user()->name ?? 'کاربر' }}

                    </span>


                </button>



                <div
                    x-show="userMenu"
                    @click.outside="userMenu=false"
                    class="
                    absolute
                    left-0
                    mt-2
                    bg-white
                    shadow
                    rounded-lg
                    w-48
                    text-gray-700
                    "
                >

                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >

                        @csrf


                        <button
                            class="
                            w-full
                            text-right
                            px-4
                            py-3
                            hover:bg-gray-100
                            "
                        >

                            خروج

                        </button>

                    </form>


                </div>


            </div>


        </header>



        {{-- Content --}}

        <main class="p-6">


            {{ $slot }}


        </main>



    </div>


</div>


</body>

</html>
