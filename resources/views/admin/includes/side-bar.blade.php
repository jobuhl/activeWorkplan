<div class="fake-body sidebarPHP">
    <!-- +++++++++++++++++++ SIDEBAR +++++++++++++++++++ -->

    <!-- Ueberschrift -->
    <p class="hide-mobil middle-bold">Stores</p>

    <!-- If calendar in Admin Planning or Single -->
    @if( strpos(url()->current(),'/admin/planning'))
        <div>
            <!-- Add Employee -->
            <div class="col-xs-6 left-button-side-bar">
                <button class="form-control green-button" type="submit" data-toggle="modal" data-target="#add-button-emp">
                    + <img style="height: 15px; margin-bottom: 2px;" src="{{asset('/img/emp_white.gif')}}" alt="Bild" draggable="false">
                </button>

            </div>

            <!-- Add Store -->
            <div class="col-xs-6 right-button-side-bar">
                <button class="form-control green-button" type="submit" data-toggle="modal" data-target="#add-button-store">
                    + <img style="height: 15px; margin-bottom: 2px;" src="{{asset('/img/shop_white.gif')}}" alt="Bild" draggable="false">
                </button>
            </div>
        </div>
        <br>
    @endif


<!-- Search Field -->
    <input id="side-bar-search" class="form-control" onclick="showSubList(this.value)" onkeyup="searchStoreEmp(this.value)" placeholder="Search..."/>

    <!-- +++++++++++++++++ LIST STORES ++++++++++++++++ -->
    <div id="lower-list">

        @foreach($allRetailStores as $retailStore)
            <div class="each-element">


                <!-- If calendar in Admin Planning-Store or Planning-Employee -->
            @if( strpos(url()->current(),'/admin/planning'))

                <!-- Store-Elemente -->
                    <div class="up-element form-control hide-mobil @if ($thisRetailStore->name == $retailStore->name) current-store @endif" draggable="true">
                        <a class="element-text form-control" href="{{ url('/admin/planning-store') . '/' . $retailStore->id . '/' . $week[0] }}">{{ $retailStore->name }}</a>
                        <a class="element-arrow form-control">⋁</a>
                    </div>

                    <!-- Unterliste Employee Elemente -->
                    <ul class="sub-element hide-mobil">

                        <!-- Falls der Retail Store keine Employees hat -->
                        @foreach($allCountEmployees as $oneCountEmployee)
                            @if ($oneCountEmployee->retailStoreId == $retailStore->id && $oneCountEmployee->countEmployees == 0)
                                <li>
                                    <a class="element-sub-text no-employees">No Employees</a>
                                </li>
                            @endif
                        @endforeach

                        <!-- Auflistung der Employees -->
                        @foreach($allEmployees as $employee)
                            @if($employee->retail_store_id == $retailStore->id)
                                <li>
                                    <a class="element-sub-text" href="{{ url('/admin/planning-employee') . '/' . $employee->id . '/' . $week[0] }}">{{ $employee->surname }} {{ $employee->forename }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
            @endif


            <!-- If calendar in Admin Overview -->
            @if( strpos(url()->current(),'/admin/overview'))

                <!-- Store-Elemente -->
                    <div class="up-element form-control hide-mobil" draggable="true">
                        <a class="overview-element element-text form-control" href="{{ url('/admin/overview') . '/'  .  $week[0] .  '#table-overview' . $retailStore->id }}">{{ $retailStore->name }}</a>
                    </div>
                @endif
            </div>
        @endforeach
    </div>


    <br>

    @include('admin.includes.add-store')
    @include('admin.includes.add-emp')


</div>



