<!DOCTYPE html>
<html lang="de">

    <head>
        @include('includes.head-css')
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
        @include('includes.head-js')
        <script type="text/javascript" src="{{ asset('/js/guest/general-mainsection.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/guest/signup_in.js') }}"></script>
        @yield('js')

    </body>



</html>

