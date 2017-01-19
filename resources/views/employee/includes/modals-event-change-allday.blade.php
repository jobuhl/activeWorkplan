<!-- Button der Allday Event aendert -->
<div id="change-button-event-allday" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change Allday Event</h2>
                <br>

                <form method="POST" action="{{ url('/employee/alldayEventChange') }}"> {{ csrf_field() }}

                <!-- Modal body-->
                    <div class="modal-body change-event-modal">

                        <!-- Zeile 1 -->
                        <div class="row">
                            <!-- links -->
                            <aside class="col-xs-12 col-sm-4 aside-left-add">Category</aside>
                            <!-- rechts -->
                            <aside class="col-xs-12 col-sm-8 aside-right">
                                <p><select id="select-js-on-change-allday"
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
                                <p><input id="input-js-on-change-allday" class="datepicker inputmodal form-control space-cap" type="date" name="date"/></p>
                            </aside>
                        </div>

                    </div>

                    <!-- Modal footer-->
                    <div>
                        <input id="event-id-allday" style="display: none;" name="thisEventId" value=""/>
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