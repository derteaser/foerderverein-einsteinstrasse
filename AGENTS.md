# AGENTS.md

## Purpose

This repository powers the public website of the **Förderverein Familienzentrum Einsteinstraße** (a German parents' association supporting an evangelical family centre in Neuss). Kirby CMS 5 + Vite/Tailwind 4.

Use this file for project context that is easy to miss from quick code scanning.

## Non-Obvious Project Context

- Single-domain, German-only site. Locale `de_DE`, slugs `de`. No multi-language support is in scope.
- Content lives **in this repo** (unlike sibling sites `diakonie-rkn-website` and `blaue-funken-kirby`, which split content into a separate repo).
- Editorial workflow runs entirely through Kirby's Panel. `thathoff/kirby-git-content` auto-commits panel saves on production (skipped when `APP_DEBUG=true`).
- The deploy workflow auto-commits Vite build artifacts back to `main` after every push (`💄Apply theme changes`). Expected churn in `git log`.
- The home page is composed from child pages of `content/home/` whose `intendedTemplate()` matches a `pager-*` snippet name. Adding a new home section means adding both a blueprint + matching snippet, and a content page under `content/home/`.

## Accessibility

This is a community-trust site (parents, supporters) — keep things accessible:
- WCAG 2.0 AA contrast for text and UI controls.
- Keyboard operability for menus, links, and any custom controls.
- Semantic HTML and correct heading order.
- Meaningful `alt` text on content images; decorative images use empty `alt`.
- Visible focus indicators.

## Environment + deploy

- Production lives at `https://www.foerderverein-familienzentrum-einsteinstrasse-neuss.de` on a shared-hosting Apache server.
- Deploy is SSH `git pull && composer install --no-dev` triggered by GitHub Actions on push to `main`.
- PHP 8.3 (`php83` binary on prod).
- Kirby 5 license is required for production; activate locally via panel, then SCP `site/config/.license` to the server. The file is gitignored.

## Things to avoid

- Don't add JS frameworks unless a feature genuinely needs them — the site is meant to stay lightweight.
- Don't introduce custom routes for sitemap/robots — those are owned by `tobimori/kirby-seo` (`site/config/seo.php` for global settings, blueprint `seo:` tabs for per-page overrides).
- Don't bypass the split config — every plugin gets its own `site/config/<plugin>.php` file required by `config.php`.
