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

        <form action="{{ route('auction_announcements.update', $auction_announcements->id) }}" method="POST">

        @csrf
        @method('PUT')
            <!-- Group 1: Pengumuman -->
            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">Pengumuman</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="date_announcement" class="block text-sm font-medium text-gray-700">Tanggal Pengumuman</label>
                        <input type="date" id="date_announcement" name="date_announcement" value="{{ old('date_announcement', $date_announcement) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="time_announcement" class="block text-sm font-medium text-gray-700">Waktu Pengumuman</label>
                        <input type="time" id="time_announcement" name="time_announcement" value="{{ old('time_announcement', $time_announcement) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="place_announcement" class="block text-sm font-medium text-gray-700">Tempat Pengumuman</label>
                        <input type="text" id="place_announcement" name="place_announcement" value="{{ old('place_announcement', $place_announcement) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>

            <!-- Group 2: Pendaftaran -->
            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">Pendaftaran</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="date_registration" class="block text-sm font-medium text-gray-700">Tanggal Pendaftaran</label>
                        <input type="date" id="date_registration" name="date_registration" value="{{ old('date_registration', $date_registration) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="time_registration" class="block text-sm font-medium text-gray-700">Waktu Pendaftaran</label>
                        <input type="time" id="time_registration" name="time_registration" value="{{ old('time_registration', $time_registration) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="place_registration" class="block text-sm font-medium text-gray-700">Tempat Pendaftaran</label>
                        <input type="text" id="place_registration" name="place_registration" value="{{ old('place_registration', $place_registration) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>

            <!-- Group 3: Pemasukan -->
            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">Pemasukan</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="date_income" class="block text-sm font-medium text-gray-700">Tanggal Pemasukan</label>
                        <input type="date" id="date_income" name="date_income" value="{{ old('date_income', $date_income) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="time_income" class="block text-sm font-medium text-gray-700">Waktu Pemasukan</label>
                        <input type="time" id="time_income" name="time_income" value="{{ old('time_income', $time_income) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="place_income" class="block text-sm font-medium text-gray-700">Tempat Pemasukan</label>
                        <input type="text" id="place_income" name="place_income" value="{{ old('place_income', $place_income) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>

            <!-- Group 4: Evaluasi -->
            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">Evaluasi</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="date_evaluation" class="block text-sm font-medium text-gray-700">Tanggal Evaluasi</label>
                        <input type="date" id="date_evaluation" name="date_evaluation" value="{{ old('date_evaluation', $date_evaluation) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="time_evaluation" class="block text-sm font-medium text-gray-700">Waktu Evaluasi</label>
                        <input type="time" id="time_evaluation" name="time_evaluation" value="{{ old('time_evaluation', $time_evaluation) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="place_evaluation" class="block text-sm font-medium text-gray-700">Tempat Evaluasi</label>
                        <input type="text" id="place_evaluation" name="place_evaluation" value="{{ old('place_evaluation', $place_evaluation) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>

            <!-- Group 5: Negosiasi -->
            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">Negosiasi</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="date_negotiation" class="block text-sm font-medium text-gray-700">Tanggal Negosiasi</label>
                        <input type="date" id="date_negotiation" name="date_negotiation" value="{{ old('date_negotiation', $date_negotiation) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="time_negotiation" class="block text-sm font-medium text-gray-700">Waktu Negosiasi</label>
                        <input type="time" id="time_negotiation" name="time_negotiation" value="{{ old('time_negotiation', $time_negotiation) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="place_negotiation" class="block text-sm font-medium text-gray-700">Tempat Negosiasi</label>
                        <input type="text" id="place_negotiation" name="place_negotiation" value="{{ old('place_negotiation', $place_negotiation) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>

            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">penepatan</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="date_placement" class="block text-sm font-medium text-gray-700">Tanggal penepatan</label>
                        <input type="date" id="date_placement" name="date_placement" value="{{ old('date_placement', $date_placement) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="time_placement" class="block text-sm font-medium text-gray-700">Waktu penepatan</label>
                        <input type="time" id="time_placement" name="time_placement" value="{{ old('time_placement', $time_placement) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="place_placement" class="block text-sm font-medium text-gray-700">Tempat penepatan</label>
                        <input type="text" id="place_placement" name="place_placement" value="{{ old('place_placement', $place_placement) }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>


            <button type="submit" class="tombol">Update</button>


        </form>
    </div>
</body>

</html>