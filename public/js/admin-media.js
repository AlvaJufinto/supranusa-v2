window.openMediaModal = function(url, mimeType, filename) {
  var modal = document.getElementById('mediaModal');
  var content = document.getElementById('mediaModalContent');
  var title = document.getElementById('mediaModalTitle');

  title.textContent = filename;
  content.innerHTML = '';

  if (mimeType.startsWith('image/')) {
    var img = document.createElement('img');
    img.src = url;
    img.alt = filename;
    img.className = 'max-h-full max-w-full object-contain';
    content.appendChild(img);
  } else if (mimeType === 'application/pdf') {
    var iframe = document.createElement('iframe');
    iframe.src = url;
    iframe.className = 'h-full w-full border-0';
    iframe.title = filename;
    content.appendChild(iframe);
  } else {
    var wrapper = document.createElement('div');
    wrapper.className = 'text-center';
    wrapper.innerHTML = '<div class="mb-4 text-6xl">📄</div><p class="text-slate-600">Preview is not available for this file type.</p><a href="' + url + '" target="_blank" rel="noopener noreferrer" class="mt-4 inline-block rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">Open File</a>';
    content.appendChild(wrapper);
  }

  modal.classList.remove('hidden');
  modal.classList.add('flex');
  document.body.classList.add('overflow-hidden');
};

window.closeMediaModal = function(event) {
  if (event && event.target !== event.currentTarget) return;

  var modal = document.getElementById('mediaModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
  document.getElementById('mediaModalContent').innerHTML = '';
  document.body.classList.remove('overflow-hidden');
};

document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') window.closeMediaModal();
});
