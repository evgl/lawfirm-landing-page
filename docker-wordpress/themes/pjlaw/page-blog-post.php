<?php
/**
 * Blog Post Detail Page Template
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();
?>

<main id="main" class="site-main blog-post-page" role="main">
    <div class="blog-post-nav">
        <div class="blog-post-nav__links">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="blog-post-nav__home-link" aria-label="<?php esc_attr_e('홈으로 이동', 'pjlaw'); ?>">
                <img src="<?php echo esc_url($theme_uri . '/assets/icons/directions/icon-home-dark.svg'); ?>" alt="" aria-hidden="true" class="blog-post-nav__icon" width="19.527" height="17.851" />
            </a>
            <div class="blog-post-nav__separator"></div>
            <div class="blog-post-nav__current">
                <span>블로그</span>
                <span class="blog-post-nav__title">몰카 카메라등이용촬영죄 성립요건 · 처벌수위 · 양형기준은?</span>
                <svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5.5 5L10 1" stroke="#181a1e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="blog-post-nav__separator"></div>
        </div>
        <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="blog-post-nav__close-link" aria-label="<?php esc_attr_e('블로그 목록으로 돌아가기', 'pjlaw'); ?>">
            <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-close.svg'); ?>" alt="" aria-hidden="true" class="blog-post-nav__icon-close" width="20" height="20" />
        </a>
        <div class="blog-post-nav__line-wrap">
            <div class="blog-post-nav__line-bg"></div>
            <div class="blog-post-nav__line-active"></div>
        </div>
    </div>

    <div class="container blog-post-layout">
        <div class="blog-post__main">
            <div class="blog-post__hero">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/blog/post-hero.png'); ?>" alt="몰카 카메라등이용촬영죄 성립요건 · 처벌수위 · 양형기준은?" class="blog-post__hero-img" />
                <h1 class="blog-post__hero-title">몰카 카메라등이용촬영죄<br />성립요건 · 처벌수위 · 양형기준은?</h1>
            </div>
            
            <div class="blog-post__intro">
                <h2 class="blog-post__intro-title">몰카 카메라등이용촬영죄 성립요건·처벌수위·양형기준은?</h2>
                <p class="blog-post__intro-text">
                    연인 사이든 지인이든, 촬영이 문제 되는 순간, 핵심은 결국 “상대방이 동의했는가”와 “동의했다면 어디까지 동의한 것인가”에 달려 있습니다.
                    예를 들어, 연인과 함께 사진을 찍기로 했더라도, 얼굴만 찍기로 했는데 몸 전체를 찍었거나, 깨어 있을 때만 찍기로 했는데 잠든 모습을 찍었거나,
                    개인적으로 보관하기로 했는데 다른 사람에게 보냈다면, 모두 “의사에 반한 촬영”으로 문제될 수 있습니다. 이 글에서는 카메라등이용촬영죄의 성립요건과 “의사에 반하여”의 판단기준, 그리고 실제 처벌 수위를 쉽게 안내 드리겠습니다.
                </p>
            </div>

            <div class="blog-post__toc">
                <div class="blog-post__toc-item">
                    <span class="blog-post__toc-num">1</span>
                    <span class="blog-post__toc-text">카메라등이용촬영죄란?</span>
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-chevron-down.svg'); ?>" alt="" class="blog-post__toc-icon" />
                </div>
                <div class="blog-post__toc-content">
                    <ul>
                        <li>카메라등이용촬영죄란?</li>
                        <li>카메라등이용촬영죄가 성립하려면?</li>
                    </ul>
                </div>

                <div class="blog-post__toc-item">
                    <span class="blog-post__toc-num">2</span>
                    <span class="blog-post__toc-text">카메라등이용촬영죄 성립요건은 어떻게 되나요?</span>
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-chevron-down.svg'); ?>" alt="" class="blog-post__toc-icon" />
                </div>
                <div class="blog-post__toc-content">
                    <ul class="flex-row">
                        <li>객관적 요건</li>
                        <li>주관적 요건</li>
                    </ul>
                </div>

                <div class="blog-post__toc-item">
                    <span class="blog-post__toc-num">3</span>
                    <span class="blog-post__toc-text">카메라등이용촬영죄에서 “의사에 반하여” 판단은?</span>
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-chevron-down.svg'); ?>" alt="" class="blog-post__toc-icon" />
                </div>
                <div class="blog-post__toc-content">
                    <ul>
                        <li>촬영에 대한 명시적 동의가 있었는지</li>
                        <li>묵시적 동의가 인정될 수 있는 관계와 상황인지</li>
                        <li>동의했다면, 어디까지 동의했는지</li>
                    </ul>
                </div>

                <div class="blog-post__toc-item">
                    <span class="blog-post__toc-num">4</span>
                    <span class="blog-post__toc-text">카메라등이용촬영죄 처벌수위와 양형기준은?</span>
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-chevron-down.svg'); ?>" alt="" class="blog-post__toc-icon" />
                </div>
                <div class="blog-post__toc-content">
                    <ul class="flex-row">
                        <li>카메라등이용촬영죄 법정형은?</li>
                        <li>카메라등이용촬영죄 양형기준은?</li>
                    </ul>
                </div>
            </div>

            <div class="blog-post__toc-links">
                <a href="#" class="blog-post__toc-link">서울성범죄전문변호사 | 법률사무소 평정이 돕겠습니다. <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-circle.svg'); ?>" alt="" /></a>
                <a href="#" class="blog-post__toc-link">자주 묻는 질문 3가지 <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-circle.svg'); ?>" alt="" /></a>
                <a href="#" class="blog-post__toc-link">연관 글 <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-circle.svg'); ?>" alt="" /></a>
            </div>

            <div class="blog-post__divider"></div>

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
                    <p class="blog-post__text">
                        카메라등이용촬영죄는 카메라나 휴대폰 등으로 성적 욕망 또는 수치심을 유발할 수 있는 신체를 그 사람의 동의 없이 몰래 찍는 행위를 처벌하는 범죄입니다. 쉽게 말하면, 상대방이 “찍어도 된다”고 동의하지 않았는데 몰래 찍으면 범죄가 됩니다.
                    </p>
                    <div class="blog-post__law-box">
                        <div class="blog-post__law-title">
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-law.svg'); ?>" alt="" class="blog-post__law-icon" />
                            성폭력범죄의 처벌 등에 관한 특례법 제14조(카메라 등을 이용한 촬영)
                        </div>
                        <p class="blog-post__law-text">
                            카메라나 그 밖에 이와 유사한 기능을 갖춘 기계장치를 이용하여 성적 욕망 또는 수치심을 유발할 수 있는 사람의 신체를 촬영대상자의 의사에 반하여 촬영한자는 7년 이하의 징역 또는 5천만원 이하의 벌금에 처한다.
                        </p>
                    </div>
                    <p class="blog-post__text mt-4">
                        실무에서는 흔히 몰카라는 표현으로 알려져 있지만, 법률상 판단은 촬영 행위 자체뿐 아니라 촬영 대상, 촬영 상황, 동의의 유무와 범위가 맞물려 결정됩니다.
                    </p>
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
                        <div class="blog-post__check-item">
                            <div class="blog-post__check-icon"></div>
                            <p>성기, 가슴, 엉덩이 등 노골적인 부위는 당연히 해당됩니다. 하지만 허벅지, 속옷이 보이는 치마 속 등도 상황에 따라 해당될 수 있습니다. 또한, 옷을 입고 있어도 특정 부위를 확대하거나 특정 각도로 찍으면 문제가 될 수 있습니다.</p>
                        </div>
                        <div class="blog-post__check-item">
                            <div class="blog-post__check-icon"></div>
                            <p>중요한 것은 "일반적인 사람들이 봤을 때 성적으로 수치 스럽다고 느낄 만한 부위인가"입니다.</p>
                        </div>
                        <div class="blog-post__check-item">
                            <div class="blog-post__check-icon"></div>
                            <p>“상대방의 의사에 반하여” 부분이 가장 중요하고 복잡한 쟁점이므로, 아래에서 자세히 설명하겠습니다.</p>
                        </div>
                    </div>
                </div>
                
                <a href="#" class="blog-post__more-btn">
                    더보기 <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-chevron-down-blue.svg'); ?>" alt="" />
                </a>
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
                    <p class="blog-post__text mb-4">객관적으로는 위에서 언급 했던 바와 같이 아래 세 가지가 중심이 됩니다.</p>
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
                        <div class="blog-post__check-item">
                            <div class="blog-post__check-icon"></div>
                            <p>“실수로 찍혔다”는 변명이 통하려면, 정말로 우연히 찍혔다는 증거가 필요합니다.</p>
                        </div>
                        <div class="blog-post__check-item">
                            <div class="blog-post__check-icon"></div>
                            <p>“동의한 줄 알았다”고 말할 수 있으려면, 실제로 동의가 있었다고 믿을 만한 합리적인 이유가 있어야 합니다.</p>
                        </div>
                    </div>
                </div>

                <a href="#" class="blog-post__more-btn">
                    더보기 <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-chevron-down-blue.svg'); ?>" alt="" />
                </a>
            </div>

            <div class="blog-post__divider"></div>

            <div class="blog-post__chapter">
                <div class="blog-post__chapter-header">
                    <span class="blog-post__chapter-num">3</span>
                    <h2 class="blog-post__chapter-title">카메라등이용촬영죄에서 “의사에 반하여” 판단은?</h2>
                </div>
                <p class="blog-post__text">이 부분이 가장 중요하고 복잡하다고 말할 수 있습니다. “의사에 반하여”는 단순히 “싫다고 말했는지”만으로 판단되지 않습니다.</p>
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
                    <p class="blog-post__text">
                        가장 명확한 경우는, 사진을 찍어도 되냐는 질문에 “그렇다”고 답한 경우 입니다. 주의할 점은, 연인관계에서 자동으로 동의가 있는 것은 아니라는 부분입니다. 또한, 협박이나 강요로 “응”이라고 대답한 경우, 술에 취해 제대로 판단할 수 없는 상태에서 “응”이라고 대답한 경우는 진정한 동의가 아닙니다.
                    </p>
                </div>

                <div class="blog-post__divider-sub"></div>

                <div class="blog-post__section">
                    <div class="blog-post__section-header">
                        <span class="blog-post__section-num">2</span>
                        <h3 class="blog-post__section-title">묵시적 동의가 인정될 수 있는 관계와 상황인지</h3>
                    </div>
                    <p class="blog-post__text">
                        예를 들어, 사진관에서 사진을 찍기 위해 포즈를 취하는 경우, 연인과 함께 셀카를 찍기 위해 카메라 앞에 서는 경우는 묵시적 동의가 있다고 볼 수 있습니다. 묵시적 동의가 인정되려면, 상대방이 촬영을 알고 있었고, 거부하지 않았어야 합니다.
                    </p>
                </div>

                <div class="blog-post__divider-sub"></div>

                <div class="blog-post__section">
                    <div class="blog-post__section-header">
                        <span class="blog-post__section-num">3</span>
                        <h3 class="blog-post__section-title">동의했다면, 어디까지 동의했는지</h3>
                    </div>
                    <p class="blog-post__text mb-4">
                        얼굴 사진 찍는 것에는 동의했지만, 몸 전체를 찍는 것에는 동의하지 않았다면 “의사에 반한 촬영”이 될 수 있습니다. 깨어 있을 때 사진 찍는 것에는 동의했지만, 잠든 모습을 찍는 것에는 동의하지 않았다면 “의사에 반한 촬영”이 될 수 있습니다. 개인적으로 보관하기로 했는데, 다른 사람에게 보낸 경우 촬영 자체는 동의했지만, 사후 유포가 문제되며, 이 경우 성폭력범죄의 처벌 등에 관한 특례법 제14조 제2항의 "사후 유포" 범죄가 성립할 수 있습니다.
                    </p>
                    <p class="blog-post__text mb-4">“의사에 반하여” 판단을 위해 답해볼 수 있는 질문은 다음과 같습니다.</p>
                    <ul class="blog-post__list mb-4">
                        <li>촬영 전 “찍어도 돼”라고 물어봤는지?</li>
                        <li>상대방이 명확히 동의 의사를 밝혔는지?</li>
                        <li>상대방이 촬영을 알고 있었는지?</li>
                        <li>상대방이 거부할 기회가 있었는지?</li>
                        <li>동의한 범위를 벗어나지 않았는지?</li>
                        <li>협박이나 강요 없이 자유롭게 동의했는지?</li>
                    </ul>
                    <div class="blog-post__checklist">
                        <div class="blog-post__check-item">
                            <div class="blog-post__check-icon"></div>
                            <p>하나라도 “아니오”라면, 의사에 반한 촬영으로 문제될 수 있습니다.</p>
                        </div>
                    </div>
                </div>

                <a href="#" class="blog-post__more-btn">
                    더보기 <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-chevron-down-blue.svg'); ?>" alt="" />
                </a>
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
                        <p class="blog-post__law-text">
                            카메라나 그 밖에 이와 유사한 기능을 갖춘 기계장치를 이용하여 성적 욕망 또는 수치심을 유발할 수 있는 사람의 신체를 촬영대상자의 의사에 반하여 촬영한자는 7년 이하의 징역 또는 5천만원 이하의 벌금에 처한다.
                        </p>
                    </div>
                    <p class="blog-post__text mt-4">최대 징역 7년, 최대 벌금 5천만원까지 선고될 수 있으며, 법원은 이 범위 안에서 구체적인 형량을 정합니다.</p>
                </div>

                <div class="blog-post__divider-sub"></div>

                <div class="blog-post__section">
                    <div class="blog-post__section-header">
                        <span class="blog-post__section-num">2</span>
                        <h3 class="blog-post__section-title">카메라등이용촬영죄 양형기준은?</h3>
                    </div>
                    <p class="blog-post__text mb-4">양형위원회에서는 카메라등이용촬영죄를 포함한 디지털 성범죄 유형별 권고형 범위를 제시하고 있습니다. 예컨대 카메라등이용촬영죄 1유형 촬영 기준 범위는 다음과 같이 정리됩니다.</p>
                    
                    <div class="blog-post__table-wrap">
                        <table class="blog-post__table">
                            <thead>
                                <tr>
                                    <th>유형</th>
                                    <th>감경영역</th>
                                    <th>기본영역</th>
                                    <th>가중영역</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1유형 촬영</td>
                                    <td>4월 ~ 1년</td>
                                    <td>8월 ~ 2년</td>
                                    <td>1년 6월 ~ 4년</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="blog-post__checklist mt-4">
                        <div class="blog-post__check-item">
                            <div class="blog-post__check-icon"></div>
                            <p>촬영물의 내용을 쉽게 파악할 수 없는 경우, 피해 확산을 막기 위한 실질적인 조치를 한 경우, 피해자와 합의하여 피해자가 처벌을 원하지 않는 경우에는 형량이 가벼워질 수 있습니다.</p>
                        </div>
                        <div class="blog-post__check-item">
                            <div class="blog-post__check-icon"></div>
                            <p>불특정 또는 다수의 피해자를 대상으로 한 경우, 상당한 기간에 걸쳐 반복적으로 범행한 경우, 촬영물의 내용을 쉽게 파악할 수 있고 피해자의 신원이 특정 가능한 경우, 영리 목적이 있는 경우에는 형량이 무거워질 수 있습니다.</p>
                        </div>
                    </div>
                </div>

                <div class="blog-post__qa">
                    <div class="blog-post__qa-q">
                        <span class="blog-post__qa-icon">Q</span>
                        <span class="blog-post__qa-text">촬영 후 즉시 삭제를 했다면, 형량이 가벼워질 수 있나요?</span>
                    </div>
                    <div class="blog-post__qa-a">
                        <span class="blog-post__qa-icon blog-post__qa-icon--a">A</span>
                        <span class="blog-post__qa-text">촬영 후 즉시 삭제했더라도, 촬영 행위 자체가 이미 범죄를 구성합니다. 다만, 즉시 삭제한 것은 형량을 정할 때 유리한 사정으로 고려될 수는 있습니다.</span>
                    </div>
                </div>

                <a href="#" class="blog-post__more-btn">
                    더보기 <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-chevron-down-blue.svg'); ?>" alt="" />
                </a>
            </div>

            <div class="blog-post__divider"></div>

            <div class="blog-post__conclusion">
                <h3 class="blog-post__conclusion-title">서울성범죄전문변호사 | 법률사무소 평정이 돕겠습니다</h3>
                <ul class="blog-post__list blog-post__list--white mb-4">
                    <li>카메라등이용촬영죄는 촬영 자체가 핵심이지만, 실무에서는 의사에 반하여의 해석과 동의 범위가 중요합니다.</li>
                    <li>연인 사이 촬영이라도 동의가 포괄되는 구조가 아니며, 동의 범위를 벗어나면 범죄 성립이 문제 될 수 있습니다.</li>
                    <li>조문상 법정형과 별개로, 양형기준은 유형별 권고 범위를 제시해 실제 형의 범위 판단에 참고가 됩니다.</li>
                </ul>
                <p class="blog-post__conclusion-text">
                    법률사무소 평정은 사실관계를 쪼개어 쟁점을 정리하고, 동의의 범위와 의사에 반했는지 판단 요소를 구조화해 사건의 방향이 흔들리지 않도록 돕습니다. 당신의 일상이 ‘평정’을 되찾도록, 끝까지 함께하겠습니다.
                </p>
            </div>

            <div class="blog-post__divider"></div>

            <div class="blog-post__faq">
                <h3 class="blog-post__faq-title">자주 묻는 질문 3가지</h3>
                <div class="blog-post__faq-list">
                    <div class="blog-post__faq-item">
                        <span class="blog-post__faq-icon">Q</span>
                        <span class="blog-post__faq-text">동의하고 찍었는데도 처벌될 수 있나요?</span>
                    </div>
                    <div class="blog-post__faq-item">
                        <span class="blog-post__faq-icon">Q</span>
                        <span class="blog-post__faq-text">연인 관계면 의사에 반하여가 쉽게 부정되나요?</span>
                    </div>
                    <div class="blog-post__faq-item">
                        <span class="blog-post__faq-icon">Q</span>
                        <span class="blog-post__faq-text">촬영물 유포가 없으면 형이 가벼워지나요?</span>
                    </div>
                </div>
            </div>

            <div class="blog-post__actions">
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="blog-post__list-btn">목록</a>
            </div>

            <div class="blog-post__nav-links">
                <a href="#" class="blog-post__nav-prev">
                    <div class="blog-post__nav-icon">
                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.49902 13.06L0.477021 7L7.49902 0.939999" stroke="#181A1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Prev</span>
                    </div>
                    <span class="blog-post__nav-text">이전 게시물이 없습니다.</span>
                </a>
                <a href="#" class="blog-post__nav-next">
                    <div class="blog-post__nav-icon">
                        <span>Next</span>
                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.500977 13.06L7.52298 7L0.500977 0.939999" stroke="#181A1E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <span class="blog-post__nav-text">시스템 점검으로 인한 일부 시스템 이용 불가</span>
                </a>
            </div>
        </div>

        <aside class="blog-post__sidebar">
            <div class="sidebar-card sidebar-card--dark">
                <div class="sidebar-card__header sidebar-card__header--dark">
                    <h3 class="sidebar-card__title">관련 대응전략</h3>
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right.svg'); ?>" alt="" class="sidebar-card__header-icon" />
                </div>
                <div class="sidebar-card__content">
                    <a href="#" class="sidebar-card__item sidebar-card__item--white">
                        <span class="sidebar-card__item-text">보이스피싱 전달책 사기 혐의<br/>의뢰인 불기소 처분</span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-small.svg'); ?>" alt="" />
                    </a>
                    <a href="#" class="sidebar-card__item sidebar-card__item--white">
                        <span class="sidebar-card__item-text">교통사고 후 미조치, 불기소</span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-small.svg'); ?>" alt="" />
                    </a>
                    <a href="#" class="sidebar-card__item sidebar-card__item--white">
                        <span class="sidebar-card__item-text">뺑소니 혐의 의뢰인 무죄 판결</span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-small.svg'); ?>" alt="" />
                    </a>
                </div>
            </div>

            <div class="sidebar-card sidebar-card--dark">
                <div class="sidebar-card__header sidebar-card__header--dark">
                    <h3 class="sidebar-card__title">주요 업무 사례</h3>
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right.svg'); ?>" alt="" class="sidebar-card__header-icon" />
                </div>
                <div class="sidebar-card__content">
                    <a href="#" class="sidebar-card__item sidebar-card__item--white">
                        <span class="sidebar-card__item-text">보이스피싱 전달책 사기 혐의<br/>의뢰인 불기소 처분</span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-small.svg'); ?>" alt="" />
                    </a>
                    <a href="#" class="sidebar-card__item sidebar-card__item--white">
                        <span class="sidebar-card__item-text">교통사고 후 미조치, 불기소</span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-small.svg'); ?>" alt="" />
                    </a>
                    <a href="#" class="sidebar-card__item sidebar-card__item--white">
                        <span class="sidebar-card__item-text">뺑소니 혐의 의뢰인 무죄 판결</span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-small.svg'); ?>" alt="" />
                    </a>
                </div>
            </div>

            <div class="sidebar-card sidebar-card--light">
                <div class="sidebar-card__header">
                    <h3 class="sidebar-card__title">연관 글</h3>
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-dark.svg'); ?>" alt="" class="sidebar-card__header-icon" />
                </div>
                <div class="sidebar-card__content">
                    <a href="#" class="sidebar-card__item sidebar-card__item--dark">
                        <span class="sidebar-card__item-text">몰카 고소 대응방법 체크리스트</span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-small-dark.svg'); ?>" alt="" />
                    </a>
                    <a href="#" class="sidebar-card__item sidebar-card__item--dark">
                        <span class="sidebar-card__item-text">촬영물 유포 협박이 문제 되는 경우</span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-small-dark.svg'); ?>" alt="" />
                    </a>
                    <a href="#" class="sidebar-card__item sidebar-card__item--dark">
                        <span class="sidebar-card__item-text">카메라등이용촬영죄 양형기준<br/>1유형 정리 ~~~</span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-arrow-right-small-dark.svg'); ?>" alt="" />
                    </a>
                </div>
            </div>
        </aside>
    </div>

    <section class="blog-search" style="margin-top: 100px;">
        <div class="container">
            <h2 class="blog-post__search-title" style="text-align: center; margin-bottom: 40px; font-family: 'Pretendard', sans-serif; font-weight: 700; font-size: 32px; letter-spacing: -0.96px; color: #1A2E69;">더 궁금한 점이 있으신가요?</h2>
            <div class="blog-search__box">
                <input type="text" class="blog-search__input" placeholder="검색어를 입력해주세요." />
                <button class="blog-search__button" aria-label="검색">
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-search.svg'); ?>" alt="" />
                </button>
            </div>
            <div class="blog-search__tags">
                <span class="blog-search__tag">#사이버범죄</span>
                <span class="blog-search__tag">#따돌림</span>
                <span class="blog-search__tag">#분리조치</span>
                <span class="blog-search__tag">#학폭위</span>
                <span class="blog-search__tag">#생기부</span>
            </div>
        </div>
    </section>

    <footer class="footer blog-footer" role="contentinfo" style="margin-top: 100px;">
        <div class="footer-bottom blog-footer__bottom">
            <div class="container">
                <div class="footer-legal">
                    <div class="legal-top">
                        <a href="<?php echo esc_url(home_url('/directions/')); ?>">오시는길</a>
                        <span class="divider"></span>
                        <a href="<?php echo esc_url(home_url('/privacy/')); ?>" class="bold">개인정보처리방침</a>
                    </div>
                    <div class="legal-separator"></div>
                    <div class="legal-bottom">
                        <div class="legal-info">
                            <p>경기도 수원시 장안구 경수대로 976번길 19(송죽동)       Tel : 070-7800-2114</p>
                            <p class="copyright">Copyright ⓒ Pyeongjeong. All Rights Reserved</p>
                        </div>
                        <div class="footer-logo-wrap">
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/blog/footer-logo.png'); ?>" alt="법률사무소 평정" class="footer-logo" />
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="scroll-top">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/home/scroll-top.svg'); ?>" alt="Top" />
            </a>
        </div>
    </footer>

    <?php pjlaw_render_quick_actions_menu(); ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
