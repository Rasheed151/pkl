<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RKP Desa</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <style>
        body {
          margin: 0;
          padding: 0;
          background-color: #fff;
          font: 12pt "Times News Roman";
        }
  
        * {
          box-sizing: border-box;
          -moz-box-sizing: border-box;
        }
  
        .page {
          width: 29.7cm;
          min-height: 21cm;
          padding: 2cm;
          margin: 1cm auto;
          border: 1px solid;
          border-radius: 5px;
          background: white;
        }
  
        .subpage {
          padding: 1cm;
          border: 5px #fff;
          height: 185mm;
          outline: 2cm #fff solid;
        }
  
        .page2 {
          padding-right: 50px;
          padding-top: 50px;
          padding-left: 50px;
        }
  
        .typewriter {
          display: flex;
          font-size: 12px;
          margin-right: 120px;
          margin-left: 120px;
          justify-content: space-between;
        }
  
        .typewriter-kiri,
        .typewriter-kanan {
          flex: 1;
          box-sizing: border-box;
        }
  
        .typewriter-kiri {
          text-align: left;
        }
  
        .typewriter-kanan {
          text-align: right;
        }

        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }

        th, td {
          padding: 8px;
          text-align: center;
        }

        table {
          width: 100%;
          margin: auto;
        }

        @page {
          size: A4 landscape; /* Mengatur ukuran halaman menjadi A4 dengan orientasi landscape */
          margin: 0;
        }
  
        @media print {
          .page {
            margin: 0;
            border: initial;
            border-radius: initial;
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
    <div class="page2">
        <div class="subpage2">
          <p style="text-align: center; font-weight: bold; font-size: 14px;">
            RANCANGAN RENCANA KERJA PEMERINTAH DESA (RKP-DESA) <br> TAHUN: {{ now()->year }}
          </p>
          <p style="text-align: justify; font-size: 11px; ">
            DESA: {{ $desa->desa }} <br> KECAMATAN: {{ $desa->kecamatan }} <br> KABUPATEN: {{ $desa->kabupaten }} <br> PROVINSI: {{ $desa->provinsi }} <br>
          </p>
            
          <!-- Table -->
          <div class="table">
            <table class="table table-bordered border-dark" align="center" style="font-size: 10px;">
              <thead align="center">
                <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">Bidang</th>
                  <th rowspan="2">Sub Bidang</th>
                  <th rowspan="2">Jenis Kegiatan</th>
                  <th rowspan="2">Lokasi Kegiatan</th>
                  <th rowspan="2">Volume</th>
                  <th rowspan="2">Sasaran/Penerima Manfaat</th>
                  <th rowspan="2">Waktu Pelaksanaan</th>
                  <th rowspan="2">Jumlah Biaya (Rp)</th>
                  <th rowspan="2">Sumber Biaya</th>
                  <th colspan="3">Pola Pelaksanaan</th>
                  <th rowspan="2">Rencana Pelaksana Kegiatan</th>
                </tr>
                <tr>
                  <th>Swakelola</th>
                  <th>Kerja Sama Pihak Desa</th>
                  <th>Kerja Sama Pihak Ketiga</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
                @php $noa = 1; @endphp
                @php $nob = 1; @endphp
                @foreach($rkp_desa as $data)
                <tr align="center">
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->bidang }}</td>
                  <td>{{ $data->sub_bidang }}</td>
                  <td>{{ $data->nama_kegiatan }}</td>
                  <td>{{ $data->lokasi_kegiatan }}</td>
                  <td>{{ $data->volume }}</td>
                  <td>{{ $data->sasaran_manfaat }}</td>
                  <td>{{ $data->waktu_pelaksanaan }}</td>
                  <td>{{ number_format($data->jumlah_biaya, 0, ',', '.') }}</td>
                  <td>{{ $data->sumber_biaya }}</td>
                  <td>{{ $data->swakelola ? 'Iya' : ' Tidak' }}</td>
                  <td>{{ $data->kerjasama_desa ? 'Iya' : ' Tidak' }}</td>
                  <td>{{ $data->pihak_ketiga ? 'Iya' : ' Tidak' }}</td>
                  <td>{{ $data->rencana_pelaksana_kegiatan }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="typewriter">
            <div class="typewriter-kiri" style="text-align: center;">
              <p>Mengetahui: <br>Kepala Desa,</p>
              <br><br><br>
              <p>(_________________)</p>
            </div>
            <div class="typewriter-kanan" style="text-align: center;">
              <p>Desa, Tanggal/Bulan/Tahun <br>Disusun oleh:</p>
              <br><br><br>
              <p>Tim Penyusun RKP Desa</p>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
