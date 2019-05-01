<?php

define('VERSION', '1.0.0');
function rh_blog_scripts()
{

    wp_enqueue_style('bootstrapcdn-css', '//maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css');

    wp_enqueue_style('font-awesome-css', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
    wp_enqueue_style('slick-carousel-css', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css.css');
    wp_enqueue_style('lightcase-css', '//cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/css/lightcase.min.css.css');
    wp_enqueue_style('reset-css', get_theme_file_uri('assets/css/reset.css'));
    wp_enqueue_style('common-css', get_theme_file_uri('//assets/css/common.css'));
    wp_enqueue_style('style-css', get_theme_file_uri('assets/css/style.css'));
    wp_enqueue_style('responsive-css', get_theme_file_uri('assets/css/responsive.css'));
    wp_enqueue_style('RH-Blog-css', get_stylesheet_uri());

    wp_enqueue_script('jquery-min', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array('jquery'), null, true);
    wp_enqueue_script('popper-min', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"', array('jquery'), null, true);
    wp_enqueue_script('bootstrap-min', '//maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('slick-carousel-min', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script('lightcase-min', '//cdnjs.cloudflare.com/ajax/libs/lightcase/2.5.0/js/lightcase.min.js', array('jquery'), null, true);
    wp_enqueue_script('main.js', get_theme_file_uri('assets/js/main.js'), array('jQuery'), VERSION, true);

}

add_action('wp_enqueue_scripts', 'rh_blog_scripts');

function piklist_theme_setting_pages($pages)
{
    $pages[] = array(
        'page_title' => __('Header Settings')
        , 'menu_title' => __('Header', 'rh_blog')
        , 'sub_menu' => 'themes.php' //Under Appearance menu
        , 'capability' => 'manage_options'
        , 'menu_slug' => 'header_settings'
        , 'setting' => 'header_settings'
        , 'menu_icon' => plugins_url('piklist/parts/img/piklist-icon.png')
        , 'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png')
        , 'single_line' => true
        , 'default_tab' => 'Basic'
        , 'save_text' => 'Save Header Settings',
    );

    return $pages;
}
add_filter('piklist_admin_pages', 'piklist_theme_setting_pages');
function my_custom_init()
{
    remove_post_type_support('post', 'custom-fields');
}
add_action('init', 'my_custom_init');

//SVG support to wordpress
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
