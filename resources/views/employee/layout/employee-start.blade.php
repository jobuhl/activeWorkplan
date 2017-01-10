<!DOCTYPE html>
<html lang="en">

    <head>

        @include('includes.head')

        <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css'/>
        <link rel='stylesheet' type='text/css' href="{{ asset('/css/global/header-footer.css') }}"/>
        @yield('css')

    </head>


    <body>
        @include('employee.includes.header')

        @yield('content')

        @include('employee.includes.footer')

    </body>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- fuer DatePicker -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="{{ asset('/js/general/header-footer.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/js/general/calendar.js') }}"></script>

    @yield('js')


</html>