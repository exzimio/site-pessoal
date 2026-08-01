# alexandremagno.dev

[Português](README.md) · [English](README.en.md) · [Español](README.es.md)

Personal fullstack developer site, built with Laravel. It started as a
static site in HTML, Tailwind and plain JavaScript. I moved it to an app
with a database and admin area so I can change projects, services and copy
without editing code every time.

The look and animations came from the static version. I migrated in phases
and kept the site working at the end of each one.

## What I learned on this project

- A portfolio site does not need everything in the database. Things I
  change often (projects, services, messages) go to MySQL. The rest of the
  UI lives in `lang/*.json`.
- Language in the URL (`/pt`, `/en`, `/es`) is cleaner than swapping text
  only in the browser. Google sees three versions and a shared link opens
  in the right language.
- Hand-rolled auth is enough for a single admin. Breeze would be extra
  weight here.
- Prices in cents avoid float surprises. Euros are only for display.
- Project mockups are Blade partials keyed by name (`dashboard`, `shop`…).
  There is no image upload yet. I prefer that over fake client screenshots.
- Migrating in phases forces the site not to break halfway. Each commit
  had to leave something usable.

## Status

Phase 1 done: public site on Laravel, visually the same as the original.

Phase 2 done: MySQL, contact form saving messages, login and inbox at
`/admin`.

Phase 3 done: services, projects, commitments and stack come from the
database; languages in the URL; CRUD in the admin.

Still to do: image uploads, cache, tests and production deploy.

## Requirements

- PHP 8.2 or newer, with `gd`, `zip`, `intl`, `mbstring`, `pdo_mysql`,
  `curl`, `fileinfo` and `openssl`
- Composer 2
- Node 20 or newer
- MySQL or MariaDB (on XAMPP just start MySQL)

On XAMPP the first three extensions are often disabled. Open `php\php.ini`,
uncomment `extension=gd`, `extension=intl` and `extension=zip`, then
restart.

## Run locally

1. Create the `alexandremagno` database in phpMyAdmin (or
   `mysql -u root -e "CREATE DATABASE alexandremagno CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"`).
2. Set up the environment and choose an admin password:

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

In `.env`, check:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=alexandremagno
DB_USERNAME=root
DB_PASSWORD=

ADMIN_EMAIL=ola@alexandremagno.dev
ADMIN_PASSWORD=pick-a-password
APP_TIMEZONE=Europe/Lisbon
```

3. Create tables, admin user, content and assets:

```bash
php artisan migrate
php artisan db:seed
npm run build
php artisan serve
```

- Site PT: `http://localhost:8000/pt`
- Site EN: `http://localhost:8000/en`
- Site ES: `http://localhost:8000/es`
- Root `/` redirects to the session or browser language
- Admin: `http://localhost:8000/admin/login`

While developing it is easier to keep `npm run dev` running in another
terminal. Then you do not need `npm run build` on every change.

## Languages

Each language has its own URL. The `SetLocale` middleware sets the app
locale from the `{locale}` segment.

- UI chrome (nav, buttons, hero, form): `lang/pt.json`, `lang/en.json`,
  `lang/es.json`
- Editable content (services, projects, commitments): translation tables
  in the database, one row per locale

The header language menu links to the same page in another language. Each
version has `hreflang` and `canonical`.

## Admin

Authenticated area at `/admin`. There is only one user, created by the
seeder.

- Dashboard with counts
- Messages: list, search, status, CSV export
- Services, projects, commitments and technologies: CRUD with PT / EN / ES
  tabs on the same form

The public form posts to `POST /{locale}/contacto`, with CSRF, a honeypot
and a limit of 5 requests per minute.

## Layout

```
app/Http/Controllers/
  HomeController.php            public page with DB data
  ContactController.php         saves the contact message
  LocaleRedirectController.php  / → /pt|/en|/es
  Admin/                        login, dashboard, messages, CRUDs
app/Models/                     Message, Service, Project, Commitment…
lang/                           pt.json, en.json, es.json
resources/views/
  components/layout.blade.php
  admin/
  sections/                     hero, about, services, projects…
  partials/icons/               service and stack SVG icons
  partials/project-media/       project SVG mockups
```

## Technical choices

**Content in the DB, labels in language files.** What you edit in the
admin lives in tables. Page structure (nav, form errors) lives in
`lang/*.json`. Mixing both in one table makes the layout harder to keep.

**Translations in their own tables.** Each locale is a row. Adding a
language does not mean new `title_pt` columns.

**Prices in cents.** `price_cents` in the database; euros only when shown.

**Icons and mockups in code.** The admin picks a key. The SVG stays
versioned with the rest of the site.

**Language in the URL.** Clear indexing and shareable links in the right
language.

**One user, no roles.** Simple auth, no Breeze.

## Phases

1. Laravel serving the current site, no database. Done.
2. MySQL, form saving messages, admin inbox. Done.
3. Content in the DB, CRUD and languages in the URL. Done.
4. Image uploads, cache, tests and production hosting.
