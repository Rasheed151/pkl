

       

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
        <h1>Edit Data TPK {{$tpk_data->nama}}</h1>

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

        <form action="{{ route('tpk_data.update', $tpk_data->id) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')

    <div class="border rounded-lg p-4 bg-gray-50">
    <h6 class="text-md font-semibold text-gray-800 mb-2">Data TPK</h6>
        <div class="form-field mb-4">
            <label for="tpk_group_name" class="block text-sm font-medium text-gray-700">Nama TPK</label>
            <input type="text" id="tpk_group_name" name="tpk_group_name" value="{{ $tpk_data->tpk_group_name }}" placeholder="Masukkan Nama Kelompok TPK" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="village_decree_number" class="block text-sm font-medium text-gray-700">Nomor SK Kades</label>
            <input type="text" id="village_decree_number" name="village_decree_number" value="{{ $tpk_data->village_decree_number }}" placeholder="Masukkan Nomor SK Kades" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="village_decree_date" class="block text-sm font-medium text-gray-700">Tanggal SK Kades</label>
            <input type="date" id="village_decree_date" name="village_decree_date" value="{{ $tpk_data->village_decree_date }}" placeholder="Masukkan Tanggal SK Kades" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

    </div>

    <div class="border rounded-lg p-4 bg-gray-50">

        <!-- Kelompok Data Kepala -->
        <h6 class="text-md font-semibold text-gray-800 mb-2">Data Ketua</h6>
        <div class="form-field mb-4">
            <label for="head_name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="head_name" name="head_name" value="{{ $tpk_data->head_name }}" placeholder="Masukkan Nama Kepala" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="head_gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select id="head_gender" name="head_gender" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                <option value="" disabled>Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ $tpk_data->head_gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $tpk_data->head_gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-field mb-4">
            <label for="head_birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" id="head_birth_date" name="head_birth_date" value="{{ old('head_birth_date', $head_birth_date) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="head_birth_place" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
            <input type="text" id="head_birth_place" name="head_birth_place" value="{{ old('head_birth_place', $head_birth_place) }}" placeholder="Masukkan Tempat Lahir Kepala" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="head_nik" class="block text-sm font-medium text-gray-700">NIK</label>
            <input type="text" id="head_nik" name="head_nik" value="{{ $tpk_data->head_nik }}" placeholder="Masukkan NIK Kepala" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="head_address" class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" id="head_address" name="head_address" value="{{ $tpk_data->head_address }}" placeholder="Masukkan Alamat Kepala" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="head_phone_number" class="block text-sm font-medium text-gray-700">No Hp</label>
            <input type="text" id="head_phone_number" name="head_phone_number" value="{{ $tpk_data->head_phone_number }}" placeholder="Masukkan No Hp Kepala" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>
    </div>

    <div class="border rounded-lg p-4 bg-gray-50">
        <h6 class="text-md font-semibold text-gray-800 mb-2">Data Sekretaris</h6>
        
        <div class="form-field mb-4">
            <label for="secretary_name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="secretary_name" name="secretary_name" value="{{ $tpk_data->secretary_name }}" placeholder="Masukkan Nama Sekretaris" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="secretary_gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select id="secretary_gender" name="secretary_gender" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                <option value="" disabled>Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ $tpk_data->secretary_gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $tpk_data->secretary_gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-field mb-4">
            <label for="secretary_birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" id="secretary_birth_date" name="secretary_birth_date" value="{{ old('secretary_birth_date', $secretary_birth_date) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="secretary_birth_place" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
            <input type="text" id="secretary_birth_place" name="secretary_birth_place" value="{{ old('secretary_birth_place', $secretary_birth_place) }}" placeholder="Masukkan Tempat Lahir Sekretaris" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="secretary_nik" class="block text-sm font-medium text-gray-700">NIK</label>
            <input type="text" id="secretary_nik" name="secretary_nik" value="{{ $tpk_data->secretary_nik }}" placeholder="Masukkan NIK Sekretaris" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="secretary_address" class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" id="secretary_address" name="secretary_address" value="{{ $tpk_data->secretary_address }}" placeholder="Masukkan Alamat Sekretaris" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="secretary_phone_number" class="block text-sm font-medium text-gray-700">No Hp</label>
            <input type="text" id="secretary_phone_number" name="secretary_phone_number" value="{{ $tpk_data->secretary_phone_number }}" placeholder="Masukkan No Hp Sekretaris" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>
    </div>

    <div class="border rounded-lg p-4 bg-gray-50">
        <h6 class="text-md font-semibold text-gray-800 mb-2">Data Anggota</h6>
        
        <div class="form-field mb-4">
            <label for="member_name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="member_name" name="member_name" value="{{ $tpk_data->member_name }}" placeholder="Masukkan Nama Anggota" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="member_gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select id="member_gender" name="member_gender" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                <option value="" disabled>Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ $tpk_data->member_gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $tpk_data->member_gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-field mb-4">
            <label for="member_birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" id="member_birth_date" name="member_birth_date" value="{{ old('member_birth_date', $member_birth_date) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="member_birth_place" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
            <input type="text" id="member_birth_place" name="member_birth_place" value="{{ old('member_birth_place', $member_birth_place) }}" placeholder="Masukkan Tempat Lahir Anggota" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="member_nik" class="block text-sm font-medium text-gray-700">NIK</label>
            <input type="text" id="member_nik" name="member_nik" value="{{ $tpk_data->member_nik }}" placeholder="Masukkan NIK Anggota" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="member_address" class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" id="member_address" name="member_address" value="{{ $tpk_data->member_address }}" placeholder="Masukkan Alamat Anggota" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>

        <div class="form-field mb-4">
            <label for="member_phone_number" class="block text-sm font-medium text-gray-700">No Hp</label>
            <input type="text" id="member_phone_number" name="member_phone_number" value="{{ $tpk_data->member_phone_number }}" placeholder="Masukkan No Hp Anggota" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        </div>
    </div>
    <button type="submit" class="tombol">Update</button>
    <a href="{{ route('tpk_data.index') }}" class="tombol" style="text-align: center;">Kembali</a>
</form>

    </div>
</body>

</html>