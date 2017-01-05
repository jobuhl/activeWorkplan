@extends('admin.layout.employer-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-calendar-navigation.css')}}">
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

            <h2>{{ $employee->name }} {{ $employee->forename }}</h2>

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
                    <td>{{ $employee->name }} {{ $employee->forename }}</td>
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

            <button class="form-control to-right yellow" type="submit" data-toggle="modal"
                    data-target="#change-button-emp-2">
                Change
            </button>

            <table class="table-account">
                <tr>
                    <td>Employer ID</td>
                    <td>{{ $employee->id }}</td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>{{ $employee->password }}</td>
                </tr>

                <tr class="table-space">
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Surname</td>
                    <td>{{ $employee->name }}</td>
                </tr>
                <tr>
                    <td>Forename</td>
                    <td>{{ $employee->forename }}</td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td>{{ $employee->email }}</td>
                </tr>

                <tr class="table-space">
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Period of Agreement</td>
                    <td>
                        @foreach($contracts as $contract)
                            @if($employee->contract_id == $contract->id)
                                {{ $contract->period_of_agreement }}
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>
                        @foreach($contracts as $contract)
                            @if($employee->contract_id == $contract->id)
                                @foreach($roles as $role)
                                    @if($contract->role_id == $role->id)
                                    {{ $role->name }}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Classification</td>
                    <td>
                        @foreach($contracts as $contract)
                            @if($employee->contract_id == $contract->id)
                                {{ $contract->classification }}
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Agreement working hours</td>
                    <td>
                        @foreach($contracts as $contract)
                            @if($employee->contract_id == $contract->id)
                                {{ $contract->working_hours }}
                            @endif
                        @endforeach
                    </td>
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
                    <td>Preferred Retail Store</td>
                    <td>
                        @foreach($retailStores as $retailStore)
                            @if($employee->retail_store_id == $retailStore->id)
                                {{ $retailStore->id }} {{ $retailStore->name }}
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Address Retail Store</td>
                    <td>
                        --------fehlt noch!!!
                    </td>
                </tr>
            </table>


            <button class="form-control to-right red" type="submit" data-toggle="modal"
                    data-target="#delete-button-emp-single-3">
                Delete
            </button>

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

