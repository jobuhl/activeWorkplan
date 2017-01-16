<!-- Button der Event hinzufügt -->
<div id="add-button-event" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Add Event</h2>

                <br>
                <div class="modal-sub">
                    <p class="col-xs-6 signin-head1" onclick="nextStep(10)">Time-Event</p>
                    <p class="col-xs-6 signin-head2" onclick="nextStep(11)">Allday-Event</p>
                </div>

                <br>

                <!-- JavaScript Methoden in SignUp.Js-->
                <div class="modal-body">
                    <div id="modal-body-event-allday">
                        @include('employee.includes.event-allday')
                    </div>

                    <div id="modal-body-event-time">
                        @include('employee.includes.event-time')
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>