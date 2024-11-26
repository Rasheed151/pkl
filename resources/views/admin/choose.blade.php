<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>





    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-8">


        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-white-900 dark:border-white-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                    Data Aparat Desa
                </h5>
            </a>
            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                molestias tempore accusantium.
            </p>
            <a href="{{ route('admin.officials_data', ['id' => $user_id]) }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Olah Data
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>


        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-white-900 dark:border-white-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                    Data PKA Desa
                </h5>
            </a>
            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                molestias tempore accusantium.
            </p>
            <a href="{{ route('admin.pka_data', ['id' => $user_id]) }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Olah Data
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>


        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-white-900 dark:border-white-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                    Kerangka Acuan Kerja (KAK)
                </h5>
            </a>
            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                molestias tempore accusantium.
            </p>
            <a href="kak_data"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Olah Data
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>


        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-white-900 dark:border-white-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                    Kerangka Acuan Kerja (KAK)
                </h5>
            </a>
            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                molestias tempore accusantium.
            </p>
            <a href="kak_data"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Olah Data
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>


        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-white-900 dark:border-white-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                    Kerangka Acuan Kerja (KAK)
                </h5>
            </a>
            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                molestias tempore accusantium.
            </p>
            <a href="kak_data"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Olah Data
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>


        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-white-900 dark:border-white-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                    Kerangka Acuan Kerja (KAK)
                </h5>
            </a>
            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                molestias tempore accusantium.
            </p>
            <a href="kak_data"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Olah Data
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>


        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-white-900 dark:border-white-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                    Kerangka Acuan Kerja (KAK)
                </h5>
            </a>
            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                molestias tempore accusantium.
            </p>
            <a href="kak_data"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Olah Data
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>


        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-white-900 dark:border-white-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                    Kerangka Acuan Kerja (KAK)
                </h5>
            </a>
            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                molestias tempore accusantium.
            </p>
            <a href="kak_data"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Olah Data
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>

        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-white-900 dark:border-white-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-varBlue dark:text-black">
                    Kerangka Acuan Kerja (KAK)
                </h5>
            </a>
            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400 truncate-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae autem minima sint facere,
                voluptatem nemo voluptates sapiente incidunt, qui, culpa reiciendis odio sunt vel natus veniam sed
                molestias tempore accusantium.
            </p>
            <a href="kak_data"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-varBlue rounded-lg hover:bg-varBlueHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Olah Data
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
</body>

</html>