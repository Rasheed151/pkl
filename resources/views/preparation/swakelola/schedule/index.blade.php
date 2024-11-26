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
                                    <th scope="col" class="px-6 py-3 border-b border-gray-200 dark:border-gray-700">
                                    Progress</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center border-b border-gray-200 dark:border-gray-700">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($swakelola_schedule as $data )
                            @php
                            $implementation_time = $data -> rkp_data -> implementation_time;
                            $percent = 100 / $implementation_time;
                            $progress = $percent * $data -> progress;
                            @endphp
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> rkp_data -> activity_name}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> announcement -> tpk_data -> head_name}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> announcement -> start_date}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> rkp_data -> implementation_time}} Hari</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$data -> rkp_data -> total_cost}}</td>
                                <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">{{$progress}}%</td>
                                <td class="px-6 py-4 text-center border-b border-gray-200 dark:border-gray-700"
                                    style="display: flex; justify-content: space-between;">
                                    <button type="button"
                                        class=" text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400"
                                        title="Edit Data" data-bs-toggle="modal" data-bs-target="#lihat{{ $data->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('swakelola_schedule.edit', $data->id) }}"
                                        class="mx-2 text-yellow-600 dark:text-yellow-500 hover:text-yellow-700 dark:hover:text-yellow-400"
                                        title="Edit Data">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('Schedule.pdf', $data->id) }}"
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






        @foreach($swakelola_schedule as $data)




        <div class="modal fade" id="lihat{{ $data->id }}" tabindex="-1" aria-labelledby="lihatLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatLabel{{ $data->id }}">Detail Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('Schedule.index', $data->id) }}" method="get" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Nama Kegiatan</label>
                                <p class="isi-lihat">{{ $data->rkp_data->activity_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Ketua TPK</label>
                                <p class="isi-lihat">{{ $data->announcement -> tpk_data -> head_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Sekertaris TPK</label>
                                <p class="isi-lihat">{{ $data->announcement ->tpk_data -> secretary_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Anggota TPK</label>
                                <p class="isi-lihat">{{ $data->announcement ->tpk_data -> member_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Waktu Pelaksanaan</label>
                                <p class="isi-lihat">{{ $data->rkp_data->implementation_time }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Tanggal Mulai</label>
                                <p class="isi-lihat">{{ $data->announcement ->start_date }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Tanggal Selesai</label>
                                <p class="isi-lihat">{{ $data->announcement ->end_date }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Jumlah Biaya</label>
                                <p class="isi-lihat">{{ $data->rkp_data->total_cost }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Nama KASI</label>
                                <p class="isi-lihat">{{ $data -> rkp_data -> officials_data ->name }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Jabatan KASI</label>
                                <p class="isi-lihat">{{ $data -> rkp_data -> officials_data ->position }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Lokasi Kegiatan</label>
                                <p class="isi-lihat">{{ $data->rkp_data->activity_location }}</p>
                            </div>
                            <div class="mb-3">
                                <label {{ $data->id }} class="form-label">Progress Sejauh Ini</label>
                                <p class="isi-lihat">{{ $progress}}%</p>
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