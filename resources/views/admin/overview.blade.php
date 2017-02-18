@extends('admin.layout.start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/side-bar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/overview.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/calendar.css')}}">
@endsection

@section('content')

    @if($amountOfRetailStores != 0)
        <div class="fake-body container final-workplan">
            <h2 style="display: none">fakeheading</h2>
            <br>
            <aside class="col-xs-12 col-sm-3 side-bar overview">

                <p class="hide-mobil middle-bold">Stores</p>

                <input id="side-bar-search" class="form-control" onclick="showSubList(this.value)" onkeyup="searchStoreEmp(this.value)" placeholder="Search..."/>

                <div id="lower-list">

                    @foreach($allRetailStores as $retailStore)
                        <div class="each-element">

                            <div class="up-element form-control hide-mobil" draggable="true">
                                <a class="overview-element element-text form-control" href="{{ url('/admin/overview') . '/'  . (clone $week[0])->format('d-m-Y') .  '#table-overview' . $retailStore->id }}">{{ $retailStore->name }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </aside>

            <aside id="aside-overview" class="col-xs-12 col-sm-9 my-right-side overview list">

                <!-- Überschrift -->
                <h2 class="header">Final Workplans</h2>

                @include('includes.calendar.navigation')

                <br>
                <br>
                <br>


                    <!-- Fuer jeden Retail Store eine Tabelle mit Finalen Einsatzplaenen -->
                    @foreach($allRetailStores as $retailStore)

                        <div id="table-overview{{ $retailStore->id }}" class="table-head-store">
                            <a class="table-head-a">{{ $retailStore->name }}</a>
                        </div>
                        <table class="calendar-days-all-emp">


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

            <div class=" col-xs-12 space_emp"></div>
        </div>
    @endif
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/js/admin/overview.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/guest/side-bar.js') }}"></script>

@endsection
