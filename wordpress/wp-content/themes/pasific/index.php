<?php get_header(); ?>
        
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

                        <?php

                            // Sacar último post
                            $args = array(
                                'post_per_page' => 1,
                                'post__not_in' => $post_destacado_id,
                            );

                            $destacado = new WP_Query($args);

                            if($destacado->have_posts()):
                                while($destacado->have_posts()):
                                    $destacado->the_post();
                        ?>
                        
                        <div class="blog-three-mini">
                            <h2 class="color-dark"><a href="#"><?php the_title(); ?></a></h2>
                            <div class="blog-three-attrib">
                                <div><i class="fa fa-calendar"></i>Dec 15 2015</div> | 
                                <div><i class="fa fa-pencil"></i><a href="#">Harry Boo</a></div> | 
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

                            <img src="assets/img/blog/img-blog-5.jpg" alt="Image Carousel" class="img-responsive">
                            <p class="lead mt25">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur 
                                excepteur sint occaecat cupidatat non proident sunt in culpa.
                            </p>
                            <h3 class="mt25 mb25">Heading Title Two</h3>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur
                            </p>
                            <blockquote>
                                Sometimes when you innovate, you make mistakes. It is best to admit them quickly, and get on with improving your other innovations.
                                <footer><i class="fa fa-quote-right mt25"></i> Steve Job</footer>
                            </blockquote>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
                            </p>
                            <h4 class="mt25 mb25">Heading Title Three</h4>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
                            </p>
                            
                            <div class="blog-post-read-tag mt50">
                                <i class="fa fa-tags"></i> Tags:
                                <a href="#"> Javascript</a>,
                                <a href="#"> HTML</a>,
                                <a href="#"> Wordpress</a>,
                                <a href="#"> Tutorial </a>
                            </div>
                            
                        </div>

                        <?php
                                endwhile;
                            else:
                                'No posts published yet...';
                            endif;
                        ?>
                        
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
                    
                    
                    <!-- Blog Sidebar
                    ===================================== --> 
                    <div id="sidebar" class="col-md-3 mt50 animated" data-animation="fadeInRight" data-animation-delay="250">           
                        
                        
                        <!-- Search
                        ===================================== -->
                        <div class="pr25 pl25 clearfix"> 
                            <form action="#">
                                <div class="blog-sidebar-form-search">
                                    <input type="text" name="search" class="" placeholder="e.g. Javascript">
                                    <button type="submit" name="submit" class="pull-right"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                           
                        </div>
                        
                        
                        <!-- Categories
                        ===================================== -->
                        <div class="mt25 pr25 pl25 clearfix">
                            <h5 class="mt25">
                                Categories
                                <span class="heading-divider mt10"></span>
                            </h5>                            
                            <ul class="shop-sidebar pl25">
                                <li class="active"><a href="#">Fashion<span class="badge badge-pasific pull-right">14</span></a></li>
                                <li><a href="#">Sport<span class="badge badge-pasific pull-right">125</span></a></li>
                                <li><a href="#">Electronic<span class="badge badge-pasific pull-right">350</span></a></li>
                                <li><a href="#">Jewellery<span class="badge badge-pasific pull-right">520</span></a></li>
                                <li><a href="#">Food<span class="badge badge-pasific pull-right">1,290</span></a></li>
                                <li><a href="#">Furniture<span class="badge badge-pasific pull-right">7</span></a></li>
                            </ul>
                           
                        </div>
                        
                        
                        <!-- Tags
                        ===================================== -->
                        <div class="pr25 pl25 clearfix">
                            <h5 class="mt25">
                                Popular Tags
                                <span class="heading-divider mt10"></span>
                            </h5>
                            <ul class="tag">
                                <li><a href="#">Jacket</a></li>
                                <li><a href="#">Accesories</a></li>
                                <li><a href="#">Jewelley</a></li>
                                <li><a href="#">iWatch</a></li>
                                <li><a href="#">iPad</a></li>
                                <li><a href="#">Macbook</a></li>
                                <li><a href="#">Apple</a></li>
                            </ul>
                           
                        </div>
                        
                        
                        <!-- Popular Products
                        ===================================== -->
                        <div class="mt25 pr25 pl25 clearfix">
                            <h5 class="mt25">
                                Popular Post
                                <span class="heading-divider mt10"></span>
                            </h5>
                            
                            <div class="blog-sidebar-popular-post-container">
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
                            </div>
                                
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
                        
                        
                         <!-- Facebook Plugin
                        ===================================== -->
                        <!-- <div class="mt75 pr25 pl25 clearfix">
                           <div id="fb-root"></div>
                            <script>
                                (function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = "../../connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
                                  fjs.parentNode.insertBefore(js, fjs);
                                }
                                 (document, 'script', 'facebook-jssdk'));
                            </script>
                            
                            <div class="fb-page" data-href="https://www.facebook.com/myboodesign.studio" data-tabs="timeline" data-width="350" data-height="210" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/myboodesign.studio"><a href="https://www.facebook.com/myboodesign.studio">Myboodesign Studio</a></blockquote></div></div>
                            
                        </div> -->
                                                
                        
                    </div>                    
                    
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