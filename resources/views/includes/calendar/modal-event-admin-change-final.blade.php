<!-- Hidden Button opens Modal by JavaScript -->
<button id="open-modal-event-admin-change-final" data-toggle="modal" data-target="#modal-event-admin-change-final" style="display: none;"></button>


<!-- Button der Event hinzufügt -->
<div id="modal-event-admin-change-final" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change Final Work Event</h2>

                <br>
            </div>


            <form method="POST" action="{{ url('/changeEvent') }}" id="modal-body-event"> {{ csrf_field() }}

            @include('includes.calendar.modal-event-inputs')

            <!-- Modal footer-->
                <div class="modal-footer">
                    <input style="display: none;" class="id-overwrite" name="thisEventId" value=""/>
                    <input style="display: none;" class="employee-overwrite" name="thisEmployeeId" value=""/>
                    <button type="submit" class="form-control yellow-button" name="thisUrl" value="{{ url()->current() }}">Change</button>
                </div>

            </form>


        </div>

    </div>
</div>