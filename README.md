# ESSENZA — Ristorante Gastronomico a Parma

Prototype one-page haut de gamme pour un restaurant italien contemporain à Parme.
Direction « Contemporary Collection » : lumineux, minimaliste, premium — blanc `#FCFAF7`, travertin, vert sauge, or champagne ; typographie Cormorant Garamond / Manrope.

## Stack

- **PHP natif** (aucune base de données, aucune administration) — les données (menu, avis, FAQ) sont déclarées en tête de `index.php`, modifiables en quelques secondes pour personnaliser le prototype chez un restaurateur.
- HTML5 / CSS3 / JavaScript vanilla
- Bibliothèques CDN : GSAP + ScrollTrigger, Lenis (smooth scroll), Swiper, SplitType

## Sections

Hero plein écran · Il Ristorante (statistiques animées) · Menu filtrable par catégorie (16 plats, badge *Chef Selection*) · Chef's Table · Galleria (Swiper + lightbox) · Lo Chef · **Prenotazione** simulée avec validation et popup de confirmation · **Ordina Online** (Consegna / Asporto, panier latéral, quantités, sous-total, livraison gratuite dès 50 €, checkout simulé) · Recensioni · FAQ accordéon · Contatti (Parma, carte) · Footer avec newsletter simulée.

Micro-interactions : Curseur personnalisé, boutons magnétiques, parallax, tilt léger des cartes, compteurs animés, marquee, barre de progression, toast et modales premium. Responsive desktop → mobile, `prefers-reduced-motion` respecté.

## Lancer le site

```bash
php -S localhost:8000
# puis ouvrir http://localhost:8000
```

Tout hébergement PHP mutualisé classique suffit : déposer `index.php` et le dossier `assets/` à la racine.

## Structure

```
index.php            # page unique + données modifiables en tête de fichier
assets/
  css/style.css      # design system complet
  js/main.js         # animations et simulations front-end
```
