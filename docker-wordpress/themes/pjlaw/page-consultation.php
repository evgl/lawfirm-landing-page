<?php
/**
 * Consultation Page Template
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();
?>

<main id="main" class="site-main consultation-page" role="main">
    <div class="consultation-container container">
        <div class="consultation-header">
            <h1 class="consultation-title"><?php esc_html_e('상담 분야를 선택해 주세요.', 'pjlaw'); ?></h1>
        </div>

        <div class="consultation-grid">
            <a href="<?php echo esc_url(home_url('/consultation-step/?category=민사상담')); ?>" class="consultation-card" aria-label="<?php esc_attr_e('민사상담 선택', 'pjlaw'); ?>">
                <div class="consultation-card__inner">
                    <div class="consultation-card__icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/consultation/icon-civil.svg'); ?>" alt="" aria-hidden="true" />
                    </div>
                    <span class="consultation-card__label"><?php esc_html_e('민사상담', 'pjlaw'); ?></span>
                </div>
            </a>

            <a href="<?php echo esc_url(home_url('/consultation-step/?category=형사상담')); ?>" class="consultation-card" aria-label="<?php esc_attr_e('형사상담 선택', 'pjlaw'); ?>">
                <div class="consultation-card__inner">
                    <div class="consultation-card__icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/consultation/icon-criminal.svg'); ?>" alt="" aria-hidden="true" />
                    </div>
                    <span class="consultation-card__label"><?php esc_html_e('형사상담', 'pjlaw'); ?></span>
                </div>
            </a>

            <a href="<?php echo esc_url(home_url('/consultation-step/?category=성범죄상담')); ?>" class="consultation-card" aria-label="<?php esc_attr_e('성범죄상담 선택', 'pjlaw'); ?>">
                <div class="consultation-card__inner">
                    <div class="consultation-card__icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/consultation/icon-sexual.svg'); ?>" alt="" aria-hidden="true" />
                    </div>
                    <span class="consultation-card__label"><?php esc_html_e('성범죄상담', 'pjlaw'); ?></span>
                </div>
            </a>

            <a href="<?php echo esc_url(home_url('/consultation-step/?category=가사상담')); ?>" class="consultation-card" aria-label="<?php esc_attr_e('가사상담 선택', 'pjlaw'); ?>">
                <div class="consultation-card__inner">
                    <div class="consultation-card__icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/consultation/icon-family.svg'); ?>" alt="" aria-hidden="true" />
                    </div>
                    <span class="consultation-card__label"><?php esc_html_e('가사상담', 'pjlaw'); ?></span>
                </div>
            </a>

            <a href="<?php echo esc_url(home_url('/consultation-step/?category=행정상담')); ?>" class="consultation-card" aria-label="<?php esc_attr_e('행정상담 선택', 'pjlaw'); ?>">
                <div class="consultation-card__inner">
                    <div class="consultation-card__icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/consultation/icon-admin.svg'); ?>" alt="" aria-hidden="true" />
                    </div>
                    <span class="consultation-card__label"><?php esc_html_e('행정상담', 'pjlaw'); ?></span>
                </div>
            </a>

            <a href="<?php echo esc_url(home_url('/consultation-step/?category=기타상담')); ?>" class="consultation-card" aria-label="<?php esc_attr_e('기타상담 선택', 'pjlaw'); ?>">
                <div class="consultation-card__inner">
                    <div class="consultation-card__icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/consultation/icon-other.svg'); ?>" alt="" aria-hidden="true" />
                    </div>
                    <span class="consultation-card__label"><?php esc_html_e('기타상담', 'pjlaw'); ?></span>
                </div>
            </a>
        </div>
    </div>



<?php wp_footer(); ?>
</body>
</html>
