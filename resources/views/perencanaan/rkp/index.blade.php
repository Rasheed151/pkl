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
                            @foreach ($data_rkp as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> bidang}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> sub_bidang}}</td>

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> nama_kegiatan}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> lokasi_kegiatan}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> swakelola ? 'ya' : 'tidak'}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> rencana_pelaksana_kegiatan}}</td>
                                <td class="px-4 py-10 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <button type="button"
                                        class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                        title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('data_rkp.edit', $data->id) }}"
                                        class=" py-4 mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('data_rkp.destroy', $data->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="  py-4 mx-0 text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400" onclick="return confirm('Yakin ingin menghapus?')">
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
                        <form action="{{ route('data_rkp.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Dropdown Bidang Kegiatan -->
                                <div>
                                    <label for="bidang" class="block text-sm font-medium text-gray-700">Bidang Kegiatan</label>
                                    <select id="bidang" name="bidang" onchange="updateVolumeFields()"
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
                                    <label for="sub_bidang" class="block text-sm font-medium text-gray-700">Sub Bidang</label>
                                    <input type="text" name="sub_bidang" required placeholder="Masukkan Sub Bidang"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- Nama Kegiatan -->
                                <div>
                                    <label for="nama_kegiatan" class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                                    <input type="text" name="nama_kegiatan" required placeholder="Masukkan Nama Kegiatan"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- Volume Fields (Dynamically updated) -->
                                <div id="volume-fields" class="hidden">
                                    <!-- Volume fields will be dynamically inserted here -->
                                </div>

                                <!-- Lokasi Kegiatan -->
                                <div>
                                    <label for="lokasi_kegiatan" class="block text-sm font-medium text-gray-700">Lokasi Kegiatan</label>
                                    <textarea name="lokasi_kegiatan" required placeholder="Masukkan Lokasi Kegiatan"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                </div>

                                <!-- Sasaran Manfaat -->
                                <div>
                                    <label for="sasaran_manfaat" class="block text-sm font-medium text-gray-700">Sasaran Manfaat</label>
                                    <input type="text" name="sasaran_manfaat" required placeholder="Masukkan Sasaran Manfaat"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- Tanggal Awal dan Akhir -->
                                <div>
                                    <label for="tanggal_awal" class="block text-sm font-medium text-gray-700">Tanggal Dimulai</label>
                                    <input type="date" name="tanggal_awal" required
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="tanggal_akhir" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_akhir" required
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- Jumlah dan Sumber Biaya -->
                                <div>
                                    <label for="jumlah_biaya" class="block text-sm font-medium text-gray-700">Jumlah Biaya</label>
                                    <input type="text" name="jumlah_biaya" required placeholder="Masukkan Jumlah Biaya"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="sumber_biaya" class="block text-sm font-medium text-gray-700">Sumber Biaya</label>
                                    <input type="text" name="sumber_biaya" required placeholder="Masukkan Sumber Biaya"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="swakelola" class="form-label">Swakelola:</label>
                                    <input type="hidden" name="swakelola" value="0">
                                    <input type="checkbox" name="swakelola" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="1">
                                </div>
                                <div>
                                    <label for="kerjasama_desa" class="form-label">Kerjasama Antar Desa:</label>
                                    <input type="hidden" name="kerjasama_desa" value="0">
                                    <input type="checkbox" name="kerjasama_desa" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="1">
                                </div>
                                <div>
                                    <label for="pihak_ketiga" class="form-label">Kerjasama Pihak Ketiga:</label>
                                    <input type="hidden" name="pihak_ketiga" value="0">
                                    <input type="checkbox" name="pihak_ketiga" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="1">
                                </div>

                                <!-- Rencana Pelaksana Kegiatan -->
                                <div>
                                    <label for="rencana_pelaksana_kegiatan" class="block text-sm font-medium text-gray-700">Rencana Pelaksana Kegiatan</label>
                                    <select name="rencana_pelaksana_kegiatan" required
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        @foreach ($data_aparat as $data)
                                        <option value="{{ $data->nama }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="modal-footer border-t border-gray-200 py-4 px-6">
                                <button type="submit" class="btn btn-primary bg-blue-500 text-white hover:bg-blue-600">Simpan</button>
                                <button type="button" class="btn btn-secondary text-gray-700 bg-gray-200 hover:bg-gray-300"
                                    data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @foreach($data_rkp as $data)




        <div class="modal fade" id="lihat{{ $data->id }}" tabindex="-1" aria-labelledby="lihatLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatLabel{{ $data->id }}">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('data_pka.show', $data->id) }}" method="get" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Bidang</label>
                                <p class="isi-lihat">{{ $data->bidang }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Sub Bidang</label>
                                <p class="isi-lihat">{{ $data->sub_bidang }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Nama Kegiatan</label>
                                <p class="isi-lihat">{{ $data->nama_kegiatan }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Lokasi Kegiatan</label>
                                <p class="isi-lihat">{{ $data->lokasi_kegiatan }}</p>
                            </div>

                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Volume</label>
                                <p class="isi-lihat">{{ $data->volume }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Sasaran Manfaat</label>
                                <p class="isi-lihat">{{ $data->sasaran_manfaat }} </p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Waktu Pelaksanaan</label>
                                <p class="isi-lihat">{{ $data->waktu_pelaksanaan }} Hari</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Jumlah Biaya</label>
                                <p class="isi-lihat">{{ $data->jumlah_biaya }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Sumber Biaya</label>
                                <p class="isi-lihat">{{ $data->sumber_biaya }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Secara Swakelola</label>
                                <p class="isi-lihat">{{ $data->swakelola ? 'ya' : 'tidak' }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Kerjasama Antar Desa</label>
                                <p class="isi-lihat">{{ $data->kerjasama_desa ? 'ya' : 'tidak' }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Kerjasama Pihak Ketiga</label>
                                <p class="isi-lihat">{{ $data->pihak_ketiga ? 'ya' : 'tidak' }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Perencana Pelaksana Kegiatan</label>
                                <p class="isi-lihat">{{ $data->rencana_pelaksana_kegiatan }}</p>
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
        const bidang = document.getElementById('bidang').value;
        const volumeFields = document.getElementById('volume-fields');

        if (bidang === 'Pembangunan Desa') {
            volumeFields.innerHTML = `
                <div>
                    <label for="volume" class="block text-sm font-medium text-gray-700">Volume</label>
                    <input type="text" name="volume" required placeholder="Masukkan jumlah Volume"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="satuan" class="block text-sm font-medium text-gray-700">Satuan Volume</label>
                    <select id="satuan" name="satuan"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="" disabled selected>Pilih Satuan</option>
                        <option value="Meter³">Meter³</option>
                        <option value="Meter Jalan">Meter Jalan</option>
                    </select>
                </div>`;
        } else {
            volumeFields.innerHTML = `
                <div>
                    <label for="volume" class="block text-sm font-medium text-gray-700">Banyak Peserta</label>
                    <input type="text" name="volume" required placeholder="Masukkan Banyak Peserta"
                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>`;
        }

        // Display the volume fields section
        volumeFields.classList.remove('hidden');
    }
</script>





        @endsection