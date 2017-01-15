@extends('employee.layout.employee-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/modal-event.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/modal.css')}}">

    <style>


    </style>

@endsection

@section('content')

    <div class="fake-body container emp-planning">

        <div class="space_emp"></div>

        <div class="col-xs-12 navigation-today button-hide">
            <div class="col-xs-4">
            <form method="GET"
                  action="{{ url('/employee/employee-planning') . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                <button type="submit"><</button>
            </form>
            </div>

            <div class="col-xs-4">
            <form method="GET"
                  action="{{ url('/employee/employee-planning') . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
                <button type="submit">Today</button>
            </form>
            </div>

            <div class="col-xs-4">
            <form method="GET"
                  action="{{ url('/employee/employee-planning') . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                <button type="submit">></button>
            </form>
            </div>

            <div class="col-xs-12">
                <p>
                    {{ $week[0]->format('d. - ') }}
                    {{ $week[6]->format('d. M. Y') }}
                </p>
            </div>
        </div>

        <aside id="aside-overview" class="col-xs-12 calendar-navigation button-show">

            <div class="col-xs-4 navigation-today">
                <form method="GET"
                      action="{{ url('/employee/employee-planning') . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button type="submit"><</button>
                </form>

                <form method="GET"
                      action="{{ url('/employee/employee-planning') . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button type="submit">Today</button>
                </form>

                <form method="GET"
                      action="{{ url('/employee/employee-planning') . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button type="submit">></button>
                </form>
            </div>

            <div class="col-xs-4">
                <p>
                    {{ $week[0]->format('d. - ') }}
                    {{ $week[6]->format('d. M. Y') }}
                </p>
            </div>

            <br>
        </aside>

        <table class="calendar-days-one-emp">
            <tr class="week-date">
                <td class="button-show"></td>
                @for ($i = 0; $i < 7; $i++)
                    <td>
                        {{ $week[$i]->format('d.m.') }}</td>
                @endfor
            </tr>
            <tr class="week-days">
                <td class="button-show"></td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d-m-Y') == $week[$i]->format('d-m-Y'))
                        <td class="today">
                    @else
                        <td>
                            @endif
                            {{ $week[$i]->format('D') }}</td>
                        @endfor
            </tr>

            {{--<form name="changeDraggedAlldayEvent" method="POST"--}}
            {{--action="{{ url('/employee/changeDraggedAlldayEvent') }}"> {{ csrf_field() }}--}}

            <tr class="all-day">
                <td class="button-show">Allday</td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d-m-Y') == $week[$i]->format('d-m-Y'))
                        <td class="today">
                    @else
                        <td ondrop="drop(event{{ $week[$i]->format('d-m-Y') }})" ondragover="allowDrop(event)">
                            @endif
                            @foreach($manyAlldayEvent as $oneAlldayEvent)
                                @if( (new DateTime($oneAlldayEvent->date))->format('d-m-Y') == $week[$i]->format('d-m-Y'))
                                    <div class="drop-btn one-allday-event {{ $oneAlldayEvent->color }}"
                                         onclick="openEventDropdown('allday' + {{ $oneAlldayEvent->id }} + '')"
                                         draggable="true"
                                         id="div-allday{{ $oneAlldayEvent->id }}"
                                         ondragstart="drag(event)">
                                        <input value="{{ $oneAlldayEvent->date }}" style="display: none"/>
                                        <p>{{ $oneAlldayEvent->name }}</p>

                                        <div id="allday{{ $oneAlldayEvent->id }}" class="event-dropdown-content">

                                            <button onclick="openChangeAlldayModal({{ $oneAlldayEvent->id }})"
                                                    class="change-event-button">⇄
                                            </button>

                                            <button id="button-change-allday-event" style="display: none;"
                                                    data-toggle="modal" data-target="#change-button-event-allday">⇄
                                            </button>

                                            <form method="POST"
                                                  action="{{ url('/employee/alldayEventDelete') }}"> {{ csrf_field() }}
                                                <input style="display: none;" name="thisDate"
                                                       value="{{ $week[0]->format('d-m-Y') }}"/>
                                                <button class="delete-event-button" name="eventId"
                                                        value="{{ $oneAlldayEvent->id }}">-
                                                </button>
                                            </form>
                                        </div>
                                    </div>


                                @endif
                            @endforeach
                        </td>
                        @endfor
            </tr>
            {{--</form>--}}


            <tr class="time-events">
                <td class="button-show">Time-Events</td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d-m-Y') == $week[$i]->format('d-m-Y'))
                        <td class="today">
                    @else
                        <td>
                            @endif
                            @foreach($manyTimeEvent as $oneTimeEvent)
                                @if( (new DateTime($oneTimeEvent->date))->format('d-m-Y') == $week[$i]->format('d-m-Y') )

                                    <div class="drop-btn one-time-event {{ $oneTimeEvent->color }}"
                                         onclick="openEventDropdown('time' + {{ $oneTimeEvent->id }} + '')"
                                         draggable="true"
                                         id="div-time{{ $oneTimeEvent->id }}"
                                         ondragstart="drag(event)">
                                        <p>{{ $oneTimeEvent->name }}</p>
                                        <p>{{ $oneTimeEvent->from }}</p>
                                        <p>{{ $oneTimeEvent->to }}</p>
                                        <input value="{{ $oneTimeEvent->date }}" style="display: none"/>

                                        <div id="time{{ $oneTimeEvent->id }}" class="event-dropdown-content">

                                            <button onclick="openChangeTimeModal({{ $oneTimeEvent->id }})"
                                                    class="change-event-button">⇄
                                            </button>

                                            <button id="button-change-time-event" style="display: none;"
                                                    data-toggle="modal" data-target="#change-button-event-time">⇄
                                            </button>

                                            <form method="POST"
                                                  action="{{ url('/employee/timeEventDelete') }}"> {{ csrf_field() }}
                                                <input style="display: none;" name="thisDate"
                                                       value="{{ $week[0]->format('d-m-Y') }}"/>
                                                <button class="delete-event-button" name="eventId"
                                                        value="{{ $oneTimeEvent->id }}">-
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                @endif
                            @endforeach
                        </td>
                        @endfor
            </tr>

            <tr class="add-buttons">
                <td class="button-show"></td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d-m-Y') == $week[$i]->format('d-m-Y'))
                        <td class="today">
                    @else
                        <td>
                            @endif
                            <a class="round-button" data-toggle="modal" data-target="#add-button-event">+</a></td>
                        @endfor
            </tr>
        </table>

    </div>

    @include('employee.includes.modals-event-add')
    @include('employee.includes.modals-event-change-allday')
    @include('employee.includes.modals-event-change-time')

@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/employee/workplan.js') }}"></script>
@endsection
