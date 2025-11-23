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

        .case-section {
            margin-bottom: 60px;
        }

        .case-section:last-child {
            margin-bottom: 0;
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
        /* Grid layout adjustments */
        .success-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .legal-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .news-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
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

            .success-grid,
            .legal-grid,
            .news-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
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

            .success-grid,
            .legal-grid,
            .news-grid {
                grid-template-columns: 1fr;
                gap: 12px;
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
            
            .news-body {
                flex-direction: column;
                gap: 16px;
            }

            .news-image-wrapper {
                width: 100%;
                flex: none;
                height: 200px;
            }
            
            .news-title {
                font-size: 18px;
            }
        }
        
        /* News Card Styles */
        .news-card {
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: inherit;
            background: #ffffff;
            border: 1px solid #d0d0d0;
            border-radius: 8px;
            padding: 0;
            width: 100%;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .news-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }

        .news-card:hover .news-title {
            text-decoration: underline;
            color: #4A90E2;
        }

        .news-card.hidden {
            display: none;
        }

        .news-left-section {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .news-header-meta {
            padding: 16px 20px;
            background: #f9f9f9;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            gap: 10px;
            align-items: baseline;
            min-height: 50px;
        }

        .news-newspaper {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a1a;
            font-family: 'Noto Sans KR', sans-serif;
            margin: 0;
        }

        .news-date {
            font-size: 14px;
            color: #888888;
            font-family: 'Noto Sans KR', sans-serif;
            margin: 0;
        }

        .news-body {
            display: flex;
            flex-direction: column;
            gap: 0;
            align-items: stretch;
            text-decoration: none;
            color: inherit;
            height: 100%;
        }

        .news-image-wrapper {
            width: 100%;
            height: 200px;
            border-radius: 4px;
            overflow: hidden;
            background: #f0f0f0;
            position: relative;
        }

        .news-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-card:hover .news-image-wrapper img {
            transform: scale(1.05);
        }

        .news-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .news-title {
            font-size: 22px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0 0 12px;
            line-height: 1.4;
            font-family: 'Noto Sans KR', sans-serif;
        }

        .news-excerpt {
            font-size: 15px;
            color: #555555;
            line-height: 1.6;
            margin: 0;
            font-family: 'Noto Sans KR', sans-serif;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
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
                
                <!-- Section: Successful Cases -->
                <section id="section-success-cases" class="case-section">
                    <h2 class="cases-section-title active" data-category="success-cases">성공사례</h2>
                    <div class="cases-list success-grid" id="list-success-cases">
                        <?php
                        $args_success = array(
                            'post_type' => 'successful_case',
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                        $query_success = new WP_Query($args_success);
                        $success_count = 0;

                        if ($query_success->have_posts()) :
                            while ($query_success->have_posts()) : $query_success->the_post();
                                $success_count++;
                                $hidden_class = ($success_count > 4) ? 'hidden' : '';
                                $legal_case = get_post_meta(get_the_ID(), '_successful_case_legal_case', true);
                                $decision = get_post_meta(get_the_ID(), '_successful_case_decision', true);
                                $subtitle = get_post_meta(get_the_ID(), '_successful_case_subtitle', true);
                                $date = get_post_meta(get_the_ID(), '_successful_case_date', true);
                                ?>
                                <div class="case-card <?php echo esc_attr($hidden_class); ?>" data-category="success-cases">
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
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p class="no-cases" data-category="success-cases">' . esc_html__('No successful cases found.', 'law-firm-pyeongjeong') . '</p>';
                        endif;
                        ?>
                    </div>
                    <div class="load-more-wrapper">
                        <button class="load-more-btn <?php echo ($success_count > 4) ? '' : 'hidden'; ?>" id="btn-load-more-success" data-target="success-cases">더보기 +</button>
                    </div>
                </section>

                <!-- Section: Legal Information -->
                <section id="section-legal-info" class="case-section">
                    <h2 class="cases-section-title active" data-category="legal-info">법률정보</h2>
                    <div class="cases-list legal-grid" id="list-legal-info">
                        <?php
                        $args_legal = array(
                            'post_type' => 'legal_information',
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                        $query_legal = new WP_Query($args_legal);
                        $legal_count = 0;

                        if ($query_legal->have_posts()) :
                            while ($query_legal->have_posts()) : $query_legal->the_post();
                                $legal_count++;
                                $hidden_class = ($legal_count > 3) ? 'hidden' : '';
                                $subtitle = get_post_meta(get_the_ID(), '_legal_information_subtitle', true);
                                ?>
                                <a href="<?php the_permalink(); ?>" class="legal-info-card <?php echo esc_attr($hidden_class); ?>" data-category="legal-info" style="text-decoration: none; color: inherit;">
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
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p class="no-cases" data-category="legal-info">' . esc_html__('No legal information found.', 'law-firm-pyeongjeong') . '</p>';
                        endif;
                        ?>
                    </div>
                    <div class="load-more-wrapper">
                        <button class="load-more-btn <?php echo ($legal_count > 3) ? '' : 'hidden'; ?>" id="btn-load-more-legal" data-target="legal-info">더보기 +</button>
                    </div>
                </section>

                <!-- Section: News Board (Press Coverage) -->
                <section id="section-press-coverage" class="case-section">
                    <h2 class="cases-section-title active" data-category="press-coverage">언론보도</h2>
                    <div class="cases-list news-grid" id="list-press-coverage">
                        <?php
                        $args_news = array(
                            'post_type' => 'news_board',
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                        $query_news = new WP_Query($args_news);
                        $news_count = 0;

                        if ($query_news->have_posts()) :
                            while ($query_news->have_posts()) : $query_news->the_post();
                                $news_count++;
                                $hidden_class = ($news_count > 4) ? 'hidden' : '';
                                $newspaper_name = get_post_meta(get_the_ID(), '_news_board_newspaper_name', true);
                                $date = get_post_meta(get_the_ID(), '_news_board_date', true);
                                ?>
                                <article class="news-card <?php echo esc_attr($hidden_class); ?>" data-category="press-coverage">
                                    <a href="<?php the_permalink(); ?>" class="news-body">
                                        <div class="news-left-section">
                                            <div class="news-header-meta">
                                                <?php if ($newspaper_name) : ?>
                                                    <div class="news-newspaper" style="margin: 0;"><?php echo esc_html($newspaper_name); ?></div>
                                                <?php endif; ?>
                                                <?php if ($date) : ?>
                                                    <div class="news-date"><?php echo esc_html(date_i18n('Y-m-d', strtotime($date))); ?></div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="news-image-wrapper">
                                                <?php 
                                                $content_image = law_firm_get_first_content_image();
                                                $attachment_image = '';
                                                
                                                if (!$content_image && !has_post_thumbnail()) {
                                                    $attachments = get_posts(array(
                                                        'post_type'      => 'attachment',
                                                        'post_mime_type' => 'image',
                                                        'post_parent'    => get_the_ID(),
                                                        'posts_per_page' => 1,
                                                        'post_status'    => 'inherit',
                                                    ));
                                                    if ($attachments) {
                                                        $attachment_image = wp_get_attachment_image_url($attachments[0]->ID, 'large');
                                                    }
                                                }

                                                if (has_post_thumbnail()) : 
                                                    the_post_thumbnail('large'); 
                                                elseif ($content_image) : 
                                                ?>
                                                    <img src="<?php echo esc_url($content_image); ?>" alt="<?php the_title_attribute(); ?>" />
                                                <?php elseif ($attachment_image) : ?>
                                                    <img src="<?php echo esc_url($attachment_image); ?>" alt="<?php the_title_attribute(); ?>" />
                                                <?php else : ?>
                                                    <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);"></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="news-content">
                                            <h3 class="news-title"><?php the_title(); ?></h3>
                                            <div class="news-excerpt">
                                                <?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p class="no-cases" data-category="press-coverage">' . esc_html__('No press coverage found.', 'law-firm-pyeongjeong') . '</p>';
                        endif;
                        ?>
                    </div>
                    <div class="load-more-wrapper">
                        <button class="load-more-btn <?php echo ($news_count > 4) ? '' : 'hidden'; ?>" id="btn-load-more-news" data-target="press-coverage">더보기 +</button>
                    </div>
                </section>
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
    const categoryBtns = document.querySelectorAll('.category-btn');
    const sections = {
        'success-cases': document.getElementById('section-success-cases'),
        'legal-info': document.getElementById('section-legal-info'),
        'press-coverage': document.getElementById('section-press-coverage')
    };
    const loadMoreBtns = {
        'success-cases': document.getElementById('btn-load-more-success'),
        'legal-info': document.getElementById('btn-load-more-legal'),
        'press-coverage': document.getElementById('btn-load-more-news')
    };
    
    // Track active category
    let activeCategory = 'all';

    // Function to update view based on category
    function updateView(category) {
        // Update button states
        categoryBtns.forEach(btn => {
            if (btn.dataset.category === category) {
                btn.classList.add('active');
                btn.setAttribute('aria-pressed', 'true');
            } else {
                btn.classList.remove('active');
                btn.setAttribute('aria-pressed', 'false');
            }
        });

        if (category === 'all') {
            // Show all sections
            Object.values(sections).forEach(section => {
                if (section) {
                    section.style.display = 'block';
                    // Show title in "All" view
                    const title = section.querySelector('.cases-section-title');
                    if (title) title.style.display = 'block';
                    
                    // Hide load more button in "All" view
                    const btn = section.querySelector('.load-more-btn');
                    if (btn) btn.style.display = 'none';
                    
                    // Reset to initial visible count
                    resetSectionVisibility(section);
                }
            });
        } else {
            // Show only selected section
            Object.keys(sections).forEach(key => {
                const section = sections[key];
                if (section) {
                    if (key === category) {
                        section.style.display = 'block';
                        // Hide title in individual view (optional, but cleaner if redundant with tab)
                        // Keeping it hidden as per typical design, or show if needed. 
                        // User request: "Each category should be shown below each other... with their corresponding grid layout" for ALL view.
                        // For individual view, usually we just show the grid.
                        const title = section.querySelector('.cases-section-title');
                        if (title) title.style.display = 'none';
                        
                        // Show load more button if needed
                        const btn = loadMoreBtns[key];
                        if (btn && !btn.classList.contains('hidden')) {
                            btn.style.display = 'block';
                        }
                        
                        // Reset visibility (or keep current state? Resetting is safer for consistency)
                        resetSectionVisibility(section);
                    } else {
                        section.style.display = 'none';
                    }
                }
            });
        }
    }

    // Function to reset section visibility to initial count
    function resetSectionVisibility(section) {
        const category = section.querySelector('.cases-section-title').dataset.category;
        const cards = section.querySelectorAll('.case-card, .legal-info-card, .news-card');
        const limit = (category === 'legal-info') ? 3 : 4;
        
        cards.forEach((card, index) => {
            if (index < limit) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
        
        // Update load more button visibility state (class only, display handled by updateView)
        const btn = section.querySelector('.load-more-btn');
        if (btn) {
            if (cards.length > limit) {
                btn.classList.remove('hidden');
            } else {
                btn.classList.add('hidden');
            }
        }
    }

    // Handle category button clicks
    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            activeCategory = this.dataset.category;
            updateView(activeCategory);
        });
    });

    // Handle Load More buttons
    Object.values(loadMoreBtns).forEach(btn => {
        if (btn) {
            btn.addEventListener('click', function() {
                const targetCategory = this.dataset.target;
                const section = sections[targetCategory];
                const hiddenCards = section.querySelectorAll('.hidden');
                const loadCount = (targetCategory === 'legal-info') ? 3 : 4;
                
                let count = 0;
                hiddenCards.forEach(card => {
                    if (count < loadCount) {
                        card.classList.remove('hidden');
                        count++;
                    }
                });

                // Check if more hidden cards exist
                if (section.querySelectorAll('.hidden').length === 0) {
                    this.classList.add('hidden');
                    this.style.display = 'none';
                }
            });
        }
    });

    // Initialize view
    updateView('all');
});
</script>

</body>
</html>
