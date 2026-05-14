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
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-civil.svg'); ?>" alt="" />
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
                <a href="<?php echo esc_url(home_url('/blog/post/')); ?>" class="blog-card">
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
