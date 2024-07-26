<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Nomor Hp</th>
            <th>Email</th>
            <th>Kelas</th>
            <th>Devisi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->student->name }}</td>
                <td> {{ $student->student->phone_number }}</td>
                <td>{{ $student->student->email }}</td>
                <td>{{ $student->studentClassroom ? $student->studentClassroom->classroom->name : '-' }}</td>
                <td>{{ $student->studentClassroom ? $student->studentClassroom->classroom->devision->name : '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
