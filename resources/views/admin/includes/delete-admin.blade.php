<!-- Button der den Account löscht-->
<div id="delete-button-admin" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Delete Account</h2>
            </div>

            <!-- Body-->
            <form class="form-horizontal" method="POST" action="{{ url('/admin/deleteAdmin') }}"> {{ csrf_field() }}

                <div class="modal-body">
                    <h5 class="select-ueberschrift"> Do you really want to delete all accounts of your company?</h5>

                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Modal footer-->
                <div class="modal-footer">
                    <button class="form-control red-button modal-bottom" type="submit" name="thisDate" value="{{ $week[0] }}">Delete</button>
                </div>

            </form>
        </div>
    </div>

</div>
