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
                        <div class="logo-shield">
                            <i class="fas fa-shield-alt" aria-hidden="true"></i>
                        </div>
                        <div class="logo-text">
                            <h1 class="site-title">법률사무소 평정</h1>
                            <p class="site-tagline">LEE & PARTNERS</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Professional Search Section -->
        <div class="hero-search-section">
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
        </div>

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
                <a href="#" class="contact-btn kakao-btn">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDJDNS41ODEgMiAyIDUuMTM0IDIgOC44ODlDMiAxMS4xNjcgMy4xOTEgMTMuMTY3IDQuOTk5IDE0LjMzM0w0LjI5NCAxNy4yMjJMMTMuNzA2IDE0LjMzM0MxNi44MDkgMTMuMTY3IDE4IDExLjE2NyAxOCA4Ljg4OUMxOCA1LjEzNCAE0LjQxOSAyIDEwIDJaIiBmaWxsPSIjM0MxRTFFIi8+Cjwvc3ZnPgo=" alt="KakaoTalk" />
                    <?php esc_html_e('카톡상담', 'law-firm-pyeongjeong'); ?>
                </a>
                <a href="#consultation-form" class="contact-btn consultation-btn" data-scroll-to="contact">
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
        <div class="section-content">
            <h2><?php esc_html_e('소개', 'law-firm-pyeongjeong'); ?></h2>
            <p><?php esc_html_e('법률사무소 평정은 고객의 권익 보호를 최우선으로 하는 전문 법률 서비스를 제공합니다. 풍부한 경험과 전문성을 바탕으로 다양한 법적 문제에 대한 최적의 솔루션을 제공하여 고객의 만족과 신뢰를 얻어왔습니다.', 'law-firm-pyeongjeong'); ?></p>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="content-section services-section">
    <div class="section-container">
        <div class="section-content">
            <h2><?php esc_html_e('업무분야', 'law-firm-pyeongjeong'); ?></h2>
            <p><?php esc_html_e('민사소송, 형사소송, 가족법, 부동산법, 기업법무, 지적재산권 등 다양한 분야의 전문적인 법률 서비스를 제공합니다. 각 분야별 전문 변호사가 고객의 사안을 정확히 파악하여 최적의 법적 대응 방안을 제시합니다.', 'law-firm-pyeongjeong'); ?></p>
        </div>
    </div>
</section>

<!-- Team Section -->
<section id="team" class="content-section team-section">
    <div class="section-container">
        <div class="section-content">
            <h2><?php esc_html_e('구성원', 'law-firm-pyeongjeong'); ?></h2>
            <p><?php esc_html_e('법률사무소 평정은 각 분야별 전문성을 갖춘 우수한 변호사진으로 구성되어 있습니다. 풍부한 실무 경험과 전문 지식을 바탕으로 고객의 다양한 법적 요구에 체계적이고 효율적으로 대응합니다.', 'law-firm-pyeongjeong'); ?></p>
        </div>
    </div>
</section>

<!-- Success Cases Section -->
<section id="cases" class="content-section cases-section">
    <div class="section-container">
        <div class="section-content">
            <h2><?php esc_html_e('성공사례', 'law-firm-pyeongjeong'); ?></h2>
            <p><?php esc_html_e('법률사무소 평정은 지금까지 수많은 성공 사례를 통해 고객의 권익을 보호해왔습니다. 복잡하고 어려운 사건도 체계적인 접근과 전문적인 대응으로 만족스러운 결과를 이끌어내고 있습니다.', 'law-firm-pyeongjeong'); ?></p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="content-section contact-section">
    <div class="section-container">
        <div class="section-content">
            <h2><?php esc_html_e('상담문의', 'law-firm-pyeongjeong'); ?></h2>
            <p><?php esc_html_e('법적 문제로 고민이 있으시다면 언제든지 상담을 요청하세요. 전문 변호사가 고객의 상황을 정확히 파악하여 최적의 해결 방안을 제시해드립니다.', 'law-firm-pyeongjeong'); ?></p>
        </div>
    </div>
</section>

<?php get_footer(); ?>