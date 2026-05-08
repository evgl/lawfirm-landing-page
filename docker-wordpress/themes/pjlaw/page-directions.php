<?php
/**
 * Directions Page Template (오시는길)
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();
?>

<main id="main" class="site-main directions-page" role="main">

    <!-- Hero Section -->
    <section class="directions-hero">
        <div class="directions-hero__bg" style="background-image: url('<?php echo esc_url($theme_uri . '/assets/images/directions/hero.png'); ?>');">
        </div>
        <div class="directions-hero__shade"></div>
        <div class="container directions-hero__inner">
            <div class="directions-hero__header">
                <div class="directions-hero__breadcrumb">
                    <span class="directions-hero__eyebrow">오시는길</span>
                    <span class="directions-hero__line"></span>
                </div>
                <h1 class="directions-hero__title">
                    법률사무소 평정을 <br />
                    찾아오시는길을 안내합니다
                </h1>
            </div>

            <div class="directions-hero__footer">
                <nav class="directions-hero__breadcrumb-nav" aria-label="<?php esc_attr_e('페이지 경로', 'pjlaw'); ?>">
                    <a class="directions-hero__breadcrumb-home" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('홈', 'pjlaw'); ?>">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/directions/icon-home.svg'); ?>" alt="" aria-hidden="true" width="20" height="18" />
                    </a>
                    <div class="directions-hero__breadcrumb-items">
                        <div class="directions-hero__breadcrumb-item">
                            <span>평정소개</span>
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/directions/icon-arrow.svg'); ?>" alt="" aria-hidden="true" class="directions-hero__breadcrumb-arrow" />
                        </div>
                        <div class="directions-hero__breadcrumb-item directions-hero__breadcrumb-item--active">
                            <span>오시는길</span>
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/directions/icon-arrow.svg'); ?>" alt="" aria-hidden="true" class="directions-hero__breadcrumb-arrow" />
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="directions-map-section">
        <div class="container directions-map-section__inner">

            <div class="directions-map-section__intro">
                <p class="directions-map-section__intro-text">
                    일상의 평온을 되찾기 위한 첫걸음<br />
                    법률사무소 평정이 든든한 버팀목이 되어 드리겠습니다
                </p>
            </div>

            <div class="directions-map-section__content">

                <!-- Map Image / Embed -->
                <div class="directions-map-section__map-wrap">
                    <img
                        class="directions-map-section__map-img"
                        src="<?php echo esc_url($theme_uri . '/assets/images/directions/map.png'); ?>"
                        alt="<?php esc_attr_e('법률사무소 평정 지도', 'pjlaw'); ?>"
                    />
                    <div class="directions-map-section__map-pin" aria-hidden="true"></div>
                </div>

                <!-- Info Row -->
                <div class="directions-map-section__info-row">
                    <div class="directions-map-info">
                        <h2 class="directions-map-info__name">법률사무소 평정</h2>
                        <div class="directions-map-info__details">
                            <div class="directions-map-info__detail-row">
                                <span class="directions-map-info__label">주소</span>
                                <span class="directions-map-info__value">서울특별시 강남구 논현로63길 71, 6층</span>
                            </div>
                            <div class="directions-map-info__detail-row">
                                <span class="directions-map-info__label">대표전화</span>
                                <span class="directions-map-info__value">02-554-5674</span>
                            </div>
                        </div>
                    </div>

                    <div class="directions-map-info__actions">
                        <a
                            href="https://map.naver.com/v5/search/서울특별시 강남구 논현로63길 71"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="directions-map-info__btn"
                            id="btn-naver-map"
                        >
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/about/icon-directions.svg'); ?>" alt="" aria-hidden="true" class="directions-map-info__btn-icon directions-map-info__btn-icon--map" />
                            <span>지도로 보기</span>
                        </a>
                        <a
                            href="https://map.naver.com/v5/entry/address/37.5101,127.0283?lng=127.0283&lat=37.5101&type=0"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="directions-map-info__btn"
                            id="btn-street-view"
                        >
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/directions/icon-street.svg'); ?>" alt="" aria-hidden="true" class="directions-map-info__btn-icon directions-map-info__btn-icon--street" />
                            <span>거리뷰로 보기</span>
                        </a>
                    </div>
                </div>

                <div class="directions-map-section__divider"></div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer directions-footer" role="contentinfo">
        <div class="footer-bottom directions-footer__bottom">
            <div class="container">
                <div class="footer-legal">
                    <div class="legal-top">
                        <a href="<?php echo esc_url(home_url('/directions/')); ?>">오시는길</a>
                        <span class="divider"></span>
                        <a href="<?php echo esc_url(home_url('/privacy/')); ?>" class="bold">개인정보처리방침</a>
                    </div>
                    <div class="legal-separator"></div>
                        <div class="legal-bottom">
                            <div class="legal-info">
                            <p>서울특별시 강남구 논현로63길 71, 6층&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel : 02-554-5674</p>
                            <p class="copyright">Copyright ⓒ Pyeongjeong. All Rights Reserved</p>
                        </div>
                        <div class="footer-logo-wrap">
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/about/footer-logo.png'); ?>" alt="<?php esc_attr_e('법률사무소 평정', 'pjlaw'); ?>" class="footer-logo" />
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="scroll-top">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/home/scroll-top.svg'); ?>" alt="<?php esc_attr_e('Top', 'pjlaw'); ?>" />
            </a>
        </div>
    </footer>

    <?php pjlaw_render_quick_actions_menu(); ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
