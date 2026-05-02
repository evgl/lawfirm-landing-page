<?php
/**
 * PyeongJeong Law Theme Functions
 * 
 * @package PyeongJeong_Law
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function pjlaw_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style'
    ));
    
    // Add custom image sizes
    add_image_size('case-thumbnail', 386, 218, true);
    add_image_size('hero-image', 1920, 1080, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'pjlaw'),
        'footer' => __('Footer Menu', 'pjlaw'),
    ));
    
    // Load text domain for translations
    load_theme_textdomain('pjlaw', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'pjlaw_setup');

/**
 * Enqueue Scripts and Styles
 */
function pjlaw_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('pjlaw-style', get_stylesheet_uri(), array(), '1.0.' . time());
    
    // Enqueue extended CSS
    wp_enqueue_style('pjlaw-main-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.' . time());
    
    // Enqueue Google Fonts (Inter and Outfit for premium feel)
    wp_enqueue_style('pjlaw-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700&family=Noto+Sans+KR:wght@300;400;500;700&display=swap', array(), null);
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue main JavaScript file
    wp_enqueue_script('pjlaw-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.' . time(), true);
    
    // Localize script for AJAX
    wp_localize_script('pjlaw-main', 'pjlaw_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('pjlaw_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'pjlaw_scripts');

/**
 * Register Widget Areas
 */
function pjlaw_widgets_init() {
    register_sidebar(array(
        'name' => __('Header Contact', 'pjlaw'),
        'id' => 'header-contact',
        'description' => __('Contact information in header', 'pjlaw'),
        'before_widget' => '<div class="header-contact-widget">',
        'after_widget' => '</div>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Column 1', 'pjlaw'),
        'id' => 'footer-1',
        'description' => __('First footer column', 'pjlaw'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
    ));
}
add_action('widgets_init', 'pjlaw_widgets_init');

/**
 * Custom post types
 */
function pjlaw_register_post_types() {
    // Legal Case Post Type
    register_post_type('legal_case', array(
        'labels' => array(
            'name' => __('Legal Cases', 'pjlaw'),
            'singular_name' => __('Legal Case', 'pjlaw'),
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-gavel',
    ));
}
add_action('init', 'pjlaw_register_post_types');

/**
 * Security headers
 */
function pjlaw_security_headers() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
    }
}
add_action('send_headers', 'pjlaw_security_headers');
?>
