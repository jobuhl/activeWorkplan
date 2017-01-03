<!DOCTYPE html>
<html lang="en">
<head>

    <title>activeWorkplan/Planning</title>

</head>

<body>

<!-- header -->
<?php
include 'header-employee.php';
?>

<section class="fake-body container">
    <h2 style="display: none">fakeheading</h2>
    <section class="fake-body">
        <h2 style="display: none">fakeheading</h2>

    </section>

    <br>

    <!-- Navigation auf der Linken Seite beinhaltet die Aktivitäten -->
    <aside class="col-xs-12 col-sm-3 side-bar" id="external-events">
        <ul>
            <li><p>Add Events</p></li>
            <li><a class="fc-event">Work</a></li>
            <li><a class="fc-event">Vacation</a></li>
            <li><a class="fc-event">Illness</a></li>
            <li><a class="fc-event">Study</a></li>
            <li><a class="fc-event">Training</a></li>
            <li><a class="fc-event">Seminar</a></li>
            <li><a class="fc-event">Private</a></li>
        </ul>
        <br>
    </aside>


    <aside class="col-xs-12 col-sm-9 my-right-side " id="calendar">
    </aside>

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
<link rel="stylesheet" type="text/css" href="../../css/global/header-footer.css">

<!-- JavaScript -->
<script src='../../calendar/lib/moment.min.js'></script>
<script src='../../calendar/lib/jquery.min.js'></script>
<script src='../../calendar/lib/jquery-ui.min.js'></script>
<script src='../../calendar/fullcalendar.min.js'></script>
<script src='../../calendar/script.js'></script>

<!-- Kopie, weil Calendar.js Dateien die Datei überschrieben haben -->
<script src="../../js/general/header-footer.js"></script>



</body>

</html>