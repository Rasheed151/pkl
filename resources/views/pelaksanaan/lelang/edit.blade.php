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
            margin-bottom: 20px;
        }

        /* Fieldset styling */
        fieldset {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        legend {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        /* Form field styling */
        .form-field {
            margin-bottom: 15px;
        }

        label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="time"],
        select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
            color: #333;
            background-color: #f9f9f9;
            transition: background-color 0.3s, border-color 0.3s;
            width: 100%;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        input[type="time"]:focus,
        select:focus {
            border-color: #007bff;
            background-color: #eef7ff;
            outline: none;
        }

        /* Button styling */
        .tombol {
            padding: 12px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            width:100%;
            align-content: center;
        }

        .tombol:hover {
            background-color: #0056b3;
            transform: scale(1.02);
        }

        /* Responsive behavior */
        @media(max-width: 600px) {
            fieldset {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Data Pelaksanaan Secara lelang </h1>

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

        <form action="{{ route('pengumuman_lelang.update', $pengumuman_lelang->id) }}" method="POST">

        @csrf
        @method('PUT')
            <!-- Group 1: Pengumuman -->
            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">Pengumuman</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="tanggal_pengumuman" class="block text-sm font-medium text-gray-700">Tanggal Pengumuman</label>
                        <input type="date" id="tanggal_pengumuman" name="tanggal_pengumuman" value="{{ old('tanggal_pengumuman', $tanggal_pengumuman) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="waktu_pengumuman" class="block text-sm font-medium text-gray-700">Waktu Pengumuman</label>
                        <input type="time" id="waktu_pengumuman" name="waktu_pengumuman" value="{{ old('waktu_pengumuman', $waktu_pengumuman) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="tempat_pengumuman" class="block text-sm font-medium text-gray-700">Tempat Pengumuman</label>
                        <input type="text" id="tempat_pengumuman" name="tempat_pengumuman" value="{{ old('tempat_pengumuman', $tempat_pengumuman) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>

            <!-- Group 2: Pendaftaran -->
            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">Pendaftaran</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="tanggal_pendaftaran" class="block text-sm font-medium text-gray-700">Tanggal Pendaftaran</label>
                        <input type="date" id="tanggal_pendaftaran" name="tanggal_pendaftaran" value="{{ old('tanggal_pendaftaran', $tanggal_pendaftaran) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="waktu_pendaftaran" class="block text-sm font-medium text-gray-700">Waktu Pendaftaran</label>
                        <input type="time" id="waktu_pendaftaran" name="waktu_pendaftaran" value="{{ old('waktu_pendaftaran', $waktu_pendaftaran) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="tempat_pendaftaran" class="block text-sm font-medium text-gray-700">Tempat Pendaftaran</label>
                        <input type="text" id="tempat_pendaftaran" name="tempat_pendaftaran" value="{{ old('tempat_pendaftaran', $tempat_pendaftaran) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>

            <!-- Group 3: Pemasukan -->
            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">Pemasukan</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="tanggal_pemasukan" class="block text-sm font-medium text-gray-700">Tanggal Pemasukan</label>
                        <input type="date" id="tanggal_pemasukan" name="tanggal_pemasukan" value="{{ old('tanggal_pemasukan', $tanggal_pemasukan) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="waktu_pemasukan" class="block text-sm font-medium text-gray-700">Waktu Pemasukan</label>
                        <input type="time" id="waktu_pemasukan" name="waktu_pemasukan" value="{{ old('waktu_pemasukan', $waktu_pemasukan) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="tempat_pemasukan" class="block text-sm font-medium text-gray-700">Tempat Pemasukan</label>
                        <input type="text" id="tempat_pemasukan" name="tempat_pemasukan" value="{{ old('tempat_pemasukan', $tempat_pemasukan) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>

            <!-- Group 4: Evaluasi -->
            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">Evaluasi</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="tanggal_evaluasi" class="block text-sm font-medium text-gray-700">Tanggal Evaluasi</label>
                        <input type="date" id="tanggal_evaluasi" name="tanggal_evaluasi" value="{{ old('tanggal_evaluasi', $tanggal_evaluasi) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="waktu_evaluasi" class="block text-sm font-medium text-gray-700">Waktu Evaluasi</label>
                        <input type="time" id="waktu_evaluasi" name="waktu_evaluasi" value="{{ old('waktu_evaluasi', $waktu_evaluasi) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="tempat_evaluasi" class="block text-sm font-medium text-gray-700">Tempat Evaluasi</label>
                        <input type="text" id="tempat_evaluasi" name="tempat_evaluasi" value="{{ old('tempat_evaluasi', $tempat_evaluasi) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>

            <!-- Group 5: Negosiasi -->
            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">Negosiasi</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="tanggal_negosiasi" class="block text-sm font-medium text-gray-700">Tanggal Negosiasi</label>
                        <input type="date" id="tanggal_negosiasi" name="tanggal_negosiasi" value="{{ old('tanggal_negosiasi', $tanggal_negosiasi) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="waktu_negosiasi" class="block text-sm font-medium text-gray-700">Waktu Negosiasi</label>
                        <input type="time" id="waktu_negosiasi" name="waktu_negosiasi" value="{{ old('waktu_negosiasi', $waktu_negosiasi) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="tempat_negosiasi" class="block text-sm font-medium text-gray-700">Tempat Negosiasi</label>
                        <input type="text" id="tempat_negosiasi" name="tempat_negosiasi" value="{{ old('tempat_negosiasi', $tempat_negosiasi) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>

            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">penepatan</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="tanggal_penepatan" class="block text-sm font-medium text-gray-700">Tanggal penepatan</label>
                        <input type="date" id="tanggal_penepatan" name="tanggal_penepatan" value="{{ old('tanggal_penepatan', $tanggal_penepatan) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="waktu_penepatan" class="block text-sm font-medium text-gray-700">Waktu penepatan</label>
                        <input type="time" id="waktu_penepatan" name="waktu_penepatan" value="{{ old('waktu_penepatan', $waktu_penepatan) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="tempat_penepatan" class="block text-sm font-medium text-gray-700">Tempat penepatan</label>
                        <input type="text" id="tempat_penepatan" name="tempat_penepatan" value="{{ old('tempat_penepatan', $tempat_penepatan) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>


            <button type="submit" class="tombol">Update</button>


        </form>
    </div>
</body>

</html>