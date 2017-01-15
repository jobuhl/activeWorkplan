@extends('admin.layout.employer-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">

@endsection

@section('content')

    @if($amountOfRetailStores != 0)

        <div class="fake-body container">


            <br>
            <aside class="col-xs-12 col-sm-3 side-bar">


                @include('admin.includes.employer-side-bar-planning')

            </aside>


            <aside class="col-xs-12 col-sm-9 my-right-side">

                <!----------Search AJAX klappt noch nicht------------->

            {{--<input id="search-all" onclick="ajaxGetStores('')" placeholder="Search..."/>--}}
            {{--<div class="search-result">Hier kommen gleich die Jsons rein</div>--}}

            {{--<!-- Hier JSON-Daten laden -->--}}
            {{--<script type="text/javascript">--}}
            {{--function ajaxGetStores($characters) {--}}
            {{--$.ajax(--}}
            {{--{--}}
            {{--type: "POST",--}}
            {{--//                                url: "http://localhost:8888/activeWorkplan/public/admin/daten/" + $characters,--}}
            {{--url: "{{ url('/admin/daten') }}",//+ "/" + $characters,--}}

            {{--dataType: "json",--}}
            {{--success: function (json) {--}}
            {{--var a = "<ul>";--}}
            {{--$.each(json.store, function () {--}}
            {{--var thisStoreId = this['id'];--}}
            {{--a += "<li><a>" + this['name'] + "</a>";--}}

            {{--$.each(json.emp, function () {--}}
            {{--a += "<ul>";--}}
            {{--if (this['retail_store_id'] == thisStoreId) {--}}
            {{--a += "<li><a>" + this['surname'] + " " + this['forename'] + "</a></li>";--}}
            {{--}--}}
            {{--a += "</ul>";--}}
            {{--});--}}

            {{--a += "</li>";--}}

            {{--});--}}
            {{--a += "</ul>";--}}
            {{--$(".search-result").html(a);--}}
            {{--}--}}
            {{--}--}}
            {{--);--}}
            {{--}--}}

            {{--</script>--}}

            <!----------------------------->


                <!------------------------ SEARCH FIELD -------------------------------->
                <select id="select-emp" class="form-control to-right modal-input space-cap selectpicker col-xs-12"
                        data - live - search="true" data-live-search="true"
                        name="select-emp" onchange="javascript:location.href = this.value;">
                    <option style="display: none;"> Search...</option>
                    @foreach($allRetailStores as $retailStore)
                        <optgroup style=" border: none; ">
                            <option style="background-color: #F1F1F1; padding-left: 10px"
                                    value="{{ url('/admin/employer-planning') . '/' . $retailStore->id . '/' . $week[0]->format('d-m-Y') }}">{{ $retailStore->name }}</option>
                            @foreach($allEmployees as $employee)
                                @if($employee->retail_store_id == $retailStore->id)

                                    <option style="padding-left: 30px;"
                                            value="{{ url('/admin/employer-single') . '/' . $employee->id . '/' . $week[0]->format('d-m-Y') }}">{{ $employee->surname }} {{ $employee->forename }}</option>

                                @endif
                            @endforeach

                        </optgroup>
                    @endforeach
                </select>

                <div><h2>{{ $thisRetailStore->name }}</h2>
                    <button class="form-control to-right modal-change-button" data-toggle="modal"
                            data-target="#change-store">change
                    </button>
                </div>


                <!------------------------ NAIGATION -------------------------------->
                <nav class="calendar-navigation">
                    <div class="calendar-navigation-padding">

                        <div class="col-xs-6 navigation-today">
                            <form method="GET"
                                  action="{{ url('/admin/employer-planning') . '/' . $thisRetailStore->id . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                                <button type="submit"><</button>
                            </form>
                            <form method="GET"
                                  action="{{ url('/admin/employer-planning') . '/' . $thisRetailStore->id . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
                                <button type="submit">Today</button>
                            </form>
                            <form method="GET"
                                  action="{{ url('/admin/employer-planning') . '/' . $thisRetailStore->id . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
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
                    <p class="table-head-a">Individual proposals of Employees</p>
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
                    @foreach($allEmployees as $employee)
                        @if($employee->retail_store_id == $thisRetailStore->id)
                            <tr class="all-day">

                                <td>{{ $employee->surname }} {{ $employee->forename }}</td>
                            @for ($i = 0; $i < 7; $i++)


                                <!------------------- IF TODAY ----------------------->
                                    @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                        <td class="today">@else
                                        <td>@endif


                                        <!------------------- ALLDAY EVENT ----------------------->
                                            @foreach($manyAlldayEvent as $oneAlldayEvent)
                                                @if( (new DateTime($oneAlldayEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                                && $oneAlldayEvent->employee_id == $employee->id)

                                                    <div class="drop-btn one-allday-event {{ $oneAlldayEvent->color }}"
                                                         onclick="openEventDropdown('allday-admin' + {{ $oneAlldayEvent->id }} + '')"
                                                         draggable="true" id="div-allday-admin{{ $oneAlldayEvent->id }}">
                                                        <p>{{ $oneAlldayEvent->name }}</p>
                                                        @if ( ($oneAlldayEvent->name == 'Vacation' || $oneAlldayEvent->name == 'Illness' ) && $oneAlldayEvent->accepted == 1)
                                                            <p class="event-accepted">accepted</p>
                                                        @endif

                                                        <!------------------- VACATION ILLNESS ACCEPT ----------------------->
                                                        @if ( ($oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness" ) && $oneAlldayEvent->accepted == 0)
                                                            <div id="allday-admin{{ $oneAlldayEvent->id }}" class="event-dropdown-content">
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
                                                            <div id="allday-admin{{ $oneAlldayEvent->id }}" class="event-dropdown-content">
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

                            <tr class="time-events">
                                <td></td>

                            @for ($i = 0; $i < 7; $i++)


                                <!------------------- IF TODAY ----------------------->
                                    @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                        <td class="today">@else
                                        <td>@endif


                                        <!------------------- TIME EVENT ----------------------->
                                            @foreach($manyTimeEvent as $oneTimeEvent)
                                                @if( (new DateTime($oneTimeEvent->date))->format('d-m-Y') == $week[$i]->format('d-m-Y')
                                                    && $oneTimeEvent->employee_id == $employee->id )

                                                    <div class="drop-btn one-time-event {{ $oneTimeEvent->color }}"
                                                         onclick="openEventDropdown('time-admin' + {{ $oneTimeEvent->id }} + '')"
                                                         draggable="true" id="div-time-admin{{ $oneTimeEvent->id }}" ondragstart="drag(event)">
                                                        <p>{{ $oneTimeEvent->name }}</p>
                                                        <p>{{ $oneTimeEvent->from }}</p>
                                                        <p>{{ $oneTimeEvent->to }}</p>
                                                        @if ( ($oneTimeEvent->name == 'Vacation' || $oneTimeEvent->name == 'Illness' ) && $oneTimeEvent->accepted == 1)
                                                            <p class="event-accepted">accepted</p>
                                                        @endif

                                                        <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                                                        <input style="display: none;" class="this-emp-id" value="{{ $employee->id }}">

                                                        @if ( $oneTimeEvent->name == "Work"  || $oneTimeEvent->name ==  "Vacation"  || $oneTimeEvent->name == "Illness")
                                                            <div id="time-admin{{ $oneTimeEvent->id }}" class="event-dropdown-content">

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
                                                                        <input style="display: none;" name="thisViewId" value="{{ $thisRetailStore->id }}"/>
                                                                        <input style="display: none;" name="thisUrl" value="/admin/employer-planning/"/>
                                                                        <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                                                                        <button class="add-event-button" name="eventId" value="{{ $oneTimeEvent->id }}">OK</button>
                                                                    </form>
                                                                @endif


                                                            <!------------------- VACATION ILLNESS NOT-ACCEPT ----------------------->
                                                                @if ( ($oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness" ) && $oneTimeEvent->accepted == 1)
                                                                    <form method="POST" action="{{ url('admin/notAcceptTimeEvent') }}"> {{ csrf_field() }}
                                                                        <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                                                                        <input style="display: none;" name="thisViewId" value="{{ $thisRetailStore->id }}"/>
                                                                        <input style="display: none;" name="thisUrl" value="/admin/employer-planning/"/>
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
                        @endif
                    @endforeach
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
                    @foreach($allEmployees as $employee)
                        @if($employee->retail_store_id == $thisRetailStore->id)


                            <tr class="all-day">

                                <td>{{ $employee->surname }} {{ $employee->forename }}</td>
                            @for ($i = 0; $i < 7; $i++)


                                <!------------------- IF TODAY ----------------------->
                                    @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                        <td class="today">@else
                                        <td>@endif


                                        <!------------------- ALLDAY EVENT ----------------------->
                                            @foreach($manyAlldayEvent as $oneAlldayEvent)
                                                @if( (new DateTime($oneAlldayEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                                    && (( $oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness") && $oneAlldayEvent->accepted == 1)
                                                    && $oneAlldayEvent->employee_id == $employee->id)

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



                            <tr class="time-events">
                                <td></td>
                            @for ($i = 0; $i < 7; $i++)


                                <!------------------- IF TODAY ----------------------->
                                    @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                        <td class="today">
                                    @else
                                        <td>
                                        @endif


                                        <!------------------- WORKTIME EVENT ----------------------->
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


                                        <!------------------- TIME EVENT ----------------------->
                                            @foreach($manyTimeEvent as $oneTimeEvent)
                                                @if( (new DateTime($oneTimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                                    && (( $oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness") && $oneTimeEvent->accepted == 1)
                                                    && $oneTimeEvent->employee_id == $employee->id)

                                                    <div class="drop-btn one-time-event {{ $oneTimeEvent->color }}"
                                                         onclick="openEventDropdown('time-admin-final' + {{ $oneTimeEvent->id }} + '')"
                                                         draggable="true" id="div-time-admin{{ $oneTimeEvent->id }}" ondragstart="drag(event)">
                                                        <p>{{ $oneTimeEvent->name }}</p>
                                                        <p>{{ $oneTimeEvent->from }}</p>
                                                        <p>{{ $oneTimeEvent->to }}</p>
                                                        @if ( ($oneTimeEvent->name == 'Vacation' || $oneTimeEvent->name == 'Illness' ) && $oneTimeEvent->accepted == 1)
                                                            <p class="event-accepted">accepted</p>
                                                        @endif

                                                        <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                                                        <input style="display: none;" class="this-emp-id" value="{{ $employee->id }}">

                                                        @if ( $oneTimeEvent->name == "Work"  || $oneTimeEvent->name ==  "Vacation"  || $oneTimeEvent->name == "Illness")
                                                            <div id="time-admin-final{{ $oneTimeEvent->id }}" class="event-dropdown-content">

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
                                                                        <input style="display: none;" name="thisViewId" value="{{ $thisRetailStore->id }}"/>
                                                                        <input style="display: none;" name="thisUrl" value="/admin/employer-planning/"/>
                                                                        <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                                                                        <button class="add-event-button" name="eventId" value="{{ $oneTimeEvent->id }}">OK</button>
                                                                    </form>
                                                                @endif


                                                            <!------------------- VACATION ILLNESS NOT-ACCEPT ----------------------->
                                                                @if ( ($oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness" ) && $oneTimeEvent->accepted == 1)
                                                                    <form method="POST" action="{{ url('admin/notAcceptTimeEvent') }}"> {{ csrf_field() }}
                                                                        <input value="{{ $oneTimeEvent->date }}" style="display: none"/>
                                                                        <input style="display: none;" name="thisViewId" value="{{ $thisRetailStore->id }}"/>
                                                                        <input style="display: none;" name="thisUrl" value="/admin/employer-planning/"/>
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
                        @endif
                    @endforeach
                </table>
                <br>


                <!------------------------ EMPLOYEE PER HOUR -------------------------------->
                <div class="table-head-store">
                    <p class="table-head-a">Amount of Employees per time frame</p>
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
                        <td></td>


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

                    <!------------------- TIME ROW ----------------------->
                    @for ($i = 0; $i < 17; $i++)
                        <tr class="time-events">
                            <td>{{ $i+6  }}:00</td>
                        @for ($f = 0; $f < 7; $f++)


                            <!------------------- IF TODAY ----------------------->
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


                <button class="form-control delete-button" data-toggle="modal" type="submit"
                        data-target="#delete-store">delete
                </button>
            </aside>

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

