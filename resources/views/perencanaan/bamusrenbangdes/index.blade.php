@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Data Bamusrenbangdes Desa</h2>


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
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Bahas Kegiatan
                                </th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Materi Pembahasan</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Ketua BPD</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Pimpinan Rapat</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Kesepakatan Akhir</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bamusrenbangdes as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> tanggal}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> bahas_kegiatan}}</td>

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> materi_pembahasan}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> ketua_bpd}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> pimpinan_rapat}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> kesepakatan_akhir}}</td>
                                <td class="px-4 py-10  border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <button type="button"
                                        class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                        title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('bamusrenbangdes.edit', $data->id) }}"
                                        class="mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('bamusrenbangdes.destroy', $data->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('make.pdf', $data->id) }}"
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
                        <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">Tambah Data  Bamusrenbangdes Desa
                        </h5>
                        <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-6">
                        <form action="{{ route('bamusrenbangdes.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                                    <input type="date" name="tanggal" required placeholder="Masukkan tanggal"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="jam" class="block text-sm font-medium text-gray-700">Jam</label>
                                    <input type="time" name="jam" required placeholder="Masukkan jam"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="tempat" class="block text-sm font-medium text-gray-700">Tempat</label>
                                    <input type="text" name="tempat" required placeholder="Masukkan tempat"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="bahas_kegiatan" class="block text-sm font-medium text-gray-700">Bahas Kegiatan</label>
                                    <textarea name="bahas_kegiatan" required placeholder="Masukkan bahas kegiatan"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                </div>

                                <div>
                                    <label for="materi_pembahasan" class="block text-sm font-medium text-gray-700">Materi Pembahasan</label>
                                    <textarea name="materi_pembahasan" required placeholder="Masukkan materi pembahasan"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                </div>

                                <div>
                                    <label for="ketua_bpd" class="block text-sm font-medium text-gray-700">Ketua BPD</label>
                                    <input type="text" name="ketua_bpd" required placeholder="Masukkan nama ketua BPD"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="wakil_masyarakat" class="block text-sm font-medium text-gray-700">Wakil Masyarakat</label>
                                    <input type="text" name="wakil_masyarakat" required placeholder="Masukkan nama wakil masyarakat"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="pimpinan_rapat" class="block text-sm font-medium text-gray-700">Pimpinan Rapat</label>
                                    <input type="text" name="pimpinan_rapat" required placeholder="Masukkan nama pimpinan rapat"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="notulen" class="block text-sm font-medium text-gray-700">Notulen</label>
                                    <input type="text" name="notulen" required placeholder="Masukkan nama notulen"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="kesepakatan_akhir" class="block text-sm font-medium text-gray-700">Kesepakatan Akhir</label>
                                    <textarea name="kesepakatan_akhir" required placeholder="Masukkan kesepakatan akhir"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                </div>

                                <!-- Field untuk Narasumber -->
                                <div id="narasumber-container">
                                    <label for="narasumber" class="block text-sm font-medium text-gray-700">Narasumber</label>
                                    <div class="flex">
                                        <input type="text" name="narasumber[]" required placeholder=" nama narasumber"
                                            class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" style="margin-right: 10px;">
                                        <h6 style="margin-right: 10px; margin-top: 25px;">Dari</h6>
                                        <input type="text" name="dari[]" required placeholder="asal narasumber"
                                            class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <button type="button" onclick="addNarasumber()" class="ml-2 bg-blue-500 text-white px-3 py-2 rounded-md">+</button>
                                    </div>
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



        @foreach($bamusrenbangdes as $data)




        <div class="modal fade" id="lihat{{ $data->id }}" tabindex="-1" aria-labelledby="lihatLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatLabel{{ $data->id }}">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('bamusrenbangdes.show', $data->id) }}" method="get" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Tanggal</label>
                                <p class="isi-lihat">{{ $data->tanggal }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Jam</label>
                                <p class="isi-lihat">{{ $data->Jam }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Tempat</label>
                                <p class="isi-lihat">{{ $data->tempat }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Bahas Kegiatan</label>
                                <p class="isi-lihat">{{ $data->bahas_kegiatan }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Materi Pembahasan</label>
                                <p class="isi-lihat">{{ $data->materi_pembahasan }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Ketua BPD</label>
                                <p class="isi-lihat">{{ $data->ketua_bpd }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Wakil Masyarakat</label>
                                <p class="isi-lihat">{{ $data->wakil_masyarakat }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Pimpinan Rapat</label>
                                <p class="isi-lihat">{{ $data->pimpinan_rapat }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Notulen</label>
                                <p class="isi-lihat">{{ $data->notulen }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Kesepakatan Akhir</label>
                                <p class="isi-lihat">{{ $data->kesepakatan_akhir }}</p>
                            </div>

                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Narasumber</label>
                                @foreach($data->narasumbers as $n)
                                <p>Nama Narasumber: {{ $n->narasumber }} Dari {{ $n->dari }}</p>
                                @endforeach
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
            // Fungsi untuk menambah input narasumber
            function addNarasumber() {
                var container = document.getElementById('narasumber-container');
                var input = document.createElement('div');
                input.classList.add('flex', 'mt-2');
                input.innerHTML = '<input type="text" name="narasumber[]" required placeholder=" nama narasumber" class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" style="margin-right: 10px;">' +
                    '<h6 style="margin-right: 10px; margin-top: 25px;">Dari</h6>' +
                    '<input type="text" name="dari[]" required placeholder=" asal narasumber" class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">' +
                    '<button type="button" onclick="removeNarasumber(this)" class="ml-2 bg-red-500 text-white px-3 py-2 rounded-md">-</button>';
                container.appendChild(input);
            }

            // Fungsi untuk menghapus input narasumber
            function removeNarasumber(button) {
                var container = button.parentElement;
                container.remove();
            }
        </script>











        @endsection