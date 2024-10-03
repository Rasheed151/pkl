<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengumuman</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet">
    <style>
        /* Reset default styles */
        body,
        h1,
        ul,
        li {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }

        /* Container styling */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading styling */
        h1 {
            font-size: 1.75rem;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        /* Alert styling */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert ul {
            list-style-type: none;
            padding-left: 0;
        }

        .alert li {
            margin-bottom: 5px;
        }

        /* Form styling */
        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 20px;
        }

        /* Form field styling */
        .form-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
            color: #333;
            background-color: #f9f9f9;
            transition: background-color 0.3s, border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        select:focus {
            border-color: #007bff;
            background-color: #eef7ff;
            outline: none;
        }

        /* Button styling */
        .tombol {
            grid-column: span 2;
            padding: 12px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .tombol:hover {
            background-color: #0056b3;
            transform: scale(1.02);
        }

        /* Responsive behavior */
        @media(max-width: 600px) {
            form {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Data Penyedia</h1>

        @if ($errors->any())
        <div class="alert">
            <strong>Whoops!</strong> Ada beberapa kesalahan dalam input Anda:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('data_penyedia.update', $data_penyedia->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-field">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama" value="{{ $data_penyedia->nama }}">
            </div>

            <div class="form-field">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin">
                    <option value="" disabled>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" {{ $data_penyedia->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $data_penyedia->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="form-field">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $tanggal_lahir) }}">
            </div>

            <div class="form-field">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $tempat_lahir) }}" placeholder="Masukkan Tempat Lahir">
            </div>

            <div class="form-field">
                <label for="nik">Nomor Induk</label>
                <input type="text" id="nik" name="nik" value="{{ $data_penyedia->nik }}" placeholder="Masukkan NIK">
            </div>

            <div class="form-field">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{ $data_penyedia->alamat }}" placeholder="Masukkan alamat">
            </div>

            <div class="form-field">
                <label for="nama_perusahaan">Nama Perusahaan</label>
                <input type="text" id="nama_perusahaan" name="nama_perusahaan" value="{{ $data_penyedia->nama_perusahaan }}" placeholder="Masukkan nama_perusahaan">
            </div>

            <div class="form-field">
                <label for="alamat_perusahaan">Alamat Perusahaan</label>
                <input type="text" id="alamat_perusahaan" name="alamat_perusahaan" value="{{ $data_penyedia->alamat_perusahaan }}" placeholder="Masukkan alamat_perusahaan">
            </div>

            <div class="form-field">
                <label for="no_hp">NO HP</label>
                <input type="text" id="no_hp" name="no_hp" value="{{ $data_penyedia->no_hp }}" placeholder="Masukkan no_hp">
            </div>

            <div class="form-field">
                <label for="npwp">NPWP</label>
                <input type="text" id="npwp" name="npwp" value="{{ $data_penyedia->npwp }}" placeholder="Masukkan npwp">
            </div>

            <div class="form-field">
                <label for="nib">NIB</label>
                <input type="number" id="nib" name="nib" value="{{ $data_penyedia->nib }}" placeholder="Masukkan nib">
            </div>

            <button type="submit" class="tombol">Update</button>
            <a href="{{ route('data_penyedia.index') }}" class="tombol" style="text-align: center;">Kembali</a>
        </form>
    </div>
</body>

</html>
