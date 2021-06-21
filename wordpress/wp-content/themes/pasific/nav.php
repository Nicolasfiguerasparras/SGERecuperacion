<nav class="navbar navbar-pasific navbar-op navbar-sticky bb-solid-1">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand page-scroll" href="<?php echo get_home_url(); ?>">
            <img src="https://network.neosignal.de/neosignal/wp-content/uploads/sites/2/2018/06/neo_icon.png" style="width: 40px; margin-top: -10px" alt="logo">
            Neosignal
        </a>
    </div>

    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
            <li class="hidden"><a href="#page-top"></a></li>
            <li><a href="<?php echo get_home_url(); ?>">Home</a></li>
            <li><a href="<?php echo get_page_link( get_page_by_title('Blog')->ID ); ?>">Blog</a></li>
            <li><a href="<?php echo get_page_link( get_page_by_title('Archives')->ID ); ?>">Archives</a></li>
            <li><a href="<?php echo get_page_link( get_page_by_title('Events')->ID ); ?>">Events</a></li>
            <!-- <li><a href="<?php echo get_page_link( get_page_by_title('Contact')->ID ); ?>">Contact</a></li> -->
        </ul>
    </div>
</nav>