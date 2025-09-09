<?php
/**
 * Main Template File - Homepage matching page_1.png design
 * 
 * @package Law_Firm_Pyeongjeong
 * @since 1.0.0
 */

get_header(); ?>

<!-- Main Hero Section -->
<main class="homepage-hero">
    <div class="hero-background"></div>
    
    <div class="hero-content">
        <!-- Main Logo Section -->
        <div class="hero-logo-section">
            <div class="main-logo">
                <i class="fas fa-balance-scale" aria-hidden="true"></i>
                <h1 class="site-title">법률사무소 평정</h1>
                <p class="site-tagline">LAW & PARTNERS</p>
            </div>
        </div>

        <!-- Search Section -->
        <div class="hero-search-section">
            <div class="search-container">
                <form class="hero-search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>" role="search">
                    <input type="search" 
                           name="s" 
                           class="search-input"
                           placeholder=""
                           value="<?php echo get_search_query(); ?>"
                           aria-label="<?php esc_attr_e('검색', 'law-firm-pyeongjeong'); ?>">
                    <button type="submit" class="search-button" aria-label="<?php esc_attr_e('검색 실행', 'law-firm-pyeongjeong'); ?>">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <span>Scroll</span>
            <i class="fas fa-chevron-down" aria-hidden="true"></i>
        </div>
    </div>

    <!-- Quick Menu Sidebar -->
    <div class="quick-menu">
        <div class="quick-menu-header">
            <span>Quick<br>Menu</span>
        </div>
        
        <div class="quick-menu-items">
            <a href="<?php echo esc_url(get_page_link(get_page_by_path('consultation'))); ?>" class="quick-menu-item">
                <i class="fas fa-comment" aria-hidden="true"></i>
                <span>온라인상담</span>
            </a>
            
            <a href="#case-status" class="quick-menu-item">
                <i class="fas fa-folder-open" aria-hidden="true"></i>
                <span>사건현황</span>
            </a>
            
            <a href="tel:02-554-6674" class="quick-menu-item">
                <i class="fas fa-phone" aria-hidden="true"></i>
                <span>전화상담</span>
            </a>
        </div>
    </div>

    <!-- Bottom Contact Section -->
    <div class="hero-bottom-contact">
        <div class="contact-info">
            <div class="contact-phone">
                <i class="fas fa-phone" aria-hidden="true"></i>
                <span class="phone-label">24시간 변호사상담</span>
                <a href="tel:02-554-6674" class="phone-number">02-554-6674</a>
            </div>
            
            <div class="contact-buttons">
                <button class="contact-btn kakao-btn" onclick="window.open('#', '_blank')">
                    <i class="fas fa-comment" aria-hidden="true"></i>
                    <span>카톡상담</span>
                </button>
                
                <button class="contact-btn consultation-btn" onclick="location.href='<?php echo esc_url(get_page_link(get_page_by_path('consultation'))); ?>'">
                    <span>상담하기</span>
                </button>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>