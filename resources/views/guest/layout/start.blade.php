<!DOCTYPE html>
<html lang="de">

    <head>
        @include('includes.head')
        <link rel='stylesheet' type='text/css' href="{{ asset('/css/global/button.css') }}"/>
        @yield('css')

    </head>

    <body>
        @include('guest.includes.header')

        <noscript>
            <p class="no-script-message">
                This Website requires JavaScript. Please make sure to activate JavaScript in your Browser.
            </p>
        </noscript>



        @include('admin.auth.register')
        @include('guest.includes.signin-modal')

        @yield('content')

        @include('guest.includes.footer')

        <!-- JQuery -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/guest/general-mainsection.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/guest/signup_in.js') }}"></script>
        @yield('js')
        <script type="text/javascript" src="{{ asset('/js/global/header-footer.js') }}"></script>
    </body>



</html>

