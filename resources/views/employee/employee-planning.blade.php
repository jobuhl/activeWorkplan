@extends('employee.layout.employee-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/modal-event.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/modal.css')}}">
@endsection

@section('content')

    <div class="fake-body container emp-planning">

        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <ul>
                    @foreach($errors -> all() as $error)
                        <li style="margin-left: 10px">{{$error}}</li>
                    @endforeach

                </ul>
            </div>
        @endif


        {{-- Meldung für den Fall das Erfolgreich geändert wurde --}}
        @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {!! session('flash_notification.message') !!}
            </div>
        @endif

        <div class="space_emp col-xs-12"></div>

        <h2 class=" col-xs-12 header">Proposals</h2>

        <div class="space_emp col-xs-12"></div>

        <div class="col-xs-12 navigation-today mobile-button button-hide">
            <div class="col-xs-4">
                <form method="GET" action="{{ url('/employee/employee-planning') . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button class="set-size float-right" type="submit">&lt;</button>
                </form>
            </div>

            <div class="col-xs-4">
                <form method="GET" action="{{ url('/employee/employee-planning') . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button class="set-size" type="submit">Today</button>
                </form>
            </div>

            <div class="col-xs-4">
                <form method="GET" action="{{ url('/employee/employee-planning') . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button class="set-size float-right" type="submit">&gt;</button>
                </form>
            </div>
        </div>


        <aside id="aside-overview" class="col-xs-12 calendar-navigation button-show">

            <div class="col-xs-6 navigation-today">
                <form method="GET"
                      action="{{ url('/employee/employee-planning') . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button type="submit">&lt;</button>
                </form>

                <form method="GET"
                      action="{{ url('/employee/employee-planning') . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button type="submit">Today</button>
                </form>

                <form method="GET"
                      action="{{ url('/employee/employee-planning') . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                    <button type="submit">&gt;</button>
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
                                        @if ( ($oneAlldayEvent->name == 'Vacation' || $oneAlldayEvent->name == 'Illness' ) && $oneAlldayEvent->accepted == 1)
                                            <p class="event-accepted">accepted</p>
                                        @endif

                                        <div id="allday{{ $oneAlldayEvent->id }}" class="event-dropdown-content">

                                            <button onclick="openChangeAlldayModal({{ $oneAlldayEvent->id }})"
                                                    class="change-event-button">⇄
                                            </button>

                                            <button id="button-change-allday-event{{ $oneAlldayEvent->id }}" style="display: none;"
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
                                        @if ( ($oneTimeEvent->name == 'Vacation' || $oneTimeEvent->name == 'Illness' ) && $oneTimeEvent->accepted == 1)
                                            <p class="event-accepted">accepted</p>
                                        @endif

                                        <input value="{{ $oneTimeEvent->date }}" style="display: none"/>

                                        <div id="time{{ $oneTimeEvent->id }}" class="event-dropdown-content">

                                            <button onclick="openChangeTimeModal({{ $oneTimeEvent->id }})"
                                                    class="change-event-button">⇄
                                            </button>

                                            <button id="button-change-time-event{{ $oneTimeEvent->id }}" style="display: none;"
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
                            <a class="round-button" onclick="openAddEventModal('{{ $week[$i]->format('m/d/Y') }}')" >+</a>
                        </td>
                        @endfor
            </tr>

        </table>


            <button id="emp-button-add-event1"  data-toggle="modal" data-target="#add-button-event" style="display: none;"></button>
        <div class="space_emp col-xs-12"></div>

    </div>

    @include('employee.includes.modals-event-add')
    @include('employee.includes.modals-event-change-allday')
    @include('employee.includes.modals-event-change-time')

@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/employee/workplan.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/employee/event.js') }}"></script>
@endsection
