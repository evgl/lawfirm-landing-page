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

        /* Successful Cases Title */
        .cases-section-title {
            display: none;
            margin: 30px 0 20px 0;
            padding: 0;
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
            font-family: 'Noto Sans KR', sans-serif;
            border-bottom: 2px solid #1a1a1a;
            padding-bottom: 10px;
        }

        .cases-section-title.active {
            display: block;
        }

        /* Cases Grid Styles */
        .cases-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .case-card {
            background: #ffffff;
            border: 1px solid #d0d0d0;
            border-radius: 8px;
            padding: 0;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .case-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        /* Case Card Header */
        .case-card-header {
            padding: 16px 20px;
            background: #f9f9f9;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 50px;
        }

        .case-card-badge {
            background: #1e3a8a;
            color: #ffffff;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
            font-family: 'Noto Sans KR', sans-serif;
        }

        /* Case Card Content */
        .case-card-content {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .case-card-icon-section {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }

        .case-card-avatar {
            width: 60px;
            height: 60px;
            min-width: 60px;
            background: #e0e8f8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            color: #4A90E2;
            padding: 6px;
        }

        .decision-text {
            word-break: break-word;
            text-align: center;
            line-height: 1.2;
            font-weight: 500;
        }

        .case-card-info {
            flex: 1;
            text-align: left;
        }

        .case-card-label {
            font-size: 12px;
            color: #4A90E2;
            font-weight: 600;
            margin-bottom: 4px;
            font-family: 'Noto Sans KR', sans-serif;
        }

        .case-card-description {
            font-size: 14px;
            color: #333333;
            line-height: 1.5;
            margin-bottom: 12px;
            font-family: 'Noto Sans KR', sans-serif;
        }

        .news-board-newspaper-name {
            font-size: 14px;
            color: #4a90e2;
            line-height: 1.5;
            margin-bottom: 12px;
            font-family: 'Noto Sans KR', sans-serif;
        }

        .case-card-date {
            font-size: 13px;
            color: #999999;
            font-family: 'Noto Sans KR', sans-serif;
        }

        .case-card.hidden {
            display: none;
        }

        /* Legal Information Card Styles */
        .legal-info-card {
            background: #ffffff;
            border: 1px solid #d0d0d0;
            border-radius: 8px;
            padding: 0;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
        }

        .legal-info-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }

        .legal-info-card-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            background: #f0f0f0;
        }

        .legal-info-card-content {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .legal-info-card-title {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0 0 10px;
            line-height: 1.4;
            font-family: 'Noto Sans KR', sans-serif;
        }

        .legal-info-card-subtitle {
            font-size: 13px;
            color: #666666;
            margin: 0;
            line-height: 1.4;
            font-family: 'Noto Sans KR', sans-serif;
        }

        .legal-info-card.hidden {
            display: none;
        }

        /* Grid layout adjustments based on active filter */
        .cases-list.legal-info-active {
            grid-template-columns: repeat(3, 1fr);
        }

        .cases-list.success-cases-active,
        .cases-list.press-coverage-active,
        .cases-list.all-active {
            grid-template-columns: repeat(2, 1fr);
        }

        /* Show More Button */
        .load-more-wrapper {
            display: flex;
            justify-content: center;
            margin: 30px 0;
        }

        .load-more-btn {
            padding: 12px 32px;
            background: #ffffff;
            border: 1px solid #d0d0d0;
            border-radius: 4px;
            color: #666666;
            font-family: 'Noto Sans KR', sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .load-more-btn:hover {
            border-color: #4A90E2;
            color: #4A90E2;
            background: #f9f9f9;
        }

        .load-more-btn.hidden {
            display: none;
        }

        .no-cases {
            text-align: center;
            color: #999999;
            padding: 40px 20px;
            font-size: 16px;
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

            .cases-list {
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
            }

            .cases-list.legal-info-active {
                grid-template-columns: repeat(2, 1fr);
            }

            .case-card-header {
                padding: 14px 16px;
                min-height: 45px;
            }

            .case-card-content {
                padding: 16px;
            }

            .case-card-avatar {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }

            .legal-info-card-image {
                height: 150px;
            }

            .legal-info-card-content {
                padding: 16px;
            }

            .legal-info-card-title {
                font-size: 15px;
            }

            .legal-info-card-subtitle {
                font-size: 12px;
            }

            .cases-section-title {
                font-size: 20px;
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

            .cases-list {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .cases-list.legal-info-active {
                grid-template-columns: 1fr;
            }

            .case-card-content {
                padding: 12px 14px;
            }

            .case-card-label {
                font-size: 11px;
            }

            .case-card-description {
                font-size: 13px;
            }

            .legal-info-card-image {
                height: 120px;
            }

            .legal-info-card-content {
                padding: 12px 14px;
            }

            .legal-info-card-title {
                font-size: 14px;
            }

            .cases-section-title {
                font-size: 18px;
                margin: 20px 0 16px 0;
            }

            .load-more-btn {
                padding: 10px 24px;
                font-size: 13px;
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

            <!-- Category Filter Buttons -->
            <div class="category-filter-wrapper">
                <button class="category-btn active" data-category="all" aria-pressed="true">
                    <?php esc_html_e('전체', 'law-firm-pyeongjeong'); ?>
                </button>
                <button class="category-btn" data-category="success-cases" aria-pressed="false">
                    <?php esc_html_e('성공사례', 'law-firm-pyeongjeong'); ?>
                </button>
                <button class="category-btn" data-category="client-reviews" aria-pressed="false">
                    <?php esc_html_e('고객후기', 'law-firm-pyeongjeong'); ?>
                </button>
                <button class="category-btn" data-category="legal-info" aria-pressed="false">
                    <?php esc_html_e('법률정보', 'law-firm-pyeongjeong'); ?>
                </button>
                <button class="category-btn" data-category="press-coverage" aria-pressed="false">
                    <?php esc_html_e('언론보도', 'law-firm-pyeongjeong'); ?>
                </button>
                <button class="category-btn" data-category="practice-areas" aria-pressed="false">
                    <?php esc_html_e('업무분야', 'law-firm-pyeongjeong'); ?>
                </button>
            </div>

            <!-- Successful Cases Display -->
            <div class="successful-cases-container">
                <h2 class="cases-section-title active" id="cases-section-title">성공사례</h2>

                <?php
                // Query multiple post types
                $args = array(
                    'post_type' => array('successful_case', 'legal_information', 'news_board'),
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $cases = new WP_Query($args);

                if ($cases->have_posts()) :
                    $success_count = 0;
                    $legal_info_count = 0;
                    $news_count = 0;
                    ?>
                    <div class="cases-list" id="cases-list">
                        <?php
                        while ($cases->have_posts()) : $cases->the_post();
                            $post_type = get_post_type();

                            if ($post_type === 'successful_case') {
                                $success_count++;
                                $hidden_class = ($success_count > 4) ? 'hidden' : '';
                                $legal_case = get_post_meta(get_the_ID(), '_successful_case_legal_case', true);
                                $decision = get_post_meta(get_the_ID(), '_successful_case_decision', true);
                                $subtitle = get_post_meta(get_the_ID(), '_successful_case_subtitle', true);
                                $date = get_post_meta(get_the_ID(), '_successful_case_date', true);
                                ?>
                                <div class="case-card <?php echo esc_attr($hidden_class); ?>" data-category="success-cases" data-post-index="<?php echo esc_attr($success_count); ?>">
                                    <div class="case-card-header">
                                        <span class="case-card-badge"><?php echo esc_html($legal_case ? $legal_case : 'Legal case'); ?></span>
                                    </div>
                                    <div class="case-card-content">
                                        <div class="case-card-icon-section">
                                            <div class="case-card-avatar">
                                                <span class="decision-text"><?php echo esc_html($decision ? $decision : 'N/A'); ?></span>
                                            </div>
                                            <div class="case-card-info">
                                                <div class="case-card-description"><?php echo esc_html($subtitle ? $subtitle : the_title()); ?></div>
                                            </div>
                                        </div>
                                        <?php if ($date) : ?>
                                            <div class="case-card-date"><?php echo esc_html(date_i18n('Y.m.d', strtotime($date))); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php
                            } elseif ($post_type === 'legal_information') {
                                $legal_info_count++;
                                $hidden_class = ($legal_info_count > 3) ? 'hidden' : '';
                                $subtitle = get_post_meta(get_the_ID(), '_legal_information_subtitle', true);
                                ?>
                                <a href="<?php the_permalink(); ?>" class="legal-info-card <?php echo esc_attr($hidden_class); ?>" data-category="legal-info" data-post-index="<?php echo esc_attr($legal_info_count); ?>" style="text-decoration: none; color: inherit;">
                                    <?php
                                    $content_image = law_firm_get_first_content_image();
                                    if (has_post_thumbnail()) :
                                    ?>
                                        <div class="legal-info-card-image">
                                            <?php the_post_thumbnail('case-thumbnail'); ?>
                                        </div>
                                    <?php elseif ($content_image) : ?>
                                        <div class="legal-info-card-image">
                                            <img src="<?php echo esc_url($content_image); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover;" />
                                        </div>
                                    <?php else : ?>
                                        <div class="legal-info-card-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
                                    <?php endif; ?>
                                    <div class="legal-info-card-content">
                                        <h3 class="legal-info-card-title"><?php the_title(); ?></h3>
                                        <?php if ($subtitle) : ?>
                                            <p class="legal-info-card-subtitle"><?php echo esc_html($subtitle); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </a>
                                <?php
                            } elseif ($post_type === 'news_board') {
                                $news_count++;
                                $hidden_class = ($news_count > 4) ? 'hidden' : '';
                                $legal_case = get_post_meta(get_the_ID(), '_news_board_category', true);
                                $newspaper_name = get_post_meta(get_the_ID(), '_news_board_newspaper_name', true);
                                $date = get_post_meta(get_the_ID(), '_news_board_date', true);
                                ?>
                                <div class="case-card <?php echo esc_attr($hidden_class); ?>" data-category="press-coverage" data-post-index="<?php echo esc_attr($news_count); ?>">
                                    <div class="case-card-header">
                                        <span class="case-card-badge"><?php echo esc_html($legal_case ? $legal_case : 'News'); ?></span>
                                    </div>
                                    <div class="case-card-content">
                                        <div class="case-card-icon-section">
                                            <div class="case-card-info">
                                                <div class="news-board-newspaper-name"><?php echo esc_html($newspaper_name ? $newspaper_name : the_title()); ?></div>
                                            </div>
                                        </div>
                                        <?php if ($date) : ?>
                                            <div class="case-card-date"><?php echo esc_html(date_i18n('Y.m.d', strtotime($date))); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php
                            }
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>

                    <?php if ($success_count > 4 || $legal_info_count > 3 || $news_count > 4) : ?>
                    <div class="load-more-wrapper">
                        <button class="load-more-btn" id="load-more-cases-btn">더보기 +</button>
                    </div>
                    <?php endif; ?>

                    <?php
                else :
                    echo '<p class="no-cases">' . esc_html__('No cases found.', 'law-firm-pyeongjeong') . '</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <div class="template-placeholder" aria-live="polite">
        <?php
        if (is_user_logged_in() && current_user_can('manage_options')) {
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const casesList = document.getElementById('cases-list');
    const loadMoreBtn = document.getElementById('load-more-cases-btn');
    const categoryBtns = document.querySelectorAll('.category-btn');
    const allCards = document.querySelectorAll('#cases-list [data-category]');

    // Track active category
    let activeCategory = 'all';

    // Define how many cards to show initially per category
    const initialVisibleCount = {
        'success-cases': 4,
        'legal-info': 3,
        'press-coverage': 4,
        'all': -1 // Show all initially when "all" is selected
    };

    // Function to filter and display cards based on category
    function filterCardsByCategory(category) {
        let successCount = 0;
        let legalInfoCount = 0;
        let newsCount = 0;

        allCards.forEach(card => {
            const cardCategory = card.dataset.category;

            if (category === 'all') {
                // Show first N cards of each category type
                if (cardCategory === 'success-cases') {
                    successCount++;
                    if (successCount <= 4) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                } else if (cardCategory === 'legal-info') {
                    legalInfoCount++;
                    if (legalInfoCount <= 3) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                } else if (cardCategory === 'press-coverage') {
                    newsCount++;
                    if (newsCount <= 4) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                } else {
                    card.classList.add('hidden');
                }
            } else {
                // Show only cards matching the selected category
                if (cardCategory === category) {
                    // For each category type, show first N cards only
                    if (cardCategory === 'legal-info') {
                        legalInfoCount++;
                        if (legalInfoCount <= 3) {
                            card.classList.remove('hidden');
                        } else {
                            card.classList.add('hidden');
                        }
                    } else if (cardCategory === 'success-cases') {
                        successCount++;
                        if (successCount <= 4) {
                            card.classList.remove('hidden');
                        } else {
                            card.classList.add('hidden');
                        }
                    } else if (cardCategory === 'press-coverage') {
                        newsCount++;
                        if (newsCount <= 4) {
                            card.classList.remove('hidden');
                        } else {
                            card.classList.add('hidden');
                        }
                    }
                } else {
                    // Hide cards that don't match the selected category
                    card.classList.add('hidden');
                }
            }
        });
    }

    // Handle category button clicks
    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            activeCategory = this.dataset.category;

            // Update grid layout based on category
            if (casesList) {
                casesList.classList.remove('legal-info-active', 'success-cases-active', 'press-coverage-active', 'all-active');
                if (activeCategory === 'legal-info') {
                    casesList.classList.add('legal-info-active');
                } else if (activeCategory === 'success-cases') {
                    casesList.classList.add('success-cases-active');
                } else if (activeCategory === 'press-coverage') {
                    casesList.classList.add('press-coverage-active');
                } else if (activeCategory === 'all') {
                    casesList.classList.add('all-active');
                }
            }

            // Filter cards based on category
            filterCardsByCategory(activeCategory);

            // Reset Load More button visibility
            updateLoadMoreButton();
        });
    });

    // Handle Load More button
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            let cardsToLoad = 4; // Default for success-cases and press-coverage

            if (activeCategory === 'legal-info') {
                cardsToLoad = 3;
            }

            const hiddenCards = document.querySelectorAll('#cases-list .hidden');
            let count = 0;

            hiddenCards.forEach(card => {
                // Check if card matches active category
                const cardCategory = card.dataset.category;

                if (activeCategory === 'all') {
                    // Show all hidden cards
                    if (count < cardsToLoad) {
                        card.classList.remove('hidden');
                        count++;
                    }
                } else {
                    // Show only cards matching the active category
                    if (cardCategory === activeCategory && count < cardsToLoad) {
                        card.classList.remove('hidden');
                        count++;
                    }
                }
            });

            updateLoadMoreButton();
        });
    }

    // Update Load More button visibility
    function updateLoadMoreButton() {
        if (!loadMoreBtn) return;

        const visibleCards = document.querySelectorAll('#cases-list [data-category]:not(.hidden)');
        const hiddenCards = document.querySelectorAll('#cases-list .hidden');
        let hasHiddenCardsInCategory = false;

        hiddenCards.forEach(card => {
            if (activeCategory === 'all' || card.dataset.category === activeCategory) {
                hasHiddenCardsInCategory = true;
            }
        });

        if (hasHiddenCardsInCategory) {
            loadMoreBtn.classList.remove('hidden');
        } else {
            loadMoreBtn.classList.add('hidden');
        }
    }

    // Set initial grid layout and filter
    if (casesList) {
        casesList.classList.add('all-active');
        filterCardsByCategory('all');
    }
});
</script>

</body>
</html>
