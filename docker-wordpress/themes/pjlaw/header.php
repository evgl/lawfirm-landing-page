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
        <div class="header-top">
            <div class="container">
                <nav class="navbar" role="navigation" aria-label="<?php esc_attr_e('Main Navigation', 'pjlaw'); ?>">
                    <div class="navbar-brand">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            echo '<div class="site-logo">' . esc_html(get_bloginfo('name')) . '</div>';
                        }
                        ?>
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
                        <button class="btn btn-primary"><?php esc_html_e('상담예약', 'pjlaw'); ?></button>
                        <button class="navbar-toggle" id="navbar-toggle" aria-label="<?php esc_attr_e('Toggle Menu', 'pjlaw'); ?>">
                            <span class="hamburger"></span>
                        </button>
                    </div>
                </nav>
            </div>
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
