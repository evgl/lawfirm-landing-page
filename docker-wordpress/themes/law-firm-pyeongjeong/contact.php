<?php
/**
 * Standalone Contact Page (상담문의)
 * 
 * @package Law_Firm_Pyeongjeong
 * @since 1.0.0
 */

// Custom header without quick menu
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class('contact-page-no-scroll'); ?>>
<?php wp_body_open(); ?>

<!-- Skip to main content for accessibility -->
<a class="skip-link screen-reader-text" href="#main"><?php _e('Skip to main content', 'law-firm-pyeongjeong'); ?></a>

<!-- Site Header -->
<header class="site-header" role="banner">
    <div class="header-container">
            <!-- Site Logo/Branding -->
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-white.svg" alt="<?php echo esc_attr__('법률사무소 평정', 'law-firm-pyeongjeong'); ?>" class="logo-image">
                    </a>
                <?php endif; ?>
                
                <?php 
                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()) : ?>
                    <div class="site-description"><?php echo $description; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?></div>
                <?php endif; ?>
            </div>

            <!-- Header Right Section -->
            <div class="header-right">
                <!-- Primary Navigation -->
                <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'law-firm-pyeongjeong'); ?>">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'primary-menu',
                        'container' => false,
                        'fallback_cb' => 'law_firm_fallback_menu',
                    ));
                    ?>
                </nav>

            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" aria-controls="primary-navigation" aria-expanded="false">
                <i class="fas fa-bars" aria-hidden="true"></i>
                <span class="screen-reader-text"><?php _e('Menu', 'law-firm-pyeongjeong'); ?></span>
            </button>
    </div>
</header>

<!-- Main Content Area -->
<main id="main" class="site-main" role="main">

<!-- Contact Section -->
<section id="contact" class="content-section contact-section" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/contact/background.png' ); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="section-container">
        <div class="contact-content">
            <div class="section-header">
                <h2><?php esc_html_e('상담문의', 'law-firm-pyeongjeong'); ?></h2>
                <div class="section-subtitle"><?php esc_html_e('CONSULTATION', 'law-firm-pyeongjeong'); ?></div>
                <p class="section-description"><?php esc_html_e('법적 문제로 고민이 있으시다면 언제든지 상담을 요청하세요. 전문 변호사가 고객의 상황을 정확히 파악하여 최적의 해결 방안을 제시해드립니다.', 'law-firm-pyeongjeong'); ?></p>
            </div>

            <div class="contact-layout" style="align-items: flex-start;">
                <div class="consultation-form-section">
                    <h3><?php esc_html_e('온라인 상담접수', 'law-firm-pyeongjeong'); ?></h3>

                    <form id="consultation-form" class="consultation-form" method="post" action="">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="client-name"><?php esc_html_e('이름', 'law-firm-pyeongjeong'); ?> *</label>
                                <input type="text" id="client-name" name="name" required aria-describedby="name-error">
                                <span id="name-error" class="error-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="client-phone"><?php esc_html_e('연락처', 'law-firm-pyeongjeong'); ?> *</label>
                                <input type="tel" id="client-phone" name="phone" placeholder="010-0000-0000" required aria-describedby="phone-error">
                                <span id="phone-error" class="error-message"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client-email"><?php esc_html_e('이메일', 'law-firm-pyeongjeong'); ?></label>
                            <input type="email" id="client-email" name="email" placeholder="example@email.com" aria-describedby="email-error">
                            <span id="email-error" class="error-message"></span>
                        </div>

                        <!-- Case Type Field - Commented out for simplified form
                        <div class="form-group">
                            <label for="case-type"><?php esc_html_e('사건분야', 'law-firm-pyeongjeong'); ?> *</label>
                            <select id="case-type" name="case_type" required aria-describedby="case-error">
                                <option value=""><?php esc_html_e('사건 분야를 선택하세요', 'law-firm-pyeongjeong'); ?></option>
                                <option value="civil"><?php esc_html_e('민사소송', 'law-firm-pyeongjeong'); ?></option>
                                <option value="criminal"><?php esc_html_e('형사소송', 'law-firm-pyeongjeong'); ?></option>
                                <option value="family"><?php esc_html_e('가족법', 'law-firm-pyeongjeong'); ?></option>
                                <option value="real-estate"><?php esc_html_e('부동산법', 'law-firm-pyeongjeong'); ?></option>
                                <option value="corporate"><?php esc_html_e('기업법무', 'law-firm-pyeongjeong'); ?></option>
                                <option value="intellectual"><?php esc_html_e('지적재산권', 'law-firm-pyeongjeong'); ?></option>
                                <option value="other"><?php esc_html_e('기타', 'law-firm-pyeongjeong'); ?></option>
                            </select>
                            <span id="case-error" class="error-message"></span>
                        </div>
                        -->

                        <div class="form-group">
                            <label for="consultation-content"><?php esc_html_e('상담내용', 'law-firm-pyeongjeong'); ?> *</label>
                            <textarea id="consultation-content" name="message" rows="5" placeholder="<?php esc_attr_e('상담받고 싶은 내용을 구체적으로 작성해주세요.', 'law-firm-pyeongjeong'); ?>" required aria-describedby="content-error"></textarea>
                            <span id="content-error" class="error-message"></span>
                        </div>

                        <div class="form-group privacy-consent">
                            <label class="checkbox-label">
                                <input type="checkbox" id="privacy-consent" name="privacy_consent" value="1" required>
                                <span class="checkmark"></span>
                                <?php esc_html_e('개인정보 수집 및 이용에 동의합니다', 'law-firm-pyeongjeong'); ?> *
                            </label>
                        </div>

                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane" aria-hidden="true"></i>
                            <?php esc_html_e('온라인 상담 문의 신청', 'law-firm-pyeongjeong'); ?>
                        </button>
                    </form>
                </div>

                <div class="contact-info-section">
                    <h3><?php esc_html_e('연락처 정보', 'law-firm-pyeongjeong'); ?></h3>

                    <div class="contact-card">

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="info-content">
                                <h4><?php esc_html_e('전화번호', 'law-firm-pyeongjeong'); ?></h4>
                                <p><a href="tel:02-554-5674">02-554-5674</a></p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="info-content">
                                <h4><?php esc_html_e('이메일', 'law-firm-pyeongjeong'); ?></h4>
                                <p><a href="mailto:law@koreanlawyer.kr">law@koreanlawyer.kr</a></p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            </div>
                            <div class="info-content">
                                <h4><?php esc_html_e('주소', 'law-firm-pyeongjeong'); ?></h4>
                                <p><?php esc_html_e('서울 강남구 논현로63길 71, 금성빌딩 6층', 'law-firm-pyeongjeong'); ?></p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-clock" aria-hidden="true"></i>
                            </div>
                            <div class="info-content">
                                <h4><?php esc_html_e('운영시간', 'law-firm-pyeongjeong'); ?></h4>
                                <p><?php esc_html_e('평일 09:00 - 18:00', 'law-firm-pyeongjeong'); ?><br>
                                   <?php esc_html_e('토요일 09:00 - 13:00', 'law-firm-pyeongjeong'); ?><br>
                                   <?php esc_html_e('일요일 및 공휴일 휴무', 'law-firm-pyeongjeong'); ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom Contact Bar (Same as Main Page) -->
<div class="hero-bottom-contact">
    <div class="contact-info-wrapper">
        <div class="contact-phone">
            <i class="fas fa-phone" aria-hidden="true"></i>
            <div class="phone-info">
                <span class="phone-label"><?php esc_html_e('24시간 미팅상담', 'law-firm-pyeongjeong'); ?></span>
                <a href="tel:02-554-5674" class="phone-number">02-554-5674</a>
            </div>
        </div>
        <div class="contact-buttons">
            <a href="https://pf.kakao.com/_XzMxmn" class="contact-btn kakao-btn" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/kakao-icon.svg" alt="KakaoTalk" />
                <?php esc_html_e('카톡상담', 'law-firm-pyeongjeong'); ?>
            </a>
            <a href="#consultation-form" class="contact-btn consultation-btn">
                <i class="fas fa-calendar-check" aria-hidden="true"></i>
                <?php esc_html_e('상담하기', 'law-firm-pyeongjeong'); ?>
            </a>
        </div>
    </div>
</div>

</main>

<?php wp_footer(); ?>
</body>
</html>
