@extends('general.layout.general-start')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/global/general.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/general/features.css')}}">
@endsection

@section('content')

    <!--Body-->
    <div class="fakebody">


        <!-- oben -->
        <div class="col-xs-12 mainsection">
            <div class="main-article">
                <aside>
                    <img src="{{asset('img/features.gif')}}" alt="Bild">
                </aside>
                <aside class="display-none-heading">
                    <h2>Features</h2>
                </aside>
            </div>
        </div>

        <!-- Main Content -->
        <div class="features">

            <!-- erste Zeile -->
            <article class="row">
                <h5>Interaktion</h5>
                <h3>Einsatzplan-Gestaltung mal anders</h3>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                    Stet clita kasd
                    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                    consetetur sadipscing
                    elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                    voluptua. At vero
                    eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus
                    est Lorem ipsum
                    dolor sit amet.</p>
                <img src="{{asset('img/features/full_week.png')}}" alt="Bild">
            </article>
            <br>

            <!-- zweite Zeile -->
            <article class="row grey">
                <h5>Verantwortung</h5>
                <h3>Selbsteinteilung der Arbeitszeit</h3>

                <div class="col-sm-6 col-xs-12" style="margin: 0; padding: 0;">
                    <img style="margin: 0; padding: 0;" src="{{asset('img/features/events2.png')}}" alt="Bild">
                </div>

                <div class="col-sm-6 col-xs-12" style="margin: 0; padding: 3px 0 20px 0;">
                    <img style="margin: 0; padding: 0;" src="{{asset('img/features/events1.png')}}" alt="Bild">
                </div>

                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                    invidunt
                    ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                    rebum.
                    Stet clita kasd
                    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </article>
            <br>

            <!-- dritte Zeile -->
            <article class="row">
                <h5>Kalender</h5>
                <h3>Vergangenheit, Gegenwart und Zukunft</h3>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                    Stet clita kasd
                    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                    consetetur sadipscing
                    elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                    voluptua. At vero
                    eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus
                    est Lorem ipsum
                    dolor sit amet.</p>

                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <img src="{{asset('img/features/change_event.png')}}" alt="Bild">
                </div>

            </article>
            <br>


            <!-- vierte Zeile -->
            <article class="row grey">
                <h3>Arbeitsvorschläge eintragen</h3>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                    Stet clita kasd
                    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                <img src="{{asset('img/index/store_grey.png')}}" alt="Bild">
            </article>
            <br>


            <!-- fünfte Zeile -->
            <article class="row">
                <h2 style="display: none">fakeheading</h2>
                <h3>Krankmeldung einreichen</h3>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                    ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                    Stet clita kasd
                    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
            </article>
            <br>

            <!-- sechste Zeile -->
            <article class="row grey">
                <h3>Seminare, Schulung, Studium</h3>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                    Stet clita kasd
                    gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                <img src="{{asset('img/features/employee_proposals.png')}}" alt="Bild">
            </article>
            <br>

            <!-- siebte Zeile -->
            <article class="row">
                <h5>Flexibel und Transparent</h5>
                <aside class="col-xs-12 col-sm-6">
                    <h3>private </h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut
                        labore et dolore
                        magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                        Stet clita kasd
                        gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </aside>
                <aside class="col-xs-12 col-sm-6">
                    <h3>Wie arbeitet die Belegschaft? </h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut
                        labore et dolore
                        magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                        Stet clita kasd
                        gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </aside>
            </article>
            <br>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/general/features.js')}}"></script>
@endsection