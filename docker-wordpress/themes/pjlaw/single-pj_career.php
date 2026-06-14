<?php
if (!defined('ABSPATH')) { exit; }
$theme_uri = get_template_directory_uri();

if (have_posts()) { the_post(); }
$post_id = get_the_ID();

$post_title = get_the_title();
$subtitle   = get_post_meta($post_id, '_pj_career_subtitle', true);
$start_date = get_post_meta($post_id, '_pj_career_start_date', true);
$end_date   = get_post_meta($post_id, '_pj_career_end_date', true);
$emp_type   = get_post_meta($post_id, '_pj_career_employment_type', true);
$field      = get_post_meta($post_id, '_pj_career_field', true);
$position   = get_post_meta($post_id, '_pj_career_position', true);
$location   = get_post_meta($post_id, '_pj_career_location', true);
$sections   = get_post_meta($post_id, '_pj_career_sections', true);
if (!is_array($sections)) $sections = array();

$cat_terms = get_the_terms($post_id, 'pj_career_category');
$department = (!is_wp_error($cat_terms) && !empty($cat_terms)) ? $cat_terms[0]->name : '';

$badge = pjlaw_career_badge($end_date);

// Build the info card rows, skipping any empty values.
$job_info = array();
if ($department) $job_info[] = array('label' => '부문', 'value' => $department);
if ($field)      $job_info[] = array('label' => '분야', 'value' => $field);
if ($position)   $job_info[] = array('label' => '직급', 'value' => $position);
if ($location)   $job_info[] = array('label' => '근무지역', 'value' => $location);

// Recommended jobs: latest other postings.
$recommended_query = new WP_Query(array(
    'post_type'      => 'pj_career',
    'posts_per_page' => 2,
    'post_status'    => 'publish',
    'post__not_in'   => array($post_id),
    'orderby'        => array('menu_order' => 'ASC', 'date' => 'DESC'),
));

// Prev / next within the careers post type.
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
<body <?php body_class('careers-detail-page'); ?>>
<?php wp_body_open(); ?>

<main id="main" class="site-main careers-detail-page" role="main">

    <!-- Custom Nav Bar -->
    <div class="careers-detail-nav">
        <div class="careers-detail-nav__inner">
            <div class="careers-detail-nav__links">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="careers-detail-nav__home" aria-label="<?php esc_attr_e('홈으로 이동', 'pjlaw'); ?>">
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-home-nav.svg'); ?>" alt="" aria-hidden="true" width="19" height="18" />
                </a>
                <div class="careers-detail-nav__separator"></div>
                <div class="careers-detail-nav__breadcrumb">
                    <span class="careers-detail-nav__title"><?php echo esc_html($post_title); ?></span>
                    <svg width="11" height="6" viewBox="0 0 11 6" fill="none" aria-hidden="true" class="careers-detail-nav__chevron"><path d="M1 1L5.5 5L10 1" stroke="#181A1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
                <div class="careers-detail-nav__separator"></div>
            </div>
            <a href="<?php echo esc_url(home_url('/careers-all/')); ?>" class="careers-detail-nav__close" aria-label="<?php esc_attr_e('목록으로 돌아가기', 'pjlaw'); ?>">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-close-nav.svg'); ?>" alt="" aria-hidden="true" width="20" height="20" />
            </a>
        </div>
        <div class="careers-detail-nav__line-wrap">
            <div class="careers-detail-nav__line-bg"></div>
            <div class="careers-detail-nav__line-active"></div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="careers-detail-content">
        <div class="container">
            <div class="careers-detail-layout">

                <!-- Left: Main Column -->
                <div class="careers-detail-main">

                    <!-- Title Block -->
                    <div class="careers-detail-title-block">
                        <h1 class="careers-detail-title"><?php echo esc_html($post_title); ?></h1>
                        <div class="careers-detail-meta">
                            <span class="careers-detail-badge"><?php echo esc_html($badge['badge']); ?></span>
                            <span class="careers-detail-date"><?php echo esc_html(pjlaw_career_date_range($start_date, $end_date)); ?></span>
                        </div>
                        <hr class="careers-detail-divider">
                    </div>

                    <!-- Position Subtitle -->
                    <?php if ($subtitle) : ?>
                    <h2 class="careers-detail-subtitle"><?php echo esc_html($subtitle); ?></h2>
                    <?php endif; ?>

                    <!-- Content Sections -->
                    <div class="careers-detail-sections">
                        <?php foreach ($sections as $section) : ?>
                        <div class="careers-detail-section">
                            <div class="careers-detail-section__heading">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/section-icon.svg'); ?>" alt="" width="20" height="24" aria-hidden="true">
                                <h3 class="careers-detail-section__title"><?php echo esc_html($section['heading']); ?></h3>
                            </div>
                            <div class="careers-detail-section__box">
                                <?php foreach (($section['items'] ?? array()) as $item) : ?>
                                <div class="careers-detail-bullet">
                                    <span class="careers-detail-bullet__dot" aria-hidden="true"></span>
                                    <p class="careers-detail-bullet__text"><?php echo wp_kses($item, array('strong' => array())); ?></p>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Apply Button -->
                    <div class="careers-detail-apply-wrap">
                        <button class="careers-detail-apply-btn">지원하기</button>
                    </div>

                    <!-- Prev / Next Navigation -->
                    <div class="careers-detail-prevnext">
                        <div class="careers-detail-prev">
                            <div class="careers-detail-nav-label">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/arrow-next.svg'); ?>" alt="" width="50" height="50" style="transform:rotate(180deg);">
                                <span>Prev</span>
                            </div>
                            <?php if ($prev_post) : ?>
                            <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" class="careers-detail-nav-subtitle careers-detail-nav-subtitle--active"><?php echo esc_html(get_the_title($prev_post)); ?></a>
                            <?php else : ?>
                            <p class="careers-detail-nav-subtitle">이전 게시물이 없습니다.</p>
                            <?php endif; ?>
                        </div>
                        <div class="careers-detail-next">
                            <div class="careers-detail-nav-label careers-detail-nav-label--right">
                                <span>Next</span>
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/arrow-next.svg'); ?>" alt="" width="50" height="50">
                            </div>
                            <?php if ($next_post) : ?>
                            <a href="<?php echo esc_url(get_permalink($next_post)); ?>" class="careers-detail-nav-subtitle careers-detail-nav-subtitle--active"><?php echo esc_html(get_the_title($next_post)); ?></a>
                            <?php else : ?>
                            <p class="careers-detail-nav-subtitle">다음 게시물이 없습니다.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

                <!-- Right: Sidebar -->
                <aside class="careers-detail-sidebar">

                    <!-- Job Info Card -->
                    <div class="careers-detail-sidebar__top">
                        <div class="careers-detail-info-card">
                            <?php foreach ($job_info as $i => $row) : ?>
                            <div class="careers-detail-info-row">
                                <span class="careers-detail-info-label"><?php echo esc_html($row['label']); ?></span>
                                <span class="careers-detail-info-value"><?php echo esc_html($row['value']); ?></span>
                            </div>
                            <?php if ($i < count($job_info) - 1) : ?>
                            <div class="careers-detail-info-divider"></div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <button class="careers-detail-sidebar-apply">지원하기</button>
                    </div>

                    <!-- Recommended Jobs -->
                    <?php if ($recommended_query->have_posts()) : ?>
                    <div class="careers-detail-recommended">
                        <p class="careers-detail-recommended__title">추천공고</p>
                        <div class="careers-detail-rec-list">
                            <?php while ($recommended_query->have_posts()) : $recommended_query->the_post();
                                $rec_end   = get_post_meta(get_the_ID(), '_pj_career_end_date', true);
                                $rec_start = get_post_meta(get_the_ID(), '_pj_career_start_date', true);
                                $rec_type  = get_post_meta(get_the_ID(), '_pj_career_employment_type', true);
                                $rec_badge = pjlaw_career_badge($rec_end);
                            ?>
                            <a href="<?php the_permalink(); ?>" class="careers-detail-rec-card">
                                <div class="careers-detail-rec-header">
                                    <span class="careers-detail-rec-badge"><?php echo esc_html($rec_badge['badge']); ?></span>
                                    <span class="careers-detail-rec-type"><?php echo esc_html($rec_type); ?></span>
                                </div>
                                <p class="careers-detail-rec-title"><?php the_title(); ?></p>
                                <div class="careers-detail-rec-date-row">
                                    <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/calendar-icon.svg'); ?>" alt="" width="15" height="16" aria-hidden="true">
                                    <span class="careers-detail-rec-date"><?php echo esc_html(pjlaw_career_date_range($rec_start, $rec_end)); ?></span>
                                </div>
                            </a>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <?php endif; ?>

                </aside>

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
