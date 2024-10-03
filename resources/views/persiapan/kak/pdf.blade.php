<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat 5</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
          width: 21cm;
          min-height: 29.7cm;
          padding: 2cm;
          margin: 1cm auto;
          border: 1px  solid;
          border-radius: 5px;
          background: white;
        }
  
        .subpage {
          padding: 1cm;
          border: 5px #fff;
          height: 256mm;
          outline: 2cm #fff solid;
        }
  
        .page2{
          padding-right: 50px;
          padding-top: 50px;
          padding-left: 50px;
        }
  
        .typewriter {
          display: flex;
          font-size: 12px;
          margin-right: 120px;
          margin-left: 120px;
          justify-content: space-between; /* Mengatur agar dua elemen berada di kanan dan kiri */
        }
  
       .typewriter-kiri,
       .typewriter-kanan {
          flex: 1; /* Mengatur kedua div memiliki lebar yang sama */
          box-sizing: border-box; /* Agar padding tidak menambah lebar elemen */
       }
  
       .typewriter-kiri {
          text-align: left; /* Menyelaraskan teks di kiri */
       }
  
       .typewriter-kanan {
          text-align: right; /* Menyelaraskan teks di kanan */
       }
  
       .no-border-right {
          border-right: none;
       }
  
  
        @page {
          size: A4;
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
        <div class="page">
            <div class="subpage">
              <p style="text-align: justify; font-size: 12px;">
                Kerangka Acuan Kerja (KAK) Memuat:
              </p>
              <p style="text-align: justify; font-size: 12px;">
                1. Latar Belakang
                <br>
                {{$kak->latar_belakang}}
              </p>
              <p style="text-align: justify; font-size: 12px;">
                2. Penerima Manfaat
                <br>Penerima Manfaat Adalah {{$kak->sasaran_manfaat}}
              </p>
              <p style="text-align: justify; font-size: 12px;">
                3. Cara Melaksanakan
                <br>{{$kak->cara_pengadaan}}
              </p>
              <p style="text-align: justify; font-size: 12px;">
                4. Pelaksana dan Penanggung jawab
                <br>Pelaksana Kegiatan ini adalah Tim Pelaksana Kegiatan (TPK) dengan susunan
                Keanggotaan Ketua {{$kak->ketua_tpk}}, sekretaris {{$kak->sekertaris_tpk}}, dan anggota{{$kak->anggota_kak}}.
                Adapun Penanggung Jawab adalah {{$kak->nama_kasi}} selaku Kepala Seksi/Kepala Urusan {{$kak->jabatan_kasi}}
                Desa {{$desa->desa}}.
              </p>
              <p style="text-align: justify; font-size: 12px;">
                5. Jadwal
                <br> Tanggal Mulai {{$kak->tanggal_mulai}} sampai dengan tanggal selesai {{$kak->tanggal_selesai}}
                Dilaksanakan Selama {{$kak->waktu_pelaksanaan}}
              </p>
              <p style="text-align: justify; font-size: 12px;">
                6. Biaya Yang Diperlakukan
                <br>Biaya yang diperlukan untuk melaksanakan kegiatan {{$kak->nama_kegiatan}}
                adalah sebesar Rp{{$kak->jumlah_biaya}} sebagaimana
                diuraikan pada RAB kegiatan in.
              </p>
    
              <br>
              <br>
              <!-- End | Table -->
              <p style="text-align: right; font-size: 12px;">
                Kepala Seksi/Kepala Urusan_______________
                <br>Desa__________________
                <br>
                <br>
                <br>tanda tangan
                <br>nama lengkap
              </p>
            </div> 
          </div>
    </div>
    
</body>
</html>