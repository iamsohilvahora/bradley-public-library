<?php 

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'bradley_public_library_scripts' );
function bradley_public_library_scripts() {
	wp_enqueue_style( 'bradley_public_library-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'bradley_public_library-style', 'rtl', 'replace' );
    wp_enqueue_style( 'hqc-responsive', get_template_directory_uri(). '/css/responsive.css');
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bradley_public_library-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bradley_public_library-custom', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );
	wp_localize_script( 'bradley_public_library-custom', 'bplc_url', bradley_public_library_admin_URL() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

