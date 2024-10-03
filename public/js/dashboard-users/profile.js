//----------------------------------------------------//

// System Config Tailwindcss
tailwind.config = {
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        primary: { "50": "#eff6ff", "100": "#dbeafe", "200": "#bfdbfe", "300": "#93c5fd", "400": "#60a5fa", "500": "#3b82f6", "600": "#2563eb", "700": "#1d4ed8", "800": "#1e40af", "900": "#1e3a8a", "950": "#172554" }
      }
    },
    fontFamily: {
      'body': [
        'Inter',
        'ui-sans-serif',
        'system-ui',
        '-apple-system',
        'system-ui',
        'Segoe UI',
        'Roboto',
        'Helvetica Neue',
        'Arial',
        'Noto Sans',
        'sans-serif',
        'Apple Color Emoji',
        'Segoe UI Emoji',
        'Segoe UI Symbol',
        'Noto Color Emoji'
      ],
      'sans': [
        'Inter',
        'ui-sans-serif',
        'system-ui',
        '-apple-system',
        'system-ui',
        'Segoe UI',
        'Roboto',
        'Helvetica Neue',
        'Arial',
        'Noto Sans',
        'sans-serif',
        'Apple Color Emoji',
        'Segoe UI Emoji',
        'Segoe UI Symbol',
        'Noto Color Emoji'
      ]
    }
  }
}

//----------------------------------------------------//

// System Pemanggilan Pada Tag Html
const body = document.querySelector("body");
const darkLight = document.querySelector("#darkLight");
const sidebar = document.querySelector(".sidebar");
const submenuItems = document.querySelectorAll(".submenu_item");
const sidebarOpen = document.querySelector("#sidebarOpen");
const sidebarClose = document.querySelector(".collapse_sidebar");
const sidebarExpand = document.querySelector(".expand_sidebar");
const mainContent = document.getElementById('mainContent');

//----------------------------------------------------//

// System Sidebar
sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));

sidebarClose.addEventListener("click", () => {
  sidebar.classList.add("close", "hoverable");
  mainContent.classList.add("full-width");
});

sidebarExpand.addEventListener("click", () => {
  sidebar.classList.remove("close", "hoverable");
  mainContent.classList.remove("full-width");
});

sidebar.addEventListener("mouseenter", () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.remove("close");
    mainContent.classList.remove("full-width");
  }
});

sidebar.addEventListener("mouseleave", () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.add("close");
    mainContent.classList.add("full-width");
  }
});

//----------------------------------------------------//

// System Dark Mode
darkLight.addEventListener("click", () => {
  body.classList.toggle("dark");
  if (body.classList.contains("dark")) {
    darkLight.classList.replace("bx-sun", "bx-moon");
  } else {
    darkLight.classList.replace("bx-moon", "bx-sun");
  }
});

//----------------------------------------------------//

// System Penyesuaian Submenu
submenuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    item.classList.toggle("show_submenu");
    submenuItems.forEach((item2, index2) => {
      if (index !== index2) {
        item2.classList.remove("show_submenu");
      }
    });
  });
});

if (window.innerWidth < 768) {
  sidebar.classList.add("close");
  mainContent.classList.add("full-width");
} else {
  sidebar.classList.remove("close");
  mainContent.classList.remove("full-width");
}

//----------------------------------------------------//



//-------------------|MAIN CONTENT|-------------------//

// System Ganti Sampul, Profile
function changeBackground(event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById('backgroundImage').src = e.target.result;
    }
    reader.readAsDataURL(file);
  }
}

function changeProfile(event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById('profileImage').src = e.target.result;
    }
    reader.readAsDataURL(file);
  }
}

//----------------------------------------------------//

// System Penyesuaian Sidebar Dengan Main Content
document.querySelector('.expand_sidebar').addEventListener('click', function () {
  document.documentElement.style.setProperty('--sidebar-width', '250px');
  document.querySelector('.main-content').classList.add('sidebar-expanded');
  document.querySelector('.main-content').classList.remove('sidebar-collapsed');
});

document.querySelector('.collapse_sidebar').addEventListener('click', function () {
  document.documentElement.style.setProperty('--sidebar-width', '80px');
  document.querySelector('.main-content').classList.add('sidebar-collapsed');
  document.querySelector('.main-content').classList.remove('sidebar-expanded');
});

//-----------------|MODAL JAVASCRIPT|-----------------//

// System Input Modal Pada Kode Desa
document.getElementById('kodeDesaInput').addEventListener('input', function (e) {
  let input = e.target.value;

  input = input.replace(/[^0-9]/g, '');
  
  if (input.length > 10) {
    input = input.slice(0, 10);
  }
  
  e.target.value = input;
});

//----------------------------------------------------//

// System Input Modal Pada NPWP
function validateNpwp(input) {
  let value = input.value;

  value = value.replace(/[^0-9.-]/g, '');

  if (value.length > 20) {
    value = value.slice(0, 20);
  }

  input.value = value;
}

//----------------------------------------------------//

// System Input Modal Pada Nomor & Tahun Perbup
function formatPerbupNumber(input) {
  let value = input.value.replace(/\D/g, ''); 
  if (value.length > 3) {
    value = value.slice(0, 3) + '/' + value.slice(3, 7);
  }
  input.value = value.slice(0, 8);
}

//----------------------------------------------------//

// System Input Modal Pada Tahun Anggaran
function validateYear(input) {
  let value = input.value;

  value = value.replace(/[^0-9]/g, '');

  if (value.length > 4) {
    value = value.slice(0, 4);
  }

  input.value = value;
}

//----------------------------------------------------//

// System Input Modal Pada tahun anggaran
function validateYear(input) {
  input.value = input.value.replace(/\D/g, '');

  if (input.value.length > 4) {
    input.value = input.value.slice(0, 4);
  }
}

//----------------------------------------------------//

// System Input Modal Pada Deskripsi
function updateCharCount() {
  const textarea = document.getElementById('villageDescription');
  const charCount = document.getElementById('charCount');
  const currentLength = textarea.value.length;
  charCount.textContent = `${currentLength}/100 karakter`;
}

//----------------------------------------------------//