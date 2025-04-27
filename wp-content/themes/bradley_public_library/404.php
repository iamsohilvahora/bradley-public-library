<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bradley_public_library
 */

get_header();
?>

	<section id="primary" class="site-main error-404 not-found">
		<div class="container">

			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( '404' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
			<h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'hqc' ); ?></h2>
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'hqc' ); ?></p>
           <a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to Home</a>
            </div>
		</div>
	</section>

<?php
get_footer();
