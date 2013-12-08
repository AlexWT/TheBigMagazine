<?php 
/**
 * Template - Sidebar-latestPosts.php
 *
 * Sidebar area located at home page. Right of the latest posts list.
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 
?>


<?php if ( is_active_sidebar( 'sidebar-latestPosts' ) ) : ?>
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-latestPosts' ); ?>
	</div><!-- .widget-area -->
<?php endif; ?>