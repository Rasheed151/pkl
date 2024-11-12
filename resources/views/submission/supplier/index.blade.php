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
                <a class="m-2 rounded-2xl text-white bg-blue-700 hover:bg-blue-800 p-2" href="{{ route('bamusrenbangdes.preview', $activity_name) }}"> Print </a>
            </div>
            <!-- Modal HTML for PDF Preview -->
            <div id="pdfModal">
                
                <iframe id="pdfFrame4" style="width: 100%; height: 80vh; border: none; margin-bottom: 20px;" src=""></iframe>
                <iframe id="pdfFrame5" style="width: 100%; height: 80vh; border: none; margin-bottom: 20px;" src=""></iframe>
                <iframe id="pdfFrame6" style="width: 100%; height: 80vh; border: none; margin-bottom: 20px;" src=""></iframe>
                <iframe id="pdfFrame7" style="width: 100%; height: 80vh; border: none; margin-bottom: 20px;" src=""></iframe>
                <iframe id="pdfFrame8" style="width: 100%; height: 80vh; border: none; margin-bottom: 20px;" src=""></iframe>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            
            document.getElementById('pdfFrame4').src = "{{ route('Schedule.pdf', $rkp_id) }}";
            document.getElementById('pdfFrame5').src = "{{ route('kak.pdf', $rkp_id) }}";
            document.getElementById('pdfFrame6').src = "{{ route('technical_specifications.pdf', $rkp_id) }}";
            document.getElementById('pdfFrame7').src = "{{ route('price_analysis.pdf', $rkp_id) }}";
            document.getElementById('pdfFrame8').src = "{{ route('price_estimate.pdf', $rkp_id) }}";
        }
    </script>
</main>
@endsection
 