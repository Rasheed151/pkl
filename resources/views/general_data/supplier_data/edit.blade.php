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

        <form action="{{ route('supplier_data.update', $supplier_data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-field">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama" value="{{ $supplier_data->name }}">
            </div>

            <div class="form-field">
                <label for="gender">Jenis Kelamin</label>
                <select id="gender" name="gender">
                    <option value="" disabled>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" {{ $supplier_data->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $supplier_data->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
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
                <label for="nik">Nomor Induk</label>
                <input type="text" id="nik" name="nik" value="{{ $supplier_data->nik }}" placeholder="Masukkan NIK">
            </div>

            <div class="form-field">
                <label for="address">Alamat</label>
                <input type="text" id="address" name="address" value="{{ $supplier_data->address }}" placeholder="Masukkan alamat">
            </div>

            <div class="form-field">
                <label for="company_name">Nama Perusahaan</label>
                <input type="text" id="company_name" name="company_name" value="{{ $supplier_data->company_name }}" placeholder="Masukkan nama perusahaan">
            </div>

            <div class="form-field">
                <label for="company_address">Alamat Perusahaan</label>
                <input type="text" id="company_address" name="company_address" value="{{ $supplier_data->company_address }}" placeholder="Masukkan alamat perusahaan">
            </div>

            <div class="form-field">
                <label for="phone_number">NO HP</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ $supplier_data->phone_number }}" placeholder="Masukkan no_hp">
            </div>

            <div class="form-field">
                <label for="npwp">NPWP</label>
                <input type="text" id="npwp" name="npwp" value="{{ $supplier_data->npwp }}" placeholder="Masukkan npwp">
            </div>

            <div class="form-field">
                <label for="nib">NIB</label>
                <input type="number" id="nib" name="nib" value="{{ $supplier_data->nib }}" placeholder="Masukkan nib">
            </div>

            <button type="submit" class="tombol">Update</button>
            <a href="{{ route('supplier_data.index') }}" class="tombol" style="text-align: center;">Kembali</a>
        </form>
    </div>
</body>

</html>
