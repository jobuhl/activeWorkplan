@extends('employee.layout.employee-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/modal-event.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/modal.css')}}">
@endsection

@section('content')

    <section class="fake-body container emp-planning">
        <h2>Fix Workplan</h2>

        <aside id="aside-overview" class="col-xs-12 calendar-navigation">

            <div class="col-xs-4 navigation-today">
                <form class="nav-form" method="POST" action="{{ url('/employee/weekBackEmpWork') }}">
                    {{ csrf_field() }}
                    <button name="date" value="{{ $week[0]->format('d-m-Y') }}" type="submit"><</button>
                </form>

                <form class="nav-form" method="POST" action="{{ url('/employee/weekTodayEmpWork') }}">
                    {{ csrf_field() }}
                    <button name="date" value="{{ $week[0]->format('d-m-Y') }}" type="submit">Today</button>
                </form>

                <form class="nav-form" method="POST" action="{{ url('/employee/weekNextEmpWork') }}">
                    {{ csrf_field() }}
                    <button name="date" value="{{ $week[0]->format('d-m-Y') }}" type="submit">></button>
                </form>
            </div>

            <div class="col-xs-4 calendar-navigation-p">
                <p>
                    {{ $week[0]->format('d. - ') }}
                    {{ $week[6]->format('d. M. Y') }}
                </p>
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
                @for ($i = 0; $i < 7; $i++)
                    <td>
                        {{ $week[$i]->format('d.m.') }}</td>
                @endfor
            </tr>
            <tr class="week-days">
                <td></td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                        <td class="today">
                    @else
                        <td>
                            @endif
                            {{ $week[$i]->format('D') }}</td>
                        @endfor
            </tr>

            <tr class="all-day">
                <td>Allday</td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                        <td class="today">
                    @else
                        <td>
                            @endif
                            @foreach($manyAlldayEvent as $oneAlldayEvent)
                                @if( (new DateTime($oneAlldayEvent->date))->format('d m Y') == $week[$i]->format('d m Y'))
                                    <div class="one-allday-event {{ $oneAlldayEvent->color }}" draggable="true">
                                        <p>{{ $oneAlldayEvent->name }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </td>
                        @endfor
            </tr>

            <tr class="time-events">
                <td>Time-Events</td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                        <td class="today">
                    @else
                        <td>
                            @endif
                            @foreach($manyWorktimeEvent as $oneWorktimeEvent)
                                @if( (new DateTime($oneWorktimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y') )
                                    <div class="one-time-event {{ $oneWorktimeEvent->color }}" draggable="true">
                                        <p>{{ $oneWorktimeEvent->name }}</p>
                                        <p>{{ $oneWorktimeEvent->from }}</p>
                                        <p>{{ $oneWorktimeEvent->to }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </td>
                        @endfor
            </tr>

            <tr class="add-buttons">
                <td></td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                        <td class="today">
                    @else
                        <td>
                            @endif
                        </td>
                        @endfor
            </tr>
        </table>

        @include('employee.includes.modals-event-add')
    </section>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/employee/workplan.js') }}"></script>

@endsection
