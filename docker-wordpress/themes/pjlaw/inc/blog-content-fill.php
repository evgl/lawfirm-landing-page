<?php
/**
 * One-shot WP-CLI script: fills post_content, meta fields, and categories for 10 blog posts.
 * Run with: wp --allow-root eval-file wp-content/themes/pjlaw/inc/blog-content-fill.php
 */

$theme_uri = get_template_directory_uri();

$posts_data = [
    [
        'title' => '졸피뎀 처벌 수위 및 사례, 대응 방법',
        'category' => '대응전략',
        'intro_subtitle' => '수사단계부터 재판까지 정확한 법리 대응',
        'intro_text' => '졸피뎀은 수면제로 알려져 있지만, 남용 시 중독성이 있어 마약류로 규제받는 약물입니다. 본 글에서는 졸피뎀 투약 및 소지로 인한 처벌 수위, 실제 사례, 그리고 효과적인 대응 방법을 정리하겠습니다.',
        'content' => function() {
            global $theme_uri;
            ob_start();
            ?>
<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">1</span>
        <h2 class="blog-post__chapter-title">졸피뎀(Zolpidem)이란?</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">졸피뎀의 정의와 용도</h3>
        </div>
        <p class="blog-post__text">졸피뎀은 수면 유도제로 분류되는 약물로, 일반적으로 불면증 치료에 사용됩니다. 하지만 장기 복용 시 중독성과 남용 가능성이 높아, 마약류관리에관한법률에 의해 향정신성의약품으로 규제받고 있습니다.</p>
        <div class="blog-post__law-box">
            <div class="blog-post__law-title">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                마약류관리에관한법률 제2조
            </div>
            <p class="blog-post__law-text">향정신성의약품으로 분류되는 졸피뎀의 무단 소지, 투약, 유통은 형법상 마약류 범죄로 처벌받습니다.</p>
        </div>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">2</span>
            <h3 class="blog-post__section-title">처벌 대상 행위</h3>
        </div>
        <p class="blog-post__text mb-4">다음의 행위는 모두 마약류 범죄에 해당합니다:</p>
        <ul class="blog-post__list">
            <li>의사 처방 없이 졸피뎀 투약</li>
            <li>처방받은 양 이상의 무단 소지</li>
            <li>타인에게 양도 또는 유통</li>
            <li>수입, 밀수 행위</li>
        </ul>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">2</span>
        <h2 class="blog-post__chapter-title">졸피뎀 처벌 수위</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">법정형과 양형기준</h3>
        </div>
        <p class="blog-post__text mb-4">마약류관리에관한법률에 따른 졸피뎀 관련 처벌:</p>
        <div class="blog-post__law-box no-icon">
            <p class="blog-post__law-title mb-2">마약류관리에관한법률 제60조</p>
            <p class="blog-post__law-text">향정신성의약품을 투약한 자는 10년 이하의 징역 또는 1억원 이하의 벌금에 처한다.</p>
        </div>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>행위</th><th>법정형</th><th>실제 양형</th></tr></thead>
                <tbody>
                    <tr><td>투약 (단순)</td><td>10년 이하 징역</td><td>1년 ~ 3년</td></tr>
                    <tr><td>소지 (소량)</td><td>10년 이하 징역</td><td>6월 ~ 1년 6월</td></tr>
                    <tr><td>양도 (대량)</td><td>15년 이하 징역</td><td>3년 ~ 7년</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">3</span>
        <h2 class="blog-post__chapter-title">실제 판례와 사례</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">일반적인 판례</h3>
        </div>
        <p class="blog-post__text">법원은 피고인의 약물 사용 경력, 소지 기간, 양, 투약 목적(자신의 사용 vs 유통)을 종합적으로 고려하여 형을 결정합니다. 처음 적발된 경우 집행유예가 인정될 수 있으나, 전력이 있으면 실형이 선고될 가능성이 높습니다.</p>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">4</span>
        <h2 class="blog-post__chapter-title">효과적인 대응 방법</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">수사단계 대응</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>자술 가능성 검토: 자신이 발견하기 전에 고소되지 않았다면 자수할 수 있습니다.</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>의료용도 증명: 정당한 처방이 있었는지 확인하고 자료 수집</p></div>
        </div>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">2</span>
            <h3 class="blog-post__section-title">재판단계 대응</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>정신건강의학과 진단: 불면증 등의 질환 증명으로 정상참작 요청</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>재범 위험성 낮음: 향후 약물 치료 계획 제시</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>사회적 지위와 가족상황: 집행유예 기초 마련</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__conclusion">
    <h3 class="blog-post__conclusion-title">서울마약전문변호사 | 법률사무소 평정이 돕겠습니다</h3>
    <ul class="blog-post__list blog-post__list--white mb-4">
        <li>졸피뎀은 의료용 약물이지만 마약류 규제를 받는 약물이므로 처벌이 엄격합니다.</li>
        <li>수사 초기단계에서의 적절한 법적 대응이 향후 형량을 좌우합니다.</li>
        <li>정신건강의학과 전문의 진단과 약물 치료 계획으로 형을 감경받을 수 있습니다.</li>
    </ul>
    <p class="blog-post__conclusion-text">법률사무소 평정은 약물 관련 사건에서 의료적 필요성과 법적 책임의 균형을 찾아, 합리적인 결론으로 이끌어냅니다.</p>
</div>
            <?php
            return ob_get_clean();
        },
        'faq' => [
            ['question' => '처방받은 약을 정해진 양 이상으로 복용하면 처벌받나요?'],
            ['question' => '의사 처방이 있으면 안전한가요?'],
            ['question' => '첫 적발 시 집행유예를 받을 수 있나요?'],
        ]
    ],
    [
        'title' => '무면허사고 처벌 수위와 보험처리 및 대응 방법',
        'category' => '대응전략',
        'intro_subtitle' => '무면허운전 교통사고 책임과 처벌 완벽 정리',
        'intro_text' => '면허증 없이 또는 면허정지 기간에 운전하다가 사고를 낸 경우, 일반 교통사고보다 훨씬 심각한 형사 처벌과 민사 책임을 질 수 있습니다. 본 글에서는 무면허사고의 처벌 수위, 보험 처리, 그리고 대응 방법을 정리하겠습니다.',
        'content' => function() {
            global $theme_uri;
            ob_start();
            ?>
<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">1</span>
        <h2 class="blog-post__chapter-title">무면허운전의 정의</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">무면허운전의 범위</h3>
        </div>
        <p class="blog-post__text">무면허운전이란 운전면허증을 취득하지 않았거나, 면허가 취소·정지되어 운전할 자격이 없는 자가 자동차를 운전하는 행위입니다. 면허정지 기간 중의 운전도 무면허운전에 해당합니다.</p>
        <div class="blog-post__law-box">
            <div class="blog-post__law-title">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                도로교통법 제43조
            </div>
            <p class="blog-post__law-text">운전면허를 받지 아니하거나 운전면허가 취소·정지된 자는 자동차를 운전할 수 없으며, 이를 위반한 자는 2년 이하의 징역 또는 1천만원 이하의 벌금에 처한다.</p>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">2</span>
        <h2 class="blog-post__chapter-title">무면허사고의 처벌 수위</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">형사 처벌</h3>
        </div>
        <p class="blog-post__text mb-4">무면허운전으로 인한 교통사고 시:</p>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>죄명</th><th>법정형</th><th>일반 실형</th></tr></thead>
                <tbody>
                    <tr><td>무면허운전죄</td><td>2년 이하 징역</td><td>6개월 ~ 1년</td></tr>
                    <tr><td>교통사고(상해)</td><td>5년 이하 징역</td><td>1년 6개월 ~ 3년</td></tr>
                    <tr><td>교통사고(중상해)</td><td>1년 이상 15년 이하</td><td>3년 ~ 7년</td></tr>
                    <tr><td>교통사고(사망)</td><td>5년 이상 15년 이하</td><td>7년 ~ 10년</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">2</span>
            <h3 class="blog-post__section-title">보험 문제</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>자동차보험은 무면허운전 시 보상을 거절할 수 있습니다.</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>피해자는 보험 대신 가해자에게 직접 손해배상을 청구해야 합니다.</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">3</span>
        <h2 class="blog-post__chapter-title">보험 처리 및 민사책임</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">보험 거절 대응</h3>
        </div>
        <p class="blog-post__text">보험사가 보상을 거절한 경우, 이의제기를 통해 부분 보상(예: 피해자 신체보험만)을 받을 수 있는지 검토해야 합니다.</p>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">4</span>
        <h2 class="blog-post__chapter-title">효과적인 대응 방법</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">수사 및 재판 대응</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>피해자와 합의: 가장 중요한 감경 사유</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>면허 재취득 의지: 향후 운전면허 취득 계획 제시</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>성실한 태도: 법정 출석 및 반성의 자세</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__conclusion">
    <h3 class="blog-post__conclusion-title">서울교통사고전문변호사 | 법률사무소 평정이 돕겠습니다</h3>
    <ul class="blog-post__list blog-post__list--white mb-4">
        <li>무면허운전 사고는 일반 교통사고보다 처벌이 매우 엄격합니다.</li>
        <li>형사 처벌과 보험 거절로 인한 막대한 민사책임이 발생합니다.</li>
        <li>초기 대응과 피해자 합의가 형량 감경의 핵심입니다.</li>
    </ul>
    <p class="blog-post__conclusion-text">법률사무소 평정은 무면허운전 사고 피의자의 형사 방어와 민사 손해배상 범위를 동시에 관리하여, 최소한의 손실로 사건을 마무리하도록 돕습니다.</p>
</div>
            <?php
            return ob_get_clean();
        },
        'faq' => [
            ['question' => '무면허운전 사고 시 보험이 안 나오면 어떻게 하나요?'],
            ['question' => '피해자와 합의하면 형사처벌이 없어지나요?'],
            ['question' => '면허정지 중에 몰래 운전해도 무면허인가요?'],
        ]
    ],
    [
        'title' => '특정경제범죄(특경법) 뜻, 가중 처벌 기준',
        'category' => '법률정보',
        'intro_subtitle' => '경제범죄의 엄격한 처벌 기준 완벽 정리',
        'intro_text' => '특정경제범죄의처벌등에관한법률(특경법)은 횡령, 배임, 사기 등의 경제범죄를 특별히 엄격하게 처벌하기 위해 제정되었습니다. 본 글에서는 특경법의 정의, 적용 범위, 그리고 처벌 기준을 정리하겠습니다.',
        'content' => function() {
            global $theme_uri;
            ob_start();
            ?>
<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">1</span>
        <h2 class="blog-post__chapter-title">특정경제범죄법(특경법)이란?</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">특경법의 정의와 취지</h3>
        </div>
        <p class="blog-post__text">특정경제범죄의처벌등에관한법률은 횡령, 배임, 사기, 강요 등의 경제범죄를 특별히 엄격하게 처벌하기 위한 법률입니다. 일반 형법의 규정보다 훨씬 무거운 형을 규정하고 있습니다.</p>
        <div class="blog-post__law-box">
            <div class="blog-post__law-title">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                특정경제범죄의처벌등에관한법률
            </div>
            <p class="blog-post__law-text">경제 사회에 미치는 해악이 크거나 국민경제에 심각한 폐해를 끼치는 경제범죄를 엄격하게 처벌한다.</p>
        </div>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">2</span>
            <h3 class="blog-post__section-title">적용 대상 범죄</h3>
        </div>
        <ul class="blog-post__list">
            <li>횡령죄 (형법 355조)</li>
            <li>배임죄 (형법 355조)</li>
            <li>사기죄 (형법 347조)</li>
            <li>강요죄 (형법 324조)</li>
            <li>부정경쟁행위</li>
        </ul>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">2</span>
        <h2 class="blog-post__chapter-title">특경법에 따른 가중 처벌</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">형법 vs 특경법 비교</h3>
        </div>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>범죄</th><th>형법</th><th>특경법</th></tr></thead>
                <tbody>
                    <tr><td>횡령</td><td>10년 이하</td><td>10년 이상 20년 이하</td></tr>
                    <tr><td>배임</td><td>10년 이하</td><td>10년 이상 20년 이하</td></tr>
                    <tr><td>사기</td><td>10년 이하</td><td>무기징역 또는 5년 이상</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">3</span>
        <h2 class="blog-post__chapter-title">특경법 적용의 가중 요건</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">적용 조건</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>횡령·배임: 금액이 특정 기준 이상 (일반적으로 5억원 이상)</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>상습적 범행: 반복적으로 경제범죄를 저지른 경우</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>사회적 파급력: 금융기관, 공공기관 관련 범죄</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">4</span>
        <h2 class="blog-post__chapter-title">특경법 사건의 대응 방법</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">초기 대응 전략</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>자수와 자백: 형량 감경의 가장 중요한 요소</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>피해 복구: 횡령·배임 금액의 전액 변제</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>피해자 합의: 고소 취소 또는 감경 의사</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__conclusion">
    <h3 class="blog-post__conclusion-title">서울경제범죄전문변호사 | 법률사무소 평정이 돕겠습니다</h3>
    <ul class="blog-post__list blog-post__list--white mb-4">
        <li>특경법은 일반 형법보다 훨씬 엄격한 처벌을 규정합니다.</li>
        <li>금액 규모, 상습성, 사회적 파급력이 특경법 적용의 핵심입니다.</li>
        <li>초기 단계에서의 자수와 피해 복구가 형량 감경의 결정적 요소입니다.</li>
    </ul>
    <p class="blog-post__conclusion-text">법률사무소 평정은 특경법 적용이 가능한 경제범죄에서, 빠른 자수와 피해 복구를 통해 형량을 최소화하도록 도와드립니다.</p>
</div>
            <?php
            return ob_get_clean();
        },
        'faq' => [
            ['question' => '특경법은 언제 적용되나요?'],
            ['question' => '형법상 횡령과 특경법상 횡령의 차이는?'],
            ['question' => '특경법 사건에서 집행유예를 받을 수 있나요?'],
        ]
    ],
    [
        'title' => '음주운전 처벌 기준과 면허 취소 대응 방법',
        'category' => '대응전략',
        'intro_subtitle' => '음주운전 처벌과 면허 정지·취소 완벽 대응 가이드',
        'intro_text' => '음주운전은 자신뿐 아니라 타인의 생명을 위협하는 범죄로, 매년 강화되고 있는 처벌 기준을 따릅니다. 본 글에서는 음주운전의 처벌 수위, 면허 취소 기준, 그리고 효과적인 대응 방법을 정리하겠습니다.',
        'content' => function() {
            global $theme_uri;
            ob_start();
            ?>
<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">1</span>
        <h2 class="blog-post__chapter-title">음주운전의 정의와 기준</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">음주운전 판단 기준</h3>
        </div>
        <p class="blog-post__text">음주운전은 혈중알코올농도(BAC)로 판단됩니다. 도로교통법상 기준은 다음과 같습니다.</p>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>혈중알코올농도</th><th>법적 분류</th><th>처벌</th></tr></thead>
                <tbody>
                    <tr><td>0.03% ~ 0.08% 미만</td><td>음주운전</td><td>벌금 100만원 ~ 면허정지</td></tr>
                    <tr><td>0.08% 이상</td><td>음주운전 (중)</td><td>징역 또는 벌금 + 면허취소</td></tr>
                </tbody>
            </table>
        </div>
        <div class="blog-post__law-box">
            <div class="blog-post__law-title">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                도로교통법 제44조
            </div>
            <p class="blog-post__law-text">혈중알코올농도가 0.03% 이상인 상태에서 자동차를 운전하면 음주운전으로 처벌된다.</p>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">2</span>
        <h2 class="blog-post__chapter-title">음주운전 처벌 기준</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">형사 처벌</h3>
        </div>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>혈중알코올농도</th><th>법정형</th><th>일반 판례</th></tr></thead>
                <tbody>
                    <tr><td>0.03% ~ 0.08%</td><td>벌금 1천만원 이하</td><td>벌금 300만 ~ 500만원</td></tr>
                    <tr><td>0.08% 이상</td><td>1년 이하 징역 / 천만원 이하 벌금</td><td>징역 4개월 ~ 10개월</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">2</span>
            <h3 class="blog-post__section-title">면허 처분</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>0.03% ~ 0.08% 미만: 면허정지 100일</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>0.08% 이상: 면허취소 (1년 이상 재취득 불가)</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">3</span>
        <h2 class="blog-post__chapter-title">음주운전 사고 시 추가 처벌</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">특정범죄 가중처벌법</h3>
        </div>
        <p class="blog-post__text">음주운전으로 인한 사고는 특정범죄가중처벌법이 적용되어, 일반 교통사고보다 훨씬 무거운 형을 받습니다.</p>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>사건 유형</th><th>법정형</th></tr></thead>
                <tbody>
                    <tr><td>음주 상해사고</td><td>1년 이상 15년 이하 징역</td></tr>
                    <tr><td>음주 사망사고</td><td>3년 이상 15년 이하 징역</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">4</span>
        <h2 class="blog-post__chapter-title">면허 취소 대응 방법</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">면허 취소 행정소송</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>호흡측정기 신뢰성 문제: 측정 절차 위반 검토</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>음주 상태 부인: 혈액검사 결과와의 불일치</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>운전능력 판단: 실제 운전 능력 입증</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__conclusion">
    <h3 class="blog-post__conclusion-title">서울음주운전전문변호사 | 법률사무소 평정이 돕겠습니다</h3>
    <ul class="blog-post__list blog-post__list--white mb-4">
        <li>음주운전은 형사 처벌과 행정처분(면허취소)이 동시에 진행됩니다.</li>
        <li>사고가 발생하면 특정범죄 가중처벌법으로 10년 이상 징역이 가능합니다.</li>
        <li>호흡측정 결과의 신뢰성 문제로 면허 취소를 다툴 수 있습니다.</li>
    </ul>
    <p class="blog-post__conclusion-text">법률사무소 평정은 음주운전 적발 초기부터 형사방어와 행정소송을 병행하여, 면허 재취득과 형량 감경을 동시에 추진합니다.</p>
</div>
            <?php
            return ob_get_clean();
        },
        'faq' => [
            ['question' => '음주측정기 결과가 틀릴 수 있나요?'],
            ['question' => '면허 취소를 취소할 수 있나요?'],
            ['question' => '음주운전으로 사람을 다치게 하면 최대 몇 년인가요?'],
        ]
    ],
    [
        'title' => '강제추행죄 성립요건과 처벌 수위',
        'category' => '법률정보',
        'intro_subtitle' => '성범죄 혐의의 정확한 법적 판단',
        'intro_text' => '강제추행죄는 피해자의 동의 없이 신체에 접촉하는 행위로, 합의 가능성이 높은 범죄입니다. 본 글에서는 강제추행죄의 성립요건, 처벌 수위, 그리고 법적 대응 방법을 정리하겠습니다.',
        'content' => function() {
            global $theme_uri;
            ob_start();
            ?>
<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">1</span>
        <h2 class="blog-post__chapter-title">강제추행죄의 정의</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">강제추행의 의미</h3>
        </div>
        <p class="blog-post__text">강제추행은 피해자의 의사에 반하여 신체에 대한 성적 접촉을 하는 행위입니다. 성기 접촉뿐 아니라, 옷 위로의 접촉도 포함될 수 있습니다.</p>
        <div class="blog-post__law-box">
            <div class="blog-post__law-title">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                형법 제298조
            </div>
            <p class="blog-post__law-text">사람에 대해 폭력 또는 협박으로 추행한 자는 10년 이하의 징역 또는 1천만원 이하의 벌금에 처한다.</p>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">2</span>
        <h2 class="blog-post__chapter-title">강제추행죄 성립요건</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">4가지 필수 요건</h3>
        </div>
        <ul class="blog-post__list">
            <li>폭력 또는 협박</li>
            <li>피해자의 신체에 대한 접촉</li>
            <li>성적 목적 또는 성적 수치심 유발 의도</li>
            <li>피해자의 동의 부재</li>
        </ul>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>"폭력" 요건은 엄격하게 해석됩니다. 단순한 접촉만으로는 부족하고, 저항을 어렵게 하는 정도의 실력 행사가 필요합니다.</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>"협박" 또는 암묵적 협박도 포함됩니다. (예: 상사의 지위를 이용한 접촉)</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">3</span>
        <h2 class="blog-post__chapter-title">처벌 수위</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">법정형과 양형</h3>
        </div>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>유형</th><th>법정형</th><th>일반 판례</th></tr></thead>
                <tbody>
                    <tr><td>일반 강제추행</td><td>10년 이하 징역</td><td>6월 ~ 2년</td></tr>
                    <tr><td>미성년자 대상</td><td>상기와 동일</td><td>1년 ~ 3년 (더 무거움)</td></tr>
                    <tr><td>합의 후</td><td>상기와 동일</td><td>벌금 또는 집행유예</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">4</span>
        <h2 class="blog-post__chapter-title">효과적인 대응 방법</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">초기 대응 전략</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>피해자 합의: 가장 중요한 감경 사유. 합의금 기준 500만 ~ 2,000만원</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>성폭력 교육이수: 재범 방지 의지 입증</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>피해자 증거 검토: 피해 주장과 현장 증거 불일치 확인</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__conclusion">
    <h3 class="blog-post__conclusion-title">서울성범죄전문변호사 | 법률사무소 평정이 돕겠습니다</h3>
    <ul class="blog-post__list blog-post__list--white mb-4">
        <li>강제추행죄 성립 요건에서 "폭력" 요건의 해석이 가장 중요합니다.</li>
        <li>합의는 형량 감경의 가장 결정적인 요소입니다.</li>
        <li>초기 수사 단계에서의 적절한 법적 대응이 향후를 결정합니다.</li>
    </ul>
    <p class="blog-post__conclusion-text">법률사무소 평정은 강제추행 혐의에서 피해자와의 신속한 합의 추진과 형량 감경을 위한 종합적인 전략을 제시합니다.</p>
</div>
            <?php
            return ob_get_clean();
        },
        'faq' => [
            ['question' => '옷 위의 접촉도 강제추행인가요?'],
            ['question' => '피해자가 저항하지 않으면 강제추행이 아닌가요?'],
            ['question' => '합의하면 벌금으로 끝낼 수 있나요?'],
        ]
    ],
    [
        'title' => '사기죄 구성요건과 처벌 기준 총정리',
        'category' => '법률정보',
        'intro_subtitle' => '사기 혐의의 법적 성립 요건과 처벌 기준',
        'intro_text' => '사기죄는 거짓말이나 기망으로 타인의 재산을 편취하는 범죄입니다. 본 글에서는 사기죄의 성립요건, 처벌 수위, 그리고 법적 방어 방법을 정리하겠습니다.',
        'content' => function() {
            global $theme_uri;
            ob_start();
            ?>
<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">1</span>
        <h2 class="blog-post__chapter-title">사기죄의 정의</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">사기의 요소</h3>
        </div>
        <p class="blog-post__text">사기죄는 기망으로 상대방을 착오에 빠뜨려 재산상 이익을 얻는 범죄입니다. 단순한 약속 불이행과 구분이 중요합니다.</p>
        <div class="blog-post__law-box">
            <div class="blog-post__law-title">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                형법 제347조
            </div>
            <p class="blog-post__law-text">타인을 기망하여 재산상 이익을 얻거나 제3자로 하여금 얻게 한 자는 10년 이하의 징역 또는 2천만원 이하의 벌금에 처한다.</p>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">2</span>
        <h2 class="blog-post__chapter-title">사기죄 성립요건</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">5가지 필수 요건</h3>
        </div>
        <ul class="blog-post__list">
            <li>기망 행위 (거짓말, 기만)</li>
            <li>피해자의 착오 (기망에 의한)</li>
            <li>착오에 기초한 처분행위 (돈 이체, 물건 양도)</li>
            <li>재산상 이익의 양도</li>
            <li>가해자의 부정이득 (또는 제3자 부정이득)</li>
        </ul>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>약속 불이행 ≠ 사기: 처음부터 이행할 의사가 없었어야 사기</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>기망의 대상: 과거·현재의 사실뿐 아니라, 미래 약속도 포함</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">3</span>
        <h2 class="blog-post__chapter-title">처벌 수위</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">양형 기준</h3>
        </div>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>사기 규모</th><th>법정형</th><th>일반 판례</th></tr></thead>
                <tbody>
                    <tr><td>1천만원 미만</td><td>10년 이하 징역</td><td>벌금 또는 집행유예</td></tr>
                    <tr><td>1천만 ~ 1억원</td><td>10년 이하 징역</td><td>1년 ~ 2년</td></tr>
                    <tr><td>1억원 이상</td><td>10년 이하 징역</td><td>2년 ~ 5년</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">4</span>
        <h2 class="blog-post__chapter-title">사기죄 법적 방어</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">방어 전략</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>사실관계 다툼: 거짓말이 없었거나, 상대방이 알고 있었음을 입증</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>합의 가능성: 피해자와의 합의로 형량 감경</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>피해 금액 다툼: 실제 손해액 재산정 (과장된 청구 방지)</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__conclusion">
    <h3 class="blog-post__conclusion-title">서울사기죄전문변호사 | 법률사무소 평정이 돕겠습니다</h3>
    <ul class="blog-post__list blog-post__list--white mb-4">
        <li>사기죄 성립 요건에서 "기망"과 "착오 인과관계"의 입증이 핵심입니다.</li>
        <li>약속 불이행과 사기의 구분이 중요합니다.</li>
        <li>피해자와의 합의가 형량 감경의 결정적 요소입니다.</li>
    </ul>
    <p class="blog-post__conclusion-text">법률사무소 평정은 사기 혐의에서 기망 사실의 다툼과 피해자 합의를 병행하여, 최적의 결과를 얻도록 돕습니다.</p>
</div>
            <?php
            return ob_get_clean();
        },
        'faq' => [
            ['question' => '약속을 어기면 사기인가요?'],
            ['question' => '처음부터 이행할 의사가 없었다는 것을 어떻게 증명하나요?'],
            ['question' => '사기 합의 시 적정한 합의금 기준은?'],
        ]
    ],
    [
        'title' => '명예훼손 고소 절차와 대응 전략',
        'category' => '대응전략',
        'intro_subtitle' => '온라인 명예훼손 혐의의 정확한 법적 대응',
        'intro_text' => '인터넷 시대에 명예훼손은 빠르게 확산될 수 있는 범죄입니다. 본 글에서는 명예훼손의 성립요건, 고소 절차, 그리고 효과적인 방어 방법을 정리하겠습니다.',
        'content' => function() {
            global $theme_uri;
            ob_start();
            ?>
<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">1</span>
        <h2 class="blog-post__chapter-title">명예훼손의 정의</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">명예훼손 범죄의 특징</h3>
        </div>
        <p class="blog-post__text">명예훼손은 공공연한 사실 적시로 타인의 명예를 훼손하는 범죄입니다. 온라인 게시물로 인한 명예훼손이 대부분입니다.</p>
        <div class="blog-post__law-box">
            <div class="blog-post__law-title">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                형법 제307조
            </div>
            <p class="blog-post__law-text">공연히 사실을 적시하여 타인의 명예를 훼손한 자는 2년 이하의 징역이나 금고 또는 5백만원 이하의 벌금에 처한다.</p>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">2</span>
        <h2 class="blog-post__chapter-title">명예훼손 성립요건</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">4가지 필수 요건</h3>
        </div>
        <ul class="blog-post__list">
            <li>공연성 (인터넷 댓글, SNS, 블로그 게시물)</li>
            <li>사실 적시 (의견이나 추측이 아닌 사실의 기술)</li>
            <li>타인을 특정</li>
            <li>명예 훼손 (사회적 평가 저하)</li>
        </ul>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>적시 사실이 "참"이면 명예훼손으로 불문 가능 (단, 공익 목적이 있으면 위법성 조각)</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>"거짓"이면 모욕죄로 처벌 (더 가벼운 처벌)</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">3</span>
        <h2 class="blog-post__chapter-title">고소 절차</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">고소 및 수사</h3>
        </div>
        <p class="blog-post__text mb-4">명예훼손은 피해자 고소가 필수입니다. 고소 없이는 수사가 진행되지 않습니다.</p>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>경찰청(또는 검찰청)에 고소장 제출</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>가해자 신원 확인 (IP 추적, 가입자 정보 확인)</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>수사 진행 (조사, 시지)  </p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>검찰 기소 또는 불기소 결정</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">4</span>
        <h2 class="blog-post__chapter-title">효과적인 대응 전략</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">방어 및 합의</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>사실 여부 다툼: 적시 사실이 거짓임을 입증</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>공익 목적: 공익 성명이면 위법성이 없음을 주장</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>피해자 합의: 고소 취소 요청 (재판 전에 합의)</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__conclusion">
    <h3 class="blog-post__conclusion-title">서울명예훼손전문변호사 | 법률사무소 평정이 돕겠습니다</h3>
    <ul class="blog-post__list blog-post__list--white mb-4">
        <li>명예훼손은 사실 적시이지만, 공익 목적이면 위법성이 조각될 수 있습니다.</li>
        <li>피해자 합의가 가장 확실한 해결 방법입니다.</li>
        <li>게시물 삭제와 사과문 게재도 합의의 중요 요소입니다.</li>
    </ul>
    <p class="blog-post__conclusion-text">법률사무소 평정은 명예훼손 피의자의 초기 수사 대응과 피해자 합의를 신속하게 추진하여, 형사처벌을 최소화하도록 돕습니다.</p>
</div>
            <?php
            return ob_get_clean();
        },
        'faq' => [
            ['question' => '사실을 말했어도 명예훼손인가요?'],
            ['question' => '온라인 댓글도 명예훼손 대상인가요?'],
            ['question' => '고소 취소 후에도 기소되나요?'],
        ]
    ],
    [
        'title' => '횡령죄와 배임죄의 차이점 및 처벌 기준',
        'category' => '법률정보',
        'intro_subtitle' => '횡령과 배임의 정확한 법적 구분',
        'intro_text' => '횡령과 배임은 자주 혼동되는 범죄이지만, 엄격히 다른 조건을 적용받습니다. 본 글에서는 두 범죄의 차이점과 각각의 처벌 기준을 정리하겠습니다.',
        'content' => function() {
            global $theme_uri;
            ob_start();
            ?>
<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">1</span>
        <h2 class="blog-post__chapter-title">횡령죄의 정의</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">횡령의 개념</h3>
        </div>
        <p class="blog-post__text">횡령은 타인의 물건을 보관받은 자가 그 물건을 자기 것으로 만드는 행위입니다.</p>
        <div class="blog-post__law-box">
            <div class="blog-post__law-title">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                형법 제355조 (횡령)
            </div>
            <p class="blog-post__law-text">타인의 물건을 보관받은 자 또는 그 물건에 관하여 직무상 감시 의무를 지는 자가 그 물건을 횡령한 자는 10년 이하의 징역 또는 3천만원 이하의 벌금에 처한다.</p>
        </div>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">2</span>
            <h3 class="blog-post__section-title">배임죄의 개념</h3>
        </div>
        <p class="blog-post__text">배임은 신뢰받은 자가 자신의 의무를 저버리고 타인에게 손해를 입히는 행위입니다.</p>
        <div class="blog-post__law-box">
            <div class="blog-post__law-title">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                형법 제355조 (배임)
            </div>
            <p class="blog-post__law-text">타인을 위하여 사무를 처리하는 자가 그 임무에 위배하는 행위를 하여 타인에게 손해를 입힌 자는 10년 이하의 징역 또는 3천만원 이하의 벌금에 처한다.</p>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">2</span>
        <h2 class="blog-post__chapter-title">횡령과 배임의 차이점</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">핵심 차이</h3>
        </div>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>구분</th><th>횡령</th><th>배임</th></tr></thead>
                <tbody>
                    <tr><td>행위 주체</td><td>물건 보관자</td><td>사무 처리자</td></tr>
                    <tr><td>행위 대상</td><td>물건 (유체물)</td><td>돈, 정보, 기회 등</td></tr>
                    <tr><td>행위</td><td>자신의 것으로 만듦</td><td>의무 저버림</td></tr>
                    <tr><td>피해</td><td>물건 소유자 피해</td><td>타인의 이익 침해</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">3</span>
        <h2 class="blog-post__chapter-title">처벌 기준</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">양형 기준</h3>
        </div>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>범죄</th><th>법정형</th><th>일반 판례</th></tr></thead>
                <tbody>
                    <tr><td>횡령 (소액)</td><td>10년 이하</td><td>1년 ~ 3년</td></tr>
                    <tr><td>횡령 (대액)</td><td>10년 이하</td><td>3년 ~ 7년</td></tr>
                    <tr><td>배임 (일반)</td><td>10년 이하</td><td>1년 ~ 3년</td></tr>
                    <tr><td>배임 (중대)</td><td>10년 이하</td><td>2년 ~ 5년</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">4</span>
        <h2 class="blog-post__chapter-title">방어 전략</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">초기 대응</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>피해자 합의: 돈의 전액 반환 시 합의 가능</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>죄인 인식: 자백과 반성</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>재범 방지: 직업 변경 또는 감시 동의</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__conclusion">
    <h3 class="blog-post__conclusion-title">서울횡령배임전문변호사 | 법률사무소 평정이 돕겠습니다</h3>
    <ul class="blog-post__list blog-post__list--white mb-4">
        <li>횡령과 배임은 행위의 대상과 방식에서 명확히 다릅니다.</li>
        <li>두 범죄 모두 피해금액과 피해자 합의가 중요합니다.</li>
        <li>초기 수사 단계에서의 적절한 법적 대응이 형량을 크게 좌우합니다.</li>
    </ul>
    <p class="blog-post__conclusion-text">법률사무소 평정은 횡령·배임 혐의에서 피해자 합의와 감경 요소를 최대한 활용하여, 합리적인 형량을 받도록 종합적으로 대응합니다.</p>
</div>
            <?php
            return ob_get_clean();
        },
        'faq' => [
            ['question' => '횡령과 배임의 차이가 형량에 영향을 주나요?'],
            ['question' => '횡령 후 돈을 돌려주면 무죄인가요?'],
            ['question' => '회사 돈을 잠시 썼다가 돌려주는 것도 횡령인가요?'],
        ]
    ],
    [
        'title' => '폭행죄와 상해죄의 차이, 합의 전략',
        'category' => '대응전략',
        'intro_subtitle' => '신체 상해 범죄의 법적 구분과 대응',
        'intro_text' => '폭행과 상해는 신체적 해를 끼치는 범죄지만, 법적으로 엄격히 다르게 취급됩니다. 본 글에서는 두 범죄의 차이점과 효과적인 합의 전략을 정리하겠습니다.',
        'content' => function() {
            global $theme_uri;
            ob_start();
            ?>
<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">1</span>
        <h2 class="blog-post__chapter-title">폭행죄의 정의</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">폭행의 개념</h3>
        </div>
        <p class="blog-post__text">폭행은 신체에 불법적인 실력을 행사하는 행위입니다. 상해(injury)없이도 폭행이 성립합니다.</p>
        <div class="blog-post__law-box">
            <div class="blog-post__law-title">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                형법 제260조 (폭행)
            </div>
            <p class="blog-post__law-text">사람에 대해 폭행을 가한 자는 2년 이하의 징역, 500만원 이하의 벌금, 구류 또는 과료에 처한다.</p>
        </div>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">2</span>
            <h3 class="blog-post__section-title">상해죄의 개념</h3>
        </div>
        <p class="blog-post__text">상해는 폭행으로 인해 신체의 생리적 기능에 장애가 생기는 것입니다. 의학적으로 입증 가능한 손상이 있어야 합니다.</p>
        <div class="blog-post__law-box">
            <div class="blog-post__law-title">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                형법 제257조 (상해)
            </div>
            <p class="blog-post__law-text">사람의 신체를 상하게 한 자는 7년 이하의 징역 또는 1천만원 이하의 벌금에 처한다.</p>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">2</span>
        <h2 class="blog-post__chapter-title">폭행과 상해의 차이점</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">핵심 구분</h3>
        </div>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>구분</th><th>폭행</th><th>상해</th></tr></thead>
                <tbody>
                    <tr><td>행위</td><td>신체에 불법적 힘 행사</td><td>신체에 손상 입힘</td></tr>
                    <tr><td>결과</td><td>없거나 경미</td><td>의학적 손상 (진단서 발급)</td></tr>
                    <tr><td>법정형</td><td>2년 이하 징역</td><td>7년 이하 징역</td></tr>
                    <tr><td>처벌</td><td>비교적 가벼움</td><td>매우 무거움</td></tr>
                </tbody>
            </table>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>때린 후 외상이 없으면 → 폭행</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>때린 후 타박상, 골절 등 진단 → 상해</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">3</span>
        <h2 class="blog-post__chapter-title">처벌 기준</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">양형 기준</h3>
        </div>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>범죄</th><th>법정형</th><th>일반 판례</th></tr></thead>
                <tbody>
                    <tr><td>폭행 (단순)</td><td>2년 이하 징역</td><td>벌금 500만원 또는 집행유예</td></tr>
                    <tr><td>폭행 (다수인)</td><td>2년 이하 징역</td><td>3개월 ~ 1년</td></tr>
                    <tr><td>상해 (경미)</td><td>7년 이하 징역</td><td>1년 ~ 2년</td></tr>
                    <tr><td>상해 (중대)</td><td>7년 이하 징역</td><td>3년 ~ 5년</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">4</span>
        <h2 class="blog-post__chapter-title">효과적인 합의 전략</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">합의 절차 및 기준</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>빠른 합의 추진: 수사 초기에 합의하면 형량 감경 극대화</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>합의금 기준: 폭행 300만 ~ 800만원, 상해 1,000만 ~ 5,000만원</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>의료비 포함: 진료비, 통원비, 간호비 명확히 구분</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__conclusion">
    <h3 class="blog-post__conclusion-title">서울폭행상해전문변호사 | 법률사무소 평정이 돕겠습니다</h3>
    <ul class="blog-post__list blog-post__list--white mb-4">
        <li>폭행과 상해는 결과의 유무로 명확히 구분됩니다.</li>
        <li>상해로 인정되면 처벌이 매우 무거워집니다.</li>
        <li>피해자 합의가 형량 감경의 가장 중요한 요소입니다.</li>
    </ul>
    <p class="blog-post__conclusion-text">법률사무소 평정은 폭행·상해 혐의에서 초기 단계 합의 추진과 진료기록 정리를 통해, 형량을 최소화하고 빠른 합의를 진행하도록 돕습니다.</p>
</div>
            <?php
            return ob_get_clean();
        },
        'faq' => [
            ['question' => '때렸지만 상처가 없으면 폭행인가요?'],
            ['question' => '폭행과 상해 합의금의 기준은?'],
            ['question' => '합의 후에도 기소되나요?'],
        ]
    ],
    [
        'title' => '마약 소지·투약 처벌 수위와 자수 감경',
        'category' => '법률정보',
        'intro_subtitle' => '마약 범죄의 엄격한 처벌 기준과 자수 전략',
        'intro_text' => '마약 소지 및 투약은 매우 엄격한 처벌을 받는 범죄입니다. 본 글에서는 마약 범죄의 처벌 수위와 자수에 따른 감경 기준을 정리하겠습니다.',
        'content' => function() {
            global $theme_uri;
            ob_start();
            ?>
<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">1</span>
        <h2 class="blog-post__chapter-title">마약 범죄의 정의</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">마약류의 분류</h3>
        </div>
        <p class="blog-post__text">마약류는 세 가지로 분류됩니다: 마약, 향정신성의약품, 대마입니다. 각각 다른 처벌 수위를 적용받습니다.</p>
        <div class="blog-post__law-box">
            <div class="blog-post__law-title">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                마약류관리에관한법률 제2조
            </div>
            <p class="blog-post__law-text">마약류의 종류와 규제 기준을 명시하며, 각 마약류의 무단 소지, 투약, 유통을 엄격하게 처벌한다.</p>
        </div>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">2</span>
            <h3 class="blog-post__section-title">마약 vs 향정신성의약품 vs 대마</h3>
        </div>
        <ul class="blog-post__list">
            <li>마약: 코카인, 헤로인 등 (가장 엄격)</li>
            <li>향정신성의약품: 필로폰, 엑스터시, 졸피뎀 등</li>
            <li>대마: 마리화나</li>
        </ul>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">2</span>
        <h2 class="blog-post__chapter-title">마약 범죄 처벌 수위</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">법정형 및 실제 판례</h3>
        </div>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>행위</th><th>법정형</th><th>실제 판례</th></tr></thead>
                <tbody>
                    <tr><td>마약 투약</td><td>10년 이하 징역</td><td>2년 ~ 5년</td></tr>
                    <tr><td>마약 소지 (소량)</td><td>10년 이하 징역</td><td>1년 ~ 3년</td></tr>
                    <tr><td>향정 투약</td><td>10년 이하 징역</td><td>1년 ~ 3년</td></tr>
                    <tr><td>향정 소지 (소량)</td><td>10년 이하 징역</td><td>6개월 ~ 1년 6개월</td></tr>
                    <tr><td>대마 투약</td><td>10년 이하 징역</td><td>1년 ~ 2년</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">3</span>
        <h2 class="blog-post__chapter-title">자수와 감경</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">자수의 효과</h3>
        </div>
        <p class="blog-post__text mb-4">자수는 마약 범죄에서 가장 큰 감경 사유입니다:</p>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>자수 인정: 적발 전 자신이 범행을 신고한 경우</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>형량 감경: 30% ~ 50% 감경</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>예시: 원래 2년형 → 자수 시 1년 ~ 1년 6개월</p></div>
        </div>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">2</span>
            <h3 class="blog-post__section-title">자수 절차</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>경찰청 마약수사대 또는 검찰청에 자수</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>마약 소량 제출 (증거 확보)</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>상세한 범행 자백 (언제부터, 어디서, 누구와)</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">4</span>
        <h2 class="blog-post__chapter-title">마약 범죄 대응 전략</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">초기 대응</h3>
        </div>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>조기 자수 추진: 형량 감경의 가장 확실한 방법</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>중독 치료: 정신건강의학과 입원/통원 기록</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>사회적 복귀: 직업 복귀 계획 수립</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__conclusion">
    <h3 class="blog-post__conclusion-title">서울마약전문변호사 | 법률사무소 평정이 돕겠습니다</h3>
    <ul class="blog-post__list blog-post__list--white mb-4">
        <li>마약 범죄는 매우 엄격한 처벌을 받습니다.</li>
        <li>자수는 형량을 30~50% 감경할 수 있는 가장 강력한 수단입니다.</li>
        <li>마약 중독 치료와 재활을 통한 사회 복귀가 형량 감경의 핵심입니다.</li>
    </ul>
    <p class="blog-post__conclusion-text">법률사무소 평정은 마약 범죄 적발 시 조기 자수 추진과 중독 치료를 병행하여, 최소한의 형량으로 사회 복귀를 돕습니다.</p>
</div>
            <?php
            return ob_get_clean();
        },
        'faq' => [
            ['question' => '마약을 자수하면 처벌을 면할 수 있나요?'],
            ['question' => '자수와 적발의 형량 차이는 얼마나 되나요?'],
            ['question' => '마약 중독 치료는 형량 감경에 도움이 되나요?'],
        ]
    ],
];

foreach ($posts_data as $post_data) {
    $args = [
        'post_type' => 'pj_blog_post',
        'posts_per_page' => 1,
        'title' => $post_data['title'],
    ];

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        wp_reset_postdata();

        $content = is_callable($post_data['content']) ? call_user_func($post_data['content']) : $post_data['content'];

        wp_update_post([
            'ID' => $post_id,
            'post_content' => $content,
        ]);

        update_post_meta($post_id, '_pj_blog_intro_subtitle', $post_data['intro_subtitle']);
        update_post_meta($post_id, '_pj_blog_intro_text', $post_data['intro_text']);
        update_post_meta($post_id, '_pj_blog_faq', $post_data['faq']);

        wp_set_post_terms($post_id, [$post_data['category']], 'pj_blog_category');

        echo "✓ Updated post: {$post_data['title']} (ID: $post_id)\n";
    } else {
        echo "✗ Post not found: {$post_data['title']}\n";
    }
}

echo "\n✓ All blog posts updated successfully!\n";
