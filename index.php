<?php
/**
 * ESSENZA — Cucina Contemporanea · Parma
 * Prototype one-page — PHP natif, aucune base de données.
 * Toutes les interactions (prenotazione, ordina, newsletter) sont simulées côté front-end.
 */

/* ---------- Données du menu (génériques, modifiables en quelques secondes) ---------- */
$menu = [
    ['cat'=>'antipasti','label'=>'Antipasti','name'=>'Burrata di Puglia','desc'=>'Pomodorini confit, basilico fresco, focaccia al rosmarino fatta in casa.','price'=>16,'badge'=>'Chef Selection','img'=>'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'antipasti','label'=>'Antipasti','name'=>'Prosciutto di Parma 24 Mesi','desc'=>'Gnocco fritto leggero, scaglie di Parmigiano Reggiano 36 mesi, miele d\'acacia.','price'=>19,'badge'=>'','img'=>'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'pasta','label'=>'Pasta Fresca','name'=>'Tortelli di Erbette','desc'=>'Burro di malga e salvia, Parmigiano Reggiano 36 mesi. Il nostro piatto firma.','price'=>22,'badge'=>'Chef Selection','img'=>'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'pasta','label'=>'Pasta Fresca','name'=>'Tagliatelle al Ragù Bianco','desc'=>'Vitello a cottura lenta, tartufo nero, pasta tirata a mano ogni mattina.','price'=>24,'badge'=>'','img'=>'https://images.unsplash.com/photo-1473093295043-cdd812d0e601?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'secondi','label'=>'Secondi','name'=>'Guancia di Vitello Brasata','desc'=>'Cottura lenta di otto ore, purè di sedano rapa, jus naturale.','price'=>28,'badge'=>'','img'=>'https://images.unsplash.com/photo-1544025162-d76694265947?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'secondi','label'=>'Secondi','name'=>'Petto d\'Anatra all\'Arancia','desc'=>'Carote glassate, emulsione agli agrumi, fondo ristretto.','price'=>29,'badge'=>'','img'=>'https://images.unsplash.com/photo-1432139555190-58524dae6a55?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'pesce','label'=>'Pesce','name'=>'Branzino al Limone','desc'=>'Emulsione al limone di Sicilia, verdure di stagione, olio nuovo.','price'=>30,'badge'=>'Chef Selection','img'=>'https://images.unsplash.com/photo-1467003909585-2f8a72700288?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'pesce','label'=>'Pesce','name'=>'Salmone Scottato','desc'=>'Finocchi croccanti, agrumi, erbe aromatiche del nostro orto.','price'=>27,'badge'=>'','img'=>'https://images.unsplash.com/photo-1559847844-5315695dadae?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'carne','label'=>'Carne','name'=>'Filetto al Barolo','desc'=>'Jus al Barolo, patate al forno al rosmarino, sale affumicato.','price'=>34,'badge'=>'Chef Selection','img'=>'https://images.unsplash.com/photo-1600891964092-4316c288032e?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'carne','label'=>'Carne','name'=>'Costoletta Contemporanea','desc'=>'Panatura dorata alle erbe, maionese al limone, insalatina fresca.','price'=>31,'badge'=>'','img'=>'https://images.unsplash.com/photo-1558030006-450675393462?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'dolci','label'=>'Dolci','name'=>'Tiramisù Essenza','desc'=>'Mascarpone leggero, caffè espresso, cacao amaro. Ricetta della casa.','price'=>12,'badge'=>'Chef Selection','img'=>'https://images.unsplash.com/photo-1551024506-0bccd828d307?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'dolci','label'=>'Dolci','name'=>'Panna Cotta alla Vaniglia','desc'=>'Vaniglia Bourbon, frutti di bosco, crumble alle mandorle.','price'=>11,'badge'=>'','img'=>'https://images.unsplash.com/photo-1563805042-7684c019e1cb?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'vini','label'=>'Vini','name'=>'Barolo DOCG — Calice','desc'=>'Selezione della cantina, Nebbiolo in purezza, grande struttura.','price'=>14,'badge'=>'','img'=>'https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'vini','label'=>'Vini','name'=>'Franciacorta Brut — Calice','desc'=>'Bollicine fini ed eleganti, perfetto dall\'aperitivo al dolce.','price'=>12,'badge'=>'','img'=>'https://images.unsplash.com/photo-1506377247377-2a5b3b417ebb?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'cocktail','label'=>'Cocktail','name'=>'Negroni all\'Arancia','desc'=>'Gin, bitter, vermouth rosso, profumo d\'arancia fresca.','price'=>14,'badge'=>'','img'=>'https://images.unsplash.com/photo-1551538827-9c037cb4f32a?q=80&w=1200&auto=format&fit=crop'],
    ['cat'=>'cocktail','label'=>'Cocktail','name'=>'Spritz Contemporaneo','desc'=>'Salvia, agrumi e bollicine. Fresco, luminoso, mai banale.','price'=>12,'badge'=>'','img'=>'https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?q=80&w=1200&auto=format&fit=crop'],
];

$ordina = [
    ['name'=>'Tortelli di Erbette','desc'=>'Burro e salvia, Parmigiano 36 mesi','price'=>22,'img'=>$menu[2]['img']],
    ['name'=>'Tagliatelle al Ragù Bianco','desc'=>'Tartufo nero, pasta fresca','price'=>24,'img'=>$menu[3]['img']],
    ['name'=>'Burrata di Puglia','desc'=>'Pomodorini confit, focaccia','price'=>16,'img'=>$menu[0]['img']],
    ['name'=>'Branzino al Limone','desc'=>'Verdure di stagione','price'=>30,'img'=>$menu[6]['img']],
    ['name'=>'Filetto al Barolo','desc'=>'Patate al rosmarino','price'=>34,'img'=>$menu[8]['img']],
    ['name'=>'Tiramisù Essenza','desc'=>'Il dolce della casa','price'=>12,'img'=>$menu[10]['img']],
];

$recensioni = [
    ['name'=>'Giulia R.','city'=>'Parma','text'=>'Un luogo luminoso e silenzioso, piatti che sembrano piccole opere d\'arte. I tortelli sono i migliori mai assaggiati a Parma.','img'=>'https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=400&auto=format&fit=crop'],
    ['name'=>'Marco T.','city'=>'Modène','text'=>'Servizio impeccabile senza mai essere invadente. La sala in travertino al tramonto è un\'esperienza da vivere almeno una volta.','img'=>'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400&auto=format&fit=crop'],
    ['name'=>'Elena V.','city'=>'Bologne','text'=>'Abbiamo festeggiato il nostro anniversario sulla terrazza. Ogni dettaglio, dal pane fatto in casa al dolce, era curato con amore.','img'=>'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=400&auto=format&fit=crop'],
    ['name'=>'Alessandro M.','city'=>'Parma','text'=>'Cucina contemporanea che rispetta la tradizione emiliana. Cantina sorprendente e conto onesto per la qualità offerta.','img'=>'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=400&auto=format&fit=crop'],
];

$faq = [
    ['q'=>'È necessaria la prenotazione ?','a'=>'Consigliamo sempre la prenotazione, soprattutto nel fine settimana e per la terrazza. Puoi prenotare online in meno di un minuto tramite il modulo dedicato.'],
    ['q'=>'Offrite menu degustazione ?','a'=>'Sì, proponiamo un percorso degustazione in cinque e sette portate, anche in versione vegetariana, con abbinamento vini su richiesta.'],
    ['q'=>'Avete opzioni senza glutine o vegetariane ?','a'=>'Certamente. La nostra pasta fresca è disponibile anche senza glutine e il menu include piatti vegetariani e vegani preparati al momento. Segnalaci eventuali allergie in fase di prenotazione.'],
    ['q'=>'È possibile organizzare eventi privati ?','a'=>'La Sala Privata accoglie fino a 24 ospiti per cene, ricorrenze e incontri di lavoro. Contattaci per un preventivo personalizzato senza impegno.'],
    ['q'=>'Consegnate a domicilio a Parma ?','a'=>'Sì, consegniamo in tutto il centro di Parma e nei quartieri limitrofi. La consegna è gratuita per ordini superiori a 50 €.'],
];

$U = fn($id,$w=1600) => "https://images.unsplash.com/$id?q=80&w=$w&auto=format&fit=crop";
?>
<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ESSENZA — Cucina Contemporanea · Ristorante Gastronomico a Parma</title>
<meta name="description" content="Essenza è un ristorante gastronomico contemporaneo nel cuore di Parma. Pasta fresca, ingredienti del territorio, sala in travertino e terrazza luminosa. Prenota il tuo tavolo.">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90' font-family='Georgia'>E</text></svg>">
</head>
<body>

<!-- ══════════ PRELOADER ══════════ -->
<div class="preloader" id="preloader" aria-hidden="true">
  <div class="pre-inner"><span class="pre-logo">ESSENZA</span><span class="pre-sub">PARMA · CUCINA CONTEMPORANEA</span>
  <div class="pre-bar"><i id="preBar"></i></div><span class="pre-count" id="preCount">0%</span></div>
</div>

<div class="progress" id="progress"></div>
<div class="cursor-dot" id="cDot"></div><div class="cursor-ring" id="cRing"></div>
<div class="glow" id="glow"></div>

<!-- ══════════ HEADER ══════════ -->
<header class="header" id="header">
  <a href="#home" class="logo" data-hover>ESSENZA<small>PARMA</small></a>
  <nav class="nav" id="nav" aria-label="Navigazione principale">
    <a href="#home">Home</a><a href="#ristorante">Il Ristorante</a><a href="#menu">Menu</a>
    <a href="#esperienza">Esperienza</a><a href="#galleria">Galleria</a>
    <a href="#prenotazione">Prenotazione</a><a href="#ordina">Consegna</a><a href="#contatti">Contatti</a>
  </nav>
  <div class="head-actions">
    <button class="icon-btn" id="cartBtn" data-hover aria-label="Apri carrello"><i class="fa-solid fa-basket-shopping"></i><span class="cart-count" id="cartCount">0</span></button>
    <a href="#prenotazione" class="btn btn-dark magnetic" data-hover><span>Prenota Ora</span></a>
    <button class="burger" id="burger" aria-label="Apri menu"><span></span><span></span></button>
  </div>
</header>

<!-- ══════════ HERO ══════════ -->
<section class="hero" id="home">
  <div class="hero-media"><img id="heroImg" src="<?= $U('photo-1414235077428-338989a2e8c0',2000) ?>" alt="Sala luminosa del ristorante Essenza a Parma">
    <div class="hero-shade"></div><div class="hero-grain"></div></div>
  <div class="hero-content">
    <p class="eyebrow light reveal">PARMA · CUCINA CONTEMPORANEA · DAL 2012</p>
    <h1 class="hero-title" id="heroTitle">Un'esperienza<br>gastronomica nel<br><em>cuore di Parma</em></h1>
    <p class="hero-sub reveal">Travertino, luce naturale e pasta tirata a mano ogni mattina.<br>La tradizione emiliana, interpretata con eleganza contemporanea.</p>
    <div class="hero-cta reveal">
      <a href="#prenotazione" class="btn btn-gold magnetic" data-hover><span>Prenota un Tavolo</span><i class="fa-solid fa-arrow-right"></i></a>
      <a href="#menu" class="btn btn-glass magnetic" data-hover><span>Scopri il Menu</span></a>
    </div>
  </div>
  <div class="hero-card reveal">
    <div><strong>4,9</strong><span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><br>oltre 1.200 recensioni</span></div>
    <div class="hc-sep"></div>
    <div><strong>12–15 · 19–23</strong><span>Pranzo e cena<br>Chiuso il lunedì</span></div>
  </div>
  <a class="scroll-ind" href="#ristorante" data-hover aria-label="Scorri verso il basso"><span></span><small>SCORRI</small></a>
</section>

<!-- Marquee -->
<div class="marquee" aria-hidden="true"><div class="mq-track" id="mqTrack">
  <?php for($r=0;$r<2;$r++): foreach(['Pasta Fresca Fatta a Mano','Parmigiano Reggiano 36 Mesi','Prosciutto di Parma','Cantina Selezione','Terrazza Panoramica','Ingredienti del Territorio'] as $m): ?>
  <span><?= $m ?></span><i class="fa-solid fa-diamond"></i><?php endforeach; endfor; ?>
</div></div>

<!-- ══════════ IL RISTORANTE / ESPERIENZA ══════════ -->
<section class="section" id="ristorante">
  <div class="wrap exp-grid">
    <div class="exp-media">
      <figure class="exp-img main tilt"><img data-parallax src="<?= $U('photo-1517248135467-4c7edcad34c4') ?>" alt="Interni contemporanei in travertino e legno chiaro" loading="lazy"></figure>
      <figure class="exp-img float tilt"><img src="<?= $U('photo-1552566626-52f8b828add9',900) ?>" alt="Dettaglio della sala e mise en place" loading="lazy"></figure>
      <div class="exp-badge"><strong>12</strong><span>anni di<br>cucina a Parma</span></div>
    </div>
    <div class="exp-text">
      <p class="eyebrow reveal">IL RISTORANTE</p>
      <h2 class="reveal">Luce, pietra<br>e <em>silenzio buono</em></h2>
      <p class="lead reveal">Nel centro storico di Parma, a due passi dal Duomo, Essenza è uno spazio di calma : travertino, legno chiaro, lin e grandi vetrate che lasciano entrare la luce dell'Emilia.</p>
      <p class="reveal">Ogni mattina sfogliamo la pasta a mano, scegliamo le verdure al mercato e apriamo le porte a chi cerca una cucina sincera, contemporanea, mai gridata. Pochi tavoli, molto spazio, tutto il tempo per stare bene.</p>
      <div class="exp-feats">
        <div class="feat reveal"><i class="fa-solid fa-wheat-awn"></i><div><strong>Ingredienti del territorio</strong><span>Produttori locali selezionati, ogni settimana</span></div></div>
        <div class="feat reveal"><i class="fa-solid fa-hand"></i><div><strong>Pasta fatta a mano</strong><span>Tirata al mattarello, come da tradizione</span></div></div>
        <div class="feat reveal"><i class="fa-solid fa-wine-glass"></i><div><strong>Cantina viva</strong><span>Oltre 180 etichette, dall'Emilia al Barolo</span></div></div>
      </div>
      <a href="#esperienza" class="link-arrow reveal" data-hover>La nostra esperienza <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>
  <div class="wrap stats reveal">
    <div class="stat"><strong data-count="12">0</strong><span>Anni di attività</span></div>
    <div class="stat"><strong data-count="18">0</strong><span>Piatti in menu</span></div>
    <div class="stat"><strong data-count="180">0</strong><span>Etichette in cantina</span></div>
    <div class="stat"><strong><span data-count="49" data-div="10">0</span></strong><span>Valutazione media / 5</span></div>
  </div>
</section>

<!-- ══════════ MENU ══════════ -->
<section class="section alt" id="menu">
  <div class="wrap">
    <div class="sec-head">
      <p class="eyebrow reveal">IL MENU</p>
      <h2 class="reveal">Sapori che raccontano<br><em>l'Emilia contemporanea</em></h2>
      <p class="reveal">Un menu breve, che cambia con le stagioni. Prezzi chiari, porzioni generose, materia prima al centro.</p>
    </div>
    <div class="tabs reveal" id="menuTabs" role="tablist">
      <button class="tab active" data-cat="all" data-hover>Tutti</button>
      <?php foreach(['antipasti'=>'Antipasti','pasta'=>'Pasta Fresca','secondi'=>'Secondi','pesce'=>'Pesce','carne'=>'Carne','dolci'=>'Dolci','vini'=>'Vini','cocktail'=>'Cocktail'] as $k=>$v): ?>
      <button class="tab" data-cat="<?= $k ?>" data-hover><?= $v ?></button><?php endforeach; ?>
    </div>
    <div class="menu-grid" id="menuGrid">
      <?php foreach($menu as $dish): ?>
      <article class="dish tilt" data-cat="<?= $dish['cat'] ?>">
        <figure><img src="<?= $dish['img'] ?>" alt="<?= htmlspecialchars($dish['name']) ?>" loading="lazy">
        <?php if($dish['badge']): ?><span class="badge"><i class="fa-solid fa-star"></i> <?= $dish['badge'] ?></span><?php endif; ?>
        <span class="dish-cat"><?= $dish['label'] ?></span></figure>
        <div class="dish-body"><div class="dish-top"><h3><?= $dish['name'] ?></h3><span class="dots"></span><strong><?= $dish['price'] ?> €</strong></div>
        <p><?= $dish['desc'] ?></p>
        <button class="add-btn" data-hover data-add="<?= htmlspecialchars($dish['name']) ?>" data-price="<?= $dish['price'] ?>"><i class="fa-solid fa-plus"></i> Aggiungi all'ordine</button></div>
      </article>
      <?php endforeach; ?>
    </div>
    <p class="menu-note reveal"><i class="fa-solid fa-circle-info"></i> Menu degustazione 5 portate · 65 € &nbsp;—&nbsp; 7 portate · 85 € &nbsp;·&nbsp; Abbinamento vini + 35 €</p>
  </div>
</section>

<!-- ══════════ CHEF'S TABLE / ESPERIENZA ══════════ -->
<section class="chef-table" id="esperienza">
  <div class="ct-media"><img data-parallax src="<?= $U('photo-1559339352-11d035aa65de',2000) ?>" alt="Piatto signature dello chef" loading="lazy"><div class="ct-shade"></div></div>
  <div class="wrap ct-inner">
    <p class="eyebrow light reveal">CHEF'S TABLE · ESPERIENZA</p>
    <h2 class="reveal">Il piatto firma,<br><em>servito davanti a te</em></h2>
    <p class="reveal">Sei posti al bancone della cucina, lo chef che impiatta sotto i tuoi occhi e un percorso creato al momento, fuori menu. L'esperienza più intima di Essenza.</p>
    <ul class="ct-list reveal"><li><i class="fa-solid fa-check"></i> Percorso di 7 portate fuori menu</li><li><i class="fa-solid fa-check"></i> Abbinamento vini della cantina</li><li><i class="fa-solid fa-check"></i> Solo 6 ospiti a sera, su prenotazione</li></ul>
    <div class="ct-actions reveal"><a href="#prenotazione" class="btn btn-gold magnetic" data-hover><span>Prenota il Chef's Table</span></a><span class="ct-price">da 85 € a persona</span></div>
  </div>
</section>

<!-- ══════════ GALLERIA ══════════ -->
<section class="section" id="galleria">
  <div class="wrap">
    <div class="sec-head row"><div><p class="eyebrow reveal">GALLERIA</p><h2 class="reveal">La bellezza,<br><em>prima dell'assaggio</em></h2></div>
    <div class="gal-nav reveal"><button id="galPrev" data-hover aria-label="Precedente"><i class="fa-solid fa-arrow-left"></i></button><button id="galNext" data-hover aria-label="Successiva"><i class="fa-solid fa-arrow-right"></i></button></div></div>
  </div>
  <div class="swiper gallery reveal"><div class="swiper-wrapper">
    <?php foreach([
      ['photo-1414235077428-338989a2e8c0','La sala al tramonto'],['photo-1517248135467-4c7edcad34c4','Travertino e legno chiaro'],
      ['photo-1621996346565-e3dbc646d9a9','Tortelli fatti a mano'],['photo-1510812431401-41d2bd2722f3','La nostra cantina'],
      ['photo-1551024506-0bccd828d307','Dolci della casa'],['photo-1552566626-52f8b828add9','Mise en place'],
      ['photo-1466978913421-501180b1ec31','Cena in terrazza'],['photo-1470337458703-46ad1756a187','Il nostro bar'],
    ] as $g): ?>
    <div class="swiper-slide gal-slide"><img src="<?= $U($g[0],1400) ?>" alt="<?= $g[1] ?>" loading="lazy" data-lightbox="<?= $U($g[0],2000) ?>"><span><?= $g[1] ?></span></div>
    <?php endforeach; ?>
  </div><div class="swiper-pagination"></div></div>
</section>

<!-- ══════════ LO CHEF ══════════ -->
<section class="section alt chef">
  <div class="wrap chef-grid">
    <figure class="chef-img tilt reveal"><img data-parallax src="<?= $U('photo-1577219491135-ce391730fb2c',1200) ?>" alt="Lo chef di Essenza mentre impiatta" loading="lazy"></figure>
    <div class="chef-text">
      <p class="eyebrow reveal">LO CHEF</p>
      <h2 class="reveal">« Cucinare è togliere,<br><em>fino a restare l'essenziale. »</em></h2>
      <p class="reveal">Formato nelle cucine dell'Emilia e perfezionato tra Milano e la Francia, il nostro chef guida una brigata giovane con un'idea semplice : pochi ingredienti, trattati con rispetto assoluto, e il sapore della memoria in ogni piatto.</p>
      <p class="reveal">La sua cucina parte dai tortelli della domenica in famiglia e arriva a un piatto luminoso, leggero, contemporaneo. Senza mai dimenticare da dove viene.</p>
      <div class="chef-sign reveal"><span class="signature">Lo Chef</span><small>CHEF & FONDATORE · ESSENZA PARMA</small></div>
    </div>
  </div>
</section>

<!-- ══════════ PRENOTAZIONE ══════════ -->
<section class="section" id="prenotazione">
  <div class="wrap book-grid">
    <div class="book-info">
      <p class="eyebrow reveal">PRENOTAZIONE</p>
      <h2 class="reveal">Riserva il tuo<br><em>momento di calma</em></h2>
      <p class="reveal">Compila il modulo : ti confermeremo entro pochi minuti negli orari di apertura. Per gruppi oltre 8 ospiti, chiamaci pure.</p>
      <div class="book-cards">
        <div class="bcard reveal"><i class="fa-solid fa-utensils"></i><div><strong>Sala Principale</strong><span>Travertino e luce naturale</span></div></div>
        <div class="bcard reveal"><i class="fa-solid fa-sun"></i><div><strong>Terrazza</strong><span>Vista sui tetti di Parma</span></div></div>
        <div class="bcard reveal"><i class="fa-solid fa-door-closed"></i><div><strong>Sala Privata</strong><span>Fino a 24 ospiti, eventi</span></div></div>
        <div class="bcard reveal"><i class="fa-solid fa-kitchen-set"></i><div><strong>Chef's Table</strong><span>6 posti al bancone</span></div></div>
      </div>
      <p class="book-phone reveal"><i class="fa-solid fa-phone"></i> Preferisci parlare con noi ? <a href="tel:+390521000000" data-hover>+39 0521 000 000</a></p>
    </div>
    <form class="book-form glass reveal" id="bookForm" novalidate>
      <h3>Prenota un tavolo</h3><p class="form-sub">Risposta rapida · Nessun anticipo richiesto</p>
      <div class="frow"><label>Nome e cognome<input type="text" name="nome" placeholder="Es. Maria Rossi" required></label>
      <label>Telefono<input type="tel" name="telefono" placeholder="+39 333 000 0000" required></label></div>
      <label>Email<input type="email" name="email" placeholder="maria.rossi@email.it" required></label>
      <div class="frow"><label>Persone<select name="persone" required><option value="">Seleziona</option><?php for($i=1;$i<=8;$i++): ?><option><?= $i ?> <?= $i==1?'persona':'persone' ?></option><?php endfor; ?><option>9+ (gruppo)</option></select></label>
      <label>Sala<select name="sala" required><option value="">Seleziona</option><option>Sala Principale</option><option>Terrazza</option><option>Sala Privata</option><option>Chef's Table</option></select></label></div>
      <div class="frow"><label>Data<input type="date" name="data" required></label>
      <label>Ora<select name="ora" required><option value="">Seleziona</option><option>12:30</option><option>13:00</option><option>13:30</option><option>19:30</option><option>20:00</option><option>20:30</option><option>21:00</option><option>21:30</option></select></label></div>
      <label>Richieste speciali <span class="opt">(facoltativo)</span><textarea name="richieste" rows="3" placeholder="Allergie, occasioni speciali, seggiolone…"></textarea></label>
      <p class="form-error" id="bookError"></p>
      <button type="submit" class="btn btn-dark magnetic wide" data-hover><span>Conferma Prenotazione</span><i class="fa-solid fa-arrow-right"></i></button>
      <small class="form-privacy">Inviando accetti la nostra informativa privacy. Nessuno spam, mai.</small>
    </form>
  </div>
</section>

<!-- ══════════ ORDINA ONLINE ══════════ -->
<section class="section alt" id="ordina">
  <div class="wrap">
    <div class="sec-head"><p class="eyebrow reveal">ORDINA ONLINE</p>
      <h2 class="reveal">Essenza, anche<br><em>a casa tua</em></h2>
      <p class="reveal">I nostri piatti più amati, pronti da ritirare o consegnati caldi a casa tua, a Parma.</p></div>
    <div class="mode-switch reveal" role="group" aria-label="Scegli modalità">
      <button class="mode active" data-mode="consegna" data-hover><i class="fa-solid fa-bicycle"></i> Consegna<small>a domicilio · 3,90 € · gratis sopra 50 €</small></button>
      <button class="mode" data-mode="asporto" data-hover><i class="fa-solid fa-bag-shopping"></i> Asporto<small>ritiro in sede · pronto in 25 min</small></button>
    </div>
    <div class="order-grid">
      <?php foreach($ordina as $p): ?>
      <article class="order-card tilt reveal"><img src="<?= $p['img'] ?>" alt="<?= htmlspecialchars($p['name']) ?>" loading="lazy">
        <div><h3><?= $p['name'] ?></h3><p><?= $p['desc'] ?></p>
        <div class="order-foot"><strong><?= $p['price'] ?> €</strong>
        <button class="add-btn" data-hover data-add="<?= htmlspecialchars($p['name']) ?>" data-price="<?= $p['price'] ?>"><i class="fa-solid fa-plus"></i> Aggiungi</button></div></div>
      </article><?php endforeach; ?>
    </div>
    <div class="order-bar reveal"><div><i class="fa-solid fa-basket-shopping"></i> <span id="barText">Il carrello è vuoto</span></div>
    <button class="btn btn-dark magnetic" id="barBtn" data-hover><span>Vedi Carrello</span></button></div>
  </div>
</section>

<!-- ══════════ RECENSIONI ══════════ -->
<section class="section reviews">
  <div class="wrap"><div class="sec-head"><p class="eyebrow reveal">RECENSIONI</p>
    <h2 class="reveal">Chi si è seduto<br><em>alla nostra tavola</em></h2></div></div>
  <div class="swiper reviews-swiper reveal"><div class="swiper-wrapper">
    <?php foreach($recensioni as $r): ?>
    <div class="swiper-slide"><article class="review">
      <div class="stars">★★★★★</div><p>« <?= $r['text'] ?> »</p>
      <footer><img src="<?= $r['img'] ?>" alt="Foto profilo di <?= htmlspecialchars($r['name']) ?>" loading="lazy"><div><strong><?= $r['name'] ?></strong><span><?= $r['city'] ?> · Ospite verificato</span></div></footer>
    </article></div><?php endforeach; ?>
  </div><div class="swiper-pagination"></div></div>
</section>

<!-- ══════════ FAQ ══════════ -->
<section class="section alt">
  <div class="wrap faq-wrap"><div class="sec-head"><p class="eyebrow reveal">DOMANDE FREQUENTI</p>
    <h2 class="reveal">Prima di <em>sederti a tavola</em></h2></div>
    <?php foreach($faq as $i=>$f): ?>
    <div class="faq-item reveal"><button class="faq-q" data-hover aria-expanded="false"><?= $f['q'] ?><i class="fa-solid fa-plus"></i></button>
    <div class="faq-a"><p><?= $f['a'] ?></p></div></div><?php endforeach; ?>
  </div>
</section>

<!-- ══════════ CONTATTI ══════════ -->
<section class="section" id="contatti">
  <div class="wrap contact-grid">
    <div>
      <p class="eyebrow reveal">CONTATTI</p><h2 class="reveal">Nel cuore<br><em>di Parma</em></h2>
      <div class="contact-list">
        <div class="reveal"><i class="fa-solid fa-location-dot"></i><div><strong>Indirizzo</strong><span>Via della Repubblica 00, 43121 Parma (PR)</span></div></div>
        <div class="reveal"><i class="fa-solid fa-phone"></i><div><strong>Telefono</strong><a href="tel:+390521000000" data-hover>+39 0521 000 000</a></div></div>
        <div class="reveal"><i class="fa-solid fa-envelope"></i><div><strong>Email</strong><a href="mailto:info@essenza-parma.it" data-hover>info@essenza-parma.it</a></div></div>
        <div class="reveal"><i class="fa-regular fa-clock"></i><div><strong>Orari</strong><span>Mar – Dom · 12:00–15:00 · 19:00–23:00<br>Chiuso il lunedì</span></div></div>
      </div>
    </div>
    <div class="map reveal"><iframe title="Mappa — Essenza, centro di Parma" src="https://www.google.com/maps?q=Duomo+di+Parma&output=embed" loading="lazy"></iframe>
      <div class="map-pin"><i class="fa-solid fa-location-dot"></i><div><strong>ESSENZA</strong><span>Centro storico · 2 min dal Duomo</span></div></div></div>
  </div>
</section>

<!-- ══════════ FOOTER ══════════ -->
<footer class="footer">
  <div class="wrap foot-grid">
    <div class="foot-brand"><span class="logo">ESSENZA<small>PARMA</small></span>
      <p>Cucina contemporanea nel cuore di Parma. Luce, territorio e pasta fatta a mano, dal 2012.</p>
      <div class="socials"><a href="#" aria-label="Instagram" data-hover><i class="fa-brands fa-instagram"></i></a><a href="#" aria-label="Facebook" data-hover><i class="fa-brands fa-facebook-f"></i></a><a href="#" aria-label="TikTok" data-hover><i class="fa-brands fa-tiktok"></i></a></div></div>
    <nav><h4>Esplora</h4><a href="#ristorante">Il Ristorante</a><a href="#menu">Menu</a><a href="#esperienza">Esperienza</a><a href="#galleria">Galleria</a></nav>
    <nav><h4>Servizi</h4><a href="#prenotazione">Prenotazione</a><a href="#ordina">Consegna a domicilio</a><a href="#ordina">Asporto</a><a href="#contatti">Eventi privati</a></nav>
    <div class="newsletter"><h4>La tavola, una volta al mese</h4><p>Menu di stagione, serate speciali e un piccolo regalo di benvenuto.</p>
      <form id="newsForm"><input type="email" placeholder="La tua email" required aria-label="Email per newsletter"><button data-hover aria-label="Iscriviti"><i class="fa-solid fa-arrow-right"></i></button></form>
      <small id="newsMsg"></small></div>
  </div>
  <div class="wrap foot-bottom"><span>© <?= date('Y') ?> Essenza — Parma. Tutti i diritti riservati.</span><span>P.IVA 00000000000 · Privacy · Cookie</span></div>
</footer>

<!-- ══════════ CARRELLO LATERALE ══════════ -->
<div class="overlay" id="overlay"></div>
<aside class="cart" id="cart" aria-label="Carrello">
  <header><div><h3>Il tuo ordine</h3><span id="cartMode">Consegna a domicilio</span></div>
  <button id="cartClose" data-hover aria-label="Chiudi carrello"><i class="fa-solid fa-xmark"></i></button></header>
  <div class="cart-items" id="cartItems"></div>
  <div class="cart-empty" id="cartEmpty"><i class="fa-solid fa-basket-shopping"></i><p>Il carrello è vuoto.<br>Aggiungi un piatto dal menu.</p></div>
  <footer id="cartFooter">
    <div class="row"><span>Sotto-totale</span><strong id="ctSub">0,00 €</strong></div>
    <div class="row"><span id="ctShipLabel">Consegna</span><strong id="ctShip">3,90 €</strong></div>
    <div class="row total"><span>Totale</span><strong id="ctTotal">0,00 €</strong></div>
    <p class="free-ship" id="freeShip"></p>
    <button class="btn btn-gold magnetic wide" id="checkoutBtn" data-hover><span>Conferma Ordine</span><i class="fa-solid fa-arrow-right"></i></button>
  </footer>
</aside>

<!-- Popup / Lightbox / Toast -->
<div class="modal" id="modal" role="dialog" aria-modal="true"><div class="modal-card glass">
  <span class="modal-icon" id="modalIcon"><i class="fa-solid fa-check"></i></span>
  <h3 id="modalTitle">Fatto</h3><p id="modalText"></p>
  <button class="btn btn-dark magnetic" id="modalClose" data-hover><span>Perfetto, grazie</span></button></div></div>
<div class="lightbox" id="lightbox"><button id="lbClose" data-hover aria-label="Chiudi"><i class="fa-solid fa-xmark"></i></button><img id="lbImg" alt="Foto ingrandita della galleria"></div>
<div class="toast" id="toast"><i class="fa-solid fa-check"></i><span id="toastText"></span></div>
<button class="to-top" id="toTop" data-hover aria-label="Torna su"><i class="fa-solid fa-arrow-up"></i></button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/lenis@1.1.14/dist/lenis.min.js"></script>
<script src="https://unpkg.com/split-type@0.3.4/umd/index.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
