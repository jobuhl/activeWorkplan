<div id="signupbutton" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!-- Überschrift -->
                <h1 class="modal-ueberschrift">Sign up</h1>
                <br>

                <!-- Übersicht der Navigation die bei Vorschritt markiert weden -->
                <div class="modal-sub">

                    <p class="col-xs-3 signin-head1" onclick="nextStep(1)">Employee</p>
                    <p class="col-xs-3 signin-head2" onclick="nextStep(2)">Admin</p>
                    <p class="col-xs-3 signin-head3" onclick="nextStep(3)">Company</p>
                    <p class="col-xs-3 signin-head4" onclick="nextStep(6)">Store</p>

                </div>

                <div id="myProgress">
                    <div id="myBar"></div>
                </div>

            </div>

            <!-- Modal body-->

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/register') }}">
                {{ csrf_field() }}

                <div class="modal-body">

                    <!-- Basic-->
                    <div id="basic">
                        <!-- email-->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- email-ende -->

                        <!-- password1-->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
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

                    <!-- User-->
                    <div id="user">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                       autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="forename" class="col-md-4 control-label">Forename</label>

                            <div class="col-md-6">
                                <input id="forename" type="text" class="form-control" name="forename"
                                       value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                        </div>



                    </div>

                    <!-- Company-->
                    <div id="company">
                        <h3>Company Details</h3>
                        <p><input class="form-control" type="email" name="company-name" placeholder="Company name"></p>

                        <h3>Company Headquarter Adress</h3>
                        <p><input class="form-control" type="text" name="street" placeholder="Street"></p>
                        <p><input class="form-control" type="text" name="street_nr" placeholder="Street Nr."></p>
                        <p><input class="form-control" type="text" name="postcode" placeholder="Postcode"></p>
                        <p><input class="form-control" type="text" name="city" placeholder="City"></p>
                        <p><input class="form-control" type="text" name="country" placeholder="Country"></p>


                    </div>

                    <!-- Retail Store-->
                    <div id="store">
                        <h3>Store Details</h3>
                        <p><input class="form-control" type="email" name="store-name" placeholder="Store name"></p>

                        <h3>Store Adress</h3>
                        <p><input class="form-control" type="text" name="street2" placeholder="Street"></p>
                        <p><input class="form-control" type="text" name="street_nr2" placeholder="Street Nr."></p>
                        <p><input class="form-control" type="text" name="postcode2" placeholder="Postcode"></p>
                        <p><input class="form-control" type="text" name="city2" placeholder="City"></p>
                        <p><input class="form-control" type="text" name="country2" placeholder="Country"></p>


                    </div>
                </div>
                <div class="modal-footer footer4">
                    <div class="col-xs-6">

                    </div>
                    <div class="col-xs-12">
                        <button id="back-button" class="form-control to-right add-button" type="submit">
                            SignUp
                        </button>

                    </div>
                </div>
            </form>
        </div>

        <!-- Modal footer-->

    </div>
</div>
<!--End Sign up-->

