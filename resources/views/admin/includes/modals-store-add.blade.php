<!--Store add change delete -->
<!-- Button der Stores hinzufügt -->
<div id="add-button-store" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Add Store</h2>
                <br>

                <!-- Übersicht der Navigation die bei Vorschritt markiert weden -->

            </div>
            <form type="form" method="POST" action="{{ url('/admin/storeCreate') }}">
            {{ csrf_field() }}

                <!-- Modal body-->
                <!-- Basic-->
                <div class="modal-body">

                    <!-- Zeile 1 -->
                    <div class="row">
                       

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            Store ID
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p class=" inputmodal form-control">0005</p>
                        </aside>

                    </div>


                    <!-- Zeile 2 password Change button -->
                    <div class="row">
                       

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control" type="text" name="name" placeholder="Store Name">
                        </aside>

                    </div>

                    <!-- Zeile 3 -->
                    <div class="row{{ $errors->has('street') ? ' has-error' : '' }}">
                       

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            Address
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class=" inputmodal form-control space-cap" type="text" name="street" placeholder="Street">
                            </p>
                            @if ($errors->has('street'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                            @endif
                        </aside>

                    </div>

                    <!-- Zeile 4 -->
                    <div class="row">
                       

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control space-cap" type="text"
                                      name="street_nr" placeholder="Street Nr.">
                            </p>
                        </aside>

                    </div>

                    <!-- Zeile 5 -->
                    <div class="row">
                       

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control space-cap" type="text" name="postcode" placeholder="Postcode">
                            </p>
                        </aside>

                    </div>

                    <!-- Zeile 6 -->
                    <div class="row">
                       

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control space-cap" type="text" name="city" placeholder="City"></p>
                        </aside>

                    </div>

                    <!-- Zeile 7 -->
                    <div class="row">
                       

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p>
                                <input class="inputmodal modal-input form-control space-cap" type="text"
                                       name="country" placeholder="Country">
                            </p>
                        </aside>

                    </div>

                </div>
                <!-- Modal footer-->
                <div class="modal-footer">
                    <button type="submit" class="form-control to-right add-button" data-toggle="modal"
                            data-target="#add-button-store" onclick="addstore()">Add
                    </button>
                </div>

            </form>

        </div>

    </div>
</div>
