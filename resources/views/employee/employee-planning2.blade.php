@extends('employee.layout.employee-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/modal-event.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/modal.css')}}">
@endsection

@section('content')

    <section class="fake-body container emp-planning">
        <h2>Proposal working time</h2>

        <aside id="aside-overview" class="col-xs-12 calendar-navigation">

            <div class="col-xs-4 navigation-today">
                <form method="POST" action="{{ url('/employee/weekBackEmpPlan') }}"> {{ csrf_field() }}
                    <button name="date" value="{{ $week[0]->format('d-m-Y') }}" type="submit"><</button>
                </form>

                <form method="POST" action="{{ url('/employee/weekTodayEmpPlan') }}"> {{ csrf_field() }}
                    <button name="date" value="{{ $week[0]->format('d-m-Y') }}" type="submit">Today</button>
                </form>

                <form method="POST" action="{{ url('/employee/weekNextEmpPlan') }}"> {{ csrf_field() }}
                    <button name="date" value="{{ $week[0]->format('d-m-Y') }}" type="submit">></button>
                </form>
            </div>

            <div class="col-xs-4">
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

        <table class="calendar-days-one-emp">
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
                            @foreach($manyTimeEvent as $oneTimeEvent)
                                @if( (new DateTime($oneTimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y') )
                                    <div class="one-time-event {{ $oneTimeEvent->color }}" draggable="true">
                                        <p>{{ $oneTimeEvent->name }}</p>
                                        <p>{{ $oneTimeEvent->from }}</p>
                                        <p>{{ $oneTimeEvent->to }}</p>
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
                            <a class="round-button" data-toggle="modal" data-target="#add-button-event">+</a></td>
                        @endfor
            </tr>
        </table>

        @include('employee.includes.modals-event-add')
    </section>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/employee/workplan.js') }}"></script>

@endsection
