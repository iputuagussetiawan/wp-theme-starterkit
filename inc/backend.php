<?php
//custom logo
function tmdr_custom_logo_setup()
{
    $defaults = array(
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'tmdr_custom_logo_setup');

function tmdr_change_logo_class($html)
{
    $html = str_replace('custom-logo-link', 'navbar-brand', $html);
    $html = str_replace('custom-logo', 'img-responsive', $html);
    return $html;
}
add_filter('get_custom_logo', 'tmdr_change_logo_class');

function tmdr_login_css()
{
    $custom_logo = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo, 'full');

?>
    <style type="text/css">
        #login h1 a {
            background-image: url(<?php echo $logo[0] ?>);
            width: 281px;
            height: 164px;
            /* margin-bottom: 10px; */
            background-position: bottom;
            background-size: contain;
            background-repeat: no-repeat;
        }

        body {
            background-color: #fff !important;
        }

        .login form {
            border: none !important;
            box-shadow: none !important;
        }
    </style>
<?php
}
add_action('login_enqueue_scripts', 'tmdr_login_css');
?>