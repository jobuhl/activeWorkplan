@extends('employee.layout.employee-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/modal-event.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/modal.css')}}">
@endsection

@section('content')

    <section class="fake-body container emp-planning">
        <h2>Proposal working time</h2>

        <aside id="aside-overview" class="col-xs-12 calendar-navigation">

            <div class="col-xs-4 navigation-today">
                <button>&lt;</button>
                <button>Today</button>
                <button> ></button>
            </div>

            <div class="col-xs-4 calendar-navigation-p">
                <p>01. - 07. Jan. 2018</p>
            </div>

            <div class="col-xs-4 print-email">
                <button onclick="sendEmail()">
                    <span class="glyphicon glyphicon-envelope"></span> E-Mail
                </button>
                <button onclick="printing()">
                    <span class="glyphicon glyphicon-print"></span> Print
                </button>
            </div>

            <br>
        </aside>

        <table class="calendar-days">
            <tr class="week-date">
                <td></td>
                <td>01.01</td>
                <td>02.01</td>
                <td>03.01</td>
                <td>04.01</td>
                <td>05.01</td>
                <td>06.01</td>
                <td>07.01</td>
            </tr>
            <tr class="week-days">
                <td></td>
                <td>Mo</td>
                <td>Tu</td>
                <td>We</td>
                <td>Th</td>
                <td>Fr</td>
                <td>Sa</td>
                <td>Su</td>
            </tr>

            <tr class="all-day">
                <td>Allday</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <div class="one-allday-event red" draggable="true">
                        <p>Private</p>
                    </div>
                </td>
                <td>
                    <div class="one-allday-event red" draggable="true">
                        <p>Private</p>
                    </div>
                </td>
            </tr>

            <tr class="time-events">
                <td>Time-Events</td>
                <td>
                    <div class="one-time-event blue" draggable="true">
                        <p>Work</p>
                        <p>14:00</p>
                        <p>20:00</p>
                    </div>
                </td>
                <td></td>
                <td>
                    <div class="one-time-event blue" draggable="true">
                        <p>Work</p>
                        <p>9:30</p>
                        <p>13:30</p>
                    </div>
                    <div class="one-time-event green" draggable="true">
                        <p>Study</p>
                        <p>14:0</p>
                        <p>18:00</p>
                    </div>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr class="add-buttons">
                <td></td>
                <td><a class="round-button" data-toggle="modal" data-target="#add-button-event">+</a></td>
                <td><a class="round-button">+</a></td>
                <td><a class="round-button">+</a></td>
                <td><a class="round-button">+</a></td>
                <td><a class="round-button">+</a></td>
                <td><a class="round-button">+</a></td>
                <td><a class="round-button">+</a></td>
            </tr>
        </table>

        @include('employee.includes.modals-event-add')
    </section>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/employee/workplan.js') }}"></script>

@endsection
