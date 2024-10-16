@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Data Jadwal</h2>


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
                                    Tanggal Mulai</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Waktu Pelaksanaan</th>
                                </th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Nilai Pengadaan</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> data_rkp -> nama_kegiatan}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> ketuaTpk -> nama}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> data_rkp -> tanggal_mulai}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> data_rkp -> waktu_pelaksanaan}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> data_rkp -> jumlah_biaya}}</td>
                                <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <button type="button"
                                        class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                        title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('jadwal.edit', $data->id) }}"
                                        class="mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('jadwal.destroy', $data->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('jadwal.pdf', $data->id) }}"
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
                        <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">Tambah Data Jadwal</h5>
                        <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-6">
                        <form action="{{ route('jadwal.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Nama -->
                                <div>
                                    <label for="kegiatanId" class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                                    <select name="kegiatanId" required
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        @foreach ($pengumuman as $data)
                                        <option value="{{ $data->data_rkp->id }}">{{ $data->data_rkp->nama_kegiatan }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="ketua_tpk" class="block text-sm font-medium text-gray-700">ketua TPK</label>
                                    <select name="ketua_tpk" required
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        @foreach ($data_tpk as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="sekertaris_tpk" class="block text-sm font-medium text-gray-700">sekertaris TPK</label>
                                    <select name="sekertaris_tpk" required
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        @foreach ($data_tpk as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="anggota_tpk" class="block text-sm font-medium text-gray-700">anggota TPK</label>
                                    <select name="anggota_tpk" required
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        @foreach ($data_tpk as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="nama_kasi" class="block text-sm font-medium text-gray-700">nama KASI</label>
                                    <select name="nama_kasi" required
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        @foreach ($data_aparat as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
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

















        @foreach($jadwal as $data)




        <div class="modal fade" id="lihat{{ $data->id }}" tabindex="-1" aria-labelledby="lihatLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatLabel{{ $data->id }}">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('jadwal.show', $data->id) }}" method="get" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Nama Kegiatan</label>
                                <p class="isi-lihat">{{ $data->data_rkp->nama_kegiatan }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Ketua TPK</label>
                                <p class="isi-lihat">{{ $data->ketuaTpk ->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Sekertaris TPK</label>
                                <p class="isi-lihat">{{ $data->sekertarisTpk ->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Anggota TPK</label>
                                <p class="isi-lihat">{{ $data->anggotaTpk ->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Waktu Pelaksanaan</label>
                                <p class="isi-lihat">{{ $data->data_rkp->waktu_pelaksanaan }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Tanggal Mulai</label>
                                <p class="isi-lihat">{{ $data->data_rkp->tanggal_mulai }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Tanggal Selesai</label>
                                <p class="isi-lihat">{{ $data->data_rkp->tanggal_selesai }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Jumlah Biaya</label>
                                <p class="isi-lihat">{{ $data->data_rkp->jumlah_biaya }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Nama KASI</label>
                                <p class="isi-lihat">{{ $data->dataAparat->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Jabatan KASI</label>
                                <p class="isi-lihat">{{ $data->dataAparat->jabatan }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Lokasi Kegiatan</label>
                                <p class="isi-lihat">{{ $data->data_rkp->lokasi_kegiatan }}</p>
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