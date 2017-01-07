@extends('admin.layout.employer-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">
@endsection

@section('content')

    <section class="fake-body container">
        <h2 style="display: none">fakeheading</h2>

        <br>
        <aside class="col-xs-12 col-sm-3 side-bar">


            @include('admin.includes.employer-side-bar-planning')

        </aside>


        <aside class="col-xs-12 col-sm-9 my-right-side">

            <h2>{{ $thisRetailStore->name }}</h2>

            <nav class="calendar-navigation">
                <div class="calendar-navigation-padding">
                    <div class="col-xs-6 navigation-today">
                        <form method="POST" action="{{ url('/admin/weekAdmPlan/' . $thisRetailStore->id) }}"> {{ csrf_field() }}
                            <button name="date" value="array({{ $week[0]->format('d-m-Y') }}, 2)" type="submit"><</button>
                        </form>
                        <form method="POST" action="{{ url('/admin/weekAdmPlan/' . $thisRetailStore->id) }}"> {{ csrf_field() }}
                            <button name="date" value="{{ $week[0]->format('d-m-Y') }}" type="submit">Today</button>
                        </form>
                        <form method="POST" action="{{ url('/admin/weekAdmPlan/' . $thisRetailStore->id) }}"> {{ csrf_field() }}
                            <button name="date" value="{{ $week[0]->format('d-m-Y') }}" type="submit">></button>
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
                                    <td class="today">
                                @else
                                    <td>
                                    @endif


                                    <!------------------- ALLDAY EVENT ----------------------->
                                        @foreach($manyAlldayEvent as $oneAlldayEvent)
                                            @if( (new DateTime($oneAlldayEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                            && $oneAlldayEvent->employee_id == $employee->id)

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
                                            && $oneTimeEvent->employee_id == $employee->id)
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
                    @endif
                @endforeach
            </table>

            <br>

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
                        <tr class="time-events">
                            <td>{{ $employee->surname }} {{ $employee->forename }}</td>
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
                    @endif
                @endforeach
            </table>
            <br>

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
        </aside>

    </section>
@endsection

@section('js')
    <script src="{{asset('js/general/side-bar.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
@endsection

