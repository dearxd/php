<?php 

/* For Single page Results
*/

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>   
    <article class="blog-post single-blog-post gray-bg">
        <?php if(has_post_thumbnail()) : ?>
            <div class="blog-thumb">
                 <?php the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
        <div class="blg">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <ul class="meta-teg">
                    <li>
                        <a><i class="fa fa-calendar"></i><?php the_date();?></a>
                    </li>
                        <span class="blog-sep">/</span>
                    <li>
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fa fa-user"></i><?php the_author(); ?></a>
                    </li>
                        <span class="blog-sep">/</span>
                    <li>
                        <a><i class="fa fa-comment-o"></i> <?php comments_number( __('0', 'finacle'), __('1', 'finacle'), __('% ', 'finacle') ); ?></a>
                    </li>
                         
                    <?php if (has_tag()) : ?>
                        <span class="blog-sep">/</span>
                    <li>
                        <i class="fa fa-tag"></i>
                        <a><?php echo esc_html__(' ', 'finacle' ); ?><?php the_tags('&nbsp;'); ?></a>
                    </li>     
              <?php endif; ?>                    
                </ul>
                <div class="content-wrapper">
                    <div class="post-content-inner">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'finacle' ),
                        'after'  => '</div>',
                    ) );
                ?>
        </div>
    </article>
</div>