@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>
{{-- {!! Helper::applClasses() !!} --}}
@php
$configData = Helper::applClasses();
@endphp
<html lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif" data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr' }}" class="{{ ($configData['theme'] === 'light') ? '' : $configData['layoutTheme'] }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title') - Vuexy Vuejs, HTML & Laravel Admin Dashboard Template</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo/favicon.ico')}}">

  {{-- Include core + vendor Styles --}}
  <link rel="stylesheet" href="{{ asset('landingPage/css/lib.min.css')}}">
  <link rel="stylesheet" href="{{ asset('landingPage/css/dashcore.min.css')}}">

  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">

</head>

@yield('content')

<script src="{{ asset('landingPage/js/core.min.js') }}"></script>
<script src="{{ asset('landingPage/js/lib.min.js') }}"></script>
<script src="{{ asset('landingPage/js/dashcore.min.js') }}"></script>

</html>
