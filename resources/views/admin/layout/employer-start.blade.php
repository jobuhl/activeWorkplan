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
</body>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="{{ asset('/js/general/header-footer.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>
<script>

    $(document).ready(function () {
        $("#button").keyup(function () {
            $.ajax({

//                auskommentieren
                type: "POST",
                url: "ausführen.php",
                data: dataString,
                success: function () {

                }
            }
// das funktioniert
//                $("#div1").html($("#button").val()),


            )
            ;
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>



@yield('js')

</html>