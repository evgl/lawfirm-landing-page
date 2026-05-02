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
    <section class="hero" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-bg.jpg'); ?>');">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1 class="hero-title">JOURNEY OF<br />TRUST PYEONGJEONG</h1>
                <p class="hero-subtitle"><?php esc_html_e('당신의 승리를 위하여 서울대학교 법학과 & 대형로펌 출신 변호사들이<br />최선의 솔루션을 바탕으로 24시 · 연중무휴 · 끝까지 싸웁니다', 'pjlaw'); ?></p>
            </div>
        </div>
    </section>

    <!-- Logo Section -->
    <section class="logo-section">
        <div class="logo-content">
            <svg class="pj-logo" viewBox="0 0 310 359" xmlns="http://www.w3.org/2000/svg">
                <!-- Logo SVG placeholder -->
            </svg>
            <h2 class="logo-text">PYEONG JEONG</h2>
        </div>
    </section>

    <!-- Overview Section -->
    <section class="overview section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('당신의 일상이 \'평정\'을 찾을 수 있도록, 처음부터 끝까지 평정이 함께합니다.', 'pjlaw'); ?></h2>
            <div class="overview-cta">
                <a href="<?php echo esc_url(home_url('/services/')); ?>" class="btn btn-primary">
                    <?php esc_html_e('업무분야', 'pjlaw'); ?>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Business Areas Section -->
    <section class="services section">
        <div class="container">
            <div class="services-grid">
                <!-- Civil Law -->
                <div class="service-card">
                    <div class="service-image">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/civil.jpg'); ?>" alt="<?php esc_attr_e('민사', 'pjlaw'); ?>" />
                    </div>
                    <div class="service-content">
                        <h3><?php esc_html_e('민사', 'pjlaw'); ?></h3>
                        <p><?php esc_html_e('철저한 법리 검토를 통한 실질적인 권리 구제와 재산권 확보', 'pjlaw'); ?></p>
                    </div>
                </div>

                <!-- Criminal Law -->
                <div class="service-card">
                    <div class="service-image">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/criminal.jpg'); ?>" alt="<?php esc_attr_e('형사', 'pjlaw'); ?>" />
                    </div>
                    <div class="service-content">
                        <h3><?php esc_html_e('형사', 'pjlaw'); ?></h3>
                        <p><?php esc_html_e('수사 단계부터 재판까지 치밀한 증거 분석과 정교한 법리 대응', 'pjlaw'); ?></p>
                    </div>
                </div>

                <!-- Sex Crime -->
                <div class="service-card">
                    <div class="service-image">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/sex-crime.jpg'); ?>" alt="<?php esc_attr_e('성범죄', 'pjlaw'); ?>" />
                    </div>
                    <div class="service-content">
                        <h3><?php esc_html_e('성범죄', 'pjlaw'); ?></h3>
                        <p><?php esc_html_e('사건의 특수성을 고려한 세밀한 정황 분석과 의뢰인 권익 보호', 'pjlaw'); ?></p>
                    </div>
                </div>

                <!-- Real Estate -->
                <div class="service-card">
                    <div class="service-image">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/real-estate.jpg'); ?>" alt="<?php esc_attr_e('부동산', 'pjlaw'); ?>" />
                    </div>
                    <div class="service-content">
                        <h3><?php esc_html_e('부동산', 'pjlaw'); ?></h3>
                        <p><?php esc_html_e('복잡한 권리관계의 명확한 분석과 소중한 자산 가치 수호', 'pjlaw'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="stats section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('평정 업무활동', 'pjlaw'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('평정은 의뢰인의 억울함이 조금도 남지 않도록 끝까지 의뢰인과 함께합니다.', 'pjlaw'); ?></p>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">30+</h3>
                        <p class="stat-label"><?php esc_html_e('법률사무소평정 구성원', 'pjlaw'); ?></p>
                        <p class="stat-sublabel"><?php esc_html_e('변호사 · 고문 · 위원', 'pjlaw'); ?></p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">2,850+</h3>
                        <p class="stat-label"><?php esc_html_e('누적 업무사례', 'pjlaw'); ?></p>
                        <p class="stat-sublabel"><?php esc_html_e('2024년 기준', 'pjlaw'); ?></p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">14,060+</h3>
                        <p class="stat-label"><?php esc_html_e('누적 상담건수', 'pjlaw'); ?></p>
                        <p class="stat-sublabel"><?php esc_html_e('2024년 기준', 'pjlaw'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Legal Cases Section -->
    <section class="cases section dark">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('LEGAL CASE', 'pjlaw'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('의뢰인의 신뢰에 실력으로 답하며, 최선의 결과로 증명해왔습니다.', 'pjlaw'); ?></p>
            
            <div class="cases-grid">
                <?php
                $cases = get_posts(array(
                    'post_type' => 'legal_case',
                    'posts_per_page' => 4,
                ));
                
                foreach ($cases as $case) :
                    setup_postdata($case);
                ?>
                    <div class="case-card">
                        <div class="case-image">
                            <?php
                            if (has_post_thumbnail($case->ID)) {
                                echo get_the_post_thumbnail($case->ID, 'case-thumbnail');
                            } else {
                                echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/case-placeholder.jpg') . '" alt="' . esc_attr(get_the_title($case->ID)) . '" />';
                            }
                            ?>
                        </div>
                        <div class="case-content">
                            <h3><?php echo esc_html(get_the_title($case->ID)); ?></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt($case->ID), 15); ?></p>
                            <div class="case-meta">
                                <span class="lawyer">문희용 변호사</span>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('결과로 답하는 평정의 전문성 이제 당신의 사건에서 증명하겠습니다', 'pjlaw'); ?></h2>
            
            <div class="cta-cards">
                <div class="cta-card">
                    <h3><?php esc_html_e('온라인 상담신청', 'pjlaw'); ?></h3>
                    <p><?php esc_html_e('궁금하신 부분을 속 시원히 해결해 드립니다.', 'pjlaw'); ?></p>
                    <a href="<?php echo esc_url(home_url('/consultation/')); ?>" class="btn btn-primary">
                        <?php esc_html_e('문의하기', 'pjlaw'); ?>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="cta-card">
                    <h3><?php esc_html_e('평정 오시는길', 'pjlaw'); ?></h3>
                    <p><?php esc_html_e('법무법인평정 찾아오시는길을 안내해 드립니다.', 'pjlaw'); ?></p>
                    <a href="<?php echo esc_url(home_url('/directions/')); ?>" class="btn btn-primary">
                        <?php esc_html_e('자세히보기', 'pjlaw'); ?>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
