<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bradley_public_library
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="" type="image/png" sizes="">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri()?>/images/favicon-32x32.png">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 

wp_body_open(); 

$site_logo = get_field('site_logo', 'option');
$logo_image = $site_logo['sizes']['site_logo_image'];
$location_icon = get_field('location_icon', 'option');
$phone_icon = get_field('phone_icon', 'option');

$header_location_address = get_field('header_location_address', 'option');
$header_phone_number = get_field('header_phone_number', 'option');
$header_social_media = get_field('header_social_media', 'option');

$search_url = get_field('search_url', 'option');
$search_type_key = get_field('search_type_key', 'option');
$search_type = get_field('search_type', 'option');
$search_key = get_field('search_key', 'option');
?>
<div>

	<?php if(!empty($header_location_address) || !empty($header_phone_number)) { ?>
	<!-- Start - Header top section -->
<header class="header-section">
	<div id="topbar" class="top-header">
		<div class="container">
			<!-- social --> 
			<div class="social-links">
			   <ul class="social-info">
			   		<?php if(!empty($header_location_address)) { ?>
					<li class="address">
					 	<a>
					 		<img src="<?php echo $location_icon['url']; ?>" class="img-fluid" alt="">
					 	<span class="location"><?php echo $header_location_address; ?></span></a>
					</li>
					<?php 
			  		}

			  		if(!empty($header_phone_number)) { 
					?>
					<li class="phone-number">
					 	<a href="<?php echo 'tel:'.$header_phone_number; ?>"><img src="<?php echo $phone_icon['url']; ?>" class="img-fluid" alt=""><span><?php echo $header_phone_number; ?></span></a>
					</li>
					<?php } ?>
			   </ul>
			</div>
			<div class="cf"></div>
		</div>
	</div>
	<!-- End - Header top section -->
	<?php } ?>

	<!-- Start - Header section -->
	<div id="header" class="header-middle">
		<div class="container">
			<div class="middle-part">
			<?php if(!empty($logo_image)): ?>	
			<div class="logo">
					<a href="<?php echo home_url(); ?>">
					    <img src="<?php echo $logo_image; ?>" alt="" class="img-fluid">
					</a>
			</div>
			<?php endif; ?>

			<!-- Start - header menu section -->
			<div id="site-navigation" class="nav-menu">
               <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
			   <?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
              
			</div>
			<!-- End - header menu section -->

			<?php if(!empty($header_social_media)) { ?>
			<!-- Start - header social section -->
			<div class="social">
				<ul>
					<?php 
					foreach ($header_social_media as $key => $values) {
						echo '<li><a href="'.$values['social_link'].'" class="social-icons" target="_blank"><img src="'.$values['hsm_social_icon'].'" class="img-fluid"></a></li>';
					} 
					?>
					<?php /* <img src="'.$values['hsm_social_icon'].'" class="img-fluid"> */ ?>
				</ul>
			</div>
			<!-- End - header social section -->
		</div> <!-- END-middle-part -->
			<?php } ?>
		</div>
	</div>
	<!-- End - Header section -->

	<!-- Start - Header Search section -->
	<div class="searchbar">
		<div class="container">
			<div class="mainsearch">
				<form method="POST" id="header-search-form">
					<input type="hidden" name="search_url" value="<?php echo $search_url; ?>">
					<input type="hidden" name="search_type_key" value="<?php echo $search_type_key; ?>">
					<div class="header-bottom-details">
					<div class="searchbox">
						<label class="search-white">Search</label>
						<?php if(!empty($search_type)) { ?>
						<div class="down-arrow dropdown-box" id="search-type-option">
							<select name="<?php echo $search_type_key; ?>">
								<?php foreach ($search_type as $key => $values) { ?>
								<option value="<?php echo $values['search_type_value']; ?>"><?php echo $values['search_type_title']; ?></option>
								<?php } ?>
							</select>
							<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/down-arrow.png" class="img-fluid"> -->
						</div>
						<?php } ?>
					</div>

					<!-- Find books, programs, and more... -->
					<div class="findbox">
						<input class="find-title" type="text" name="<?php echo $search_key; ?>" placeholder="Find books, programs, and more..." required="required">

						<div class="radiobutton">
							<label class="text-catalog">
								<input type="radio" name="search-option" id="catalog" value="catalog" checked>
								<span>Catalog</span>
							</label>
							<label class="text-catalog">
								<input type="radio" name="search-option" id="website" value="website">
								<span>website</span>
							</label>
						</div>

						<div class="search-img">
							<button id="search-btn">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/search-img.png" class="img-fluid">
							</button>
						</div>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</header>
	<!-- End - Header Search section -->
