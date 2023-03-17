@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                {{ $classroom->name }}
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    {{ count($classroom->students) }} Siswa
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ url()->previous() }}"
               class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
        <!--end::Actions-->
    </div>

    {{--    modal import --}}
    <div class="modal fade" tabindex="-1" id="modal-import">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Import Siswa</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('school.importStudents') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!--begin::Alert-->
                        <div class="alert alert-warning d-flex align-items-center p-5">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
                            <span class="svg-icon svg-icon-2hx svg-icon-warning me-4"><svg width="24" height="24"
                                                                                           viewBox="0 0 24 24"
                                                                                           fill="none"
                                                                                           xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3"
      d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
      fill="currentColor"></path>
<path
    d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
    fill="currentColor"></path>
</svg>
</span>
                        </span>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Title-->
                                <h4 class="mb-1 text-dark">Informasi</h4>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <ul>
                                    <li>Jika siswa tidak terimport maka kemungkinan email siswa tersebut telah
                                        digunakan.
                                    </li>
                                    <li>File yang dapat diunggah berupa file excel berekstensi xls, xlsx.</li>
                                    <li>Password siswa secara default adalah <b>password</b></li>
                                    <li>Format pengisian file excel seperti dibawah ini.</li>
                                    <li>
                                        <a href="{{ asset('data-siswa.xlsx') }}" class="btn btn-success btn-sm"><i
                                                class="fas fa-file-excel"></i> Download
                                            Format Excel
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Content-->

                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Alert-->

                        <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                        <div class="col-12">
                            <label for="">File Excel <span class="text-danger">*</span></label>
                            <input type="file" class="form-control mt-3" name="file">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    end modal import --}}

    {{--    modal add student --}}
    <div class="modal fade" tabindex="-1" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Siswa</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('school.students.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                    <div class="modal-body">
                        <!--begin::Alert-->
                        <div class="alert alert-warning d-flex align-items-center p-5">
                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
                            <span class="svg-icon svg-icon-2hx svg-icon-warning me-4"><svg width="24" height="24"
                                                                                           viewBox="0 0 24 24"
                                                                                           fill="none"
                                                                                           xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3"
      d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
      fill="currentColor"></path>
<path
    d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
    fill="currentColor"></path>
</svg>
</span>
                        </span>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Title-->
                                <h4 class="mb-1 text-dark">Informasi</h4>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <ul>
                                    <li>Password siswa secara default adalah <b>password</b></li>
                                </ul>
                                <!--end::Content-->

                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Alert-->

                        <div class="col-12">
                            <label for="">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mt-3" name="name" placeholder="john">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control mt-3" name="email" placeholder="john@gmail.com">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">No Telepon <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mt-3" name="phone_number" placeholder="085xxxxxxxxx">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control mt-3" name="address"
                                      placeholder="jl jendral sudirman no 5"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    end modal add student --}}

    {{--    modal update student --}}
    <div class="modal fade" tabindex="-1" id="modal-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Siswa</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="formStudentEdit" action="{{ route('school.students.store') }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                    <div class="modal-body">

                        <div class="col-12">
                            <label for="">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mt-3" id="studentName" name="name"
                                   placeholder="john">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control mt-3" id="studentEmail" name="email"
                                   placeholder="john@gmail.com">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">No Telepon <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mt-3" id="studentPhone" name="phone_number"
                                   placeholder="085xxxxxxxxx">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="">Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control mt-3" name="address"
                                      placeholder="jl jendral sudirman no 5" id="studentAddress"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    end modal update student --}}

    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            @if($errors->any())
                <div class="col-12">
                    <x-errors-component/>
                </div>
            @endif
            <div class="col-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <div class="col-lg-6">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold text-gray-800">Siswa</span>
                                        <span
                                            class="text-gray-400 mt-1 fw-semibold fs-6">daftar siswa di kelas {{ $classroom->name }}.</span>
                                    </h3>
                                </div>
                                <div class="col-lg-6 d-flex justify-content-end">
                                    <button class="btn btn-light-success h-40px fs-7 me-3" data-bs-toggle="modal"
                                            data-bs-target="#modal-import">Import
                                    </button>
                                    <button class="btn btn-light-primary h-40px fs-7" data-bs-toggle="modal"
                                            data-bs-target="#modal-add">Tambah
                                    </button>
                                </div>
                                <!--end::Title-->
                            </div>
                            <div class="card-body">

                                @if(count($classroom->students) > 0)
                                    <table id="kt_datatable_responsive"
                                           class="table table-striped border rounded gy-5 gs-7">
                                        <thead>
                                        <tr class="fw-semibold fs-6 text-gray-800">
                                            <th data-priority="1">No</th>
                                            <th class="min-w-200px" data-priority="2">Nama</th>
                                            <th data-priority="3">Email</th>
                                            <th data-priority="4">No Telepon</th>
                                            <th class="min-w-100px" data-priority="5">Aksi</th>
                                            <th>Alamat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($classroom->students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->student->name }}</td>
                                                <td>{{ $student->student->email }}</td>
                                                <td>{{ $student->student->phone_number }}</td>
                                                <td>
                                                    <button data-student="{{ $student->student }}"
                                                            class="btn btn-default btn-sm p-1 btn-edit"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal-update"><i
                                                            class="fonticon-setting fs-2 text-warning"></i></button>
                                                    <button class="btn btn-default btn-sm p-1 btn-delete"
                                                            data-id="{{ $student->student->id }}">
                                                        <i class="fonticon-trash-bin fs-2 text-danger"></i></button>
                                                </td>
                                                <td>{{ $student->student->address }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <x-empty-component title="siswa"/>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card body-->
                    <div class="card-body">
                        @if($classroom->teacher)
                            <!--begin::Summary-->


                            <!--begin::User Info-->
                            <div class="d-flex flex-center flex-column py-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="{{ asset('app-assets/media/avatars/300-6.jpg') }}" alt="image">
                                </div>
                                <!--end::Avatar-->

                                <!--begin::Name-->
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">
                                    {{ $classroom->teacher->user->name }} </a>
                                <!--end::Name-->

                                <!--begin::Position-->
                                <div class="mb-9">
                                    <!--begin::Badge-->
                                    <div class="badge badge-lg badge-light-primary d-inline">Guru</div>
                                    <!--begin::Badge-->
                                </div>
                                <!--end::Position-->

                                <!--begin::Info-->
                            </div>
                            <!--end::User Info-->        <!--end::Summary-->

                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold rotate collapsible" data-bs-toggle="collapse"
                                     href="#kt_user_view_details" role="button" aria-expanded="false"
                                     aria-controls="kt_user_view_details">
                                    Detail
                                    <span class="ms-2 rotate-180">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
<span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
<path
    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
    fill="currentColor"></path>
</svg>
</span>
                                        <!--end::Svg Icon-->                </span>
                                </div>
                            </div>
                            <!--end::Details toggle-->

                            <div class="separator"></div>

                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Nomor Rekening</div>
                                    <div
                                        class="text-gray-600">{{ ($classroom->teacher->user->account_number) ? $classroom->teacher->user->account_number : '-' }}
                                        ( {{ ($classroom->teacher->user->bank) ? $classroom->teacher->user->bank : '-' }}
                                        )
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Email</div>
                                    <div class="text-gray-600"><a href="#"
                                                                  class="text-gray-600 text-hover-primary">{{ ($classroom->teacher->user->email) ? $classroom->teacher->user->email : '-' }}</a>
                                    </div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">No Telepon</div>
                                    <div
                                        class="text-gray-600">{{ ($classroom->teacher->user->phone_number) ? $classroom->teacher->user->phone_number : '-' }}</div>
                                    <!--begin::Details item-->
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">Alamat</div>
                                    <div
                                        class="text-gray-600">{{ ($classroom->teacher->user->address) ? $classroom->teacher->user->address : '-' }}
                                    </div>
                                    <!--begin::Details item-->
                                </div>
                            </div>
                            <!--end::Details content-->
                        @else
                            <x-empty-component title="guru"/>
                        @endif
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>
    </div>

    <x-delete-modal-component/>
@endsection
@section('script')
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });

        $('.btn-edit').click(function () {
            const data = $(this).data('student')
            $('#studentName').val(data.name)
            $('#studentEmail').val(data.email)
            $('#studentPhone').val(data.phone_number)
            $('#studentAddress').val(data.address)

            const url = "{{ route('school.students.update', ':id') }}".replace(':id', data.id)
            $('#formStudentEdit').attr('action', url)
        })

        $('.btn-delete').click(function () {
            const url = "{{ route('school.students.destroy', ':id') }}".replace(':id', $(this).data('id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })
    </script>
@endsection
