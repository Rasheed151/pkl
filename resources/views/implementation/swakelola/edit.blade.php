<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengumuman</title>
    <style>
        /* Reset some default browser styles */
        body,
        h1,
        ul,
        li {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Basic styling for the body */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            color: #333;
            padding: 20px;
        }

        /* Container styling */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading styling */
        h1 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #333;
        }

        /* Alert box styling */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert ul {
            list-style-type: none;
        }

        .alert li {
            margin-bottom: 5px;
        }

        /* Form styling */
        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* Dua kolom untuk berjajar */
            gap: 16px;
            margin-bottom: 20px;
        }

        /* Form field styling */
        .form-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            width: 100%;
            margin: left;
            /* Ensures the form-field takes full width */
        }

        label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.875rem;
            color: #333;
            width: 100%;
            /* Make input, select, textarea full width */
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Button styling */
        button,
        a {
            grid-column: span 2;
            padding: 10px 15px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
        }

        button:hover,
        a:hover {
            background-color: #0056b3;
        }

        textarea {
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.875rem;
            color: #333;
            resize: vertical;
            /* Allow resizing vertically */
        }

        .tombol {
            grid-column: span 2;
            padding: 12px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .tombol:hover {
            background-color: #0056b3;
            transform: scale(1.02);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Data KAK</h1>

        @if ($errors->any())
        <div class="alert">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('swakelola_implementation.update', $swakelola_implementation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-field">
                <label for="discussion" class="block text-sm font-medium text-gray-700">Latar Belakang</label>
                <textarea name="discussion" required placeholder="Jelaskan Latar Belakang Dilaksanakannya Kegiatan Ini"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm resize-none min-h-[80px] max-h-[500px] overflow-y-auto"
                    id="autoResizediscussion">{{ old('discussion', $swakelola_implementation->discussion) }}</textarea>
            </div>
            <div class="form-field">
                <label for="follow_up" class="block text-sm font-medium text-gray-700">Tindak Lanjut</label>
                <textarea name="follow_up" required placeholder="Jelaskan Tindak Lanjut Dilaksanakannya Kegiatan Ini"
                    class="mt-2 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm resize-none min-h-[80px] max-h-[500px] overflow-y-auto"
                    id="autoResizefollow_up">{{ old('follow_up', $swakelola_implementation->follow_up) }}</textarea>
            </div>

            <button type="submit" class="tombol">Update</button>
            <a href="{{ route('swakelola_implementation.index') }}" class="tombol" style="text-align: center;">Kembali</a>
        </form>
    </div>

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
        discussionTextarea.addEventListener('input', function () {
            autoResize(this);
        });

        followUpTextarea.addEventListener('input', function () {
            autoResize(this);
        });
    </script>
</body>

</html>
