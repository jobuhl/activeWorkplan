<div id="add-button-emp" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Add Employee</h2>
                <br>

                <!-- Übersicht der Navigation die bei Vorschritt markiert weden -->

            </div>
            <form class="form-horizontal"  method="POST" action="{{ url('/admin/addEmp') }}">
            {{ csrf_field() }}
            <!-- Modal body-->
                <!-- Basic-->
                <div class="modal-body">


                    <!-- Zeile 1 password1 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-line">
                            Password
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right {{ $errors->has('password') ? ' has-error' : '' }}">
                            <p><input id="password" type="password" class="form-control" name="password"
                                      placeholder="password..."></p>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </aside>

                    </div>

                    <!-- Zeile 2 password2 -->
                    <div class="row ">

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input id="password" type="password" class="form-control" name="password_confirmation"
                                      placeholder="confirm password..."></p>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </aside>

                    </div>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>

                    <!-- Zeile 3 name-->
                    <div class="row ">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-line">
                            Employee
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right {{ $errors->has('name') ? ' has-error' : '' }}">
                            <p><input id="name" type="text" class="form-control" name="name" placeholder="surename"
                                      value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif</p>
                        </aside>

                    </div>

                    <!-- Zeile 4 forename-->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right {{ $errors->has('forename') ? ' has-error' : '' }}">
                            <p><input id="forename" type="text" class="form-control" name="forename"
                                      placeholder="forename" value="{{ old('forename') }}">

                                @if ($errors->has('forename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('forename') }}</strong>
                                    </span>
                                @endif</p>
                        </aside>

                    </div>

                    <!-- Zeile 5 email-->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right {{ $errors->has('email') ? ' has-error' : '' }}">
                            <p><input id="email" type="email" class="form-control" name="email" placeholder="E-Mail"
                                      value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif</p>
                        </aside>

                    </div>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>

                    <!-- Zeile 6 store-->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-line">
                            Store
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><select class="selectpicker form-control to-right modal-input space-cap" type="text"
                                       name="retail_store_name">

                                    @foreach($allRetailStores as $retailStore)
                                        <option>{{ $retailStore->name }}</option>
                                    @endforeach
                                </select></p>


                        </aside>

                    </div>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>

                    <!-- Zeile 6 contract-->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-line">
                            Contract
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><select class="selectpicker form-control to-right modal-input space-cap" type="text"
                                       name="period_of_agreement"
                                >
                                    <option>limited</option>
                                    <option>unlimited</option>

                                </select>

                            </p>


                        </aside>

                    </div>

                    <!-- Zeile 7 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">

                        </aside>

                        <!-- rechts -->

                        <aside class="col-xs-12 col-sm-8 aside-right {{ $errors->has('roleid') ? ' has-error' : '' }}">
                            <p><input id="roleid" type="text" class="form-control" name="roleid"
                                      placeholder="Role" value="{{ old('roleid') }}">

                                @if ($errors->has('roleid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('roleid') }}</strong>
                                    </span>
                                @endif</p>
                        </aside>

                    </div>

                    <!-- Zeile 8 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><select class="selectpicker form-control to-right modal-input space-cap" type="text"
                                       name="classification"
                                       placeholder="Classification">
                                    <option>Fulltime</option>
                                    <option>Halftime</option>
                                    <option>Parttime</option>
                                    <option>Internship</option>
                                </select>
                            </p>
                        </aside>

                    </div>

                    <!-- Zeile 9 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right {{ $errors->has('working_hours') ? ' has-error' : '' }}">
                            <p><input id="working_hours" type="text" class="form-control" name="working_hours"
                                      placeholder="Working Hours" value="{{ old('working_hours') }}">

                                @if ($errors->has('working_hours'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('working_hours') }}</strong>
                                    </span>
                                @endif</p>
                        </aside>

                    </div>

                    <br>
                </div>

                <div class="modal-footer">
                    <div class="col-xs-12">
                        <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                        <button type="submit" class="form-control to-right add-button">
                            Add
                        </button>
                    </div>
                </div>
            </form>


        </div>

    </div>
</div>