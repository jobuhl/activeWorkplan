@extends('employee.layout.start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/employee/modal-event.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/modal.css')}}">
@endsection

@section('content')

    <div class="fake-body container emp-planning">

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

        <div class="space_emp col-xs-12"></div>


        <!-- Ueberschrift -->
        <h2 class=" col-xs-12 header">Proposals</h2>

        <div class="space_emp col-xs-12"></div>

        @include('includes.calendar.navigation')

        <table class="calendar-days-one-emp">

            @include('includes.calendar.tr-1-week-date')
            @include('includes.calendar.tr-2-week-days')

            @include('includes.calendar.tr-3a-proposal-all-day')
            @include('includes.calendar.tr-3b-proposal-time-events')
            @include('includes.calendar.tr-5-add-buttons')


        </table>

        <div class="space_emp col-xs-12"></div>

    </div>

    @include('includes.calendar.modal-event-employee-add')
    @include('includes.calendar.modal-event-employee-change')

@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/employee/event.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/global/calendar.js') }}"></script>
@endsection
