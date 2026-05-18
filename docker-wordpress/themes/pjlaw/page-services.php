<?php
/**
 * Services (업무분야) Page Template
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

$is_detail = isset($_GET['service']);
$service_name = $is_detail ? sanitize_text_field($_GET['service']) : '';

get_header();

$theme_uri = get_template_directory_uri();
?>

<main id="main" class="site-main services-page" role="main">
    <?php if ($is_detail) : ?>
        <div class="blog-post-nav">
            <div class="blog-post-nav__inner">
                <div class="blog-post-nav__links">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="blog-post-nav__home-link" aria-label="<?php esc_attr_e('홈으로 이동', 'pjlaw'); ?>">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-home-nav.svg'); ?>" alt="" aria-hidden="true" class="blog-post-nav__icon" width="19" height="18" />
                    </a>
                    <div class="blog-post-nav__separator"></div>
                    <div class="blog-post-nav__current">
                        <span class="blog-post-nav__title"><?php echo esc_html($service_name); ?></span>
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-chevron-down-small.svg'); ?>" alt="" />
                    </div>
                    <div class="blog-post-nav__separator"></div>
                </div>
                <a href="<?php echo esc_url(home_url('/services/')); ?>" class="blog-post-nav__close-link" aria-label="<?php esc_attr_e('목록으로 돌아가기', 'pjlaw'); ?>">
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/blog/icon-close-nav.svg'); ?>" alt="" aria-hidden="true" class="blog-post-nav__icon-close" width="20" height="20" />
                </a>
            </div>
            <div class="blog-post-nav__line-wrap">
                <div class="blog-post-nav__line-bg"></div>
                <div class="blog-post-nav__line-active"></div>
            </div>
        </div>
        <section class="sd-header">
            <div class="container sd-header__inner">
                <div class="sd-header__content">
                    <div class="sd-header__breadcrumb">민사 / <?php echo esc_html($service_name); ?></div>
                    <h1 class="sd-header__title"><?php echo esc_html($service_name); ?></h1>
                    <div class="sd-header__pills">
                        <span class="sd-header__pill">#정보통신망명예훼손</span>
                        <span class="sd-header__pill">#허위사실</span>
                        <span class="sd-header__pill">#사실적시</span>
                        <span class="sd-header__pill">#공공의이익</span>
                        <span class="sd-header__pill">#모욕</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="sd-layout">
            <div class="container sd-layout__inner">
                <div class="sd-main">
                    <div class="sd-section-title">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-section-header.svg'); ?>" alt="" class="sd-section-title__icon" />
                        <h2>명예훼손의 개념, 처벌수위 및 쟁점</h2>
                    </div>

                    <div class="sd-cards">
                        <!-- Card 1 -->
                        <div class="sd-card">
                            <div class="sd-card__header">
                                <div class="sd-card__number">1</div>
                                <h3 class="sd-card__heading">명예훼손 개념</h3>
                            </div>
                            <div class="sd-card__divider"></div>
                            <div class="sd-card__body">
                                <p>명예훼손은 "공연히 사실을 적시"하여 사람(또는 사자)의 사회적 평가를 떨어뜨리는 행위를 말합니다(형법 제307조). 내용이 진실이더라도 성립할 수 있고(사실적시 명예훼손), 허위사실이면 더 무겁게 처벌됩니다.</p>
                                <p>온라인 게시글은 정보통신망법이 별도로 문제될 수 있으며, 이 경우 '비방할 목적'이 추가 요건이 됩니다(정보통신망법 제70조).</p>
                                <p>또한 사실적시 명예훼손은 진실한 사실로서 오로지 공공의 이익에 관한 때 위법성이 조각되어 처벌하지 않는 예외가 있습니다(형법 제310조).</p>

                                <div class="sd-card__inner-divider"></div>

                                <h4 class="sd-card__subheading">형사적 쟁점</h4>
                                <div class="sd-table-wrap">
                                    <table class="sd-table">
                                        <thead>
                                            <tr>
                                                <th>구분</th>
                                                <th>핵심 쟁점</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>특정성</td>
                                                <td>피해자가 특정되는지(실명뿐 아니라 주변 정황으로 특정 가능 여부)</td>
                                            </tr>
                                            <tr>
                                                <td>공연성</td>
                                                <td>불특정 또는 다수가 인식할 수 있는 상태인지</td>
                                            </tr>
                                            <tr>
                                                <td>사실의 적시</td>
                                                <td>의견·평가가 아니라 구체적 사실을 드러냈는지(모욕과의 구별)</td>
                                            </tr>
                                            <tr>
                                                <td>진실/허위</td>
                                                <td>사실적시(형법 제307조 제1항)인지 허위사실(형법 제307조 제2항)인지</td>
                                            </tr>
                                            <tr>
                                                <td>공공의 이익</td>
                                                <td>사실적시인 경우 '진실한 사실 + 오로지 공공의 이익'이면 위법성 조각(형법 제310조)</td>
                                            </tr>
                                            <tr>
                                                <td>비방 목적</td>
                                                <td>출판물/정보통신망 유형(형법 제309조, 정보통신망법 제70조)은 '비방 목적'이 성립요건</td>
                                            </tr>
                                            <tr>
                                                <td>의사에 반한 공소</td>
                                                <td>형법 제307조·제309조는 피해자 의사에 반해 공소 제기 불가(반의사불벌죄, 형법 제312조 제2항)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="sd-card__inner-divider"></div>

                                <h4 class="sd-card__subheading">관련 법조항</h4>
                                <div class="sd-law-blocks">
                                    <div class="sd-law-block">
                                        <div class="sd-law-block__header">
                                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-law.svg'); ?>" alt="" />
                                            <h5>형법 제310조(위법성의 조각) 제307조</h5>
                                        </div>
                                        <div class="sd-law-block__body">
                                            <p>제1항의 행위가 진실한 사실로서 오로지 공공의 이익에 관한 때에는 처벌하지 아니한다.</p>
                                        </div>
                                    </div>
                                    <div class="sd-law-block">
                                        <div class="sd-law-block__header">
                                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-law.svg'); ?>" alt="" />
                                            <h5>형법 제312조(고소와 피해자의 의사)</h5>
                                        </div>
                                        <div class="sd-law-block__body">
                                            <p>② 제307조와 제309조의 죄는 피해자의 명시한 의사에 반하여 공소를 제기할 수 없다.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="sd-card">
                            <div class="sd-card__header">
                                <div class="sd-card__number">2</div>
                                <h3 class="sd-card__heading">명예훼손 처벌 수위</h3>
                            </div>
                            <div class="sd-card__divider"></div>
                            <div class="sd-card__body">
                                <p>형법상 <strong>사실적시 명예훼손</strong>은 2년 이하 징역·금고 또는 500만원 이하 벌금, <strong>허위사실 적시 명예훼손</strong>은 5년 이하 징역, 10년 이하 자격정지 또는 1천만원 이하 벌금입니다(형법 제307조).</p>
                                <p><strong>출판물 등에 의한 경우</strong>에는 비방 목적이 있으면 사실적시도 3년 이하 징역·금고 또는 700만원 이하 벌금, 허위사실은 7년 이하 징역, 10년 이하 자격정지 또는 1천만원 이하 벌금입니다(형법 제309조).</p>
                                <p><strong>온라인(정보통신망)으로 비방 목적으로 사실을 드러낸 경우</strong>는 3년 이하 징역 또는 3천만원 이하 벌금, 허위사실은 7년 이하 징역, 10년 이하 자격정지 또는 5천만원 이하 벌금에 처해집니다(정보통신망법 제70조).</p>

                                <div class="sd-card__inner-divider"></div>

                                <h4 class="sd-card__subheading">관련 법조항</h4>
                                <div class="sd-law-blocks">
                                    <div class="sd-law-block">
                                        <div class="sd-law-block__header">
                                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-law.svg'); ?>" alt="" />
                                            <h5>형법 제307조(명예훼손)</h5>
                                        </div>
                                        <div class="sd-law-block__body">
                                            <p>① 공연히 사실을 적시하여 사람의 명예를 훼손한 자는 2년 이하의 징역이나 금고 또는 500만원 이하의 벌금에 처한다.<br>② 공연히 허위의 사실을 적시하여 사람의 명예를 훼손한 자는 5년 이하의 징역, 10년 이하의 자격정지 또는 1천만원 이하의 벌금에 처한다.</p>
                                        </div>
                                    </div>
                                    <div class="sd-law-block">
                                        <div class="sd-law-block__header">
                                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-law.svg'); ?>" alt="" />
                                            <h5>형법 제309조(출판물등에 의한 명예훼손)</h5>
                                        </div>
                                        <div class="sd-law-block__body">
                                            <p>① 사람을 비방할 목적으로 신문, 잡지 또는 라디오 기타 출판물에 의하여 제307조제1항의 죄를 범한 자는 3년 이하의 징역이나 금고 또는 700만원 이하의 벌금에 처한다.<br>② 전항의 방법으로 제307조제2항의 죄를 범한 자는 7년 이하의 징역, 10년 이하의 자격정지 또는 1천만원 이하의 벌금에 처한다.</p>
                                        </div>
                                    </div>
                                    <div class="sd-law-block">
                                        <div class="sd-law-block__header">
                                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-law.svg'); ?>" alt="" />
                                            <h5>정보통신망 이용촉진 및 정보보호 등에 관한 법률 제70조(벌칙)</h5>
                                        </div>
                                        <div class="sd-law-block__body">
                                            <p>① 사람을 비방할 목적으로 정보통신망을 통하여 공공연하게 사실을 드러내어 다른 사람의 명예를 훼손한 자는 3년 이하의 징역 또는 3천만원 이하의 벌금에 처한다.<br>② 사람을 비방할 목적으로 정보통신망을 통하여 공공연하게 거짓의 사실을 드러내어 다른 사람의 명예를 훼손한 자는 7년 이하의 징역, 10년 이하의 자격정지 또는 5천만원 이하의 벌금에 처한다.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="sd-card">
                            <div class="sd-card__header">
                                <div class="sd-card__number">3</div>
                                <h3 class="sd-card__heading">명예훼손 양형 기준</h3>
                            </div>
                            <div class="sd-card__divider"></div>
                            <div class="sd-card__body">
                                <p>대법원 양형위원회 양형기준은 '허위사실 적시 명예훼손'에 대해 권고형량 범위를 제시합니다.</p>
                                <p>사실적시 명예훼손(형법 제307조 제1항)은 비범죄화 요구가 많은 점을 고려해 별도 양형기준을 설정하지 않았으므로, 실무에서는 행위 태양(전파가능성·피해 정도·동기 등)과 감경·가중 요소가 형에 큰 영향을 줍니다.</p>
                                
                                <div class="sd-table-wrap">
                                    <table class="sd-table sd-table--4col">
                                        <thead>
                                            <tr>
                                                <th>유형</th>
                                                <th>구분</th>
                                                <th>감경영역</th>
                                                <th>기본영역</th>
                                                <th>가중영역</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>제1유형</td>
                                                <td>일반 명예훼손(허위사실 적시)</td>
                                                <td>벌금형 ~ 징역 6월</td>
                                                <td>징역 4월 ~ 1년</td>
                                                <td>징역 6월 ~ 1년 6월</td>
                                            </tr>
                                            <tr>
                                                <td>제2유형</td>
                                                <td>출판물등·정보통신망 이용 명예훼손<br>(허위사실 적시)</td>
                                                <td>벌금형 ~ 징역 8월</td>
                                                <td>징역 6월 ~ 1년 4월</td>
                                                <td>징역 8월 ~ 2년 6월</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="sd-card">
                            <div class="sd-card__header">
                                <div class="sd-card__number">4</div>
                                <h3 class="sd-card__heading">명예훼손 민사적 쟁점</h3>
                            </div>
                            <div class="sd-card__divider"></div>
                            <div class="sd-card__body">
                                <p>명예훼손은 형사책임과 별개로 <strong>민사상 불법행위 책임</strong>이 함께 문제될 수 있습니다.</p>
                                <p>대표적으로 위자료(정신적 손해) 청구가 가능하고, 법원은 손해배상에 갈음하거나 손해배상과 함께 명예회복에 적당한 처분을 명할 수 있습니다(민법 제764조).</p>
                                <p>다만 '명예회복 처분'의 내용은 사건별로 쟁점이 되며, 무엇이 명예를 침해했는지(표현의 내용·전파 범위·기간 등)와 손해의 정도가 중심으로 다뤄집니다.</p>
                                <p>민사상 명예훼손이 성립하기 위해서는 피해자의 사회적 가치 내지 평가가 침해될 가능성이 있는 구체적 사실을 적시하여야 합니다.</p>

                                <div class="sd-card__inner-divider"></div>

                                <h4 class="sd-card__subheading">관련 법조항</h4>
                                <div class="sd-law-blocks">
                                    <div class="sd-law-block">
                                        <div class="sd-law-block__header">
                                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-law.svg'); ?>" alt="" />
                                            <h5>민법 제751조(재산 이외의 손해의 배상)</h5>
                                        </div>
                                        <div class="sd-law-block__body">
                                            <p>① 타인의 신체, 자유 또는 명예를 해하거나 기타 정신상 고통을 가한 자는 재산 이외의 손해에 대하여도 배상할 책임이 있다.</p>
                                        </div>
                                    </div>
                                    <div class="sd-law-block">
                                        <div class="sd-law-block__header">
                                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-law.svg'); ?>" alt="" />
                                            <h5>민법 제764조(명예훼손의 경우의 특칙)</h5>
                                        </div>
                                        <div class="sd-law-block__body">
                                            <p>타인의 명예를 훼손한 자에 대하여는 법원은 피해자의 청구에 의하여 손해배상에 갈음하거나 손해배상과 함께 명예회복에 적당한 처분을 명할 수 있다.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- /.sd-cards -->

                    <div class="sd-cards-divider"></div>

                    <div class="sd-section-title">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-section-header.svg'); ?>" alt="" class="sd-section-title__icon" />
                        <h2>법률사무소 평정이 함께합니다</h2>
                    </div>
                    <div class="sd-card sd-pjlaw-card">
                        <div class="sd-card__body">
                            <p>명예훼손은 누구나 피해자가 될 수 있는 동시에, 한순간의 실수로 의도치 않게 가해자로 지목될 수도 있는 사건입니다.</p>
                            <p>특히 온라인상의 발언은 찰나의 순간에 전파되어 누군가에게는 회복하기 어려운 인격적 상처를 남기고, 다른 누군가에게는 과도한 형사 처벌과 경제적 손실이라는 위기를 불러오기도 합니다. 사건의 본질이 정당한 비판이었는지 아니면 악의적인 비방이었는지를 가려내는 일은 단순히 사실관계를 확인하는 수준을 넘어, 고도의 법리적 해석과 치밀한 논리 싸움이 동반되어야 하는 과정입니다.</p>
                            <p>법률사무소 평정은 소중한 명예를 침해당한 피해자에게는 실효성 있는 증거 수집과 단호한 대응으로 실추된 평판을 되찾아드리고, 억울하게 고소를 당한 가해 피의자에게는 발언의 공익성과 비방 목적의 부재를 입증하여 부당한 처벌로부터 방어해 드립니다. 명예훼손 사건의 핵심인 특정성, 공연성, 위법성 조각 사유 등을 정밀하게 분석함으로써, 의뢰인이 처한 각자의 입장에서 가장 유리한 판결과 합리적인 합의를 이끌어낼 수 있는 맞춤형 전략을 구축합니다.</p>
                            <p>법이라는 잣대가 누군가에게는 정당한 구제가 되고, 누군가에게는 가혹한 올가미가 되지 않도록 의뢰인의 권익을 최우선으로 보호합니다. 피해와 방어라는 서로 다른 입장에 서 있더라도, 결국 법률사무소 평정이 지향하는 가치는 왜곡된 사실을 바로잡고 일상의 평온을 되찾아드리는 데 있습니다.</p>
                            <p>예기치 못한 분쟁으로 법적 조력이 간절한 순간, 평정이 쌓아온 전문성이 여러분의 명예와 일상을 지키는 든든한 방패가 되어드리겠습니다.</p>
                        </div>
                    </div>

                    <div class="sd-list-btn-wrap">
                        <a href="<?php echo esc_url(home_url('/services/')); ?>" class="sd-list-btn">목록</a>
                    </div>

                    <div class="sd-nav-row">
                        <div class="sd-nav-item sd-nav-prev">
                            <div class="sd-nav-link-wrap">
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-arrow-prev.svg'); ?>" alt="Prev" />
                                <span>Prev</span>
                            </div>
                            <div class="sd-nav-text">이전 게시물이 없습니다.</div>
                        </div>
                        <div class="sd-nav-item sd-nav-next">
                            <div class="sd-nav-link-wrap">
                                <span>Next</span>
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-arrow-next.svg'); ?>" alt="Next" />
                            </div>
                            <div class="sd-nav-text">시스템 점검으로 인한 일부 시스템 이용 불가</div>
                        </div>
                    </div>
                </div> <!-- /.sd-main -->

                <div class="sd-sidebar">
                    <div class="sd-sidebar__top-icon">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-top.svg'); ?>" alt="" />
                    </div>
                    
                    <div class="sd-sidebar-card">
                        <div class="sd-sidebar-card__header">
                            <h3>관련 법률정보</h3>
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-chevron.svg'); ?>" alt="" />
                        </div>
                        <div class="sd-sidebar-card__list">
                            <a href="#" class="sd-sidebar-card__item">
                                <span>보이스피싱 전달책 사기 혐의<br>의뢰인 불기소 처분</span>
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-arrow-active.svg'); ?>" alt="" />
                            </a>
                            <a href="#" class="sd-sidebar-card__item">
                                <span>교통사고 후 미조치, 불기소</span>
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-arrow.svg'); ?>" alt="" />
                            </a>
                            <a href="#" class="sd-sidebar-card__item">
                                <span>뺑소니 혐의 의뢰인 무죄 판결</span>
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-arrow.svg'); ?>" alt="" />
                            </a>
                        </div>
                    </div>

                    <div class="sd-sidebar-card">
                        <div class="sd-sidebar-card__header">
                            <h3>관련 대응전략</h3>
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-chevron.svg'); ?>" alt="" />
                        </div>
                        <div class="sd-sidebar-card__list">
                            <a href="#" class="sd-sidebar-card__item">
                                <span>보이스피싱 전달책 사기 혐의<br>의뢰인 불기소 처분</span>
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-arrow-active.svg'); ?>" alt="" />
                            </a>
                            <a href="#" class="sd-sidebar-card__item">
                                <span>교통사고 후 미조치, 불기소</span>
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-arrow.svg'); ?>" alt="" />
                            </a>
                            <a href="#" class="sd-sidebar-card__item">
                                <span>뺑소니 혐의 의뢰인 무죄 판결</span>
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-arrow.svg'); ?>" alt="" />
                            </a>
                        </div>
                    </div>

                    <div class="sd-sidebar-card">
                        <div class="sd-sidebar-card__header">
                            <h3>관련 업무사례</h3>
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-chevron.svg'); ?>" alt="" />
                        </div>
                        <div class="sd-sidebar-card__list">
                            <a href="#" class="sd-sidebar-card__item">
                                <span>보이스피싱 전달책 사기 혐의<br>의뢰인 불기소 처분</span>
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-arrow-active.svg'); ?>" alt="" />
                            </a>
                            <a href="#" class="sd-sidebar-card__item">
                                <span>교통사고 후 미조치, 불기소</span>
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-arrow.svg'); ?>" alt="" />
                            </a>
                            <a href="#" class="sd-sidebar-card__item">
                                <span>뺑소니 혐의 의뢰인 무죄 판결</span>
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sidebar-arrow.svg'); ?>" alt="" />
                            </a>
                        </div>
                    </div>
                </div> <!-- /.sd-sidebar -->
            </div>
        </section>

    <?php else : ?>
        <section class="services-hero">
        <div class="services-hero__bg">
            <img src="<?php echo esc_url($theme_uri . '/assets/images/services/hero.png'); ?>" alt="" class="services-hero__image" />
            <div class="services-hero__gradient"></div>
        </div>
        
        <div class="container services-hero__inner">
            <div class="services-hero__content">
                <div class="services-hero__eyebrow-wrap">
                    <span class="services-hero__eyebrow">업무분야</span>
                    <span class="services-hero__eyebrow-line"></span>
                </div>
                <h1 class="services-hero__title">
                    법률사무소 평정은 분야별<br />
                    구성원과 함께합니다
                </h1>
            </div>
            
            <div class="services-hero__breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="services-hero__breadcrumb-icon">
                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 6.5L7 1.5L13 6.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 5.5V13.5H12V5.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
                <span class="services-hero__breadcrumb-arrow">
                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 9L5 5L1 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                <span class="services-hero__breadcrumb-current">업무분야</span>
                <span class="services-hero__breadcrumb-dropdown">
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5 5L9 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
        </div>
    </section>

    <section class="services-search">
        <div class="container">
            <div class="services-search__box">
                <input type="text" class="services-search__input" placeholder="검색어를 입력해주세요." />
                <button class="services-search__button" aria-label="검색">
                    <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-search.svg'); ?>" alt="" />
                </button>
            </div>
            <div class="services-search__tags">
                <span class="services-search__tag">#사이버범죄</span>
                <span class="services-search__tag">#따돌림</span>
                <span class="services-search__tag">#분리조치</span>
                <span class="services-search__tag">#학폭위</span>
                <span class="services-search__tag">#생기부</span>
            </div>
        </div>
    </section>

    <section class="services-content">
        <div class="container">
            <div class="services-tabs">
                <div class="services-tab active" data-target="tab-category">
                    <span class="services-tab__text">분야별</span>
                </div>
                <div class="services-tab" data-target="tab-all">
                    <span class="services-tab__text">전체</span>
                </div>
            </div>

            <div id="tab-category" class="services-tab-content active">
                <div class="services-grid">
                    <a href="#civil" class="services-grid__item active">
                        <div class="services-grid__icon">
                            <svg width="36" height="30" viewBox="0 0 37 30" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M18 4.31543C18.9306 4.31543 19.6846 5.0694 19.6846 6V26.4346H16.3154V6C16.3154 5.0694 17.0694 4.31543 18 4.31543Z" stroke="#181A1E" stroke-width="1.88"/>
                                <rect x="16.315" y="0.94" width="3.37" height="3.37" rx="1.685" stroke="#181A1E" stroke-width="1.88"/>
                                <rect x="5.88867" y="5.49414" width="11.087" height="1.875" rx="0.9375" fill="#181A1E"/>
                                <rect x="19.1895" y="5.49414" width="11.087" height="1.875" rx="0.9375" fill="#181A1E"/>
                                <path d="M12.4717 17.0654C12.0308 19.4105 9.97314 21.1846 7.5 21.1846H6C3.52686 21.1846 1.46918 19.4105 1.02832 17.0654H12.4717Z" fill="#88A6FF" stroke="#181A1E" stroke-width="1.88"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.69628 5.53469C7.07788 5.5131 7.44998 5.72785 7.61034 6.09914L12.0156 16.2993C12.2205 16.7745 12.0014 17.3255 11.5264 17.5308C11.0511 17.7361 10.4993 17.5178 10.2939 17.0425L6.70116 8.72414L3.10839 17.0425C2.90298 17.5177 2.3512 17.7361 1.87596 17.5308C1.40092 17.3253 1.18241 16.7735 1.38768 16.2984L5.79296 6.09914C5.95183 5.73139 6.3185 5.5177 6.69628 5.53469Z" fill="#181A1E"/>
                                <path d="M35.1279 17.0654C34.6871 19.4105 32.6294 21.1846 30.1562 21.1846H28.6562C26.1831 21.1846 24.1254 19.4105 23.6846 17.0654H35.1279Z" fill="#88A6FF" stroke="#181A1E" stroke-width="1.88"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M29.3486 5.53469C29.7302 5.5131 30.1023 5.72785 30.2627 6.09914L34.668 16.2993C34.8729 16.7745 34.6538 17.3255 34.1787 17.5308C33.7034 17.7361 33.1516 17.5178 32.9463 17.0425L29.3535 8.72414L25.7607 17.0425C25.5553 17.5177 25.0035 17.7361 24.5283 17.5308C24.0533 17.3253 23.8348 16.7735 24.04 16.2984L28.4453 6.09914C28.6042 5.73139 28.9708 5.5177 29.3486 5.53469Z" fill="#181A1E"/>
                                <rect x="10.125" y="25.5" width="15.75" height="1.875" rx="0.9375" fill="#181A1E"/>
                                <rect x="7.875" y="28.125" width="20.25" height="1.875" rx="0.9375" fill="#181A1E"/>
                            </svg>
                        </div>
                        <span class="services-grid__label">민사</span>
                    </a>
                    <a href="#criminal" class="services-grid__item">
                        <div class="services-grid__icon">
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-criminal.svg'); ?>" alt="" />
                        </div>
                        <span class="services-grid__label">형사</span>
                    </a>
                    <a href="#sexual" class="services-grid__item">
                        <div class="services-grid__icon">
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-sexual-crime.svg'); ?>" alt="" />
                        </div>
                        <span class="services-grid__label">성범죄</span>
                    </a>
                    <a href="#divorce" class="services-grid__item">
                        <div class="services-grid__icon">
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-divorce.svg'); ?>" alt="" />
                        </div>
                        <span class="services-grid__label">이혼</span>
                    </a>
                    <a href="#inheritance" class="services-grid__item">
                        <div class="services-grid__icon">
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-inheritance.svg'); ?>" alt="" />
                        </div>
                        <span class="services-grid__label">상속</span>
                    </a>
                    <a href="#realestate" class="services-grid__item">
                        <div class="services-grid__icon">
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-real-estate.svg'); ?>" alt="" />
                        </div>
                        <span class="services-grid__label">부동산</span>
                    </a>
                    <a href="#corporate" class="services-grid__item">
                        <div class="services-grid__icon corporate-icon">
                            <!-- Custom CSS drawn icon for corporate or use SVG if available -->
                            <div class="corporate-icon-wrapper">
                                <div class="corporate-building-1"></div>
                                <div class="corporate-building-2"></div>
                                <div class="corporate-building-3"></div>
                            </div>
                        </div>
                        <span class="services-grid__label">기업</span>
                    </a>
                </div>

                <div class="services-details">
                    <div class="services-details__header">
                        <h2 class="services-details__title">민사 분야</h2>
                        <div class="services-details__desc">
                            <p>형사 사건은 초기 대응에 따라 기소 여부와 처벌 수위가 달라집니다. 첫 조사에서의 진술, 자료 제출의 순서, 표현 하나까지 모두 수사 기록으로 남는 만큼, 사건을 정확히 이해한 상태에서 신중하게<br/>대응할 필요가 있습니다.</p>
                            <p>법률사무소 평정은 수사 단계부터 공판 단계 전 과정에서 의뢰인에게 불리한 판단이 고착되지 않도록 관리합니다. 형사 사건에 대한 많은 경험을 바탕으로 함께하겠습니다.</p>
                        </div>
                    </div>

                    <div class="services-details__divider"></div>

                    <div class="services-details__sub">
                        <h3 class="services-details__sub-title">민사 사건의 세부 업무분야</h3>
                        <div class="services-details__sub-tags">
                            <span class="services-details__sub-tag">손해배상</span>
                            <span class="services-details__sub-tag">부당이득금</span>
                            <span class="services-details__sub-tag">대여금</span>
                            <span class="services-details__sub-tag">매매대금</span>
                            <span class="services-details__sub-tag">구상</span>
                            <span class="services-details__sub-tag">계약해지/해제</span>
                            <span class="services-details__sub-tag">내용증명</span>
                            <span class="services-details__sub-tag">가압류/가처분</span>
                            <span class="services-details__sub-tag">손해배상</span>
                            <span class="services-details__sub-tag">부당이득금</span>
                            <span class="services-details__sub-tag">대여금</span>
                            <span class="services-details__sub-tag">매매대금</span>
                            <span class="services-details__sub-tag">구상</span>
                            <span class="services-details__sub-tag">계약해지/해제</span>
                            <span class="services-details__sub-tag">내용증명</span>
                            <span class="services-details__sub-tag">가압류/가처분</span>
                        </div>
                    </div>
                    <div class="services-details__divider"></div>
                </div>
            </div>

            <div id="tab-all" class="services-tab-content">
                <div class="services-alpha-nav">
                    <button class="services-alpha-item active">
                        <span class="char">가</span>
                        <span class="count">30</span>
                    </button>
                    <button class="services-alpha-item">
                        <span class="char">나</span>
                        <span class="count">20</span>
                    </button>
                    <button class="services-alpha-item">
                        <span class="char">다</span>
                        <span class="count">15</span>
                    </button>
                    <button class="services-alpha-item">
                        <span class="char">라</span>
                        <span class="count">34</span>
                    </button>
                    <button class="services-alpha-item">
                        <span class="char">마</span>
                        <span class="count">14</span>
                    </button>
                    <button class="services-alpha-item">
                        <span class="char">바</span>
                        <span class="count">06</span>
                    </button>
                    <button class="services-alpha-item">
                        <span class="char">사</span>
                        <span class="count">17</span>
                    </button>
                    <button class="services-alpha-item">
                        <span class="char">아</span>
                        <span class="count">17</span>
                    </button>
                    <button class="services-alpha-item">
                        <span class="char">자</span>
                        <span class="count">17</span>
                    </button>
                    <button class="services-alpha-item">
                        <span class="char">카</span>
                        <span class="count">17</span>
                    </button>
                    <button class="services-alpha-item">
                        <span class="char">타</span>
                        <span class="count">17</span>
                    </button>
                    <button class="services-alpha-item">
                        <span class="char">파</span>
                        <span class="count">17</span>
                    </button>
                </div>

                <div class="services-all-content">
                    <h2 class="services-all-title">업무분야를 선택해주세요.</h2>
                    <div class="services-all-grid">
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">가등기말소</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">가사상속</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">감금</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">강간</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">강도</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">강릉 분사무소</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">강요</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">강제추행</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">개명</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">개인정보보호법위반</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">거짓말탐지기</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">건물인도</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">경범죄처벌법위반</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">계약금</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">계약해제</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">강제집행면탈</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">고양 분사무소</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">공갈</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">공무집행방해</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">공사대금</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">공연음란</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">공정거래</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">공중협박</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">관세</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">광주 분사무소</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">교통사고</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">구미 분사무소</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">국가계약</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">국가배심청구</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">국제조세</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">군법무(군형사)</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">군산 분사무소</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">군성범죄</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">군징계</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">군폭행</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">군행정</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">근로기준법</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">근저당말소</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">금융범죄</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">기업 일반소송</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">기업도산</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">기업법무</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">기업자문</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">기타가사상속</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">기타교통사고</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">기타군법무</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">기타금전</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">기타기업</a>
                        <a href="<?php echo esc_url(home_url('/services/?service=명예훼손')); ?>" class="services-all-tag">기타노동·산업재해</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <footer class="footer services-footer" role="contentinfo">
        <div class="footer-bottom services-footer__bottom">
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
                            <p>서울특별시 강남구 테헤란로 238, 마크로젠빌딩 12층       Tel : 02-554-5674</p>
                            <p class="copyright">Copyright ⓒ Pyeongjeong. All Rights Reserved</p>
                        </div>
                        <div class="footer-logo-wrap">
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/services/footer-logo.png'); ?>" alt="법률사무소 평정" class="footer-logo" />
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.services-tab');
    const contents = document.querySelectorAll('.services-tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs and contents
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            // Add active class to clicked tab
            this.classList.add('active');

            // Show corresponding content
            const targetId = this.getAttribute('data-target');
            if (targetId) {
                const targetContent = document.getElementById(targetId);
                if (targetContent) {
                    targetContent.classList.add('active');
                }
            }
        });
    });
});
</script>

<?php wp_footer(); ?>
</body>
</html>
