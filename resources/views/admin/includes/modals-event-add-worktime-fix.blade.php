<!-- Button der Time Event aendert -->
<div id="change-button-event-time-admin" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Add Fix Worktime Event</h2>
                <br>

                <form  method="POST" action="{{ url('/admin/addWorktimeFix') }}"> {{ csrf_field() }}

                <!-- Modal body-->
                    <div class="modal-body change-event-modal">

                        <!-- Zeile 1 -->
                        <div class="row">
                            <!-- links -->
                            <aside class="col-xs-12 col-sm-4 aside-left-add">Category</aside>
                            <!-- rechts -->
                            <aside class="col-xs-12 col-sm-8 aside-right">
                                <p><select id="select-js-on-add-worktime-fix-admin"
                                           class="selectpicker form-control to-right modal-input space-cap"
                                           name="category">
                                        <option>Work</option>
                                    </select></p>
                            </aside>
                        </div>

                        <!-- Zeile 2 -->
                        <div class="row">
                            <!-- links -->
                            <aside class="col-xs-12 col-sm-4 aside-left-add">Time</aside>
                            <!-- rechts -->
                            <aside class="col-xs-12 col-sm-8 aside-right">
                                <p><input id="input-js-on-add-worktime-fix-date-admin"
                                          class="datepicker inputmodal form-control space-cap" type="date" name="date"
                                          placeholder="Date"/></p>
                            </aside>
                        </div>

                        <!-- Zeile 3 -->
                        <div class="row">
                            <!-- links -->
                            <aside class="col-xs-12 col-sm-4"></aside>
                            <!-- rechts -->
                            <aside class="col-xs-12 col-sm-8 aside-right">
                                <p><input id="input-js-on-add-worktime-fix-from-admin" class="inputmodal form-control space-cap"
                                          type="text" name="time-from"
                                          placeholder="From"/></p>
                            </aside>
                        </div>

                        <!-- Zeile 4 -->
                        <div class="row">
                            <!-- links -->
                            <aside class="col-xs-12 col-sm-4"></aside>
                            <!-- rechts -->
                            <aside class="col-xs-12 col-sm-8 aside-right">
                                <p><input id="input-js-on-add-worktime-fix-to-admin" class="inputmodal form-control space-cap"
                                          type="text" name="time-to"
                                          placeholder="To"/></p>
                            </aside>
                        </div>

                    </div>

                    <!-- Modal footer-->
                    <div>
                        <input style="display: none;" id="input-js-on-add-worktime-fix-employee-id-admin" name="thisEmployeeId" value="">
                        <input style="display: none;" name="thisRetailStoreId" value="{{ $thisRetailStore->id }}">
                        <button type="submit" class="form-control to-right add-button"
                                name="thisDate"
                                value="{{ $week[0]->format('d-m-Y') }}">Add
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>