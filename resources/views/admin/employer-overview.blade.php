@extends('admin.layout.employer-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-calendar-navigation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employer/overview.css')}}">
@endsection

@section('content')

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
                @foreach($retailStores as $retailStore)
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

                <div class="col-xs-6 col-md-5">

                    <aside class="col-md-3 calendar-navigation-padding">
                        <button id="overview-list" onclick="overviewList()">
                            <span class="glyphicon glyphicon-th-list"></span>
                        </button>
                        <button id="overview-kachel" onclick="overviewKachel()">
                            <span class="glyphicon glyphicon-th-large"></span>
                        </button>
                    </aside>
                    <div class="col-xs-9 col-md-9 navigation-today">
                        <button>&lt;</button>
                        <button>Today</button>
                        <button> ></button>
                    </div>
                </div>

                <div class="col-xs-6 col-md-7 calendar-navigation-padding">

                    <div class="col-xs-12 col-md-6">
                        <h4>Workplans</h4>
                    </div>
                    <div class="col-xs-12 col-md-6 calendar-navigation-p">
                        <p>01. - 07. Jan. 2018</p>
                    </div>
                </div>
            </nav>
            <br class="br-under-navigation">

            @foreach($retailStores as $retailStore)
                <aside class="col-xs-12">
                    <div class="table-head-store">
                        <a class="table-head-a">{{ $retailStore->id }} {{ $retailStore->name }}</a>
                        <button onclick="sendEmail()">
                            <span class="glyphicon glyphicon-envelope"></span> E-Mail
                        </button>
                        <button onclick="printing()">
                            <span class="glyphicon glyphicon-print"></span> Print
                        </button>
                    </div>
                    <table class="table-calendar">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>01.01</th>
                            <th>02.01</th>
                            <th>03.01</th>
                            <th>04.01</th>
                            <th>05.01</th>
                            <th>06.01</th>
                            <th>07.01</th>
                        </tr>


                        <tr>
                            <th>Employees</th>
                            <th>Time</th>
                            <th>Mo</th>
                            <th>Tu</th>
                            <th>We</th>
                            <th>Th</th>
                            <th>Fr</th>
                            <th>Sa</th>
                            <th>Su</th>
                        </tr>

                        @foreach($employees as $employee)
                            @if($employee->retail_store_id == $retailStore->id)
                                <tr>
                                    <td>{{ $employee->name }} {{ $employee->forename }}</td>
                                    <td>start</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>end</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    <br>
                </aside>
            @endforeach

        </aside>

    </section>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/employer/overview.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/general/side-bar.js') }}"></script>

@endsection
