<!-- Button der den Account löscht-->
<div id="delete-button-admin" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Delete Account</h2>
            </div>

            <!-- Body-->
            <div class="modal-body">
                Do you really want to delete all accounts of your company?
            </div>

            <div class="modal-footer">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/deleteAdmin') }}">
                    {{ csrf_field() }}
                    <button class="form-control  red modal-bottom" type="submit">
                        Delete
                    </button>
                </form>
            </div>
            <!-- Modal footer-->

        </div>
    </div>

</div>
