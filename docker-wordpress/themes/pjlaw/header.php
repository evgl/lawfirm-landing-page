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
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/logo-white.png'); ?>" alt="<?php bloginfo('name'); ?>" class="logo-white" />
                    </a>
                </div>
                
                <div class="navbar-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'items_wrap' => '<ul class="navbar-nav">%3$s</ul>',
                        'depth' => 2,
                        'fallback_cb' => 'pjlaw_fallback_menu',
                    ));
                    ?>
                </div>
                
                <div class="navbar-actions">
                    <a href="<?php echo esc_url(home_url('/consultation/')); ?>" class="btn-reserve"><?php esc_html_e('상담예약', 'pjlaw'); ?></a>
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
    echo '<li class="menu-item menu-item-has-children">';
    echo '<a href="' . esc_url(home_url('/about/')) . '">' . esc_html__('평정소개', 'pjlaw') . '</a>';
    echo '<ul class="sub-menu">';
    echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . esc_html__('가치관', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/why-pjlaw/')) . '">' . esc_html__('왜 평정인가', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/team/')) . '">' . esc_html__('구성원소개', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/directions/')) . '">' . esc_html__('오시는길', 'pjlaw') . '</a></li>';
    echo '</ul>';
    echo '</li>';
    echo '<li><a href="' . esc_url(home_url('/services/')) . '">' . esc_html__('업무분야', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/cases/')) . '">' . esc_html__('업무사례', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog/')) . '">' . esc_html__('블로그', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/careers/')) . '">' . esc_html__('인재채용', 'pjlaw') . '</a></li>';
    echo '</ul>';
}
?>
