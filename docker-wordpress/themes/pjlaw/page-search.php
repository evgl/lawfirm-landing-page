<?php
/**
 * Search Page Template (통합검색)
 *
 * @package pjlaw
 */

if (!defined("ABSPATH")) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();

// Search keyword
$keyword = isset($_GET["s"]) ? sanitize_text_field(wp_unslash($_GET["s"])) : "";

/**
 * Highlight keyword within a string.
 */
function pjlaw_search_highlight($text, $keyword) {
    if (empty($keyword) || empty($text)) {
        return esc_html($text);
    }
    $escaped_text    = esc_html($text);
    $escaped_keyword = preg_quote(esc_html($keyword), "/");
    return preg_replace(
        "/(". $escaped_keyword . ")/ui",
        "<mark class=\"search-hl\">$1</mark>",
        $escaped_text
    );
}

$q_services = new WP_Query(["s" => $keyword, "post_type" => "pj_service", "posts_per_page" => 100, "post_status" => "publish"]);
$q_blog     = new WP_Query(["s" => $keyword, "post_type" => "pj_blog_post", "posts_per_page" => 100, "post_status" => "publish"]);
$q_cases    = new WP_Query(["s" => $keyword, "post_type" => "legal_case", "posts_per_page" => 100, "post_status" => "publish"]);
$q_careers  = new WP_Query(["s" => $keyword, "post_type" => "pj_career", "posts_per_page" => 100, "post_status" => "publish"]);

$count_services = $q_services->found_posts;
$count_blog     = $q_blog->found_posts;
$count_cases    = $q_cases->found_posts;
$count_careers  = $q_careers->found_posts;
$count_total    = $count_services + $count_blog + $count_cases + $count_careers;

$suggestions = ["일반형사","성범죄","경제지능","마약","음주, 교통","소년범죄","행정, 기업","민사, 가사"];
?>
<main id="main" class="site-main search-page" role="main">

<section class="search-hero">
    <div class="search-container">
        <h1 class="search-page-title">통합검색</h1>
    </div>
</section>

<section class="search-box-section">
    <div class="search-container">
        <div class="search-box-card">
            <div class="search-box-inner">
                <form role="search" action="<?php echo esc_url(home_url("/search/")); ?>" method="get" class="search-form">
                    <div class="search-input-wrap">
                        <input id="search-input" class="search-input" type="text" name="s"
                            value="<?php echo esc_attr($keyword); ?>"
                            placeholder="<?php esc_attr_e("검색어를 입력하세요", "pjlaw"); ?>"
                            autocomplete="off" />
                        <div class="search-input-actions">
                            <button type="button" class="search-clear-btn" id="search-clear-btn" aria-label="<?php esc_attr_e("검색어 지우기", "pjlaw"); ?>">
                                <img src="<?php echo esc_url($theme_uri . "/assets/images/search/icon-clear.svg"); ?>" alt="" width="28" height="28" />
                            </button>
                            <button type="submit" class="search-submit-btn" aria-label="<?php esc_attr_e("검색", "pjlaw"); ?>">
                                <img src="<?php echo esc_url($theme_uri . "/assets/images/search/icon-search.svg"); ?>" alt="" width="50" height="50" />
                            </button>
                        </div>
                    </div>
                </form>
                <div class="search-suggestions">
                    <span class="search-suggestions__label">추천 검색어</span>
                    <div class="search-suggestions__chips">
                        <?php foreach ($suggestions as $chip) : ?>
                        <a class="search-suggestion-chip" href="<?php echo esc_url(home_url("/search/?s=" . urlencode($chip))); ?>"><?php echo esc_html($chip); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($keyword)) : ?>
<div class="search-results-wrap">
    <div class="search-container">

        <p class="search-summary"><mark class="search-hl"><?php echo esc_html($keyword); ?></mark><?php echo esc_html(" 검색 결과 "); ?><mark class="search-hl"><?php echo esc_html($count_total); ?>건</mark><?php echo esc_html("이 검색되었습니다."); ?></p>

        <div class="search-tabs" role="tablist">
            <button class="search-tab search-tab--active" role="tab" data-target="all" aria-selected="true">전체 <?php echo esc_html($count_total); ?>건</button>
            <div class="search-tab-divider"></div>
            <button class="search-tab" role="tab" data-target="services" aria-selected="false">업무분야 <span class="search-tab__count"><?php echo esc_html($count_services); ?></span>건</button>
            <div class="search-tab-divider"></div>
            <button class="search-tab" role="tab" data-target="blog" aria-selected="false">블로그 <span class="search-tab__count"><?php echo esc_html($count_blog); ?></span>건</button>
            <div class="search-tab-divider"></div>
            <button class="search-tab" role="tab" data-target="cases" aria-selected="false">업무사례 <span class="search-tab__count"><?php echo esc_html($count_cases); ?></span>건</button>
            <div class="search-tab-divider"></div>
            <button class="search-tab" role="tab" data-target="careers" aria-selected="false">인재채용 <span class="search-tab__count"><?php echo esc_html($count_careers); ?></span>건</button>
        </div>

        <!-- 업무분야 -->
        <section class="search-section search-section--services" id="section-services">
            <div class="search-section__header">
                <h2 class="search-section__title">업무분야 (<mark class="search-hl"><?php echo esc_html($count_services); ?>건</mark>)</h2>
                <div class="search-section__divider"></div>
            </div>
            <?php if ($q_services->have_posts()) : ?>
            <div class="search-services-results">
                <?php
                $services_by_cat = [];
                while ($q_services->have_posts()) {
                    $q_services->the_post();
                    $post_id = get_the_ID();
                    $cats = get_the_terms($post_id, "pj_service_category");
                    $cat_key = ($cats && !is_wp_error($cats)) ? $cats[0]->name : "기타";
                    $services_by_cat[$cat_key][] = ["title" => get_the_title(), "link" => get_permalink()];
                }
                wp_reset_postdata();
                foreach ($services_by_cat as $cat_name => $items) : ?>
                <div class="search-service-group">
                    <h3 class="search-service-group__name"><?php echo esc_html($cat_name); ?></h3>
                    <div class="search-service-chips">
                        <?php foreach ($items as $item) : ?>
                        <a class="search-service-chip" href="<?php echo esc_url($item["link"]); ?>"><?php echo pjlaw_search_highlight($item["title"], $keyword); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else : ?><p class="search-no-results">업무분야 검색 결과가 없습니다.</p><?php endif; ?>
            <div class="search-section__separator"></div>
        </section>

        <!-- 블로그 -->
        <section class="search-section search-section--blog" id="section-blog">
            <div class="search-section__header">
                <h2 class="search-section__title">블로그 (<mark class="search-hl"><?php echo esc_html($count_blog); ?>건</mark>)</h2>
                <div class="search-section__divider"></div>
            </div>
            <?php if ($q_blog->have_posts()) : ?>
            <div class="search-blog-grid">
                <?php while ($q_blog->have_posts()) : $q_blog->the_post(); ?>
                <?php
                $post_id = get_the_ID();
                $tags    = get_the_terms($post_id, "pj_blog_tag");
                $thumb   = get_the_post_thumbnail_url($post_id, "case-thumbnail");
                $excerpt = get_the_excerpt();
                ?>
                <article class="search-blog-card">
                    <a href="<?php the_permalink(); ?>" class="search-blog-card__link">
                        <div class="search-blog-card__img-wrap">
                            <?php if ($thumb) : ?><img class="search-blog-card__img" src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" /><?php else : ?><div class="search-blog-card__img-placeholder"></div><?php endif; ?>
                        </div>
                        <div class="search-blog-card__body">
                            <?php if ($tags && !is_wp_error($tags)) : ?>
                            <div class="search-blog-card__tags">
                                <?php foreach (array_slice($tags, 0, 2) as $tag) : ?><span class="search-blog-tag"><?php echo esc_html($tag->name); ?></span><?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <div class="search-blog-card__copy">
                                <h3 class="search-blog-card__title"><?php echo pjlaw_search_highlight(get_the_title(), $keyword); ?></h3>
                                <p class="search-blog-card__excerpt"><?php echo pjlaw_search_highlight($excerpt, $keyword); ?></p>
                            </div>
                        </div>
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php else : ?><p class="search-no-results">블로그 검색 결과가 없습니다.</p><?php endif; ?>
            <div class="search-section__separator"></div>
        </section>

        <!-- 업무사례 -->
        <section class="search-section search-section--cases" id="section-cases">
            <div class="search-section__header">
                <h2 class="search-section__title">업무사례 (<mark class="search-hl"><?php echo esc_html($count_cases); ?>건</mark>)</h2>
                <div class="search-section__divider"></div>
            </div>
            <?php if ($q_cases->have_posts()) : ?>
            <div class="search-cases-grid">
                <?php while ($q_cases->have_posts()) : $q_cases->the_post(); ?>
                <?php
                $post_id   = get_the_ID();
                $area_tags = get_the_terms($post_id, "case_area");
                $thumb     = get_the_post_thumbnail_url($post_id, "case-thumbnail");
                $excerpt   = get_the_excerpt();
                ?>
                <article class="search-case-card">
                    <a href="<?php the_permalink(); ?>" class="search-case-card__link">
                        <?php if ($area_tags && !is_wp_error($area_tags)) : ?>
                        <div class="search-case-card__tags"><?php foreach (array_slice($area_tags, 0, 1) as $tag) : ?><span class="search-case-tag"><?php echo esc_html($tag->name); ?></span><?php endforeach; ?></div>
                        <?php endif; ?>
                        <div class="search-case-card__body">
                            <h3 class="search-case-card__title"><?php echo pjlaw_search_highlight(get_the_title(), $keyword); ?></h3>
                            <p class="search-case-card__excerpt"><?php echo pjlaw_search_highlight($excerpt, $keyword); ?></p>
                        </div>
                        <div class="search-case-card__img-wrap"><?php if ($thumb) : ?><img class="search-case-card__img" src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" /><?php else : ?><div class="search-case-card__img-placeholder"></div><?php endif; ?></div>
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php else : ?><p class="search-no-results">업무사례 검색 결과가 없습니다.</p><?php endif; ?>
            <div class="search-section__separator"></div>
        </section>

        <!-- 인재채용 -->
        <section class="search-section search-section--careers" id="section-careers">
            <div class="search-section__header">
                <h2 class="search-section__title">인재채용 (<mark class="search-hl"><?php echo esc_html($count_careers); ?>건</mark>)</h2>
                <div class="search-section__divider"></div>
            </div>
            <?php if ($q_careers->have_posts()) : ?>
            <div class="search-careers-grid">
                <?php while ($q_careers->have_posts()) : $q_careers->the_post(); ?>
                <?php
                $post_id      = get_the_ID();
                $deadline_raw = get_post_meta($post_id, "_career_deadline", true);
                $start_raw    = get_post_meta($post_id, "_career_start_date", true);
                $career_type  = get_post_meta($post_id, "_career_type", true) ?: "경력";
                $d_label = ""; $d_class = "search-career-dday--navy";
                if ($deadline_raw) {
                    $today = new DateTime("now", new DateTimeZone("Asia/Seoul"));
                    $deadline = new DateTime($deadline_raw, new DateTimeZone("Asia/Seoul"));
                    $diff = (int) $today->diff($deadline)->format("%r%a");
                    if ($diff === 0) { $d_label = "D-DAY"; $d_class = "search-career-dday--orange"; }
                    elseif ($diff > 0) { $d_label = "D-" . $diff; }
                    else { $d_label = "마감"; $d_class = "search-career-dday--gray"; }
                }
                $date_range = "";
                if ($start_raw && $deadline_raw) {
                    $date_range = date_i18n("Y. m. d", strtotime($start_raw)) . " ~ " . date_i18n("Y. m. d", strtotime($deadline_raw));
                }
                ?>
                <article class="search-career-card">
                    <a href="<?php the_permalink(); ?>" class="search-career-card__link">
                        <div class="search-career-card__inner">
                            <div class="search-career-card__top">
                                <div class="search-career-card__badges">
                                    <?php if ($d_label) : ?><span class="search-career-dday <?php echo esc_attr($d_class); ?>"><?php echo esc_html($d_label); ?></span><?php endif; ?>
                                    <span class="search-career-type"><?php echo esc_html($career_type); ?></span>
                                </div>
                                <button type="button" class="search-career-share" aria-label="공유" onclick="event.preventDefault();event.stopPropagation();">
                                    <img src="<?php echo esc_url($theme_uri . "/assets/images/search/icon-share.svg"); ?>" alt="" width="44" height="44" />
                                </button>
                            </div>
                            <div class="search-career-card__copy">
                                <h3 class="search-career-card__title"><?php echo pjlaw_search_highlight(get_the_title(), $keyword); ?></h3>
                                <?php if ($date_range) : ?>
                                <div class="search-career-card__date">
                                    <img src="<?php echo esc_url($theme_uri . "/assets/images/search/icon-calendar.svg"); ?>" alt="" width="15" height="16" />
                                    <span><?php echo esc_html($date_range); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php else : ?><p class="search-no-results">인재채용 검색 결과가 없습니다.</p><?php endif; ?>
        </section>

    </div>
</div>
<?php else : ?>
<div class="search-empty-state"><div class="search-container"><p class="search-empty-state__text">검색어를 입력해 주세요.</p></div></div>
<?php endif; ?>

<footer class="footer about-footer" role="contentinfo">
    <div class="footer-bottom about-footer__bottom">
        <div class="container">
            <div class="footer-legal">
                <div class="legal-top">
                    <a href="<?php echo esc_url(home_url("/directions/")); ?>">오시는길</a>
                    <span class="divider"></span>
                    <a href="<?php echo esc_url(home_url("/privacy/")); ?>" class="bold">개인정보처리방침</a>
                </div>
                <div class="legal-separator"></div>
                <div class="legal-bottom">
                    <div class="legal-info">
                        <p>서울특별시 강남구 테헤란로 238, 마크로젠빌딩 12층&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel : 02-554-5674</p>
                        <p class="copyright">Copyright &copy; Pyeongjeong. All Rights Reserved</p>
                    </div>
                    <div class="footer-logo-wrap">
                        <img src="<?php echo esc_url($theme_uri . "/assets/images/about/footer-logo.png"); ?>" alt="법률사무소 평정" class="footer-logo" />
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="scroll-top"><img src="<?php echo esc_url($theme_uri . "/assets/images/home/scroll-top.svg"); ?>" alt="Top" /></a>
    </div>
</footer>

<?php pjlaw_render_quick_actions_menu(); ?>
</main>

<script>
(function(){
    var tabs=document.querySelectorAll(".search-tab");
    var allSecs=document.querySelectorAll(".search-section");
    var sectionMap={services:document.getElementById("section-services"),blog:document.getElementById("section-blog"),cases:document.getElementById("section-cases"),careers:document.getElementById("section-careers")};
    tabs.forEach(function(tab){
        tab.addEventListener("click",function(){
            var target=this.getAttribute("data-target");
            tabs.forEach(function(t){t.classList.remove("search-tab--active");t.setAttribute("aria-selected","false");});
            this.classList.add("search-tab--active");this.setAttribute("aria-selected","true");
            if(target==="all"){allSecs.forEach(function(s){if(s)s.style.display="";});}
            else{allSecs.forEach(function(s){if(s)s.style.display="none";});var show=sectionMap[target];if(show)show.style.display="";}
        });
    });
    var cb=document.getElementById("search-clear-btn");var inp=document.getElementById("search-input");
    if(cb&&inp){cb.addEventListener("click",function(){inp.value="";inp.focus();});}
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
