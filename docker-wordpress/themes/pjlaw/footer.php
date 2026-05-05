<?php
/**
 * Footer Template
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
    <footer class="footer" role="contentinfo">
        <div class="footer-main">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-column">
                        <h3 class="footer-title"><?php esc_html_e('평정소개', 'pjlaw'); ?></h3>
                        <ul class="footer-links-list">
                            <li><a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('평정소개', 'pjlaw'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/team/')); ?>"><?php esc_html_e('구성원소개', 'pjlaw'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/directions/')); ?>"><?php esc_html_e('오시는길', 'pjlaw'); ?></a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h3 class="footer-title"><?php esc_html_e('업무분야', 'pjlaw'); ?></h3>
                        <ul class="footer-links-list">
                            <li><a href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('업무 분야별', 'pjlaw'); ?></a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h3 class="footer-title"><?php esc_html_e('블로그', 'pjlaw'); ?></h3>
                        <ul class="footer-links-list">
                            <li><a href="<?php echo esc_url(home_url('/blog/')); ?>"><?php esc_html_e('법률정보', 'pjlaw'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/strategy/')); ?>"><?php esc_html_e('대응전략', 'pjlaw'); ?></a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h3 class="footer-title"><?php esc_html_e('업무사례', 'pjlaw'); ?></h3>
                        <ul class="footer-links-list">
                            <li><a href="<?php echo esc_url(home_url('/cases/')); ?>"><?php esc_html_e('성공사례', 'pjlaw'); ?></a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h3 class="footer-title"><?php esc_html_e('인재채용', 'pjlaw'); ?></h3>
                        <ul class="footer-links-list">
                            <li><a href="<?php echo esc_url(home_url('/careers/introduction/')); ?>"><?php esc_html_e('인재상', 'pjlaw'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/careers/jobs/')); ?>"><?php esc_html_e('채용공고', 'pjlaw'); ?></a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-column">
                        <h3 class="footer-title"><?php esc_html_e('상담예약', 'pjlaw'); ?></h3>
                        <ul class="footer-links-list">
                            <li><a href="<?php echo esc_url(home_url('/consultation/')); ?>"><?php esc_html_e('온라인상담', 'pjlaw'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/kakao/')); ?>"><?php esc_html_e('카톡상담', 'pjlaw'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('전화상담', 'pjlaw'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-legal">
                    <div class="legal-top">
                        <a href="<?php echo esc_url(home_url('/directions/')); ?>"><?php esc_html_e('오시는길', 'pjlaw'); ?></a>
                        <span class="divider"></span>
                        <a href="<?php echo esc_url(home_url('/privacy/')); ?>" class="bold"><?php esc_html_e('개인정보처리방침', 'pjlaw'); ?></a>
                    </div>
                    <div class="legal-separator"></div>
                    <div class="legal-bottom">
                        <div class="legal-info">
                            <p><?php esc_html_e('서울특별시 강남구 테헤란로 238, 마크로젠빌딩 12층       Tel : 02-554-5674', 'pjlaw'); ?></p>
                            <p class="copyright"><?php esc_html_e('Copyright ⓒ Pyeongjeong. All Rights Reserved', 'pjlaw'); ?></p>
                        </div>
                        <div class="footer-logo-wrap">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/footer-logo.png'); ?>" alt="Logo" class="footer-logo" />
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="scroll-top">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/home/scroll-top.svg'); ?>" alt="Top" />
            </a>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
