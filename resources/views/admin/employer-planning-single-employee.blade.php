@extends('admin.layout.employer-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-account.css')}}">
@endsection

@section('content')

    <section class="fake-body container">
        <h2 style="display:none ">fake</h2>

        <br>
        <aside class="col-xs-12 col-sm-3 side-bar">

            @include('admin.includes.employer-side-bar-planning')

        </aside>


        <aside class="col-xs-12 col-sm-9 my-right-side">

            <h2>{{ $thisEmployee->surname }} {{ $thisEmployee->forename }}</h2>

            <nav class="calendar-navigation">
                <div class="calendar-navigation-padding">
                    <div class="col-xs-6 navigation-today">
                        <button>&lt;</button>
                        <button>Today</button>
                        <button>></button>
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

            <div class="table-head-store">
                <p class="table-head-a">Proposal Working Time</p>
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
                            <td class="today">
                        @else
                            <td>
                            @endif


                            <!------------------- ALLDAY EVENT ----------------------->
                                @foreach($manyAlldayEvent as $oneAlldayEvent)
                                    @if( (new DateTime($oneAlldayEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                    && $oneAlldayEvent->employee_id == $thisEmployee->id)

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
                    <td></td>

                @for ($i = 0; $i < 7; $i++)


                    <!------------------- IF TODAY ----------------------->
                        @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                            <td class="today">
                        @else
                            <td>
                            @endif


                            <!------------------- TIME EVENT ----------------------->
                                @foreach($manyTimeEvent as $oneTimeEvent)
                                    @if( (new DateTime($oneTimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                    && $oneTimeEvent->employee_id == $thisEmployee->id)
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
            </table>

            <br>
            <div class="table-head-store">
                <p class="table-head-a">Fix Worktime</p>
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
                <tr class="time-events">
                    <td>{{ $thisEmployee->surname }} {{ $thisEmployee->forename }}</td>
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
                                    && $oneWorktimeEvent->employee_id == $thisEmployee->id)
                                        <div class="one-time-event {{ $oneWorktimeEvent->color }}"
                                             draggable="true">
                                            <p>{{ $oneWorktimeEvent->name }}</p>
                                            <p>{{ $oneWorktimeEvent->from }}</p>
                                            <p>{{ $oneWorktimeEvent->to }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </td>
                            @endfor
                </tr>
            </table>

            <br>
            <button class="form-control to-right yellow" type="submit" data-toggle="modal"
                    data-target="#change-button-emp-2">
                Change
            </button>
            <br>

            <table class="table-account">
                <tr>
                    <td>Employer ID</td>
                    <td>{{ $thisEmployee->id }}</td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>{{ $thisEmployee->password }}</td>
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

            <br>
            <button class="form-control to-right red" type="submit" data-toggle="modal"
                    data-target="#delete-button-emp-single-3">
                Delete
            </button>
            <br>

            <div id="delete-button-emp-single-3" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">

                        <!-- Basic-->
                        <div class="modal-body">
                            <div class="modal-header">

                                <!-- Close Button oben rechts im Header -->
                                <button type="button" class="close" data-dismiss="modal"
                                >&times;</button>

                                <!-- Überschrift -->
                                <h2 class="modal-ueberschrift">Delete Employee</h2>
                                <h5 class="select-ueberschrift">Do you really want to delete Maria Schuster </h5>
                                <br>


                            </div>
                            <!-- Modal footer-->
                            <div class="modal-footer">
                                <button class="form-control to-right delete-button" data-toggle="modal"
                                        data-target="#delete-button-emp-3"
                                        onclick="deleteUserSingle()">
                                    Delete
                                </button>
                            </div>


                        </div>


                    </div>

                </div>

            </div>


        </aside>

    </section>
@endsection

@section('js')
    <script src="{{asset('js/general/side-bar.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
@endsection

