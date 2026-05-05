<?php
/**
 * About Page Template
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();

$about_sections = array(
    array(
        'modifier' => 'about-value--justice',
        'eyebrow'  => '권익과 가치의',
        'title'    => '평정(評定)',
        'description' => '사건의 본질을 정확히 꿰뚫어 보고 의뢰인님의 억울함이\n조금도 남지 않도록 끝까지 함께합니다.',
        'image'    => $theme_uri . '/assets/images/about/value-01-hands.png',
    ),
    array(
        'modifier' => 'about-value--dispute',
        'eyebrow'  => '혼란과 분쟁을',
        'title'    => '평정(平定)',
        'description' => '치밀한 논리와 뛰어난 실력으로 복잡한 사건의 실타래를\n끊어내고, 분쟁을 근본적으로 해소해드립니다.',
        'image'    => $theme_uri . '/assets/images/about/value-02-courtroom.jpg',
    ),
    array(
        'modifier' => 'about-value--peace',
        'eyebrow'  => '일상과 마음속',
        'title'    => '평정(平靜)',
        'description' => '법적 분쟁이라는 거친 폭풍 속에서 의뢰인님이 일상을 되찾으실 수 있도록\n든든한 방패가 되어드립니다.',
        'image'    => $theme_uri . '/assets/images/about/value-03-family.png',
    ),
);
?>

<main id="main" class="site-main about-page" role="main">
    <section class="about-hero" style="background-image: url('<?php echo esc_url($theme_uri . '/assets/images/about/hero.jpg'); ?>');">
        <div class="about-hero__shade"></div>
        <div class="container about-hero__inner">
            <div class="about-hero__header">
                <span class="about-hero__eyebrow">가치관</span>
                <h1 class="about-hero__title">
                    평정은 의뢰인과<br />
                    처음부터 끝까지 함께합니다
                </h1>
            </div>

            <div class="about-hero__footer">
                <div class="about-hero__pager" aria-label="About section navigation">
                    <a class="about-hero__pager-item" href="#about-intro">
                        <span>평정소개</span>
                        <svg class="about-hero__pager-arrow" aria-hidden="true" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <a class="about-hero__pager-item" href="#about-vision">
                        <span>가치관</span>
                        <svg class="about-hero__pager-arrow" aria-hidden="true" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="about-intro" id="about-intro">
        <div class="container about-intro__inner">
            <img class="about-intro__logo" src="<?php echo esc_url($theme_uri . '/assets/images/about/logo-emblem.png'); ?>" alt="<?php esc_attr_e('법률사무소 평정', 'pjlaw'); ?>" />
            <div class="about-intro__copy">
                <h2 class="about-intro__title">방패 같이 든든하게, 창과 같이 예리하게</h2>
                <p class="about-intro__description">
                    법률사무소 평정의 CI는 의뢰인님의 일상을 수호하는 동시에,<br />
                    승리를 향한 가장 예리한 무기가 되어 분쟁을 평정하고자 하는 뜻을 담고 있습니다.
                </p>
            </div>
        </div>
    </section>

    <?php foreach ($about_sections as $index => $section) : ?>
        <section
            class="about-value <?php echo esc_attr($section['modifier']); ?>"
            <?php echo 0 === $index ? 'id="about-vision"' : ''; ?>
            style="background-image: url('<?php echo esc_url($section['image']); ?>');"
        >
            <div class="about-value__shade"></div>
            <div class="container about-value__inner">
                <div class="about-value__copy">
                    <h2 class="about-value__title">
                        <?php echo esc_html($section['eyebrow']); ?><br />
                        <?php echo esc_html($section['title']); ?>
                    </h2>
                    <p class="about-value__description"><?php echo nl2br(esc_html($section['description'])); ?></p>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

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
