// Add headers for Ajax Request
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


// Enable Bootstraps 5 tooltips everywhere
let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});


// initialize plugins and components
$(document).ready(function () {
  $('.selectize-singular').selectize({
    //options
  });

  $('.selectize-singular-linked').selectize({
    onChange(value) {
      window.location = value;
    }
  });

  $('.selectize-multiple').selectize({
    //options
  });
});


// Toggle Aside visibility
document.querySelector('.aside-toggler').addEventListener('click', (evt) => {
  document.body.classList.toggle('body_without_aside');
});


// Toggle Main table checkboxes on select all button click
if (document.querySelector('[data-action="select-all"]')) {
  document.querySelector('[data-action="select-all"]').addEventListener('click', (evt) => {
    let table = document.querySelector('.main-table')
    let checkboxes = table.querySelectorAll('input[type="checkbox"]');

    // check if all checkboxes selected
    let checkedAll = true;

    for (let chb of checkboxes) {
      if (!chb.checked) {
        checkedAll = false;
        break;
      }
    }

    // toggle checkbox statements
    for (let chb of checkboxes) {
      chb.checked = !checkedAll;
    }
  });
}


// change id value of destroy single item form
// and display destroy single item modal
// on table item delete button click
document.querySelectorAll('[data-action="display-destroy-single-item-modal"]').forEach((item) => {
  item.addEventListener('click', () => {
    // Change value of input before modal show
    document.querySelector('.destroy-single-item-modal-input').value = item.dataset.itemId;

    let modal = new bootstrap.Modal(document.getElementById('destroy-single-item-modal'));
    modal.show();
  });
});


// Initialize Simditor WYSIWYG
Simditor.locale = 'ru-RU';
let wysiwygs = [];
let simditorTextareas = document.querySelectorAll('.simditor-wysiwyg');

for (let i = 0; i < simditorTextareas.length; i++) {
  wysiwygs.push(
    new Simditor({
      textarea: simditorTextareas[i],
      toolbarFloatOffset: '60px',
      imageButton: 'upload',
      toolbar: ['title', 'bold', 'italic', 'underline', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'hr', '|', 'indent', 'outdent', 'alignment'] //image removed
      // upload: {
      //    url: '/upload/simditor_photo',   //image upload url by server
      //    params: {
      //       folder: 'news' //used in store folder path
      //    },
      //    fileKey: 'simditor_photo', //name of input
      //    connectionCount: 10,
      //    leaveConfirm: 'Пожалуйста дождитесь окончания загрузки изображений на сервер! Вы уверены что хотите закрыть страницу?'
      // },
      // defaultImage: '/img/news/simditor/default/default.png', //default image thumb while uploading
      // cleanPaste: true, //clear all styles while copy pasting,
    })
  );
}


// Show image from local on image input change
document.querySelectorAll('[data-action="display-local-image"]').forEach((input) => {
  input.addEventListener("change", (evt) => {
    var file = input.files[0];
    var imageType = /image.*/;

    if (file.type.match(imageType)) {
      document.querySelector(`[data-id="${input.dataset.target}"]`).src = URL.createObjectURL(file);
    } else {
      input.value = '';
      alert('Формат файла не поддерживается!');
    }
  });
});


// show spinner on form submit while uploading big files
document.querySelectorAll('[data-on-submit="show-spinner"]').forEach((item) => {
  item.addEventListener('submit', (evt) => {
    document.querySelector('.spinner').classList.remove('spinner--hidden');
  });
});



// initialize JSON Formatter
let jsonForm = document.querySelector('[data-on-submit="validate-json"]');
if (jsonForm) {
  if ($('#json-display')) {
    let editor = new JsonEditor('#json-display', getJson());
    editor.load(getJson());
  }

  function getJson() {
    if (document.querySelector('#json-input')) {
      try {
        return JSON.parse($('#json-input').val());
      } catch (ex) {
        console.log('Wrong JSON Format: ' + ex);
      }
    }
  }

  // validate json input before form submit
  jsonForm.addEventListener('submit', (evt) => {
    let display = document.querySelector('#json-display');
    let input = document.querySelector('#json-input');

    if (isValidJson(display.textContent)) {
      input.value = display.textContent;
    } else {
      evt.preventDefault();
      alert('Пожалуйста, исправьте ошибки прежде чем сохранить файл!');
    }
  })

  function isValidJson(str) {
    try {
      if (typeof str != 'string') return false;
      JSON.parse(str);
      return true;
    } catch (error) {
      return false;
    }
  }
}
