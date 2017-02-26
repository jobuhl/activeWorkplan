<!-- Hidden Button opens Modal by JavaScript -->
<button id="open-modal-change-allday-event" style="display: none;" data-toggle="modal" data-target="#modal-change-allday-event">⇄</button>

<!-- Button der Allday Event aendert -->
<div id="modal-change-allday-event" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form method="POST" action="{{ url('/employee/alldayEventChange') }}"> {{ csrf_field() }}


            <!-- Modal header-->
                <div class="modal-header">

                    <!-- Close Button oben rechts im Header -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <!-- Überschrift -->
                    <h2 class="modal-ueberschrift">Change Allday Event</h2>

                    <br>
                </div>

                <!-- Modal body-->
                <div class="modal-body">

                    <!-- Zeile 1 -->
                    <div class="row">
                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">Category</aside>
                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">

                            <select class="selectpicker form-control modal-input space-cap" name="category">
                                <option class="category-overwrite">overwrite</option>
                                <option disabled>----------</option>
                                @foreach($category as $cat )
                                    <option>{{ $cat->name }}</option>
                                @endforeach
                            </select>

                        </aside>
                    </div>

                    <!-- Zeile 2 -->
                    <div class="row">
                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">Time</aside>
                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <input class="date-overwrite datepicker inputmodal form-control space-cap" type="date" name="date"/>
                        </aside>
                    </div>

                </div>

                <!-- Modal footer-->
                <div class="modal-footer">

                    <input class="id-overwrite" style="display: none;" name="thisEventId" value=""/>
                    <button type="submit" class="form-control yellow-button" name="thisDate" value="{{ $week[0] }}">Change</button>

                </div>

            </form>

        </div>
    </div>
</div>