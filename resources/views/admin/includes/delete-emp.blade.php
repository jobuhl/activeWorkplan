{{--Delete Modal--}}
<div id="delete-emp" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <form>
                <!-- Basic-->
                <div class="modal-body">

                    <div class="modal-header">

                        <!-- Close Button oben rechts im Header -->
                        <button type="button" class="close" data-dismiss="modal"
                        >&times;</button>

                        <!-- Überschrift -->
                        <h2 class="modal-ueberschrift">Delete Employee</h2>
                        <h5 class="select-ueberschrift">Do you really want to
                            delete {{ $thisEmployee->forename }} {{ $thisEmployee->surname}}</h5>
                        <br>
                    </div>
                    <div>
                        <button class="form-control set-right delete-button" data-toggle="modal"
                                data-target="#delete-button-emp-3">
                            Delete
                        </button>
                    </div>


                </div>

            </form>

        </div>

    </div>

</div>


</aside>

</div>