<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Title -->
    <title>Klipaa | Penyedia</title>

    <!-- Logo -->
    <link rel="shortcut icon" href="svg/L-Klipaa.svg" type="image/x-icon">

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Cdn | Tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet">

    <!-- Cdn | Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Css -->
    <link rel="stylesheet" href="css/dashboard-users/data-penyedia.css">

</head>

<body>



    <!-- Navbar -->
    <nav class="navbar" style="position: fixed;">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="svg/L-KLipaa.svg" alt=""></i>Klipaa Indonesia
        </div>

        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
            <img src="img/profile.png" alt="Profile" class="profile" onclick="redirectToProfile()">
        </div>

        <script>
            function redirectToProfile() {
                window.location.href = '/home';
            }
        </script>

    </nav>
    <!-- End | Navbar -->



    <!-- Modal Log Out -->
    <div id="logout-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="logout-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah yakin anda ingin log
                        out?</h3>
                    <button onclick="redirectToLogout()" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Log Out
                    </button>
                    <button data-modal-hide="logout-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kembali</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End | Modal Log Out -->



    <!-- Sidebar -->
    <nav class="sidebar">

        <!-- Menu Content -->
        <div class="menu_content">

            <!-- Menu Sidebar 1 -->
            <ul class="menu_items">
                <div class="menu_title menu_1"></div>

                <li class="item">
                    <a href="/data_aparat" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-male-female"></i>
                        </span>
                        <span class="navlink">Data Aparatur</span>
                    </a>
                </li>

                <li class="item">
                    <a href="/data_pka" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-id-card"></i>
                        </span>
                        <span class="navlink">Data PKA</span>
                    </a>
                </li>

                <li class="item">
                    <a href="/data_tpk" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-group"></i>
                        </span>
                        <span class="navlink">Data TPK</span>
                    </a>
                </li>

                <li class="item">
                    <a href="/data_penyedia" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-user"></i>
                        </span>
                        <span class="navlink">Data Penyedia</span>
                    </a>
                </li>
            </ul>
            <!-- End | Menu Sidebar 1 -->

            <!-- Menu Sidebar 2 -->
            <ul class="menu_items">
                <div class="menu_title menu_2"></div>

                <li class="item">
                    <a href="bamusrenbangdes" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-news"></i>
                        </span>
                        <span class="navlink">Berita Acara</span>
                    </a>
                </li>

                <li class="item">
                    <a href="data_rkp" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-folder"></i>
                        </span>
                        <span class="navlink">RKP Desa</span>
                    </a>
                </li>

                <li class="item">
                    <a href="/pengumuman" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-calendar-check"></i>
                        </span>
                        <span class="navlink">Pengumuman<br>Perencanaan</span>
                    </a>
            </ul>
            <!-- End | Menu Sidebar 2 -->

            <!-- Menu Sidebar 3 -->
            <ul class="menu_items">
                <div class="menu_title menu_3"></div>

                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-briefcase-alt-2"></i>
                        </span>
                        <span class="navlink">Secara Swakelola</span>
                    </a>
                </li>

                <li class="item">
                    <a href="http://127.0.0.1:8000/persiapan" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-store-alt"></i>
                        </span>
                        <span class="navlink">Melalui Penyedia</span>
                    </a>
                </li>

                <ul class="menu_items submenu">
                    <a href="#" class="nav_link sublink">Menu Link 1</a>
                    <a href="#" class="nav_link sublink">Menu Link 2</a>
                </ul>
                </li>
            </ul>
            <!-- End | Menu Sidebar 3 -->

            <!-- Menu Sidebar 5 -->
            <ul class="menu_items">
                <div class="menu_title menu_5"></div>

                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-briefcase-alt-2"></i>
                        </span>
                        <span class="navlink">Secara Swakelola</span>
                    </a>
                </li>

                <li class="item">
                    <a href="http://127.0.0.1:8000/pelaksanaan" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-store-alt"></i>
                        </span>
                        <span class="navlink">Secara Penyedia</span>
                    </a>
                </li>
            </ul>
            <!-- End | Menu Sidebar 5 -->
            <!-- Menu Sidebar 4 -->
            <ul class="menu_items">
                <div class="menu_title menu_4"></div>

                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-briefcase-alt-2"></i>
                        </span>
                        <span class="navlink">Secara Swakelola</span>
                    </a>
                </li>

                <li class="item">
                    <a href="http://127.0.0.1:8000/penyerahan" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-store-alt"></i>
                        </span>
                        <span class="navlink">Secara Penyedia</span>
                    </a>
                </li>
            </ul>
            <!-- End | Menu Sidebar 4 -->


            <!-- Sidebar Open / Close -->
            <div class="bottom_content">
                <div class="bottom expand_sidebar">
                    <span> Munculkan</span>
                    <i class='bx bx-log-in'></i>
                </div>
                <div class="bottom collapse_sidebar">
                    <span> Sembunyikan</span>
                    <i class='bx bx-log-out'></i>
                </div>
            </div>
            <!-- End | Sidebar Open / Close -->

        </div>
        <!-- End | Menu Content -->
    </nav>
    <!-- End | Sidebar -->



    <br>



    <!-- Main Content -->
    <div id="mainContent" class="main-content ml-64 transition-all duration-300 p-6">


        <h2 class="text-4xl font-bold text-center text-varBlue dark:text-black mt-5 mb-12">
            Persiapan Pengadaan Secara Penyedia
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-8">


            <!-- Card 1 -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                        Jadwal Pelaksanaan
                    </h5>
                </a>
                <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                    voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                    molestias tempore accusantium.
                </p>
                <a href="jadwal"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Olah Data
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <!-- End | Card 1 -->


            <!-- Card 2 (Tambahkan Card Lagi Disini Copas Card Yang Di Atas) -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                        Kerangka Acuan Kerja (KAK)
                    </h5>
                </a>
                <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                    voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                    molestias tempore accusantium.
                </p>
                <a href="data_kak"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Olah Data
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <!-- End | Card 2 -->


            <!-- Card 3 (Tambahkan Card Lagi Disini Copas Card Yang Di Atas) -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                        Spesifikasi Teknis
                    </h5>
                </a>
                <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                    voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                    molestias tempore accusantium.
                </p>
                <a href="teknis_pilih"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Olah Data
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <!-- End | Card 3 -->


            <!-- Card 4 (Tambahkan Card Lagi Disini Copas Card Yang Di Atas) -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="data_analisa">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                        Analisa Harga Satuan
                    </h5>
                </a>
                <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                    voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                    molestias tempore accusantium.
                </p>
                <a href="analisa_pilih"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Olah Data
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <!-- End | Card 4 -->

            <!-- Card 5 (Tambahkan Card Lagi Disini Copas Card Yang Di Atas) -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="data_analisa">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                        Harga Perkiraan Sendiri
                    </h5>
                </a>
                <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                    voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                    molestias tempore accusantium.
                </p>
                <a href="perkiraan_pilih"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Olah Data
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <!-- End | Card 5 -->

            <!-- Card 5 (Tambahkan Card Lagi Disini Copas Card Yang Di Atas) -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="data_analisa">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                        Fakta Integritas
                    </h5>
                </a>
                <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                    voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                    molestias tempore accusantium.
                </p>
                <a href="#"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Olah Data
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <!-- End | Card 5 -->
        </div>


        <br>



        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-8">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-6 md:space-y-0">
                    <!-- Logo and Copyright -->
                    <div
                        class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 text-center md:text-left">
                        <img src="svg/L-Klipaa.svg" alt="Logo Klipaa" class="h-10">
                        <p class="text-sm">© 2024 Klipaa. All rights reserved.</p>
                    </div>

                    <!-- Navigation Links -->
                    <nav class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-8 text-center">
                        <a href="/" class="text-sm hover:text-blue-400 transition-colors duration-300">Beranda</a>
                        <a href="/tentang"
                            class="text-sm hover:text-blue-400 transition-colors duration-300">Tentang</a>
                        <a href="/layanan"
                            class="text-sm hover:text-blue-400 transition-colors duration-300">Layanan</a>
                        <a href="/kontak" class="text-sm hover:text-blue-400 transition-colors duration-300">Kontak</a>
                    </nav>

                    <!-- Social Media Links -->
                    <div class="flex space-x-6">
                        <a href="https://www.facebook.com/officialklipaa/?locale=id_ID" aria-label="Facebook"
                            class="hover:text-blue-500 transition-colors duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/klipaaindonesia/" aria-label="Instagram"
                            class="hover:text-blue-400 transition-colors duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UChaZgad46wEsMrrMZpCUc7g
                        " aria-label="Youtube" class="hover:text-pink-500 transition-colors duration-300">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End | Footer -->



    </div>
    <!-- End | Main Content -->



    <!-- JavaScript | Liblary -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <!-- Fungsi | Mengkoneksikan Ke Javascript -->
    <script src="js/dashboard-users/data-penyedia.js"></script>
</body>

</html>