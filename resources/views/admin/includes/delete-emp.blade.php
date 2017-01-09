{{--Delete Modal--}}
<div id="delete" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <!-- Basic-->
            <div class="modal-body">
                <div class="modal-header">

                    <!-- Close Button oben rechts im Header -->
                    <button type="button" class="close" data-dismiss="modal"
                    >&times;</button>

                    <!-- Überschrift -->
                    <h2 class="modal-ueberschrift">Delete Employee</h2>
                    <h5 class="select-ueberschrift">Do you really want to delete {{  $thisEmployee->name }} </h5>
                    <br>


                </div>
                <!-- Modal footer-->
                <div class="modal-footer">
                    <button class="form-control set-right delete-button" data-toggle="modal"
                            data-target="#delete-button-emp-3"
                            onclick="deleteUserSingle()">
                        Delete
                    </button>
                </div>


            </div>


        </div>

    </div>

</div>


</aside>

</div>