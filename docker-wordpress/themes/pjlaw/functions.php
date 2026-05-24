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
    // Legal Case Post Type
    register_post_type('legal_case', array(
        'labels' => array(
            'name' => __('Legal Cases', 'pjlaw'),
            'singular_name' => __('Legal Case', 'pjlaw'),
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-gavel',
    ));

    // Consultation Post Type
    register_post_type('consultation', array(
        'labels' => array(
            'name' => __('Consultations', 'pjlaw'),
            'singular_name' => __('Consultation', 'pjlaw'),
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-email-alt',
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
 * Force the about page template for /about/ so the design renders even if the
 * WordPress page object or permalink rules are not configured yet.
 */
function pjlaw_template_include($template) {
    $request_path = isset($_SERVER['REQUEST_URI']) ? wp_parse_url(wp_unslash($_SERVER['REQUEST_URI']), PHP_URL_PATH) : '';
    $request_path = trim((string) $request_path, '/');

    if ('consultation' === $request_path) {
        $consultation_template = locate_template('page-consultation.php');
        if ($consultation_template) {
            return $consultation_template;
        }
    }

    if ('about' === $request_path) {
        $about_template = locate_template('page-about.php');
        if ($about_template) {
            return $about_template;
        }
    }

    if ('why-pjlaw' === $request_path) {
        $why_pjlaw_template = locate_template('page-why-pjlaw.php');
        if ($why_pjlaw_template) {
            return $why_pjlaw_template;
        }
    }

    if ('team' === $request_path) {
        $team_template = locate_template('page-team.php');
        if ($team_template) {
            return $team_template;
        }
    }

    if (strpos($request_path, 'team/') === 0) {
        $team_member_template = locate_template('page-team-member.php');
        if ($team_member_template) {
            return $team_member_template;
        }
    }

    if ('directions' === $request_path) {
        $directions_template = locate_template('page-directions.php');
        if ($directions_template) {
            return $directions_template;
        }
    }

    if ('services' === $request_path) {
        $services_template = locate_template('page-services.php');
        if ($services_template) {
            return $services_template;
        }
    }

    if ('blog' === $request_path) {
        $blog_template = locate_template('page-blog.php');
        if ($blog_template) {
            return $blog_template;
        }
    }

    if (strpos($request_path, 'blog/post/') === 0) {
        $single_template = locate_template('single-pj_blog_post.php');
        if ($single_template) {
            return $single_template;
        }
    }

    if (strpos($request_path, 'blog/') === 0 && $request_path !== 'blog') {
        $blog_post_template = locate_template('page-blog-post.php');
        if ($blog_post_template) {
            return $blog_post_template;
        }
    }

    if ('cases' === $request_path) {
        $cases_template = locate_template('page-cases.php');
        if ($cases_template) {
            return $cases_template;
        }
    }

    if ('careers' === $request_path) {
        $careers_template = locate_template('page-careers.php');
        if ($careers_template) {
            return $careers_template;
        }
    }

    if ('careers-all' === $request_path) {
        $careers_all_template = locate_template('page-careers-all.php');
        if ($careers_all_template) {
            return $careers_all_template;
        }
    }

    if ('careers-detail' === $request_path) {
        $detail_template = locate_template('page-careers-detail.php');
        if ($detail_template) {
            return $detail_template;
        }
    }

    if ('consultation-step' === $request_path) {
        $consultation_step_template = locate_template('page-consultation-step.php');
        if ($consultation_step_template) {
            return $consultation_step_template;
        }
    }

    if ('consultation-form' === $request_path) {
        $consultation_form_template = locate_template('page-consultation-form.php');
        if ($consultation_form_template) {
            return $consultation_form_template;
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
        <a class="about-quick-menu__item about-quick-menu__item--call" href="tel:15886999">
            <span class="about-quick-menu__icon-wrap">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/about/icon-phone.svg'); ?>" alt="" aria-hidden="true" />
            </span>
            <span class="about-quick-menu__label">전화상담</span>
            <span class="about-quick-menu__phone">
                <span>1588</span>
                <span class="about-quick-menu__dot" aria-hidden="true"></span>
                <span>6999</span>
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
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'pjlaw_nonce')) {
        wp_send_json_error(array('message' => __('보안 검증에 실패했습니다. 페이지를 새로고침한 후 다시 시도해 주세요.', 'pjlaw')));
        return;
    }

    // Sanitize form data
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $subject = isset($_POST['subject']) ? sanitize_text_field($_POST['subject']) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';
    $privacy = isset($_POST['privacy']) ? intval($_POST['privacy']) : 0;

    // Validate required fields
    if (empty($name) || empty($phone)) {
        wp_send_json_error(array('message' => __('이름과 연락처는 필수 입력 항목입니다.', 'pjlaw')));
        return;
    }

    // Validate privacy consent
    if (1 !== $privacy) {
        wp_send_json_error(array('message' => __('개인정보처리방침에 동의해 주세요.', 'pjlaw')));
        return;
    }

    // Format content
    $formatted_content = "=== 연락처 정보 / Contact Information ===\n\n";
    $formatted_content .= "이름 (Name): " . $name . "\n";
    $formatted_content .= "전화번호 (Phone): " . $phone . "\n";
    if (!empty($email)) {
        $formatted_content .= "이메일 (Email): " . $email . "\n";
    }
    if (!empty($subject)) {
        $formatted_content .= "상담분야 (Consultation Area): " . $subject . "\n";
    }
    $formatted_content .= "\n=== 상담내용 / Message ===\n\n";
    $formatted_content .= $message;

    // Insert post
    $post_data = array(
        'post_title' => sprintf(__('[상담신청] %s', 'pjlaw'), $name),
        'post_content' => $formatted_content,
        'post_status' => 'publish',
        'post_type' => 'consultation',
        'meta_input' => array(
            '_consultation_name' => $name,
            '_consultation_phone' => $phone,
            '_consultation_email' => $email,
            '_consultation_subject' => $subject,
            '_consultation_date' => current_time('mysql')
        )
    );

    $consultation_id = wp_insert_post($post_data);

    if ($consultation_id && !is_wp_error($consultation_id)) {
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

    $services = array('이혼', '상속', '부동산', '기업', '마약', '교통사고', '형사');
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
?>
