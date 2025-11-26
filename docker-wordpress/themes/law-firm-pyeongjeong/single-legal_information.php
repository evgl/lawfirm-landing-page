<?php
/**
 * Single Legal Information Template
 *
 * @package Law_Firm_Pyeongjeong
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Get legal information data
$info_id = get_the_ID();
$subtitle = get_post_meta($info_id, '_legal_information_subtitle', true);
?>

<style>
    .info-detail-section {
        min-height: 100vh;
        padding: 100px 20px 80px;
        background: linear-gradient(135deg, #1a2642 0%, #2B3D66 100%);
        color: #ffffff;
    }

    .info-detail-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .info-detail-header {
        margin-bottom: 50px;
    }

    .info-detail-title {
        font-size: 48px;
        font-weight: 700;
        margin: 0 0 20px;
        font-family: 'Noto Sans KR', sans-serif;
        color: #ffffff;
    }

    .info-detail-subtitle {
        font-size: 18px;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 20px;
        font-style: italic;
    }

    .info-detail-content {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 40px;
        margin-bottom: 40px;
    }

    .info-detail-section-title {
        font-size: 18px;
        font-weight: 600;
        margin: 0 0 16px;
        color: #a8d5ff;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .info-detail-text {
        font-size: 16px;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.8);
        margin: 0 0 24px;
        word-break: break-word;
    }

    .info-detail-text:last-child {
        margin-bottom: 0;
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
        .info-detail-section {
            padding: 80px 16px 60px;
        }

        .info-detail-title {
            font-size: 32px;
            margin-bottom: 16px;
        }

        .info-detail-content {
            padding: 24px;
        }

        .info-detail-subtitle {
            font-size: 16px;
        }
    }

    @media (max-width: 480px) {
        .info-detail-section {
            padding: 70px 12px 50px;
        }

        .info-detail-title {
            font-size: 24px;
        }

        .info-detail-content {
            padding: 16px;
        }

        .info-detail-text {
            font-size: 14px;
            line-height: 1.6;
        }

        .info-detail-subtitle {
            font-size: 14px;
        }
    }
</style>

<section class="info-detail-section">
    <div class="info-detail-container">
        <a href="<?php echo esc_url(home_url('/cases/')); ?>" class="back-link">
            <i class="fas fa-arrow-left"></i>
            <?php _e('성공사례로 돌아가기', 'law-firm-pyeongjeong'); ?>
        </a>

        <div class="info-detail-header">
            <h1 class="info-detail-title"><?php the_title(); ?></h1>

            <?php if ($subtitle) : ?>
                <p class="info-detail-subtitle"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>
        </div>

        <?php if (has_post_thumbnail()) : ?>
            <div class="featured-image">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <div class="info-detail-content">
            <h2 class="info-detail-section-title"><?php _e('Content', 'law-firm-pyeongjeong'); ?></h2>
            <div class="info-detail-text">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>
