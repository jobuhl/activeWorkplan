<header>
    <ul class="left-list" id="id-left">
        <li class="nav-image">
            <a href="{{ url('/employee/workplan') . '/' . $week[0]->format('d-m-Y') }}">
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
        <li><a id="workplan" href="{{ url('/employee/workplan') . '/' . $week[0]->format('d-m-Y') }}">Workplan</a></li>
        <li><a id="planning" href="{{ url('/employee/planning') . '/' . $week[0]->format('d-m-Y') }}">Planning</a></li>
        <li><a id="account" href="{{ url('/employee/account') . '/' . $week[0]->format('d-m-Y') }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ url('/employee/logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('/employee/logout') }}" method="POST" style="display: none;"> {{ csrf_field() }}
            </form>
        </li>
    </ul>
</header>

<section class="space-under-header">
    <h2 class="modal-ueberschrift" style="display: none">fakeheading</h2>
</section>