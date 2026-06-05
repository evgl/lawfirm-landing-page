<?php
/**
 * Single Team Member Template (pj_team)
 *
 * Renders a member detail page entirely from post meta. Markup mirrors the
 * former static page-team-member.php so the UI is unchanged.
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();

if (have_posts()) {
    the_post();
}
$post_id = get_the_ID();

$name      = get_the_title();
$role      = get_post_meta($post_id, '_pj_team_role', true);
$tagline   = get_post_meta($post_id, '_pj_team_tagline', true);
$full_name = trim($name . ' ' . $role);

$photo = get_the_post_thumbnail_url($post_id, 'large');
if (!$photo) {
    $photo = $theme_uri . '/assets/images/team/member-1.png';
}

$fields         = get_post_meta($post_id, '_pj_team_fields', true);
$career_summary = get_post_meta($post_id, '_pj_team_career_summary', true);
$edu            = get_post_meta($post_id, '_pj_team_edu', true);
$experience     = get_post_meta($post_id, '_pj_team_experience', true);
$achievements   = get_post_meta($post_id, '_pj_team_achievements', true);
$case_ids       = get_post_meta($post_id, '_pj_team_case_ids', true);

if (!is_array($fields)) $fields = array();
if (!is_array($career_summary)) $career_summary = array();
if (!is_array($edu)) $edu = array();
if (!is_array($experience)) $experience = array();
if (!is_array($achievements)) $achievements = array();
if (!is_array($case_ids)) $case_ids = array();

// Selected 업무사례 posts (preserve the admin-chosen order).
$cases_query = !empty($case_ids) ? new WP_Query(array(
    'post_type'      => 'legal_case',
    'post_status'    => 'publish',
    'post__in'       => $case_ids,
    'orderby'        => 'post__in',
    'posts_per_page' => -1,
)) : null;
?>

<main id="main" class="site-main team-member-page" role="main">
    <div class="member-detail-container">

        <div class="member-detail-header">
            <div class="member-detail-nav">
                <div class="member-detail-nav__links">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="member-detail-nav__home-link" aria-label="<?php esc_attr_e('홈으로 이동', 'pjlaw'); ?>">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/directions/icon-home-dark.svg'); ?>" alt="" aria-hidden="true" class="member-detail-nav__icon" width="19.527" height="17.851" />
                    </a>
                    <div class="member-detail-nav__separator"></div>
                    <div class="member-detail-nav__current">
                        <span><?php echo esc_html($full_name); ?></span>
                        <svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5.5 5L10 1" stroke="#181a1e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="member-detail-nav__separator"></div>
                </div>
                <a href="<?php echo esc_url(home_url('/team/')); ?>" class="member-detail-nav__close-link" aria-label="<?php esc_attr_e('구성원 목록으로 닫기', 'pjlaw'); ?>">
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-close.svg'); ?>" alt="" aria-hidden="true" class="member-detail-nav__icon-close" width="20" height="20" />
                </a>
            </div>
            <div class="member-detail-nav__line-wrap">
                <div class="member-detail-nav__line-bg"></div>
                <div class="member-detail-nav__line-active"></div>
            </div>
        </div>

        <div class="member-detail-content">

            <div class="member-detail-hero">
                <div class="member-detail-hero__mask" style="-webkit-mask-image: url('<?php echo esc_url($theme_uri . '/assets/images/team/member-mask.svg'); ?>'); mask-image: url('<?php echo esc_url($theme_uri . '/assets/images/team/member-mask.svg'); ?>');">
                    <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($full_name); ?>" class="member-detail-hero__photo" />
                </div>
            </div>

            <div class="member-detail-info">
                <?php if ($tagline) : ?>
                <h1 class="member-detail-info__title"><?php echo nl2br(esc_html($tagline)); ?></h1>
                <?php endif; ?>

                <div class="member-detail-info__name-wrap">
                    <h2 class="member-detail-info__name"><?php echo esc_html($full_name); ?></h2>
                    <div class="member-detail-info__divider"></div>
                </div>

                <?php if (!empty($career_summary)) : ?>
                <div class="member-detail-section">
                    <div class="member-detail-section__header">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-experience.svg'); ?>" alt="" class="member-detail-section__icon" />
                        <h3 class="member-detail-section__title">대표경력</h3>
                    </div>
                    <div class="member-detail-section__content">
                        <div class="member-experience-list">
                            <?php foreach ($career_summary as $item) : ?>
                            <div class="member-experience-item">
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-list.svg'); ?>" alt="" class="member-experience-icon" />
                                <p class="member-experience-text"><?php echo esc_html($item); ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (!empty($fields)) : ?>
                <div class="member-detail-section">
                    <div class="member-detail-section__header">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-fields.svg'); ?>" alt="" class="member-detail-section__icon" />
                        <h3 class="member-detail-section__title">업무분야</h3>
                    </div>
                    <div class="member-detail-section__content">
                        <div class="member-fields-list">
                            <?php foreach ($fields as $field) : ?>
                            <div class="member-field-row">
                                <h4 class="member-field-name"><?php echo esc_html($field['name'] ?? ''); ?></h4>
                                <div class="member-field-tags">
                                    <?php foreach (($field['tags'] ?? array()) as $tag) : ?>
                                    <span class="member-field-tag member-field-tag--small"><?php echo esc_html($tag); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

        </div>

        <div class="member-tabs">
            <div class="member-tabs__nav">
                <a href="#tab-edu" class="member-tabs__item active">학력</a>
                <a href="#tab-career" class="member-tabs__item">경력</a>
                <a href="#tab-achievements" class="member-tabs__item">주요실적</a>
                <a href="#tab-cases" class="member-tabs__item">업무사례</a>
            </div>

            <div class="member-tabs__content">

                <div class="member-tab-section" id="tab-edu">
                    <div class="member-tab-section__header">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-edu.svg'); ?>" alt="" class="member-tab-section__icon" />
                        <h3 class="member-tab-section__title">학력</h3>
                    </div>
                    <div class="member-tab-section__list">
                        <?php foreach ($edu as $item) : ?>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text"><?php echo esc_html($item); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="member-tab-section__divider"></div>
                </div>

                <div class="member-tab-section" id="tab-career">
                    <div class="member-tab-section__header">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-career.svg'); ?>" alt="" class="member-tab-section__icon" />
                        <h3 class="member-tab-section__title">경력</h3>
                    </div>
                    <div class="member-tab-section__list">
                        <?php foreach ($experience as $item) : ?>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text"><?php echo esc_html($item); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="member-tab-section__divider"></div>
                </div>

                <div class="member-tab-section" id="tab-achievements">
                    <div class="member-tab-section__header">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-achievements.svg'); ?>" alt="" class="member-tab-section__icon" />
                        <h3 class="member-tab-section__title">주요실적</h3>
                    </div>
                    <div class="member-tab-section__list">
                        <?php foreach ($achievements as $item) : ?>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text"><?php echo esc_html($item); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="member-tab-section__divider"></div>
                </div>

                <div class="member-tab-section" id="tab-cases">
                    <div class="member-tab-section__header">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-cases.svg'); ?>" alt="" class="member-tab-section__icon" />
                        <h3 class="member-tab-section__title">업무사례</h3>
                    </div>

                    <?php if ($cases_query && $cases_query->have_posts()) : ?>
                    <div class="member-cases-grid">
                        <?php while ($cases_query->have_posts()) : $cases_query->the_post();
                            $case_id    = get_the_ID();
                            $case_badge = get_post_meta($case_id, '_pj_case_badge', true);
                            $case_terms = get_the_terms($case_id, 'pj_case_category');
                            $case_cat   = (!is_wp_error($case_terms) && !empty($case_terms)) ? $case_terms[0]->name : '';
                            $case_img   = get_the_post_thumbnail_url($case_id, 'medium');
                            if (!$case_img) {
                                $case_img = $theme_uri . '/assets/images/team/case-1.png';
                            }
                        ?>
                        <div class="member-case-card">
                            <div class="member-case-card__content">
                                <div class="member-case-card__header">
                                    <?php if ($case_badge) : ?><span class="member-case-card__badge"><?php echo esc_html($case_badge); ?></span><?php endif; ?>
                                    <?php if ($case_cat) : ?><span class="member-case-card__category"><?php echo esc_html($case_cat); ?></span><?php endif; ?>
                                </div>
                                <h4 class="member-case-card__title"><?php echo esc_html(get_the_title()); ?></h4>
                                <p class="member-case-card__desc"><?php echo esc_html(get_the_excerpt()); ?></p>
                            </div>
                            <div class="member-case-card__visuals">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/team/shape-outline.png'); ?>" alt="" class="member-case-card__bg" />
                                <img src="<?php echo esc_url($case_img); ?>" alt="" class="member-case-card__image" />
                            </div>
                        </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                    <?php else : ?>
                    <p class="member-cases-empty">등록된 업무사례가 없습니다.</p>
                    <?php endif; ?>

                    <div class="member-cases-more">
                        <a href="<?php echo esc_url(home_url('/cases/')); ?>" class="member-cases-more__btn">전체보기</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="footer about-footer" role="contentinfo" style="margin-top: 100px;">
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
                            <p>경기도 수원시 장안구 경수대로 976번길 19(송죽동)       Tel : 070-7800-2114</p>
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
