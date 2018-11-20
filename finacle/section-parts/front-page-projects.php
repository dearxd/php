<?php
/**
 * Template part - Projects Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package finacle
 */
$finacle_projects_title = get_theme_mod('finacle_projects_title');
$finacle_projects_section     = get_theme_mod( 'finacle_projects_section_hideshow','hide');
  
$projects_no        = 6;
$projects_pages      = array();
  
for( $i = 1; $i <= $projects_no; $i++ ) {
   $projects_pages[]    =  get_theme_mod( "finacle_projects_page_$i", 1 );
     
}

$projects_args  = array(
    'post_type' => 'page',
    'post__in' => array_map( 'absint', $projects_pages ),
    'posts_per_page' => absint($projects_no),
    'orderby' => 'post__in'
); 
    
$projects_query = new   wp_Query( $projects_args );
if( $finacle_projects_section == "show" ) :
?>
    <!-- ====== portfolio starts ====== -->
    <div class="content-section ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                    <div class="main-heading-content text-center">
                        <?php if($finacle_projects_title !="") { ?>
                            <h2><?php echo esc_html(get_theme_mod('finacle_projects_title')); ?></h2>
                        <?php } ?>
                        <p><?php echo esc_html(get_theme_mod('finacle_projects_subtitle')); ?> </p>
                    </div>
                </div>
            </div>
            <!-- Start portfolio Wrapper -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-content">
                        <div class="portfolio portfolio-masonry portfolio-3-column portfolio-gutter">
                            <?php
                                $count = 0;
                                while($projects_query->have_posts()) :
                                $projects_query->the_post();
                            ?>
                                <div class="portfolio-item cat1 cat3 col-md-4">
                                    <div class="portfolio-item-content">
                                        <?php if(has_post_thumbnail()) : ?>
                                            <div class="item-thumbnail">
                                                <img src="<?php the_post_thumbnail_url('finacle-portfolio-thumbnail', array('class' => 'img-responsive')); ?>" alt="">
                                                <div class="zoom-icon">
                                                    <a class="venobox portfolio-view-btn" data-gall="myGallery" href="<?php the_post_thumbnail_url('finacle-projects-thumbnail', array('class' => 'img-responsive')); ?>"><i
                                                            class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="portfolio-details">
                                            <div class="portfolio-details-inner">
                                                    <h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                             ?> 
                        </div>
                    </div>
                </div>
            </div>
                    <!-- End portfolio Wrapper -->
        </div>
    </div>
    <!-- ====== portfolio ends ====== -->
<?php
  endif;
?>