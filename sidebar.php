<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-sm-3 col-sm-offset-5 blog-sidebar">
<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>