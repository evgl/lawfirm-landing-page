<?php
/**
 * Single Successful Case Template
 *
 * @package Law_Firm_Pyeongjeong
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Get case data
$case_id = get_the_ID();
$legal_case = get_post_meta($case_id, '_successful_case_legal_case', true);
$decision = get_post_meta($case_id, '_successful_case_decision', true);
$date = get_post_meta($case_id, '_successful_case_date', true);
$subtitle = get_post_meta($case_id, '_successful_case_subtitle', true);
?>

<style>
    .case-detail-section {
        min-height: 100vh;
        padding: 100px 20px 80px;
        background: linear-gradient(135deg, #1a2642 0%, #2B3D66 100%);
        color: #ffffff;
    }

    .case-detail-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .case-detail-header {
        margin-bottom: 50px;
    }

    .case-detail-title {
        font-size: 48px;
        font-weight: 700;
        margin: 0 0 20px;
        font-family: 'Noto Sans KR', sans-serif;
        color: #ffffff;
    }

    .case-detail-subtitle {
        font-size: 18px;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 20px;
        font-style: italic;
    }

    .case-detail-meta {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 30px;
    }

    .case-meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .case-detail-content {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 40px;
        margin-bottom: 40px;
    }

    .case-detail-section-title {
        font-size: 18px;
        font-weight: 600;
        margin: 0 0 16px;
        color: #4A90E2;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .case-detail-text {
        font-size: 16px;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.8);
        margin: 0 0 24px;
        word-break: break-word;
    }

    .case-detail-text:last-child {
        margin-bottom: 0;
    }

    .case-detail-item {
        background: rgba(255, 255, 255, 0.05);
        padding: 20px;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 20px;
    }

    .case-detail-item-label {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .case-detail-item-value {
        font-size: 16px;
        font-weight: 600;
        color: #ffffff;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #4A90E2;
        text-decoration: none;
        font-size: 14px;
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }

    .back-link:hover {
        gap: 12px;
        color: #60a5fa;
    }

    .back-link i {
        font-size: 16px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .case-detail-section {
            padding: 80px 16px 60px;
        }

        .case-detail-title {
            font-size: 32px;
            margin-bottom: 16px;
        }

        .case-detail-content {
            padding: 24px;
        }

        .case-detail-meta {
            gap: 16px;
            font-size: 13px;
        }
    }

    @media (max-width: 480px) {
        .case-detail-section {
            padding: 70px 12px 50px;
        }

        .case-detail-title {
            font-size: 24px;
        }

        .case-detail-content {
            padding: 16px;
        }

        .case-detail-text {
            font-size: 14px;
            line-height: 1.6;
        }
    }
</style>

<section class="case-detail-section">
    <div class="case-detail-container">
        <a href="<?php echo esc_url(home_url('/cases/')); ?>" class="back-link">
            <i class="fas fa-arrow-left"></i>
            <?php _e('성공사례로 돌아가기', 'law-firm-pyeongjeong'); ?>
        </a>

        <div class="case-detail-header">
            <h1 class="case-detail-title"><?php the_title(); ?></h1>

            <?php if ($subtitle) : ?>
                <p class="case-detail-subtitle"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>

            <div class="case-detail-meta">
                <?php if ($date) : ?>
                    <div class="case-meta-item">
                        <i class="fas fa-calendar"></i>
                        <span><?php echo esc_html(date_i18n('Y.m.d', strtotime($date))); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($legal_case) : ?>
                    <div class="case-meta-item">
                        <i class="fas fa-briefcase"></i>
                        <span><?php echo esc_html($legal_case); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="case-detail-content">
            <?php if ($legal_case) : ?>
                <div class="case-detail-item">
                    <div class="case-detail-item-label"><?php _e('Legal Case', 'law-firm-pyeongjeong'); ?></div>
                    <div class="case-detail-item-value"><?php echo esc_html($legal_case); ?></div>
                </div>
            <?php endif; ?>

            <?php if ($decision) : ?>
                <h2 class="case-detail-section-title"><?php _e('Decision', 'law-firm-pyeongjeong'); ?></h2>
                <p class="case-detail-text"><?php echo wp_kses_post($decision); ?></p>
            <?php endif; ?>

            <?php if (has_content()) : ?>
                <h2 class="case-detail-section-title"><?php _e('Case Description', 'law-firm-pyeongjeong'); ?></h2>
                <div class="case-detail-text">
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>
