<!DOCTYPE html>
<html lang="de">

<head>
    @include('includes.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')
</head>


<body>
    @include('admin.includes.header')

    <noscript>
        <p class="no-script-message">
            This Website requires JavaScript. Please make sure to activate JavaScript in your Browser.
        </p>
    </noscript>

    @yield('content')

    @include('admin.includes.footer')

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="{{ asset('/js/guest/header-footer.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    @yield('js')

</body>

</html>