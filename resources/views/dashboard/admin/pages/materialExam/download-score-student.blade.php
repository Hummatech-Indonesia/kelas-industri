<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Siswa</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            padding: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .header-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="header-title">
        <h1>Rekapitulasi Nilai Siswa</h1>
        <p>Kelas Industri Hummatech</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No. </th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Sekolah</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($studentSubMaterialExams as $index => $student)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td> {{ $student->student->name }}</td>
                    <td> {{ $student->student->studentSchool->studentClassroom->classroom->name }}</td>
                    <td>{{ $student->student->studentSchool->school->name }}</td>
                    <td>{{ $student->score }}</td>
                </tr>
            @empty
                <x-empty-component title="siswa" />
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d M Y H:i:s') }}</p>
        <p>&copy; {{ date('Y') }} Kelas Industri Hummatech</p>
    </div>
</body>

</html>
