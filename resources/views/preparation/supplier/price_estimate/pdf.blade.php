<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat</title>
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
            border-collapse: collapse;
        }
        .table-container th, .table-container td {
            border: 1px solid black;
            padding: 8px;
            font-size: 12px;
            text-align: center;
        }
        .table-container th {
            font-weight: bold;
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
    </style>
</head>
<body>

    <div class="header">
        <p>KEPALA SEKSI/KEPALA URUSAN _________________</p>
        <p>DESA __________________</p>
    </div>

    <table class="table-container">
        <tr>
            <th>No</th>
            <th>Uraian Kegiatan/ Nama barang/jasa*</th>
            <th>Spesifikasi</th>
            <th>Volume</th>
            <th>Satuan</th>
            <th>Harga Satuan (Rp)</th>
            <th>Jumlah Harga (Rp)</th>
        </tr>
        @php $no = 1; @endphp
        @foreach ( $price_estimate as $data )
        <tr>
        <td>{{ $no++ }}</td>
            <td>{{$data -> name}}</td>
            <td>{{$data -> specification}}</td>
            <td>{{$data -> volume}}</td>
            <td>{{$data -> unit}}</td>
            <td>{{$data -> unit_price}}</td>
            <td>{{$data -> total_price}}</td>
        </tr>
        @endforeach
        <!-- Subtotals -->
        <tr>
            <td colspan="6" class="left-align"><b>Jumlah Harga</b></td>
            <td>{{$total_price}}</td>
        </tr>
        <tr>
            <td colspan="6" class="left-align"><b>PPN 11%</b></td>
            <td>{{$ppn}}</td>
        </tr>
        <tr>
            <td colspan="6" class="left-align"><b>Total Harga</b></td>
            <td>{{$total_price_end}}</td>
        </tr>
    </table>

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
