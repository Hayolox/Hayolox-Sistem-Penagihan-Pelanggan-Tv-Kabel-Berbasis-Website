<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>@yield('title')</title>
  @include('includes.admin.links')
</head>

<body>
  <!-- Sidenav -->
  @include('includes.admin.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('includes.admin.navabr')
    <!-- Header -->
    <!-- Header -->
    @yield('content')

    @include('includes.admin.footers')
    <!-- Page content -->
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('includes.admin.scripts')
</body>

</html>