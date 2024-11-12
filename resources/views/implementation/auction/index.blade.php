@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white"> Data Pelaksanaan Secara Lelang</h2>


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
                                    Ketua TPK</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Bidang</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Nilai HPS</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    tanggal Pengumuman</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($auction_announcements as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> rkp_data -> activity_name}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> announcement_time}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> registration_time}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> submission_time}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> decision_time }}</td>
                                <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <button type="button"
                                        class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                        title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('auction_announcements.edit', $data->id) }}"
                                        class="mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('auction_announcements.destroy', $data->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('auction_announcements.pdf', ['id' => $data->id, 'rkp_id' => $data->rkp_id]) }}"
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
                            Tambah Data Pelaksanaan Secara Lelang
                        </h5>
                        <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-6">
                        <form id="dataForm" action="{{ route('auction_announcements.store') }}" method="POST">
                            @csrf

                            <div>
                                <label for="rkp_id" class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                                <select name="rkp_id"
                                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    @foreach ($rkp_data as $data)
                                    <option value="{{ $data->id }}">{{ $data->activity_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Group 1: Pengumuman -->
                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">Pengumuman</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="mb-4">
                                        <label for="date_announcement" class="block text-sm font-medium text-gray-700">Tanggal Pengumuman</label>
                                        <input type="date" id="date_announcement" name="date_announcement" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="time_announcement" class="block text-sm font-medium text-gray-700">Waktu Pengumuman</label>
                                        <input type="time" id="time_announcement" name="time_announcement" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="place_announcement" class="block text-sm font-medium text-gray-700">Tempat Pengumuman</label>
                                        <input type="text" id="place_announcement" name="place_announcement" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Group 2: Pendaftaran -->
                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">Pendaftaran</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="mb-4">
                                        <label for="date_registration" class="block text-sm font-medium text-gray-700">Tanggal Pendaftaran</label>
                                        <input type="date" id="date_registration" name="date_registration" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="time_registration" class="block text-sm font-medium text-gray-700">Waktu Pendaftaran</label>
                                        <input type="time" id="time_registration" name="time_registration" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="place_registration" class="block text-sm font-medium text-gray-700">Tempat Pendaftaran</label>
                                        <input type="text" id="place_registration" name="place_registration" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Group 3: Pemasukan -->
                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">Pemasukan</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="mb-4">
                                        <label for="date_income" class="block text-sm font-medium text-gray-700">Tanggal Pemasukan</label>
                                        <input type="date" id="date_income" name="date_income" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="time_income" class="block text-sm font-medium text-gray-700">Waktu Pemasukan</label>
                                        <input type="time" id="time_income" name="time_income" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="place_income" class="block text-sm font-medium text-gray-700">Tempat Pemasukan</label>
                                        <input type="text" id="place_income" name="place_income" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Group 4: Evaluasi -->
                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">Evaluasi</legend>
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

                            <!-- Group 5: Negosiasi -->
                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">Negosiasi</legend>
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

                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">penepatan</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="mb-4">
                                        <label for="date_placement" class="block text-sm font-medium text-gray-700">Tanggal penepatan</label>
                                        <input type="date" id="date_placement" name="date_placement" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="time_placement" class="block text-sm font-medium text-gray-700">Waktu penepatan</label>
                                        <input type="time" id="time_placement" name="time_placement" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="place_placement" class="block text-sm font-medium text-gray-700">Tempat penepatan</label>
                                        <input type="text" id="place_placement" name="place_placement" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                </div>
                            </fieldset>
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








        @foreach($auction_announcements as $data)




        <div class="modal fade" id="lihat{{ $data->id }}" tabindex="-1" aria-labelledby="lihatLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatLabel{{ $data->id }}">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('auction_announcements.show', $data->id) }}" method="get" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Nama Kegiatan</label>
                                <p class="isi-lihat">{{ $data->rkp_data->activity_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ketua TPK</label>
                                <p class="isi-lihat">{{ $data->announcement->tpk_data->head_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sekertaris TPK</label>
                                <p class="isi-lihat">{{ $data->announcement->tpk_data->secretary_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Anggota TPK</label>
                                <p class="isi-lihat">{{ $data->announcement->tpk_data->member_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lokasi Kegiatan</label>
                                <p class="isi-lihat">{{ $data->rkp_data->activity_location }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Bidang</label>
                                <p class="isi-lihat">{{ $data->rkp_data->field }}</p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Waktu Pelaksanaan</label>
                                <p class="isi-lihat">{{ $data->rkp_data->implementation_time }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Pengumuman</label>
                                <p class="isi-lihat">{{ $data->announcement_time }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Pendaftaran</label>
                                <p class="isi-lihat">{{ $data->registration_time }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Pemasukan</label>
                                <p class="isi-lihat">{{ $data->submission_time }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Evaluasi</label>
                                <p class="isi-lihat">{{ $data->evaluation_time }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Negosiasi</label>
                                <p class="isi-lihat">{{ $data->negotiation_time }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Penetapan</label>
                                <p class="isi-lihat">{{ $data->decision_time }}</p>
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




        @endsection