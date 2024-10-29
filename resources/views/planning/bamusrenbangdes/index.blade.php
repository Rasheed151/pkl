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

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> date}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> activity_discussion}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> discussion_material}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> bpd_leader}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> meeting_leader}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> final_agreement}}</td>
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
                                    <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                                    <input type="date" name="date" required placeholder="Masukkan tanggal"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="time" class="block text-sm font-medium text-gray-700">Jam</label>
                                    <input type="time" name="time" required placeholder="Masukkan jam"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="place" class="block text-sm font-medium text-gray-700">Tempat</label>
                                    <input type="text" name="place" required placeholder="Masukkan tempat"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="activity_discussion" class="block text-sm font-medium text-gray-700">Bahas Kegiatan</label>
                                    <textarea name="activity_discussion" required placeholder="Masukkan bahas kegiatan"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                </div>

                                <div>
                                    <label for="discussion_material" class="block text-sm font-medium text-gray-700">Materi Pembahasan</label>
                                    <textarea name="discussion_material" required placeholder="Masukkan materi pembahasan"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                </div>

                                <div>
                                    <label for="bpd_leader" class="block text-sm font-medium text-gray-700">Ketua BPD</label>
                                    <input type="text" name="bpd_leader" required placeholder="Masukkan nama ketua BPD"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="community_representative" class="block text-sm font-medium text-gray-700">Wakil Masyarakat</label>
                                    <input type="text" name="community_representative" required placeholder="Masukkan nama wakil masyarakat"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="meeting_leader" class="block text-sm font-medium text-gray-700">Pimpinan Rapat</label>
                                    <input type="text" name="meeting_leader" required placeholder="Masukkan nama pimpinan rapat"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="note" class="block text-sm font-medium text-gray-700">Notulen</label>
                                    <input type="text" name="note" required placeholder="Masukkan nama notulen"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="final_agreement" class="block text-sm font-medium text-gray-700">Kesepakatan Akhir</label>
                                    <textarea name="final_agreement" required placeholder="Masukkan kesepakatan akhir"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                                </div>

                                <!-- Field untuk resource_person -->
                                <div id="resource_person-container">
                                    <label for="resource_person" class="block text-sm font-medium text-gray-700">Narasumber</label>
                                    <div class="flex">
                                        <input type="text" name="resource_person[]" required placeholder=" nama narasumber"
                                            class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" style="margin-right: 10px;">
                                        <h6 style="margin-right: 10px; margin-top: 25px;">Dari</h6>
                                        <input type="text" name="from[]" required placeholder="asal narasumber"
                                            class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <button type="button" onclick="addresource_person()" class="ml-2 bg-blue-500 text-white px-3 py-2 rounded-md">+</button>
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
                                <p class="isi-lihat">{{ $data->date }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Jam</label>
                                <p class="isi-lihat">{{ $data->time }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Tempat</label>
                                <p class="isi-lihat">{{ $data->place }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Bahas Kegiatan</label>
                                <p class="isi-lihat">{{ $data->activity_discussion }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Materi Pembahasan</label>
                                <p class="isi-lihat">{{ $data->discussion_material }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Ketua BPD</label>
                                <p class="isi-lihat">{{ $data->bpd_leader }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Wakil Masyarakat</label>
                                <p class="isi-lihat">{{ $data->community_representative }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Pimpinan Rapat</label>
                                <p class="isi-lihat">{{ $data->meeting_leader }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Notulen</label>
                                <p class="isi-lihat">{{ $data->note }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Kesepakatan Akhir</label>
                                <p class="isi-lihat">{{ $data->final_agreement }}</p>
                            </div>

                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Narasumber</label>
                                @foreach($data->resource_person as $n)
                                <p>Nama Narasumber: {{ $n->resource_person }} Dari {{ $n->from }}</p>
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
            // Fungsi untuk menambah input resource_person
            function addresource_person() {
                var container = document.getElementById('resource_person-container');
                var input = document.createElement('div');
                input.classList.add('flex', 'mt-2');
                input.innerHTML = '<input type="text" name="resource_person[]" required placeholder=" nama narasumber" class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" style="margin-right: 10px;">' +
                    '<h6 style="margin-right: 10px; margin-top: 25px;">Dari</h6>' +
                    '<input type="text" name="from[]" required placeholder=" asal narasumber" class="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">' +
                    '<button type="button" onclick="removeresource_person(this)" class="ml-2 bg-red-500 text-white px-3 py-2 rounded-md">-</button>';
                container.appendChild(input);
            }

            // Fungsi untuk menghapus input narasumber
            function removeresource_person(button) {
                var container = button.parentElement;
                container.remove();
            }
        </script>











        @endsection