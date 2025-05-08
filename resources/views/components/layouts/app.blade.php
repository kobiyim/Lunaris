<!doctype html>
<html
    lang="en"
    data-layout="horizontal"
    data-topbar="light"
    data-sidebar="dark"
    data-sidebar-size="lg"
    data-sidebar-image="none"
    data-preloader="disable"
    data-theme="saas"
    data-theme-colors="default">
    <head>
        <meta charset="utf-8" />
        <title>@hasSection('title') @yield('title') {{ config('kobiyim.name') }} @else {{ config('kobiyim.name') }} @endif</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @include('components.partials.head')
        @livewireStyles
        @stack('styles')
    </head>
    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">
            @include('components.partials.header')
            <!-- ========== App Menu ========== -->
            @include('components.partials.menu')
            <!-- Left Sidebar End -->
            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    @yield('content', (isset($slot) ? $slot : null))
                </div>
                <!-- End Page-content -->
                @include('components.partials.footer')
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <!-- JAVASCRIPT -->
        @include('components.partials.scripts')
        @livewireScripts
        @stack('scripts')
    </body>
</html>