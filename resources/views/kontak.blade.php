<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Title -->
    <title>Klipaa | Kontak</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Logo -->
    <link rel="shortcut icon" href="svg/L-Klipaa.svg" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap"
        rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Liblary Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Custom Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>



    <!-- Spinner -->
    <div id="spinner"
        class="show bg-light position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <!-- Spinner Animation -->
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <!-- Loading Text -->
            <div id="loading-text" class="mt-3 fs-4 text-primary" style="font-family: 'Poppins';">PT. Klipaa Indonesia
            </div>
        </div>
    </div>
    <!-- End | Spinner -->



    <!-- Navbar -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>Rama Cipta A2, Garut, Jawa Barat</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>klipaaindonesia19@gmail.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Ikut Klipaa:</small>
                <a class="text-white-50 ms-3" href="https://www.facebook.com/officialklipaa/"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="text-white-50 ms-3" href="https://www.instagram.com/klipaaindonesia/"><i
                        class="fab fa-instagram"></i></a>
                <a class="text-white-50 ms-3" href="https://www.youtube.com/channel/UChaZgad46wEsMrrMZpCUc7g"><i
                        class="fab fa-youtube"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="/" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold m-0" style="color: var(--varBlue);">Klipaa<span class="text-white"> Indonesia</span>
                </h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="/" class="nav-item nav-link">Beranda</a>
                    <a href="/tentang" class="nav-item nav-link">Tentang Kami</a>
                    <a href="/layanan" class="nav-item nav-link">Layanan</a>
                    <a href="/kotak" class="nav-item nav-link active">Kontak</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn btn-outline-primary py-2 px-3" href="/login">
                        Login
                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- End | Navbar -->



    <!-- Header -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Layanan Kami</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="/tentang">Tentang Kami</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="/layanan">Layanan</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Kontak</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End | Header -->



    <!-- Kontak -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <div class="contact-wrap w-100 p-lg-5 p-4">
                                    <h3 class="mb-4">Ada Pertanyaan?</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <div id="form-message-success" class="mb-4">
                                        Pesan telah dikirim,terima kasih!
                                    </div>
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        placeholder="Nama">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="subject" id="subject"
                                                        placeholder="Subjek">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control" id="message" cols="30"
                                                        rows="6" placeholder="Pesan..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <div class="form-group">
                                                    <input type="submit" value="Kirim Pesan!" class="submit-kontak">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-stretch">
                                <div class="info-wrap w-100 p-lg-5 p-4 img">
                                    <h3>Hubungi Kami</h3>
                                    <p class="mb-4">Silahkan untuk isi form kontak jika ada pertanyaan!</p>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker-alt me-2"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Alamat:</span> Perumahan Rama Cipta Indah, Jl. Pembangunan,
                                                RT.3/RW.9, Jayawaras, Kec. Tarogong Kidul, Kabupaten Garut, Jawa Barat
                                                44151</p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Telepon:</span> <a href="#">+62 823-1168-2447</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-paper-plane"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Email:</span> <a
                                                    href="mailto:klipaaindonesia19@gmail.com">klipaaindonesia19@gmail.com</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-globe"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Website</span> <a href="https://klipaa.com/">klipaa.com</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End | Kontak -->



    <!-- Footer -->
    <div class="container-fluid bg-dark text-white-50 footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold text-primary mb-4">Kli<span class="text-white">paa</span></h1>
                    <p>Klipaa menghadirkan Pengadaan Barang dan Jasa dengan Transparansi dan Efisiensi Dan
                        Mewujudkan Solusi Terpercaya untuk Pengadaan di Desa Anda</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square me-1" href="https://www.facebook.com/officialklipaa/"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square me-1" href="https://www.instagram.com/klipaaindonesia/"><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-square me-0"
                            href="https://www.youtube.com/channel/UChaZgad46wEsMrrMZpCUc7g"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Alamat</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Perum Rama Cipta Indah No.Blok A2, Jayawaras, Kec.
                        Tarogong Kidul, Kabupaten Garut, Jawa Barat 44151</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+6282311682447</p>
                    <p><i class="fa fa-envelope me-3"></i>klipaa@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Tautan</h5>
                    <a class="btn btn-link" href="/">Beranda</a>
                    <a class="btn btn-link" href="/tentang">Tentang Kami</a>
                    <a class="btn btn-link" href="/layanan">Layanan Kami</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Klipa Desa</h5>
                    <p>Klipaa Menghadirkan Pengadaan Barang dan Jasa dengan Transparansi dan Efisiensi yang Optimal</p>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">Klipaa Indonesia</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        Indonesia <a href="#">Pasti Bisa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End | Footer -->



    <!-- Java Script | Liblary -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>



    <!-- Java Script | Import -->
    <script src="js/main.js"></script>
    <script src="js/main.kontak.js"></script>


    
</body>

</html>