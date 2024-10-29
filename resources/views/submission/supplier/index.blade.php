@extends('layouts.app')
@section('content')
<!-- Main Content -->
<main id="mainContent">

    <!-- Card 1 -->
    <!-- Card for PDF Preview -->
    <div class="mt-10 relative w-full max-w-8xl bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-5">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Tahap Penyerahan Dari Pihak Penyedia</h2>
                <a class="m-2 rounded-2xl text-white bg-blue-700 hover:bg-blue-800 p-2" href="{{ route('make.pdf', $activity_name) }}"> Print </a>
            </div>
            <!-- Modal HTML for PDF Preview -->
            <div id="pdfModal">
                <iframe id="pdfFrame" style="width: 100%; height: 80vh; border: none;" src=""></iframe>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            document.getElementById('pdfFrame').src = '/testing-pdf/view/{{ $rkp_id }}';
// Ganti '1' dengan ID yang sesuai
        }
    </script>
        </div>
    </div>

@endsection
