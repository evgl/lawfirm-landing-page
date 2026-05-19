<?php
if (!defined('ABSPATH')) { exit; }
$theme_uri = get_template_directory_uri();

$post_title = '[강남구] 법률사무소 상담실장님 모십니다.';

$job_info = array(
    array('label' => '부문',     'value' => '사무원'),
    array('label' => '분야',     'value' => '상담실장'),
    array('label' => '직급',     'value' => '실장'),
    array('label' => '근무지역', 'value' => '서울특별시 강남구'),
);

$sections = array(
    array(
        'heading' => '주요업무',
        'items' => array(
            array('text' => '고객에 대한 대면 안내, 전화 응대'),
            array('text' => '고객 관련 일정 및 정보 관리'),
            array('text' => '소송문건 제출, 법원 출장 등 송무보조'),
            array('text' => '소송 관련 일정 관리, 사건 진행 내역 관리 등'),
            array('text' => '변호사 일정 수행, 관리 등 비서 업무'),
            array('text' => '기타 수명업무'),
            array('text' => '*사무장 업무 없음 <strong>(사무장 없는 로펌)</strong>', 'html' => true),
        ),
    ),
    array(
        'heading' => '자격요건',
        'items' => array(
            array('text' => '고등학교 졸업이상, 졸업 예정자 지원가능'),
            array('text' => '경력 : 법률사무소(법무법인) 경력 6개월 이상'),
        ),
    ),
    array(
        'heading' => '우대사항',
        'items' => array(
            array('text' => '빠르고 정확하고 꼼꼼하신 분'),
            array('text' => '친절한 고객응대가 가능하신 분'),
            array('text' => '법률사무원 교육을 이수한 분'),
            array('text' => '비서직 관련 전공자 또는 자격증 보유자'),
            array('text' => '서비스 마인드를 갖추신 분'),
            array('text' => '컴퓨터 활용 능력이 우수한 분'),
        ),
    ),
    array(
        'heading' => '슬로건',
        'items' => array(
            array('text' => '압도적인 실력과 독보적인 승소율을 바탕으로 법적분쟁을 평정합니다.'),
            array('text' => '최고의 전문성을 갖춘 인재를 영입하고 그에 걸맞는 대우를 합니다.'),
            array('text' => '법률사무원 교육을 이수한 분'),
            array('text' => '비서직 관련 전공자 또는 자격증 보유자'),
            array('text' => '서비스 마인드를 갖추신 분'),
            array('text' => '컴퓨터 활용 능력이 우수한 분'),
        ),
    ),
    array(
        'heading' => '근무조건',
        'items' => array(
            array('text' => '고용형태 : 정규직(수습3개월)'),
            array('text' => '급여 : 면접 후 결정'),
            array('text' => '근무지 : 서울시 강남구 논현로 63길 71'),
        ),
    ),
    array(
        'heading' => '복지 및 혜택',
        'items' => array(
            array('text' => '초봉 월 300만원(협의가능)'),
            array('text' => '실무능력 개발에 필요한 교육비, 도서지원'),
            array('text' => '수평적이고 자유로운 분위기, 효율적인 업무 프로세스'),
            array('text' => '빠르게 성장하는 회사로 연봉 및 직책 상승 가능성이 높음'),
        ),
    ),
    array(
        'heading' => '변호사 책임주의',
        'items' => array(
            array('text' => '초봉 월 300만원(협의가능)'),
            array('text' => '실무능력 개발에 필요한 교육비, 도서지원'),
            array('text' => '수평적이고 자유로운 분위기, 효율적인 업무 프로세스'),
            array('text' => '빠르게 성장하는 회사로 연봉 및 직책 상승 가능성이 높음'),
        ),
    ),
    array(
        'heading' => '채용절차',
        'items' => array(
            array('text' => '초봉 월 300만원(협의가능)'),
            array('text' => '실무능력 개발에 필요한 교육비, 도서지원'),
            array('text' => '수평적이고 자유로운 분위기, 효율적인 업무 프로세스'),
            array('text' => '빠르게 성장하는 회사로 연봉 및 직책 상승 가능성이 높음'),
        ),
    ),
);

$recommended_jobs = array(
    array(
        'badge'  => 'D-15',
        'type'   => '경력',
        'title'  => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'   => '2026. 03. 05 ~ 2026. 03. 05',
    ),
    array(
        'badge'  => 'D-15',
        'type'   => '경력',
        'title'  => '(주) 스카이즈코리아 사내변호사 채용공고',
        'date'   => '2026. 03. 05 ~ 2026. 03. 05',
    ),
);
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
                            <span class="careers-detail-badge">D-08</span>
                            <span class="careers-detail-date">2026-02-26 10:00 ~ 2026-03-13 17:00</span>
                        </div>
                        <hr class="careers-detail-divider">
                    </div>

                    <!-- Position Subtitle -->
                    <h2 class="careers-detail-subtitle">법률사무소 상담실장</h2>

                    <!-- Content Sections -->
                    <div class="careers-detail-sections">
                        <?php foreach ($sections as $section) : ?>
                        <div class="careers-detail-section">
                            <div class="careers-detail-section__heading">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/section-icon.svg'); ?>" alt="" width="20" height="24" aria-hidden="true">
                                <h3 class="careers-detail-section__title"><?php echo esc_html($section['heading']); ?></h3>
                            </div>
                            <div class="careers-detail-section__box">
                                <?php foreach ($section['items'] as $item) : ?>
                                <div class="careers-detail-bullet">
                                    <span class="careers-detail-bullet__dot" aria-hidden="true"></span>
                                    <p class="careers-detail-bullet__text">
                                        <?php if (!empty($item['html'])) : ?>
                                            <?php echo wp_kses($item['text'], array('strong' => array())); ?>
                                        <?php else : ?>
                                            <?php echo esc_html($item['text']); ?>
                                        <?php endif; ?>
                                    </p>
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
                            <p class="careers-detail-nav-subtitle">이전 게시물이 없습니다.</p>
                        </div>
                        <div class="careers-detail-next">
                            <div class="careers-detail-nav-label careers-detail-nav-label--right">
                                <span>Next</span>
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/arrow-next.svg'); ?>" alt="" width="50" height="50">
                            </div>
                            <p class="careers-detail-nav-subtitle careers-detail-nav-subtitle--active">시스템 점검으로 인한 일부 시스템 이용 불가</p>
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
                    <div class="careers-detail-recommended">
                        <p class="careers-detail-recommended__title">추천공고</p>
                        <div class="careers-detail-rec-list">
                            <?php foreach ($recommended_jobs as $rec) : ?>
                            <a href="<?php echo esc_url(home_url('/careers-detail/')); ?>" class="careers-detail-rec-card">
                                <div class="careers-detail-rec-header">
                                    <span class="careers-detail-rec-badge"><?php echo esc_html($rec['badge']); ?></span>
                                    <span class="careers-detail-rec-type"><?php echo esc_html($rec['type']); ?></span>
                                </div>
                                <p class="careers-detail-rec-title"><?php echo esc_html($rec['title']); ?></p>
                                <div class="careers-detail-rec-date-row">
                                    <img src="<?php echo esc_url($theme_uri . '/assets/images/careers/calendar-icon.svg'); ?>" alt="" width="15" height="16" aria-hidden="true">
                                    <span class="careers-detail-rec-date"><?php echo esc_html($rec['date']); ?></span>
                                </div>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

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
