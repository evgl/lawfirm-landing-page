<?php
if (!defined('ABSPATH')) exit;

function pjlaw_case_review_add_meta_boxes() {
    add_meta_box('pj_case_review_info', '후기 정보', 'pjlaw_case_review_info_cb', 'pj_case_review', 'side', 'high');
}
add_action('add_meta_boxes', 'pjlaw_case_review_add_meta_boxes');

function pjlaw_case_review_info_cb($post) {
    wp_nonce_field('pjlaw_case_review_meta', 'pjlaw_case_review_nonce');
    $tag    = get_post_meta($post->ID, '_pj_review_tag', true);
    $lawyer = get_post_meta($post->ID, '_pj_review_lawyer', true);
    $avatar = get_post_meta($post->ID, '_pj_review_avatar', true);
    ?>
    <p>
        <label><?php esc_html_e('태그 (예: 이혼소송후기)', 'pjlaw'); ?></label><br>
        <input type="text" name="pj_review_tag" value="<?php echo esc_attr($tag); ?>" style="width:100%">
    </p>
    <p>
        <label><?php esc_html_e('변호사 이름 (예: 이시완 변호사)', 'pjlaw'); ?></label><br>
        <input type="text" name="pj_review_lawyer" value="<?php echo esc_attr($lawyer); ?>" style="width:100%">
    </p>
    <p>
        <label><?php esc_html_e('변호사 프로필 이미지 URL (선택)', 'pjlaw'); ?></label><br>
        <input type="text" name="pj_review_avatar" value="<?php echo esc_attr($avatar); ?>" style="width:100%">
    </p>
    <p class="description"><?php esc_html_e('카드 제목은 제목, 본문은 발췌(요약), 대표 이미지는 카드 이미지로 표시됩니다. 프로필 이미지를 비우면 기본 변호사 이미지가 사용됩니다.', 'pjlaw'); ?></p>
    <?php
}

function pjlaw_case_review_save_meta($post_id) {
    if (!isset($_POST['pjlaw_case_review_nonce']) || !wp_verify_nonce($_POST['pjlaw_case_review_nonce'], 'pjlaw_case_review_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['pj_review_tag'])) {
        update_post_meta($post_id, '_pj_review_tag', sanitize_text_field(wp_unslash($_POST['pj_review_tag'])));
    }
    if (isset($_POST['pj_review_lawyer'])) {
        update_post_meta($post_id, '_pj_review_lawyer', sanitize_text_field(wp_unslash($_POST['pj_review_lawyer'])));
    }
    if (isset($_POST['pj_review_avatar'])) {
        update_post_meta($post_id, '_pj_review_avatar', esc_url_raw(wp_unslash($_POST['pj_review_avatar'])));
    }
}
add_action('save_post_pj_case_review', 'pjlaw_case_review_save_meta');
