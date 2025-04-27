<?php 

/* Common code for some comment and sidebar admin side and front side */
function bradley_public_library_remove_version() {
    return '';
}

// Disable support for comments and trackbacks in post types
function bradley_public_library_disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if(post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}

// Close comments on the front-end
function bradley_public_library_disable_comments_status() {
    return false;
}

// Hide existing comments
function bradley_public_library_disable_comments_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}

// Remove comments page in menu
function bradley_public_library_disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}

// Redirect any user trying to access comments page
function bradley_public_library_disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url()); exit;
    }
}

// Remove comments metabox from dashboard
function bradley_public_library_disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}

// Remove comments links from admin bar
function bradley_public_library_disable_comments_admin_bar() {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}

//Use this function for remove admin bar from front-end.
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

// admin url
function bradley_public_library_admin_URL() { 
    $MyTemplatepath = get_template_directory_uri(); 
    $MyHomepath = esc_url( home_url( '/' ) ); 
    $admin_URL = admin_url( 'admin-ajax.php' ); // Your File Path
    return array(
        'admin_URL' =>  $admin_URL,
        'MyTemplatepath' =>  $MyTemplatepath,
        'MyHomepath' =>  $MyHomepath
    );
}


function bradley_public_library_custom_new_menu() {
    register_nav_menus(
        array(
            'footer-menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'bradley_public_library_custom_new_menu' );


/**
 * dispaly external link and open in new tab
 */
function bradley_public_library_external_link($link = null, $target = null) {

    if(empty($link)) {
        return;
    }

    $href_link = null;
    
    if(!empty($link) && $link != null) {
        if($link == '#' ) {
            $href_link = $link;
            $target = '';
        } else {
            $url =  trim($link);
            if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                $href_link= "http://" . $url;
            } else {
                $href_link = trim($link);
            }
        }
    }
    
    if ($target == true) {
        return 'href="'.$href_link.'" target="_blank"';
    } else {
        return 'href="'.$href_link.'"';
    }

}

add_filter('acf/fields/relationship/query', 'remove_draft_archive_link', 10, 3);
add_filter('acf/fields/page_link/query', 'remove_draft_archive_link', 10, 3);
function remove_draft_archive_link($options, $field, $the_post) {
    $options['post_status'] = array('publish');
    return $options;
}

add_filter('style_loader_src',  'bradley_public_library_remove_ver_css_js', 10, 2 );
add_filter('script_loader_src', 'bradley_public_library_remove_ver_css_js', 10, 2 );
function bradley_public_library_remove_ver_css_js( $src, $handle )  {
    $handles_with_version = [ 'style' ]; // <-- Adjust to your needs!

    if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
        $src = remove_query_arg( 'ver', $src );

    return $src;
}

add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

// AFC general setting Menu tab and Setting Function
if(function_exists('acf_add_options_page')) {
    acf_add_options_page (array(
        'page_title'=>'General Setting',
        'menu_title'=>'General Setting',
        'menu_slug'=>'theme-general-settings',
        'capability'=>'edit_posts',
        'redirect' => false
    ));
}

//add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
function add_featured_image_instruction($content) {
    global $post;
    $post_type = get_post_type();
    
    if($post_type == 'page'){
        $content .= '<p>Please upload 1920 * 375 image size </p>';
    }
    if($post_type == 'post'){
        $content .= '<p>Please upload 1920 * 375 image size </p>';
    }
    return $content;
}

