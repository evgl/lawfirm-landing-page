<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip to main content for accessibility -->
<a class="skip-link screen-reader-text" href="#main"><?php _e('Skip to main content', 'law-firm-pyeongjeong'); ?></a>

<!-- Site Header -->
<header class="site-header" role="banner">
    <div class="header-container">
            <!-- Site Logo/Branding -->
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                        <?php 
                        $site_name = get_bloginfo('name');
                        if ($site_name) :
                            echo esc_html($site_name);
                        else :
                            echo __('법률사무소 평정', 'law-firm-pyeongjeong');
                        endif;
                        ?>
                    </a>
                <?php endif; ?>
                
                <?php 
                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()) : ?>
                    <div class="site-description"><?php echo $description; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?></div>
                <?php endif; ?>
            </div>

            <!-- Primary Navigation -->
            <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'law-firm-pyeongjeong'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'primary-menu',
                    'container' => false,
                    'fallback_cb' => 'law_firm_fallback_menu',
                ));
                ?>
            </nav>

            <!-- Header Contact Info -->
            <?php if (is_active_sidebar('header-contact')) : ?>
                <div class="header-contact">
                    <?php dynamic_sidebar('header-contact'); ?>
                </div>
            <?php else : ?>
                <div class="header-contact">
                    <div class="contact-item">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('law_firm_phone', '02-554-6674'))); ?>">
                            <?php echo esc_html(get_theme_mod('law_firm_phone', '02-554-6674')); ?>
                        </a>
                    </div>
                    <div class="consultation-btn">
                        <a href="#consultation-form" class="btn btn-primary btn-small" data-scroll-to="consultation-form">
                            <?php _e('무료상담', 'law-firm-pyeongjeong'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" aria-controls="primary-navigation" aria-expanded="false">
                <i class="fas fa-bars" aria-hidden="true"></i>
                <span class="screen-reader-text"><?php _e('Menu', 'law-firm-pyeongjeong'); ?></span>
            </button>
    </div>
    </div>
</header>

<!-- Quick Menu Sidebar -->
<aside class="quick-menu" role="complementary" aria-label="<?php esc_attr_e('Quick Actions', 'law-firm-pyeongjeong'); ?>">
    <div class="quick-menu-header">
        <span>Quick<br>Menu</span>
    </div>
    <div class="quick-menu-items">
        <?php
        $consultation_page = get_page_by_path('consultation');
        $consultation_link = $consultation_page ? get_permalink($consultation_page) : '#consultation-form';
        
        if (has_nav_menu('quick-menu')) {
            wp_nav_menu(array(
                'theme_location' => 'quick-menu',
                'container' => false,
                'menu_class' => 'quick-menu-list',
            ));
        } else {
            ?>
            <a href="<?php echo esc_url($consultation_link); ?>" class="quick-menu-item" title="<?php esc_attr_e('온라인예약', 'law-firm-pyeongjeong'); ?>">
                <i class="fas fa-file-signature" aria-hidden="true"></i>
                <span><?php _e('온라인예약', 'law-firm-pyeongjeong'); ?></span>
            </a>
            <a href="#" class="quick-menu-item" title="<?php esc_attr_e('카톡예약', 'law-firm-pyeongjeong'); ?>">
                <i class="fas fa-comment" aria-hidden="true"></i>
                <span><?php _e('카톡예약', 'law-firm-pyeongjeong'); ?></span>
            </a>
            <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('law_firm_phone', '02-554-6674'))); ?>" class="quick-menu-item" title="<?php esc_attr_e('전화예약', 'law-firm-pyeongjeong'); ?>">
                <i class="fas fa-phone" aria-hidden="true"></i>
                <span><?php _e('전화예약', 'law-firm-pyeongjeong'); ?></span>
            </a>
            <?php
        }
        ?>
    </div>
</aside>

<!-- Main Content Area -->
<main id="main" class="site-main" role="main">
