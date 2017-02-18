<div class="fake-body sidebarPHP">

    <p class="hide-mobil middle-bold">Stores</p>

    <div>
        <div class="col-xs-6 left-button-side-bar">
            <button class="form-control add-button" type="submit" data-toggle="modal" data-target="#add-button-emp">
                + <img style="height: 15px; margin-bottom: 2px;" src="{{asset('/img/emp_white.gif')}}" alt="Bild" draggable="false">
            </button>

        </div>

        <div class="col-xs-6 right-button-side-bar">
            <button class="form-control add-button" type="submit" data-toggle="modal" data-target="#add-button-store">
                + <img style="height: 15px; margin-bottom: 2px;" src="{{asset('/img/shop_white.gif')}}" alt="Bild" draggable="false">
            </button>
        </div>
    </div>

    <br>

    <!-- +++++++++++++++++ LIST STORE ++++++++++++++++ -->
    <input id="side-bar-search" class="form-control" onclick="showSubList(this.value)" onkeyup="searchStoreEmp(this.value)" placeholder="Search..."/>

    <div id="lower-list">

        @foreach($allRetailStores as $retailStore)
            <div class="each-element">

                <div class="up-element form-control hide-mobil @if ($thisRetailStore->name == $retailStore->name) current-store @endif" draggable="true">
                    <a class="element-text form-control" href="{{ url('/admin/planning') . '/' . $retailStore->id . '/' . $week[0]->format('d-m-Y') }}">{{ $retailStore->name }}</a>
                    <a class="element-arrow form-control">⋁</a>
                </div>

                <ul class="sub-element hide-mobil ">
                    @foreach($allEmployees as $employee)
                        @if($employee->retail_store_id == $retailStore->id)
                            <li>
                                <a class="element-sub-text" href="{{ url('/admin/planning-single') . '/' . $employee->id . '/' . $week[0]->format('d-m-Y') }}">{{ $employee->surname }} {{ $employee->forename }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>


    <br>

    @include('admin.includes.add-store')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
    @include('admin.includes.add-emp')


</div>



