<?php
/**
 * Standalone About Page
 * 
 * @package Law_Firm_Pyeongjeong
 * @since 1.0.0
 */

// Custom header without quick menu
?>
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

<body <?php body_class(); ?> style="background-color: white;">
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
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-white.svg" alt="<?php echo esc_attr__('법률사무소 평정', 'law-firm-pyeongjeong'); ?>" class="logo-image">
                    </a>
                <?php endif; ?>
                
                <?php 
                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()) : ?>
                    <div class="site-description"><?php echo $description; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?></div>
                <?php endif; ?>
            </div>

            <!-- Header Right Section -->
            <div class="header-right">
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

            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" aria-controls="primary-navigation" aria-expanded="false">
                <i class="fas fa-bars" aria-hidden="true"></i>
                <span class="screen-reader-text"><?php _e('Menu', 'law-firm-pyeongjeong'); ?></span>
            </button>
    </div>
</header>

<!-- Main Content Area -->
<main id="main" class="site-main" role="main" style="background-color: white;">

<!-- About Content Area with Background -->
<section class="about-hero-section">
    <div class="about-hero-content">
        <div class="about-hero-text">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/page-text.png" alt="평정 법률사무소 소개 텍스트" loading="lazy">
        </div>
        <div class="about-hero-profile">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/profile-image.png" alt="담당 변호사 프로필" loading="lazy">
        </div>
        <div class="about-hero-experience">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/experience.png" alt="주요 경력 및 수상 현황" loading="lazy">
        </div>
    </div>
</section>

<!-- Bottom Contact Bar (Same as Main Page) -->
<div class="hero-bottom-contact">
    <div class="contact-info-wrapper">
        <div class="contact-phone">
            <i class="fas fa-phone" aria-hidden="true"></i>
            <div class="phone-info">
                <span class="phone-label"><?php esc_html_e('24시간 미팅상담', 'law-firm-pyeongjeong'); ?></span>
                <a href="tel:02-554-5674" class="phone-number">02-554-5674</a>
            </div>
        </div>
        <div class="contact-buttons">
            <a href="#" class="contact-btn kakao-btn">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/kakao-icon.svg" alt="KakaoTalk" />
                <?php esc_html_e('카톡상담', 'law-firm-pyeongjeong'); ?>
            </a>
            <a href="<?php echo esc_url(home_url('/contact/#contact')); ?>" class="contact-btn consultation-btn">
                <i class="fas fa-calendar-check" aria-hidden="true"></i>
                <?php esc_html_e('상담하기', 'law-firm-pyeongjeong'); ?>
            </a>
        </div>
    </div>
</div>

</main>

<?php wp_footer(); ?>
</body>
</html>
