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


        <!-- Ueberschrift -->
        <h2 class=" col-xs-12 header">Proposals</h2>

        <div class="space_emp col-xs-12"></div>

            @include('includes.calendar.navigation')

        <table class="calendar-days-one-emp">

            @include('includes.calendar.tr-1-week-date')
            @include('includes.calendar.tr-2-week-days')

{{--            @include('includes.calendar.tr-3a-proposal-all-day')--}}
            <tr class="all-day">
                <td class="button-show">Allday</td>
            @for ($i = 0; $i < 7; $i++)

                <!-- ++++++++++++++ IF TODAY ++++++++++++++++++++ -->
                    @if((new DateTime())->format('d-m-Y') == $week[$i]->format('d-m-Y'))
                        <td class="today" ondrop="drop(event{{ $week[$i]->format('d-m-Y') }})" ondragover="allowDrop(event)">
                    @else
                        <td ondrop="drop(event{{ $week[$i]->format('d-m-Y') }})" ondragover="allowDrop(event)">
                        @endif


                        @foreach($manyAlldayEvent as $oneAlldayEvent)
                            @if( (new DateTime($oneAlldayEvent->date))->format('d-m-Y') == $week[$i]->format('d-m-Y'))

                                <!-- id beim delete in function deleteEvent(...) verwendet -->
                                    <div class="drop-btn one-allday-event {{ $oneAlldayEvent->color }}"
                                         onclick="openEventDropdown('allday' + {{ $oneAlldayEvent->id }} + '')"
                                         draggable="true"
                                         id="div-allday{{ $oneAlldayEvent->id }}"
                                         ondragstart="drag(event)">
                                        <input value="{{ $oneAlldayEvent->date }}" style="display: none"/>
                                        <p>{{ $oneAlldayEvent->name }}</p>

                                        <!-- anzeigen von "accepted"-Events -->
                                        @if ( ($oneAlldayEvent->name == ('Vacation' || 'Illness' )) && $oneAlldayEvent->accepted == 1)
                                            <p class="event-accepted">accepted</p>
                                        @endif

                                    <!-- Option Buttons -->
                                        <div id="allday{{ $oneAlldayEvent->id }}" class="event-dropdown-content">

                                            <button onclick="openChangeAlldayModal({{ $oneAlldayEvent->id }})" class="change-event-button">⇄</button>
                                            <button id="button-change-allday-event{{ $oneAlldayEvent->id }}" style="display: none;" data-toggle="modal" data-target="#change-button-event-allday">⇄</button>

                                            <!-- JS aufurf mit eventId und RoutesURL -> Controller loescht Event und ersetzt es in View mit "nichts" -->
                                            <button class="delete-event-button" onclick="deleteEventAJAX('div-allday', '{{ $oneAlldayEvent->id }}', '{{ url('/deleteAlldayEventAJAX') }}' )">-</button>

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

                                <!-- id beim delete in function deleteEvent(...) verwendet -->
                                    <div class="drop-btn one-time-event {{ $oneTimeEvent->color }}"
                                         onclick="openEventDropdown('time' + {{ $oneTimeEvent->id }} + '')"
                                         draggable="true"
                                         id="div-time{{ $oneTimeEvent->id }}"
                                         ondragstart="drag(event)">
                                        <p>{{ $oneTimeEvent->name }}</p>
                                        <p>{{ $oneTimeEvent->from }}</p>
                                        <p>{{ $oneTimeEvent->to }}</p>

                                        <!-- anzeigen von "accepted"-Events -->
                                        @if ( ($oneTimeEvent->name == ('Vacation' ||  'Illness' )) && $oneTimeEvent->accepted == 1)
                                            <p class="event-accepted">accepted</p>
                                        @endif

                                        <input value="{{ $oneTimeEvent->date }}" style="display: none"/>

                                        <!-- Option Buttons -->
                                        <div id="time{{ $oneTimeEvent->id }}" class="event-dropdown-content">

                                            <button onclick="openChangeTimeModal({{ $oneTimeEvent->id }})" class="change-event-button">⇄</button>
                                            <button id="button-change-time-event{{ $oneTimeEvent->id }}" style="display: none;" data-toggle="modal" data-target="#change-button-event-time">⇄</button>

                                            <!-- JS aufurf mit eventId und RoutesURL -> Controller loescht Event und ersetzt es in View mit "nichts" -->
                                            <button class="delete-event-button" onclick="deleteEventAJAX('div-time', '{{ $oneTimeEvent->id }}', '{{ url('/deleteTimeEventAJAX') }}' )">-</button>

                                        </div>
                                    </div>

                                @endif
                            @endforeach
                        </td>
                        @endfor
            </tr>

            @include('includes.calendar.tr-5-add-buttons')


        </table>


        <button id="emp-button-add-event1" data-toggle="modal" data-target="#add-button-event" style="display: none;"></button>
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
