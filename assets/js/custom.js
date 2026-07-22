const CROSS_ARM   = 4;   // metà braccio della crocetta
const CROSS_COLOR = '#414141';

function snapModules() {
  const moduleH = parseFloat(
    getComputedStyle(document.documentElement).getPropertyValue('--module-h')
  );
  if (!moduleH) return;

  document.querySelectorAll('.module').forEach(module => {
    const content = module.querySelector('.d-flex');
    if (!content) return;

    const naturalH = content.offsetHeight;

    if (naturalH > moduleH) {
      const steps = Math.ceil(naturalH / moduleH);
      module.style.height = (steps * moduleH) + 'px';
    } else {
      module.style.height = '';
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