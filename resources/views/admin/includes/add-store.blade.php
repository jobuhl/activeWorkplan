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

                    <!-- Zeile 1 Company Name -->
                    <div class="row">
                       

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right {{ $errors->has('name') ? ' has-error' : '' }}">
                            <input class=" inputmodal form-control space-cap" type="text" name="name" placeholder="Store Name">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </aside>

                    </div>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>

                    <!-- Zeile 2 Street + Street Nr-->
                    <div class="row">
                       

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-line">
                            Address
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-9 col-sm-6 aside-right {{ $errors->has('street') ? ' has-error' : '' }}">
                            <input class=" inputmodal form-control space-cap" type="text" name="street" placeholder="Street">

                            @if ($errors->has('street'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                            @endif
                        </aside>
                        <aside class="col-xs-3 col-sm-2 {{ $errors->has('street_nr') ? ' has-error' : '' }}">
                            <input class=" inputmodal form-control space-cap" type="text" name="street_nr" placeholder="Nr.">

                            @if ($errors->has('street_nr'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('street_nr') }}</strong>
                                    </span>
                            @endif
                        </aside>

                    </div>

                    <!-- Zeile 3 Postcode -->
                    <div class="row">
                       

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right {{ $errors->has('postcode') ? ' has-error' : '' }}">
                            <input class=" inputmodal form-control space-cap" type="text" name="postcode" placeholder="Postcode">

                            @if ($errors->has('postcode'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                            @endif
                        </aside>

                    </div>

                    <!-- Zeile 5 City-->
                    <div class="row">
                       

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right {{ $errors->has('city') ? ' has-error' : '' }}">
                            <input class=" inputmodal form-control space-cap" type="text" name="city" placeholder="City">

                            @if ($errors->has('city'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </aside>


                    </div>

                    <!-- Zeile 4 Country-->
                    <div class="row">
                       

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right {{ $errors->has('country') ? ' has-error' : '' }}">
                            <input class=" inputmodal form-control space-cap" type="text" name="country" placeholder="Country">

                            @if ($errors->has('country'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                            @endif
                        </aside>

                    </div>

                </div>
                <!-- Modal footer-->
                <div class="modal-footer">
                    <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                    <button type="submit" class="form-control to-right add-button" data-toggle="modal"
                            data-target="#add-button-store" onclick="addstore()">Add
                    </button>
                </div>

            </form>

        </div>

    </div>
</div>
