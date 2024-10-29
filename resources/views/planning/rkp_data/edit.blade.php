<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengumuman</title>
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
            grid-template-columns: 1fr;
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
        input[type="date"],
        select,
        textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
            color: #333;
            background-color: #f9f9f9;
            transition: background-color 0.3s, border-color 0.3s;
            resize: none;
            /* Prevent resizing on textarea */
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus,
        textarea:focus {
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
        }

        .tombol:hover {
            background-color: #0056b3;
            transform: scale(1.02);
        }

        /* Additional hidden class */
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Data RKP</h1>

        @if ($errors->any())
        <div class="alert">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('rkp_data.update', $rkp_data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Dropdown Bidang Kegiatan -->
                <div>
                    <label for="field" class="block text-sm font-medium text-gray-700">Bidang Kegiatan</label>
                    <select id="field" name="field" onchange="updateVolumeFields()"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="" disabled>Pilih Bidang Kegiatan</option>
                        <option value="Pemerintahan Desa" {{ $rkp_data->field == 'Pemerintahan Desa' ? 'selected' : '' }}>Pemerintahan Desa</option>
                        <option value="Pembangunan Desa" {{ $rkp_data->field == 'Pembangunan Desa' ? 'selected' : '' }}>Pembangunan Desa</option>
                        <option value="Pembinaan Kemasyarakatan" {{ $rkp_data->field == 'Pembinaan Kemasyarakatan' ? 'selected' : '' }}>Pembinaan Kemasyarakatan</option>
                        <option value="Pemberdayaan Masyarakat" {{ $rkp_data->field == 'Pemberdayaan Masyarakat' ? 'selected' : '' }}>Pemberdayaan Masyarakat</option>
                    </select>
                </div>

                <!-- Sub Bidang -->
                <div>
                    <label for="sub_field" class="block text-sm font-medium text-gray-700">Sub Bidang</label>
                    <input type="text" name="sub_field" required placeholder="Masukkan Sub Bidang" value="{{ $rkp_data->sub_field }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Nama Kegiatan -->
                <div>
                    <label for="activity_name" class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                    <input type="text" name="activity_name" required placeholder="Masukkan Nama Kegiatan" value="{{ $rkp_data->activity_name }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div id="volume-fields">
                    <!-- Volume fields will be dynamically inserted here -->
                </div>


                <!-- Lokasi Kegiatan -->
                <div>
                    <label for="activity_location" class="block text-sm font-medium text-gray-700">Lokasi Kegiatan</label>
                    <textarea name="activity_location" required placeholder="Masukkan Lokasi Kegiatan"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ $rkp_data->activity_location }}</textarea>
                </div>

                <!-- Sasaran Manfaat -->
                <div>
                    <label for="benefit_target" class="block text-sm font-medium text-gray-700">Sasaran Manfaat</label>
                    <input type="text" name="benefit_target" required placeholder="Masukkan Sasaran Manfaat" value="{{ $rkp_data->benefit_target }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Tanggal Awal dan Akhir -->
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Dimulai</label>
                    <input type="date" name="start_date" required value="{{ $rkp_data->start_date }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                    <input type="date" name="end_date" required value="{{ $rkp_data->end_date }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Jumlah dan Sumber Biaya -->
                <div>
                    <label for="total_cost" class="block text-sm font-medium text-gray-700">Jumlah Biaya</label>
                    <input type="text" name="total_cost" required placeholder="Masukkan Jumlah Biaya" value="{{ $rkp_data->total_cost }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="funding_source" class="block text-sm font-medium text-gray-700">Sumber Biaya</label>
                    <input type="text" name="funding_source" required placeholder="Masukkan Sumber Biaya" value="{{ $rkp_data->funding_source }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Swakelola, Kerjasama Antar Desa, Pihak Ketiga -->
                <div>
                    <label for="self_management" class="form-label">Swakelola:</label>
                    <input type="hidden" name="self_management" value="0">
                    <input type="checkbox" name="self_management" value="1" {{ $rkp_data->self_management ? 'checked' : '' }}
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="village_cooperation" class="form-label">Kerjasama Antar Desa:</label>
                    <input type="hidden" name="village_cooperation" value="0">
                    <input type="checkbox" name="village_cooperation" value="1" {{ $rkp_data->village_cooperation ? 'checked' : '' }}
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="third_party" class="form-label">Kerjasama Pihak Ketiga:</label>
                    <input type="hidden" name="third_party" value="0">
                    <input type="checkbox" name="third_party" value="1" {{ $rkp_data->third_party ? 'checked' : '' }}
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Rencana Pelaksana Kegiatan -->
                <div>
                    <label for="officials_id" class="block text-sm font-medium text-gray-700">Rencana Pelaksana Kegiatan</label>
                    <select name="officials_id" required
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @foreach ($officials_data as $data)
                        <option value="{{ $data->id }}" {{ $rkp_data->officials_id == $data->id ? 'selected' : '' }}>
                            {{ $data->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="tombol">Update</button>
            <a href="{{ route('rkp_data.index') }}" class="tombol" style="text-align: center;">Kembali</a>
        </form>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                updateVolumeFields(); // Ensure fields are displayed on page load based on the selected value
            });

            function updateVolumeFields() {
                const field = document.getElementById('field').value;
                const volumeFields = document.getElementById('volume-fields');

                if (field === 'Pemerintahan Desa') {
                    volumeFields.innerHTML = `
                <label for="volume" class="block text-sm font-medium text-gray-700">Volume</label>
                <input type="text" name="volume" placeholder="Berapa Lama Kegiatan Berlangsung (Bulan)" value="{{$volume }}"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <input type="hidden" id="unit" name="unit" value="Bulan">
            `;
                } else if (field === 'Pembangunan Desa') {
                    volumeFields.innerHTML = `
                <label for="volume" class="block text-sm font-medium text-gray-700">Volume</label>
                <input type="text" name="volume" placeholder="Volume Dari Pembangunan (Meter)" value="{{$volume }}"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <input type="hidden" id="unit" name="unit" value="Meter">
            `;
                } else if (field === 'Pembinaan Kemasyarakatan') {
                    volumeFields.innerHTML = `
                <label for="volume" class="block text-sm font-medium text-gray-700">Volume</label>
                <input type="text" name="volume" placeholder="Jumlah Dari Pembinaan (Paket)" value="{{$volume }}"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <input type="hidden" id="unit" name="unit" value="Paket">
            `;
                } else {
                    volumeFields.innerHTML = `
                <label for="volume" class="block text-sm font-medium text-gray-700">Volume</label>
                <input type="text" name="volume" placeholder="Jumlah Dari Pemberdayaan (Unit)" value="{{$volume }}"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <input type="hidden" id="unit" name="unit" value="Unit">
            `;
                }

                // Display the volume fields section
                volumeFields.classList.remove('hidden');
            }
        </script>

</body>

</html>