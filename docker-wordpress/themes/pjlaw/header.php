<?php
/**
 * Header Template
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <header class="header" role="banner">
        <div class="container-full">
            <nav class="navbar" role="navigation" aria-label="<?php esc_attr_e('Main Navigation', 'pjlaw'); ?>">
                <div class="navbar-brand">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-white.png'); ?>" alt="<?php bloginfo('name'); ?>" class="logo-white" />
                    </a>
                </div>
                
                <div class="navbar-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'items_wrap' => '<ul class="navbar-nav">%3$s</ul>',
                        'fallback_cb' => 'pjlaw_fallback_menu',
                    ));
                    ?>
                </div>
                
                <div class="navbar-actions">
                    <a href="<?php echo esc_url(home_url('/consultation/')); ?>" class="btn-reserve"><?php esc_html_e('상담예약', 'pjlaw'); ?></a>
                    <button class="navbar-toggle" id="navbar-toggle" aria-label="<?php esc_attr_e('Toggle Menu', 'pjlaw'); ?>">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </nav>
        </div>
    </header>

<?php

/**
 * Fallback menu
 */
function pjlaw_fallback_menu() {
    echo '<ul class="navbar-nav">';
    echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . esc_html__('소개', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/services/')) . '">' . esc_html__('업무분야', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/cases/')) . '">' . esc_html__('성공사례', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">' . esc_html__('상담문의', 'pjlaw') . '</a></li>';
    echo '</ul>';
}
?>
