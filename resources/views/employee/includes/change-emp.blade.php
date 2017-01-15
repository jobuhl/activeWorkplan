<!--Change button Pop - Up-->
<div id="change-button" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!--Modal content-->
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">

                <!--Close Button oben rechts im Header-->
                <button type="button" class="close" data - dismiss="modal"
                >&times;</button>

                <!--Überschrift -->
                <h2 class="modal-ueberschrift"> Change Details </h2>
                <br>

                <!--Übersicht der Navigation die bei Vorschritt markiert weden-->

            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/employee/changeEmp') }}">
            {{ csrf_field() }}
            <!--Modal body-->
                <!--Basic-->
                <div class="modal-body">


                    <!-- Zeile 2 password Change button -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-line">
                            Password
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <button type="button" class="form-control  modal-change-button space-line"
                                    data-dismiss="modal"
                                    data-toggle="modal"
                                    data-target="#change-password">Change Password
                            </button>
                        </aside>

                    </div>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>

                    <!-- Zeile 3 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left ">
                            Surname
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <input type="text" class="inputmodal form-control  space-cap-inner" name="name"
                                           placeholder="Name"  value="{{ $thisEmployee->surname }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </aside>



                    </div>



                    <!-- Zeile 4 -->
                    <div class="row modal-person">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left ">
                            Forename
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <div class="form-group{{ $errors->has('forename') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <input type="text" class="inputmodal form-control  space-cap-inner" name="forename"
                                           placeholder="Forename"   value="{{ $thisEmployee->forename }}">
                                    @if ($errors->has('forename'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('forename') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </aside>

                    </div>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>

                    <!-- Zeile 5 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-bottom">
                            E-Mail
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <button type="button" class="form-control  modal-change-button space-line"
                                    data-dismiss="modal"
                                    data-toggle="modal"
                                    data-target="#change-email">Change E-Mail
                            </button>
                        </aside>

                    </div>


                    <!-- Modal footer-->


                </div>

                <div class="modal-footer">
                    <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>

                    <button type="submit" class="form-control modal-change-button">Change
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- changebutton für das Password-Pop-Up im Pop-Up -->
<!-- changebutton für das Password-Pop-Up im Pop-Up -->
<div id="change-password" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change Password</h2>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/employee/changeEmpPassword') }}">
            {{ csrf_field() }}
            <!-- Body-->
                <div class="modal-body">

                    {{--<input class="inputmodal form-control space-cap-inner" type="password"--}}
                    {{--placeholder="Old password" name="old-password">--}}

                    <div class="form-group{{ $errors->has('old-password') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input class="inputmodal form-control space-cap-inner" type="password"
                                   placeholder="Old password" name="old-password">
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
                            <input id="password" type="password" class="form-control" name="password"
                                   placeholder="Password">
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
                            <input id="password-confirm" type="password" class="form-control"
                                   placeholder="Confirm Password"
                                   name="password_confirmation">

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

                    <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                    <button type="submit" class="form-control  modal-change-button space-line yellow"
                    >Change Password
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>


<div id="change-email" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change E-Mail</h2>
            </div>

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/employee/changeEmpEmail') }}">
            {{ csrf_field() }}

            <!-- Body-->
                <div class="modal-body {{ $errors->has('email') ? ' has-error' : '' }}">


                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input class="inputmodal form-control  modal-input space-cap-bottom" type="text"
                               name="email"
                               value="{{ $thisEmployee->email }}">
                        @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>


                </div>

                <!-- Modal footer-->
                <div class="modal-footer">

                    <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                    <button type="submit" class="form-control  modal-change-button space-line yellow"
                            value="{{ $thisEmployee->id }}" name="thisEmployeeId"
                    >Change Email
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>