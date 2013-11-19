<?php 
/**
 * Home-categories.php
 *
 * A list of categories in the site. The user can pick
 * which are dispayed from the theme admin panel. Being four, 
 * they are hardcoded (because of CSS mainly).	
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 

// The options framework global vatiable.
global $data;
?>

<section class="featured-categories">
	<header class='section-header'>
		<h3 class="section-title"><?php echo $data['categories_title'] ?></h3>
		<a href="#" ><?php _e('View all categories', 'thebigmag') ?></a>
	</header><!-- section-header -->

	<div class="section-content">
		<div class="column col-lg-3 col-sm-3 col-xs-3">
			<h4 class="categories-title"><i class="icon-minus"></i><?php echo $data['categories_first'] ?></h4>
			<?php Call::list_categories( $data['categories_first'], true, $data['categories_limit'] ) ?>
		</div><!-- /column -->
		<div class="column col-lg-3 col-sm-3 col-xs-3">
			<h4 class="categories-title"><i class="icon-minus"></i><?php echo $data['categories_secound'] ?></h4>
			<?php Call::list_categories( $data['categories_secound'], true, $data['categories_limit'] ) ?>
		</div><!-- /column -->
		<div class="column col-lg-3 col-sm-3 col-xs-3">
			<h4 class="categories-title"><i class="icon-minus"></i><?php echo $data['categories_third'] ?></h4>
			<?php Call::list_categories( $data['categories_third'], true, $data['categories_limit'] ) ?>
		</div><!-- /column -->
		<div class="column col-lg-3 col-sm-3 col-xs-3">
			<h4 class="categories-title"><i class="icon-minus"></i><?php echo $data['categories_fourth'] ?></h4>
			<?php Call::list_categories( $data['categories_fourth'], true, $data['categories_limit'] ) ?>
		</div><!-- /column -->
	</div><!-- /section-content -->
</section><!-- /featured categories -->