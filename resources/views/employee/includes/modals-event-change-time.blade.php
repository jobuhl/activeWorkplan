<!-- Button der Time Event aendert -->
<div id="change-button-event-time" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change Time Event</h2>
                <br>

                <form method="POST" action="{{ url('/employee/timeEventChange') }}"> {{ csrf_field() }}

                <!-- Modal body-->
                    <div class="modal-body change-event-modal">

                        <!-- Zeile 1 -->
                        <div class="row">
                            <!-- links -->
                            <aside class="col-xs-12 col-sm-4 aside-left-add">Category</aside>
                            <!-- rechts -->
                            <aside class="col-xs-12 col-sm-8 aside-right">
                                <p><select id="select-js-on-change-time"
                                           class="selectpicker form-control to-right modal-input space-cap"
                                           name="category">
                                        <option>this-category-wird-ueberschrieben</option>
                                        @foreach($category as $cat )
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
                                <p><input id="input-js-on-change-time-date" class="datepicker inputmodal form-control space-cap" type="date" name="date"
                                          /></p>
                            </aside>
                        </div>

                        <!-- Zeile 3 -->
                        <div class="row">
                            <!-- links -->
                            <aside class="col-xs-12 col-sm-4"></aside>
                            <!-- rechts -->
                            <aside class="col-xs-12 col-sm-8 aside-right">
                                <p><input id="input-js-on-change-time-from" class="inputmodal form-control space-cap" type="text" name="time-from"
                                          placeholder="From"/></p>
                            </aside>
                        </div>

                        <!-- Zeile 4 -->
                        <div class="row">
                            <!-- links -->
                            <aside class="col-xs-12 col-sm-4"></aside>
                            <!-- rechts -->
                            <aside class="col-xs-12 col-sm-8 aside-right">
                                <p><input id="input-js-on-change-time-to" class="inputmodal form-control space-cap" type="text" name="time-to"
                                          placeholder="To"/></p>
                            </aside>
                        </div>

                    </div>

                    <!-- Modal footer-->
                    <div>
                        <input id="event-id-time" style="display: none;" name="thisEventId" value=""/> <!-- important EventID wird reingeschrieben -->
                        <button type="submit" class="form-control to-right modal-change-button"
                                name="thisDate"
                                value="{{ $week[0]->format('d-m-Y') }}">Change
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>