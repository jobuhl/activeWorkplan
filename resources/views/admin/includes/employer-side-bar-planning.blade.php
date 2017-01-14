<section class="fake-body sidebarPHP">

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

    <section>

    </section>

    @include('admin.includes.add-store')
    @include('includes.employer-modals-employee')
    @include('admin.includes.add-emp')


</section>