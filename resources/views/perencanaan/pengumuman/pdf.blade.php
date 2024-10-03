<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengumuman Perencanaan Pengadaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <style>
      body {
        margin: 0;
        padding: 0;
        background-color: #fff;
        font: 10pt "Times New Roman";
      }
      .page {
        width: 29.7cm; /* Sesuaikan dengan ukuran landscape */
        min-height: 21cm;
        padding: 2cm;
        margin: 1cm auto;
        border: 1px solid;
        border-radius: 5px;
        background: white;
      }
      .subpage {
        padding: 1cm;
        height: 176mm;
      }
      .table {
        width: 100%;
        border-collapse: collapse;
        margin: 0 auto; /* Pusatkan tabel */
      }
      .table th,
      .table td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
        vertical-align: middle;
      }
      @page {
        size: A4 landscape; /* Mengatur orientasi landscape */
        margin: 0;
      }
      @media print {
        .page {
          margin: 0;
          border: initial;
          width: initial;
          min-height: initial;
          box-shadow: initial;
          background: initial;
          page-break-after: always;
        }
      }
    </style>
  </head>
  <body>
    <div class="page">
      <div class="subpage">
        <p style="text-align: center; font-weight: bold; font-size: 14px;">
          PENGUMUMAN PERENCANAAN PENGADAAN <br />
          DESA: {{ $desa->nama }} KABUPATEN: {{ $desa->kabupaten }}<br />
          TAHUN ANGGARAN: {{ now()->year }}
        </p>

        <!-- Table -->
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th rowspan="2">No.</th>
                <th rowspan="2">Nama Kegiatan</th>
                <th rowspan="2">Nilai Pengadaan</th>
                <th rowspan="2">Cara Pengadaan</th>
                <th colspan="2">Keluaran/Output</th>
                <th rowspan="2">Nama TPK</th>
                <th rowspan="2">Lokasi Kegiatan</th>
                <th rowspan="2">Waktu Pelaksanaan</th>
              </tr>
              <tr>
                <th>Volume</th>
                <th>Satuan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pengumuman as $key => $data)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $data->nama_kegiatan }}</td>
                  <td>{{ number_format($data->jumlah_biaya, 0, ',', '.') }}</td>
                  <td>{{ $data->cara_pengadaan }}</td>
                  <td>{{ $data->volume }}</td>
                  <td>{{ $data->satuan }}</td>
                  <td>{{ $data->nama_tpk }}</td>
                  <td>{{ $data->lokasi_kegiatan }}</td>
                  <td>{{ $data->waktu_pelaksanaan }} hari</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Penandatangan -->
        <p style="text-align: left; font-size: 12px;">
          {{ $desa->lokasi }}, {{ now()->format('d F Y') }}<br />
          Kepala Desa<br /><br /><br /><br />
          <strong>{{ $desa->kepala_desa }}</strong>
        </p>
      </div>
    </div>
  </body>
</html>
