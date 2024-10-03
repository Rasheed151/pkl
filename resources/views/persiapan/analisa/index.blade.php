@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white"> Analisa Harga Satuan (Bahan-Bahan) untuk Kegiatan {{ $nama_kegiatan}}</h2>


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
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Nama
                                </th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    kode</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    satuan</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    koefisien</th>
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
                            @foreach ($data_analisa_bahan as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> nama}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> kode}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> satuan}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> koefisien}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> harga_satuan}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> jumlah_harga}}</td>
                                <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <form action="{{ route('data_analisa.destroy', $data->id) }}" method="POST" style="display:inline;">
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








        <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="p-5">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white"> Analisa Harga Satuan (Tenaga Kerja) untuk Kegiatan {{ $nama_kegiatan}}</h2>


                        <!-- Tambah Data -->
                        <button type="button"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            data-bs-toggle="modal" data-bs-target="#staticModal1">
                            Tambah Data
                        </button>

                    </div>

                    <div class="overflow-x-auto">

                        <table
                            class="min-w-full text-left text-sm text-gray-500 dark:text-gray-400 border-separate border-spacing-0 border border-gray-200 dark:border-gray-700">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                        kode</th>
                                    <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                        satuan</th>
                                    <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                        koefisien</th>
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
                                @foreach ($data_analisa_tenaga_kerja as $data )
                                <tr
                                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> nama}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> kode}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> satuan}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> koefisien}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> harga_satuan}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> jumlah_harga}}</td>
                                    <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                        style="display: flex; justify-content: space-between;">
                                        <form action="{{ route('data_analisa.destroy', $data->id) }}" method="POST" style="display:inline;">
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











            <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


                <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white"> Analisa Harga Satuan (Peralatan) untuk Kegiatan {{ $nama_kegiatan}}</h2>


                            <!-- Tambah Data -->
                            <button type="button"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                data-bs-toggle="modal" data-bs-target="#staticModal2">
                                Tambah Data
                            </button>
                        </div>

                        <div class="overflow-x-auto">

                            <table
                                class="min-w-full text-left text-sm text-gray-500 dark:text-gray-400 border-separate border-spacing-0 border border-gray-200 dark:border-gray-700">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Nama
                                        </th>
                                        <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                            kode</th>
                                        <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                            satuan</th>
                                        <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                            koefisien</th>
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
                                    @foreach ($data_analisa_peralatan as $data )
                                    <tr
                                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> nama}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> kode}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> satuan}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> koefisien}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> harga_satuan}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> jumlah_harga}}</td>
                                        <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                            style="display: flex; justify-content: space-between;">
                                            <form action="{{ route('data_analisa.destroy', $data->id) }}" method="POST" style="display:inline;">
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
                                <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">Tambah Data analisa</h5>
                                <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-6">
                                <form action="{{ route('data_analisa.store') }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <!-- Nama Kegiatan -->
                                        <input type="hidden" name="kegiatanId" value="{{ $kegiatanId }}">
                                        <input type="hidden" name="jenis" value="Bahan">
                                        <div>
                                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Bahan</label>
                                            <select name="nama" required
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                @foreach ($data_teknis_bahan as $data)
                                                <option value="{{ $data->nama }}">{{ $data->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="kode" class="block text-sm font-medium text-gray-700">kode</label>
                                            <input type="text" name="kode" placeholder="Masukkan kode"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="satuan" class="block text-sm font-medium text-gray-700">satuan</label>
                                            <input type="text" name="satuan" placeholder="Masukkan satuan"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="koefisien" class="block text-sm font-medium text-gray-700">koefisien</label>
                                            <input type="number" name="koefisien" placeholder="Masukkan koefisien"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="harga_satuan" class="block text-sm font-medium text-gray-700">Harga Satuan</label>
                                            <input type="number" name="harga_satuan" placeholder="Masukkan harga_satuan"
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





                <div class="modal fade" id="staticModal1" tabindex="-1" aria-labelledby="staticModal1Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-white shadow-2xl rounded-xl">
                            <div class="modal-header border-b border-gray-200 py-4 px-6">
                                <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModal1Label">Tambah Data Analisa</h5>
                                <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-6">
                                <form action="{{ route('data_analisa.store') }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <!-- Nama Kegiatan -->
                                        <input type="hidden" name="kegiatanId" value="{{ $kegiatanId }}">
                                        <input type="hidden" name="jenis" value="Tenaga Kerja">
                                        <div>
                                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Bahan</label>
                                            <select name="nama" required
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                @foreach ($data_teknis_tenaga_kerja as $data)
                                                <option value="{{ $data->nama }}">{{ $data->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="kode" class="block text-sm font-medium text-gray-700">kode</label>
                                            <input type="text" name="kode" placeholder="Masukkan kode"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="satuan" class="block text-sm font-medium text-gray-700">satuan</label>
                                            <input type="text" name="satuan" placeholder="Masukkan satuan"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="koefisien" class="block text-sm font-medium text-gray-700">koefisien</label>
                                            <input type="number" name="koefisien" placeholder="Masukkan koefisien"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="harga_satuan" class="block text-sm font-medium text-gray-700">Harga Satuan</label>
                                            <input type="number" name="harga_satuan" placeholder="Masukkan harga_satuan"
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




                <div class="modal fade" id="staticModal2" tabindex="-1" aria-labelledby="staticModal2Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-white shadow-2xl rounded-xl">
                            <div class="modal-header border-b border-gray-200 py-4 px-6">
                                <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModal2Label">Tambah Data Analisa</h5>
                                <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-6">
                                <form action="{{ route('data_analisa.store') }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <!-- Nama Kegiatan -->
                                        <input type="hidden" name="kegiatanId" value="{{ $kegiatanId }}">
                                        <input type="hidden" name="jenis" value="Peralatan">
                                        <div>
                                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Bahan</label>
                                            <select name="nama" required
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                @foreach ($data_teknis_peralatan as $data)
                                                <option value="{{ $data->nama }}">{{ $data->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="kode" class="block text-sm font-medium text-gray-700">kode</label>
                                            <input type="text" name="kode" placeholder="Masukkan kode"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="satuan" class="block text-sm font-medium text-gray-700">satuan</label>
                                            <input type="text" name="satuan" placeholder="Masukkan satuan"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="koefisien" class="block text-sm font-medium text-gray-700">koefisien</label>
                                            <input type="number" name="koefisien" placeholder="Masukkan koefisien"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="harga_satuan" class="block text-sm font-medium text-gray-700">Harga Satuan</label>
                                            <input type="number" name="harga_satuan" placeholder="Masukkan harga_satuan"
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