<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
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
