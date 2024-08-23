<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #333;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
            vertical-align: middle;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td a {
            color: #007BFF;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="4">Nama</th>
                <th colspan="4">Email</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teachers as $teacher)
                <tr>
                    <td colspan="4">{{ $teacher->name }}</td>
                    <td colspan="4"><a href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a></td>
                    <td>{{ $teacher->teacherSchool?->teacherClassroom?->classroom?->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Data tidak tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
