<?php
/**
 * Consultation Wizard Step Page
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

// Ensure category is passed, otherwise redirect to consultation main
$category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
if (empty($category)) {
    wp_redirect(home_url('/consultation/'));
    exit;
}

get_header();
?>

<main id="main" class="site-main consultation-wizard" role="main">
    <div class="wizard-top-section">
        <div class="container">
            <div class="wizard-header-content">
                <p class="wizard-step">01.</p>
                <h1 class="wizard-question"><?php esc_html_e('고소나 신고가 이루어졌나요?', 'pjlaw'); ?></h1>
            </div>
        </div>
    </div>
    
    <div class="wizard-bottom-section">
        <div class="wizard-progress-bar">
            <!-- Representing 1 out of maybe 7 steps (width approx 13-15%) -->
            <div class="wizard-progress-active" style="width: 15%;"></div>
        </div>
        
        <div class="wizard-options-area">
            <div class="container">
                <div class="wizard-options-container">
                    <div class="wizard-options">
                        <button class="wizard-option-btn" data-value="예"><?php esc_html_e('예', 'pjlaw'); ?></button>
                        <button class="wizard-option-btn" data-value="아니오"><?php esc_html_e('아니오', 'pjlaw'); ?></button>
                        <button class="wizard-option-btn" data-value="잘 모르겠습니다."><?php esc_html_e('잘 모르겠습니다.', 'pjlaw'); ?></button>
                    </div>
                    
                    <div class="wizard-actions">
                        <button class="wizard-next-btn" id="wizard-next" disabled>
                            <span class="wizard-next-text"><?php esc_html_e('다음', 'pjlaw'); ?></span>
                            <div class="wizard-next-icon">
                                <span class="chevron-top"></span>
                                <span class="chevron-bottom"></span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const optionBtns = document.querySelectorAll('.wizard-option-btn');
    const nextBtn = document.getElementById('wizard-next');
    let selectedValue = '';

    optionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all
            optionBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked
            this.classList.add('active');
            
            selectedValue = this.getAttribute('data-value');
            
            // Enable next button
            nextBtn.removeAttribute('disabled');
        });
    });

    nextBtn.addEventListener('click', function() {
        if (!selectedValue) return;
        
        // For now, since we only have step 1 design, we just alert
        alert('선택한 항목: ' + selectedValue + '\n(다음 단계 화면은 아직 디자인이 없습니다.)');
    });
});
</script>

<?php wp_footer(); ?>
</body>
</html>
