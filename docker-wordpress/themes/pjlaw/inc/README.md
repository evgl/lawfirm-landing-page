# `inc/` — Theme Module Files

This folder contains the admin-managed content infrastructure for the PyeongJeong Law WordPress theme. It powers four features — **Blog** (`pj_blog_post`), **Careers** (`pj_career`), **Cases** (`legal_case`), and **Team** (`pj_team`) — and handles:
- Admin UI (meta boxes) for editing each content type
- One-shot sample/migration data seeding
- Content population for blog articles

Each feature follows the same pattern: a `*-meta-boxes.php` file (admin UI, auto-loaded) and a `*-seed.php` file (one-shot data seed, auto-run once). The custom post types, taxonomies, taxonomy term seeds, and admin list columns for all three live in `../functions.php`.

---

## Blog files

### `blog-meta-boxes.php`

**Purpose:** Defines the WordPress admin interface for editing `pj_blog_post` metadata.

**What it provides:**
- **Hero Section** — custom hero image URL and title override for blog posts
- **Intro Section** — subtitle and introductory text
- **FAQ** — dynamic list of frequently asked questions (add/remove via JavaScript)
- **Related Content** — comma-separated post IDs to link to related strategies, cases, and articles

**How it runs:** Automatically loaded by WordPress via `functions.php`.

**When to use:** No manual action required. This file activates automatically whenever someone opens the WordPress admin editor for a blog post. All metadata is saved with proper sanitization and nonce verification.

---

### `blog-seed.php`

**Purpose:** Creates sample blog posts on initial theme activation.

**What it provides:**
- Pre-populated `pj_blog_post` entries with titles, excerpts, tags, and featured images
- Automatic setup so the blog page has content to display from day one
- Idempotent — runs only once via the `pjlaw_blog_seeded` WordPress option

**How it runs:** Automatically on first WordPress page load after theme activation (hooks into WordPress `init`).

**When to use:** No manual action required. The sample posts are created automatically the first time you start the WordPress site. To reset and re-run, delete the `pjlaw_blog_seeded` option (see Common Tasks).

---

### `blog-content-seed-content.php`

**Purpose:** Populates the article content (body HTML) for the sample blog posts created by `blog-seed.php`.

**What it provides:**
- Full HTML article text on Korean camera crime law (카메라등이용촬영죄)
- 4 chapters plus conclusion with legal references, checklists, and Q&A
- Theme asset URLs resolved using `get_template_directory_uri()`

**How it runs:** **Manual WP-CLI command only** — this file is NOT auto-loaded.

**When to use:** Run once after `blog-seed.php` has created the posts:

```bash
cd docker-wordpress
docker compose exec wordpress wp --allow-root eval-file wp-content/themes/pjlaw/inc/blog-content-seed-content.php
```

This populates the `post_content` field for the seeded posts so `single-pj_blog_post.php` renders the full article on detail pages.

---

### `blog-content-fill.php`

**Purpose:** Bulk-creates or updates all 10 sample `pj_blog_post` entries with full structured content (HTML post body, metadata, and category assignments).

**What it provides:**
- Full `post_content` HTML for all 10 blog articles on Korean legal topics (졸피뎀 / 음주운전 / 무면허사고 / 특경법 / 강제추행 / 사기죄 / 명예훼손 고소 / 횡령/배임 / 폭행/상해 / and one more)
- Intro section metadata (`_intro_subtitle`, `_intro_text`)
- FAQ section metadata (`_faq`)
- Category taxonomy assignments for each post
- Idempotent — checks post title before inserting; re-running updates existing posts in place without duplication

**How it runs:** **Manual WP-CLI command only** — this file is NOT auto-loaded.

**When to use:** Run once after `blog-seed.php` has created the posts:

```bash
cd docker-wordpress
docker compose exec wordpress wp --allow-root eval-file wp-content/themes/pjlaw/inc/blog-content-fill.php
```

This differs from `blog-content-seed-content.php` (which fills only a single sample post) — use this script to populate all 10 blog posts with their complete, distinct Korean legal content. Re-running is safe.

---

## Careers files

### `career-meta-boxes.php`

**Purpose:** Defines the WordPress admin interface for editing `pj_career` (채용) postings.

**What it provides:**
- **채용 정보** — employment type (경력 / 신입·인턴), application start/end dates, position subtitle, 분야 / 직급 / 근무지역
- **상세 섹션** — a flexible repeater of detail sections, each a heading plus a bullet list (one bullet per line; `<strong>` allowed). Drives the single posting page.

**How it runs:** Automatically loaded by WordPress via `functions.php`. Saves with nonce verification and sanitization on `save_post_pj_career`.

**When to use:** No manual action required. Open WordPress admin → **채용** → edit a posting to see the boxes.

---

### `career-seed.php`

**Purpose:** One-shot migration of the formerly hardcoded job postings into the `pj_career` post type.

**What it provides:**
- Several pre-populated postings (incl. the full `[강남구] 법률사무소 상담실장님` posting with all detail sections), each assigned a `pj_career_category` (부문) term plus meta
- Idempotent — runs only once via the `pjlaw_careers_seeded` WordPress option

**How it runs:** Automatically on `init` (priority 20) on first page load.

**When to use:** No manual action required.

> **Important (Careers only):** per-posting single pages live at `/careers/post/<slug>/`. For these to resolve you must have **pretty permalinks enabled** (`/%postname%/`) and the **rewrite rules flushed** after the CPT is registered. See "First-time setup" below.

---

## Cases files

### `case-meta-boxes.php`

**Purpose:** Defines the WordPress admin interface for editing `legal_case` (업무사례) entries.

**What it provides:**
- **사례 정보** — 결과 배지 (e.g. 승소) and the 라벨 오버레이 image selector (`seungso` / `kisooyue`, the corner result badge PNG)

The remaining card fields use native WordPress: **title** = post title, **desc** = the excerpt, **분야** = the `pj_case_category` taxonomy box, and the **card image** = the post's Featured Image (대표 이미지; falls back to `assets/images/cases/case-base.jpg` when none is set).

**How it runs:** Automatically loaded by WordPress via `functions.php`. Saves with nonce verification and sanitization on `save_post_legal_case`.

**When to use:** No manual action required. Open WordPress admin → **업무사례** → edit a case.

---

### `case-seed.php`

**Purpose:** One-shot migration of the 6 formerly hardcoded case entries into the `legal_case` post type.

**What it provides:**
- 6 pre-populated cases, each assigned a `pj_case_category` term (whose **slug** is the English `data-type` tab-filter key) plus `_pj_case_badge` / `_pj_case_label` meta and the description as the excerpt
- Idempotent — runs only once via the `pjlaw_cases_seeded` WordPress option

**How it runs:** Automatically on `init` (priority 20) on first page load.

**When to use:** No manual action required.

> **Important (Cases, like Careers):** case cards are clickable and per-case single pages live at `/cases/post/<slug>/` (`single-legal_case.php`, body = the WP editor content). For these to resolve you must have **pretty permalinks enabled** and the **rewrite rules flushed** after the CPT is registered (see "First-time setup"). The `/cases/` list itself renders via the theme's `template_include` routing and does not require a flush.

---

## Case Reviews files

### `case-review-meta-boxes.php`

**Purpose:** Defines the WordPress admin interface for editing `pj_case_review` (고객후기) post metadata.

**What it provides:**
- **후기 정보** — review tag label (e.g. "이혼소송후기"), lawyer name, and optional lawyer avatar URL

**How it runs:** Automatically loaded by WordPress via `functions.php`.

**When to use:** No manual action required. This file activates automatically whenever someone opens the WordPress admin editor for a case review post.

---

### `case-review-seed.php`

**Purpose:** Creates sample case review posts on initial theme activation.

**What it provides:**
- Pre-populated `pj_case_review` entries (4 client testimonials) with client quotes as excerpts, review tags, lawyer names, and featured images from `assets/images/home/case-N.png`
- Automatic setup so the homepage has review content to display from day one
- Idempotent — runs only once via the `pjlaw_case_reviews_seeded` WordPress option

**How it runs:** Automatically on first WordPress page load after theme activation (hooks into WordPress `init` at priority 20).

**When to use:** No manual action required. The sample reviews are created automatically the first time you start the WordPress site. To reset and re-run, delete the `pjlaw_case_reviews_seeded` option (see Common Tasks).

---

## Team files

### `team-meta-boxes.php`

**Purpose:** Defines the WordPress admin interface for editing `pj_team` (구성원) members.

**What it provides:**
- **구성원 정보** — 직위(role), 상세 페이지 타이틀(tagline), 전문분야(card overlay list), 태그(card list)
- **업무분야** — a repeater of practice fields, each a 분야명 plus a tag list (one tag per line). Reuses the careers "상세 섹션" repeater pattern.
- **구성원 상세** — 대표경력 / 학력 / 경력 / 주요실적, each a newline list (fixed headings; the detail design renders a specific icon per section)
- **업무사례 선택** — checkbox list of published `legal_case` posts shown on the member's 업무사례 tab

The member **photo** is the post's **Featured Image** (대표 이미지; falls back to `assets/images/team/member-1.png`). The member **name** is the post title.

**How it runs:** Automatically loaded by WordPress via `functions.php`. Saves with nonce verification and sanitization on `save_post_pj_team`.

**When to use:** No manual action required. Open WordPress admin → **구성원** → edit a member.

---

### `team-seed.php`

**Purpose:** One-shot migration of the formerly hardcoded team members (이시완, 공선영) into the `pj_team` post type, with the full member detail (대표경력 / 업무분야 / 학력 / 경력 / 주요실적) and a sample 업무사례 selection.

**What it provides:**
- Two pre-populated members with all meta, plus a best-effort Featured Image sideloaded from the theme's `member-1.png` / `member-2.png` assets
- Idempotent — runs only once via the `pjlaw_team_seeded` WordPress option

**How it runs:** Automatically on `init` (priority 20) on first page load.

**When to use:** No manual action required.

> **Important (Team, like Careers):** per-member single pages live at `/team/member/<slug>/`. For these to resolve you must have **pretty permalinks enabled** and the **rewrite rules flushed** after the CPT is registered (see "First-time setup"). The `/team/` list itself renders via the theme's `template_include` routing and does not require a flush.

---

## Services files

### `service-meta-boxes.php`

**Purpose:** Defines the WordPress admin interface for editing `pj_service` (업무분야) post metadata.

**What it provides:**
- **일반 정보** — optional page H1 title override (`_pj_service_main_title`)
- **상세 카드** — repeater of content cards; each card has a heading, content, optional table title, table data (pipe-delimited rows), and laws data (blocks separated by `---`). Add/remove cards via inline JavaScript UI.
- **맺음말 섹션** — closing section title and content
- **관련 콘텐츠** — comma-separated related post IDs for manually pinned strategies, cases, and other content

**How it runs:** Automatically loaded by WordPress via `functions.php`.

**When to use:** No manual action required. Open WordPress admin → **업무분야** → edit a service to see the boxes.

---

### `service-seed.php`

**Purpose:** One-shot migration that populates the `pj_service` custom post type with initial service posts and updates practice area category descriptions.

**What it provides:**
- Updates descriptions for 7 `pj_service_category` terms (civil, criminal, sexual, divorce, inheritance, realestate, corporate)
- Creates 1 fully-detailed service post (명예훼손 / defamation) with all meta boxes populated
- Creates ~35 skeleton service posts spread across all 7 categories, each ready to be edited in the admin
- Idempotent — runs only once via the `pjlaw_services_seeded` WordPress option

**How it runs:** Automatically on `init` (priority 20) on first page load.

**When to use:** No manual action required.

---

## Consultation files

### `consultation-meta-boxes.php`

**Purpose:** Provides a read-only admin view and custom columns for `consultation` (상담) submissions captured by the frontend booking form.

**What it provides:**
- **상담 신청 내용** — read-only meta box displaying all 14 consultation fields (name, phone, email, etc.) in an HTML table
- Custom admin list columns: 신청자 (name), 연락처 (phone), 분야 (category), 희망일시 (preferred date/time)

**How it runs:** Automatically loaded by WordPress via `functions.php`. No save handler — these are display-only registrations.

**When to use:** No manual action required. Open WordPress admin → **상담** to view all consultation submissions.

---

### `consultation-settings.php`

**Purpose:** Provides staff-configurable email notification settings for new consultation bookings and sends HTML notifications via the Resend API.

**What it provides:**
- **알림 설정** — submenu page under the consultation post type where staff can toggle notifications on/off and set the recipient email
- Settings API integration: `pjlaw_consultation_notify_enabled` (checkbox, default on) and `pjlaw_consultation_notify_to` (email, default admin email)
- `pjlaw_send_consultation_notification($post_id)` — callable function (not self-hooked) that reads the Resend API key from `<theme>/.env/API-KEYS` (INI format), builds an HTML email from all consultation meta, and POSTs to Resend. Called externally by the AJAX handler that creates consultation posts.

**How it runs:** Settings page and API registration auto-load via `admin_menu` and `admin_init` hooks. The mailer function must be called from wherever consultation posts are created (e.g., the AJAX handler).

**When to use:** No manual action required for display. Staff configure notification settings in WordPress admin → **상담** → **알림 설정**.

---

## Execution Order

Everything except the blog content seed runs **automatically** on page load — you normally do nothing. The order WordPress applies on a fresh database:

| Step | File / Action | Type | When |
|------|---------------|------|------|
| 1 | Register CPTs + taxonomies + seed taxonomy terms (`functions.php`) | Automatic | Every `init` |
| 2 | `blog-seed.php`, `career-seed.php`, `case-seed.php`, `case-review-seed.php`, `service-seed.php` | Automatic (once each) | First page load after activation |
| 3 | `*-meta-boxes.php` (blog / career / case / case-review / service / consultation) | Automatic | Always available when editing in WP admin |
| 4 | **Flush rewrite rules** (Careers / Cases / Team single pages) | Manual, once | After CPTs exist, if `/careers/post/...`, `/cases/post/...`, or `/team/member/...` 404s |
| 5a | `blog-content-seed-content.php` | Manual WP-CLI | After step 2 (fills one sample post; deprecated) |
| 5b | `blog-content-fill.php` | Manual WP-CLI | After step 2 (fills all 10 blog posts with distinct content) |

**Dependencies:** Steps 5a and 5b depend on the blog seed (step 2). Step 4 is needed for the single-posting URLs of Careers (`/careers/post/...`), Cases (`/cases/post/...`), and Team (`/team/member/...`); the list pages (Blog, Careers, Cases, Team, Careers-all) render via the theme's `template_include` routing and do not require it. Step 5b (`blog-content-fill.php`) is the primary method for populating all 10 blog posts with complete content; step 5a is a legacy alternative for single-post fills.

### First-time setup (fresh DB or after a DB reset)

```bash
cd docker-wordpress

# 1. Ensure pretty permalinks are on and rewrite rules are flushed
#    (required for /careers/post/<slug>/ single pages to resolve)
docker compose exec wordpress wp --allow-root rewrite structure '/%postname%/'
docker compose exec wordpress wp --allow-root rewrite flush --hard

# 2. (Blog only) populate the sample article bodies
docker compose exec wordpress wp --allow-root eval-file wp-content/themes/pjlaw/inc/blog-content-seed-content.php
```

> If WP-CLI (`wp`) is not installed in the container, run the equivalent inside a bootstrapped PHP process instead, e.g.:
> ```bash
> docker compose exec wordpress php -r 'require("/var/www/html/wp-load.php"); update_option("permalink_structure","/%postname%/"); flush_rewrite_rules(true);'
> ```

---

## Common Tasks

**To edit content metadata in the admin:**
- Blog: WP admin → **블로그** → edit a post (boxes from `blog-meta-boxes.php`)
- Careers: WP admin → **채용** → edit a posting (boxes from `career-meta-boxes.php`)
- Cases: WP admin → **업무사례** → edit a case (box from `case-meta-boxes.php` + Featured Image + 분야 taxonomy)
- Team: WP admin → **구성원** → edit a member (boxes from `team-meta-boxes.php` + Featured Image)

**To reset and re-run a seed** (deletes the guard option; data is recreated on next page load):
```bash
docker compose exec wordpress wp --allow-root option delete pjlaw_blog_seeded
docker compose exec wordpress wp --allow-root option delete pjlaw_careers_seeded
docker compose exec wordpress wp --allow-root option delete pjlaw_cases_seeded
docker compose exec wordpress wp --allow-root option delete pjlaw_team_seeded
docker compose exec wordpress wp --allow-root option delete pjlaw_case_reviews_seeded
docker compose exec wordpress wp --allow-root option delete pjlaw_services_seeded
```

**To check seeded content exists:**
```bash
docker compose exec wordpress wp --allow-root post list --post_type=pj_blog_post
docker compose exec wordpress wp --allow-root post list --post_type=pj_career
docker compose exec wordpress wp --allow-root post list --post_type=legal_case
docker compose exec wordpress wp --allow-root post list --post_type=pj_team
docker compose exec wordpress wp --allow-root post list --post_type=pj_case_review
docker compose exec wordpress wp --allow-root post list --post_type=pj_service
```

**To repopulate blog article content (all 10 posts):**
```bash
cd docker-wordpress
docker compose exec wordpress wp --allow-root eval-file wp-content/themes/pjlaw/inc/blog-content-fill.php
```

This is the primary method for populating all 10 blog posts with complete content. Re-running is safe — existing posts are updated in place.

**To repopulate a single blog post content (legacy method):**
```bash
cd docker-wordpress
docker compose exec wordpress wp --allow-root eval-file wp-content/themes/pjlaw/inc/blog-content-seed-content.php
```

> **Note:** the seed files create posts only when their guard option is absent **and** no post with the same title already exists, so re-running them will not duplicate content.
