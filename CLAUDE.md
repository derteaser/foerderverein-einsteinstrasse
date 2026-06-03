# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

Website for the **Förderverein Familienzentrum Einsteinstraße** (a German parents' association). Built on **Kirby CMS 5** (PHP 8.3) with a **Vite + Tailwind CSS 4** frontend. German-only (`slugs: de`, `locale: de_DE.utf-8`).

## Commands

### Frontend (pnpm — package manager is pinned to pnpm@11)
- `pnpm install` — installs Node deps; `postinstall` triggers `copy-icons` (see Icons below)
- `pnpm dev` — Vite dev server with HMR. Writes a hot file to `storage/vite.hot`; auto-detects TLS for `foerderverein-einsteinstrasse.test`
- `pnpm build` — production build into `public/build/`
- `pnpm copy-icons` — re-runs the icon transformer

### Backend (composer / PHP 8.3)
- `composer install` — installs Kirby + plugins. Kirby is placed in `/kirby` (gitignored) by `getkirby/composer-installer`. `post-autoload-dump.php` patches `vendor/autoload.php` to set `KIRBY_HELPER_E = false` (guarded so a second regen is safe).
- `composer start` — runs `php -S localhost:8000 -t public/ kirby/router.php`. `-t public/` is required so static assets and the build manifest resolve.
- `vendor/bin/pest` — run all tests
- `vendor/bin/pest --filter=SomeTest` — run a single test
- `composer analyze` — PHPStan level 8 (paths: `site/models`, `site/controllers`)
- `vendor/bin/kirby types:create` — regenerate `types.php` IDE stubs after blueprint changes
- `composer.json` config pins `platform.php = "8.3"` so the lock file resolves against 8.3 regardless of dev PHP

### Environment
- `.env` (gitignored) is loaded by `bnomei/kirby3-dotenv` from the project root. `.env.ci` is copied to `.env` in CI.
- Required env keys: `APP_URL`, `APP_DEBUG`, `AUTH_METHODS`, `EMAIL_*`, `FATHOM_*`, `SENTRY_DSN`, `SENTRY_ENVIRONMENT`.
- `APP_URL` is wired into Kirby's `url` option — important when running behind a reverse proxy so the panel agrees with the browser on host/scheme.

### Kirby license
- Lives at `site/config/.license` (gitignored). Activate locally via panel, then SCP to production.

## Architecture

### Kirby site structure
- `site/templates/` — top-level page templates (`home.php`, `blog.php`, `article.php`, `contact.php`, `default.php`, `person.php`, `persons.php`). Each template wraps content with `snippet('layout', slots: true)`.
- `site/snippets/layout.php` — global HTML shell. `<head>` emits `<?php snippet('seo/head') ?>` from `tobimori/kirby-seo`; the project owns charset, viewport, theme-color, icon links, vite tags, RSS link.
- `site/snippets/` — reusable PHP partials. The home page is composed from child pages whose `intendedTemplate()` matches a snippet name (`pager-hero`, `pager-steps`, `pager-cta`, `pager-blog`, `pager-team`, `pager-features`). Adding a new home section = new blueprint + matching snippet.
- `site/controllers/` — only `site.php` remains. Kirby 5 auto-merges template controllers with the site controller; per-template controllers are only needed when they add template-specific data.
- `site/models/` — Page subclasses (`ArticlePage`, `BlogPage`, `PersonPage`, plus `pager-*` models). `ArticlePage::metaDefaults()` derives description from excerpt + og:image from `main_image`; `PersonPage::metaDefaults()` sets `robotsIndex=false`, `robotsFollow=false`. These hook into kirby-seo's cascade.
- `site/blueprints/` — panel field definitions. `pages/` defines per-page fields; `site.yml` is the global site blueprint with `pages`/`contact`/`navigation` tabs.
- `site/collections/` — named queries (e.g. `latest-blog-articles`).

### Split config
`site/config/config.php` is a thin index that requires per-concern files:

```
site/config/
  config.php          # index — top-level scalars + require statements
  auth.php
  panel.php
  email.php
  thumbs.php
  routes.php          # currently only the /feed route
  vite.php            # laravel-vite plugin options
  seo.php             # tobimori/kirby-seo (canonical, locale, robots, sitemap excludes, default closures)
  sentry.php          # thathoff/kirby-sentry (DSN from env)
  git-content.php     # thathoff/kirby-git-content (auto-commit on non-debug)
```

`paulmorel.fathom-analytics` config stays inline in `config.php` (single block, env-driven). The Blade `ifs` config lives in `site/config/blade.php` once `leitsch/kirby-blade` lands.

### Plugin stack
- `bnomei/kirby3-dotenv` — env loader (via `loadenv()` global, plugin path: `site/plugins/kirby3-dotenv/global.php`)
- `bnomei/kirby3-feed` — RSS for the `/feed` route
- `bnomei/kirby3-recently-modified` — panel sidebar
- `bnomei/kirby3-security-headers` — security headers
- `bvdputte/kirby-logbook` — panel activity log
- `distantnative/retour-for-kirby` — redirects panel
- `getkirby/cli` — `kirby` CLI binary (`vendor/bin/kirby`)
- `lukaskleinschmidt/kirby-laravel-vite` — vite() helper
- `lukaskleinschmidt/kirby-types` — generates `types.php` for IDEs/PHPStan
- `nerdcel/kirby-impersonate` — admin impersonation
- `paulmorel/fathom-analytics` — analytics embed snippet
- `thathoff/kirby-git-content` — auto-commit content changes from panel
- `thathoff/kirby-sentry` — Sentry exception reporting
- `tobimori/kirby-seo` — SEO meta tags, sitemap, robots.txt (replaces the legacy `wearejust/kirby-meta-tags` + `bnomei/kirby3-robots-txt` combo)

### Content & storage
- `content/` — flat-file content. Home sections live as child pages under `content/home/`.
- `storage/` (gitignored) — cache, sessions, accounts, plus `storage/vite.hot`.
- `public/` is the document root. `public/index.php` is the canonical Kirby bootstrap.

### Frontend pipeline
- `vite.config.js` uses `laravel-vite-plugin` — entries: `resources/css/site.css`, `resources/js/site.js`, `resources/js/fonts.js`. Hot file: `storage/vite.hot`, build dir: `public/build/`. `refresh` watches `site/templates/**` and `site/snippets/**`.
- Tailwind v4 with `@tailwindcss/vite`. `resources/css/site.css` uses `@source` directives pointing at `site/snippets` and `site/templates`. Custom `@utility blocks` defines editor prose style.
- No JS framework yet — `resources/js/site.js` is vanilla JS using `BigPicture` for image galleries.

### Icons
`copy-icons.cjs` copies curated Remix Icon SVGs from `node_modules/remixicon/icons/**` into `site/snippets/icons/*.php`, injecting a `<?= $class ?? '' ?>` class attribute. Usage: `<?php snippet('icons/heart-fill', ['class' => 'size-4']) ?>`. Add to `iconsToCopy` and run `pnpm copy-icons` (also runs on `pnpm install`).

### Testing
- `derteaser/kirby-testing` provides the HTTP/DOM test base. `tests/TestCase.php` extends it and points content/storage roots at the real `content/` and `storage/` trees.
- `tests/Pest.php` binds `Tests\TestCase` to `Feature/` and `Unit/`. Tests use `$this->site()`, `$this->get(...)`, and assertion methods like `$response->assertStatus(200)`.
- Arch tests at `tests/ArchitectureTest.php` use Pest's `arch()->preset()->php()` and `->preset()->security()`.
- `tests/content/` exists for fixtures but is empty for now — tests currently run against the live `content/` tree.

### Static analysis
- `phpstan.neon.dist` at level 8, scoped to `site/models` + `site/controllers`. Kirby's blueprint `__call` field accessors are dynamic; the ignore set in the config suppresses the matching `method.notFound` patterns.
- `composer analyze` runs PHPStan with 512M memory.
- `.phpstan.cache/` is gitignored.

### Deploy
`.github/workflows/deploy.yml` runs on push to `main`: builds the Vite bundle, commits build artifacts back to the repo via `stefanzweifel/git-auto-commit-action` (commit message `💄Apply theme changes`), then SSHes into the server and runs `git pull && composer install --no-dev`. The recurring auto-commits from CI are expected.

### CI
- `.github/workflows/test.yml` — Pest on push/PR to `main`.
- `.github/workflows/phpstan.yml` — PHPStan on push/PR to `main`.
- `.github/actions/setup-php-composer` — composite action setting up PHP 8.3 + composer install with cache.

## Code style

- `.prettierrc.json`: PHP via `@prettier/plugin-php`, `singleQuote: true`, `trailingCommaPHP: true`, `printWidth: 120`. Templates/snippets indent 2 spaces (`.editorconfig`).
- Page models add `@method` PHPDoc tags for their blueprint fields. `types.php` provides full IDE/PHPStan stubs (regenerate after blueprint changes).
