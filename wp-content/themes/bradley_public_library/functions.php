<?php
require get_template_directory().'/include/themesetup.php'; //Theme setup and widgets , custom option pages 
require get_template_directory().'/include/enqueue_scripts.php'; //Enqueue Scripts and style
require get_template_directory().'/include/general_function.php'; //General Function For Theme
require get_template_directory().'/include/custom_image_size.php'; //Custom Image Size

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */