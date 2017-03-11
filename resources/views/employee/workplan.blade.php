@extends('employee.layout.start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/modal-event.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/modal.css')}}">
@endsection

@section('content')

    <div class="fake-body container emp-planning final-workplan workplan">

        <div class="space_emp col-xs-12"></div>

        <h2 class=" col-xs-12 header">Fix Workplan</h2>

        <div class="space_emp col-xs-12"></div>

        @include('includes.calendar.navigation')

        <table class="calendar-days-one-emp">

            @include('includes.calendar.tr-1-week-date')
            @include('includes.calendar.tr-2-week-days')


            @include('includes.calendar.tr-4a-final-all-day')
            @include('includes.calendar.tr-4b-final-time-events')

            @include('includes.calendar.tr-5-add-buttons')

        </table>

        <div class="space_emp col-xs-12"></div>

    </div>


@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/employee/event.js') }}"></script>


@endsection
