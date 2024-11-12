@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Data Aparatur Desa</h2>


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
                                    Jenis Kelamin</th>

                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Alamat Lengkap</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">NPWP
                                </th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">No.
                                    Hp</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Jabatan</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($officials_data as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> name}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> gender}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> birthplace_date}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> npwp}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> phone_number}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> position}}</td>
                                <td class="px-4 py-10 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <button type="button"
                                        class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                        title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('officials_data.edit', $data->id) }}"
                                        class="mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('officials_data.destroy', $data->id) }}" method="POST" style="display:inline;">
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













        <div class="modal fade" id="staticModal" tabindex="-1" aria-labelledby="staticModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-white shadow-2xl rounded-xl">
                    <div class="modal-header border-b border-gray-200 py-4 px-6">
                        <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">Tambah Data Aparat</h5>
                        <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-6">
                        <form id="dataForm" action="{{ route('officials_data.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Nama -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                    <input type="text" name="name" placeholder="Masukkan Nama"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- Jenis Kelamin -->
                                <div>
                                    <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                    <select id="gender" name="gender"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <!-- Tempat Tanggal Lahir -->
                                <div>
                                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                    <input type="date" id="birth_date" name="birth_date"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="birth_place" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                                    <input type="text" id="birth_place" name="birth_place"
                                        placeholder="Masukkan Tempat Lahir"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- Nomor Induk -->
                                <div>
                                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK Induk</label>
                                    <input type="number" id="nik" name="nik" placeholder="Masukkan NIK"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- Alamat Lengkap -->
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                    <textarea id="address" name="address" placeholder="Masukkan Alamat"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm resize-none overflow-auto min-h-[3rem] max-h-10000">
            </textarea>
                                </div>
                                <!-- NPWP -->
                                <div>
                                    <label for="npwp" class="block text-sm font-medium text-gray-700">NPWP</label>
                                    <input type="text" id="npwp" name="npwp" placeholder="Masukkan NPWP"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- No. Hp -->
                                <div>
                                    <label for="phone_number" class="block text-sm font-medium text-gray-700">No. Hp</label>
                                    <input type="number" id="phone_number" name="phone_number" inputmode="numeric" placeholder="Masukkan Nomor Hp" value="62"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- Jabatan -->
                                <div>
                                    <label for="position" class="block text-sm font-medium text-gray-700">Jabatan</label>
                                    <select id="position" name="position"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <option value="" disabled selected>Pilih Jabatan</option>
                                        <option value="Kepala Desa">Kepala Desa</option>
                                        <option value="Sekretaris Desa">Sekretaris Desa</option>
                                        <option value="Kepala Urusan Tata Usaha Dan Umum">Kepala Urusan Tata Usaha Dan Umum</option>
                                        <option value="Kepala Urusan Keuangan">Kepala Urusan Keuangan</option>
                                        <option value="Kepala Urusan Perencanaan">Kepala Urusan Perencanaan</option>
                                        <option value="Kepala Seleksi Pemerintahan">Kepala Seleksi Pemerintahan</option>
                                        <option value="Kepala Seleksi Kesejahtraan">Kepala Seleksi Kesejahtraan</option>
                                        <option value="Kepala Seleksi Pelayanan">Kepala Seleksi Pelayanan</option>
                                        <option value="Kepala Dusun 1">Kepala Dusun 1</option>
                                        <option value="Kepala Dusun 2">Kepala Dusun 2</option>
                                        <option value="Kepala Dusun 3">Kepala Dusun 3</option>
                                        <option value="Operator Umum Desa">Operator Umum Desa</option>
                                    </select>
                                </div>
                            </div>
                            <p id="errorMessage" class="text-red-500 mt-2 hidden">Harap lengkapi data terlebih dahulu!</p>
                            <div class="modal-footer border-t border-gray-200 py-4 px-6">
                                <button type="button" class="btn btn-secondary text-gray-700 bg-gray-200 hover:bg-gray-300"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary bg-blue-500 text-white hover:bg-blue-600" onclick="return validateForm()">Simpan</button>
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

















        @foreach($officials_data as $data)




        <div class="modal fade" id="lihat{{ $data->id }}" tabindex="-1" aria-labelledby="lihatLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatLabel{{ $data->id }}">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('officials_data.show', $data->id) }}" method="get" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Nama</label>
                                <p class="isi-lihat">{{ $data->name }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Jenis Kelamin</label>
                                <p class="isi-lihat">{{ $data->gender }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Tempat Tanggal Lahir</label>
                                <p class="isi-lihat">{{ $data->birthplace_date }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Nomor Induk</label>
                                <p class="isi-lihat">{{ $data->nik }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Alamat Lengkap</label>
                                <p class="isi-lihat">{{ $data->address }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">NPWP</label>
                                <p class="isi-lihat">{{ $data->npwp }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">NO.HP</label>
                                <p class="isi-lihat">{{ $data->phone_number }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Jabatan</label>
                                <p class="isi-lihat">{{ $data->position }}</p>
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