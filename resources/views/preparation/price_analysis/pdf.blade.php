<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisa Harga Satuan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .page {
            width: 100%;
            max-width: 800px;
            margin: auto;
        }
        h2, h3 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .table-container {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table-container th, .table-container td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
            vertical-align: middle;
        }
        .table-container th {
            background-color: #f2f2f2;
        }
        .section-title {
            font-weight: bold;
            text-align: left;
            padding-left: 5px;
        }
        .footer-note {
            font-size: 10px;
            text-align: left;
            margin-top: 10px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="page">
        <h2>Analisa Harga Satuan</h2>
        <p>Pekerjaan: __________________________</p>
        <p>Desa: __________________________</p>
        <p>1. Pekerjaan: __________________ (<i>diisi dengan uraian kegiatan/pekerjaan</i>)</p>

        <table class="table-container">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kegiatan</th>
                    <th>Kode *</th>
                    <th>Satuan</th>
                    <th>Koefisien *</th>
                    <th>Harga Satuan (Rp)</th>
                    <th>Jumlah Harga (Rp)</th>
                </tr>
            </thead>
            <tbody>
                <!-- Section A: Tenaga Kerja -->
                <tr>
                    <td class="section-title" colspan="7">A. Tenaga Kerja</td>
                </tr>
                @foreach ( $price_analysis_Tenaga_Kerja as $data )
                @php $no = 1; @endphp
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$data -> technical_specifications -> name}}</td>
                    <td>{{$data -> code}}</td>
                    <td>{{$data -> unit}}</td>
                    <td>{{$data -> coefficient}}</td>
                    <td>{{$data -> unit_price}}</td>
                    <td>{{$data -> total_price}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="section-title">Jumlah Harga Tenaga Kerja</td>
                    <td>{{$total_price_Tenaga_Kerja}}</td>
                </tr>

                <!-- Section B: Bahan -->
                <tr>
                    <td class="section-title" colspan="7">B. Bahan</td>
                </tr>
                @foreach ( $price_analysis_Bahan as $data )
                @php $no = 1; @endphp
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$data -> technical_specifications -> name}}</td>
                    <td>{{$data -> code}}</td>
                    <td>{{$data -> unit}}</td>
                    <td>{{$data -> coefficient}}</td>
                    <td>{{$data -> unit_price}}</td>
                    <td>{{$data -> total_price}}</td>
                </tr>
                @endforeach
                <tr>
                <td colspan="6" class="section-title">Jumlah Harga Bahan</td>
                <td>{{$total_price_Bahan}}</td>
                </tr>

                <!-- Section C: Peralatan -->
                <tr>
                    <td class="section-title" colspan="7">C. Peralatan</td>
                </tr>
                @foreach ( $price_analysis_Peralatan as $data )
                @php $no = 1; @endphp
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$data -> technical_specifications -> name}}</td>
                    <td>{{$data -> code}}</td>
                    <td>{{$data -> unit}}</td>
                    <td>{{$data -> coefficient}}</td>
                    <td>{{$data -> unit_price}}</td>
                    <td>{{$data -> total_price}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="section-title">Jumlah Harga Peralatan</td>
                    <td>{{$total_price_Peralatan}}</td>
                </tr>

                <!-- Total Calculation Section -->
                <tr>
                    <td colspan="6" class="section-title">Jumlah Harga</td>
                    <td>{{$total_price}}</td>
                </tr>
                <tr>
                    <td colspan="6" class="section-title">Keuntungan 10%-15%</td>
                    <td>{{$total_price_extends}}</td>
                </tr>
                <tr>
                    <td colspan="6" class="section-title">TOTAL</td>
                    <td>{{$total_price_end}}</td>
                </tr>
            </tbody>
        </table>

        <p class="footer-note">*) Catatan: dicantumkan untuk pekerjaan konstruksi</p>
    </div>
    <div class="footer">
        <p>* Pilih salah satu</p>
        <div class="signature">
            <p>Kepala Seksi/Kepala Urusan _________________</p>
            <p>Desa __________________</p>
            <br><br><br><br>
            <p>tanda tangan,</p>
            <p>nama lengkap</p>
        </div>
    </div>
</body>
</html>
