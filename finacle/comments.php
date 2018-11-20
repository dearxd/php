<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage finacle
 * @since finacle 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/

if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments post-comment-section gray-bg">
    <?php if ( have_comments() ) : ?>
        <h4>
            <?php
                $comments_number = get_comments_number();
                if ( 1 === $comments_number ) {
                    /* translators: %s: post title */
                    printf( esc_html__( 'One thought on &ldquo;%s&rdquo;','finacle' ), get_the_title() );
                } else {
                    printf(
                        /* translators: 1: number of comments, 2: post title */
                        _nx(
                            '%1$s Comment',
                            '%1$s Comments',
                            $comments_number,
                            'comments title',
                            'finacle'
                        ),
                        esc_html(number_format_i18n( $comments_number ) ),
                        get_the_title()
                    );
                }
            ?>
        </h4>

        <?php the_comments_navigation(); ?>

        <div class="auth-comment post-comment-section gray-bg">
        <?php
            wp_list_comments( array(
                'style'       => 'ul',
                'short_ping'  => true,
                'avatar_size' => 42,
                'callback' => 'finacle_comments',
            ) );
        ?>
        </div>
        <!-- .comment-list -->

        <?php the_comments_navigation(); ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'finacle' ) ) :
    ?>
        <p class="no-comments"><?php esc_html__( 'Comments are closed.', 'finacle' ); ?></p> 
    <?php endif; ?>

    <?php 
        $req      = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );

        $comments_args = array
        (
            'submit_button' => '<div class="form-group">'.
              '<input  name="%1$s" type="submit" id="%2$s" class="button comment-sms" value="SEND MESSAGE" />'.
            '</div>',
            'title_reply'  =>  __( '<h4 class="comment-title">Leave your thought</h4>', 'finacle'  ), 
            'comment_notes_after' => '',  
                
            'comment_field' =>  
                '<div class="clear-fix my-comment-box"><textarea class="form-control" id="comment" name="comment" placeholder="' . esc_attr__( 'Message', 'finacle' ) . '" rows="7" aria-required="true" '. $aria_req . '>' .
                '</textarea></div>',
            'fields' => apply_filters( 'comment_form_default_fields', array (
                'author' => '<div class="input-field-wrapper">'.               
                    '<div class="input-field"><input id="author" class="form-control" name="author" placeholder="' . esc_attr__( 'Name', 'finacle' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"' . $aria_req . ' /></div>',
                'email' =>
                    '<div class="input-field"><input id="email" class="form-control" name="email" placeholder="' . esc_attr__( 'Email Address', 'finacle' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . ' /></div>'.'</div>',
            ) ),
        );
    ?>
</div>
<div class="comment-form-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="comment-form ">
                <?php comment_form($comments_args); ?>
            </div>
        </div>
    </div>
</div>
<!-- .comments-area -->
