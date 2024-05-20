@extends('dashboard.finance.layout.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Detail Siswa {{ $school->name }}
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List siswa pada {{ $school->name }}
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <form action="" method="get">
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="{{ route('administration.tracking.index') }}"
                    class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                    <i class="bi bi-arrow-left me-2"></i> Kembali
                </a>
            </div>
        </form>
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="card mb-5 mb-xl-8">

            <!--begin::Body-->
            <div class="card-body py-3">
                <form action="" method="get">
                    <div class="d-flex justify-content-start">
                        <div class="d-flex mb-3 gap-3">
                            <input class="form-control me-2" type="text" name="search" placeholder="Cari Siswa"
                                aria-label="Search" value="{{ request('search') }}">
                            <select class="form-select form-select-solid" name="classroom_id" data-control="select2"
                                data-placeholder="Select an option">
                                @foreach ($classrooms as $classroom)
                                    <option {{ request()->classroom_id == $classroom->id ? 'selected' : '' }}
                                        value="{{ $classroom->id }}">
                                        {{ $classroom->name }} - {{ $classroom->devision->name }} -
                                        {{ $classroom->generation->schoolYear->school_year }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-dark fw-bold" type="submit">
                                Cari</button>
                            <a href="{{ route('administration.tracking.showStudent', $school->id) }}" type="button"
                                class="btn btn-light text-light"><i class="fonticon-repeat"></i></a>
                        </div>
                    </div>
                </form>
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th class="min-w-50px">No</th>
                                <th class="min-w-150px">Nama</th>
                                <th class="min-w-200px">No Hp</th>
                                <th class="min-w-150px">Email</th>
                                <th class="min-w-150px">Tanggungan</th>
                                <th class="min-w-100px">Aksi</th>

                            </tr>
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="text-gray-900 fw-bold fs-7">
                                                    {{ $loop->iteration }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="text-gray-900 fw-bold fs-7">{{ $student->student->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <div class="text-gray-900 fw-bold fs-7">
                                                    {{ $student->student->phone_number }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        style="text-overflow: ellipsis;overflow: hidden ;max-width: 200px ;white-space: nowrap">
                                        <span class="text-gray-900 fw-bold fs-7">{{ $student->student->email }}</span>
                                    </td>
                                    <td
                                        style="text-overflow: ellipsis;overflow: hidden ;max-width: 200px ;white-space: nowrap">
                                        <span
                                            class="text-gray-900 fw-bold fs-7">Rp. {{ $student->studentClassroom->classroom->dependent->sum('nominal') - $student->student->payment->sum('total_pay') }}</span>
                                    </td>
                                    <td>
                                        @if ($student->studentClassroom)
                                            <a href="{{ route('administration.payment-detail-student', ['classroom' => $student->studentClassroom->classroom->id, 'user' => $student->student->id]) }}"
                                                class="btn btn-icon btn-bg-light btn-edit btn-active-color-primary btn-sm me-1"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-custom-class="custom-tooltip" data-bs-title="Edit Data"
                                                data-kt-initialized="1">
                                                <i class="fa-regular fa-eye fs-3 text-warning"></i>
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <x-empty-component title="kelas" />
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                    {{-- {{ $newss->links('pagination::bootstrap-5') }} --}}
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.btn-delete').click(function() {
            const url = "{{ route('admin.news.destroy', ':id') }}".replace(':id', $(this).data(
                'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        $('.btn-detail').click(function() {
            var photo = $(this).data('photo');
            var title = $(this).data('title');
            var description = $(this).data('description');
            var date = $(this).data('date');
            $('#title').html(title);
            $('#description').html(description);
            $('#date').html(date);
            $('#photo').attr('src', photo);
            $('#kt_modal_photo').modal('show');
        });
    </script>
@endsection
