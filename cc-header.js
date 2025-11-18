(function(){
  const header = document.querySelector('.cc-header');
  const toggle = document.querySelector('.cc-menu-toggle');
  const drawer = document.getElementById('cc-drawer');
  const overlay = document.querySelector('.cc-overlay');
  const closeBtn = document.querySelector('.cc-drawer-close');

  if (!header || !toggle || !drawer || !overlay || !closeBtn) return;

  let lastY = window.scrollY;

  // Drawer helpers
  const openDrawer = () => {
    drawer.classList.add('open');
    drawer.setAttribute('aria-hidden','false');
    toggle.setAttribute('aria-expanded','true');
    overlay.hidden = false;
    document.body.style.overflow = 'hidden';
  };
  const closeDrawer = () => {
    drawer.classList.remove('open');
    drawer.setAttribute('aria-hidden','true');
    toggle.setAttribute('aria-expanded','false');
    overlay.hidden = true;
    document.body.style.overflow = '';
  };

  toggle.addEventListener('click', () => {
    drawer.classList.contains('open') ? closeDrawer() : openDrawer();
  });
  closeBtn.addEventListener('click', closeDrawer);
  overlay.addEventListener('click', closeDrawer);
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeDrawer(); });

  // Hide header on scroll down, show on scroll up
  window.addEventListener('scroll', () => {
    const y = window.scrollY;
    if (y > lastY && y > 100) {
      header.classList.add('is-hidden');
    } else {
      header.classList.remove('is-hidden');
    }
    lastY = y;
  }, { passive: true });

  // Close drawer when a link is clicked
  drawer.addEventListener('click', (e) => {
    if (e.target.tagName === 'A') closeDrawer();
  });
})();