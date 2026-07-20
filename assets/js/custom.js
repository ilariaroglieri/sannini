function snapModules() {
  const moduleH = parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--module-h'));

  document.querySelectorAll('.module').forEach(module => {
  
    const content = module.querySelector('.d-flex');
    if (!content) return;

    const naturalH = content.offsetHeight;

    if (naturalH > moduleH) {
      const steps = Math.ceil(naturalH / moduleH);
      module.style.aspectRatio = 'unset';
      module.style.height = (steps * moduleH) + 'px';
    } else {
      module.style.aspectRatio = '';
      module.style.height = '';
    }
  });
}

function updateGrid() {
  const container = document.querySelector('.container');
  const containerW = container.offsetWidth;
  const arm = 4;
  const tileW = containerW / 3 - ((arm/3)*2);
  const tileH = tileW * 9 / 16;

  document.documentElement.style.setProperty('--module-h', tileH + 'px');

  const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="${tileW}" height="${tileH}" viewBox="${-arm} ${-arm} ${tileW} ${tileH}">
    <path d="M${-arm},0 H${arm}" fill="none" stroke="#414141" stroke-width="1"/>
    <path d="M0,${-arm} V${arm}" fill="none" stroke="#414141" stroke-width="1"/>
  </svg>`;

  const encoded = 'data:image/svg+xml,' + encodeURIComponent(svg);

  container.style.backgroundImage = `url("${encoded}")`;
  container.style.backgroundSize = `${tileW}px ${tileH}px`;
  container.style.backgroundRepeat = 'repeat';
  container.style.backgroundPosition = '0 0';

  snapModules(); 
}

updateGrid();
window.addEventListener('resize', updateGrid);