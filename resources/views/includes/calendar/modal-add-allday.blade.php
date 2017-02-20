<form method="POST" action="{{ url('/employee/alldayEventCreate') }}" id="modal-body-event-allday">
{{ csrf_field() }}

<!-- Modal body-->
    <div class="modal-body">

        <!-- Zeile 1 -->
        <article class="row">
            <h2 style="display: none">fakeheading</h2>

            <!-- links -->
            <aside class="col-xs-12 col-sm-4 aside-left-add">Category</aside>

            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <select class="selectpicker form-control to-right modal-input space-cap" name="category">
                    @foreach($category as $cat)
                        <option>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </aside>

        </article>

        <!-- Zeile 2 -->
        <article class="row">
            <h2 style="display: none">fakeheading</h2>

            <!-- links -->
            <aside class="col-xs-12 col-sm-4 aside-left-add">Date</aside>

            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><input class="date-overwrite datepicker inputmodal form-control space-cap" type="date" name="date" placeholder="dd-mm-yyyy"/></p>
            </aside>

        </article>

    </div>

    <!-- Modal footer-->
    <div class="modal-footer">
        <button type="submit" class="form-control to-right add-button" name="thisDate" value="{{ $week[0] }}">Add</button>
    </div>

</form>