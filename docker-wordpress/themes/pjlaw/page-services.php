<?php
/**
 * Services (업무분야) Page Template
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();
?>

<main id="main" class="site-main services-page" role="main">
    <section class="services-hero">
        <div class="services-hero__bg">
            <img src="<?php echo esc_url($theme_uri . '/assets/images/services/hero-bg.png'); ?>" alt="" class="services-hero__image" />
            <img src="<?php echo esc_url($theme_uri . '/assets/images/services/hero-overlay.png'); ?>" alt="" class="services-hero__overlay" />
            <div class="services-hero__gradient"></div>
        </div>
        
        <div class="container services-hero__inner">
            <div class="services-hero__content">
                <div class="services-hero__eyebrow-wrap">
                    <span class="services-hero__eyebrow">업무분야</span>
                    <span class="services-hero__eyebrow-line"></span>
                </div>
                <h1 class="services-hero__title">
                    법률사무소 평정은 분야별<br />
                    구성원과 함께합니다
                </h1>
            </div>
            
            <div class="services-hero__breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="services-hero__breadcrumb-icon">
                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 6.5L7 1.5L13 6.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 5.5V13.5H12V5.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <span class="services-hero__breadcrumb-arrow">
                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 9L5 5L1 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                <span class="services-hero__breadcrumb-current">업무분야</span>
                <span class="services-hero__breadcrumb-dropdown">
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5 5L9 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
        </div>
    </section>

    <section class="services-search">
        <div class="container">
            <div class="services-search__box">
                <input type="text" class="services-search__input" placeholder="검색어를 입력해주세요." />
                <button class="services-search__button" aria-label="검색">
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-search.svg'); ?>" alt="" />
                </button>
            </div>
            <div class="services-search__tags">
                <span class="services-search__tag">#사이버범죄</span>
                <span class="services-search__tag">#따돌림</span>
                <span class="services-search__tag">#분리조치</span>
                <span class="services-search__tag">#학폭위</span>
                <span class="services-search__tag">#생기부</span>
            </div>
        </div>
    </section>

    <section class="services-content">
        <div class="container">
            <div class="services-tabs">
                <div class="services-tab active">
                    <span class="services-tab__text">분야별</span>
                </div>
                <div class="services-tab">
                    <span class="services-tab__text">전체</span>
                </div>
            </div>

            <div class="services-grid">
                <a href="#civil" class="services-grid__item active">
                    <div class="services-grid__icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-civil-1.svg'); ?>" alt="" class="icon-part-1" />
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-civil-2.svg'); ?>" alt="" class="icon-part-2" />
                    </div>
                    <span class="services-grid__label">민사</span>
                </a>
                <a href="#criminal" class="services-grid__item">
                    <div class="services-grid__icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-criminal.svg'); ?>" alt="" />
                    </div>
                    <span class="services-grid__label">형사</span>
                </a>
                <a href="#sexual" class="services-grid__item">
                    <div class="services-grid__icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sexual-crime.svg'); ?>" alt="" />
                    </div>
                    <span class="services-grid__label">성범죄</span>
                </a>
                <a href="#divorce" class="services-grid__item">
                    <div class="services-grid__icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-divorce.svg'); ?>" alt="" />
                    </div>
                    <span class="services-grid__label">이혼</span>
                </a>
                <a href="#inheritance" class="services-grid__item">
                    <div class="services-grid__icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-inheritance.svg'); ?>" alt="" />
                    </div>
                    <span class="services-grid__label">상속</span>
                </a>
                <a href="#realestate" class="services-grid__item">
                    <div class="services-grid__icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-real-estate.svg'); ?>" alt="" />
                    </div>
                    <span class="services-grid__label">부동산</span>
                </a>
                <a href="#corporate" class="services-grid__item">
                    <div class="services-grid__icon corporate-icon">
                        <!-- Custom CSS drawn icon for corporate or use SVG if available -->
                        <div class="corporate-icon-wrapper">
                            <div class="corporate-building-1"></div>
                            <div class="corporate-building-2"></div>
                            <div class="corporate-building-3"></div>
                        </div>
                    </div>
                    <span class="services-grid__label">기업</span>
                </a>
            </div>

            <div class="services-details">
                <div class="services-details__header">
                    <h2 class="services-details__title">민사 분야</h2>
                    <div class="services-details__desc">
                        <p>형사 사건은 초기 대응에 따라 기소 여부와 처벌 수위가 달라집니다. 첫 조사에서의 진술, 자료 제출의 순서, 표현 하나까지 모두 수사 기록으로 남는 만큼, 사건을 정확히 이해한 상태에서 신중하게<br/>대응할 필요가 있습니다.</p>
                        <p>법률사무소 평정은 수사 단계부터 공판 단계 전 과정에서 의뢰인에게 불리한 판단이 고착되지 않도록 관리합니다. 형사 사건에 대한 많은 경험을 바탕으로 함께하겠습니다.</p>
                    </div>
                </div>

                <div class="services-details__divider"></div>

                <div class="services-details__sub">
                    <h3 class="services-details__sub-title">민사 사건의 세부 업무분야</h3>
                    <div class="services-details__sub-tags">
                        <span class="services-details__sub-tag">손해배상</span>
                        <span class="services-details__sub-tag">부당이득금</span>
                        <span class="services-details__sub-tag">대여금</span>
                        <span class="services-details__sub-tag">매매대금</span>
                        <span class="services-details__sub-tag">구상</span>
                        <span class="services-details__sub-tag">계약해지/해제</span>
                        <span class="services-details__sub-tag">내용증명</span>
                        <span class="services-details__sub-tag">가압류/가처분</span>
                        <span class="services-details__sub-tag">손해배상</span>
                        <span class="services-details__sub-tag">부당이득금</span>
                        <span class="services-details__sub-tag">대여금</span>
                        <span class="services-details__sub-tag">매매대금</span>
                        <span class="services-details__sub-tag">구상</span>
                        <span class="services-details__sub-tag">계약해지/해제</span>
                        <span class="services-details__sub-tag">내용증명</span>
                        <span class="services-details__sub-tag">가압류/가처분</span>
                    </div>
                </div>
                <div class="services-details__divider"></div>
            </div>
        </div>
    </section>

    <footer class="footer services-footer" role="contentinfo">
        <div class="footer-bottom services-footer__bottom">
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
                            <p>서울특별시 강남구 테헤란로 238, 마크로젠빌딩 12층       Tel : 02-554-5674</p>
                            <p class="copyright">Copyright ⓒ Pyeongjeong. All Rights Reserved</p>
                        </div>
                        <div class="footer-logo-wrap">
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/services/footer-logo.png'); ?>" alt="법률사무소 평정" class="footer-logo" />
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="scroll-top">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/home/scroll-top.svg'); ?>" alt="Top" />
            </a>
        </div>
    </footer>

    <?php pjlaw_render_quick_actions_menu(); ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
