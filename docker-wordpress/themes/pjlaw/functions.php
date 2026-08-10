<?php
/**
 * PyeongJeong Law Theme Functions
 * 
 * @package PyeongJeong_Law
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Load blog infrastructure files
require_once get_template_directory() . '/inc/blog-seed.php';
require_once get_template_directory() . '/inc/blog-meta-boxes.php';

// Load careers infrastructure files
require_once get_template_directory() . '/inc/career-seed.php';
require_once get_template_directory() . '/inc/career-meta-boxes.php';

// Load cases infrastructure files
require_once get_template_directory() . '/inc/case-seed.php';
require_once get_template_directory() . '/inc/case-meta-boxes.php';

// Case Review (사례 후기) modules
require_once get_template_directory() . '/inc/case-review-seed.php';
require_once get_template_directory() . '/inc/case-review-meta-boxes.php';

// Load services infrastructure files
require_once get_template_directory() . '/inc/service-seed.php';
require_once get_template_directory() . '/inc/service-meta-boxes.php';

// Load team infrastructure files
require_once get_template_directory() . '/inc/team-seed.php';
require_once get_template_directory() . '/inc/team-meta-boxes.php';

// Load consultation infrastructure files
require_once get_template_directory() . '/inc/consultation-meta-boxes.php';
require_once get_template_directory() . '/inc/consultation-settings.php';

/**
 * Theme Setup
 */
function pjlaw_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style'
    ));
    
    // Add custom image sizes
    add_image_size('case-thumbnail', 386, 218, true);
    add_image_size('hero-image', 1920, 1080, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'pjlaw'),
        'footer' => __('Footer Menu', 'pjlaw'),
    ));
    
    // Load text domain for translations
    load_theme_textdomain('pjlaw', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'pjlaw_setup');

/**
 * Enqueue Scripts and Styles
 */
function pjlaw_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('pjlaw-style', get_stylesheet_uri(), array(), '1.0.' . time());
    
    // Enqueue extended CSS
    wp_enqueue_style('pjlaw-main-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.' . time());
    
    // Enqueue Google Fonts (Inter and Outfit for premium feel)
    wp_enqueue_style('pjlaw-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700&family=Noto+Sans+KR:wght@300;400;500;700&display=swap', array(), null);
    
    // Enqueue Pretendard Font
    wp_enqueue_style('pretendard-font', 'https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.9/dist/web/static/pretendard.min.css', array(), null);
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue main JavaScript file
    wp_enqueue_script('pjlaw-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.' . time(), true);
    
    // Localize script for AJAX
    wp_localize_script('pjlaw-main', 'pjlaw_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('pjlaw_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'pjlaw_scripts');

/**
 * Register Widget Areas
 */
function pjlaw_widgets_init() {
    register_sidebar(array(
        'name' => __('Header Contact', 'pjlaw'),
        'id' => 'header-contact',
        'description' => __('Contact information in header', 'pjlaw'),
        'before_widget' => '<div class="header-contact-widget">',
        'after_widget' => '</div>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Column 1', 'pjlaw'),
        'id' => 'footer-1',
        'description' => __('First footer column', 'pjlaw'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
    ));
}
add_action('widgets_init', 'pjlaw_widgets_init');

/**
 * Custom post types
 */
function pjlaw_register_post_types() {
    // Legal Case Post Type (업무사례)
    register_post_type('legal_case', array(
        'labels' => array(
            'name'          => '업무사례',
            'singular_name' => '업무사례',
            'add_new'       => '새 사례 추가',
            'edit_item'     => '사례 편집',
            'view_item'     => '사례 보기',
            'search_items'  => '사례 검색',
            'not_found'     => '사례 없음',
            'menu_name'     => '업무사례',
        ),
        'public'        => true,
        'show_in_rest'  => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-edit-page',
        'menu_position' => 8,
        'supports'      => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'page-attributes'),
        'rewrite'       => array('slug' => 'cases/post', 'with_front' => false),
    ));

    // Case Review Post Type (사례 후기) — homepage LEGAL CASE testimonials
    register_post_type('pj_case_review', array(
        'labels' => array(
            'name'          => '사례 후기',
            'singular_name' => '사례 후기',
            'add_new'       => '새 후기 추가',
            'edit_item'     => '후기 편집',
            'view_item'     => '후기 보기',
            'search_items'  => '후기 검색',
            'not_found'     => '후기 없음',
            'menu_name'     => '사례 후기',
        ),
        'public'        => true,
        'show_in_rest'  => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-format-quote',
        'menu_position' => 9,
        'supports'      => array('title', 'excerpt', 'thumbnail', 'revisions', 'author', 'page-attributes'),
        'rewrite'       => false,
    ));

    // Consultation Post Type
    register_post_type('consultation', array(
        'labels' => array(
            'name'          => '상담신청',
            'singular_name' => '상담신청',
            'edit_item'     => '상담신청 보기',
            'view_item'     => '상담신청 보기',
            'search_items'  => '상담신청 검색',
            'not_found'     => '접수된 상담신청이 없습니다',
            'menu_name'     => '상담신청',
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-email-alt',
        'menu_position' => 6,
        'supports' => array('title', 'editor'),
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => false,
        ),
        'map_meta_cap' => true,
    ));

    // Blog Post Type
    register_post_type('pj_blog_post', array(
        'labels' => array(
            'name'          => '블로그',
            'singular_name' => '블로그 글',
            'add_new'       => '새 글 추가',
            'edit_item'     => '글 편집',
            'view_item'     => '글 보기',
            'search_items'  => '글 검색',
            'not_found'     => '글 없음',
            'menu_name'     => '블로그',
        ),
        'public'       => true,
        'show_in_rest' => true,
        'has_archive'  => false,
        'menu_icon'    => 'dashicons-edit-page',
        'menu_position' => 6,
        'supports'     => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'page-attributes'),
        'rewrite'      => array('slug' => 'blog/post', 'with_front' => false),
    ));

    // Career Post Type
    register_post_type('pj_career', array(
        'labels' => array(
            'name'          => '채용',
            'singular_name' => '채용공고',
            'add_new'       => '새 공고 추가',
            'edit_item'     => '공고 편집',
            'view_item'     => '공고 보기',
            'search_items'  => '공고 검색',
            'not_found'     => '공고 없음',
            'menu_name'     => '채용',
        ),
        'public'        => true,
        'show_in_rest'  => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-businessman',
        'menu_position' => 7,
        'supports'      => array('title', 'revisions', 'author', 'page-attributes'),
        'rewrite'       => array('slug' => 'careers/post', 'with_front' => false),
    ));

    // Service Post Type (업무분야)
    register_post_type('pj_service', array(
        'labels' => array(
            'name'          => '업무분야',
            'singular_name' => '업무분야',
            'add_new'       => '새 분야 추가',
            'edit_item'     => '분야 편집',
            'view_item'     => '분야 보기',
            'search_items'  => '분야 검색',
            'not_found'     => '분야 없음',
            'menu_name'     => '업무분야',
        ),
        'public'        => true,
        'show_in_rest'  => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-portfolio',
        'menu_position' => 5,
        'supports'      => array('title', 'revisions', 'author', 'page-attributes'),
        'rewrite'       => array('slug' => 'services/post', 'with_front' => false),
    ));

    // Team Member Post Type (구성원)
    register_post_type('pj_team', array(
        'labels' => array(
            'name'          => '구성원',
            'singular_name' => '구성원',
            'add_new'       => '새 구성원 추가',
            'edit_item'     => '구성원 편집',
            'view_item'     => '구성원 보기',
            'search_items'  => '구성원 검색',
            'not_found'     => '구성원 없음',
            'menu_name'     => '구성원',
        ),
        'public'        => true,
        'show_in_rest'  => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-groups',
        'menu_position' => 9,
        'supports'      => array('title', 'thumbnail', 'revisions', 'author', 'page-attributes'),
        'rewrite'       => array('slug' => 'team/member', 'with_front' => false),
    ));
}
add_action('init', 'pjlaw_register_post_types');
register_activation_hook(__FILE__, 'flush_rewrite_rules');
register_deactivation_hook(__FILE__, 'flush_rewrite_rules');

require_once get_template_directory() . '/inc/blog-meta-boxes.php';

/**
 * Security headers
 */
function pjlaw_security_headers() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
    }
}
add_action('send_headers', 'pjlaw_security_headers');

/**
 * Helper to prepare custom routes by clearing 404 status, setting 200 OK, and custom title.
 */
function pjlaw_prepare_custom_route($template_file, $title = '') {
    $located = locate_template($template_file);
    if ($located) {
        global $wp_query;
        if (isset($wp_query)) {
            $wp_query->is_404 = false;
        }
        status_header(200);
        if (!empty($title)) {
            add_filter('document_title_parts', function($parts) use ($title) {
                $parts['title'] = $title;
                return $parts;
            }, 99);
        }
        return $located;
    }
    return null;
}

/**
 * Force the about page template for /about/ so the design renders even if the
 * WordPress page object or permalink rules are not configured yet.
 */
function pjlaw_template_include($template) {
    $request_path = isset($_SERVER['REQUEST_URI']) ? wp_parse_url(wp_unslash($_SERVER['REQUEST_URI']), PHP_URL_PATH) : '';
    $request_path = trim((string) $request_path, '/');

    if ('consultation' === $request_path) {
        $res = pjlaw_prepare_custom_route('page-consultation.php', __('상담예약', 'pjlaw'));
        if ($res) {
            return $res;
        }
    }

    if ('about' === $request_path) {
        $res = pjlaw_prepare_custom_route('page-about.php', __('평정소개', 'pjlaw'));
        if ($res) {
            return $res;
        }
    }

    if ('why-pjlaw' === $request_path) {
        $res = pjlaw_prepare_custom_route('page-why-pjlaw.php', __('왜 평정인가', 'pjlaw'));
        if ($res) {
            return $res;
        }
    }

    if ('team' === $request_path) {
        $res = pjlaw_prepare_custom_route('page-team.php', __('구성원소개', 'pjlaw'));
        if ($res) {
            return $res;
        }
    }

    if (strpos($request_path, 'team/member/') === 0) {
        $res = pjlaw_prepare_custom_route('single-pj_team.php');
        if ($res) {
            return $res;
        }
    }

    if ('directions' === $request_path) {
        $res = pjlaw_prepare_custom_route('page-directions.php', __('오시는길', 'pjlaw'));
        if ($res) {
            return $res;
        }
    }

    if ('services' === $request_path) {
        $res = pjlaw_prepare_custom_route('page-services.php', __('업무분야', 'pjlaw'));
        if ($res) {
            return $res;
        }
    }

    if ('blog' === $request_path) {
        $res = pjlaw_prepare_custom_route('page-blog.php', __('블로그', 'pjlaw'));
        if ($res) {
            return $res;
        }
    }

    if (strpos($request_path, 'blog/post/') === 0) {
        $res = pjlaw_prepare_custom_route('single-pj_blog_post.php');
        if ($res) {
            return $res;
        }
    }

    if (strpos($request_path, 'blog/') === 0 && $request_path !== 'blog') {
        $res = pjlaw_prepare_custom_route('page-blog-post.php');
        if ($res) {
            return $res;
        }
    }

    if ('cases' === $request_path) {
        $res = pjlaw_prepare_custom_route('page-cases.php', __('업무사례', 'pjlaw'));
        if ($res) {
            return $res;
        }
    }

    if (strpos($request_path, 'cases/post/') === 0) {
        $res = pjlaw_prepare_custom_route('single-legal_case.php');
        if ($res) {
            return $res;
        }
    }

    if ('careers' === $request_path) {
        $res = pjlaw_prepare_custom_route('page-careers.php', __('인재채용', 'pjlaw'));
        if ($res) {
            return $res;
        }
    }

    if ('careers-all' === $request_path) {
        $res = pjlaw_prepare_custom_route('page-careers-all.php', __('인재채용', 'pjlaw'));
        if ($res) {
            return $res;
        }
    }

    if (strpos($request_path, 'careers/post/') === 0) {
        $res = pjlaw_prepare_custom_route('single-pj_career.php');
        if ($res) {
            return $res;
        }
    }

    if ('consultation-step' === $request_path) {
        $res = pjlaw_prepare_custom_route('page-consultation-step.php', __('상담예약', 'pjlaw'));
        if ($res) {
            return $res;
        }
    }

    if ('consultation-form' === $request_path) {
        $res = pjlaw_prepare_custom_route('page-consultation-form.php', __('상담예약', 'pjlaw'));
        if ($res) {
            return $res;
        }
    }

    if ('search' === $request_path) {
        $res = pjlaw_prepare_custom_route('page-search.php', __('통합검색', 'pjlaw'));
        if ($res) {
            return $res;
        }
    }

    return $template;
}
add_filter('template_include', 'pjlaw_template_include');

/**
 * Render the persistent quick actions menu.
 */
function pjlaw_render_quick_actions_menu() {
    ?>
    <aside class="about-quick-menu" aria-label="<?php esc_attr_e('Quick actions', 'pjlaw'); ?>">
        <a class="about-quick-menu__item about-quick-menu__item--call" href="tel:0255455674">
            <span class="about-quick-menu__icon-wrap">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/about/icon-phone.svg'); ?>" alt="" aria-hidden="true" />
            </span>
            <span class="about-quick-menu__label">전화상담</span>
            <span class="about-quick-menu__phone">
                <span>02-554</span>
                <span class="about-quick-menu__dot" aria-hidden="true"></span>
                <span>5674</span>
            </span>
        </a>

        <a class="about-quick-menu__item about-quick-menu__item--online" href="<?php echo esc_url(home_url('/consultation/')); ?>">
            <span class="about-quick-menu__icon-wrap">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/about/icon-online.svg'); ?>" alt="" aria-hidden="true" />
            </span>
            <span class="about-quick-menu__label about-quick-menu__label--dark">온라인상담</span>
        </a>

        <a class="about-quick-menu__item about-quick-menu__item--kakao" href="https://pf.kakao.com/_XzMxmn" target="_blank" rel="noopener noreferrer">
            <span class="about-quick-menu__icon-wrap">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/about/icon-kakao.svg'); ?>" alt="" aria-hidden="true" />
            </span>
            <span class="about-quick-menu__label about-quick-menu__label--dark">카톡상담</span>
        </a>

        <a class="about-quick-menu__item about-quick-menu__item--directions" href="<?php echo esc_url(home_url('/directions/')); ?>">
            <span class="about-quick-menu__icon-wrap">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/about/icon-directions.svg'); ?>" alt="" aria-hidden="true" />
            </span>
            <span class="about-quick-menu__label">오시는길</span>
        </a>
    </aside>
    <?php
}

/**
 * AJAX Handler for Consultation Form
 */
function pjlaw_handle_consultation_form() {
    // Verify nonce (matches wp_create_nonce('pjlaw_consultation_nonce') in page-consultation-form.php)
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'pjlaw_consultation_nonce')) {
        wp_send_json_error(array('message' => __('보안 검증에 실패했습니다. 페이지를 새로고침한 후 다시 시도해 주세요.', 'pjlaw')));
        return;
    }

    // Sanitize short text fields
    $name        = isset($_POST['consultation_name']) ? sanitize_text_field(wp_unslash($_POST['consultation_name'])) : '';
    $phone       = isset($_POST['consultation_phone']) ? sanitize_text_field(wp_unslash($_POST['consultation_phone'])) : '';
    $category    = isset($_POST['consultation_category']) ? sanitize_text_field(wp_unslash($_POST['consultation_category'])) : '';
    $subject     = isset($_POST['consultation_subject']) ? sanitize_text_field(wp_unslash($_POST['consultation_subject'])) : '';
    $client      = isset($_POST['consultation_client']) ? sanitize_text_field(wp_unslash($_POST['consultation_client'])) : '';
    $opponent    = isset($_POST['consultation_opponent']) ? sanitize_text_field(wp_unslash($_POST['consultation_opponent'])) : '';
    $case_number = isset($_POST['consultation_case_number']) ? sanitize_text_field(wp_unslash($_POST['consultation_case_number'])) : '';
    $pref_date   = isset($_POST['consultation_date']) ? sanitize_text_field(wp_unslash($_POST['consultation_date'])) : '';
    $pref_time   = isset($_POST['consultation_time']) ? sanitize_text_field(wp_unslash($_POST['consultation_time'])) : '';
    $method      = isset($_POST['consultation_method']) ? sanitize_text_field(wp_unslash($_POST['consultation_method'])) : '';
    $q1          = isset($_POST['consultation_q1']) ? sanitize_text_field(wp_unslash($_POST['consultation_q1'])) : '';
    $q2          = isset($_POST['consultation_q2']) ? sanitize_text_field(wp_unslash($_POST['consultation_q2'])) : '';

    // Sanitize long text fields (preserve line breaks)
    $case_desc = isset($_POST['consultation_case']) ? sanitize_textarea_field(wp_unslash($_POST['consultation_case'])) : '';
    $goal      = isset($_POST['consultation_goal']) ? sanitize_textarea_field(wp_unslash($_POST['consultation_goal'])) : '';
    $details   = isset($_POST['consultation_details']) ? sanitize_textarea_field(wp_unslash($_POST['consultation_details'])) : '';

    // Validate required fields
    if (empty($name) || empty($phone)) {
        wp_send_json_error(array('message' => __('이름과 연락처는 필수 입력 항목입니다.', 'pjlaw')));
        return;
    }

    // Human-readable summary (kept on post_content for quick reading)
    $rows = array(
        '상담분야'     => $category,
        '상담방식'     => $method,
        '희망 상담일'  => trim($pref_date . ' ' . $pref_time),
        '질문1 답변'   => $q1,
        '질문2 답변'   => $q2,
        '이름'         => $name,
        '연락처'       => $phone,
        '의뢰인 정보'  => $client,
        '상대방 정보'  => $opponent,
        '사건 개요'    => $case_desc,
        '의뢰 목적'    => $goal,
        '사건번호'     => $case_number,
        '기타 상세'    => $details,
    );
    $formatted_content = '';
    foreach ($rows as $label => $value) {
        if ($value !== '') {
            $formatted_content .= $label . ': ' . $value . "\n";
        }
    }

    // Insert post
    $post_data = array(
        'post_title'   => sprintf(__('[상담신청] %s', 'pjlaw'), $name),
        'post_content' => $formatted_content,
        'post_status'  => 'publish',
        'post_type'    => 'consultation',
        'meta_input'   => array(
            '_consultation_name'        => $name,
            '_consultation_phone'       => $phone,
            '_consultation_email'       => '',
            '_consultation_category'    => $category,
            '_consultation_subject'     => $subject,
            '_consultation_client'      => $client,
            '_consultation_opponent'    => $opponent,
            '_consultation_case'        => $case_desc,
            '_consultation_goal'        => $goal,
            '_consultation_case_number' => $case_number,
            '_consultation_details'     => $details,
            '_consultation_pref_date'   => $pref_date,
            '_consultation_pref_time'   => $pref_time,
            '_consultation_method'      => $method,
            '_consultation_q1'          => $q1,
            '_consultation_q2'          => $q2,
            '_consultation_date'        => current_time('mysql'),
        ),
    );

    $consultation_id = wp_insert_post($post_data);

    if ($consultation_id && !is_wp_error($consultation_id)) {
        // Notify staff via Resend. Email failures must not fail the booking.
        if (function_exists('pjlaw_send_consultation_notification')) {
            pjlaw_send_consultation_notification($consultation_id);
        }
        wp_send_json_success(array('message' => __('상담 신청이 성공적으로 접수되었습니다. 빠른 시일 내에 연락드리겠습니다.', 'pjlaw')));
    } else {
        wp_send_json_error(array('message' => __('상담 접수 중 오류가 발생했습니다. 다시 시도해 주세요.', 'pjlaw')));
    }
}
add_action('wp_ajax_pjlaw_consultation', 'pjlaw_handle_consultation_form');
add_action('wp_ajax_nopriv_pjlaw_consultation', 'pjlaw_handle_consultation_form');

/**
 * Register custom taxonomies for pj_blog_post
 */
function pjlaw_register_blog_taxonomies() {
    register_taxonomy('pj_blog_category', 'pj_blog_post', array(
        'labels' => array(
            'name'          => '카테고리',
            'singular_name' => '카테고리',
            'menu_name'     => '카테고리',
        ),
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'blog-category'),
    ));

    register_taxonomy('pj_blog_service', 'pj_blog_post', array(
        'labels' => array(
            'name'          => '서비스',
            'singular_name' => '서비스',
            'menu_name'     => '서비스',
        ),
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'blog-service'),
    ));

    register_term_meta('pj_blog_service', '_pj_service_icon', array(
        'type'              => 'string',
        'single'            => true,
        'sanitize_callback' => 'esc_url_raw',
        'show_in_rest'      => true,
    ));

    register_taxonomy('pj_blog_tag', 'pj_blog_post', array(
        'labels' => array(
            'name'          => '태그',
            'singular_name' => '태그',
            'menu_name'     => '태그',
        ),
        'hierarchical'      => false,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'blog-tag'),
    ));
}
add_action('init', 'pjlaw_register_blog_taxonomies');

/**
 * Seed default terms for blog taxonomies
 */
function pjlaw_seed_blog_terms() {
    $categories = array('법률정보', '대응전략');
    foreach ($categories as $name) {
        if (!term_exists($name, 'pj_blog_category')) {
            wp_insert_term($name, 'pj_blog_category');
        }
    }

    $services = array('민사', '형사', '성범죄', '이혼', '상속', '부동산', '기업');
    foreach ($services as $name) {
        if (!term_exists($name, 'pj_blog_service')) {
            wp_insert_term($name, 'pj_blog_service');
        }
    }
}
add_action('init', 'pjlaw_seed_blog_terms');

/**
 * Blog post admin list columns.
 */
function pjlaw_blog_columns($columns) {
    $new = array();
    $new['cb']       = $columns['cb'];
    $new['thumb']    = __('이미지', 'pjlaw');
    $new['title']    = $columns['title'];
    $new['taxonomy-pj_blog_category'] = __('카테고리', 'pjlaw');
    $new['taxonomy-pj_blog_service']  = __('서비스', 'pjlaw');
    $new['taxonomy-pj_blog_tag']      = __('태그', 'pjlaw');
    $new['date']     = $columns['date'];
    return $new;
}
add_filter('manage_pj_blog_post_posts_columns', 'pjlaw_blog_columns');

function pjlaw_blog_column_content($column, $post_id) {
    if ($column === 'thumb') {
        $thumb = get_the_post_thumbnail($post_id, array(60, 60));
        echo $thumb ? $thumb : '—';
    }
}
add_action('manage_pj_blog_post_posts_custom_column', 'pjlaw_blog_column_content', 10, 2);

function pjlaw_blog_tax_filters() {
    global $typenow;
    if ($typenow !== 'pj_blog_post') return;
    foreach (array('pj_blog_category', 'pj_blog_service', 'pj_blog_tag') as $tax) {
        $obj = get_taxonomy($tax);
        wp_dropdown_categories(array(
            'show_option_all' => $obj->labels->all_items ?? '전체',
            'taxonomy'        => $tax,
            'name'            => $tax,
            'orderby'         => 'name',
            'selected'        => isset($_GET[$tax]) ? (int) $_GET[$tax] : 0,
            'hierarchical'    => $obj->hierarchical,
            'show_count'      => true,
            'hide_empty'      => false,
            'value_field'     => 'slug',
        ));
    }
}
add_action('restrict_manage_posts', 'pjlaw_blog_tax_filters');

/**
 * Register custom taxonomy for pj_career
 */
function pjlaw_register_career_taxonomies() {
    register_taxonomy('pj_career_category', 'pj_career', array(
        'labels' => array(
            'name'          => '부문',
            'singular_name' => '부문',
            'menu_name'     => '부문',
        ),
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'career-category'),
    ));
}
add_action('init', 'pjlaw_register_career_taxonomies');

/**
 * Seed default terms for career taxonomy
 */
function pjlaw_seed_career_terms() {
    $categories = array('변호사', '사무원', '인턴십');
    foreach ($categories as $name) {
        if (!term_exists($name, 'pj_career_category')) {
            wp_insert_term($name, 'pj_career_category');
        }
    }
}
add_action('init', 'pjlaw_seed_career_terms');

/**
 * Career post admin list columns.
 */
function pjlaw_career_columns($columns) {
    $new = array();
    $new['cb']    = $columns['cb'];
    $new['title'] = $columns['title'];
    $new['taxonomy-pj_career_category'] = __('부문', 'pjlaw');
    $new['employment_type'] = __('고용형태', 'pjlaw');
    $new['deadline']        = __('마감일', 'pjlaw');
    $new['date']  = $columns['date'];
    return $new;
}
add_filter('manage_pj_career_posts_columns', 'pjlaw_career_columns');

function pjlaw_career_column_content($column, $post_id) {
    if ($column === 'employment_type') {
        $type = get_post_meta($post_id, '_pj_career_employment_type', true);
        echo $type ? esc_html($type) : '—';
    } elseif ($column === 'deadline') {
        $end = get_post_meta($post_id, '_pj_career_end_date', true);
        echo $end ? esc_html($end) : '—';
    }
}
add_action('manage_pj_career_posts_custom_column', 'pjlaw_career_column_content', 10, 2);

function pjlaw_career_tax_filters() {
    global $typenow;
    if ($typenow !== 'pj_career') return;
    $tax = 'pj_career_category';
    $obj = get_taxonomy($tax);
    wp_dropdown_categories(array(
        'show_option_all' => $obj->labels->all_items ?? '전체',
        'taxonomy'        => $tax,
        'name'            => $tax,
        'orderby'         => 'name',
        'selected'        => isset($_GET[$tax]) ? sanitize_text_field(wp_unslash($_GET[$tax])) : '',
        'hierarchical'    => $obj->hierarchical,
        'show_count'      => true,
        'hide_empty'      => false,
        'value_field'     => 'slug',
    ));
}
add_action('restrict_manage_posts', 'pjlaw_career_tax_filters');

/**
 * Team member admin list columns.
 */
function pjlaw_team_columns($columns) {
    $new = array();
    $new['cb']     = $columns['cb'];
    $new['photo']  = __('대표이미지', 'pjlaw');
    $new['title']  = $columns['title'];
    $new['role']   = __('직위', 'pjlaw');
    $new['date']   = $columns['date'];
    return $new;
}
add_filter('manage_pj_team_posts_columns', 'pjlaw_team_columns');

function pjlaw_team_column_content($column, $post_id) {
    if ($column === 'role') {
        $role = get_post_meta($post_id, '_pj_team_role', true);
        echo $role ? esc_html($role) : '—';
    } elseif ($column === 'photo') {
        if (has_post_thumbnail($post_id)) {
            echo get_the_post_thumbnail($post_id, array(48, 48), array('style' => 'width:48px;height:48px;object-fit:cover;border-radius:4px;'));
        } else {
            echo '—';
        }
    }
}
add_action('manage_pj_team_posts_custom_column', 'pjlaw_team_column_content', 10, 2);

/**
 * Compute the deadline badge for a career posting from its end date.
 * Returns array('badge' => 'D-NN'|'D-DAY', 'mod' => 'navy'|'orange').
 */
function pjlaw_career_badge($end_date) {
    if (empty($end_date)) {
        return array('badge' => '상시', 'mod' => 'navy');
    }
    $today = strtotime(current_time('Y-m-d'));
    $end   = strtotime($end_date);
    if ($end === false) {
        return array('badge' => '상시', 'mod' => 'navy');
    }
    $days = (int) floor(($end - $today) / DAY_IN_SECONDS);
    if ($days <= 0) {
        return array('badge' => 'D-DAY', 'mod' => 'orange');
    }
    return array('badge' => 'D-' . str_pad($days, 2, '0', STR_PAD_LEFT), 'mod' => 'navy');
}

/**
 * Format a career posting's application period as "Y. m. d ~ Y. m. d".
 */
function pjlaw_career_date_range($start_date, $end_date) {
    $fmt = function ($d) {
        $t = $d ? strtotime($d) : false;
        return $t ? date_i18n('Y. m. d', $t) : '';
    };
    $start = $fmt($start_date);
    $end   = $fmt($end_date);
    if ($start && $end) return $start . ' ~ ' . $end;
    return $start ?: $end;
}

/**
 * Register the practice-area taxonomy for legal_case (drives the cases tabs).
 */
function pjlaw_register_case_taxonomies() {
    register_taxonomy('pj_case_category', 'legal_case', array(
        'labels' => array(
            'name'          => '분야',
            'singular_name' => '분야',
            'menu_name'     => '분야',
        ),
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'case-category'),
    ));
}
add_action('init', 'pjlaw_register_case_taxonomies');

/**
 * Seed default practice-area terms with explicit English slugs.
 * Slug = the data-type filter key used by the cases page tabs.
 */
function pjlaw_seed_case_terms() {
    $terms = array(
        '민사'   => 'civil',
        '형사'   => 'criminal',
        '성범죄' => 'sex-crime',
        '이혼'   => 'divorce',
        '상속'   => 'inheritance',
        '부동산' => 'realestate',
        '기업'   => 'corporate',
    );
    foreach ($terms as $name => $slug) {
        if (!term_exists($name, 'pj_case_category') && !term_exists($slug, 'pj_case_category')) {
            wp_insert_term($name, 'pj_case_category', array('slug' => $slug));
        }
    }
}
add_action('init', 'pjlaw_seed_case_terms');

/**
 * Legal case admin list columns.
 */
function pjlaw_case_columns($columns) {
    $new = array();
    $new['cb']    = $columns['cb'];
    $new['thumb'] = __('이미지', 'pjlaw');
    $new['title'] = $columns['title'];
    $new['taxonomy-pj_case_category'] = __('분야', 'pjlaw');
    $new['case_badge'] = __('결과', 'pjlaw');
    $new['date']  = $columns['date'];
    return $new;
}
add_filter('manage_legal_case_posts_columns', 'pjlaw_case_columns');

function pjlaw_case_column_content($column, $post_id) {
    if ($column === 'thumb') {
        $thumb = get_the_post_thumbnail($post_id, array(60, 60));
        echo $thumb ? $thumb : '—';
    } elseif ($column === 'case_badge') {
        $badge = get_post_meta($post_id, '_pj_case_badge', true);
        echo $badge ? esc_html($badge) : '—';
    }
}
add_action('manage_legal_case_posts_custom_column', 'pjlaw_case_column_content', 10, 2);

function pjlaw_case_tax_filters() {
    global $typenow;
    if ($typenow !== 'legal_case') return;
    $tax = 'pj_case_category';
    $obj = get_taxonomy($tax);
    wp_dropdown_categories(array(
        'show_option_all' => $obj->labels->all_items ?? '전체',
        'taxonomy'        => $tax,
        'name'            => $tax,
        'orderby'         => 'name',
        'selected'        => isset($_GET[$tax]) ? sanitize_text_field(wp_unslash($_GET[$tax])) : '',
        'hierarchical'    => $obj->hierarchical,
        'show_count'      => true,
        'hide_empty'      => false,
        'value_field'     => 'slug',
    ));
}
add_action('restrict_manage_posts', 'pjlaw_case_tax_filters');

/**
 * Admin list columns for 사례 후기 (pj_case_review)
 */
function pjlaw_case_review_columns($columns) {
    $new = array();
    $new['cb']     = $columns['cb'];
    $new['thumb']  = __('이미지', 'pjlaw');
    $new['title']  = $columns['title'];
    $new['review_tag']    = __('태그', 'pjlaw');
    $new['review_lawyer'] = __('변호사', 'pjlaw');
    $new['date']   = $columns['date'];
    return $new;
}
add_filter('manage_pj_case_review_posts_columns', 'pjlaw_case_review_columns');

function pjlaw_case_review_column_content($column, $post_id) {
    if ($column === 'thumb') {
        $thumb = get_the_post_thumbnail($post_id, array(60, 60));
        echo $thumb ? $thumb : '—';
    } elseif ($column === 'review_tag') {
        $tag = get_post_meta($post_id, '_pj_review_tag', true);
        echo $tag ? esc_html($tag) : '—';
    } elseif ($column === 'review_lawyer') {
        $lawyer = get_post_meta($post_id, '_pj_review_lawyer', true);
        echo $lawyer ? esc_html($lawyer) : '—';
    }
}
add_action('manage_pj_case_review_posts_custom_column', 'pjlaw_case_review_column_content', 10, 2);

/**
 * Register custom taxonomies for pj_service
 */
function pjlaw_register_service_taxonomies() {
    register_taxonomy('pj_service_category', 'pj_service', array(
        'labels' => array(
            'name'          => '카테고리',
            'singular_name' => '카테고리',
            'menu_name'     => '카테고리',
        ),
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'service-category'),
    ));

    register_taxonomy('pj_service_tag', 'pj_service', array(
        'labels' => array(
            'name'          => '태그',
            'singular_name' => '태그',
            'menu_name'     => '태그',
        ),
        'hierarchical'      => false,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'service-tag'),
    ));
}
add_action('init', 'pjlaw_register_service_taxonomies');

/**
 * Seed default terms for service taxonomies
 */
function pjlaw_seed_service_terms() {
    $categories = array(
        '민사'   => 'civil',
        '형사'   => 'criminal',
        '성범죄' => 'sexual',
        '이혼'   => 'divorce',
        '상속'   => 'inheritance',
        '부동산' => 'realestate',
        '기업'   => 'corporate',
    );
    foreach ($categories as $name => $slug) {
        if (!term_exists($name, 'pj_service_category')) {
            wp_insert_term($name, 'pj_service_category', array('slug' => $slug));
        }
    }

    $tags = array('사이버범죄', '따돌림', '분리조치', '학폭위', '생기부');
    foreach ($tags as $name) {
        if (!term_exists($name, 'pj_service_tag')) {
            wp_insert_term($name, 'pj_service_tag');
        }
    }
}
add_action('init', 'pjlaw_seed_service_terms', 15);

/**
 * Service post admin list columns.
 */
function pjlaw_service_columns($columns) {
    $new = array();
    $new['cb']    = $columns['cb'];
    $new['title'] = $columns['title'];
    $new['taxonomy-pj_service_category'] = __('카테고리', 'pjlaw');
    $new['taxonomy-pj_service_tag']      = __('태그', 'pjlaw');
    $new['date']  = $columns['date'];
    return $new;
}
add_filter('manage_pj_service_posts_columns', 'pjlaw_service_columns');

function pjlaw_service_tax_filters() {
    global $typenow;
    if ($typenow !== 'pj_service') return;
    foreach (array('pj_service_category', 'pj_service_tag') as $tax) {
        $obj = get_taxonomy($tax);
        wp_dropdown_categories(array(
            'show_option_all' => $obj->labels->all_items ?? '전체',
            'taxonomy'        => $tax,
            'name'            => $tax,
            'orderby'         => 'name',
            'selected'        => isset($_GET[$tax]) ? sanitize_text_field(wp_unslash($_GET[$tax])) : '',
            'hierarchical'    => $obj->hierarchical,
            'show_count'      => true,
            'hide_empty'      => false,
            'value_field'     => 'slug',
        ));
    }
}
add_action('restrict_manage_posts', 'pjlaw_service_tax_filters');

/**
 * Remove the built-in Posts menu from WordPress admin
 */
function pjlaw_remove_posts_menu() {
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'pjlaw_remove_posts_menu');
?>
