@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Harga Perkiraan Sendiri (HPS) untuk Kegiatan {{ $nama_kegiatan}}</h2>


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
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Nama Barang/Jasa
                                </th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Spesifikasi</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Volume</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Satuan</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Harga Satuan</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Jumlah Harga</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_perkiraan as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> nama}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> spesifikasi}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> volume}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> satuan}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> harga_satuan}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> jumlah_harga}}</td>
                                <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <a href="#"
                                        class="mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('data_perkiraan.destroy', $data->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button"
                        class=" mt-5 block w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 "
                        data-bs-toggle="modal" data-bs-target="#staticModal">
                        Cetak Data
                    </button>
                </div>
            </div>
        </div>













        <div class="modal fade" id="staticModal" tabindex="-1" aria-labelledby="staticModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-white shadow-2xl rounded-xl">
                    <div class="modal-header border-b border-gray-200 py-4 px-6">
                        <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">Tambah Data Harga Perkiraan Sendiri (HPS)</h5>
                        <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-6">
                        <form action="{{ route('data_perkiraan.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Nama Kegiatan -->
                                <input type="hidden" name="kegiatanId" value="{{ $kegiatanId }}">

                                <div>
                                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Barang/Jasa</label>
                                    <input type="text" name="nama" placeholder="Masukkan Nama Barang/Jasa"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="spesifikasi" class="block text-sm font-medium text-gray-700">Spesifikasi</label>
                                    <input type="text" name="spesifikasi" placeholder="Masukkan Spesifikasi"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="volume" class="block text-sm font-medium text-gray-700">volume</label>
                                    <input type="text" name="volume" placeholder="Masukkan volume"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="satuan" class="block text-sm font-medium text-gray-700">satuan</label>
                                    <input type="text" name="satuan" placeholder="Masukkan satuan"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="harga_satuan" class="block text-sm font-medium text-gray-700">Harga Satuan</label>
                                    <input type="text" name="harga_satuan" placeholder="Masukkan Harga Satuan"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                            </div>
                            <div class="modal-footer border-t border-gray-200 py-4 px-6">
                                <button type="button" class="btn btn-secondary text-gray-700 bg-gray-200 hover:bg-gray-300"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary bg-blue-500 text-white hover:bg-blue-600">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>



        @endsection