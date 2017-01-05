@extends('admin.layout.employer-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-calendar-navigation.css')}}">
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
                    <div class="navigation-today">
                        <button>&lt;</button>
                        <button>Today</button>
                        <button>></button>
                    </div>
                    <p>01. - 07. Jan. 2018</p>
                </div>

            </nav>

            <br>

            <div class="table-head-store">
                <p class="table-head-a">Individual proposals of Employees</p>
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
                    @if($employee->retail_store_id == $thisRetailStore->id)
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

            <div class="table-head-store">
                <p class="table-head-a">Final Workplan</p>
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
                    @if($employee->retail_store_id == $thisRetailStore->id)
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

            <div class="table-head-store">
                <p class="table-head-a">Amount of Employees per time frame</p>
            </div>
            <table class="table-calendar table-week-hours">
                <tr>
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
                    <th></th>
                    <th>Mo</th>
                    <th>Tu</th>
                    <th>We</th>
                    <th>Th</th>
                    <th>Fr</th>
                    <th>Sa</th>
                    <th>Su</th>
                </tr>

                <tr>
                    <td>All-day</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>8:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>9:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>10:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>11:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>12:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>13:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>14:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>15:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>16:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>17:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>18:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>19:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>20:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>21:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>22:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </table>

            <br>
        </aside>

    </section>
@endsection

@section('js')
    <script src="{{asset('js/general/side-bar.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
@endsection

