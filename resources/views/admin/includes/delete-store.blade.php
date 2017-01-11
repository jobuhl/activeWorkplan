<div id="delete-store" class="modal fade" role="dialog">
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
                    <h2 class="modal-ueberschrift">Delete Store</h2>
                    <h5 class="select-ueberschrift">Do you really want to delete {{ $thisRetailStore->name }}</h5>
                    <h5 class="select-ueberschrift">Attention! all employees of {{ $thisRetailStore->name }}  will be deleted too</h5>
                    <br>
                </div>

            </div>
            <!-- Modal footer-->
            <div class="modal-footer">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/deleteStore') }}">
                    {{ csrf_field() }}
                    <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                    <button class="form-control to-right delete-button" type="submit" value="{{ $thisRetailStore->id }}" name="thisRetailStoreId">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>