<form type="form" method="POST" action="{{ url('/employee/timeEventCreate') }}">
{{ csrf_field() }}

<!-- Modal body-->
    <!-- Basic-->
    <div class="modal-body">

        <!-- Zeile 1 -->
        <div class="row">
            <!-- links -->
            <aside class="col-xs-12 col-sm-4 aside-left-add">Category</aside>
            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><select class="selectpicker form-control to-right modal-input space-cap" name="category" type="text">
                        @foreach($category as $cat)
                            <option>{{ $cat->name }}</option>
                        @endforeach
                    </select></p>
            </aside>
        </div>

        <!-- Zeile 2 -->
        <div class="row">
            <!-- links -->
            <aside class="col-xs-12 col-sm-4 aside-left-add">Time</aside>
            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><input class="datepicker inputmodal form-control space-cap" type="date" name="date"
                          placeholder="Date"/></p>
            </aside>
        </div>

        <!-- Zeile 3 -->
        <div class="row">
            <!-- links -->
            <aside class="col-xs-12 col-sm-4"></aside>
            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><input class="inputmodal form-control" type="text" name="time-from" placeholder="From "></p>
            </aside>
        </div>

        <!-- Zeile 4 -->
        <div class="row">
            <!-- links -->
            <aside class="col-xs-12 col-sm-4"></aside>
            <!-- rechts -->
            <aside class="col-xs-12 col-sm-8 aside-right">
                <p><input class="inputmodal form-control" type="text" name="time-to" placeholder="To"></p>
            </aside>
        </div>

    </div>
    <!-- Modal footer-->
    <div>
        <button type="submit" class="form-control to-right add-button" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}">Add
        </button>
    </div>

</form>


