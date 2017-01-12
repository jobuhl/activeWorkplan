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
            <form class="form-horizontal" role="form" method="POST"
                  action="{{ url('/admin/changeEmp') }}">
                {{ csrf_field() }}
                <div class="modal-body">


                    <!-- Zeile 2 password Change button -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4  aside-left-add">
                            Password
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="form-control to-right modal-input space-cap"
                                      type="password"
                                      value="******" name="password"></p>
                        </aside>

                    </div>


                    <!-- Zeile 3 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            Employee
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      value="{{ $thisEmployee->surname }}" name="name"></p>
                        </aside>

                    </div>

                    <!-- Zeile 4 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      value="{{ $thisEmployee->forename }}" name="forename"></p>
                        </aside>

                    </div>

                    <!-- Zeile 5 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      value="{{ $thisEmployee->email }}" name="email"></p>
                        </aside>

                    </div>

                    <!-- Zeile 6 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            Contract
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><select class="selectpicker form-control to-right modal-input space-cap"
                                       name="agreement">
                                    <option>unlimited</option>
                                    <option>limited</option>
                                </select></p>

                        </aside>

                    </div>

                    <!-- Zeile 7-->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      value="{{ $thisEmployee->role }}" name="role"></p>

                        </aside>

                    </div>

                    <!-- Zeile 8 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><select class="selectpicker form-control to-right modal-input space-cap"
                                       name="classification">
                                    <option>Fulltime</option>
                                    <option>Halftime</option>
                                    <option>Parttime</option>
                                    <option>Internship</option>
                                </select></p>
                        </aside>

                    </div>

                    <!-- Zeile 9 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="selectpicker form-control to-right modal-input space-cap"
                                      value="{{ $thisEmployee->working_hours}}" name="working_hours">

                            </p>
                        </aside>


                    </div>

                    <!-- Zeile 10 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            Company
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p class="inputmodal form-control">HTWG</p>
                        </aside>

                    </div>

                    <!-- Zeile 11 -->
                    <div class="row">


                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><select class="selectpicker form-control to-right modal-input space-cap" type="text"
                                       name="retail_store_name">
                                    <option>{{ $thisRetailStore->name }}</option>
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