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

## Execution Order

Everything except the blog content seed runs **automatically** on page load — you normally do nothing. The order WordPress applies on a fresh database:

| Step | File / Action | Type | When |
|------|---------------|------|------|
| 1 | Register CPTs + taxonomies + seed taxonomy terms (`functions.php`) | Automatic | Every `init` |
| 2 | `blog-seed.php`, `career-seed.php`, `case-seed.php` | Automatic (once each) | First page load after activation |
| 3 | `*-meta-boxes.php` (blog / career / case) | Automatic | Always available when editing in WP admin |
| 4 | **Flush rewrite rules** (Careers / Cases / Team single pages) | Manual, once | After CPTs exist, if `/careers/post/...`, `/cases/post/...`, or `/team/member/...` 404s |
| 5 | `blog-content-seed-content.php` | Manual WP-CLI | After step 2 (blog only) |

**Dependencies:** Step 5 depends on the blog seed (step 2). Step 4 is needed for the single-posting URLs of Careers (`/careers/post/...`), Cases (`/cases/post/...`), and Team (`/team/member/...`); the list pages (Blog, Careers, Cases, Team, Careers-all) render via the theme's `template_include` routing and do not require it.

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
```

**To check seeded content exists:**
```bash
docker compose exec wordpress wp --allow-root post list --post_type=pj_blog_post
docker compose exec wordpress wp --allow-root post list --post_type=pj_career
docker compose exec wordpress wp --allow-root post list --post_type=legal_case
docker compose exec wordpress wp --allow-root post list --post_type=pj_team
```

**To repopulate blog article content:**
```bash
cd docker-wordpress
docker compose exec wordpress wp --allow-root eval-file wp-content/themes/pjlaw/inc/blog-content-seed-content.php
```

> **Note:** the seed files create posts only when their guard option is absent **and** no post with the same title already exists, so re-running them will not duplicate content.
