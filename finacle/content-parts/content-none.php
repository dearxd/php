<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage finacle
 */
?>
<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( esc_html_e( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'finacle' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

<?php elseif ( is_search() ) : ?>

	<h4 class="search-no"><?php printf( esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'finacle' ), '<span>' . get_search_query() . '</span>' ); ?>
	</h4>
	<div class="widget widget_search cc-search">
		 <?php get_search_form(); ?>
	</div>

<?php else : ?>

	<p><?php echo(esc_html__( 'It seems we can not  find what you are looking for. Perhaps searching can help.', 'finacle' )); ?></p>
	<?php get_search_form(); ?>

<?php endif; ?>