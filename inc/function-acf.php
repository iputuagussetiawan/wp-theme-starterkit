<?php
if (function_exists('acf_add_options_page')) {
    // acf_add_options_page(array(
    //     'page_title' => 'Theme Setting',
    //     'menu_title' => 'Theme Setting',
    //     'menu_slug' => 'theme-setting',
    //     'post_id' => 'theme-setting',
    //     'capability' => 'edit_posts',
    //     'redirect' => true,
    //     'icon_url' => 'dashicons-art',
    //     'position' => '2'
    // ));
    acf_add_options_page(array(
        'page_title' => 'Profile Info',
        'menu_title' => 'Profile Info',
        'menu_slug' => 'company-setting',
        'post_id' => 'company-setting',
        'capability' => 'edit_posts',
        'redirect' => true,
        'icon_url' => 'dashicons-building',
        'position' => '3'
    ));
    acf_add_options_page(array(
        'page_title' => 'Page Link',
        'menu_title' => 'Page Link',
        'menu_slug' => 'page-link',
        'post_id' => 'page_link',
        'capability' => 'edit_posts',
        'redirect' => true,
        'icon_url' => 'dashicons-cloud-saved',
        'position' => '3'
    ));

    // acf_add_options_page(array(
    //     'page_title' => 'Social',
    //     'menu_title' => 'Social Icons',
    //     'menu_slug' => 'social-icons',
    //     'post_id' => 'social_icons',
    //     'capability' => 'edit_posts',
    //     'redirect' => true,
    //     'icon_url' => 'dashicons-share',
    //     'position' => '5'
    // ));
    // acf_add_options_sub_page(array(
    //     'page_title'      => 'About',
    //     'menu_title'      => 'About',
    //     'parent_slug'     => 'about-company',
    //     'menu_slug'       => 'about',
    //     'post_id'         => 'about',
    //     'updated_message' => __("For Company Intro Data", 'acf')
    // ));

    // acf_add_options_sub_page(array(
    //     'page_title'      => 'Company Intro',
    //     'menu_title'      => 'Company Intro',
    //     'parent_slug'     => 'about-company',
    //     'menu_slug'       => 'company-intro',
    //     'post_id'         => 'company_intro',
    //     'updated_message' => __("For Company Intro Data", 'acf')
    // ));
    // acf_add_options_sub_page(array(
    //     'page_title'      => 'Slider Image',
    //     'menu_title'      => 'Slider Image',
    //     'parent_slug'     => 'about-company',
    //     'menu_slug'       => 'slider-image',
    //     'post_id'         => 'slider_image',
    //     'updated_message' => __("Slider Image Updated", 'acf')
    // ));

    // acf_add_options_sub_page(array(
    //     'page_title'  => 'Welcome Text',
    //     'menu_title'  => 'Welcome Text',
    //     'parent_slug' => 'about_company',
    //     'menu_slug'   => 'welcome-text',
    //     'post_id'     => 'welcome_text',
    //     'updated_message' => __("Welcome Text Updated", 'acf')
    // ));





}
