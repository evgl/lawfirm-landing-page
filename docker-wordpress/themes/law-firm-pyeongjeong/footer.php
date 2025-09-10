</main><!-- .site-main -->

<!-- Site Footer -->
<footer class="site-footer" role="contentinfo">
    <!-- Consultation Call-to-Action Section -->
    <div class="consultation-cta">
        <div class="container">
            <div class="cta-content">
                <h3><?php _e('24시간 비밀상담', 'law-firm-pyeongjeong'); ?></h3>
                <p><?php _e('카톡상담', 'law-firm-pyeongjeong'); ?></p>
                
                <div class="cta-form-inline">
                    <form class="consultation-quick-form" method="post" action="#" data-form-type="footer">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="<?php esc_attr_e('이름', 'law-firm-pyeongjeong'); ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="phone" placeholder="<?php esc_attr_e('연락처', 'law-firm-pyeongjeong'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="privacy-checkbox">
                                    <input type="checkbox" name="privacy_consent" value="1" required>
                                    <span class="checkmark"></span>
                                    <?php _e('개인정보 수집 및 이용에 동의합니다.', 'law-firm-pyeongjeong'); ?>
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <?php _e('상담하기', 'law-firm-pyeongjeong'); ?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Footer Content -->
    <div class="footer-main">
        <div class="container">
            <div class="footer-content">
                <!-- Footer Column 1: Firm Information -->
                <div class="footer-section footer-about">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <h3><?php echo get_bloginfo('name') ?: __('법률사무소 평정', 'law-firm-pyeongjeong'); ?></h3>
                        <p><?php _e('전문 법무진이 상담하여 안내해드립니다.', 'law-firm-pyeongjeong'); ?></p>
                        <p><?php _e('투명한 경험을 바탕으로, 당신의 든든한 법률 동반자가 되어드리겠습니다.', 'law-firm-pyeongjeong'); ?></p>
                        
                        <div class="social-links">
                            <a href="#" class="social-link" aria-label="<?php esc_attr_e('Facebook', 'law-firm-pyeongjeong'); ?>">
                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="<?php esc_attr_e('Instagram', 'law-firm-pyeongjeong'); ?>">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="<?php esc_attr_e('Blog', 'law-firm-pyeongjeong'); ?>">
                                <i class="fas fa-blog" aria-hidden="true"></i>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Footer Column 2: Practice Areas -->
                <div class="footer-section footer-practice-areas">
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <h3><?php _e('주요 업무분야', 'law-firm-pyeongjeong'); ?></h3>
                        <ul>
                            <?php
                            $practice_areas = law_firm_get_featured_practice_areas(6);
                            if ($practice_areas) :
                                foreach ($practice_areas as $area) : ?>
                                    <li><a href="<?php echo get_permalink($area->ID); ?>"><?php echo esc_html($area->post_title); ?></a></li>
                                <?php endforeach;
                            else : ?>
                                <li><a href="#"><?php _e('기업법무', 'law-firm-pyeongjeong'); ?></a></li>
                                <li><a href="#"><?php _e('형사변호', 'law-firm-pyeongjeong'); ?></a></li>
                                <li><a href="#"><?php _e('민사소송', 'law-firm-pyeongjeong'); ?></a></li>
                                <li><a href="#"><?php _e('부동산', 'law-firm-pyeongjeong'); ?></a></li>
                                <li><a href="#"><?php _e('가족법', 'law-firm-pyeongjeong'); ?></a></li>
                                <li><a href="#"><?php _e('손해배상', 'law-firm-pyeongjeong'); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Footer Column 3: Quick Links -->
                <div class="footer-section footer-links">
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else : ?>
                        <h3><?php _e('바로가기', 'law-firm-pyeongjeong'); ?></h3>
                        <ul>
                            <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php _e('사무소 소개', 'law-firm-pyeongjeong'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_post_type_archive_link('attorney')); ?>"><?php _e('변호사 소개', 'law-firm-pyeongjeong'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_post_type_archive_link('legal_case')); ?>"><?php _e('성공사례', 'law-firm-pyeongjeong'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/news')); ?>"><?php _e('법률정보', 'law-firm-pyeongjeong'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/consultation')); ?>"><?php _e('온라인 상담', 'law-firm-pyeongjeong'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php _e('오시는 길', 'law-firm-pyeongjeong'); ?></a></li>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Footer Column 4: Contact Information -->
                <div class="footer-section footer-contact">
                    <?php if (is_active_sidebar('footer-4')) : ?>
                        <?php dynamic_sidebar('footer-4'); ?>
                    <?php else : ?>
                        <h3><?php _e('연락처 정보', 'law-firm-pyeongjeong'); ?></h3>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                <div>
                                    <strong><?php _e('주소', 'law-firm-pyeongjeong'); ?></strong><br>
                                    <?php echo wp_kses_post(nl2br(get_theme_mod('law_firm_address', '서울 강남구 논현로63길 7<br>금성빌딩 6층, 법률사무소 평정'))); ?>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-phone" aria-hidden="true"></i>
                                <div>
                                    <strong><?php _e('대표전화', 'law-firm-pyeongjeong'); ?></strong><br>
                                    <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('law_firm_phone', '02-554-6674'))); ?>">
                                        <?php echo esc_html(get_theme_mod('law_firm_phone', '02-554-6674')); ?>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <i class="fas fa-clock" aria-hidden="true"></i>
                                <div>
                                    <strong><?php _e('업무시간', 'law-firm-pyeongjeong'); ?></strong><br>
                                    <?php echo wp_kses_post(nl2br(get_theme_mod('law_firm_hours', '평일업무시간 | 10:00 - 19:00<br>365일 24시간 상담가능'))); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <div class="copyright">
                    <p>&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name') ?: __('법률사무소 평정', 'law-firm-pyeongjeong'); ?>. <?php _e('All rights reserved.', 'law-firm-pyeongjeong'); ?></p>
                </div>
                
                <div class="footer-legal-links">
                    <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>"><?php _e('개인정보처리방침', 'law-firm-pyeongjeong'); ?></a>
                    <span class="separator">|</span>
                    <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>"><?php _e('이용약관', 'law-firm-pyeongjeong'); ?></a>
                    <span class="separator">|</span>
                    <a href="<?php echo esc_url(home_url('/sitemap')); ?>"><?php _e('사이트맵', 'law-firm-pyeongjeong'); ?></a>
                </div>
                
                <?php if (has_nav_menu('footer')) : ?>
                    <nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Menu', 'law-firm-pyeongjeong'); ?>">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class' => 'footer-menu',
                            'container' => false,
                            'depth' => 1,
                        ));
                        ?>
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button class="back-to-top" aria-label="<?php esc_attr_e('페이지 상단으로 이동', 'law-firm-pyeongjeong'); ?>" style="display: none;">
    <i class="fas fa-chevron-up" aria-hidden="true"></i>
</button>

<!-- Consultation Modal -->
<div id="consultation-modal" class="modal" style="display: none;" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header">
            <h2><?php _e('무료 법률 상담 신청', 'law-firm-pyeongjeong'); ?></h2>
            <button class="modal-close" aria-label="<?php esc_attr_e('모달 창 닫기', 'law-firm-pyeongjeong'); ?>">
                <i class="fas fa-times" aria-hidden="true"></i>
            </button>
        </div>
        
        <div class="modal-body">
            <form id="consultation-modal-form" class="consultation-form" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="modal-name"><?php _e('이름', 'law-firm-pyeongjeong'); ?> <span class="required">*</span></label>
                        <input type="text" id="modal-name" name="name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="modal-phone"><?php _e('연락처', 'law-firm-pyeongjeong'); ?> <span class="required">*</span></label>
                        <input type="tel" id="modal-phone" name="phone" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="modal-email"><?php _e('이메일', 'law-firm-pyeongjeong'); ?></label>
                    <input type="email" id="modal-email" name="email">
                </div>
                
                <div class="form-group">
                    <label for="modal-case-type"><?php _e('사건분야 선택', 'law-firm-pyeongjeong'); ?> <span class="required">*</span></label>
                    <select id="modal-case-type" name="case_type" required>
                        <option value=""><?php _e('사건분야를 선택해주세요', 'law-firm-pyeongjeong'); ?></option>
                        <option value="criminal"><?php _e('형사사건', 'law-firm-pyeongjeong'); ?></option>
                        <option value="civil"><?php _e('민사사건', 'law-firm-pyeongjeong'); ?></option>
                        <option value="family"><?php _e('가족법', 'law-firm-pyeongjeong'); ?></option>
                        <option value="corporate"><?php _e('기업법무', 'law-firm-pyeongjeong'); ?></option>
                        <option value="real-estate"><?php _e('부동산', 'law-firm-pyeongjeong'); ?></option>
                        <option value="personal-injury"><?php _e('손해배상', 'law-firm-pyeongjeong'); ?></option>
                        <option value="other"><?php _e('기타', 'law-firm-pyeongjeong'); ?></option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="modal-message"><?php _e('문의 내용을 간략히 작성해주세요', 'law-firm-pyeongjeong'); ?></label>
                    <textarea id="modal-message" name="message" rows="4" placeholder="<?php esc_attr_e('상담 내용을 자세히 적어주시면 더 정확한 답변을 받으실 수 있습니다.', 'law-firm-pyeongjeong'); ?>"></textarea>
                </div>
                
                <div class="form-group">
                    <label class="privacy-checkbox">
                        <input type="checkbox" name="privacy_consent" value="1" required>
                        <span class="checkmark"></span>
                        <?php _e('개인정보 수집 및 이용에 동의합니다.', 'law-firm-pyeongjeong'); ?> <span class="required">*</span>
                    </label>
                    <p class="privacy-notice">
                        <?php _e('수집된 개인정보는 상담 목적으로만 사용되며, 상담 완료 후 파기됩니다.', 'law-firm-pyeongjeong'); ?>
                        <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" target="_blank"><?php _e('자세히 보기', 'law-firm-pyeongjeong'); ?></a>
                    </p>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-large">
                        <?php _e('상담 신청하기', 'law-firm-pyeongjeong'); ?>
                    </button>
                    <button type="button" class="btn btn-secondary modal-close">
                        <?php _e('취소', 'law-firm-pyeongjeong'); ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Loading Overlay -->
<div id="loading-overlay" class="loading-overlay" style="display: none;" aria-hidden="true">
    <div class="loading-spinner">
        <i class="fas fa-spinner fa-spin" aria-hidden="true"></i>
        <p><?php _e('처리 중입니다...', 'law-firm-pyeongjeong'); ?></p>
    </div>
</div>

<?php wp_footer(); ?>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "LegalService",
    "name": "<?php echo esc_js(get_bloginfo('name') ?: '법률사무소 평정'); ?>",
    "description": "<?php echo esc_js(get_bloginfo('description') ?: '전문적인 법률 서비스를 제공하는 법률사무소'); ?>",
    "url": "<?php echo esc_js(home_url()); ?>",
    "telephone": "<?php echo esc_js(get_theme_mod('law_firm_phone', '02-554-6674')); ?>",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo esc_js(get_theme_mod('law_firm_address', '서울 강남구 논현로63길 7 금성빌딩 6층')); ?>",
        "addressLocality": "서울",
        "addressCountry": "KR"
    },
    "openingHours": "Mo-Fr 10:00-19:00",
    "priceRange": "$$",
    "serviceType": "Legal Services"
}
</script>

</body>
</html>