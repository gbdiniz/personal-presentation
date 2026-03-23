import { gsap } from 'gsap';

alert("aa")

const CHARS = [
  '0','1','A','B','C','D','E','F',
  '{','}','<','>','/','\\','|',
  '#','$','%','@','!','?',
  '2','3','4','5','6','7','8','9'
];

const SVG_PATH = `
  M 0.5,0.01
  A 0.19,0.17 0 0,1 0.69,0.18
  A 0.19,0.17 0 0,1 0.5,0.35
  L 0.57,0.46
  C 0.72,0.52 0.88,0.60 1.0,0.72
  L 1.0,1.0
  L 0.0,1.0
  L 0.0,0.72
  C 0.12,0.60 0.28,0.52 0.43,0.46
  L 0.5,0.35
  A 0.19,0.17 0 0,1 0.31,0.18
  A 0.19,0.17 0 0,1 0.5,0.01
  Z
`.trim();

function randomChar() {
  return CHARS[Math.floor(Math.random() * CHARS.length)];
}

function injectClipPathSVG(container) {
  const existing = container.querySelector('svg.sil-defs');
  if (existing) existing.remove();

  const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
  svg.setAttribute('width', '0');
  svg.setAttribute('height', '0');
  svg.style.position = 'absolute';
  svg.style.overflow = 'visible';
  svg.classList.add('sil-defs');

  const defs = document.createElementNS('http://www.w3.org/2000/svg', 'defs');
  const clipPath = document.createElementNS('http://www.w3.org/2000/svg', 'clipPath');
  clipPath.setAttribute('id', 'silhouette-clip');
  clipPath.setAttribute('clipPathUnits', 'objectBoundingBox');

  const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
  path.setAttribute('d', SVG_PATH);

  clipPath.appendChild(path);
  defs.appendChild(clipPath);
  svg.appendChild(defs);
  container.appendChild(svg);
}

function measureChar(container) {
  const probe = document.createElement('span');
  probe.style.cssText = `
    position:absolute; visibility:hidden;
    font-family:'Courier New',Menlo,Monaco,Consolas,monospace;
    font-size:10px; line-height:1.2; white-space:pre;
  `;
  probe.textContent = 'X';
  container.appendChild(probe);
  const rect = probe.getBoundingClientRect();
  container.removeChild(probe);
  return { w: rect.width || 6, h: rect.height || 12 };
}

function buildGrid(container) {
  const existing = container.querySelector('.silhouette-grid');
  if (existing) existing.remove();

  const { w: charW, h: lineH } = measureChar(container);
  const containerW = container.clientWidth;
  const containerH = container.clientHeight;

  const cols = Math.min(Math.floor(containerW / charW), 120);
  const rows = Math.min(Math.floor(containerH / lineH), 100);

  const grid = document.createElement('div');
  grid.className = 'silhouette-grid';
  grid.style.setProperty('--sil-cols', cols);
  grid.style.setProperty('--sil-char-w', `${charW}px`);

  const total = cols * rows;
  const fragment = document.createDocumentFragment();
  for (let i = 0; i < total; i++) {
    const span = document.createElement('span');
    span.textContent = randomChar();
    fragment.appendChild(span);
  }
  grid.appendChild(fragment);
  container.appendChild(grid);

  return { grid, rows, cols };
}

let idleTimer = null;

function startIdleCycle(spans) {
  if (idleTimer) clearInterval(idleTimer);
  idleTimer = setInterval(() => {
    const count = Math.floor(spans.length * 0.05);
    for (let i = 0; i < count; i++) {
      const span = spans[Math.floor(Math.random() * spans.length)];
      gsap.to(span, {
        opacity: 0,
        duration: 0.1,
        onComplete: () => {
          span.textContent = randomChar();
          gsap.to(span, { opacity: 1, duration: 0.1 });
        }
      });
    }
  }, 150);
}

function initGSAPAnimation(grid, rows, cols) {
  const spans = [...grid.querySelectorAll('span')];

  gsap.from(spans, {
    opacity: 0,
    duration: 0.05,
    stagger: {
      amount: 1.5,
      from: 'center',
      grid: [rows, cols],
    },
    ease: 'power2.out',
    onComplete: () => startIdleCycle(spans),
  });
}

function init() {
  const container = document.getElementById('silhouette-container');
  if (!container) return;

  if (container.clientWidth === 0) {
    requestAnimationFrame(init);
    return;
  }

  injectClipPathSVG(container);
  const { grid, rows, cols } = buildGrid(container);
  initGSAPAnimation(grid, rows, cols);

  let rebuildTimer = null;
  const observer = new ResizeObserver(() => {
    clearTimeout(rebuildTimer);
    rebuildTimer = setTimeout(() => {
      if (idleTimer) clearInterval(idleTimer);
      const result = buildGrid(container);
      initGSAPAnimation(result.grid, result.rows, result.cols);
    }, 200);
  });
  observer.observe(container);
}

document.fonts.ready.then(init);
