<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengumuman Perencanaan Pengadaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <style>
@page {
    size: A4 landscape; /* Set ukuran kertas landscape */
    margin: 20mm; /* Margin halaman */
}

body {
    font-family: Arial, sans-serif; /* Font yang digunakan */
    background: white; /* Latar belakang putih */
    color: black; /* Warna teks hitam */
}

.page {
    width: 100%; /* Lebar halaman */
}

.subpage {
    padding: 20px; /* Ruang di dalam subpage */
    border: 1px solid #000; /* Garis batas */
    height: 100%; /* Tinggi subpage */
    box-sizing: border-box; /* Menghitung padding dalam ukuran total */
}

.text-center {
    text-align: center; /* Pusatkan teks */
    font-size: 18px; /* Ukuran font */
    font-weight: bold; /* Tebalkan font */
    margin-bottom: 20px; /* Jarak bawah */
}

.table-responsive {
    overflow-x: auto; /* Buat tabel responsif jika lebar melebihi halaman */
    margin-bottom: 20px; /* Jarak bawah tabel */
}

.table {
    width: 100%; /* Lebar tabel 100% */
    border-collapse: collapse; /* Gabungkan batas tabel */
}

.table th, .table td {
    border: 1px solid #000; /* Garis batas sel */
    padding: 8px; /* Ruang dalam sel */
    text-align: left; /* Rata kiri teks */
}

.table th {
    background-color: #f0f0f0; /* Latar belakang header tabel */
    font-weight: bold; /* Tebalkan font header tabel */
}

.signature {
    text-align: right; /* Rata kanan teks tanda tangan */
    margin-top: 30px; /* Jarak atas sebelum tanda tangan */
}

.signature p {
    margin: 0; /* Hapus margin paragraf */
}

    </style>
</head>
<body>
    <div class="page">
        <div class="subpage">
            <p class="text-center">
                PENGUMUMAN PERENCANAAN PENGADAAN <br />
                DESA: {{ $village_data->village }} KABUPATEN: {{ $village_data->district }}<br />
                TAHUN ANGGARAN: {{ now()->year }}
            </p>

            <!-- Tabel Pengadaan -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2">No.</th>
                            <th rowspan="2">Nama Kegiatan</th>
                            <th rowspan="2">Nilai Pengadaan</th>
                            <th rowspan="2">Cara Pengadaan</th>
                            <th colspan="2">Keluaran/Output</th>
                            <th rowspan="2">Ketua TPK</th>
                            <th rowspan="2">Lokasi Kegiatan</th>
                            <th rowspan="2">Waktu Pelaksanaan</th>
                        </tr>
                        <tr>
                            <th>Volume</th>
                            <th>Satuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($announcement as $key => $data)
                            @php
                                $volumeData = explode(', ', optional($data->rkp_data)->volume);
                                $volumeValue = $volumeData[0] ?? '';
                                $volumeUnit = $volumeData[1] ?? '';
                            @endphp
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ optional($data->rkp_data)->activity_name }}</td>
                                <td>{{ number_format(optional($data->rkp_data)->total_cost, 0, ',', '.') }}</td>
                                <td>{{ $data->procurement_method }}</td>
                                <td>{{ $volumeValue }}</td>
                                <td>{{ $volumeUnit }}</td>
                                <td>{{ optional($data->tpk_data)->head_name }}</td>
                                <td>{{ $data->rkp_data->activity_location }}</td>
                                <td>{{ $data->rkp_data->start_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Bagian Tanda Tangan -->
            <div class="signature">
                <p>{{ $village_data->office_address }}, {{ now()->format('d F Y') }}</p>
                <p>Kepala Desa</p>
                <strong>{{ $village_data->village_head_name }}</strong>
            </div>
        </div>
    </div>
</body>
</html>
