//--------- background grid
const CROSS_ARM   = 4;   // metà braccio della crocetta
const CROSS_COLOR = '#fff';

const RATIO_DESKTOP = 3 / 5;      // altezza = larghezza × 0.6
const RATIO_MOBILE  = 1 / 1.37;   // altezza = larghezza / 1.37
const MOBILE_BP     = 768;        // soglia mobile in px

// legge variabile con clamp
function resolveVar(name) {
  const probe = document.createElement('div');
  probe.style.cssText = `position:absolute;height:var(${name});visibility:hidden;pointer-events:none`;
  document.body.appendChild(probe);
  const v = probe.getBoundingClientRect().height;
  probe.remove();
  return v;
}

// numero di colonne in base alla larghezza del container
function getCols(containerW) {
  return containerW <= MOBILE_BP ? 1 : 3;
}

function snapModules(scope = document) {
  const moduleH  = parseFloat(
    getComputedStyle(document.documentElement).getPropertyValue('--module-h')
  );
  if (!moduleH) return;
  const paddingH = parseFloat(resolveVar('--double-spacing'));
  const stacked  = container.getBoundingClientRect().width <= 640;
  const EPS = 2;

  const modules = [...document.querySelectorAll('.module')];
  modules.forEach(m => { m.style.height = ''; });

  const heights = modules.map(m => {
    const content = m.querySelector('.d-flex');
    return content ? content.offsetHeight : null;
  });

  modules.forEach((m, i) => {
    const naturalH = heights[i];
    if (naturalH === null) return;

    const isImg      = m.classList.contains('img-module') || m.classList.contains('special-img-module'); // dove aggiungere un modulo bianco sotto
    const isImgBlock = m.classList.contains('img-module'); // per questi su mobile viene aggiungo un modulo vuoto per ogni immagine

    // su mobile solo img-module avvolge gli element snappati
    if (isImgBlock && stacked) { m.style.height = 'auto'; return; }

    if (isImg) {
      const base = Math.max(1, Math.ceil((naturalH - EPS) / moduleH));
      m.style.height = ((base + 1) * moduleH) + 'px';
    } else if (naturalH > moduleH + EPS) {
      m.style.height = (Math.ceil((naturalH - EPS) / moduleH) * moduleH) + 'px';
    } else {
      m.style.height = '';
    }
  });

  // ─── mobile: ogni .element-image occupa celle intere + 1 vuota ───
  const imgEls = [...document.querySelectorAll('.img-module .element-image')];
  imgEls.forEach(el => { el.style.height = ''; });

  if (stacked) {
    const elH = imgEls.map(el => el.offsetHeight);
    imgEls.forEach((el, i) => {
      const steps = Math.max(1, Math.ceil(elH[i] / moduleH));
      el.style.height = ((steps + 1) * moduleH - paddingH) + 'px';  // multiplo tondo, niente - paddingH
    });
  }


}

function updateGrid() {
  const container  = document.querySelector('.container');
  const containerW = container.getBoundingClientRect().width;
  if (!containerW) return;

  const cols   = getCols(containerW);
  const arm    = CROSS_ARM;
  const gutter = arm;                                   // rientro delle crocette esterne
  const step   = (containerW - gutter * 2) / cols;      // larghezza reale di una cella
  const ratio  = cols === 1 ? RATIO_MOBILE : RATIO_DESKTOP;
  const tileH  = step * ratio;

  document.documentElement.style.setProperty('--module-h', tileH + 'px');

  // una crocetta centrata in (x, arm)
  const cross = x => `
    <path d="M${x - arm},${arm} H${x + arm}" fill="none" stroke="${CROSS_COLOR}" stroke-width="1"/>
    <path d="M${x},0 V${arm * 2}" fill="none" stroke="${CROSS_COLOR}" stroke-width="1"/>`;

  // cols+1 crocette: i due (o quattro) bordi delle colonne
  const xs  = Array.from({ length: cols + 1 }, (_, i) => i);
  const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="${containerW}" height="${tileH}" viewBox="0 0 ${containerW} ${tileH}">
    ${xs.map(i => cross(gutter + i * step)).join('')}
  </svg>`;

  const markers = document.querySelector('#grid-markers');
  markers.style.backgroundImage    = `url("data:image/svg+xml,${encodeURIComponent(svg)}")`;
  markers.style.backgroundSize     = `${containerW}px ${tileH}px`;
  markers.style.backgroundRepeat   = 'repeat-y';
  markers.style.backgroundPosition = '0 0';

  snapModules();
}

const container = document.querySelector('.container');
let lastW = 0;
const ro = new ResizeObserver(entries => {
  const w = entries[0].contentRect.width;
  if (Math.abs(w - lastW) < 0.5) return; // ignora i cambi di sola altezza
  lastW = w;
  updateGrid();
});
ro.observe(container);

//------- parallax animation
function applyParallax() {
  const SPEED = 200; // ampiezza in px
  const vh = window.innerHeight;

  document.querySelectorAll('.special-img-module').forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.bottom < 0 || rect.top > vh) return;

    const progress = (vh - rect.top) / (vh + rect.height);
    const clamped  = Math.max(0, Math.min(1, progress));
    const offset   = (clamped - 0.5) * 2 * SPEED * -1;

    el.style.transform = `translate3d(0, ${offset}px, 0)`;
  });

  ticking = false;
}

function onScroll() {
  if (!ticking) {
    requestAnimationFrame(applyParallax);
    ticking = true;
  }
}

window.addEventListener('scroll', onScroll, { passive: true });
applyParallax();

//------- color selection
document.addEventListener('click', e => {
  const btn = e.target.closest('button[data-color]');
  if (!btn) return;

  const currCol = btn.dataset.color;

  document.querySelector('button[data-color].active')?.classList.remove('active');
  document.querySelector('.color-info.active')?.classList.remove('active');
  document.querySelector('.color-info#' + currCol).classList.add('active');

  btn.classList.add('active');
});

//------- reveal on scroll
// use data-reveal="parent" and data-reveal="child"
// use data-reveal-delay="75" for setting different speed
const revealObserver = new IntersectionObserver((entries) => {
  const COL_BASE_DELAY = 160;
  const CHILD_DELAY = 100;

  const sortedEntries = [...entries]
    .filter(e => e.isIntersecting)
    .sort((a, b) => a.target.getBoundingClientRect().top - b.target.getBoundingClientRect().top);

  let globalDelay = 0;

  sortedEntries.forEach(entry => {
    const container = entry.target;
    const isReversed = container.classList.contains('d-row-reverse');
    let parents = [...container.querySelectorAll('[data-reveal="parent"]')];

    if (isReversed) parents = [...parents].reverse();

    parents = parents.sort((a, b) => {
      const orderA = parseInt(getComputedStyle(a).order) || 0;
      const orderB = parseInt(getComputedStyle(b).order) || 0;
      return orderA - orderB;
    });

    parents.forEach(col => {
      setTimeout(() => {
        col.classList.add('is-visible');

        col.querySelectorAll('[data-reveal="child"]').forEach((el, rowIndex) => {
          setTimeout(() => {
            el.classList.add('is-visible');
            el.addEventListener('transitionend', () => {
              el.style.transitionDelay = '0s';
            }, { once: true });
          }, rowIndex * CHILD_DELAY);
        });
      }, globalDelay);

      globalDelay += COL_BASE_DELAY;
    });

    revealObserver.unobserve(container);
  });
}, { threshold: 0.1 });


document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.d-flex:has(> [data-reveal="parent"])').forEach(el => {
    revealObserver.observe(el);
  });
  document.querySelector('#grid-markers').classList.add('loaded');
});