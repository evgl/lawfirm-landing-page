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
        <div class="container" id="wizard-completed-steps">
            <!-- Completed steps will be appended here -->
        </div>
        <div class="container" id="wizard-active-step">
            <!-- Active step question will be rendered here -->
        </div>
    </div>
    
    <div class="wizard-bottom-section">
        <div class="wizard-progress-bar">
            <div class="wizard-progress-active" id="wizard-progress" style="width: 15%;"></div>
        </div>
        
        <div class="wizard-options-area">
            <div class="container">
                <div class="wizard-options-container">
                    <div class="wizard-options" id="wizard-options">
                        <!-- Options will be rendered here -->
                    </div>
                    
                    <div class="wizard-actions">
                        <button class="wizard-next-btn" id="wizard-next" disabled style="display: flex; gap: 14px; align-items: center; border: none; background: transparent; cursor: pointer;">
                            <span class="wizard-next-text" style="font-family: 'Pretendard', sans-serif; font-weight: 600; font-size: 20px; color: #666a73; white-space: nowrap;"><?php esc_html_e('다음', 'pjlaw'); ?></span>
                            <div style="display: inline-grid; place-items: start; position: relative;">
                                <div style="display: flex; align-items: center; justify-content: center; position: relative; width: 29.7px; height: 29.7px; grid-area: 1 / 1;">
                                    <div style="transform: rotate(-45deg);">
                                        <div style="background-color: #7396ff; height: 32px; width: 10px; border-radius: 10px;"></div>
                                    </div>
                                </div>
                                <div style="display: flex; align-items: center; justify-content: center; position: relative; width: 29.7px; height: 29.7px; margin-top: 15.5px; grid-area: 1 / 1;">
                                    <div style="transform: rotate(-135deg);">
                                        <div style="background-color: #1a2e69; height: 32px; width: 10px; border-radius: 10px;"></div>
                                    </div>
                                </div>
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
    const category = '<?php echo esc_js($category); ?>';
    const activeStepContainer = document.getElementById('wizard-active-step');
    const completedStepsContainer = document.getElementById('wizard-completed-steps');
    const optionsContainer = document.getElementById('wizard-options');
    const nextBtn = document.getElementById('wizard-next');
    const progressBar = document.getElementById('wizard-progress');
    
    const wizardData = {
        '민사상담': [
            {
                number: '01.',
                question: '고소나 신고가 이루어졌나요?',
                options: ['네', '아니오', '잘 모르겠습니다.']
            },
            {
                number: '02.',
                question: '고소나 신고를 하시는 상황인가요, 혹은 이를 당하시는 상황인가요?',
                options: [
                    '고소나 신고를 하는 상황입니다. (원고)',
                    '고소나 신고를 당하는 상황입니다. (피고)',
                    '쌍방이 서로 하는 상황입니다. (맞고소)',
                    '잘 모르겠습니다.'
                ]
            }
        ],
        '형사상담': [
            {
                number: '01.',
                question: '고소나 신고가 이루어졌나요?',
                options: ['네', '아니오', '잘 모르겠습니다.']
            },
            {
                number: '02.',
                question: '고소나 신고를 하시는 상황인가요, 혹은 이를 당하시는 상황인가요?',
                options: [
                    '고소나 신고를 하는 상황입니다. (원고)',
                    '고소나 신고를 당하는 상황입니다. (피고)',
                    '쌍방이 서로 하는 상황입니다. (맞고소)',
                    '잘 모르겠습니다.'
                ]
            }
        ]
    };
    
    // Fallback to 민사상담 if category not found in data
    const steps = wizardData[category] || wizardData['민사상담'];
    let currentStepIndex = 0;
    let selectedValue = '';
    const answers = [];
    
    function renderStep() {
        const step = steps[currentStepIndex];
        
        // Render Active Question
        activeStepContainer.innerHTML = `
            <div class="wizard-header-content">
                <p class="wizard-step">${step.number}</p>
                <h1 class="wizard-question">${step.question}</h1>
            </div>
        `;
        
        // Render Options
        optionsContainer.innerHTML = '';
        step.options.forEach(opt => {
            const btn = document.createElement('button');
            btn.className = 'wizard-option-btn';
            btn.setAttribute('data-value', opt);
            btn.textContent = opt;
            
            btn.addEventListener('click', function() {
                // Remove active from all
                const allBtns = optionsContainer.querySelectorAll('.wizard-option-btn');
                allBtns.forEach(b => b.classList.remove('active'));
                
                // Add active to clicked
                this.classList.add('active');
                selectedValue = this.getAttribute('data-value');
                nextBtn.removeAttribute('disabled');
            });
            
            optionsContainer.appendChild(btn);
        });
        
        // Disable next button initially
        selectedValue = '';
        nextBtn.setAttribute('disabled', 'true');
        
        // Update progress bar (assuming ~5 steps total)
        const progressPercentage = Math.min(((currentStepIndex + 1) / 5) * 100, 100);
        progressBar.style.width = `${progressPercentage}%`;
    }
    
    nextBtn.addEventListener('click', function() {
        if (!selectedValue) return;
        
        const currentStep = steps[currentStepIndex];
        
        // Move current step to completed section
        const completedHtml = `
            <div class="wizard-completed-item">
                <p class="wizard-step">${currentStep.number}</p>
                <h2 class="wizard-completed-question">${currentStep.question}</h2>
                <div class="wizard-completed-answer">${selectedValue}</div>
            </div>
        `;
        completedStepsContainer.insertAdjacentHTML('beforeend', completedHtml);

        // Advance to next step
        answers.push(selectedValue);
        currentStepIndex++;
        
        if (currentStepIndex < steps.length) {
            renderStep();
        } else {
            const params = answers.map(function(a, i) {
                return 'q' + (i + 1) + '=' + encodeURIComponent(a);
            }).join('&');
            window.location.replace('/consultation-form/?category=' + encodeURIComponent(category) + '&' + params);
        }
    });
    
    // Initial Render
    renderStep();
});

// Handle bfcache restore: if page is restored from back-forward cache, redirect to consultation home
window.addEventListener('pageshow', function(e) {
    if (e.persisted) {
        window.location.replace('/consultation/');
    }
});
</script>

<?php wp_footer(); ?>
</body>
</html>
