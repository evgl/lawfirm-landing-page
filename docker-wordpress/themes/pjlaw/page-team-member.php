<?php
/**
 * Single Team Member Page Template
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();
?>

<main id="main" class="site-main team-member-page" role="main">
    <div class="member-detail-container">
        
        <div class="member-detail-header">
            <div class="member-detail-nav">
                <div class="member-detail-nav__links">
                    <img src="<?php echo esc_url($theme_uri . '/assets/images/team/member-mask.svg'); ?>" alt="" class="member-detail-nav__icon" style="opacity: 0; width: 19px;" />
                    <div class="member-detail-nav__separator"></div>
                    <div class="member-detail-nav__current">
                        <span>이시완 변호사</span>
                        <svg width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5.5 5L10 1" stroke="#181a1e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="member-detail-nav__separator"></div>
                </div>
                <img src="<?php echo esc_url($theme_uri . '/assets/images/team/member-mask.svg'); ?>" alt="" class="member-detail-nav__icon-close" style="opacity: 0; width: 20px;" />
            </div>
            <div class="member-detail-nav__line-wrap">
                <div class="member-detail-nav__line-bg"></div>
                <div class="member-detail-nav__line-active"></div>
            </div>
        </div>

        <div class="member-detail-content">
            
            <div class="member-detail-hero">
                <div class="member-detail-hero__mask" style="-webkit-mask-image: url('<?php echo esc_url($theme_uri . '/assets/images/team/member-mask.svg'); ?>'); mask-image: url('<?php echo esc_url($theme_uri . '/assets/images/team/member-mask.svg'); ?>');">
                    <img src="<?php echo esc_url($theme_uri . '/assets/images/team/member-1.png'); ?>" alt="이시완 변호사" class="member-detail-hero__photo" />
                </div>
            </div>

            <div class="member-detail-info">
                <h1 class="member-detail-info__title">
                    진심으로 소통하고,<br />
                    끝까지 함께하는 법률 서비스
                </h1>
                
                <div class="member-detail-info__name-wrap">
                    <h2 class="member-detail-info__name">이시완 변호사</h2>
                    <div class="member-detail-info__divider"></div>
                </div>

                <div class="member-detail-section">
                    <div class="member-detail-section__header">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-experience.svg'); ?>" alt="" class="member-detail-section__icon" />
                        <h3 class="member-detail-section__title">대표경력</h3>
                    </div>
                    <div class="member-detail-section__content">
                        <div class="member-experience-list">
                            <div class="member-experience-item">
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-list.svg'); ?>" alt="" class="member-experience-icon" />
                                <p class="member-experience-text">부산지방법원 인턴</p>
                            </div>
                            <div class="member-experience-item">
                                <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-list.svg'); ?>" alt="" class="member-experience-icon" />
                                <p class="member-experience-text">법률사무소 제언</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="member-detail-section">
                    <div class="member-detail-section__header">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-fields.svg'); ?>" alt="" class="member-detail-section__icon" />
                        <h3 class="member-detail-section__title">업무분야</h3>
                    </div>
                    <div class="member-detail-section__content">
                        <div class="member-fields-list">
                            <div class="member-field-row">
                                <h4 class="member-field-name">형사</h4>
                                <div class="member-field-tags">
                                    <span class="member-field-tag member-field-tag--small">일반사기</span>
                                    <span class="member-field-tag member-field-tag--small">가사상속</span>
                                    <span class="member-field-tag member-field-tag--small">가사상속</span>
                                    <span class="member-field-tag member-field-tag--small">감금</span>
                                    <span class="member-field-tag member-field-tag--small">가사상속</span>
                                    <span class="member-field-tag member-field-tag--small">감금</span>
                                </div>
                            </div>
                            <div class="member-field-row">
                                <h4 class="member-field-name">학교폭력</h4>
                                <div class="member-field-tags">
                                    <span class="member-field-tag member-field-tag--small">일반사기</span>
                                    <span class="member-field-tag member-field-tag--small">가사상속</span>
                                    <span class="member-field-tag member-field-tag--small">가사상속</span>
                                    <span class="member-field-tag member-field-tag--small">감금</span>
                                    <span class="member-field-tag member-field-tag--small">가사상속</span>
                                    <span class="member-field-tag member-field-tag--small">감금</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="member-tabs">
            <div class="member-tabs__nav">
                <a href="#tab-edu" class="member-tabs__item active">학력</a>
                <a href="#tab-career" class="member-tabs__item">경력</a>
                <a href="#tab-achievements" class="member-tabs__item">주요실적</a>
                <a href="#tab-cases" class="member-tabs__item">업무사례</a>
            </div>
            
            <div class="member-tabs__content">
                
                <div class="member-tab-section" id="tab-edu">
                    <div class="member-tab-section__header">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-edu.svg'); ?>" alt="" class="member-tab-section__icon" />
                        <h3 class="member-tab-section__title">학력</h3>
                    </div>
                    <div class="member-tab-section__list">
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">고려대학교 졸업</p>
                        </div>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">동아대학교 법학전문대학원 졸업</p>
                        </div>
                    </div>
                    <div class="member-tab-section__divider"></div>
                </div>
                
                <div class="member-tab-section" id="tab-career">
                    <div class="member-tab-section__header">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-career.svg'); ?>" alt="" class="member-tab-section__icon" />
                        <h3 class="member-tab-section__title">경력</h3>
                    </div>
                    <div class="member-tab-section__list">
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">서울지방검찰청 검사</p>
                        </div>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">청소년보호위원회 파견 (서울 동부지청 검사)</p>
                        </div>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">서울지방검찰청 검사</p>
                        </div>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">청주지방검찰청 충주지청 부장검사</p>
                        </div>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">서울동부지방검찰청 차장검사</p>
                        </div>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">육군법무관</p>
                        </div>
                    </div>
                    <div class="member-tab-section__divider"></div>
                </div>

                <div class="member-tab-section" id="tab-achievements">
                    <div class="member-tab-section__header">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-achievements.svg'); ?>" alt="" class="member-tab-section__icon" />
                        <h3 class="member-tab-section__title">주요실적</h3>
                    </div>
                    <div class="member-tab-section__list">
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">중진 국회의원 정치자금법위반 등 사건 무혐의 결정</p>
                        </div>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">글로벌 원자력발전 설비회사 납품 관련 사기사건 무혐의 결정</p>
                        </div>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">국립대 교수 연구비 사용 관련 사기사건 무혐의 결정</p>
                        </div>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">조선회사 부장 협력업체 관련 배임사건 무혐의 결정</p>
                        </div>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">시중은행장 채용비리 사건 변론</p>
                        </div>
                        <div class="member-tab-section__item">
                            <div class="member-tab-section__bullet">
                                <div class="member-tab-section__bullet-inner"></div>
                            </div>
                            <p class="member-tab-section__text">대형 항공사 회장 횡령 사건 변론 등</p>
                        </div>
                    </div>
                    <div class="member-tab-section__divider"></div>
                </div>

                <div class="member-tab-section" id="tab-cases">
                    <div class="member-tab-section__header">
                        <img src="<?php echo esc_url($theme_uri . '/assets/icons/team/icon-cases.svg'); ?>" alt="" class="member-tab-section__icon" />
                        <h3 class="member-tab-section__title">업무사례</h3>
                    </div>
                    
                    <div class="member-cases-grid">
                        <div class="member-case-card">
                            <div class="member-case-card__content">
                                <div class="member-case-card__header">
                                    <span class="member-case-card__badge">승소</span>
                                    <span class="member-case-card__category">성범죄</span>
                                </div>
                                <h4 class="member-case-card__title">아청법 위반 혐의로 기소당했으나 변호인 조력을 통해 기소유예 처분을 받은 성범죄 사례</h4>
                                <p class="member-case-card__desc">아청법 위반 혐의로 기소당해 성범죄 변호사의 조력을 구하셨습니다. 법무법인 YK 창원 분사무소는 피의자 신분의 의뢰인을 대리했습니다.</p>
                            </div>
                            <div class="member-case-card__visuals">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/team/shape-outline.png'); ?>" alt="" class="member-case-card__bg" />
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/team/case-1.png'); ?>" alt="" class="member-case-card__image" />
                            </div>
                        </div>

                        <div class="member-case-card">
                            <div class="member-case-card__content">
                                <div class="member-case-card__header">
                                    <span class="member-case-card__badge">승소</span>
                                    <span class="member-case-card__category">성범죄</span>
                                </div>
                                <h4 class="member-case-card__title">아청법 위반 혐의로 기소당했으나 변호인 조력을 통해 기소유예 처분을 받은 성범죄 사례</h4>
                                <p class="member-case-card__desc">아청법 위반 혐의로 기소당해 성범죄 변호사의 조력을 구하셨습니다. 법무법인 YK 창원 분사무소는 피의자 신분의 의뢰인을 대리했습니다.</p>
                            </div>
                            <div class="member-case-card__visuals">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/team/shape-outline.png'); ?>" alt="" class="member-case-card__bg" />
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/team/case-2.png'); ?>" alt="" class="member-case-card__image" />
                            </div>
                        </div>

                        <div class="member-case-card">
                            <div class="member-case-card__content">
                                <div class="member-case-card__header">
                                    <span class="member-case-card__badge">승소</span>
                                    <span class="member-case-card__category">성범죄</span>
                                </div>
                                <h4 class="member-case-card__title">아청법 위반 혐의로 기소당했으나 변호인 조력을 통해 기소유예 처분을 받은 성범죄 사례</h4>
                                <p class="member-case-card__desc">아청법 위반 혐의로 기소당해 성범죄 변호사의 조력을 구하셨습니다. 법무법인 YK 창원 분사무소는 피의자 신분의 의뢰인을 대리했습니다.</p>
                            </div>
                            <div class="member-case-card__visuals">
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/team/shape-outline.png'); ?>" alt="" class="member-case-card__bg" />
                                <img src="<?php echo esc_url($theme_uri . '/assets/images/team/case-1.png'); ?>" alt="" class="member-case-card__image" />
                            </div>
                        </div>
                    </div>

                    <div class="member-cases-more">
                        <a href="<?php echo esc_url(home_url('/cases/')); ?>" class="member-cases-more__btn">전체보기</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="footer about-footer" role="contentinfo" style="margin-top: 100px;">
        <div class="footer-bottom about-footer__bottom">
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
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/about/footer-logo.png'); ?>" alt="<?php esc_attr_e('법률사무소 평정', 'pjlaw'); ?>" class="footer-logo" />
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="scroll-top">
                <img src="<?php echo esc_url($theme_uri . '/assets/images/home/scroll-top.svg'); ?>" alt="<?php esc_attr_e('Top', 'pjlaw'); ?>" />
            </a>
        </div>
    </footer>

    <?php pjlaw_render_quick_actions_menu(); ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
