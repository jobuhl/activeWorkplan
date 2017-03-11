<!DOCTYPE html>
<html lang="de">

    <head>

        @include('includes.head-css')
        @yield('css')

    </head>

    <body>
        @include('employee.includes.header')

        <noscript>
            <p class="no-script-message">
                This Website requires JavaScript. Please make sure to activate JavaScript in your Browser.
            </p>
        </noscript>

        @yield('content')

        @include('employee.includes.footer')

        @include('includes.head-js')
        @yield('js')

        <!-- selectpicker -->
        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>--}}

    </body>

</html>