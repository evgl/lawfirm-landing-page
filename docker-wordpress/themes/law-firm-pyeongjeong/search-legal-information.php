<?php
/**
 * Search Legal Information Template
 *
 * Template Name: Search Legal Information Template
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

        /* Info List Styles */
        .info-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-card {
            background: #ffffff;
            border: 1px solid #d0d0d0;
            border-radius: 8px;
            padding: 0;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .info-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }

        .info-card-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            background: #f0f0f0;
        }

        .info-card-content {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .info-card-title {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0 0 10px;
            line-height: 1.4;
            font-family: 'Noto Sans KR', sans-serif;
        }

        .info-card-subtitle {
            font-size: 13px;
            color: #666666;
            margin: 0;
            line-height: 1.4;
            font-family: 'Noto Sans KR', sans-serif;
        }

        .info-card.hidden {
            display: none;
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

        .no-info {
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

            .info-list {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .info-card-image {
                height: 150px;
            }

            .info-card-content {
                padding: 16px;
            }

            .info-card-title {
                font-size: 15px;
            }

            .info-card-subtitle {
                font-size: 12px;
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

            .info-list {
                gap: 12px;
            }

            .info-card-image {
                height: 120px;
            }

            .info-card-content {
                padding: 12px 14px;
            }

            .info-card-title {
                font-size: 14px;
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
<main id="primary" class="site-main search-legal-information-template">

    <!-- Search Section -->
    <section class="search-section">
        <div class="search-section-wrapper">
            <!-- Page Title -->
            <div class="search-title">
                <h1><?php esc_html_e('법률정보', 'law-firm-pyeongjeong'); ?></h1>
                <p class="search-subtitle">LEGAL INFORMATION</p>
            </div>

            <!-- Search Container -->
            <div class="search-container">
                <form class="search-bar-form" role="search">
                    <input
                        type="text"
                        class="search-input"
                        placeholder="<?php esc_attr_e('Search legal information...', 'law-firm-pyeongjeong'); ?>"
                        aria-label="<?php esc_attr_e('Search legal information', 'law-firm-pyeongjeong'); ?>"
                    >
                    <button type="submit" class="search-button" aria-label="<?php esc_attr_e('Search', 'law-firm-pyeongjeong'); ?>">
                        <?php esc_html_e('검색', 'law-firm-pyeongjeong'); ?>
                    </button>
                </form>
            </div>

            <!-- Legal Information Display -->
            <div class="legal-information-container">
                <?php
                // Query legal information posts
                $args = array(
                    'post_type' => 'legal_information',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $legal_info = new WP_Query($args);

                if ($legal_info->have_posts()) :
                    $post_count = 0;
                    ?>
                    <div class="info-list" id="legal-info-list">
                        <?php
                        while ($legal_info->have_posts()) : $legal_info->the_post();
                            $subtitle = get_post_meta(get_the_ID(), '_legal_information_subtitle', true);
                            $post_count++;
                            $hidden_class = ($post_count > 4) ? 'hidden' : '';
                            ?>
                            <a href="<?php the_permalink(); ?>" class="info-card <?php echo esc_attr($hidden_class); ?>" data-post-index="<?php echo esc_attr($post_count); ?>" style="text-decoration: none; color: inherit;">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="info-card-image">
                                        <?php the_post_thumbnail('case-thumbnail'); ?>
                                    </div>
                                <?php else : ?>
                                    <div class="info-card-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
                                <?php endif; ?>
                                <div class="info-card-content">
                                    <h3 class="info-card-title"><?php the_title(); ?></h3>
                                    <?php if ($subtitle) : ?>
                                        <p class="info-card-subtitle"><?php echo esc_html($subtitle); ?></p>
                                    <?php endif; ?>
                                </div>
                            </a>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>

                    <?php if ($post_count > 4) : ?>
                    <div class="load-more-wrapper">
                        <button class="load-more-btn" id="load-more-legal-info-btn">더보기 +</button>
                    </div>
                    <?php endif; ?>

                    <?php
                else :
                    echo '<p class="no-info">' . esc_html__('No legal information found.', 'law-firm-pyeongjeong') . '</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Bottom Contact Bar -->
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
    const loadMoreBtn = document.getElementById('load-more-legal-info-btn');
    if (!loadMoreBtn) return;

    loadMoreBtn.addEventListener('click', function() {
        const hiddenCards = document.querySelectorAll('#legal-info-list .info-card.hidden');
        let count = 0;
        hiddenCards.forEach(card => {
            if (count < 4) {
                card.classList.remove('hidden');
                count++;
            }
        });

        if (document.querySelectorAll('#legal-info-list .info-card.hidden').length === 0) {
            loadMoreBtn.classList.add('hidden');
        }
    });
});
</script>

</body>
</html>
