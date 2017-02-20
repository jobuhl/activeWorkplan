<div id="delete-store" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Delete Store</h2>

            </div>

            <!-- Basic-->
            <div class="modal-body">

                <h5 class="select-ueberschrift">Do you really wish to delete the Store "{{ $thisRetailStore->name }}" ?</h5>
                <h5 class="select-ueberschrift">Attention! All Employees of the Store "{{ $thisRetailStore->name }}" will be deleted as well.</h5>

            </div>

            <!-- Modal footer-->
            <div class="modal-footer">
                <form class="form-horizontal"  method="POST" action="{{ url('/admin/deleteStore') }}"> {{ csrf_field() }}
                    <input style="display: none;" name="thisDate" value="{{ $week[0] }}"/>
                    <button class="form-control to-right delete-button" type="submit" value="{{ $thisRetailStore->id }}" name="thisRetailStoreId">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>