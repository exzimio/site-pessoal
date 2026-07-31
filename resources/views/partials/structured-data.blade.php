{{-- Dados estruturados para os resultados enriquecidos do Google.
     O bloco vai em modo literal porque o JSON-LD usa chaves com arroba e o
     Blade não tem de andar a olhar para elas. O domínio é o de produção de
     propósito: estes identificadores são canónicos e não mudam com o
     servidor local. --}}
@verbatim
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "Person",
          "@id": "https://alexandremagno.dev/#pessoa",
          "name": "Alexandre Magno",
          "jobTitle": "Developer Fullstack",
          "url": "https://alexandremagno.dev/",
          "email": "mailto:ola@alexandremagno.dev",
          "telephone": "+351912345678",
          "knowsLanguage": ["pt-PT", "en", "es"],
          "knowsAbout": [
            "Desenvolvimento Web",
            "HTML",
            "CSS",
            "JavaScript",
            "PHP",
            "Laravel",
            "Python",
            "MySQL",
            "APIs REST"
          ],
          "hasCredential": {
            "@type": "EducationalOccupationalCredential",
            "credentialCategory": "certificate",
            "name": "Programador Web Fullstack",
            "description": "Formação intensiva de 7 meses em desenvolvimento web front-end e back-end, reconhecida e distinguida pelo Estado Português no âmbito do Portugal INCoDe.2030."
          },
          "sameAs": [
            "https://github.com/alexandremagno",
            "https://www.linkedin.com/in/alexandremagno/"
          ]
        },
        {
          "@type": "ProfessionalService",
          "@id": "https://alexandremagno.dev/#negocio",
          "name": "Alexandre Magno · Desenvolvimento Web Fullstack",
          "description": "Criação de sites, aplicações web, bases de dados e integrações para pequenos negócios e profissionais independentes.",
          "url": "https://alexandremagno.dev/",
          "priceRange": "€",
          "areaServed": ["PT", "EU"],
          "founder": { "@id": "https://alexandremagno.dev/#pessoa" },
          "address": {
            "@type": "PostalAddress",
            "addressCountry": "PT"
          },
          "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Serviços",
            "itemListElement": [
              { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Websites institucionais" } },
              { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Aplicações web sob medida" } },
              { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Bases de dados e APIs" } },
              { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Lojas online e e-commerce" } },
              { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Manutenção e suporte" } }
            ]
          }
        }
      ]
    }
  </script>
@endverbatim
