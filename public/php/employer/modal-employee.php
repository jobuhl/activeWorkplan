<!--Employee add change delete -->
<!-- Button der Employee hinzufügt -->
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

            <!-- Modal body-->
            <!-- Basic-->
            <div class="modal-body">
                <form>

                    <!-- Zeile 1 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                            <p>Employee ID</p>
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right aside-right-add">
                            <p class="inputmodal form-control">7928752</p>
                        </aside>

                    </article>

                    <!-- Zeile 2 password Change button -->

                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                           <input class="form-control " type="password"
                                      placeholder="Initial Password"></p>
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
                                      placeholder="Employee Surname"></p>
                        </aside>

                    </article>

                    <!-- Zeile 4 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      placeholder="Employee Forename"></p>
                        </aside>

                    </article>

                    <!-- Zeile 5 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      placeholder="E-Mail"></p>
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
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      placeholder="Period of Agreement"></p>
                        </aside>

                    </article>

                    <!-- Zeile 7 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      placeholder="Role"></p>
                        </aside>

                    </article>

                    <!-- Zeile 8 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      placeholder="Classification"></p>
                        </aside>

                    </article>

                    <!-- Zeile 9 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      placeholder="Agreement working hours"></p>
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
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      placeholder="Preferred Retail Store"></p>
                        </aside>

                    </article>

                    <!-- Zeile 11 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-12 col-sm-4 aside-left-add">

                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-12 col-sm-8 aside-right">
                            <p><input class="form-control to-right modal-input space-cap" type="text"
                                      placeholder="Adress of Retail Store"></p>
                        </aside>

                    </article>


                </form>


            </div>

            <!-- Modal footer-->
            <div class="modal-footer">
                <button type="submit" class="form-control to-right add-button" data-toggle="modal"
                        data-target="#add-button-emp" onclick="addemp()">Add
                </button>
            </div>
        </div>

    </div>
</div>

<!-- Button der Employee ändert Step 1-->
<div id="change-button-emp" class="modal fade" role="dialog">
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

                <?php
                include 'searchbar-employee.php';
                ?>



            </div>
            <!-- Modal footer-->
            <div class="modal-footer">
                <button class="form-control to-right modal-change-button"  data-toggle="modal"
                        data-target="#change-button-emp-2">Change
                </button>
            </div>

        </div>

    </div>
</div>

<!-- Button der Employee ändert Step 2-->
<div id="change-button-emp-2" class="modal fade" role="dialog">
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

<!-- Button der Employee löscht-->
<div id="delete-button-emp" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Delete Employee</h2>
                <br>

                <!-- Übersicht der Navigation die bei Vorschritt markiert weden -->

            </div>

            <!-- Modal body-->
            <!-- Basic-->
            <div class="modal-body">

                <?php
                include 'searchbar-employee.php';
                ?>


            </div>
            <!-- Modal footer-->
            <div class="modal-footer">
                <button class="form-control to-right delete-button" data-dismiss="modal" data-toggle="modal"
                        data-target="#delete-button-emp-2">Delete
                </button>
            </div>


        </div>

    </div>
</div>

<!-- Button der Employee löscht Step 2-->
<div id="delete-button-emp-2" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Delete Employee</h2>
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
                        <aside class="col-xs-4 aside-left-delete space-cap">
                            Employee ID
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete ">
                            <p class="inputmodal form-control"> 0005</p>
                        </aside>

                    </article>

                    <!-- Zeile 2 password Change button -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Password
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="inputmodal form-control"> *******</p>
                        </aside>

                    </article>


                    <!-- Zeile 3 -->
                    <!-- Zeile 5 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Surename
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="inputmodal form-control"> Schuster</p>
                        </aside>

                    </article>

                    <!-- Zeile 4 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Forename
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="inputmodal form-control"> Maria</p>
                        </aside>

                    </article>


                    <!-- Zeile 5 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            E-Mail
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="inputmodal form-control"> Maria.Schuster@html.de</p>
                        </aside>

                    </article>

                    <!-- Zeile 6 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Period of Agreement
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="inputmodal form-control">unlimited</p>
                        </aside>

                    </article>

                    <!-- Zeile 7  -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Role
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class=" inputmodal form-control"> Cashier</p>

                        </aside>

                    </article>

                    <!-- Zeile 8 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Classification
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="inputmodal form-control"> Fulltime</p>
                        </aside>

                    </article>

                    <!-- Zeile 9 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Working hours
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="inputmodal form-control">40</p>
                        </aside>


                    </article>

                    <!-- Zeile 10 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">

                            Company
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="inputmodal form-control"> HTWG</p>
                        </aside>

                    </article>

                    <!-- Zeile 11 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">
                            Preferred Store
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="inputmodal form-control"> Konstanz</p>
                        </aside>

                    </article>

                    <!-- Zeile 13 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-xs-4 aside-left-delete">

                            Store Adress
                        </aside>

                        <!-- rechts -->
                        <aside class="col-xs-8 aside-right-delete">
                            <p class="inputmodal form-control"> Brauneggerstraße 55, 78464 Konstanz</p>

                        </aside>
                    </article>


                </form>

            </div>
            <!-- Modal footer-->
            <div class="modal-footer">
                <button class="form-control to-right delete-button" data-dismiss="modal" data-toggle="modal"
                        data-target="#delete-button-emp-3">
                    Delete
                </button>
            </div>

        </div>


    </div>


</div>

<!-- Button der Employee löscht Step 3-->
<div id="delete-button-emp-3" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <!-- Basic-->
            <div class="modal-body">
                <div class="modal-header">

                    <!-- Close Button oben rechts im Header -->
                    <button type="button" class="close" data-dismiss="modal"
                    >&times;</button>

                    <!-- Überschrift -->
                    <h2 class="modal-ueberschrift">Delete Employee</h2>
                    <h5 class="select-ueberschrift">Do you really want to delete Maria Schuster </h5>
                    <br>


                </div>
                <!-- Modal footer-->
                <div class="modal-footer">
                    <button class="form-control to-right delete-button" data-toggle="modal"
                            data-target="#delete-button-emp-3"
                            onclick="deleteUser()">
                        Delete
                    </button>
                </div>


            </div>


        </div>

    </div>

</div>

