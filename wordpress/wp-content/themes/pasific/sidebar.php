<!-- Blog Sidebar
===================================== --> 
<div id="sidebar" class="col-md-3 mt50 animated" data-animation="fadeInRight" data-animation-delay="250">           
    
    
    <!-- Search
    ===================================== -->
    <div class="pr25 pl25 clearfix"> 
        <?php 
            get_search_form(); // Taken from searchform.php
        ?> 
    </div>
    
    
    <!-- Categories
    ===================================== -->
    <div class="mt25 pr25 pl25 clearfix">
        <h5 class="mt25">
            Categories
            <span class="heading-divider mt10"></span>
        </h5>                            
        <ul class="shop-sidebar pl25">
            <!-- <li class="active"><a href="#">Fashion<span class="badge badge-pasific pull-right">14</span></a></li>
            <li><a href="#">Sport<span class="badge badge-pasific pull-right">125</span></a></li>
            <li><a href="#">Electronic<span class="badge badge-pasific pull-right">350</span></a></li>
            <li><a href="#">Jewellery<span class="badge badge-pasific pull-right">520</span></a></li>
            <li><a href="#">Food<span class="badge badge-pasific pull-right">1,290</span></a></li>
            <li><a href="#">Furniture<span class="badge badge-pasific pull-right">7</span></a></li> -->
            <?php
                wp_list_categories('title_li');
            ?>
        </ul>
        
        
    </div>
    
    
    <!-- Tags
    ===================================== -->
    <div class="pr25 pl25 clearfix">
        <h5 class="mt25">
            Popular Tags
            <span class="heading-divider mt10"></span>
        </h5>

        <?php
            $html = "<ul class='tag'>";
            foreach(get_tags() as $tag) {
                $tag_link = get_tag_link($tag->term_id);
                $tag_name = $tag->name;
                $html .= "<li><a href='$tag_link'>$tag_name</a></li>";
            }
            $html .= "</ul>";
            echo $html;
        ?>
        
    </div>
    
    
    <!-- Popular Products
    ===================================== -->
    <div class="mt25 pr25 pl25 clearfix">
        <h5 class="mt25">
            Popular Post
            <span class="heading-divider mt10"></span>
        </h5>
        
        <!-- <div class="blog-sidebar-popular-post-container">
            <img src="assets/img/blog/img-blog-1.jpg" alt="" class="img-responsive pull-left">
            <h6><a href="#">Lorem Ipsum Dolor</a></h6>
            <span class="text-gray">Jan 24th, 2016</span>
        </div>
        
        <div class="blog-sidebar-popular-post-container">
            <img src="assets/img/blog/img-blog-3.jpg" alt="" class="img-responsive pull-left">
            <h6><a href="#">nisi ut aliquip</a></h6>
            <span class="text-gray">Jan 24th, 2016</span>
        </div>
        
        <div class="blog-sidebar-popular-post-container">
            <img src="assets/img/blog/img-blog-2.jpg" alt="" class="img-responsive pull-left">
            <h6><a href="#">tempor incididunt</a></h6>
            <span class="text-gray">Jan 24th, 2016</span>
        </div> -->
        <?php
            wp_get_archives(
                array(
                    'limit'=> 10, 
                    'type'=> 'postbypost',
                    'format' => 'custom',
                    'before' => '<div class="blog-sidebar-popular-post-container"><h6>',
                    'after' => '</h6></div>',  
                )
            );
        ?>
            
    </div>
    
    
    <!-- Archieve
    ===================================== -->
    <div class="mt25 pr25 pl25 clearfix">
        <h5 class="mt25">
            Archieve
            <span class="heading-divider mt10"></span>
        </h5>                            
        <ul class="shop-sidebar pl25">
            <li class="active"><a href="#">January<span class="badge badge-pasific pull-right">14</span></a></li>
            <li><a href="#">February<span class="badge badge-pasific pull-right">125</span></a></li>
            <li><a href="#">March<span class="badge badge-pasific pull-right">350</span></a></li>
            <li><a href="#">April<span class="badge badge-pasific pull-right">520</span></a></li>
            <li><a href="#">May<span class="badge badge-pasific pull-right">1,290</span></a></li>
            <li><a href="#">June<span class="badge badge-pasific pull-right">7</span></a></li>
        </ul>
        
    </div>
    
</div> 