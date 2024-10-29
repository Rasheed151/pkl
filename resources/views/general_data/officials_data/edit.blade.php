<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Aparat</title>
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

        /* Spacing and alignment */
        .form-field input,
        .form-field select {
            margin-bottom: 10px;
        }

        /* Responsive behavior */
        @media(max-width: 600px) {
            form {
                grid-template-columns: 1fr;
            }

            .tombol {
                grid-column: span 1;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Data Aparat {{$officials_data->nama}}</h1>

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

        <form action="{{ route('officials_data.update', $officials_data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-field">
                <label for="edit_nama">Nama</label>
                <input type="text" id="edit_nama" name="name" value="{{ $officials_data->name }}" placeholder="Masukkan Nama">
            </div>

            <div class="form-field">
                <label for="edit_jenis_kelamin">Jenis Kelamin</label>
                <select id="edit_jenis_kelamin" name="gender">
                    <option value="" disabled>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" {{ $officials_data->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $officials_data->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="form-field">
                <label for="birth_date">Tanggal Lahir</label>
                <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $birth_date) }}">
            </div>

            <div class="form-field">
                <label for="birth_place">Tempat Lahir</label>
                <input type="text" id="birth_place" name="birth_place" value="{{ old('birth_place', $birth_place) }}" placeholder="Masukkan Tempat Lahir">
            </div>

            <div class="form-field">
                <label for="edit_nik">NIK Induk</label>
                <input type="number" id="edit_nik" name="nik" value="{{ $officials_data->nik }}" placeholder="Masukkan NIK">
            </div>

            <div class="form-field">
                <label for="edit_alamat">Alamat Lengkap</label>
                <input type="text" id="edit_alamat" name="address" value="{{ $officials_data->address }}" placeholder="Masukkan Alamat Lengkap">
            </div>

            <div class="form-field">
                <label for="edit_npwp">NPWP</label>
                <input type="text" id="edit_npwp" name="npwp" value="{{ $officials_data->npwp }}" placeholder="Masukkan NPWP">
            </div>

            <div class="form-field">
                <label for="edit_no_hp">No. Hp</label>
                <input type="text" id="edit_no_hp" name="phone_number" value="{{ $officials_data->phone_number }}" placeholder="Masukkan Nomor Hp">
            </div>

            <div class="form-field">
                <label for="edit_jabatan">Jabatan</label>
                <select id="edit_jabatan" name="position">
                    <option value="" disabled>Pilih Jabatan</option>
                    <option value="Kepala Desa" {{ $officials_data->position == 'Kepala Desa' ? 'selected' : '' }}>Kepala Desa</option>
                    <option value="Sekretaris Desa" {{ $officials_data->position == 'Sekretaris Desa' ? 'selected' : '' }}>Sekretaris Desa</option>
                    <option value="Kepala Urusan Tata Usaha Dan Umum" {{ $officials_data->position == 'Kepala Urusan Tata Usaha Dan Umum' ? 'selected' : '' }}>Kepala Urusan Tata Usaha Dan Umum</option>
                    <option value="Kepala Urusan Keuangan" {{ $officials_data->position == 'Kepala Urusan Keuangan' ? 'selected' : '' }}>Kepala Urusan Keuangan</option>
                    <option value="Kepala Urusan Perencanaan" {{ $officials_data->position == 'Kepala Urusan Perencanaan' ? 'selected' : '' }}>Kepala Urusan Perencanaan</option>
                    <option value="Kepala Seleksi Pemerintahan" {{ $officials_data->position == 'Kepala Seleksi Pemerintahan' ? 'selected' : '' }}>Kepala Seleksi Pemerintahan</option>
                    <option value="Kepala Seleksi Kesejahtraan" {{ $officials_data->position == 'Kepala Seleksi Kesejahtraan' ? 'selected' : '' }}>Kepala Seleksi Kesejahtraan</option>
                    <option value="Kepala Seleksi Pelayanan" {{ $officials_data->position == 'Kepala Seleksi Pelayanan' ? 'selected' : '' }}>Kepala Seleksi Pelayanan</option>
                    <option value="Kepala Dusun 1" {{ $officials_data->position == 'Kepala Dusun 1' ? 'selected' : '' }}>Kepala Dusun 1</option>
                    <option value="Kepala Dusun 2" {{ $officials_data->position == 'Kepala Dusun 2' ? 'selected' : '' }}>Kepala Dusun 2</option>
                    <option value="Kepala Dusun 3" {{ $officials_data->position == 'Kepala Dusun 3' ? 'selected' : '' }}>Kepala Dusun 3</option>
                    <option value="Operator Umum Desa" {{ $officials_data->position == 'Operator Umum Desa' ? 'selected' : '' }}>Operator Umum Desa</option>
                </select>
            </div>

            <button type="submit" class="tombol">Update</button>
            <a href="{{ route('officials_data.index') }}" class="tombol" style="text-align: center;">Kembali</a>
        </form>
    </div>
</body>

</html>