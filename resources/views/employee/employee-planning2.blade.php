@extends('employee.layout.employee-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-calendar-navigation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employer/overview.css')}}">

    <style type="text/css">
        .table-calendar.table-week-hours tr td p{
            margin: 0;
            padding: 0;
        }

        .table-calendar.table-week-hours tr:nth-child(3n+1) td,
        .table-calendar.table-week-hours tr:nth-child(3n+2) td {
            border-bottom: 0;
        }
    </style>
@endsection

@section('content')

    <section class="fake-body container">
        <h2 style="display: none">fakeheading</h2>
        <br>

        <aside id="aside-overview" class="col-xs-12 col-sm-12 overview list">

            <nav class="calendar-navigation">

                <div class="col-xs-6 col-md-5">
                    <div class="col-xs-9 col-md-9 navigation-today">
                        <button>&lt;</button>
                        <button>Today</button>
                        <button> ></button>
                    </div>
                </div>

                <div class="col-xs-6 col-md-7 calendar-navigation-padding">

                    <div class="col-xs-12 col-md-6">
                        <h4>Workplans</h4>
                    </div>
                    <div class="col-xs-12 col-md-6 calendar-navigation-p">
                        <p>01. - 07. Jan. 2018</p>
                    </div>
                </div>
            </nav>
            <br class="br-under-navigation">

                <div class="table-head-store">
                    <a class="table-head-a">{{ Auth::user()->name }}</a>
                    <button onclick="sendEmail()">
                        <span class="glyphicon glyphicon-envelope"></span> E-Mail
                    </button>
                    <button onclick="printing()">
                        <span class="glyphicon glyphicon-print"></span> Print
                    </button>
                </div>
            <aside>
                <table class="table-calendar table-week-hours">
                    <tr>
                        <th></th>
                        <th>01.01</th>
                        <th>02.01</th>
                        <th>03.01</th>
                        <th>04.01</th>
                        <th>05.01</th>
                        <th>06.01</th>
                        <th>07.01</th>
                    </tr>


                    <tr>
                        <th></th>
                        <th>Mo</th>
                        <th>Tu</th>
                        <th>We</th>
                        <th>Th</th>
                        <th>Fr</th>
                        <th>Sa</th>
                        <th>Su</th>
                    </tr>

                    <tr>
                        <td>All-day</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Private</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Time-Events</td>
                        <td>Work</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>from 14:00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>to 20:00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>



                </table>
                <br>
            </aside>


    </section>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/employer/overview.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/general/side-bar.js') }}"></script>

@endsection
