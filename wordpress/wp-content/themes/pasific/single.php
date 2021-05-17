<?php 
    get_header();
    the_post(); // Con esto accedemos a todas las funciones del post
?>
        
        <!-- Page Loader
        ===================================== -->
		<div id="pageloader" class="bg-grad-animation-1">
			<div class="loader-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/other/oval.svg" alt="page loader">
            </div>
		</div>
        
        <a href="#page-top" class="go-to-top">
            <i class="fa fa-long-arrow-up"></i>
        </a>
        
        
        <!-- Navigation Area
        ===================================== -->
        <?php get_template_part('nav'); ?>
        
        
        <!-- Search Modal Dialog Box
        ===================================== -->
        <div id="searchModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header bg-gray">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title text-center"><i class="fa fa-search fa-fw"></i> Search here</h5>
                    </div>
                    <div class="modal-body">                        
                        <form action="#" class="inline-form">
                            <input type="text" class="modal-search-input" autofocus>
                        </form>
                    </div>
                    <div class="modal-footer bg-gray">
                        <span class="text-center"><a href="#" class="color-dark">Advanced Search</a></span>
                    </div>
                </div>

            </div>
        </div>
        
        
        <!-- Subheader Area
        ===================================== -->
        <header class="bg-grad-stellar mt70">

            <div class="container">
                <div class="row mt20 mb30">
                    <div class="col-md-6 text-left">
                        <h3 class="color-light text-uppercase animated" data-animation="fadeInUp" data-animation-delay="100">Blog Posts<small class="color-light alpha7">some notes.</small></h3>
                    </div>
                    <div class="col-md-6 text-right pt35">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Blog Page</a></li>
                            <li>Blog Post</li>
                        </ul>
                    </div>
                </div>
            </div>

        </header>
        
        
        <!-- Blog Area
        ===================================== -->
        <div id="blog" class="pt20 pb50">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-9 mt25">
                    <div class="col-md-8 col-md-offset-2">
                        
                        <div class="blog-three-mini">
                            <h2 class="color-dark"><a href="#"><?php the_title(); ?></a></h2>
                            <div class="blog-three-attrib">
                                <div><i class="fa fa-calendar"></i><?php the_date(); ?></div> | 
                                <div><i class="fa fa-pencil"></i><a href="#"><?php the_author(); ?></a></div> | 
                                <div><i class="fa fa-comment-o"></i><a href="#">90 Comments</a></div> | 
                                <div><a href="#"><i class="fa fa-thumbs-o-up"></i></a>150 Likes</div> | 
                                <div>
                                    Share:  <a href="#"><i class="fa fa-facebook-official"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>

                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Image Carousel" class="img-responsive">
                            <?php the_content(); ?>
                            
                            <div class="blog-post-read-tag mt50">
                                <i class="fa fa-tags"></i> Tags:
                                <?php
                                    foreach(get_the_tags($post->ID) as $tag) {
                                        echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
                                    }
                                ?>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h5 class="bg-gray pt5 bp10 pl10">Related Articles</h5>
                            </div>
                            <!--Blog Post -->
                            <div class="col-md-4 col-sm-6 col-xs-12 mb50">
                                <div class="blog-three">
                                    <h4 class="blog-title"><a href="#">Amazing Blog Post Title</a></h4>
                                    <div class="blog-three-attrib">
                                        <span class="icon-calendar"></span>Dec 15 2015 | 
                                        <span class=" icon-pencil"></span><a href="#">Harry Boo</a>
                                    </div>
                                    <img src="assets/img/blog/img-blog-1.jpg" class="img-responsive" alt="image">
                                    <p class="mt25">
                                        Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos.                            
                                    </p>
                                    <a href="#" class="button button-gray button-xs">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>

                            <!--Blog Post -->
                            <div class="col-md-4 col-sm-6 col-xs-12 mb50">
                                <div class="blog-three">
                                    <h4 class="blog-title"><a href="#">Amazing Blog Post Title</a></h4>
                                    <div class="blog-three-attrib">
                                        <span class="icon-calendar"></span>Dec 15 2015 | 
                                        <span class=" icon-pencil"></span><a href="#">Harry Boo</a>
                                    </div>
                                    <img src="assets/img/blog/img-blog-2.jpg" class="img-responsive" alt="image">
                                    <p class="mt25">
                                        Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos.                            
                                    </p>
                                    <a href="#" class="button button-gray button-xs">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                            
                            <!--Blog Post -->
                            <div class="col-md-4 col-sm-6 col-xs-12 mb50">
                                <div class="blog-three">
                                    <h4 class="blog-title"><a href="#">Amazing Blog Post Title</a></h4>
                                    <div class="blog-three-attrib">
                                        <span class="icon-calendar"></span>Dec 15 2015 | 
                                        <span class=" icon-pencil"></span><a href="#">Harry Boo</a>
                                    </div>
                                    <img src="assets/img/blog/img-blog-3.jpg" class="img-responsive" alt="image">
                                    <p class="mt25">
                                        Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos.                            
                                    </p>
                                    <a href="#" class="button button-gray button-xs">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                                                
                        
                        <div class="blog-post-author mb50 pt30 bt-solid-1">
                            <img src="assets/img/other/photo-1.jpg" class="img-circle" alt="image">
                            <span class="blog-post-author-name">John Boo</span> <a href="https://twitter.com/booisme"><i class="fa fa-twitter"></i></a>
                            <p>
                                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
                            </p>
                        </div>
                        
                        
                        <div class="blog-post-comment-container">
                            <h5><i class="fa fa-comments-o mb25"></i> 20 Comments</h5>
                            
                            <div class="blog-post-comment">
                                <img src="assets/img/other/photo-2.jpg" class="img-circle" alt="image">
                                <span class="blog-post-comment-name">John Boo</span> Jan. 20 2016, 10:00 PM
                                <a href="#" class="pull-right text-gray"><i class="fa fa-comment"></i> Reply</a>
                                <p>
                                    Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
                                </p>
                            </div>
                            
                            <div class="blog-post-comment">
                                <img src="assets/img/other/photo-4.jpg" class="img-circle" alt="image">
                                <span class="blog-post-comment-name">John Boo</span> Jan. 20 2016, 10:00 PM
                                <a href="#" class="pull-right text-gray"><i class="fa fa-comment"></i> Reply</a>
                                <p>
                                    Adipisci velit sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam.
                                </p>
                                
                                <div class="blog-post-comment-reply">
                                    <img src="assets/img/other/photo-2.jpg" class="img-circle" alt="image">
                                    <span class="blog-post-comment-name">John Boo</span> Jan. 20 2016, 10:00 PM
                                    <a href="#" class="pull-right text-gray"><i class="fa fa-comment"></i> Reply</a>
                                    <p>
                                        Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
                                    </p>
                                </div>
                                
                            </div>
                            
                            <div class="blog-post-comment">
                                <img src="assets/img/other/photo-1.jpg" class="img-circle" alt="image">
                                <span class="blog-post-comment-name">John Boo</span> Jan. 20 2016, 10:00 PM
                                <a href="#" class="pull-right text-gray"><i class="fa fa-comment"></i> Reply</a>
                                <p>
                                    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur adipisci velit.
                                </p>
                            </div>
                            
                            <button class="button button-default button-sm center-block button-block mt25 mb25">Load More Comments</button>
                    
                            
                        </div>
                        
                        <div class="blog-post-leave-comment">
                            <h5><i class="fa fa-comment mt25 mb25"></i> Leave Comment</h5>
                            
                            <form>
                                <input type="text" name="name" class="blog-leave-comment-input" placeholder="name" required>
                                <input type="email" name="name" class="blog-leave-comment-input" placeholder="email"  required>
                                <input type="url" name="name" class="blog-leave-comment-input" placeholder="website">
                                <textarea name="message" class="blog-leave-comment-textarea"></textarea>
                                <button class="button button-pasific button-sm center-block mb25">Leave Comment</button>                            
                            </form>
                            
                         </div>
                        
                    </div>   
                        
                        <!-- Blog Paging
                        ===================================== -->
                        <div class="row mt25 animated" data-animation="fadeInUp" data-animation-delay="100">
                            <div class="col-md-6">
                                <a href="#" class="button button-sm button-pasific pull-left hover-skew-backward">Old Entries</a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" class="button button-sm button-pasific pull-right hover-skew-forward">New Entries</a>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <!-- Sidebar
                    ================================= -->
                    <?php
                        get_sidebar();
                    ?>
                    
                </div>                
                
            </div>
        </div>
         
        
        <!-- Newsletter Area
        =====================================-->
        <div id="newsletter" class="bg-dark2 pt50 pb50">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-2">
                        <h4 class="color-light">
                            Newsletter
                        </h4>
                    </div>
                    
                    <div class="col-md-10">
                        <form name="newsletter">
                            <div class="input-newsletter-container">
                                <input type="text" name="email" class="input-newsletter" placeholder="enter your email address">
                            </div>
                            <a href="#" class="button button-sm button-pasific hover-ripple-out">Subscribe<i class="fa fa-envelope"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        <?php get_footer(); ?>