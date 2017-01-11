<!-- Button der Store ändert Step 2-->
<div id="change-store" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change Store</h2>
                <br>

                <!-- Übersicht der Navigation die bei Vorschritt markiert weden -->

            </div>

            <!-- Modal body-->
            <!-- Basic-->
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/changeStore') }}">
                {{ csrf_field() }}

                <div class="modal-body">

                    <!-- Zeile 2 password Change button -->
                    <div class="row">
                      

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control" type="text" value="{{ $thisRetailStore->name }}" name="store_name"></p>
                        </aside>

                    </div>

                    <!-- Zeile 3 -->
                    <div class="row">

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            Adress
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-9 col-sm-6 aside-right">
                            <p><input class="inputmodal form-control" type="text" value="{{ $addressRetailStore->street }}" name="street"></p>
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-3 col-sm-2 ">
                            <p><input class="inputmodal form-control" type="text" value="{{ $addressRetailStore->street_nr }}" name="nr"></p>
                        </aside>

                    </div>

                    <!-- Zeile 6 -->
                    <div class="row">

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control" type="text" value="{{ $addressRetailStore->postcode }}" name="postcode"></p>
                        </aside>

                    </div>

                    <!-- Zeile 7 -->
                    <div class="row">
                      

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control" type="text" value="{{ $addressRetailStore->city }}" name="city"></p>
                        </aside>

                    </div>

                    <!-- Zeile 8 -->
                    <div class="row">
                      

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control" type="text" value="{{ $addressRetailStore->country }}" name="country"></p>
                        </aside>

                    </div>





            </div>
            <!-- Modal footer-->
            <div class="modal-footer">
                <input style="display: none;" name="thisDate" value="{{ $week[0]->format('d-m-Y') }}"/>
                <button class="form-control to-right modal-change-button" type="submit" value="{{ $thisRetailStore->id }}" name="thisRetailStoreId">
                    Change
                </button>
            </div>
            </form>

        </div>


    </div>


</div>