<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat | 20</title>

  <!-- Custom Css -->
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #fff;
      font: 12pt "Times New Roman";
    }

    * {
      box-sizing: border-box;
      -moz-box-sizing: border-box;
    }

    /* Set page width to 80% and keep portrait orientation */
    .page {
      width: 80%;
      /* Width is now 80% of the page */
      min-height: 29.7cm;
      padding: 2cm;
      margin: 1cm auto;
      border: 1px solid;
      border-radius: 5px;
      background: white;
    }

    .subpage {
      padding: 1cm;
      border: 5px #fff;
      height: auto;
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

    .no-border-right {
      border-right: none;
    }

    .anak {
    margin-left: 20px !important; /* Menggunakan margin-left dan menambahkan !important */
  }

    @page {
      size: A4;
      /* Ensure portrait orientation */
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

  <div class="book">
    <div class="page2">
      <div class="subpage">
        <p style="text-align: center; font-size: 14px;">
          BERITA ACARA SERAH TERIMA HASIL KEGIATAN PENGADAAN
          <br>MELALUI PENYEDIA
          <br>Nomor:_________________
        </p>
        <br>
        <p style="list-style: upper-alpha; font-size: 12px;">
          Pada hari ini ____ tanggal ____ bulan ____ tahun ____,kami selaku
          Tim Pelaksana Kegiatan (TPK) Desa  yang ditetapkan dengan
          Surat Keputusan Kepala Desa Nomor: {{$desa->desa}} tanggal __________ Tahun Anggaran {{$desa->tahun_anggaran}}, 
          telah menyelesaikan 100% (seratus persen) pekerjaan melalui Penyedia dan menyerahkan seluruh 
          hasil kegiatan pengadaan kepada Kasi/Kaur* {{$data->nama_kasi}} Desa {{$desa->desa}}
          dengan baik sesuai yang dipersyaratkan dalam dokumen persiapan pengadaan melalui
          Penyedia, selanjutnya Kasi/Kaur* {{$data->nama_kasi}} menerima hasil kegiatan pengadaan pekerjaan yaitu berupa:
        </p>
        
        <br>
        <table style="text-align: justify; font-size: 12px;">
          <tr>
              <td>1. Nama Kegiatan</td>
              <td>:</td>
              <td>{{$data->nama_kegiatan}}</td>
          </tr>
          <tr>
              <td>2. Nilai Pengadaan Sebesar</td>
              <td>:</td>
              <td>Rp{{$data->jumlah_biaya}}</td>
          </tr>
          <tr>
              <td>3. Keluaran/Output</td>
              <td>:</td>
              <td>_________________________</td>
          </tr>
          <tr>
              <td>4. Nama TPK</td>
          </tr>
          <tr class="anak">
            <td>Ketua</td>
            <td>:</td>
            <td>{{$data->ketua_tpk}}</td>
          </tr>
          <tr class="anak">
            <td>Sekertaris</td>
            <td>:</td>
            <td>{{$data->sekertaris_tpk}}</td>
          </tr>
          <tr class="anak">
            <td>Anggota</td>
            <td>:</td>
            <td>{{$data->anggota_tpk}}</td>
          </tr>
          <tr>
            <td>5. Lokasi Pekerjaan</td>
            <td>:</td>
            <td>{{$data->lokasi_kegiatan}}</td>
          </tr>
          <tr>
            <td>6. Jadwal Pelaksanaan</td>
            <td>:</td>
            <td>{{$data->tanggal_mulai}} sd {{$data->tanggal_selesai}}</td>
          </tr>
        </table>
        
        <p style="list-style: upper-alpha; font-size: 12px;">
          Demikian Berita Acara Serah 
          Terima Pekerjaan secara Swakelola ini dibuat untuk
          diketahui dan dipergunakan sebagaimana mestinya.
        </p>

        <table align="center" style="font-size: 12px; text-align: center;">
          <tr>
            <td></td>
            <td style="width: 250px; padding-top: 20px;"> </td>
            <td>Yang menyerahkan,Tim Pelaksana Kegiatan (TPK)</td>
          </tr>
          <tr>
            <td>Yang menerima,
            Kasi/Kaur {{$data->nama_kasi}} Desa {{$desa->desa}} Selaku Pelaksana Kegiatan Anggaran (PKA)</td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>{{$data->ketua_tpk}} : ___________ </td>
          </tr>
          <tr>
            <td><br></td>
            <td></td>
            <td>{{$data->sekertaris_tpk}} : ___________ </td>
          </tr>
          <tr>
            <td><br></td>
            <td></td>
            <td>{{$data->anggota_tpk}} : ___________ </td>
          </tr>
          <tr>
            <td><ins>tanda tangan</ins></td>
            <td></td>
            <td><ins>tanda tangan</ins></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</body>

</html>