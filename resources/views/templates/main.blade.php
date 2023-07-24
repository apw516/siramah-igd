@include('templates.header')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">
    <div class="wrapper">
        @include('templates.sidebar')
        @include('templates.navbar')
        <div class="content-wrapper">
            @yield('container')
        </div>
        @include('templates.footer')
</body>

</html>
