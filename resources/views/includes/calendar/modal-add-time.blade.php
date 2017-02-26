<form method="POST" action="{{ url('/employee/timeEventCreate') }}" id="modal-body-event-time"> {{ csrf_field() }}

<!-- Modal body-->
    <!-- Basic-->
    <div class="modal-body">

        <!-- Zeile 1 -->
        <div class="row">
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
        </div>

        <!-- Zeile 2 -->
        <div class="row">
            <!-- links -->
            <aside class="col-xs-12 col-sm-4 aside-left-add">Date</aside>
            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><input class="date-overwrite datepicker inputmodal form-control space-cap" type="date" name="date" placeholder="dd-mm-yyyy"/></p>
            </aside>
        </div>

        <!-- Zeile 3 -->
        <div class="row">
            <!-- links -->
            <aside class="col-xs-12 col-sm-4 aside-left-add">From</aside>
            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><input class="inputmodal form-control" type="text" name="time-from" placeholder="9:00"></p>
            </aside>
        </div>

        <!-- Zeile 4 -->
        <div class="row">
            <!-- links -->
            <aside class="col-xs-12 col-sm-4 aside-left-add">To</aside>
            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><input class="inputmodal form-control" type="text" name="time-to" placeholder="15:00"></p>
            </aside>
        </div>

    </div>

    <!-- Modal footer-->
    <div class="modal-footer">
        <button type="submit" class="form-control to-right green-button" name="thisDate" value="{{ $week[0] }}">Add</button>
    </div>

</form>


