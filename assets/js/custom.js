//--------- background grid

const CROSS_ARM   = 4;   // metà braccio della crocetta
const CROSS_COLOR = '#414141';

function snapModules() {
  const moduleH = parseFloat(
    getComputedStyle(document.documentElement).getPropertyValue('--module-h')
  );
  if (!moduleH) return;

  const modules = [...document.querySelectorAll('.module')];

  // 1. reset: tutti tornano all'altezza CSS di base
  modules.forEach(m => { m.style.height = ''; });

  // 2. misura: ora .d-flex riflette il contenuto reale
  const heights = modules.map(m => {
    const content = m.querySelector('.d-flex');
    return content ? content.offsetHeight : null;
  });

  // 3. scrittura
  modules.forEach((m, i) => {
    const naturalH = heights[i];
    if (naturalH === null) return;
    if (naturalH > moduleH) {
      m.style.height = (Math.ceil(naturalH / moduleH) * moduleH) + 'px';
    }
  });
}

function updateGrid() {
  const container  = document.querySelector('.container');
  const containerW = container.getBoundingClientRect().width;
  if (!containerW) return;

  const arm    = CROSS_ARM;
  const gutter = arm;                          // rientro delle crocette esterne
  const step   = (containerW - gutter * 2) / 3; // larghezza reale di una cella
  const tileH  = step * 3 / 5;

  document.documentElement.style.setProperty('--module-h', tileH + 'px');

  // una crocetta centrata in (x, arm)
  const cross = x => `
    <path d="M${x - arm},${arm} H${x + arm}" fill="none" stroke="${CROSS_COLOR}" stroke-width="1"/>
    <path d="M${x},0 V${arm * 2}" fill="none" stroke="${CROSS_COLOR}" stroke-width="1"/>`;

  const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="${containerW}" height="${tileH}" viewBox="0 0 ${containerW} ${tileH}">
    ${[0, 1, 2, 3].map(i => cross(gutter + i * step)).join('')}
  </svg>`;

  container.style.backgroundImage    = `url("data:image/svg+xml,${encodeURIComponent(svg)}")`;
  container.style.backgroundSize     = `${containerW}px ${tileH}px`;
  container.style.backgroundRepeat   = 'repeat-y';
  container.style.backgroundPosition = '0 0';

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

//------- reveal on scroll
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const children = entry.target.querySelectorAll('.reveal');
      children.forEach((el, i) => {
        el.style.transitionDelay = `${i * 200}ms`;
        el.classList.add('is-visible');
      });
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.1 });

document.querySelectorAll('.d-flex').forEach(el => {
  revealObserver.observe(el);
});