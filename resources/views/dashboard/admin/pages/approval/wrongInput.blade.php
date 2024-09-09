@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="card py-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="text">
                <h1 class="card-title">List Pembenahan Sekolah Siswa</h1>
                <p class="text-muted">Halaman Pembenahan sekolah para siswa</p>
            </div>
                <div class="d-flex justify-content-end gap-4 align-items-center" style="width: 400px; height: 40px">
                    <form action="" method="GET" class="d-flex gap-4">
                        <input type="text" class="form-control form-control-solid form-control-sm" name="search"
                        placeholder="Cari berdasarkan nama" value="{{ request('search') }}">
                        <button class="btn btn-primary btn-sm" type="submit" id="btn-search">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                    <a href="{{ route('admin.studentRegistration') }}" class="btn btn-primary btn-sm">Kembali</a>
                </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped rounded gy-5 gs-7" id="table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th>No</th>
                        <th>nama</th>
                        <th>email</th>
                        <th>nis</th>
                        <th>sekolah</th>
                        <th>kelas</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <form action="{{ route('admin.updateSchool') }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <input type="text" name="id" value="{{ $user->id }}" hidden>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <div class="text-gray-900 fw-bold fs-7">
                                                {{ ($loop->index + 1 + ($users->currentPage() - 1) * $users->perPage()) }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <div class="text-gray-900 fw-bold fs-7">
                                                {{ $user->student->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <div class="text-gray-900 fw-bold fs-7">
                                                {{ $user->student->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <div class="text-gray-900 fw-bold fs-7">
                                                {{ $user->student->national_student_id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <div class="text-gray-900 fw-bold fs-7">
                                                <select name="school_id" class="form-select" id=""
                                                    style="width: 100px;">
                                                    @foreach ($schools as $school)
                                                        <option value="{{ $school->id }}"
                                                            {{ $user->student->studentSchool->school_id == $school->id ? 'selected' : '' }}>
                                                            {{ $school->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <div class="text-gray-900 fw-bold fs-7">
                                                <select name="classroom_id" class="form-select" id=""
                                                    style="width: 100px;">
                                                    @foreach ($classrooms as $classroom)
                                                        <option value="{{ $classroom->id }}"
                                                            {{ $user->student->studentSchool->studentClassroom ? ($user->student->studentSchool->studentClassroom->classroom_id == $classroom->id ? 'selected' : '') : '' }}>
                                                            {{ $classroom->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="submit">Edit</button>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        {{ $users->links('pagination::bootstrap-5') }}
    </div>

@endsection
