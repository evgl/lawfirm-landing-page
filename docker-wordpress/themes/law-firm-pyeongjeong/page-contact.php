<?php
/**
 * Template Name: Contact Page
 * 
 * Custom template for contact and location page
 * 
 * @package Law_Firm_Pyeongjeong
 * @since 1.0.0
 */

get_header(); ?>

<div class="contact-page-wrapper">
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="page-header-content">
                <h1 class="page-title"><?php _e('연락처 및 오시는 길', 'law-firm-pyeongjeong'); ?></h1>
                <p class="page-subtitle">
                    <?php _e('언제든지 편리한 방법으로 연락해주세요. 전문 변호사가 신속하게 도움을 드리겠습니다.', 'law-firm-pyeongjeong'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="contact-info-section section">
        <div class="container">
            <div class="contact-info-grid">
                <!-- Main Office Info -->
                <div class="contact-card main-office">
                    <div class="contact-icon">
                        <i class="fas fa-building" aria-hidden="true"></i>
                    </div>
                    <div class="contact-details">
                        <h3><?php _e('법률사무소 평정', 'law-firm-pyeongjeong'); ?></h3>
                        <div class="detail-item">
                            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            <div>
                                <strong><?php _e('주소', 'law-firm-pyeongjeong'); ?></strong>
                                <p><?php echo wp_kses_post(nl2br(get_theme_mod('law_firm_address', '서울 강남구 논현로63길 7<br>금성빌딩 6층, 법률사무소 평정'))); ?></p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-phone" aria-hidden="true"></i>
                            <div>
                                <strong><?php _e('대표전화', 'law-firm-pyeongjeong'); ?></strong>
                                <p>
                                    <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('law_firm_phone', '02-554-6674'))); ?>">
                                        <?php echo esc_html(get_theme_mod('law_firm_phone', '02-554-6674')); ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-clock" aria-hidden="true"></i>
                            <div>
                                <strong><?php _e('업무시간', 'law-firm-pyeongjeong'); ?></strong>
                                <p><?php echo wp_kses_post(nl2br(get_theme_mod('law_firm_hours', '평일업무시간 | 10:00 - 19:00<br>365일 24시간 상담가능'))); ?></p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                            <div>
                                <strong><?php _e('이메일', 'law-firm-pyeongjeong'); ?></strong>
                                <p><a href="mailto:info@pyeongjeong-law.com">info@pyeongjeong-law.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Contact Methods -->
                <div class="quick-contact-methods">
                    <h3><?php _e('빠른 연락 방법', 'law-firm-pyeongjeong'); ?></h3>
                    
                    <div class="contact-method">
                        <div class="method-icon">
                            <i class="fas fa-phone-volume" aria-hidden="true"></i>
                        </div>
                        <div class="method-info">
                            <h4><?php _e('전화 상담', 'law-firm-pyeongjeong'); ?></h4>
                            <p><?php _e('즉시 전문 변호사와 연결', 'law-firm-pyeongjeong'); ?></p>
                            <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('law_firm_phone', '02-554-6674'))); ?>" 
                               class="btn btn-primary btn-small">
                                <i class="fas fa-phone" aria-hidden="true"></i>
                                <?php _e('지금 전화하기', 'law-firm-pyeongjeong'); ?>
                            </a>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="method-icon">
                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                        </div>
                        <div class="method-info">
                            <h4><?php _e('카카오톡 상담', 'law-firm-pyeongjeong'); ?></h4>
                            <p><?php _e('간편하고 빠른 메신저 상담', 'law-firm-pyeongjeong'); ?></p>
                            <a href="#" class="btn btn-secondary btn-small" onclick="alert('카카오톡 채널: @법률사무소평정');">
                                <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                <?php _e('카톡 상담하기', 'law-firm-pyeongjeong'); ?>
                            </a>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="method-icon">
                            <i class="fas fa-calendar-check" aria-hidden="true"></i>
                        </div>
                        <div class="method-info">
                            <h4><?php _e('방문 예약', 'law-firm-pyeongjeong'); ?></h4>
                            <p><?php _e('사무실 방문을 통한 대면 상담', 'law-firm-pyeongjeong'); ?></p>
                            <a href="<?php echo esc_url(home_url('/consultation')); ?>" class="btn btn-outline btn-small">
                                <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                <?php _e('예약하기', 'law-firm-pyeongjeong'); ?>
                            </a>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="method-icon">
                            <i class="fas fa-video" aria-hidden="true"></i>
                        </div>
                        <div class="method-info">
                            <h4><?php _e('화상 상담', 'law-firm-pyeongjeong'); ?></h4>
                            <p><?php _e('원격으로 진행하는 대면 상담', 'law-firm-pyeongjeong'); ?></p>
                            <a href="<?php echo esc_url(home_url('/consultation')); ?>" class="btn btn-outline btn-small">
                                <i class="fas fa-video" aria-hidden="true"></i>
                                <?php _e('화상 상담 신청', 'law-firm-pyeongjeong'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="map-container">
            <!-- Google Maps or Naver Maps integration -->
            <div id="office-map" class="office-map" style="height: 400px; background: #f0f0f0;">
                <!-- Map will be loaded here -->
                <div class="map-placeholder">
                    <i class="fas fa-map-marked-alt fa-3x" aria-hidden="true"></i>
                    <p><?php _e('지도를 로딩 중입니다...', 'law-firm-pyeongjeong'); ?></p>
                    <p>
                        <a href="https://map.naver.com/v5/search/%EC%84%9C%EC%9A%B8%20%EA%B0%95%EB%82%A8%EA%B5%AC%20%EB%85%BC%ED%98%84%EB%A1%9C63%EA%B8%B8%207" 
                           target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                            <?php _e('네이버 지도에서 보기', 'law-firm-pyeongjeong'); ?>
                        </a>
                    </p>
                </div>
            </div>
            
            <!-- Location Info Overlay -->
            <div class="location-info-overlay">
                <div class="location-card">
                    <h3><?php _e('Location', 'law-firm-pyeongjeong'); ?></h3>
                    <div class="location-details">
                        <div class="location-item">
                            <i class="fas fa-map-pin" aria-hidden="true"></i>
                            <div>
                                <strong><?php echo wp_kses_post(str_replace('<br>', ' ', get_theme_mod('law_firm_address', '서울 강남구 논현로63길 7 금성빌딩 6층'))); ?></strong>
                            </div>
                        </div>
                        <div class="location-item">
                            <i class="fas fa-phone" aria-hidden="true"></i>
                            <div>
                                <strong><?php echo esc_html(get_theme_mod('law_firm_phone', '02-554-6674')); ?></strong>
                            </div>
                        </div>
                        <div class="location-item">
                            <i class="fas fa-clock" aria-hidden="true"></i>
                            <div>
                                <strong><?php _e('평일업무시간 | 10:00 - 19:00', 'law-firm-pyeongjeong'); ?></strong>
                                <br><small><?php _e('365일 24시간 상담가능', 'law-firm-pyeongjeong'); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Directions Section -->
    <section class="directions-section section bg-light">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('오시는 길 안내', 'law-firm-pyeongjeong'); ?></h2>
                <p class="section-subtitle">
                    <?php _e('대중교통과 자가용 이용시 찾아오시는 방법을 안내해드립니다', 'law-firm-pyeongjeong'); ?>
                </p>
            </div>

            <div class="directions-grid">
                <!-- Subway Directions -->
                <div class="direction-card">
                    <div class="direction-icon">
                        <i class="fas fa-subway" aria-hidden="true"></i>
                    </div>
                    <div class="direction-content">
                        <h3><?php _e('지하철 이용', 'law-firm-pyeongjeong'); ?></h3>
                        <div class="direction-details">
                            <div class="subway-line">
                                <span class="line-badge line-3"><?php _e('3호선', 'law-firm-pyeongjeong'); ?></span>
                                <p><?php _e('압구정역 6번 출구 도보 8분', 'law-firm-pyeongjeong'); ?></p>
                            </div>
                            <div class="subway-line">
                                <span class="line-badge line-7"><?php _e('7호선', 'law-firm-pyeongjeong'); ?></span>
                                <p><?php _e('강남구청역 1번 출구 도보 10분', 'law-firm-pyeongjeong'); ?></p>
                            </div>
                            <div class="subway-line">
                                <span class="line-badge line-bundang"><?php _e('분당선', 'law-firm-pyeongjeong'); ?></span>
                                <p><?php _e('압구정로데오역 5번 출구 도보 12분', 'law-firm-pyeongjeong'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bus Directions -->
                <div class="direction-card">
                    <div class="direction-icon">
                        <i class="fas fa-bus" aria-hidden="true"></i>
                    </div>
                    <div class="direction-content">
                        <h3><?php _e('버스 이용', 'law-firm-pyeongjeong'); ?></h3>
                        <div class="direction-details">
                            <div class="bus-info">
                                <h4><?php _e('간선버스', 'law-firm-pyeongjeong'); ?></h4>
                                <p><?php _e('143, 241, 301, 401, 421', 'law-firm-pyeongjeong'); ?></p>
                                <small><?php _e('압구정역·현대백화점 정류장 하차', 'law-firm-pyeongjeong'); ?></small>
                            </div>
                            <div class="bus-info">
                                <h4><?php _e('지선버스', 'law-film-pyeongjeong'); ?></h4>
                                <p><?php _e('2415, 3217, 4211, 6411', 'law-firm-pyeongjeong'); ?></p>
                                <small><?php _e('학동사거리 정류장 하차', 'law-firm-pyeongjeong'); ?></small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Car Directions -->
                <div class="direction-card">
                    <div class="direction-icon">
                        <i class="fas fa-car" aria-hidden="true"></i>
                    </div>
                    <div class="direction-content">
                        <h3><?php _e('자가용 이용', 'law-firm-pyeongjeong'); ?></h3>
                        <div class="direction-details">
                            <div class="car-route">
                                <h4><?php _e('네비게이션 입력', 'law-firm-pyeongjeong'); ?></h4>
                                <p><strong><?php _e('서울 강남구 논현로63길 7', 'law-firm-pyeongjeong'); ?></strong></p>
                                <p><?php _e('또는 "금성빌딩" 검색', 'law-firm-pyeongjeong'); ?></p>
                            </div>
                            <div class="parking-info">
                                <h4><?php _e('주차 안내', 'law-firm-pyeongjeong'); ?></h4>
                                <p><?php _e('건물 내 지하주차장 이용 가능', 'law-firm-pyeongjeong'); ?></p>
                                <p><?php _e('상담 고객 2시간 무료 주차 제공', 'law-firm-pyeongjeong'); ?></p>
                                <small><?php _e('주차권은 리셉션에서 받으시기 바랍니다', 'law-firm-pyeongjeong'); ?></small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Landmark Directions -->
                <div class="direction-card">
                    <div class="direction-icon">
                        <i class="fas fa-landmark" aria-hidden="true"></i>
                    </div>
                    <div class="direction-content">
                        <h3><?php _e('주요 랜드마크', 'law-firm-pyeongjeong'); ?></h3>
                        <div class="direction-details">
                            <div class="landmark-info">
                                <p><i class="fas fa-store" aria-hidden="true"></i> <?php _e('현대백화점 압구정본점 도보 3분', 'law-firm-pyeongjeong'); ?></p>
                                <p><i class="fas fa-building" aria-hidden="true"></i> <?php _e('압구정CGV 도보 5분', 'law-firm-pyeongjeong'); ?></p>
                                <p><i class="fas fa-coffee" aria-hidden="true"></i> <?php _e('스타벅스 압구정역점 도보 2분', 'law-firm-pyeongjeong'); ?></p>
                                <p><i class="fas fa-hospital" aria-hidden="true"></i> <?php _e('삼성서울병원 차량 10분', 'law-firm-pyeongjeong'); ?></p>
                            </div>
                            <div class="building-info">
                                <h4><?php _e('건물 정보', 'law-firm-pyeongjeong'); ?></h4>
                                <p><?php _e('금성빌딩 6층 (엘리베이터 이용)', 'law-firm-pyeongjeong'); ?></p>
                                <p><?php _e('1층 로비에서 안내데스크 문의', 'law-firm-pyeongjeong'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Office Hours and Contact -->
    <section class="office-hours-section section">
        <div class="container">
            <div class="office-hours-grid">
                <!-- Business Hours -->
                <div class="hours-card">
                    <div class="hours-header">
                        <i class="fas fa-clock fa-2x" aria-hidden="true"></i>
                        <h3><?php _e('운영 시간', 'law-firm-pyeongjeong'); ?></h3>
                    </div>
                    <div class="hours-content">
                        <div class="hour-item">
                            <span class="day"><?php _e('평일', 'law-firm-pyeongjeong'); ?></span>
                            <span class="time"><?php _e('10:00 - 19:00', 'law-firm-pyeongjeong'); ?></span>
                        </div>
                        <div class="hour-item">
                            <span class="day"><?php _e('토요일', 'law-firm-pyeongjeong'); ?></span>
                            <span class="time"><?php _e('10:00 - 15:00', 'law-firm-pyeongjeong'); ?></span>
                            <small><?php _e('(사전 예약시)', 'law-firm-pyeongjeong'); ?></small>
                        </div>
                        <div class="hour-item">
                            <span class="day"><?php _e('일요일/공휴일', 'law-firm-pyeongjeong'); ?></span>
                            <span class="time"><?php _e('휴무', 'law-firm-pyeongjeong'); ?></span>
                        </div>
                        <div class="emergency-contact">
                            <p><strong><?php _e('긴급상담', 'law-firm-pyeongjeong'); ?></strong></p>
                            <p><?php _e('365일 24시간 전화 접수 가능', 'law-firm-pyeongjeong'); ?></p>
                            <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('law_firm_phone', '02-554-6674'))); ?>" 
                               class="emergency-number">
                                <?php echo esc_html(get_theme_mod('law_firm_phone', '02-554-6674')); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-form-card">
                    <div class="form-header">
                        <i class="fas fa-envelope fa-2x" aria-hidden="true"></i>
                        <h3><?php _e('빠른 문의', 'law-firm-pyeongjeong'); ?></h3>
                        <p><?php _e('간단한 문의사항을 남겨주시면 빠르게 답변드리겠습니다', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                    
                    <form id="quick-contact-form" class="contact-form" method="post">
                        <div class="form-group">
                            <label for="quick-name"><?php _e('성함', 'law-firm-pyeongjeong'); ?> <span class="required">*</span></label>
                            <input type="text" id="quick-name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="quick-phone"><?php _e('연락처', 'law-firm-pyeongjeong'); ?> <span class="required">*</span></label>
                            <input type="tel" id="quick-phone" name="phone" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="quick-subject"><?php _e('문의 유형', 'law-firm-pyeongjeong'); ?></label>
                            <select id="quick-subject" name="subject" class="form-control">
                                <option value=""><?php _e('선택해주세요', 'law-firm-pyeongjeong'); ?></option>
                                <option value="consultation"><?php _e('상담 문의', 'law-firm-pyeongjeong'); ?></option>
                                <option value="appointment"><?php _e('방문 예약', 'law-firm-pyeongjeong'); ?></option>
                                <option value="case-inquiry"><?php _e('사건 진행 문의', 'law-firm-pyeongjeong'); ?></option>
                                <option value="fee-inquiry"><?php _e('비용 문의', 'law-firm-pyeongjeong'); ?></option>
                                <option value="other"><?php _e('기타', 'law-firm-pyeongjeong'); ?></option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="quick-message"><?php _e('문의 내용', 'law-firm-pyeongjeong'); ?></label>
                            <textarea id="quick-message" name="message" rows="4" 
                                      placeholder="<?php esc_attr_e('문의하실 내용을 간단히 작성해주세요', 'law-firm-pyeongjeong'); ?>"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="privacy-checkbox">
                                <input type="checkbox" name="privacy_consent" value="1" required>
                                <span class="checkmark"></span>
                                <?php _e('개인정보 수집 및 이용에 동의합니다.', 'law-firm-pyeongjeong'); ?> <span class="required">*</span>
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-paper-plane" aria-hidden="true"></i>
                            <?php _e('문의하기', 'law-firm-pyeongjeong'); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Map JavaScript -->
<script>
jQuery(document).ready(function($) {
    // Initialize Naver Map (you'll need to get an API key)
    function initMap() {
        // Coordinates for Seoul Gangnam-gu Nonhyeon-ro 63-gil 7
        const lat = 37.5270;
        const lng = 127.0276;
        
        // For now, show a placeholder with link to external map
        const mapContainer = document.getElementById('office-map');
        
        // If Naver Maps API is loaded, initialize the map
        if (typeof naver !== 'undefined' && naver.maps) {
            const map = new naver.maps.Map(mapContainer, {
                center: new naver.maps.LatLng(lat, lng),
                zoom: 16,
                mapTypeControl: true
            });
            
            // Add marker
            const marker = new naver.maps.Marker({
                position: new naver.maps.LatLng(lat, lng),
                map: map,
                title: '<?php echo esc_js(__('법률사무소 평정', 'law-firm-pyeongjeong')); ?>'
            });
            
            // Add info window
            const infoWindow = new naver.maps.InfoWindow({
                content: '<div style="padding:10px;font-size:14px;"><strong><?php echo esc_js(__('법률사무소 평정', 'law-firm-pyeongjeong')); ?></strong><br><?php echo esc_js(get_theme_mod('law_firm_address', '서울 강남구 논현로63길 7')); ?></div>'
            });
            
            marker.addListener('click', function(e) {
                if (infoWindow.getMap()) {
                    infoWindow.close();
                } else {
                    infoWindow.open(map, marker);
                }
            });
            
            // Remove placeholder
            $('.map-placeholder').hide();
        } else {
            // Show external map link as fallback
            $('.map-placeholder').show();
        }
    }
    
    // Try to initialize map
    initMap();
    
    // Handle contact form submission
    $('#quick-contact-form').on('submit', function(e) {
        e.preventDefault();
        
        const $form = $(this);
        const formData = new FormData($form[0]);
        
        // Basic validation
        const name = $form.find('input[name="name"]').val().trim();
        const phone = $form.find('input[name="phone"]').val().trim();
        const privacyConsent = $form.find('input[name="privacy_consent"]').is(':checked');
        
        if (!name || !phone || !privacyConsent) {
            alert('<?php echo esc_js(__('필수 항목을 모두 입력해주세요.', 'law-firm-pyeongjeong')); ?>');
            return;
        }
        
        // Add action for WordPress AJAX
        formData.append('action', 'law_firm_quick_contact');
        formData.append('nonce', law_firm_ajax.nonce);
        
        // Show loading
        const $submitButton = $form.find('button[type="submit"]');
        const originalText = $submitButton.html();
        $submitButton.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> <?php echo esc_js(__('전송 중...', 'law-firm-pyeongjeong')); ?>');
        
        // Submit via AJAX
        $.ajax({
            url: law_firm_ajax.ajax_url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    alert('<?php echo esc_js(__('문의가 성공적으로 전송되었습니다. 빠른 시일 내에 연락드리겠습니다.', 'law-firm-pyeongjeong')); ?>');
                    $form[0].reset();
                } else {
                    alert('<?php echo esc_js(__('전송 중 오류가 발생했습니다. 잠시 후 다시 시도해주세요.', 'law-firm-pyeongjeong')); ?>');
                }
            },
            error: function() {
                alert('<?php echo esc_js(__('서버 오류가 발생했습니다. 잠시 후 다시 시도해주세요.', 'law-firm-pyeongjeong')); ?>');
            },
            complete: function() {
                $submitButton.prop('disabled', false).html(originalText);
            }
        });
    });
    
    // Add smooth scrolling to map when linked from other pages
    if (window.location.hash === '#map') {
        $('html, body').animate({
            scrollTop: $('.map-section').offset().top - 100
        }, 800);
    }
});

// Load Naver Maps API (you'll need to replace with your actual API key)
(function() {
    const script = document.createElement('script');
    script.src = 'https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=YOUR_CLIENT_ID';
    script.onload = function() {
        // Map will be initialized in the ready function above
    };
    // Uncomment the line below when you have an API key
    // document.head.appendChild(script);
})();
</script>

<?php get_footer(); ?>