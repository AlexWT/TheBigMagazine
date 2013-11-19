<?php 
/**
 * Template - Sidebar.php
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 
?>


<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- .widget-area -->
<?php endif; ?>