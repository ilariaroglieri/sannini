// show more
function initLoadMore(containerId, btnId, endpoint) {
  const list = document.getElementById(containerId);
  const btn  = document.getElementById(btnId);
  if (!list || !btn) return;
  btn.addEventListener('click', async () => {
    const offset = parseInt(list.dataset.offset);
    btn.disabled = true;
    try {
      const res  = await fetch(`${endpoint}?offset=${offset}`);
      const data = await res.json();
      const temp = document.createElement('div');
      temp.innerHTML = data.html;
      const newItems = [...temp.children];
      newItems.forEach(el => list.appendChild(el));
      list.dataset.offset = offset + 4;

      const revealItems = [...list.querySelectorAll('[data-reveal]:not(.is-visible)')];
      revealItems.forEach((el, i) => {
        el.style.transitionDelay = `${i * 150}ms`;
        requestAnimationFrame(() => {
          requestAnimationFrame(() => {
            el.classList.add('is-visible');
          });
        });
      });

      if (!data.hasMore) {
        btn.remove();
      } else {
        btn.disabled = false;
      }
    } catch (err) {
      console.error('Load more failed:', err);
      btn.disabled = false;
    }
  });
}