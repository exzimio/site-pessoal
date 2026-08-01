# alexandremagno.dev

[Português](README.md) · [English](README.en.md) · [Español](README.es.md)

Sitio personal de developer fullstack, en Laravel. Empezó como un sitio
estático en HTML, Tailwind y JavaScript nativo. Lo pasé a una aplicación
con base de datos y panel de administración para poder cambiar proyectos,
servicios y textos sin tocar el código cada vez.

El diseño y las animaciones vienen de la versión estática. La migración
fue por fases, dejando el sitio funcionando al final de cada una.

## Lo que aprendí en este proyecto

- Un portfolio no necesita meterlo todo en la base de datos. Lo que cambio
  a menudo (proyectos, servicios, mensajes) va a MySQL. El resto de la
  interfaz vive en `lang/*.json`.
- El idioma en la URL (`/pt`, `/en`, `/es`) es más limpio que cambiar el
  texto solo en el navegador. Google ve tres versiones y un enlace
  compartido llega en el idioma correcto.
- Auth a mano basta para un solo admin. Breeze sería peso de más aquí.
- Precios en céntimos evitan sorpresas con floats. Los euros solo se
  formatean en la vista.
- Los mockups de proyectos son partials Blade con una clave (`dashboard`,
  `shop`…). Aún no hay subida de imágenes. Prefiero eso a inventar
  capturas de clientes que no existen.
- Migrar por fases obliga a no romper el sitio a medias. Cada commit tenía
  que dejar algo usable.

## Estado

Fase 1 hecha: sitio público en Laravel, igual visualmente al original.

Fase 2 hecha: MySQL, formulario de contacto que guarda mensajes, login e
bandeja en `/admin`.

Fase 3 hecha: servicios, proyectos, compromisos y stack vienen de la base
de datos; idiomas en la URL; CRUD en el panel.

Por hacer: subida de imágenes, caché, tests y publicación.

## Requisitos

- PHP 8.2 o superior, con las extensiones `gd`, `zip`, `intl`, `mbstring`,
  `pdo_mysql`, `curl`, `fileinfo` y `openssl`
- Composer 2
- Node 20 o superior
- MySQL o MariaDB (en XAMPP basta con arrancar MySQL)

En XAMPP las tres primeras extensiones suelen venir desactivadas. Abre
`php\php.ini`, quita el punto y coma de `extension=gd`, `extension=intl`
y `extension=zip`, y reinicia.

## Arrancar en local

1. Crear la base `alexandremagno` en phpMyAdmin (o
   `mysql -u root -e "CREATE DATABASE alexandremagno CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"`).
2. Preparar el entorno y elegir la contraseña del admin:

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

En `.env`, comprueba:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=alexandremagno
DB_USERNAME=root
DB_PASSWORD=

ADMIN_EMAIL=ola@alexandremagno.dev
ADMIN_PASSWORD=elige-una-contrasena
APP_TIMEZONE=Europe/Lisbon
```

3. Crear tablas, usuario admin, contenido y assets:

```bash
php artisan migrate
php artisan db:seed
npm run build
php artisan serve
```

- Sitio PT: `http://localhost:8000/pt`
- Sitio EN: `http://localhost:8000/en`
- Sitio ES: `http://localhost:8000/es`
- La raíz `/` redirige al idioma de la sesión o del navegador
- Panel: `http://localhost:8000/admin/login`

En desarrollo es más práctico dejar `npm run dev` en otra consola. Así no
hace falta `npm run build` a cada cambio.

## Idiomas

Cada lengua tiene su propia URL. El middleware `SetLocale` define el
locale a partir del segmento `{locale}`.

- Interfaz (navegación, botones, hero, formulario): `lang/pt.json`,
  `lang/en.json`, `lang/es.json`
- Contenido editable (servicios, proyectos, compromisos): tablas de
  traducción en la base de datos, una fila por locale

El selector del header enlaza a la misma página en otro idioma. Hay
`hreflang` y `canonical` por versión.

## Panel de administración

Área autenticada en `/admin`. Solo hay un usuario, creado en el seeder.

- Panel con contadores
- Mensajes: lista, búsqueda, estados, export CSV
- Servicios, proyectos, compromisos y tecnologías: CRUD con pestañas
  PT / EN / ES en el mismo formulario

El formulario público envía a `POST /{locale}/contacto`, con CSRF,
honeypot y límite de 5 peticiones por minuto.

## Cómo está organizado

```
app/Http/Controllers/
  HomeController.php            página pública con datos de la BD
  ContactController.php         guarda el mensaje del formulario
  LocaleRedirectController.php  / → /pt|/en|/es
  Admin/                        login, panel, mensajes y CRUDs
app/Models/                     Message, Service, Project, Commitment…
lang/                           pt.json, en.json, es.json
resources/views/
  components/layout.blade.php
  admin/
  sections/                     hero, sobre, servicios, proyectos…
  partials/icons/               iconos SVG de servicios y stack
  partials/project-media/       mockups SVG de proyectos
```

## Decisiones técnicas

**Contenido en la BD, etiquetas en ficheros.** Lo que editas en el panel
vive en tablas. La estructura de la página (navegación, errores del
formulario) vive en `lang/*.json`. Mezclar las dos cosas en una sola
tabla hace el layout más difícil de mantener.

**Traducciones en tablas propias.** Cada locale es una fila. Añadir un
idioma no obliga a columnas `titulo_pt`.

**Precios en céntimos.** `price_cents` en la base; euros solo al mostrar.

**Iconos y mockups en el código.** El admin elige una clave. El SVG queda
versionado con el resto del sitio.

**Idioma en la URL.** Indexación clara y enlaces compartibles en el idioma
correcto.

**Un solo usuario, sin roles.** Auth simple, sin Breeze.

## Fases

1. Laravel sirviendo el sitio actual, sin base de datos. Hecho.
2. MySQL, formulario que guarda y bandeja en el admin. Hecho.
3. Contenido en la BD, CRUD e idiomas en la URL. Hecho.
4. Subida de imágenes, caché, tests y hosting de producción.
