<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* General Body Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        /* Heading Styles */
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        /* Form Styles */
        form {
            width: 40%;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        form input {
            width: 96%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        form button {
            display: block;
            width: 100%;
            padding: 10px;
            background: #4e73df;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background: #3a5bbf;
        }

        /* Table Styles */
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        table th,
        table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #4e73df;
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Column Widths */
        table th:nth-child(1),
        table td:nth-child(1) {
            width: 10%;
        }

        table th:nth-child(2),
        table td:nth-child(2) {
            width: 30%;
        }

        table th:nth-child(3),
        table td:nth-child(3) {
            width: 40%;
        }

        table th:nth-child(4),
        table td:nth-child(4) {
            width: 90%;
        }

        /* Actions Column Styles */
        .actions {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        /* Shared Button Styles */
        .actions .btn {
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            color: white;
            border: none;
            cursor: pointer;
        }

        /* Update Button */
        .actions .btn-update {
            background-color: #28a745;
            /* Green */
            transition: background-color 0.3s;
        }

        .actions .btn-update:hover {
            background-color: #218838;
        }

        /* Delete Button */
        .actions .btn-delete {
            background-color: #dc3545;
            /* Red */
            transition: background-color 0.3s;
        }

        .actions .btn-delete:hover {
            background-color: #c82333;
        }

        /* Form Inline Styling */
        .actions .btn-form {
            margin: 0;
            padding: 0;
        }

        /* Logout Button */
        #logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background: #4e73df;
            color: white;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #logout-button:hover {
            background: #3a5bbf;
        }
    </style>
</head>

<body>
    <h1>Admin Form</h1>

    <form action="{{route('admin.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Submit</button>
    </form>

    <h1>User List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td class="actions">
                    <a href="{{ route('admin.edit', $data->id) }}" class="btn btn-update">Update</a>
                    <a href="{{ route('admin.choose', $data->id) }}" class="btn btn-update" style="background-color: goldenrod;">Olah</a>
                    <form action="{{ route('admin.destroy', $data->id) }}" method="POST" class="btn-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Logout button -->
    <button id="logout-button" onclick="document.getElementById('logout-form').submit();">Logout</button>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>

</html>