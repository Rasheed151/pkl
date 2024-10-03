<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat 3</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
      body {
        margin: 0;
        padding: 0;
        background-color: #fff;
        font-family: "Times New Roman", Times, serif;
        font-size: 12pt;
      }

      .page {
        width: 29.7cm;
        height: 21cm;
        padding: 2cm;
        margin: 0 auto;
        border: 1px solid black;
        border-radius: 5px;
        background: white;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .content {
        width: 100%;
      }

      .table-container {
        text-align: center;
        margin-top: 10px;
      }

      table {
        width: 100%;
        font-size: 12px;
        text-align: center;
        border-collapse: collapse;
        table-layout: auto; /* Membuat tabel menyesuaikan lebar berdasarkan konten */
      }

      th, td {
        border: 1px solid black;
        padding: 8px;
        white-space: nowrap; /* Mencegah teks terpotong menjadi beberapa baris */
      }

      @page {
        size: A4 landscape;
        margin: 0;
      }

      @media print {
        body, .page {
          margin: 0;
          border: none;
          width: 100%;
          height: 100%;
          page-break-after: always;
        }
      }
    </style>
  </head>
  <body>
    <div class="page">
      <div class="content">
        <!-- Table -->
        <div class="table-container">
          <table class="table table-bordered border-dark">
            <thead>
              <tr>
                <th rowspan="2">No.</th>
                <th rowspan="2">Kegiatan</th>
                <th colspan="3">Keluaran/Output</th>
                <th rowspan="2">Ket</th>
              </tr>
              <tr>
                <th>Hari/Tanggal</th>
                <th>Waktu</th>
                <th>Tempat</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1.</td>
                <td>Pengumuman/Undangan Lelang</td>
                <td>{{$tanggal_pengumuman}}</td>
                <td>{{$waktu_pengumuman}}</td>
                <td>{{$tempat_pengumuman}}</td>
                <td></td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Pendaftaran dan pengambilan dokumen Lelang</td>
                <td>{{$tanggal_pendaftaran}}</td>
                <td>{{$waktu_pendaftaran}}</td>
                <td>{{$tempat_pendaftaran}}</td>
                <td></td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Pemasukan dokumen penawaran</td>
                <td>{{$tanggal_pemasukan}}</td>
                <td>{{$waktu_pemasukan}}</td>
                <td>{{$tempat_pemasukan}}</td>
                <td></td>
              </tr>
              <tr>
                <td>4.</td>
                <td>Evaluasi penawaran</td>
                <td>{{$tanggal_evaluasi}}</td>
                <td>{{$waktu_evaluasi}}</td>
                <td>{{$tempat_evaluasi}}</td>
                <td></td>
              </tr>
              <tr>
                <td>5.</td>
                <td>Negosiasi</td>
                <td>{{$tanggal_negosiasi}}</td>
                <td>{{$waktu_negosiasi}}</td>
                <td>{{$tempat_negosiasi}}</td>
                <td></td>
              </tr>
              <tr>
                <td>6.</td>
                <td>Penetapan Pemenang</td>
                <td>{{$tanggal_penepatan}}</td>
                <td>{{$waktu_penepatan}}</td>
                <td>{{$tempat_penepatan}}</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
