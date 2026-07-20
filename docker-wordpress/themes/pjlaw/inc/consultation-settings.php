<?php
/**
 * Consultation (상담신청) notification settings + wp_mail() mailer.
 *
 * Adds an "알림 설정" submenu under the 상담신청 menu where staff configure the
 * recipient address, and sends an email via wp_mail() (routed through
 * WP Mail SMTP / Gmail Workspace) on every new booking.
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) exit;

/* ---------- Settings page ---------- */

function pjlaw_consultation_settings_menu() {
    add_submenu_page(
        'edit.php?post_type=consultation',
        '알림 설정',
        '알림 설정',
        'manage_options',
        'pjlaw-consultation-settings',
        'pjlaw_consultation_settings_render'
    );
}
add_action('admin_menu', 'pjlaw_consultation_settings_menu');

function pjlaw_consultation_settings_init() {
    register_setting('pjlaw_consultation_settings', 'pjlaw_consultation_notify_enabled', array(
        'type'              => 'integer',
        'sanitize_callback' => 'absint',
        'default'           => 1,
    ));
    register_setting('pjlaw_consultation_settings', 'pjlaw_consultation_notify_to', array(
        'type'              => 'string',
        'sanitize_callback' => 'sanitize_email',
        'default'           => get_option('admin_email'),
    ));
}

add_action('admin_init', 'pjlaw_consultation_settings_init');

function pjlaw_consultation_settings_render() {
    if (!current_user_can('manage_options')) return;
    $enabled = (int) get_option('pjlaw_consultation_notify_enabled', 1);
    $to      = get_option('pjlaw_consultation_notify_to', get_option('admin_email'));
    ?>
    <div class="wrap">
        <h1>상담신청 알림 설정</h1>
        <p class="description">새 상담신청이 접수되면 아래 주소로 이메일이 발송됩니다. (WP Mail SMTP 플러그인을 통해 Gmail Workspace로 발송)</p>
        <form method="post" action="options.php">
            <?php settings_fields('pjlaw_consultation_settings'); ?>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row">이메일 알림 사용</th>
                    <td>
                        <label>
                            <input type="checkbox" name="pjlaw_consultation_notify_enabled" value="1" <?php checked($enabled, 1); ?>>
                            새 상담신청 접수 시 이메일 발송
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="pjlaw_notify_to">받는 사람 (수신 주소)</label></th>
                    <td>
                        <input type="email" id="pjlaw_notify_to" name="pjlaw_consultation_notify_to" value="<?php echo esc_attr($to); ?>" class="regular-text">
                        <p class="description">알림을 받을 사무실 이메일 주소입니다.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

/* ---------- wp_mail() mailer (routed via WP Mail SMTP / Gmail Workspace) ---------- */

/**
 * Send a staff notification email for a consultation booking via wp_mail().
 * WP Mail SMTP plugin routes this through Gmail Workspace SMTP automatically.
 * Failures are logged but never thrown, so a mail problem cannot fail the booking.
 *
 * @param int $post_id Consultation post ID.
 */
function pjlaw_send_consultation_notification($post_id) {
    if (!(int) get_option('pjlaw_consultation_notify_enabled', 1)) {
        return;
    }

    $to = get_option('pjlaw_consultation_notify_to', get_option('admin_email'));
    if (!is_email($to)) {
        error_log('[pjlaw] Consultation email skipped: invalid recipient address');
        return;
    }

    $name = get_post_meta($post_id, '_consultation_name', true);
    $rows = array(
        '상담분야'    => get_post_meta($post_id, '_consultation_category', true),
        '상담방식'    => get_post_meta($post_id, '_consultation_method', true),
        '희망 상담일' => trim(get_post_meta($post_id, '_consultation_pref_date', true) . ' ' . get_post_meta($post_id, '_consultation_pref_time', true)),
        '질문1 답변'  => get_post_meta($post_id, '_consultation_q1', true),
        '질문2 답변'  => get_post_meta($post_id, '_consultation_q2', true),
        '이름'        => $name,
        '연락처'      => get_post_meta($post_id, '_consultation_phone', true),
        '의뢰인 정보' => get_post_meta($post_id, '_consultation_client', true),
        '상대방 정보' => get_post_meta($post_id, '_consultation_opponent', true),
        '사건 개요'   => get_post_meta($post_id, '_consultation_case', true),
        '의뢰 목적'   => get_post_meta($post_id, '_consultation_goal', true),
        '사건번호'    => get_post_meta($post_id, '_consultation_case_number', true),
        '기타 상세'   => get_post_meta($post_id, '_consultation_details', true),
    );

    $body_rows = '';
    foreach ($rows as $label => $value) {
        $body_rows .= '<tr><th align="left" style="padding:6px 12px;background:#f6f7f7;width:140px;vertical-align:top">'
            . esc_html($label) . '</th><td style="padding:6px 12px;border-bottom:1px solid #eee">'
            . ($value === '' ? '—' : nl2br(esc_html($value))) . '</td></tr>';
    }
    $edit_link = admin_url('post.php?post=' . $post_id . '&action=edit');
    $html = '<div style="font-family:Arial,Helvetica,sans-serif;color:#222">'
        . '<h2 style="margin:0 0 12px">새 상담신청이 접수되었습니다</h2>'
        . '<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%;max-width:640px">'
        . $body_rows . '</table>'
        . '<p style="margin-top:16px"><a href="' . esc_url($edit_link) . '">관리자에서 상담신청 보기 →</a></p>'
        . '</div>';

    $subject = '[상담신청] ' . ($name !== '' ? $name : '신규 접수');
    $headers = array('Content-Type: text/html; charset=UTF-8');

    $result = wp_mail($to, $subject, $html, $headers);
    if (!$result) {
        error_log('[pjlaw] wp_mail failed to send consultation notification to ' . $to);
    }
}
