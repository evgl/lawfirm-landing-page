<?php
/**
 * Law Firm Pyeongjeong Theme Functions
 * 
 * @package Law_Firm_Pyeongjeong
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function law_firm_setup() {
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
    add_image_size('case-thumbnail', 400, 300, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'law-firm-pyeongjeong'),
        'footer' => __('Footer Menu', 'law-firm-pyeongjeong'),
        'quick-menu' => __('Quick Menu', 'law-firm-pyeongjeong'),
    ));
    
    // Add theme support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
    
    // Load text domain for translations
    load_theme_textdomain('law-firm-pyeongjeong', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'law_firm_setup');

/**
 * Enqueue Scripts and Styles
 */
function law_firm_scripts() {
    // Enqueue main stylesheet with timestamp to force cache refresh
    wp_enqueue_style('law-firm-style', get_stylesheet_uri(), array(), '2.0.' . time());
    
    // Enqueue Google Fonts
    wp_enqueue_style('law-firm-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Enqueue Font Awesome for icons
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue main JavaScript file
    wp_enqueue_script('law-firm-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.' . time(), true);
    
    // Localize script for AJAX
    wp_localize_script('law-firm-main', 'law_firm_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('law_firm_nonce')
    ));
    
    // Enqueue comment reply script on single posts
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'law_firm_scripts');

/**
 * Fallback menu when no menu is assigned
 */
function law_firm_fallback_menu() {
    echo '<ul class="primary-menu">';

    // Each menu item links to its respective page
    echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . esc_html__('소개', 'law-firm-pyeongjeong') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/services/')) . '">' . esc_html__('업무분야', 'law-firm-pyeongjeong') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/cases/')) . '">' . esc_html__('성공사례', 'law-firm-pyeongjeong') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">' . esc_html__('상담문의', 'law-firm-pyeongjeong') . '</a></li>';
    echo '</ul>';
}

/**
 * Register Custom Post Types
 */
function law_firm_custom_post_types() {

    // Successful Cases Post Type
    register_post_type('successful_case', array(
        'labels' => array(
            'name' => __('Successful Cases', 'law-firm-pyeongjeong'),
            'singular_name' => __('Successful Case', 'law-firm-pyeongjeong'),
            'add_new' => __('Add New Case', 'law-firm-pyeongjeong'),
            'add_new_item' => __('Add New Case', 'law-firm-pyeongjeong'),
            'edit_item' => __('Edit Case', 'law-firm-pyeongjeong'),
            'new_item' => __('New Case', 'law-firm-pyeongjeong'),
            'view_item' => __('View Case', 'law-firm-pyeongjeong'),
            'search_items' => __('Search Cases', 'law-firm-pyeongjeong'),
            'all_items' => __('Successful Cases', 'law-firm-pyeongjeong'),
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-yes-alt',
        'menu_position' => 26,
        'has_archive' => true,
        'rewrite' => array('slug' => 'successful-cases')
    ));

    // Legal Information Post Type
    register_post_type('legal_information', array(
        'labels' => array(
            'name' => __('Legal Information', 'law-firm-pyeongjeong'),
            'singular_name' => __('Legal Information', 'law-firm-pyeongjeong'),
            'add_new' => __('Add New Information', 'law-firm-pyeongjeong'),
            'add_new_item' => __('Add New Information', 'law-firm-pyeongjeong'),
            'edit_item' => __('Edit Information', 'law-firm-pyeongjeong'),
            'new_item' => __('New Information', 'law-firm-pyeongjeong'),
            'view_item' => __('View Information', 'law-firm-pyeongjeong'),
            'search_items' => __('Search Information', 'law-firm-pyeongjeong'),
            'all_items' => __('Legal Information', 'law-firm-pyeongjeong'),
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-yes-alt',
        'menu_position' => 27,
        'has_archive' => true,
        'rewrite' => array('slug' => 'legal-information')
    ));

    // News Board Post Type
    register_post_type('news_board', array(
        'labels' => array(
            'name' => __('News Board', 'law-firm-pyeongjeong'),
            'singular_name' => __('News Board', 'law-firm-pyeongjeong'),
            'add_new' => __('Add New News', 'law-firm-pyeongjeong'),
            'add_new_item' => __('Add New News', 'law-firm-pyeongjeong'),
            'edit_item' => __('Edit News', 'law-firm-pyeongjeong'),
            'new_item' => __('New News', 'law-firm-pyeongjeong'),
            'view_item' => __('View News', 'law-firm-pyeongjeong'),
            'search_items' => __('Search News', 'law-firm-pyeongjeong'),
            'all_items' => __('News Board', 'law-firm-pyeongjeong'),
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-yes-alt',
        'menu_position' => 28,
        'has_archive' => false,
        'rewrite' => array('slug' => 'news-board')
    ));

    // Flush rewrite rules to fix redirection issues
    flush_rewrite_rules();
}
add_action('init', 'law_firm_custom_post_types');

/**
 * Add custom rewrite rules for all custom pages
 */
function law_firm_add_custom_rewrite_rules() {
    add_rewrite_rule('^about/?$', 'index.php?custom_page=about', 'top');
    add_rewrite_rule('^services/?$', 'index.php?custom_page=services', 'top');
    add_rewrite_rule('^cases/?$', 'index.php?custom_page=cases', 'top');
    add_rewrite_rule('^contact/?$', 'index.php?custom_page=contact', 'top');
    add_rewrite_rule('^legal-information/?$', 'index.php?custom_page=legal-information', 'top');
    add_rewrite_rule('^legal-information/?$', 'index.php?custom_page=legal-information', 'top');
}
add_action('init', 'law_firm_add_custom_rewrite_rules');

/**
 * Add custom query var
 */
function law_firm_add_query_vars($vars) {
    $vars[] = 'custom_page';
    return $vars;
}
add_filter('query_vars', 'law_firm_add_query_vars');

/**
 * Template redirect for all custom pages
 */
function law_firm_custom_template_redirect() {
    // More reliable method - check the request URI directly
    $request_uri = $_SERVER['REQUEST_URI'];
    $template_file = '';

    // Remove trailing slash and query parameters
    $path = rtrim(parse_url($request_uri, PHP_URL_PATH), '/');

    // Check if it matches our custom pages
    if (preg_match('#/about/?$#', $path)) {
        $template_file = 'about.php';
    } elseif (preg_match('#/services/?$#', $path)) {
        $template_file = 'services.php';
    } elseif (preg_match('#/cases/?$#', $path)) {
        $template_file = 'search-cases.php';
    } elseif (preg_match('#/contact/?$#', $path)) {
        $template_file = 'contact.php';
    } elseif (preg_match('#/legal-information/?$#', $path)) {
        $template_file = 'search-legal-information.php';
    } elseif (preg_match('#/legal-information/?$#', $path)) {
        $template_file = 'search-legal-information.php';
    }

    // Also check the original query var method as fallback
    $custom_page = get_query_var('custom_page');
    if (!$template_file && $custom_page) {
        switch ($custom_page) {
            case 'about':
                $template_file = 'about.php';
                break;
            case 'services':
                $template_file = 'services.php';
                break;
            case 'cases':
                $template_file = 'search-cases.php';
                break;
            case 'contact':
                $template_file = 'contact.php';
                break;
            case 'legal-information':
                $template_file = 'search-legal-information.php';
                break;
            case 'legal-information':
                $template_file = 'search-legal-information.php';
                break;
        }
    }

    if ($template_file && file_exists(get_template_directory() . '/' . $template_file)) {
        // Prevent WordPress from processing further
        status_header(200);
        include(get_template_directory() . '/' . $template_file);
        exit;
    }
}
add_action('template_redirect', 'law_firm_custom_template_redirect');

/**
 * Early request handler - catches requests before WordPress processes them
 */
function law_firm_early_request_handler() {
    if (!is_admin()) {
        $request_uri = $_SERVER['REQUEST_URI'];
        $path = rtrim(parse_url($request_uri, PHP_URL_PATH), '/');

        $template_file = '';
        if (preg_match('#/about/?$#', $path)) {
            $template_file = 'about.php';
        } elseif (preg_match('#/services/?$#', $path)) {
            $template_file = 'services.php';
        } elseif (preg_match('#/cases/?$#', $path)) {
            $template_file = 'search-cases.php';
        } elseif (preg_match('#/contact/?$#', $path)) {
            $template_file = 'contact.php';
        } elseif (preg_match('#/legal-information/?$#', $path)) {
            $template_file = 'search-legal-information.php';
        } elseif (preg_match('#/legal-information/?$#', $path)) {
            $template_file = 'search-legal-information.php';
        }

        if ($template_file && file_exists(get_template_directory() . '/' . $template_file)) {
            status_header(200);
            include(get_template_directory() . '/' . $template_file);
            exit;
        }
    }
}
add_action('init', 'law_firm_early_request_handler', 1);

/**
 * Flush rewrite rules on theme activation
 */
function law_firm_flush_rewrite_rules() {
    law_firm_add_custom_rewrite_rules();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'law_firm_flush_rewrite_rules');

/**
 * Register Custom Taxonomies
 */
function law_firm_custom_taxonomies() {
    // No custom taxonomies currently in use
}
add_action('init', 'law_firm_custom_taxonomies');

/**
 * Register Widget Areas
 */
function law_firm_widgets_init() {
    register_sidebar(array(
        'name' => __('Header Contact Info', 'law-firm-pyeongjeong'),
        'id' => 'header-contact',
        'description' => __('Contact information displayed in header', 'law-firm-pyeongjeong'),
        'before_widget' => '<div class="header-contact-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Column 1', 'law-firm-pyeongjeong'),
        'id' => 'footer-1',
        'description' => __('First column in footer', 'law-firm-pyeongjeong'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Column 2', 'law-firm-pyeongjeong'),
        'id' => 'footer-2',
        'description' => __('Second column in footer', 'law-firm-pyeongjeong'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Column 3', 'law-firm-pyeongjeong'),
        'id' => 'footer-3',
        'description' => __('Third column in footer', 'law-firm-pyeongjeong'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Column 4', 'law-firm-pyeongjeong'),
        'id' => 'footer-4',
        'description' => __('Fourth column in footer', 'law-firm-pyeongjeong'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'law_firm_widgets_init');

/**
 * Custom Meta Boxes
 */
function law_firm_add_meta_boxes() {

    // Successful Case Meta Box
    add_meta_box(
        'successful_case_details',
        __('Successful Case Details', 'law-firm-pyeongjeong'),
        'law_firm_successful_case_meta_box_callback',
        'successful_case',
        'normal',
        'high'
    );

    // Legal Information Meta Box
    add_meta_box(
        'legal_information_details',
        __('Legal Information Details', 'law-firm-pyeongjeong'),
        'law_firm_legal_information_meta_box_callback',
        'legal_information',
        'normal',
        'high'
    );

    // News Board Meta Box
    add_meta_box(
        'news_board_details',
        __('News Board Details', 'law-firm-pyeongjeong'),
        'law_firm_news_board_meta_box_callback',
        'news_board',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'law_firm_add_meta_boxes');

/**
 * Successful Case Meta Box Callback
 */
function law_firm_successful_case_meta_box_callback($post) {
    wp_nonce_field('law_firm_successful_case_meta_box', 'law_firm_successful_case_meta_box_nonce');

    $legal_case = get_post_meta($post->ID, '_successful_case_legal_case', true);
    $decision = get_post_meta($post->ID, '_successful_case_decision', true);
    $date = get_post_meta($post->ID, '_successful_case_date', true);
    $subtitle = get_post_meta($post->ID, '_successful_case_subtitle', true);

    echo '<table class="form-table">';

    echo '<tr><th><label for="legal_case">' . __('Legal Case', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="text" id="legal_case" name="legal_case" value="' . esc_attr($legal_case) . '" class="regular-text" /></td></tr>';

    echo '<tr><th><label for="decision">' . __('Decision', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="text" id="decision" name="decision" value="' . esc_attr($decision) . '" class="regular-text" /></td></tr>';

    echo '<tr><th><label for="date">' . __('Date', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="date" id="date" name="date" value="' . esc_attr($date) . '" class="regular-text" /></td></tr>';

    echo '<tr><th><label for="subtitle">' . __('Subtitle', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="text" id="subtitle" name="subtitle" value="' . esc_attr($subtitle) . '" class="regular-text" />';
    echo '<p class="description">' . __('Brief subtitle or tagline for the case', 'law-firm-pyeongjeong') . '</p></td></tr>';

    echo '</table>';
    echo '<p class="description">' . __('Content Description: Use the main editor below to add the full case description', 'law-firm-pyeongjeong') . '</p>';
}

/**
 * Legal Information Meta Box Callback
 */
function law_firm_legal_information_meta_box_callback($post) {
    wp_nonce_field('law_firm_legal_information_meta_box', 'law_firm_legal_information_meta_box_nonce');

    $subtitle = get_post_meta($post->ID, '_legal_information_subtitle', true);

    echo '<table class="form-table">';

    echo '<tr><th><label for="legal_info_subtitle">' . __('Subtitle', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="text" id="legal_info_subtitle" name="legal_info_subtitle" value="' . esc_attr($subtitle) . '" class="regular-text" />';
    echo '<p class="description">' . __('Brief subtitle for the legal information', 'law-firm-pyeongjeong') . '</p></td></tr>';

    echo '</table>';
    echo '<p class="description">' . __('Content Description: Use the main editor below to add the full content. Featured Image: Upload an image for the card display on archive pages', 'law-firm-pyeongjeong') . '</p>';
}

/**
 * News Board Meta Box Callback
 */
function law_firm_news_board_meta_box_callback($post) {
    wp_nonce_field('law_firm_news_board_meta_box', 'law_firm_news_board_meta_box_nonce');

    $date = get_post_meta($post->ID, '_news_board_date', true);
    $newspaper_name = get_post_meta($post->ID, '_news_board_newspaper_name', true);
    $description = get_post_meta($post->ID, '_news_board_description', true);

    echo '<table class="form-table">';

    echo '<tr><th><label for="news_board_date">' . __('Date', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="date" id="news_board_date" name="news_board_date" value="' . esc_attr($date) . '" class="regular-text" /></td></tr>';

    echo '<tr><th><label for="news_board_newspaper_name">' . __('Newspaper Name', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="text" id="news_board_newspaper_name" name="news_board_newspaper_name" value="' . esc_attr($newspaper_name) . '" class="regular-text" />';
    echo '<p class="description">' . __('Name of the newspaper source', 'law-firm-pyeongjeong') . '</p></td></tr>';

    echo '<tr><th><label for="news_board_description">' . __('Description', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><textarea id="news_board_description" name="news_board_description" rows="5" class="regular-text">' . esc_textarea($description) . '</textarea>';
    echo '<p class="description">' . __('Brief description of the news article', 'law-firm-pyeongjeong') . '</p></td></tr>';

    echo '</table>';
    echo '<p class="description">' . __('Content Description: Use the main editor below to add the full content. Featured Image: Upload an image for the card display on archive pages', 'law-firm-pyeongjeong') . '</p>';
}

/**
 * Save Meta Box Data
 */
function law_firm_save_meta_box_data($post_id) {
    // Successful Case Meta
    if (isset($_POST['law_firm_successful_case_meta_box_nonce']) && wp_verify_nonce($_POST['law_firm_successful_case_meta_box_nonce'], 'law_firm_successful_case_meta_box')) {
        if (isset($_POST['legal_case'])) {
            update_post_meta($post_id, '_successful_case_legal_case', sanitize_text_field($_POST['legal_case']));
        }
        if (isset($_POST['decision'])) {
            update_post_meta($post_id, '_successful_case_decision', sanitize_text_field($_POST['decision']));
        }
        if (isset($_POST['date'])) {
            update_post_meta($post_id, '_successful_case_date', sanitize_text_field($_POST['date']));
        }
        if (isset($_POST['subtitle'])) {
            update_post_meta($post_id, '_successful_case_subtitle', sanitize_text_field($_POST['subtitle']));
        }
    }

    // Legal Information Meta
    if (isset($_POST['law_firm_legal_information_meta_box_nonce']) && wp_verify_nonce($_POST['law_firm_legal_information_meta_box_nonce'], 'law_firm_legal_information_meta_box')) {
        if (isset($_POST['legal_info_subtitle'])) {
            update_post_meta($post_id, '_legal_information_subtitle', sanitize_text_field($_POST['legal_info_subtitle']));
        }
    }

    // News Board Meta
    if (isset($_POST['law_firm_news_board_meta_box_nonce']) && wp_verify_nonce($_POST['law_firm_news_board_meta_box_nonce'], 'law_firm_news_board_meta_box')) {
        if (isset($_POST['news_board_date'])) {
            update_post_meta($post_id, '_news_board_date', sanitize_text_field($_POST['news_board_date']));
        }
        if (isset($_POST['news_board_newspaper_name'])) {
            update_post_meta($post_id, '_news_board_newspaper_name', sanitize_text_field($_POST['news_board_newspaper_name']));
        }
        if (isset($_POST['news_board_description'])) {
            update_post_meta($post_id, '_news_board_description', sanitize_textarea_field($_POST['news_board_description']));
        }
    }
}
add_action('save_post', 'law_firm_save_meta_box_data');

/**
 * AJAX Handler for Consultation Form
 */
function law_firm_handle_consultation_form() {
    // Debug logging
    error_log('Consultation form submitted');
    error_log('POST data: ' . print_r($_POST, true));

    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'law_firm_nonce')) {
        error_log('Nonce verification failed');
        wp_send_json_error(array('message' => __('Security check failed', 'law-firm-pyeongjeong')));
        return;
    }

    // Sanitize form data
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $case_type = isset($_POST['case_type']) ? sanitize_text_field($_POST['case_type']) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

    // Handle privacy consent - accept multiple true values
    $privacy_consent_raw = isset($_POST['privacy_consent']) ? $_POST['privacy_consent'] : '';
    $privacy_consent = in_array($privacy_consent_raw, array('1', 'on', 'true', 'yes'), true) ? '1' : '0';

    error_log("Name: $name, Phone: $phone, Email: $email, Case Type: $case_type, Privacy Raw: $privacy_consent_raw, Privacy: $privacy_consent");

    // Validate required fields (case_type is now optional)
    if (empty($name) || empty($phone)) {
        error_log('Validation failed: Missing required fields');
        wp_send_json_error(array('message' => __('Please fill in all required fields.', 'law-firm-pyeongjeong')));
        return;
    }

    // Validate privacy consent separately for better error message
    if ($privacy_consent !== '1') {
        error_log('Validation failed: Privacy consent not accepted');
        wp_send_json_error(array('message' => __('Please agree to the privacy policy.', 'law-firm-pyeongjeong')));
        return;
    }
    
    // Save consultation request
    // Build formatted content with contact details
    $formatted_content = "=== 연락처 정보 / Contact Information ===\n\n";
    $formatted_content .= "이름 (Name): " . $name . "\n";
    $formatted_content .= "전화번호 (Phone): " . $phone . "\n";
    if (!empty($email)) {
        $formatted_content .= "이메일 (Email): " . $email . "\n";
    }
    if (!empty($case_type)) {
        $formatted_content .= "사건분야 (Case Type): " . $case_type . "\n";
    }
    $formatted_content .= "\n=== 상담내용 / Consultation Message ===\n\n";
    $formatted_content .= $message;

    $post_data = array(
        'post_title' => sprintf(__('Consultation Request from %s', 'law-firm-pyeongjeong'), $name),
        'post_content' => $formatted_content,
        'post_status' => 'publish',
        'post_type' => 'consultation',
        'meta_input' => array(
            '_consultation_name' => $name,
            '_consultation_phone' => $phone,
            '_consultation_email' => $email,
            '_consultation_case_type' => $case_type,
            '_consultation_privacy_consent' => $privacy_consent,
            '_consultation_date' => current_time('mysql')
        )
    );
    
    $consultation_id = wp_insert_post($post_data);

    error_log('Consultation ID: ' . $consultation_id);

    if ($consultation_id && !is_wp_error($consultation_id)) {
        error_log('Consultation saved successfully with ID: ' . $consultation_id);

        // TODO: Implement email notification for consultation requests
        // Currently disabled - submissions are saved to WordPress Consultations menu
        /*
        $to = get_option('admin_email');
        $subject = __('New Consultation Request', 'law-firm-pyeongjeong');
        $body = sprintf(
            __("New consultation request received:\n\nName: %s\nPhone: %s\nEmail: %s\nCase Type: %s\nMessage: %s", 'law-firm-pyeongjeong'),
            $name, $phone, $email, $case_type, $message
        );

        wp_mail($to, $subject, $body);
        */

        wp_send_json_success(array('message' => __('Your consultation request has been submitted successfully. We will contact you soon.', 'law-firm-pyeongjeong')));
    } else {
        error_log('Failed to save consultation. Error: ' . (is_wp_error($consultation_id) ? $consultation_id->get_error_message() : 'Unknown error'));
        wp_send_json_error(array('message' => __('Sorry, there was an error processing your request. Please try again.', 'law-firm-pyeongjeong')));
    }
}
add_action('wp_ajax_law_firm_consultation', 'law_firm_handle_consultation_form');
add_action('wp_ajax_nopriv_law_firm_consultation', 'law_firm_handle_consultation_form');

/**
 * Add Consultation Post Type for Form Submissions
 */
function law_firm_add_consultation_post_type() {
    register_post_type('consultation', array(
        'labels' => array(
            'name' => __('Consultations', 'law-firm-pyeongjeong'),
            'singular_name' => __('Consultation', 'law-firm-pyeongjeong'),
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
}
add_action('init', 'law_firm_add_consultation_post_type');

/**
 * Customizer Settings
 */
function law_firm_customize_register($wp_customize) {
    // Add theme options section
    $wp_customize->add_section('law_firm_options', array(
        'title' => __('Law Firm Settings', 'law-firm-pyeongjeong'),
        'priority' => 30,
    ));
    
    // Phone number setting
    $wp_customize->add_setting('law_firm_phone', array(
        'default' => '02-554-6674',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('law_firm_phone', array(
        'label' => __('Phone Number', 'law-firm-pyeongjeong'),
        'section' => 'law_firm_options',
        'type' => 'text',
    ));
    
    // Address setting
    $wp_customize->add_setting('law_firm_address', array(
        'default' => '서울 강남구 논현로63길 7',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('law_firm_address', array(
        'label' => __('Office Address', 'law-firm-pyeongjeong'),
        'section' => 'law_firm_options',
        'type' => 'textarea',
    ));
    
    // Business hours setting
    $wp_customize->add_setting('law_firm_hours', array(
        'default' => '평일업무시간 | 10:00 - 19:00\n365일 24시간 상담가능',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('law_firm_hours', array(
        'label' => __('Business Hours', 'law-firm-pyeongjeong'),
        'section' => 'law_firm_options',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'law_firm_customize_register');

/**
 * Fallback Primary Menu
 */
if (!function_exists('law_firm_fallback_menu')) {
    function law_firm_fallback_menu() {
        echo '<ul class="primary-menu">';

        // Each menu item links to its respective page
        echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . __('소개', 'law-firm-pyeongjeong') . '</a></li>';
        echo '<li><a href="' . esc_url(home_url('/services/')) . '">' . __('업무분야', 'law-firm-pyeongjeong') . '</a></li>';
        echo '<li><a href="' . esc_url(home_url('/cases/')) . '">' . __('성공사례', 'law-firm-pyeongjeong') . '</a></li>';
        echo '<li><a href="' . esc_url(home_url('/contact/')) . '">' . __('상담문의', 'law-firm-pyeongjeong') . '</a></li>';
        echo '</ul>';
    }
}

/**
 * Helper Functions
 */

/**
 * Get the first image from post content
 *
 * @param int $post_id The post ID
 * @return string|false The image URL or false if no image found
 */
function law_firm_get_first_content_image($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $post = get_post($post_id);
    if (!$post) {
        return false;
    }

    // Get post content
    $content = $post->post_content;

    // Use regex to find first img tag and extract src attribute
    if (preg_match('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $content, $matches)) {
        return $matches[1];
    }

    return false;
}

/**
 * Performance Optimizations
 */

// Remove WordPress version from head
remove_action('wp_head', 'wp_generator');

// Remove unnecessary WordPress features for better performance
function law_firm_performance_optimizations() {
    // Remove WordPress emoji support
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    
    // Remove RSD link
    remove_action('wp_head', 'rsd_link');
    
    // Remove Windows Live Writer
    remove_action('wp_head', 'wlwmanifest_link');
    
    // Remove shortlink
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
}
add_action('init', 'law_firm_performance_optimizations');

// Add preload hints for performance
function law_firm_preload_resources() {
    // Preload critical fonts
    echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;600;700&display=swap" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
    echo '<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;600;700&display=swap"></noscript>' . "\n";
    
    // Preload Font Awesome
    echo '<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
    echo '<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"></noscript>' . "\n";
}
add_action('wp_head', 'law_firm_preload_resources', 1);

// Enable gzip compression
function law_firm_enable_compression() {
    if (!ob_start("ob_gzhandler")) {
        ob_start();
    }
}
add_action('init', 'law_firm_enable_compression');

// Add cache headers for static resources
function law_firm_cache_headers() {
    if (!is_admin()) {
        header('Cache-Control: public, max-age=31536000'); // 1 year for static resources
        header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + 31536000));
    }
}

// Add security headers
function law_firm_security_headers() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}
add_action('send_headers', 'law_firm_security_headers');

// Optimize database queries
function law_firm_optimize_queries() {
    // Remove query strings from static resources
    function remove_query_strings($src) {
        $parts = explode('?ver', $src);
        return $parts[0];
    }
    
    if (!is_admin()) {
        add_filter('script_loader_src', 'remove_query_strings', 15, 1);
        add_filter('style_loader_src', 'remove_query_strings', 15, 1);
    }
}
add_action('init', 'law_firm_optimize_queries');

/**
 * SEO and Meta Tags
 */
function law_firm_seo_meta_tags() {
    if (is_front_page()) {
        echo '<meta name="description" content="법률사무소 평정 (LEE & PARTNERS) - 민사, 형사, 가족법, 부동산법 전문. 15년 경력의 전문 변호사진이 최상의 법률 서비스를 제공합니다.">' . "\n";
        echo '<meta name="keywords" content="법률사무소, 변호사, 민사소송, 형사소송, 가족법, 부동산법, 서울 법률사무소, 법률상담">' . "\n";
        echo '<meta property="og:title" content="법률사무소 평정 | LEE & PARTNERS">' . "\n";
        echo '<meta property="og:description" content="전문 변호사진이 제공하는 최상의 법률 서비스. 민사, 형사, 가족법, 부동산법 전문.">' . "\n";
        echo '<meta property="og:type" content="website">' . "\n";
        echo '<meta property="og:locale" content="ko_KR">' . "\n";
    }
}
add_action('wp_head', 'law_firm_seo_meta_tags');

/**
 * Migrate News Board Subtitle to Newspaper Name
 * This function migrates existing _news_board_subtitle data to _news_board_newspaper_name
 * Runs once on admin load to avoid repeated execution
 */
function law_firm_migrate_news_board_subtitle() {
    // Check if migration has already been done
    if (get_option('law_firm_news_board_migration_done')) {
        return;
    }

    // Get all news_board posts
    $args = array(
        'post_type' => 'news_board',
        'posts_per_page' => -1,
        'post_status' => 'any',
    );

    $posts = get_posts($args);

    foreach ($posts as $post) {
        // Get old subtitle value
        $old_subtitle = get_post_meta($post->ID, '_news_board_subtitle', true);

        // If old subtitle exists and new one doesn't, migrate it
        if ($old_subtitle && !get_post_meta($post->ID, '_news_board_newspaper_name', true)) {
            update_post_meta($post->ID, '_news_board_newspaper_name', $old_subtitle);
        }
    }

    // Mark migration as complete
    update_option('law_firm_news_board_migration_done', true);
}

// Run migration on admin init
add_action('admin_init', 'law_firm_migrate_news_board_subtitle');
?>
