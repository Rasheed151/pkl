@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white"> Data Pelaksanaan Secara Penawaran</h2>


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
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Nama Kegiatan
                                </th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Pembukaan Dokumen Penawaran</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Evaluasi Teknis</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Negosiasi Harga</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offer_implementation as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> rkp_data -> activity_name}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> opening_time}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> evaluation_time}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> negotiation_time}}</td>
                                <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <button type="button"
                                        class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                        title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('offer_implementation.edit', $data->id) }}"
                                        class="mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('offer_implementation.destroy', $data->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href=""
                                        class=" mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="print Data">
                                        <i class="fas fa-print"></i>
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>













        <div class="modal fade" id="staticModal" tabindex="-1" aria-labelledby="staticModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-white shadow-2xl rounded-xl">
                    <div class="modal-header border-b border-gray-200 py-4 px-6">
                        <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">
                            Tambah Data Pelaksanaan Secara Penawaran
                        </h5>
                        <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-6">
                        <form id="dataForm" action="{{ route('offer_implementation.store') }}" method="POST">
                            @csrf

                            <div>
                                <label for="rkp_id" class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                                <select name="rkp_id"
                                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @foreach ($announcement as $data)
                                    <option value="{{ $data->rkp_id }}">{{ $data->rkp_data->activity_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Group 1: Pengumuman -->
                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">Pembukaan Dokumen Penawaran</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="mb-4">
                                        <label for="date_opening" class="block text-sm font-medium text-gray-700">Tanggal Pembukaan</label>
                                        <input type="date" id="date_opening" name="date_opening" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="time_opening" class="block text-sm font-medium text-gray-700">Waktu Pembukaan</label>
                                        <input type="time" id="time_opening" name="time_opening" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="place_opening" class="block text-sm font-medium text-gray-700">Tempat Pembukaan</label>
                                        <input type="text" id="place_opening" name="place_opening" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Group 2: Pendaftaran -->
                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">Evaluasi Teknis Dan Biaya</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="mb-4">
                                        <label for="date_evaluation" class="block text-sm font-medium text-gray-700">Tanggal Evaluasi</label>
                                        <input type="date" id="date_evaluation" name="date_evaluation" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="time_evaluation" class="block text-sm font-medium text-gray-700">Waktu Evaluasi</label>
                                        <input type="time" id="time_evaluation" name="time_evaluation" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="place_evaluation" class="block text-sm font-medium text-gray-700">Tempat Evaluasi</label>
                                        <input type="text" id="place_evaluation" name="place_evaluation" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Group 3: Pemasukan -->
                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">Negosiasi Harga</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="mb-4">
                                        <label for="date_negotiation" class="block text-sm font-medium text-gray-700">Tanggal Negosiasi</label>
                                        <input type="date" id="date_negotiation" name="date_negotiation" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="time_negotiation" class="block text-sm font-medium text-gray-700">Waktu Negosiasi</label>
                                        <input type="time" id="time_negotiation" name="time_negotiation" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="place_negotiation" class="block text-sm font-medium text-gray-700">Tempat Negosiasi</label>
                                        <input type="text" id="place_negotiation" name="place_negotiation" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                </div>
                            </fieldset>
                            <div>
                                <label for="autoResize" class="block text-sm font-medium text-gray-700">Keterangan(Opsional)</label>
                                <textarea name="information" placeholder="Masukkan Keterangan"
                                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm resize-none min-h-[80px] max-h-[500px] overflow-y-auto"
                                    id="autoResize"></textarea>
                            </div>
                            <p id="errorMessage" class="text-red-500 mt-2 hidden">Harap lengkapi data terlebih dahulu!</p>
                            <!-- Submit Button -->
                            <div class="flex justify-between mt-6">
                                <button type="button" class="btn btn-secondary text-gray-700 bg-gray-200 hover:bg-gray-300"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Simpan Data
                                </button>
                            </div>
                        </form>
                        <script>
                            document.getElementById("dataForm").addEventListener("submit", function(event) {
                                // Seleksi elemen input, select, dan textarea kecuali ID 'autoResize'
                                const inputs = this.querySelectorAll("input, select, textarea:not(#autoResize)");
                                let allFilled = true;

                                // Periksa apakah ada field kosong
                                inputs.forEach(input => {
                                    console.log(`Memeriksa field ${input.name} dengan nilai: "${input.value.trim()}"`);
                                    if (input.value.trim() === "") {
                                        allFilled = false;
                                    }
                                });

                                // Jika ada field yang kosong, cegah submit dan tampilkan pesan
                                if (!allFilled) {
                                    event.preventDefault(); // Mencegah pengiriman form
                                    const errorMessage = document.getElementById("errorMessage");
                                    errorMessage.classList.remove("hidden");

                                    // Sembunyikan pesan setelah 3 detik
                                    setTimeout(() => {
                                        errorMessage.classList.add("hidden");
                                    }, 3000);
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>








        @foreach($offer_implementation as $data)




        <div class="modal fade" id="lihat{{ $data->id }}" tabindex="-1" aria-labelledby="lihatLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatLabel{{ $data->id }}">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('offer_implementation.show', $data->id) }}" method="get" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label">Waktu Pengumuman</label>
                                <p class="isi-lihat">{{ $data->rkp_data->activity_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Pemasukan Dan Pembukaan Dokumen Penawaran</label>
                                <p class="isi-lihat">{{ $data->opening_time }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Evaluasi Teknis Dan Biaya</label>
                                <p class="isi-lihat">{{ $data->evaluation_time }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Negosiasi Harga</label>
                                <p class="isi-lihat">{{ $data->negotiation_time }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan (Opsional)</label>
                                <p class="isi-lihat">{{ $data->information }}</p>
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
            const textarea = document.getElementById('autoResize');

            // Fungsi untuk menyesuaikan tinggi textarea sesuai dengan konten
            textarea.addEventListener('input', function() {
                this.style.height = 'auto'; // Reset height
                this.style.height = this.scrollHeight + 'px'; // Set height to scroll height
            });
        </script>


        @endsection