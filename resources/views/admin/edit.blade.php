<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* General Styles for the Form */
        form {
            width: 60%;
            /* Form occupies 60% of the page width */
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 15px;
            /* Space between form elements */
        }

        /* Style for each input element */
        form input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        /* Focus effect for input fields */
        form input:focus {
            border-color: #4e73df;
            /* Blue border on focus */
            outline: none;
        }

        /* Button Styling */
        form button {
            padding: 12px 20px;
            background-color: #4e73df;
            /* Blue button */
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            align-self: center;
            /* Center the button */
        }

        /* Button hover effect */
        form button:hover {
            background-color: #3a5bbf;
            /* Darker blue on hover */
        }

        /* Label Styling (if you want to use labels with inputs) */
        form label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            form {
                width: 90%;
                /* Adjust form width to 90% on small screens */
            }
        }

        /* Additional Styling for the Form's Button */
        form button:active {
            background-color: #2c4f9d;
            /* Even darker blue when clicked */
        }
    </style>
</head>

<body>
    <form action="{{ route('admin.update', $village_data->user_id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="village" value="{{ $village_data->village }}" required>

        <input type="text" name="subdistrict" value="{{ $village_data->subdistrict }}" required>

        <input type="text" name="district" value="{{ $village_data->district }}" required>

        <input type="text" name="province" value="{{ $village_data->province }}" required>

        <input type="text" name="village_code" value="{{ $village_data->village_code }}" required>

        <input type="text" name="office_address" value="{{ $village_data->office_address }}" required>

        <input type="email" name="email" value="{{ $village_data->email }}" required>

        <input type="text" name="npwp" value="{{ $village_data->npwp }}" required>

        <input type="text" name="pbj_decree_number" value="{{ $village_data->pbj_decree_number }}" required>

        <input type="date" name="pbj_decree_date" value="{{ $village_data->pbj_decree_date }}" required>

        <input type="text" name="dpa_approval_number" value="{{ $village_data->dpa_approval_number }}" required>

        <input type="date" name="dpa_approval_date" value="{{ $village_data->dpa_approval_date }}" required>

        <input type="text" name="village_head_name" value="{{ $village_data->village_head_name }}" required>

        <input type="text" name="fiscal_year" value="{{ $village_data->fiscal_year }}" required>


        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.index') }}" class="tombol" style="text-align: center;">Kembali</a>
    </form>
</body>

</html>