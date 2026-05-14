<?php
/**
 * Services (업무분야) Page Template
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();
?>

<main id="main" class="site-main services-page" role="main">
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
                            <img src="<?php echo esc_url($theme_uri . '/assets/icons/services/icon-civil.svg'); ?>" alt="" />
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
                        <a href="#" class="services-all-tag">가등기말소</a>
                        <a href="#" class="services-all-tag">가사상속</a>
                        <a href="#" class="services-all-tag">감금</a>
                        <a href="#" class="services-all-tag">강간</a>
                        <a href="#" class="services-all-tag">강도</a>
                        <a href="#" class="services-all-tag">강릉 분사무소</a>
                        <a href="#" class="services-all-tag">강요</a>
                        <a href="#" class="services-all-tag">강제추행</a>
                        <a href="#" class="services-all-tag">개명</a>
                        <a href="#" class="services-all-tag">개인정보보호법위반</a>
                        <a href="#" class="services-all-tag">거짓말탐지기</a>
                        <a href="#" class="services-all-tag">건물인도</a>
                        <a href="#" class="services-all-tag">경범죄처벌법위반</a>
                        <a href="#" class="services-all-tag">계약금</a>
                        <a href="#" class="services-all-tag">계약해제</a>
                        <a href="#" class="services-all-tag">강제집행면탈</a>
                        <a href="#" class="services-all-tag">고양 분사무소</a>
                        <a href="#" class="services-all-tag">공갈</a>
                        <a href="#" class="services-all-tag">공무집행방해</a>
                        <a href="#" class="services-all-tag">공사대금</a>
                        <a href="#" class="services-all-tag">공연음란</a>
                        <a href="#" class="services-all-tag">공정거래</a>
                        <a href="#" class="services-all-tag">공중협박</a>
                        <a href="#" class="services-all-tag">관세</a>
                        <a href="#" class="services-all-tag">광주 분사무소</a>
                        <a href="#" class="services-all-tag">교통사고</a>
                        <a href="#" class="services-all-tag">구미 분사무소</a>
                        <a href="#" class="services-all-tag">국가계약</a>
                        <a href="#" class="services-all-tag">국가배심청구</a>
                        <a href="#" class="services-all-tag">국제조세</a>
                        <a href="#" class="services-all-tag">군법무(군형사)</a>
                        <a href="#" class="services-all-tag">군산 분사무소</a>
                        <a href="#" class="services-all-tag">군성범죄</a>
                        <a href="#" class="services-all-tag">군징계</a>
                        <a href="#" class="services-all-tag">군폭행</a>
                        <a href="#" class="services-all-tag">군행정</a>
                        <a href="#" class="services-all-tag">근로기준법</a>
                        <a href="#" class="services-all-tag">근저당말소</a>
                        <a href="#" class="services-all-tag">금융범죄</a>
                        <a href="#" class="services-all-tag">기업 일반소송</a>
                        <a href="#" class="services-all-tag">기업도산</a>
                        <a href="#" class="services-all-tag">기업법무</a>
                        <a href="#" class="services-all-tag">기업자문</a>
                        <a href="#" class="services-all-tag">기타가사상속</a>
                        <a href="#" class="services-all-tag">기타교통사고</a>
                        <a href="#" class="services-all-tag">기타군법무</a>
                        <a href="#" class="services-all-tag">기타금전</a>
                        <a href="#" class="services-all-tag">기타기업</a>
                        <a href="#" class="services-all-tag">기타노동·산업재해</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
