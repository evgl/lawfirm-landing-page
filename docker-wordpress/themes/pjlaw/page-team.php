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

$members = array(
    array(
        'name'     => '이시완',
        'role'     => '변호사',
        'photo'    => $theme_uri . '/assets/images/team/member-1.png',
        'specialties' => array('형사법 전문', '행정법 전문'),
        'tags'     => array('금융범죄', '기타형사', '교통사고'),
    ),
    array(
        'name'     => '공선영',
        'role'     => '변호사',
        'photo'    => $theme_uri . '/assets/images/team/member-2.png',
        'specialties' => array('형사법 전문', '행정법 전문'),
        'tags'     => array('금융범죄', '기타형사', '교통사고'),
    ),
    array(
        'name'     => '이시완',
        'role'     => '변호사',
        'photo'    => $theme_uri . '/assets/images/team/member-1.png',
        'specialties' => array('형사법 전문', '행정법 전문'),
        'tags'     => array('금융범죄', '기타형사', '교통사고'),
    ),
    array(
        'name'     => '공선영',
        'role'     => '변호사',
        'photo'    => $theme_uri . '/assets/images/team/member-2.png',
        'specialties' => array('형사법 전문', '행정법 전문'),
        'tags'     => array('금융범죄', '기타형사', '교통사고'),
    ),
    array(
        'name'     => '이시완',
        'role'     => '변호사',
        'photo'    => $theme_uri . '/assets/images/team/member-1.png',
        'specialties' => array('형사법 전문', '행정법 전문'),
        'tags'     => array('금융범죄', '기타형사', '교통사고'),
    ),
    array(
        'name'     => '공선영',
        'role'     => '변호사',
        'photo'    => $theme_uri . '/assets/images/team/member-2.png',
        'specialties' => array('형사법 전문', '행정법 전문'),
        'tags'     => array('금융범죄', '기타형사', '교통사고'),
    ),
);
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
                <div class="about-hero__pager" aria-label="About section navigation">
                    <a class="about-hero__pager-item" href="<?php echo esc_url(home_url('/about/')); ?>">
                        <span>평정소개</span>
                        <svg class="about-hero__pager-arrow" aria-hidden="true" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <a class="about-hero__pager-item" href="<?php echo esc_url(home_url('/team/')); ?>">
                        <span>구성원소개</span>
                        <svg class="about-hero__pager-arrow" aria-hidden="true" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="team-members" id="team-members">
        <div class="container">
            <div class="team-members__bg-text">
                PYEONG JEONG MEMBER &nbsp;&nbsp;&nbsp; PYEONG JEONG MEMBER
            </div>
            
            <div class="team-members__grid">
                <?php foreach ($members as $member) : ?>
                    <div class="team-member">
                        <a href="<?php echo esc_url(home_url('/team/member/')); ?>" class="team-member__link">
                            <div class="team-member__image-wrap">
                                <div class="team-member__mask" style="-webkit-mask-image: url('<?php echo esc_url($theme_uri . '/assets/images/team/member-mask.svg'); ?>'); mask-image: url('<?php echo esc_url($theme_uri . '/assets/images/team/member-mask.svg'); ?>');">
                                    <img src="<?php echo esc_url($theme_uri . '/assets/images/team/shape-outline.png'); ?>" alt="" class="team-member__shape" />
                                    <img src="<?php echo esc_url($member['photo']); ?>" alt="<?php echo esc_attr($member['name']); ?>" class="team-member__photo" />
                                    <div class="team-member__overlay">
                                        <h3 class="team-member__name">
                                            <span class="name"><?php echo esc_html($member['name']); ?></span>
                                            <span class="role"><?php echo esc_html($member['role']); ?></span>
                                        </h3>
                                        <div class="team-member__specialties">
                                            <?php foreach ($member['specialties'] as $index => $specialty) : ?>
                                                <span><?php echo esc_html($specialty); ?></span>
                                                <?php if ($index < count($member['specialties']) - 1) : ?>
                                                    <span class="dot"></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="team-member__tags">
                            <?php foreach ($member['tags'] as $tag) : ?>
                                <span class="team-member__tag"><?php echo esc_html($tag); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="team-pagination">
                <a href="#" class="team-pagination__nav prev">
                    <svg viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 1L2 7L8 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <div class="team-pagination__pages">
                    <a href="#" class="team-pagination__page active">1</a>
                    <a href="#" class="team-pagination__page">2</a>
                    <a href="#" class="team-pagination__page">3</a>
                    <a href="#" class="team-pagination__page">4</a>
                    <a href="#" class="team-pagination__page">5</a>
                </div>
                <a href="#" class="team-pagination__nav next">
                    <svg viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 1L13 7L7 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
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
