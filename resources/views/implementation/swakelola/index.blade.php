@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <div class="w-full max-w-8xl py-1 rounded-lg overflow-hidden mx-auto mt-10">

        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Data Pelaksanaan Secara Swakelola</h2>

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
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Nama Kegiatan</th>
                                <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">Latar Belakang</th>
                                <th scope="col" class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($swakelola_implementation as $data)
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data->rkp_data->activity_name}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data->follow_up}}</td>
                                <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700" style="display: flex; justify-content: space-between;">
                                    <button type="button"
                                        class="text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                        title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('swakelola_implementation.edit', $data->id) }}"
                                        class="mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('swakelola_implementation.destroy', $data->id) }}" method="POST" style="display:inline;">
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

        <!-- Modal Tambah Data KAK -->
        <div class="modal fade" id="staticModal" tabindex="-1" aria-labelledby="staticModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-white shadow-2xl rounded-xl">
                    <div class="modal-header border-b border-gray-200 py-4 px-6">
                        <h5 class="modal-title text-2xl font-bold text-gray-800" id="staticModalLabel">Tambah Data KAK</h5>
                        <button type="button" class="btn-close text-gray-400 hover:text-gray-600" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-6">
                        <form id="dataForm" action="{{ route('swakelola_implementation.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Nama Kegiatan -->
                                <div>
                                    <label for="rkp_id" class="block text-sm font-medium text-gray-700">Kegiatan Yang Dipilih</label>
                                    <select name="rkp_id"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        @foreach ($announcement as $data)
                                        <option value="{{ $data->rkp_id }}">{{ $data->rkp_data->activity_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Latar Belakang -->
                                <div>
                                    <label for="discussion" class="block text-sm font-medium text-gray-700">Pembahasan</label>
                                    <textarea name="discussion" placeholder="Masukkan Pembahasan"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm resize-none min-h-[80px] max-h-[500px] overflow-y-auto"
                                        id="autoResizediscussion"></textarea>
                                </div>
                                <div>
                                    <label for="follow_up" class="block text-sm font-medium text-gray-700">Tindak Lanjut</label>
                                    <textarea name="follow_up" placeholder="Masukkan Tindak Lanjut"
                                        class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm resize-none min-h-[80px] max-h-[500px] overflow-y-auto"
                                        id="autoResizefollow_up"></textarea>
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
                                const inputs = this.querySelectorAll("select, textarea");
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

        @foreach($swakelola_implementation as $data)
        <div class="modal fade" id="lihat{{ $data->id }}" tabindex="-1" aria-labelledby="lihatLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatLabel{{ $data->id }}">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('swakelola_implementation.index', $data->id) }}" method="get" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Nama Kegiatan</label>
                                <p class="isi-lihat">{{ $data->rkp_data->activity_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Latar Belakang</label>
                                <p class="isi-lihat">{{ $data->discussion }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">sasaran Manfaat</label>
                                <p class="isi-lihat">{{ $data->follow_up }}</p>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</main>


<script>
    // Fungsi untuk otomatis menyesuaikan tinggi textarea
    const autoResize = (textarea) => {
        textarea.style.height = 'auto'; // Reset height
        textarea.style.height = textarea.scrollHeight + 'px'; // Set height sesuai scroll height
    };

    // Dapatkan elemen textarea
    const discussionTextarea = document.getElementById('autoResizediscussion');
    const followUpTextarea = document.getElementById('autoResizefollow_up');

    // Tambahkan event listener untuk setiap textarea
    discussionTextarea.addEventListener('input', function() {
        autoResize(this);
    });

    followUpTextarea.addEventListener('input', function() {
        autoResize(this);
    });
</script>
@endsection