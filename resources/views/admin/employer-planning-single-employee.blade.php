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

                <nav class="calendar-navigation">
                    <div class="calendar-navigation-padding">
                        <div class="navigation-today">
                            <form method="GET"
                                  action="{{ url('/admin/employer-single') . '/' . $thisEmployee->id . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                                <button type="submit"><</button>
                            </form>
                            <form method="GET"
                                  action="{{ url('/admin/employer-single') . '/' . $thisEmployee->id . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
                                <button type="submit">Today</button>
                            </form>
                            <form method="GET"
                                  action="{{ url('/admin/employer-single') . '/' . $thisEmployee->id . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
                                <button type="submit">></button>
                            </form>
                        </div>

                        <p>01. - 07. Jan. 2018</p>
                    </div>

                </nav>


                <br>

                <div class="table-head-store">
                    <p class="table-head-a">Individual proposals of Employees</p>
                </div>
                <table class="table-calendar table-week-listed-single">
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

                    <tr>
                        <td>{{ $thisEmployee->surname }} {{ $thisEmployee->forename }}</td>
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
                        <td></td>
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

                </table>

                <br>

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

@endsection

@include('admin.includes.change-emp')
@include('admin.includes.delete-emp')

@section('js')
    <script src="{{asset('js/general/side-bar.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
@endsection

