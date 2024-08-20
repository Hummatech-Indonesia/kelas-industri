<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #222;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        td a {
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teachers as $teacher)
            {{-- @dd($student->student) --}}
            <tr>
                <td>{{ $teacher->name }}</td>
                <td><a href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a></td>
                <td>{{ $teacher->teacherSchool->teacherClassroom->classroom->name }}</td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</body>
</html>
