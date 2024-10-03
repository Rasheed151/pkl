<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat 1</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
      @page {
            size: A4;
            margin: 20px; /* Atur margin sesuai kebutuhan */
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



    </style>
  </head>

  <body>
    <div class="book">
      <div class="page">
        <div class="subpage">
          <p style="text-align: center; font-weight: bold; font-size: 14px;">
            BERITA ACARA
          </p>
          <p style="text-align: center; font-weight: bold; font-size: 14px;">
            KEGIATAN MUSYAWARAH RENCANA PEMBANGUNAN DESA (MUSRENBANGDES)
          </p>
          <p style="text-align: justify; font-size: 12px; ">
            Berkaitan dengan pelaksanaan kegiatan pembangunan desa di Desa {{ $desa->desa}}
            {{$desa->kecamanta}} Kecamatan Kabupaten {{$desa->kabupaten}} Provinsi {{$desa->provinsi}}, maka pada hari ini:
          </p>
            
            <p style="text-align: justify; font-size: 12px; ">Hari dan Tanggal : {{$data->tanggal}} {{$data->jam}} </p>
            <p style="text-align: justify; font-size: 12px;">Tempat: {{$data->tempat}}</p>
            
            <p style="text-align: justify; font-size: 12px; margin-top: 20px;">telah diadakan kegiatan Musrenbangdes yang telah dihadiri oleh wakil-wakil 
                kelompok, dusun dan tokoh masyarakat, serta unsur lain yang terkait Desa
                sebagaimana tercantum dalam daftar hadir (terlampir).
            </p>
            <p style="text-align: justify; font-size: 12px; margin-top: 20px;">Materi yang dibahas, serta yang bertindak selaku unsur pimpinan rapat dan
                narasumber dalam membahas {{$data->bahas_kegiatan}}
            </p>
            <p style="text-align: justify; font-size: 12px; margin-top: 20px;">A. Materi Pembahasan</p>
            <p style="text-align: justify; font-size: 12px;">
            {{$data->materi_pembahasan}}
            </p>
            <p style="text-align: justify; font-size: 12px; margin-top: 20px;">B. Unsur Pimpinan Rapat dan Narasumber</p>
            <p style="text-align: left; font-size: 12px;">
            <p style="text-align: left; font-size: 12px;">
    Pimpinan Rapat : {{ $data->pimpinan_rapat }}<br> 
    Notulen : {{ $data->notulen }}<br>
    Narasumber:
</p>
@foreach($data->narasumbers as $n)
    <p style="text-align: left; font-size: 12px; margin-left: 20px;">
        - {{ $n->narasumber }}
    </p>
@endforeach
            </p>
            <p style="text-align: justify; font-size: 12px; margin-top: 20px;">
                Setelah dilakukan pembahasan dan diskusi terhadap materi, selanjutnya seluruh
                peserta Musrenbangdes menyepakati beberapa hal yang berketetapan menjadi
                kesepakatan akhir dari Musrenbangdes, yaitu:
            </p>
            <p style="text-align: left; font-size: 12px;">
               {{$data->kesepakatan_akhir}}
            </p>
            <p style="text-align: justify; font-size: 12px; margin-top: 20px;">
                Keputusan diambil secara musyawarah mufakat/aklamasi  dan pemungutan suara/voting
            </p>
            
            <p style="text-align: justify; font-size: 12px; ">
                Demikian Berita Acara Musrenbangdes ini dibuat dan disahkan dengan penuh tanggungjawab agar dapat
                dipergunakan sebagaimana mestinya
            </p>
            <p style="text-align: right; font-size: 12px; margin-top: 20px;">
                    {{$data->tempat}} {{$data->tanggal}}
            </p>
            <div class="typewriter">
                <div class="typewriter-kiri">
                    <p>Ketua BPD</p>
                    <br>
                    <p>{{$data->ketua_bpd}}</p>
                </div>
                <div class="typewriter-kanan">
                    <p>Kepala Desa</p>
                    <br>
                    <p>{{$desa->nama_kades}}</p>
                </div>
            </div>
            <p style="font-size: 12px; text-align: center;">Wakil Masyarakat</p>
            <br>
            <p style="font-size: 12px; text-align: center;">{{$data->wakil_masyarakat}}</p>
        </div> 
      </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</html>
