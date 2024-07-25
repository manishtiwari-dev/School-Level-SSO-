<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="description" content="{{ getSetting('global_meta_description') }}">
  <meta name="keywords" content="{{ getSetting('global_meta_keywords') }}">
  
   <!--favicon icon-->
   <link rel="icon" href="{{ uploadedAsset(getSetting('favicon')) }}" type="image/png" sizes="16x16">

   <!--title-->
   <title>@yield('title')</title>
   
   @yield('meta')
   <!--Css Block Start-->
    @include('frontend.inc.css')
   <!--Css Block End-->
</head>

<body>
    

    <!--Header Section Start-->
    @include('frontend.inc.header')
    <!--Header Section End-->

    <!-- Page Content -->
    {{ $slot }}

    <!--Footer Section Start-->
    @include('frontend.inc.footer')
    <!--Footer Section End-->

    <!--Script Section Start-->
    @include('frontend.inc.scripts')
    <!--Script Section End-->
    @stack('scripts')
</body>

</html>