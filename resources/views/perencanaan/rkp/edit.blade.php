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
            resize: none; /* Prevent resizing on textarea */
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

            <div class="form-field">
                <label for="bidang">Bidang Kegiatan</label>
                <select id="bidang" name="bidang" class="mt-2" onchange="updateFields(this.value)">
                    <option value="" disabled>Pilih Bidang Kegiatan</option>
                    <option value="Pemerintahan Desa" {{ $data_rkp->bidang == 'Pemerintahan Desa' ? 'selected' : '' }}>Pemerintahan Desa</option>
                    <option value="Pembangunan Desa" {{ $data_rkp->bidang == 'Pembangunan Desa' ? 'selected' : '' }}>Pembangunan Desa</option>
                    <option value="Pembinaan Kemasyarakatan" {{ $data_rkp->bidang == 'Pembinaan Kemasyarakatan' ? 'selected' : '' }}>Pembinaan Kemasyarakatan</option>
                    <option value="Pemberdayaan Masyarakat" {{ $data_rkp->bidang == 'Pemberdayaan Masyarakat' ? 'selected' : '' }}>Pemberdayaan Masyarakat</option>
                </select>
            </div>

            <div class="form-field">
                <label for="sub_bidang">Sub Bidang</label>
                <select id="sub_bidang" name="sub_bidang" class="mt-2">
                    <option value="" disabled>Pilih Sub Bidang Kegiatan</option>
                </select>
            </div>

            <div class="form-field">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan', $data_rkp->nama_kegiatan) }}" required placeholder="Masukkan Nama Kegiatan">
            </div>

            <div class="form-field">
                <label for="lokasi_kegiatan">Lokasi Kegiatan</label>
                <textarea name="lokasi_kegiatan" required placeholder="Masukkan Lokasi Kegiatan">{{ old('lokasi_kegiatan', $data_rkp->lokasi_kegiatan) }}</textarea>
            </div>

            <div id="volume-fields" class="hidden">
                <!-- Volume fields will be dynamically inserted here -->
            </div>

            <div class="form-field">
                <label for="sasaran_manfaat">Sasaran Manfaat</label>
                <input type="text" name="sasaran_manfaat" value="{{ old('sasaran_manfaat', $data_rkp->sasaran_manfaat) }}" required placeholder="Masukkan nama Sasaran Manfaat">
            </div>

            <div class="form-field">
                <label for="waktu_pelaksanaan">Waktu Pelaksanaan</label>
                <input type="date" name="waktu_pelaksanaan" value="{{ old('waktu_pelaksanaan', $data_rkp->waktu_pelaksanaan) }}" required>
            </div>

            <div class="form-field">
                <label for="jumlah_biaya">Jumlah Biaya</label>
                <input type="text" name="jumlah_biaya" value="{{ old('jumlah_biaya', $data_rkp->jumlah_biaya) }}" required placeholder="Masukkan Jumlah Biaya">
            </div>

            <div class="form-field">
                <label for="sumber_biaya">Sumber Biaya</label>
                <input type="text" name="sumber_biaya" value="{{ old('sumber_biaya', $data_rkp->sumber_biaya) }}" required placeholder="Masukkan Sumber Biaya">
            </div>

            <div class="form-field">
                <label for="swakelola">Swakelola</label>
                <input type="checkbox" name="swakelola" value="1" {{ $data_rkp->swakelola ? 'checked' : '' }}>
            </div>

            <div class="form-field">
                <label for="kerjasama_desa">Kerjasama Desa</label>
                <input type="checkbox" name="kerjasama_desa" value="1" {{ $data_rkp->kerjasama_desa ? 'checked' : '' }}>
            </div>

            <div class="form-field">
                <label for="pihak_ketiga">Pihak Ketiga</label>
                <input type="checkbox" name="pihak_ketiga" value="1" {{ $data_rkp->pihak_ketiga ? 'checked' : '' }}>
            </div>

            <div class="form-field">
                <label for="rencana_pelaksana_kegiatan">Pelaksana Kegiatan</label>
                <input type="text" name="rencana_pelaksana_kegiatan" value="{{ old('rencana_pelaksana_kegiatan', $data_rkp->rencana_pelaksana_kegiatan) }}" required placeholder="Masukkan Pelaksana Kegiatan">
            </div>

            <button type="submit" class="tombol">Update</button>
        </form>

        <script>
            const subBidangOptions = {
                "Pemerintahan Desa": [
                    "Sub Bidang Pemerintahan Desa 1",
                    "Sub Bidang Pemerintahan Desa 2"
                ],
                "Pembangunan Desa": [
                    "Sub Bidang Pembangunan Desa 1",
                    "Sub Bidang Pembangunan Desa 2"
                ],
                "Pembinaan Kemasyarakatan": [
                    "Sub Bidang Pembinaan 1",
                    "Sub Bidang Pembinaan 2"
                ],
                "Pemberdayaan Masyarakat": [
                    "Sub Bidang Pemberdayaan 1",
                    "Sub Bidang Pemberdayaan 2"
                ]
            };

            function updateFields(bidang) {
                const subBidangSelect = document.getElementById('sub_bidang');
                const volumeFieldsDiv = document.getElementById('volume-fields');
                volumeFieldsDiv.innerHTML = ""; // Clear existing fields

                // Populate sub bidang options
                subBidangSelect.innerHTML = '<option value="" disabled selected>Pilih Sub Bidang Kegiatan</option>';
                subBidangOptions[bidang].forEach(option => {
                    subBidangSelect.innerHTML += `<option value="${option}">${option}</option>`;
                });

                // Display volume fields based on selection
                if (bidang === "Pembangunan Desa") {
                    volumeFieldsDiv.innerHTML = `
                        <div class="form-field">
                            <label for="volume">Volume Kegiatan</label>
                            <input type="text" name="volume" required placeholder="Masukkan Volume Kegiatan">
                        </div>
                        <div class="form-field">
                            <label for="satuan">Satuan Volume</label>
                            <input type="text" name="satuan" required placeholder="Masukkan Satuan Volume">
                        </div>
                    `;
                }else{
                    volumeFieldsDiv.innerHTML = `
                        <div class="form-field">
                            <label for="volume">Banyak Peserta</label>
                            <input type="text" name="volume" required placeholder="Masukkan Volume Kegiatan">
                        </div> `;
                }
                ;
            }

            // On page load, set the selected bidang and update the sub_bidang options
            document.addEventListener("DOMContentLoaded", function() {
                const selectedBidang = "{{ $data_rkp->bidang }}";
                if (selectedBidang) {
                    updateFields(selectedBidang);
                    // Set selected sub_bidang if applicable
                    const subBidangSelect = document.getElementById('sub_bidang');
                    subBidangSelect.value = "{{ $data_rkp->sub_bidang }}"; // Set the existing value
                }
            });
        </script>
    </div>
</body>

</html>
