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
            background-color: #f4f6f9;
            color: #333;
            padding: 20px;
        }

        /* Container styling */
        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 25px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading styling */
        h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        /* Alert box styling */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
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
            gap: 20px;
        }

        /* Form field styling */
        .form-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            font-size: 1rem;
            font-weight: 500;
            color: #555;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        select {
            padding: 12px;
            border: 1px solid #d3d3d3;
            border-radius: 8px;
            font-size: 0.95rem;
            color: #333;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Button styling */
        button {
            grid-column: span 2;
            padding: 12px;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, transform 0.2s;
            text-align: center;
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        /* Responsive styling for smaller devices */
        @media (max-width: 768px) {
            form {
                grid-template-columns: 1fr;
            }

            button {
                grid-column: span 1;
            }
            
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
        <h1>Edit Data PKA {{ $data_pka->nama }}</h1>

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

        <form action="{{ route('data_pka.update', $data_pka->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-field">
                <label for="no_sk_kades">No SK Kades</label>
                <input type="text" id="no_sk_kades" name="no_sk_kades" value="{{ $data_pka->no_sk_kades }}" placeholder="Masukkan No SK Kades">
            </div>

            <div class="form-field">
                <label for="tanggal_sk_kades">Tanggal SK Kades</label>
                <input type="date" id="tanggal_sk_kades" name="tanggal_sk_kades" value="{{ $data_pka->tanggal_sk_kades }}" placeholder="Masukkan Tanggal SK Kades">
            </div>

            <button type="submit">Update</button>
            <a href="{{ route('data_pka.index') }}" class="tombol" style="text-align: center;">Kembali</a>
        </form>
    </div>
</body>

</html>
