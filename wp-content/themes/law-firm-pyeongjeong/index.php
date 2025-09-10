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
                        <div class="logo-shield">
                            <i class="fas fa-shield-alt" aria-hidden="true"></i>
                        </div>
                        <div class="logo-text">
                            <h1 class="site-title">법률사무소 평정</h1>
                            <p class="site-tagline">LEE & PARTNERS</p>
                        </div>
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
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDJDNS41ODEgMiAyIDUuMTM0IDIgOC44ODlDMiAxMS4xNjcgMy4xOTEgMTMuMTY3IDQuOTk5IDE0LjMzM0w0LjI5NCAxNy4yMjJMMTMuNzA2IDE0LjMzM0MxNi44MDkgMTMuMTY3IDE4IDExLjE2NyAxOCA4Ljg4OUMxOCA1LjEzNCAE0LjQxOSAyIDEwIDJaIiBmaWxsPSIjM0MxRTFFIi8+Cjwvc3ZnPgo=" alt="KakaoTalk" />
                    <?php esc_html_e('카톡상담', 'law-firm-pyeongjeong'); ?>
                </a>
                <a href="#consultation-form" class="contact-btn consultation-btn" data-scroll-to="contact">
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
        <div class="about-content">
            <div class="about-text">
                <div class="section-header">
                    <h2><?php esc_html_e('소개', 'law-firm-pyeongjeong'); ?></h2>
                    <div class="section-subtitle"><?php esc_html_e('ABOUT US', 'law-firm-pyeongjeong'); ?></div>
                </div>
                
                <div class="about-description">
                    <p class="lead-text"><?php esc_html_e('법률사무소 평정은 고객의 권익 보호를 최우선으로 하는 전문 법률 서비스를 제공합니다.', 'law-firm-pyeongjeong'); ?></p>
                    <p><?php esc_html_e('풍부한 경험과 전문성을 바탕으로 다양한 법적 문제에 대한 최적의 솔루션을 제공하여 고객의 만족과 신뢰를 얻어왔습니다. 민사, 형사, 가족법, 부동산 등 다양한 분야에서 축적된 노하우로 고객의 권익을 보호합니다.', 'law-firm-pyeongjeong'); ?></p>
                </div>

                <div class="about-values">
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-balance-scale" aria-hidden="true"></i>
                        </div>
                        <h4><?php esc_html_e('정의 구현', 'law-firm-pyeongjeong'); ?></h4>
                        <p><?php esc_html_e('공정하고 투명한 법률 서비스', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-handshake" aria-hidden="true"></i>
                        </div>
                        <h4><?php esc_html_e('신뢰 관계', 'law-firm-pyeongjeong'); ?></h4>
                        <p><?php esc_html_e('고객과의 깊은 신뢰 구축', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                    <div class="value-item">
                        <div class="value-icon">
                            <i class="fas fa-award" aria-hidden="true"></i>
                        </div>
                        <h4><?php esc_html_e('전문성', 'law-firm-pyeongjeong'); ?></h4>
                        <p><?php esc_html_e('각 분야별 전문 지식과 경험', 'law-firm-pyeongjeong'); ?></p>
                    </div>
                </div>
            </div>

            <div class="about-stats">
                <div class="stat-item">
                    <div class="stat-number">15+</div>
                    <div class="stat-label"><?php esc_html_e('년 경력', 'law-firm-pyeongjeong'); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label"><?php esc_html_e('성공 사례', 'law-firm-pyeongjeong'); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">95%</div>
                    <div class="stat-label"><?php esc_html_e('고객 만족도', 'law-firm-pyeongjeong'); ?></div>
                </div>
            </div>
        </div>
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

<!-- Contact Section -->
<section id="contact" class="content-section contact-section">
    <div class="section-container">
        <div class="contact-content">
            <div class="section-header">
                <h2><?php esc_html_e('상담문의', 'law-firm-pyeongjeong'); ?></h2>
                <div class="section-subtitle"><?php esc_html_e('CONSULTATION', 'law-firm-pyeongjeong'); ?></div>
                <p class="section-description"><?php esc_html_e('법적 문제로 고민이 있으시다면 언제든지 상담을 요청하세요. 전문 변호사가 고객의 상황을 정확히 파악하여 최적의 해결 방안을 제시해드립니다.', 'law-firm-pyeongjeong'); ?></p>
            </div>

            <div class="contact-layout">
                <div class="consultation-form-section">
                    <h3><?php esc_html_e('온라인 상담접수', 'law-firm-pyeongjeong'); ?></h3>
                    
                    <form id="consultation-form" class="consultation-form" method="post" action="">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="client-name"><?php esc_html_e('이름', 'law-firm-pyeongjeong'); ?> *</label>
                                <input type="text" id="client-name" name="client_name" required aria-describedby="name-error">
                                <span id="name-error" class="error-message"></span>
                            </div>
                            
                            <div class="form-group">
                                <label for="client-phone"><?php esc_html_e('연락처', 'law-firm-pyeongjeong'); ?> *</label>
                                <input type="tel" id="client-phone" name="client_phone" placeholder="010-0000-0000" required aria-describedby="phone-error">
                                <span id="phone-error" class="error-message"></span>
                            </div>
                        </div>

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

                        <div class="form-group">
                            <label for="consultation-content"><?php esc_html_e('상담내용', 'law-firm-pyeongjeong'); ?> *</label>
                            <textarea id="consultation-content" name="consultation_content" rows="5" placeholder="<?php esc_attr_e('상담받고 싶은 내용을 구체적으로 작성해주세요.', 'law-firm-pyeongjeong'); ?>" required aria-describedby="content-error"></textarea>
                            <span id="content-error" class="error-message"></span>
                        </div>

                        <div class="form-group privacy-consent">
                            <label class="checkbox-label">
                                <input type="checkbox" id="privacy-consent" name="privacy_consent" required>
                                <span class="checkmark"></span>
                                <?php esc_html_e('개인정보 수집 및 이용에 동의합니다', 'law-firm-pyeongjeong'); ?> *
                            </label>
                            <a href="#" class="privacy-link"><?php esc_html_e('개인정보처리방침 보기', 'law-firm-pyeongjeong'); ?></a>
                        </div>

                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane" aria-hidden="true"></i>
                            <?php esc_html_e('온라인 상담 문의 신청', 'law-firm-pyeongjeong'); ?>
                        </button>
                    </form>
                </div>

                <div class="contact-info-section">
                    <div class="contact-card">
                        <h3><?php esc_html_e('연락처 정보', 'law-firm-pyeongjeong'); ?></h3>
                        
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
                                <p><a href="mailto:info@pyeongjeong-law.com">info@pyeongjeong-law.com</a></p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            </div>
                            <div class="info-content">
                                <h4><?php esc_html_e('주소', 'law-firm-pyeongjeong'); ?></h4>
                                <p><?php esc_html_e('서울시 강남구 테헤란로 123, 평정빌딩 15층', 'law-firm-pyeongjeong'); ?></p>
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

                        <div class="emergency-contact">
                            <h4><?php esc_html_e('긴급상담', 'law-firm-pyeongjeong'); ?></h4>
                            <p><?php esc_html_e('24시간 긴급상담 가능', 'law-firm-pyeongjeong'); ?></p>
                            <a href="tel:010-1234-5678" class="emergency-btn">
                                <i class="fas fa-phone-alt" aria-hidden="true"></i>
                                <?php esc_html_e('긴급상담 연결', 'law-firm-pyeongjeong'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>