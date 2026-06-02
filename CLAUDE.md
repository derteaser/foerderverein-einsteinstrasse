# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

Website for the **Förderverein Familienzentrum Einsteinstraße** (a German parents' association). Built on **Kirby CMS 3** (PHP) with a **Vite + Tailwind CSS 4** frontend. The site is German-only (`slugs: de`, `locale: de_DE.utf-8`).

## Commands

### Frontend (pnpm — package manager is pinned to pnpm@11)
- `pnpm install` — installs Node deps; `postinstall` triggers `copy-icons` (see Icons below)
- `pnpm dev` — Vite dev server with HMR. Writes a hot file to `storage/vite.hot`; auto-detects TLS for `foerderverein-einsteinstrasse.test`
- `pnpm build` — production build into `public/build/`
- `pnpm copy-icons` — re-runs the icon transformer

### Backend (composer / PHP 8.2+)
- `composer install` — installs Kirby + plugins. Kirby is placed in `/kirby` (gitignored) by `getkirby/composer-installer`. `post-autoload-dump.php` patches `vendor/autoload.php` to set `KIRBY_HELPER_E = false`
- `composer start` — runs the built-in PHP server (`php -S localhost:8000 kirby/router.php`). `server.php` is an alternative entry that emulates Apache's mod_rewrite
- `vendor/bin/pest` — run all tests
- `vendor/bin/pest --filter=SomeTest` — run a single test
- `vendor/bin/pest --ci` — CI mode (used by GitHub Actions)

### Environment
- `.env` (gitignored) is loaded by `bnomei/kirby3-dotenv` from the project root. `.env.ci` is copied to `.env` in CI
- Required keys are referenced from `site/config/config.php`: `APP_DEBUG`, `AUTH_METHODS`, `EMAIL_*`, `FATHOM_*`

## Architecture

### Kirby site structure
- `site/templates/` — top-level page templates (`home.php`, `blog.php`, `article.php`, …). Each template wraps content with `snippet('layout', slots: true)`
- `site/snippets/layout.php` — the global HTML shell (head, footer, Vite tags via `vite([...])` helper from `lukaskleinschmidt/kirby-laravel-vite`)
- `site/snippets/` — reusable PHP partials. The home page is composed from child pages whose `intendedTemplate()` matches a snippet name (`pager-hero`, `pager-steps`, `pager-cta`, `pager-blog`, `pager-team`, `pager-features`). Adding a new home section = new blueprint + matching snippet
- `site/controllers/` — data providers per template. `home.php` delegates to `site.php` so per-template controllers can extend a shared base via `$kirby->controller('site', ...)`
- `site/models/` — Page subclasses (`ArticlePage`, `BlogPage`, `PersonPage`, plus `pager-*` models). When a blueprint has a backing class (e.g. `article.yml` → `article.php` defining `class ArticlePage extends Page`), templates and meta-tag closures can rely on that type
- `site/blueprints/` — panel field definitions. `pages/` defines per-page fields; `site.yml` is the global site blueprint with `pages`/`contact`/`navigation` tabs
- `site/collections/` — named queries (e.g. `latest-blog-articles`) usable via `collection('name')`
- `site/config/config.php` — site-wide Kirby config: routes (custom `sitemap.xml`, `feed`), thumb presets, SMTP, meta-tag templates, plugin options

### Content & storage
- `content/` — flat-file content. Home sections live as child pages under `content/home/`
- `storage/` (gitignored) — cache, sessions, accounts, plus `storage/vite.hot`
- `public/` is the document root. `public/index.php` and `index.php` (project root) both bootstrap Kirby; the gitignored `kirby/` package lives outside `public/` and is `.htaccess`-blocked from direct access

### Frontend pipeline
- `vite.config.js` uses `laravel-vite-plugin` (despite not being a Laravel app) — entries are `resources/css/site.css`, `resources/js/site.js`, `resources/js/fonts.js`. Hot file: `storage/vite.hot`, build dir: `public/build/`. `refresh` watches `site/templates/**` and `site/snippets/**`
- Tailwind v4 with `@tailwindcss/vite`. `resources/css/site.css` uses `@source` directives pointing at `site/snippets` and `site/templates` to scan PHP files for classes. Custom `@utility blocks` defines the editor prose style
- No JS framework — `resources/js/site.js` is vanilla JS using `BigPicture` for image galleries; `fonts.js` imports `@fontsource/{quicksand,roboto}`

### Icons
`copy-icons.cjs` copies a curated subset of Remix Icon SVGs from `node_modules/remixicon/icons/**` into `site/snippets/icons/*.php`, injecting a `<?= $class ?? '' ?>` class attribute. Usage: `<?php snippet('icons/heart-fill', ['class' => 'size-4']) ?>`. To add an icon, add its path to `iconsToCopy` and re-run `pnpm copy-icons` (also runs on `pnpm install`).

### Testing
Pest 3 with two presets enabled in `tests/ArchitectureTest.php`: `arch()->preset()->php()` and `arch()->preset()->security()`. `tests/Pest.php` boots Kirby with the same roots used in production and ignores Kirby/Uniform namespaces and global functions in arch checks. The base `Tests\TestCase` extends PHPUnit's `TestCase` directly (no Kirby helpers wired in by default). `phpunit.xml` sources include both `./site` and `./kirby`.

### Deploy
`.github/workflows/deploy.yml` runs on push to `main`: builds the Vite bundle, commits build artifacts back to the repo via `stefanzweifel/git-auto-commit-action` (commit message `💄Apply theme changes`), then SSHes into the server and runs `git pull && composer install --no-dev`. The recurring auto-commits from CI are expected — don't be surprised by `💄Apply theme changes` commits in `git log`.

## Code style

- `.prettierrc.json`: PHP via `@prettier/plugin-php`, `singleQuote: true`, `trailingCommaPHP: true`, `printWidth: 120`. Templates/snippets indent 2 spaces (`.editorconfig`)
- Page models add `@method` PHPDoc tags for their blueprint fields (see `site/models/article.php`) so IDEs can autocomplete custom field accessors
