<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bradley_public_library
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

$show_this_page_sidebar = get_field('show_this_page_sidebar');

$callouts_section = get_field('callouts_section', 'option');

$footer_library_hours_title = get_field('footer_library_hours_title', 'option');
$footer_library_hours = get_field('footer_library_hours', 'option');

if(!empty($show_this_page_sidebar)) {
?>

<?php if(!empty($callouts_section) || (!empty($footer_library_hours_title) && !empty($footer_library_hours))) { ?>
	<!-- Start - Start Right section -->
	<div class="right-bar">
		<div class="sidebar">
			<ul class="links-details">
		  		<?php 
		  		foreach ($callouts_section as $values) { 
		  			$url = '';
		  			if($values['callouts_links'] == 'internal' && !empty($values['callouts_internal_link'])) {
		  				$url = bradley_public_library_external_link($values['callouts_internal_link'], false);
		  			} else if($values['callouts_links'] == 'external' && !empty($values['callouts_external_link'])) {
		  				$url = bradley_public_library_external_link($values['callouts_external_link'], true);
		  			}
		  			if(!empty($values['callouts_show_sidebar'])) {
		  			?>
					<li>
						<a <?php echo $url; ?>>
							<img src="<?php echo $values['callouts_icon']; ?>" class="img-fluid">
						</a>
						<div class="txt-break">
							<span><?php echo $values['callouts_text']; ?></span>
						</div>
					</li>
				<?php } } ?>
			</ul>

			<?php 
				if(!empty($footer_library_hours_title)) {
					echo '<h3>'.$footer_library_hours_title.'</h3>';
				}
				echo apply_filters( 'the_content', $footer_library_hours);
			?>
		</div>
	</div>
	<!-- End - Start Right section -->
<?php } 

}

?>

<!-- <aside id="secondary" class="widget-area">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
</aside> -->


