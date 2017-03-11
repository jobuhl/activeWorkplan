<!-- Hidden Button opens Modal by JavaScript -->
<button id="open-modal-event-employee-add" data-toggle="modal" data-target="#modal-event-employee-add" style="display: none;"></button>


<!-- Button der Event hinzufügt -->
<div id="modal-event-employee-add" class="modal fade" role="dialog">
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


            <form method="POST" action="{{ url('/addEvent') }}" id="modal-body-event"> {{ csrf_field() }}

            @include('includes.calendar.modal-event-inputs')

            <!-- Modal footer-->
                <div class="modal-footer">
                    <input style="display: none;"  name="thisEmployeeId" value="{{ Auth::user()->id }}"/>
                    <button type="submit" class="form-control green-button" name="thisUrl" value="{{ url()->current() }}">Add</button>
                </div>

            </form>


        </div>

    </div>
</div>