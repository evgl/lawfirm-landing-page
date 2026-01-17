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

<body <?php body_class('about-page'); ?>>
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
<main id="main" class="site-main" role="main">

<!-- About Content Area with Background -->
<section class="about-profiles-section">
    <!-- First Lawyer Profile: Lee Si-wan -->
    <div class="lawyer-profile lawyer-profile-left">
        <div class="profile-photo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/lawyer-lee-siwan.png" alt="<?php echo esc_attr__('이시완 변호사 프로필 사진', 'law-firm-pyeongjeong'); ?>" />
        </div>
        <div class="profile-content">
            <div class="profile-headline">
                <h2><?php echo esc_html__('책임감을 바탕으로', 'law-firm-pyeongjeong'); ?><br><?php echo esc_html__('최선의 결과를 가져다 드립니다.', 'law-firm-pyeongjeong'); ?></h2>
            </div>
            <div class="profile-name">
                <h3><?php echo esc_html__('이시완', 'law-firm-pyeongjeong'); ?> <span class="title"><?php echo esc_html__('변호사', 'law-firm-pyeongjeong'); ?></span></h3>
            </div>
            <div class="profile-details">
                <div class="detail-row">
                    <div class="detail-label"><?php echo esc_html__('학력', 'law-firm-pyeongjeong'); ?></div>
                    <div class="detail-content">
                        <p><?php echo esc_html__('서울대학교 인문대학 최우등 졸업', 'law-firm-pyeongjeong'); ?></p>
                        <p><?php echo esc_html__('서울대학교 법학전문대학원 졸업', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><?php echo esc_html__('경력', 'law-firm-pyeongjeong'); ?></div>
                    <div class="detail-content">
                        <p><?php echo esc_html__('김앤장 법률사무소 인턴', 'law-firm-pyeongjeong'); ?></p>
                        <p><?php echo esc_html__('법무법인(유한) 대륜 본사', 'law-firm-pyeongjeong'); ?></p>
                        <p><?php echo esc_html__('現 법률사무소 평정', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Lawyer Profile: Gong Seon-young -->
    <div class="lawyer-profile lawyer-profile-right">
        <div class="profile-content">
            <div class="profile-headline">
                <h2><?php echo esc_html__('진심으로 소통하고,', 'law-firm-pyeongjeong'); ?><br><?php echo esc_html__('끝까지 함께하는 법률 서비스', 'law-firm-pyeongjeong'); ?></h2>
            </div>
            <div class="profile-name">
                <h3><?php echo esc_html__('공선영', 'law-firm-pyeongjeong'); ?> <span class="title"><?php echo esc_html__('변호사', 'law-firm-pyeongjeong'); ?></span></h3>
            </div>
            <div class="profile-details">
                <div class="detail-row">
                    <div class="detail-label"><?php echo esc_html__('학력', 'law-firm-pyeongjeong'); ?></div>
                    <div class="detail-content">
                        <p><?php echo esc_html__('고려대학교 졸업', 'law-firm-pyeongjeong'); ?></p>
                        <p><?php echo esc_html__('동아대학교 법학전문대학원 졸업', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-label"><?php echo esc_html__('경력', 'law-firm-pyeongjeong'); ?></div>
                    <div class="detail-content">
                        <p><?php echo esc_html__('부산지방법원 인턴', 'law-firm-pyeongjeong'); ?></p>
                        <p><?php echo esc_html__('법률사무소 제언', 'law-firm-pyeongjeong'); ?></p>
                        <p><?php echo esc_html__('現 법률사무소 평정', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-photo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/lawyer-gong-seonyoung.png" alt="<?php echo esc_attr__('공선영 변호사 프로필 사진', 'law-firm-pyeongjeong'); ?>" />
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
            <a href="https://pf.kakao.com/_XzMxmn" class="contact-btn kakao-btn" target="_blank" rel="noopener noreferrer">
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
