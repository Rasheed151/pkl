<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bamusrenbangdes</title>
    <style>
        /* Reset some default browser styles */
        body, h1, ul, li {
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
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading styling */
        h1 {
            font-size: 1.75rem;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
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
            padding-left: 0;
        }

        .alert li {
            margin-bottom: 5px;
        }

        /* Form styling */
        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 20px;
        }

        /* Form field styling */
        .form-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="time"],
        textarea,
        select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
            color: #333;
            transition: background-color 0.3s, border-color 0.3s;
            background-color: #f9f9f9;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        input[type="time"]:focus,
        select:focus {
            border-color: #007bff;
            background-color: #eef7ff;
            outline: none;
        }

        /* Button styling */
        button {
            grid-column: span 2; /* Make the button span both columns */
            padding: 10px 15px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            align-self: end; /* Align button to the bottom of the form */
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Spacing and alignment */
        .form-field input,
        .form-field select {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Bamusrenbangdes</h1>

        @if ($errors->any())
        <div class="alert">
            <strong>Whoops!</strong> Ada beberapa kesalahan dalam input Anda:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form untuk melakukan update -->
        <form action="{{ route('bamusrenbangdes.update', $bamusrenbangdes->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Input untuk tanggal -->
            <div class="form-field">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $bamusrenbangdes->tanggal) }}" required>
            </div>

            <!-- Input untuk jam -->
            <div class="form-field">
                <label for="jam">Jam</label>
                <input type="time" class="form-control" id="jam" name="jam" value="{{ old('jam', $bamusrenbangdes->jam) }}" required>
            </div>

            <!-- Input untuk tempat -->
            <div class="form-field">
                <label for="tempat">Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat" value="{{ old('tempat', $bamusrenbangdes->tempat) }}" required>
            </div>

            <!-- Input untuk bahas kegiatan -->
            <div class="form-field">
                <label for="bahas_kegiatan">Bahas Kegiatan</label>
                <textarea class="form-control" id="bahas_kegiatan" name="bahas_kegiatan" required>{{ old('bahas_kegiatan', $bamusrenbangdes->bahas_kegiatan) }}</textarea>
            </div>

            <!-- Input untuk materi pembahasan -->
            <div class="form-field">
                <label for="materi_pembahasan">Materi Pembahasan</label>
                <textarea class="form-control" id="materi_pembahasan" name="materi_pembahasan" required>{{ old('materi_pembahasan', $bamusrenbangdes->materi_pembahasan) }}</textarea>
            </div>

            <!-- Input untuk ketua BPD -->
            <div class="form-field">
                <label for="ketua_bpd">Ketua BPD</label>
                <input type="text" class="form-control" id="ketua_bpd" name="ketua_bpd" value="{{ old('ketua_bpd', $bamusrenbangdes->ketua_bpd) }}" required>
            </div>

            <!-- Input untuk wakil masyarakat -->
            <div class="form-field">
                <label for="wakil_masyarakat">Wakil Masyarakat</label>
                <input type="text" class="form-control" id="wakil_masyarakat" name="wakil_masyarakat" value="{{ old('wakil_masyarakat', $bamusrenbangdes->wakil_masyarakat) }}" required>
            </div>

            <!-- Input untuk pimpinan rapat -->
            <div class="form-field">
                <label for="pimpinan_rapat">Pimpinan Rapat</label>
                <input type="text" class="form-control" id="pimpinan_rapat" name="pimpinan_rapat" value="{{ old('pimpinan_rapat', $bamusrenbangdes->pimpinan_rapat) }}" required>
            </div>

            <!-- Input untuk notulen -->
            <div class="form-field">
                <label for="notulen">Notulen</label>
                <input type="text" class="form-control" id="notulen" name="notulen" value="{{ old('notulen', $bamusrenbangdes->notulen) }}" required>
            </div>

            <!-- Input untuk kesepakatan akhir -->
            <div class="form-field">
                <label for="kesepakatan_akhir">Kesepakatan Akhir</label>
                <textarea class="form-control" id="kesepakatan_akhir" name="kesepakatan_akhir" required>{{ old('kesepakatan_akhir', $bamusrenbangdes->kesepakatan_akhir) }}</textarea>
            </div>

            <!-- Input dinamis untuk Narasumber -->
            <div class="form-field">
    <label for="narasumber">Narasumber</label>
    <div id="narasumber-list">
        @foreach ($bamusrenbangdes->narasumbers as $index => $narasumber)
            <div class="input-group mb-2">
                <input type="text" name="narasumber[]" class="form-control" value="{{ old('narasumber.' . $index, $narasumber->narasumber) }}" required placeholder="Nama Narasumber">
                <input type="text" name="dari[]" class="form-control ms-2" value="{{ old('dari.' . $index, $narasumber->dari) }}" required placeholder="Asal Narasumber">
                <button class="btn btn-danger remove-narasumber" type="button">Hapus</button>
            </div>
        @endforeach
    </div>
    <button class="btn btn-primary" id="add-narasumber" type="button">Tambah Narasumber</button>
</div>


            <!-- Tombol untuk submit form -->
            <button type="submit" class="tombol">Update Data</button>
        </form>
    </div>

    <!-- Script untuk menambah dan menghapus narasumber -->
    <script>
    document.getElementById('add-narasumber').addEventListener('click', function() {
        const narasumberList = document.getElementById('narasumber-list');
        const newNarasumber = document.createElement('div');
        newNarasumber.classList.add('input-group', 'mb-2');
        newNarasumber.innerHTML = `
            <input type="text" name="narasumber[]" class="form-control" required placeholder="Nama Narasumber">
            <input type="text" name="dari[]" class="form-control ms-2" required placeholder="Asal Narasumber">
            <button class="btn btn-danger remove-narasumber" type="button">Hapus</button>
        `;
        narasumberList.appendChild(newNarasumber);
    });

    document.getElementById('narasumber-list').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-narasumber')) {
            e.target.parentElement.remove();
        }
    });
</script>

</body>
</html>
