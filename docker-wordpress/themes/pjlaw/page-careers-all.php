<?php
if (!defined('ABSPATH')) { exit; }
get_header();
$theme_uri = get_template_directory_uri();

// Active category filter (부문 slug) from the URL.
$current_cat = isset($_GET['cat']) ? sanitize_text_field(wp_unslash($_GET['cat'])) : '';

$query_args = array(
    'post_type'      => 'pj_career',
    'posts_per_page' => 9,
    'paged'          => max(1, get_query_var('paged')),
    'post_status'    => 'publish',
    'orderby'        => array('menu_order' => 'ASC', 'date' => 'DESC'),
);
if ($current_cat) {
    $query_args['tax_query'] = array(
        array('taxonomy' => 'pj_career_category', 'field' => 'slug', 'terms' => $current_cat),
    );
}
$careers_query = new WP_Query($query_args);

// Filter tabs: 전체 + each 부문 term, active state from the current filter.
$filter_tabs = array(
    array('label' => '전체', 'slug' => '', 'active' => ($current_cat === '')),
);
$career_cat_terms = get_terms(array('taxonomy' => 'pj_career_category', 'hide_empty' => false));
if (!is_wp_error($career_cat_terms)) {
    foreach ($career_cat_terms as $term) {
        $filter_tabs[] = array('label' => $term->name, 'slug' => $term->slug, 'active' => ($current_cat === $term->slug));
    }
}
$total_found = (int) $careers_query->found_posts;
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
                <p class="careers-all-count">총 <strong><?php echo esc_html($total_found); ?>건</strong>의 포지션에서 당신의 혁신이 필요합니다.</p>
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
                    <?php foreach ($filter_tabs as $i => $tab) :
                        $tab_url = $tab['slug'] ? add_query_arg('cat', $tab['slug'], home_url('/careers-all/')) : home_url('/careers-all/');
                    ?>
                        <a href="<?php echo esc_url($tab_url); ?>" class="careers-all-filter__tab<?php echo $tab['active'] ? ' careers-all-filter__tab--active' : ''; ?>"><?php echo esc_html($tab['label']); ?></a>
                        <?php if ($i < count($filter_tabs) - 1) : ?>
                            <div class="careers-all-filter__divider" aria-hidden="true"></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Job cards grid -->
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
                <?php endwhile; wp_reset_postdata(); else : ?>
                    <p class="careers-all-empty">등록된 공고가 없습니다.</p>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php
            $paged     = max(1, get_query_var('paged'));
            $max_pages = (int) $careers_query->max_num_pages;
            if ($max_pages > 1) :
                $start = max(1, $paged - 2);
                $end   = min($max_pages, $start + 4);
                if ($end - $start < 4) $start = max(1, $end - 4);
                $base_args = $current_cat ? array('cat' => $current_cat) : array();
                $page_link = function ($p) use ($base_args) {
                    $args = $p > 1 ? array_merge($base_args, array('paged' => $p)) : $base_args;
                    return add_query_arg($args, home_url('/careers-all/'));
                };
            ?>
            <div class="careers-all-pagination">
                <div class="pagination-edges">
                    <a href="<?php echo esc_url($page_link(1)); ?>" aria-label="처음 페이지"<?php echo $paged <= 1 ? ' class="disabled"' : ''; ?>>
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/page-first.svg'); ?>" alt="" width="14" height="13">
                    </a>
                    <a href="<?php echo esc_url($page_link(max(1, $paged - 1))); ?>" aria-label="이전 페이지"<?php echo $paged <= 1 ? ' class="disabled"' : ''; ?>>
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/page-prev-btn.svg'); ?>" alt="" width="40" height="40">
                    </a>
                </div>
                <div class="pagination-numbers">
                    <?php for ($p = $start; $p <= $end; $p++) : ?>
                        <?php if ($p === $paged) : ?>
                            <button class="active" aria-current="page"><?php echo $p; ?></button>
                        <?php else : ?>
                            <a href="<?php echo esc_url($page_link($p)); ?>"><?php echo $p; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <div class="pagination-edges">
                    <a href="<?php echo esc_url($page_link(min($max_pages, $paged + 1))); ?>" aria-label="다음 페이지"<?php echo $paged >= $max_pages ? ' class="disabled"' : ''; ?>>
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/page-next-btn.svg'); ?>" alt="" width="40" height="40">
                    </a>
                    <a href="<?php echo esc_url($page_link($max_pages)); ?>" aria-label="마지막 페이지"<?php echo $paged >= $max_pages ? ' class="disabled"' : ''; ?>>
                        <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/page-next.svg'); ?>" alt="" width="14" height="13">
                    </a>
                </div>
            </div>
            <?php endif; ?>

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
                        <p>서울특별시 강남구 테헤란로 238, 마크로젠빌딩 12층&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel : 02-554-5674</p>
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
