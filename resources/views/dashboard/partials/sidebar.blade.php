<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <div class="profile">
            <img src="{{asset('dashboard/assets/img/me.jpg')}}" alt="Profile" class="profile_pic">
            <br>
            <br>
            <h7>Name: <b>Taufiqur Sabbir</b></h7>
            <h7>Phone:<b>01792945445</b></h7>
            <br>
            <br>
        </div>

        <li class="nav-item">
            <a class="nav-link @yield('collapsed1')" href="@yield('link1')">
                <i class="@yield('icon1')"></i>
                <span>@yield('sidebar_name1')</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('collapsed2')" href="@yield('link2')">
                <i class="@yield('icon2')"></i>
                <span>@yield('sidebar_name2')</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('collapsed3')" href="@yield('link3')">
                <i class="@yield('icon3')"></i>
                <span>@yield('sidebar_name3')</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('collapsed4')" href="@yield('link4')">
                <i class="@yield('icon4')"></i>
                <span>@yield('sidebar_name4')</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('collapsed5')" href="@yield('link5')">
                <i class="@yield('icon5')"></i>
                <span>@yield('sidebar_name5')</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('collapsed6')" href="@yield('link6')">
                <i class="@yield('icon6')"></i>
                <span>@yield('sidebar_name6')</span>
            </a>
        </li><!-- End Login Page Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('collapsed7')" href="@yield('link7')">
                <i class="@yield('icon7')"></i>
                <span>@yield('sidebar_name7')</span>
            </a>
        </li><!-- End Error 404 Page Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('collapsed8')" href="@yield('link8')">
                <i class="@yield('icon8')"></i>
                <span>@yield('sidebar_name8')</span>
            </a>
        </li><!-- End Blank Page Nav -->


        <li class="nav-item">
            <a class="nav-link @yield('collapsed9')" href="@yield('link9')">
                <i class="@yield('icon9')"></i>
                <span>@yield('sidebar_name9')</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('collapsed10')" href="@yield('link10')">
                <i class="@yield('icon10')"></i>
                <span>@yield('sidebar_name10')</span>
            </a>
        </li><!-- End Blank Page Nav -->

        <li class="nav-item">
            <a class="nav-link @yield('collapsed11')" href="@yield('link11')">
                <i class="@yield('icon11')"></i>
                <span>@yield('sidebar_name11')</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
