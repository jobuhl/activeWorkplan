{{--Change Modal--}}
<div id="change" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change Employee</h2>
                <br>

                <!-- Übersicht der Navigation die bei Vorschritt markiert weden -->

            </div>

            <!-- Modal body-->
            <!-- Basic-->
            <form class="form-horizontal"  method="POST"
                  action="{{ url('/admin/changeEmp') }}">
                {{ csrf_field() }}
                <div class="modal-body">


                    <!-- Zeile 1 password Change button -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-line">
                            Password
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <button type="button" class="form-control  modal-change-button space-line yellow"
                                    data-dismiss="modal"
                                    data-toggle="modal"
                                    data-target="#change-password">Change Password
                            </button>
                        </aside>

                    </div>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>


                    <!-- Zeile 2 Surname -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-line">
                            Employee
                        </aside>

                        <!-- rechts -->

                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('name') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap" type="text" name="name"
                                   placeholder="Name"
                                   value="{{ $thisEmployee->surname }}">
                            @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </aside>

                    </div>

                    <!-- Zeile 3 Forename -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->

                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('forename') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap-bottom" type="text" name="forename"
                                   placeholder="Forename" value="{{ $thisEmployee->forename }}">
                            @if ($errors->has('forename'))
                                <span class="help-block"><strong>{{ $errors->first('forename') }}</strong></span>
                            @endif
                        </aside>

                    </div>

                    <!-- Zeile Email -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        {{--<aside class="col-xs-12 col-sm-8 aside-right">--}}
                            {{--<p><input class="form-control to-right modal-input space-cap" type="text"--}}
                                      {{--value="{{ $thisEmployee->email }}" name="email"></p>--}}
                        {{--</aside>--}}
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <button type="button" class="form-control  modal-change-button space-line yellow"
                                    data-dismiss="modal"
                                    data-toggle="modal"
                                    data-target="#change-email">Change Email
                            </button>
                        </aside>
                    </div>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>
                    <!-- Zeile 6 Agreement -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-line">
                            Contract
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><select class="selectpicker form-control to-right modal-input space-cap-inner"
                                       name="agreement">
                                    <option>unlimited</option>
                                    <option>limited</option>
                                </select></p>

                        </aside>

                    </div>

                    <!-- Zeile 7 Role -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('role') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap-inner" type="text" name="role"
                                   placeholder="Role" value="{{ $thisEmployee->role }}">
                            @if ($errors->has('role'))
                                <span class="help-block"><strong>{{ $errors->first('role') }}</strong></span>
                            @endif
                        </aside>


                    </div>

                    <!-- Zeile 8 Classification -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><select class="selectpicker form-control to-right modal-input space-cap-inner"
                                       name="classification">
                                    <option>Fulltime</option>
                                    <option>Halftime</option>
                                    <option>Parttime</option>
                                    <option>Internship</option>
                                </select></p>
                        </aside>

                    </div>

                    <!-- Zeile 9 hours -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('working_hours') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap-bottom" type="text" name="working_hours"
                                   placeholder="Working hours" value="{{ $thisEmployee->working_hours }}">
                            @if ($errors->has('working_hours'))
                                <span class="help-block"><strong>{{ $errors->first('working_hours') }}</strong></span>
                            @endif
                        </aside>



                    </div>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>

                    <!-- Zeile 10 Company-->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-line">
                            Company
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p class="inputmodal form-control">HTWG</p>
                        </aside>

                    </div>

                    <!-- Zeile 11 RetailStore-->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 ">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><select class="selectpicker form-control to-right modal-input space-cap-inner"
                                       name="retail_store_value">
                                    <option value="{{ $thisRetailStore->id}}">{{ $thisRetailStore->name }}</option>
                                    @foreach($allRetailStores as $retailStore)
                                        @if($retailStore->name != $thisRetailStore->name)
                                            <option value="{{$retailStore->id}}">{{ $retailStore->name }}</option>
                                        @endif
                                    @endforeach
                                </select></p>
                        </aside>

                    </div>


                </div>
                <!-- Modal footer-->
                <div class="modal-footer">
                    <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                    <button class="form-control to-right modal-change-button space-to-top-bottom" type="submit"
                            value="{{ $thisEmployee->id }}" name="thisEmployeeId">
                        Change
                    </button>
                </div>
            </form>
        </div>


    </div>
</div>

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

            <form class="form-horizontal"  method="POST" action="{{ url('/admin/changePasswordEmp') }}">
            {{ csrf_field() }}
            <!-- Body-->
                <div class="modal-body">

                    <!-- password1-->
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input type="password" class="form-control" name="password"
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
                    <!-- password1 ende-->
                </div>

                <!-- Modal footer-->
                <div class="modal-footer">

                    <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                    <button type="submit" class="form-control  modal-change-button space-line yellow"
                            value="{{ $thisEmployee->id }}" name="thisEmployeeId"
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

            <form class="form-horizontal"  method="POST" action="{{ url('/admin/changeEmailEmp') }}">
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