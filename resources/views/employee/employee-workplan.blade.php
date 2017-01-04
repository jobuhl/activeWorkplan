@extends('employee.layout.employee-start')

@section('css')
    <!--<link rel='stylesheet' href='../../calendar/lib/cupertino/jquery-ui.min.css'/>-->
    <link rel="stylesheet" type="text/css" href="{{asset('calendar/fullcalendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('calendar/fullcalendar.print.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/planning-employee.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/header-footer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/workplan.css')}}">
@endsection

@section('content')

    <section class="fake-body container">
        <h2 style="display: none">fakeheading</h2>

        <article class="col-xs-12 firstrow">
            <button type="button" class="form-control my-account-button to-right btn btn-default btn-sm"
                    onclick="printing()">
                <span class="glyphicon glyphicon-print"></span> Print
            </button>

            <button type="button" class="form-control my-account-button to-right btn btn-default btn-sm"
                    onclick="sendEmail()">
                <span class="glyphicon glyphicon-envelope"></span> E-Mail
            </button>
        </article>

        <!-- Calender -->
        <div id='calendar'></div>

        <div class="space"></div>

    </section>

@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('calendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('calendar/lib/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('calendar/lib/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('calendar/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('calendar/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/employee/workplan.js') }}"></script>

    <!-- Kopie, weil Calendar.js-Dateien die Datei überschrieben haben -->
    <script type="text/javascript" src="{{ asset('js/general/header-footer.js') }}"></script>
@endsection
