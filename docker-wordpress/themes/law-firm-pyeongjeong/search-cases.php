<?php
/**
 * Search Cases Template
 *
 * Template Name: Search Cases Template
 *
 * @package Law_Firm_Pyeongjeong
 */

if (!defined('ABSPATH')) {
    exit;
}

global $post;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">

    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php wp_head(); ?>

    <style>
        .search-section {
            width: 100%;
            padding: 50px 20px;
            margin-top: 40px;
            background: #ffffff;
        }

        .search-section-wrapper {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        /* Page Title */
        .search-title {
            text-align: center;
            margin-bottom: 10px;
        }

        .search-title h1 {
            font-size: 36px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0;
            padding: 0;
            font-family: 'Noto Sans KR', sans-serif;
        }

        .search-subtitle {
            font-size: 14px;
            color: #999999;
            font-weight: 400;
            margin: 5px 0 0 0;
            padding: 0;
            letter-spacing: 1px;
        }

        /* Search Container */
        .search-container {
            background: #f5f5f7;
            border-radius: 12px;
            padding: 20px 24px;
            width: 100%;
        }

        .search-bar-form {
            display: flex;
            gap: 12px;
            align-items: center;
            width: 100%;
        }

        .search-input {
            flex: 1;
            padding: 12px 16px;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            color: #333333;
            font-family: 'Noto Sans KR', sans-serif;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: #4A90E2;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        }

        .search-input::placeholder {
            color: #999999;
        }

        .search-button {
            padding: 12px 28px;
            background: #000000;
            border: none;
            border-radius: 25px;
            color: #ffffff;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            font-family: 'Noto Sans KR', sans-serif;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .search-button:hover {
            background: #333333;
            transform: translateY(-1px);
        }

        .search-button:active {
            transform: translateY(0);
        }

        /* Search Result Message */
        .search-result-message {
            text-align: center;
            color: #666666;
            font-size: 14px;
            font-family: 'Noto Sans KR', sans-serif;
        }

        /* Category Filter Buttons */
        .category-filter-wrapper {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            justify-content: center;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 0;
        }

        button.category-btn {
            padding: 12px 20px;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-bottom: none;
            border-radius: 0;
            color: #666666;
            font-family: 'Noto Sans KR', sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            position: relative;
            bottom: -1px;
        }

        button.category-btn:hover {
            color: #333333;
            background: #f9f9f9;
        }

        button.category-btn.active {
            background: #4A90E2;
            color: #ffffff;
            border-color: #4A90E2;
            border-bottom: 2px solid #4A90E2;
        }

        button.category-btn.active:hover {
            background: #3a82d8;
            border-color: #3a82d8;
        }

        @media (max-width: 768px) {
            .search-section {
                padding: 40px 16px;
            }

            .search-section-wrapper {
                gap: 24px;
            }

            .search-title h1 {
                font-size: 28px;
            }

            .search-container {
                padding: 16px 16px;
            }

            .search-bar-form {
                flex-direction: column;
            }

            .search-button {
                width: 100%;
            }

            .category-filter-wrapper {
                overflow-x: auto;
                justify-content: flex-start;
                gap: 0;
                -webkit-overflow-scrolling: touch;
                border-bottom: 1px solid #e0e0e0;
            }

            .category-btn {
                padding: 10px 16px;
                font-size: 13px;
                flex-shrink: 0;
            }
        }

        @media (max-width: 480px) {
            .search-section {
                padding: 30px 12px;
            }

            .search-section-wrapper {
                gap: 16px;
            }

            .search-title h1 {
                font-size: 24px;
            }

            .search-input {
                padding: 10px 14px;
                font-size: 14px;
            }

            .search-button {
                padding: 10px 24px;
                font-size: 13px;
            }

            .category-btn {
                padding: 9px 14px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body <?php body_class(); ?> style="background: #ffffff;">
<?php wp_body_open(); ?>

<!-- Skip to main content for accessibility -->
<a class="skip-link screen-reader-text" href="#main"><?php _e('Skip to main content', 'law-firm-pyeongjeong'); ?></a>

<!-- Site Header -->
<header class="site-header" role="banner">
    <div class="header-container">
            <!-- Site Logo/Branding -->
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-white.svg" alt="<?php echo esc_attr__('법률사무소 평정', 'law-firm-pyeongjeong'); ?>" class="logo-image">
                    </a>
                <?php endif; ?>

                <?php
                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()) : ?>
                    <div class="site-description"><?php echo $description; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?></div>
                <?php endif; ?>
            </div>

            <!-- Header Right Section -->
            <div class="header-right">
                <!-- Primary Navigation -->
                <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'law-firm-pyeongjeong'); ?>">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'primary-menu',
                        'container' => false,
                        'fallback_cb' => 'law_firm_fallback_menu',
                    ));
                    ?>
                </nav>

            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" aria-controls="primary-navigation" aria-expanded="false">
                <i class="fas fa-bars" aria-hidden="true"></i>
                <span class="screen-reader-text"><?php _e('Menu', 'law-firm-pyeongjeong'); ?></span>
            </button>
    </div>
</header>

<!-- Main Content Area -->
<main id="primary" class="site-main search-cases-template">

    <!-- Search Section -->
    <section class="search-section">
        <div class="search-section-wrapper">
            <!-- Page Title -->
            <div class="search-title">
                <h1><?php esc_html_e('통합검색', 'law-firm-pyeongjeong'); ?></h1>
                <p class="search-subtitle">SEARCH</p>
            </div>

            <!-- Search Container -->
            <div class="search-container">
                <form class="search-bar-form" role="search">
                    <input
                        type="text"
                        class="search-input"
                        placeholder="<?php esc_attr_e('Search cases...', 'law-firm-pyeongjeong'); ?>"
                        aria-label="<?php esc_attr_e('Search cases', 'law-firm-pyeongjeong'); ?>"
                    >
                    <button type="submit" class="search-button" aria-label="<?php esc_attr_e('Search', 'law-firm-pyeongjeong'); ?>">
                        <?php esc_html_e('검색', 'law-firm-pyeongjeong'); ?>
                    </button>
                </form>
            </div>

            <!-- Search Result Message -->
            <div class="search-result-message">
                <?php esc_html_e('검색어 "search term"에 대한 검색 결과입니다.', 'law-firm-pyeongjeong'); ?>
            </div>

            <!-- Category Filter Buttons -->
            <div class="category-filter-wrapper">
                <button class="category-btn active" data-category="all" aria-pressed="true">
                    <?php esc_html_e('전체', 'law-firm-pyeongjeong'); ?> (figure)
                </button>
                <button class="category-btn" data-category="success-cases" aria-pressed="false">
                    <?php esc_html_e('성공사례', 'law-firm-pyeongjeong'); ?> (figure)
                </button>
                <button class="category-btn" data-category="client-reviews" aria-pressed="false">
                    <?php esc_html_e('고객후기', 'law-firm-pyeongjeong'); ?> (figure)
                </button>
                <button class="category-btn" data-category="legal-info" aria-pressed="false">
                    <?php esc_html_e('법률정보', 'law-firm-pyeongjeong'); ?> (figure)
                </button>
                <button class="category-btn" data-category="press-coverage" aria-pressed="false">
                    <?php esc_html_e('언론보도', 'law-firm-pyeongjeong'); ?> (figure)
                </button>
                <button class="category-btn" data-category="practice-areas" aria-pressed="false">
                    <?php esc_html_e('업무분야', 'law-firm-pyeongjeong'); ?> (figure)
                </button>
            </div>
        </div>
    </section>

    <div class="template-placeholder" aria-live="polite">
        <?php
        if (is_user_logged_in() && current_user_can('edit_post', $post ? $post->ID : 0)) {
            echo '<p>' . esc_html__('This search cases template is ready for custom content.', 'law-firm-pyeongjeong') . '</p>';
        }
        ?>
    </div>

    <!-- Bottom Contact Bar (Same as Main Page) -->
    <div class="hero-bottom-contact">
        <div class="contact-info-wrapper">
            <div class="contact-phone">
                <i class="fas fa-phone" aria-hidden="true"></i>
                <div class="phone-info">
                    <span class="phone-label"><?php esc_html_e('24시간 미팅상담', 'law-firm-pyeongjeong'); ?></span>
                    <a href="tel:02-554-5674" class="phone-number">02-554-5674</a>
                </div>
            </div>
            <div class="contact-buttons">
                <a href="https://pf.kakao.com/_XzMxmn" class="contact-btn kakao-btn" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/kakao-icon.svg" alt="KakaoTalk" />
                    <?php esc_html_e('카톡상담', 'law-firm-pyeongjeong'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/contact/#contact')); ?>" class="contact-btn consultation-btn">
                    <i class="fas fa-calendar-check" aria-hidden="true"></i>
                    <?php esc_html_e('상담하기', 'law-firm-pyeongjeong'); ?>
                </a>
            </div>
        </div>
    </div>

</main>

<?php wp_footer(); ?>
</body>
</html>
