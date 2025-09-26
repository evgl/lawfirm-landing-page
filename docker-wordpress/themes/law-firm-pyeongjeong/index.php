<?php
/**
 * Main Template File - Homepage with sectioned layout matching page_1.png design
 * 
 * @package Law_Firm_Pyeongjeong
 * @since 1.0.0
 */

get_header(); ?>

<!-- Main Hero Section -->
<section id="home-hero" class="homepage-hero">
    <!-- Professional Background with Overlay -->
    <div class="hero-background">
        <div class="hero-bg-image"></div>
        <div class="hero-overlay"></div>
    </div>
    
    <div class="hero-content">
        <!-- Main Logo Section -->
        <div class="hero-logo-section">
            <div class="main-logo">
                <?php if (has_custom_logo()) : ?>
                    <div class="hero-logo-image"><?php the_custom_logo(); ?></div>
                <?php else : ?>
                    <div class="law-firm-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-white.svg" alt="<?php echo esc_attr__('법률사무소 평정', 'law-firm-pyeongjeong'); ?>" class="hero-logo-image">
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Professional Search Section -->
        <div class="hero-search-section">
            <div class="search-container">
                <form class="hero-search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>" role="search">
                    <div class="search-input-wrapper">
                        <input type="search" 
                               name="s" 
                               class="search-input"
                               placeholder="<?php esc_attr_e('법률 상담이나 서비스를 검색하세요', 'law-firm-pyeongjeong'); ?>"
                               value="<?php echo get_search_query(); ?>"
                               aria-label="<?php esc_attr_e('검색', 'law-firm-pyeongjeong'); ?>">
                        <button type="submit" class="search-button" aria-label="<?php esc_attr_e('검색', 'law-firm-pyeongjeong'); ?>">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <span>Scroll</span>
            <i class="fas fa-chevron-down" aria-hidden="true"></i>
        </div>
    </div>

    <!-- Bottom Contact Bar -->
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
                <a href="#" class="contact-btn kakao-btn">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/kakao-icon.svg" alt="KakaoTalk" />
                    <?php esc_html_e('카톡상담', 'law-firm-pyeongjeong'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/contact/#consultation-form')); ?>" class="contact-btn consultation-btn">
                    <i class="fas fa-calendar-check" aria-hidden="true"></i>
                    <?php esc_html_e('상담하기', 'law-firm-pyeongjeong'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="content-section about-section">
    <div class="section-container">
        <!-- Content cleaned - ready for new content -->
    </div>
</section>

<!-- Services Section -->
<section id="services" class="content-section services-section">
    <div class="section-container">
        <div class="services-content">
            <div class="section-header">
                <h2><?php esc_html_e('업무분야', 'law-firm-pyeongjeong'); ?></h2>
                <div class="section-subtitle"><?php esc_html_e('PRACTICE AREAS', 'law-firm-pyeongjeong'); ?></div>
                <p class="section-description"><?php esc_html_e('다양한 분야의 전문적인 법률 서비스를 제공합니다. 각 분야별 전문 변호사가 고객의 사안을 정확히 파악하여 최적의 법적 대응 방안을 제시합니다.', 'law-firm-pyeongjeong'); ?></p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-gavel" aria-hidden="true"></i>
                    </div>
                    <h3><?php esc_html_e('민사소송', 'law-firm-pyeongjeong'); ?></h3>
                    <p><?php esc_html_e('계약분쟁, 손해배상, 부당이득 등 민사 관련 법적 분쟁을 전문적으로 해결합니다.', 'law-firm-pyeongjeong'); ?></p>
                    <a href="#" class="service-link"><?php esc_html_e('자세히 보기', 'law-firm-pyeongjeong'); ?> <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-shield-alt" aria-hidden="true"></i>
                    </div>
                    <h3><?php esc_html_e('형사소송', 'law-firm-pyeongjeong'); ?></h3>
                    <p><?php esc_html_e('각종 형사사건 변호 및 수사기관 대응을 통해 고객의 권익을 보호합니다.', 'law-firm-pyeongjeong'); ?></p>
                    <a href="#" class="service-link"><?php esc_html_e('자세히 보기', 'law-firm-pyeongjeong'); ?> <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-heart" aria-hidden="true"></i>
                    </div>
                    <h3><?php esc_html_e('가족법', 'law-firm-pyeongjeong'); ?></h3>
                    <p><?php esc_html_e('이혼, 양육권, 재산분할, 상속 등 가족 관련 법률 문제를 해결합니다.', 'law-firm-pyeongjeong'); ?></p>
                    <a href="#" class="service-link"><?php esc_html_e('자세히 보기', 'law-firm-pyeongjeong'); ?> <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-home" aria-hidden="true"></i>
                    </div>
                    <h3><?php esc_html_e('부동산법', 'law-firm-pyeongjeong'); ?></h3>
                    <p><?php esc_html_e('부동산 매매, 임대차, 재개발, 경매 등 부동산 관련 법적 서비스를 제공합니다.', 'law-firm-pyeongjeong'); ?></p>
                    <a href="#" class="service-link"><?php esc_html_e('자세히 보기', 'law-firm-pyeongjeong'); ?> <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-building" aria-hidden="true"></i>
                    </div>
                    <h3><?php esc_html_e('기업법무', 'law-firm-pyeongjeong'); ?></h3>
                    <p><?php esc_html_e('기업 설립, 계약서 검토, 기업 분쟁, 컴플라이언스 등 기업 법무를 지원합니다.', 'law-firm-pyeongjeong'); ?></p>
                    <a href="#" class="service-link"><?php esc_html_e('자세히 보기', 'law-firm-pyeongjeong'); ?> <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-lightbulb" aria-hidden="true"></i>
                    </div>
                    <h3><?php esc_html_e('지적재산권', 'law-firm-pyeongjeong'); ?></h3>
                    <p><?php esc_html_e('특허, 상표, 저작권, 영업비밀 등 지적재산권 보호 및 분쟁 해결을 담당합니다.', 'law-firm-pyeongjeong'); ?></p>
                    <a href="#" class="service-link"><?php esc_html_e('자세히 보기', 'law-firm-pyeongjeong'); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section id="team" class="content-section team-section">
    <div class="section-container">
        <div class="team-content">
            <div class="section-header">
                <h2><?php esc_html_e('구성원', 'law-firm-pyeongjeong'); ?></h2>
                <div class="section-subtitle"><?php esc_html_e('OUR TEAM', 'law-firm-pyeongjeong'); ?></div>
                <p class="section-description"><?php esc_html_e('각 분야별 전문성을 갖춘 우수한 변호사진으로 구성되어 있습니다. 풍부한 실무 경험과 전문 지식을 바탕으로 고객의 다양한 법적 요구에 체계적이고 효율적으로 대응합니다.', 'law-firm-pyeongjeong'); ?></p>
            </div>

            <div class="team-grid">
                <div class="team-member">
                    <div class="member-photo">
                        <div class="photo-placeholder">
                            <i class="fas fa-user-tie" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="member-info">
                        <h3><?php esc_html_e('이평정', 'law-firm-pyeongjeong'); ?></h3>
                        <div class="member-position"><?php esc_html_e('대표변호사', 'law-firm-pyeongjeong'); ?></div>
                        <div class="member-speciality">
                            <span><?php esc_html_e('민사소송', 'law-firm-pyeongjeong'); ?></span>
                            <span><?php esc_html_e('형사소송', 'law-firm-pyeongjeong'); ?></span>
                        </div>
                        <div class="member-credentials">
                            <p><?php esc_html_e('• 서울대학교 법과대학 졸업', 'law-firm-pyeongjeong'); ?></p>
                            <p><?php esc_html_e('• 사법고시 45기 합격', 'law-firm-pyeongjeong'); ?></p>
                            <p><?php esc_html_e('• 15년 이상 실무 경력', 'law-firm-pyeongjeong'); ?></p>
                        </div>
                        <a href="#" class="member-contact"><?php esc_html_e('연락하기', 'law-firm-pyeongjeong'); ?></a>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-photo">
                        <div class="photo-placeholder">
                            <i class="fas fa-user-tie" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="member-info">
                        <h3><?php esc_html_e('김정의', 'law-firm-pyeongjeong'); ?></h3>
                        <div class="member-position"><?php esc_html_e('파트너 변호사', 'law-firm-pyeongjeong'); ?></div>
                        <div class="member-speciality">
                            <span><?php esc_html_e('부동산법', 'law-firm-pyeongjeong'); ?></span>
                            <span><?php esc_html_e('기업법무', 'law-firm-pyeongjeong'); ?></span>
                        </div>
                        <div class="member-credentials">
                            <p><?php esc_html_e('• 연세대학교 법학과 졸업', 'law-firm-pyeongjeong'); ?></p>
                            <p><?php esc_html_e('• 변호사시험 1기 합격', 'law-firm-pyeongjeong'); ?></p>
                            <p><?php esc_html_e('• 대기업 법무팀 출신', 'law-firm-pyeongjeong'); ?></p>
                        </div>
                        <a href="#" class="member-contact"><?php esc_html_e('연락하기', 'law-firm-pyeongjeong'); ?></a>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-photo">
                        <div class="photo-placeholder">
                            <i class="fas fa-user-tie" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="member-info">
                        <h3><?php esc_html_e('박신뢰', 'law-firm-pyeongjeong'); ?></h3>
                        <div class="member-position"><?php esc_html_e('시니어 변호사', 'law-firm-pyeongjeong'); ?></div>
                        <div class="member-speciality">
                            <span><?php esc_html_e('가족법', 'law-firm-pyeongjeong'); ?></span>
                            <span><?php esc_html_e('지적재산권', 'law-firm-pyeongjeong'); ?></span>
                        </div>
                        <div class="member-credentials">
                            <p><?php esc_html_e('• 고려대학교 법학과 졸업', 'law-firm-pyeongjeong'); ?></p>
                            <p><?php esc_html_e('• 변호사시험 2기 합격', 'law-firm-pyeongjeong'); ?></p>
                            <p><?php esc_html_e('• 가사법원 조정위원 경력', 'law-firm-pyeongjeong'); ?></p>
                        </div>
                        <a href="#" class="member-contact"><?php esc_html_e('연락하기', 'law-firm-pyeongjeong'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Cases Section -->
<section id="cases" class="content-section cases-section">
    <div class="section-container">
        <div class="cases-content">
            <div class="section-header">
                <h2><?php esc_html_e('성공사례', 'law-firm-pyeongjeong'); ?></h2>
                <div class="section-subtitle"><?php esc_html_e('SUCCESS CASES', 'law-firm-pyeongjeong'); ?></div>
                <p class="section-description"><?php esc_html_e('지금까지 수많은 성공 사례를 통해 고객의 권익을 보호해왔습니다. 복잡하고 어려운 사건도 체계적인 접근과 전문적인 대응으로 만족스러운 결과를 이끌어내고 있습니다.', 'law-firm-pyeongjeong'); ?></p>
            </div>

            <div class="cases-search-section">
                <form class="cases-search-form" method="get" action="#cases">
                    <div class="search-input-wrapper">
                        <input type="search" 
                               name="case_search" 
                               class="cases-search-input"
                               placeholder="<?php esc_attr_e('사건 유형이나 키워드로 검색하세요', 'law-firm-pyeongjeong'); ?>"
                               aria-label="<?php esc_attr_e('사례 검색', 'law-firm-pyeongjeong'); ?>">
                        <button type="submit" class="cases-search-button" aria-label="<?php esc_attr_e('검색', 'law-firm-pyeongjeong'); ?>">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>

                <div class="case-categories">
                    <button class="category-btn active" data-category="all"><?php esc_html_e('전체', 'law-firm-pyeongjeong'); ?></button>
                    <button class="category-btn" data-category="criminal"><?php esc_html_e('형사', 'law-firm-pyeongjeong'); ?></button>
                    <button class="category-btn" data-category="civil"><?php esc_html_e('민사', 'law-firm-pyeongjeong'); ?></button>
                    <button class="category-btn" data-category="family"><?php esc_html_e('가사', 'law-firm-pyeongjeong'); ?></button>
                    <button class="category-btn" data-category="real-estate"><?php esc_html_e('부동산', 'law-firm-pyeongjeong'); ?></button>
                    <button class="category-btn" data-category="corporate"><?php esc_html_e('기업법무', 'law-firm-pyeongjeong'); ?></button>
                </div>
            </div>

            <div class="cases-grid">
                <div class="case-card" data-category="criminal">
                    <div class="case-badge criminal"><?php esc_html_e('형사', 'law-firm-pyeongjeong'); ?></div>
                    <h3><?php esc_html_e('업무상 배임 무혐의 처분', 'law-firm-pyeongjeong'); ?></h3>
                    <p class="case-summary"><?php esc_html_e('대기업 임원의 업무상 배임 혐의에 대해 철저한 사실관계 분석과 법리 검토를 통해 무혐의 처분을 이끌어낸 사례입니다.', 'law-firm-pyeongjeong'); ?></p>
                    <div class="case-result"><?php esc_html_e('결과: 무혐의 처분', 'law-firm-pyeongjeong'); ?></div>
                </div>

                <div class="case-card" data-category="civil">
                    <div class="case-badge civil"><?php esc_html_e('민사', 'law-firm-pyeongjeong'); ?></div>
                    <h3><?php esc_html_e('건설공사 대금 청구 승소', 'law-firm-pyeongjeong'); ?></h3>
                    <p class="case-summary"><?php esc_html_e('건설업체의 미지급 공사대금 회수를 위한 민사소송에서 전액 승소판결을 받아낸 성공 사례입니다.', 'law-firm-pyeongjeong'); ?></p>
                    <div class="case-result"><?php esc_html_e('결과: 전액 승소 (5억원)', 'law-firm-pyeongjeong'); ?></div>
                </div>

                <div class="case-card" data-category="family">
                    <div class="case-badge family"><?php esc_html_e('가사', 'law-firm-pyeongjeong'); ?></div>
                    <h3><?php esc_html_e('이혼소송 재산분할 합의', 'law-firm-pyeongjeong'); ?></h3>
                    <p class="case-summary"><?php esc_html_e('복잡한 재산관계를 가진 부부의 이혼소송에서 고객에게 유리한 재산분할 합의를 성사시킨 사례입니다.', 'law-firm-pyeongjeong'); ?></p>
                    <div class="case-result"><?php esc_html_e('결과: 유리한 합의 성사', 'law-firm-pyeongjeong'); ?></div>
                </div>

                <div class="case-card" data-category="real-estate">
                    <div class="case-badge real-estate"><?php esc_html_e('부동산', 'law-firm-pyeongjeong'); ?></div>
                    <h3><?php esc_html_e('부동산 매매계약 해제', 'law-firm-pyeongjeong'); ?></h3>
                    <p class="case-summary"><?php esc_html_e('하자있는 부동산 매매계약의 해제와 손해배상을 통해 고객의 피해를 완전히 회복한 사례입니다.', 'law-firm-pyeongjeong'); ?></p>
                    <div class="case-result"><?php esc_html_e('결과: 계약해제 및 손해배상', 'law-firm-pyeongjeong'); ?></div>
                </div>

                <div class="case-card" data-category="corporate">
                    <div class="case-badge corporate"><?php esc_html_e('기업법무', 'law-firm-pyeongjeong'); ?></div>
                    <h3><?php esc_html_e('특허침해 방어 성공', 'law-firm-pyeongjeong'); ?></h3>
                    <p class="case-summary"><?php esc_html_e('경쟁사의 특허침해 주장에 대해 무효심판과 침해부존재 확인을 통해 기업을 보호한 사례입니다.', 'law-firm-pyeongjeong'); ?></p>
                    <div class="case-result"><?php esc_html_e('결과: 침해부존재 확인', 'law-firm-pyeongjeong'); ?></div>
                </div>

                <div class="case-card" data-category="civil">
                    <div class="case-badge civil"><?php esc_html_e('민사', 'law-firm-pyeongjeong'); ?></div>
                    <h3><?php esc_html_e('교통사고 손해배상', 'law-firm-pyeongjeong'); ?></h3>
                    <p class="case-summary"><?php esc_html_e('중대한 교통사고 피해자를 대리하여 적정한 손해배상금을 받아낸 성공 사례입니다.', 'law-firm-pyeongjeong'); ?></p>
                    <div class="case-result"><?php esc_html_e('결과: 손해배상 승소', 'law-firm-pyeongjeong'); ?></div>
                </div>
            </div>

            <div class="cases-footer">
                <button class="btn btn-primary btn-large"><?php esc_html_e('전체 업무 사례 보기', 'law-firm-pyeongjeong'); ?></button>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
