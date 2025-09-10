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
    add_image_size('attorney-profile', 300, 400, true);
    add_image_size('case-thumbnail', 400, 300, true);
    add_image_size('practice-area-icon', 100, 100, true);
    
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
    // Enqueue main stylesheet
    wp_enqueue_style('law-firm-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue Google Fonts
    wp_enqueue_style('law-firm-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Enqueue Font Awesome for icons
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // Enqueue jQuery
    wp_enqueue_script('jquery');
    
    // Enqueue main JavaScript file
    wp_enqueue_script('law-firm-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('law-firm-script', 'law_firm_ajax', array(
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
 * Register Custom Post Types
 */
function law_firm_custom_post_types() {
    
    // Attorney Post Type
    register_post_type('attorney', array(
        'labels' => array(
            'name' => __('Attorneys', 'law-firm-pyeongjeong'),
            'singular_name' => __('Attorney', 'law-firm-pyeongjeong'),
            'add_new' => __('Add New Attorney', 'law-firm-pyeongjeong'),
            'add_new_item' => __('Add New Attorney', 'law-firm-pyeongjeong'),
            'edit_item' => __('Edit Attorney', 'law-firm-pyeongjeong'),
            'new_item' => __('New Attorney', 'law-firm-pyeongjeong'),
            'view_item' => __('View Attorney', 'law-firm-pyeongjeong'),
            'search_items' => __('Search Attorneys', 'law-firm-pyeongjeong'),
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-businessman',
        'menu_position' => 25,
        'has_archive' => true,
        'rewrite' => array('slug' => 'attorneys')
    ));
    
    // Legal Case Post Type
    register_post_type('legal_case', array(
        'labels' => array(
            'name' => __('Legal Cases', 'law-firm-pyeongjeong'),
            'singular_name' => __('Legal Case', 'law-firm-pyeongjeong'),
            'add_new' => __('Add New Case', 'law-firm-pyeongjeong'),
            'add_new_item' => __('Add New Case', 'law-firm-pyeongjeong'),
            'edit_item' => __('Edit Case', 'law-firm-pyeongjeong'),
            'new_item' => __('New Case', 'law-firm-pyeongjeong'),
            'view_item' => __('View Case', 'law-firm-pyeongjeong'),
            'search_items' => __('Search Cases', 'law-firm-pyeongjeong'),
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-portfolio',
        'menu_position' => 26,
        'has_archive' => true,
        'rewrite' => array('slug' => 'cases')
    ));
    
    // Practice Area Post Type
    register_post_type('practice_area', array(
        'labels' => array(
            'name' => __('Practice Areas', 'law-firm-pyeongjeong'),
            'singular_name' => __('Practice Area', 'law-firm-pyeongjeong'),
            'add_new' => __('Add New Practice Area', 'law-firm-pyeongjeong'),
            'add_new_item' => __('Add New Practice Area', 'law-firm-pyeongjeong'),
            'edit_item' => __('Edit Practice Area', 'law-firm-pyeongjeong'),
            'new_item' => __('New Practice Area', 'law-firm-pyeongjeong'),
            'view_item' => __('View Practice Area', 'law-firm-pyeongjeong'),
            'search_items' => __('Search Practice Areas', 'law-firm-pyeongjeong'),
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-balance-scale',
        'menu_position' => 27,
        'has_archive' => true,
        'rewrite' => array('slug' => 'practice-areas')
    ));
    
    // Testimonial Post Type
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => __('Testimonials', 'law-firm-pyeongjeong'),
            'singular_name' => __('Testimonial', 'law-firm-pyeongjeong'),
            'add_new' => __('Add New Testimonial', 'law-firm-pyeongjeong'),
            'add_new_item' => __('Add New Testimonial', 'law-firm-pyeongjeong'),
            'edit_item' => __('Edit Testimonial', 'law-firm-pyeongjeong'),
            'new_item' => __('New Testimonial', 'law-firm-pyeongjeong'),
            'view_item' => __('View Testimonial', 'law-firm-pyeongjeong'),
            'search_items' => __('Search Testimonials', 'law-firm-pyeongjeong'),
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'custom-fields'),
        'menu_icon' => 'dashicons-format-quote',
        'menu_position' => 28,
        'has_archive' => false,
        'rewrite' => array('slug' => 'testimonials')
    ));
}
add_action('init', 'law_firm_custom_post_types');

/**
 * Register Custom Taxonomies
 */
function law_firm_custom_taxonomies() {
    
    // Case Type Taxonomy
    register_taxonomy('case_type', 'legal_case', array(
        'labels' => array(
            'name' => __('Case Types', 'law-firm-pyeongjeong'),
            'singular_name' => __('Case Type', 'law-firm-pyeongjeong'),
            'search_items' => __('Search Case Types', 'law-firm-pyeongjeong'),
            'all_items' => __('All Case Types', 'law-firm-pyeongjeong'),
            'edit_item' => __('Edit Case Type', 'law-firm-pyeongjeong'),
            'update_item' => __('Update Case Type', 'law-firm-pyeongjeong'),
            'add_new_item' => __('Add New Case Type', 'law-firm-pyeongjeong'),
            'new_item_name' => __('New Case Type Name', 'law-firm-pyeongjeong'),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'case-type')
    ));
    
    // Practice Area Taxonomy for Attorneys
    register_taxonomy('attorney_specialty', 'attorney', array(
        'labels' => array(
            'name' => __('Attorney Specialties', 'law-firm-pyeongjeong'),
            'singular_name' => __('Attorney Specialty', 'law-firm-pyeongjeong'),
            'search_items' => __('Search Specialties', 'law-firm-pyeongjeong'),
            'all_items' => __('All Specialties', 'law-firm-pyeongjeong'),
            'edit_item' => __('Edit Specialty', 'law-firm-pyeongjeong'),
            'update_item' => __('Update Specialty', 'law-firm-pyeongjeong'),
            'add_new_item' => __('Add New Specialty', 'law-firm-pyeongjeong'),
            'new_item_name' => __('New Specialty Name', 'law-firm-pyeongjeong'),
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'specialty')
    ));
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
    
    // Attorney Meta Box
    add_meta_box(
        'attorney_details',
        __('Attorney Details', 'law-firm-pyeongjeong'),
        'law_firm_attorney_meta_box_callback',
        'attorney',
        'normal',
        'high'
    );
    
    // Legal Case Meta Box
    add_meta_box(
        'case_details',
        __('Case Details', 'law-firm-pyeongjeong'),
        'law_firm_case_meta_box_callback',
        'legal_case',
        'normal',
        'high'
    );
    
    // Practice Area Meta Box
    add_meta_box(
        'practice_area_details',
        __('Practice Area Details', 'law-firm-pyeongjeong'),
        'law_firm_practice_area_meta_box_callback',
        'practice_area',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'law_firm_add_meta_boxes');

/**
 * Attorney Meta Box Callback
 */
function law_firm_attorney_meta_box_callback($post) {
    wp_nonce_field('law_firm_attorney_meta_box', 'law_firm_attorney_meta_box_nonce');
    
    $position = get_post_meta($post->ID, '_attorney_position', true);
    $phone = get_post_meta($post->ID, '_attorney_phone', true);
    $email = get_post_meta($post->ID, '_attorney_email', true);
    $education = get_post_meta($post->ID, '_attorney_education', true);
    $experience_years = get_post_meta($post->ID, '_attorney_experience_years', true);
    $bar_admission = get_post_meta($post->ID, '_attorney_bar_admission', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="attorney_position">' . __('Position/Title', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="text" id="attorney_position" name="attorney_position" value="' . esc_attr($position) . '" class="regular-text" /></td></tr>';
    
    echo '<tr><th><label for="attorney_phone">' . __('Phone Number', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="text" id="attorney_phone" name="attorney_phone" value="' . esc_attr($phone) . '" class="regular-text" /></td></tr>';
    
    echo '<tr><th><label for="attorney_email">' . __('Email Address', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="email" id="attorney_email" name="attorney_email" value="' . esc_attr($email) . '" class="regular-text" /></td></tr>';
    
    echo '<tr><th><label for="attorney_education">' . __('Education', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><textarea id="attorney_education" name="attorney_education" rows="3" class="large-text">' . esc_textarea($education) . '</textarea></td></tr>';
    
    echo '<tr><th><label for="attorney_experience_years">' . __('Years of Experience', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="number" id="attorney_experience_years" name="attorney_experience_years" value="' . esc_attr($experience_years) . '" class="small-text" /></td></tr>';
    
    echo '<tr><th><label for="attorney_bar_admission">' . __('Bar Admission', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="text" id="attorney_bar_admission" name="attorney_bar_admission" value="' . esc_attr($bar_admission) . '" class="regular-text" /></td></tr>';
    echo '</table>';
}

/**
 * Legal Case Meta Box Callback
 */
function law_firm_case_meta_box_callback($post) {
    wp_nonce_field('law_firm_case_meta_box', 'law_firm_case_meta_box_nonce');
    
    $case_result = get_post_meta($post->ID, '_case_result', true);
    $case_amount = get_post_meta($post->ID, '_case_amount', true);
    $case_duration = get_post_meta($post->ID, '_case_duration', true);
    $case_attorney = get_post_meta($post->ID, '_case_attorney', true);
    $case_date = get_post_meta($post->ID, '_case_date', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="case_result">' . __('Case Result', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><select id="case_result" name="case_result" class="regular-text">';
    echo '<option value="won" ' . selected($case_result, 'won', false) . '>' . __('Won', 'law-firm-pyeongjeong') . '</option>';
    echo '<option value="settled" ' . selected($case_result, 'settled', false) . '>' . __('Settled', 'law-firm-pyeongjeong') . '</option>';
    echo '<option value="dismissed" ' . selected($case_result, 'dismissed', false) . '>' . __('Dismissed', 'law-firm-pyeongjeong') . '</option>';
    echo '</select></td></tr>';
    
    echo '<tr><th><label for="case_amount">' . __('Settlement/Award Amount', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="text" id="case_amount" name="case_amount" value="' . esc_attr($case_amount) . '" class="regular-text" /></td></tr>';
    
    echo '<tr><th><label for="case_duration">' . __('Case Duration', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="text" id="case_duration" name="case_duration" value="' . esc_attr($case_duration) . '" class="regular-text" /></td></tr>';
    
    echo '<tr><th><label for="case_attorney">' . __('Lead Attorney', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><select id="case_attorney" name="case_attorney" class="regular-text">';
    echo '<option value="">' . __('Select Attorney', 'law-firm-pyeongjeong') . '</option>';
    
    $attorneys = get_posts(array('post_type' => 'attorney', 'numberposts' => -1));
    foreach ($attorneys as $attorney) {
        echo '<option value="' . $attorney->ID . '" ' . selected($case_attorney, $attorney->ID, false) . '>' . $attorney->post_title . '</option>';
    }
    
    echo '</select></td></tr>';
    
    echo '<tr><th><label for="case_date">' . __('Case Completion Date', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="date" id="case_date" name="case_date" value="' . esc_attr($case_date) . '" class="regular-text" /></td></tr>';
    echo '</table>';
}

/**
 * Practice Area Meta Box Callback
 */
function law_firm_practice_area_meta_box_callback($post) {
    wp_nonce_field('law_firm_practice_area_meta_box', 'law_firm_practice_area_meta_box_nonce');
    
    $icon = get_post_meta($post->ID, '_practice_area_icon', true);
    $order = get_post_meta($post->ID, '_practice_area_order', true);
    $featured = get_post_meta($post->ID, '_practice_area_featured', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="practice_area_icon">' . __('Icon Class', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="text" id="practice_area_icon" name="practice_area_icon" value="' . esc_attr($icon) . '" class="regular-text" />';
    echo '<p class="description">' . __('Font Awesome icon class (e.g., fas fa-balance-scale)', 'law-firm-pyeongjeong') . '</p></td></tr>';
    
    echo '<tr><th><label for="practice_area_order">' . __('Display Order', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="number" id="practice_area_order" name="practice_area_order" value="' . esc_attr($order) . '" class="small-text" /></td></tr>';
    
    echo '<tr><th><label for="practice_area_featured">' . __('Featured', 'law-firm-pyeongjeong') . '</label></th>';
    echo '<td><input type="checkbox" id="practice_area_featured" name="practice_area_featured" value="1" ' . checked($featured, '1', false) . ' />';
    echo '<label for="practice_area_featured">' . __('Display on homepage', 'law-firm-pyeongjeong') . '</label></td></tr>';
    echo '</table>';
}

/**
 * Save Meta Box Data
 */
function law_firm_save_meta_box_data($post_id) {
    // Attorney Meta
    if (isset($_POST['law_firm_attorney_meta_box_nonce']) && wp_verify_nonce($_POST['law_firm_attorney_meta_box_nonce'], 'law_firm_attorney_meta_box')) {
        if (isset($_POST['attorney_position'])) {
            update_post_meta($post_id, '_attorney_position', sanitize_text_field($_POST['attorney_position']));
        }
        if (isset($_POST['attorney_phone'])) {
            update_post_meta($post_id, '_attorney_phone', sanitize_text_field($_POST['attorney_phone']));
        }
        if (isset($_POST['attorney_email'])) {
            update_post_meta($post_id, '_attorney_email', sanitize_email($_POST['attorney_email']));
        }
        if (isset($_POST['attorney_education'])) {
            update_post_meta($post_id, '_attorney_education', sanitize_textarea_field($_POST['attorney_education']));
        }
        if (isset($_POST['attorney_experience_years'])) {
            update_post_meta($post_id, '_attorney_experience_years', intval($_POST['attorney_experience_years']));
        }
        if (isset($_POST['attorney_bar_admission'])) {
            update_post_meta($post_id, '_attorney_bar_admission', sanitize_text_field($_POST['attorney_bar_admission']));
        }
    }
    
    // Case Meta
    if (isset($_POST['law_firm_case_meta_box_nonce']) && wp_verify_nonce($_POST['law_firm_case_meta_box_nonce'], 'law_firm_case_meta_box')) {
        if (isset($_POST['case_result'])) {
            update_post_meta($post_id, '_case_result', sanitize_text_field($_POST['case_result']));
        }
        if (isset($_POST['case_amount'])) {
            update_post_meta($post_id, '_case_amount', sanitize_text_field($_POST['case_amount']));
        }
        if (isset($_POST['case_duration'])) {
            update_post_meta($post_id, '_case_duration', sanitize_text_field($_POST['case_duration']));
        }
        if (isset($_POST['case_attorney'])) {
            update_post_meta($post_id, '_case_attorney', intval($_POST['case_attorney']));
        }
        if (isset($_POST['case_date'])) {
            update_post_meta($post_id, '_case_date', sanitize_text_field($_POST['case_date']));
        }
    }
    
    // Practice Area Meta
    if (isset($_POST['law_firm_practice_area_meta_box_nonce']) && wp_verify_nonce($_POST['law_firm_practice_area_meta_box_nonce'], 'law_firm_practice_area_meta_box')) {
        if (isset($_POST['practice_area_icon'])) {
            update_post_meta($post_id, '_practice_area_icon', sanitize_text_field($_POST['practice_area_icon']));
        }
        if (isset($_POST['practice_area_order'])) {
            update_post_meta($post_id, '_practice_area_order', intval($_POST['practice_area_order']));
        }
        $featured = isset($_POST['practice_area_featured']) ? '1' : '0';
        update_post_meta($post_id, '_practice_area_featured', $featured);
    }
}
add_action('save_post', 'law_firm_save_meta_box_data');

/**
 * AJAX Handler for Consultation Form
 */
function law_firm_handle_consultation_form() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'law_firm_nonce')) {
        wp_die('Security check failed');
    }
    
    // Sanitize form data
    $name = sanitize_text_field($_POST['name']);
    $phone = sanitize_text_field($_POST['phone']);
    $email = sanitize_email($_POST['email']);
    $case_type = sanitize_text_field($_POST['case_type']);
    $message = sanitize_textarea_field($_POST['message']);
    $privacy_consent = isset($_POST['privacy_consent']) ? '1' : '0';
    
    // Validate required fields
    if (empty($name) || empty($phone) || empty($case_type) || $privacy_consent !== '1') {
        wp_send_json_error(array('message' => __('Please fill in all required fields and agree to privacy policy.', 'law-firm-pyeongjeong')));
    }
    
    // Save consultation request
    $post_data = array(
        'post_title' => sprintf(__('Consultation Request from %s', 'law-firm-pyeongjeong'), $name),
        'post_content' => $message,
        'post_status' => 'private',
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
    
    if ($consultation_id) {
        // Send email notification
        $to = get_option('admin_email');
        $subject = __('New Consultation Request', 'law-firm-pyeongjeong');
        $body = sprintf(
            __("New consultation request received:\n\nName: %s\nPhone: %s\nEmail: %s\nCase Type: %s\nMessage: %s", 'law-firm-pyeongjeong'),
            $name, $phone, $email, $case_type, $message
        );
        
        wp_mail($to, $subject, $body);
        
        wp_send_json_success(array('message' => __('Your consultation request has been submitted successfully. We will contact you soon.', 'law-firm-pyeongjeong')));
    } else {
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
        echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('소개', 'law-firm-pyeongjeong') . '</a></li>';
        echo '<li><a href="' . esc_url(get_post_type_archive_link('practice_area')) . '">' . __('업무분야', 'law-firm-pyeongjeong') . '</a></li>';
        echo '<li><a href="' . esc_url(get_post_type_archive_link('attorney')) . '">' . __('구성원', 'law-firm-pyeongjeong') . '</a></li>';
        echo '<li><a href="' . esc_url(get_post_type_archive_link('legal_case')) . '">' . __('성공사례', 'law-firm-pyeongjeong') . '</a></li>';
        echo '<li><a href="#consultation-form" data-scroll-to="consultation-form">' . __('상담문의', 'law-firm-pyeongjeong') . '</a></li>';
        echo '</ul>';
    }
}

/**
 * Helper Functions
 */

// Get attorney by ID
function law_firm_get_attorney($attorney_id) {
    if (!$attorney_id) return null;
    
    $attorney = get_post($attorney_id);
    if (!$attorney || $attorney->post_type !== 'attorney') return null;
    
    return array(
        'id' => $attorney->ID,
        'name' => $attorney->post_title,
        'position' => get_post_meta($attorney->ID, '_attorney_position', true),
        'phone' => get_post_meta($attorney->ID, '_attorney_phone', true),
        'email' => get_post_meta($attorney->ID, '_attorney_email', true),
        'education' => get_post_meta($attorney->ID, '_attorney_education', true),
        'experience_years' => get_post_meta($attorney->ID, '_attorney_experience_years', true),
        'bar_admission' => get_post_meta($attorney->ID, '_attorney_bar_admission', true),
        'bio' => $attorney->post_content,
        'photo' => get_the_post_thumbnail_url($attorney->ID, 'attorney-profile'),
        'url' => get_permalink($attorney->ID)
    );
}

// Get featured practice areas
function law_firm_get_featured_practice_areas($limit = 6) {
    $args = array(
        'post_type' => 'practice_area',
        'posts_per_page' => $limit,
        'meta_query' => array(
            array(
                'key' => '_practice_area_featured',
                'value' => '1',
                'compare' => '='
            )
        ),
        'meta_key' => '_practice_area_order',
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
    );
    
    return get_posts($args);
}

// Get recent successful cases
function law_firm_get_recent_cases($limit = 6) {
    $args = array(
        'post_type' => 'legal_case',
        'posts_per_page' => $limit,
        'meta_query' => array(
            array(
                'key' => '_case_result',
                'value' => array('won', 'settled'),
                'compare' => 'IN'
            )
        ),
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    return get_posts($args);
}

// Format case amount for display
function law_firm_format_case_amount($amount) {
    if (empty($amount)) return '';
    
    // Remove any non-numeric characters except decimal points
    $numeric_amount = preg_replace('/[^0-9.]/', '', $amount);
    
    if (!$numeric_amount) return $amount;
    
    // Format with Korean number formatting
    return number_format($numeric_amount) . '원';
}
?>
