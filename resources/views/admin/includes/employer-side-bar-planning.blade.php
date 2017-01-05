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
            </ul>
        </li>
    </ul>

    <ul class="lower-list">

        @foreach($retailStores as $retailStore)
            <li class="arrow-down">
                <a href="/activeWorkplan/public/admin/employer-planning/{{ $retailStore->id }}">{{ $retailStore->id }} {{ $retailStore->name }}</a>
                <a style="padding: 13.5px;" class="glyphicon glyphicon-chevron-down"></a>
                <ul>
                    @foreach($employees as $employee)
                        @if($employee->retail_store_id == $retailStore->id)
                            <li>
                                <a href="/activeWorkplan/public/admin/employee-single/{{ $employee->id }}">{{ $employee->name }} {{ $employee->forename }}</a>
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
</section>