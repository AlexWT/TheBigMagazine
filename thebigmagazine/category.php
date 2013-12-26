<?php
/**
 * Category page
 *
 * @package  WellThemes
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 */

global $data;
?>
<?php get_header(); ?>

<div id="page-content" class='container'>
	<div id="content" class='row'>

		<aside id="sidebar" class="col-lg-3 col-md-3 visible-lg visible-md <?php echo $data['single-page-layout'] ?>">
			<?php get_sidebar(); ?>
		</aside><!-- /sidebar -->

		<div id="main-content" class="col-lg-9 col-md-9">
			<header class="page-heading entry cs2">
				<h2>Category: <strong><?php single_cat_title(); ?></strong></h2>
				<?php if( $data['show_breadcrumbs'] ) TBM_Print::breadcrumbs(); ?>
			</header>	
			<div class="js-masonry">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php get_template_part('content'); ?>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<footer>
			<p><?php TBM_print::pagination(); ?></p>
			</footer>
		</div><!-- /main-content -->

	</div><!-- /content -->
</div><!-- /page-content -->

<?php get_footer(); ?>