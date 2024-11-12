@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1  rounded-lg overflow-hidden mx-auto mt-10">


        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Data TPK Desa</h2>


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
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Nama Kelompok
                                </th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Ketua TPK
                                </th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Sekertaris TPK</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Anggota TPK</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Nomor SK Desa</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Tanggal SK Desa</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tpk_data as $data )
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> tpk_group_name}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> head_name}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> secretary_name}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> member_name}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> village_decree_number}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> village_decree_date}}</td>
                                <td class="px-4 py-10 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <button type="button"
                                        class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                        title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('tpk_data.edit', $data->id) }}"
                                        class="mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('tpk_data.destroy', $data->id) }}" method="POST" style="display:inline;">
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
                        <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">Tambah Data TPK</h5>
                        <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-6">
                        <form id="dataForm" action="{{ route('tpk_data.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 gap-6">

                                <div>
                                    <label for="tpk_group_name" class="block text-sm font-medium text-gray-700">Nama Kelompok TPK</label>
                                    <input type="text" name="tpk_group_name" placeholder="Masukkan Nama Kelompok TPK"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <!-- Group 1: Ketua TPK -->
                                <fieldset class="border p-4 mb-4 rounded-lg">
                                    <legend class="text-lg font-bold text-gray-700 mb-2">Ketua TPK</legend>
                                    <div class="grid grid-cols-1 gap-6">
                                        <div>
                                            <label for="head_name" class="block text-sm font-medium text-gray-700">Nama Ketua TPK</label>
                                            <input type="text" name="head_name" placeholder="Masukkan Nama Ketua TPK"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="head_gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                            <select id="head_gender" name="head_gender"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="head_birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir Ketua TPK</label>
                                            <input type="date" id="head_birth_date" name="head_birth_date"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="head_birth_place" class="block text-sm font-medium text-gray-700">Tempat Lahir Ketua TPK</label>
                                            <input type="text" id="head_birth_place" name="head_birth_place"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="head_address" class="block text-sm font-medium text-gray-700">Alamat Ketua TPK</label>
                                            <textarea name="head_address" placeholder="Masukkan Alamat Ketua TPK"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                        </div>
                                        <div>
                                            <label for="head_nik" class="block text-sm font-medium text-gray-700">NIK Ketua TPK</label>
                                            <input type="text" name="head_nik" placeholder="Masukkan NIK Ketua TPK"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="head_phone_number" class="block text-sm font-medium text-gray-700">Nomor Handphone Ketua TPK</label>
                                            <input type="text" name="head_phone_number" placeholder="Masukkan No HP" value="+62"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Group 2: Sekretaris TPK -->
                                <fieldset class="border p-4 mb-4 rounded-lg">
                                    <legend class="text-lg font-bold text-gray-700 mb-2">Sekretaris TPK</legend>
                                    <div class="grid grid-cols-1 gap-6">
                                        <div>
                                            <label for="secretary_name" class="block text-sm font-medium text-gray-700">Nama Sekretaris TPK</label>
                                            <input type="text" name="secretary_name" placeholder="Masukkan Nama Sekretaris TPK"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="secretary_gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                            <select id="secretary_gender" name="secretary_gender"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="secretary_birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir Sekretaris TPK</label>
                                            <input type="date" id="secretary_birth_date" name="secretary_birth_date"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="secretary_birth_place" class="block text-sm font-medium text-gray-700">Tempat Lahir Sekretaris TPK</label>
                                            <input type="text" id="secretary_birth_place" name="secretary_birth_place"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="secretary_address" class="block text-sm font-medium text-gray-700">Alamat Sekretaris TPK</label>
                                            <textarea name="secretary_address" placeholder="Masukkan Alamat Sekretaris TPK"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                        </div>
                                        <div>
                                            <label for="secretary_nik" class="block text-sm font-medium text-gray-700">NIK Sekretaris TPK</label>
                                            <input type="text" name="secretary_nik" placeholder="Masukkan NIK Sekretaris TPK"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="secretary_phone_number" class="block text-sm font-medium text-gray-700">Nomor Handphone Sekretaris TPK</label>
                                            <input type="text" name="secretary_phone_number" placeholder="Masukkan No HP" value="+62"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                    </div>
                                </fieldset>

                                <!-- Group 3: Anggota TPK -->
                                <fieldset class="border p-4 mb-4 rounded-lg">
                                    <legend class="text-lg font-bold text-gray-700 mb-2">Anggota TPK</legend>
                                    <div class="grid grid-cols-1 gap-6">
                                        <div>
                                            <label for="member_name" class="block text-sm font-medium text-gray-700">Nama Anggota TPK</label>
                                            <input type="text" name="member_name" placeholder="Masukkan Nama Anggota TPK"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="member_gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                            <select id="member_gender" name="member_gender"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="member_birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir Anggota TPK</label>
                                            <input type="date" id="member_birth_date" name="member_birth_date"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="member_birth_place" class="block text-sm font-medium text-gray-700">Tempat Lahir Anggota TPK</label>
                                            <input type="text" id="member_birth_place" name="member_birth_place"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="member_address" class="block text-sm font-medium text-gray-700">Alamat Anggota TPK</label>
                                            <textarea name="member_address" placeholder="Masukkan Alamat Anggota TPK"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                        </div>
                                        <div>
                                            <label for="member_nik" class="block text-sm font-medium text-gray-700">NIK Anggota TPK</label>
                                            <input type="text" name="member_nik" placeholder="Masukkan NIK Anggota TPK"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                        <div>
                                            <label for="member_phone_number" class="block text-sm font-medium text-gray-700">Nomor Handphone Anggota TPK</label>
                                            <input type="text" name="member_phone_number" placeholder="Masukkan No HP" value="+62"
                                                class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                    </div>
                                </fieldset>

                                <div>
                                    <label for="village_decree_number" class="block text-sm font-medium text-gray-700">NO SK Desa</label>
                                    <input type="text" name="village_decree_number" placeholder="Masukkan No SK Kades"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="village_decree_date" class="block text-sm font-medium text-gray-700">Tanggal SK Desa</label>
                                    <input type="date" name="village_decree_date" placeholder="Masukkan Tanggal SK Desa"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                            </div>
                            <p id="errorMessage" class="text-red-500 mt-2 hidden">Harap lengkapi data terlebih dahulu!</p>
                            <div class="modal-footer border-t border-gray-200 py-4 px-6">
                                <button type="button" class="btn btn-secondary text-gray-700 bg-gray-200 hover:bg-gray-300"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary bg-blue-500 text-white hover:bg-blue-600">Simpan</button>
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

















        @foreach($tpk_data as $data)




        <div class="modal fade" id="lihat{{ $data->id }}" tabindex="-1" aria-labelledby="lihatLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatLabel{{ $data->id }}">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    <form action="{{ route('tpk_data.show', $data->id) }}" method="get" enctype="multipart/form-data" class="space-y-6">

<div class="mb-3">
    <label class="block text-sm font-medium text-gray-700">Nama Kelompok</label>
    <p class="mt-1 text-lg text-gray-900">{{ $data->tpk_group_name }}</p>
</div>

<div class="border rounded-lg p-4 bg-gray-50">
    <h5 class="text-lg font-semibold text-blue-600 mb-3">Data Ketua TPK</h5>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Nama Ketua TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->head_name }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin Ketua TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->head_gender }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Tempat Lahir Ketua TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->head_birthplace_date }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">NIK Ketua TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->head_nik }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Alamat Ketua TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->head_address }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Nomor Handphone Ketua TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->head_phone_number }}</p>
    </div>
</div>

<div class="border rounded-lg p-4 bg-gray-50">
    <h5 class="text-lg font-semibold text-blue-600 mb-3">Data Sekretaris TPK</h5>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Nama Sekretaris TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->secretary_name }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin Sekretaris TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->secretary_gender }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Tempat Lahir Sekretaris TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->secretary_birthplace_date }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">NIK Sekretaris TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->secretary_nik }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Alamat Sekretaris TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->secretary_address }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Nomor Handphone Sekretaris TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->secretary_phone_number }}</p>
    </div>
</div>

<div class="border rounded-lg p-4 bg-gray-50">
    <h5 class="text-lg font-semibold text-blue-600 mb-3">Data Anggota TPK</h5>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Nama Anggota TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->member_name }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin Anggota TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->member_gender }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Tempat Lahir Anggota TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->member_birthplace_date }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">NIK Anggota TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->member_nik }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Alamat Anggota TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->member_address }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Nomor Handphone Anggota TPK</label>
        <p class="mt-1 text-gray-900">{{ $data->member_phone_number }}</p>
    </div>
</div>

<div class="border rounded-lg p-4 bg-gray-50">
    <h5 class="text-lg font-semibold text-blue-600 mb-3">Informasi SK Desa</h5>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Nomor SK Desa</label>
        <p class="mt-1 text-gray-900">{{ $data->village_decree_number }}</p>
    </div>
    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Tanggal SK Desa</label>
        <p class="mt-1 text-gray-900">{{ $data->village_decree_date }}</p>
    </div>
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