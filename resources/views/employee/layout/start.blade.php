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

    </body>

</html>