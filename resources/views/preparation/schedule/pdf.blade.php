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
        size: A4 potrait;
        margin: 20mm;
      }

      @media print {
        body, .page {
          margin: 20mm;
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
                <th>Nama Kegiatan</th>
                <th>Tim Pelaksana Kegiatan</th>
                <th>Waktu Pelaksanaan</th>
                <th>Nilai Pekerjaan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$jadwal->nama_kegiatan}}</td>
                <td>{{$jadwal->ketua_tpk}},{{$jadwal->sekertaris_tpk}},{{$jadwal->anggota_tpk}}</td>
                <td>Jumlah waktu {{$jadwal->waktu_pelaksanaan}}, {{$jadwal->tanggal_mulai}} Sampai Dengan {{$jadwal->tanggal_selesai}} Tahun {{$desa->tahun_anggaran}}</td>
                <td>{{$jadwal->jumlah_biaya}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
