@extends('admin.layout.start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/table-account.css')}}">
@endsection

@section('content')

    @if (count($errors) > 0)

        <div class="alert alert-danger">

            <ul>
                @foreach($errors -> all() as $error)
                    <li style="margin-left: 10px">{{$error}}</li>
                @endforeach

            </ul>
        </div>
    @endif


    {{-- Meldung für den Fall das Erfolgreich geändert wurde --}}
    @if (session()->has('flash_notification.message'))
        <div class="alert alert-{{ session('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {!! session('flash_notification.message') !!}
        </div>
    @endif

    @if($amountOfRetailStores != 0)

        <div class="fake-body container">

            <br>
            <aside class="col-xs-12 col-sm-3 side-bar">
                @include('admin.includes.side-bar')
            </aside>

            <aside class="col-xs-12 col-sm-9 my-right-side">

                <!-- Ueberschrift -->
                <h2 class="header">{{ $thisEmployee->surname }} {{ $thisEmployee->forename }}</h2>

                @include('includes.calendar.navigation')

                <div class="col-xs-12 space_emp"></div>

                <!-- ++++++++++++++++++++ TABLE PROPOSAL +++++++++++++++++++ -->
                <div class="col-xs-12 table-head-store">
                    <p class="table-head-a">Proposals</p>
                </div>

                <table class="col-xs-12 calendar-days-all-emp">

                @include('includes.calendar.tr-1-week-date')
                @include('includes.calendar.tr-2-week-days')

                <!-- ++++++++++++++++++++ EMPLOYEE ROW ++++++++++++++++++ -->
                    @include('includes.calendar.tr-3a-proposal-all-day')
                    @include('includes.calendar.tr-3b-proposal-time-events')
                </table>

                <div class="col-xs-12 space_emp"></div>

                <!-- ++++++++++++++++++++ TABLE WORKTIME FIX ++++++++++++++++++ -->
                <div class="col-xs-12 table-head-store">
                    <p class="table-head-a">Final Workplan</p>
                </div>

                <table class="col-xs-12 calendar-days-all-emp">

                @include('includes.calendar.tr-1-week-date')
                @include('includes.calendar.tr-2-week-days')

                <!-- ++++++++++++++++++++ EMPLOYEE ROW ++++++++++++++++++ -->
                    @include('includes.calendar.tr-4a-final-all-day')
                    @include('includes.calendar.tr-4b-final-time-events')
                </table>

                <div class="col-xs-12 space_emp"></div>

                <!-- Change Button -->
                <button class="form-control set-right modal-change-button space-to-top-bottom" type="submit" data-toggle="modal" data-target="#change" value="{{ $thisEmployee->id }}" name="thisEmployeeId">
                    Change
                </button>

                <div class="col-xs-12 space_emp"></div>


                <!-- +++++++++++++++ EMPLOYEE STORE DETAILS +++++++++++++++ -->
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
                        <td>Retail Store Name</td>
                        <td>{{ $thisRetailStore->name }}</td>
                    </tr>
                    <tr>
                        <td>Retail Store Address</td>
                        <td>{{ $address->street }} {{ $address->street_nr }}
                            , {{ $address->postcode }} {{ $address->city }}, {{ $address->country }}
                        </td>

                    </tr>
                </table>

                <div class="col-xs-12 space_emp"></div>

                <!-- Delete Button -->
                <button class="form-control set-right delete-button space-to-top-bottom" type="submit" data-toggle="modal" data-target="#delete-emp" value="{{ $thisEmployee->id }}" name="thisEmployeeId">
                    Delete
                </button>

                <div class="col-xs-12 space_emp"></div>


            </aside>

        </div>
    @endif


    <!-- NEU -->
    @include('includes.calendar.modal-change-time')


    {{--@include('admin.includes.modals-event-add-worktime-fix')--}}
    {{--@include('admin.includes.modals-event-change-worktime-fix')--}}
    @include('admin.includes.change-emp')
    @include('admin.includes.delete-emp')

@endsection



@section('js')
    <script src="{{asset('js/guest/side-bar.js')}}"></script>
    <script src="{{asset('js/guest/calendar.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
@endsection

