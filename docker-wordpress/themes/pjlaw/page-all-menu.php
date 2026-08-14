<?php
/**
 * All Menu (전체메뉴) Page Template
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();
$asset_uri = $theme_uri . '/assets/images/all-menu/';
?>

<main id="main" class="site-main all-menu-page" role="main">
    <div class="all-menu-container">
        <!-- Close Button -->
        <button type="button" class="all-menu__close-btn" aria-label="<?php esc_attr_e('닫기', 'pjlaw'); ?>" onclick="if(document.referrer && document.referrer.indexOf(window.location.host) !== -1){ history.back(); } else { window.location.href='<?php echo esc_url(home_url('/')); ?>'; }">
            <img src="<?php echo esc_url($asset_uri . 'close-x.svg'); ?>" alt="" aria-hidden="true" width="22" height="22" />
        </button>

        <div class="all-menu__content">
            <!-- Navigation Columns -->
            <div class="all-menu__columns">
                <!-- Column 1: 평정소개 -->
                <div class="all-menu__col">
                    <div class="all-menu__col-header">
                        <h2 class="all-menu__col-title">
                            <a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('평정소개', 'pjlaw'); ?></a>
                        </h2>
                        <div class="all-menu__col-divider"></div>
                    </div>
                    <ul class="all-menu__list">
                        <li><a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('가치관', 'pjlaw'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/why-pjlaw/')); ?>"><?php esc_html_e('왜 평정인가?', 'pjlaw'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/team/')); ?>"><?php esc_html_e('구성원 소개', 'pjlaw'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/directions/')); ?>"><?php esc_html_e('오시는길', 'pjlaw'); ?></a></li>
                    </ul>
                </div>

                <!-- Column 2: 업무분야 -->
                <div class="all-menu__col">
                    <div class="all-menu__col-header">
                        <h2 class="all-menu__col-title">
                            <a href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('업무분야', 'pjlaw'); ?></a>
                        </h2>
                        <div class="all-menu__col-divider"></div>
                    </div>
                    <ul class="all-menu__list">
                        <li><a href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('분야별', 'pjlaw'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('전체', 'pjlaw'); ?></a></li>
                    </ul>
                </div>

                <!-- Column 3: 블로그 -->
                <div class="all-menu__col">
                    <div class="all-menu__col-header">
                        <h2 class="all-menu__col-title">
                            <a href="<?php echo esc_url(home_url('/blog/')); ?>"><?php esc_html_e('블로그', 'pjlaw'); ?></a>
                        </h2>
                        <div class="all-menu__col-divider"></div>
                    </div>
                    <ul class="all-menu__list">
                        <li><a href="<?php echo esc_url(home_url('/blog/')); ?>"><?php esc_html_e('전체', 'pjlaw'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog/?category=info')); ?>"><?php esc_html_e('법률정보', 'pjlaw'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog/?category=strategy')); ?>"><?php esc_html_e('대응전략', 'pjlaw'); ?></a></li>
                    </ul>
                </div>

                <!-- Column 4: 업무사례 -->
                <div class="all-menu__col">
                    <div class="all-menu__col-header">
                        <h2 class="all-menu__col-title">
                            <a href="<?php echo esc_url(home_url('/cases/')); ?>"><?php esc_html_e('업무사례', 'pjlaw'); ?></a>
                        </h2>
                        <div class="all-menu__col-divider"></div>
                    </div>
                </div>

                <!-- Column 5: 인재채용 -->
                <div class="all-menu__col">
                    <div class="all-menu__col-header">
                        <h2 class="all-menu__col-title">
                            <a href="<?php echo esc_url(home_url('/careers/')); ?>"><?php esc_html_e('인재채용', 'pjlaw'); ?></a>
                        </h2>
                        <div class="all-menu__col-divider"></div>
                    </div>
                    <ul class="all-menu__list">
                        <li><a href="<?php echo esc_url(home_url('/careers/')); ?>"><?php esc_html_e('전체', 'pjlaw'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/careers/')); ?>"><?php esc_html_e('채용공고', 'pjlaw'); ?></a></li>
                    </ul>
                </div>
            </div>

            <!-- Quick Action Cards Bar -->
            <div class="all-menu__actions">
                <div class="all-menu__cards-group">
                    <a href="<?php echo esc_url(home_url('/consultation-step/?category=civil')); ?>" class="all-menu__card all-menu__card--outline">
                        <div class="all-menu__card-inner">
                            <div class="all-menu__card-icon">
                                <img src="<?php echo esc_url($asset_uri . 'icon-civil.svg'); ?>" alt="" aria-hidden="true" width="29" height="25" />
                            </div>
                            <span class="all-menu__card-label"><?php esc_html_e('민사상담', 'pjlaw'); ?></span>
                        </div>
                    </a>

                    <a href="<?php echo esc_url(home_url('/consultation-step/?category=criminal')); ?>" class="all-menu__card all-menu__card--outline">
                        <div class="all-menu__card-inner">
                            <div class="all-menu__card-icon">
                                <img src="<?php echo esc_url($asset_uri . 'icon-criminal.svg'); ?>" alt="" aria-hidden="true" width="31" height="26" />
                            </div>
                            <span class="all-menu__card-label"><?php esc_html_e('형사상담', 'pjlaw'); ?></span>
                        </div>
                    </a>

                    <a href="<?php echo esc_url(home_url('/consultation-step/?category=family')); ?>" class="all-menu__card all-menu__card--outline">
                        <div class="all-menu__card-inner">
                            <div class="all-menu__card-icon">
                                <img src="<?php echo esc_url($asset_uri . 'icon-family.svg'); ?>" alt="" aria-hidden="true" width="29" height="28" />
                            </div>
                            <span class="all-menu__card-label"><?php esc_html_e('가사상담', 'pjlaw'); ?></span>
                        </div>
                    </a>

                    <a href="<?php echo esc_url(home_url('/consultation-step/?category=administrative')); ?>" class="all-menu__card all-menu__card--outline">
                        <div class="all-menu__card-inner">
                            <div class="all-menu__card-icon">
                                <img src="<?php echo esc_url($asset_uri . 'icon-admin.svg'); ?>" alt="" aria-hidden="true" width="27" height="27" />
                            </div>
                            <span class="all-menu__card-label"><?php esc_html_e('행정상담', 'pjlaw'); ?></span>
                        </div>
                    </a>

                    <a href="<?php echo esc_url(home_url('/consultation-step/?category=other')); ?>" class="all-menu__card all-menu__card--outline">
                        <div class="all-menu__card-inner">
                            <div class="all-menu__card-icon">
                                <img src="<?php echo esc_url($asset_uri . 'icon-other.svg'); ?>" alt="" aria-hidden="true" width="29" height="26" />
                            </div>
                            <span class="all-menu__card-label"><?php esc_html_e('기타상담', 'pjlaw'); ?></span>
                        </div>
                    </a>
                </div>

                <a href="http://pf.kakao.com/" target="_blank" rel="noopener noreferrer" class="all-menu__card all-menu__card--kakao">
                    <div class="all-menu__card-inner">
                        <div class="all-menu__card-icon">
                            <img src="<?php echo esc_url($asset_uri . 'icon-kakao.svg'); ?>" alt="" aria-hidden="true" width="24" height="22" />
                        </div>
                        <span class="all-menu__card-label"><?php esc_html_e('카톡상담', 'pjlaw'); ?></span>
                    </div>
                </a>

                <a href="<?php echo esc_url(home_url('/directions/')); ?>" class="all-menu__card all-menu__card--location">
                    <div class="all-menu__card-inner">
                        <div class="all-menu__card-icon">
                            <img src="<?php echo esc_url($asset_uri . 'icon-location.svg'); ?>" alt="" aria-hidden="true" width="24" height="24" />
                        </div>
                        <span class="all-menu__card-label"><?php esc_html_e('오시는길', 'pjlaw'); ?></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
