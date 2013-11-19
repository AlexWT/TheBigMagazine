<?php 
/**
 * Template - Sidebar-single.php
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 
?>


<?php if ( is_active_sidebar( 'sidebar-single' ) ) : ?>
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-single' ); ?>
	</div><!-- .widget-area -->
<?php endif; ?>