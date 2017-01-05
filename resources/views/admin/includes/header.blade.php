<header>

    <ul class="left-list" id="id-left">
        <li class="nav-image">
            <a href="employer-overview">
                <img class="nav-logo" src="{{asset('img/imagelogo.gif')}}" alt="Logo">
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
        <li><a id="employer-overview" href="employer-overview">Overview</a></li>
        <li><a id="employer-planning" href="employer-planning/1">Planning</a></li>
        <li><a id="employer-account" href="employer-account"> {{ Auth::user()->name }}</a></li>
        <li><a href="{{ url('/admin/logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

        </li>

        </li>


    </ul>
</header>

<section class="space-under-header">
    <h2 class="modal-ueberschrift" style="display: none">fakeheading</h2>
</section>