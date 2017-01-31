<!-- +++++++++++++++ NAIGATION MOBIL ++++++++++++++++++++ -->
<div class="col-xs-12 navigation-today mobile-button button-hide">
    <div class="col-xs-4">
        <form method="GET" action="{{ substr( url()->current(), 0, strlen(url()->current())-11 ) . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
            <button class="set-size float-right" type="submit">&lt;</button>
        </form>
    </div>

    <div class="col-xs-4">
        <form method="GET" action="{{ substr( url()->current(), 0, strlen(url()->current())-11 ) . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
            <button class="set-size" type="submit">Today</button>
        </form>
    </div>

    <div class="col-xs-4">
        <form method="GET" action="{{ substr( url()->current(), 0, strlen(url()->current())-11 ) . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
            <button class="set-size float-right" type="submit">&gt;</button>
        </form>
    </div>
</div>

<!-- +++++++++++++++ NAIGATION DESKTOP ++++++++++++++++++++ -->
<nav class="col-xs-12 calendar-navigation button-show">
    <div class="col-xs-6 navigation-today">
        <form method="GET" action="{{ substr( url()->current(), 0, strlen(url()->current())-11 ) . '/' . ((clone $week[0])->modify('-7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
            <button type="submit">&lt;</button>
        </form>

        <form method="GET" action="{{ substr( url()->current(), 0, strlen(url()->current())-11 ) . '/' . (new DateTime())->format('d-m-Y') }}"> {{ csrf_field() }}
            <button type="submit">Today</button>
        </form>

        <form method="GET" action="{{ substr( url()->current(), 0, strlen(url()->current())-11 ) . '/' . ((clone $week[0])->modify('+7 days'))->format('d-m-Y') }}"> {{ csrf_field() }}
            <button type="submit">&gt;</button>
        </form>
    </div>

    <!-- Datum der Woche -->
    <div class="col-xs-6 calendar-navigation-p">
        <p>
            {{ $week[0]->format('d. - ') }}
            {{ $week[6]->format('d. M. Y') }}
        </p>
    </div>
</nav>