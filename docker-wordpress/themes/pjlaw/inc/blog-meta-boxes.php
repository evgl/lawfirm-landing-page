<?php
if (!defined('ABSPATH')) exit;

function pjlaw_blog_add_meta_boxes() {
    add_meta_box('pj_blog_hero', '히어로 섹션', 'pjlaw_blog_hero_cb', 'pj_blog_post', 'normal', 'high');
    add_meta_box('pj_blog_intro', '인트로 섹션', 'pjlaw_blog_intro_cb', 'pj_blog_post', 'normal', 'high');
    add_meta_box('pj_blog_faq', 'FAQ', 'pjlaw_blog_faq_cb', 'pj_blog_post', 'normal', 'default');
    add_meta_box('pj_blog_related', '관련 콘텐츠', 'pjlaw_blog_related_cb', 'pj_blog_post', 'side', 'default');
}
add_action('add_meta_boxes', 'pjlaw_blog_add_meta_boxes');

function pjlaw_blog_hero_cb($post) {
    wp_nonce_field('pjlaw_blog_meta', 'pjlaw_blog_nonce');
    $hero_image = get_post_meta($post->ID, '_pj_blog_hero_image', true);
    $hero_title = get_post_meta($post->ID, '_pj_blog_hero_title', true);
    ?>
    <p>
        <label><?php esc_html_e('히어로 이미지 URL (선택, 기본: 대표 이미지)', 'pjlaw'); ?></label><br>
        <input type="url" name="pj_blog_hero_image" value="<?php echo esc_attr($hero_image); ?>" style="width:100%">
    </p>
    <p>
        <label><?php esc_html_e('히어로 제목 override (선택, 기본: 글 제목)', 'pjlaw'); ?></label><br>
        <input type="text" name="pj_blog_hero_title" value="<?php echo esc_attr($hero_title); ?>" style="width:100%">
    </p>
    <?php
}

function pjlaw_blog_intro_cb($post) {
    $subtitle = get_post_meta($post->ID, '_pj_blog_intro_subtitle', true);
    $text     = get_post_meta($post->ID, '_pj_blog_intro_text', true);
    ?>
    <p>
        <label><?php esc_html_e('소제목', 'pjlaw'); ?></label><br>
        <input type="text" name="pj_blog_intro_subtitle" value="<?php echo esc_attr($subtitle); ?>" style="width:100%">
    </p>
    <p>
        <label><?php esc_html_e('인트로 텍스트', 'pjlaw'); ?></label><br>
        <textarea name="pj_blog_intro_text" rows="4" style="width:100%"><?php echo esc_textarea($text); ?></textarea>
    </p>
    <?php
}

function pjlaw_blog_faq_cb($post) {
    $faqs = get_post_meta($post->ID, '_pj_blog_faq', true);
    if (!is_array($faqs)) $faqs = array();
    ?>
    <div id="pj-faq-list">
    <?php foreach ($faqs as $i => $faq) : ?>
        <div class="pj-faq-row" style="margin-bottom:8px">
            <input type="text" name="pj_blog_faq[<?php echo $i; ?>][question]" value="<?php echo esc_attr($faq['question']); ?>" placeholder="질문" style="width:85%">
            <button type="button" class="button pj-faq-remove"><?php esc_html_e('삭제', 'pjlaw'); ?></button>
        </div>
    <?php endforeach; ?>
    </div>
    <button type="button" class="button" id="pj-faq-add"><?php esc_html_e('+ 질문 추가', 'pjlaw'); ?></button>
    <script>
    (function(){
        var list = document.getElementById('pj-faq-list');
        var idx = <?php echo count($faqs); ?>;
        document.getElementById('pj-faq-add').addEventListener('click', function(){
            var row = document.createElement('div');
            row.className = 'pj-faq-row';
            row.style.marginBottom = '8px';
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'pj_blog_faq[' + idx + '][question]';
            input.placeholder = '질문';
            input.style.width = '85%';
            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'button pj-faq-remove';
            btn.textContent = '삭제';
            row.appendChild(input);
            row.appendChild(document.createTextNode(' '));
            row.appendChild(btn);
            list.appendChild(row);
            idx++;
        });
        list.addEventListener('click', function(e){
            if (e.target.classList.contains('pj-faq-remove')) {
                e.target.parentNode.remove();
            }
        });
    })();
    </script>
    <?php
}

function pjlaw_blog_related_cb($post) {
    $strategies = get_post_meta($post->ID, '_pj_blog_related_strategies', true);
    $cases      = get_post_meta($post->ID, '_pj_blog_related_cases', true);
    $articles   = get_post_meta($post->ID, '_pj_blog_related_articles', true);
    ?>
    <p><label><?php esc_html_e('관련 전략 (글 ID, 쉼표 구분)', 'pjlaw'); ?></label><br>
    <input type="text" name="pj_blog_related_strategies" value="<?php echo esc_attr($strategies); ?>" style="width:100%"></p>
    <p><label><?php esc_html_e('관련 사례 (글 ID, 쉼표 구분)', 'pjlaw'); ?></label><br>
    <input type="text" name="pj_blog_related_cases" value="<?php echo esc_attr($cases); ?>" style="width:100%"></p>
    <p><label><?php esc_html_e('관련 아티클 (글 ID, 쉼표 구분)', 'pjlaw'); ?></label><br>
    <input type="text" name="pj_blog_related_articles" value="<?php echo esc_attr($articles); ?>" style="width:100%"></p>
    <?php
}

function pjlaw_blog_save_meta($post_id) {
    if (!isset($_POST['pjlaw_blog_nonce']) || !wp_verify_nonce($_POST['pjlaw_blog_nonce'], 'pjlaw_blog_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = array(
        '_pj_blog_hero_image'        => array('key' => 'pj_blog_hero_image',        'cb' => 'esc_url_raw'),
        '_pj_blog_hero_title'        => array('key' => 'pj_blog_hero_title',        'cb' => 'sanitize_text_field'),
        '_pj_blog_intro_subtitle'    => array('key' => 'pj_blog_intro_subtitle',    'cb' => 'sanitize_text_field'),
        '_pj_blog_intro_text'        => array('key' => 'pj_blog_intro_text',        'cb' => 'sanitize_textarea_field'),
        '_pj_blog_related_strategies'=> array('key' => 'pj_blog_related_strategies','cb' => 'sanitize_text_field'),
        '_pj_blog_related_cases'     => array('key' => 'pj_blog_related_cases',     'cb' => 'sanitize_text_field'),
        '_pj_blog_related_articles'  => array('key' => 'pj_blog_related_articles',  'cb' => 'sanitize_text_field'),
    );

    foreach ($fields as $meta_key => $field) {
        if (isset($_POST[$field['key']])) {
            update_post_meta($post_id, $meta_key, call_user_func($field['cb'], $_POST[$field['key']]));
        }
    }

    if (isset($_POST['pj_blog_faq']) && is_array($_POST['pj_blog_faq'])) {
        $faqs = array();
        foreach ($_POST['pj_blog_faq'] as $item) {
            $q = sanitize_text_field($item['question'] ?? '');
            if ($q !== '') $faqs[] = array('question' => $q);
        }
        update_post_meta($post_id, '_pj_blog_faq', $faqs);
    } else {
        update_post_meta($post_id, '_pj_blog_faq', array());
    }
}
add_action('save_post_pj_blog_post', 'pjlaw_blog_save_meta');
