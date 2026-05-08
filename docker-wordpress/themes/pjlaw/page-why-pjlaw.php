<?php
/**
 * Template Name: Why PJLAW Page
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();
?>

<main id="main" class="site-main why-pjlaw-page" role="main">
    <section class="why-hero">
        <div class="why-hero__bg">
            <div class="why-hero__bg-mask" style="mask-image: url('<?php echo esc_url($theme_uri . '/assets/images/why-pjlaw/hero-mask.svg'); ?>'); -webkit-mask-image: url('<?php echo esc_url($theme_uri . '/assets/images/why-pjlaw/hero-mask.svg'); ?>');">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/why-pjlaw/hero-bg.png'); ?>" alt="" class="why-hero__bg-img why-hero__bg-img--1">
                <div class="why-hero__bg-img-wrap why-hero__bg-img-wrap--2">
                    <img src="<?php echo esc_url($theme_uri . '/assets/images/why-pjlaw/hero-img-07.png'); ?>" alt="" class="why-hero__bg-img why-hero__bg-img--2">
                </div>
                <div class="why-hero__bg-img-wrap why-hero__bg-img-wrap--3">
                    <img src="<?php echo esc_url($theme_uri . '/assets/images/why-pjlaw/hero-img-0024.png'); ?>" alt="" class="why-hero__bg-img why-hero__bg-img--3">
                </div>
                <div class="why-hero__shade"></div>
            </div>
        </div>
        
        <div class="container why-hero__inner">
            <div class="why-hero__header">
                <div class="why-hero__eyebrow-wrap">
                    <span class="why-hero__eyebrow">왜 평정인가?</span>
                    <span class="why-hero__eyebrow-line"></span>
                </div>
                <h1 class="why-hero__title">
                    평정은 의뢰인과<br />
                    처음부터 끝까지 함께합니다
                </h1>
            </div>

            <div class="why-hero__footer">
                <div class="about-hero__pager" aria-label="About section navigation">
                    <a class="about-hero__pager-item" href="<?php echo esc_url(home_url('/about/')); ?>">
                        <span>평정소개</span>
                        <svg class="about-hero__pager-arrow" aria-hidden="true" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <a class="about-hero__pager-item" href="<?php echo esc_url(home_url('/why-pjlaw/')); ?>">
                        <span>왜 평정인가?</span>
                        <svg class="about-hero__pager-arrow" aria-hidden="true" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="why-features">
        <div class="why-features__inner container">
            <!-- Feature 1 -->
            <div class="why-feature why-feature--left">
                <div class="why-feature__content">
                    <h2 class="why-feature__title">
                        변호사 직접<br />
                        수행 원칙
                    </h2>
                    <div class="why-feature__line"></div>
                    <p class="why-feature__desc">
                        평정은 상담부터 사건의 종결까지 변호사가<br />
                        직접 담당하며, 사무장이나 사무 직원을 통해<br />
                        법률 업무를 처리하지 않습니다.
                    </p>
                </div>
                <div class="why-feature__image">
                    <img src="<?php echo esc_url($theme_uri . '/assets/images/why-pjlaw/feature-1.png'); ?>" alt="변호사 직접 수행 원칙" />
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="why-feature why-feature--right">
                <div class="why-feature__content">
                    <h2 class="why-feature__title">
                        집중・전담<br />
                        법률 서비스 제공
                    </h2>
                    <div class="why-feature__line"></div>
                    <p class="why-feature__desc">
                        모든 사건은 의뢰인님의 인생과 맞닿아 있습니다. 평정은 과다한 사건의 수임을 지양하고 의뢰인님 한 사람, 한 사람의 사건을 끝까지 책임지는 길을 고수합니다.
                    </p>
                </div>
                <div class="why-feature__image">
                    <img src="<?php echo esc_url($theme_uri . '/assets/images/why-pjlaw/feature-2.png'); ?>" alt="집중・전담 법률 서비스 제공" />
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="why-feature why-feature--left">
                <div class="why-feature__content">
                    <h2 class="why-feature__title">
                        신속·정확한<br />
                        사건 해결
                    </h2>
                    <div class="why-feature__line"></div>
                    <p class="why-feature__desc">
                        평정은 소송에 착수한 이후 집중적으로 사건<br />
                        해결에 매진하여 모든 사건을 신속하고<br />
                        정확하게 마무리합니다.
                    </p>
                </div>
                <div class="why-feature__image">
                    <img src="<?php echo esc_url($theme_uri . '/assets/images/why-pjlaw/feature-3.png'); ?>" alt="신속·정확한 사건 해결" />
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="why-feature why-feature--right">
                <div class="why-feature__content">
                    <h2 class="why-feature__title">
                        의뢰인 맞춤형<br />
                        소통 서비스
                    </h2>
                    <div class="why-feature__line"></div>
                    <p class="why-feature__desc">
                        의뢰인님과 원활한 의사소통은 변호사의 기본<br />
                        소임입니다. 평정은 의뢰인님의 불안함을 해소하기<br />
                        위해 변호사가 포함된 개별 카카오톡 채팅방을<br />
                        마련하여 소송 진행에 대한 정보를 전달하고,<br />
                        질문에 답해드리고 있습니다.
                    </p>
                </div>
                <div class="why-feature__image">
                    <img src="<?php echo esc_url($theme_uri . '/assets/images/why-pjlaw/feature-4.png'); ?>" alt="의뢰인 맞춤형 소통 서비스" />
                </div>
            </div>
        </div>
    </section>

    <?php pjlaw_render_quick_actions_menu(); ?>
</main>

<?php get_footer(); ?>
