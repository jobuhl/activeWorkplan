<!DOCTYPE html>
<html lang="de">

    <head>
        @include('includes.head')

        @yield('css')

    </head>

    <body>
        @include('general.includes.header')

        <noscript>
            <p class="no-script-message">
                This Website requires JavaScript. Please make sure to activate JavaScript in your Browser.
            </p>
        </noscript>



        @include('admin.auth.register')
        @include('general.signin-modal')

        @yield('content')

        @include('general.includes.footer')

        <!-- JQuery -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/general/general-mainsection.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/employer/modal_add_change_delete.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/general/signup_in.js') }}"></script>
        @yield('js')
        <script type="text/javascript" src="{{ asset('/js/general/header-footer.js') }}"></script>
    </body>



</html>

