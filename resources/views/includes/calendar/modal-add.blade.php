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

                <div class="modal-sub">
                    <p class="col-xs-6 signin-head1" onclick="nextStep(10)">Time-Event</p>
                    <p class="col-xs-6 signin-head2" onclick="nextStep(11)">Allday-Event</p>
                </div>

            </div>

            <!-- JavaScript Methoden in SignUp.Js-->
            @include('includes.calendar.modal-add-allday')
            @include('includes.calendar.modal-add-time')

        </div>

    </div>
</div>