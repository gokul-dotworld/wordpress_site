<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Classic Real Estate
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<div id="sidebar"> 
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
<?php endif; ?>