/* ═══════════════ ESSENZA · Parma — Interactions ═══════════════
   GSAP + ScrollTrigger · Lenis smooth scroll · Swiper · SplitType
   Toutes les actions (prenotazione, ordine, newsletter) sont simulées. */
'use strict';
document.documentElement.classList.add('js');
const $  = (s, c = document) => c.querySelector(s);
const $$ = (s, c = document) => [...c.querySelectorAll(s)];
const euro = n => n.toFixed(2).replace('.', ',') + ' €';
const hasGsap = typeof gsap !== 'undefined';
if (hasGsap && typeof ScrollTrigger !== 'undefined') gsap.registerPlugin(ScrollTrigger);

/* ---------- Preloader ---------- */
(() => {
  const pre = $('#preloader'), bar = $('#preBar'), count = $('#preCount');
  let p = 0;
  const tick = setInterval(() => {
    p = Math.min(100, p + Math.random() * 16);
    bar.style.width = p + '%'; count.textContent = Math.floor(p) + '%';
    if (p >= 100) { clearInterval(tick); setTimeout(() => { pre.classList.add('done'); heroIntro(); }, 250); }
  }, 110);
})();

/* ---------- Lenis smooth scroll ---------- */
let lenis = null;
if (typeof Lenis !== 'undefined' && !matchMedia('(prefers-reduced-motion: reduce)').matches) {
  lenis = new Lenis({ duration: 1.15, smoothWheel: true });
  const raf = t => { lenis.raf(t); requestAnimationFrame(raf); };
  requestAnimationFrame(raf);
  if (hasGsap) lenis.on('scroll', ScrollTrigger.update);
}
$$('a[href^="#"]').forEach(a => a.addEventListener('click', e => {
  const target = $(a.getAttribute('href'));
  if (!target) return;
  e.preventDefault(); closeMenu();
  lenis ? lenis.scrollTo(target, { offset: -70 }) : target.scrollIntoView({ behavior: 'smooth' });
}));

/* ---------- Header / progress / to-top ---------- */
const header = $('#header');
addEventListener('scroll', () => {
  const y = scrollY, h = document.documentElement.scrollHeight - innerHeight;
  header.classList.toggle('scrolled', y > 50);
  $('#progress').style.width = (h > 0 ? y / h * 100 : 0) + '%';
  $('#toTop').classList.toggle('on', y > 700);
}, { passive: true });
$('#toTop').addEventListener('click', () => lenis ? lenis.scrollTo(0) : scrollTo({ top: 0, behavior: 'smooth' }));

/* ---------- Menu mobile ---------- */
const burger = $('#burger');
function closeMenu(){ header.classList.remove('menu-open'); document.body.style.overflow=''; }
burger.addEventListener('click', () => {
  const open = header.classList.toggle('menu-open');
  document.body.style.overflow = open ? 'hidden' : '';
});

/* ---------- Curseur personnalisé + glow + magnetic ---------- */
(() => {
  const dot = $('#cDot'), ring = $('#cRing'), glow = $('#glow');
  let mx = innerWidth/2, my = innerHeight/2, rx = mx, ry = my;
  addEventListener('mousemove', e => {
    mx = e.clientX; my = e.clientY;
    dot.style.left = mx+'px'; dot.style.top = my+'px';
    glow.style.left = mx+'px'; glow.style.top = my+'px';
  });
  (function loop(){ rx += (mx-rx)*.14; ry += (my-ry)*.14;
    ring.style.left = rx+'px'; ring.style.top = ry+'px'; requestAnimationFrame(loop); })();
  $$('[data-hover], a, button, .gal-slide').forEach(el => {
    el.addEventListener('mouseenter', () => ring.classList.add('grow'));
    el.addEventListener('mouseleave', () => ring.classList.remove('grow'));
  });
  if (matchMedia('(hover:hover)').matches) $$('.magnetic').forEach(el => {
    el.addEventListener('mousemove', e => {
      const r = el.getBoundingClientRect();
      el.style.transform = `translate(${(e.clientX-r.left-r.width/2)*.22}px,${(e.clientY-r.top-r.height/2)*.28}px)`;
    });
    el.addEventListener('mouseleave', () => el.style.transform = '');
  });
})();

/* ---------- Hero intro + SplitType ---------- */
function heroIntro(){
  if (!hasGsap) { $$('.hero .reveal').forEach(el => el.style.cssText='opacity:1;transform:none'); return; }
  if (typeof SplitType !== 'undefined') new SplitType('#heroTitle', { types: 'lines' });
  $$('#heroTitle .line').forEach(l => { const w=document.createElement('span'); w.className='line'; l.replaceWith(w); w.appendChild(l); l.style.display='block'; });
  const tl = gsap.timeline({ defaults:{ ease:'power3.out' } });
  tl.from('#heroTitle .line > *', { yPercent: 110, duration: 1.15, stagger: .12 })
    .to('.hero .reveal', { opacity: 1, y: 0, duration: .9, stagger: .12 }, '-=.6');
}

/* ---------- Scroll animations ---------- */
if (hasGsap && typeof ScrollTrigger !== 'undefined') {
  $$('.reveal').forEach(el => {
    if (el.closest('.hero')) return;
    gsap.to(el, { opacity: 1, y: 0, duration: 1, ease: 'power3.out',
      scrollTrigger: { trigger: el, start: 'top 88%' } });
  });
  /* Parallax images */
  $$('[data-parallax]').forEach(img => gsap.fromTo(img, { yPercent: -7 }, { yPercent: 7, ease: 'none',
    scrollTrigger: { trigger: img.closest('figure, .ct-media, .exp-media') || img, start: 'top bottom', end: 'bottom top', scrub: true } }));
  gsap.to('#heroImg', { yPercent: 12, ease: 'none',
    scrollTrigger: { trigger: '.hero', start: 'top top', end: 'bottom top', scrub: true } });
  /* Compteurs statistiques */
  $$('[data-count]').forEach(el => {
    const end = +el.dataset.count, div = +(el.dataset.div || 1);
    ScrollTrigger.create({ trigger: el, start: 'top 90%', once: true, onEnter: () => {
      const obj = { v: 0 };
      gsap.to(obj, { v: end, duration: 1.8, ease: 'power2.out',
        onUpdate: () => el.textContent = div > 1 ? (obj.v/div).toFixed(1).replace('.', ',') : Math.round(obj.v) });
    }});
  });
  /* Tilt léger sur les cartes */
  if (matchMedia('(hover:hover)').matches) $$('.tilt').forEach(card => {
    card.addEventListener('mousemove', e => {
      const r = card.getBoundingClientRect();
      gsap.to(card, { rotateY: ((e.clientX-r.left)/r.width-.5)*5, rotateX: (.5-(e.clientY-r.top)/r.height)*5,
        transformPerspective: 900, duration: .5 });
    });
    card.addEventListener('mouseleave', () => gsap.to(card, { rotateX: 0, rotateY: 0, duration: .7, ease: 'power3.out' }));
  });
} else {
  document.documentElement.classList.add('no-anim');
  $$('[data-count]').forEach(el => { const d = +(el.dataset.div||1);
    el.textContent = d > 1 ? (+el.dataset.count/d).toFixed(1).replace('.', ',') : el.dataset.count; });
}

/* ---------- Marquee ---------- */
(() => { const t = $('#mqTrack'); if (!t) return;
  if (hasGsap) gsap.to(t, { xPercent: -50, duration: 30, ease: 'none', repeat: -1 });
})();

/* ---------- Menu : filtres ---------- */
(() => {
  const tabs = $$('#menuTabs .tab'), dishes = $$('#menuGrid .dish');
  tabs.forEach(tab => tab.addEventListener('click', () => {
    tabs.forEach(t => t.classList.remove('active')); tab.classList.add('active');
    const cat = tab.dataset.cat;
    dishes.forEach(d => {
      const show = cat === 'all' || d.dataset.cat === cat;
      if (show) { d.classList.remove('hide');
        if (hasGsap) gsap.fromTo(d, { opacity: 0, y: 24, scale: .97 }, { opacity: 1, y: 0, scale: 1, duration: .55, ease: 'power3.out' });
      } else d.classList.add('hide');
    });
    if (typeof ScrollTrigger !== 'undefined') ScrollTrigger.refresh();
  }));
})();

/* ---------- Swipers ---------- */
if (typeof Swiper !== 'undefined') {
  const gallery = new Swiper('.gallery', { slidesPerView: 1.15, spaceBetween: 20, loop: true,
    autoplay: { delay: 4200, disableOnInteraction: false },
    pagination: { el: '.gallery .swiper-pagination', clickable: true },
    breakpoints: { 640: { slidesPerView: 2.1 }, 1080: { slidesPerView: 2.6 } } });
  $('#galPrev').addEventListener('click', () => gallery.slidePrev());
  $('#galNext').addEventListener('click', () => gallery.slideNext());
  new Swiper('.reviews-swiper', { slidesPerView: 1, spaceBetween: 22, loop: true,
    autoplay: { delay: 5200, disableOnInteraction: false },
    pagination: { el: '.reviews-swiper .swiper-pagination', clickable: true },
    breakpoints: { 760: { slidesPerView: 2 }, 1120: { slidesPerView: 3 } } });
}

/* ---------- Lightbox ---------- */
(() => {
  const lb = $('#lightbox'), img = $('#lbImg');
  $$('[data-lightbox]').forEach(el => el.addEventListener('click', () => {
    img.src = el.dataset.lightbox; lb.classList.add('on'); document.body.style.overflow = 'hidden';
  }));
  const close = () => { lb.classList.remove('on'); document.body.style.overflow = ''; };
  $('#lbClose').addEventListener('click', close);
  lb.addEventListener('click', e => { if (e.target === lb) close(); });
  addEventListener('keydown', e => { if (e.key === 'Escape') { close(); closeCart(); closeModal(); } });
})();

/* ---------- FAQ accordéon ---------- */
$$('.faq-item').forEach(item => {
  const btn = $('.faq-q', item), panel = $('.faq-a', item);
  btn.addEventListener('click', () => {
    const open = item.classList.contains('open');
    $$('.faq-item.open').forEach(o => { o.classList.remove('open'); $('.faq-a', o).style.maxHeight = null;
      $('.faq-q', o).setAttribute('aria-expanded', 'false'); });
    if (!open) { item.classList.add('open'); panel.style.maxHeight = panel.scrollHeight + 'px';
      btn.setAttribute('aria-expanded', 'true'); }
  });
});

/* ---------- Toast + Modal ---------- */
let toastTimer;
function toast(msg){ $('#toastText').textContent = msg; const t = $('#toast');
  t.classList.add('on'); clearTimeout(toastTimer); toastTimer = setTimeout(() => t.classList.remove('on'), 2600); }
function showModal(title, text, icon = 'fa-check'){
  $('#modalTitle').textContent = title; $('#modalText').textContent = text;
  $('#modalIcon').innerHTML = `<i class="fa-solid ${icon}"></i>`; $('#modal').classList.add('on');
  document.body.style.overflow = 'hidden'; }
function closeModal(){ $('#modal').classList.remove('on'); if (!$('#cart').classList.contains('on')) document.body.style.overflow = ''; }
$('#modalClose').addEventListener('click', closeModal);
$('#modal').addEventListener('click', e => { if (e.target.id === 'modal') closeModal(); });

/* ---------- Carrello / Ordina ---------- */
const cart = new Map(); // nom -> {price, qty, img}
let mode = 'consegna';
const SHIP = 3.90, FREE_FROM = 50;
const cartEl = $('#cart'), overlay = $('#overlay');

function cartTotals(){
  let sub = 0, count = 0;
  cart.forEach(i => { sub += i.price * i.qty; count += i.qty; });
  const ship = mode === 'asporto' || sub === 0 ? 0 : (sub >= FREE_FROM ? 0 : SHIP);
  return { sub, ship, total: sub + ship, count };
}
function renderCart(){
  const box = $('#cartItems'); box.innerHTML = '';
  const { sub, ship, total, count } = cartTotals();
  cart.forEach((item, name) => {
    const row = document.createElement('div'); row.className = 'citem';
    row.innerHTML = `<img src="${item.img}" alt=""><div class="ci-info"><strong>${name}</strong><span>${euro(item.price)}</span></div>
      <div class="qty"><button data-act="minus" aria-label="Diminuisci">−</button><b>${item.qty}</b><button data-act="plus" aria-label="Aumenta">+</button></div>
      <button class="ci-del" data-act="del" aria-label="Rimuovi"><i class="fa-solid fa-trash"></i></button>`;
    row.addEventListener('click', e => {
      const act = e.target.closest('[data-act]')?.dataset.act; if (!act) return;
      if (act === 'plus') item.qty++;
      if (act === 'minus') item.qty = Math.max(0, item.qty - 1);
      if (act === 'del' || item.qty === 0) cart.delete(name);
      renderCart();
    });
    box.appendChild(row);
  });
  cartEl.classList.toggle('hidden-empty', cart.size > 0);
  $('#cartEmpty').style.display = cart.size ? 'none' : 'block';
  $('#cartFooter').style.display = cart.size ? 'block' : 'none';
  $('#ctSub').textContent = euro(sub);
  $('#ctShipLabel').textContent = mode === 'asporto' ? 'Asporto (ritiro in sede)' : 'Consegna';
  $('#ctShip').textContent = ship === 0 && sub > 0 ? 'Gratis' : euro(ship);
  $('#ctTotal').textContent = euro(total);
  $('#freeShip').textContent = (mode === 'consegna' && sub > 0 && sub < FREE_FROM)
    ? `Ti mancano ${euro(FREE_FROM - sub)} per la consegna gratuita.` : (sub >= FREE_FROM && mode === 'consegna' ? 'Consegna gratuita sbloccata.' : '');
  const badge = $('#cartCount'); badge.textContent = count; badge.classList.toggle('on', count > 0);
  $('#barText').textContent = count === 0 ? 'Il carrello è vuoto'
    : `${count} ${count === 1 ? 'prodotto' : 'prodotti'} · Totale ${euro(total)} (${mode === 'consegna' ? 'Consegna' : 'Asporto'})`;
}
function addToCart(name, price, img, sourceEl){
  const found = cart.get(name);
  found ? found.qty++ : cart.set(name, { price, qty: 1, img: img || '' });
  renderCart(); toast(`${name} aggiunto all'ordine`);
  if (hasGsap && sourceEl) gsap.fromTo(sourceEl, { scale: .94 }, { scale: 1, duration: .4, ease: 'back.out(3)' });
  const badge = $('#cartCount'); if (hasGsap) gsap.fromTo(badge, { scale: 1.6 }, { scale: 1, duration: .45, ease: 'back.out(3)' });
}
$$('[data-add]').forEach(btn => btn.addEventListener('click', () => {
  const card = btn.closest('article');
  addToCart(btn.dataset.add, +btn.dataset.price, card ? $('img', card)?.src : '', btn);
}));
function openCart(){ renderCart(); cartEl.classList.add('on'); overlay.classList.add('on'); document.body.style.overflow = 'hidden'; }
function closeCart(){ cartEl.classList.remove('on'); overlay.classList.remove('on'); if (!$('#modal').classList.contains('on')) document.body.style.overflow = ''; }
$('#cartBtn').addEventListener('click', openCart);
$('#barBtn').addEventListener('click', openCart);
$('#cartClose').addEventListener('click', closeCart);
overlay.addEventListener('click', closeCart);

$$('.mode').forEach(btn => btn.addEventListener('click', () => {
  $$('.mode').forEach(b => b.classList.remove('active')); btn.classList.add('active');
  mode = btn.dataset.mode;
  $('#cartMode').textContent = mode === 'consegna' ? 'Consegna a domicilio' : 'Asporto · ritiro in sede';
  renderCart(); toast(mode === 'consegna' ? 'Modalità : consegna a domicilio' : 'Modalità : asporto, pronto in 25 minuti');
}));
$('#checkoutBtn').addEventListener('click', () => {
  if (!cart.size) return;
  const { total, count } = cartTotals();
  closeCart(); cart.clear(); renderCart();
  showModal('Ordine ricevuto!', `Grazie ! Il tuo ordine (${count} prodotti · ${euro(total)}) è stato ricevuto. ${mode === 'consegna' ? 'Arriverà entro 45 minuti.' : 'Sarà pronto da ritirare tra 25 minuti.'} Ti abbiamo inviato la conferma.`, 'fa-basket-shopping');
});
renderCart();

/* ---------- Prenotazione (simulée) ---------- */
(() => {
  const form = $('#bookForm'); if (!form) return;
  const date = $('[name="data"]', form);
  date.min = new Date().toISOString().split('T')[0];
  form.addEventListener('submit', e => {
    e.preventDefault();
    const required = $$('[required]', form); let firstBad = null;
    required.forEach(f => {
      const bad = !f.value.trim() || (f.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(f.value));
      f.classList.toggle('invalid', bad); if (bad && !firstBad) firstBad = f;
    });
    const err = $('#bookError');
    if (firstBad) { err.textContent = 'Controlla i campi evidenziati : sono obbligatori per confermare.';
      firstBad.focus(); if (hasGsap) gsap.fromTo(form, { x: -7 }, { x: 0, duration: .45, ease: 'elastic.out(1,.35)' }); return; }
    err.textContent = '';
    const nome = $('[name="nome"]', form).value.trim().split(' ')[0];
    const sala = $('[name="sala"]', form).value, persone = $('[name="persone"]', form).value;
    const dataIt = new Date(date.value + 'T12:00').toLocaleDateString('it-IT', { weekday: 'long', day: 'numeric', month: 'long' });
    showModal('Prenotazione ricevuta', `Grazie ${nome} ! La tua prenotazione è stata ricevuta : ${persone.toLowerCase()}, ${sala}, ${dataIt} alle ${$('[name="ora"]', form).value}. Ti confermeremo a breve via email e telefono.`, 'fa-calendar-check');
    form.reset();
  });
  $$('input, select, textarea', form).forEach(f => f.addEventListener('input', () => f.classList.remove('invalid')));
})();

/* ---------- Newsletter (simulée) ---------- */
$('#newsForm').addEventListener('submit', e => {
  e.preventDefault();
  const input = $('input', e.target);
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value)) { $('#newsMsg').textContent = 'Inserisci un indirizzo email valido.'; return; }
  $('#newsMsg').textContent = 'Grazie ! Controlla la tua email per il benvenuto.';
  toast('Iscrizione alla newsletter confermata'); input.value = '';
});
