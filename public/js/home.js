document.addEventListener('DOMContentLoaded', function() {
  var toTopBtn = document.getElementById('toTop');
  if (toTopBtn) {
    window.addEventListener('scroll', function() {
      if (window.scrollY > 300) {
        toTopBtn.classList.remove('opacity-0', 'pointer-events-none');
        toTopBtn.classList.add('opacity-100', 'cursor-pointer');
      } else {
        toTopBtn.classList.remove('opacity-100', 'cursor-pointer');
        toTopBtn.classList.add('opacity-0', 'pointer-events-none');
      }
    }, { passive: true });
  }

  var rail = document.getElementById('brandRail');
  var prevBtn = document.getElementById('brandPrev');
  var nextBtn = document.getElementById('brandNext');

  if (rail && prevBtn && nextBtn) {
    function scrollByCard(dir) {
      var card = rail.querySelector('[data-brand-id]');
      var step = card ? card.getBoundingClientRect().width + 24 : 300;
      rail.scrollBy({ left: dir * step, behavior: 'smooth' });
    }

    function updateArrowState() {
      var maxScroll = rail.scrollWidth - rail.clientWidth - 5;
      prevBtn.disabled = rail.scrollLeft <= 5;
      nextBtn.disabled = rail.scrollLeft >= maxScroll;
    }

    prevBtn.addEventListener('click', function() { scrollByCard(-1); });
    nextBtn.addEventListener('click', function() { scrollByCard(1); });
    rail.addEventListener('scroll', updateArrowState, { passive: true });
    updateArrowState();
    window.addEventListener('resize', updateArrowState, { passive: true });
  }
});
