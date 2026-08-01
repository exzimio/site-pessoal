# alexandremagno.dev

[Português](README.md) · [English](README.en.md) · [Español](README.es.md)

Site pessoal de developer fullstack, em Laravel. Começou como um site
estático em HTML, Tailwind e JavaScript nativo. Passei-o para uma aplicação
com base de dados e backoffice, para poder alterar projetos, serviços e
textos sem mexer no código a cada mudança.

O visual e as animações vieram do site estático. A migração foi feita por
fases, com o site a funcionar no fim de cada uma.

## O que aprendi neste projeto

- Um site de portfolio não precisa de meter tudo na base de dados. O que
  mudo com frequência (projetos, serviços, mensagens) vai para MySQL. O
  resto da interface fica em `lang/*.json`.
- Idioma na URL (`/pt`, `/en`, `/es`) é mais limpo do que trocar texto só
  no browser. O Google vê três versões e um link partilhado chega certo.
- Auth à mão chega para um único admin. Breeze seria peso a mais aqui.
- Preços em cêntimos evitam surpresas com floats. Formato em euros só na
  vista.
- Mockups dos projetos são partials Blade com uma chave (`dashboard`,
  `shop`…). Ainda não há upload de imagens. Prefiro isso a fingir
  screenshots de clientes que não existem.
- Migrar por fases obriga a não partir o site a meio. Cada commit tinha
  de deixar algo utilizável.

## Estado

Fase 1 feita: site público em Laravel, visualmente idêntico ao original.

Fase 2 feita: MySQL, formulário de contacto a gravar mensagens, login e
caixa de entrada em `/admin`.

Fase 3 feita: serviços, projetos, compromissos e stack vêm da base de
dados; idiomas em URL; CRUD no backoffice.

Por fazer: uploads de imagens, cache, testes e publicação.

## Precisa de

- PHP 8.2 ou superior, com as extensões `gd`, `zip`, `intl`, `mbstring`,
  `pdo_mysql`, `curl`, `fileinfo` e `openssl`
- Composer 2
- Node 20 ou superior
- MySQL ou MariaDB (no XAMPP basta arrancar o MySQL)

No XAMPP as três primeiras extensões vêm desligadas. Abrir `php\php.ini`,
tirar o ponto e vírgula às linhas `extension=gd`, `extension=intl` e
`extension=zip`, e reiniciar.

## Correr em local

1. Criar a base `alexandremagno` no phpMyAdmin (ou `mysql -u root -e "CREATE DATABASE alexandremagno CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"`).
2. Copiar o ambiente e preencher a palavra-passe do admin:

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

No `.env`, confirma:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=alexandremagno
DB_USERNAME=root
DB_PASSWORD=

ADMIN_EMAIL=ola@alexandremagno.dev
ADMIN_PASSWORD=escolhe-uma-palavra-passe
APP_TIMEZONE=Europe/Lisbon
```

3. Criar tabelas, utilizador admin, conteúdo e assets:

```bash
php artisan migrate
php artisan db:seed
npm run build
php artisan serve
```

- Site PT: `http://localhost:8000/pt`
- Site EN: `http://localhost:8000/en`
- Site ES: `http://localhost:8000/es`
- Raiz `/` redireciona para o idioma da sessão ou do browser
- Backoffice: `http://localhost:8000/admin/login`

Durante o desenvolvimento é mais prático deixar `npm run dev` a correr numa
consola. Aí não é preciso o `npm run build`.

## Idiomas

Cada língua tem URL próprio. O middleware `SetLocale` define o locale a
partir do segmento `{locale}`.

- Interface (navegação, botões, hero, formulário): `lang/pt.json`,
  `lang/en.json`, `lang/es.json`
- Conteúdo editável (serviços, projetos, compromissos): tabelas de
  tradução na base de dados, uma linha por locale

O seletor do header liga para a mesma página noutro idioma. Há `hreflang`
e `canonical` por versão.

## Backoffice

Área autenticada em `/admin`. Só existe um utilizador, criado no seeder.

- Painel com contagens
- Mensagens: lista, pesquisa, estados, export CSV
- Serviços, projetos, compromissos e tecnologias: CRUD com separadores
  PT / EN / ES no mesmo formulário

O formulário público posta para `POST /{locale}/contacto`, com CSRF,
honeypot e limite de 5 pedidos por minuto.

## Como está organizado

```
app/Http/Controllers/
  HomeController.php            página pública com dados da BD
  ContactController.php         grava a mensagem do formulário
  LocaleRedirectController.php  / → /pt|/en|/es
  Admin/                        login, painel, mensagens e CRUDs
app/Models/                     Message, Service, Project, Commitment…
lang/                           pt.json, en.json, es.json
resources/views/
  components/layout.blade.php
  admin/
  sections/                     hero, sobre, serviços, projetos…
  partials/icons/               ícones SVG dos serviços e da stack
  partials/project-media/       ilustrações SVG dos projetos
```

## Decisões técnicas

**Conteúdo na BD, rótulos em ficheiros.** O que mudas no backoffice vive
em tabelas. A estrutura da página (navegação, erros do formulário) vive
em `lang/*.json`. Misturar as duas coisas numa só tabela torna o layout
difícil de manter.

**Traduções em tabelas próprias.** Cada locale é uma linha. Acrescentar
um idioma novo não obriga a alterar o esquema com colunas `titulo_pt`.

**Preços em cêntimos.** `price_cents` na base; euros só na apresentação.

**Ícones e mockups no código.** O admin escolhe uma chave. O SVG fica
versionado com o resto do site.

**Idioma na URL.** Indexação clara e links partilháveis no idioma certo.

**Um só utilizador, sem papéis.** Auth simples, sem Breeze.

## Fases

1. Laravel a servir o site atual, sem base de dados. Feito.
2. MySQL, formulário a gravar e backoffice com caixa de entrada. Feito.
3. Conteúdo na BD, CRUD e idiomas em URL. Feito.
4. Upload de imagens, cache, testes e publicação no alojamento final.
