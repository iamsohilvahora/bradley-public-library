<?php
/**
Template Name: E-Library
**/

get_header();

$post_id = get_queried_object_id();
$content_post = get_post($post_id);
$title = $content_post->post_title;
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);

$library_box = get_field('library_box');
?>
<section id="primary" class="site-main">
<div class="container">
	<!-- Start - Start Left section -->
	 
	<div class="page-content">
	 
       <div class="e-library-content">
		   <div class="entry-header">
			<h1 class="entry-title"><?php echo $title; ?></h1>
            </div>
            
			<?php echo $content; ?>

			<?php if(!empty($library_box)) { ?>
				<ul class="items-box">
					<?php 
		  			foreach ($library_box as $values) { 

		  				$library_url = '';
			  			if($values['library_links'] == 'internal' && !empty($values['library_internal_link'])) {
		  					$library_url = bradley_public_library_external_link($values['library_internal_link'], false);
			  			} else if($values['library_links'] == 'external' && !empty($values['library_external_link'])) {
			  				$library_url = bradley_public_library_external_link($values['library_external_link'], true);
			  			}
		  			?>
		  				<li>
		  					<?php if(!empty($values['library_logo'])) { ?>
							<a <?php echo $library_url; ?>>
								<img src="<?php echo $values['library_logo']; ?>" class="img-fluid">
							</a>
							<?php } ?>

							<div class="texts">
								<?php 
									if(!empty($values['library_title'])) {
										echo '<a '.$library_url.'>';
										echo '<h3>'.$values['library_title'].'</h3>';
										echo '</a>';
									}

									echo apply_filters( 'the_content', $values['library_content']);
								?>
							</div>
						</li>
		  				<?php
		  			} 
		  			?>
				</ul>
			<?php } ?>
			</div>
		 	</div>
	<!-- End - Start Left section -->
	<?php get_sidebar(); ?>
	</div>
</section>
<?php 
get_footer();
