<!DOCTYPE html>
<!--
Template Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/vuexy_admin
Renew Support: https://1.envato.market/vuexy_admin
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/vertical-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Feb 2021 02:45:24 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="SMP SMK Bina Ikhwani">
    <meta name="keywords" content="Administrator Bina Ikhwani">
    <meta name="author" content="Yayasan Bina Ikhwani">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('/admin/images/ico/apple-icon-120.html')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/img/logo_bina_ikhwani.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/extensions/toastr.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/themes/bordered-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/themes/semi-dark-layout.min.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/pages/dashboard-ecommerce.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/plugins/charts/chart-apex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/plugins/extensions/ext-component-toastr.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/assets/css/main.css')}}">
    @yield('top')
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    @include('admin.partials.navbar')
  
    <!-- END: Header-->

    @include('admin.partials.sidebar')
    
    <!-- BEGIN: Content-->
    @yield('container')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
      <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">&copy; 2022<a class="ml-25" href="#" target="_blank">Bina Ikhwani</a><span class="d-none d-sm-inline-block"></span></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('/admin/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('/admin/vendors/js/extensions/toastr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('/admin/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('/admin/js/core/app.min.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('/admin/assets/js/main.js')}}"></script>
    @yield('bottom')
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->

<!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/vertical-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Feb 2021 02:47:02 GMT -->
</html>