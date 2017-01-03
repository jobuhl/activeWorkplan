<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Page name -->
    <title>activeWorkplan/Workplan</title>
</head>

<body>

<!-- header -->
<?php
include 'header-employee.php';
?>

<section class="fake-body container">
    <h2 style="display: none">fakeheading</h2>

    <article class="col-xs-12 firstrow">
        <button type="button" class="form-control my-account-button to-right btn btn-default btn-sm" onclick="printing()">
            <span class="glyphicon glyphicon-print"></span> Print
        </button>

        <button type="button" class="form-control my-account-button to-right btn btn-default btn-sm" onclick="sendEmail()">
            <span class="glyphicon glyphicon-envelope"></span> E-Mail
        </button>
    </article>




    <!-- Calender -->
    <div id='calendar'></div>

    <div class="space"></div>

</section>


<!-- footer -->
<footer>
    <ul>
        <!--Link zu Dataprotection-->
        <li><a id="dataprotection" href="../general/dataprotection.php">Dataprotection</a>
        </li>
        <!--Link zu Impressum-->
        <li><a id="impressum" href="../general/impressum.php">Impressum</a></li>
        <!--Link zu Contact-->
        <li><a id="contact" href="../general/contact.php">Contact</a></li>
    </ul>
</footer>
<!--end footer-->

<!-- Bootstrap / jQuery Imports -->
<?php
include '../general/links-general.php';
?>

<!-- CSS -->
<!--<link rel='stylesheet' href='../../calendar/lib/cupertino/jquery-ui.min.css'/>-->
<link href='../../calendar/fullcalendar.css' rel='stylesheet'/>
<link href='../../calendar/fullcalendar.print.css' rel='stylesheet' media='print'/>
<link href='../../css/employee/planning-employee.css' rel='stylesheet'/>
<link href='../../css/global/side-bar.css' rel='stylesheet'/>
<link rel="stylesheet" type="text/css" href="../../css/global/header-footer.css"/>
<link rel="stylesheet" type="text/css" href="../../css/employee/workplan.css"/>

<!-- JavaScript -->
<script src='../../calendar/lib/moment.min.js'></script>
<script src='../../calendar/lib/jquery.min.js'></script>
<script src='../../calendar/lib/jquery-ui.min.js'></script>
<script src='../../calendar/fullcalendar.min.js'></script>
<script src='../../calendar/script.js'></script>
<script src="../../js/employee/workplan.js"></script>


<!-- Kopie, weil Calendar.js Dateien die Datei überschrieben haben -->
<script src="../../js/general/header-footer.js"></script>

</body>

</html>