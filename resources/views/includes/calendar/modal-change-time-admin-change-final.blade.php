<!-- Hidden Button opens Modal by JavaScript -->
<button id="open-modal-change-time-event-admin-change-final" style="display: none;" data-toggle="modal" data-target="#modal-change-time-event-admin-change-final">⇄</button>

<!-- Button der Time Event aendert -->
<div id="modal-change-time-event-admin-change-final" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form method="POST" action="{{ url('/admin/changeWorktimeFix') }}"> {{ csrf_field() }}

            <!-- Modal header-->
                <div class="modal-header">

                    <!-- Close Button oben rechts im Header -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <!-- Überschrift -->
                    <h2 class="modal-ueberschrift">Change Final Work Event</h2>
                    <br>

                </div>


            @include("includes.calendar.modal-change-time")

            <!-- Modal footer-->
                <div class="modal-footer">

                    <input style="display: none;" name="thisUrl" value="{{ url()->current() }}">
                    <input style="display: none;" class="id-overwrite" name="thisEventId" value=""/>
                    <input style="display: none;" class="employee-overwrite" name="thisEmployeeId" value=""/>
                    <button type="submit" class="form-control to-right yellow-button">Change</button>

                </div>

            </form>
        </div>
    </div>
</div>