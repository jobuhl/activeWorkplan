<!-- Change button Pop-Up -->

<div id="change-button" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change Details</h2>
                <br>

                <!-- Übersicht der Navigation die bei Vorschritt markiert weden -->

            </div>

            <!-- Modal body-->
            <!-- Basic-->
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/changeAdmin') }}">
                {{ csrf_field() }}
                <div class="modal-body">


                    <!-- Zeile 2 password Change button -->
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

                    <!-- Zeile 3 Name-->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap">
                            Surname
                        </aside>

                        <!-- rechts -->

                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('name') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap" type="text" name="name"
                                   placeholder="Name" value="{{ $admin->name }}">
                            @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </aside>

                    </div>


                    <!-- Zeile 4 Forename-->
                    <div class="row modal-person">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-inner">
                            Forename
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('forename') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap-inner" type="text"
                                   name="forename" placeholder="Forename"
                                   value="{{ $admin->forename }}">
                            @if ($errors->has('forename'))
                                <span class="help-block"><strong>{{ $errors->first('forename') }}</strong></span>
                            @endif
                        </aside>

                    </div>

                    <!-- Zeile 5 Email Button-->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-inner">
                            E-Mail
                        </aside>

                        <!-- rechts -->

                        <aside class="col-sm-8 col-xs-12  aside-right ">
                            <button type="button" class="space-cap form-control  modal-change-button space-line yellow "
                                    data-dismiss="modal"
                                    data-toggle="modal"
                                    data-target="#change-email">Change Email
                            </button>
                        </aside>

                    </div>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>


                    <!-- Zeile 6 Company-Name-->
                    <div class="row ">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap">
                            Company
                        </aside>

                        <!-- rechts -->

                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('company_name') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap" type="text"
                                   name="company_name" placeholder="Company name" value="{{ $company->name }}">
                            @if ($errors->has('company_name'))
                                <span class="help-block"><strong>{{ $errors->first('company_name') }}</strong></span>
                            @endif
                        </aside>

                    </div>

                    <!-- Zeile 7 Street-->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-inner">
                            Street
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('street') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap-inner" type="text"
                                   name="street" placeholder="Street" value="{{ $address->street }}">
                            @if ($errors->has('street'))
                                <span class="help-block"><strong>{{ $errors->first('street') }}</strong></span>
                            @endif
                        </aside>

                    </div>


                    <!-- Zeile 8 Street-Nr -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-inner">
                            Street Nr.
                        </aside>

                        <!-- rechts -->

                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('street_nr') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap-inner" type="text"
                                   name="street_nr" placeholder="Street Nr." value="{{ $address->street_nr }}">
                            @if ($errors->has('street_nr'))
                                <span class="help-block"><strong>{{ $errors->first('street_nr') }}</strong></span>
                            @endif
                        </aside>


                    </div>

                    <!-- Zeile 9 Postcode -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-inner">
                            Postcode
                        </aside>

                        <!-- rechts -->

                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('postcode') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap-inner" type="text"
                                   name="postcode" placeholder="Postcode" value="{{ $address->postcode }}">
                            @if ($errors->has('postcode'))
                                <span class="help-block"><strong>{{ $errors->first('postcode') }}</strong></span>
                            @endif
                        </aside>

                    </div>

                    <!-- Zeile 10 City -->
                    <div class="row ">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-inner">
                            City
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">

                        </aside>

                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('city') ? ' has-error' : '' }}">
                            <input class=" inputmodal form-control  modal-input " type="text" name="city"
                                   value="{{ $address->city }}" placeholder="City">
                            @if ($errors->has('city'))
                                <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                            @endif
                        </aside>

                    </div>

                    <!-- Zeile 11 Country-->
                    <div class="row ">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left">
                            Country
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">


                        </aside>

                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('country') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap-inner" type="text"
                                   name="country" placeholder="Country" value="{{ $address->country }}">
                            @if ($errors->has('country'))
                                <span class="help-block"><strong>{{ $errors->first('country') }}</strong></span>
                            @endif
                        </aside>

                    </div>


                </div>
                <!-- Modal footer-->
                <div class="modal-footer">
                    <div class="col-xs-12">
                        <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                        <button type="submit" class="form-control  modal-change-button yellow">Change
                        </button>


                    </div>
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

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/changePasswordAdmin') }}">
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

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/changeEmailAdmin') }}">
            {{ csrf_field() }}

            <!-- Body-->
                <div class="modal-body {{ $errors->has('email') ? ' has-error' : '' }}">


                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input class="inputmodal form-control  modal-input space-cap-bottom" type="text"
                               name="email"
                               value="{{ $admin->email }}">
                        @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>


                </div>

                <!-- Modal footer-->
                <div class="modal-footer">

                    <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                    <button type="submit" class="form-control  modal-change-button space-line yellow"
                    >Change Email
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>