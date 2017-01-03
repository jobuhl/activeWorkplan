<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Page name -->
    <title>activeWorkplan/Home</title>
</head>

<body>

<!-- header -->
<?php
include 'header-general.php';
?>


<!-- Body -->
<section class="backgroundheadindex">
    <h2 style="display: none">fakeheading</h2>

    <aside class="col-xs-12 col-sm-6 index-image-aside my-hidden-small">
        <img class="my-center index-image-logo" src="../../img/imagelogo.gif" alt="Bild">
    </aside>


    <aside class="col-xs-12 col-sm-6 index-image-aside">
        <form class="my-center">
            <h4 class="my-horizontal-center">Sign up</h4>
            <p> <input class="form-control to-right modal-input" id="email" type="email" placeholder="Email"></p>
            <p> <input class="form-control to-right modal-input" id ="password1" type="text" placeholder="Password" ></p>
            <p> <input class="form-control to-right modal-input" id ="password2" type="password" placeholder=" Confirm Password" ></p>

            <button  class=" form-control add-button" type="button" data-toggle="modal" data-target="#signupbutton" onclick="signupPicture()">Sign up</button>
        </form>
    </aside>
</section>


<!-- section2 -->
<section> <!-- class="container" wegen grauen boxen abstand entfernt -->
    <h2 style="display: none">fakeheading</h2>

    <!-- Reihe 1 -->
    <article class="row">
        <h2 style="display: none">fakeheading</h2>

        <!-- wenn middle breite: Quasi abstand links -->
        <aside class="col-md-2"></aside>

        <aside class="col-xs-12 col-md-8">
            <br>
            <p>
                Haben Sie als Arbeitgeber keine Lust mehr stundenlang am Einsatzplan zu feilen, nur um ihn zig mal
                umwerfen
                zu
                müssen? Weil immer wieder ein Mitarbeiter mit einem neuen Termin ankommt, der berücksichtigt werden
                soll?
                Überlassen Sie die Arbeit doch Ihren Mitarbeitern!
                Sie übernehmen die Rolle des Administrators und greifen nur bei Bedarf ein.
                Wie das geht?
            </p>
            <p>
                activeWorkplan macht´s möglich:
                Arbeiten kann Spaß machen
            </p>
        </aside>

        <!-- wenn middle breite: Quasi abstand rechts -->
        <aside class="col-md-2"></aside>
    </article>

    <!-- Reihe 2 -->
    <article class="row grey">
        <h2 style="display: none">fakeheading</h2>

        <!-- rechts / oben; push damit colum nach oben geht -->
        <aside class="col-sm-6 col-sm-push-6">
            <h4>Einsatzplangestaltung mal anders</h4>
            <p>Bei activeWorkplan liegt das Arbeitszeitmanagement nicht nur bei dem Arbeitgeber. Wir bieten für jeden
                Angestellten eine leichte, intuitive und ansprechende Möglichkeit sich aktiv am Arbeitsplan zu
                beteiligen.
            </p>
            <p>Kalender</p>
            <a href="features.php">Get more information</a>
        </aside>

        <!-- links / unten; Pull damit colum nach oben geht-->
        <aside class="col-sm-6 col-sm-pull-6">
            <img class="bodyimage" src="../../img/workplan.png" alt="Bild">
        </aside>
    </article>

    <!-- Reihe 3 -->
    <article class="row">
        <h2 style="display: none">fakeheading</h2>
        <!--  Links -->
        <aside class="col-sm-6">
            <h4>Vergangenheit, Gegenwart und Zukunft</h4>
            <p>Arbeitszeiten und Termine auf Schmierzettel aufschreiben, die man sowieso verliert? Nicht mit
                activeWorkplan. Wir bieten einen elektronischen Kalender, der sämtliche eingetragenen Arbeitszeiten
                speichert. Diese sind bis zu einem Jahr rückwirkend einsehbar. Zudem können Sie sich den wöchentlichen
                Arbeitsplan einfach per E-Mail zuschicken und/oder ausdrucken.
            </p>
            <p>Kalender, Wochenansicht, Monatsansicht, Vor und zurück navigieren, zum heutigen Tag springen, Arbeitsplan
                ausdrucken, Arbeitsplan per Email</p>
            <a href="features.php">Get more information</a>
        </aside>

        <!-- rechts -->
        <aside class="col-sm-6">
            <img class="bodyimage" src="../../img/month.png" alt="Bild">
        </aside>
    </article>

    <!-- Reihe 4 -->
    <article class="row grey">
        <h2 style="display: none">fakeheading</h2>
        <aside class="col-sm-6 col-sm-push-6">
            <h4>Selbsteinteilung der Arbeitszeit</h4>
            <p>Wegen jedem privaten Termin dem Chef hinterherrennen gehört der Vergangenheit an. Einfach selbst die
                gewünschten Arbeitszeiten oder Fehlzeiten in Ihrem Terminplan rechtzeitig eintragen und schon sind sie
                ihrem organisierten Alltag einen Schritt näher.
            </p>
            <p>Arbeitsvorschläge eintragen, Urlaub beantragen, Krankmeldung, Seminare, Schulung, private Termine,
                Studium (Arbeitgeber kann weitere Event-Typen hinzufügen)</p>
            <a href="features.php">Get more information</a>
        </aside>

        <aside class="col-sm-6 col-sm-pull-6">
            <img class="bodyimage" src="../../img/planning.png" alt="Bild">
        </aside>
    </article>

    <!-- Reihe 5 -->
    <article class="row">
        <h2 style="display: none">fakeheading</h2>
        <!--  Links -->
        <aside class="col-sm-6">
            <h4>Flexibel und Transparent</h4>
            <p>Vorbei sind die Zeiten in denen man in einem starren Planungssystem ohne Mitspracherecht sein
                Arbeitsleben fristet. Durch aktive Teilnahme des gesamten Teams am Planungsprozess, verteilt sich die
                Erstellung des Einsatzplanes auf alle Mitarbeiter. Das gesamte Team arbeitet zusammen an einem für alle
                fairen und optimalen Arbeitsplan.
            </p>
            <p>auf oberen verlinken Selbsteinteilung de Arbeitszeit</p>
            <a href="features.php">Get more information</a>
        </aside>

        <!-- rechts -->
        <aside class="col-sm-6">
            <img class="bodyimage" src="../../img/week.png" alt="Bild">
        </aside>
    </article>

    <!-- Reihe 6 -->
    <article class="row grey">
        <h2 style="display: none">fakeheading</h2>
        <aside class="col-sm-6 col-sm-push-6">
            <h4>Mobil oder Desktop</h4>
            <p>Sie haben keinen PC oder Laptop zu Hause? Kein Problem, denn activeWorkplan lässt sich auch von Ihrem
                Smartphone oder Tablet bedienen. Wo immer sie sind und genau dann, wenn Sie es brauchen.
            </p>
            <p>Optimierte Darstellung für Smartphone, Tablet und PC</p>
            <a href="features.php">Get more information</a>
        </aside>

        <aside class="col-sm-6 col-sm-pull-6">
            <img class="bodyimage" src="../../img/mobil.png" alt="Bild">
        </aside>
    </article>

    <!-- Reihe 7 -->
    <article class="row">
        <h2 style="display: none">fakeheading</h2>
        <!--  Links -->
        <aside class="col-sm-6">
            <h4>Überstunden? Nein, Danke!
            </h4>
            <p>Wer kennt das nicht? Zwei Kollegen im Urlaub, die Grippe setzt zwei andere außer Gefecht und Sie müssen
                mal wieder dran glauben und einspringen? activeWorkplan meldet Ihnen, falls Ihre vertraglich
                vereinbarten Wochenstunden erreicht sind.
            </p>
            <a href="features.php">Get more information</a>
        </aside>

        <!-- rechts -->
        <aside class="col-sm-6">
            <img class="bodyimage" src="../../img/seminar.png" alt="Bild">
        </aside>
    </article>

    <!-- Reihe 8 -->
    <article class="row grey">
        <h2 style="display: none">fakeheading</h2>
        <!-- links -->
        <aside class="col-sm-6 col-sm-push-6">
            <h4>Registrierung leicht gemacht!
            </h4>
            <p>Bei aktiveWorkplan genügt es, wenn sich der Planer registriert. Danach ist es für diesen durch einfache
                und intuitive Bedienung möglich, beliebig viele Mitarbeiter und Filialen zu registieren, ohne
                dass diese einen Finger rühren müssen.
            </p>
            <a href="features.php">Get more information</a>
        </aside>

        <!--  rechts -->
        <aside class="col-sm-6 col-sm-pull-6">
            <img class="bodyimage" src="../../img/sign-up.png" alt="Bild">
        </aside>
    </article>

    <!-- Reihe 9 -->
    <article class="row">
        <h2 style="display: none">fakeheading</h2>

        <!-- wenn middle breite: Quasi abstand links -->
        <aside class="col-md-2"></aside>

        <aside class="col-xs-12 col-md-8">
            <h4 class="my-horizontal-center">Haben wir Sie überzeugt?
            </h4>
            <p class="my-horizontal-center"> Dann legen Sie los und sparen eine Menge Zeit und Nerven! Jetzt kostenlos
                registrieren. Schnell Angaben
                zum Unternehmen ausfüllen, Mitarbeiter und Geschäftsstellen hinzufügen und los geht's. Voller
                Funktionsumfang und alles ohne Zahlungsangaben.
            </p>

            <aside class="col-xs-4"></aside>
            <aside class="col-xs-4 "><button class="form-control to-right add-button" type="button" data-toggle="modal" data-target="#signupbutton" onclick="nextStep(1)">Kostenlos registrieren</button></aside>
            <aside class="col-xs-4"></aside>

        </aside>

        <!-- wenn middle breite: Quasi abstand rechts -->
        <aside class="col-md-2"></aside>
    </article>
</section>







<!-- footer -->
<?php
include 'footer-general.php';
?>


<!-- CSS -->
<link rel="stylesheet" type="text/css" href="../../css/general/index.css">

</body>

</html>