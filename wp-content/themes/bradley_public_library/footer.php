<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bradley_public_library
 */

$footer_site_map_title = get_field('footer_site_map_title', 'option');

$footer_library_hours_title = get_field('footer_library_hours_title', 'option');
$footer_library_hours = get_field('footer_library_hours', 'option');

$footer_contact_title = get_field('footer_contact_title', 'option');
$footer_contact_address = get_field('footer_contact_address', 'option');
$footer_contact_phone_number = get_field('footer_contact_phone_number', 'option');
$footer_contact_email = get_field('footer_contact_email', 'option');

$footer_follow_us_title = get_field('footer_follow_us_title', 'option');
$footer_social_media = get_field('footer_social_media', 'option');
$copyright = get_field('copyright', 'option');
?>

	<footer id="colophon" class="footer-site" >
		<div class="container">
			<div class="main-footer-site">
				<div class="footer-part site-map">
					<div class="house-bg-ft"><img src="<?php echo get_template_directory_uri()?>/images/house-bg-ft.jpg"></div>
					<?php 
					if(!empty($footer_site_map_title)) { 
						echo '<h3>'.$footer_site_map_title.'</h3>';
					}

					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu'
						)
					);
					?>
					<?php
						if(!empty($copyright)): ?>
						<span><?php echo str_replace('YYYY', date('Y'), $copyright); ?></span>
						<?php endif;
					 ?>
				</div>

				<?php if(!empty($footer_library_hours_title) || !empty($footer_library_hours)) { ?>
				<div class="footer-part library-house">
					<?php 
					if(!empty($footer_library_hours_title)) {
						echo '<h3>'.$footer_library_hours_title.'</h3>';
					}
					
					echo apply_filters( 'the_content', $footer_library_hours );
					?>
				</div>
				<?php } ?>
				
				<div class="footer-part contact">
					<?php 
					if(!empty($footer_contact_title)) {
						echo '<h3>'.$footer_contact_title.'</h3>';
					}
					
					if(!empty($footer_contact_address)) {
						echo '<address>'.$footer_contact_address.'</address>';
					}

					if(!empty($footer_contact_phone_number)) {
						echo '<a href="tel:'.$footer_contact_phone_number.'">'.$footer_contact_phone_number.'</a>';	
					}

					if(!empty($footer_contact_email)) {
						echo '<a href="mailto:'.$footer_contact_email.'">'.$footer_contact_email.'</a>';
					}
					?>
				</div>

				<div class="footer-part follow-us">
					<?php 
					if(!empty($footer_follow_us_title)) {
						echo '<h3>'.$footer_follow_us_title.'</h3>';
					}

					if(!empty($footer_social_media)) {
					?>
					<div class="social-icon">
						<ul>
							<?php foreach ($footer_social_media as $values) { ?>
							<li><a href="<?php echo $values['fsm_social_link']; ?>" target="_blank"><img src="<?php echo $values['fsm_social_icon']; ?>"></a></li>
							<?php } ?>						
						</ul>				
					</div>
					<?php } ?>

					<?php
						if(!empty($copyright)): ?>
						<span><?php echo str_replace('YYYY', date('Y'), $copyright); ?></span>
						<?php endif; 
					?>

					

				</div>

			</div>
		</div>

	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
