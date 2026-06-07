<?php
/**
 * Consultation (상담신청) admin view.
 *
 * Read-only meta box + list columns for bookings created by the frontend
 * consultation wizard. Records are never hand-edited, so there is no save handler.
 *
 * @package pjlaw
 */

if (!defined('ABSPATH')) exit;

/* ---------- Read-only details meta box ---------- */

function pjlaw_consultation_add_meta_boxes() {
    add_meta_box('pj_consultation_details', '상담 신청 내용', 'pjlaw_consultation_details_cb', 'consultation', 'normal', 'high');
}
add_action('add_meta_boxes', 'pjlaw_consultation_add_meta_boxes');

function pjlaw_consultation_details_cb($post) {
    $rows = array(
        '상담분야'    => get_post_meta($post->ID, '_consultation_category', true),
        '상담방식'    => get_post_meta($post->ID, '_consultation_method', true),
        '희망 상담일' => trim(get_post_meta($post->ID, '_consultation_pref_date', true) . ' ' . get_post_meta($post->ID, '_consultation_pref_time', true)),
        '질문1 답변'  => get_post_meta($post->ID, '_consultation_q1', true),
        '질문2 답변'  => get_post_meta($post->ID, '_consultation_q2', true),
        '이름'        => get_post_meta($post->ID, '_consultation_name', true),
        '연락처'      => get_post_meta($post->ID, '_consultation_phone', true),
        '의뢰인 정보' => get_post_meta($post->ID, '_consultation_client', true),
        '상대방 정보' => get_post_meta($post->ID, '_consultation_opponent', true),
        '사건 개요'   => get_post_meta($post->ID, '_consultation_case', true),
        '의뢰 목적'   => get_post_meta($post->ID, '_consultation_goal', true),
        '사건번호'    => get_post_meta($post->ID, '_consultation_case_number', true),
        '기타 상세'   => get_post_meta($post->ID, '_consultation_details', true),
        '접수일시'    => get_post_meta($post->ID, '_consultation_date', true),
    );
    ?>
    <table class="widefat striped" style="margin-top:8px">
        <tbody>
        <?php foreach ($rows as $label => $value) : ?>
            <tr>
                <th style="width:140px;text-align:left;vertical-align:top"><?php echo esc_html($label); ?></th>
                <td><?php echo $value === '' ? '—' : nl2br(esc_html($value)); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php
}

/* ---------- Admin list columns ---------- */

function pjlaw_consultation_columns($columns) {
    $new = array();
    $new['cb']       = isset($columns['cb']) ? $columns['cb'] : '';
    $new['title']    = $columns['title'];
    $new['cf_name']  = '신청자';
    $new['cf_phone'] = '연락처';
    $new['cf_cat']   = '분야';
    $new['cf_slot']  = '희망일시';
    $new['date']     = $columns['date'];
    return $new;
}
add_filter('manage_consultation_posts_columns', 'pjlaw_consultation_columns');

function pjlaw_consultation_column_content($column, $post_id) {
    if ($column === 'cf_name') {
        $v = get_post_meta($post_id, '_consultation_name', true);
        echo $v ? esc_html($v) : '—';
    } elseif ($column === 'cf_phone') {
        $v = get_post_meta($post_id, '_consultation_phone', true);
        echo $v ? esc_html($v) : '—';
    } elseif ($column === 'cf_cat') {
        $v = get_post_meta($post_id, '_consultation_category', true);
        echo $v ? esc_html($v) : '—';
    } elseif ($column === 'cf_slot') {
        $slot = trim(get_post_meta($post_id, '_consultation_pref_date', true) . ' ' . get_post_meta($post_id, '_consultation_pref_time', true));
        echo $slot ? esc_html($slot) : '—';
    }
}
add_action('manage_consultation_posts_custom_column', 'pjlaw_consultation_column_content', 10, 2);
