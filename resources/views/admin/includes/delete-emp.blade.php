{{--Delete Modal--}}
<div id="delete-emp" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <!-- Basic-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Delete Employee</h2>

                <br>


            </div>
            <div class="modal-body">
                <h5 class="select-ueberschrift">Do you really want to delete {{ $thisEmployee->forename }} {{ $thisEmployee->surname}}</h5>
                <!-- Modal footer-->



            </div>
            <div class="modal-footer">
                <form>
                    <button class="form-control  delete-button" type="submit">
                        Delete
                    </button>
                </form>
            </div>


        </div>

    </div>

</div>


</aside>

</div>