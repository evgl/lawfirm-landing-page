<?php
/**
 * Single Legal Case Template
 *
 * @package Law_Firm_Pyeongjeong
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Get case data
$case_id = get_the_ID();
$profile_name = get_post_meta($case_id, '_case_profile_name', true);
$brief_description = get_post_meta($case_id, '_case_brief_description', true);
$case_date = get_post_meta($case_id, '_case_date', true);
$case_result = get_post_meta($case_id, '_case_result', true);
$case_amount = get_post_meta($case_id, '_case_amount', true);
$case_duration = get_post_meta($case_id, '_case_duration', true);
$case_attorney = get_post_meta($case_id, '_case_attorney', true);
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

    .case-result-badge {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        margin-right: 12px;
        margin-bottom: 16px;
    }

    .case-result-badge.won {
        background: rgba(52, 211, 153, 0.2);
        color: #34d399;
        border: 1px solid #34d399;
    }

    .case-result-badge.settled {
        background: rgba(96, 165, 250, 0.2);
        color: #60a5fa;
        border: 1px solid #60a5fa;
    }

    .case-result-badge.dismissed {
        background: rgba(156, 163, 175, 0.2);
        color: #d1d5db;
        border: 1px solid #d1d5db;
    }

    .case-details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .case-detail-item {
        background: rgba(255, 255, 255, 0.05);
        padding: 20px;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.1);
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

        .case-details-grid {
            grid-template-columns: 1fr;
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

            <div class="case-detail-meta">
                <?php if ($case_date) : ?>
                    <div class="case-meta-item">
                        <i class="fas fa-calendar"></i>
                        <span><?php echo esc_html(date_i18n('Y.m.d', strtotime($case_date))); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($profile_name) : ?>
                    <div class="case-meta-item">
                        <i class="fas fa-user"></i>
                        <span><?php echo esc_html($profile_name); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($case_result) : ?>
                    <div class="case-meta-item">
                        <i class="fas fa-check-circle"></i>
                        <span><?php echo esc_html(ucfirst($case_result)); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($case_result) : ?>
            <div class="case-result-badge <?php echo esc_attr($case_result); ?>">
                <?php
                switch ($case_result) {
                    case 'won':
                        _e('승소', 'law-firm-pyeongjeong');
                        break;
                    case 'settled':
                        _e('합의', 'law-firm-pyeongjeong');
                        break;
                    case 'dismissed':
                        _e('기각', 'law-firm-pyeongjeong');
                        break;
                }
                ?>
            </div>
        <?php endif; ?>

        <div class="case-detail-content">
            <?php if ($brief_description) : ?>
                <h2 class="case-detail-section-title"><?php _e('사건 개요', 'law-firm-pyeongjeong'); ?></h2>
                <p class="case-detail-text"><?php echo wp_kses_post($brief_description); ?></p>
            <?php endif; ?>

            <?php if (has_excerpt()) : ?>
                <h2 class="case-detail-section-title"><?php _e('사건 요약', 'law-firm-pyeongjeong'); ?></h2>
                <p class="case-detail-text"><?php echo wp_kses_post(get_the_excerpt()); ?></p>
            <?php endif; ?>

            <?php if (has_content()) : ?>
                <h2 class="case-detail-section-title"><?php _e('상세 내용', 'law-firm-pyeongjeong'); ?></h2>
                <div class="case-detail-text">
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="case-details-grid">
            <?php if ($case_amount) : ?>
                <div class="case-detail-item">
                    <div class="case-detail-item-label"><?php _e('합의금/판결금', 'law-firm-pyeongjeong'); ?></div>
                    <div class="case-detail-item-value"><?php echo esc_html($case_amount); ?></div>
                </div>
            <?php endif; ?>

            <?php if ($case_duration) : ?>
                <div class="case-detail-item">
                    <div class="case-detail-item-label"><?php _e('사건 기간', 'law-firm-pyeongjeong'); ?></div>
                    <div class="case-detail-item-value"><?php echo esc_html($case_duration); ?></div>
                </div>
            <?php endif; ?>

            <?php if ($case_attorney) :
                $attorney = law_firm_get_attorney($case_attorney);
                if ($attorney) : ?>
                    <div class="case-detail-item">
                        <div class="case-detail-item-label"><?php _e('담당 변호사', 'law-firm-pyeongjeong'); ?></div>
                        <div class="case-detail-item-value"><?php echo esc_html($attorney['name']); ?></div>
                    </div>
                <?php endif;
            endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>
