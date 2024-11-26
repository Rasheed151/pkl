@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white"> Analisa Harga Satuan (Bahan-Bahan) untuk Kegiatan {{ $activity_name}}</h2>


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
                            @foreach ($price_analysis_bahan as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> technical_specifications -> name}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> code}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> unit}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> coefficient}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> unit_price}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> total_price}}</td>
                                <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <form action="{{ route('price_analysis.destroy', $data->id) }}" method="POST" style="display:inline;">
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
                </div>
            </div>
        </div>








        <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="p-5">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white"> Analisa Harga Satuan (Tenaga Kerja) untuk Kegiatan {{ $activity_name}}</h2>


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
                                @foreach ($price_analysis_tenaga_kerja as $data )
                                <tr
                                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> technical_specifications -> name}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> code}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> unit}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> coefficient}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> unit_price}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> total_price}}</td>
                                    <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                        style="display: flex; justify-content: space-between;">
                                        <form action="{{ route('price_analysis.destroy', $data->id) }}" method="POST" style="display:inline;">
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
                    </div>
                </div>
            </div>











            <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


                <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white"> Analisa Harga Satuan (Peralatan) untuk Kegiatan {{ $activity_name}}</h2>


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
                                    @foreach ($price_analysis_peralatan as $data )
                                    <tr
                                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> technical_specifications -> name}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> code}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> unit}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> coefficient}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> unit_price}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> total_price}}</td>
                                        <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                            style="display: flex; justify-content: space-between;">
                                            <form action="{{ route('price_analysis.destroy', $data->id) }}" method="POST" style="display:inline;">
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
                        </div>
                    </div>
                </div>



                <a href="{{ route('price_analysis.pdf',  $rkp_id) }}"
                    class="mt-5 block w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Cetak Data analisa Harga {{ $activity_name}}
                </a>










                <div class="modal fade" id="staticModal" tabindex="-1" aria-labelledby="staticModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-white shadow-2xl rounded-xl">
                            <div class="modal-header border-b border-gray-200 py-4 px-6">
                                <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">Tambah Data analisa</h5>
                                <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-6">
                                <form id="dataFormBahan" action="{{ route('price_analysis.store') }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <!-- Nama Kegiatan -->
                                        <input type="hidden" name="rkp_id" value="{{ $rkp_id }}">
                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Bahan</label>
                                            <select name="technical_id" required
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                @foreach ($technical_specifications_bahan as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="code" class="block text-sm font-medium text-gray-700">kode</label>
                                            <input type="text" name="code" placeholder="Masukkan kode"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="unit" class="block text-sm font-medium text-gray-700">satuan</label>
                                            <input type="text" name="unit" placeholder="Masukkan satuan"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="coefficient" class="block text-sm font-medium text-gray-700">koefisien</label>
                                            <input type="number" name="coefficient" placeholder="Masukkan koefisien"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="unit_price" class="block text-sm font-medium text-gray-700">Harga Satuan</label>
                                            <input type="number" name="unit_price" placeholder="Masukkan unit_price"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                    </div>
                                    <p id="errorMessage1" class="text-red-500 mt-2 hidden">Harap lengkapi data terlebih dahulu!</p>
                                    <div class="modal-footer border-t border-gray-200 py-4 px-6">
                                        <button type="button" class="btn btn-secondary text-gray-700 bg-gray-200 hover:bg-gray-300"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary bg-blue-500 text-white hover:bg-blue-600">Simpan</button>
                                    </div>
                                </form>
                                <script>
                                    document.getElementById("dataFormBahan").addEventListener("submit", function(event) {
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
                                            document.getElementById("errorMessage1").classList.remove("hidden");

                                            setTimeout(() => {
                                                errorMessage1.classList.add("hidden");
                                            }, 3000); // 3000 ms = 3 detik
                                        }
                                    });
                                </script>
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
                                <form id="dataFormTenagaKerja" action="{{ route('price_analysis.store') }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <!-- Nama Kegiatan -->
                                        <input type="hidden" name="rkp_id" value="{{ $rkp_id }}">
                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Bahan</label>
                                            <select name="technical_id" required
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                @foreach ($technical_specifications_tenaga_kerja as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="code" class="block text-sm font-medium text-gray-700">kode</label>
                                            <input type="text" name="code" placeholder="Masukkan kode"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="unit" class="block text-sm font-medium text-gray-700">satuan</label>
                                            <input type="text" name="unit" placeholder="Masukkan satuan"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="coefficient" class="block text-sm font-medium text-gray-700">koefisien</label>
                                            <input type="number" name="coefficient" placeholder="Masukkan koefisien"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="unit_price" class="block text-sm font-medium text-gray-700">Harga Satuan</label>
                                            <input type="number" name="unit_price" placeholder="Masukkan unit_price"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                    </div>
                                    <p id="errorMessage2" class="text-red-500 mt-2 hidden">Harap lengkapi data terlebih dahulu!</p>
                                    <div class="modal-footer border-t border-gray-200 py-4 px-6">
                                        <button type="button" class="btn btn-secondary text-gray-700 bg-gray-200 hover:bg-gray-300"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary bg-blue-500 text-white hover:bg-blue-600">Simpan</button>
                                    </div>
                                </form>
                                <script>
                                    document.getElementById("dataFormTenagaKerja").addEventListener("submit", function(event) {
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
                                            document.getElementById("errorMessage2").classList.remove("hidden");

                                            setTimeout(() => {
                                                errorMessage2.classList.add("hidden");
                                            }, 3000); // 3000 ms = 3 detik
                                        }
                                    });
                                </script>
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
                                <form id="dataFormPeralatan" action="{{ route('price_analysis.store') }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <!-- Nama Kegiatan -->
                                        <input type="hidden" name="rkp_id" value="{{ $rkp_id }}">
                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Bahan</label>
                                            <select name="technical_id" required
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                @foreach ($technical_specifications_peralatan as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="code" class="block text-sm font-medium text-gray-700">kode</label>
                                            <input type="text" name="code" placeholder="Masukkan kode"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="unit" class="block text-sm font-medium text-gray-700">satuan</label>
                                            <input type="text" name="unit" placeholder="Masukkan satuan"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="coefficient" class="block text-sm font-medium text-gray-700">koefisien</label>
                                            <input type="number" name="coefficient" placeholder="Masukkan koefisien"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="unit_price" class="block text-sm font-medium text-gray-700">Harga Satuan</label>
                                            <input type="number" name="unit_price" placeholder="Masukkan unit_price"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                    </div>
                                    <p id="errorMessage3" class="text-red-500 mt-2 hidden">Harap lengkapi data terlebih dahulu!</p>
                                    <div class="modal-footer border-t border-gray-200 py-4 px-6">
                                        <button type="button" class="btn btn-secondary text-gray-700 bg-gray-200 hover:bg-gray-300"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary bg-blue-500 text-white hover:bg-blue-600">Simpan</button>
                                    </div>
                                </form>
                                <script>
                                    document.getElementById("dataFormPeralatan").addEventListener("submit", function(event) {
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
                                            document.getElementById("errorMessage3").classList.remove("hidden");

                                            setTimeout(() => {
                                                errorMessage3.classList.add("hidden");
                                            }, 3000); // 3000 ms = 3 detik
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>



                @endsection