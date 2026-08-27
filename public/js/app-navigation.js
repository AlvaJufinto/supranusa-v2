document.addEventListener('DOMContentLoaded', function() {
  var menuBtn = document.getElementById('menuBtn');
  if (menuBtn) {
    menuBtn.addEventListener('click', function() {
      var nav = document.getElementById('mobileNav');
      if (nav) nav.classList.toggle('hidden');
    });
  }
});

var closeTimeout;

function showBrandProducts(brandId) {
  clearTimeout(closeTimeout);
  var panel = document.getElementById('productsPanel');
  var content = document.getElementById('brand-products-' + brandId);
  panel.innerHTML = content ? content.innerHTML : '';
}

function keepDropdownOpen() {
  clearTimeout(closeTimeout);
}

function scheduleDropdownClose() {
  closeTimeout = setTimeout(function() {
    var panel = document.getElementById('productsPanel');
    if (panel) {
      panel.innerHTML = '<p class="text-xs text-slate-400">Hover a brand to see products</p>';
    }
  }, 150);
}
