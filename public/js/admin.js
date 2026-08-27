document.addEventListener('DOMContentLoaded', function() {
  // Mobile Sidebar
  var sidebar = document.getElementById('admin-sidebar');
  var overlay = document.getElementById('sidebar-overlay');
  var openButton = document.getElementById('open-sidebar');
  var closeButton = document.getElementById('close-sidebar');

  var openSidebar = function() {
    sidebar?.classList.add('is-open');
    overlay?.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
  };

  var closeSidebar = function() {
    sidebar?.classList.remove('is-open');
    overlay?.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
  };

  openButton?.addEventListener('click', openSidebar);
  closeButton?.addEventListener('click', closeSidebar);
  overlay?.addEventListener('click', closeSidebar);

  // Confirm dialogs for delete actions
  document.querySelectorAll('button[data-confirm]').forEach(function(button) {
    button.addEventListener('click', function(e) {
      var message = button.dataset.confirm || 'Are you sure?';
      if (!confirm(message)) {
        e.preventDefault();
        return false;
      }
    });
  });

  // Quill Rich Text Editor
  document.querySelectorAll('textarea.rich-editor').forEach(function(textarea) {
    if (textarea.dataset.quillInitialized === 'true') return;
    textarea.dataset.quillInitialized = 'true';

    var editorContainer = document.createElement('div');
    editorContainer.className = 'quill-editor-wrapper rounded-b-lg';
    textarea.parentNode.insertBefore(editorContainer, textarea);
    textarea.style.display = 'none';

    var quill = new Quill(editorContainer, {
      theme: 'snow',
      placeholder: textarea.getAttribute('placeholder') || '',
      modules: {
        toolbar: [
          [{ header: [1, 2, 3, false] }],
          ['bold', 'italic', 'underline', 'strike'],
          [{ list: 'ordered' }, { list: 'bullet' }],
          ['blockquote', 'link'],
          ['clean']
        ]
      }
    });

    var initialContent = textarea.value?.trim();
    if (initialContent) quill.root.innerHTML = initialContent;

    var syncContent = function() { textarea.value = quill.root.innerHTML; };
    quill.on('text-change', syncContent);

    var form = textarea.closest('form');
    if (form) form.addEventListener('submit', syncContent);
  });
});
