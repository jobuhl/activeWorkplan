<form type="form uk-form" method="POST" action="{{ url('/employee/timeEventCreate') }}">
{{ csrf_field() }}

<!-- Modal body-->
    <!-- Basic-->
    <div class="modal-body">

        <!-- Zeile 1 -->
        <article class="row">
            <h2 style="display: none">fakeheading</h2>

            <!-- links -->
            <aside class="col-xs-12 col-sm-4"></aside>

            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><input class="inputmodal form-control" type="text" name="category" placeholder="Category"></p>
            </aside>

        </article>

        <!-- Zeile 2 -->
        <article class="row">
            <h2 style="display: none">fakeheading</h2>

            <!-- links -->
            <aside class="col-xs-12 col-sm-4 aside-left-add">Time</aside>

            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><input class="inputmodal form-control space-cap" type="date" name="date" id="datepicker" placeholder="Date"/></p>
            </aside>

        </article>

        <!-- Zeile 3 -->
        <article class="row">
            <h2 style="display: none">fakeheading</h2>

            <!-- links -->
            <aside class="col-xs-12 col-sm-4"></aside>

            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><input class="inputmodal form-control" type="text" name="time-from" placeholder="From "></p>
            </aside>

        </article>

        <!-- Zeile 4 -->
        <article class="row">
            <h2 style="display: none">fakeheading</h2>

            <!-- links -->
            <aside class="col-xs-12 col-sm-4"></aside>

            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><input class="inputmodal form-control" type="text" name="time-to" placeholder="To"></p>
            </aside>

        </article>

    </div>
    <!-- Modal footer-->
    <div class="modal-footer">
        <button type="submit" class="form-control to-right add-button" data-toggle="modal"
                data-target="#add-button-store" onclick="addstore()">Add
        </button>
    </div>

</form>
