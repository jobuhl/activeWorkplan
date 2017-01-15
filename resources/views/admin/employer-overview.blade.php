@extends('admin.layout.employer-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employer/overview.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
@endsection

@section('content')

    @if($amountOfRetailStores != 0)
        <section class="fake-body container">
            <h2 style="display: none">fakeheading</h2>
            <br>
            <aside class="col-xs-12 col-sm-3 side-bar overview">

                <div class="row headline" draggable="true">
                    <aside class="col-xs-2 middle-bold"></aside>
                    <aside class="col-xs-8 middle-bold"><p>Stores</p></aside>
                    <aside class="col-xs-2 middle-bold">
                        <p class="glyphicon glyphicon-chevron-down"></p>
                    </aside>
                </div>

                <ul>
                    <li><input class="input-sidebar" type="text" placeholder="Search Store..."></li>
                    @foreach($allRetailStores as $retailStore)
                        <li><a>{{ $retailStore->id }} {{ $retailStore->name }}</a></li>
                    @endforeach
                </ul>
                <br>
            </aside>


            <aside id="aside-overview" class="col-xs-12 col-sm-9 my-right-side overview list">

                <div class="row current-selected-store">
                    <aside class="col-xs-2 middle-bold"><p>❮</p></aside>
                    <aside class="col-xs-8 middle-bold"><p>Current Store</p></aside>
                    <aside class="col-xs-2 middle-bold"><p>❯</p></aside>
                </div>
                <nav class="calendar-navigation">

                    <div class="col-xs-4 navigation-today">
                        <form method="GET" action="{{ url('/admin/employer-overview') . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                            <button type="submit"><</button>
                        </form>

                        <form method="GET" action="{{ url('/admin/employer-overview') . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
                            <button type="submit">Today</button>
                        </form>

                        <form method="GET" action="{{ url('/admin/employer-overview') . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                            <button type="submit">></button>
                        </form>
                    </div>

                    <div class="col-xs-4">
                        <h4>Workplans</h4>
                    </div>
                    <div class="col-xs-4 calendar-navigation-p">
                        <p>
                            {{ $week[0]->format('d. - ') }}
                            {{ $week[6]->format('d. M. Y') }}
                        </p>
                    </div>
                </nav>
                <br class="br-under-navigation">


                @foreach($allRetailStores as $retailStore)
                    <div class="print-email table-head-store">
                        <a class="table-head-a">{{ $retailStore->id }} {{ $retailStore->name }}</a>
                        <button onclick="sendEmail()">
                            <span class="glyphicon glyphicon-envelope"></span> E-Mail
                        </button>
                        <button onclick="printing()">
                            <span class="glyphicon glyphicon-print"></span> Print
                        </button>
                    </div>

                    <table class="calendar-days-all-emp">


                        <!------------------- DATE ----------------------->
                        <tr class="week-date">
                            <td></td>
                            @for ($i = 0; $i < 7; $i++)
                                <td>
                                    {{ $week[$i]->format('d.m.') }}
                                </td>
                            @endfor
                        </tr>


                        <!------------------- WEEKDAY ----------------------->
                        <tr class="week-days">
                            <td>Employees</td>
                        @for ($i = 0; $i < 7; $i++)


                            <!------------------- IF TODAY ----------------------->
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
                            @if($employee->retail_store_id == $retailStore->id)
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
                                                    && (( $oneAlldayEvent->name == "Vacation" || $oneAlldayEvent->name == "Illness") && $oneAlldayEvent->accepted == 1)
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


                                <!------------------- TIME EVENT ----------------------->
                                <tr class="time-events">
                                    <td></td>
                                    @for ($i = 0; $i < 7; $i++)
                                        @if((new DateTime())->format('d m Y') == $week[$i]->format('d m Y'))
                                            <td class="today">
                                        @else
                                            <td>
                                                @endif
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


                                                @foreach($manyTimeEvent as $oneTimeEvent)
                                                    @if( (new DateTime($oneTimeEvent->date))->format('d m Y') == $week[$i]->format('d m Y')
                                                    && (( $oneTimeEvent->name == "Vacation" || $oneTimeEvent->name == "Illness") && $oneTimeEvent->accepted == 1)
                                                    && $oneTimeEvent->employee_id == $employee->id)
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
                            @endif
                        @endforeach
                    </table>
                    <br>
                @endforeach

            </aside>

        </section>
    @endif
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/employer/overview.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/general/side-bar.js') }}"></script>

@endsection
