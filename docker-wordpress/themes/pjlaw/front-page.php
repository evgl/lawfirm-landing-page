<?php
/**
 * Front Page Template
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="main-content" role="main">
    <!-- Hero Section -->
    <section class="hero" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/hero-bg.png'); ?>');">
        <div class="hero-overlay">
            <div class="container hero-container">
                <div class="hero-content">
                    <h1 class="hero-title">JOURNEY OF<br />TRUST PYEONGJEONG</h1>
                    <p class="hero-subtitle"><?php esc_html_e('당신을 위해 싸워줄 신뢰할 수 있는 변호사', 'pjlaw'); ?><br /><?php esc_html_e('언제나 평정이 함께 합니다.', 'pjlaw'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Logo Section / Intro -->
    <section class="logo-section">
        <div class="logo-bg-text">PYEONG JEONG</div>
        <div class="container">
            <div class="logo-content">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/logo-white.png'); ?>" alt="PyeongJeong Logo" class="pj-logo-large" />
            </div>
        </div>
    </section>

    <!-- Overview / Intro Text -->
    <section class="overview section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('당신의 일상이 \'평정\'을 찾을 수 있도록,', 'pjlaw'); ?><br /><?php esc_html_e('처음부터 끝까지 평정이 함께합니다.', 'pjlaw'); ?></h2>
            <div class="overview-cta">
                <a href="<?php echo esc_url(home_url('/services/')); ?>" class="btn-text">
                    <?php esc_html_e('업무분야 바로가기', 'pjlaw'); ?>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="services-modern section">
        <div class="container-full">
            <div class="services-scroller">
                <!-- Civil Law -->
                <div class="service-box" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/civil.png'); ?>');">
                    <div class="service-box-content">
                        <h3><?php esc_html_e('민사', 'pjlaw'); ?></h3>
                        <p><?php esc_html_e('철저한 법리 검토를 통한 실질적인 권리 구제와 재산권 확보', 'pjlaw'); ?></p>
                    </div>
                </div>

                <!-- Criminal Law -->
                <div class="service-box" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/criminal.png'); ?>');">
                    <div class="service-box-content">
                        <h3><?php esc_html_e('형사', 'pjlaw'); ?></h3>
                        <p><?php esc_html_e('수사 단계부터 재판까지 치밀한 증거 분석과 정교한 법리 대응', 'pjlaw'); ?></p>
                    </div>
                </div>

                <!-- Sex Crime -->
                <div class="service-box" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/sex-crime.png'); ?>');">
                    <div class="service-box-content">
                        <h3><?php esc_html_e('성범죄', 'pjlaw'); ?></h3>
                        <p><?php esc_html_e('사건의 특수성을 고려한 세밀한 정황 분석과 의뢰인 권익 보호', 'pjlaw'); ?></p>
                    </div>
                </div>

                <!-- Real Estate -->
                <div class="service-box" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/real-estate.png'); ?>');">
                    <div class="service-box-content">
                        <h3><?php esc_html_e('부동산', 'pjlaw'); ?></h3>
                        <p><?php esc_html_e('복잡한 권리관계의 명확한 분석과 소중한 자산 가치 수호', 'pjlaw'); ?></p>
                    </div>
                </div>

                <!-- Family Law -->
                <div class="service-box" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/family-law.png'); ?>');">
                    <div class="service-box-content">
                        <h3><?php esc_html_e('가사', 'pjlaw'); ?></h3>
                        <p><?php esc_html_e('상속·증여 등 가족 간 재산 분쟁의 명확한 정리와 법적 갈등 해소', 'pjlaw'); ?></p>
                    </div>
                </div>

                <!-- Divorce Law -->
                <div class="service-box" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/divorce.png'); ?>');">
                    <div class="service-box-content">
                        <h3><?php esc_html_e('이혼', 'pjlaw'); ?></h3>
                        <p><?php esc_html_e('체계적인 법률 조력을 통한 정당한 재산분할 및 양육권 확보', 'pjlaw'); ?></p>
                    </div>
                </div>

                <!-- Corporate Law -->
                <div class="service-box" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/corporate.png'); ?>');">
                    <div class="service-box-content">
                        <h3><?php esc_html_e('기업', 'pjlaw'); ?></h3>
                        <p><?php esc_html_e('기업 리스크의 선제적 관리와 안정적인 경영을 위한 법률 지원', 'pjlaw'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="stats-premium section">
        <div class="container">
            <div class="stats-header">
                <span class="stats-tag"><?php esc_html_e('평정 업무활동', 'pjlaw'); ?></span>
                <h2 class="stats-title"><?php esc_html_e('평정은 의뢰인의 억울함이 조금도 남지 않도록', 'pjlaw'); ?><br /><?php esc_html_e('끝까지 의뢰인과 함께합니다.', 'pjlaw'); ?></h2>
            </div>
            
            <div class="stats-grid-premium">
                <div class="stat-item">
                    <div class="stat-icon-wrapper">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/stat-icon-1.svg'); ?>" alt="" />
                    </div>
                    <div class="stat-value">NaN+</div>
                    <div class="stat-label-group">
                        <div class="stat-main-label"><?php esc_html_e('법률사무소평정 구성원', 'pjlaw'); ?></div>
                        <div class="stat-sub-label"><?php esc_html_e('변호사 · 고문 · 위원', 'pjlaw'); ?></div>
                    </div>
                </div>

                <div class="stat-item">
                    <div class="stat-icon-wrapper">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/stat-icon-2.svg'); ?>" alt="" />
                    </div>
                    <div class="stat-value">NaN+</div>
                    <div class="stat-label-group">
                        <div class="stat-main-label"><?php esc_html_e('누적 업무사례', 'pjlaw'); ?></div>
                        <div class="stat-sub-label"><?php esc_html_e('2024년 기준', 'pjlaw'); ?></div>
                    </div>
                </div>

                <div class="stat-item">
                    <div class="stat-icon-wrapper">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/stat-icon-3.svg'); ?>" alt="" />
                    </div>
                    <div class="stat-value">NaN+</div>
                    <div class="stat-label-group">
                        <div class="stat-main-label"><?php esc_html_e('누적 상담건수', 'pjlaw'); ?></div>
                        <div class="stat-sub-label"><?php esc_html_e('2024년 기준', 'pjlaw'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Legal Cases Section -->
    <section class="cases-premium section">
        <div class="container">
            <div class="cases-header">
                <h2 class="cases-title">LEGAL CASE</h2>
                <p class="cases-subtitle"><?php esc_html_e('의뢰인의 신뢰에 실력으로 답하며, 최선의 결과로 증명해왔습니다.', 'pjlaw'); ?></p>
            </div>
            
            <div class="cases-slider">
                <?php
                $reviews = new WP_Query(array(
                    'post_type'      => 'pj_case_review',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'orderby'        => array('menu_order' => 'ASC', 'date' => 'DESC'),
                ));
                $default_avatar = get_template_directory_uri() . '/assets/images/home/lawyer-avatar.png';
                while ($reviews->have_posts()) : $reviews->the_post();
                    $review_tag    = get_post_meta(get_the_ID(), '_pj_review_tag', true);
                    $review_lawyer = get_post_meta(get_the_ID(), '_pj_review_lawyer', true);
                    $review_avatar = get_post_meta(get_the_ID(), '_pj_review_avatar', true);
                    if (empty($review_avatar)) $review_avatar = $default_avatar;
                    $review_image  = get_the_post_thumbnail_url(get_the_ID(), 'large');
                ?>
                <div class="case-item">
                    <div class="case-img-box">
                        <img src="<?php echo esc_url($review_image); ?>" alt="" />
                    </div>
                    <div class="case-info">
                        <?php if ($review_tag) : ?><span class="case-tag"><?php echo esc_html($review_tag); ?></span><?php endif; ?>
                        <h3 class="case-item-title"><?php the_title(); ?></h3>
                        <p class="case-excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
                        <div class="case-author">
                            <img src="<?php echo esc_url($review_avatar); ?>" alt="" />
                            <span><?php echo esc_html($review_lawyer); ?></span>
                        </div>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

    <!-- Bottom CTA Section -->
    <section class="bottom-cta section">
        <div class="container">
            <h2 class="cta-main-title"><?php esc_html_e('결과로 답하는 평정의 전문성', 'pjlaw'); ?><br /><?php esc_html_e('이제 당신의 사건에서 증명하겠습니다.', 'pjlaw'); ?></h2>
            
            <div class="cta-banner" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/cta-bg.png'); ?>');">
                <div class="cta-overlay"></div>
                <div class="cta-banner-content">
                    <div class="cta-banner-box">
                        <h3><?php esc_html_e('온라인 상담신청', 'pjlaw'); ?></h3>
                        <p><?php esc_html_e('궁금하신 부분을 속 시원히 해결해 드립니다.', 'pjlaw'); ?></p>
                        <a href="<?php echo esc_url(home_url('/consultation/')); ?>" class="btn-banner">
                            <span><?php esc_html_e('문의하기', 'pjlaw'); ?></span>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/btn-arrow.svg'); ?>" alt="" />
                        </a>
                    </div>

                    <div class="cta-banner-separator"></div>

                    <div class="cta-banner-box">
                        <h3><?php esc_html_e('평정 오시는길', 'pjlaw'); ?></h3>
                        <p><?php esc_html_e('법률사무소평정 찾아오시는길을 안내해 드립니다.', 'pjlaw'); ?></p>
                        <a href="<?php echo esc_url(home_url('/directions/')); ?>" class="btn-banner">
                            <span><?php esc_html_e('자세히보기', 'pjlaw'); ?></span>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/btn-arrow.svg'); ?>" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
