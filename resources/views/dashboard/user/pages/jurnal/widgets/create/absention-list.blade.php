<div class="col-12 mt-5">
    <div class="card card-custom card-sticky">
        <div class="card-header" style="">

            <div class="card-title">

                <h3 class="card-label">

                    Silakan Isi Data Absensi Siswa

                </h3>

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table gs-7 gy-7 gx-7">
                    <thead>
                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Hadir</th>
                            <th>Ijin</th>
                            <th>Sakit</th>
                            <th>Alfa</th>
                        </tr>
                    </thead>
                    <tbody id="abesntion-list">
                        @if (auth()->user()->roles->pluck('name')[0] == 'teacher')
                            @if (Route::is('teacher.journal.edit'))
                                @foreach ($attendances as $attendance)
                                    <tr class="hide">
                                        <td>{{ $attendance->studentClassroom->studentSchool->student->name }}
                                        </td>
                                        <td>{{ $attendance->studentClassroom->classroom->name }}
                                        </td>
                                        <td class="text-center">
                                            <div
                                                class="form-check form-check-custom form-check-success form-check-solid">
                                                <input class="form-check-input" type="radio" value="hadir"
                                                    name="attendance[{{ $attendance->id }}]"
                                                    {{ $attendance->attendance == 'hadir' ? 'checked' : '' }}>
                                            </div>
                                        <td class="text-center">
                                            <div
                                                class="form-check form-check-custom form-check-warning form-check-solid">
                                                <input class="form-check-input" type="radio" value="ijin"
                                                    name="attendance[{{ $attendance->id }}]"
                                                    {{ $attendance->attendance == 'ijin' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div
                                                class="form-check form-check-custom form-check-danger form-check-solid">
                                                <input class="form-check-input" type="radio" value="sakit"
                                                    name="attendance[{{ $attendance->id }}]"
                                                    {{ $attendance->attendance == 'sakit' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div
                                                class="form-check form-check-custom form-check-danger form-check-solid">
                                                <input class="form-check-input" type="radio" value="alfa"
                                                    name="attendance[{{ $attendance->id }}]"
                                                    {{ $attendance->attendance == 'alfa' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@push('script')
    <script>
        $(document).ready(function() {

            let classroom = $('#classroom').val();
            // console.log(attendances);

            @if (Illuminate\Support\Facades\Route::is('teacher.journal.create'))
            const attendances = @json($attendances);
                getClassroomStudents(classroom)
            @endif

            function appendCurrentAttendances() {
                attendances.forEach(function(attendance) {
                    $('#abesntion-list').append(`<tr>
                                <td>${attendance.student_classroom.student_school.student.name}</td>
                                <td>${attendance.student_classroom.classroom.name}</td>
                                <td class="text-center">
                                    <div class="form-check form-check-custom form-check-success form-check-solid">
                                        <input class="form-check-input" type="radio" value="hadir"
                                            name="attendance[${attendance.student_classroom.student_school.student.id}]" ${attendance.attendance == 'hadir' ? 'checked':''}>
                                    </div>
                                <td class="text-center">
                                    <div class="form-check form-check-custom form-check-warning form-check-solid">
                                        <input class="form-check-input" type="radio" value="ijin"
                                            name="attendance[${attendance.student_classroom.student_school.student.id}]" ${attendance.attendance == 'ijin' ? 'checked':''}>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check form-check-custom form-check-danger form-check-solid">
                                        <input class="form-check-input" type="radio" value="sakit"
                                            name="attendance[${attendance.student_classroom.student_school.student.id}]" ${attendance.attendance == 'sakit' ? 'checked':''}>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check form-check-custom form-check-danger form-check-solid">
                                        <input class="form-check-input" type="radio" value="alfa"
                                            name="attendance[${attendance.student_classroom.student_school.student.id}]" ${attendance.attendance == 'alfa' ? 'checked':''}>
                                    </div>
                                </td>
                            </tr>`)
                });
            }

            $('#classroom').change(function(e) {
                e.preventDefault();
                classroom = $(this).val();

                $('#abesntion-list').empty();
                if (classroom == '{{ $journal->classroom_id }}') {
                    appendCurrentAttendances();
                } else {
                    getClassroomStudents(classroom);
                }

            });

            function getClassroomStudents(classroom) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('teacher.journal.students', '') }}/" + classroom,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);

                        $.each(response.data.students, function(index, student) {
                            $('#abesntion-list').append(list(student))
                        });
                    }
                });
            }


            function list(student) {
                // console.log(student);

                return `<tr>
                                <td>${student.student_school.student.name}</td>
                                <td>${student.classroom.name}</td>
                                <td class="text-center">
                                    <div class="form-check form-check-custom form-check-success form-check-solid">
                                        <input class="form-check-input" type="radio" value="hadir"
                                            name="attendance[${student.id}]" checked>
                                    </div>
                                <td class="text-center">
                                    <div class="form-check form-check-custom form-check-warning form-check-solid">
                                        <input class="form-check-input" type="radio" value="ijin"
                                            name="attendance[${student.id}]">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check form-check-custom form-check-danger form-check-solid">
                                        <input class="form-check-input" type="radio" value="sakit"
                                            name="attendance[${student.id}]">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check form-check-custom form-check-danger form-check-solid">
                                        <input class="form-check-input" type="radio" value="alfa"
                                            name="attendance[${student.id}]">
                                    </div>
                                </td>
                            </tr>`
            }
        });
    </script>
@endpush
