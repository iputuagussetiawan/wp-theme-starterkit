<?php
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/function-acf.php';
require get_template_directory() . '/inc/frontend.php';
require get_template_directory() . '/inc/backend.php';
// require get_template_directory() . '/inc/polylang.php';


//Theme Assets
function tmdr_script_enqueue()
{
    $themeVersion = wp_get_theme()->get('Version');
    //css
    wp_enqueue_style('style', get_template_directory_uri() . '/dist/css/app.css', array(), $themeVersion, 'all');
    //JS

    // wp_enqueue_script('jquery');//register jquery if you need
    wp_enqueue_script('app_js', get_stylesheet_directory_uri() . '/dist/js/app.js', array(), $themeVersion, true);
    wp_enqueue_script('iconify_js', 'https://cdn.jsdelivr.net/npm/iconify-icon@1.0.1/dist/iconify-icon.min.js', array(), $themeVersion, true);

    if (is_page_template('page-home.php')) {
        wp_enqueue_style('home_css', get_template_directory_uri() . '/dist/css/home.css', array(), $themeVersion, 'all');
        wp_enqueue_script('home_js', get_template_directory_uri() . '/dist/js/home.js', array(), $themeVersion, true);
    }

    if (is_single()) {
        wp_enqueue_style('single-css', get_template_directory_uri() . '/dist/css/single.css', array(), $themeVersion, 'all');
        wp_enqueue_script('single-js', get_template_directory_uri() . '/dist/js/single.js', array(), $themeVersion, true);
    }

    if (is_404()) {
        wp_enqueue_style('page404_css', get_template_directory_uri() . '/dist/css/page404.css', array(), $themeVersion, 'all');
        wp_enqueue_script('page404_js', get_template_directory_uri() . '/dist/js/page404.js', array(), $themeVersion, true);
    }
}
add_action('wp_enqueue_scripts', 'tmdr_script_enqueue');

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});

//fuction for hide super usery
add_action('pre_user_query', 'yoursite_pre_user_query');
function yoursite_pre_user_query($user_searchs)
{
    global $current_user;
    $username = $current_user->user_login;
    if ($username != 'timedoor') {
        global $wpdb;
    }
}

function wpb_set_post_views($postID)
{
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
function wpb_get_post_views($postID)
{
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count . ' Views';
}
//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function update_counter_ajax()
{
    $postID = trim($_POST['post_id']);
    $count_key = 'download';
    $counter = get_post_meta($postID, $count_key, true);
    if ($counter == '') {
        $count = 1;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
    } else {
        $counter++;
        update_post_meta($postID, $count_key, $counter);
    }
    wp_die();
}
add_action('wp_ajax_update_counter', 'update_counter_ajax');
add_action('wp_ajax_nopriv_update_counter', 'update_counter_ajax');


function GetYouTubeId($url)
{
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    $youtube_id = $match[1];
    return $youtube_id;
}
