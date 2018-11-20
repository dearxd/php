<?php

/**
 * finacle functions and definitions
  @package finacle
 *
*/

/* Set the content width in pixels, based on the theme's design and stylesheet.
*/
if( ! function_exists( 'finacle_theme_setup' ) ) {

	function finacle_theme_setup() {

		$GLOBALS['content_width'] = apply_filters( 'finacle_content_width', 980 );

		load_theme_textdomain( 'finacle', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

        // Add title tag 
		add_theme_support( 'title-tag' );

		// Add default logo support		
        add_theme_support( 'custom-logo');

        add_theme_support('post-thumbnails');
        add_image_size('finacle-services-thumbnail',60,60,true);
        add_image_size('finacle-page-thumbnail',738,423, true);
        add_image_size('finacle-about-thumbnail',614,403, true);
        add_image_size('finacle-blog-front-thumbnail',370,225, true);
        add_image_size('finacle-projects-thumbnail',390,291, true);
        add_image_size('finacle-slider-thumbnail',1350,600, true);
        
        // Add theme support for Semantic Markup
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) ); 

		$defaults = array(
			'default-image'          => get_template_directory_uri() .'/assets/img/header.jpg',
			'width'                  => 1920,
			'height'                 => 540,
			'uploads'                => true,
			'default-text-color'     => "3A6EE8",
			'wp-head-callback'       => 'finacle_header_style',
			);
		add_theme_support( 'custom-header', $defaults );

		// Menus
		register_nav_menus(
			array(
                'primary' => esc_html__('Primary Menu', 'finacle'),
            )
		);
		// add excerpt support for pages
        add_post_type_support( 'page', 'excerpt' );

        if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
        }
		// Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Custom Backgrounds
   		add_theme_support( 'custom-background', 
   			array(
  			'default-color' => 'ffffff',
    	    ) 
   		);

    	// To use additional css
 	    add_editor_style( 'assets/css/editor-style.css' );
	}
	add_action( 'after_setup_theme', 'finacle_theme_setup' );
}

// Register Nav Walker class_alias
   require_once('class-wp-bootstrap-navwalker.php');
   require get_template_directory(). '/include/extras.php';
/**
 * Enqueue CSS stylesheets
 */		
if( ! function_exists( 'finacle_enqueue_styles' ) ) {
	function finacle_enqueue_styles() {	
	    
	    wp_enqueue_style('main_font', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400|Roboto:400,500,700,900');
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
		wp_enqueue_style('font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css');
		wp_enqueue_style('MeanMenu', get_template_directory_uri() .'/assets/css/meanmenu.css'); //mobile menu
		wp_enqueue_style('venbox', get_template_directory_uri() .'/assets/css/venobox.css'); //portfolio
		wp_enqueue_style('carousel', get_template_directory_uri() .'/assets/css/owl-carousel.css');
		// main style
		wp_enqueue_style( 'finacle-style', get_stylesheet_uri() );
		
		wp_enqueue_style('finacle-responsive', get_template_directory_uri() .'/assets/css/responsive.css');
		
	 
	}
	add_action( 'wp_enqueue_scripts', 'finacle_enqueue_styles');
}
/**
 * Enqueue JS scripts
*/

if( ! function_exists( 'finacle_enqueue_scripts' ) ) {
	function finacle_enqueue_scripts() {   
		wp_enqueue_script('jquery');
	
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js',array(),'', true);
		
		wp_enqueue_script('meanMenu', get_template_directory_uri() . '/assets/js/meanMenu.js',array(),'', true); //mobile menu
		wp_enqueue_script('carousel', get_template_directory_uri() . '/assets/js/Owl-Carousel.js',array(),'', true);
		
        wp_enqueue_script('Stellar', get_template_directory_uri() . '/assets/js/Stellar.js',array(),'', true);//service scrolling
        wp_enqueue_script('VenoBox', get_template_directory_uri() . '/assets/js/Venobox.js',array(),'', true); //portfolio image zoom
        
		wp_enqueue_script('finacle-main', get_template_directory_uri() . '/assets/js/main.js',array(),'', true);
	}
	add_action( 'wp_enqueue_scripts', 'finacle_enqueue_scripts' );
}

function finacle_cat_count_span($links) {
        $links = str_replace('</a> (', ' <span>', $links);
        $links = str_replace(')', '</span></a>', $links);
        return $links;
    }
    add_filter('wp_list_categories', 'finacle_cat_count_span');


    function finacle_style_the_archive_count($links) {
        $links = str_replace('</a>&nbsp;(', ' <span class="archiveCount">', $links);
        $links = str_replace(')', '</span></a>', $links);
        return $links;
    }
    add_filter('get_archives_link', 'finacle_style_the_archive_count');

/**
 * Register sidebars for finacle
*/
function finacle_sidebars() {

	// Blog Sidebar
	
	register_sidebar(array(
		'name' => esc_html__( 'Blog Sidebar', "finacle"),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Sidebar on the blog layout.', "finacle"),
		'before_widget' => '<aside id="%1$s" class="single-widget widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
  	

	// Footer Sidebar
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 1', "finacle"),
		'id' => 'finacle-footer-widget-area-1',
		'description' => esc_html__( 'The footer widget area 1', "finacle"),
		'before_widget' => '<div class="widget-item %2$s"> ',
		'after_widget' => '</div> ',
		'before_title' => '<h3 >',
		'after_title' => '</h3>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 2', "finacle"),
		'id' => 'finacle-footer-widget-area-2',
		'description' => esc_html__( 'The footer widget area 2', "finacle"),
		'before_widget' => '<div class="widget-item %2$s">  ',
		'after_widget' => ' </div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 3', "finacle"),
		'id' => 'finacle-footer-widget-area-3',
		'description' => esc_html__( 'The footer widget area 3', "finacle"),
		'before_widget' => '<div class="widget-item %2$s"> ',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 4', "finacle"),
		'id' => 'finacle-footer-widget-area-4',
		'description' => esc_html__( 'The footer widget area 4', "finacle"),
		'before_widget' => '<div class="widget-item %2$s"> ',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));		
}

add_action( 'widgets_init', 'finacle_sidebars' );

 /**
 * Comment layout
 */
function finacle_comments( $comment, $args, $depth ) { 
    $GLOBALS['comment'] = $comment; ?>
	<div <?php comment_class('comments'); ?> id="<?php comment_ID() ?>">
	    <?php if ($comment->comment_approved == '0') : ?>
	        <div class="alert alert-info">
	          <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'finacle' ) ?></p>
	        </div>
	    <?php endif; ?>
	    <div class="post-comment-section gray-bg">
                                <ul class="media-list">
                                    <li class="media">
                                        <div class="media-left">
                                            <a><?php echo get_avatar( $comment,'88', null,'User', array( 'class' => array( 'media-object','' ) )); ?></a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="c-title"><?php 
                                               /* translators: '%1$s %2$s: edit term */
                                               printf(esc_html__( '%1$s %2$s', 'finacle' ), get_comment_author_link(), edit_comment_link(esc_html__( '(Edit)', 'finacle' ),'  ','') ) ?></h5>
                                            <div class="time-reply">
                                                <p class="comment-time"><span><?php the_date();?></span></p>
                                                <p class="reply"><a><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a></p>
                                            </div>
                                            <p><?php comment_text() ;?></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
	</div>
<?php
} 


/**
 * Customizer additions.
*/
require get_template_directory(). '/include/customizer.php';

function finacle_header_style()
{
	$header_text_color = get_header_textcolor();
	?>
		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
				.logo span { color: #<?php echo esc_attr($header_text_color); ?>; }
			<?php endif; ?>	
		</style>
	<?php

}

?>