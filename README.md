# alexandremagno.dev

Site pessoal de developer fullstack, em Laravel. Começou como um site
estático em HTML, Tailwind e JavaScript nativo e está a ser passado para uma
aplicação com base de dados e backoffice, para eu poder alterar projetos,
serviços e textos sem tocar em código.

O design, as animações e o sistema de idiomas vieram do site estático e não
mudaram. A migração é feita por fases e o site tem de ficar a funcionar no
fim de cada uma.

## Estado

Fase 1 feita: site público em Laravel, visualmente idêntico ao original.

Fase 2 feita: MySQL, formulário de contacto a gravar mensagens, login e
caixa de entrada em `/admin`.

Por fazer: conteúdo dinâmico (projetos, serviços, compromissos), idiomas em
URL, uploads, cache, testes e publicação.

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

3. Criar tabelas, utilizador admin e assets:

```bash
php artisan migrate
php artisan db:seed
npm run build
php artisan serve
```

- Site: `http://localhost:8000`
- Backoffice: `http://localhost:8000/admin/login`

Durante o desenvolvimento é mais prático deixar `npm run dev` a correr numa
consola. Aí não é preciso o `npm run build`.

## Backoffice

Área autenticada em `/admin`. Só existe um utilizador, o que está no seeder.
Não há papéis admin/editor: quem entra gere tudo.

O que dá para fazer nesta fase:

- ver o painel com contagens e as últimas mensagens
- listar, pesquisar e filtrar mensagens por estado
- abrir o detalhe (passa a "lida" automaticamente)
- marcar como nova, lida, respondida ou spam
- exportar CSV
- apagar (soft delete)

O formulário público posta para `POST /contacto`, com CSRF, honeypot e limite
de 5 pedidos por minuto. O consentimento RGPD fica datado na linha da
mensagem.

## Como está organizado

```
app/Http/Controllers/
  ContactController.php         grava a mensagem do formulário
  Admin/                        login, painel e caixa de entrada
app/Models/Message.php
app/Http/Requests/StoreContactMessageRequest.php
resources/views/
  components/layout.blade.php   site público
  admin/                        vistas do backoffice
  sections/                     hero, sobre, serviços, …
resources/css/app.css
resources/js/i18n.js
resources/js/main.js
```

## Decisões

**Uma secção por ficheiro, sem componentes por enquanto.** As secções ainda
são HTML fixo. Transformá-las em componentes com parâmetros agora seria
inventar uma interface antes de saber que dados vêm da base de dados. Isso
faz-se na fase 3.

**Vite em vez do script de build antigo.** O Vite já põe o hash no nome do
ficheiro. O script de versionamento do site estático deixou de fazer falta.

**O JavaScript não foi reescrito.** Continua nativo. O `main.js` só ganhou o
envio do token CSRF e do idioma atual no POST do formulário.

**Sem papéis nem registo de atividade.** Só há um utilizador. Auditoria de
"quem alterou o quê" com uma só pessoa é peso morto.

**Auth à mão, sem Breeze.** Login, logout e middleware `auth` bastam. Menos
código gerado a limpar depois.

**Nomes de campos do formulário em português, colunas da BD em inglês.** O
pedido chega como `nome` / `mensagem` porque é o que o HTML já tinha. O
modelo grava em `name` / `body`. A tradução fica no controller, num sítio só.

## Fases

1. Laravel a servir o site atual, sem base de dados. Feito.
2. MySQL, formulário a gravar e backoffice com caixa de entrada. Feito.
3. Projetos, serviços e compromissos vindos da base de dados, com
   traduções, e idiomas em URL (`/pt/`, `/en/`, `/es/`).
4. Upload de imagens, cache, testes e publicação no alojamento final.
