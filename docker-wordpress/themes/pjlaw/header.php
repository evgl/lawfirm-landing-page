<?php
/**
 * Header Template
 */

if (!defined('ABSPATH')) {
    exit;
}

$request_path = isset($_SERVER['REQUEST_URI']) ? wp_parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) : '';
$is_directions_page = is_page('directions') || is_page_template('page-directions.php') || trim((string) $request_path, '/') === 'directions';
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
    
    <header class="header<?php echo $is_directions_page ? ' header--directions' : ''; ?>" role="banner">
        <div class="container-full">
            <nav class="navbar" role="navigation" aria-label="<?php esc_attr_e('Main Navigation', 'pjlaw'); ?>">
                <div class="navbar-brand">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri() . ($is_directions_page ? '/assets/images/home/logo-directions.png' : '/assets/images/home/logo-white.png')); ?>" alt="<?php bloginfo('name'); ?>" class="<?php echo $is_directions_page ? 'logo-directions' : 'logo-white'; ?>" />
                    </a>
                </div>
                
                <button class="navbar-toggler" aria-label="<?php esc_attr_e('메뉴 열기', 'pjlaw'); ?>" aria-expanded="false">
                    <span class="toggler-bar"></span>
                    <span class="toggler-bar"></span>
                    <span class="toggler-bar"></span>
                </button>

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
                    <a href="<?php echo esc_url(home_url('/all-menu/')); ?>" class="btn-hamburger" aria-label="<?php esc_attr_e('전체메뉴', 'pjlaw'); ?>">
                        <svg width="30" height="23" viewBox="0 0 30 23" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M28.5 20C29.3284 20 30 20.6716 30 21.5C30 22.3284 29.3284 23 28.5 23H1.5C0.671573 23 0 22.3284 0 21.5C0 20.6716 0.671573 20 1.5 20H28.5ZM28.5 10C29.3284 10 30 10.6716 30 11.5C30 12.3284 29.3284 13 28.5 13H13.5C12.6716 13 12 12.3284 12 11.5C12 10.6716 12.6716 10 13.5 10H28.5ZM28.5 0C29.3284 1.93277e-07 30 0.671573 30 1.5C30 2.32843 29.3284 3 28.5 3H1.5C0.671573 3 0 2.32843 0 1.5C0 0.671573 0.671573 1.20798e-08 1.5 0H28.5Z" fill="currentColor"/>
                        </svg>
                    </a>
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
    // 1. 평정소개
    echo '<li class="menu-item menu-item-has-children">';
    echo '<a href="' . esc_url(home_url('/about/')) . '">' . esc_html__('평정소개', 'pjlaw') . '</a>';
    echo '<ul class="sub-menu">';
    echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . esc_html__('가치관', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/why-pjlaw/')) . '">' . esc_html__('왜 평정인가?', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/team/')) . '">' . esc_html__('구성원 소개', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/directions/')) . '">' . esc_html__('오시는길', 'pjlaw') . '</a></li>';
    echo '</ul>';
    echo '</li>';
    // 2. 업무분야
    echo '<li class="menu-item menu-item-has-children">';
    echo '<a href="' . esc_url(home_url('/services/')) . '">' . esc_html__('업무분야', 'pjlaw') . '</a>';
    echo '<ul class="sub-menu">';
    echo '<li><a href="' . esc_url(home_url('/services/')) . '">' . esc_html__('분야별', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/services/')) . '">' . esc_html__('전체', 'pjlaw') . '</a></li>';
    echo '</ul>';
    echo '</li>';
    // 3. 블로그
    echo '<li class="menu-item menu-item-has-children">';
    echo '<a href="' . esc_url(home_url('/blog/')) . '">' . esc_html__('블로그', 'pjlaw') . '</a>';
    echo '<ul class="sub-menu">';
    echo '<li><a href="' . esc_url(home_url('/blog/')) . '">' . esc_html__('전체', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog/')) . '">' . esc_html__('법률정보', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog/')) . '">' . esc_html__('대응전략', 'pjlaw') . '</a></li>';
    echo '</ul>';
    echo '</li>';
    // 4. 업무사례
    echo '<li class="menu-item">';
    echo '<a href="' . esc_url(home_url('/cases/')) . '">' . esc_html__('업무사례', 'pjlaw') . '</a>';
    echo '</li>';
    // 5. 인재채용
    echo '<li class="menu-item menu-item-has-children">';
    echo '<a href="' . esc_url(home_url('/careers/')) . '">' . esc_html__('인재채용', 'pjlaw') . '</a>';
    echo '<ul class="sub-menu">';
    echo '<li><a href="' . esc_url(home_url('/careers/')) . '">' . esc_html__('전체', 'pjlaw') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/careers/')) . '">' . esc_html__('채용공고', 'pjlaw') . '</a></li>';
    echo '</ul>';
    echo '</li>';
    echo '</ul>';
}
?>
