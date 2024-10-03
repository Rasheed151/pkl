<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Aparat</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet">
    <style>
        /* Reset default styles */
        body, h1, ul, li {
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
        <h1>Edit Data Spesifikasi Teknis {{$data_teknis->nama}}</h1>

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

        <form action="{{ route('data_teknis.update', $data_teknis->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-field">
                <label for="edit_nama">Nama</label>
                <input type="text" id="edit_nama" name="nama" value="{{ $data_teknis->nama }}" placeholder="Masukkan Nama">
            </div>

            <div class="form-field">
                <label for="edit_spesifikasi">Spesifikasi</label>
                <input type="text" id="edit_spesifikasi" name="spesifikasi" value="{{ $data_teknis->spesifikasi }}">
            </div>
            
            <div class="form-field">
                <label for="edit_jenis">Jenis</label>
                <select id="edit_jenis" name="jenis">
                    <option value="" disabled>Pilih Jenis Kelamin</option>
                    <option value="Tenaga Kerja" {{ $data_teknis->jenis == 'Tenaga Kerja' ? 'selected' : '' }}>Tenaga Kerja</option>
                    <option value="Bahan" {{ $data_teknis->jenis == 'Bahan' ? 'selected' : '' }}>Bahan</option>
                    <option value="Peralatan" {{ $data_teknis->jenis == 'Peralatan' ? 'selected' : '' }}>Peralatan</option>
                </select>
            </div>

            

            <button type="submit" class="tombol">Update</button>
        </form>
    </div>
</body>

</html>
