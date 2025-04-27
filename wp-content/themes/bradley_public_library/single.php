<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bradley_public_library
 */

get_header();
?>

	<section id="primary" class="site-main">
		<div class="container">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				/*the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'bradley_public_library' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'bradley_public_library' ) . '</span> <span class="nav-title">%title</span>',
					)
				);*/

			endwhile; // End of the loop.
			?>
		</div>
	</section>

<?php
get_footer();
