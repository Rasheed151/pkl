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
          margin: 2cm; /* Margin kanan dan kiri 2 cm */
      }

      body {
          font-family: 'Calibri', sans-serif;
          font-size: 12pt;
          margin: 0;
          padding: 0;
      }

      .typewriter {
          display: flex;
          font-size: 12pt;
          margin-right: 0;
          margin-left: 0;
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

      .content {
          margin: 0 15mm; /* Memastikan semua isi memiliki margin kanan-kiri 2cm */
      }
    </style>
  </head>

  <body>
    <div class="book">
      <div class="page">
        <div class="content">
          <p style="text-align: center; font-weight: bold;">
            BERITA ACARA
          </p>
          <p style="text-align: center; font-weight: bold;">
            KEGIATAN MUSYAWARAH RENCANA PEMBANGUNAN DESA (MUSRENBANGDES)
          </p>
          <p style="text-align: justify;">
            Berkaitan dengan pelaksanaan kegiatan pembangunan desa di Desa {{ $village_data->village}}
            {{$village_data->subdistrict}} Kecamatan Kabupaten {{$village_data->district}} Provinsi {{$village_data->province}}, maka pada hari ini:
          </p>
            
          <p style="text-align: justify;">Hari dan Tanggal : {{$data->date}} {{$data->time}} </p>
          <p style="text-align: justify;">Tempat: {{$data->place}}</p>
            
          <p style="text-align: justify; margin-top: 20px;">telah diadakan kegiatan Musrenbangdes yang telah dihadiri oleh wakil-wakil 
              kelompok, dusun dan tokoh masyarakat, serta unsur lain yang terkait Desa
              sebagaimana tercantum dalam daftar hadir (terlampir).
          </p>
          <p style="text-align: justify; margin-top: 20px;">Materi yang dibahas, serta yang bertindak selaku unsur pimpinan rapat dan
              narasumber dalam membahas {{$data->activity_discussion}}
          </p>
          <p style="text-align: justify; margin-top: 20px;">A. Materi Pembahasan</p>
          <p style="text-align: justify;">
            {{$data->discussion_material}}
          </p>
          <p style="text-align: justify; margin-top: 20px;">B. Unsur Pimpinan Rapat dan Narasumber</p>
          <p style="text-align: left;">
            Pimpinan Rapat : {{ $data->meeting_leader }}<br> 
            Notulen : {{ $data->note }}<br>
            Narasumber:
          </p>
          @foreach($data->resource_person as $n)
              <p style="text-align: left; margin-left: 20px;">
                  - {{ $n->resource_person }}
              </p>
          @endforeach
            
          <p style="text-align: justify; margin-top: 20px;">
              Setelah dilakukan pembahasan dan diskusi terhadap materi, selanjutnya seluruh
              peserta Musrenbangdes menyepakati beberapa hal yang berketetapan menjadi
              kesepakatan akhir dari Musrenbangdes, yaitu:
          </p>
          <p style="text-align: left;">
             {{$data->final_agreement}}
          </p>
          <p style="text-align: justify; margin-top: 20px;">
              Keputusan diambil secara musyawarah mufakat/aklamasi  dan pemungutan suara/voting
          </p>
            
          <p style="text-align: justify;">
              Demikian Berita Acara Musrenbangdes ini dibuat dan disahkan dengan penuh tanggungjawab agar dapat
              dipergunakan sebagaimana mestinya
          </p>
          <p style="text-align: right; margin-top: 20px;">
              {{$data->place}} {{$data->date}}
          </p>
          <div class="typewriter">
              <div class="typewriter-kiri">
                  <p>Ketua BPD</p>
                  <br>
                  <p>{{$data->bpd_leader}}</p>
              </div>
              <div class="typewriter-kanan">
                  <p>Kepala Desa</p>
                  <br>
                  <p>{{$village_data->village_head_name}}</p>
              </div>
          </div>
          <p style="text-align: center;">Wakil Masyarakat</p>
          <br>
          <p style="text-align: center;">{{$data->community_representative}}</p>
        </div> 
      </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</html>
