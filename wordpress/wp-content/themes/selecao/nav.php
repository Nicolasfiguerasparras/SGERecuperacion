<nav id="navbar" class="navbar">
    <ul>
        <li><a class="nav-link scrollto active" href="<?php echo get_option('Home'); ?>">Home</a></li>
        <li><a class="nav-link scrollto" href="<?php echo get_page_link( get_page_by_title('Archives')->ID ); ?>">Archives</a></li>
        <li><a class="nav-link scrollto" href="<?php echo get_page_link( get_page_by_title('Events')->ID ); ?>">Events</a></li>
        <li><a class="nav-link scrollto" href="<?php echo get_page_link( get_page_by_title('News')->ID ); ?>">News</a></li>
        <!-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
        <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
        <li><a class="nav-link scrollto" href="#team">Team</a></li>
        <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
            </ul>
        </li> -->
        <li><a class="nav-link scrollto" href="<?php echo get_page_link( get_page_by_title('Contact')->ID ); ?>">Contact</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->