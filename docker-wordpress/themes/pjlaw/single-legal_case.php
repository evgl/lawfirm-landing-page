<?php
/**
 * Single Case Template (legal_case / 업무사례)
 *
 * Mirrors single-pj_blog_post.php so it inherits the blog detail styling.
 * Body content comes from the WP editor (the_content()).
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

$theme_uri = get_template_directory_uri();

if (have_posts()) {
    the_post();
}
$post_id = get_the_ID();

$badge = get_post_meta($post_id, '_pj_case_badge', true);

$terms    = get_the_terms($post_id, 'pj_case_category');
$term     = (!is_wp_error($terms) && !empty($terms)) ? $terms[0] : null;
$category = $term ? $term->name : '';

$hero_image = has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'large') : ($theme_uri . '/assets/images/cases/case-base.jpg');
$hero_title = get_the_title();

// Related cases: same category, else latest others.
$related_cases = array();
if ($term) {
    $related_cases = get_posts(array(
        'post_type'    => 'legal_case',
        'numberposts'  => 3,
        'post__not_in' => array($post_id),
        'tax_query'    => array(array('taxonomy' => 'pj_case_category', 'field' => 'term_id', 'terms' => array($term->term_id))),
    ));
}
if (empty($related_cases)) {
    $related_cases = get_posts(array(
        'post_type'    => 'legal_case',
        'numberposts'  => 3,
        'post__not_in' => array($post_id),
        'orderby'      => array('menu_order' => 'ASC', 'date' => 'DESC'),
    ));
}

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
            <a href="<?php echo esc_url(home_url('/cases/')); ?>" class="blog-post-nav__close-link" aria-label="<?php esc_attr_e('목록으로 돌아가기', 'pjlaw'); ?>">
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

            <div class="blog-post__hero">
                <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr($hero_title); ?>" class="blog-post__hero-img" />
                <h1 class="blog-post__hero-title"><?php echo esc_html($hero_title); ?></h1>
            </div>

            <?php if ($badge || $category) : ?>
            <div class="blog-post__intro">
                <div class="case-card__meta">
                    <?php if ($badge) : ?><span class="case-card__badge"><?php echo esc_html($badge); ?></span><?php endif; ?>
                    <?php if ($category) : ?><span class="case-card__category"><?php echo esc_html($category); ?></span><?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="blog-post__body">
                <?php
                if (trim(get_the_content()) !== '') {
                    the_content();
                } else {
                    echo '<p>' . esc_html(get_the_excerpt()) . '</p>';
                }
                ?>
            </div>

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
            <?php if ($related_cases) : ?>
            <div class="sidebar-card sidebar-card--dark">
                <div class="sidebar-card__header sidebar-card__header--dark">
                    <h3 class="sidebar-card__title">주요 업무 사례</h3>
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right.svg'); ?>" alt="" class="sidebar-card__header-icon" />
                </div>
                <div class="sidebar-card__content">
                    <?php foreach ($related_cases as $rc) : ?>
                    <a href="<?php echo esc_url(get_permalink($rc)); ?>" class="sidebar-card__item sidebar-card__item--white">
                        <span class="sidebar-card__item-text"><?php echo esc_html(get_the_title($rc)); ?></span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-small.svg'); ?>" alt="" />
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
                            <p>서울특별시 강남구 테헤란로 238, 마크로젠빌딩 12층       Tel : 02-554-5674</p>
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
