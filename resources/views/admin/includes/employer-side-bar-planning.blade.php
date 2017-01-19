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
            <optgroup style=" border: none; "><label>
                <option style="background-color: #F1F1F1; padding-left: 10px"
                        value="{{ url('/admin/employer-planning') . '/' . $retailStore->id . '/' . $week[0]->format('d-m-Y') }}">{{ $retailStore->name }}</option>
                @foreach($allEmployees as $employee)
                    @if($employee->retail_store_id == $retailStore->id)

                        <option style="padding-left: 30px;"
                                value="{{ url('/admin/employer-single') . '/' . $employee->id . '/' . $week[0]->format('d-m-Y') }}">{{ $employee->surname }} {{ $employee->forename }}</option>

                    @endif
                @endforeach
                </label>
            </optgroup>
        @endforeach
    </select>


    <!-- +++++++++++++++++ LIST STORE ++++++++++++++++ -->
    <ul class="lower-list">

        <li><a class="middle-bold">Stores</a></li>
        @foreach($allRetailStores as $retailStore)
            <li class="arrow-down">
                <a href="{{ url('/admin/employer-planning') . '/' . $retailStore->id . '/' . $week[0]->format('d-m-Y') }}">{{ $retailStore->name }}</a>
                <a>⋁</a>
                <ul>
                    @foreach($allEmployees as $employee)
                        @if($employee->retail_store_id == $retailStore->id)
                            <li>
                                <a href="{{ url('/admin/employer-single') . '/' . $employee->id . '/' . $week[0]->format('d-m-Y') }}">{{ $employee->surname }} {{ $employee->forename }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

    <br>

    @include('admin.includes.add-store')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
    @include('admin.includes.add-emp')


</div>


<