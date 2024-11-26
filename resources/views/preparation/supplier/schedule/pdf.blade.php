<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Surat 3</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    @page {
      size: A4 landscape;
      /* Set ukuran kertas landscape */
      margin: 20mm;
      /* Margin halaman */
    }

    body {
      font-family: Arial, sans-serif;
      /* Font yang digunakan */
      background: white;
      /* Latar belakang putih */
      color: black;
      /* Warna teks hitam */
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

    .text-center {
    text-align: center; /* Pusatkan teks */
    font-size: 18px; /* Ukuran font */
    font-weight: bold; /* Tebalkan font */
    margin-bottom: 20px; /* Jarak bawah */
}

    .table-container {
      margin-top: 20px;
      /* Jarak atas tabel */
    }

    .table {
      width: 100%;
      /* Lebar tabel 100% */
      border-collapse: collapse;
      /* Gabungkan batas tabel */
    }

    .table th,
    .table td {
      border: 1px solid #000;
      /* Garis batas sel */
      padding: 10px;
      /* Ruang dalam sel */
      text-align: left;
      /* Rata kiri teks */
    }

    .table th {
      background-color: #f0f0f0;
      /* Latar belakang header tabel */
      font-weight: bold;
      /* Tebalkan font header tabel */
    }

    .table td {
      vertical-align: top;
      /* Rata atas untuk isi tabel */
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
        <div class="content">
            <p class="text-center">
                @if(!empty($announcement->rkp_data->activity_name) && !empty($village_data->village))
                    KEPALA SEKSI/KEPALA URUSAN {{ $announcement->rkp_data->activity_name }}<br />
                    DESA: {{ $village_data->village }} <br />
                @else
                    <strong>Sedang dalam Pengerjaan</strong>
                @endif
            </p>

            <!-- Table -->
            <div class="table-container">
                @if(!empty($announcement) && !empty($announcement->rkp_data) && !empty($village_data))
                <table class="table table-bordered border-dark">
                    <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Tim Pelaksana Kegiatan</th>
                            <th>Waktu Pelaksanaan</th>
                            <th>Nilai Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $announcement->rkp_data->activity_name ?? 'Sedang dalam Pengerjaan' }}</td>
                            <td>
                                {{ $announcement->tpk_data->head_name ?? 'Sedang dalam Pengerjaan' }},
                                {{ $announcement->tpk_data->secretary_name ?? 'Sedang dalam Pengerjaan' }},
                                {{ $announcement->tpk_data->member_name ?? 'Sedang dalam Pengerjaan' }}
                            </td>
                            <td>
                                Jumlah waktu {{ $announcement->rkp_data->implementation_time ?? '...' }},
                                {{ $announcement->rkp_data->start_date ?? '...' }} Sampai Dengan
                                {{ $announcement->rkp_data->end_date ?? '...' }} Tahun
                                {{ $village_data->fiscal_year ?? '...' }}
                            </td>
                            <td>{{ $announcement->rkp_data->total_cost ?? 'Sedang dalam Pengerjaan' }}</td>
                        </tr>
                    </tbody>
                </table>
                @else
                    <p><strong>Sedang dalam Pengerjaan</strong></p>
                @endif
            </div>
        </div>

        <!-- Signature -->
        <div class="signature">
            @if(!empty($announcement->rkp_data->officials_data->name))
                <p>KEPALA SEKSI/KEPALA URUSAN {{ $announcement->rkp_data->activity_name }}</p>
                <p>Desa {{ $village_data->village }}</p>
                <p>Selaku</p>
                <p>Pelaksana Kegiatan Anggaran</p>
                <br><br><br>
                <p>tanda tangan</p>
                <strong>{{ $announcement->rkp_data->officials_data->name }}</strong>
            @else
                <p><strong>Sedang dalam Pengerjaan</strong></p>
            @endif
        </div>
    </div>
</body>

</html>