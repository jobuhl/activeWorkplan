@extends('employee.layout.employee-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/modal-event.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/modal.css')}}">

@endsection

@section('content')

    <div class="fake-body container emp-planning final-workplan">
        <h2 class=" col-xs-12 header">Fix Workplan</h2>

        <div class="space_emp col-xs-12"></div>

        <!------------------- MOBILE NAVIGATION ----------------------->
        <div class="col-xs-12 navigation-today mobile-button button-hide">
            <div class="col-xs-4">
                <form method="GET" action="{{ url('/employee/employee-workplan') . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button class="set-size float-right" type="submit"><</button>
                </form>
            </div>

            <div class="col-xs-4">
                <form method="GET" action="{{ url('/employee/employee-workplan') . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button class="set-size" type="submit">Today</button>
                </form>
            </div>

            <div class="col-xs-4">
                <form method="GET" action="{{ url('/employee/employee-workplan') . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button class="set-size float-right" type="submit">></button>
                </form>
            </div>
        </div>


        <!------------------- DESKTOP NAVIGATION ----------------------->
        <aside id="aside-overview" class="col-xs-12 calendar-navigation button-show">
            <div class="col-xs-6 navigation-today">
                <form method="GET" action="{{ url('/employee/employee-workplan') . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button type="submit"><</button>
                </form>
                <form method="GET" action="{{ url('/employee/employee-workplan') . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button type="submit">Today</button>
                </form>
                <form method="GET" action="{{ url('/employee/employee-workplan') . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button type="submit">></button>
                </form>
            </div>

            <div class="col-xs-6">
                <p class="to-right">
                    {{ $week[0]->format('d. - ') }}
                    {{ $week[6]->format('d. M. Y') }}
                </p>
            </div>
        </aside>

        <table class="calendar-days-one-emp">
            <tr class="week-date">
                <td class="button-show"></td>
                @for ($i = 0; $i < 7; $i++)
                    <td>
                        {{ $week[$i]->format('d.m.') }}</td>
                @endfor
            </tr>
            <tr class="week-days ">
                <td class="button-show"></td>
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
                <td class="button-show">Allday</td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                        <td class="today">
                    @else
                        <td>
                            @endif
                            <!------------------- ALLDAY EVENT ----------------------->
                                @foreach($manyAlldayEvent as $oneAlldayEvent)
                                    @if( (new DateTime($oneAlldayEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                    && (( $oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness") && $oneAlldayEvent->accepted == 1) )
                                        <div class="one-allday-event {{ $oneAlldayEvent->color }}"
                                             draggable="true">
                                            <p>{{ $oneAlldayEvent->name }}</p>
                                        </div>
                                    @endif
                                @endforeach
                        </td>
                        @endfor
            </tr>

            <tr class="time-events">
                <td class="button-show">Time-Events</td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                        <td class="today">
                    @else
                        <td>
                            @endif
                            @foreach($manyWorktimeEvent as $oneWorktimeEvent)
                                @if( (new DateTime($oneWorktimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y') )
                                    <div class="one-time-event {{ $oneWorktimeEvent->color }}"
                                         draggable="true">
                                        <p>{{ $oneWorktimeEvent->name }}</p>
                                        <p>{{ $oneWorktimeEvent->from }}</p>
                                        <p>{{ $oneWorktimeEvent->to }}</p>
                                    </div>
                                @endif
                            @endforeach


                            @foreach($manyTimeEvent as $oneTimeEvent)
                                @if( (new DateTime($oneTimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                && (( $oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness") && $oneTimeEvent->accepted == 1) )
                                    <div class="one-time-event {{ $oneTimeEvent->color }}"
                                         draggable="true">
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
                <td class="button-show"></td>
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

        <div class="space_emp col-xs-12"></div>

    </div>


@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/employee/workplan.js') }}"></script>

@endsection
