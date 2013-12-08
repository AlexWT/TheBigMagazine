<?php get_header(); ?>

<div id="page-content" class='container'>

<section class="row section-slider">
	<?php get_template_part( 'layouts/home', 'slider' ); ?>
	<?php get_template_part( 'layouts/home', 'topNews' ) ?>
</section>

<section class="row" id="content">

<aside id="sidebar" class="col-lg-3 col-md-3 visible-lg visible-md">
	<?php get_sidebar(); ?>
</aside><!-- /sidebar -->

<div id="main-content" class="col-lg-9 col-md-9">

	<?php  // Check if the user want to display the categories section.
	if( $data['categories_switch'] ) 
		get_template_part( 'layouts/home', 'categories' ); ?>

	<?php  // Check if the user want to display the categories section.
	if( $data['featured1_switch'] ) 
		get_template_part( 'layouts/home', 'category1' ); ?>

	<?php get_template_part( 'layouts/home', 'threeCategories' ); ?>
	<?php get_template_part( 'layouts/home', 'latestPosts' ); ?>
</div><!-- /main-content -->

<?php get_footer(); ?>