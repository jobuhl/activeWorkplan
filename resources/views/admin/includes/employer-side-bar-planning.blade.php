<section class="fake-body sidebarPHP">


    <section>
        <div class="col-lg-6 col-sm-12 col-xs-6 left-button-side-bar">
            <button class="form-control set-right add-button space-to-top-bottom" type="submit"
                    data-toggle="modal"
                    data-target="#add-button-emp">
                Employee Add
            </button>
        </div>

        <div class="col-lg-6 col-sm-12 col-xs-6 right-button-side-bar">
            <button class="col-xs-6 form-control set-right add-button space-to-top-bottom" type="submit"
                    data-toggle="modal"
                    data-target="#add-button-store">
                Store Add
            </button>
        </div>
    </section>

    <br>
    <br>
    <br>
    <br>

    <p class="middle-bold">Stores</p>

    <ul class="lower-list">


        @foreach($allRetailStores as $retailStore)
            <li class="arrow-down">
                <a href="{{ url('/admin/employer-planning') . '/' . $retailStore->id . '/' . $week[0]->format('d-m-Y') }}">{{ $retailStore->id }} {{ $retailStore->name }}</a>
                <a style="padding: 13.5px;" class="glyphicon glyphicon-chevron-down"></a>
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
    @include('includes.employer-modals-employee')
    @include('admin.includes.add-emp')


</section>