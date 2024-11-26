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
            width: 100%;
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
        <h1>Edit Data Pelaksanaan Secara Penawaran </h1>

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

        <form action="{{ route('offer_implementation.update', $offer_implementation->id) }}" method="POST">

            @csrf
            @method('PUT')
            <!-- Group 1: Pembukaan -->
            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">Pembukaan Dokumen Penawaran</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="date_opening" class="block text-sm font-medium text-gray-700">Tanggal Pembukaan</label>
                        <input type="date" id="date_opening" name="date_opening" value="{{ old('date_opening', $date_opening) }}"
                            class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="time_opening" class="block text-sm font-medium text-gray-700">Waktu Pembukaan</label>
                        <input type="time" id="time_opening" name="time_opening" value="{{ old('time_opening', $time_opening) }}"
                            class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="place_opening" class="block text-sm font-medium text-gray-700">Tempat Pembukaan</label>
                        <input type="text" id="place_opening" name="place_opening" value="{{ old('place_opening', $place_opening) }}"
                            class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>

            <!-- Group 2: Evaluasi -->
            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">Evaluasi Teknis Dan Biaya</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="date_evaluation" class="block text-sm font-medium text-gray-700">Tanggal Pendaftaran</label>
                        <input type="date" id="date_evaluation" name="date_evaluation" value="{{ old('date_evaluation', $date_evaluation) }}"
                            class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="time_evaluation" class="block text-sm font-medium text-gray-700">Waktu Pendaftaran</label>
                        <input type="time" id="time_evaluation" name="time_evaluation" value="{{ old('time_evaluation', $time_evaluation) }}"
                            class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="place_evaluation" class="block text-sm font-medium text-gray-700">Tempat Pendaftaran</label>
                        <input type="text" id="place_evaluation" name="place_evaluation" value="{{ old('place_evaluation', $place_evaluation) }}"
                            class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>

            <!-- Group 3: Pemasukan -->
            <fieldset class="border p-4 mb-4 rounded-lg">
                <legend class="text-lg font-bold text-gray-700 mb-2">Pemasukan</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="date_negotiation" class="block text-sm font-medium text-gray-700">Tanggal Pemasukan</label>
                        <input type="date" id="date_negotiation" name="date_negotiation" value="{{ old('date_negotiation', $date_negotiation) }}"
                            class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="time_negotiation" class="block text-sm font-medium text-gray-700">Waktu Pemasukan</label>
                        <input type="time" id="time_negotiation" name="time_negotiation" value="{{ old('time_negotiation', $time_negotiation) }}"
                            class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="place_negotiation" class="block text-sm font-medium text-gray-700">Tempat Pemasukan</label>
                        <input type="text" id="place_negotiation" name="place_negotiation" value="{{ old('place_negotiation', $place_negotiation) }}"
                            class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                </div>
            </fieldset>

            <div>
                <label for="information" class="block text-sm font-medium text-gray-700">Keterangan</label>
                <textarea
                    name="information"
                    placeholder="Masukkan Keterangan"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm resize-none min-h-[80px] max-h-[500px] overflow-y-auto"
                    id="autoResize">{{ old('information', $offer_implementation->information ?? '') }}</textarea>
            </div>

            <button type="submit" class="tombol">Update</button>


        </form>
    </div>
    <script>
        const textarea = document.getElementById('autoResizeLatarBelakang');

        // Fungsi untuk menyesuaikan tinggi textarea sesuai dengan konten
        textarea.addEventListener('input', function() {
            this.style.height = 'auto'; // Reset height
            this.style.height = this.scrollHeight + 'px'; // Set height to scroll height
        });
    </script>
</body>

</html>