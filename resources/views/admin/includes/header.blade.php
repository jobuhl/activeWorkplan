<header>

    <ul class="left-list" id="id-left">
        <li class="nav-image">
            <a href="{{ url('/admin/overview') . '/' . $week[0]->format('d-m-Y') }}">
                <img class="nav-logo" src="{{asset('/img/logo.gif')}}" alt="Logo">
            </a>
        </li>
        <li class="nav-placeholder">
            <a id="nav-placeholder-text">Home</a>
        </li>
        <li class="nav-toggle">
            <a href="javascript:void(0);" onclick="toggleMakeResponsive()">&#9776;</a>
        </li>
    </ul>
    <ul class="right-list" id="id-right">
        <li><a id="overview" href="{{ url('/admin/overview') . '/' . $week[0]->format('d-m-Y') }}">Overview</a>
        </li>

        @if ($amountOfRetailStores == 0)
            <li><a id="planning" href=" {{ url('/admin/planning') . '/0/' . $week[0]->format('d-m-Y') }}">Planning</a>
            </li>
        @else
            <li><a id="planning" href=" {{ url('/admin/planning') . '/' . $allRetailStores[0]->id . '/' . $week[0]->format('d-m-Y') }}">Planning</a>
            </li>
        @endif
        <li><a id="account" href="{{ url('/admin/account') . '/' . $week[0]->format('d-m-Y') }}"> {{ Auth::user()->name }}</a>
        </li>
        <li><a href="{{ url('/admin/logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

        </li>

    </ul>
</header>

<section class="space-under-header">
    <h2 class="modal-ueberschrift" style="display: none">fakeheading</h2>
</section>