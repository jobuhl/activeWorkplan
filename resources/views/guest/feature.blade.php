@extends('guest.layout.general-start')

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
                <p>Mit activeWorkplan sind die Zeiten vorbei wo Stift und Papier benötigt wird um das
                    Arbeitszeitmanagement zu
                    bewältigen. Durch einfache und intuitive Anwendung ist es den Angestellten und dem Arbeitgeber
                    möglich ausgewählte Events
                    dem wochenweise dargestellten Kalender hinzuzufügen und somit ein gegenseitigen Austausch von
                    Wunschterminen, Urlaubsplanung und
                    Krankheitstagen zu ermöglichen.
                </p>
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

                <p>activeWorkplan verteilt die Verantwortung der Einsatzplangestaltung auf alle beteiligten Schultern
                    die daraus entstehende Flexibilität kommt dem Arbeitgeber aber vor allem auch dem Arbeitnehmer
                    entgegen.
                    Vorbei sind die Zeiten wo man ständig dem Arbeitsplaner wegen wichtigen Terminen erst bescheid geben
                    muss.
                    Termine eintragen und auf die Bestätigigung der Arbeitszeiten durch den Planer warten, die der
                    Arbeitnehmer über Workplan einsehen kann.
                </p>
            </article>
            <br>

            <!-- dritte Zeile -->
            <article class="row">
                <h5>Kalender</h5>
                <h3>Vergangenheit, Gegenwart und Zukunft</h3>
                <p>active Workplan liefert ihnen von Haus aus eine Kontrolle ihrer vergangenen, gegenwärtigen sowie
                    Zukünftigen Arbeitszeiten, Urlaube sowie
                    Krankheitstage, da diese langfristig gespeichert bleiben.

                </p>

                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <img src="{{asset('img/features/change_event.png')}}" alt="Bild">
                </div>

            </article>
            <br>


            <!-- vierte Zeile -->
            <article class="row grey">
                <h3>Arbeitsvorschläge eintragen</h3>
                <p>
                    Arbeitnehmer reichen Arbeitsvorschläge ein, der Planer sieht jeden Vorschlag in einer gesonderten
                    View
                    und kann diese Vorschläge akzeptieren und somit in den terminierten Arbeitsplan direkt übertagen.
                    Jeder akzeptierte
                    Event wird den jeweiligen Angestellten angezeigt und erhält somit umgehend ein Feedback über seine
                    gewünschten Arbeitszeiten.


                </p>
                <img src="{{asset('img/index/store_grey.png')}}" alt="Bild">
            </article>
            <br>


            <!-- fünfte Zeile -->
            <article class="row">
                <h2 style="display: none">fakeheading</h2>
                <h3>Krankmeldung einreichen</h3>
                <p>Nicht nur die Arbeitszeiten sind ein wichtiger Teil der Planung, auch Krankheitsfälle müssen
                    berücksichtigen
                    werden. Bei activeWorkplan ist es möglich, dass Arbeitnehmer Krankmeldungen einreichen die widerum
                    vom Einsatzplaner
                    bestätigt werden müssen. Somit ist beiden Parteien umgehend bekannt wie lange ein Ausfall gehen wird
                    ohne eine
                    unübersichtliche Zettelwirtschaft führen zu müssen.


                </p>
            </article>
            <br>

            <!-- sechste Zeile -->
            <article class="row grey">
                <h3>Seminare, Schulung, Studium</h3>
                <p> Nicht nur Krankheits- und Urlaubstage sorgen dafür das ein Angestellter nicht bei der Arbeit
                    erscheinen kann,
                    auch berufliche Seminare sowie Schulungen können dafür sorgen das man an bestimmten Tagen nicht
                    anwesend ist. Mit activeWorkplan
                    lässt sich dies durch einfach zu erstellende Events frühzeitig Eintragen um somit den Planer zu
                    entlasten.
                </p>
                <img src="{{asset('img/features/employee_proposals.png')}}" alt="Bild">
            </article>
            <br>

            <!-- siebte Zeile -->
            <article class="row">
                <h5>Flexibel und Transparent</h5>
                <h3>Retail Stores und Mitarbeiter hinzufügen</h3>
                <aside class="col-xs-12 col-sm-6">
                    <p>
                        Bereits bei der Step-by-Step Registrierung eines Unternehmer-Accounts werden Sie aufgefordert einen ersten Retail Store anzulegen.
                        Da das Ziel dieser Applikation die Konzentration auf den wesentlichen Content ist,
                        wird der Fokus vor allem die verschiedenen dynamisch - und in Echtzeit - erstellten Events gelegt.
                        Zu Beginn müssen daher zu allererst die zum Unternehmen gehörenden Stores, sowie die Mitarbeiter der Applikation hinzugefügt werden.
                        Jeder Retail Store bekommt einen Namen zugewiesen und eine Addresse, die vorallem für die Mitarbeiter wichtig sein wird.
                        Diese sehen die zu ihrem Store gehörende Addresse.
                    </p>

                    <img src="{{asset('img/features/add_store.png')}}" alt="Bild">
                </aside>
                <aside class="col-xs-12 col-sm-6">

                    <img src="{{asset('img/features/add_employee.png')}}" alt="Bild">
                    <p>
                        Mitarbeiter bekommen neben den benötogten Grundinformationen und einer eindeutig identifizierbaren Email auch einen Store zugewiesen,
                        und haben bestimmte Vertragsdetails. Diese beinhalten zum Beispiel, ob der Vertrag befristet ist, eine Rolle, sowie die Beschäftigungsart.
                        Studenten bekommen selbstverständlich andere Verträge als Vollzeitangestellte und arbeiten dementsprechend auch weniger.
                        Alle Details können natürlich nach Belieben zu jeder Zeit verändert werden.
                    </p>
                </aside>
            </article>
            <br>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/general/features.js')}}"></script>
@endsection