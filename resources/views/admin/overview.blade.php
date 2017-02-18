@extends('admin.layout.start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/overview.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
@endsection

@section('content')

    @if($amountOfRetailStores != 0)
        <div class="fake-body container final-workplan">

            <br>
            <aside class="col-xs-12 col-sm-3 side-bar">
                @include('admin.includes.side-bar')
            </aside>

            <aside id="aside-overview" class="col-xs-12 col-sm-9 my-right-side overview list">

                <!-- Überschrift -->
                <h2 class="header">Final Workplans</h2>

                @include('includes.calendar.navigation')

                <!-- Fuer jeden Retail Store eine Tabelle mit Finalen Einsatzplaenen -->
                @foreach($allRetailStores as $retailStore)

                    <div class="col-xs-12 space_emp"></div>

                    <div id="table-overview{{ $retailStore->id }}" class="col-xs-12 table-head-store">
                        <a class="table-head-a">{{ $retailStore->name }}</a>
                    </div>

                    <table class="col-xs-12 calendar-days-all-emp">


                    @include('includes.calendar.tr-1-week-date')
                    @include('includes.calendar.tr-2-week-days')

                    <!--++++++++++++++++++++++++ EMPLOYEE ROW ++++++++++++++++++++++++-->
                        @foreach($allEmployees as $thisEmployee)
                            @if($thisEmployee->retail_store_id == $retailStore->id)


                                @include('includes.calendar.tr-4a-final-all-day')
                                @include('includes.calendar.tr-4b-final-time-events')


                            @endif
                        @endforeach
                    </table>

                @endforeach

            </aside>

            <div class="col-xs-12 space_emp"></div>
        </div>
    @endif
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/admin/overview.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/guest/side-bar.js') }}"></script>

@endsection
