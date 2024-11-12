<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pengumuman Lelang</title>
<style>

body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

.header {
    text-align: center;
    margin-bottom: 20px;
}

.header p {
    margin: 2px;
}

.table-container {
    width: 100%;
    border-collapse: collapse; /* Pastikan border antar sel menyatu */
}

.table-container th, .table-container td {
    border: 1px solid black; /* Border tipis dan normal */
    padding: 8px;
    font-size: 12px;
    text-align: center;
}

.table-container th {
    font-weight: bold;
    background-color: #f9f9f9; /* Latar belakang ringan untuk header */
}

.table-container td {
    text-align: left; /* Agar teks dalam sel lebih mudah dibaca */
}

.table-container .no-border {
    border: none;
}

.table-container .left-align {
    text-align: left;
}

.footer {
    margin-top: 40px;
    text-align: left;
    font-size: 12px;
}

.footer .signature {
    margin-top: 60px;
    text-align: right;
}

/* Print-specific settings */


/* Print-specific settings */



</style>
</head>
<body>

<div class="container">
    <div class="header">
        <p>PENGUMUMAN LELANG</p>
        <p>Nomor: {{$data -> rkp_id}}</p>
    </div>

    <div class="content">
        <p>Tim Pelaksana Kegiatan (TPK) Desa {{$village_data->village}} Tahun Anggaran {{$village_data->fiscal_year}} dengan ini mengumumkan dan mengundang Penyedia (Perusahaan/Pemasok/Toko) untuk mengikuti pengadaan yang dilakukan dengan cara Lelang, sebagai berikut:</p>

        <p><span class="section-title">1. Nama Pekerjaan</span> : <span style="text-decoration: underline;">{{$data -> rkp_data -> activity_name}}</span></p>
        <p><span class="section-title">2. Nama TPK</span>:</p>
        <ul>
            <li>Ketua: <span style="text-decoration: underline;">{{$data -> announcement -> tpk_data -> head_name}}</span></li>
            <li>Sekretaris: <span style="text-decoration: underline;">{{$data -> announcement -> tpk_data -> secretary_name}}</span></li>
            <li>Anggota: <span style="text-decoration: underline;">{{$data -> announcement -> tpk_data -> member_name}}</span></li>
        </ul>
        <p><span class="section-title">3. Lokasi Pekerjaan</span> : <span style="text-decoration: underline;">{{$data -> rkp_data -> activity_location}}</span></p>
        <p><span class="section-title">4. Lingkup Pekerjaan</span> : <span style="text-decoration: underline;">{{$data -> rkp_data -> field}}</span></p>
        <p><span class="section-title">5. Nilai total HPS</span> : Rp <span style="text-decoration: underline;">{{$total_price }}</span></p>
        <p><span class="section-title">6. Waktu Pelaksanaan</span> : <span style="text-decoration: underline;">{{$data -> rkp_data -> implementation_time}}</span></p>

        <p><span class="section-title">7. Jadwal Proses Lelang</span>:</p>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th rowspan="2">Kegiatan</th>
                    <th colspan="3">Waktu Pelaksanaan</th>
                    <th rowspan="2">Tempat</th>
                </tr>
                <tr>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Pukul</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pengumuman</td>
                    <td>{{$announcement_day}}</td>
                    <td>{{$date_announcement}}</td>
                    <td>{{$time_announcement}} s/d Selesai</td>
                    <td>{{$place_announcement}}</td>
                </tr>
                <tr>
                    <td>Pendaftaran dan pengambilan Dokumen Lelang</td>
                    <td>{{$registration_day}}</td>
                    <td>{{$date_registration}}</td>
                    <td>{{$time_registration}}s/d Selesai</td>
                    <td>{{$place_registration}}</td>
                </tr>
                <tr>
                    <td>Pemasukan Dokumen Penawaran</td>
                    <td>{{$submission_day}}</td>
                    <td>{{$date_submission}}</td>
                    <td>{{$time_submission}}s/d Selesai</td>
                    <td>{{$place_submission}}</td>
                </tr>
                <tr>
                    <td>Evaluasi penawaran</td>
                    <td>{{$evaluation_day}}</td>
                    <td>{{$date_evaluation}}</td>
                    <td>{{$time_evaluation}}s/d Selesai</td>
                    <td>{{$place_evaluation}}</td>
                </tr>
                <tr>
                    <td>Negosiasi</td>
                    <td>{{$negotiation_day}}</td>
                    <td>{{$date_negotiation}}</td>
                    <td>{{$time_negotiation}}s/d Selesai</td>
                    <td>{{$place_negotiation}}</td>
                </tr>
                <tr>
                    <td>Penetapan Pemenang</td>
                    <td>{{$decision_day}}</td>
                    <td>{{$date_decision}}</td>
                    <td>{{$time_decision}}s/d Selesai</td>
                    <td>{{$place_decision}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="content">
        <p>Demikian agar maklum, atas perhatiannya kami ucapkan terima kasih.</p>
    </div>

    <div class="signature">
        <p>[tempat], [tanggal] [bulan] [tahun]</p>
        <p>An. Tim Pelaksana Kegiatan</p>
        <p>Desa __________</p>
        <p>Tahun Anggaran __________</p>
        <p>Ketua:</p>
        <span class="sign-line">____________________</span>
        <p>tanda tangan,</p>

        <br>
        <p>nama lengkap</p>
    </div>
</div>

</body>
</html>
