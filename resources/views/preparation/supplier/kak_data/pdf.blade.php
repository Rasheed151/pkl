<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat 5</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
@page {
    size: A4 portrait; /* Set ukuran kertas portrait */
    margin: 20mm; /* Margin halaman */
}

body {
    font-family: Arial, sans-serif; /* Font yang digunakan */
    color: black; /* Warna teks */
    background: white; /* Latar belakang putih */
    line-height: 1.6; /* Jarak antar baris */
}

.book {
    width: 100%; /* Lebar buku */
}

.page {
    width: 100%; /* Lebar halaman */
}

.subpage {
    padding: 20px; /* Ruang di dalam subpage */
    box-sizing: border-box; /* Menghitung padding dalam ukuran total */
}

p {
    text-align: justify; /* Rata kanan-kiri teks */
    font-size: 12px; /* Ukuran font */
    margin: 0 0 10px 0; /* Margin antar paragraf */
}

p:last-child {
    margin-bottom: 0; /* Hilangkan margin bawah pada paragraf terakhir */
}

p.signature {
    text-align: right; /* Rata kanan khusus untuk bagian tanda tangan */
    margin-top: 30px; /* Jarak atas untuk bagian tanda tangan */
}

/* Styling bagian tanda tangan */
.signature {
    text-align: right; /* Rata kanan teks */
    font-size: 12px; /* Ukuran font untuk tanda tangan */
    margin-top: 40px; /* Jarak atas untuk tanda tangan */
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
                {{$kak->background}}
              </p>
              <p style="text-align: justify; font-size: 12px;">
                2. Penerima Manfaat
                <br>Penerima Manfaat Adalah {{$kak->rkp_data->benefit_target}}
              </p>
              <p style="text-align: justify; font-size: 12px;">
                3. Cara Melaksanakan
                <br>{{$kak->rkp_data->procurement_method}}
              </p>
              <p style="text-align: justify; font-size: 12px;">
                4. Pelaksana dan Penanggung jawab
                <br>Pelaksana Kegiatan ini adalah Tim Pelaksana Kegiatan (TPK) dengan susunan
                Keanggotaan Ketua {{$kak->announcement->tpk_data->head_name}}, sekretaris {{$kak->announcement->tpk_data->secretary_name}}, dan anggota{{$kak->announcement->tpk_data->member_name}}.
                Adapun Penanggung Jawab adalah {{$kak->rkp_data->officials_data->name}} selaku Kepala Seksi/Kepala Urusan {{$kak->rkp_data->officials_data->position}}
                Desa {{$village_data->village}}.
              </p>
              <p style="text-align: justify; font-size: 12px;">
                5. Jadwal
                <br> Tanggal Mulai {{$kak->rkp_data->start_date}} sampai dengan tanggal selesai {{$kak->rkp_data->end_date}}
                Dilaksanakan Selama {{$kak->rkp_data->implementation_time}} hari
              </p>
              <p style="text-align: justify; font-size: 12px;">
                6. Biaya Yang Diperlakukan
                <br>Biaya yang diperlukan untuk melaksanakan kegiatan {{$kak->rkp_data->activity_name}}
                adalah sebesar Rp{{$kak->rkp_data->total_cost}} sebagaimana
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
                <br>
                <br>
                <br>
                <br>
                <br>nama lengkap
              </p>
            </div> 
          </div>
    </div>
    
</body>
</html>