<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Page name -->
    <title>activeWorkplan/Account</title>

</head>

<body>

<!-- header -->
<?php
include 'header-employer.php';
?>

<section class="fake-body">
    <h2 style="display: none">fakeheading</h2>
    <section class="container">
        <h2 style="display: none">fakeheading</h2>
        <article class="row -col-12">
            <h2 class="modal-ueberschrift">Admin Details</h2>

            <button class="form-control to-right yellow my-account-button" type="submit" data-toggle="modal" data-target="#change-button">
                Change
            </button>

            <table class="table-account">
                <tr>
                    <td>Admin ID</td>
                    <td>987652</td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>********</td>
                </tr>

                <tr class="table-space">
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Surname</td>
                    <td>Administrator</td>
                </tr>
                <tr>
                    <td>Forename</td>
                    <td>Admin</td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td>admin.administrator@html.de</td>
                </tr>

                <tr class="table-space">
                    <td></td>
                    <td></td>
                </tr>

                <tr class="table-space-above">
                    <td>Company name</td>
                    <td>HTWG</td>
                </tr>
                <tr>
                    <td>Headquarter Address</td>
                    <td>Brauneggerstraße 55, 78462 Konstanz</td>
                </tr>
            </table>

            <button class="form-control to-right red my-account-button" data-toggle="modal" data-target="#delete-button-admin">Delete
            </button>


        </article>

    </section>
</section>

<!-- Change button Pop-Up -->
<div id="change-button" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change Details</h2>
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
                        <aside class="col-sm-4 col-xs-3  aside-left special-case-left">
                             Admin ID
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-9  aside-right special-case-right">
                            <p class="inputmodal form-control  modal-input space-cap">
                                835372</p>
                        </aside>

                    </article>

                    <!-- Zeile 2 password Change button -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-line">
                            Password
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <button type="button" class="form-control  modal-change-button space-line yellow" data-dismiss="modal"
                                    data-toggle="modal"
                                    data-target="#change-password">Change Password
                            </button>
                        </aside>

                    </article>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>

                    <!-- Zeile 3 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap">
                             Surname
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <input class="inputmodal form-control  modal-input space-cap" type="text"
                                      placeholder="Employee Lastname">
                        </aside>

                    </article>

                    <!-- Zeile 4 -->
                    <article class="row modal-person">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-inner">
                             Forename
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <input class="inputmodal form-control  modal-input space-cap-inner" type="text"
                                      placeholder="Employee Firstname">
                        </aside>

                    </article>

                    <!-- Zeile 5 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-bottom">
                             E-Mail
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <input class="inputmodal form-control  modal-input space-cap-bottom" type="text"
                                      placeholder="admin.administrator@email.com">
                        </aside>

                    </article>

                    <div class="placeholder-mobil col-xs-12">
                        <hr class="hr-line">
                    </div>


                    <!-- Zeile 6 -->
                    <article class="row ">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap">
                             Company
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <input class="inputmodal form-control  modal-input space-cap" type="text" placeholder="HTWG">
                        </aside>

                    </article>

                    <!-- Zeile 7 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-inner">
                             Street
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <input class="inputmodal form-control  modal-input space-cap-inner" type="text"
                                      placeholder="Brauneggerstr.">
                        </aside>

                    </article>

                    <!-- Zeile 8 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-inner">
                             Street Nr,
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <input class="inputmodal form-control  modal-input space-cap-inner" type="text" placeholder="55">
                        </aside>

                    </article>

                    <!-- Zeile 9 -->
                    <article class="row">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-inner">
                             Postcode
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <input class="inputmodal form-control  modal-input space-cap-inner" type="text" placeholder="78462">
                        </aside>

                    </article>

                    <!-- Zeile 10 -->
                    <article class="row ">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left space-cap-inner">
                             City
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <input class=" inputmodal form-control  modal-input space-cap-inner" type="text" placeholder="Konstanz">
                        </aside>

                    </article>

                    <!-- Zeile 11 -->
                    <article class="row space-cap-bottom">
                        <h2 style="display: none">fakeheading</h2>

                        <!-- links -->
                        <aside class="col-sm-4 col-xs-12  aside-left">
                             Country
                        </aside>

                        <!-- rechts -->
                        <aside class="col-sm-8 col-xs-12  aside-right">
                            <input class="inputmodal form-control  modal-input space-cap-bottom" type="text" placeholder="Deutschland">
                            
                        </aside>

                    </article>
                </form>


            </div>

            <!-- Modal footer-->
            <div class="modal-footer">
                <div class="col-xs-12">

                    <button type="submit" class="form-control  modal-change-button yellow" data-dismiss="modal"
                            data-toggle="modal" onclick="modalChange()">Change
                    </button>


                </div>
            </div>
        </div>

    </div>
</div>

<!-- changebutton für das Password-Pop-Up im Pop-Up -->
<div id="change-password" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Change Password</h2>
            </div>

            <!-- Body-->
            <div class="modal-body">

                   <input class="inputmodal form-control space-cap-inner" type="password"
                              placeholder="Old password">

                   <input class="inputmodal form-control space-cap-inner " type="password"
                       placeholder="New password">

                   <input class="inputmodal form-control space-cap-inner " type="password"
                       placeholder="Confirm new password">


            </div>

            <!-- Modal footer-->
            <div class="modal-footer">
                <button type="button" class="form-control  modal-change-button space-line yellow" data-dismiss="modal"
                        data-toggle="modal"
                        data-target="#change-password">Change Password
                </button>
            </div>
        </div>
    </div>

</div>

<!-- Button der den Account löscht-->
<div id="delete-button-admin" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <!-- Close Button oben rechts im Header -->
                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>

                <!-- Überschrift -->
                <h2 class="modal-ueberschrift">Delete Account</h2>
            </div>

            <!-- Body-->
            <div class="modal-body">
                Do you really want to delete all accounts of your company? 
            </div>

            <!-- Modal footer-->
            <div class="modal-footer">
                <button class="form-control  red modal-bottom" data-toggle="modal" data-target="#delete-button-admin"
                        onclick="deleteAdmin()">
                    Delete
                </button>
            </div>
        </div>
    </div>

</div>

<!-- footer -->
<?php
include '../employer/footer-employer.php';
?>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="../../css/global/table-account.css">


</body>

</html>