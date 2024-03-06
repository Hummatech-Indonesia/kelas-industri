@extends('dashboard.admin.layouts.app')
@section('content')
<form action="" method="GET">
    <input type="text" name="search" placeholder="search">
    <button type="submit">search</button>
</form>
    <table>
        <tr>
            <th>nama</th>
            <th>email</th>
            <th>nis</th>
            <th>sekolah</th>
            <th>aksi</th>
        </tr>
        @foreach ($users as $user)
            <form action="{{ route('admin.updateSchool') }}" method="POST">
                @method('PATCH')
                @csrf
                <input type="text" name="id" value="{{ $user->id }}" hidden>
                <tr>
                    <td>{{ $user->student->name }}</td>
                    <td>{{ $user->student->email }}</td>
                    <td>{{ $user->student->national_student_id }}</td>
                    <td>
                        <select name="school_id" id="">
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}"
                                    {{ $user->student->studentSchool->school_id == $school->id ? 'selected' : '' }}>
                                    {{ $school->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="submit">update</button>
                    </td>
                </tr>
            </form>
        @endforeach
    </table>
    {{ $users->links('pagination::bootstrap-5') }}
@endsection
