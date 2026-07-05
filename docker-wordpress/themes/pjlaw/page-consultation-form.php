<?php
/**
 * Consultation Form Page — step 3 of the consultation wizard.
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

$category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
if (empty($category)) {
    wp_redirect(home_url('/consultation/'));
    exit;
}

// Category display labels
$category_labels = [
    '민사상담'   => '민사 사건',
    '형사상담'   => '형사 사건',
    '성범죄상담' => '성범죄 사건',
    '가사상담'   => '가사 사건',
    '기타상담'   => '기타 사건',
];
$category_label = isset($category_labels[$category]) ? $category_labels[$category] : $category;

// Pre-selected wizard answers passed as GET params (q1, q2, …)
$wizard_answers = [];
for ($i = 1; $i <= 5; $i++) {
    $wizard_answers[$i] = isset($_GET['q' . $i]) ? sanitize_text_field($_GET['q' . $i]) : '';
}

$icons_url = get_template_directory_uri() . '/assets/icons/consultation-wizard/';
$ajax_url  = admin_url('admin-ajax.php');
$nonce     = wp_create_nonce('pjlaw_consultation_nonce');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo esc_html($category_label); ?> 상담 신청 — <?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('consult-form-page'); ?>>

<!-- Nav bar -->
<nav class="consult-form-nav">
    <div class="consult-form-nav__inner">
        <div class="consult-form-nav__left">
            <a href="/" class="consult-form-nav__logo" aria-label="홈">
                <img src="<?php echo esc_url($icons_url . 'icon-nav-logo.svg'); ?>" alt="" width="20" height="18" aria-hidden="true">
            </a>
            <div class="consult-form-nav__divider"></div>
            <div class="consult-form-nav__breadcrumb">
                <span class="consult-form-nav__breadcrumb-text"><?php echo esc_html($category_label); ?> 상담 신청</span>
            </div>
            <div class="consult-form-nav__divider"></div>
        </div>
        <a href="/consultation/" class="consult-form-nav__close" aria-label="닫기">
            <img src="<?php echo esc_url($icons_url . 'icon-nav-close.svg'); ?>" alt="" width="20" height="20" aria-hidden="true">
        </a>
    </div>
    <!-- Progress underline -->
    <div class="consult-form-nav__progress-track">
        <div class="consult-form-nav__progress-fill"></div>
    </div>
</nav>

<!-- Hero section -->
<section class="consult-form-hero">
    <div class="consult-form-hero__inner">
        <div class="consult-form-hero__label-wrap">
            <p class="consult-form-hero__label">상담신청</p>
            <h1 class="consult-form-hero__title"><?php echo esc_html($category_label); ?> 상담 신청</h1>
        </div>

        <div class="consult-form-steps-row">
            <div class="consult-form-step-card">
                <div class="consult-form-step-card__icon">
                    <img src="<?php echo esc_url($icons_url . 'icon-step1-consult.svg'); ?>" alt="" aria-hidden="true">
                </div>
                <div class="consult-form-step-card__text">
                    <p class="consult-form-step-card__title">상담신청</p>
                    <p class="consult-form-step-card__desc">온라인상담 신청을 통해<br>사건에 대한 간단한 정보를<br>입력합니다.</p>
                </div>
            </div>
            <img src="<?php echo esc_url($icons_url . 'icon-step-arrow.svg'); ?>" alt="" class="consult-form-step-arrow" aria-hidden="true">
            <div class="consult-form-step-card">
                <div class="consult-form-step-card__icon">
                    <img src="<?php echo esc_url($icons_url . 'icon-step2-confirm.svg'); ?>" alt="" aria-hidden="true">
                </div>
                <div class="consult-form-step-card__text">
                    <p class="consult-form-step-card__title">상담접수 확인</p>
                    <p class="consult-form-step-card__desc">사건경위 및<br>인적사항을 확인합니다.</p>
                </div>
            </div>
            <img src="<?php echo esc_url($icons_url . 'icon-step-arrow.svg'); ?>" alt="" class="consult-form-step-arrow" aria-hidden="true">
            <div class="consult-form-step-card">
                <div class="consult-form-step-card__icon">
                    <img src="<?php echo esc_url($icons_url . 'icon-step3-call.svg'); ?>" alt="" aria-hidden="true">
                </div>
                <div class="consult-form-step-card__text">
                    <p class="consult-form-step-card__title">전화 및 방문상담 진행</p>
                    <p class="consult-form-step-card__desc">실무진 또는 변호사와의<br>유선연락 후 전화 또는<br>방문 상담을 진행합니다.</p>
                </div>
            </div>
            <img src="<?php echo esc_url($icons_url . 'icon-step-arrow.svg'); ?>" alt="" class="consult-form-step-arrow" aria-hidden="true">
            <div class="consult-form-step-card">
                <div class="consult-form-step-card__icon">
                    <img src="<?php echo esc_url($icons_url . 'icon-step4-solution.svg'); ?>" alt="" aria-hidden="true">
                </div>
                <div class="consult-form-step-card__text">
                    <p class="consult-form-step-card__title">맞춤형 솔루션</p>
                    <p class="consult-form-step-card__desc">사건별 담당 변호사가<br>개개인별 맞춤 조력을<br>제공합니다.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<main class="consult-form-main">

    <!-- Q&A Summary Card -->
    <div class="consult-form-card consult-form-qa-card">

        <!-- Q1 -->
        <div class="consult-form-qa-row">
            <div class="consult-form-qa-row__header">
                <div class="consult-form-qa-row__left">
                    <img src="<?php echo esc_url($icons_url . 'icon-q1.svg'); ?>" alt="" class="consult-form-qa-row__icon" aria-hidden="true">
                    <div class="consult-form-qa-row__text">
                        <p class="consult-form-qa-row__question">고소나 신고가 이루어졌나요?</p>
                        <span class="consult-form-qa-row__selected"></span>
                    </div>
                </div>
                <img src="<?php echo esc_url($icons_url . 'icon-arrow-down.svg'); ?>" alt="" class="consult-form-qa-row__chevron consult-form-qa-row__chevron--up" aria-hidden="true">
            </div>
            <div class="consult-form-qa-row__options" data-q="1">
                <?php
                $q1_opts = ['네', '아니오', '잘 모르겠습니다.'];
                foreach ($q1_opts as $opt) {
                    $selected = ($wizard_answers[1] === $opt) ? ' consult-form-option-btn--selected' : '';
                    echo '<button class="consult-form-option-btn' . $selected . '" data-value="' . esc_attr($opt) . '">' . esc_html($opt) . '</button>';
                }
                ?>
            </div>
        </div>
        <div class="consult-form-qa-separator"></div>

        <!-- Q2 -->
        <div class="consult-form-qa-row">
            <div class="consult-form-qa-row__header">
                <div class="consult-form-qa-row__left">
                    <img src="<?php echo esc_url($icons_url . 'icon-q2.svg'); ?>" alt="" class="consult-form-qa-row__icon" aria-hidden="true">
                    <div class="consult-form-qa-row__text">
                        <p class="consult-form-qa-row__question">고소나 신고를 하시는 상황인가요, 혹은 이를 당하시는 상황인가요?</p>
                        <span class="consult-form-qa-row__selected"></span>
                    </div>
                </div>
                <img src="<?php echo esc_url($icons_url . 'icon-arrow-down.svg'); ?>" alt="" class="consult-form-qa-row__chevron consult-form-qa-row__chevron--up" aria-hidden="true">
            </div>
            <div class="consult-form-qa-row__options consult-form-qa-row__options--wrap" data-q="2">
                <?php
                $q2_opts = [
                    '고소나 신고를 하는 상황입니다. (원고)',
                    '고소나 신고를 당하는 상황입니다. (피고)',
                    '잘 모르겠습니다.',
                    '쌍방이 서로 하는 상황입니다. (맞고소)',
                ];
                foreach ($q2_opts as $opt) {
                    $selected = ($wizard_answers[2] === $opt) ? ' consult-form-option-btn--selected' : '';
                    echo '<button class="consult-form-option-btn' . $selected . '" data-value="' . esc_attr($opt) . '">' . esc_html($opt) . '</button>';
                }
                ?>
            </div>
        </div>
        <div class="consult-form-qa-separator"></div>

        <!-- Q3 -->
        <div class="consult-form-qa-row">
            <div class="consult-form-qa-row__header">
                <div class="consult-form-qa-row__left">
                    <img src="<?php echo esc_url($icons_url . 'icon-q3.svg'); ?>" alt="" class="consult-form-qa-row__icon" aria-hidden="true">
                    <div class="consult-form-qa-row__text">
                        <p class="consult-form-qa-row__question">상담방식을 선택해 주세요.</p>
                        <span class="consult-form-qa-row__selected"></span>
                    </div>
                </div>
                <img src="<?php echo esc_url($icons_url . 'icon-arrow-down.svg'); ?>" alt="" class="consult-form-qa-row__chevron consult-form-qa-row__chevron--up" aria-hidden="true">
            </div>
            <div class="consult-form-qa-row__options" data-q="3">
                <button class="consult-form-option-btn" data-value="전화상담">전화상담</button>
                <button class="consult-form-option-btn" data-value="방문상담">방문상담</button>
            </div>
        </div>
        <div class="consult-form-qa-separator"></div>

        <!-- Q4 Date picker -->
        <div class="consult-form-qa-row">
            <div class="consult-form-qa-row__header">
                <div class="consult-form-qa-row__left">
                    <img src="<?php echo esc_url($icons_url . 'icon-q4.svg'); ?>" alt="" class="consult-form-qa-row__icon" aria-hidden="true">
                    <div class="consult-form-qa-row__text">
                        <p class="consult-form-qa-row__question">상담일을 선택해 주세요.</p>
                        <span class="consult-form-qa-row__selected"></span>
                    </div>
                </div>
                <img src="<?php echo esc_url($icons_url . 'icon-arrow-down.svg'); ?>" alt="" class="consult-form-qa-row__chevron consult-form-qa-row__chevron--up" aria-hidden="true">
            </div>
            <div class="consult-form-qa-row__options consult-form-date-scroll" id="consult-date-scroll">
                <!-- Generated by JS -->
            </div>
        </div>
        <div class="consult-form-qa-separator"></div>

        <!-- Q5 Time picker -->
        <div class="consult-form-qa-row consult-form-qa-row--no-border">
            <div class="consult-form-qa-row__header">
                <div class="consult-form-qa-row__left">
                    <img src="<?php echo esc_url($icons_url . 'icon-q5.svg'); ?>" alt="" class="consult-form-qa-row__icon" aria-hidden="true">
                    <div class="consult-form-qa-row__text">
                        <p class="consult-form-qa-row__question">시간을 선택해 주세요.</p>
                        <span class="consult-form-qa-row__selected"></span>
                    </div>
                </div>
                <img src="<?php echo esc_url($icons_url . 'icon-arrow-down.svg'); ?>" alt="" class="consult-form-qa-row__chevron consult-form-qa-row__chevron--up" aria-hidden="true">
            </div>
            <div class="consult-form-qa-row__options consult-form-qa-row__options--time">
                <div class="consult-form-time-section">
                    <p class="consult-form-time-label">오전</p>
                    <div class="consult-form-time-grid" id="consult-time-am">
                        <?php
                        $am_slots = ['08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30'];
                        foreach ($am_slots as $t) {
                            echo '<button class="consult-form-time-btn" data-time="' . esc_attr($t) . ' AM">' . esc_html($t) . '</button>';
                        }
                        ?>
                    </div>
                </div>
                <div class="consult-form-time-section">
                    <p class="consult-form-time-label">오후</p>
                    <div class="consult-form-time-grid" id="consult-time-pm">
                        <?php
                        $pm_slots = ['12:00','12:30','01:00','01:30','02:00','02:30','03:00','03:30','04:00','04:30','05:00','05:30','06:00','06:30','07:00','07:30','08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30'];
                        foreach ($pm_slots as $t) {
                            echo '<button class="consult-form-time-btn" data-time="' . esc_attr($t) . ' PM">' . esc_html($t) . '</button>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact info form card -->
    <div class="consult-form-info-section">
        <p class="consult-form-section-title">상담신청 정보</p>
        <div class="consult-form-card consult-form-info-card">
            <!-- Row: 이름 + 연락처 -->
            <div class="consult-form-info-row">
                <div class="consult-form-info-row__inner">
                    <div class="consult-form-field">
                        <div class="consult-form-field__label">
                            <label for="cf-name">이름</label>
                            <img src="<?php echo esc_url($icons_url . 'icon-required-dot.svg'); ?>" alt="필수" class="consult-form-field__dot" aria-hidden="true">
                        </div>
                        <input type="text" id="cf-name" name="name" class="consult-form-input" placeholder="이름을 입력해 주세요." required>
                    </div>
                    <div class="consult-form-field">
                        <div class="consult-form-field__label">
                            <label for="cf-phone">연락처</label>
                            <img src="<?php echo esc_url($icons_url . 'icon-required-dot.svg'); ?>" alt="필수" class="consult-form-field__dot" aria-hidden="true">
                        </div>
                        <input type="tel" id="cf-phone" name="phone" class="consult-form-input" placeholder="통화 가능한 연락처를 입력해 주세요." required>
                    </div>
                </div>
            </div>
            <div class="consult-form-info-separator"></div>

            <!-- 의뢰인 -->
            <div class="consult-form-info-row">
                <div class="consult-form-field consult-form-field--full">
                    <div class="consult-form-field__label">
                        <label for="cf-client">의뢰인</label>
                        <img src="<?php echo esc_url($icons_url . 'icon-required-dot.svg'); ?>" alt="필수" class="consult-form-field__dot" aria-hidden="true">
                    </div>
                    <input type="text" id="cf-client" name="client" class="consult-form-input consult-form-input--full" placeholder="나이, 지역, 직업 등 사건 이해에 필요한 정보와 법인의 경우, 법인명 및 업종을 입력해 주세요." required>
                </div>
            </div>
            <div class="consult-form-info-separator"></div>

            <!-- 상대방 -->
            <div class="consult-form-info-row">
                <div class="consult-form-field consult-form-field--full">
                    <div class="consult-form-field__label">
                        <label for="cf-opponent">상대방</label>
                        <img src="<?php echo esc_url($icons_url . 'icon-required-dot.svg'); ?>" alt="필수" class="consult-form-field__dot" aria-hidden="true">
                    </div>
                    <input type="text" id="cf-opponent" name="opponent" class="consult-form-input consult-form-input--full" placeholder="나이, 지역, 직업 등 사건 이해에 필요한 정보와 법인의 경우, 법인명 및 업종을 입력해 주세요." required>
                </div>
            </div>
            <div class="consult-form-info-separator"></div>

            <!-- 사건 -->
            <div class="consult-form-info-row">
                <div class="consult-form-field consult-form-field--full">
                    <div class="consult-form-field__label">
                        <label for="cf-case">사건</label>
                        <img src="<?php echo esc_url($icons_url . 'icon-required-dot.svg'); ?>" alt="필수" class="consult-form-field__dot" aria-hidden="true">
                    </div>
                    <input type="text" id="cf-case" name="case_desc" class="consult-form-input consult-form-input--full" placeholder="누가, 언제, 어디서, 무엇을, 어떻게, 왜 한 사건인지를 입력해 주세요." required>
                </div>
            </div>
            <div class="consult-form-info-separator"></div>

            <!-- 목표 -->
            <div class="consult-form-info-row">
                <div class="consult-form-field consult-form-field--full">
                    <div class="consult-form-field__label">
                        <label for="cf-goal">목표</label>
                        <img src="<?php echo esc_url($icons_url . 'icon-required-dot.svg'); ?>" alt="필수" class="consult-form-field__dot" aria-hidden="true">
                    </div>
                    <input type="text" id="cf-goal" name="goal" class="consult-form-input consult-form-input--full" placeholder="언제까지 어떤 결과를 얻고자 하시는지를 입력해 주세요." required>
                </div>
            </div>
            <div class="consult-form-info-separator"></div>

            <!-- 사건번호 -->
            <div class="consult-form-info-row">
                <div class="consult-form-field consult-form-field--full">
                    <div class="consult-form-field__label">
                        <label for="cf-case-no">사건번호</label>
                        <img src="<?php echo esc_url($icons_url . 'icon-required-dot.svg'); ?>" alt="필수" class="consult-form-field__dot" aria-hidden="true">
                    </div>
                    <input type="text" id="cf-case-no" name="case_number" class="consult-form-input consult-form-input--full" placeholder="이미 소송이 제기되었다면, ① 관할법원, ② 사건번호를 입력해 주세요.">
                </div>
            </div>
            <div class="consult-form-info-separator"></div>

            <!-- 세부사항 -->
            <div class="consult-form-info-row consult-form-info-row--last">
                <div class="consult-form-field consult-form-field--full">
                    <div class="consult-form-field__label">
                        <label for="cf-details">세부사항</label>
                        <img src="<?php echo esc_url($icons_url . 'icon-required-dot.svg'); ?>" alt="필수" class="consult-form-field__dot" aria-hidden="true">
                    </div>
                    <textarea id="cf-details" name="details" class="consult-form-textarea" placeholder="기타 전달하고 싶으신 자세한 내용을 입력해 주세요."></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms card -->
    <div class="consult-form-terms-section">
        <p class="consult-form-section-title">약관동의</p>
        <div class="consult-form-card consult-form-terms-card">
            <div class="consult-form-terms-header" id="consult-terms-toggle">
                <div class="consult-form-terms-header__left">
                    <div class="consult-form-terms-header__checkbox" id="consult-terms-check" role="checkbox" aria-checked="false" tabindex="0"></div>
                    <span class="consult-form-terms-header__label">개인정보 수집동의</span>
                </div>
                <img src="<?php echo esc_url($icons_url . 'icon-arrow-down.svg'); ?>" alt="" class="consult-form-qa-row__chevron" id="consult-terms-chevron" aria-hidden="true">
            </div>
            <div class="consult-form-terms-separator"></div>
            <div class="consult-form-terms-body" id="consult-terms-body">
                <p class="consult-form-terms-body__heading">개인정보 수집 및 이용 제공 동의 (필수)</p>
                <div class="consult-form-terms-body__block">
                    <p class="consult-form-terms-body__subtitle">1. 개인정보 수집항목</p>
                    <p class="consult-form-terms-body__text">필수 항목 : 이름, 이메일, 회사명 문의하기를 통해 입력한 내용<br>선택 항목 : 성별, 연락처 직급<br>자동으로 수집될 수 있는 정보 (부적절한 접근 시) : IP, 접속 시간, 쿠키, 브라우저 종류 및 OS</p>
                </div>
                <div class="consult-form-terms-body__block">
                    <p class="consult-form-terms-body__subtitle">2. 개인정보 수집방법</p>
                    <p class="consult-form-terms-body__text">법률사무소 평정 홈페이지 문의하기 일반 문의 메뉴<br>선택항목을 입력하지 않은 경우에도 서비스 이용 제한은 없습니다.</p>
                </div>
                <div class="consult-form-terms-body__block">
                    <p class="consult-form-terms-body__subtitle">3. 개인정보 수집목적</p>
                    <p class="consult-form-terms-body__text">법률사무소 평정은 사용자 식별, 사업문의 접수 및 처리를 위한 서비스 제공을 목적으로 개인정보를 활용합니다.<br>사업, IR, 마케팅, 채용 문의 응대를 위한 정보를 수집합니다.<br>이용자가 제공한 모든 정보는 목적에 필요한 용도 이외로는 사용되지 않으며 이용 목적이 변경될 시에는 사전 동의를 구할 것입니다.</p>
                </div>
                <div class="consult-form-terms-body__block">
                    <p class="consult-form-terms-body__subtitle">4. 개인정보의 보유 및 이용기간</p>
                    <p class="consult-form-terms-body__text">법률사무소 평정은 원칙적으로 개인정보의 수집목적 또는 제공받은 목적이 달성된 때에는 귀하의 개인정보를 지체 없이 파기합니다. 다만 발송내역의 자료를 확인하기 위해 3년간 보유합니다. 다른 법령에 따라 보존하여야 하는 경우에는 보유 및 이용기간이 경과한 개인정보를 파기하지 아니하고 보유할 수 있습니다.</p>
                </div>
                <div class="consult-form-terms-body__block">
                    <p class="consult-form-terms-body__subtitle">5. 동의를 거부할 권리 및 동의 거부에 따른 불이익</p>
                    <p class="consult-form-terms-body__text">이용자는 개인정보의 수집, 이용 등과 관련한 위 사항에 대하여 원하지 않는 경우 동의를 거부할 수 있습니다. 다만, 동의하지 않을 경우 서비스 이용이 제한될 수 있습니다.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit -->
    <button class="consult-form-submit" id="consult-submit" type="button">문의하기</button>

</main>

<input type="hidden" id="consult-nonce" value="<?php echo esc_attr($nonce); ?>">
<input type="hidden" id="consult-ajax-url" value="<?php echo esc_url($ajax_url); ?>">
<input type="hidden" id="consult-category" value="<?php echo esc_attr($category); ?>">

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ---------- Date picker ---------- */
    var dateScroll = document.getElementById('consult-date-scroll');
    var dayNames = ['일', '월', '화', '수', '목', '금', '토'];
    var today = new Date();
    today.setHours(0, 0, 0, 0);
    var selectedDate = null;

    for (var i = 0; i < 12; i++) {
        var d = new Date(today);
        d.setDate(today.getDate() + i);

        var dayOfWeek = d.getDay();
        var isWeekend = false; // firm operates every day — all dates selectable
        var isToday = i === 0;

        var cell = document.createElement('div');
        cell.className = 'consult-form-date-cell' + (isWeekend ? ' consult-form-date-cell--disabled' : '');

        var numDiv = document.createElement('div');
        numDiv.className = 'consult-form-date-cell__num' + (isWeekend ? ' consult-form-date-cell__num--disabled' : '');
        numDiv.textContent = d.getDate();

        var label = document.createElement('p');
        label.className = 'consult-form-date-cell__day' + (isWeekend ? ' consult-form-date-cell__day--disabled' : '') + (isToday ? ' consult-form-date-cell__day--today' : '');
        label.textContent = isToday ? '오늘' : dayNames[dayOfWeek];

        cell.appendChild(numDiv);
        cell.appendChild(label);

        if (!isWeekend) {
            (function(date, cellEl, numEl) {
                cellEl.style.cursor = 'pointer';
                cellEl.addEventListener('click', function() {
                    document.querySelectorAll('.consult-form-date-cell__num--selected').forEach(function(el) {
                        el.classList.remove('consult-form-date-cell__num--selected');
                    });
                    numEl.classList.add('consult-form-date-cell__num--selected');
                    var year = date.getFullYear();
                    var month = String(date.getMonth() + 1).padStart(2, '0');
                    var day = String(date.getDate()).padStart(2, '0');
                    selectedDate = year + '-' + month + '-' + day;
                });
            })(d, cell, numDiv);
        }

        dateScroll.appendChild(cell);
    }

    /* ---------- Option buttons (Q1–Q3) ---------- */
    document.querySelectorAll('.consult-form-qa-row__options[data-q]').forEach(function(group) {
        group.querySelectorAll('.consult-form-option-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                group.querySelectorAll('.consult-form-option-btn').forEach(function(b) {
                    b.classList.remove('consult-form-option-btn--selected');
                });
                btn.classList.add('consult-form-option-btn--selected');
            });
        });
    });

    /* ---------- Time buttons ---------- */
    document.querySelectorAll('.consult-form-time-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.consult-form-time-btn').forEach(function(b) {
                b.classList.remove('consult-form-time-btn--selected');
            });
            btn.classList.add('consult-form-time-btn--selected');
        });
    });

    /* ---------- Q1-Q5 accordion toggle ---------- */
    function getRowSelectedText(row) {
        var btn = row.querySelector('.consult-form-option-btn--selected');
        if (btn) return btn.getAttribute('data-value');

        if (selectedDate && row.querySelector('.consult-form-date-cell__num--selected')) {
            var d = new Date(selectedDate + 'T00:00:00');
            var dn = ['일', '월', '화', '수', '목', '금', '토'];
            return (d.getMonth() + 1) + '월 ' + d.getDate() + '일 (' + dn[d.getDay()] + ')';
        }

        var timeBtn = row.querySelector('.consult-form-time-btn--selected');
        if (timeBtn) return timeBtn.getAttribute('data-time');

        return '';
    }

    document.querySelectorAll('.consult-form-qa-row__header').forEach(function(header) {
        header.addEventListener('click', function() {
            var row = header.closest('.consult-form-qa-row');
            var options = row.querySelector('.consult-form-qa-row__options');
            var chevron = header.querySelector('.consult-form-qa-row__chevron');
            var isCollapsing = !options.classList.contains('consult-form-qa-row__options--hidden');

            options.classList.toggle('consult-form-qa-row__options--hidden');
            chevron.classList.toggle('consult-form-qa-row__chevron--up');

            var selectedEl = row.querySelector('.consult-form-qa-row__selected');
            if (selectedEl) {
                if (isCollapsing) {
                    var text = getRowSelectedText(row);
                    selectedEl.textContent = text;
                    selectedEl.classList.toggle('consult-form-qa-row__selected--visible', !!text);
                } else {
                    selectedEl.classList.remove('consult-form-qa-row__selected--visible');
                }
            }
        });
    });

    /* ---------- Terms toggle ---------- */
    var termsToggle = document.getElementById('consult-terms-toggle');
    var termsBody = document.getElementById('consult-terms-body');
    var termsChevron = document.getElementById('consult-terms-chevron');
    var termsCheck = document.getElementById('consult-terms-check');
    var termsAgreed = false;
    var termsExpanded = false;

    // Accordion: toggled by clicking the header row (excluding the checkbox)
    termsToggle.addEventListener('click', function() {
        termsExpanded = !termsExpanded;
        termsBody.classList.toggle('consult-form-terms-body--visible', termsExpanded);
        termsChevron.classList.toggle('consult-form-qa-row__chevron--up', termsExpanded);
    });

    // Agreement: toggled only by clicking the checkbox div
    termsCheck.addEventListener('click', function(e) {
        e.stopPropagation(); // prevent accordion from firing
        termsAgreed = !termsAgreed;
        termsCheck.classList.toggle('consult-form-terms-header__checkbox--checked', termsAgreed);
        termsCheck.setAttribute('aria-checked', String(termsAgreed));
    });

    /* ---------- Submit ---------- */
    document.getElementById('consult-submit').addEventListener('click', function() {
        var name = document.getElementById('cf-name').value.trim();
        var phone = document.getElementById('cf-phone').value.trim();
        var client = document.getElementById('cf-client').value.trim();
        var opponent = document.getElementById('cf-opponent').value.trim();
        var caseDesc = document.getElementById('cf-case').value.trim();
        var goal = document.getElementById('cf-goal').value.trim();
        var caseNo = document.getElementById('cf-case-no').value.trim();
        var details = document.getElementById('cf-details').value.trim();
        var category = document.getElementById('consult-category').value;
        var nonce = document.getElementById('consult-nonce').value;
        var ajaxUrl = document.getElementById('consult-ajax-url').value;

        // Selected wizard answers (Q1/Q2 pre-filled from URL, Q3 = 상담방식)
        function selectedOptValue(q) {
            var group = document.querySelector('.consult-form-qa-row__options[data-q="' + q + '"]');
            if (!group) return '';
            var sel = group.querySelector('.consult-form-option-btn--selected');
            return sel ? sel.getAttribute('data-value') : '';
        }
        var q1Answer = selectedOptValue('1');
        var q2Answer = selectedOptValue('2');
        var method = selectedOptValue('3');

        var selectedTime = '';
        var timeBtn = document.querySelector('.consult-form-time-btn--selected');
        if (timeBtn) selectedTime = timeBtn.getAttribute('data-time');

        if (!termsAgreed) {
            alert('개인정보 수집동의에 동의해 주세요.');
            return;
        }

        if (!name || !phone || !client || !caseDesc) {
            alert('이름, 연락처, 의뢰인, 사건 항목은 필수 입력사항입니다.');
            return;
        }

        var subject = '[' + category + '] ' + (selectedDate || '') + ' ' + selectedTime;

        var data = new FormData();
        data.append('action', 'pjlaw_consultation');
        data.append('nonce', nonce);
        data.append('consultation_name', name);
        data.append('consultation_phone', phone);
        data.append('consultation_subject', subject);
        data.append('consultation_client', client);
        data.append('consultation_opponent', opponent);
        data.append('consultation_case', caseDesc);
        data.append('consultation_goal', goal);
        data.append('consultation_case_number', caseNo);
        data.append('consultation_details', details);
        data.append('consultation_date', selectedDate || '');
        data.append('consultation_time', selectedTime);
        data.append('consultation_category', category);
        data.append('consultation_method', method);
        data.append('consultation_q1', q1Answer);
        data.append('consultation_q2', q2Answer);

        fetch(ajaxUrl, { method: 'POST', body: data })
            .then(function(r) { return r.json(); })
            .then(function(res) {
                if (res.success) {
                    alert('상담신청이 완료되었습니다. 빠른 시일 내에 연락드리겠습니다.');
                    window.location.href = '/consultation/';
                } else {
                    alert('오류가 발생했습니다. 다시 시도해 주세요.');
                }
            })
            .catch(function() {
                alert('오류가 발생했습니다. 다시 시도해 주세요.');
            });
    });
});
</script>

<?php wp_footer(); ?>
</body>
</html>
