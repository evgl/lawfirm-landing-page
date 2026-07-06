<?php
/**
 * Team Page Template
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();

// Pagination: the /team route is forced via template_include, so read the page
// number from the query string (falling back to the main query var).
$paged = isset($_GET['paged']) ? absint($_GET['paged']) : (int) get_query_var('paged');
if ($paged < 1) $paged = 1;

$team_query = new WP_Query(array(
    'post_type'      => 'pj_team',
    'post_status'    => 'publish',
    'posts_per_page' => 8,
    'paged'          => $paged,
    'orderby'        => array('menu_order' => 'ASC', 'date' => 'DESC'),
));
?>

<main id="main" class="site-main team-page" role="main">
    <section class="team-hero" style="-webkit-mask-image: url('<?php echo esc_url($theme_uri . '/assets/images/team/hero-mask.svg'); ?>'); mask-image: url('<?php echo esc_url($theme_uri . '/assets/images/team/hero-mask.svg'); ?>');">
        <div class="team-hero__bg" style="background-image: url('<?php echo esc_url($theme_uri . '/assets/images/team/hero-bg.jpg'); ?>');"></div>
        <div class="team-hero__shade"></div>
        <div class="container team-hero__inner">
            <div class="team-hero__header">
                <div class="team-hero__breadcrumb">
                    <span class="team-hero__eyebrow">구성원소개</span>
                    <span class="team-hero__line"></span>
                </div>
                <h1 class="team-hero__title">
                    평정은 책임감을 바탕으로<br />
                    진심으로 소통합니다
                </h1>
            </div>

            <div class="team-hero__footer">
                <nav class="directions-hero__breadcrumb-nav" aria-label="<?php esc_attr_e('페이지 경로', 'pjlaw'); ?>">
                    <a class="directions-hero__breadcrumb-home" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('홈', 'pjlaw'); ?>">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/directions/icon-home.svg'); ?>" alt="" aria-hidden="true" width="20" height="18" />
                    </a>
                    <div class="directions-hero__breadcrumb-items">
                        <a class="directions-hero__breadcrumb-item" href="<?php echo esc_url(home_url('/about/')); ?>">
                            <span>평정소개</span>
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/directions/icon-arrow.svg'); ?>" alt="" aria-hidden="true" class="directions-hero__breadcrumb-arrow" />
                        </a>
                        <a class="directions-hero__breadcrumb-item directions-hero__breadcrumb-item--active" href="<?php echo esc_url(home_url('/team/')); ?>">
                            <span>구성원소개</span>
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/directions/icon-arrow.svg'); ?>" alt="" aria-hidden="true" class="directions-hero__breadcrumb-arrow" />
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </section>

    <section class="team-members" id="team-members">
        <div class="container">
            <div class="team-members__bg-text">
                PYEONG JEONG MEMBER &nbsp;&nbsp;&nbsp; PYEONG JEONG MEMBER
            </div>
            
            <div class="team-members__grid">
                <?php if ($team_query->have_posts()) : ?>
                <?php while ($team_query->have_posts()) : $team_query->the_post();
                    $member_id    = get_the_ID();
                    $member_name  = get_the_title();
                    $member_role  = get_post_meta($member_id, '_pj_team_role', true);
                    $member_specs = get_post_meta($member_id, '_pj_team_specialties', true);
                    $member_tags  = get_post_meta($member_id, '_pj_team_tags', true);
                    if (!is_array($member_specs)) $member_specs = array();
                    if (!is_array($member_tags)) $member_tags = array();
                    $member_photo = get_the_post_thumbnail_url($member_id, 'full');
                    if (!$member_photo) {
                        $member_photo = $theme_uri . '/assets/images/team/member-1.png';
                    }
                ?>
                    <div class="team-member">
                        <a href="<?php the_permalink(); ?>" class="team-member__link">
                            <div class="team-member__image-wrap">
                                <div class="team-member__mask" style="-webkit-mask-image: url('<?php echo esc_url($theme_uri . '/assets/images/team/member-mask.svg'); ?>'); mask-image: url('<?php echo esc_url($theme_uri . '/assets/images/team/member-mask.svg'); ?>');">
                                    <img src="<?php echo esc_url($theme_uri . '/assets/images/team/shape-outline.png'); ?>" alt="" class="team-member__shape" />
                                    <img src="<?php echo esc_url($member_photo); ?>" alt="<?php echo esc_attr($member_name); ?>" class="team-member__photo" />
                                    <div class="team-member__overlay">
                                        <h3 class="team-member__name">
                                            <span class="name"><?php echo esc_html($member_name); ?></span>
                                            <span class="role"><?php echo esc_html($member_role); ?></span>
                                        </h3>
                                        <div class="team-member__specialties">
                                            <?php foreach ($member_specs as $index => $specialty) : ?>
                                                <span><?php echo esc_html($specialty); ?></span>
                                                <?php if ($index < count($member_specs) - 1) : ?>
                                                    <span class="dot"></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="team-member__tags">
                            <?php foreach ($member_tags as $tag) : ?>
                                <span class="team-member__tag"><?php echo esc_html($tag); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                    <p class="team-members__empty">등록된 구성원이 없습니다.</p>
                <?php endif; ?>
            </div>
            
            <?php
            $total_pages = (int) $team_query->max_num_pages;
            if ($total_pages > 1) :
                $team_base = home_url('/team/');
                $prev_url  = $paged > 1 ? add_query_arg('paged', $paged - 1, $team_base) : '';
                $next_url  = $paged < $total_pages ? add_query_arg('paged', $paged + 1, $team_base) : '';
            ?>
            <div class="team-pagination">
                <a href="<?php echo esc_url($prev_url ?: '#'); ?>" class="team-pagination__nav prev<?php echo $prev_url ? '' : ' is-disabled'; ?>">
                    <svg viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 1L2 7L8 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <div class="team-pagination__pages">
                    <?php for ($p = 1; $p <= $total_pages; $p++) : ?>
                    <a href="<?php echo esc_url(add_query_arg('paged', $p, $team_base)); ?>" class="team-pagination__page<?php echo $p === $paged ? ' active' : ''; ?>"><?php echo esc_html($p); ?></a>
                    <?php endfor; ?>
                </div>
                <a href="<?php echo esc_url($next_url ?: '#'); ?>" class="team-pagination__nav next<?php echo $next_url ? '' : ' is-disabled'; ?>">
                    <svg viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 1L13 7L7 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <footer class="footer about-footer" role="contentinfo">
        <div class="footer-bottom about-footer__bottom">
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
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/about/footer-logo.png'); ?>" alt="<?php esc_attr_e('법률사무소 평정', 'pjlaw'); ?>" class="footer-logo" />
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="scroll-top">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/home/scroll-top.svg'); ?>" alt="<?php esc_attr_e('Top', 'pjlaw'); ?>" />
            </a>
        </div>
    </footer>

    <?php pjlaw_render_quick_actions_menu(); ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
