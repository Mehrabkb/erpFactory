@extends('layouts.app')

@section('title', 'داشبورد | ERP Factory')

@section('page-title', 'داشبورد')

@section(
    'page-description',
    'نمای کلی وضعیت کارخانه و CRM'
)


@section('content')

    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-icon">
                ♙
            </div>

            <div class="stat-content">

            <span>
                مشتریان
            </span>

                <strong>
                    1,248
                </strong>

                <small class="positive">
                    +12 این ماه
                </small>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                ◇
            </div>

            <div class="stat-content">

            <span>
                فرصت‌های فروش
            </span>

                <strong>
                    42
                </strong>

                <small>
                    18 در انتظار پیگیری
                </small>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                ▣
            </div>

            <div class="stat-content">

            <span>
                سفارش‌های فعال
            </span>

                <strong>
                    86
                </strong>

                <small>
                    11 سفارش جدید
                </small>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                ✓
            </div>

            <div class="stat-content">

            <span>
                وظایف امروز
            </span>

                <strong>
                    17
                </strong>

                <small class="danger">
                    4 مورد عقب افتاده
                </small>

            </div>

        </div>

    </div>


    <div class="dashboard-grid">

        {{-- Recent customers --}}
        <div class="panel">

            <div class="panel-header">

                <div>
                    <h2>
                        آخرین مشتریان
                    </h2>

                    <span>
                    مشتریان اخیراً ثبت شده
                </span>
                </div>

                <a href="#" class="panel-action">
                    مشاهده همه
                </a>

            </div>


            <div class="table-wrapper">

                <table class="data-table">

                    <thead>

                    <tr>
                        <th>مشتری</th>
                        <th>نوع</th>
                        <th>شماره تماس</th>
                        <th>وضعیت</th>
                    </tr>

                    </thead>

                    <tbody>

                    <tr>

                        <td>
                            <strong>
                                شرکت آریا صنعت
                            </strong>
                        </td>

                        <td>
                            حقوقی
                        </td>

                        <td dir="ltr">
                            021-88776655
                        </td>

                        <td>
                            <span class="badge badge-success">
                                فعال
                            </span>
                        </td>

                    </tr>


                    <tr>

                        <td>
                            <strong>
                                فولاد نوین
                            </strong>
                        </td>

                        <td>
                            حقوقی
                        </td>

                        <td dir="ltr">
                            021-22334455
                        </td>

                        <td>
                            <span class="badge badge-success">
                                فعال
                            </span>
                        </td>

                    </tr>


                    <tr>

                        <td>
                            <strong>
                                علی رضایی
                            </strong>
                        </td>

                        <td>
                            حقیقی
                        </td>

                        <td dir="ltr">
                            09121234567
                        </td>

                        <td>
                            <span class="badge badge-warning">
                                در انتظار
                            </span>
                        </td>

                    </tr>

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Quick actions --}}
        <div class="panel">

            <div class="panel-header">

                <div>

                    <h2>
                        دسترسی سریع
                    </h2>

                    <span>
                    عملیات پرکاربرد
                </span>

                </div>

            </div>


            <div class="quick-actions">

                <a href="#" class="quick-action">

                    <span>＋</span>

                    <div>
                        <strong>
                            مشتری جدید
                        </strong>

                        <small>
                            ثبت مشتری جدید
                        </small>
                    </div>

                </a>


                <a href="#" class="quick-action">

                    <span>＋</span>

                    <div>
                        <strong>
                            پیش‌فاکتور
                        </strong>

                        <small>
                            ایجاد پیش‌فاکتور جدید
                        </small>
                    </div>

                </a>


                <a href="#" class="quick-action">

                    <span>＋</span>

                    <div>
                        <strong>
                            سفارش جدید
                        </strong>

                        <small>
                            ثبت سفارش مشتری
                        </small>
                    </div>

                </a>


                <a href="#" class="quick-action">

                    <span>＋</span>

                    <div>
                        <strong>
                            وظیفه جدید
                        </strong>

                        <small>
                            ایجاد Task جدید
                        </small>
                    </div>

                </a>

            </div>

        </div>

    </div>


    {{-- Alpine Test --}}
    <div
        class="panel alpine-test"
        x-data="{ open: false }"
    >

        <div class="panel-header">

            <div>

                <h2>
                    تست Alpine
                </h2>

                <span>
                برای اطمینان از عملکرد Alpine
            </span>

            </div>

            <button
                class="primary-button"
                @click="open = !open"
                x-text="open ? 'بستن' : 'باز کردن'"
            ></button>

        </div>


        <div
            class="alpine-message"
            x-show="open"
            x-transition
            x-cloak
        >

            Alpine.js با موفقیت در پروژه فعال است ✅

        </div>

    </div>

@endsection
