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
        <form action="{{ route('data_rkp.update', $data_rkp->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Dropdown Bidang Kegiatan -->
                <div>
                    <label for="bidang" class="block text-sm font-medium text-gray-700">Bidang Kegiatan</label>
                    <select id="bidang" name="bidang" onchange="updateVolumeFields()"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="" disabled>Pilih Bidang Kegiatan</option>
                        <option value="Pemerintahan Desa" {{ $data_rkp->bidang == 'Pemerintahan Desa' ? 'selected' : '' }}>Pemerintahan Desa</option>
                        <option value="Pembangunan Desa" {{ $data_rkp->bidang == 'Pembangunan Desa' ? 'selected' : '' }}>Pembangunan Desa</option>
                        <option value="Pembinaan Kemasyarakatan" {{ $data_rkp->bidang == 'Pembinaan Kemasyarakatan' ? 'selected' : '' }}>Pembinaan Kemasyarakatan</option>
                        <option value="Pemberdayaan Masyarakat" {{ $data_rkp->bidang == 'Pemberdayaan Masyarakat' ? 'selected' : '' }}>Pemberdayaan Masyarakat</option>
                    </select>
                </div>

                <!-- Sub Bidang -->
                <div>
                    <label for="sub_bidang" class="block text-sm font-medium text-gray-700">Sub Bidang</label>
                    <input type="text" name="sub_bidang" required placeholder="Masukkan Sub Bidang" value="{{ $data_rkp->sub_bidang }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Nama Kegiatan -->
                <div>
                    <label for="nama_kegiatan" class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" required placeholder="Masukkan Nama Kegiatan" value="{{ $data_rkp->nama_kegiatan }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Volume Fields (Dynamically updated) -->
                <div id="volume-fields" class="{{ $data_rkp->bidang === 'Pembangunan Desa' ? '' : 'hidden' }}">
                    <!-- Volume fields will be dynamically inserted here -->
                </div>

                <!-- Lokasi Kegiatan -->
                <div>
                    <label for="lokasi_kegiatan" class="block text-sm font-medium text-gray-700">Lokasi Kegiatan</label>
                    <textarea name="lokasi_kegiatan" required placeholder="Masukkan Lokasi Kegiatan"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ $data_rkp->lokasi_kegiatan }}</textarea>
                </div>

                <!-- Sasaran Manfaat -->
                <div>
                    <label for="sasaran_manfaat" class="block text-sm font-medium text-gray-700">Sasaran Manfaat</label>
                    <input type="text" name="sasaran_manfaat" required placeholder="Masukkan Sasaran Manfaat" value="{{ $data_rkp->sasaran_manfaat }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Tanggal Awal dan Akhir -->
                <div>
                    <label for="tanggal_awal" class="block text-sm font-medium text-gray-700">Tanggal Dimulai</label>
                    <input type="date" name="tanggal_awal" required value="{{ $data_rkp->tanggal_mulai }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="tanggal_akhir" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                    <input type="date" name="tanggal_akhir" required value="{{ $data_rkp->tanggal_selesai }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Jumlah dan Sumber Biaya -->
                <div>
                    <label for="jumlah_biaya" class="block text-sm font-medium text-gray-700">Jumlah Biaya</label>
                    <input type="text" name="jumlah_biaya" required placeholder="Masukkan Jumlah Biaya" value="{{ $data_rkp->jumlah_biaya }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="sumber_biaya" class="block text-sm font-medium text-gray-700">Sumber Biaya</label>
                    <input type="text" name="sumber_biaya" required placeholder="Masukkan Sumber Biaya" value="{{ $data_rkp->sumber_biaya }}"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Swakelola, Kerjasama Antar Desa, Pihak Ketiga -->
                <div>
                    <label for="swakelola" class="form-label">Swakelola:</label>
                    <input type="hidden" name="swakelola" value="0">
                    <input type="checkbox" name="swakelola" value="1" {{ $data_rkp->swakelola ? 'checked' : '' }}
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="kerjasama_desa" class="form-label">Kerjasama Antar Desa:</label>
                    <input type="hidden" name="kerjasama_desa" value="0">
                    <input type="checkbox" name="kerjasama_desa" value="1" {{ $data_rkp->kerjasama_desa ? 'checked' : '' }}
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="pihak_ketiga" class="form-label">Kerjasama Pihak Ketiga:</label>
                    <input type="hidden" name="pihak_ketiga" value="0">
                    <input type="checkbox" name="pihak_ketiga" value="1" {{ $data_rkp->pihak_ketiga ? 'checked' : '' }}
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <!-- Rencana Pelaksana Kegiatan -->
                <div>
                    <label for="rencana_pelaksana_kegiatan" class="block text-sm font-medium text-gray-700">Rencana Pelaksana Kegiatan</label>
                    <select name="rencana_pelaksana_kegiatan" required
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @foreach ($data_aparat as $data)
                        <option value="{{ $data->nama }}" {{ $data_rkp->rencana_pelaksana_kegiatan == $data->nama ? 'selected' : '' }}>
                            {{ $data->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="tombol">Update</button>
            <a href="{{ route('data_rkp.index') }}" class="tombol" style="text-align: center;">Kembali</a>
        </form>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                updateVolumeFields(); // Ensure fields are displayed on page load based on the selected value
            });

            function updateVolumeFields() {
                const bidang = document.getElementById('bidang').value;
                const volumeFields = document.getElementById('volume-fields');

                if (bidang === 'Pembangunan Desa') {
                    volumeFields.innerHTML = `
                <label for="volume" class="block text-sm font-medium text-gray-700">Volume</label>
                <input type="text" name="volume" placeholder="Masukkan Volume" value="{{ $volume }}"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <label for="satuan" class="block text-sm font-medium text-gray-700">Satuan</label>
                <input type="text" name="satuan" placeholder="Masukkan Satuan" value="{{ $satuan }}"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            `;
                    volumeFields.classList.remove('hidden');
                } else {
                    volumeFields.innerHTML = `
                <label for="volume" class="block text-sm font-medium text-gray-700">Banyak Peserta</label>
                <input type="text" name="volume" placeholder="Masukkan Banyak Peserta" value="{{ $data_rkp->volume }}"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            `;
                volumeFields.classList.remove('hidden');
                }
            }
        </script>


</body>

</html>