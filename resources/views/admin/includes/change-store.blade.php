<!-- Button der Store ändert Step 2-->
<div id="change-store" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change Store</h2>
                <br>

                <!-- Übersicht der Navigation die bei Vorschritt markiert weden -->

            </div>

            <!-- Modal body-->
            <!-- Basic-->
            <form class="form-horizontal"  method="POST" action="{{ url('/admin/changeStore') }}"> {{ csrf_field() }}

                <div class="modal-body">

                    <!-- Zeile 1 Store Name -->
                    <div class="row">

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left space-line">Store</aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('store_name') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap" type="text" name="store_name" placeholder="Store Name" value="{{ $thisRetailStore->name }}">
                            @if ($errors->has('store_name'))
                                <span class="help-block"><strong>{{ $errors->first('store_name') }}</strong></span>
                            @endif
                        </aside>

                    </div>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>

                    <!-- Zeile 2 Street + Street-Nr -->
                    <div class="row">

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap">Address</aside>

                        <!-- rechts -->
                        <aside class="col-xs-9 col-sm-6 aside-right {{ $errors->has('street') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap" type="text" value="{{ $addressRetailStore->street }}" name="street" placeholder="Street">
                            @if ($errors->has('street'))
                                <span class="help-block"><strong>{{ $errors->first('street') }}</strong></span>
                            @endif
                        </aside>

                        <!-- rechts 2-->
                        <aside class="col-xs-3 col-sm-2 {{ $errors->has('nr') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap" type="text" value="{{ $addressRetailStore->street_nr }}" name="nr" placeholder="Nr.">
                            @if ($errors->has('nr'))
                                <span class="help-block"><strong>{{ $errors->first('nr') }}</strong></span>
                            @endif
                        </aside>

                    </div>

                    <!-- Zeile 3 Postcode -->
                    <div class="row">

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4"></aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('postcode') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap-inner" type="text" name="postcode" placeholder="Postcode" value="{{ $addressRetailStore->postcode }}">
                            @if ($errors->has('postcode'))
                                <span class="help-block"><strong>{{ $errors->first('postcode') }}</strong></span>
                            @endif
                        </aside>

                    </div>

                    <!-- Zeile 4 -->
                    <div class="row">

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4"></aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('city') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap-inner" type="text" name="city" placeholder="City" value="{{ $addressRetailStore->city }}">
                            @if ($errors->has('city'))
                                <span class="help-block"><strong>{{ $errors->first('city') }}</strong></span>
                            @endif
                        </aside>

                    </div>

                    <!-- Zeile 5 -->
                    <div class="row">

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4"></aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right {{ $errors->has('country') ? ' has-error' : '' }}">
                            <input class="inputmodal form-control  modal-input space-cap-inner" type="text" name="country" placeholder="Country" value="{{ $addressRetailStore->country }}">
                            @if ($errors->has('country'))
                                <span class="help-block"><strong>{{ $errors->first('country') }}</strong></span>
                            @endif
                        </aside>

                    </div>


                </div>
                <!-- Modal footer-->
                <div class="modal-footer">
                    <input style="display: none;" name="thisDate" value="{{ $week[0] }}"/>
                    <button class="form-control yellow-button" type="submit" value="{{ $thisRetailStore->id }}" name="thisRetailStoreId">Change</button>
                </div>
            </form>

        </div>


    </div>


</div>