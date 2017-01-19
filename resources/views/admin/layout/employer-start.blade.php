<!DOCTYPE html>
<html lang="en">

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

    @yield('js')

    <script type="text/javascript" src="{{ asset('/js/general/header-footer.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#search-store-overview").keyup(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                <!-- AJAX -->
                var inputValue = $("#search-store-overview").val();
                var html = "<ul>";
                var tableHtml = "";
                $.ajax({
                    type: "POST",
                    url: "{{ url('/admin/searchOverview') }}",
                    data: {'inputValue': inputValue },
                    dataType: "json",
                    success: function (response) {
                        var url = window.location.pathname;
                        $.each(response.store, function () {
                            html += "<li><a href='" + url + "#table-overview" + this['id'] + "'>" + this['name'] + "</a></li>";
                        });
                        $("#search-store-response-overview").html(html);

                    }
                });
            });
        });
    </script>


</body>

</html>