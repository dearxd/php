<?php 
// To display Blog Post section on front page
  
$finacle_blog_title =  get_theme_mod('finacle_blog_title');  
$finacle_blog_section = get_theme_mod('finacle_blog_section_hideshow','show');

if ($finacle_blog_section =='show') { 
?>

<!-- ====== blog starts ====== -->
    <div class="content-section ptb-100 gray-bg  ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                    <div class="main-heading-content text-center">
                        <?php if($finacle_blog_title !="") { ?>
                            <h2><?php echo esc_html(get_theme_mod('finacle_blog_title')); ?></h2>
                        <?php } ?>
                        <p><?php echo esc_html(get_theme_mod('finacle_blog_subtitle')); ?> </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                     $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
                     if ( $latest_blog_posts->have_posts() ) : 
                     while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); 
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-post">
                        <?php if(has_post_thumbnail()) : ?>
                            <div class="blog-thumb">
                                <img src="<?php the_post_thumbnail_url('finacle-blog-front-thumbnail', array('class' => 'img-responsive')); ?>" alt="blog">
                            </div>
                        <?php endif; ?>
                        <div class="blg">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <ul class="meta-teg">
                                <li>
                                    <a href="#"><i class="fa fa-calendar"></i><?php the_date();?></a>
                                </li>
                                    <span class="blog-sep">/</span>
                                <li><?php echo esc_html__('By : ', 'finacle' ); ?><i class="fa fa-user"></i>
                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author();?></a>
                                </li>
                                    <span class="blog-sep">/</span>
                                <li>
                                    <a href="#"><i class="fa fa-comment-o"></i><?php comments_number( __('0', 'finacle'), __('1', 'finacle'), __('%', 'finacle') ); ?></a>
                                </li>
                            </ul>
                            <?php the_excerpt();?>
                            <a href="<?php the_permalink() ?>" class="readmore"><?php echo esc_html__('Read More', 'finacle' ); ?><i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                        <?php 
                    endwhile; 
                endif; ?>
            </div>
        </div>
    </div>
    <!-- ====== blog ends ====== -->
<?php } ?>
<!-- post ends-->

