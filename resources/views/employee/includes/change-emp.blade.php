<!--Change button Pop - Up-->
<div id="change-button" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!--Modal content-->
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">

                <!--Close Button oben rechts im Header-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!--Überschrift -->
                <h2 class="modal-ueberschrift"> Change Details </h2>
                <br>

                <!--Übersicht der Navigation die bei Vorschritt markiert weden-->

            </div>
            <form class="form-horizontal" method="POST" action="{{ url('/employee/changeEmp') }}"> {{ csrf_field() }}
            <!--Modal body-->
                <!--Basic-->
                <div class="modal-body">

                    <!-- Zeile 2 password Change button -->
                    <div class="row">

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-line">Password</aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <button type="button" class="form-control yellow-button space-line" data-dismiss="modal" data-toggle="modal" data-target="#change-password">Change Password</button>
                        </aside>

                    </div>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>

                    <!-- Zeile 3 -->
                    <div class="row">

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left ">Surname</aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <input type="text" class="inputmodal form-control  space-cap-inner" name="name" placeholder="Name" value="{{ $thisEmployee->surname }}">
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
                        <aside class="col-sm-4 col-xs-12 aside-left ">Forename</aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12 aside-right">
                            <div class="form-group{{ $errors->has('forename') ? ' has-error' : '' }}">
                                <div class="col-xs-12">
                                    <input type="text" class="inputmodal form-control space-cap-inner" name="forename" placeholder="Forename" value="{{ $thisEmployee->forename }}">
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
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-bottom">E-Mail</aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <button type="button" class="form-control yellow-button space-line" data-dismiss="modal" data-toggle="modal" data-target="#change-email">Change E-Mail</button>
                        </aside>

                    </div>

                </div>

                <!-- Modal footer-->
                <div class="modal-footer">
                    <button type="submit" class="form-control yellow-button" name="thisDate" value="{{ $week[0] }}">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>