<?php
if (!defined('ABSPATH')) { exit; }
get_header();
$theme_uri = get_template_directory_uri();

$job_cards = array(
    array(
        'badge'     => 'D-15',
        'badge_mod' => 'navy',
        'type'      => '경력',
        'title'     => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'      => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'     => 'D-08',
        'badge_mod' => 'navy',
        'type'      => '신입/인턴',
        'title'     => '법무법인(유한) 대륜 의료전문 상담실장 모집',
        'date'      => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'     => 'D-15',
        'badge_mod' => 'navy',
        'type'      => '경력',
        'title'     => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'      => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'     => 'D-DAY',
        'badge_mod' => 'orange',
        'type'      => '경력',
        'title'     => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'      => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'     => 'D-15',
        'badge_mod' => 'navy',
        'type'      => '경력',
        'title'     => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'      => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'     => 'D-15',
        'badge_mod' => 'navy',
        'type'      => '경력',
        'title'     => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'      => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'     => 'D-15',
        'badge_mod' => 'navy',
        'type'      => '경력',
        'title'     => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'      => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'     => 'D-08',
        'badge_mod' => 'navy',
        'type'      => '신입/인턴',
        'title'     => '법무법인(유한) 대륜 의료전문 상담실장 모집',
        'date'      => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'     => 'D-15',
        'badge_mod' => 'navy',
        'type'      => '경력',
        'title'     => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'      => '2026. 03. 05 ~ 2026. 03. 05',
    ),
);
?>
<main id="main" class="site-main careers-all-page" role="main">

    <!-- Hero Section -->
    <section class="careers-hero" style="background-image: url('<?php echo esc_url($theme_uri . '/assets/images/careers/hero-people.jpg'); ?>');">
        <div class="careers-hero__overlay"></div>
        <div class="careers-hero__content">
            <div class="careers-hero__text">
                <p class="careers-hero__eyebrow">인재채용</p>
                <h1 class="careers-hero__title">당신의 도전이 새로운<br>미래를 만듭니다</h1>
            </div>
            <nav class="careers-hero__breadcrumb" aria-label="breadcrumb">
                <span class="careers-hero__breadcrumb-home">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true"><path d="M1.5 9L9 1.5L16.5 9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M3 7.5V15.75C3 16.1642 3.33579 16.5 3.75 16.5H7.5V12H10.5V16.5H14.25C14.6642 16.5 15 16.1642 15 15.75V7.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="careers-hero__breadcrumb-sep">
                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" aria-hidden="true"><path d="M1 1L7 6L1 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="careers-hero__breadcrumb-item">
                    <a href="<?php echo esc_url(home_url('/careers/')); ?>">인재채용</a>
                </span>
                <span class="careers-hero__breadcrumb-sep">
                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" aria-hidden="true"><path d="M1 1L7 6L1 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="careers-hero__breadcrumb-current">채용공고</span>
            </nav>
        </div>
    </section>

    <!-- Listings Section -->
    <section class="careers-all-listings">
        <div class="container">

            <!-- Top bar: count + search -->
            <div class="careers-all-topbar">
                <p class="careers-all-count">총 <strong>134건</strong>의 포지션에서 당신의 혁신이 필요합니다.</p>
                <div class="careers-all-search">
                    <input type="text" placeholder="검색어를 입력해주세요." aria-label="직무 검색">
                    <button class="careers-all-search__btn" aria-label="검색">
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/search-btn.svg'); ?>" alt="" width="50" height="50">
                    </button>
                </div>
            </div>

            <!-- Sort + filter controls -->
            <div class="careers-all-controls">
                <div class="careers-all-sort">
                    <label class="careers-all-sort__option careers-all-sort__option--active">
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/sort-selected.svg'); ?>" alt="" width="30" height="30">
                        게재일 순
                    </label>
                    <label class="careers-all-sort__option">
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/sort-empty.svg'); ?>" alt="" width="30" height="30">
                        마감 순
                    </label>
                </div>
                <div class="careers-all-filter">
                    <span class="careers-all-filter__tab careers-all-filter__tab--active">전체</span>
                    <div class="careers-all-filter__divider" aria-hidden="true"></div>
                    <span class="careers-all-filter__tab">변호사</span>
                    <div class="careers-all-filter__divider" aria-hidden="true"></div>
                    <span class="careers-all-filter__tab">사무원</span>
                    <div class="careers-all-filter__divider" aria-hidden="true"></div>
                    <span class="careers-all-filter__tab">인턴십</span>
                </div>
            </div>

            <!-- Job cards grid -->
            <div class="careers-grid">
                <?php foreach ($job_cards as $card) : ?>
                <a href="<?php echo esc_url(home_url('/careers-detail/')); ?>" class="careers-card-link">
                    <article class="careers-card">
                        <div class="careers-card__header">
                            <div class="careers-card__meta">
                                <span class="careers-card__badge careers-card__badge--<?php echo esc_attr($card['badge_mod']); ?>">
                                    <?php echo esc_html($card['badge']); ?>
                                </span>
                                <span class="careers-card__type"><?php echo esc_html($card['type']); ?></span>
                            </div>
                            <button class="careers-card__share" aria-label="공유">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/share-icon.svg'); ?>" alt="" width="44" height="44">
                            </button>
                        </div>
                        <div class="careers-card__body">
                            <h3 class="careers-card__title"><?php echo esc_html($card['title']); ?></h3>
                            <div class="careers-card__date">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/calendar-icon.svg'); ?>" alt="" width="15" height="16">
                                <span><?php echo esc_html($card['date']); ?></span>
                            </div>
                        </div>
                    </article>
                </a>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <div class="careers-all-pagination">
                <div class="pagination-edges">
                    <button aria-label="처음 페이지">
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/page-first.svg'); ?>" alt="" width="14" height="13">
                    </button>
                    <button aria-label="이전 페이지">
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/page-prev-btn.svg'); ?>" alt="" width="40" height="40">
                    </button>
                </div>
                <div class="pagination-numbers">
                    <button class="active" aria-current="page">1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>4</button>
                    <button>5</button>
                </div>
                <div class="pagination-edges">
                    <button aria-label="다음 페이지">
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/page-next-btn.svg'); ?>" alt="" width="40" height="40">
                    </button>
                    <button aria-label="마지막 페이지">
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/page-next.svg'); ?>" alt="" width="14" height="13">
                    </button>
                </div>
            </div>

        </div>
    </section>

    <footer class="footer careers-footer" role="contentinfo">
        <div class="footer-bottom">
            <div class="container footer-legal">
                <div class="legal-top">
                    <a href="<?php echo esc_url(home_url('/directions/')); ?>">오시는길</a>
                    <span class="divider"></span>
                    <a href="<?php echo esc_url(home_url('/privacy/')); ?>" class="bold">개인정보처리방침</a>
                </div>
                <div class="legal-separator"></div>
                <div class="legal-bottom">
                    <div class="legal-info">
                        <p>경기도 수원시 장안구 경수대로 976번길 19(송죽동)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel : 070-7800-2114</p>
                        <p class="copyright">Copyright ⓒ Pyeongjeong. All Rights Reserved</p>
                    </div>
                    <div class="footer-logo-wrap">
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/about/footer-logo.png'); ?>" alt="<?php esc_attr_e('법률사무소 평정', 'pjlaw'); ?>" class="footer-logo" />
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php pjlaw_render_quick_actions_menu(); ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
