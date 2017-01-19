@extends('admin.layout.employer-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">

@endsection

@section('content')

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

    @if($amountOfRetailStores != 0)

        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <ul>
                    @foreach($errors -> all() as $error)
                        <li style="margin-left: 10px">{{$error}}</li>
                    @endforeach

                </ul>
            </div>
        @endif

        <div class="fake-body container">

                <br>
                <aside class="col-xs-12 col-sm-3 side-bar">
                    @include('admin.includes.employer-side-bar-planning')
                </aside>

                <aside class="col-xs-12 col-sm-9 my-right-side">


                    <!-- Überschrift -->
                    <h2 class="header">{{ $thisRetailStore->name }}</h2>

                    <button class="set-right-buttom form-control modal-change-button space-bottom" data-toggle="modal" data-target="#change-store">Change</button>

                    <div class="col-xs-12 navigation-today mobile-button button-hide">
                        <div class="col-xs-4">
                            <form method="GET" action="{{ url('/admin/employer-planning') . '/' . $thisRetailStore->id . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                                <button class="set-size float-right" type="submit">&lt;</button>
                            </form>
                        </div>

                        <div class="col-xs-4">
                            <form method="GET" action="{{ url('/admin/employer-planning') . '/' . $thisRetailStore->id . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
                                <button class="set-size" type="submit">Today</button>
                            </form>
                        </div>

                        <div class="col-xs-4">
                            <form method="GET" action="{{ url('/admin/employer-planning') . '/' . $thisRetailStore->id . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                                <button class="set-size float-right" type="submit">&gt;</button>
                            </form>
                        </div>
                    </div>


                    <!-- +++++++++++++++ NAIGATION ++++++++++++++++++++ -->
                    <nav class="col-xs-12 calendar-navigation button-show">
                        <div class="calendar-navigation-padding">

                            <div class="col-xs-6 navigation-today">
                                <form method="GET"
                                      action="{{ url('/admin/employer-planning') . '/' . $thisRetailStore->id . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                                    <button type="submit">&lt;</button>
                                </form>
                                <form method="GET"
                                      action="{{ url('/admin/employer-planning') . '/' . $thisRetailStore->id . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
                                    <button type="submit">Today</button>
                                </form>
                                <form method="GET"
                                      action="{{ url('/admin/employer-planning') . '/' . $thisRetailStore->id . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                                    <button type="submit">&gt;</button>
                                </form>
                            </div>

                            <div class="col-xs-6 calendar-navigation-p">
                                <p>
                                    {{ $week[0]->format('d. - ') }}
                                    {{ $week[6]->format('d. M. Y') }}
                                </p>
                            </div>
                        </div>

                    </nav>


                    <!-- +++++++++++++++ PROPOSAL ++++++++++++++++++++ -->
                    <div class="col-xs-12 table-head-store space_emp">
                        <p class="table-head-a">Individual proposals of Employees</p>
                    </div>
                    <table class="calendar-days-all-emp">
                        <tr class="week-date">
                            <td class="button-show"></td>

                            <!-- +++++++++++++++ DATE +++++++++++++++ -->
                            @for ($i = 0; $i < 7; $i++)
                                <td>
                                    {{ $week[$i]->format('d.m.') }}
                                </td>
                            @endfor
                        </tr>


                        <tr class="week-days">
                            <td class="button-show">Employees</td>


                            <!-- +++++++++++++++ WEEKDAY +++++++++++++++ -->
                            @for ($i = 0; $i < 7; $i++)
                                @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                    <td class="today">
                                @else
                                    <td>
                                        @endif
                                        {{ $week[$i]->format('D') }}</td>
                                    @endfor
                        </tr>

                        <!-- +++++++++++++++ EMPLOYEE ROW +++++++++++++++ -->
                        @foreach($allEmployees as $employee)
                            @if($employee->retail_store_id == $thisRetailStore->id)

                                <tr class="button-hide">
                                    <td class="button-show"></td>
                                    <td>{{ $employee->surname }} </td>
                                    <td class="no-border-bottom">&nbsp;{{ $employee->forename }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr class="all-day ">

                                    <td class="button-show">{{ $employee->surname }} {{ $employee->forename }}</td>
                                @for ($i = 0; $i < 7; $i++)


                                    <!-- +++++++++++++++ IF TODAY +++++++++++++++ -->
                                        @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                            <td class="today">@else
                                            <td>@endif


                                            <!-- +++++++++++++++ ALLDAY EVENT +++++++++++++++ -->
                                                @foreach($manyAlldayEvent as $oneAlldayEvent)
                                                    @if( (new DateTime($oneAlldayEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                                    && $oneAlldayEvent->employee_id == $employee->id)

                                                        <div class="drop-btn one-allday-event {{ $oneAlldayEvent->color }}"
                                                             onclick="openEventDropdown('allday-admin' + {{ $oneAlldayEvent->id }} + '')"
                                                             draggable="true"
                                                             id="div-allday-admin{{ $oneAlldayEvent->id }}">
                                                            <p>{{ $oneAlldayEvent->name }}</p>
                                                            @if ( ($oneAlldayEvent->name == 'Vacation' || $oneAlldayEvent->name == 'Illness' ) && $oneAlldayEvent->accepted == 1)
                                                                <p class="event-accepted">accepted</p>
                                                            @endif

                                                        <!-- +++++++++++++++ VACATION ILLNESS ACCEPT +++++++++++++++ -->
                                                            @if ( ($oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness" ) && $oneAlldayEvent->accepted == 0)
                                                                <div id="allday-admin{{ $oneAlldayEvent->id }}"
                                                                     class="event-dropdown-content">
                                                                    <form method="POST"
                                                                          action="{{ url('admin/acceptAlldayEvent') }}"> {{ csrf_field() }}
                                                                        <input value="{{ $oneAlldayEvent->date }}"
                                                                               style="display: none"/>
                                                                        <input style="display: none;" name="thisViewId"
                                                                               value="{{ $thisRetailStore->id }}"/>
                                                                        <input style="display: none;" name="thisUrl"
                                                                               value="/admin/employer-planning/"/>
                                                                        <input style="display: none;" name="thisDate"
                                                                               value="{{ $week[0]->format('d-m-Y') }}"/>
                                                                        <button class="add-event-button" name="eventId"
                                                                                value="{{ $oneAlldayEvent->id }}">OK
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            @endif

                                                        <!-- +++++++++++++++ VACATION ILLNESS NOT-ACCEPT +++++++++++++++ -->
                                                            @if ( ($oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness" ) && $oneAlldayEvent->accepted == 1)
                                                                <div id="allday-admin{{ $oneAlldayEvent->id }}"
                                                                     class="event-dropdown-content">
                                                                    <form method="POST"
                                                                          action="{{ url('admin/notAcceptAlldayEvent') }}"> {{ csrf_field() }}
                                                                        <input value="{{ $oneAlldayEvent->date }}"
                                                                               style="display: none"/>
                                                                        <input style="display: none;" name="thisViewId"
                                                                               value="{{ $thisRetailStore->id }}"/>
                                                                        <input style="display: none;" name="thisUrl"
                                                                               value="/admin/employer-planning/"/>
                                                                        <input style="display: none;" name="thisDate"
                                                                               value="{{ $week[0]->format('d-m-Y') }}"/>
                                                                        <button class="delete-button" name="eventId"
                                                                                value="{{ $oneAlldayEvent->id }}">-
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            @endif


                                                        </div>
                                                    @endif
                                                @endforeach


                                            </td>
                                            @endfor
                                </tr>

                                <tr class="time-events">
                                    <td class="button-show"></td>

                                @for ($i = 0; $i < 7; $i++)


                                    <!-- +++++++++++++++ IF TODAY +++++++++++++++ -->
                                        @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                            <td class="today">@else
                                            <td>@endif


                                            <!-- +++++++++++++++ TIME EVENT +++++++++++++++ -->
                                                @foreach($manyTimeEvent as $oneTimeEvent)
                                                    @if( (new DateTime($oneTimeEvent->date))->format('d-m-Y') == $week[$i]->format('d-m-Y')
                                                        && $oneTimeEvent->employee_id == $employee->id )

                                                        <div class="drop-btn one-time-event {{ $oneTimeEvent->color }}"
                                                             onclick="openEventDropdown('time-admin' + {{ $oneTimeEvent->id }} + '')"
                                                             draggable="true" id="div-time-admin{{ $oneTimeEvent->id }}"
                                                             ondragstart="drag(event)">
                                                            <p>{{ $oneTimeEvent->name }}</p>
                                                            <p>{{ $oneTimeEvent->from }}</p>
                                                            <p>{{ $oneTimeEvent->to }}</p>
                                                            @if ( ($oneTimeEvent->name == 'Vacation' || $oneTimeEvent->name == 'Illness' ) && $oneTimeEvent->accepted == 1)
                                                                <p class="event-accepted">accepted</p>
                                                            @endif

                                                            <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                                                            <input style="display: none;" class="this-emp-id"
                                                                   value="{{ $employee->id }}">

                                                            @if ( $oneTimeEvent->name == "Work"  || $oneTimeEvent->name ==  "Vacation"  || $oneTimeEvent->name == "Illness")
                                                                <div id="time-admin{{ $oneTimeEvent->id }}"
                                                                     class="event-dropdown-content">

                                                                    <!-- +++++++++++++++ PUT TO WORKTIME FIX +++++++++++++++ -->

                                                                    @if ( $oneTimeEvent->name == "Work")
                                                                        <button onclick="openAddTimeModalAdmin({{ $oneTimeEvent->id }})"
                                                                                class="add-event-button">+
                                                                        </button>
                                                                        <button id="button-add-worktime-fix-event-admin"
                                                                                style="display: none;" data-toggle="modal"
                                                                                data-target="#change-button-event-time-admin">
                                                                            ⇄
                                                                        </button>
                                                                    @endif


                                                                <!-- +++++++++++++++ VACATION ILLNESS ACCEPT +++++++++++++++ -->
                                                                    @if ( ($oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness" ) && $oneTimeEvent->accepted == 0)
                                                                        <form method="POST"
                                                                              action="{{ url('admin/acceptTimeEvent') }}"> {{ csrf_field() }}
                                                                            <input value="{{ $oneTimeEvent->date }}"
                                                                                   style="display: none"/>
                                                                            <input style="display: none;" name="thisViewId"
                                                                                   value="{{ $thisRetailStore->id }}"/>
                                                                            <input style="display: none;" name="thisUrl"
                                                                                   value="/admin/employer-planning/"/>
                                                                            <input style="display: none;" name="thisDate"
                                                                                   value="{{ $week[0]->format('d-m-Y') }}"/>
                                                                            <button class="add-event-button" name="eventId"
                                                                                    value="{{ $oneTimeEvent->id }}">OK
                                                                            </button>
                                                                        </form>
                                                                    @endif


                                                                <!-- +++++++++++++++ VACATION ILLNESS NOT-ACCEPT +++++++++++++++ -->
                                                                    @if ( ($oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness" ) && $oneTimeEvent->accepted == 1)
                                                                        <form method="POST"
                                                                              action="{{ url('admin/notAcceptTimeEvent') }}"> {{ csrf_field() }}
                                                                            <input value="{{ $oneTimeEvent->date }}"
                                                                                   style="display: none"/>
                                                                            <input style="display: none;" name="thisViewId"
                                                                                   value="{{ $thisRetailStore->id }}"/>
                                                                            <input style="display: none;" name="thisUrl"
                                                                                   value="/admin/employer-planning/"/>
                                                                            <input style="display: none;" name="thisDate"
                                                                                   value="{{ $week[0]->format('d-m-Y') }}"/>
                                                                            <button class="delete-button" name="eventId"
                                                                                    value="{{ $oneTimeEvent->id }}">-
                                                                            </button>
                                                                        </form>
                                                                    @endif

                                                                </div>
                                                            @endif

                                                        </div>

                                                    @endif
                                                @endforeach


                                            </td>
                                            @endfor
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    <br>


                    <!-- +++++++++++++++ WORKTIME FIX ++++++++++++++++++++ -->
                    <div class="table-head-store">
                        <p class="table-head-a">Final Workplan</p>
                    </div>
                    <table class="calendar-days-all-emp">
                        <tr class="week-date">
                            <td class="button-show"></td>

                            <!-- +++++++++++++++ DATE +++++++++++++++ -->
                            @for ($i = 0; $i < 7; $i++)
                                <td>
                                    {{ $week[$i]->format('d.m.') }}
                                </td>
                            @endfor
                        </tr>


                        <tr class="week-days">
                            <td class="button-show">Employees</td>


                            <!-- +++++++++++++++ WEEKDAY +++++++++++++++ -->
                            @for ($i = 0; $i < 7; $i++)
                                @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                    <td class="today">
                                @else
                                    <td>
                                        @endif
                                        {{ $week[$i]->format('D') }}</td>
                                    @endfor
                        </tr>

                        <!-- +++++++++++++++ EMPLOYEE ROW +++++++++++++++ -->
                        @foreach($allEmployees as $employee)
                            @if($employee->retail_store_id == $thisRetailStore->id)

                                <tr class="button-hide">
                                    <td class="button-show"></td>
                                    <td>{{ $employee->surname }} </td>
                                    <td class="no-border-bottom">&nbsp;{{ $employee->forename }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr class="all-day">

                                    <td class="button-show">{{ $employee->surname }} {{ $employee->forename }}</td>
                                @for ($i = 0; $i < 7; $i++)


                                    <!-- +++++++++++++++ IF TODAY +++++++++++++++ -->
                                        @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                            <td class="today">@else
                                            <td>@endif


                                            <!-- +++++++++++++++ ALLDAY EVENT +++++++++++++++ -->
                                                @foreach($manyAlldayEvent as $oneAlldayEvent)
                                                    @if( (new DateTime($oneAlldayEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                                        && (( $oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness") && $oneAlldayEvent->accepted == 1)
                                                        && $oneAlldayEvent->employee_id == $employee->id)

                                                        <div class="drop-btn one-allday-event {{ $oneAlldayEvent->color }}"
                                                             onclick="openEventDropdown('allday-admin-final' + {{ $oneAlldayEvent->id }} + '')"
                                                             draggable="true"
                                                             id="div-allday-admin{{ $oneAlldayEvent->id }}">
                                                            <p>{{ $oneAlldayEvent->name }}</p>
                                                            @if ( ($oneAlldayEvent->name == 'Vacation' || $oneAlldayEvent->name == 'Illness' ) && $oneAlldayEvent->accepted == 1)
                                                                <p class="event-accepted">accepted</p>
                                                            @endif

                                                        <!-- +++++++++++++++ VACATION ILLNESS ACCEPT +++++++++++++++ -->
                                                            @if ( ($oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness" ) && $oneAlldayEvent->accepted == 0)
                                                                <div id="allday-admin-final{{ $oneAlldayEvent->id }}"
                                                                     class="event-dropdown-content">
                                                                    <form method="POST"
                                                                          action="{{ url('admin/acceptAlldayEvent') }}"> {{ csrf_field() }}
                                                                        <input value="{{ $oneAlldayEvent->date }}"
                                                                               style="display: none"/>
                                                                        <input style="display: none;" name="thisViewId"
                                                                               value="{{ $thisRetailStore->id }}"/>
                                                                        <input style="display: none;" name="thisUrl"
                                                                               value="/admin/employer-planning/"/>
                                                                        <input style="display: none;" name="thisDate"
                                                                               value="{{ $week[0]->format('d-m-Y') }}"/>
                                                                        <button class="add-event-button" name="eventId"
                                                                                value="{{ $oneAlldayEvent->id }}">OK
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            @endif

                                                        <!-- +++++++++++++++ VACATION ILLNESS NOT-ACCEPT +++++++++++++++ -->
                                                            @if ( ($oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness" ) && $oneAlldayEvent->accepted == 1)
                                                                <div id="allday-admin-final{{ $oneAlldayEvent->id }}"
                                                                     class="event-dropdown-content">
                                                                    <form method="POST"
                                                                          action="{{ url('admin/notAcceptAlldayEvent') }}"> {{ csrf_field() }}
                                                                        <input value="{{ $oneAlldayEvent->date }}"
                                                                               style="display: none"/>
                                                                        <input style="display: none;" name="thisViewId"
                                                                               value="{{ $thisRetailStore->id }}"/>
                                                                        <input style="display: none;" name="thisUrl"
                                                                               value="/admin/employer-planning/"/>
                                                                        <input style="display: none;" name="thisDate"
                                                                               value="{{ $week[0]->format('d-m-Y') }}"/>
                                                                        <button class="delete-button" name="eventId"
                                                                                value="{{ $oneAlldayEvent->id }}">-
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            @endif


                                                        </div>
                                                    @endif
                                                @endforeach


                                            </td>
                                            @endfor
                                </tr>



                                <tr class="time-events">
                                    <td class="button-show"></td>
                                @for ($i = 0; $i < 7; $i++)


                                    <!-- +++++++++++++++ IF TODAY +++++++++++++++ -->
                                        @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                            <td class="today">
                                        @else
                                            <td>
                                            @endif


                                            <!-- +++++++++++++++ WORKTIME EVENT +++++++++++++++ -->
                                                @foreach($manyWorktimeEvent as $oneWorktimeEvent)
                                                    @if( (new DateTime($oneWorktimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                                    && $oneWorktimeEvent->employee_id == $employee->id)

                                                        <div class="drop-btn one-time-event {{ $oneWorktimeEvent->color }}"
                                                             onclick="openEventDropdown('worktime-fix-admin' + {{ $oneWorktimeEvent->id }} + '')"
                                                             draggable="true"
                                                             id="div-worktime-fix-admin{{ $oneWorktimeEvent->id }}"
                                                             ondragstart="drag(event)">
                                                            <p>{{ $oneWorktimeEvent->name }}</p>
                                                            <p>{{ $oneWorktimeEvent->from }}</p>
                                                            <p>{{ $oneWorktimeEvent->to }}</p>
                                                            <input value="{{ $oneWorktimeEvent->date }}"
                                                                   style="display: none"/>
                                                            <input style="display: none;" class="this-emp-id"
                                                                   value="{{ $employee->id }}">
                                                            <input style="display: none;" class="this-event-id"
                                                                   value="{{ $oneWorktimeEvent->id }}">

                                                            <div id="worktime-fix-admin{{ $oneWorktimeEvent->id }}"
                                                                 class="event-dropdown-content">

                                                                <button onclick="openChangeWorktimeFixModal({{ $oneWorktimeEvent->id }})"
                                                                        class="change-event-button">⇄
                                                                </button>

                                                                <button id="button-change-worktime-fix-event-admin"
                                                                        style="display: none;"
                                                                        data-toggle="modal"
                                                                        data-target="#change-button-event-worktime-fix-admin">
                                                                    ⇄
                                                                </button>

                                                                <form method="POST"
                                                                      action="{{ url('/admin/deleteWorktimeFix') }}"> {{ csrf_field() }}
                                                                    <input style="display: none;" name="thisRetailStoreId"
                                                                           value="{{ $thisRetailStore->id }}"/>
                                                                    <input style="display: none;" name="thisDate"
                                                                           value="{{ $week[0]->format('d-m-Y') }}"/>
                                                                    <button class="delete-event-button" name="eventId"
                                                                            value="{{ $oneWorktimeEvent->id }}">-
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach


                                            <!-- +++++++++++++++ TIME EVENT +++++++++++++++ -->
                                                @foreach($manyTimeEvent as $oneTimeEvent)
                                                    @if( (new DateTime($oneTimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                                        && (( $oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness") && $oneTimeEvent->accepted == 1)
                                                        && $oneTimeEvent->employee_id == $employee->id)

                                                        <div class="drop-btn one-time-event {{ $oneTimeEvent->color }}"
                                                             onclick="openEventDropdown('time-admin-final' + {{ $oneTimeEvent->id }} + '')"
                                                             draggable="true" id="div-time-admin{{ $oneTimeEvent->id }}"
                                                             ondragstart="drag(event)">
                                                            <p>{{ $oneTimeEvent->name }}</p>
                                                            <p>{{ $oneTimeEvent->from }}</p>
                                                            <p>{{ $oneTimeEvent->to }}</p>
                                                            @if ( ($oneTimeEvent->name == 'Vacation' || $oneTimeEvent->name == 'Illness' ) && $oneTimeEvent->accepted == 1)
                                                                <p class="event-accepted">accepted</p>
                                                            @endif

                                                            <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                                                            <input style="display: none;" class="this-emp-id"
                                                                   value="{{ $employee->id }}">

                                                            @if ( $oneTimeEvent->name == "Work"  || $oneTimeEvent->name ==  "Vacation"  || $oneTimeEvent->name == "Illness")
                                                                <div id="time-admin-final{{ $oneTimeEvent->id }}"
                                                                     class="event-dropdown-content">

                                                                    <!-- +++++++++++++++ PUT TO WORKTIME FIX +++++++++++++++ -->

                                                                    @if ( $oneTimeEvent->name == "Work")
                                                                        <button onclick="openAddTimeModalAdmin({{ $oneTimeEvent->id }})"
                                                                                class="add-event-button">+
                                                                        </button>
                                                                        <button id="button-add-worktime-fix-event-admin"
                                                                                style="display: none;" data-toggle="modal"
                                                                                data-target="#change-button-event-time-admin">
                                                                            ⇄
                                                                        </button>
                                                                    @endif


                                                                <!-- +++++++++++++++ VACATION ILLNESS ACCEPT +++++++++++++++ -->
                                                                    @if ( ($oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness" ) && $oneTimeEvent->accepted == 0)
                                                                        <form method="POST"
                                                                              action="{{ url('admin/acceptTimeEvent') }}"> {{ csrf_field() }}
                                                                            <input value="{{ $oneTimeEvent->date }}"
                                                                                   style="display: none"/>
                                                                            <input style="display: none;" name="thisViewId"
                                                                                   value="{{ $thisRetailStore->id }}"/>
                                                                            <input style="display: none;" name="thisUrl"
                                                                                   value="/admin/employer-planning/"/>
                                                                            <input style="display: none;" name="thisDate"
                                                                                   value="{{ $week[0]->format('d-m-Y') }}"/>
                                                                            <button class="add-event-button" name="eventId"
                                                                                    value="{{ $oneTimeEvent->id }}">OK
                                                                            </button>
                                                                        </form>
                                                                    @endif


                                                                <!-- +++++++++++++++ VACATION ILLNESS NOT-ACCEPT +++++++++++++++ -->
                                                                    @if ( ($oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness" ) && $oneTimeEvent->accepted == 1)
                                                                        <form method="POST"
                                                                              action="{{ url('admin/notAcceptTimeEvent') }}"> {{ csrf_field() }}
                                                                            <input value="{{ $oneTimeEvent->date }}"
                                                                                   style="display: none"/>
                                                                            <input style="display: none;" name="thisViewId"
                                                                                   value="{{ $thisRetailStore->id }}"/>
                                                                            <input style="display: none;" name="thisUrl"
                                                                                   value="/admin/employer-planning/"/>
                                                                            <input style="display: none;" name="thisDate"
                                                                                   value="{{ $week[0]->format('d-m-Y') }}"/>
                                                                            <button class="delete-button" name="eventId"
                                                                                    value="{{ $oneTimeEvent->id }}">-
                                                                            </button>
                                                                        </form>
                                                                    @endif

                                                                </div>
                                                            @endif

                                                        </div>

                                                    @endif
                                                @endforeach


                                            </td>
                                            @endfor
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    <br>


                    <!-- +++++++++++++++ EMPLOYEE PER HOUR ++++++++++++++++++++ -->
                    <div class="table-head-store">
                        <p class="table-head-a">Amount of Employees per time frame</p>
                    </div>
                    <table class="calendar-days-all-emp">
                        <tr class="week-date">
                            <td></td>

                            <!-- +++++++++++++++ DATE +++++++++++++++ -->
                            @for ($i = 0; $i < 7; $i++)
                                <td>
                                    {{ $week[$i]->format('d.m.') }}
                                </td>
                            @endfor
                        </tr>


                        <tr class="week-days">
                            <td></td>


                            <!-- +++++++++++++++ WEEKDAY +++++++++++++++ -->
                            @for ($i = 0; $i < 7; $i++)
                                @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                    <td class="today">
                                @else
                                    <td>
                                        @endif
                                        {{ $week[$i]->format('D') }}</td>
                                    @endfor
                        </tr>

                        <!-- +++++++++++++++ TIME ROW +++++++++++++++ -->
                        @for ($i = 0; $i < 17; $i++)
                            <tr class="time-events">
                                <td>{{ $i+6  }}:00</td>
                            @for ($f = 0; $f < 7; $f++)


                                <!-- +++++++++++++++ IF TODAY +++++++++++++++ -->
                                    @if((new DateTime())->format('d m Y') == $week[$f]->format('d m Y'))
                                        <td class="today">
                                    @else
                                        <td>
                                            @endif
                                        </td>
                                        @endfor
                            </tr>
                        @endfor
                    </table>
                    <br>


                    <button class="set-right-buttom form-control delete-button" data-toggle="modal" type="submit"
                            data-target="#delete-store">Delete
                    </button>
                </aside>

                <div class=" col-xs-12 space_emp"></div>

        </div>



        @include('admin.includes.change-store')
        @include('admin.includes.delete-store')
        @include('admin.includes.modals-event-add-worktime-fix')
        @include('admin.includes.modals-event-change-worktime-fix')

    @endif
@endsection


@section('js')
    <script src="{{asset('js/general/side-bar.js')}}"></script>
    <script src="{{asset('js/general/calendar.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
@endsection

