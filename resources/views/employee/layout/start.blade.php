<!DOCTYPE html>
<html lang="de">

    <head>

        @include('includes.head')

        <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css'/>
        <link rel='stylesheet' type='text/css' href="{{ asset('/css/global/header-footer.css') }}"/>
        <link rel='stylesheet' type='text/css' href="{{ asset('/css/global/button.css') }}"/>

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


        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- fuer DatePicker -->
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="{{ asset('/js/global/header-footer.js') }}"></script>

        @yield('js')
    </body>




</html>