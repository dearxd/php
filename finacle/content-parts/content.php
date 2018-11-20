 <?php
/**
 * @package finacle
*/
?>

    <div class="col-md-12 col-sm-12 portfolio-item ">
        <div class="single-blog-post mb-30">
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
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink() ?>" class="readmore">
                     <?php echo esc_html__('Read More', 'finacle' ); ?>
                     <i class="fa fa-long-arrow-right i-round"></i>
                </a>
            </div>
        </div>
    </div>