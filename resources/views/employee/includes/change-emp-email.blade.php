<div id="change-email" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change E-Mail</h2>
            </div>

            <form class="form-horizontal" method="POST" action="{{ url('/employee/changeEmpEmail') }}"> {{ csrf_field() }}

            <!-- Body-->
                <div class="modal-body {{ $errors->has('email') ? ' has-error' : '' }}">

                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input class="inputmodal form-control  modal-input space-cap-bottom" type="text" name="email" value="{{ $thisEmployee->email }}">
                        @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>


                </div>

                <!-- Modal footer-->
                <div class="modal-footer">

                    <input style="display: none;" name="thisDate" value="{{ $week[0] }}"/>
                    <button type="submit" class="form-control yellow-button space-line" value="{{ $thisEmployee->id }}" name="thisEmployeeId">Change Email</button>
                </div>
            </form>
        </div>
    </div>

</div>