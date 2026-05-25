<?php
/**
 * One-shot WP-CLI script: seeds post_content for the 3 sample blog posts.
 * Run with: wp --allow-root eval-file wp-content/themes/pjlaw/inc/blog-content-seed-content.php
 */

$theme_uri = get_template_directory_uri();

ob_start();
?>
<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">1</span>
        <h2 class="blog-post__chapter-title">카메라 등 이용촬영죄란?</h2>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">카메라등이용촬영죄란?</h3>
        </div>
        <p class="blog-post__text">카메라등이용촬영죄는 카메라나 휴대폰 등으로 성적 욕망 또는 수치심을 유발할 수 있는 신체를 그 사람의 동의 없이 몰래 찍는 행위를 처벌하는 범죄입니다. 쉽게 말하면, 상대방이 "찍어도 된다"고 동의하지 않았는데 몰래 찍으면 범죄가 됩니다.</p>
        <div class="blog-post__law-box">
            <div class="blog-post__law-title">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                성폭력범죄의 처벌 등에 관한 특례법 제14조(카메라 등을 이용한 촬영)
            </div>
            <p class="blog-post__law-text">카메라나 그 밖에 이와 유사한 기능을 갖춘 기계장치를 이용하여 성적 욕망 또는 수치심을 유발할 수 있는 사람의 신체를 촬영대상자의 의사에 반하여 촬영한자는 7년 이하의 징역 또는 5천만원 이하의 벌금에 처한다.</p>
        </div>
        <p class="blog-post__text mt-4">실무에서는 흔히 몰카라는 표현으로 알려져 있지만, 법률상 판단은 촬영 행위 자체뿐 아니라 촬영 대상, 촬영 상황, 동의의 유무와 범위가 맞물려 결정됩니다.</p>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">2</span>
            <h3 class="blog-post__section-title">카메라등이용촬영죄가 성립하려면?</h3>
        </div>
        <p class="blog-post__text mb-4">범죄가 성립하려면 세 가지가 필요합니다.</p>
        <ul class="blog-post__list">
            <li>촬영 기계장치 (휴대폰, 디지털카메라, 웹캠 등)</li>
            <li>성적 욕망 또는 수치심을 유발할 수 있는 신체 부위</li>
            <li>촬영대상자의 의사에 반한 촬영</li>
        </ul>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>성기, 가슴, 엉덩이 등 노골적인 부위는 당연히 해당됩니다. 하지만 허벅지, 속옷이 보이는 치마 속 등도 상황에 따라 해당될 수 있습니다.</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>중요한 것은 "일반적인 사람들이 봤을 때 성적으로 수치스럽다고 느낄 만한 부위인가"입니다.</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>"상대방의 의사에 반하여" 부분이 가장 중요하고 복잡한 쟁점이므로, 아래에서 자세히 설명하겠습니다.</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">2</span>
        <h2 class="blog-post__chapter-title">카메라 등 이용 촬영죄 성립요건은 어떻게 되나요?</h2>
    </div>
    <div class="blog-post__image-wrap">
        <img src="<?php echo esc_url($theme_uri . '/assets/images/blog/post-section-2.png'); ?>" alt="" class="blog-post__image" />
        <p class="blog-post__image-caption">범죄가 성립하려면 실제로 일어난 일(객관적 요건)과 범인의 마음가짐(주관적 요건) 두 가지가 모두 필요합니다.</p>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">객관적 요건</h3>
        </div>
        <p class="blog-post__text mb-4">객관적으로는 위에서 언급했던 바와 같이 아래 세 가지가 중심이 됩니다.</p>
        <ul class="blog-post__list">
            <li>카메라나 유사 기계장치로</li>
            <li>성적 욕망 또는 수치심을 유발할 수 있는 타인의 신체를</li>
            <li>촬영대상자의 의사에 반하여 촬영했는지</li>
        </ul>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">2</span>
            <h3 class="blog-post__section-title">주관적 요건</h3>
        </div>
        <p class="blog-post__text mb-4">주관적으로는 아래 두 가지가 필요합니다.</p>
        <ul class="blog-post__list">
            <li>촬영 행위에 대한 인식과 의사가 필요하고</li>
            <li>그 촬영이 상대방 의사에 반한다는 점까지 포함해 판단됩니다.</li>
        </ul>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>"실수로 찍혔다"는 변명이 통하려면, 정말로 우연히 찍혔다는 증거가 필요합니다.</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>"동의한 줄 알았다"고 말할 수 있으려면, 실제로 동의가 있었다고 믿을 만한 합리적인 이유가 있어야 합니다.</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">3</span>
        <h2 class="blog-post__chapter-title">카메라등이용촬영죄에서 "의사에 반하여" 판단은?</h2>
    </div>
    <p class="blog-post__text">이 부분이 가장 중요하고 복잡하다고 말할 수 있습니다. "의사에 반하여"는 단순히 "싫다고 말했는지"만으로 판단되지 않습니다.</p>
    <div class="blog-post__callout">
        <p class="blog-post__callout-title">판단의 핵심은 다음 두 가지입니다.</p>
        <ul class="blog-post__callout-list">
            <li><img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-check.svg'); ?>" alt="" /> 촬영에 동의했는가?</li>
            <li><img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-check.svg'); ?>" alt="" /> 촬영에 동의했다면, 어디까지 동의한 것인가?</li>
        </ul>
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">촬영에 대한 명시적 동의가 있었는지</h3>
        </div>
        <p class="blog-post__text">가장 명확한 경우는, 사진을 찍어도 되냐는 질문에 "그렇다"고 답한 경우입니다. 주의할 점은, 연인관계에서 자동으로 동의가 있는 것은 아니라는 부분입니다.</p>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">2</span>
            <h3 class="blog-post__section-title">묵시적 동의가 인정될 수 있는 관계와 상황인지</h3>
        </div>
        <p class="blog-post__text">예를 들어, 사진관에서 사진을 찍기 위해 포즈를 취하는 경우, 연인과 함께 셀카를 찍기 위해 카메라 앞에 서는 경우는 묵시적 동의가 있다고 볼 수 있습니다.</p>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">3</span>
            <h3 class="blog-post__section-title">동의했다면, 어디까지 동의했는지</h3>
        </div>
        <ul class="blog-post__list mb-4">
            <li>촬영 전 "찍어도 돼"라고 물어봤는지?</li>
            <li>상대방이 명확히 동의 의사를 밝혔는지?</li>
            <li>상대방이 촬영을 알고 있었는지?</li>
            <li>동의한 범위를 벗어나지 않았는지?</li>
        </ul>
        <div class="blog-post__checklist">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>하나라도 "아니오"라면, 의사에 반한 촬영으로 문제될 수 있습니다.</p></div>
        </div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__chapter">
    <div class="blog-post__chapter-header">
        <span class="blog-post__chapter-num">4</span>
        <h2 class="blog-post__chapter-title">카메라등이용촬영죄 처벌수위와 양형기준은?</h2>
    </div>
    <div class="blog-post__image-wrap">
        <img src="<?php echo esc_url($theme_uri . '/assets/images/blog/post-section-4.png'); ?>" alt="" class="blog-post__image" />
    </div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">1</span>
            <h3 class="blog-post__section-title">카메라등이용촬영죄 법정형은?</h3>
        </div>
        <p class="blog-post__text mb-4">성폭력범죄의 처벌 등에 관한 특례법 제14조 제1항은 다음과 같이 규정합니다.</p>
        <div class="blog-post__law-box no-icon">
            <p class="blog-post__law-title mb-2">성폭력범죄의 처벌 등에 관한 특례법 제14조(카메라 등을 이용한 촬영)</p>
            <p class="blog-post__law-text">카메라나 그 밖에 이와 유사한 기능을 갖춘 기계장치를 이용하여 성적 욕망 또는 수치심을 유발할 수 있는 사람의 신체를 촬영대상자의 의사에 반하여 촬영한자는 7년 이하의 징역 또는 5천만원 이하의 벌금에 처한다.</p>
        </div>
        <p class="blog-post__text mt-4">최대 징역 7년, 최대 벌금 5천만원까지 선고될 수 있으며, 법원은 이 범위 안에서 구체적인 형량을 정합니다.</p>
    </div>
    <div class="blog-post__divider-sub"></div>
    <div class="blog-post__section">
        <div class="blog-post__section-header">
            <span class="blog-post__section-num">2</span>
            <h3 class="blog-post__section-title">카메라등이용촬영죄 양형기준은?</h3>
        </div>
        <p class="blog-post__text mb-4">양형위원회에서는 카메라등이용촬영죄를 포함한 디지털 성범죄 유형별 권고형 범위를 제시하고 있습니다.</p>
        <div class="blog-post__table-wrap">
            <table class="blog-post__table">
                <thead><tr><th>유형</th><th>감경영역</th><th>기본영역</th><th>가중영역</th></tr></thead>
                <tbody><tr><td>1유형 촬영</td><td>4월 ~ 1년</td><td>8월 ~ 2년</td><td>1년 6월 ~ 4년</td></tr></tbody>
            </table>
        </div>
        <div class="blog-post__checklist mt-4">
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>촬영물의 내용을 쉽게 파악할 수 없는 경우, 피해자와 합의하여 피해자가 처벌을 원하지 않는 경우에는 형량이 가벼워질 수 있습니다.</p></div>
            <div class="blog-post__check-item"><div class="blog-post__check-icon"></div><p>불특정 또는 다수의 피해자를 대상으로 한 경우, 상당한 기간에 걸쳐 반복적으로 범행한 경우에는 형량이 무거워질 수 있습니다.</p></div>
        </div>
    </div>
    <div class="blog-post__qa">
        <div class="blog-post__qa-q"><span class="blog-post__qa-icon">Q</span><span class="blog-post__qa-text">촬영 후 즉시 삭제를 했다면, 형량이 가벼워질 수 있나요?</span></div>
        <div class="blog-post__qa-a"><span class="blog-post__qa-icon blog-post__qa-icon--a">A</span><span class="blog-post__qa-text">촬영 후 즉시 삭제했더라도, 촬영 행위 자체가 이미 범죄를 구성합니다. 다만, 즉시 삭제한 것은 형량을 정할 때 유리한 사정으로 고려될 수는 있습니다.</span></div>
    </div>
</div>

<div class="blog-post__divider"></div>

<div class="blog-post__conclusion">
    <h3 class="blog-post__conclusion-title">서울성범죄전문변호사 | 법률사무소 평정이 돕겠습니다</h3>
    <ul class="blog-post__list blog-post__list--white mb-4">
        <li>카메라등이용촬영죄는 촬영 자체가 핵심이지만, 실무에서는 의사에 반하여의 해석과 동의 범위가 중요합니다.</li>
        <li>연인 사이 촬영이라도 동의가 포괄되는 구조가 아니며, 동의 범위를 벗어나면 범죄 성립이 문제 될 수 있습니다.</li>
        <li>조문상 법정형과 별개로, 양형기준은 유형별 권고 범위를 제시해 실제 형의 범위 판단에 참고가 됩니다.</li>
    </ul>
    <p class="blog-post__conclusion-text">법률사무소 평정은 사실관계를 쪼개어 쟁점을 정리하고, 동의의 범위와 의사에 반했는지 판단 요소를 구조화해 사건의 방향이 흔들리지 않도록 돕습니다.</p>
</div>
<?php
$content = ob_get_clean();

foreach (array(13, 15, 17) as $post_id) {
    $result = wp_update_post(array(
        'ID'           => $post_id,
        'post_content' => $content,
    ));
    if (is_wp_error($result)) {
        WP_CLI::error("Failed to update post $post_id: " . $result->get_error_message());
    } else {
        WP_CLI::success("Updated post $post_id");
    }
}
