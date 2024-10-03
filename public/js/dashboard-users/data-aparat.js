//----------------------------------------------------//

// System Config Tailwindcss
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                primary: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#1e40af",
                    900: "#1e3a8a",
                    950: "#172554",
                },
            },
        },
        fontFamily: {
            body: [
                "Inter",
                "ui-sans-serif",
                "system-ui",
                "-apple-system",
                "system-ui",
                "Segoe UI",
                "Roboto",
                "Helvetica Neue",
                "Arial",
                "Noto Sans",
                "sans-serif",
                "Apple Color Emoji",
                "Segoe UI Emoji",
                "Segoe UI Symbol",
                "Noto Color Emoji",
            ],
            sans: [
                "Inter",
                "ui-sans-serif",
                "system-ui",
                "-apple-system",
                "system-ui",
                "Segoe UI",
                "Roboto",
                "Helvetica Neue",
                "Arial",
                "Noto Sans",
                "sans-serif",
                "Apple Color Emoji",
                "Segoe UI Emoji",
                "Segoe UI Symbol",
                "Noto Color Emoji",
            ],
        },
    },
};

//----------------------------------------------------//

// System Pemanggilan Pada Tag Html
const body = document.querySelector("body");
const darkLight = document.querySelector("#darkLight");
const sidebar = document.querySelector(".sidebar");
const submenuItems = document.querySelectorAll(".submenu_item");
const sidebarOpen = document.querySelector("#sidebarOpen");
const sidebarClose = document.querySelector(".collapse_sidebar");
const sidebarExpand = document.querySelector(".expand_sidebar");
const mainContent = document.getElementById("mainContent");

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

// System Penyesuaian Sidebar Dengan Main Content
document
    .querySelector(".expand_sidebar")
    .addEventListener("click", function () {
        document.documentElement.style.setProperty("--sidebar-width", "250px");
        document
            .querySelector(".main-content")
            .classList.add("sidebar-expanded");
        document
            .querySelector(".main-content")
            .classList.remove("sidebar-collapsed");
    });

document
    .querySelector(".collapse_sidebar")
    .addEventListener("click", function () {
        document.documentElement.style.setProperty("--sidebar-width", "80px");
        document
            .querySelector(".main-content")
            .classList.add("sidebar-collapsed");
        document
            .querySelector(".main-content")
            .classList.remove("sidebar-expanded");
    });
//----------------------------------------------------//

//-------------------|MAIN CONTENT|-------------------//


//----------------------------------------------------//

