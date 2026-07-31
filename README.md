# alexandremagno.dev

Site pessoal de developer fullstack, em Laravel. Começou como um site
estático em HTML, Tailwind e JavaScript nativo e está a ser passado para uma
aplicação com base de dados e backoffice, para eu poder alterar projetos,
serviços e textos sem tocar em código.

O design, as animações e o sistema de idiomas vieram do site estático e não
mudaram. A migração é feita por fases e o site tem de ficar a funcionar no
fim de cada uma.

## Estado

Fase 1 concluída: o site público corre em Laravel com o mesmo aspeto do
original. A comparação pixel a pixel entre as duas versões, em 1440px e em
390px, deu zero diferenças.

Por fazer: base de dados, backoffice, idiomas em URL, uploads e testes.

## Precisa de

- PHP 8.2 ou superior, com as extensões `gd`, `zip`, `intl`, `mbstring`,
  `pdo_mysql`, `curl`, `fileinfo` e `openssl`
- Composer 2
- Node 20 ou superior

No XAMPP as três primeiras vêm desligadas. Abrir `php\php.ini`, tirar o
ponto e vírgula às linhas `extension=gd`, `extension=intl` e
`extension=zip`, e reiniciar.

## Correr em local

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
npm run build
php artisan serve
```

Fica em `http://localhost:8000`.

Durante o desenvolvimento é mais prático deixar `npm run dev` a correr numa
consola, porque atualiza o CSS e o JavaScript no browser à medida que se
grava. Aí não é preciso o `npm run build`.

## Como está organizado

```
resources/views/
  components/layout.blade.php   head, cursor, header, rodapé, botão flutuante
  home.blade.php                a página, que inclui as secções pela ordem
  partials/                     header, rodapé, botão flutuante, dados estruturados
  sections/                     hero, sobre, serviços, projetos, stack, parceria, contacto
resources/css/app.css           Tailwind v4 e todos os estilos próprios
resources/js/i18n.js            traduções PT, EN e ES
resources/js/main.js            animações, carrossel, formulário, tema, cursor
```

## Decisões

**Uma secção por ficheiro, sem componentes por enquanto.** As secções ainda
são HTML fixo. Transformá-las em componentes com parâmetros agora seria
inventar uma interface antes de saber que dados vêm da base de dados. Isso
faz-se na fase em que o conteúdo passa a vir do MySQL.

**Vite em vez do script de build antigo.** O site estático tinha um script
que acrescentava o hash do conteúdo ao endereço do CSS, para a cache do
browser não servir uma versão velha. O Vite já põe o hash no nome do
ficheiro e escreve o `manifest.json`, portanto o script deixou de fazer
falta.

**O JavaScript não foi reescrito.** Continua a ser JavaScript nativo, sem
framework. Só passou a ser importado pelo `app.js`, primeiro o `i18n.js` e
depois o `main.js`, que é a ordem de que o segundo precisa.

**Os dados estruturados vão em bloco literal.** O JSON-LD usa chaves com
arroba e o Blade tentaria interpretá-las como diretivas.

**Ainda sem base de dados.** O Laravel arranca com SQLite para as sessões.
A passagem para MySQL é feita na fase seguinte, junto com as tabelas do
site.

## Fases

1. Laravel a servir o site atual, sem base de dados. Feito.
2. MySQL, formulário de contacto a gravar mensagens e backoffice com login
   e caixa de entrada.
3. Projetos, serviços e compromissos vindos da base de dados, com
   traduções, e idiomas em URL (`/pt/`, `/en/`, `/es/`).
4. Upload de imagens, cache, testes e publicação no alojamento final.
