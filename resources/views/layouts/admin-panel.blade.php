<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield("title") </title>
    <link rel="stylesheet" href="{{ asset("assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/vendors/iconfonts/ionicons/dist/css/ionicons.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/vendors/css/vendor.bundle.base.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/vendors/css/vendor.bundle.addons.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/shared/style.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/css/demo_1/style.css") }}">
    <link rel="shortcut icon" href="{{ asset("assets/admin/images/favicon.ico") }}" />
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
          rel="stylesheet"  type='text/css'>

    @yield("style")
</head>
<body>
<div class="container-scroller">

@include("layouts.admin.navbar")
    <div class="container-fluid page-body-wrapper">
       @include("layouts.admin.sidebar")
        <div class="main-panel">
            <div class="content-wrapper">
                @yield("content")
            </div>
            @include("layouts.admin.footer")
        </div>
    </div>

</div>

<script src="{{ asset("assets/admin/vendors/js/vendor.bundle.base.js") }}"></script>
<script src="{{ asset("assets/admin/vendors/js/vendor.bundle.addons.js") }}"></script>
<script src="{{ asset("assets/admin/js/shared/off-canvas.js") }}"></script>
<script src="{{ asset("assets/admin/js/shared/misc.js") }}"></script>
<script src="{{ asset("assets/admin/js/demo_1/dashboard.js") }}"></script>
@include('sweetalert::alert')
@yield("js")
</body>
</html>
