<!-- <!DOCTYPE html> -->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
</head>
<body>
    <div id="app">
        <!-- This is Vue JS application section -->
    </div>
    <div id=''>
      <!-- This is NOT a Vue JS application section -->
      <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <script type="text/javascript" src="{{ asset('js/sp_globals.js') }}"></script>
      <link href="{{ asset('css/sp_globals.css') }}" rel="stylesheet">
          {{-- @include('includes.sp_spinner') --}}
          @include('includes.navbar')
          {{-- @include('includes.sp_dialogue_overlay')
          @include('includes.sp_error_dialogue')
          @include('includes.sp_success_dialogue') --}}
          @yield('content')
      <script type="text/javascript">$.sp_globals.toggleSPLoadingSpinner(false);</script>
    </div>
</body>
</html>