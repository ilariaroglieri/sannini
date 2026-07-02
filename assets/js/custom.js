// accordions and menus
function initToggleable(config) {
  const { toggleSelector, contentSelector, containerSelector } = config;
  
  // this takes to container of all rows if more types of accordion exist in the page
  const containers = containerSelector 
    ? document.querySelectorAll(containerSelector)
    : [document];
  
  containers.forEach(function(container) {
    const scopeRoot = containerSelector ? container : document;
    
    scopeRoot.querySelectorAll(toggleSelector).forEach(function(btn) {
      btn.addEventListener('click', function() {
        console.log(btn);
        const content = btn.nextElementSibling;
        const extraEls = btn.querySelector('.accordion__extra_els');
        const isOpen = !content.classList.contains('hidden');

        scopeRoot.querySelectorAll('.accordion__extra_els').forEach(function(el) {
          el.classList.add('hidden');
        });
        
        scopeRoot.querySelectorAll(contentSelector).forEach(function(el) {
          el.classList.add('hidden');
        });
        scopeRoot.querySelectorAll(toggleSelector).forEach(function(b) {
          b.classList.remove('open');
          b.setAttribute('aria-expanded', 'false');
        });
        
        if (!isOpen) {
          content.classList.remove('hidden');
          if (extraEls) { 
            extraEls.classList.remove('hidden');
          }
          btn.classList.add('open');
          btn.setAttribute('aria-expanded', 'true');
        }
      });
    });
  });
}

document.addEventListener('DOMContentLoaded', function() {
  // Menu
  initToggleable({
    toggleSelector: '.nav__accordion-toggle',
    contentSelector: '.nav__accordion'
  });
  
  // Accordion
  initToggleable({
    toggleSelector: '.accordion__toggle',
    contentSelector: '.accordion__content',
    containerSelector: '.accordion__module'
  });
});

// menu behaviour
function closeMenu(btn, item) {
  document.querySelector(item).classList.remove('menu-open');
  document.querySelector(btn).classList.remove('open');
}

function handleMenu(btn, item) {
  document.querySelector(btn).addEventListener('click', function(e) {
    e.stopPropagation();
    this.classList.toggle('open');
    document.querySelector(item).classList.toggle('menu-open');
  });
}

function closeMenuClickOutside(btn, item) {
  document.addEventListener('click', (e) => {
    const el = document.querySelector(item);
    if (!el.contains(e.target)) closeMenu(btn, item);
  });
}

// header behaviour on scroll
function headerBehaviour() {
  const vh = window.innerHeight;
  let prevScrollPos = window.scrollY;

  window.addEventListener('scroll', () => {
    const currScrollPos = window.scrollY;

    // close menu on scroll
    if (document.querySelector('#nav').classList.contains('menu-open')) {
      closeMenu('#menu-btn', '#nav');
    } else {
      const header = document.getElementById('header');
      // check direction
      const scrollingDown = currScrollPos > prevScrollPos;

      header.classList.toggle('on-scroll', currScrollPos > vh / 2);
      header.classList.toggle('hidden', scrollingDown && currScrollPos > vh / 2);
    }

    prevScrollPos = currScrollPos;
  });
}



// read more btn
document.querySelectorAll('.read-more-btn').forEach((btn) => {
  btn.addEventListener('click', () => {
    const text = btn.previousElementSibling;
    const isExpanded = text.classList.toggle('expanded');
    btn.textContent = isExpanded ? btn.dataset.less : btn.dataset.more;
  });
});


// plyr
function initVideoPlayers() {
  if (typeof Plyr === 'undefined') return;

  const players = document.querySelectorAll('.plyr__video-embed');
  if (!players.length) return;

  players.forEach((el) => new Plyr(el, {
    controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'fullscreen'],
    youtube: {
      noCookie: true,
      rel: 0,
      modestbranding: 1,
      iv_load_policy: 3
    }
  }));
};

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
      // data converted to dom nodes
      temp.innerHTML = data.html;
      // create array to loop
      const newItems = [...temp.children];
      //add fadein 
      newItems.forEach(el => el.classList.add('fade-in'));
      // show items
      newItems.forEach(el => list.appendChild(el));

      list.dataset.offset = offset + 4;

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

//------------------------- INIT
//handle opening
handleMenu('#menu-btn','#nav');
//close nav e cart on click outside
closeMenuClickOutside('#menu-btn','#nav');
closeMenuClickOutside('.cart-toggle','.cart-drawer');
// minify header on scroll
headerBehaviour();
initLoadMore('episodes-list', 'load-more-episodes-btn', window.episodesEndpoint);
// videos
initVideoPlayers();