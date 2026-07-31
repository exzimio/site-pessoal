/**
 * i18n.js — traduções PT / EN / ES
 * ---------------------------------------------------------------------------
 * O HTML está escrito em português: é essa a versão de referência. No arranque
 * o script lê o texto que já está na página e guarda-o como dicionário `pt`,
 * por isso só é preciso manter aqui as traduções de inglês e espanhol.
 *
 * Marcação usada no HTML:
 *   data-i18n="chave"                     → substitui o texto do elemento
 *   data-i18n-html="chave"                → substitui o HTML interno (permite <span>, <a>)
 *   data-i18n-attr="placeholder:chave"    → substitui atributos (vários separados por ;)
 *
 * Idioma escolhido fica em localStorage. A troca não recarrega a página:
 * o conteúdo faz um fade curto, o texto muda e o main.js volta a preparar o
 * título do hero e as mensagens do formulário (evento `i18n:change`).
 */
(function () {
  "use strict";

  const STORAGE_KEY = "lang";
  const SUPPORTED = ["pt", "en", "es"];
  const HTML_LANG = { pt: "pt-PT", en: "en", es: "es" };
  const OG_LOCALE = { pt: "pt_PT", en: "en_US", es: "es_ES" };

  /* =========================================================================
     TEXTOS QUE NÃO ESTÃO NO HTML
     Mensagens compostas em JavaScript (estados do formulário, aria dinâmicos).
     {name} e {email} são substituídos em tempo de execução.
     ========================================================================= */
  const RUNTIME_PT = {
    "nav.menuOpen": "Abrir menu",
    "nav.menuClose": "Fechar menu",
    "fab.closeAria": "Fechar opções de contacto",
    "partnership.dotAria": "Compromisso {n} de {total}",
    "form.sending": "A enviar…",
    "form.statusThanks": "Mensagem enviada. Obrigado!",
    "form.statusReview": "Reveja os campos assinalados, por favor.",
    "form.statusMailto":
      "Abri o seu programa de email com a mensagem pronta a enviar.",
    "form.statusSent": "Mensagem enviada. Respondo em menos de 24 horas úteis.",
    "form.statusFail":
      "Não foi possível enviar. Tente outra vez ou escreva para {email}.",
    "form.mailSubject": "Novo pedido de projeto de {name}",
    "form.mailName": "Nome",
    "form.mailEmail": "Email",
    "form.mailCompany": "Empresa",
    "form.mailType": "Tipo de projeto",
    "form.mailBudget": "Orçamento",
    "form.mailEmpty": "(não indicada)",
  };

  /* =========================================================================
     DICIONÁRIOS
     ========================================================================= */
  const DICT = {
    en: {
      "meta.title":
        "Alexandre Magno · Fullstack Developer | Websites and Web Apps",
      "meta.description":
        "Fullstack developer, freshly trained. I build websites, web apps and databases for small businesses. Current technology, full attention on your project and starting-out rates. Portugal, 100% remote.",

      "a11y.skip": "Skip to content",
      "header.logoAria": "Alexandre Magno, back to top",
      "nav.mainAria": "Main navigation",
      "nav.mobileAria": "Mobile navigation",
      "nav.about": "About",
      "nav.services": "Services",
      "nav.projects": "Projects",
      "nav.stack": "Stack",
      "nav.partnership": "Partnership",
      "nav.cta": "Get a quote",
      "nav.menuOpen": "Open menu",
      "nav.menuClose": "Close menu",
      "lang.aria": "Choose language",
      "theme.aria": "Switch between dark and light theme",

      "hero.badge": "Available for my first projects",
      "hero.title":
        'Modern software that <span class="text-gradient">works</span> for your business.',
      "hero.lead":
        "I'm Alexandre, a fullstack developer. I've just finished an intensive web development course and I'm building my client list. That means current technology, full attention on your project and the rates of someone starting out.",
      "hero.cta1": "Tell me about your project",
      "hero.cta2": "See projects",
      "hero.stat1.label": "Training",
      "hero.stat1.unit": "months",
      "hero.stat2.label": "Classes/week",
      "hero.stat3.label": "Reply",
      "hero.stat3.value": "< 24h",
      "hero.stat4.label": "In parallel",
      "hero.stat4.value": "Max. 2",
      "hero.scroll": "Scroll",
      "hero.scrollAria": "Scroll down to the About section",

      "marquee.aria": "Areas of work",
      "marquee.1": "Business websites",
      "marquee.2": "Web apps",
      "marquee.3": "Databases",
      "marquee.4": "Online stores",
      "marquee.5": "APIs and integrations",
      "marquee.6": "Mobile-first",
      "marquee.7": "Maintenance",

      "about.eyebrow": "About me",
      "about.title": "I'm just starting out. That works in your favour.",
      "about.p1":
        "I've just finished an intensive fullstack web developer course. Seven months, live classes every evening, taught by people who code for a living. Theory was thin on the ground. The exercises came out of real projects, built for real clients.",
      "about.p2":
        "I came out with both halves of the job in hand. On the front end, HTML, CSS and JavaScript, always thinking about the phone first. On the back end, PHP, Python, MySQL databases, APIs and integrations. The course is recognised and awarded by the Portuguese State, under Portugal INCoDe.2030.",
      "about.p3":
        "I don't have a decade in the market to show you. I have the stack people use today, real time to spend on your project and every reason to let my first jobs speak for me. I talk plainly, not in <em>tech-speak</em>. Every decision comes explained in cost, time and risk.",
      "about.tl1.date": "Now",
      "about.tl1.title": "Independent fullstack developer",
      "about.tl1.text":
        "Available for my first projects. Open calendar and full attention.",
      "about.tl2.date": "2026",
      "about.tl2.title": "Fullstack course completed",
      "about.tl2.text":
        "Seven months of daily practice in front end, back end and databases.",
      "about.tl3.date": "Ongoing",
      "about.tl3.title": "Own projects and study",
      "about.tl3.text":
        "Every new project is a reason to take one technology deeper.",
      "about.code.intro": "// No surprises on the invoice, no invented deadlines.",
      "about.code.varname": "process",
      "about.code.s1": '"1. Diagnosis"',
      "about.code.c1": "// understand the business",
      "about.code.s2": '"2. Fixed quote"',
      "about.code.c2": "// price and deadline in writing",
      "about.code.s3": '"3. Weekly deliveries"',
      "about.code.c3": "// you see real progress",
      "about.code.s4": '"4. Deploy + handover"',
      "about.code.c4": "// you stay independent",
      "about.code.s5": '"5. Ongoing support"',
      "about.code.c5": "// optional",
      "about.pr1.title": "Fixed price",
      "about.pr1.text": "Fixed quote for a defined scope. No surprise hours.",
      "about.pr2.title": "Your code",
      "about.pr2.text": "Repository and servers in your name. Zero lock-in.",
      "about.pr3.title": "Fast by default",
      "about.pr3.text":
        "Light, optimised sites. The one you're reading is the example.",
      "about.pr4.title": "One contact",
      "about.pr4.text": "You always talk to me. No managers in between.",

      "services.eyebrow": "Services",
      "services.title": "What I can build for you.",
      "services.lead":
        "I work end to end, from the first sketch to the server. You can hire a single piece or the whole project. The figures below are the rates of someone building a portfolio.",
      "services.s1.title": "Business websites",
      "services.s1.desc":
        "Light sites, hand-written in HTML, CSS and JavaScript. No page builders, no heavy themes. Built for the phone first and to show up on Google.",
      "services.s1.b1": "Responsive, mobile-first design",
      "services.s1.b2": "Simple panel to edit text and images",
      "services.s1.b3": "Technical SEO and GDPR compliance",
      "services.s1.price":
        'From <span class="text-fg">€450</span> · 1 to 3 weeks',
      "services.s2.title": "Custom web apps",
      "services.s2.desc":
        "Client areas, admin panels and small automations that replace spreadsheets and paper records.",
      "services.s2.b1": "Login, permissions and user management",
      "services.s2.b2": "Full records on top of a database",
      "services.s2.b3": "Listings, filters and export to Excel",
      "services.s2.price":
        'From <span class="text-fg">€1,200</span> · 3 to 8 weeks',
      "services.s3.title": "Databases & integrations",
      "services.s3.desc":
        "Well-structured data modelling, APIs to connect systems that don't talk to each other today and scripts that save repetitive work.",
      "services.s3.b1": "MySQL modelling and queries",
      "services.s3.b2": "REST APIs and JSON data exchange",
      "services.s3.b3": "Python automations and backups",
      "services.s3.price":
        'From <span class="text-fg">€350</span> · 1 to 4 weeks',
      "services.s4.title": "Online stores",
      "services.s4.desc":
        "A clear catalogue, cart and checkout, with stock management and the payment methods your customers actually use.",
      "services.s4.b1": "WooCommerce or a store built from scratch",
      "services.s4.b2": "Card, Apple Pay and bank transfer payments",
      "services.s4.b3": "Product, stock and order management",
      "services.s4.price":
        'From <span class="text-fg">€900</span> · 2 to 6 weeks',
      "services.s5.title": "Maintenance & support",
      "services.s5.desc":
        "Updates, backups, fixes and small improvements every month. So you never have to think about the site again.",
      "services.s5.b1": "Security updates",
      "services.s5.b2": "Verified backups and a safe copy",
      "services.s5.b3": "Improvement hours included",
      "services.s5.price": 'From <span class="text-fg">€60</span> / month',
      "services.cta.title": "Can't find what you need?",
      "services.cta.text":
        "Describe the problem in two lines. If it's something I do well, I'll tell you how and how much. If it isn't, I'll say so and point you to someone who does.",
      "services.cta.btn": "Book a 20-min call",

      "projects.eyebrow": "Projects",
      "projects.title": "What I've built so far, no make-up.",
      "projects.lead":
        "I don't have client work to show yet. What's here was built during the course, on my own initiative or as a demo. Each card says which is which.",
      "projects.filtersAria": "Filter projects by category",
      "projects.filter.all": "All",
      "projects.filter.web": "Websites",
      "projects.filter.app": "Web apps",
      "projects.filter.ecommerce": "E-commerce",
      "projects.filter.data": "Data",
      "projects.p1.badge": "Course project",
      "projects.p1.title": "Order management dashboard",
      "projects.p1.meta": "Course project · 2026",
      "projects.p1.desc":
        "Customers, orders and statuses, with filterable listings and a summary in charts. I built it during the course, from the data model to the interface.",
      "projects.p2.badge": "Course project",
      "projects.p2.title": "Online store with cart and checkout",
      "projects.p2.meta": "Course project · 2026",
      "projects.p2.desc":
        "Filterable catalogue, persistent cart, stock management and checkout with a simulated payment. A full e-commerce exercise from the course.",
      "projects.p3.badge": "Personal project",
      "projects.p3.title": "Booking system",
      "projects.p3.meta": "Personal project · 2026",
      "projects.p3.desc":
        "Weekly calendar with slot booking, conflict checks and email confirmation. I built it for the fun of it, to dig into dates and notifications.",
      "projects.p4.badge": "Demo",
      "projects.p4.title": "Business site for a small company",
      "projects.p4.meta": "Demo project · 2026",
      "projects.p4.desc":
        "One-page, mobile-first site with a contact form, scroll animations and technical SEO. Same kind of work as the site you're looking at. Built to show, not for a client.",
      "projects.p5.badge": "Personal project",
      "projects.p5.title": "REST API and data automation",
      "projects.p5.meta": "Personal project · 2026",
      "projects.p5.desc":
        "My own API to serve and consume JSON, with Python scripts collecting and cleaning data without anyone touching a thing. Pure back end, for the fun of it.",
      "projects.p6.badge": "Course project",
      "projects.p6.title": "Portal with a members area",
      "projects.p6.meta": "Course project · 2026",
      "projects.p6.desc":
        "Public site with a private area: sign-up, sessions, password recovery and permission levels. An authentication and security exercise from the course.",
      "projects.empty":
        'I don\'t have a published project in this category yet. <a href="#contacto" class="text-accent underline underline-offset-4">Talk to me</a> and I\'ll explain how I would do it.',

      "stack.eyebrow": "Stack",
      "stack.title": "The tools I work with.",
      "stack.lead":
        "These are the technologies I trained in and the ones I work with every day. If your project needs something outside this list, I'll say so plainly. And if it's not my thing, I'll point you to someone better.",
      "stack.note1": "Code versioned in Git from day one",
      "stack.note2": "Automatic deploys from the repository",
      "stack.note3": "Semantic, accessible, optimised HTML",

      "partnership.eyebrow": "Partnership",
      "partnership.title": "Let's build the first success story together.",
      "partnership.lead":
        "I don't have client testimonials yet. Making them up would be easy, but that's not how I want to start. Here are the commitments I make to whoever trusts me first.",
      "partnership.prevAria": "Previous commitment",
      "partnership.nextAria": "Next commitment",
      "partnership.sliderAria":
        "Work commitments (use the arrows to navigate)",
      "partnership.dotsAria": "Choose commitment",
      "partnership.dotAria": "Commitment {n} of {total}",
      "partnership.c1.label": "Commitment 01",
      "partnership.c1.text":
        "I have no client list to show off, so everything goes in writing before we start: what gets done, when it's ready and what it costs. The price only changes if the request changes, and always with your agreement.",
      "partnership.c1.title": "Scope, deadline and price in writing",
      "partnership.c1.sub": "Before any payment",
      "partnership.c2.label": "Commitment 02",
      "partnership.c2.text":
        "You get a clickable version halfway through and I only settle up once you approve it. I'd rather spend extra hours than spend your trust.",
      "partnership.c2.title": "You see the work before closing",
      "partnership.c2.sub": "No buying blind",
      "partnership.c3.label": "Commitment 03",
      "partnership.c3.text":
        "I finished the course just now. I learned the practices people use today: mobile-first, security, well-modelled databases and code someone else can pick up.",
      "partnership.c3.title": "Today's technology",
      "partnership.c3.sub": "Course completed in 2026",
      "partnership.c4.label": "Commitment 04",
      "partnership.c4.text":
        "You won't be competing for the attention of an agency with dozens of clients. I take on two projects at a time at most and the person answering you is always the same one: me.",
      "partnership.c4.title": "Attention without a queue",
      "partnership.c4.sub": "Two projects at most",
      "partnership.c5.label": "Commitment 05",
      "partnership.c5.text":
        "The first jobs come in below market price. In exchange I only ask for permission to show them here and your honest feedback at the end.",
      "partnership.c5.title": "Starting-out prices",
      "partnership.c5.sub": "In exchange for the portfolio",

      "contact.eyebrow": "Contact",
      "contact.title": "Let's talk about your project.",
      "contact.lead":
        "Tell me what you need in a few lines. I reply in under 24 working hours with an honest opinion, no strings and no sales pitch.",
      "contact.baseLabel": "Based in",
      "contact.baseValue": "Portugal · 100% remote",
      "contact.social": "Also here",

      "form.name": "Name *",
      "form.namePh": "Jane Smith",
      "form.nameError": "Please tell me your name.",
      "form.email": "Email *",
      "form.emailPh": "jane@company.com",
      "form.emailError": "Please enter a valid email.",
      "form.company": "Company",
      "form.companyPh": "Company Ltd.",
      "form.type": "Project type",
      "form.type1": "Business website",
      "form.type2": "Web app",
      "form.type3": "Online store",
      "form.type4": "Database / integration",
      "form.type5": "Maintenance of an existing project",
      "form.type6": "Something else / not sure yet",
      "form.budget": "Rough budget",
      "form.budget1": "Up to €500",
      "form.budget2": "€500 to €1,500",
      "form.budget3": "€1,500 to €3,000",
      "form.budget4": "More than €3,000",
      "form.budget5": "I need help working it out",
      "form.message": "Message *",
      "form.messagePh": "What do you need to solve? What's the ideal deadline?",
      "form.messageError": "Please write at least 10 characters.",
      "form.rgpd":
        'I agree to my data being processed to answer this enquiry, under the <a href="#" class="text-accent underline underline-offset-2">privacy policy</a>. *',
      "form.rgpdError": "You need to accept this to send.",
      "form.submit": "Send message",
      "form.alt":
        'Or write straight to <a href="mailto:ola@alexandremagno.dev" class="text-accent underline underline-offset-2">ola@alexandremagno.dev</a>',
      "form.sending": "Sending…",
      "form.statusThanks": "Message sent. Thank you!",
      "form.statusReview": "Please check the highlighted fields.",
      "form.statusMailto":
        "Your email app just opened with the message ready to send.",
      "form.statusSent":
        "Message sent. I reply in under 24 working hours.",
      "form.statusFail":
        "It couldn't be sent. Try again or write to {email}.",
      "form.mailSubject": "New project enquiry from {name}",
      "form.mailName": "Name",
      "form.mailEmail": "Email",
      "form.mailCompany": "Company",
      "form.mailType": "Project type",
      "form.mailBudget": "Budget",
      "form.mailEmpty": "(not given)",

      "footer.tagline":
        "Fullstack developer, freshly trained. I build websites and web apps for small businesses. Light, secure and easy to maintain.",
      "footer.availability": "Available for my first projects",
      "footer.navAria": "Site sections",
      "footer.siteTitle": "Site",
      "footer.servicesAria": "Services",
      "footer.servicesTitle": "Services",
      "footer.sv1": "Websites",
      "footer.sv2": "Web apps",
      "footer.sv3": "Databases",
      "footer.sv4": "Online stores",
      "footer.sv5": "Maintenance",
      "footer.contactTitle": "Contact",
      "footer.location": "Portugal · remote",
      "footer.copyright":
        "Alexandre Magno · VAT 000 000 000 · All rights reserved",
      "footer.privacy": "Privacy policy",
      "footer.terms": "Terms",
      "footer.complaints": "Complaints book",

      "fab.email": "Send email",
      "fab.openAria": "Open quick contact options",
      "fab.closeAria": "Close contact options",
    },

    es: {
      "meta.title":
        "Alexandre Magno · Desarrollador Fullstack | Webs y Aplicaciones Web",
      "meta.description":
        "Desarrollador fullstack recién formado. Creo webs, aplicaciones web y bases de datos para pequeños negocios. Tecnología actual, atención total al proyecto y precios de quien está empezando. Portugal, 100% remoto.",

      "a11y.skip": "Saltar al contenido",
      "header.logoAria": "Alexandre Magno, ir al inicio",
      "nav.mainAria": "Navegación principal",
      "nav.mobileAria": "Navegación móvil",
      "nav.about": "Sobre mí",
      "nav.services": "Servicios",
      "nav.projects": "Proyectos",
      "nav.stack": "Stack",
      "nav.partnership": "Colaboración",
      "nav.cta": "Pedir presupuesto",
      "nav.menuOpen": "Abrir menú",
      "nav.menuClose": "Cerrar menú",
      "lang.aria": "Elegir idioma",
      "theme.aria": "Cambiar entre tema oscuro y claro",

      "hero.badge": "Disponible para los primeros proyectos",
      "hero.title":
        'Software moderno que <span class="text-gradient">trabaja</span> para tu negocio.',
      "hero.lead":
        "Soy Alexandre, desarrollador fullstack. Acabo de terminar una formación intensiva en desarrollo web y estoy construyendo mi cartera de clientes. Eso significa tecnología actual, atención total a tu proyecto y precios de quien está empezando.",
      "hero.cta1": "Hablemos de mi proyecto",
      "hero.cta2": "Ver proyectos",
      "hero.stat1.label": "Formación",
      "hero.stat1.unit": "meses",
      "hero.stat2.label": "Clases/semana",
      "hero.stat3.label": "Respuesta",
      "hero.stat3.value": "< 24h",
      "hero.stat4.label": "En paralelo",
      "hero.stat4.value": "Máx. 2",
      "hero.scroll": "Scroll",
      "hero.scrollAria": "Bajar a la sección Sobre mí",

      "marquee.aria": "Áreas de trabajo",
      "marquee.1": "Webs corporativas",
      "marquee.2": "Aplicaciones web",
      "marquee.3": "Bases de datos",
      "marquee.4": "Tiendas online",
      "marquee.5": "APIs e integraciones",
      "marquee.6": "Mobile-first",
      "marquee.7": "Mantenimiento",

      "about.eyebrow": "Sobre mí",
      "about.title": "Estoy empezando. Y eso juega a tu favor.",
      "about.p1":
        "Acabo de terminar una formación intensiva de programador web fullstack. Siete meses, clases en directo todas las noches, con gente que programa para vivir. Teoría, poca. Los ejercicios salían de proyectos reales, hechos para clientes finales.",
      "about.p2":
        "Salí con las dos mitades del trabajo en la mano. En el front-end, HTML, CSS y JavaScript, pensando siempre primero en el móvil. En el back-end, PHP, Python, bases de datos MySQL, APIs e integraciones. La formación está reconocida y distinguida por el Estado portugués, en el marco de Portugal INCoDe.2030.",
      "about.p3":
        "No tengo una década de mercado que enseñarte. Tengo el stack que se usa hoy, tiempo de verdad para tu proyecto y todo el interés en que los primeros trabajos hablen por mí. Hablo claro, no en <em>tech-speak</em>. Te explico cada decisión en coste, plazo y riesgo.",
      "about.tl1.date": "Ahora",
      "about.tl1.title": "Desarrollador fullstack independiente",
      "about.tl1.text":
        "Disponible para los primeros proyectos. Agenda abierta y atención total.",
      "about.tl2.date": "2026",
      "about.tl2.title": "Formación fullstack terminada",
      "about.tl2.text":
        "Siete meses de práctica diaria en front-end, back-end y bases de datos.",
      "about.tl3.date": "En continuo",
      "about.tl3.title": "Proyectos propios y estudio",
      "about.tl3.text":
        "Cada proyecto nuevo sirve para llevar una tecnología a fondo.",
      "about.code.intro":
        "// Sin sorpresas en la factura, sin plazos inventados.",
      "about.code.varname": "proceso",
      "about.code.s1": '"1. Diagnóstico"',
      "about.code.c1": "// entender el negocio",
      "about.code.s2": '"2. Presupuesto fijo"',
      "about.code.c2": "// precio y plazo por escrito",
      "about.code.s3": '"3. Entregas semanales"',
      "about.code.c3": "// ves progreso real",
      "about.code.s4": '"4. Deploy + formación"',
      "about.code.c4": "// te quedas autónomo",
      "about.code.s5": '"5. Soporte continuo"',
      "about.code.c5": "// opcional",
      "about.pr1.title": "Precio cerrado",
      "about.pr1.text":
        "Presupuesto fijo por alcance definido. Sin horas sorpresa.",
      "about.pr2.title": "El código es tuyo",
      "about.pr2.text":
        "Repositorio y servidores a tu nombre. Cero dependencia.",
      "about.pr3.title": "Rápido por defecto",
      "about.pr3.text":
        "Sitios ligeros y optimizados. El que estás viendo es el ejemplo.",
      "about.pr4.title": "Un solo contacto",
      "about.pr4.text": "Hablas siempre conmigo. Sin gestores en medio.",

      "services.eyebrow": "Servicios",
      "services.title": "Lo que puedo construir para ti.",
      "services.lead":
        "Trabajo de punta a punta, del primer boceto al servidor. Puedes contratar solo una pieza o el proyecto completo. Los importes de abajo son precios de quien está construyendo portafolio.",
      "services.s1.title": "Webs corporativas",
      "services.s1.desc":
        "Sitios ligeros, escritos a mano en HTML, CSS y JavaScript. Sin maquetadores ni plantillas pesadas. Pensados primero para el móvil y para aparecer en Google.",
      "services.s1.b1": "Diseño responsive, mobile-first",
      "services.s1.b2": "Panel sencillo para editar textos e imágenes",
      "services.s1.b3": "SEO técnico y cumplimiento del RGPD",
      "services.s1.price":
        'Desde <span class="text-fg">450 €</span> · 1 a 3 semanas',
      "services.s2.title": "Aplicaciones web a medida",
      "services.s2.desc":
        "Áreas de cliente, paneles de gestión y pequeñas automatizaciones que sustituyen hojas de Excel y registros en papel.",
      "services.s2.b1": "Login, permisos y gestión de usuarios",
      "services.s2.b2": "Registros completos sobre base de datos",
      "services.s2.b3": "Listados, filtros y exportación a Excel",
      "services.s2.price":
        'Desde <span class="text-fg">1.200 €</span> · 3 a 8 semanas',
      "services.s3.title": "Bases de datos e integraciones",
      "services.s3.desc":
        "Modelado de datos bien estructurado, APIs para conectar sistemas que hoy no se hablan y scripts que ahorran trabajo repetitivo.",
      "services.s3.b1": "Modelado y consultas en MySQL",
      "services.s3.b2": "APIs REST e intercambio de datos en JSON",
      "services.s3.b3": "Automatizaciones en Python y backups",
      "services.s3.price":
        'Desde <span class="text-fg">350 €</span> · 1 a 4 semanas',
      "services.s4.title": "Tiendas online",
      "services.s4.desc":
        "Catálogo, carrito y checkout claros, con gestión de stock y los métodos de pago que la gente usa de verdad.",
      "services.s4.b1": "WooCommerce o tienda desarrollada a medida",
      "services.s4.b2": "Pagos con tarjeta, Bizum y transferencia",
      "services.s4.b3": "Gestión de productos, stock y pedidos",
      "services.s4.price":
        'Desde <span class="text-fg">900 €</span> · 2 a 6 semanas',
      "services.s5.title": "Mantenimiento y soporte",
      "services.s5.desc":
        "Actualizaciones, backups, correcciones y pequeñas mejoras cada mes. Para no tener que acordarte del sitio otra vez.",
      "services.s5.b1": "Actualizaciones de seguridad",
      "services.s5.b2": "Backups verificados y copia de seguridad",
      "services.s5.b3": "Horas de mejoras incluidas",
      "services.s5.price": 'Desde <span class="text-fg">60 €</span> / mes',
      "services.cta.title": "¿No encuentras lo que necesitas?",
      "services.cta.text":
        "Descríbeme el problema en dos líneas. Si es algo que hago bien, te digo cómo y cuánto. Si no lo es, te lo digo igual y te indico quién lo hace.",
      "services.cta.btn": "Agendar una llamada de 20 min",

      "projects.eyebrow": "Proyectos",
      "projects.title": "Lo que ya he construido, sin maquillaje.",
      "projects.lead":
        "Todavía no tengo proyectos de clientes que mostrar. Lo que hay aquí lo construí durante la formación, por iniciativa propia o como demostración. Cada tarjeta dice cuál es el caso.",
      "projects.filtersAria": "Filtrar proyectos por categoría",
      "projects.filter.all": "Todos",
      "projects.filter.web": "Webs",
      "projects.filter.app": "Apps web",
      "projects.filter.ecommerce": "E-commerce",
      "projects.filter.data": "Datos",
      "projects.p1.badge": "Proyecto de formación",
      "projects.p1.title": "Panel de gestión de pedidos",
      "projects.p1.meta": "Proyecto de formación · 2026",
      "projects.p1.desc":
        "Registro de clientes, pedidos y estados, con listados filtrables y un resumen en gráficos. Lo hice durante la formación, del modelo de datos a la interfaz.",
      "projects.p2.badge": "Proyecto de formación",
      "projects.p2.title": "Tienda online con carrito y checkout",
      "projects.p2.meta": "Proyecto de formación · 2026",
      "projects.p2.desc":
        "Catálogo con filtros, carrito persistente, gestión de stock y checkout con pago simulado. Ejercicio completo de e-commerce hecho durante la formación.",
      "projects.p3.badge": "Proyecto personal",
      "projects.p3.title": "Sistema de reservas",
      "projects.p3.meta": "Proyecto personal · 2026",
      "projects.p3.desc":
        "Agenda semanal con reserva de horarios, validación de conflictos y confirmación por email. Lo hice por gusto, para profundizar en la gestión de fechas y las notificaciones.",
      "projects.p4.badge": "Demostración",
      "projects.p4.title": "Web corporativa para una pyme",
      "projects.p4.meta": "Proyecto de demostración · 2026",
      "projects.p4.desc":
        "Sitio de una página, mobile-first, con formulario de contacto, animaciones al hacer scroll y SEO técnico. Es el mismo tipo de trabajo que este sitio que estás viendo. Lo hice para mostrar, no para un cliente.",
      "projects.p5.badge": "Proyecto personal",
      "projects.p5.title": "API REST y automatización de datos",
      "projects.p5.meta": "Proyecto personal · 2026",
      "projects.p5.desc":
        "API propia para exponer y consumir datos en JSON, con scripts en Python que recogen y tratan información sin que nadie toque nada. Back-end puro, por gusto.",
      "projects.p6.badge": "Proyecto de formación",
      "projects.p6.title": "Portal con área privada",
      "projects.p6.meta": "Proyecto de formación · 2026",
      "projects.p6.desc":
        "Sitio público con área privada: registro, sesión, recuperación de contraseña y niveles de permiso. Ejercicio de autenticación y seguridad hecho durante la formación.",
      "projects.empty":
        'Todavía no tengo un proyecto publicado en esta categoría. <a href="#contacto" class="text-accent underline underline-offset-4">Habla conmigo</a> y te explico cómo lo haría.',

      "stack.eyebrow": "Stack",
      "stack.title": "Las herramientas con las que trabajo.",
      "stack.lead":
        "En estas tecnologías me formé y con ellas trabajo todos los días. Si tu proyecto pide algo fuera de esta lista, te lo digo con franqueza. Y si no es lo mío, te indico quién lo hace mejor.",
      "stack.note1": "Código versionado en Git desde el primer día",
      "stack.note2": "Deploy automático desde el repositorio",
      "stack.note3": "HTML semántico, accesible y optimizado",

      "partnership.eyebrow": "Colaboración",
      "partnership.title": "Vamos a construir la primera colaboración de éxito.",
      "partnership.lead":
        "Todavía no tengo testimonios de clientes. Inventarlos sería fácil, pero no es así como quiero empezar. Dejo en su lugar los compromisos que asumo con quien confíe en mí primero.",
      "partnership.prevAria": "Compromiso anterior",
      "partnership.nextAria": "Compromiso siguiente",
      "partnership.sliderAria":
        "Compromisos de trabajo (usa las flechas para navegar)",
      "partnership.dotsAria": "Elegir compromiso",
      "partnership.dotAria": "Compromiso {n} de {total}",
      "partnership.c1.label": "Compromiso 01",
      "partnership.c1.text":
        "No tengo cartera de clientes que exhibir, así que lo pongo todo por escrito antes de empezar: qué se va a hacer, cuándo estará listo y cuánto cuesta. El precio solo cambia si cambia el encargo, y siempre con tu acuerdo.",
      "partnership.c1.title": "Alcance, plazo y precio por escrito",
      "partnership.c1.sub": "Antes de cualquier pago",
      "partnership.c2.label": "Compromiso 02",
      "partnership.c2.text":
        "Te muestro una versión navegable a mitad de camino y solo cierro cuentas cuando la apruebas. Prefiero gastar más horas que gastar tu confianza.",
      "partnership.c2.title": "Ves el trabajo antes de cerrar",
      "partnership.c2.sub": "Sin comprar a ciegas",
      "partnership.c3.label": "Compromiso 03",
      "partnership.c3.text":
        "Acabo de terminar la formación. Aprendí las prácticas que se usan hoy: mobile-first, seguridad, bases de datos bien modeladas y código que otra persona puede continuar.",
      "partnership.c3.title": "Tecnología de ahora",
      "partnership.c3.sub": "Formación terminada en 2026",
      "partnership.c4.label": "Compromiso 04",
      "partnership.c4.text":
        "No vas a competir por la atención de una agencia con decenas de clientes. Acepto como máximo dos proyectos a la vez y quien te responde es siempre la misma persona: yo.",
      "partnership.c4.title": "Atención sin lista de espera",
      "partnership.c4.sub": "Dos proyectos como máximo",
      "partnership.c5.label": "Compromiso 05",
      "partnership.c5.text":
        "Los primeros trabajos quedan por debajo del precio de mercado. A cambio solo pido permiso para mostrarlos aquí y tu opinión sincera al final.",
      "partnership.c5.title": "Precio de quien está empezando",
      "partnership.c5.sub": "A cambio del portafolio",

      "contact.eyebrow": "Contacto",
      "contact.title": "Hablemos de tu proyecto.",
      "contact.lead":
        "Cuéntame en pocas líneas qué necesitas. Respondo en menos de 24 horas laborables con una opinión honesta, sin compromiso y sin discurso de ventas.",
      "contact.baseLabel": "Base",
      "contact.baseValue": "Portugal · 100% remoto",
      "contact.social": "También aquí",

      "form.name": "Nombre *",
      "form.namePh": "María García",
      "form.nameError": "Indica tu nombre.",
      "form.email": "Email *",
      "form.emailPh": "maria@empresa.es",
      "form.emailError": "Indica un email válido.",
      "form.company": "Empresa",
      "form.companyPh": "Empresa, S.L.",
      "form.type": "Tipo de proyecto",
      "form.type1": "Web corporativa",
      "form.type2": "Aplicación web",
      "form.type3": "Tienda online",
      "form.type4": "Base de datos / integración",
      "form.type5": "Mantenimiento de un proyecto existente",
      "form.type6": "Otro / aún no lo sé",
      "form.budget": "Presupuesto aproximado",
      "form.budget1": "Hasta 500 €",
      "form.budget2": "500 € a 1.500 €",
      "form.budget3": "1.500 € a 3.000 €",
      "form.budget4": "Más de 3.000 €",
      "form.budget5": "Necesito ayuda para definirlo",
      "form.message": "Mensaje *",
      "form.messagePh": "¿Qué necesitas resolver? ¿Cuál es el plazo ideal?",
      "form.messageError": "Escribe al menos 10 caracteres.",
      "form.rgpd":
        'Autorizo el tratamiento de mis datos para responder a esta solicitud, según la <a href="#" class="text-accent underline underline-offset-2">política de privacidad</a>. *',
      "form.rgpdError": "Es necesario aceptarlo para enviar.",
      "form.submit": "Enviar mensaje",
      "form.alt":
        'O escribe directamente a <a href="mailto:ola@alexandremagno.dev" class="text-accent underline underline-offset-2">ola@alexandremagno.dev</a>',
      "form.sending": "Enviando…",
      "form.statusThanks": "Mensaje enviado. ¡Gracias!",
      "form.statusReview": "Revisa los campos marcados, por favor.",
      "form.statusMailto":
        "Se abrió tu programa de correo con el mensaje listo para enviar.",
      "form.statusSent":
        "Mensaje enviado. Respondo en menos de 24 horas laborables.",
      "form.statusFail":
        "No se pudo enviar. Inténtalo otra vez o escribe a {email}.",
      "form.mailSubject": "Nueva solicitud de proyecto de {name}",
      "form.mailName": "Nombre",
      "form.mailEmail": "Email",
      "form.mailCompany": "Empresa",
      "form.mailType": "Tipo de proyecto",
      "form.mailBudget": "Presupuesto",
      "form.mailEmpty": "(no indicada)",

      "footer.tagline":
        "Desarrollador fullstack recién formado. Construyo webs y aplicaciones web para pequeños negocios. Ligeras, seguras y fáciles de mantener.",
      "footer.availability": "Disponible para los primeros proyectos",
      "footer.navAria": "Secciones del sitio",
      "footer.siteTitle": "Sitio",
      "footer.servicesAria": "Servicios",
      "footer.servicesTitle": "Servicios",
      "footer.sv1": "Webs",
      "footer.sv2": "Aplicaciones web",
      "footer.sv3": "Bases de datos",
      "footer.sv4": "Tiendas online",
      "footer.sv5": "Mantenimiento",
      "footer.contactTitle": "Contacto",
      "footer.location": "Portugal · remoto",
      "footer.copyright":
        "Alexandre Magno · NIF 000 000 000 · Todos los derechos reservados",
      "footer.privacy": "Política de privacidad",
      "footer.terms": "Términos",
      "footer.complaints": "Libro de reclamaciones",

      "fab.email": "Enviar email",
      "fab.openAria": "Abrir opciones de contacto rápido",
      "fab.closeAria": "Cerrar opciones de contacto",
    },
  };

  /* =========================================================================
     MOTOR
     ========================================================================= */
  const root = document.documentElement;
  const $$ = (sel) => Array.from(document.querySelectorAll(sel));
  const clean = (value) => value.replace(/\s+/g, " ").trim();

  // Português tal como está escrito no HTML: preenchido no arranque.
  const PT = Object.assign({}, RUNTIME_PT);
  let current = "pt";

  const nodes = {
    text: $$("[data-i18n]"),
    html: $$("[data-i18n-html]"),
    attr: $$("[data-i18n-attr]"),
  };

  /** "placeholder:form.namePh; aria-label:lang.aria" → [[attr, chave], ...] */
  function parseAttrMap(value) {
    return value
      .split(";")
      .map((pair) => pair.split(":"))
      .filter((pair) => pair.length === 2)
      .map(([attr, key]) => [attr.trim(), key.trim()]);
  }

  function capturePortuguese() {
    nodes.text.forEach((el) => {
      PT[el.dataset.i18n] = clean(el.textContent);
    });
    nodes.html.forEach((el) => {
      PT[el.dataset.i18nHtml] = clean(el.innerHTML);
    });
    nodes.attr.forEach((el) => {
      parseAttrMap(el.dataset.i18nAttr).forEach(([attr, key]) => {
        PT[key] = el.getAttribute(attr) || "";
      });
    });

    PT["meta.title"] = document.title;
    const description = document.querySelector('meta[name="description"]');
    PT["meta.description"] = description
      ? description.getAttribute("content")
      : "";
  }

  /** Texto de uma chave no idioma ativo, com {variáveis} opcionais. */
  function t(key, vars) {
    const table = DICT[current] || {};
    let value = table[key];
    if (value === undefined) value = PT[key];
    if (value === undefined) return key;
    if (!vars) return value;
    return value.replace(/\{(\w+)\}/g, (match, name) =>
      name in vars ? vars[name] : match
    );
  }

  function apply(lang) {
    current = SUPPORTED.indexOf(lang) === -1 ? "pt" : lang;

    nodes.text.forEach((el) => {
      el.textContent = t(el.dataset.i18n);
    });
    nodes.html.forEach((el) => {
      el.innerHTML = t(el.dataset.i18nHtml);
    });
    nodes.attr.forEach((el) => {
      parseAttrMap(el.dataset.i18nAttr).forEach(([attr, key]) => {
        el.setAttribute(attr, t(key));
      });
    });

    document.title = t("meta.title");
    const description = document.querySelector('meta[name="description"]');
    if (description) description.setAttribute("content", t("meta.description"));
    const ogLocale = document.querySelector('meta[property="og:locale"]');
    if (ogLocale) ogLocale.setAttribute("content", OG_LOCALE[current]);

    root.setAttribute("lang", HTML_LANG[current]);
    syncSwitch();
  }

  /* --- Seletor no header ---------------------------------------------------- */
  const toggle = document.getElementById("lang-toggle");
  const menu = document.getElementById("lang-menu");
  const label = document.querySelector("[data-lang-current]");
  const chevron = document.querySelector("[data-lang-chevron]");
  const options = menu ? Array.from(menu.querySelectorAll("[data-lang]")) : [];

  function syncSwitch() {
    if (label) label.textContent = current.toUpperCase();
    options.forEach((option) =>
      option.dataset.lang === current
        ? option.setAttribute("aria-current", "true")
        : option.removeAttribute("aria-current")
    );
  }

  function setMenuOpen(open) {
    if (!toggle || !menu) return;
    toggle.setAttribute("aria-expanded", String(open));
    menu.classList.toggle("is-open", open);
    if (chevron) chevron.classList.toggle("rotate-180", open);
  }

  function store(lang) {
    try {
      localStorage.setItem(STORAGE_KEY, lang);
    } catch (e) {
      /* modo privado: a escolha vale só para esta sessão */
    }
  }

  /** Troca de idioma com um fade curto, sem recarregar a página. */
  function change(lang) {
    if (lang === current) {
      setMenuOpen(false);
      return;
    }
    store(lang);
    setMenuOpen(false);

    const instant = window.matchMedia("(prefers-reduced-motion: reduce)")
      .matches;
    const finish = () => {
      apply(lang);
      document.dispatchEvent(
        new CustomEvent("i18n:change", { detail: { lang: current } })
      );
      root.classList.remove("lang-switching");
    };

    if (instant) {
      finish();
      return;
    }

    root.classList.add("lang-switching");
    window.setTimeout(finish, 180);
  }

  if (toggle && menu) {
    toggle.addEventListener("click", (e) => {
      e.stopPropagation();
      setMenuOpen(toggle.getAttribute("aria-expanded") !== "true");
    });
    options.forEach((option) =>
      option.addEventListener("click", () => change(option.dataset.lang))
    );
    document.addEventListener("click", (e) => {
      if (!toggle.contains(e.target) && !menu.contains(e.target)) {
        setMenuOpen(false);
      }
    });
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") setMenuOpen(false);
    });
  }

  /* --- Arranque ------------------------------------------------------------- */
  function initialLanguage() {
    // ?lang=en permite partilhar um link já no idioma certo.
    const asked = new URLSearchParams(location.search).get("lang");
    if (asked && SUPPORTED.indexOf(asked) !== -1) {
      store(asked);
      return asked;
    }
    try {
      const saved = localStorage.getItem(STORAGE_KEY);
      if (saved && SUPPORTED.indexOf(saved) !== -1) return saved;
    } catch (e) {
      /* sem localStorage: segue para a deteção do browser */
    }
    const browser = (navigator.language || "pt").slice(0, 2).toLowerCase();
    return SUPPORTED.indexOf(browser) !== -1 ? browser : "pt";
  }

  capturePortuguese();
  apply(initialLanguage());

  // Disponível para o main.js (mensagens do formulário, aria dos indicadores).
  window.I18N = {
    t,
    get lang() {
      return current;
    },
    change,
  };
})();
