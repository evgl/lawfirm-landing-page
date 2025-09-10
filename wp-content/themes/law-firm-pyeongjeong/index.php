<?php
/**
 * Main Template File
 * 
 * This is the most generic template file and is used when no other specific
 * template file matches. It serves as the homepage and fallback template.
 * 
 * @package Law_Firm_Pyeongjeong
 * @since 1.0.0
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-logo">
                <i class="fas fa-balance-scale" aria-hidden="true"></i>
                <h1 class="hero-title">
                    <?php echo get_bloginfo('name') ?: __('법률사무소 평정', 'law-firm-pyeongjeong'); ?>
                </h1>
            </div>
            
            <div class="hero-subtitle">
                <p><?php echo get_bloginfo('description') ?: __('SUCCESS STORY', 'law-firm-pyeongjeong'); ?></p>
                <p><?php _e('변호사는 당신의, 믿고 맡길 수 있는 법률 서비스로 답습니다.', 'law-firm-pyeongjeong'); ?></p>
                <p><?php _e('축적된 경험을 바탕으로, 당신의 든든한 법률 동반자가 되어드리겠습니다.', 'law-firm-pyeongjeong'); ?></p>
            </div>

            <!-- Hero Search -->
            <div class="hero-search">
                <form class="search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>" role="search">
                    <input type="search" 
                           name="s" 
                           placeholder="<?php esc_attr_e('법률분야를 입력해주세요', 'law-firm-pyeongjeong'); ?>" 
                           value="<?php echo get_search_query(); ?>"
                           aria-label="<?php esc_attr_e('검색', 'law-firm-pyeongjeong'); ?>">
                    <button type="submit" aria-label="<?php esc_attr_e('검색 실행', 'law-firm-pyeongjeong'); ?>">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>

            <!-- Quick Action Buttons -->
            <div class="hero-actions">
                <a href="#consultation-form" class="btn btn-primary btn-large" data-scroll-to="consultation-form">
                    <?php _e('온라인 상담 문의 신청', 'law-firm-pyeongjeong'); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <span><?php _e('Scroll', 'law-firm-pyeongjeong'); ?></span>
        <i class="fas fa-chevron-down" aria-hidden="true"></i>
    </div>
</section>

<!-- Featured Practice Areas Section -->
<section class="section practice-areas-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php _e('주요 업무분야', 'law-firm-pyeongjeong'); ?></h2>
            <p class="section-subtitle">
                <?php _e('전문성과 경험을 바탕으로 최상의 법률서비스를 제공합니다', 'law-firm-pyeongjeong'); ?>
            </p>
        </div>

        <div class="practice-areas">
            <?php
            $featured_areas = law_firm_get_featured_practice_areas(6);
            if ($featured_areas) :
                foreach ($featured_areas as $area) :
                    $icon = get_post_meta($area->ID, '_practice_area_icon', true) ?: 'fas fa-balance-scale';
                    ?>
                    <div class="practice-area-card">
                        <div class="practice-area-icon">
                            <i class="<?php echo esc_attr($icon); ?>" aria-hidden="true"></i>
                        </div>
                        <h3 class="practice-area-title">
                            <a href="<?php echo get_permalink($area->ID); ?>">
                                <?php echo esc_html($area->post_title); ?>
                            </a>
                        </h3>
                        <div class="practice-area-description">
                            <?php echo wp_kses_post(wp_trim_words($area->post_content, 20)); ?>
                        </div>
                        <a href="<?php echo get_permalink($area->ID); ?>" class="practice-area-link">
                            <?php _e('자세히보기', 'law-firm-pyeongjeong'); ?>
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                <?php endforeach;
            else : 
                // Default practice areas if none exist
                $default_areas = array(
                    array(
                        'title' => __('형사사건', 'law-firm-pyeongjeong'),
                        'icon' => 'fas fa-gavel',
                        'description' => __('형사소송 전문 변호사가 직접 상담하여 안내합니다.', 'law-firm-pyeongjeong')
                    ),
                    array(
                        'title' => __('민사사건', 'law-firm-pyeongjeong'),
                        'icon' => 'fas fa-handshake',
                        'description' => __('민사분쟁 해결을 위한 전문적인 법률 서비스를 제공합니다.', 'law-firm-pyeongjeong')
                    ),
                    array(
                        'title' => __('기업법무', 'law-firm-pyeongjeong'),
                        'icon' => 'fas fa-building',
                        'description' => __('기업 운영에 필요한 종합적인 법률 자문을 제공합니다.', 'law-firm-pyeongjeong')
                    ),
                    array(
                        'title' => __('부동산', 'law-firm-pyeongjeong'),
                        'icon' => 'fas fa-home',
                        'description' => __('부동산 거래 및 분쟁에 대한 전문적인 법률 서비스입니다.', 'law-firm-pyeongjeong')
                    ),
                    array(
                        'title' => __('가족법', 'law-firm-pyeongjeong'),
                        'icon' => 'fas fa-users',
                        'description' => __('이혼, 상속 등 가족 관련 법적 문제를 해결해드립니다.', 'law-firm-pyeongjeong')
                    ),
                    array(
                        'title' => __('손해배상', 'law-firm-pyeongjeong'),
                        'icon' => 'fas fa-shield-alt',
                        'description' => __('각종 사고 및 손해에 대한 배상 청구를 도와드립니다.', 'law-firm-pyeongjeong')
                    ),
                );

                foreach ($default_areas as $area) : ?>
                    <div class="practice-area-card">
                        <div class="practice-area-icon">
                            <i class="<?php echo esc_attr($area['icon']); ?>" aria-hidden="true"></i>
                        </div>
                        <h3 class="practice-area-title"><?php echo esc_html($area['title']); ?></h3>
                        <div class="practice-area-description">
                            <?php echo esc_html($area['description']); ?>
                        </div>
                        <a href="#consultation-form" class="practice-area-link" data-scroll-to="consultation-form">
                            <?php _e('상담문의', 'law-firm-pyeongjeong'); ?>
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                <?php endforeach;
            endif; ?>
        </div>

        <div class="text-center mt-4">
            <a href="<?php echo esc_url(get_post_type_archive_link('practice_area')); ?>" class="btn btn-primary">
                <?php _e('전체 업무분야 보기', 'law-firm-pyeongjeong'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Success Stories Section -->
<section class="section success-stories bg-light">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php _e('성공사례', 'law-firm-pyeongjeong'); ?></h2>
            <p class="section-subtitle">
                <?php _e('전체 업무 사례 보기', 'law-firm-pyeongjeong'); ?>
            </p>
        </div>

        <?php
        $recent_cases = law_firm_get_recent_cases(6);
        if ($recent_cases) : ?>
            <div class="case-results-table">
                <table>
                    <thead>
                        <tr>
                            <th><?php _e('분야', 'law-firm-pyeongjeong'); ?></th>
                            <th><?php _e('사건명', 'law-firm-pyeongjeong'); ?></th>
                            <th><?php _e('결과', 'law-firm-pyeongjeong'); ?></th>
                            <th><?php _e('담당변호사', 'law-firm-pyeongjeong'); ?></th>
                            <th><?php _e('진행', 'law-firm-pyeongjeong'); ?></th>
                            <th><?php _e('이용기간', 'law-firm-pyeongjeong'); ?></th>
                            <th><?php _e('교육', 'law-firm-pyeongjeong'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_cases as $case) :
                            $case_result = get_post_meta($case->ID, '_case_result', true);
                            $case_amount = get_post_meta($case->ID, '_case_amount', true);
                            $case_attorney_id = get_post_meta($case->ID, '_case_attorney', true);
                            $case_duration = get_post_meta($case->ID, '_case_duration', true);
                            
                            $attorney_data = law_firm_get_attorney($case_attorney_id);
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    $case_types = wp_get_post_terms($case->ID, 'case_type');
                                    if ($case_types && !is_wp_error($case_types)) {
                                        echo esc_html($case_types[0]->name);
                                    } else {
                                        _e('일반사건', 'law-firm-pyeongjeong');
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo get_permalink($case->ID); ?>">
                                        <?php echo esc_html(wp_trim_words($case->post_title, 10)); ?>
                                    </a>
                                </td>
                                <td class="case-result <?php echo esc_attr($case_result); ?>">
                                    <?php 
                                    switch ($case_result) {
                                        case 'won':
                                            echo '<span class="result-won">' . __('승소', 'law-firm-pyeongjeong') . '</span>';
                                            break;
                                        case 'settled':
                                            echo '<span class="result-settled">' . __('합의', 'law-firm-pyeongjeong') . '</span>';
                                            break;
                                        default:
                                            echo '<span class="result-other">' . __('해결', 'law-firm-pyeongjeong') . '</span>';
                                    }
                                    
                                    if ($case_amount) {
                                        echo '<br><small>' . esc_html(law_firm_format_case_amount($case_amount)) . '</small>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php if ($attorney_data) : ?>
                                        <div class="attorney-info">
                                            <?php if ($attorney_data['photo']) : ?>
                                                <img src="<?php echo esc_url($attorney_data['photo']); ?>" 
                                                     alt="<?php echo esc_attr($attorney_data['name']); ?>" 
                                                     class="attorney-avatar">
                                            <?php endif; ?>
                                            <div>
                                                <strong><?php echo esc_html($attorney_data['name']); ?></strong>
                                                <?php if ($attorney_data['position']) : ?>
                                                    <br><small><?php echo esc_html($attorney_data['position']); ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <span class="attorney-info">
                                            <div class="attorney-avatar"></div>
                                            <?php _e('담당 변호사', 'law-firm-pyeongjeong'); ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $case_duration ? esc_html($case_duration) : __('-', 'law-firm-pyeongjeong'); ?></td>
                                <td><?php echo get_the_date('Y.m', $case->ID); ?></td>
                                <td>
                                    <a href="<?php echo get_permalink($case->ID); ?>" class="btn btn-small btn-secondary">
                                        <?php _e('보기', 'law-firm-pyeongjeong'); ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <a href="<?php echo esc_url(get_post_type_archive_link('legal_case')); ?>" class="btn btn-primary">
                    <?php _e('전체 업무 사례 보기', 'law-firm-pyeongjeong'); ?>
                </a>
            </div>
        <?php else : ?>
            <div class="no-cases-message text-center">
                <i class="fas fa-folder-open fa-3x mb-3 text-muted" aria-hidden="true"></i>
                <h3><?php _e('성공사례를 준비중입니다', 'law-firm-pyeongjeong'); ?></h3>
                <p><?php _e('다양한 성공사례를 곧 공개할 예정입니다.', 'law-firm-pyeongjeong'); ?></p>
                <a href="#consultation-form" class="btn btn-primary" data-scroll-to="consultation-form">
                    <?php _e('상담 문의하기', 'law-firm-pyeongjeong'); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Attorneys Section -->
<section class="section attorneys-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php _e('전문 변호사', 'law-firm-pyeongjeong'); ?></h2>
            <p class="section-subtitle">
                <?php _e('풍부한 경험과 전문성을 갖춘 변호사진이 최선을 다해 도움을 드립니다', 'law-firm-pyeongjeong'); ?>
            </p>
        </div>

        <div class="attorneys-grid">
            <?php
            $attorneys = get_posts(array(
                'post_type' => 'attorney',
                'posts_per_page' => 4,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));

            if ($attorneys) :
                foreach ($attorneys as $attorney) :
                    $attorney_data = law_firm_get_attorney($attorney->ID);
                    ?>
                    <div class="attorney-card">
                        <div class="attorney-photo">
                            <?php if ($attorney_data['photo']) : ?>
                                <img src="<?php echo esc_url($attorney_data['photo']); ?>" 
                                     alt="<?php echo esc_attr($attorney_data['name']); ?>">
                            <?php else : ?>
                                <div class="attorney-placeholder">
                                    <i class="fas fa-user fa-3x" aria-hidden="true"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="attorney-info">
                            <h3 class="attorney-name">
                                <a href="<?php echo get_permalink($attorney->ID); ?>">
                                    <?php echo esc_html($attorney_data['name']); ?>
                                </a>
                            </h3>
                            <?php if ($attorney_data['position']) : ?>
                                <p class="attorney-position"><?php echo esc_html($attorney_data['position']); ?></p>
                            <?php endif; ?>
                            
                            <?php
                            $specialties = wp_get_post_terms($attorney->ID, 'attorney_specialty');
                            if ($specialties && !is_wp_error($specialties)) : ?>
                                <div class="attorney-specialties">
                                    <?php foreach (array_slice($specialties, 0, 2) as $specialty) : ?>
                                        <span class="specialty-tag"><?php echo esc_html($specialty->name); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($attorney_data['experience_years']) : ?>
                                <p class="attorney-experience">
                                    <i class="fas fa-clock" aria-hidden="true"></i>
                                    <?php printf(__('%d년 경력', 'law-firm-pyeongjeong'), intval($attorney_data['experience_years'])); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach;
            else : ?>
                <div class="no-attorneys-message text-center col-12">
                    <i class="fas fa-users fa-3x mb-3 text-muted" aria-hidden="true"></i>
                    <h3><?php _e('변호사 정보를 준비중입니다', 'law-firm-pyeongjeong'); ?></h3>
                    <p><?php _e('전문 변호사진의 상세 정보를 곧 공개할 예정입니다.', 'law-firm-pyeongjeong'); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-4">
            <a href="<?php echo esc_url(get_post_type_archive_link('attorney')); ?>" class="btn btn-primary">
                <?php _e('전체 변호사 보기', 'law-firm-pyeongjeong'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section contact-section bg-dark">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-white"><?php _e('24시간 상담 접수', 'law-firm-pyeongjeong'); ?></h2>
            <p class="section-subtitle text-white-50">
                <?php _e('신속한 법률 상담으로 최상의 결과를 제공해드리겠습니다', 'law-firm-pyeongjeong'); ?>
            </p>
        </div>

        <div class="contact-content">
            <div class="contact-info">
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="contact-details">
                        <h3><?php _e('전화상담', 'law-firm-pyeongjeong'); ?></h3>
                        <p class="contact-text">
                            <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('law_firm_phone', '02-554-6674'))); ?>">
                                <?php echo esc_html(get_theme_mod('law_firm_phone', '02-554-6674')); ?>
                            </a>
                        </p>
                        <p class="contact-subtext"><?php _e('평일 09:00~18:00 (토/일/공휴일 휴무)', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div class="contact-details">
                        <h3><?php _e('이메일 상담', 'law-firm-pyeongjeong'); ?></h3>
                        <p class="contact-text">
                            <a href="mailto:<?php echo esc_attr(get_theme_mod('law_firm_email', 'info@lawfirm-pyeongjeong.com')); ?>">
                                <?php echo esc_html(get_theme_mod('law_firm_email', 'info@lawfirm-pyeongjeong.com')); ?>
                            </a>
                        </p>
                        <p class="contact-subtext"><?php _e('24시간 접수 가능', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    </div>
                    <div class="contact-details">
                        <h3><?php _e('오시는 길', 'law-firm-pyeongjeong'); ?></h3>
                        <p class="contact-text">
                            <?php echo esc_html(get_theme_mod('law_firm_address', '서울시 강남구 테헤란로 123')); ?>
                        </p>
                        <p class="contact-subtext"><?php _e('지하철 2호선 강남역 3번 출구', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>
            </div>

            <!-- Consultation Form -->
            <div class="consultation-form" id="consultation-form">
                <form class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" novalidate>
                    <input type="hidden" name="action" value="law_firm_consultation">
                    <?php wp_nonce_field('law_firm_consultation_nonce', 'consultation_nonce'); ?>
                    
                    <div class="form-group">
                        <label for="consultation-name" class="form-label"><?php _e('성명', 'law-firm-pyeongjeong'); ?> <span class="required">*</span></label>
                        <input type="text" 
                               id="consultation-name" 
                               name="consultation_name" 
                               class="form-control" 
                               required 
                               aria-required="true">
                    </div>

                    <div class="form-group">
                        <label for="consultation-phone" class="form-label"><?php _e('연락처', 'law-firm-pyeongjeong'); ?> <span class="required">*</span></label>
                        <input type="tel" 
                               id="consultation-phone" 
                               name="consultation_phone" 
                               class="form-control" 
                               pattern="[0-9\-\+\s\(\)]+"
                               required 
                               aria-required="true">
                    </div>

                    <div class="form-group">
                        <label for="consultation-email" class="form-label"><?php _e('이메일', 'law-firm-pyeongjeong'); ?></label>
                        <input type="email" 
                               id="consultation-email" 
                               name="consultation_email" 
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="consultation-category" class="form-label"><?php _e('상담분야', 'law-firm-pyeongjeong'); ?></label>
                        <select id="consultation-category" name="consultation_category" class="form-control">
                            <option value=""><?php _e('상담분야를 선택해주세요', 'law-firm-pyeongjeong'); ?></option>
                            <option value="criminal"><?php _e('형사사건', 'law-firm-pyeongjeong'); ?></option>
                            <option value="civil"><?php _e('민사사건', 'law-firm-pyeongjeong'); ?></option>
                            <option value="corporate"><?php _e('기업법무', 'law-firm-pyeongjeong'); ?></option>
                            <option value="real-estate"><?php _e('부동산', 'law-firm-pyeongjeong'); ?></option>
                            <option value="family"><?php _e('가족법', 'law-firm-pyeongjeong'); ?></option>
                            <option value="damages"><?php _e('손해배상', 'law-firm-pyeongjeong'); ?></option>
                            <option value="other"><?php _e('기타', 'law-firm-pyeongjeong'); ?></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="consultation-message" class="form-label"><?php _e('상담내용', 'law-firm-pyeongjeong'); ?> <span class="required">*</span></label>
                        <textarea id="consultation-message" 
                                  name="consultation_message" 
                                  class="form-control" 
                                  rows="5" 
                                  placeholder="<?php esc_attr_e('상담받고 싶은 내용을 자세히 적어주세요', 'law-firm-pyeongjeong'); ?>"
                                  required 
                                  aria-required="true"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-checkbox">
                            <input type="checkbox" 
                                   name="consultation_privacy_agree" 
                                   value="1" 
                                   required 
                                   aria-required="true">
                            <span class="checkmark"></span>
                            <?php _e('개인정보 수집 및 이용에 동의합니다', 'law-firm-pyeongjeong'); ?> <span class="required">*</span>
                            <a href="#" class="privacy-link" onclick="alert('개인정보처리방침 내용'); return false;">
                                <?php _e('[자세히보기]', 'law-firm-pyeongjeong'); ?>
                            </a>
                        </label>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-large btn-block">
                            <i class="fas fa-paper-plane" aria-hidden="true"></i>
                            <?php _e('상담신청', 'law-firm-pyeongjeong'); ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>