
<?php if ( !is_user_logged_in() ) : ?>

	<!-- Button trigger modal -->
	<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Login</button>

<?php else: 
	global $current_user;
	get_currentuserinfo();
?>
	<a href="<?php echo wp_logout_url(); ?>" title="Logout"><?php  ?>Logout (<?php echo $current_user->display_name ?>)</a>
<?php endif; ?> 

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Login</h4>
			</div>
			<div class="modal-body">
				<?php wp_login_form( $args ); ?> 
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->