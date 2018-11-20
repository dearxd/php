<?php 
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package finacle
 */
get_header(); 
if ( get_header_image() ){      
    $overlay = "bg-opacity-black-80";
    $title =  "banner-wrapper";
}
else{
    $overlay = "noverlay";
    $title = "no-banner";
}
    
?>
    
<!-- ====== top-banner starts ====== -->
        <div class="banner-area banner-bg-1 ptb-100  text-center <?php echo esc_attr($overlay);?>" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="<?php echo esc_attr($title);?>">
                            <h2><?php wp_title(''); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- ====== top-banner ends ====== -->

<!-- Start Main content Wrapper -->
        <div class="main-content-wrapper">
            <!-- Start blog section -->
            <div class="content-section ptb-100 gray-bg clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 ">
                            <div class="portfolio-masonry">
                                <?php if(have_posts()) : ?>
                                    <?php while(have_posts()) : the_post(); ?>
                                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                            <?php get_template_part('content-parts/content', get_post_format()); ?>
                                        </div>
                                    <?php endwhile; ?>
                                <?php else :  
                                     get_template_part( 'content-parts/content', 'none' );
                                endif; ?>
                            </div>
                            <div class="pagination-area text-center">
                                <ul class="pagination">
                                    <?php the_posts_pagination(
                                      array(
                                            'prev_text' =>esc_html__('&lt;','finacle'),
                                            'next_text' =>esc_html__('&gt;','finacle')
                                        )
                                    ); ?>                                   
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                           <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End blog section -->
            
        </div>
        <!-- End Main content Wrapper -->
<?php get_footer(); ?>