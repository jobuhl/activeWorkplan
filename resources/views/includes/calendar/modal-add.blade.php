<!-- Hidden Button opens Modal by JavaScript -->
<button id="open-modal-add-event" data-toggle="modal" data-target="#modal-add-event" style="display: none;"></button>


<!-- Button der Event hinzufügt -->
<div id="modal-add-event" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Add Event</h2>

                <br>
            </div>


            <form method="POST" action="{{ url('/employee/eventCreate') }}" id="modal-body-event"> {{ csrf_field() }}

            <!-- Modal body-->
                <div class="modal-body">

                    <!-- Zeile 1 Category -->
                    <div class="row">
                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">Category</aside>
                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <select class="selectpicker form-control modal-input space-cap" name="category">
                                @foreach($category as $cat)
                                    @if ($cat->name != "Work Final")
                                        <option>{{ $cat->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </aside>
                    </div>

                    <!-- Zeile 2 Date -->
                    <div class="row">
                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">Date</aside>
                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="date-overwrite datepicker inputmodal form-control space-cap" type="date" name="date" placeholder="dd-mm-yyyy"/></p>
                        </aside>
                    </div>

                    <div class="hide-time-input">

                        <!-- Zeile 3 From -->
                        <div class="row">
                            <!-- links -->
                            <aside class="col-xs-12 col-sm-4 aside-left-add">From</aside>
                            <!-- rechts -->
                            <aside class="col-xs-12 col-sm-8 aside-right">
                                <p><input class="overwrite-empty inputmodal form-control" type="text" name="time-from" placeholder="9:00"></p>
                            </aside>
                        </div>

                        <!-- Zeile 4 To -->
                        <div class="row">
                            <!-- links -->
                            <aside class="col-xs-12 col-sm-4 aside-left-add">To</aside>
                            <!-- rechts -->
                            <aside class="col-xs-12 col-sm-8 aside-right">
                                <p><input class="overwrite-empty inputmodal form-control" type="text" name="time-to" placeholder="15:00"></p>
                            </aside>
                        </div>

                    </div>


                    <!-- Zeile 5 Show Time -->
                    <div class="row">
                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add"></aside>
                        <!-- rechts -->
                        <aside class="col-xs-4 col-xs-offset-4 col-sm-8 col-sm-offset-0 aside-right">
                            <button type="button" class="overwrite-time-button form-control blue-light-button" onclick="openTimeInput()">Show Time</button>
                        </aside>
                    </div>

                </div>

                <!-- Modal footer-->
                <div class="modal-footer">
                    <button type="submit" class="form-control green-button" name="thisDate" value="{{ $week[0] }}">Add</button>
                </div>

            </form>


        </div>

    </div>
</div>