<!-- Button der Employee ändert Step 1-->
<div id="test" class="modal fade" role="dialog">
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
            <div class="modal-body">


                @include('includes.employer-searchbar-employee')




            </div>
            <!-- Modal footer-->
            <div class="modal-footer">
                <button class="form-control to-right modal-change-button"  data-toggle="modal"
                        data-target="#test-2">Change
                </button>
            </div>

        </div>

    </div>
</div>

<!-- Button der Employee ändert Step 2-->
<div id="test-2" class="modal fade" role="dialog">
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
            <div class="modal-body">
                <form>

                    <!-- Zeile 1 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-6 col-sm-4 aside-left-add-special">
                            Employee ID
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-6 col-sm-8 aside-right">
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
                            <p><input class="form-control to-right modal-input space-cap" type="password"
                                      placeholder="Password"></p>
                        </aside>

                    </article>


                    <!-- Zeile 3 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            Employee
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      placeholder="Schuster"></p>
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
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      placeholder="Maria"></p>
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
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      placeholder="Maria.Schuster@html.de"></p>
                        </aside>

                    </article>

                    <!-- Zeile 6 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            Contract
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><select class="selectpicker form-control to-right modal-input space-cap">
                                    <option>unlimited</option>
                                    <option>limited</option>
                                </select></p>

                        </aside>

                    </article>

                    <!-- Zeile 7  -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><select class="selectpicker form-control to-right modal-input space-cap">
                                    <option>Cashier</option>
                                    <option>Assistent</option>
                                    <option>Warehouse</option>
                                    <option>Shop</option>
                                </select></p>

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
                            <p><select class="selectpicker form-control to-right modal-input space-cap">
                                    <option>Fulltime</option>
                                    <option>Halftime</option>
                                    <option>Parttime</option>
                                    <option>Internship</option>
                                </select></p>
                        </aside>

                    </article>

                    <!-- Zeile 9 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><select class="selectpicker form-control to-right modal-input space-cap">
                                    <option>20</option>
                                    <option>25</option>
                                    <option>30</option>
                                    <option>35</option>
                                    <option>38</option>
                                    <option>40</option>
                                    <option>42</option>
                                    <option>45</option>
                                    <option>48</option>
                                </select></p>
                        </aside>


                    </article>

                    <!-- Zeile 10 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            Company
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p class="inputmodal form-control">HTWG</p>
                        </aside>

                    </article>

                    <!-- Zeile 11 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><select class="selectpicker form-control to-right modal-input space-cap">
                                    <option>Konstanz</option>
                                    <option>München</option>
                                    <option>Freiburg</option>
                                    <option>Stuttgart</option>

                                </select></p>
                        </aside>

                    </article>

                    <!-- Zeile 13 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p class="inputmodal form-control">Brauneggerstraße 55</p>
                            <p class="inputmodal form-control"> 78462 Konstanz </p>
                        </aside>
                    </article>


                </form>

            </div>
            <!-- Modal footer-->
            <div class="modal-footer">
                <button class="form-control to-right modal-change-button" data-toggle="modal"
                        data-target="#change-button-emp-2" onclick="modalChange()">
                    Change
                </button>
            </div>

        </div>


    </div>


</div>