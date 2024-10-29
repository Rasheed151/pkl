@extends('layouts.choose')
@section('content')



    <!-- Main Content -->
    <div id="mainContent" class="main-content ml-64 transition-all duration-300 p-6">

        <h2 class="text-4xl font-bold text-center text-varBlue dark:text-black mt-5 mb-12">
            Tentukan Kegiatan Yang Akan Ditambahkan Data
        </h2>

        <div class="grid grid-cols-1 gap-8">
            @foreach($kegiatan as $item)
            <!-- Card -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                    {{ $item->rkp_data->activity_name }}
                    </h5>
                </a>
                <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                    voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                    molestias tempore accusantium.
                </p>
                <a href="{{ route('price_estimate.index', ['rkp_id' => $item->rkp_id, 'activity_name' => $item->rkp_data->activity_name]) }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Olah Data
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            <!-- End | Card -->
            @endforeach
        </div>
    </div>




   @endsection