<div class="fake-body sidebarPHP">


    <div>
        <div class="col-lg-6 col-sm-12 col-xs-6 left-button-side-bar">
            <button class="form-control add-button" type="submit" data-toggle="modal" data-target="#add-button-emp">
                Add Employee
            </button>
        </div>

        <div class="col-lg-6 col-sm-12 col-xs-6 right-button-side-bar">
            <button class="col-xs-6 form-control add-button" type="submit" data-toggle="modal"
                    data-target="#add-button-store">
                Add Store
            </button>
        </div>
    </div>


    <!-- +++++++++++++++++ SEARCH FIELD ++++++++++++++++ -->
    <select id="select-emp" class="form-control modal-input selectpicker col-xs-6"
            data-live-search="true"
            name="select-emp" onchange="location.href = this.value;">
        <option style="display: none;"> Search...</option>
        @foreach($allRetailStores as $retailStore)
            <optgroup label="" style=" border: none; ">
                <option style="background-color: #F1F1F1; padding-left: 10px"
                        value="{{ url('/admin/planning') . '/' . $retailStore->id . '/' . $week[0]->format('d-m-Y') }}">{{ $retailStore->name }}</option>
                @foreach($allEmployees as $employee)
                    @if($employee->retail_store_id == $retailStore->id)

                        <option style="padding-left: 30px;"
                                value="{{ url('/admin/planning-single') . '/' . $employee->id . '/' . $week[0]->format('d-m-Y') }}">{{ $employee->surname }} {{ $employee->forename }}</option>

                    @endif
                @endforeach

            </optgroup>

        @endforeach
    </select>


    <!-- +++++++++++++++++ LIST STORE ++++++++++++++++ -->
    <div class="hide-mobil">
        <p class="middle-bold">Stores</p>
        <input class="form-control" onkeyup="searchStoreEmp('{{ url('/admin/planning') }}', '{{ $week[0]->format('d-m-Y')  }}', '{{ url('/admin/searchStoreEmp') }}', this.value)" placeholder="Serach Store..."/>

        <div id="lower-list">

        @foreach($allRetailStores as $retailStore)
                <div class="each-element">

                    <div class="up-element form-control @if ($thisRetailStore->name == $retailStore->name) current-store @endif" draggable="true">
                        <a class="element-text form-control" href="{{ url('/admin/planning') . '/' . $retailStore->id . '/' . $week[0]->format('d-m-Y') }}">{{ $retailStore->name }}</a>
                        <a class="element-arrow form-control">⋁</a>
                    </div>

                    <ul class="sub-element">
                        @foreach($allEmployees as $employee)
                            @if($employee->retail_store_id == $retailStore->id)
                                <li>
                                    <a href="{{ url('/admin/planning-single') . '/' . $employee->id . '/' . $week[0]->format('d-m-Y') }}">{{ $employee->surname }} {{ $employee->forename }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

    </div>


    <br>

    @include('admin.includes.add-store')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
    @include('admin.includes.add-emp')


</div>



