 <?php
/**
 * Template part - Features Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package finacle
*/
   
    
$slider_no         = 3;
$slider_pages      = array();
for( $i = 1; $i <= $slider_no; $i++ ) {
    $slider_pages[]    =  get_theme_mod( "finacle_slider_page_$i", 1 );
    $finacle_slider_btntxt[]    =  get_theme_mod( "finacle_slider_btntxt_$i", '' );
    $finacle_slider_btnurl[]    =  get_theme_mod( "finacle_slider_btnurl_$i", '');
     
}

$slider_args  = array(
    'post_type' => 'page',
    'post__in' => array_map( 'absint', $slider_pages ),
    'posts_per_page' => absint($slider_no),
    'orderby' => 'post__in'
   
); 

$slider_query = new   wp_Query( $slider_args );

if ($slider_query->have_posts() ) { 
?>
    <!-- ====== Slider starts ====== -->
   <div class="slider-area">
        <div class="slider-wrapper owl-carousel">
            <?php
                $count = 0;
                while($slider_query->have_posts()) :
                $slider_query->the_post();
            ?>
                <div class="slider-item home-three-slider-item slider-item-four" <?php if(has_post_thumbnail()) : ?> style="background-image: url(<?php the_post_thumbnail_url('full', array('class' => 'img-responsive')); ?>);" <?php endif; ?>>
                    <div class="container">
                        <div class="row">
                            <div class="slider-content-area">
                                <div class="slide-text">
                                    <h1><?php the_title(); ?></h1>
                                    <h2><?php the_content(); ?></h2>
                                    <?php if($finacle_slider_btntxt[$count] != ""){ ?>
                                        <div class="slider-content-btn">
                                            <a class="button button-color active margin-right-15" href="<?php echo esc_url($finacle_slider_btnurl[$count]); ?>"><?php echo esc_html($finacle_slider_btntxt[$count]); ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $count = $count + 1;
                    endwhile;
                    wp_reset_postdata();
                ?> 
        </div>
    </div>
    <!-- ====== Slider ends ====== -->
<?php } ?>
 