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
    
    
    <!-- Popular Posts
    ===================================== -->
    <div class="mt25 pr25 pl25 clearfix">
        <h5 class="mt25">
            Popular Posts
            <span class="heading-divider mt10"></span>
        </h5>
        
        <?php
            wp_get_archives(
                array(
                    'limit'=> 10, 
                    'type'=> 'postbypost',
                    'format' => 'custom',
                    'before' => '<div class="blog-sidebar-popular-post-container" style="border-bottom: 1px dotted #ccc; height: auto !important;"><h6>',
                    'after' => '</h6></div>',  
                )
            );
        ?>
            
    </div>

    <!-- Authors
    ===================================== -->
    <div class="mt25 pr25 pl25 clearfix">
        <h5 class="mt25">
            Authors
            <span class="heading-divider mt10"></span>
        </h5>
        <ul class="shop-sidebar pl25">
            <?php wp_list_authors('hide_empty=0&optioncount=1'); ?>
        </ul>
        
    </div>

    <!-- Pages
    ===================================== -->
    <div class="mt25 pr25 pl25 clearfix">
        <h5 class="mt25">
            Pages
            <span class="heading-divider mt10"></span>
        </h5>
        <ul class="shop-sidebar pl25">
            <?php wp_list_pages(
                array(
                    'title_li' => '',
                    'except' => 3
                )
            ); ?>
        </ul>
        
    </div>
    
    
    <!-- Archieve
    ===================================== -->
    <div class="mt25 pr25 pl25 clearfix">
        <h5 class="mt25">
            Archieve
            <span class="heading-divider mt10"></span>
        </h5>                            
        <ul class="shop-sidebar pl25">
            <?php
                wp_get_archives();
            ?>
        </ul>
        
    </div>
    
</div> 