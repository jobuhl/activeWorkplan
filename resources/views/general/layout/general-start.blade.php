<!DOCTYPE html>
<html lang="en">

    <head>
        @include('includes.head')

        @yield('css')
    </head>

    <body>
        @include('general.includes.header')

        @include('admin.auth.register')
        @include('general.signin-modal')

        @yield('content')

        @include('general.includes.footer')

    </body>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/general/modal.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/js/general/general-mainsection.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/employer/modal_add_change_delete.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/general/modal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/general/signup_in.js') }}"></script>


    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>

    @yield('js')

    <script type="text/javascript" src="{{ asset('/js/general/header-footer.js') }}"></script>


</html>

