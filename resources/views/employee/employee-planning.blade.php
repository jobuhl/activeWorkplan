@extends('employee.layout.employee-start')

@section('css')
    <!--<link rel='stylesheet' href='../../calendar/lib/cupertino/jquery-ui.min.css'/>-->
    <link rel="stylesheet" type="text/css"  href="{{asset('calendar/fullcalendar.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('calendar/fullcalendar.print.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('css/employee/planning-employee.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('css/global/side-bar.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('css/global/header-footer.css')}}">
@endsection

@section('content')

    <section class="fake-body container">
        <h2 style="display: none">fakeheading</h2>
        <section class="fake-body">
            <h2 style="display: none">fakeheading</h2>

        </section>

        <br>

        <!-- Navigation auf der Linken Seite beinhaltet die Aktivitäten -->
        <aside class="col-xs-12 col-sm-3 side-bar" id="external-events">
            <ul>
                <li><p>Add Events</p></li>
                <li><a class="fc-event">Work</a></li>
                <li><a class="fc-event">Vacation</a></li>
                <li><a class="fc-event">Illness</a></li>
                <li><a class="fc-event">Study</a></li>
                <li><a class="fc-event">Training</a></li>
                <li><a class="fc-event">Seminar</a></li>
                <li><a class="fc-event">Private</a></li>
            </ul>
            <br>
        </aside>


        <aside class="col-xs-12 col-sm-9 my-right-side " id="calendar">
        </aside>

    </section>

@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('calendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('calendar/lib/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('calendar/lib/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('calendar/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('calendar/script.js') }}"></script>
@endsection