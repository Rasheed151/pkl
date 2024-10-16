@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Data Pengumuman Acara Desa</h2>


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
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Cara Pengadaan
                                </th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Lokasi Kegiatan</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Nama TPK</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Waktu Pelaksanaan</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengumuman as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> data_rkp -> nama_kegiatan}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> cara_pengadaan}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> data_rkp -> lokasi_kegiatan }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> data_tpk -> nama}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> tanggal}}</td>
                                <td class="px-4 py-10 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <button type="button"
                                        class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                        title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('pengumuman.edit', $data->id) }}"
                                        class="mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pengumuman.destroy', $data->id) }}" method="POST" style="display:inline;">
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
                    <a href="{{ route('pengumuman.pdf', Auth::id()) }}"
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
                        <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">Tambah Data Pengumuman Acara Desa
                            Tambah Data
                        </h5>
                        <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-6">
                        <form action="{{ route('pengumuman.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Nama -->
                                <div>
                                    <label for="kegiatanId" class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                                    <select name="kegiatanId" required
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        @foreach ($data_rkp as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_kegiatan }}</option>
                                        @endforeach
                                    </select>
                                </div>




                                <div>
                                    <label for="cara_pengadaan" class="block text-sm font-medium text-gray-700">Cara Pengadaan</label>
                                    <select id="cara_pengadaan" name="cara_pengadaan"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <option value="" disabled selected>Tentukan Cara Penggunaan</option>
                                        <option value="Swakelola">Swakelola</option>
                                        <option value="Penyedia">Penyedia</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="tpkId" class="block text-sm font-medium text-gray-700">nama TPK</label>
                                    <select name="tpkId" required
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        @foreach ($data_tpk as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Dimulai</label>
                                    <input type="date" name="tanggal" required placeholder="Masukkan  Nama Kegiatan"
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

















        @foreach($pengumuman as $data)




        <div class="modal fade" id="lihat{{ $data->id }}" tabindex="-1" aria-labelledby="lihatLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatLabel{{ $data->id }}">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('pengumuman.show', $data->id) }}" method="get" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Nama Kegiatan</label>
                                <p class="isi-lihat">{{ $data-> data_rkp -> nama_kegiatan }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Jumlah Biaya</label>
                                <p class="isi-lihat">{{ $data-> data_rkp -> jumlah_biaya }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Cara Pengadaan</label>
                                <p class="isi-lihat">{{ $data->cara_pengadaan }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Volume</label>
                                <p class="isi-lihat">{{ $data-> data_rkp -> volume }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Nama TPK</label>
                                <p class="isi-lihat">{{ $data-> data_tpk -> nama }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Lokasi Kegiatan</label>
                                <p class="isi-lihat">{{ $data-> data_rkp -> lokasi_kegiatan }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Tanggal</label>
                                <p class="isi-lihat">{{ $data->tanggal }}</p>
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