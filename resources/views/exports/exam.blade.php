<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Arial', sans-serif;
            font-size: 14px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td {
            background-color: #fff;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h3>
        Kelas {{ $exams->first()->studentClassroom->classroom->name }}
    </h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tipe Ujian</th>
                @foreach ($exams->first()->studentClassroom->classroom->devision->criterias()->where('is_default', 0)->get() as $criteria)
                    <th>{{ $criteria->name }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($exams as $exam)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $exam->studentClassroom->studentSchool->student->name }}</td>
                    <td>{{ $exam->task_level }}</td>
                    @foreach ($exam->examCriterias as $criteria)
                        <td>{{ $criteria->score }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
