<?php
/**
 * Template: Single.php
 *
 * The post it self. Display the content of single post.
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */

global $data;
$hidden =  $data['single-page-layout'] == 'hidden' ? true : false;
?>

<?php get_header(); ?>


<div id="page-content" class='container'>
<section class="row" id="content">

<?php if( !$hidden ) : ?>
	<aside id="sidebar" class="col-lg-3 col-md-3 visible-lg visible-md <?php echo $data['single-page-layout'] ?>">
		<?php get_sidebar(); ?>
	</aside><!-- /sidebar -->
<?php endif; ?>

<div id="main-content" class="<?php if( !$hidden ) : ?> col-lg-7 col-md-7 <?php endif; ?> ">
	<div class="entry blog">
		<strong>Current date: </strong><span class="date-stamp"><?php the_date( "F j, Y g:i a" ); ?></span>
		<strong>Last Modified: </strong><span class="modified"><?php the_modified_date(); ?></span>
		<?php edit_post_link( $link, "<strong class='pull-right edit-link'>[", ']</strong>', $id ); ?> 
		<header class='entry-header'>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<span class="author">By: <?php TBM_Print::author_link(); ?></span>
			<span class="comments"><a href="<?php comments_link(); ?>"><?php comments_number('(No Comments)', '(One Comment)', '(% Comments)' );?></a></span>
			<div class="entry-thumbnail">
				<?php if( has_post_thumbnail() ) the_post_thumbnail(); ?>
			</div>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>

		<footer class="entry-info">
			<?php the_tags('<span>Tags: </span>',', ','<br />'); ?>
			
			<div class='titles'>
				<h5 class='pull-left'>Previous article:</h5>
				<h5 class='pull-right'>Next article:</h5>
			</div>
			<?php TBM_Print::prev_next_links( 'both', 50 ); ?>
		</footer>
	</div><!-- /entry-blog -->
</div><!-- /main-content -->

<?php if ( !$hidden ) : ?>
<aside id="single-sidebar" class='post-sidebar' class="col-lg-2 col-mg-2">
	<?php get_sidebar('single'); ?>
</aside><!-- /single-sidebar -->
<?php endif; ?>

<?php get_footer(); ?>