<header>
    <ul class="left-list" id="id-left">
        <li class="nav-image">
            <a href="/activeWorkplan/public/admin/employee-workplan">
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
        <li><a id="employee-workplan" href="/activeWorkplan/public/admin/employee-workplan">Workplan</a></li>
        <li><a id="employee-planning" href="/activeWorkplan/public/admin/employee-planning">Planning</a></li>
        <li><a id="employee-planning2" href="/activeWorkplan/public/admin/employee-planning2">Planning2</a></li>
        <li><a id="employee-account" href="/activeWorkplan/public/admin/employee-account">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ url('/employee/logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('/employee/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

        </li>
    </ul>
</header>

<section class="space-under-header">
    <h2 class="modal-ueberschrift" style="display: none">fakeheading</h2>
</section>