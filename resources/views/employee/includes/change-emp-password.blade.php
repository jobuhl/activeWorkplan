<!-- changebutton für das Password-Pop-Up im Pop-Up -->
<div id="change-password" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change Password</h2>
            </div>

            <form class="form-horizontal" method="POST" action="{{ url('/employee/changeEmpPassword') }}"> {{ csrf_field() }}
            <!-- Body-->
                <div class="modal-body">

                    {{--<input class="inputmodal form-control space-cap-inner" type="password"--}}
                    {{--placeholder="Old password" name="old-password">--}}

                    <div class="form-group{{ $errors->has('old-password') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input class="inputmodal form-control space-cap-inner" type="password" placeholder="Old password" name="old-password">
                            @if ($errors->has('old-password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('old-password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <!-- password1-->
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <!-- password1 ende-->

                    <!-- password2-->
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                        <div class="col-xs-12">
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                </div>

                <!-- Modal footer-->
                <div class="modal-footer">
                    <button type="submit" class="form-control yellow-button space-line" name="thisDate" value="{{ $week[0] }}">Change Password</button>
                </div>

            </form>

        </div>
    </div>

</div>