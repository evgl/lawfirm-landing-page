# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

WordPress landing page for PyeongJeong Law Firm (Korean), developed locally via Docker. All real work happens inside the custom `pjlaw` theme — there is no JS build pipeline, no package manager, and no test suite. Edits to PHP/CSS/JS files in the theme directory are reflected immediately because the host folder is bind-mounted into the WordPress container.

# Standard Development Workflow

## Required Process for All Coding Tasks

### 1. Initial Analysis & Planning
- **Think through the problem** thoroughly before starting
- **Read the codebase** to understand relevant files and context
- Break down complex tasks into simple, manageable steps

### 2. Task List Requirements
- Create a **numbered todo list** that can be checked off as items are completed
- Each task should be **specific and actionable**
- Tasks should have **minimal impact** on the codebase
- Prioritize **simplicity** over complexity in every task

### 3. Plan Verification
- **Always check in with the user** before beginning work
- Present the plan and wait for **user verification/approval**
- Make adjustments to the plan if requested

### 4. Implementation Process
- Work through **todo items sequentially**
- **Mark items as complete** as you finish them sequentially
- Provide **high-level explanations** of changes made at each step
- Focus on **incremental progress** rather than large changes

### 5. Code Change Principles
- Make every change **as simple as possible**
- **Minimize code impact** - affect as few files/lines as possible
- Avoid **massive or complex changes**
- Prioritize **clarity and maintainability**

### 6. Documentation & Review
- Add a **review section** to the task file when complete
- Include a **summary of all changes made**
- Note any **relevant information** for future reference

### 7. DO NOT BE LAZY. 
- NEVER BE LAZY. IF THERE IS A BUG FIND THE ROOT CAUSE AND FIX IT. NO TEMPORARY FIXES. YOU ARE A SENIOR DEVELOPER. NEVER BE LAZY

### 8. MAKE ALL FIXES AND CODE CHANGES SIMPLE 
- MAKE ALL FIXES AND CODE CHANGES AS SIMPLE AS HUMANLY POSSIBLE. THEY SHOULD ONLY IMPACT NECESSARY CODE RELEVANT TO THE TASK AND NOTHING ELSE. IT SHOULD IMPACT AS LITTLE CODE AS POSSIBLE. YOUR GOAL IS TO NOT INTRODUCE ANY BUGS. IT'S ALL ABOUT SIMPLICITY

### 9. Confidence for making changes
- Do not make any changes, until you have 95% confidence that you know what to build ask me follow up questions until you have that confidence

### 10. Frontend Design & Components
- When building web components, pages, or applications, use the **@frontend-design skill**
- Use for creating distinctive, production-grade frontend interfaces
- Applies to design work, UI/UX development, and component creation


## Key Principles
- **Simplicity first** - every change should be as minimal as possible
- **Plan before code** - never start coding without a clear plan
- **Incremental progress** - small steps, constant verification
- **Clear communication** - explain what you're doing at each step

## Local Development

The Docker stack lives in `docker-wordpress/`. Run all `docker compose` commands from that directory.

```bash
cd docker-wordpress
docker compose up -d            # start wordpress + mysql + phpmyadmin
docker compose down             # stop stack (volumes persist)
docker compose logs -f wordpress
```

Endpoints:
- WordPress site: `http://localhost:8082`
- phpMyAdmin: `http://localhost:8083` (user: `wordpress`, password: `wordpress_password`)

Host → container volume mounts (see `docker-wordpress/docker-compose.yml`):
- `./themes` → `/var/www/html/wp-content/themes` — edit files here directly
- `./plugins` → `/var/www/html/wp-content/plugins`
- `./uploads` → `/var/www/html/wp-content/uploads`

`docker-wordpress/plugins/`, `docker-wordpress/uploads/`, and the bundled `twentytwenty*` themes are gitignored — only the `pjlaw` theme is tracked.

### Running WP-CLI / one-off commands

The repo uses WP-CLI inside the container for tasks like seeding blog posts:

```bash
docker compose exec wordpress wp --allow-root <command>
```

## Theme Architecture (`docker-wordpress/themes/pjlaw/`)

### Routing model — important

The site does **not** use real WordPress Pages for most routes. Instead, `functions.php` registers a `template_include` filter (`pjlaw_template_include`, around line 179) that inspects `$_SERVER['REQUEST_URI']` and forces a specific template based on the URL path (`/about`, `/team` → `page-team.php`, `/team/member/<slug>` → `single-pj_team.php`, `/services`, `/consultation`, `/directions`, `/why-pjlaw`, etc.).

Implication: adding a new top-level page typically means **both** creating `page-<name>.php` **and** adding a new branch to `pjlaw_template_include`. Pretty permalinks must be enabled in WordPress settings for these paths to resolve.

`front-page.php` is the homepage; `single-pj_blog_post.php` handles single blog posts via the standard WP template hierarchy.

### Custom post types and taxonomies

Registered in `functions.php`:
- `legal_case` — case studies (업무사례); list at `/cases/` (`page-cases.php`), clickable cards → single at `/cases/post/<slug>/` (`single-legal_case.php`, body from the WP editor). Admin UI + seed in `inc/case-meta-boxes.php` / `inc/case-seed.php`.
- `consultation` — submissions captured by the AJAX consultation form (not public)
- `pj_blog_post` — the blog content type used by `page-blog.php` and `single-pj_blog_post.php`
- `pj_career` — job postings; list at `/careers/`, single at `/careers/post/<slug>/` (`single-pj_career.php`)
- `pj_service` — practice areas (업무분야)
- `pj_team` — team members (구성원); list at `/team/` (`page-team.php`), single at `/team/member/<slug>/` (`single-pj_team.php`). Admin UI + seed in `inc/team-meta-boxes.php` / `inc/team-seed.php`; photo = Featured Image. Adding/removing members is done entirely in WP admin → **구성원** (no hardcoded data in the templates).

Blog taxonomies (`pjlaw_register_blog_taxonomies`):
- `pj_blog_category`, `pj_blog_service`, `pj_blog_tag`

The `pj_blog_service` terms are **auto-seeded on every `init`** by `pjlaw_seed_blog_terms()` from a hardcoded array. Manual DB edits to that taxonomy will be reverted on next page load — to change services, update the hardcoded list in `functions.php` *and* delete unwanted terms.

### Admin / content modules

- `inc/blog-meta-boxes.php` — meta box UI for `pj_blog_post`
- `inc/blog-seed.php` — sample-data seeding for blog posts (invoked via WP-CLI)
- Custom admin columns and taxonomy filters for `pj_blog_post` are defined in `functions.php` (`pjlaw_blog_columns`, `pjlaw_blog_tax_filters`).

### Consultation form

The multi-step consultation wizard exists in **two** templates that are easy to confuse:
- `page-consultation-form.php` — single-page form variant
- `page-consultation-step.php` — step-by-step wizard (uses CSS class `active` for selected state, not `--selected`)

Form submission is handled server-side via `pjlaw_handle_consultation_form` wired to `wp_ajax_pjlaw_consultation` and `wp_ajax_nopriv_pjlaw_consultation`. It nonce-verifies, sanitizes, and creates a `consultation` post.

### Assets

Static assets live under `assets/` (CSS in `assets/css/`, JS in `assets/js/`, images under `assets/images/`). They are enqueued by `pjlaw_scripts()`. There is no bundler — author CSS/JS files directly.

## Conventions worth knowing

- Theme text domain: `pjlaw`. UI strings are in Korean; keep that when editing user-facing copy.
- The `docs/` folder inside the theme contains in-progress implementation plans (e.g. `page-blog-plan-wp-menu.md`) — consult before large blog-related changes.
- `front-page.php` is intentionally long and template-driven; prefer editing the relevant section rather than refactoring the whole file.
