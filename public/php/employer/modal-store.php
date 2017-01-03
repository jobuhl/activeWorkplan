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

            <!-- Modal body-->
            <!-- Basic-->
            <div class="modal-body">
                <form>

                    <!-- Zeile 1 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            Store ID
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p class=" inputmodal form-control">0005</p>
                        </aside>

                    </article>


                    <!-- Zeile 2 password Change button -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control " type="text"
                                      placeholder="Store Name">
                            
                        </aside>

                    </article>

                    <!-- Zeile 3 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            Adress
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class=" inputmodal form-control space-cap" type="text" placeholder="Street">
                            </p>
                        </aside>

                    </article>

                    <!-- Zeile 4 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control space-cap" type="text"
                                      placeholder="Employee Firstname"></p>
                        </aside>

                    </article>

                    <!-- Zeile 5 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control space-cap" type="text"
                                      placeholder="Street Nr.">
                            </p>
                        </aside>

                    </article>

                    <!-- Zeile 6 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control space-cap" type="text" placeholder="Postcode">
                            </p>
                        </aside>

                    </article>

                    <!-- Zeile 7 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control space-cap" type="text" placeholder="City"></p>
                        </aside>

                    </article>

                    <!-- Zeile 8 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal modal-input form-control space-cap" type="text"
                                      placeholder="Country"></p>
                        </aside>

                    </article>


                </form>


            </div>
            <!-- Modal footer-->
            <div class="modal-footer">
                <button type="submit" class="form-control to-right add-button" data-toggle="modal"
                        data-target="#add-button-store" onclick="addstore()">Add
                </button>
            </div>

        </div>

    </div>
</div>

<!-- Button der Stores ändert -->
<div id="change-button-store" class="modal fade" role="dialog">
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
            <div class="modal-body">

                <!-- Zeile 1 -->
                <article class="row">
                    <h2 style="display: none">fakeheading</h2>

                    <!-- links -->
                    <aside class="col-xs-12">

                        <?php
                        include 'searchbar-store.php';
                        ?>

                    </aside>

                </article>


            </div>

            <!-- Modal footer-->
            <div class="modal-footer">
                <button class="form-control to-right modal-change-button" data-dismiss="modal" data-toggle="modal"
                        data-target="#change-button-store-2">
                    Change
                </button>
            </div>
        </div>

    </div>
</div>

<!-- Button der Store ändert Step 2-->
<div id="change-button-store-2" class="modal fade" role="dialog">
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
            <div class="modal-body">
                <form>

                    <!-- Zeile 1 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            Store ID
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right ">
                            <p class="inputmodal form-control">0005</p>
                        </aside>

                    </article>

                    <!-- Zeile 2 password Change button -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control" type="text" placeholder="Store Name"></p>
                        </aside>

                    </article>

                    <!-- Zeile 3 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            Adress
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control" type="text" placeholder="Street"></p>
                        </aside>

                    </article>

                    <!-- Zeile 4 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control" type="text" placeholder="Employee Firstname">
                            </p>
                        </aside>

                    </article>

                    <!-- Zeile 5 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control" type="text" placeholder="Street Nr."></p>
                        </aside>

                    </article>

                    <!-- Zeile 6 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control" type="text" placeholder="Postcode"></p>
                        </aside>

                    </article>

                    <!-- Zeile 7 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control" type="text" placeholder="City"></p>
                        </aside>

                    </article>

                    <!-- Zeile 8 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="inputmodal form-control" type="text" placeholder="Country"></p>
                        </aside>

                    </article>


                </form>


            </div>
            <!-- Modal footer-->
            <div class="modal-footer">
                <button class="form-control to-right modal-change-button" data-toggle="modal"
                        data-target="#change-button-store-2" onclick="modalChange()">
                    Change
                </button>
            </div>

        </div>


    </div>


</div>

<!-- Button der Stores löscht -->
<div id="delete-button-store" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Delete Retail Store</h2>
                <br>

                <!-- Übersicht der Navigation die bei Vorschritt markiert weden -->

            </div>

            <!-- Modal body-->
            <!-- Basic-->
            <div class="modal-body">
                <?php
                include 'searchbar-store.php';
                ?>


            </div>

            <!-- Modal footer-->
            <div class="modal-footer">
                <button class="form-control to-right delete-button" data-dismiss="modal" data-toggle="modal"
                        data-target="#delete-button-store-2">Delete
                </button>
            </div>
        </div>

    </div>
</div>

<!-- Button der Store löscht Step 2-->
<div id="delete-button-store-2" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Delete Store</h2>
                <br>

                <!-- Übersicht der Navigation die bei Vorschritt markiert weden -->

            </div>

            <!-- Modal body-->
            <!-- Basic-->
            <div class="modal-body">
                <form>

                    <!-- Zeile 1 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Store ID
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="form-control">0005</p>
                        </aside>

                    </article>

                    <!-- Zeile 2 password Change button -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Store Name
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="form-control"> Konstanz</p>
                        </aside>

                    </article>

                    <!-- Zeile 3 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Street
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="form-control"> Braunerggerstraße</p>
                        </aside>

                    </article>

                    <!-- Zeile 4 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Street Nr.
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="form-control"> 55</p>
                        </aside>

                    </article>

                    <!-- Zeile 5 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Postcode
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="form-control"> 78462</p>
                        </aside>

                    </article>

                    <!-- Zeile 6 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            City
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="form-control"> Konstanz</p>
                        </aside>

                    </article>

                    <!-- Zeile 7 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Country
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="form-control"> Deutschland</p>
                        </aside>

                    </article>


                </form>


            </div>
            <!-- Modal footer-->
            <div class="modal-footer">
                <button class="form-control to-right delete-button" data-dismiss="modal" data-toggle="modal"
                        data-target="#delete-button-store-3">
                    Delete
                </button>
            </div>

        </div>


    </div>


</div>

<!-- Button der Store löscht Step 3-->
<div id="delete-button-store-3" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->

                <h2 class="modal-ueberschrift">Delete Store</h2>
                <br>

            </div>
            <!-- Basic-->
            <div class="modal-body">

                <h5 class="select-ueberschrift">Do you really want to delete Store Konstanz</h5>

            </div>

            <!-- Modal footer-->
            <div class="modal-footer">
                <button class="form-control to-right delete-button" data-toggle="modal"
                        data-target="#delete-button-store-3"
                        onclick="deleteStore()">
                    Delete
                </button>
            </div>

        </div>


    </div>

</div>
