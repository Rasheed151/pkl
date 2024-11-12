<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @page {
            size: A4 landscape;
            /* Set ukuran kertas menjadi landscape */
            margin: 20mm;
            /* Margin halaman */
        }

        body {
            font-family: Arial, sans-serif;
            /* Font yang digunakan */
            color: black;
            /* Warna teks */
            background: white;
            /* Latar belakang putih */
        }

        .page {
            width: 100%;
            /* Lebar halaman */
        }

        .content {
            padding: 20px;
            /* Ruang di dalam konten */
            box-sizing: border-box;
            /* Menghitung padding dalam ukuran total */
        }

        /* Styling untuk judul */
        h2 {
            text-align: center;
            /* Rata tengah judul */
            font-size: 16px;
            /* Ukuran font judul */
            margin: 0 0 10px 0;
            /* Margin antar judul */
        }

        /* Styling untuk tabel */
        .table-container {
            margin-top: 20px;
            /* Jarak atas untuk tabel */
        }

        table {
            width: 100%;
            /* Lebar tabel */
            border-collapse: collapse;
            /* Menggabungkan border tabel */
            font-size: 12px;
            /* Ukuran font tabel */
        }

        table,
        th,
        td {
            border: 1px solid black;
            /* Border hitam untuk tabel */
        }

        th,
        td {
            padding: 8px;
            /* Padding dalam sel tabel */
            text-align: left;
            /* Rata kiri teks dalam tabel */
            vertical-align: top;
            /* Rata atas teks dalam sel */
        }

        thead th {
            background-color: #f2f2f2;
            /* Latar belakang abu-abu muda untuk header */
            font-weight: bold;
            /* Teks tebal di header */
        }

        /* Styling untuk tabel responsive di cetakan */
        .table-responsive {
            display: block;
            overflow-x: auto;
            width: 100%;
        }

        th, td {
        min-width: 50px; /* Lebar minimum */
        max-width: 200px; /* Lebar maksimum */
        word-wrap: break-word; /* Membungkus teks jika melebihi lebar maksimum */
    }

    /* Membuat tabel mengikuti ukuran konten */
    table {
        table-layout: auto;
    }

    /* Mengatur kolom tertentu */
    .table-container th:nth-child(1), /* Kolom No */
    .table-container td:nth-child(1) {
        min-width: 30px;
        max-width: 50px;
        text-align: center;
    }

    .table-container th:nth-child(2), /* Kolom Kegiatan */
    .table-container td:nth-child(2) {
        min-width: 100px;
        max-width: 200px;
    }

    .table-container th:nth-child(3), /* Kolom Spesifikasi */
    .table-container td:nth-child(3) {
        min-width: 150px;
        max-width: 300px;
    }
    </style>
</head>

<body>
    <div class="page">
        <div class="content">
            <!-- Table -->
            <h2>Spesifikasi Teknis</h2>
            <h2>Pekerjaan {{ $technical_specifications->first()->rkp_data->activity_name }}</h2>
            <h2>Desa {{$village_data->village}}</h2>
            <div class="table-container">
                <table class="table table-bordered border-dark">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>kegiatan</th>
                            <th>Spesifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ( $technical_specifications as $data )
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->specification}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer">
        <p>* Pilih salah satu</p>
        <div class="signature">
            <p>Kepala Seksi/Kepala Urusan _________________</p>
            <p>Desa __________________</p>
            <br><br><br><br>
            <p>tanda tangan,</p>
            <p>nama lengkap</p>
        </div>
    </div>
    </div>
</body>

</html>