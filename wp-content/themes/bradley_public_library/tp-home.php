<?php
/**
Template Name: Home
**/
get_header();

$banner_image = get_field('banner_image');
$mobile_banner_image = get_field('mobile_banner_image');

$callouts_section = get_field('callouts_section', 'option');

$library_news_title = get_field('library_news_title');
$library_news = get_field('library_news');

$default_library_news_image = get_field('default_library_news_image', 'option');
?>
	<!-- Start - banner section -->
	<div class="banner-main">
		<div class="container">	 
			<div class="banner mobile-img">
				<img src="<?php echo $mobile_banner_image['sizes']['mobile_banner_image']; ?>" alt="">
			</div>
			<div class="banner desktop-img">	
				<img src="<?php echo $banner_image['sizes']['home_banner_image']; ?>" alt="">
			</div>
			<!-- Upcoming events -->
			<div class="upcoming-events">
				<h2 class="events">Upcoming Events</h2>
				<ul>
					<li class="main-events">
						<div class="month"><span>AUG</span><span class="date">20</span></div>
						<div class="events-detail">
							<p>Social Issues Bookclub</p>
							<span class="event-time">6:30 p.m.  
								<a href="javascript:void(0);" class="register">Register Now</a>
							</span> 
						</div>
					</li>
					<li class="main-events">
						<div class="month"><span>AUG</span><span class="date">25</span></div>
						<div class="events-detail">
							<p>Crossover Club</p>
							<span class="event-time">6:30 p.m.  
								<a href="javascript:void(0);" class="register">Register Now</a>
							</span> 
						</div>
					</li>
					<li class="main-events">
						<div class="month"><span>AUG</span><span class="date">26</span></div>
						<div class="events-detail">
							<p>Wednesday Morning Bookclub</p>
							<span class="event-time">10 a.m. 
								<a href="javascript:void(0);" class="register">Register Now</a>
							</span> 
						</div>
					</li>
					<li class="main-events">
						<div class="month"><span>AUG</span><span class="date">27</span></div>
						<div class="events-detail">
							<p>Holly’s Garden</p>
							<span class="event-time">5:30 p.m. 
								<a href="javascript:void(0);" class="register">Register Now</a>
							</span> 
						</div>
					</li>
					<li class="main-events">
						<div class="month"><span>SEP</span><span class="date">15</span></div>
						<div class="events-detail">
							<p>Garden Chat Zoom Book Club</p>
							<span class="event-time">5:30 p.m.  
								<a href="javascript:void(0);" class="register">Register Now</a>
							</span> 
						</div>
					</li>
					<a href="javascript:void(0);" class="view-calendar btn">View Full Calendar</a>
				</ul>
				<div class="purchase-btn">
				</div>
			</div> 
		</div>
		<div class="cf"></div>
	</div>
	<!-- End - banner section -->

	<?php if(!empty($callouts_section)) { 
			$callouts_show_home = [];
			foreach ($callouts_section as $values) { 
					$callouts_home = $values['callouts_show_home']; 
					array_push($callouts_show_home, $callouts_home );
			}
			
			if(in_array(1, $callouts_show_home)) { ?>
			<!-- Start - Callouts section -->
			<div class="links-bar">
				<div class="container">
					<ul class="links-details">
				  		<?php 
				  		foreach ($callouts_section as $values) { 
				  			$url = '';
				  			if($values['callouts_links'] == 'internal' && !empty($values['callouts_internal_link'])) {
				  				$url = bradley_public_library_external_link($values['callouts_internal_link'], false);
				  			} else if($values['callouts_links'] == 'external' && !empty($values['callouts_external_link'])) {
				  				$url = bradley_public_library_external_link($values['callouts_external_link'], true);
				  			}
				  			if(!empty($values['callouts_show_home'])) {
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
				</div>
			</div>
			<!-- End - Callouts section -->
			<?php }  ?>
	<?php } ?>

	<?php if(!empty($library_news)) { ?>
	<!-- Start - Library news -->
	<section class="library-news">
		<div class="container">
			<?php if(!empty($library_news_title)) { ?>
			<div class="head-title"><h3><?php echo $library_news_title; ?></h3></div>
			<?php } ?>
			<div class="library-main">
				<?php 
		  		foreach ($library_news as $news_value) { 
		  			$url = '';
		  			if($news_value['lb_links'] == 'internal' && !empty($news_value['lb_external_link'])) {
		  				$url = bradley_public_library_external_link($news_value['lb_internal_link'], false);
		  			} else if($news_value['lb_links'] == 'external' && !empty($news_value['lb_external_link'])) {
		  				$url = bradley_public_library_external_link($news_value['lb_external_link'], true);
		  			}

		  			if(empty($news_value['lb_image'])) {
		  				$news_img_url = $default_library_news_image['sizes']['library_news_image'];
		  			} else {
	  					$news_img_url = $news_value['lb_image']['sizes']['library_news_image'];
		  			}
	  			?>
				<div class="library-card">
					<a <?php echo $url; ?>>
						<div class="img cover-bg" style="background-image:url('<?php echo $news_img_url; ?>')">
							<img src="<?php echo get_template_directory_uri()?>/images/placeholder-news.jpg" alt=""> 
						</div>
					</a>
					
					<div class="library-content">
					<?php
					if(!empty($news_value['lb_title'])) { 
						echo '<a '.$url.'>';
						echo '<h4>'.$news_value['lb_title'].'</h4>';
						echo '</a>';
					} 

					echo apply_filters( 'the_content', $news_value['lb_content'] ); 
					?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!-- End - Library news -->
	<?php } ?>

<?php 
get_footer();
