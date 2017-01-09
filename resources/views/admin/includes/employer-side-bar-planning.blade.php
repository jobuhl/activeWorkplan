<section class="fake-body sidebarPHP">
    <ul class="upper-list">
        <li><a>Preferences</a>
            <ul>
                <li><input class="input-sidebar" type="text" placeholder="Search Store..."></li>
                <li class="a-changes">
                    <a>Store</a>
                    <a data-toggle="modal" data-target="#add-button-store">+</a>
                    <a data-toggle="modal" data-target="#change-button-store">⇄</a>
                    <a data-toggle="modal" data-target="#delete-button-store">-</a>
                </li>
                <li class="a-changes">
                    <a>Employee</a>
                    <a data-toggle="modal" data-target="#add-button-emp">+</a>
                    <a data-toggle="modal" data-target="#change-button-emp">⇄</a>
                    <a data-toggle="modal" data-target="#delete-button-emp">-</a>
                </li>

                <!-- zum löschen -->
                <li class="a-changes">
                    <a  data-toggle="modal" data-target="#test">-</a>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="lower-list">

        @foreach($allRetailStores as $retailStore)
            <li class="arrow-down">
                <a href="{{ url('/admin/employer-planning') . '/' . $retailStore->id . '/' . (clone $week[0])->format('d-m-Y') }}">{{ $retailStore->id }} {{ $retailStore->name }}</a>
                <a style="padding: 13.5px;" class="glyphicon glyphicon-chevron-down"></a>
                <ul>
                    @foreach($allEmployees as $employee)
                        @if($employee->retail_store_id == $retailStore->id)
                            <li>
                                <a href="{{ url('/admin/employer-single') . '/' . $employee->id . '/' . (clone $week[0])->format('d-m-Y') }}">{{ $employee->surname }} {{ $employee->forename }}</a>
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