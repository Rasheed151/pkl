@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white"> RPTKBPS (Bahan-Bahan) untuk
                        Kegiatan {{ $activity_name}}</h2>


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
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Nama
                                </th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Kode</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Jadwal Kerja</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Jumlah(Sebelum Pembulatan)</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Jumlah</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Satuan</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rptkbps_bahan as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data ->technical_specifications -> name}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> code}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> rkp_data -> implementation_time}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> final_amount}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{ceil($data -> final_amount)}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> unit}}
                                </td>
                                <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <button type="button"
                                        class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                        title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <form action="{{ route('rptkbps.destroy', $data->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400">
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
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white"> RPTKBPS (Tenaga Kerja) untuk
                            Kegiatan {{ $activity_name}}</h2>


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
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                        Kode</th>
                                    <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                        Jadwal Kerja</th>
                                    <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                        Jumlah(Sebelum Pembulatan)</th>
                                        <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                        Jumlah</th>
                                    <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                        Satuan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rptkbps_tenaga_kerja as $data )
                                <tr
                                    class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data ->technical_specifications -> name}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> code}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> rkp_data -> implementation_time}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> final_amount}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{ceil($data -> final_amount)}}</td>
                                    <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> unit}}
                                    </td>
                                    <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                        style="display: flex; justify-content: space-between;">
                                        <button type="button"
                                            class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                            title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <form action="{{ route('rptkbps.destroy', $data->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400">
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


                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white"> RPTKBPS (Peralatan) untuk
                                Kegiatan {{ $activity_name}}</h2>


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
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Nama
                                        </th>
                                        <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                            Kode</th>
                                        <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                            Jadwal Kerja</th>
                                        <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                            Jumlah(Sebelum Pembulatan)</th>
                                        <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                            Jumlah</th>
                                        <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                            Satuan</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rptkbps_peralatan as $data )
                                    <tr
                                        class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data ->technical_specifications -> name}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> code}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> rkp_data -> implementation_time}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> final_amount}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{ceil($data -> final_amount)}}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> unit}}
                                        </td>
                                        <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                            style="display: flex; justify-content: space-between;">
                                            <button type="button"
                                                class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                                title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <form action="{{ route('rptkbps.destroy', $data->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400">
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



                <a href=""
                    class="mt-5 block w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <h1><strong><b>FITUR SEDANG DALAM PENGEMBANGAN</b></strong></h1>
                </a>




                <div class="modal fade" id="staticModal" tabindex="-1" aria-labelledby="staticModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-white shadow-2xl rounded-xl">
                            <div class="modal-header border-b border-gray-200 py-4 px-6">
                                <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">Tambah
                                    Data </h5>
                                <button type="button" class="btn-close text-gray-400 hover:text-gray-600"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-6">
                                <form id="dataForm" action="{{ route('rptkbps.store') }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <!-- Nama Kegiatan -->
                                        <input type="hidden" name="rkp_id" value="{{ $rkp_id }}">
                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700">Nama
                                                Bahan</label>
                                            <select name="technical_id" required
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                @foreach ($technical_specifications_bahan as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="code"
                                                class="block text-sm font-medium text-gray-700">kode</label>
                                            <input type="text" name="code" placeholder="Masukkan kode"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="unit"
                                                class="block text-sm font-medium text-gray-700">satuan</label>
                                            <input type="text" name="unit" placeholder="Masukkan satuan"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="coefficient"
                                                class="block text-sm font-medium text-gray-700">Koefisien</label>
                                            <input type="number" name="coefficient" placeholder="Masukkan koefisien"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                step="0.01" min="0">
                                        </div>

                                        <div>
                                            <label for="volume"
                                                class="block text-sm font-medium text-gray-700">Volume</label>
                                            <input type="number" name="volume" placeholder="Masukkan volume"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                    </div>
                                    <p id="errorMessage" class="text-red-500 mt-2 hidden">Harap lengkapi data terlebih
                                        dahulu!</p>
                                    <div class="modal-footer border-t border-gray-200 py-4 px-6">
                                        <button type="button"
                                            class="btn btn-secondary text-gray-700 bg-gray-200 hover:bg-gray-300"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit"
                                            class="btn btn-primary bg-blue-500 text-white hover:bg-blue-600">Simpan</button>
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
                                                errorMessage1.classList.add("hidden");
                                            }, 3000); // 3000 ms = 3 detik
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="staticModal1" tabindex="-1" aria-labelledby="staticModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-white shadow-2xl rounded-xl">
                            <div class="modal-header border-b border-gray-200 py-4 px-6">
                                <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">Tambah
                                    Data </h5>
                                <button type="button" class="btn-close text-gray-400 hover:text-gray-600"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-6">
                                <form id="dataForm1" action="{{ route('rptkbps.store') }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <!-- Nama Kegiatan -->
                                        <input type="hidden" name="rkp_id" value="{{ $rkp_id }}">
                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700">Nama
                                                Bahan</label>
                                            <select name="technical_id" required
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                @foreach ($technical_specifications_tenaga_kerja as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="code"
                                                class="block text-sm font-medium text-gray-700">kode</label>
                                            <input type="text" name="code" placeholder="Masukkan kode"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="unit"
                                                class="block text-sm font-medium text-gray-700">satuan</label>
                                            <input type="text" name="unit" placeholder="Masukkan satuan"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="coefficient"
                                                class="block text-sm font-medium text-gray-700">Koefisien</label>
                                            <input type="number" name="coefficient" placeholder="Masukkan koefisien"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                step="0.01" min="0">
                                        </div>

                                        <div>
                                            <label for="volume"
                                                class="block text-sm font-medium text-gray-700">Volume</label>
                                            <input type="number" name="volume" placeholder="Masukkan volume"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                    </div>
                                    <p id="errorMessage1" class="text-red-500 mt-2 hidden">Harap lengkapi data terlebih
                                        dahulu!</p>
                                    <div class="modal-footer border-t border-gray-200 py-4 px-6">
                                        <button type="button"
                                            class="btn btn-secondary text-gray-700 bg-gray-200 hover:bg-gray-300"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit"
                                            class="btn btn-primary bg-blue-500 text-white hover:bg-blue-600">Simpan</button>
                                    </div>
                                </form>
                                <script>
                                    document.getElementById("dataForm1").addEventListener("submit", function(event) {
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

                <div class="modal fade" id="staticModal2" tabindex="-1" aria-labelledby="staticModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content bg-white shadow-2xl rounded-xl">
                            <div class="modal-header border-b border-gray-200 py-4 px-6">
                                <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">Tambah
                                    Data </h5>
                                <button type="button" class="btn-close text-gray-400 hover:text-gray-600"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-6">
                                <form id="dataForm2" action="{{ route('rptkbps.store') }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <!-- Nama Kegiatan -->
                                        <input type="hidden" name="rkp_id" value="{{ $rkp_id }}">
                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700">Nama
                                                Bahan</label>
                                            <select name="technical_id" required
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                @foreach ($technical_specifications_peralatan as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label for="code"
                                                class="block text-sm font-medium text-gray-700">kode</label>
                                            <input type="text" name="code" placeholder="Masukkan kode"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="unit"
                                                class="block text-sm font-medium text-gray-700">satuan</label>
                                            <input type="text" name="unit" placeholder="Masukkan satuan"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="coefficient"
                                                class="block text-sm font-medium text-gray-700">Koefisien</label>
                                            <input type="number" name="coefficient" placeholder="Masukkan koefisien"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                step="0.01" min="0">
                                        </div>

                                        <div>
                                            <label for="volume"
                                                class="block text-sm font-medium text-gray-700">Volume</label>
                                            <input type="number" name="volume" placeholder="Masukkan volume"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                    </div>
                                    <p id="errorMessage2" class="text-red-500 mt-2 hidden">Harap lengkapi data terlebih
                                        dahulu!</p>
                                    <div class="modal-footer border-t border-gray-200 py-4 px-6">
                                        <button type="button"
                                            class="btn btn-secondary text-gray-700 bg-gray-200 hover:bg-gray-300"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit"
                                            class="btn btn-primary bg-blue-500 text-white hover:bg-blue-600">Simpan</button>
                                    </div>
                                </form>
                                <script>
                                    document.getElementById("dataForm2").addEventListener("submit", function(event) {
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
                                                errorMessage1.classList.add("hidden");
                                            }, 3000); // 3000 ms = 3 detik
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>


                @foreach($rptkbps as $data)




<div class="modal fade" id="lihat{{ $data->id }}" tabindex="-1" aria-labelledby="lihatLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lihatLabel{{ $data->id }}">Detail Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('rptkbps.index', $data->id) }}" method="get" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label {{ $data->id }} class="form-label">Nama </label>
                        <p class="isi-lihat">{{$data ->technical_specifications -> name}}</p>
                    </div>
                    <div class="mb-3">
                        <label {{ $data->id }} class="form-label">Kode </label>
                        <p class="isi-lihat">{{$data ->code}}</p>
                    </div>
                    <div class="mb-3">
                        <label {{ $data->id }} class="form-label">Satuan </label>
                        <p class="isi-lihat">{{$data ->unit}}</p>
                    </div>
                    <div class="mb-3">
                        <label {{ $data->id }} class="form-label">Koefisien </label>
                        <p class="isi-lihat">{{$data ->coefficient}}</p>
                    </div>
                    <div class="mb-3">
                        <label {{ $data->id }} class="form-label">Volume </label>
                        <p class="isi-lihat">{{$data ->volume}}</p>
                    </div>
                    <div class="mb-3">
                        <label {{ $data->id }} class="form-label">Jumlah Gabungan Koefisien Dan Volume</label>
                        <p class="isi-lihat">{{$data ->amount}}</p>
                    </div>
                    <div class="mb-3">
                        <label {{ $data->id }} class="form-label">Waktu Pelaksanaan </label>
                        <p class="isi-lihat">{{$data ->rkp_data->implementation_time}} Hari</p>
                    </div>
                    <div class="mb-3">
                        <label {{ $data->id }} class="form-label">Jumlah </label>
                        <p class="isi-lihat">{{$data ->final_amount}}</p>
                    </div>
                    <div class="mb-3">
                        <label {{ $data->id }} class="form-label">Jumlah(Pembulatan Ke Atas) </label>
                        <p class="isi-lihat">{{ceil($data ->final_amount)}}</p>
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