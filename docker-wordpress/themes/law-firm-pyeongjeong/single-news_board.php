<?php
/**
 * Single News Board Template
 *
 * @package Law_Firm_Pyeongjeong
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Get news board data
$news_id = get_the_ID();
$date = get_post_meta($news_id, '_news_board_date', true);
$newspaper_name = get_post_meta($news_id, '_news_board_newspaper_name', true);
$description = get_post_meta($news_id, '_news_board_description', true);
?>

<style>
    .news-detail-section {
        min-height: 100vh;
        padding: 100px 20px 80px;
        background: linear-gradient(135deg, #1a2642 0%, #2B3D66 100%);
        color: #ffffff;
    }

    .news-detail-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .news-detail-header {
        margin-bottom: 50px;
    }

    .news-detail-title {
        font-size: 48px;
        font-weight: 700;
        margin: 0 0 20px;
        font-family: 'Noto Sans KR', sans-serif;
        color: #ffffff;
    }

    .news-detail-newspaper-name {
        font-size: 18px;
        color: #4a90e2;
        margin-bottom: 20px;
        font-style: italic;
    }

    .news-detail-meta {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 30px;
    }

    .news-meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .news-detail-content {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 40px;
        margin-bottom: 40px;
    }

    .news-detail-section-title {
        font-size: 18px;
        font-weight: 600;
        margin: 0 0 16px;
        color: #ffd89b;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .news-detail-text {
        font-size: 16px;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.8);
        margin: 0 0 24px;
        word-break: break-word;
    }

    .news-detail-text:last-child {
        margin-bottom: 0;
    }

    .news-detail-item {
        background: rgba(255, 255, 255, 0.05);
        padding: 20px;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 20px;
    }

    .news-detail-item-label {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .news-detail-item-value {
        font-size: 16px;
        font-weight: 600;
        color: #ffffff;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-size: 14px;
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }

    .back-link:hover {
        gap: 12px;
        color: #ffffff;
    }

    .back-link i {
        font-size: 16px;
    }

    .featured-image {
        width: 100%;
        height: auto;
        border-radius: 12px;
        margin-bottom: 40px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .featured-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .news-detail-section {
            padding: 80px 16px 60px;
        }

        .news-detail-title {
            font-size: 32px;
            margin-bottom: 16px;
        }

        .news-detail-content {
            padding: 24px;
        }

        .news-detail-meta {
            gap: 16px;
            font-size: 13px;
        }

        .news-detail-subtitle {
            font-size: 16px;
        }
    }

    @media (max-width: 480px) {
        .news-detail-section {
            padding: 70px 12px 50px;
        }

        .news-detail-title {
            font-size: 24px;
        }

        .news-detail-content {
            padding: 16px;
        }

        .news-detail-text {
            font-size: 14px;
            line-height: 1.6;
        }

        .news-detail-subtitle {
            font-size: 14px;
        }
    }
</style>

<section class="news-detail-section">
    <div class="news-detail-container">
        <a href="<?php echo esc_url(home_url('/cases/')); ?>" class="back-link">
            <i class="fas fa-arrow-left"></i>
            <?php _e('언론보드로 돌아가기', 'law-firm-pyeongjeong'); ?>
        </a>

        <div class="news-detail-header">
            <h1 class="news-detail-title"><?php the_title(); ?></h1>

            <?php if ($newspaper_name) : ?>
                <p class="news-detail-newspaper-name"><?php echo esc_html($newspaper_name); ?></p>
            <?php endif; ?>

            <div class="news-detail-meta">
                <?php if ($date) : ?>
                    <div class="news-meta-item">
                        <i class="fas fa-calendar"></i>
                        <span><?php echo esc_html(date_i18n('Y.m.d', strtotime($date))); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if (has_post_thumbnail()) : ?>
            <div class="featured-image">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <div class="news-detail-content">
            <?php if ($description) : ?>
                <div class="news-detail-item">
                    <div class="news-detail-item-label"><?php _e('Summary', 'law-firm-pyeongjeong'); ?></div>
                    <div class="news-detail-item-value"><?php echo esc_html($description); ?></div>
                </div>
            <?php endif; ?>

            <?php if (!empty(get_the_content())) : ?>
                <h2 class="news-detail-section-title"><?php _e('Content', 'law-firm-pyeongjeong'); ?></h2>
                <div class="news-detail-text">
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>
