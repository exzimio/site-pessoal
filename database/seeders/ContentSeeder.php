<?php

namespace Database\Seeders;

use App\Models\Commitment;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Technology;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedTechnologies();
        $this->seedServices();
        $this->seedProjects();
        $this->seedCommitments();
        $this->seedSettings();
    }

    private function seedTechnologies(): void
    {
        $items = [
            ['slug' => 'html5', 'name' => 'HTML5', 'icon' => 'html5'],
            ['slug' => 'css3', 'name' => 'CSS3', 'icon' => 'css3'],
            ['slug' => 'javascript', 'name' => 'JavaScript', 'icon' => 'javascript'],
            ['slug' => 'php', 'name' => 'PHP', 'icon' => 'php'],
            ['slug' => 'python', 'name' => 'Python', 'icon' => 'python'],
            ['slug' => 'mysql', 'name' => 'MySQL', 'icon' => 'mysql'],
            ['slug' => 'api-rest', 'name' => 'API REST', 'icon' => 'api'],
            ['slug' => 'json', 'name' => 'JSON', 'icon' => 'json'],
            ['slug' => 'ajax', 'name' => 'AJAX', 'icon' => 'ajax'],
            ['slug' => 'git', 'name' => 'Git', 'icon' => 'git'],
            ['slug' => 'tailwind', 'name' => 'Tailwind', 'icon' => 'tailwind'],
            ['slug' => 'terminal', 'name' => 'Terminal', 'icon' => 'terminal'],
        ];

        foreach ($items as $i => $item) {
            Technology::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'name' => $item['name'],
                    'icon' => $item['icon'],
                    'sort_order' => $i + 1,
                    'show_in_stack' => true,
                ]
            );
        }
    }

    private function seedServices(): void
    {
        $services = [
            [
                'slug' => 'websites',
                'icon' => 'monitor',
                'price_cents' => 45000,
                'is_monthly' => false,
                'sort_order' => 1,
                'translations' => [
                    'pt' => [
                        'title' => 'Websites institucionais',
                        'description' => 'Sites leves, escritos à mão em HTML, CSS e JavaScript. Sem construtores nem temas pesados. Pensados primeiro para o telemóvel e para aparecerem no Google.',
                        'bullets' => [
                            'Design responsivo, mobile-first',
                            'Painel simples para editar textos e imagens',
                            'SEO técnico e conformidade RGPD',
                        ],
                        'duration_label' => '1 a 3 semanas',
                    ],
                    'en' => [
                        'title' => 'Business websites',
                        'description' => 'Light sites, hand-written in HTML, CSS and JavaScript. No page builders, no heavy themes. Built for the phone first and to show up on Google.',
                        'bullets' => [
                            'Responsive, mobile-first design',
                            'Simple panel to edit text and images',
                            'Technical SEO and GDPR compliance',
                        ],
                        'duration_label' => '1 to 3 weeks',
                    ],
                    'es' => [
                        'title' => 'Webs corporativas',
                        'description' => 'Sitios ligeros, escritos a mano en HTML, CSS y JavaScript. Sin maquetadores ni plantillas pesadas. Pensados primero para el móvil y para aparecer en Google.',
                        'bullets' => [
                            'Diseño responsive, mobile-first',
                            'Panel sencillo para editar textos e imágenes',
                            'SEO técnico y cumplimiento del RGPD',
                        ],
                        'duration_label' => '1 a 3 semanas',
                    ],
                ],
            ],
            [
                'slug' => 'web-apps',
                'icon' => 'code',
                'price_cents' => 120000,
                'is_monthly' => false,
                'sort_order' => 2,
                'translations' => [
                    'pt' => [
                        'title' => 'Aplicações web sob medida',
                        'description' => 'Áreas de cliente, painéis de gestão e pequenas automações que substituem folhas de Excel e registos em papel.',
                        'bullets' => [
                            'Login, permissões e gestão de utilizadores',
                            'Registos completos sobre base de dados',
                            'Listagens, filtros e exportação para Excel',
                        ],
                        'duration_label' => '3 a 8 semanas',
                    ],
                    'en' => [
                        'title' => 'Custom web apps',
                        'description' => 'Client areas, admin panels and small automations that replace spreadsheets and paper records.',
                        'bullets' => [
                            'Login, permissions and user management',
                            'Full records on top of a database',
                            'Listings, filters and export to Excel',
                        ],
                        'duration_label' => '3 to 8 weeks',
                    ],
                    'es' => [
                        'title' => 'Aplicaciones web a medida',
                        'description' => 'Áreas de cliente, paneles de gestión y pequeñas automatizaciones que sustituyen hojas de Excel y registros en papel.',
                        'bullets' => [
                            'Login, permisos y gestión de usuarios',
                            'Registros completos sobre base de datos',
                            'Listados, filtros y exportación a Excel',
                        ],
                        'duration_label' => '3 a 8 semanas',
                    ],
                ],
            ],
            [
                'slug' => 'databases',
                'icon' => 'database',
                'price_cents' => 35000,
                'is_monthly' => false,
                'sort_order' => 3,
                'translations' => [
                    'pt' => [
                        'title' => 'Bases de dados & integrações',
                        'description' => 'Modelação de dados bem estruturada, APIs para ligar sistemas que hoje não se falam e scripts que poupam trabalho repetitivo.',
                        'bullets' => [
                            'Modelação e consultas em MySQL',
                            'APIs REST e troca de dados em JSON',
                            'Automações em Python e backups',
                        ],
                        'duration_label' => '1 a 4 semanas',
                    ],
                    'en' => [
                        'title' => 'Databases & integrations',
                        'description' => 'Well-structured data modelling, APIs to connect systems that don\'t talk to each other today and scripts that save repetitive work.',
                        'bullets' => [
                            'MySQL modelling and queries',
                            'REST APIs and JSON data exchange',
                            'Python automations and backups',
                        ],
                        'duration_label' => '1 to 4 weeks',
                    ],
                    'es' => [
                        'title' => 'Bases de datos e integraciones',
                        'description' => 'Modelado de datos bien estructurado, APIs para conectar sistemas que hoy no se hablan y scripts que ahorran trabajo repetitivo.',
                        'bullets' => [
                            'Modelado y consultas en MySQL',
                            'APIs REST e intercambio de datos en JSON',
                            'Automatizaciones en Python y backups',
                        ],
                        'duration_label' => '1 a 4 semanas',
                    ],
                ],
            ],
            [
                'slug' => 'ecommerce',
                'icon' => 'cart',
                'price_cents' => 90000,
                'is_monthly' => false,
                'sort_order' => 4,
                'translations' => [
                    'pt' => [
                        'title' => 'Lojas online',
                        'description' => 'Catálogo, carrinho e checkout claros, com gestão de stock e os métodos de pagamento que os portugueses usam.',
                        'bullets' => [
                            'WooCommerce ou loja desenvolvida à medida',
                            'Pagamentos MB Way, Multibanco e cartão',
                            'Gestão de produtos, stock e encomendas',
                        ],
                        'duration_label' => '2 a 6 semanas',
                    ],
                    'en' => [
                        'title' => 'Online stores',
                        'description' => 'A clear catalogue, cart and checkout, with stock management and the payment methods your customers actually use.',
                        'bullets' => [
                            'WooCommerce or a store built from scratch',
                            'Card, Apple Pay and bank transfer payments',
                            'Product, stock and order management',
                        ],
                        'duration_label' => '2 to 6 weeks',
                    ],
                    'es' => [
                        'title' => 'Tiendas online',
                        'description' => 'Catálogo, carrito y checkout claros, con gestión de stock y los métodos de pago que la gente usa de verdad.',
                        'bullets' => [
                            'WooCommerce o tienda desarrollada a medida',
                            'Pagos con tarjeta, Bizum y transferencia',
                            'Gestión de productos, stock y pedidos',
                        ],
                        'duration_label' => '2 a 6 semanas',
                    ],
                ],
            ],
            [
                'slug' => 'maintenance',
                'icon' => 'wrench',
                'price_cents' => 6000,
                'is_monthly' => true,
                'sort_order' => 5,
                'translations' => [
                    'pt' => [
                        'title' => 'Manutenção & suporte',
                        'description' => 'Atualizações, backups, correções e pequenas melhorias todos os meses. Para não ter de se lembrar do site outra vez.',
                        'bullets' => [
                            'Atualizações de segurança',
                            'Backups verificados e cópia de segurança',
                            'Horas de melhorias incluídas',
                        ],
                        'duration_label' => null,
                    ],
                    'en' => [
                        'title' => 'Maintenance & support',
                        'description' => 'Updates, backups, fixes and small improvements every month. So you never have to think about the site again.',
                        'bullets' => [
                            'Security updates',
                            'Verified backups and a safe copy',
                            'Improvement hours included',
                        ],
                        'duration_label' => null,
                    ],
                    'es' => [
                        'title' => 'Mantenimiento y soporte',
                        'description' => 'Actualizaciones, backups, correcciones y pequeñas mejoras cada mes. Para no tener que acordarte del sitio otra vez.',
                        'bullets' => [
                            'Actualizaciones de seguridad',
                            'Backups verificados y copia de seguridad',
                            'Horas de mejoras incluidas',
                        ],
                        'duration_label' => null,
                    ],
                ],
            ],
        ];

        foreach ($services as $data) {
            $translations = $data['translations'];
            unset($data['translations']);

            $service = Service::updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true])
            );

            foreach ($translations as $locale => $fields) {
                $service->translations()->updateOrCreate(
                    ['locale' => $locale],
                    $fields
                );
            }
        }
    }

    private function seedProjects(): void
    {
        $projects = [
            [
                'slug' => 'order-dashboard',
                'category' => 'app',
                'media_key' => 'dashboard',
                'year' => 2026,
                'sort_order' => 1,
                'tech' => ['PHP', 'MySQL', 'JavaScript'],
                'translations' => [
                    'pt' => [
                        'badge' => 'Projeto de formação',
                        'title' => 'Painel de gestão de encomendas',
                        'subtitle' => 'Projeto de formação · 2026',
                        'description' => 'Registo de clientes, encomendas e estados, com listagens filtráveis e um resumo em gráficos. Fi-lo durante a formação, do modelo de dados ao interface.',
                        'media_alt' => 'Painel de gestão de encomendas com gráfico de barras',
                    ],
                    'en' => [
                        'badge' => 'Course project',
                        'title' => 'Order management dashboard',
                        'subtitle' => 'Course project · 2026',
                        'description' => 'Customers, orders and statuses, with filterable listings and a summary in charts. I built it during the course, from the data model to the interface.',
                        'media_alt' => 'Order management dashboard with bar chart',
                    ],
                    'es' => [
                        'badge' => 'Proyecto de formación',
                        'title' => 'Panel de gestión de pedidos',
                        'subtitle' => 'Proyecto de formación · 2026',
                        'description' => 'Registro de clientes, pedidos y estados, con listados filtrables y un resumen en gráficos. Lo hice durante la formación, del modelo de datos a la interfaz.',
                        'media_alt' => 'Panel de gestión de pedidos con gráfico de barras',
                    ],
                ],
            ],
            [
                'slug' => 'online-store',
                'category' => 'ecommerce',
                'media_key' => 'shop',
                'year' => 2026,
                'sort_order' => 2,
                'tech' => ['PHP', 'MySQL', 'JavaScript'],
                'translations' => [
                    'pt' => [
                        'badge' => 'Projeto de formação',
                        'title' => 'Loja online com carrinho e checkout',
                        'subtitle' => 'Projeto de formação · 2026',
                        'description' => 'Catálogo com filtros, carrinho persistente, gestão de stock e checkout com pagamento simulado. Exercício completo de e-commerce feito durante a formação.',
                        'media_alt' => 'Loja online com grelha de produtos e carrinho',
                    ],
                    'en' => [
                        'badge' => 'Course project',
                        'title' => 'Online store with cart and checkout',
                        'subtitle' => 'Course project · 2026',
                        'description' => 'Filterable catalogue, persistent cart, stock management and checkout with a simulated payment. A full e-commerce exercise from the course.',
                        'media_alt' => 'Online store with product grid and cart',
                    ],
                    'es' => [
                        'badge' => 'Proyecto de formación',
                        'title' => 'Tienda online con carrito y checkout',
                        'subtitle' => 'Proyecto de formación · 2026',
                        'description' => 'Catálogo con filtros, carrito persistente, gestión de stock y checkout con pago simulado. Ejercicio completo de e-commerce hecho durante la formación.',
                        'media_alt' => 'Tienda online con cuadrícula de productos y carrito',
                    ],
                ],
            ],
            [
                'slug' => 'booking-system',
                'category' => 'app',
                'media_key' => 'calendar',
                'year' => 2026,
                'sort_order' => 3,
                'tech' => ['JavaScript', 'PHP', 'MySQL'],
                'translations' => [
                    'pt' => [
                        'badge' => 'Projeto pessoal',
                        'title' => 'Sistema de marcações',
                        'subtitle' => 'Projeto pessoal · 2026',
                        'description' => 'Agenda semanal com marcação de horários, validação de conflitos e confirmação por email. Fi-lo por gosto, para aprofundar gestão de datas e envio de notificações.',
                        'media_alt' => 'Sistema de marcações com calendário semanal',
                    ],
                    'en' => [
                        'badge' => 'Personal project',
                        'title' => 'Booking system',
                        'subtitle' => 'Personal project · 2026',
                        'description' => 'Weekly calendar with slot booking, conflict checks and email confirmation. I built it for the fun of it, to dig into dates and notifications.',
                        'media_alt' => 'Booking system with weekly calendar',
                    ],
                    'es' => [
                        'badge' => 'Proyecto personal',
                        'title' => 'Sistema de reservas',
                        'subtitle' => 'Proyecto personal · 2026',
                        'description' => 'Agenda semanal con reserva de horarios, validación de conflictos y confirmación por email. Lo hice por gusto, para profundizar en la gestión de fechas y las notificaciones.',
                        'media_alt' => 'Sistema de reservas con calendario semanal',
                    ],
                ],
            ],
            [
                'slug' => 'sme-website',
                'category' => 'web',
                'media_key' => 'landing',
                'year' => 2026,
                'sort_order' => 4,
                'tech' => ['HTML5', 'Tailwind', 'JavaScript'],
                'translations' => [
                    'pt' => [
                        'badge' => 'Demonstração',
                        'title' => 'Site institucional para PME',
                        'subtitle' => 'Projeto de demonstração · 2026',
                        'description' => 'Site de uma página, mobile-first, com formulário de contacto, animações ao scroll e SEO técnico. É o mesmo tipo de trabalho que este site que está a ver. Foi feito para mostrar, não para um cliente.',
                        'media_alt' => 'Website institucional com secção hero e cartões',
                    ],
                    'en' => [
                        'badge' => 'Demo',
                        'title' => 'Business site for a small company',
                        'subtitle' => 'Demo project · 2026',
                        'description' => 'One-page, mobile-first site with a contact form, scroll animations and technical SEO. Same kind of work as the site you\'re looking at. Built to show, not for a client.',
                        'media_alt' => 'Business website with hero section and cards',
                    ],
                    'es' => [
                        'badge' => 'Demostración',
                        'title' => 'Web corporativa para una pyme',
                        'subtitle' => 'Proyecto de demostración · 2026',
                        'description' => 'Sitio de una página, mobile-first, con formulario de contacto, animaciones al hacer scroll y SEO técnico. Es el mismo tipo de trabajo que este sitio que estás viendo. Lo hice para mostrar, no para un cliente.',
                        'media_alt' => 'Web corporativa con sección hero y tarjetas',
                    ],
                ],
            ],
            [
                'slug' => 'rest-api',
                'category' => 'data',
                'media_key' => 'api',
                'year' => 2026,
                'sort_order' => 5,
                'tech' => ['Python', 'API REST', 'MySQL'],
                'translations' => [
                    'pt' => [
                        'badge' => 'Projeto pessoal',
                        'title' => 'API REST e automação de dados',
                        'subtitle' => 'Projeto pessoal · 2026',
                        'description' => 'API própria para expor e consumir dados em JSON, com scripts em Python a recolher e a tratar informação sem ninguém tocar em nada. Back-end puro, por gosto.',
                        'media_alt' => 'Diagrama de integração entre bases de dados e serviços',
                    ],
                    'en' => [
                        'badge' => 'Personal project',
                        'title' => 'REST API and data automation',
                        'subtitle' => 'Personal project · 2026',
                        'description' => 'My own API to serve and consume JSON, with Python scripts collecting and cleaning data without anyone touching a thing. Pure back end, for the fun of it.',
                        'media_alt' => 'Integration diagram between databases and services',
                    ],
                    'es' => [
                        'badge' => 'Proyecto personal',
                        'title' => 'API REST y automatización de datos',
                        'subtitle' => 'Proyecto personal · 2026',
                        'description' => 'API propia para exponer y consumir datos en JSON, con scripts en Python que recogen y tratan información sin que nadie toque nada. Back-end puro, por gusto.',
                        'media_alt' => 'Diagrama de integración entre bases de datos y servicios',
                    ],
                ],
            ],
            [
                'slug' => 'members-portal',
                'category' => 'web',
                'media_key' => 'portal',
                'year' => 2026,
                'sort_order' => 6,
                'tech' => ['PHP', 'MySQL', 'JavaScript'],
                'translations' => [
                    'pt' => [
                        'badge' => 'Projeto de formação',
                        'title' => 'Portal com área reservada',
                        'subtitle' => 'Projeto de formação · 2026',
                        'description' => 'Site público com área privada: registo, sessão, recuperação de password e níveis de permissão. Exercício de autenticação e segurança feito durante a formação.',
                        'media_alt' => 'Portal com área reservada em telemóvel e desktop',
                    ],
                    'en' => [
                        'badge' => 'Course project',
                        'title' => 'Portal with a members area',
                        'subtitle' => 'Course project · 2026',
                        'description' => 'Public site with a private area: sign-up, sessions, password recovery and permission levels. An authentication and security exercise from the course.',
                        'media_alt' => 'Members portal on phone and desktop',
                    ],
                    'es' => [
                        'badge' => 'Proyecto de formación',
                        'title' => 'Portal con área privada',
                        'subtitle' => 'Proyecto de formación · 2026',
                        'description' => 'Sitio público con área privada: registro, sesión, recuperación de contraseña y niveles de permiso. Ejercicio de autenticación y seguridad hecho durante la formación.',
                        'media_alt' => 'Portal con área privada en móvil y escritorio',
                    ],
                ],
            ],
        ];

        foreach ($projects as $data) {
            $translations = $data['translations'];
            $techNames = $data['tech'];
            unset($data['translations'], $data['tech']);

            $project = Project::updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['status' => 'published'])
            );

            foreach ($translations as $locale => $fields) {
                $project->translations()->updateOrCreate(
                    ['locale' => $locale],
                    $fields
                );
            }

            $sync = [];
            foreach ($techNames as $i => $name) {
                $tech = Technology::query()->where('name', $name)->first();
                if ($tech) {
                    $sync[$tech->id] = ['sort_order' => $i + 1];
                }
            }
            $project->technologies()->sync($sync);
        }
    }

    private function seedCommitments(): void
    {
        $items = [
            [
                'sort_order' => 1,
                'translations' => [
                    'pt' => [
                        'label' => 'Compromisso 01',
                        'title' => 'Âmbito, prazo e preço por escrito',
                        'subtitle' => 'Antes de qualquer pagamento',
                        'body' => 'Não tenho carteira de clientes para exibir, por isso ponho tudo por escrito antes de começar: o que vai ser feito, quando fica pronto e quanto custa. O preço só muda se o pedido mudar, e sempre com o seu acordo.',
                    ],
                    'en' => [
                        'label' => 'Commitment 01',
                        'title' => 'Scope, deadline and price in writing',
                        'subtitle' => 'Before any payment',
                        'body' => 'I have no client list to show off, so everything goes in writing before we start: what gets done, when it\'s ready and what it costs. The price only changes if the request changes, and always with your agreement.',
                    ],
                    'es' => [
                        'label' => 'Compromiso 01',
                        'title' => 'Alcance, plazo y precio por escrito',
                        'subtitle' => 'Antes de cualquier pago',
                        'body' => 'No tengo cartera de clientes que exhibir, así que lo pongo todo por escrito antes de empezar: qué se va a hacer, cuándo estará listo y cuánto cuesta. El precio solo cambia si cambia el encargo, y siempre con tu acuerdo.',
                    ],
                ],
            ],
            [
                'sort_order' => 2,
                'translations' => [
                    'pt' => [
                        'label' => 'Compromisso 02',
                        'title' => 'Vê o trabalho antes de fechar',
                        'subtitle' => 'Sem comprar às cegas',
                        'body' => 'Mostro-lhe uma versão navegável a meio do caminho e só fecho contas quando a aprovar. Prefiro gastar mais horas do que gastar a sua confiança.',
                    ],
                    'en' => [
                        'label' => 'Commitment 02',
                        'title' => 'You see the work before closing',
                        'subtitle' => 'No buying blind',
                        'body' => 'You get a clickable version halfway through and I only settle up once you approve it. I\'d rather spend extra hours than spend your trust.',
                    ],
                    'es' => [
                        'label' => 'Compromiso 02',
                        'title' => 'Ves el trabajo antes de cerrar',
                        'subtitle' => 'Sin comprar a ciegas',
                        'body' => 'Te muestro una versión navegable a mitad de camino y solo cierro cuentas cuando la apruebas. Prefiero gastar más horas que gastar tu confianza.',
                    ],
                ],
            ],
            [
                'sort_order' => 3,
                'translations' => [
                    'pt' => [
                        'label' => 'Compromisso 03',
                        'title' => 'Tecnologia de agora',
                        'subtitle' => 'Formação concluída em 2026',
                        'body' => 'Acabei a formação agora. Aprendi as práticas que se usam hoje: mobile-first, segurança, bases de dados bem modeladas e código que outra pessoa consegue continuar.',
                    ],
                    'en' => [
                        'label' => 'Commitment 03',
                        'title' => 'Today\'s technology',
                        'subtitle' => 'Course completed in 2026',
                        'body' => 'I finished the course just now. I learned the practices people use today: mobile-first, security, well-modelled databases and code someone else can pick up.',
                    ],
                    'es' => [
                        'label' => 'Compromiso 03',
                        'title' => 'Tecnología de ahora',
                        'subtitle' => 'Formación terminada en 2026',
                        'body' => 'Acabo de terminar la formación. Aprendí las prácticas que se usan hoy: mobile-first, seguridad, bases de datos bien modeladas y código que otra persona puede continuar.',
                    ],
                ],
            ],
            [
                'sort_order' => 4,
                'translations' => [
                    'pt' => [
                        'label' => 'Compromisso 04',
                        'title' => 'Atenção sem fila de espera',
                        'subtitle' => 'No máximo dois projetos',
                        'body' => 'Não vai disputar a atenção de uma agência com dezenas de clientes. Aceito no máximo dois projetos ao mesmo tempo e quem lhe responde é sempre a mesma pessoa: eu.',
                    ],
                    'en' => [
                        'label' => 'Commitment 04',
                        'title' => 'Attention without a queue',
                        'subtitle' => 'Two projects at most',
                        'body' => 'You won\'t be competing for the attention of an agency with dozens of clients. I take on two projects at a time at most and the person answering you is always the same one: me.',
                    ],
                    'es' => [
                        'label' => 'Compromiso 04',
                        'title' => 'Atención sin lista de espera',
                        'subtitle' => 'Dos proyectos como máximo',
                        'body' => 'No vas a competir por la atención de una agencia con decenas de clientes. Acepto como máximo dos proyectos a la vez y quien te responde es siempre la misma persona: yo.',
                    ],
                ],
            ],
            [
                'sort_order' => 5,
                'translations' => [
                    'pt' => [
                        'label' => 'Compromisso 05',
                        'title' => 'Preço de quem está a começar',
                        'subtitle' => 'Em troca do portfólio',
                        'body' => 'Os primeiros trabalhos ficam abaixo do preço de mercado. Em troca, peço só autorização para os mostrar aqui e o seu feedback honesto no fim.',
                    ],
                    'en' => [
                        'label' => 'Commitment 05',
                        'title' => 'Starting-out prices',
                        'subtitle' => 'In exchange for the portfolio',
                        'body' => 'The first jobs come in below market price. In exchange I only ask for permission to show them here and your honest feedback at the end.',
                    ],
                    'es' => [
                        'label' => 'Compromiso 05',
                        'title' => 'Precio de quien está empezando',
                        'subtitle' => 'A cambio del portafolio',
                        'body' => 'Los primeros trabajos quedan por debajo del precio de mercado. A cambio solo pido permiso para mostrarlos aquí y tu opinión sincera al final.',
                    ],
                ],
            ],
        ];

        foreach ($items as $data) {
            $translations = $data['translations'];
            unset($data['translations']);

            $commitment = Commitment::updateOrCreate(
                ['sort_order' => $data['sort_order']],
                array_merge($data, ['is_active' => true])
            );

            foreach ($translations as $locale => $fields) {
                $commitment->translations()->updateOrCreate(
                    ['locale' => $locale],
                    $fields
                );
            }
        }
    }

    private function seedSettings(): void
    {
        Setting::putValue('email', 'ola@alexandremagno.dev');
        Setting::putValue('phone', '+351912345678');
        Setting::putValue('whatsapp', '351912345678');
    }
}
