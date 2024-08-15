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
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Tgl. Lahir</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
            {{-- @dd($student->student) --}}
            <tr>
                <td>{{ $student->student->name }}</td>
                <td><a href="mailto:{{ $student->student->email }}">{{ $student->student->email }}</a></td>
                <td>{{ $student->student->phone_number }}</td>
                <td>{{ $student->student->address }}</td>
                <td>{{ Carbon\Carbon::parse($student->student->date_birth)->format('d-m-y') }}</td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</body>
</html>
