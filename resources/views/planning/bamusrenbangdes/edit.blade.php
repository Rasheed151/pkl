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
                <label for="date">Tanggal</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $bamusrenbangdes->date) }}" required>
            </div>

            <!-- Input untuk jam -->
            <div class="form-field">
                <label for="time">Jam</label>
                <input type="time" class="form-control" id="time" name="time" value="{{ old('time', $bamusrenbangdes->time) }}" required>
            </div>

            <!-- Input untuk tempat -->
            <div class="form-field">
                <label for="place">Tempat</label>
                <input type="text" class="form-control" id="place" name="place" value="{{ old('place', $bamusrenbangdes->place) }}" required>
            </div>

            <!-- Input untuk bahas kegiatan -->
            <div class="form-field">
                <label for="activity_discussion">Bahas Kegiatan</label>
                <textarea class="form-control" id="activity_discussion" name="activity_discussion" required>{{ old('activity_discussion', $bamusrenbangdes->activity_discussion) }}</textarea>
            </div>

            <!-- Input untuk materi pembahasan -->
            <div class="form-field">
                <label for="discussion_material">Materi Pembahasan</label>
                <textarea class="form-control" id="discussion_material" name="discussion_material" required>{{ old('discussion_material', $bamusrenbangdes->discussion_material) }}</textarea>
            </div>

            <!-- Input untuk ketua BPD -->
            <div class="form-field">
                <label for="bpd_leader">Ketua BPD</label>
                <input type="text" class="form-control" id="bpd_leader" name="bpd_leader" value="{{ old('bpd_leader', $bamusrenbangdes->bpd_leader) }}" required>
            </div>

            <!-- Input untuk wakil masyarakat -->
            <div class="form-field">
                <label for="community_representative">Wakil Masyarakat</label>
                <input type="text" class="form-control" id="community_representative" name="community_representative" value="{{ old('community_representative', $bamusrenbangdes->community_representative) }}" required>
            </div>

            <!-- Input untuk pimpinan rapat -->
            <div class="form-field">
                <label for="meeting_leader">Pimpinan Rapat</label>
                <input type="text" class="form-control" id="meeting_leader" name="meeting_leader" value="{{ old('meeting_leader', $bamusrenbangdes->meeting_leader) }}" required>
            </div>

            <!-- Input untuk notulen -->
            <div class="form-field">
                <label for="note">Notulen</label>
                <input type="text" class="form-control" id="note" name="note" value="{{ old('note', $bamusrenbangdes->note) }}" required>
            </div>

            <!-- Input untuk kesepakatan akhir -->
            <div class="form-field">
                <label for="final_agreement">Kesepakatan Akhir</label>
                <textarea class="form-control" id="final_agreement" name="final_agreement" required>{{ old('final_agreement', $bamusrenbangdes->final_agreement) }}</textarea>
            </div>

            <!-- Input dinamis untuk Narasumber -->
            <div class="form-field">
                <label for="resource_person">Narasumber</label>
                <div id="resource_person-list">
                    @foreach ($bamusrenbangdes->resource_person as $index => $resource_person)
                        <div class="input-group mb-2">
                            <input type="text" name="resource_person[]" class="form-control" value="{{ old('resource_person.' . $index, $resource_person->resource_person) }}" required placeholder="Nama Narasumber">
                            <input type="text" name="from[]" class="form-control ms-2" value="{{ old('from.' . $index, $resource_person->from) }}" required placeholder="Asal Narasumber">
                            <button class="btn btn-danger remove-resource_person" type="button">Hapus</button>
                        </div>
                    @endforeach
                </div>
                <button class="btn btn-primary" id="add-resource_person" type="button">Tambah Narasumber</button>
            </div>

            <!-- Tombol untuk submit form -->
            <button type="submit" class="tombol">Update Data</button>
        </form>
    </div>

    <!-- Script untuk menambah dan menghapus resource_person -->
    <script>
    document.getElementById('add-resource_person').addEventListener('click', function() {
        const resourcePersonList = document.getElementById('resource_person-list');
        const newResourcePerson = document.createElement('div');
        newResourcePerson.classList.add('input-group', 'mb-2');
        newResourcePerson.innerHTML = `
            <input type="text" name="resource_person[]" class="form-control" required placeholder="Nama Narasumber">
            <input type="text" name="from[]" class="form-control ms-2" required placeholder="Asal Narasumber">
            <button class="btn btn-danger remove-resource_person" type="button">Hapus</button>
        `;
        resourcePersonList.appendChild(newResourcePerson);
    });

    document.getElementById('resource_person-list').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-resource_person')) {
            e.target.parentElement.remove();
        }
    });
    </script>

</body>

</html>
