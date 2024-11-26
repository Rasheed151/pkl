@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Data RKP Desa</h2>


                    <!-- Tambah Data -->
                    <button type="button"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        data-bs-toggle="modal" data-bs-target="#staticModal">
                        Tambah Data
                    </button>
                </div>

                <div class="overflow-x-auto">

                    <table
                        class="min-w-full text-left text-sm text-gray-500 dark:text-gray-400 border-separate border-spacing-0 border border-gray-200 dark:border-gray-700">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Bidang Kegiatan
                                </th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Sub Bidang</th>
                                </th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Nama Kegiatan</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Lokasi Kegiatan</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Swakelola</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Pelaksana Kegiatan</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rkp_data as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> field}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> sub_field}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> activity_name}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> activity_location}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> self_management ? 'ya' : 'tidak'}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> officials_data -> name}}</td>
                                <td class="px-4 py-10 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <button type="button"
                                        class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                        title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('rkp_data.edit', $data->id) }}"
                                        class=" py-4 mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('rkp_data.destroy', $data->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="  py-4 mx-0 text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('rkp.pdf', Auth::id()) }}"
                        class="mt-5 block w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Cetak Data RKP Tahun Ini
                    </a>
                </div>
            </div>
        </div>













        <div class="modal fade" id="staticModal" tabindex="-1" aria-labelledby="staticModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-white shadow-2xl rounded-xl">
                    <div class="modal-header border-b border-gray-200 py-4 px-6">
                        <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">Tambah Data RKP</h5>
                        <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-6">
                        <form id="dataForm" action="{{ route('rkp_data.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Dropdown Bidang Kegiatan -->
                                <div>
                                    <label for="field" class="block text-sm font-medium text-gray-700">Bidang Kegiatan</label>
                                    <select id="field" name="field" onchange="updateVolumeFields()"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <option value="" disabled selected>Pilih Bidang Kegiatan</option>
                                        <option value="Pemerintahan Desa">Pemerintahan Desa</option>
                                        <option value="Pembangunan Desa">Pembangunan Desa</option>
                                        <option value="Pembinaan Kemasyarakatan">Pembinaan Kemasyarakatan</option>
                                        <option value="Pemberdayaan Masyarakat">Pemberdayaan Masyarakat</option>
                                    </select>
                                </div>

                                <!-- Sub Bidang -->
                                <div>
                                    <label for="sub_field" class="block text-sm font-medium text-gray-700">Sub Bidang</label>
                                    <input type="text" name="sub_field" placeholder="Masukkan Sub Bidang"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- Nama Kegiatan -->
                                <div>
                                    <label for="activity_name" class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                                    <input type="text" name="activity_name" placeholder="Masukkan Nama Kegiatan"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- Volume Fields (Dynamically updated) -->
                                <div id="volume-fields" class="hidden">
                                    <!-- Volume fields will be dynamically inserted here -->
                                </div>

                                <!-- Lokasi Kegiatan -->
                                <div>
                                    <label for="activity_location" class="block text-sm font-medium text-gray-700">Lokasi Kegiatan</label>
                                    <textarea name="activity_location" placeholder="Masukkan Lokasi Kegiatan"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                </div>

                                <!-- Sasaran Manfaat -->
                                <div>
                                    <label for="benefit_target" class="block text-sm font-medium text-gray-700">Sasaran Manfaat</label>
                                    <input type="text" name="benefit_target" placeholder="Masukkan Sasaran Manfaat"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- Tanggal Awal dan Akhir -->
                                <div>
                                    <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Dimulai</label>
                                    <input type="date" name="start_date"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                                    <input type="date" name="end_date"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- Jumlah dan Sumber Biaya -->
                                <div>
                                    <label for="total_cost" class="block text-sm font-medium text-gray-700">Jumlah Biaya</label>
                                    <input type="number" name="total_cost" placeholder="Masukkan Jumlah Biaya"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="funding_source" class="block text-sm font-medium text-gray-700">Sumber Biaya</label>
                                    <input type="text" name="funding_source" placeholder="Masukkan Sumber Biaya"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="self_management" class="form-label">Swakelola:</label>
                                    <input type="hidden" name="self_management" value="0">
                                    <input type="checkbox" name="self_management" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="1">
                                </div>
                                <div>
                                    <label for="village_cooperation" class="form-label">Kerjasama Antar Desa:</label>
                                    <input type="hidden" name="village_cooperation" value="0">
                                    <input type="checkbox" name="village_cooperation" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="1">
                                </div>
                                <div>
                                    <label for="third_party" class="form-label">Kerjasama Pihak Ketiga:</label>
                                    <input type="hidden" name="third_party" value="0">
                                    <input type="checkbox" name="third_party" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="1">
                                </div>

                                <!-- Rencana Pelaksana Kegiatan -->
                                <div>
                                    <label for="officials_id" class="block text-sm font-medium text-gray-700">Rencana Pelaksana Kegiatan</label>
                                    <select name="officials_id"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        @foreach ($officials_data as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <p id="errorMessage" class="text-red-500 mt-2 hidden">Harap lengkapi data terlebih dahulu!</p>
                            <div class="modal-footer border-t border-gray-200 py-4 px-6">
                                <button type="submit" class="btn btn-primary bg-blue-500 text-white hover:bg-blue-600">Simpan</button>
                                <button type="button" class="btn btn-secondary text-gray-700 bg-gray-200 hover:bg-gray-300"
                                    data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                        <script>
                            document.getElementById("dataForm").addEventListener("submit", function(event) {
                                // Ambil semua input dan select dalam form
                                const inputs = this.querySelectorAll("input, select, textarea");
                                let allFilled = true;

                                // Periksa apakah ada field yang kosong
                                inputs.forEach(input => {
                                    if (input.value === "") {
                                        allFilled = false;
                                    }
                                });

                                // Jika ada field yang kosong, cegah submit dan tampilkan pesan
                                if (!allFilled) {
                                    event.preventDefault();
                                    document.getElementById("errorMessage").classList.remove("hidden");

                                    setTimeout(() => {
                                        errorMessage.classList.add("hidden");
                                    }, 3000); // 3000 ms = 3 detik
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>


        @foreach($rkp_data as $data)




        <div class="modal fade" id="lihat{{ $data->id }}" tabindex="-1" aria-labelledby="lihatLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatLabel{{ $data->id }}">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('rkp_data.show', $data->id) }}" method="get" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Bidang</label>
                                <p class="isi-lihat">{{ $data->field }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Sub Bidang</label>
                                <p class="isi-lihat">{{ $data->sub_field }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Nama Kegiatan</label>
                                <p class="isi-lihat">{{ $data->activity_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Lokasi Kegiatan</label>
                                <p class="isi-lihat">{{ $data->activity_location }}</p>
                            </div>

                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Volume</label>
                                <p class="isi-lihat">{{ $data->volume }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Sasaran Manfaat</label>
                                <p class="isi-lihat">{{ $data->benefit_target }} </p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Tanggal Mulai</label>
                                <p class="isi-lihat">{{ $data->start_date }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Tanggal Selesai</label>
                                <p class="isi-lihat">{{ $data->end_date }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Waktu Pelaksanaan</label>
                                <p class="isi-lihat">{{ $data->implementation_time }} Hari</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Jumlah Biaya</label>
                                <p class="isi-lihat">{{ $data->total_cost }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Sumber Biaya</label>
                                <p class="isi-lihat">{{ $data->funding_source }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Secara Swakelola</label>
                                <p class="isi-lihat">{{ $data->self_management ? 'ya' : 'tidak' }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Kerjasama Antar Desa</label>
                                <p class="isi-lihat">{{ $data->village_cooperation ? 'ya' : 'tidak' }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Kerjasama Pihak Ketiga</label>
                                <p class="isi-lihat">{{ $data->third_party ? 'ya' : 'tidak' }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Perencana Pelaksana Kegiatan</label>
                                <p class="isi-lihat">{{ $data->officials_data->name }}</p>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <script>
            function updateVolumeFields() {
                const field = document.getElementById('field').value;
                const volumeFields = document.getElementById('volume-fields');

                if (field === 'Pemerintahan Desa') {
                    volumeFields.innerHTML = `
                <label for="volume" class="block text-sm font-medium text-gray-700">Volume</label>
                <input type="number" name="volume" placeholder="Berapa Lama Kegiatan Berlangsung(Bulan)"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                 <input type="hidden" id="unit" name="unit" value="Bulan">
            `;
                    volumeFields.classList.remove('hidden');
                } else if (field === 'Pembangunan Desa') {
                    volumeFields.innerHTML = `
                <label for="volume" class="block text-sm font-medium text-gray-700">Volume</label>
                <input type="number" name="volume" placeholder="Volume Dari Pembangunan(Meter)"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                 <input type="hidden" id="unit" name="unit" value="Meter">
            `;
                    volumeFields.classList.remove('hidden');
                } else if (field === 'Pembinaan Kemasyarakatan') {
                    volumeFields.innerHTML = `
                <label for="volume" class="block text-sm font-medium text-gray-700">Volume</label>
                <input type="number" name="volume" placeholder="Jumlah Dari Permbinaan(paket)"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                 <input type="hidden" id="unit" name="unit" value="Paket">
            `;
                    volumeFields.classList.remove('hidden');
                } else {
                    volumeFields.innerHTML = `
                <label for="volume" class="block text-sm font-medium text-gray-700">Volume</label>
                <input type="number" name="volume" placeholder="Jumlah Dari Perberdayaan (Unit)"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                 <input type="hidden" id="unit" name="unit" value="Unit">
            `;
                    volumeFields.classList.remove('hidden');
                }


                // Display the volume fields section
                volumeFields.classList.remove('hidden');
            }
        </script>





        @endsection