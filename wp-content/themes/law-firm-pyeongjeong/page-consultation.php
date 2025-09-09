<?php
/**
 * Template Name: Consultation Page
 * 
 * Custom template for online consultation page
 * 
 * @package Law_Firm_Pyeongjeong
 * @since 1.0.0
 */

get_header(); ?>

<div class="consultation-page-wrapper">
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="page-header-content">
                <h1 class="page-title"><?php _e('온라인 상담접수', 'law-firm-pyeongjeong'); ?></h1>
                <p class="page-subtitle">
                    <?php _e('24시간 언제든지 상담 신청이 가능합니다. 전문 변호사가 신속하고 정확하게 답변드립니다.', 'law-firm-pyeongjeong'); ?>
                </p>
                <div class="consultation-stats">
                    <div class="stat-item">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                        <span class="stat-number">24</span>
                        <span class="stat-label"><?php _e('시간 상담가능', 'law-firm-pyeongjeong'); ?></span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-user-tie" aria-hidden="true"></i>
                        <span class="stat-number">15+</span>
                        <span class="stat-label"><?php _e('년 경력 변호사', 'law-firm-pyeongjeong'); ?></span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-shield-check" aria-hidden="true"></i>
                        <span class="stat-number">100%</span>
                        <span class="stat-label"><?php _e('비밀보장', 'law-firm-pyeongjeong'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Consultation Process Steps -->
    <section class="consultation-process section bg-light">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('상담 진행 절차', 'law-firm-pyeongjeong'); ?></h2>
                <p class="section-subtitle">
                    <?php _e('간단한 4단계로 전문적인 법률 상담을 받으실 수 있습니다', 'law-firm-pyeongjeong'); ?>
                </p>
            </div>

            <div class="process-steps">
                <div class="step-item">
                    <div class="step-icon">
                        <i class="fas fa-edit" aria-hidden="true"></i>
                        <span class="step-number">01</span>
                    </div>
                    <div class="step-content">
                        <h3 class="step-title"><?php _e('상담 신청서 작성', 'law-firm-pyeongjeong'); ?></h3>
                        <p class="step-description">
                            <?php _e('기본 정보와 사건 내용을 간단히 작성해주세요. 상세할수록 정확한 상담이 가능합니다.', 'law-firm-pyeongjeong'); ?>
                        </p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-icon">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        <span class="step-number">02</span>
                    </div>
                    <div class="step-content">
                        <h3 class="step-title"><?php _e('사건 검토 및 분석', 'law-firm-pyeongjeong'); ?></h3>
                        <p class="step-description">
                            <?php _e('전문 변호사가 귀하의 사건을 면밀히 검토하고 법적 쟁점을 분석합니다.', 'law-firm-pyeongjeong'); ?>
                        </p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-icon">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        <span class="step-number">03</span>
                    </div>
                    <div class="step-content">
                        <h3 class="step-title"><?php _e('전화 상담 진행', 'law-firm-pyeongjeong'); ?></h3>
                        <p class="step-description">
                            <?php _e('담당 변호사가 직접 전화드려 상세한 상담을 진행하며 해결 방안을 제시합니다.', 'law-firm-pyeongjeong'); ?>
                        </p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-icon">
                        <i class="fas fa-handshake" aria-hidden="true"></i>
                        <span class="step-number">04</span>
                    </div>
                    <div class="step-content">
                        <h3 class="step-title"><?php _e('사건 진행 결정', 'law-firm-pyeongjeong'); ?></h3>
                        <p class="step-description">
                            <?php _e('상담 결과를 바탕으로 사건 진행 여부를 결정하고 최적의 해결책을 실행합니다.', 'law-firm-pyeongjeong'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Consultation Form -->
    <section class="main-consultation-form section">
        <div class="container">
            <div class="consultation-form-wrapper">
                <div class="form-header">
                    <h2 class="form-title"><?php _e('무료 법률 상담 신청', 'law-firm-pyeongjeong'); ?></h2>
                    <p class="form-subtitle">
                        <?php _e('정확한 상담을 위해 가능한 상세히 작성해주세요. 모든 정보는 철저히 보안 관리됩니다.', 'law-firm-pyeongjeong'); ?>
                    </p>
                </div>

                <form id="detailed-consultation-form" class="consultation-form detailed-form" method="post">
                    <!-- Personal Information Section -->
                    <div class="form-section">
                        <h3 class="section-title"><?php _e('기본 정보', 'law-firm-pyeongjeong'); ?></h3>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="client-name"><?php _e('성함', 'law-firm-pyeongjeong'); ?> <span class="required">*</span></label>
                                <input type="text" id="client-name" name="name" required placeholder="<?php esc_attr_e('실명을 입력해주세요', 'law-firm-pyeongjeong'); ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="client-age"><?php _e('연령대', 'law-firm-pyeongjeong'); ?></label>
                                <select id="client-age" name="age_group" class="form-control">
                                    <option value=""><?php _e('선택해주세요', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="20s"><?php _e('20대', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="30s"><?php _e('30대', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="40s"><?php _e('40대', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="50s"><?php _e('50대', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="60+"><?php _e('60대 이상', 'law-firm-pyeongjeong'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="client-phone"><?php _e('연락처', 'law-firm-pyeongjeong'); ?> <span class="required">*</span></label>
                                <input type="tel" id="client-phone" name="phone" required placeholder="010-0000-0000">
                                <small class="form-help"><?php _e('상담 결과를 안내받을 번호를 입력해주세요', 'law-firm-pyeongjeong'); ?></small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="client-email"><?php _e('이메일', 'law-firm-pyeongjeong'); ?></label>
                                <input type="email" id="client-email" name="email" placeholder="example@email.com">
                                <small class="form-help"><?php _e('상담 자료 발송을 위한 이메일 (선택사항)', 'law-firm-pyeongjeong'); ?></small>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="preferred-contact"><?php _e('선호 연락 방법', 'law-firm-pyeongjeong'); ?></label>
                                <select id="preferred-contact" name="preferred_contact" class="form-control">
                                    <option value="phone"><?php _e('전화 상담', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="email"><?php _e('이메일 답변', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="visit"><?php _e('방문 상담', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="video"><?php _e('화상 상담', 'law-firm-pyeongjeong'); ?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="preferred-time"><?php _e('선호 연락 시간', 'law-firm-pyeongjeong'); ?></label>
                                <select id="preferred-time" name="preferred_time" class="form-control">
                                    <option value="morning"><?php _e('오전 (09:00-12:00)', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="afternoon"><?php _e('오후 (13:00-18:00)', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="evening"><?php _e('저녁 (18:00-21:00)', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="anytime"><?php _e('언제든 가능', 'law-firm-pyeongjeong'); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Case Information Section -->
                    <div class="form-section">
                        <h3 class="section-title"><?php _e('사건 정보', 'law-firm-pyeongjeong'); ?></h3>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="case-type"><?php _e('사건 분야', 'law-firm-pyeongjeong'); ?> <span class="required">*</span></label>
                                <select id="case-type" name="case_type" class="form-control" required>
                                    <option value=""><?php _e('사건 분야를 선택해주세요', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="criminal"><?php _e('형사사건', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="civil"><?php _e('민사사건', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="family"><?php _e('가족법 (이혼/상속)', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="corporate"><?php _e('기업법무', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="real-estate"><?php _e('부동산', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="personal-injury"><?php _e('손해배상', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="labor"><?php _e('노동/고용', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="intellectual"><?php _e('지적재산권', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="other"><?php _e('기타', 'law-firm-pyeongjeong'); ?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="case-urgency"><?php _e('긴급도', 'law-firm-pyeongjeong'); ?></label>
                                <select id="case-urgency" name="case_urgency" class="form-control">
                                    <option value="normal"><?php _e('일반 (1주일 이내)', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="urgent"><?php _e('긴급 (24시간 이내)', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="very-urgent"><?php _e('매우 긴급 (즉시)', 'law-firm-pyeongjeong'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="case-summary"><?php _e('사건 요약', 'law-firm-pyeongjeong'); ?> <span class="required">*</span></label>
                            <textarea id="case-summary" name="case_summary" rows="4" required 
                                      placeholder="<?php esc_attr_e('사건의 핵심 내용을 간략하게 요약해주세요', 'law-firm-pyeongjeong'); ?>"></textarea>
                            <small class="form-help"><?php _e('언제, 어디서, 누가, 무엇을, 왜, 어떻게 발생했는지 간단히 설명해주세요', 'law-firm-pyeongjeong'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="case-details"><?php _e('상세 상황 설명', 'law-firm-pyeongjeong'); ?></label>
                            <textarea id="case-details" name="case_details" rows="6" 
                                      placeholder="<?php esc_attr_e('구체적인 상황, 경위, 현재 진행 상황 등을 상세히 설명해주세요', 'law-firm-pyeongjeong'); ?>"></textarea>
                            <small class="form-help"><?php _e('가능한 구체적으로 작성해주시면 더 정확한 상담이 가능합니다', 'law-firm-pyeongjeong'); ?></small>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="case-status"><?php _e('현재 진행 상황', 'law-firm-pyeongjeong'); ?></label>
                                <select id="case-status" name="case_status" class="form-control">
                                    <option value="initial"><?php _e('초기 단계 (아직 시작하지 않음)', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="ongoing"><?php _e('진행 중', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="court"><?php _e('법정 단계', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="appeal"><?php _e('항소/상고 단계', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="enforcement"><?php _e('집행 단계', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="other"><?php _e('기타', 'law-firm-pyeongjeong'); ?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="opponent-representation"><?php _e('상대방 변호사 선임 여부', 'law-firm-pyeongjeong'); ?></label>
                                <select id="opponent-representation" name="opponent_representation" class="form-control">
                                    <option value=""><?php _e('알 수 없음', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="yes"><?php _e('상대방에게 변호사 있음', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="no"><?php _e('상대방에게 변호사 없음', 'law-firm-pyeongjeong'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="desired-outcome"><?php _e('원하는 결과', 'law-firm-pyeongjeong'); ?></label>
                            <textarea id="desired-outcome" name="desired_outcome" rows="3" 
                                      placeholder="<?php esc_attr_e('이 사건을 통해 얻고자 하는 결과나 해결하고 싶은 목표를 설명해주세요', 'law-firm-pyeongjeong'); ?>"></textarea>
                        </div>
                    </div>

                    <!-- Additional Information Section -->
                    <div class="form-section">
                        <h3 class="section-title"><?php _e('추가 정보', 'law-firm-pyeongjeong'); ?></h3>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="previous-consultation"><?php _e('이전 법률 상담 경험', 'law-firm-pyeongjeong'); ?></label>
                                <select id="previous-consultation" name="previous_consultation" class="form-control">
                                    <option value="no"><?php _e('없음', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="yes-same"><?php _e('같은 사건으로 상담받음', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="yes-different"><?php _e('다른 사건으로 상담받음', 'law-firm-pyeongjeong'); ?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="budget-range"><?php _e('예상 예산 범위', 'law-firm-pyeongjeong'); ?></label>
                                <select id="budget-range" name="budget_range" class="form-control">
                                    <option value=""><?php _e('미정', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="under-500"><?php _e('500만원 미만', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="500-1000"><?php _e('500만원 - 1000만원', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="1000-3000"><?php _e('1000만원 - 3000만원', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="over-3000"><?php _e('3000만원 이상', 'law-firm-pyeongjeong'); ?></option>
                                    <option value="discuss"><?php _e('상담 후 결정', 'law-firm-pyeongjeong'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="additional-questions"><?php _e('추가 질문사항', 'law-firm-pyeongjeong'); ?></label>
                            <textarea id="additional-questions" name="additional_questions" rows="3" 
                                      placeholder="<?php esc_attr_e('궁금한 점이나 추가로 문의하고 싶은 사항이 있으시면 작성해주세요', 'law-firm-pyeongjeong'); ?>"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="referral-source"><?php _e('법률사무소 평정을 어떻게 알게 되셨나요?', 'law-firm-pyeongjeong'); ?></label>
                            <select id="referral-source" name="referral_source" class="form-control">
                                <option value=""><?php _e('선택해주세요', 'law-firm-pyeongjeong'); ?></option>
                                <option value="google"><?php _e('구글 검색', 'law-firm-pyeongjeong'); ?></option>
                                <option value="naver"><?php _e('네이버 검색', 'law-firm-pyeongjeong'); ?></option>
                                <option value="recommendation"><?php _e('지인 추천', 'law-firm-pyeongjeong'); ?></option>
                                <option value="advertisement"><?php _e('광고', 'law-firm-pyeongjeong'); ?></option>
                                <option value="social-media"><?php _e('소셜미디어', 'law-firm-pyeongjeong'); ?></option>
                                <option value="other"><?php _e('기타', 'law-firm-pyeongjeong'); ?></option>
                            </select>
                        </div>
                    </div>

                    <!-- Privacy and Consent Section -->
                    <div class="form-section">
                        <h3 class="section-title"><?php _e('개인정보 수집 및 이용 동의', 'law-firm-pyeongjeong'); ?></h3>
                        
                        <div class="privacy-agreement">
                            <div class="agreement-content">
                                <h4><?php _e('개인정보 수집 및 이용 목적', 'law-firm-pyeongjeong'); ?></h4>
                                <p><?php _e('법률 상담 서비스 제공, 상담 결과 안내, 사건 진행 관련 연락', 'law-firm-pyeongjeong'); ?></p>
                                
                                <h4><?php _e('수집하는 개인정보 항목', 'law-firm-pyeongjeong'); ?></h4>
                                <p><?php _e('성명, 연락처, 이메일, 상담 내용, 사건 관련 정보', 'law-firm-pyeongjeong'); ?></p>
                                
                                <h4><?php _e('개인정보 보유 및 이용 기간', 'law-firm-pyeongjeong'); ?></h4>
                                <p><?php _e('상담 완료 후 1년 또는 사건 종료 후 3년 (관련 법령에 따라)', 'law-firm-pyeongjeong'); ?></p>
                                
                                <h4><?php _e('동의 거부 권리 및 불이익', 'law-firm-pyeongjeong'); ?></h4>
                                <p><?php _e('개인정보 수집 및 이용을 거부할 권리가 있으나, 거부 시 상담 서비스 이용이 제한될 수 있습니다.', 'law-firm-pyeongjeong'); ?></p>
                            </div>
                            
                            <div class="consent-checkboxes">
                                <label class="privacy-checkbox">
                                    <input type="checkbox" name="privacy_consent" value="1" required>
                                    <span class="checkmark"></span>
                                    <?php _e('개인정보 수집 및 이용에 동의합니다.', 'law-firm-pyeongjeong'); ?> <span class="required">*</span>
                                </label>
                                
                                <label class="privacy-checkbox">
                                    <input type="checkbox" name="marketing_consent" value="1">
                                    <span class="checkmark"></span>
                                    <?php _e('법률 정보 및 마케팅 정보 수신에 동의합니다. (선택)', 'law-firm-pyeongjeong'); ?>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Section -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-large">
                            <i class="fas fa-paper-plane" aria-hidden="true"></i>
                            <?php _e('상담 신청하기', 'law-firm-pyeongjeong'); ?>
                        </button>
                        <p class="form-notice">
                            <?php _e('신청 후 영업시간 내 24시간 이내에 연락드리겠습니다.', 'law-firm-pyeongjeong'); ?>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="consultation-contact section bg-light">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('직접 상담 문의', 'law-firm-pyeongjeong'); ?></h2>
                <p class="section-subtitle">
                    <?php _e('온라인 상담 외에도 전화나 방문을 통한 상담이 가능합니다', 'law-firm-pyeongjeong'); ?>
                </p>
            </div>

            <div class="contact-methods">
                <div class="contact-method">
                    <div class="contact-icon">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="contact-info">
                        <h3 class="contact-title"><?php _e('전화 상담', 'law-firm-pyeongjeong'); ?></h3>
                        <p class="contact-description"><?php _e('즉시 전문 변호사와 상담', 'law-firm-pyeongjeong'); ?></p>
                        <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('law_firm_phone', '02-554-6674'))); ?>" class="contact-link">
                            <?php echo esc_html(get_theme_mod('law_firm_phone', '02-554-6674')); ?>
                        </a>
                        <p class="contact-hours"><?php _e('평일 09:00-18:00', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>

                <div class="contact-method">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    </div>
                    <div class="contact-info">
                        <h3 class="contact-title"><?php _e('방문 상담', 'law-firm-pyeongjeong'); ?></h3>
                        <p class="contact-description"><?php _e('사무실 방문을 통한 대면 상담', 'law-firm-pyeongjeong'); ?></p>
                        <p class="contact-address">
                            <?php echo wp_kses_post(nl2br(get_theme_mod('law_firm_address', '서울 강남구 논현로63길 7<br>금성빌딩 6층'))); ?>
                        </p>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="contact-link">
                            <?php _e('오시는 길 안내', 'law-firm-pyeongjeong'); ?>
                        </a>
                    </div>
                </div>

                <div class="contact-method">
                    <div class="contact-icon">
                        <i class="fab fa-whatsapp" aria-hidden="true"></i>
                    </div>
                    <div class="contact-info">
                        <h3 class="contact-title"><?php _e('카카오톡 상담', 'law-firm-pyeongjeong'); ?></h3>
                        <p class="contact-description"><?php _e('카카오톡을 통한 간편 상담', 'law-firm-pyeongjeong'); ?></p>
                        <a href="#" class="contact-link" onclick="alert('카카오톡 채널: @법률사무소평정');">
                            <?php _e('@법률사무소평정', 'law-firm-pyeongjeong'); ?>
                        </a>
                        <p class="contact-hours"><?php _e('24시간 접수 가능', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="consultation-faq section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('자주 묻는 질문', 'law-firm-pyeongjeong'); ?></h2>
                <p class="section-subtitle">
                    <?php _e('상담 신청 전 궁금한 사항들을 확인해보세요', 'law-firm-pyeongjeong'); ?>
                </p>
            </div>

            <div class="faq-list">
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false" aria-controls="faq-1">
                        <span><?php _e('상담 비용이 있나요?', 'law-firm-pyeongjeong'); ?></span>
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>
                    <div id="faq-1" class="faq-answer" aria-hidden="true">
                        <p><?php _e('초기 상담은 무료로 진행됩니다. 사건 수임 결정 후 별도 비용이 발생하며, 상담 시 투명하게 안내해드립니다.', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false" aria-controls="faq-2">
                        <span><?php _e('얼마나 빨리 연락받을 수 있나요?', 'law-firm-pyeongjeong'); ?></span>
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>
                    <div id="faq-2" class="faq-answer" aria-hidden="true">
                        <p><?php _e('영업시간 내 접수시 당일, 영업시간 외 접수시 익일 오전에 연락드립니다. 긴급한 경우 즉시 연락 가능합니다.', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false" aria-controls="faq-3">
                        <span><?php _e('개인정보는 안전하게 관리되나요?', 'law-firm-pyeongjeong'); ?></span>
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>
                    <div id="faq-3" class="faq-answer" aria-hidden="true">
                        <p><?php _e('모든 개인정보는 개인정보보호법에 따라 철저히 관리되며, 상담 목적 외 절대 사용하지 않습니다. 변호사의 비밀유지 의무에 따라 보호됩니다.', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false" aria-controls="faq-4">
                        <span><?php _e('어떤 분야의 상담이 가능한가요?', 'law-firm-pyeongjeong'); ?></span>
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                    </button>
                    <div id="faq-4" class="faq-answer" aria-hidden="true">
                        <p><?php _e('형사, 민사, 가족법, 기업법무, 부동산, 손해배상 등 모든 법률 분야의 상담이 가능합니다. 전문 분야별 변호사가 배정됩니다.', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
jQuery(document).ready(function($) {
    // FAQ Toggle functionality
    $('.faq-question').on('click', function(e) {
        e.preventDefault();
        
        const $this = $(this);
        const $answer = $this.next('.faq-answer');
        const isExpanded = $this.attr('aria-expanded') === 'true';
        
        // Close all other FAQ items
        $('.faq-question').not($this).attr('aria-expanded', 'false');
        $('.faq-answer').not($answer).slideUp(300).attr('aria-hidden', 'true');
        $('.faq-question').not($this).find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        
        // Toggle current item
        $this.attr('aria-expanded', !isExpanded);
        $answer.attr('aria-hidden', isExpanded);
        
        if (isExpanded) {
            $answer.slideUp(300);
            $this.find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        } else {
            $answer.slideDown(300);
            $this.find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
        }
    });

    // Form section progressive disclosure
    let currentSection = 0;
    const $sections = $('.form-section');
    const totalSections = $sections.length;

    // Add progress indicator
    $('<div class="form-progress"><div class="progress-bar" style="width: ' + (100 / totalSections) + '%"></div></div>')
        .insertBefore('.detailed-form');

    // Update progress as user fills form
    $('.detailed-form input, .detailed-form select, .detailed-form textarea').on('input change', function() {
        updateFormProgress();
    });

    function updateFormProgress() {
        let completedSections = 0;
        
        $sections.each(function() {
            const $section = $(this);
            const requiredFields = $section.find('input[required], select[required], textarea[required]');
            const filledFields = requiredFields.filter(function() {
                return $(this).val().trim() !== '';
            });
            
            if (requiredFields.length === 0 || filledFields.length === requiredFields.length) {
                completedSections++;
                $section.addClass('completed');
            } else {
                $section.removeClass('completed');
            }
        });
        
        const progressPercent = (completedSections / totalSections) * 100;
        $('.progress-bar').animate({ width: progressPercent + '%' }, 300);
    }
});
</script>

<?php get_footer(); ?>