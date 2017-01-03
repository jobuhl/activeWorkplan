<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Bootstrap / jQuery Imports -->
    <?php
    include '../php_version/php/general/links-general.php';
    ?>

    <title>Title</title>

    <script type="text/javascript">
        var sideBar = $("#sidebar");
        var navigation = $("#navigation");

        window.onload = function () {
            mobileSidebar();
        }
        window.onresize = function () {
            mobileSidebar();
        };

        function mobileSidebar() {
            if ($(window).width() >= 768) {
                $("#sidebar").appendChild($("#navigation");
            } else {
                $("#navigation").appendChild($("#sidebar");
            }
        }
    </script>

</head>
<body>

<section class="container">

    <article class="row">
        <!--<div class="row">
            <div class="col-xs-12 col-sm-6 col-md-8"  style="background-color: blue;">.col-xs-12 .col-sm-6 .col-md-8</div>
            <div class="col-xs-6 col-md-4"  style="background-color: red;">.col-xs-6 .col-md-4</div>
        </div>

        <br>

        <div class="row">
            <div class="col-xs-6 col-sm-4"  style="background-color: green;">.col-xs-6 .col-sm-4</div>
            <div class="col-xs-6 col-sm-4"  style="background-color: yellow;">.col-xs-6 .col-sm-4</div>
            <!-- Optional: clear the XS cols if their content doesn't match in height -->
        <!--<div class="clearfix visible-xs-block"  style="background-color: black;"></div>
        <div class="col-xs-6 col-sm-4"  style="background-color: purple;">.col-xs-6 .col-sm-4</div>
    </div>

    <br>
    Verschieben von Elementen
    <br>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-push-6" style="background-color: blue;">.col-md-9 .col-md-push-3</div>
        <div class="col-xs-12 col-sm-6 col-sm-pull-6" style="background-color: yellow;">.col-md-3 .col-md-pull-9</div>
    </div>

    Side-Bar--><!--
        <div class="row">
            <div id="navigation" class="col-xs-12 col-sm-12" style="background-color: yellow;">navigation</div>
            <div id="sidebar" class="col-xs-12 col-sm-3" style="background-color: blue;">side-bar</div>
            <div class="col-xs-12 col-sm-9" style="background-color: red;">Content</div>
        </div>
-->

        <ul>
            <li>
                <div id="navigation" class="col-xs-12" style="background-color: yellow;">navigation</div>
            </li>
            <li>
                <div id="sidebar" class="col-xs-12" style="background-color: blue;">side-bar</div>
            </li>
        </ul>
        <div class="col-xs-12" style="background-color: red;">Content</div>


    </article>

</section>

</body>
</html>