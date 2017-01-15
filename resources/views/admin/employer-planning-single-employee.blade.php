@extends('admin.layout.employer-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-account.css')}}">
@endsection

@section('content')

    @if($amountOfRetailStores != 0)

        <div class="fake-body container">
            <br>
            <aside class="col-xs-12 col-sm-3 side-bar">
                @include('admin.includes.employer-side-bar-planning')
            </aside>


            <aside class="col-xs-12 col-sm-9 my-right-side">

                <h2>{{ $thisEmployee->surname }} {{ $thisEmployee->forename }}</h2>


                <!------------------------ NAIGATION -------------------------------->
                <nav class="calendar-navigation">
                    <div class="calendar-navigation-padding">
                        <div class="col-xs-6 navigation-today">
                            <form method="GET" action="{{ url('/admin/employer-single') . '/' . $thisEmployee->id . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                                <button type="submit"><</button>
                            </form>
                            <form method="GET" action="{{ url('/admin/employer-single') . '/' . $thisEmployee->id . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
                                <button type="submit">Today</button>
                            </form>
                            <form method="GET" action="{{ url('/admin/employer-single') . '/' . $thisEmployee->id . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                                <button type="submit">></button>
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
                <br>


                <!------------------------ PROPOSAL -------------------------------->
                <div class="table-head-store">
                    <p class="table-head-a">Proposals</p>
                </div>
                <table class="calendar-days-all-emp">
                    <tr class="week-date">
                        <td></td>

                        <!------------------- DATE ----------------------->
                        @for ($i = 0; $i < 7; $i++)
                            <td>
                                {{ $week[$i]->format('d.m.') }}
                            </td>
                        @endfor
                    </tr>


                    <tr class="week-days">
                        <td>Employees</td>


                        <!------------------- WEEKDAY ----------------------->
                        @for ($i = 0; $i < 7; $i++)
                            @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                <td class="today">
                            @else
                                <td>
                                    @endif
                                    {{ $week[$i]->format('D') }}</td>
                                @endfor
                    </tr>


                    <!------------------- EMPLOYEE ROW ----------------------->
                    <tr class="all-day">
                        <td>{{ $thisEmployee->surname }} {{ $thisEmployee->forename }}</td>
                    @for ($i = 0; $i < 7; $i++)


                        <!------------------- IF TODAY ----------------------->
                            @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                <td class="today">@else
                                <td>@endif


                                <!------------------- ALLDAY EVENT ----------------------->
                                    @foreach($manyAlldayEvent as $oneAlldayEvent)
                                        @if( (new DateTime($oneAlldayEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                        && $oneAlldayEvent->employee_id == $thisEmployee->id)

                                            <div class="drop-btn one-allday-event {{ $oneAlldayEvent->color }}"
                                                 onclick="openEventDropdown('allday-admin-single' + {{ $oneAlldayEvent->id }} + '')"
                                                 draggable="true"
                                                 id="allday-admin{{ $oneAlldayEvent->id }}">
                                                <p>{{ $oneAlldayEvent->name }}</p>
                                                @if ( ($oneAlldayEvent->name == 'Vacation' || $oneAlldayEvent->name == 'Illness' ) && $oneAlldayEvent->accepted == 1)
                                                    <p class="event-accepted">accepted</p>
                                                @endif


                                            <!------------------- VACATION ILLNESS ACCEPT ----------------------->
                                                @if ( ($oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness" ) && $oneAlldayEvent->accepted == 0)
                                                    <div id="allday-admin-single{{ $oneAlldayEvent->id }}" class="event-dropdown-content">
                                                        <form method="POST" action="{{ url('admin/acceptAlldayEvent') }}"> {{ csrf_field() }}
                                                            <input value="{{ $oneAlldayEvent->date }}" style="display: none"/>
                                                            <input style="display: none;" name="thisViewId" value="{{ $thisEmployee->id }}"/>
                                                            <input style="display: none;" name="thisUrl" value="/admin/employer-single/"/>
                                                            <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                                                            <button class="add-event-button" name="eventId" value="{{ $oneAlldayEvent->id }}">OK</button>
                                                        </form>
                                                    </div>
                                                @endif

                                            <!------------------- VACATION ILLNESS NOT-ACCEPT ----------------------->
                                                @if ( ($oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness" ) && $oneAlldayEvent->accepted == 1)
                                                    <div id="allday-admin-single{{ $oneAlldayEvent->id }}" class="event-dropdown-content">
                                                        <form method="POST" action="{{ url('admin/notAcceptAlldayEvent') }}"> {{ csrf_field() }}
                                                            <input value="{{ $oneAlldayEvent->date }}" style="display: none"/>
                                                            <input style="display: none;" name="thisViewId" value="{{ $thisEmployee->id }}"/>
                                                            <input style="display: none;" name="thisUrl" value="/admin/employer-single/"/>
                                                            <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                                                            <button class="delete-button" name="eventId" value="{{ $oneAlldayEvent->id }}">-</button>
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
                        <td></td>

                    @for ($i = 0; $i < 7; $i++)


                        <!------------------- IF TODAY ----------------------->
                            @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                <td class="today"> @else
                                <td> @endif


                                <!------------------- TIME EVENT ----------------------->
                                    @foreach($manyTimeEvent as $oneTimeEvent)
                                        @if( (new DateTime($oneTimeEvent->date))->format('d-m-Y') == $week[$i]->format('d-m-Y')
                                            && $oneTimeEvent->employee_id == $thisEmployee->id )

                                            <div class="drop-btn one-time-event {{ $oneTimeEvent->color }}"
                                                 onclick="openEventDropdown('time-admin-single' + {{ $oneTimeEvent->id }} + '')"
                                                 draggable="true" id="div-time-admin{{ $oneTimeEvent->id }}" ondragstart="drag(event)">
                                                <p>{{ $oneTimeEvent->name }}</p>
                                                <p>{{ $oneTimeEvent->from }}</p>
                                                <p>{{ $oneTimeEvent->to }}</p>
                                                @if ( ($oneTimeEvent->name == 'Vacation' || $oneTimeEvent->name == 'Illness' ) && $oneTimeEvent->accepted == 1)
                                                    <p class="event-accepted">accepted</p>
                                                @endif

                                                <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                                                <input style="display: none;" class="this-emp-id" value="{{ $thisEmployee->id }}">

                                                @if ( $oneTimeEvent->name == "Work"  || $oneTimeEvent->name ==  "Vacation"  || $oneTimeEvent->name == "Illness")
                                                    <div id="time-admin-single{{ $oneTimeEvent->id }}" class="event-dropdown-content">


                                                        <!------------------- PUT TO WORKTIME FIX ----------------------->
                                                        @if ( $oneTimeEvent->name == "Work")
                                                            <button onclick="openAddTimeModalAdmin({{ $oneTimeEvent->id }})" class="add-event-button">+</button>
                                                            <button id="button-add-worktime-fix-event-admin" style="display: none;" data-toggle="modal" data-target="#change-button-event-time-admin">
                                                                ⇄
                                                            </button>
                                                        @endif


                                                    <!------------------- VACATION ILLNESS ACCEPT ----------------------->
                                                        @if ( ($oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness" ) && $oneTimeEvent->accepted == 0)
                                                            <form method="POST" action="{{ url('admin/acceptTimeEvent') }}"> {{ csrf_field() }}
                                                                <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                                                                <input style="display: none;" name="thisViewId" value="{{ $thisEmployee->id }}"/>
                                                                <input style="display: none;" name="thisUrl" value="/admin/employer-single/"/>
                                                                <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                                                                <button class="add-event-button" name="eventId" value="{{ $oneTimeEvent->id }}">OK</button>
                                                            </form>
                                                        @endif


                                                    <!------------------- VACATION ILLNESS NOT-ACCEPT ----------------------->
                                                        @if ( ($oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness" ) && $oneTimeEvent->accepted == 1)
                                                            <form method="POST" action="{{ url('admin/notAcceptTimeEvent') }}"> {{ csrf_field() }}
                                                                <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                                                                <input style="display: none;" name="thisViewId" value="{{ $thisEmployee->id }}"/>
                                                                <input style="display: none;" name="thisUrl" value="/admin/employer-single/"/>
                                                                <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                                                                <button class="delete-button" name="eventId" value="{{ $oneTimeEvent->id }}">-</button>
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
                </table>
                <br>


                <!------------------------ WORKTIME FIX -------------------------------->
                <div class="table-head-store">
                    <p class="table-head-a">Final Workplan</p>
                </div>
                <table class="calendar-days-all-emp">
                    <tr class="week-date">
                        <td></td>

                        <!------------------- DATE ----------------------->
                        @for ($i = 0; $i < 7; $i++)
                            <td>
                                {{ $week[$i]->format('d.m.') }}
                            </td>
                        @endfor
                    </tr>


                    <tr class="week-days">
                        <td>Employee</td>


                        <!------------------- WEEKDAY ----------------------->
                        @for ($i = 0; $i < 7; $i++)
                            @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                <td class="today">@else
                                <td>@endif
                                    {{ $week[$i]->format('D') }}</td>
                                @endfor
                    </tr>



                    <tr class="all-day">

                        <td>{{ $thisEmployee->surname }} {{ $thisEmployee->forename }}</td>
                    @for ($i = 0; $i < 7; $i++)


                        <!------------------- IF TODAY ----------------------->
                            @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                <td class="today">@else
                                <td>@endif


                                <!------------------- ALLDAY EVENT ----------------------->
                                    @foreach($manyAlldayEvent as $oneAlldayEvent)
                                        @if( (new DateTime($oneAlldayEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                            && (( $oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness") && $oneAlldayEvent->accepted == 1)
                                            && $oneAlldayEvent->employee_id == $thisEmployee->id)

                                            <div class="drop-btn one-allday-event {{ $oneAlldayEvent->color }}"
                                                 onclick="openEventDropdown('allday-admin-final' + {{ $oneAlldayEvent->id }} + '')"
                                                 draggable="true" id="div-allday-admin{{ $oneAlldayEvent->id }}">
                                                <p>{{ $oneAlldayEvent->name }}</p>
                                                @if ( ($oneAlldayEvent->name == 'Vacation' || $oneAlldayEvent->name == 'Illness' ) && $oneAlldayEvent->accepted == 1)
                                                    <p class="event-accepted">accepted</p>
                                                @endif

                                            <!------------------- VACATION ILLNESS ACCEPT ----------------------->
                                                @if ( ($oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness" ) && $oneAlldayEvent->accepted == 0)
                                                    <div id="allday-admin-final{{ $oneAlldayEvent->id }}" class="event-dropdown-content">
                                                        <form method="POST" action="{{ url('admin/acceptAlldayEvent') }}"> {{ csrf_field() }}
                                                            <input value="{{ $oneAlldayEvent->date }}" style="display: none"/>
                                                            <input style="display: none;" name="thisViewId" value="{{ $thisRetailStore->id }}"/>
                                                            <input style="display: none;" name="thisUrl" value="/admin/employer-planning/"/>
                                                            <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                                                            <button class="add-event-button" name="eventId" value="{{ $oneAlldayEvent->id }}">OK</button>
                                                        </form>
                                                    </div>
                                                @endif

                                            <!------------------- VACATION ILLNESS NOT-ACCEPT ----------------------->
                                                @if ( ($oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness" ) && $oneAlldayEvent->accepted == 1)
                                                    <div id="allday-admin-final{{ $oneAlldayEvent->id }}" class="event-dropdown-content">
                                                        <form method="POST" action="{{ url('admin/notAcceptAlldayEvent') }}"> {{ csrf_field() }}
                                                            <input value="{{ $oneAlldayEvent->date }}" style="display: none"/>
                                                            <input style="display: none;" name="thisViewId" value="{{ $thisRetailStore->id }}"/>
                                                            <input style="display: none;" name="thisUrl" value="/admin/employer-planning/"/>
                                                            <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                                                            <button class="delete-button" name="eventId" value="{{ $oneAlldayEvent->id }}">-</button>
                                                        </form>
                                                    </div>
                                                @endif


                                            </div>
                                        @endif
                                    @endforeach


                                </td>
                                @endfor
                    </tr>

                    <!------------------- EMPLOYEE ROW ----------------------->
                    <tr class="time-events">
                        <td></td>
                    @for ($i = 0; $i < 7; $i++)


                        <!------------------- IF TODAY ----------------------->
                            @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                <td class="today">@else
                                <td>@endif


                                <!------------------- WORKTIME EVENT ----------------------->
                                    @foreach($manyWorktimeEvent as $oneWorktimeEvent)
                                        @if( (new DateTime($oneWorktimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                        && $oneWorktimeEvent->employee_id == $thisEmployee->id)


                                            <div class="drop-btn one-time-event {{ $oneWorktimeEvent->color }}"
                                                 onclick="openEventDropdown('worktime-fix-admin' + {{ $oneWorktimeEvent->id }} + '')"
                                                 draggable="true"
                                                 id="div-worktime-fix-admin{{ $oneWorktimeEvent->id }}"
                                                 ondragstart="drag(event)">
                                                <p>{{ $oneWorktimeEvent->name }}</p>
                                                <p>{{ $oneWorktimeEvent->from }}</p>
                                                <p>{{ $oneWorktimeEvent->to }}</p>

                                                <input value="{{ $oneWorktimeEvent->date }}" style="display: none"/>
                                                <input style="display: none;" class="this-emp-id" value="{{ $thisEmployee->id }}">
                                                <input style="display: none;" class="this-event-id" value="{{ $oneWorktimeEvent->id }}">

                                                <div id="worktime-fix-admin{{ $oneWorktimeEvent->id }}" class="event-dropdown-content">

                                                    <button onclick="openChangeWorktimeFixModal({{ $oneWorktimeEvent->id }})" class="change-event-button">⇄</button>

                                                    <button id="button-change-worktime-fix-event-admin" style="display: none;" data-toggle="modal" data-target="#change-button-event-worktime-fix-admin">
                                                        ⇄
                                                    </button>

                                                    <form method="POST" action="{{ url('/admin/deleteWorktimeFix') }}"> {{ csrf_field() }}
                                                        <input style="display: none;" name="thisRetailStoreId" value="{{ $thisRetailStore->id }}"/>
                                                        <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                                                        <button class="delete-event-button" name="eventId" value="{{ $oneWorktimeEvent->id }}">-</button>
                                                    </form>
                                                </div>
                                            </div>





                                        @endif
                                    @endforeach
                                </td>
                                @endfor
                    </tr>
                </table>
                <br>


                <!------------------------- ACCOUNT DETAILS -------------------------------->
                <button class="form-control set-right modal-change-button space-to-top-bottom" type="submit"
                        data-toggle="modal" data-target="#change" value="{{ $thisEmployee->id }}" name="thisEmployeeId">
                    Change
                </button>
                <br>
                <br>


                <table class="table-account">
                    <tr>
                        <td>Employer ID</td>
                        <td>{{ $thisEmployee->id }}</td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>******</td>
                    </tr>

                    <tr class="table-space">
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Surname</td>
                        <td>{{ $thisEmployee->surname }}</td>
                    </tr>
                    <tr>
                        <td>Forename</td>
                        <td>{{ $thisEmployee->forename }}</td>
                    </tr>
                    <tr>
                        <td>E-Mail</td>
                        <td>{{ $thisEmployee->email }}</td>
                    </tr>

                    <tr class="table-space">
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Period of Agreement</td>
                        <td>{{ $thisEmployee->period_of_agreement }}</td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>{{ $thisEmployee->role }}</td>
                    </tr>
                    <tr>
                        <td>Classification</td>
                        <td>{{ $thisEmployee->classification }}</td>
                    </tr>
                    <tr>
                        <td>Agreement working hours</td>
                        <td>{{ $thisEmployee->working_hours }}</td>
                    </tr>

                    <tr class="table-space">
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Company name</td>
                        <td>{{ $company->name }}</td>
                    </tr>
                    <tr>
                        <td>Retail Store</td>
                        <td>{{ $thisRetailStore->name }} (id: {{ $thisRetailStore->id }})</td>
                    </tr>
                    <tr>
                        <td>Address of Retail Store</td>
                        <td>{{ $address->street }} {{ $address->street_nr }}
                            , {{ $address->postcode }} {{ $address->city }}, {{ $address->country }}
                        </td>

                    </tr>
                </table>

                <button class="form-control set-right delete-button space-to-top-bottom" type="submit"
                        data-toggle="modal"
                        data-target="#delete-emp" value="{{ $thisEmployee->id }}" name="thisEmployeeId">
                    Delete
                </button>
                <br>
                <br>


            </aside>

        </div>
    @endif

    @include('admin.includes.modals-event-add-worktime-fix')
    @include('admin.includes.modals-event-change-worktime-fix')


@endsection

@include('admin.includes.change-emp')
@include('admin.includes.delete-emp')

@section('js')
    <script src="{{asset('js/general/side-bar.js')}}"></script>
    <script src="{{asset('js/general/calendar.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
@endsection

