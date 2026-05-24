<?php
/**
 * Single Blog Post Template (pj_blog_post)
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

$theme_uri = get_template_directory_uri();

// Fetch dynamic meta
$hero_image    = get_post_meta(get_the_ID(), '_pj_blog_hero_image', true);
$hero_title    = get_post_meta(get_the_ID(), '_pj_blog_hero_title', true);
$intro_sub     = get_post_meta(get_the_ID(), '_pj_blog_intro_subtitle', true);
$intro_text    = get_post_meta(get_the_ID(), '_pj_blog_intro_text', true);
$faqs          = get_post_meta(get_the_ID(), '_pj_blog_faq', true);
if (!is_array($faqs)) $faqs = array();

// Hero image: custom meta > featured image > default
if (!$hero_image) {
    $hero_image = has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : '';
}
// Hero title: custom meta > post title
if (!$hero_title) {
    $hero_title = get_the_title();
}

// Related content (manual override or auto-derive)
$rel_strategy_ids = get_post_meta(get_the_ID(), '_pj_blog_related_strategies', true);
$rel_case_ids     = get_post_meta(get_the_ID(), '_pj_blog_related_cases', true);
$rel_article_ids  = get_post_meta(get_the_ID(), '_pj_blog_related_articles', true);

function pjlaw_get_related_posts($ids_string, $post_type = 'pj_blog_post', $fallback_tax = '') {
    $ids = array_filter(array_map('intval', explode(',', $ids_string)));
    if ($ids) {
        return get_posts(array('post_type' => $post_type, 'post__in' => $ids, 'numberposts' => 3, 'orderby' => 'post__in'));
    }
    if ($fallback_tax) {
        $terms = get_the_terms(get_the_ID(), $fallback_tax);
        if ($terms && !is_wp_error($terms)) {
            return get_posts(array(
                'post_type'   => $post_type,
                'numberposts' => 3,
                'post__not_in'=> array(get_the_ID()),
                'tax_query'   => array(array('taxonomy' => $fallback_tax, 'field' => 'term_id', 'terms' => wp_list_pluck($terms, 'term_id'))),
            ));
        }
    }
    return array();
}

$related_strategies = pjlaw_get_related_posts($rel_strategy_ids, 'pj_blog_post', 'pj_blog_service');
$related_cases      = pjlaw_get_related_posts($rel_case_ids, 'legal_case', '');
$related_articles   = pjlaw_get_related_posts($rel_article_ids, 'pj_blog_post', 'pj_blog_category');

// Prev/Next
$prev_post = get_previous_post();
$next_post = get_next_post();
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>
<body <?php body_class('blog-post-page'); ?>>
    <?php wp_body_open(); ?>

    <main id="main" class="site-main blog-post-page" role="main">
    <div class="blog-post-nav">
        <div class="blog-post-nav__inner">
            <div class="blog-post-nav__links">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="blog-post-nav__home-link" aria-label="<?php esc_attr_e('홈으로 이동', 'pjlaw'); ?>">
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-home-nav.svg'); ?>" alt="" aria-hidden="true" class="blog-post-nav__icon" width="19" height="18" />
                </a>
                <div class="blog-post-nav__separator"></div>
                <div class="blog-post-nav__current">
                    <span class="blog-post-nav__title"><?php echo esc_html(get_the_title()); ?></span>
                </div>
                <div class="blog-post-nav__separator"></div>
            </div>
            <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="blog-post-nav__close-link" aria-label="<?php esc_attr_e('목록으로 돌아가기', 'pjlaw'); ?>">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-close-nav.svg'); ?>" alt="" aria-hidden="true" class="blog-post-nav__icon-close" width="20" height="20" />
            </a>
        </div>
        <div class="blog-post-nav__line-wrap">
            <div class="blog-post-nav__line-bg"></div>
            <div class="blog-post-nav__line-active"></div>
        </div>
    </div>

    <div class="container blog-post-layout">
        <div class="blog-post__main">

            <?php if ($hero_image) : ?>
            <div class="blog-post__hero">
                <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr($hero_title); ?>" class="blog-post__hero-img" />
                <h1 class="blog-post__hero-title"><?php echo nl2br(esc_html($hero_title)); ?></h1>
            </div>
            <?php else : ?>
            <div class="blog-post__hero blog-post__hero--no-image">
                <h1 class="blog-post__hero-title"><?php echo esc_html($hero_title); ?></h1>
            </div>
            <?php endif; ?>

            <?php if ($intro_sub || $intro_text) : ?>
            <div class="blog-post__intro">
                <?php if ($intro_sub) : ?>
                <h2 class="blog-post__intro-title"><?php echo esc_html($intro_sub); ?></h2>
                <?php endif; ?>
                <?php if ($intro_text) : ?>
                <p class="blog-post__intro-text"><?php echo nl2br(esc_html($intro_text)); ?></p>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="blog-post__body">
                <?php the_content(); ?>
            </div>

            <?php if (!empty($faqs)) : ?>
            <div class="blog-post__faq">
                <h2 class="blog-post__faq-title">자주 묻는 질문</h2>
                <?php foreach ($faqs as $faq) : ?>
                <div class="blog-post__faq-item">
                    <p class="blog-post__faq-q"><?php echo esc_html($faq['question']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <div class="blog-post__nav-links">
                <?php if ($prev_post) : ?>
                <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" class="blog-post__nav-prev">
                    &larr; <?php echo esc_html(get_the_title($prev_post)); ?>
                </a>
                <?php endif; ?>
                <?php if ($next_post) : ?>
                <a href="<?php echo esc_url(get_permalink($next_post)); ?>" class="blog-post__nav-next">
                    <?php echo esc_html(get_the_title($next_post)); ?> &rarr;
                </a>
                <?php endif; ?>
            </div>
        </div>

        <aside class="blog-post__sidebar">
            <?php if ($related_strategies) : ?>
            <div class="sidebar-card sidebar-card--blue">
                <div class="sidebar-card__header sidebar-card__header--blue">
                    <h3 class="sidebar-card__title">관련 대응전략</h3>
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right.svg'); ?>" alt="" class="sidebar-card__header-icon" />
                </div>
                <div class="sidebar-card__content">
                    <?php foreach ($related_strategies as $rp) : ?>
                    <a href="<?php echo esc_url(get_permalink($rp)); ?>" class="sidebar-card__item sidebar-card__item--white">
                        <span class="sidebar-card__item-text"><?php echo esc_html(get_the_title($rp)); ?></span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-small.svg'); ?>" alt="" />
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($related_cases) : ?>
            <div class="sidebar-card sidebar-card--dark">
                <div class="sidebar-card__header sidebar-card__header--dark">
                    <h3 class="sidebar-card__title">주요 업무 사례</h3>
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right.svg'); ?>" alt="" class="sidebar-card__header-icon" />
                </div>
                <div class="sidebar-card__content">
                    <?php foreach ($related_cases as $rp) : ?>
                    <a href="<?php echo esc_url(get_permalink($rp)); ?>" class="sidebar-card__item sidebar-card__item--white">
                        <span class="sidebar-card__item-text"><?php echo esc_html(get_the_title($rp)); ?></span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-small.svg'); ?>" alt="" />
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($related_articles) : ?>
            <div class="sidebar-card sidebar-card--light">
                <div class="sidebar-card__header">
                    <h3 class="sidebar-card__title">연관 글</h3>
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-dark.svg'); ?>" alt="" class="sidebar-card__header-icon" />
                </div>
                <div class="sidebar-card__content">
                    <?php foreach ($related_articles as $rp) : ?>
                    <a href="<?php echo esc_url(get_permalink($rp)); ?>" class="sidebar-card__item sidebar-card__item--dark">
                        <span class="sidebar-card__item-text"><?php echo esc_html(get_the_title($rp)); ?></span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-small-dark.svg'); ?>" alt="" />
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </aside>
    </div>

    <footer class="footer blog-footer" role="contentinfo" style="margin-top: 100px;">
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
