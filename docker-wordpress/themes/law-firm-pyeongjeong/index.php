<?php
/**
 * Main Template File - Homepage with sectioned layout matching page_1.png design
 * 
 * @package Law_Firm_Pyeongjeong
 * @since 1.0.0
 */

get_header(); ?>

<!-- Main Hero Section -->
<section id="home-hero" class="homepage-hero">
    <!-- Professional Background with Overlay -->
    <div class="hero-background">
        <div class="hero-bg-image"></div>
        <div class="hero-overlay"></div>
    </div>
    
    <div class="hero-content">
        <!-- Main Logo Section -->
        <div class="hero-logo-section">
            <div class="main-logo">
                <?php if (has_custom_logo()) : ?>
                    <div class="hero-logo-image"><?php the_custom_logo(); ?></div>
                <?php else : ?>
                    <div class="law-firm-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-white.svg" alt="<?php echo esc_attr__('법률사무소 평정', 'law-firm-pyeongjeong'); ?>" class="hero-logo-image">
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Professional Search Section -->
        <!-- <div class="hero-search-section">
            <div class="search-container">
                <form class="hero-search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>" role="search">
                    <div class="search-input-wrapper">
                        <input type="search" 
                               name="s" 
                               class="search-input"
                               placeholder="<?php esc_attr_e('법률 상담이나 서비스를 검색하세요', 'law-firm-pyeongjeong'); ?>"
                               value="<?php echo get_search_query(); ?>"
                               aria-label="<?php esc_attr_e('검색', 'law-firm-pyeongjeong'); ?>">
                        <button type="submit" class="search-button" aria-label="<?php esc_attr_e('검색', 'law-firm-pyeongjeong'); ?>">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div> -->

        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <span>Scroll</span>
            <i class="fas fa-chevron-down" aria-hidden="true"></i>
        </div>
    </div>

    <!-- Bottom Contact Bar -->
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
                <a href="<?php echo esc_url(home_url('/contact/#consultation-form')); ?>" class="contact-btn consultation-btn">
                    <i class="fas fa-calendar-check" aria-hidden="true"></i>
                    <?php esc_html_e('상담하기', 'law-firm-pyeongjeong'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="content-section about-section">
    <div class="section-container">
        <div class="for-you-content">
            <div class="for-you-text-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/for-you-text.png" alt="<?php echo esc_attr__('당신을 위해', 'law-firm-pyeongjeong'); ?>" class="for-you-text-image">
            </div>
        </div>
    </div>
</section>

<!-- Help Section -->
<section id="help-section" class="content-section help-section">
    <div class="section-container">
        <div class="for-you-content">
            <div class="for-you-text-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/help-for-you-text.png" alt="<?php echo esc_attr__('당신을 위해', 'law-firm-pyeongjeong'); ?>" class="for-you-text-image">
            </div>
        </div>
    </div>
</section>

<!-- Additional Help Section -->
<section id="additional-help-section" class="content-section additional-help-section">
    <div class="section-container">
        <div class="location-content">
            <div class="location-right">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/location-text-1.png" alt="<?php echo esc_attr__('위치 정보 1', 'law-firm-pyeongjeong'); ?>" class="location-text-image">
                <div class="address-box">
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    <span class="address-text">서울 강남구 테헤란로 238, 12층</span>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/location-text-3.png" alt="<?php echo esc_attr__('위치 정보 3', 'law-firm-pyeongjeong'); ?>" class="location-text-image">
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
