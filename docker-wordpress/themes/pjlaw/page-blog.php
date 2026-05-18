<?php
/**
 * Blog Page Template
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();
?>

<main id="main" class="site-main blog-page" role="main">
    <section class="blog-hero" style="background-image: url('<?php echo esc_url($theme_uri . '/assets/images/blog/hero.png'); ?>');">
        <div class="blog-hero__gradient"></div>
        <div class="container blog-hero__inner">
            <div class="blog-hero__content">
                <div class="blog-hero__eyebrow-wrap">
                    <span class="blog-hero__eyebrow">블로그</span>
                    <span class="blog-hero__eyebrow-line"></span>
                </div>
                <h1 class="blog-hero__title">
                    어려운 법률을 쉽게 풀이하고 꼭 알아야 할<br />
                    최신 법령과 판례 정보를 전달합니다
                </h1>
            </div>
            
            <nav class="blog-hero__breadcrumb-nav" aria-label="<?php esc_attr_e('페이지 경로', 'pjlaw'); ?>">
                <a class="blog-hero__breadcrumb-home" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('홈', 'pjlaw'); ?>">
                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 6.5L7 1.5L13 6.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 5.5V13.5H12V5.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <div class="blog-hero__breadcrumb-items">
                    <div class="blog-hero__breadcrumb-item blog-hero__breadcrumb-item--active">
                        <span>블로그</span>
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <section class="blog-search">
        <div class="container">
            <div class="blog-search__box">
                <input type="text" class="blog-search__input" placeholder="검색어를 입력해주세요." />
                <button class="blog-search__button" aria-label="검색">
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-search.svg'); ?>" alt="" />
                </button>
            </div>
            <div class="blog-search__tags">
                <span class="blog-search__tag">#사이버범죄</span>
                <span class="blog-search__tag">#따돌림</span>
                <span class="blog-search__tag">#분리조치</span>
                <span class="blog-search__tag">#학폭위</span>
                <span class="blog-search__tag">#생기부</span>
            </div>
        </div>
    </section>

    <section class="blog-content">
        <div class="container">
            <div class="blog-tabs">
                <div class="blog-tab blog-tab--active">
                    <span class="blog-tab__text">전체</span>
                </div>
                <div class="blog-tab">
                    <span class="blog-tab__text">법률정보</span>
                </div>
                <div class="blog-tab">
                    <span class="blog-tab__text">대응전략</span>
                </div>
            </div>

            <div class="services-grid" style="margin-bottom: 60px;">
                <a href="#all" class="services-grid__item active">
                    <div class="services-grid__icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.25 11.25H18.75V18.75H11.25V11.25Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5 5H10V10H5V5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 5H25V10H20V5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5 20H10V25H5V20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20 20H25V25H20V20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <span class="services-grid__label">전체</span>
                </a>
                <a href="#civil" class="services-grid__item">
                    <div class="services-grid__icon">
                        <svg width="36" height="30" viewBox="0 0 37 30" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M18 4.31543C18.9306 4.31543 19.6846 5.0694 19.6846 6V26.4346H16.3154V6C16.3154 5.0694 17.0694 4.31543 18 4.31543Z" stroke="#181A1E" stroke-width="1.88"/>
                            <rect x="16.315" y="0.94" width="3.37" height="3.37" rx="1.685" stroke="#181A1E" stroke-width="1.88"/>
                            <rect x="5.88867" y="5.49414" width="11.087" height="1.875" rx="0.9375" fill="#181A1E"/>
                            <rect x="19.1895" y="5.49414" width="11.087" height="1.875" rx="0.9375" fill="#181A1E"/>
                            <path d="M12.4717 17.0654C12.0308 19.4105 9.97314 21.1846 7.5 21.1846H6C3.52686 21.1846 1.46918 19.4105 1.02832 17.0654H12.4717Z" fill="#88A6FF" stroke="#181A1E" stroke-width="1.88"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.69628 5.53469C7.07788 5.5131 7.44998 5.72785 7.61034 6.09914L12.0156 16.2993C12.2205 16.7745 12.0014 17.3255 11.5264 17.5308C11.0511 17.7361 10.4993 17.5178 10.2939 17.0425L6.70116 8.72414L3.10839 17.0425C2.90298 17.5177 2.3512 17.7361 1.87596 17.5308C1.40092 17.3253 1.18241 16.7735 1.38768 16.2984L5.79296 6.09914C5.95183 5.73139 6.3185 5.5177 6.69628 5.53469Z" fill="#181A1E"/>
                            <path d="M35.1279 17.0654C34.6871 19.4105 32.6294 21.1846 30.1562 21.1846H28.6562C26.1831 21.1846 24.1254 19.4105 23.6846 17.0654H35.1279Z" fill="#88A6FF" stroke="#181A1E" stroke-width="1.88"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.3486 5.53469C29.7302 5.5131 30.1023 5.72785 30.2627 6.09914L34.668 16.2993C34.8729 16.7745 34.6538 17.3255 34.1787 17.5308C33.7034 17.7361 33.1516 17.5178 32.9463 17.0425L29.3535 8.72414L25.7607 17.0425C25.5553 17.5177 25.0035 17.7361 24.5283 17.5308C24.0533 17.3253 23.8348 16.7735 24.04 16.2984L28.4453 6.09914C28.6042 5.73139 28.9708 5.5177 29.3486 5.53469Z" fill="#181A1E"/>
                            <rect x="10.125" y="25.5" width="15.75" height="1.875" rx="0.9375" fill="#181A1E"/>
                            <rect x="7.875" y="28.125" width="20.25" height="1.875" rx="0.9375" fill="#181A1E"/>
                        </svg>
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
                        <div class="corporate-icon-wrapper">
                            <div class="corporate-building-1"></div>
                            <div class="corporate-building-2"></div>
                            <div class="corporate-building-3"></div>
                        </div>
                    </div>
                    <span class="services-grid__label">기업</span>
                </a>
            </div>

            <div class="blog-results-header">
                <p class="blog-results-count">총 <strong>134건</strong>의 검색 결과가 있습니다.</p>
            </div>

            <div class="blog-grid">
                <?php
                // Repeated sample data according to Figma design
                $cards = array(
                    array(
                        'image' => 'card-01.jpg',
                        'tags' => array('마약', '향정신성의약품(향정)'),
                        'title' => '졸피뎀 처벌 수위 및 사례, 대응 방법',
                        'excerpt' => '혹시 잠이 오지 않아 친구에게 약을 빌려 먹거나, 병원 가기\n귀찮아서 다른 사람 명의로 약을 타온 적 있으신가요?'
                    ),
                    array(
                        'image' => 'card-02.jpg',
                        'tags' => array('교통사고', '무면허운전'),
                        'title' => '무면허사고 처벌 수위와 보험처리 및 대응 방법',
                        'excerpt' => '단순 교통법규 위반이 아닙니다. 교통사고처리특례법상 12대\n중과실에 해당하며, 피해자와 합의를 하더라도 형사처벌이 면제...'
                    ),
                    array(
                        'image' => 'card-03.jpg',
                        'tags' => array('형사', '특수경제범죄(특경법)'),
                        'title' => '특정경제범죄(특경법) 뜻, 가중 처벌 기준',
                        'excerpt' => '특경법은 사기·횡령·배임 등 특정 경제범죄가 일정 금액을 넘는\n경우 형법보다 훨씬 무겁게 처벌하도록 규정한 법률입니다.'
                    ),
                    array(
                        'image' => 'card-01.jpg',
                        'tags' => array('마약', '향정신성의약품(향정)'),
                        'title' => '졸피뎀 처벌 수위 및 사례, 대응 방법',
                        'excerpt' => '혹시 잠이 오지 않아 친구에게 약을 빌려 먹거나, 병원 가기\n귀찮아서 다른 사람 명의로 약을 타온 적 있으신가요?'
                    ),
                    array(
                        'image' => 'card-02.jpg',
                        'tags' => array('교통사고', '무면허운전'),
                        'title' => '무면허사고 처벌 수위와 보험처리 및 대응 방법',
                        'excerpt' => '단순 교통법규 위반이 아닙니다. 교통사고처리특례법상 12대\n중과실에 해당하며, 피해자와 합의를 하더라도 형사처벌이 면제...'
                    ),
                    array(
                        'image' => 'card-03.jpg',
                        'tags' => array('형사', '특수경제범죄(특경법)'),
                        'title' => '특정경제범죄(특경법) 뜻, 가중 처벌 기준',
                        'excerpt' => '특경법은 사기·횡령·배임 등 특정 경제범죄가 일정 금액을 넘는\n경우 형법보다 훨씬 무겁게 처벌하도록 규정한 법률입니다.'
                    ),
                    array(
                        'image' => 'card-01.jpg',
                        'tags' => array('마약', '향정신성의약품(향정)'),
                        'title' => '졸피뎀 처벌 수위 및 사례, 대응 방법',
                        'excerpt' => '혹시 잠이 오지 않아 친구에게 약을 빌려 먹거나, 병원 가기\n귀찮아서 다른 사람 명의로 약을 타온 적 있으신가요?'
                    ),
                    array(
                        'image' => 'card-02.jpg',
                        'tags' => array('교통사고', '무면허운전'),
                        'title' => '무면허사고 처벌 수위와 보험처리 및 대응 방법',
                        'excerpt' => '단순 교통법규 위반이 아닙니다. 교통사고처리특례법상 12대\n중과실에 해당하며, 피해자와 합의를 하더라도 형사처벌이 면제...'
                    ),
                    array(
                        'image' => 'card-03.jpg',
                        'tags' => array('형사', '특수경제범죄(특경법)'),
                        'title' => '특정경제범죄(특경법) 뜻, 가중 처벌 기준',
                        'excerpt' => '특경법은 사기·횡령·배임 등 특정 경제범죄가 일정 금액을 넘는\n경우 형법보다 훨씬 무겁게 처벌하도록 규정한 법률입니다.'
                    )
                );

                foreach ($cards as $card) :
                ?>
                <?php $card_detail_url = add_query_arg('title', rawurlencode($card['title']), home_url('/blog/post/')); ?>
                <a href="<?php echo esc_url($card_detail_url); ?>" class="blog-card">
                    <div class="blog-card__image-wrap">
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/blog/' . $card['image']); ?>" alt="<?php echo esc_attr($card['title']); ?>" class="blog-card__image" />
                    </div>
                    <div class="blog-card__content">
                        <div class="blog-card__tags">
                            <?php foreach ($card['tags'] as $tag) : ?>
                                <span class="blog-card__tag"><?php echo esc_html($tag); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <h3 class="blog-card__title"><?php echo esc_html($card['title']); ?></h3>
                        <p class="blog-card__excerpt"><?php echo nl2br(esc_html($card['excerpt'])); ?></p>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>

            <div class="blog-pagination">
                <a href="#" class="blog-pagination__arrow blog-pagination__arrow--prev-double">
                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.5215 13.06L7.49948 7L14.5215 0.939999" stroke="#C4C4C4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.49902 13.06L0.477021 7L7.49902 0.939999" stroke="#C4C4C4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <a href="#" class="blog-pagination__arrow blog-pagination__arrow--prev">
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.49902 13.06L0.477021 7L7.49902 0.939999" stroke="#C4C4C4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                
                <div class="blog-pagination__numbers">
                    <a href="#" class="blog-pagination__number blog-pagination__number--active">1</a>
                    <a href="#" class="blog-pagination__number">2</a>
                    <a href="#" class="blog-pagination__number">3</a>
                    <a href="#" class="blog-pagination__number">4</a>
                    <a href="#" class="blog-pagination__number">5</a>
                </div>

                <a href="#" class="blog-pagination__arrow blog-pagination__arrow--next">
                    <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.500977 13.06L7.52298 7L0.500977 0.939999" stroke="#C4C4C4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <a href="#" class="blog-pagination__arrow blog-pagination__arrow--next-double">
                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.478516 13.06L7.50052 7L0.478516 0.939999" stroke="#C4C4C4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.50098 13.06L14.523 7L7.50098 0.939999" stroke="#C4C4C4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <footer class="footer blog-footer" role="contentinfo">
        <div class="footer-bottom blog-footer__bottom">
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
                            <p>경기도 수원시 장안구 경수대로 976번길 19(송죽동)       Tel : 070-7800-2114</p>
                            <p class="copyright">Copyright ⓒ Pyeongjeong. All Rights Reserved</p>
                        </div>
                        <div class="footer-logo-wrap">
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/blog/footer-logo.png'); ?>" alt="법률사무소 평정" class="footer-logo" />
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
