@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white"> Data Pelaksanaan Secara Lelang untuk Kegiatan {{ $nama_kegiatan}}</h2>


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
                            @foreach ($pengumuman_lelang as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> nama_kegiatan}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> ketua_tpk}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> bidang}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> total_nilai_hps}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> waktu_pengumuman}}</td>
                                <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <button type="button"
                                        class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                        title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('pengumuman_lelang.edit', $data->id,$kegiatanId) }}"
                                        class="mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pengumuman_lelang.destroy', $data->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('pengumuman_lelang.pdf', $data->id) }}"
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
                        <form action="{{ route('pengumuman_lelang.store') }}" method="POST">
                            @csrf
                            <!-- Group 1: Pengumuman -->
                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">Pengumuman</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="mb-4">
                                        <label for="tanggal_pengumuman" class="block text-sm font-medium text-gray-700">Tanggal Pengumuman</label>
                                        <input type="date" id="tanggal_pengumuman" name="tanggal_pengumuman" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="waktu_pengumuman" class="block text-sm font-medium text-gray-700">Waktu Pengumuman</label>
                                        <input type="time" id="waktu_pengumuman" name="waktu_pengumuman" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="tempat_pengumuman" class="block text-sm font-medium text-gray-700">Tempat Pengumuman</label>
                                        <input type="text" id="tempat_pengumuman" name="tempat_pengumuman" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Group 2: Pendaftaran -->
                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">Pendaftaran</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="mb-4">
                                        <label for="tanggal_pendaftaran" class="block text-sm font-medium text-gray-700">Tanggal Pendaftaran</label>
                                        <input type="date" id="tanggal_pendaftaran" name="tanggal_pendaftaran" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="waktu_pendaftaran" class="block text-sm font-medium text-gray-700">Waktu Pendaftaran</label>
                                        <input type="time" id="waktu_pendaftaran" name="waktu_pendaftaran" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="tempat_pendaftaran" class="block text-sm font-medium text-gray-700">Tempat Pendaftaran</label>
                                        <input type="text" id="tempat_pendaftaran" name="tempat_pendaftaran" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Group 3: Pemasukan -->
                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">Pemasukan</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="mb-4">
                                        <label for="tanggal_pemasukan" class="block text-sm font-medium text-gray-700">Tanggal Pemasukan</label>
                                        <input type="date" id="tanggal_pemasukan" name="tanggal_pemasukan" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="waktu_pemasukan" class="block text-sm font-medium text-gray-700">Waktu Pemasukan</label>
                                        <input type="time" id="waktu_pemasukan" name="waktu_pemasukan" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="tempat_pemasukan" class="block text-sm font-medium text-gray-700">Tempat Pemasukan</label>
                                        <input type="text" id="tempat_pemasukan" name="tempat_pemasukan" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Group 4: Evaluasi -->
                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">Evaluasi</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="mb-4">
                                        <label for="tanggal_evaluasi" class="block text-sm font-medium text-gray-700">Tanggal Evaluasi</label>
                                        <input type="date" id="tanggal_evaluasi" name="tanggal_evaluasi" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="waktu_evaluasi" class="block text-sm font-medium text-gray-700">Waktu Evaluasi</label>
                                        <input type="time" id="waktu_evaluasi" name="waktu_evaluasi" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="tempat_evaluasi" class="block text-sm font-medium text-gray-700">Tempat Evaluasi</label>
                                        <input type="text" id="tempat_evaluasi" name="tempat_evaluasi" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Group 5: Negosiasi -->
                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">Negosiasi</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="mb-4">
                                        <label for="tanggal_negosiasi" class="block text-sm font-medium text-gray-700">Tanggal Negosiasi</label>
                                        <input type="date" id="tanggal_negosiasi" name="tanggal_negosiasi" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="waktu_negosiasi" class="block text-sm font-medium text-gray-700">Waktu Negosiasi</label>
                                        <input type="time" id="waktu_negosiasi" name="waktu_negosiasi" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="tempat_negosiasi" class="block text-sm font-medium text-gray-700">Tempat Negosiasi</label>
                                        <input type="text" id="tempat_negosiasi" name="tempat_negosiasi" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="border p-4 mb-4 rounded-lg">
                                <legend class="text-lg font-bold text-gray-700 mb-2">penepatan</legend>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="mb-4">
                                        <label for="tanggal_penepatan" class="block text-sm font-medium text-gray-700">Tanggal penepatan</label>
                                        <input type="date" id="tanggal_penepatan" name="tanggal_penepatan" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="waktu_penepatan" class="block text-sm font-medium text-gray-700">Waktu penepatan</label>
                                        <input type="time" id="waktu_penepatan" name="waktu_penepatan" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="tempat_penepatan" class="block text-sm font-medium text-gray-700">Tempat penepatan</label>
                                        <input type="text" id="tempat_penepatan" name="tempat_penepatan" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                </div>
                            </fieldset>

                            <input type="hidden" name="kegiatanId" value="{{ $kegiatanId }}">

                            <!-- Submit Button -->
                            <div class="flex justify-end mt-6">
                                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>








        @foreach($pengumuman_lelang as $data)




        <div class="modal fade" id="lihat{{ $data->id }}" tabindex="-1" aria-labelledby="lihatLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatLabel{{ $data->id }}">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('pengumuman_lelang.show', $data->id) }}" method="get" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Nama Kegiatan</label>
                                <p class="isi-lihat">{{ $data->nama_kegiatan }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ketua TPK</label>
                                <p class="isi-lihat">{{ $data->ketua_tpk }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sekertaris TPK</label>
                                <p class="isi-lihat">{{ $data->sekertaris_tpk }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Anggota TPK</label>
                                <p class="isi-lihat">{{ $data->anggota_tpk }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lokasi Kegiatan</label>
                                <p class="isi-lihat">{{ $data->lokasi_kegiatan }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Bidang</label>
                                <p class="isi-lihat">{{ $data->bidang }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total Nilai HPS</label>
                                <p class="isi-lihat">{{ number_format($data->total_nilai_hps, 0, ',', '.') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Pelaksanaan</label>
                                <p class="isi-lihat">{{ $data->waktu_pelaksanaan }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Pengumuman</label>
                                <p class="isi-lihat">{{ $data->waktu_pengumuman }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Pendaftaran</label>
                                <p class="isi-lihat">{{ $data->waktu_pendaftaran }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Pemasukan</label>
                                <p class="isi-lihat">{{ $data->waktu_pemasukan }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Evaluasi</label>
                                <p class="isi-lihat">{{ $data->waktu_evaluasi }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Negosiasi</label>
                                <p class="isi-lihat">{{ $data->waktu_negosiasi }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Penetapan</label>
                                <p class="isi-lihat">{{ $data->waktu_penepatan }}</p>
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