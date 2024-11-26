<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengumuman</title>
    <style>
        /* Reset default browser styles */
        body, h1, ul, li {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Basic body styling */
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
            gap: 16px;
            margin-bottom: 20px;
        }

        /* Form field styling */
        .form-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            width: 100%;
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
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Button styling */
        button {
            padding: 10px 15px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            align-self: end;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Checkbox styling */
        .progress-checkbox {
            margin-right: 8px;
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

        <form action="{{ route('swakelola_schedule.update', $swakelola_schedule->id) }}" method="POST">
            @csrf
            @method('PUT')

            @for ($i = 1; $i <= $implementation_time; $i++)
                <div>
                    <input
                        type="checkbox"
                        name="progress[]"
                        value="{{ $i }}"
                        id="progress_{{ $i }}"
                        {{ $i <= $swakelola_schedule->progress ? 'checked' : '' }}
                        class="progress-checkbox">
                    <label for="progress_{{ $i }}">Hari Ke {{ $i }}</label>
                </div>
            @endfor

            <button type="submit">Update Progres</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get all checkboxes
            const checkboxes = document.querySelectorAll('.progress-checkbox');

            // Validate checkbox sequence
            checkboxes.forEach((checkbox, index) => {
                checkbox.addEventListener('change', function () {
                    if (this.checked) {
                        // Ensure previous checkbox is checked
                        if (index > 0 && !checkboxes[index - 1].checked) {
                            this.checked = false;
                            alert('Anda harus Mengerjakan Progress sebelumnya terlebih dahulu.');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
