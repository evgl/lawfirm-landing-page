<?php
if (!defined('ABSPATH')) { exit; }
get_header();
$theme_uri = get_template_directory_uri();

$job_cards = array(
    array(
        'badge'    => 'D-15',
        'badge_mod' => 'navy',
        'type'     => '경력',
        'title'    => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'     => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'    => 'D-08',
        'badge_mod' => 'navy',
        'type'     => '신입/인턴',
        'title'    => '법무법인(유한) 대륜 의료전문 상담실장 모집',
        'date'     => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'    => 'D-15',
        'badge_mod' => 'navy',
        'type'     => '경력',
        'title'    => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'     => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'    => 'D-DAY',
        'badge_mod' => 'orange',
        'type'     => '경력',
        'title'    => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'     => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'    => 'D-15',
        'badge_mod' => 'navy',
        'type'     => '경력',
        'title'    => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'     => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'    => 'D-15',
        'badge_mod' => 'navy',
        'type'     => '경력',
        'title'    => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'     => '2026. 03. 05 ~ 2026. 03. 05',
    ),
);

$filter_tabs = array(
    array('label' => '전체',   'count' => '20건', 'active' => true),
    array('label' => '변호사', 'count' => '3건',  'active' => false),
    array('label' => '사무원', 'count' => '3건',  'active' => false),
    array('label' => '인턴십', 'count' => '3건',  'active' => false),
);

$talent_values = array(
    array(
        'image_side' => 'left',
        'image'      => 'talent-insight.jpg',
        'heading'    => '법리적 통찰',
        'body'       => "평정은 사건의 본질을 꿰뚫는 해답을 제시합니다.\n복잡하게 얽힌 사건 속에서도 흔들리지 않는 날카로운 통찰력으로 최선의 전략을 도출하며, 이를 통해 법률적 가치의 기준을 세웁니다.",
    ),
    array(
        'image_side' => 'right',
        'image'      => 'talent-leadership-2.jpg',
        'heading'    => '혁신적 리더십',
        'body'       => "평정은 끊임없이 발전합니다. 효율적인 업무\n시스템과 유연한 사고, 기술과 지성의 스마트한\n결합을 통해 법률 서비스의 새로운 기준을\n정립하는 리더가 되고자 합니다.",
    ),
    array(
        'image_side' => 'left',
        'image'      => 'talent-leadership-1.jpg',
        'heading'    => '치밀한 도전',
        'body'       => "평정은 결과로 그 가치를 증명합니다.\n단순한 법률 조력을 넘어, 치밀함과 끈기를 통해\n의뢰인의 권익을 위한 한계 없는 도전을\n지속합니다.",
    ),
);
?>
<main id="main" class="site-main careers-page" role="main">

    <!-- Hero Section -->
    <section class="careers-hero" style="background-image: url('<?php echo esc_url($theme_uri . '/assets/images/careers/hero-people.jpg'); ?>');">
        <div class="careers-hero__overlay"></div>
        <div class="careers-hero__content">
            <div class="careers-hero__text">
                <p class="careers-hero__eyebrow">인재채용</p>
                <h1 class="careers-hero__title">법률사무소 평정은<br>당신의 가능성을 현실로 만듭니다</h1>
                <p class="careers-hero__subtitle">더 나은 세상을 위한 끊임없는 도전,<br>그 시작을 평정 함께하세요.</p>
            </div>
            <nav class="careers-hero__breadcrumb" aria-label="breadcrumb">
                <span class="careers-hero__breadcrumb-home">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true"><path d="M1.5 9L9 1.5L16.5 9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M3 7.5V15.75C3 16.1642 3.33579 16.5 3.75 16.5H7.5V12H10.5V16.5H14.25C14.6642 16.5 15 16.1642 15 15.75V7.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="careers-hero__breadcrumb-sep">
                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" aria-hidden="true"><path d="M1 1L7 6L1 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="careers-hero__breadcrumb-current">인재채용</span>
            </nav>
        </div>
    </section>

    <!-- Job Listings Section -->
    <section class="careers-listings">
        <div class="careers-listings__frame-wrap">
            <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/folder-frame.svg'); ?>" alt="" class="careers-listings__frame-svg" aria-hidden="true">
            <div class="careers-listings__inner">
            <div class="careers-listings__header">
                <div class="careers-listings__header-left">
                    <h2 class="careers-listings__title">현재 진행중인 공고</h2>
                    <div class="careers-filter-tabs">
                        <?php foreach ($filter_tabs as $i => $tab) : ?>
                            <button class="careers-filter-tab<?php echo $tab['active'] ? ' careers-filter-tab--active' : ''; ?>" data-filter="<?php echo esc_attr(strtolower($tab['label'])); ?>">
                                <span class="careers-filter-tab__label"><?php echo esc_html($tab['label']); ?></span>
                                <span class="careers-filter-tab__count"><?php echo esc_html($tab['count']); ?></span>
                            </button>
                            <?php if ($i < count($filter_tabs) - 1) : ?>
                                <div class="careers-filter-tab__divider" aria-hidden="true"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="careers-listings__arrows">
                    <button class="careers-arrow careers-arrow--prev" aria-label="이전">
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/arrow-next.svg'); ?>" alt="" width="60" height="60" style="transform:rotate(180deg);">
                    </button>
                    <button class="careers-arrow careers-arrow--next" aria-label="다음">
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/arrow-next.svg'); ?>" alt="" width="60" height="60">
                    </button>
                </div>
            </div>

            <div class="careers-grid">
                <?php foreach ($job_cards as $card) : ?>
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
                <?php endforeach; ?>
            </div>

            <div class="careers-viewall-wrap">
                <a href="#" class="careers-viewall">전체보기</a>
            </div>
            </div><!-- /.careers-listings__inner -->
        </div><!-- /.careers-listings__frame-wrap -->
    </section>

    <!-- Talent Values Section -->
    <section class="careers-values">
        <div class="careers-right-people" aria-hidden="true">
            <span>RIGHT PEOPLE</span>
            <span>RIGHT PEOPLE</span>
        </div>
        <div class="container">
            <h2 class="careers-values__title">평정의 인재상</h2>
            <div class="careers-values__list">
                <?php foreach ($talent_values as $value) : ?>
                    <div class="careers-value-item<?php echo $value['image_side'] === 'right' ? ' careers-value-item--reverse' : ''; ?>">
                        <div class="careers-value-item__image-wrap">
                            <img
                                src="<?php echo esc_url($theme_uri . '/assets/images/careers/' . $value['image']); ?>"
                                alt=""
                                class="careers-value-item__image"
                            >
                        </div>
                        <div class="careers-value-item__text">
                            <h3 class="careers-value-item__heading"><?php echo esc_html($value['heading']); ?></h3>
                            <div class="careers-value-item__divider"></div>
                            <p class="careers-value-item__body"><?php echo nl2br(esc_html($value['body'])); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
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
