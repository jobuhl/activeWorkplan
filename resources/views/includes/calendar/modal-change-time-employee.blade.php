<!-- Hidden Button opens Modal by JavaScript -->
<button id="open-modal-change-time-event-employee" style="display: none;" data-toggle="modal" data-target="#modal-change-time-event-employee">⇄</button>

<!-- Button der Time Event aendert -->
<div id="modal-change-time-event-employee" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form method="POST" action="{{ url('/employee/timeEventChange') }}"> {{ csrf_field() }}

            <!-- Modal header-->
                <div class="modal-header">

                    <!-- Close Button oben rechts im Header -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <!-- Überschrift -->
                    <h2 class="modal-ueberschrift">Change Time Event</h2>
                    <br>

                </div>

            @include("includes.calendar.modal-change-time")


            <!-- Modal footer-->
                <div class="modal-footer">
                    <!-- important EventID wird reingeschrieben -->
                    <input style="display: none;" class="id-overwrite" name="thisEventId" value=""/>
                    <button type="submit" class="form-control to-right yellow-button" name="thisDate" value="{{ $week[0] }}">Change</button>
                </div>

            </form>
        </div>
    </div>
</div>