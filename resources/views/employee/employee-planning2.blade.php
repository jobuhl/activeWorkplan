@extends('employee.layout.employee-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/modal-event.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/modal.css')}}">
@endsection

@section('content')

    <section class="fake-body container emp-planning">
        <h2>Proposal working time</h2>

        <aside id="aside-overview" class="col-xs-12 calendar-navigation">

            <div class="col-xs-4 navigation-today">
                <form class="nav-form" method="POST" action="{{ url('/employee/weekBack') }}">
                    {{ csrf_field() }}
                    <button name="date" value="{{ $date[0]->format('d-m-Y') }}" type="submit"><</button>
                </form>

                <form class="nav-form" method="POST" action="{{ url('/employee/weekToday') }}">
                    {{ csrf_field() }}
                    <button  name="date" value="{{ $date[0]->format('d-m-Y') }}"type="submit">Today</button>
                </form>

                <form class="nav-form" method="POST" action="{{ url('/employee/weekNext') }}">
                    {{ csrf_field() }}
                    <button  name="date" value="{{ $date[0]->format('d-m-Y') }}"type="submit">></button>
                </form>
            </div>

            <div class="col-xs-4 calendar-navigation-p">
                <p>
                    {{ $date[0]->format('d. - ') }}
                    {{ $date[6]->format('d. M. Y') }}
                </p>
            </div>

            <div class="col-xs-4 print-email">
                <button onclick="sendEmail()">
                    <span class="glyphicon glyphicon-envelope"></span> E-Mail
                </button>
                <button onclick="printing()">
                    <span class="glyphicon glyphicon-print"></span> Print
                </button>
            </div>

            <br>
        </aside>

        <table class="calendar-days">
            <tr class="week-date">
                <td></td>
                @for ($i = 0; $i < 7; $i++)
                    <td>
                        {{ $date[$i]->format('d.m.') }}</td>
                @endfor
            </tr>
            <tr class="week-days">
                <td></td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d m Y') == $date[$i]->format('d m Y'))
                        <td class="today">
                    @else
                        <td>
                            @endif
                            {{ $date[$i]->format('D') }}</td>
                        @endfor
            </tr>

            <tr class="all-day">
                <td>Allday</td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d m Y') == $date[$i]->format('d m Y'))
                        <td class="today">
                    @else
                        <td>
                            @endif
                            @foreach($manyAlldayFix as $oneAlldayFix)
                                @if( (new DateTime($oneAlldayFix->date))->format('d m Y') == $date[$i]->format('d m Y'))
                                    <div class="one-allday-event {{ $oneAlldayFix->color }}" draggable="true">
                                        <p>{{ $oneAlldayFix->name }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </td>
                        @endfor
            </tr>

            <tr class="time-events">
                <td>Time-Events</td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d m Y') == $date[$i]->format('d m Y'))
                        <td class="today">
                    @else
                        <td>
                            @endif
                            @foreach($manyWorktimePreferred as $oneWorktimePreferred)
                                @if( (new DateTime($oneWorktimePreferred->date))->format('d m Y') == $date[$i]->format('d m Y') )
                                    <div class="one-time-event {{ $oneWorktimePreferred->color }}" draggable="true">
                                        <p>{{ $oneWorktimePreferred->name }}</p>
                                        <p>{{ $oneWorktimePreferred->from }}</p>
                                        <p>{{ $oneWorktimePreferred->to }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </td>
                        @endfor
            </tr>

            <tr class="add-buttons">
                <td></td>
                @for ($i = 0; $i < 7; $i++)
                    @if((new DateTime())->format('d m Y') == $date[$i]->format('d m Y'))
                        <td class="today">
                    @else
                        <td>
                            @endif
                            <a class="round-button" data-toggle="modal" data-target="#add-button-event">+</a></td>
                        @endfor
            </tr>
        </table>

        @include('employee.includes.modals-event-add')
    </section>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/employee/workplan.js') }}"></script>

@endsection
