<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS , Extra am Anfang, weil sonst Bild zu gross und Footer nicht am Boden -->
    <link rel="stylesheet" type="text/css" href="../../css/global/general.css">
    <link rel="stylesheet" type="text/css" href="../../css/general/contact.css">

    <!-- Page name -->
    <title>activeWorkplan/Contact</title>

</head>

<body>

<!-- header -->
<?php
include 'header-general.php';
?>

<!--  Body -->
<section class="fake-body contact">
    <h2 style="display: none">fakeheading</h2>

    <!-- oben -->
    <section class="col-xs-12 mainsection">
        <h2 style="display: none">fakeheading</h2>
        <article>
            <h2 style="display: none">fakeheading</h2>
            <aside>
                <img src="../../img/contact.gif" alt="Bild">
            </aside>
            <aside>
                <h2>Contact</h2>
            </aside>
        </article>
    </section>

    <section class="container">
        <h2 style="display: none">fakeheading</h2>

        <article class="col-xs-12 subheader">
            <h3>Send us an email or just say Hello!</h3>
        </article>

        <!--  links -->
        <aside class="col-sm-3 col-xs-12 getheightleft">
            <form>
                <p>
                    <select class="form-control">
                        <option value="" disabled selected>Title....</option>
                        <option>Mr</option>
                        <option>Miss</option>
                        <option>Misses</option>
                    </select>
                </p>
                <p><input class=" form-control" type="text" placeholder="Name...."></p>
                <p><input class=" form-control" type="text" placeholder="E-Mail...."></p>
                <p><input class=" form-control" type="text" placeholder="Subject....">
                </p>
                <p><input class="filestyle form-control" type="file"></p>
            </form>
        </aside>

        <!-- rechts -->
        <aside class=" test col-sm-9 col-xs-12 setheightright">
            <textarea class="form-control sendtextfeld" type="text" placeholder="Message...." ></textarea>
            <p></p>
            <button class="form-control buttonbottom" type="submit">Send</button>
        </aside>

    </section>

</section>




<!-- footer -->
<?php
include 'footer-general.php';
?>

<!-- JavaScript -->
<script src="../../js/general/contact.js"></script>

</body>

</html>