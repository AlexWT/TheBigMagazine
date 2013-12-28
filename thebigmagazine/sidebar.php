<?php 
/**
 * Template - Sidebar.php
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 

global $data;
?>


<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div class="widget-area <?php echo $data['widget_menu_skin'] ?>">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- .widget-area -->
<?php endif; ?>