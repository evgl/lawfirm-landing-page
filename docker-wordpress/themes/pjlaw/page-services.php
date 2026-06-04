<?php
/**
 * Services (업무분야) Page Template
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

$is_detail = isset($_GET['service']);
$service_name = $is_detail ? sanitize_text_field($_GET['service']) : '';

// Helper function to extract Korean choseong (initial consonant)
if (!function_exists('pjlaw_get_korean_choseong')) {
    function pjlaw_get_korean_choseong($str) {
        if (empty($str)) return '';
        $first_char = mb_substr($str, 0, 1, 'UTF-8');
        
        $char_code = 0;
        if (strlen($first_char) === 3) {
            $char_code = ((ord($first_char[0]) & 0x1F) << 12) | ((ord($first_char[1]) & 0x3F) << 6) | (ord($first_char[2]) & 0x3F);
        }
        
        if ($char_code >= 0xAC00 && $char_code <= 0xD7A3) {
            $base = $char_code - 0xAC00;
            $choseong_idx = (int) ($base / 588);
            $choseong_list = array(
                'ㄱ', 'ㄲ', 'ㄴ', 'ㄷ', 'ㄸ', 'ㄹ', 'ㅁ', 'ㅂ', 'ㅃ', 'ㅅ', 'ㅆ', 'ㅇ', 'ㅈ', 'ㅉ', 'ㅊ', 'ㅋ', 'ㅌ', 'ㅍ', 'ㅎ'
            );
            return $choseong_list[$choseong_idx] ?? '';
        }
        return '';
    }
}

// Helper to map title to consonant group label
if (!function_exists('pjlaw_get_consonant_group')) {
    function pjlaw_get_consonant_group($title) {
        $choseong = pjlaw_get_korean_choseong($title);
        $groups = array(
            '가' => array('ㄱ', 'ㄲ'),
            '나' => array('ㄴ'),
            '다' => array('ㄷ', 'ㄸ'),
            '라' => array('ㄹ'),
            '마' => array('ㅁ'),
            '바' => array('ㅂ', 'ㅃ'),
            '사' => array('ㅅ', 'ㅆ'),
            '아' => array('ㅇ'),
            '자' => array('ㅈ', 'ㅉ'),
            '차' => array('ㅊ'),
            '카' => array('ㅋ'),
            '타' => array('ㅌ'),
            '파' => array('ㅍ'),
            '하' => array('ㅎ'),
        );
        foreach ($groups as $group_char => $choseongs) {
            if (in_array($choseong, $choseongs, true)) {
                return $group_char;
            }
        }
        return '';
    }
}

// Helper to render category icon
if (!function_exists('pjlaw_render_category_icon')) {
    function pjlaw_render_category_icon($slug, $theme_uri) {
        if ($slug === 'civil') {
            ?>
            <svg width="40" height="40" viewBox="0 0 37 30" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" overflow="visible" preserveAspectRatio="xMidYMid meet">
                <path d="M18 4.31543C18.9306 4.31543 19.6846 5.0694 19.6846 6V26.4346H16.3154V6C16.3154 5.0694 17.0694 4.31543 18 4.31543Z" stroke="#FFFFFF" stroke-width="1.88"/>
                <rect x="16.315" y="0.94" width="3.37" height="3.37" rx="1.685" stroke="#FFFFFF" stroke-width="1.88"/>
                <rect x="5.88867" y="5.49414" width="11.087" height="1.875" rx="0.9375" fill="#FFFFFF"/>
                <rect x="19.1895" y="5.49414" width="11.087" height="1.875" rx="0.9375" fill="#FFFFFF"/>
                <path d="M12.4717 17.0654C12.0308 19.4105 9.97314 21.1846 7.5 21.1846H6C3.52686 21.1846 1.46918 19.4105 1.02832 17.0654H12.4717Z" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="1.88"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.69628 5.53469C7.07788 5.5131 7.44998 5.72785 7.61034 6.09914L12.0156 16.2993C12.2205 16.7745 12.0014 17.3255 11.5264 17.5308C11.0511 17.7361 10.4993 17.5178 10.2939 17.0425L6.70116 8.72414L3.10839 17.0425C2.90298 17.5177 2.3512 17.7361 1.87596 17.5308C1.40092 17.3253 1.18241 16.7735 1.38768 16.2984L5.79296 6.09914C5.95183 5.73139 6.3185 5.5177 6.69628 5.53469Z" fill="#FFFFFF"/>
                <path d="M35.1279 17.0654C34.6871 19.4105 32.6294 21.1846 30.1562 21.1846H28.6562C26.1831 21.1846 24.1254 19.4105 23.6846 17.0654H35.1279Z" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="1.88"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M29.3486 5.53469C29.7302 5.5131 30.1023 5.72785 30.2627 6.09914L34.668 16.2993C34.8729 16.7745 34.6538 17.3255 34.1787 17.5308C33.7034 17.7361 33.1516 17.5178 32.9463 17.0425L29.3535 8.72414L25.7607 17.0425C25.5553 17.5177 25.0035 17.7361 24.5283 17.5308C24.0533 17.3253 23.8348 16.7735 24.04 16.2984L28.4453 6.09914C28.6042 5.73139 28.9708 5.5177 29.3486 5.53469Z" fill="#FFFFFF"/>
                <rect x="10.125" y="25.5" width="15.75" height="1.875" rx="0.9375" fill="#FFFFFF"/>
                <rect x="7.875" y="28.125" width="20.25" height="1.875" rx="0.9375" fill="#FFFFFF"/>
            </svg>
            <?php
        } elseif ($slug === 'corporate') {
            ?>
            <div class="corporate-icon-wrapper">
                <div class="corporate-building-1"></div>
                <div class="corporate-building-2"></div>
                <div class="corporate-building-3"></div>
            </div>
            <?php
        } else {
            $icon_filename = 'icon-' . $slug . '.svg';
            if ($slug === 'sexual') $icon_filename = 'icon-sexual-crime.svg';
            if ($slug === 'realestate') $icon_filename = 'icon-real-estate.svg';
            ?>
            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/' . $icon_filename); ?>" alt="" />
            <?php
        }
    }
}

// Fetch single service post if details view
$service_post = null;
if ($is_detail) {
    $service_posts = get_posts(array(
        'post_type'      => 'pj_service',
        'title'          => $service_name,
        'posts_per_page' => 1,
        'post_status'    => 'publish'
    ));
    if (!empty($service_posts)) {
        $service_post = $service_posts[0];
    }
}

get_header();
$theme_uri = get_template_directory_uri();
?>

<main id="main" class="site-main services-page" role="main">
    <?php if ($is_detail && $service_post) : 
        $service_post_id = $service_post->ID;
        
        // Fetch taxonomies
        $service_categories = get_the_terms($service_post_id, 'pj_service_category');
        $primary_cat = ($service_categories && !is_wp_error($service_categories)) ? $service_categories[0] : null;
        $primary_cat_name = $primary_cat ? $primary_cat->name : '일반';
        $primary_cat_slug = $primary_cat ? $primary_cat->slug : 'general';
        $primary_cat_term_id = $primary_cat ? $primary_cat->term_id : 0;

        $service_tags = get_the_terms($service_post_id, 'pj_service_tag');
        if (!is_array($service_tags) || is_wp_error($service_tags)) $service_tags = array();

        // Fetch meta fields
        $main_title = get_post_meta($service_post_id, '_pj_service_main_title', true) ?: $service_name . '의 개념, 처벌수위 및 쟁점';
        $cards = get_post_meta($service_post_id, '_pj_service_cards', true);
        if (!is_array($cards)) $cards = array();

        $closing_title = get_post_meta($service_post_id, '_pj_service_closing_title', true) ?: '법률사무소 평정이 함께합니다';
        $closing_desc = get_post_meta($service_post_id, '_pj_service_closing_content', true);
        if (empty($closing_desc)) {
            $closing_desc = "명예훼손은 누구나 피해자가 될 수 있는 동시에, 한순간의 실수로 의도치 않게 가해자로 지목될 수도 있는 사건입니다.\n특히 온라인상의 발언은 찰나의 순간에 전파되어 누군가에게는 회복하기 어려운 인격적 상처를 남기고, 다른 누군가에게는 과도한 형사 처벌과 경제적 손실이라는 위기를 불러오기도 합니다. 사건의 본질이 정당한 비판이었는지 아니면 악의적인 비방이었는지를 가려내는 일은 단순히 사실관계를 확인하는 수준을 넘어, 고도의 법리적 해석과 치밀한 논리 싸움이 동반되어야 하는 과정입니다.\n법률사무소 평정은 소중한 명예를 침해당한 피해자에게는 실효성 있는 증거 수집과 단호한 대응으로 실추된 평판을 되찾아드리고, 억울하게 고소를 당한 가해 피의자에게는 발언의 공익성과 비방 목적의 부재를 입증하여 부당한 처벌로부터 방어해 드립니다.";
        }

        // Sidebar content overrides
        $rel_law_ids   = get_post_meta($service_post_id, '_pj_service_related_law_info', true);
        $rel_strat_ids = get_post_meta($service_post_id, '_pj_service_related_strategies', true);
        $rel_case_ids  = get_post_meta($service_post_id, '_pj_service_related_cases', true);

        // Helper to retrieve related posts
        if (!function_exists('pjlaw_get_related_posts_for_service')) {
            function pjlaw_get_related_posts_for_service($ids_string, $post_type = 'pj_blog_post', $category_filter = '', $current_service_name = '') {
                $ids = array_filter(array_map('intval', explode(',', $ids_string)));
                if ($ids) {
                    return get_posts(array('post_type' => $post_type, 'post__in' => $ids, 'numberposts' => 3, 'orderby' => 'post__in'));
                }
                
                // Fallbacks
                $query_args = array(
                    'post_type'      => $post_type,
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                );
                
                if ($post_type === 'pj_blog_post') {
                    $tax_query = array('relation' => 'AND');
                    if (!empty($current_service_name)) {
                        $tax_query[] = array(
                            'taxonomy' => 'pj_blog_service',
                            'field'    => 'name',
                            'terms'    => $current_service_name,
                        );
                    }
                    if (!empty($category_filter)) {
                        $tax_query[] = array(
                            'taxonomy' => 'pj_blog_category',
                            'field'    => 'name',
                            'terms'    => $category_filter,
                        );
                    }
                    if (count($tax_query) > 1) {
                        $query_args['tax_query'] = $tax_query;
                    }
                } elseif ($post_type === 'legal_case') {
                    if (!empty($category_filter)) {
                        $query_args['tax_query'] = array(
                            array(
                                'taxonomy' => 'pj_case_category',
                                'field'    => 'slug',
                                'terms'    => $category_filter,
                            )
                        );
                    }
                }
                
                return get_posts($query_args);
            }
        }

        $related_law_info = pjlaw_get_related_posts_for_service($rel_law_ids, 'pj_blog_post', '법률정보', $service_name);
        $related_strats    = pjlaw_get_related_posts_for_service($rel_strat_ids, 'pj_blog_post', '대응전략', $service_name);
        $related_cases    = pjlaw_get_related_posts_for_service($rel_case_ids, 'legal_case', $primary_cat_slug);

        // Prev/Next Navigation within primary category
        $prev_service = null;
        $next_service = null;
        if ($primary_cat_term_id) {
            $sibling_posts = get_posts(array(
                'post_type'      => 'pj_service',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => array('menu_order' => 'ASC', 'ID' => 'DESC'),
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'pj_service_category',
                        'field'    => 'term_id',
                        'terms'    => $primary_cat_term_id,
                    )
                )
            ));

            $current_idx = -1;
            foreach ($sibling_posts as $idx => $sp) {
                if ($sp->ID === $service_post_id) {
                    $current_idx = $idx;
                    break;
                }
            }

            if ($current_idx !== -1) {
                if ($current_idx > 0) {
                    $prev_service = $sibling_posts[$current_idx - 1];
                }
                if ($current_idx < count($sibling_posts) - 1) {
                    $next_service = $sibling_posts[$current_idx + 1];
                }
            }
        }
        ?>
        <div class="blog-post-nav">
            <div class="blog-post-nav__inner">
                <div class="blog-post-nav__links">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="blog-post-nav__home-link" aria-label="<?php esc_attr_e('홈으로 이동', 'pjlaw'); ?>">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-home-nav.svg'); ?>" alt="" aria-hidden="true" class="blog-post-nav__icon" width="19" height="18" />
                    </a>
                    <div class="blog-post-nav__separator"></div>
                    <div class="blog-post-nav__current">
                        <span class="blog-post-nav__title"><?php echo esc_html($service_name); ?></span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-chevron-down-small.svg'); ?>" alt="" />
                    </div>
                    <div class="blog-post-nav__separator"></div>
                </div>
                <a href="<?php echo esc_url(home_url('/services/')); ?>" class="blog-post-nav__close-link" aria-label="<?php esc_attr_e('목록으로 돌아가기', 'pjlaw'); ?>">
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-close-nav.svg'); ?>" alt="" aria-hidden="true" class="blog-post-nav__icon-close" width="20" height="20" />
                </a>
            </div>
            <div class="blog-post-nav__line-wrap">
                <div class="blog-post-nav__line-bg"></div>
                <div class="blog-post-nav__line-active"></div>
            </div>
        </div>
        <section class="sd-header">
            <div class="container sd-header__inner">
                <div class="sd-header__content">
                    <div class="sd-header__breadcrumb"><?php echo esc_html($primary_cat_name); ?> / <?php echo esc_html($service_name); ?></div>
                    <h1 class="sd-header__title"><?php echo esc_html($service_name); ?></h1>
                    <?php if (!empty($service_tags)) : ?>
                        <div class="sd-header__pills">
                            <?php foreach ($service_tags as $tag) : ?>
                                <span class="sd-header__pill">#<?php echo esc_html($tag->name); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="sd-layout">
            <div class="container sd-layout__inner">
                <div class="sd-main">
                    <div class="sd-section-title">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-section-header.svg'); ?>" alt="" class="sd-section-title__icon" />
                        <h2><?php echo esc_html($main_title); ?></h2>
                    </div>

                    <?php if (!empty($cards)) : ?>
                        <div class="sd-cards">
                            <?php foreach ($cards as $idx => $card) : ?>
                                <div class="sd-card">
                                    <div class="sd-card__header">
                                        <div class="sd-card__number"><?php echo $idx + 1; ?></div>
                                        <h3 class="sd-card__heading"><?php echo esc_html($card['heading']); ?></h3>
                                    </div>
                                    <div class="sd-card__divider"></div>
                                    <div class="sd-card__body">
                                        <?php 
                                        $paragraphs = preg_split('/\r\n\r\n|\n\n|\r\r/', $card['content']);
                                        foreach ($paragraphs as $p) {
                                            $p = trim($p);
                                            if ($p !== '') {
                                                echo '<p>' . nl2br(esc_html($p)) . '</p>';
                                            }
                                        }
                                        ?>

                                        <?php if (!empty($card['table_data'])) : ?>
                                            <?php if (!empty($card['table_title'])) : ?>
                                                <div class="sd-card__inner-divider"></div>
                                                <h4 class="sd-card__subheading"><?php echo esc_html($card['table_title']); ?></h4>
                                            <?php endif; ?>
                                            <?php
                                            $table_rows = preg_split('/\r\n|\n|\r/', trim($card['table_data']));
                                            if (!empty($table_rows)) :
                                                $header_cols = array_map('trim', explode('|', array_shift($table_rows)));
                                                $is_multi_col = count($header_cols) >= 4;
                                                $table_class = 'sd-table' . ($is_multi_col ? ' sd-table--4col' : '');
                                            ?>
                                            <div class="sd-table-wrap">
                                                <table class="<?php echo esc_attr($table_class); ?>">
                                                    <thead>
                                                        <tr>
                                                            <?php foreach ($header_cols as $col) : ?>
                                                                <th><?php echo esc_html($col); ?></th>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($table_rows as $row_str) : 
                                                            $row_cols = array_map('trim', explode('|', $row_str));
                                                            if (count($row_cols) < count($header_cols)) continue;
                                                        ?>
                                                            <tr>
                                                                <?php foreach ($row_cols as $cell) : ?>
                                                                    <td><?php echo esc_html($cell); ?></td>
                                                                <?php endforeach; ?>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if (!empty($card['laws_data'])) : ?>
                                            <?php
                                            $law_blocks = explode('---', $card['laws_data']);
                                            if (!empty($law_blocks)) :
                                            ?>
                                            <div class="sd-card__inner-divider"></div>
                                            <h4 class="sd-card__subheading">관련 법조항</h4>
                                            <div class="sd-law-blocks">
                                                <?php foreach ($law_blocks as $block) :
                                                    $lines = array_filter(array_map('trim', preg_split('/\r\n|\n|\r/', trim($block))));
                                                    if (empty($lines)) continue;
                                                    $law_title = array_shift($lines);
                                                    $law_content = implode("<br>", array_map('esc_html', $lines));
                                                ?>
                                                <div class="sd-law-block">
                                                    <div class="sd-law-block__header">
                                                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-law.svg'); ?>" alt="" />
                                                        <h5><?php echo esc_html($law_title); ?></h5>
                                                    </div>
                                                    <div class="sd-law-block__body">
                                                        <p><?php echo $law_content; ?></p>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="sd-cards-divider"></div>

                    <div class="sd-section-title">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-section-header.svg'); ?>" alt="" class="sd-section-title__icon" />
                        <h2><?php echo esc_html($closing_title); ?></h2>
                    </div>
                    <div class="sd-card sd-pjlaw-card">
                        <div class="sd-card__body">
                            <?php foreach (preg_split('/\r\n\r\n|\n\n|\r\r/', $closing_desc) as $p) : 
                                $p = trim($p);
                                if ($p !== '') :
                            ?>
                                <p><?php echo nl2br(esc_html($p)); ?></p>
                            <?php endif; endforeach; ?>
                        </div>
                    </div>

                    <div class="sd-list-btn-wrap">
                        <a href="<?php echo esc_url(home_url('/services/')); ?>" class="sd-list-btn">목록</a>
                    </div>

                    <div class="sd-nav-row">
                        <div class="sd-nav-item sd-nav-prev">
                            <?php if ($prev_service) : ?>
                                <a href="<?php echo esc_url(add_query_arg('service', $prev_service->post_title, home_url('/services/'))); ?>" class="sd-nav-link-wrap">
                                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-arrow-prev.svg'); ?>" alt="Prev" />
                                    <span>Prev</span>
                                </a>
                                <div class="sd-nav-text"><?php echo esc_html($prev_service->post_title); ?></div>
                            <?php else : ?>
                                <div class="sd-nav-link-wrap">
                                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-arrow-prev.svg'); ?>" alt="Prev" />
                                    <span>Prev</span>
                                </div>
                                <div class="sd-nav-text">이전 게시물이 없습니다.</div>
                            <?php endif; ?>
                        </div>
                        <div class="sd-nav-item sd-nav-next">
                            <?php if ($next_service) : ?>
                                <a href="<?php echo esc_url(add_query_arg('service', $next_service->post_title, home_url('/services/'))); ?>" class="sd-nav-link-wrap">
                                    <span>Next</span>
                                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-arrow-next.svg'); ?>" alt="Next" />
                                </a>
                                <div class="sd-nav-text"><?php echo esc_html($next_service->post_title); ?></div>
                            <?php else : ?>
                                <div class="sd-nav-link-wrap">
                                    <span>Next</span>
                                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-arrow-next.svg'); ?>" alt="Next" />
                                </div>
                                <div class="sd-nav-text">다음 게시물이 없습니다.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="sd-sidebar">
                    <div class="sd-sidebar__top-icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-top.svg'); ?>" alt="" />
                    </div>
                    
                    <?php if (!empty($related_law_info)) : ?>
                        <div class="sd-sidebar-card">
                            <div class="sd-sidebar-card__header">
                                <h3>관련 법률정보</h3>
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-chevron.svg'); ?>" alt="" />
                            </div>
                            <div class="sd-sidebar-card__list">
                                <?php foreach ($related_law_info as $rp) : ?>
                                    <a href="<?php echo esc_url(get_permalink($rp)); ?>" class="sd-sidebar-card__item">
                                        <span><?php echo esc_html(get_the_title($rp)); ?></span>
                                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-arrow.svg'); ?>" alt="" />
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($related_strats)) : ?>
                        <div class="sd-sidebar-card">
                            <div class="sd-sidebar-card__header">
                                <h3>관련 대응전략</h3>
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-chevron.svg'); ?>" alt="" />
                            </div>
                            <div class="sd-sidebar-card__list">
                                <?php foreach ($related_strats as $rp) : ?>
                                    <a href="<?php echo esc_url(get_permalink($rp)); ?>" class="sd-sidebar-card__item">
                                        <span><?php echo esc_html(get_the_title($rp)); ?></span>
                                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-arrow.svg'); ?>" alt="" />
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($related_cases)) : ?>
                        <div class="sd-sidebar-card">
                            <div class="sd-sidebar-card__header">
                                <h3>관련 업무사례</h3>
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-chevron.svg'); ?>" alt="" />
                            </div>
                            <div class="sd-sidebar-card__list">
                                <?php foreach ($related_cases as $rp) : ?>
                                    <a href="<?php echo esc_url(get_permalink($rp)); ?>" class="sd-sidebar-card__item">
                                        <span><?php echo esc_html(get_the_title($rp)); ?></span>
                                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-arrow.svg'); ?>" alt="" />
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    <?php else : 
        // Listing view
        $popular_tags = get_terms(array(
            'taxonomy'   => 'pj_service_tag',
            'hide_empty' => false,
            'orderby'    => 'count',
            'order'      => 'DESC',
            'number'     => 10
        ));
        if (is_wp_error($popular_tags)) $popular_tags = array();

        $categories = get_terms(array(
            'taxonomy'   => 'pj_service_category',
            'hide_empty' => false,
            'orderby'    => 'id',
            'order'      => 'ASC'
        ));
        if (is_wp_error($categories)) $categories = array();

        // Query all services
        $all_services = get_posts(array(
            'post_type'      => 'pj_service',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'title',
            'order'          => 'ASC'
        ));

        // Group services alphabetically for "전체" tab
        $consonant_groups = array(
            '가' => array('ㄱ', 'ㄲ'),
            '나' => array('ㄴ'),
            '다' => array('ㄷ', 'ㄸ'),
            '라' => array('ㄹ'),
            '마' => array('ㅁ'),
            '바' => array('ㅂ', 'ㅃ'),
            '사' => array('ㅅ', 'ㅆ'),
            '아' => array('ㅇ'),
            '자' => array('ㅈ', 'ㅉ'),
            '차' => array('ㅊ'),
            '카' => array('ㅋ'),
            '타' => array('ㅌ'),
            '파' => array('ㅍ'),
            '하' => array('ㅎ'),
        );

        $grouped_services = array();
        foreach ($consonant_groups as $group_char => $choseongs) {
            $grouped_services[$group_char] = array();
        }

        foreach ($all_services as $post) {
            $group = pjlaw_get_consonant_group($post->post_title);
            if ($group) {
                $grouped_services[$group][] = $post;
            }
        }

        // Cache category services for the category panel loops
        $cat_services = array();
        foreach ($categories as $cat) {
            $cat_services[$cat->term_id] = get_posts(array(
                'post_type'      => 'pj_service',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => array('menu_order' => 'ASC', 'ID' => 'DESC'),
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'pj_service_category',
                        'field'    => 'term_id',
                        'terms'    => $cat->term_id,
                    )
                )
            ));
        }
        ?>
        <section class="services-hero">
            <div class="services-hero__bg">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/services/hero.png'); ?>" alt="" class="services-hero__image" />
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
                <?php if (!empty($popular_tags)) : ?>
                    <div class="services-search__tags">
                        <?php foreach ($popular_tags as $tag) : ?>
                            <span class="services-search__tag" style="cursor:pointer;">#<?php echo esc_html($tag->name); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="services-content">
            <div class="container">
                <div class="services-tabs">
                    <div class="services-tab active" data-target="tab-category">
                        <span class="services-tab__text">분야별</span>
                    </div>
                    <div class="services-tab" data-target="tab-all">
                        <span class="services-tab__text">전체</span>
                    </div>
                </div>

                <div id="tab-category" class="services-tab-content active">
                    <div class="services-grid">
                        <?php foreach ($categories as $idx => $cat) : 
                            $active_class = ($idx === 0) ? ' active' : '';
                        ?>
                            <a href="#<?php echo esc_attr($cat->slug); ?>" class="services-grid__item<?php echo $active_class; ?>" data-slug="<?php echo esc_attr($cat->slug); ?>">
                                <div class="services-grid__icon">
                                    <?php pjlaw_render_category_icon($cat->slug, $theme_uri); ?>
                                </div>
                                <span class="services-grid__label"><?php echo esc_html($cat->name); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <?php foreach ($categories as $idx => $cat) : 
                        $active_style = ($idx === 0) ? '' : ' style="display:none;"';
                    ?>
                        <div class="services-details" id="cat-details-<?php echo esc_attr($cat->slug); ?>"<?php echo $active_style; ?>>
                            <div class="services-details__header">
                                <h2 class="services-details__title"><?php echo esc_html($cat->name); ?> 분야</h2>
                                <?php if (!empty($cat->description)) : ?>
                                    <div class="services-details__desc">
                                        <?php foreach (preg_split('/\r\n\r\n|\n\n|\r\r/', $cat->description) as $p) : 
                                            $p = trim($p);
                                            if ($p !== '') :
                                        ?>
                                            <p><?php echo nl2br(esc_html($p)); ?></p>
                                        <?php endif; endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="services-details__divider"></div>

                            <?php 
                            $list = $cat_services[$cat->term_id] ?? array();
                            if (!empty($list)) :
                            ?>
                                <div class="services-details__sub">
                                    <h3 class="services-details__sub-title"><?php echo esc_html($cat->name); ?> 사건의 세부 업무분야</h3>
                                    <div class="services-details__sub-tags">
                                        <?php foreach ($list as $sp) : ?>
                                            <a href="<?php echo esc_url(add_query_arg('service', $sp->post_title, home_url('/services/'))); ?>" class="services-details__sub-tag" data-search-term="<?php echo esc_attr($sp->post_title); ?>"><?php echo esc_html($sp->post_title); ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="services-details__divider"></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div id="tab-all" class="services-tab-content">
                    <div class="services-alpha-nav">
                        <?php 
                        $first_group = true;
                        foreach ($grouped_services as $group_char => $posts) : 
                            $count = count($posts);
                            $active_class = $first_group ? ' active' : '';
                            $first_group = false;
                        ?>
                            <button class="services-alpha-item<?php echo $active_class; ?>" data-group="<?php echo esc_attr($group_char); ?>">
                                <span class="char"><?php echo esc_html($group_char); ?></span>
                                <span class="count"><?php echo str_pad($count, 2, '0', STR_PAD_LEFT); ?></span>
                            </button>
                        <?php endforeach; ?>
                    </div>

                    <div class="services-all-content">
                        <h2 class="services-all-title">업무분야를 선택해주세요.</h2>
                        <div class="services-all-grid">
                            <?php 
                            $first_group = true;
                            foreach ($grouped_services as $group_char => $posts) : 
                                $display_style = $first_group ? '' : ' style="display:none;"';
                                $first_group = false;
                                foreach ($posts as $sp) :
                            ?>
                                <a href="<?php echo esc_url(add_query_arg('service', $sp->post_title, home_url('/services/'))); ?>" class="services-all-tag" data-group="<?php echo esc_attr($group_char); ?>" data-search-term="<?php echo esc_attr($sp->post_title); ?>"<?php echo $display_style; ?>><?php echo esc_html($sp->post_title); ?></a>
                            <?php endforeach; endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Tab toggling (Category vs All)
    const tabs = document.querySelectorAll('.services-content .services-tab');
    const contents = document.querySelectorAll('.services-content .services-tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            this.classList.add('active');

            const targetId = this.getAttribute('data-target');
            if (targetId) {
                const targetContent = document.getElementById(targetId);
                if (targetContent) {
                    targetContent.classList.add('active');
                }
            }
        });
    });

    // 2. Category grid clicking inside tab-category (Civil, Criminal, etc.)
    const gridItems = document.querySelectorAll('#tab-category .services-grid__item');
    const detailPanels = document.querySelectorAll('#tab-category .services-details');

    gridItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            gridItems.forEach(i => i.classList.remove('active'));
            this.classList.add('active');

            const slug = this.getAttribute('data-slug');
            detailPanels.forEach(panel => {
                if (panel.id === 'cat-details-' + slug) {
                    panel.style.display = 'block';
                } else {
                    panel.style.display = 'none';
                }
            });
        });
    });

    // 3. Consonants clicking inside tab-all (가, 나, 다, 등)
    const alphaItems = document.querySelectorAll('#tab-all .services-alpha-item');
    const allTags = document.querySelectorAll('#tab-all .services-all-tag');

    alphaItems.forEach(item => {
        item.addEventListener('click', function() {
            alphaItems.forEach(i => i.classList.remove('active'));
            this.classList.add('active');

            const group = this.getAttribute('data-group');
            allTags.forEach(tag => {
                if (tag.getAttribute('data-group') === group) {
                    tag.style.display = 'inline-block';
                } else {
                    tag.style.display = 'none';
                }
            });
        });
    });

    // 4. Interactive Search Filter
    const searchInput = document.querySelector('.services-search__input');
    const searchButton = document.querySelector('.services-search__button');
    const popularTags = document.querySelectorAll('.services-search__tag');

    function applySearch(query) {
        query = query.trim().toLowerCase();
        
        // Target sub-tags under active category and tags under "All" grid
        const subTags = document.querySelectorAll('.services-details__sub-tag');
        const allTabTags = document.querySelectorAll('.services-all-tag');

        if (query === '') {
            // Restore default visibility based on active states
            // Category sub-tags
            subTags.forEach(tag => tag.style.display = 'inline-block');

            // All tags based on active consonant group
            const activeGroupItem = document.querySelector('#tab-all .services-alpha-item.active');
            const activeGroup = activeGroupItem ? activeGroupItem.getAttribute('data-group') : '가';
            allTags.forEach(tag => {
                if (tag.getAttribute('data-group') === activeGroup) {
                    tag.style.display = 'inline-block';
                } else {
                    tag.style.display = 'none';
                }
            });
            return;
        }

        // Apply filter
        subTags.forEach(tag => {
            const term = tag.getAttribute('data-search-term').toLowerCase();
            if (term.includes(query)) {
                tag.style.display = 'inline-block';
            } else {
                tag.style.display = 'none';
            }
        });

        allTabTags.forEach(tag => {
            const term = tag.getAttribute('data-search-term').toLowerCase();
            if (term.includes(query)) {
                tag.style.display = 'inline-block';
            } else {
                tag.style.display = 'none';
            }
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            applySearch(this.value);
        });

        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                applySearch(this.value);
            }
        });
    }

    if (searchButton) {
        searchButton.addEventListener('click', function(e) {
            e.preventDefault();
            if (searchInput) {
                applySearch(searchInput.value);
            }
        });
    }

    popularTags.forEach(tag => {
        tag.addEventListener('click', function() {
            const tagName = this.textContent.replace('#', '');
            if (searchInput) {
                searchInput.value = tagName;
                applySearch(tagName);
            }
        });
    });
});
</script>

<?php wp_footer(); ?>
</body>
</html>
