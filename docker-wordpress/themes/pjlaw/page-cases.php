<?php
/**
 * Cases Page Template (업무사례)
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();

$cases = [
    [
        'badge'    => '승소',
        'category' => '성범죄',
        'type'     => 'criminal',
        'title'    => '아청법 위반 혐의로 기소당했으나 변호인 조력을 통해 기소유예 처분을 받은 성범죄 사례',
        'desc'     => '아청법 위반 혐의로 기소당해 성범죄 변호사의 조력을 구하셨습니다. 법무법인 평정은 피의자 신분의 의뢰인을 대리했습니다.',
        'image'    => $theme_uri . '/assets/images/cases/case-base.jpg',
        'label'    => 'seungso',
    ],
    [
        'badge'    => '승소',
        'category' => '형사',
        'type'     => 'criminal',
        'title'    => '폭행 혐의로 수사를 받던 중 변호인의 적극적 대응으로 불기소 처분을 받은 형사 사례',
        'desc'     => '피의자 신분으로 경찰 조사를 받게 되어 형사 전문 변호사를 선임했습니다. 증거 분석과 진술 조력으로 불기소 처분을 이끌어냈습니다.',
        'image'    => $theme_uri . '/assets/images/cases/case-base.jpg',
        'label'    => 'kisooyue',
    ],
    [
        'badge'    => '승소',
        'category' => '민사',
        'type'     => 'civil',
        'title'    => '계약 불이행으로 인한 손해배상 청구 소송에서 원고 승소 판결을 받은 민사 사례',
        'desc'     => '거래처의 계약 위반으로 큰 손해를 입어 법적 조치를 취했습니다. 치밀한 증거 수집과 법리 구성으로 전액 손해배상을 받았습니다.',
        'image'    => $theme_uri . '/assets/images/cases/case-base.jpg',
        'label'    => 'seungso',
    ],
    [
        'badge'    => '승소',
        'category' => '이혼',
        'type'     => 'divorce',
        'title'    => '장기 별거 상태에서 재산분할 및 위자료 청구 소송으로 정당한 권리를 찾은 사례',
        'desc'     => '배우자의 귀책 사유로 혼인 파탄에 이르렀고, 재산분할 및 위자료 청구를 통해 의뢰인의 정당한 몫을 확보했습니다.',
        'image'    => $theme_uri . '/assets/images/cases/case-base.jpg',
        'label'    => 'kisooyue',
    ],
    [
        'badge'    => '승소',
        'category' => '상속',
        'type'     => 'inheritance',
        'title'    => '유류분 침해를 주장하며 제기한 유류분반환청구 소송에서 승소 판결을 받은 사례',
        'desc'     => '부모님 사망 후 특정 상속인에게 재산이 편중되어 유류분 침해가 발생했습니다. 법원의 적절한 심리를 통해 유류분을 회복했습니다.',
        'image'    => $theme_uri . '/assets/images/cases/case-base.jpg',
        'label'    => 'seungso',
    ],
    [
        'badge'    => '승소',
        'category' => '부동산',
        'type'     => 'realestate',
        'title'    => '전세보증금 반환 거부에 맞서 법적 절차를 통해 전액 반환 받은 부동산 사례',
        'desc'     => '임대차 계약 종료 후 임대인이 보증금 반환을 거부해 법적 조치를 취했습니다. 신속한 법원 절차로 전액 반환 판결을 받았습니다.',
        'image'    => $theme_uri . '/assets/images/cases/case-base.jpg',
        'label'    => 'kisooyue',
    ],
];
?>

<main id="main" class="site-main cases-page" role="main">

    <section class="cases-hero" style="background-image: url('<?php echo esc_url($theme_uri . '/assets/images/cases/hero.jpg'); ?>');">
        <div class="cases-hero__overlay"></div>
        <div class="cases-hero__inner">
            <div class="cases-hero__content">
                <div class="cases-hero__eyebrow-wrap">
                    <span class="cases-hero__eyebrow">업무사례</span>
                    <span class="cases-hero__eyebrow-line"></span>
                </div>
                <h1 class="cases-hero__title">
                    개인정보보호차 판결문은 일부만 업로드 되며,<br />
                    일부 내용이 각색될 수 있습니다
                </h1>
            </div>

            <nav class="cases-hero__breadcrumb-nav" aria-label="<?php esc_attr_e('페이지 경로', 'pjlaw'); ?>">
                <a class="cases-hero__breadcrumb-home" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('홈', 'pjlaw'); ?>">
                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 6.5L7 1.5L13 6.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 5.5V13.5H12V5.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <div class="cases-hero__breadcrumb-items">
                    <div class="cases-hero__breadcrumb-item cases-hero__breadcrumb-item--active">
                        <span>업무사례</span>
                        <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </nav>
        </div>
    </section>

    <section class="cases-search-section">
        <div class="cases-container">
            <div class="cases-search-bar">
                <input type="text" id="cases-search-input" class="cases-search-bar__input" placeholder="검색어를 입력해주세요." />
                <button class="cases-search-bar__button" aria-label="검색">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="9" r="7" stroke="white" stroke-width="2"/>
                        <path d="M14 14L18 18" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>
            <div class="cases-chips-row">
                <span class="cases-chips-label">사건별</span>
                <div class="cases-chips">
                    <button class="cases-chip" data-filter="일반형사">일반형사</button>
                    <button class="cases-chip" data-filter="성범죄">성범죄</button>
                    <button class="cases-chip" data-filter="경제지능">경제지능</button>
                    <button class="cases-chip" data-filter="마약">마약</button>
                    <button class="cases-chip" data-filter="음주교통">음주, 교통</button>
                    <button class="cases-chip" data-filter="소년범죄">소년범죄</button>
                    <button class="cases-chip" data-filter="행정기업">행정, 기업</button>
                    <button class="cases-chip" data-filter="민사가사">민사, 가사</button>
                    <button class="cases-chip" data-filter="회생파산">회생, 파산</button>
                </div>
            </div>
        </div>
    </section>

    <div class="cases-divider"></div>

    <section class="cases-tabs-section">
        <div class="cases-container">
            <div class="cases-tabs" id="cases-tabs">
                <button class="cases-tab cases-tab--active" data-tab="all">
                    <span class="cases-tab__icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="3" width="10" height="10" rx="2" fill="white" fill-opacity="0.8"/>
                            <rect x="17" y="3" width="10" height="10" rx="2" fill="white" fill-opacity="0.8"/>
                            <rect x="3" y="17" width="10" height="10" rx="2" fill="white" fill-opacity="0.8"/>
                            <rect x="17" y="17" width="10" height="10" rx="2" fill="white" fill-opacity="0.8"/>
                        </svg>
                    </span>
                    <span class="cases-tab__label">전체</span>
                </button>
                <button class="cases-tab" data-tab="civil">
                    <span class="cases-tab__icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="4" y="6" width="22" height="18" rx="2" stroke="#181a1e" stroke-width="1.88"/>
                            <path d="M9 12H21M9 16H17" stroke="#181a1e" stroke-width="1.88" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <span class="cases-tab__label">민사</span>
                </button>
                <button class="cases-tab" data-tab="criminal">
                    <span class="cases-tab__icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 3L4 10V20C4 24 9 27 15 27C21 27 26 24 26 20V10L15 3Z" stroke="#181a1e" stroke-width="1.88" stroke-linejoin="round"/>
                            <path d="M11 15L14 18L20 12" stroke="#181a1e" stroke-width="1.88" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="cases-tab__label">형사</span>
                </button>
                <button class="cases-tab" data-tab="sex-crime">
                    <span class="cases-tab__icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="15" cy="11" r="5" stroke="#181a1e" stroke-width="1.88"/>
                            <path d="M7 27C7 22.029 10.582 18 15 18C19.418 18 23 22.029 23 27" stroke="#181a1e" stroke-width="1.88" stroke-linecap="round"/>
                            <line x1="21" y1="6" x2="27" y2="6" stroke="#181a1e" stroke-width="1.88" stroke-linecap="round"/>
                            <line x1="24" y1="3" x2="24" y2="9" stroke="#181a1e" stroke-width="1.88" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <span class="cases-tab__label">성범죄</span>
                </button>
                <button class="cases-tab" data-tab="divorce">
                    <span class="cases-tab__icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 6C11 6 7 9 7 13C7 19 15 26 15 26C15 26 23 19 23 13C23 9 19 6 15 6Z" stroke="#181a1e" stroke-width="1.88" stroke-linejoin="round"/>
                            <line x1="12" y1="12" x2="18" y2="18" stroke="#181a1e" stroke-width="1.88" stroke-linecap="round"/>
                            <line x1="18" y1="12" x2="12" y2="18" stroke="#181a1e" stroke-width="1.88" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <span class="cases-tab__label">이혼</span>
                </button>
                <button class="cases-tab" data-tab="inheritance">
                    <span class="cases-tab__icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="5" y="8" width="20" height="16" rx="2" stroke="#181a1e" stroke-width="1.88"/>
                            <path d="M10 8V6C10 4.895 10.895 4 12 4H18C19.105 4 20 4.895 20 6V8" stroke="#181a1e" stroke-width="1.88"/>
                            <path d="M10 16H20M13 20H17" stroke="#181a1e" stroke-width="1.88" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <span class="cases-tab__label">상속</span>
                </button>
                <button class="cases-tab" data-tab="realestate">
                    <span class="cases-tab__icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 13L15 5L25 13V26H19V19H11V26H5V13Z" stroke="#181a1e" stroke-width="1.88" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="cases-tab__label">부동산</span>
                </button>
                <button class="cases-tab" data-tab="corporate">
                    <span class="cases-tab__icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="9" y="3" width="12" height="24" rx="1" stroke="#181a1e" stroke-width="1.88"/>
                            <rect x="3" y="10" width="8" height="17" rx="1" stroke="#181a1e" stroke-width="1.88"/>
                            <rect x="19" y="10" width="8" height="17" rx="1" stroke="#181a1e" stroke-width="1.88"/>
                            <path d="M13 9H17M13 13H17M13 17H17" stroke="#181a1e" stroke-width="1.88" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <span class="cases-tab__label">기업</span>
                </button>
            </div>
        </div>
    </section>

    <section class="cases-grid-section">
        <div class="cases-container">
            <div class="cases-grid" id="cases-grid">
                <?php foreach ($cases as $case) : ?>
                <article class="case-card" data-type="<?php echo esc_attr($case['type']); ?>" data-category="<?php echo esc_attr($case['category']); ?>">
                    <div class="case-card__info">
                        <div class="case-card__meta">
                            <span class="case-card__badge"><?php echo esc_html($case['badge']); ?></span>
                            <span class="case-card__category"><?php echo esc_html($case['category']); ?></span>
                        </div>
                        <h3 class="case-card__title"><?php echo esc_html($case['title']); ?></h3>
                        <p class="case-card__desc"><?php echo esc_html($case['desc']); ?></p>
                    </div>
                    <div class="case-card__image">
                        <img class="case-card__image-base" src="<?php echo esc_url($case['image']); ?>" alt="" loading="lazy" />
                        <img class="case-card__image-label" src="<?php echo esc_url($theme_uri . '/assets/images/cases/case-label-' . esc_attr($case['label']) . '.png'); ?>" alt="" />
                    </div>
                </article>
                <?php endforeach; ?>
            </div>

            <div class="cases-pagination">
                <div class="cases-pagination__nav">
                    <button class="cases-pagination__arrow cases-pagination__arrow--prev" aria-label="이전">
                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 2L4 7L9 12" stroke="#3d3d3d" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="cases-pagination__arrow cases-pagination__arrow--first" aria-label="처음">
                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L7 7L12 12" stroke="#3d3d3d" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 2L1 7L6 12" stroke="#3d3d3d" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <div class="cases-pagination__pages">
                    <button class="cases-pagination__page cases-pagination__page--active">1</button>
                    <button class="cases-pagination__page">2</button>
                    <button class="cases-pagination__page">3</button>
                    <button class="cases-pagination__page">4</button>
                    <button class="cases-pagination__page">5</button>
                </div>
                <div class="cases-pagination__nav">
                    <button class="cases-pagination__arrow cases-pagination__arrow--last" aria-label="마지막">
                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 2L8 7L3 12" stroke="#3d3d3d" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 2L14 7L9 12" stroke="#3d3d3d" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="cases-pagination__arrow cases-pagination__arrow--next" aria-label="다음">
                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 2L11 7L6 12" stroke="#3d3d3d" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

</main>

<?php pjlaw_render_quick_actions_menu(); ?>

<script>
(function () {
    const tabs = document.querySelectorAll('.cases-tab');
    const cards = document.querySelectorAll('.case-card');
    const chips = document.querySelectorAll('.cases-chip');
    const searchInput = document.getElementById('cases-search-input');

    function filterCards(tab, searchTerm) {
        cards.forEach(function (card) {
            const typeMatch = (tab === 'all') || (card.dataset.type === tab);
            const text = (card.querySelector('.case-card__title').textContent + ' ' + card.querySelector('.case-card__category').textContent).toLowerCase();
            const searchMatch = !searchTerm || text.includes(searchTerm.toLowerCase());
            card.style.display = (typeMatch && searchMatch) ? '' : 'none';
        });
    }

    var activeTab = 'all';

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            tabs.forEach(function (t) { t.classList.remove('cases-tab--active'); });
            tab.classList.add('cases-tab--active');
            activeTab = tab.dataset.tab;
            filterCards(activeTab, searchInput ? searchInput.value : '');
        });
    });

    chips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            chips.forEach(function (c) { c.classList.remove('cases-chip--active'); });
            chip.classList.add('cases-chip--active');
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            filterCards(activeTab, searchInput.value);
        });
    }
}());
</script>

<?php get_footer(); ?>
