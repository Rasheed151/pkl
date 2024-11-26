<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Title -->
    <title>Klipaa | Pengadaan Barang Dan Jasa</title>

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
    <link rel="stylesheet" href="{{asset('css/dashboard-users/data-aparat.css')}}">

</head>

<body>



    <!-- Navbar -->
    <nav class="navbar" style="position: fixed;">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="svg/L-KLipaa.svg" alt=""></i>Klipaa Indonesia
        </div>

        <div class="search_bar">
            <input type="text" placeholder="Cari disini.." />
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



    <!-- Sidebar -->
    <nav class="sidebar">

        <!-- Menu Content -->
        <div class="menu_content">

            <!-- Menu Sidebar 1 -->
            <ul class="menu_items">
                <div class="menu_title menu_1"></div>

                <li class="item">
                    <a href="/officials_data" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-male-female"></i>
                        </span>
                        <span class="navlink">Data Aparatur</span>
                    </a>
                </li>

                <li class="item">
                    <a href="/pka_data" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-id-card"></i>
                        </span>
                        <span class="navlink">Data PKA</span>
                    </a>
                </li>

                <li class="item">
                    <a href="/tpk_data" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-group"></i>
                        </span>
                        <span class="navlink">Data TPK</span>
                    </a>
                </li>

                <li class="item">
                    <a href="/supplier_data" class="nav_link">
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
                    <a href="rkp_data" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-folder"></i>
                        </span>
                        <span class="navlink">RKP Desa</span>
                    </a>
                </li>

                <li class="item">
                    <a href="/announcement" class="nav_link">
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
                    <a href="preparation_swakelola" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-briefcase-alt-2"></i>
                        </span>
                        <span class="navlink">Secara Swakelola</span>
                    </a>
                </li>

                <li class="item">
                    <a href="preparation" class="nav_link">
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
                    <a href="swakelola_implementation" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-briefcase-alt-2"></i>
                        </span>
                        <span class="navlink">Secara Swakelola</span>
                    </a>
                </li>

                <li class="item">
                    <a href="implementation" class="nav_link">
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
                    <a href="submission_swakelola_choose" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-briefcase-alt-2"></i>
                        </span>
                        <span class="navlink">Secara Swakelola</span>
                    </a>
                </li>

                <li class="item">
                    <a href="submission_supplier_choose" class="nav_link">
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
    @yield('content')


    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 mt-96">
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
                    <a href="#" class="text-sm hover:text-blue-400 transition-colors duration-300">Beranda</a>
                    <a href="#" class="text-sm hover:text-blue-400 transition-colors duration-300">Tentang</a>
                    <a href="#" class="text-sm hover:text-blue-400 transition-colors duration-300">Layanan</a>
                    <a href="#" class="text-sm hover:text-blue-400 transition-colors duration-300">Kontak</a>
                </nav>

                <!-- Social Media Links -->
                <div class="flex space-x-6">
                    <a href="#" aria-label="Facebook" class="hover:text-blue-500 transition-colors duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" aria-label="Instagram" class="hover:text-blue-400 transition-colors duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" aria-label="Youtube" class="hover:text-pink-500 transition-colors duration-300">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End | Footer -->



    </div>
    <!-- End | Card 1 -->



    </main>
    <!-- End | Main Content -->



    <!-- JavaScript | Liblary -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <!-- JavaScript | Connect -->
    <script src="js/dashboard-users/data-aparat.js"></script>



</body>

</html>