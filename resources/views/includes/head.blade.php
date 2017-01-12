    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'activeWorkplan') }}</title>

    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/header-footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/general/signup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/general/dataprotection.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/modal.css')}}">

    <noscript>
        <p class="no-script-message">
            This Website requires JavaScript. Please make sure to activate JavaScript in your Browser.
        </p>
    </noscript>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>