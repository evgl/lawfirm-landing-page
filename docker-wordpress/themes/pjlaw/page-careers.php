<?php
if (!defined('ABSPATH')) { exit; }
get_header();
$theme_uri = get_template_directory_uri();

// Latest published career postings.
$careers_query = new WP_Query(array(
    'post_type'      => 'pj_career',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
    'orderby'        => array('menu_order' => 'ASC', 'date' => 'DESC'),
));

// Filter tabs built from the 부문 taxonomy with live counts.
$total_careers = (int) wp_count_posts('pj_career')->publish;
$filter_tabs = array(
    array('label' => '전체', 'count' => $total_careers . '건', 'active' => true),
);
$career_cat_terms = get_terms(array('taxonomy' => 'pj_career_category', 'hide_empty' => false));
if (!is_wp_error($career_cat_terms)) {
    foreach ($career_cat_terms as $term) {
        $filter_tabs[] = array('label' => $term->name, 'count' => $term->count . '건', 'active' => false);
    }
}

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
            <div class="careers-hero__footer">
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
                <?php if ($careers_query->have_posts()) : while ($careers_query->have_posts()) : $careers_query->the_post();
                    $card_end   = get_post_meta(get_the_ID(), '_pj_career_end_date', true);
                    $card_start = get_post_meta(get_the_ID(), '_pj_career_start_date', true);
                    $card_type  = get_post_meta(get_the_ID(), '_pj_career_employment_type', true);
                    $card_badge = pjlaw_career_badge($card_end);
                ?>
                <a href="<?php the_permalink(); ?>" class="careers-card-link">
                    <article class="careers-card">
                        <div class="careers-card__header">
                            <div class="careers-card__meta">
                                <span class="careers-card__badge careers-card__badge--<?php echo esc_attr($card_badge['mod']); ?>">
                                    <?php echo esc_html($card_badge['badge']); ?>
                                </span>
                                <span class="careers-card__type"><?php echo esc_html($card_type); ?></span>
                            </div>
                            <button class="careers-card__share" aria-label="공유">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/share-icon.svg'); ?>" alt="" width="44" height="44">
                            </button>
                        </div>
                        <div class="careers-card__body">
                            <h3 class="careers-card__title"><?php the_title(); ?></h3>
                            <div class="careers-card__date">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/calendar-icon.svg'); ?>" alt="" width="15" height="16">
                                <span><?php echo esc_html(pjlaw_career_date_range($card_start, $card_end)); ?></span>
                            </div>
                        </div>
                    </article>
                </a>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>

            <div class="careers-viewall-wrap">
                <a href="<?php echo esc_url(home_url('/careers-all/')); ?>" class="careers-viewall">전체보기</a>
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
