@extends('dashboard.admin.layouts.app')
@section('css')
    <style>
        #kt_content img {
            width: 300px
        }
    </style>
@endsection
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                Bank Soal {{ $submaterial->title }}
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    List Bank Soal {{ $submaterial->title }}
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Actions-->
        {{-- @dd($submaterial) --}}
        <div class="d-flex align-items-center py-2 py-md-1">

            <!--begin::Button-->
            <a href="{{ route('admin.questionBank', $submaterial->material_id) }}" class="btn btn-dark fw-bold">
                Kembali </a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
        <!--end::Page title-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="card bg-primary mb-5">
            <div class="card-header">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label text-white">Bank Soal Terisi {{ count($questionBanks) }}</span>
                </h3>
                <!--end::Title-->
            </div>
        </div>
        <div class="row">
            @forelse ($questionBanks as $questionBank)
                {{-- @dd($questionBank) --}}
                @if ($questionBank->type == 'multiple_choice')
                    <div class="col-12 mb-5">
                        <div class="card">
                            <label class="flex-stack p-5">
                                <span class="badge badge-light-warning d-flex justify-content-start mb-2"
                                    style="width: 85px;">Pilihan Ganda</span>
                                <div class="d-flex justify-content-start text-black mb-5 fs-5 fw-semibold">
                                    {!! $questionBank->question !!}
                                </div>
                                <div class="d-flex justify-content-start text-black mb-2 fs-6">
                                    <div class="me-3">A .</div> {!! $questionBank->option1 !!}
                                </div>
                                <div class="d-flex justify-content-start text-black mb-2 fs-6">
                                    <div class="me-3">B .</div> {!! $questionBank->option2 !!}
                                </div>
                                <div class="d-flex justify-content-start text-black mb-2 fs-6">
                                    <div class="me-3">C .</div> {!! $questionBank->option3 !!}
                                </div>
                                <div class="d-flex justify-content-start text-black fs-6">
                                    <div class="me-3">D .</div> {!! $questionBank->option4 !!}
                                </div>
                                <div class="d-flex justify-content-start text-black fs-6">
                                    <div class="me-3">E .</div> {!! $questionBank->option5 !!}
                                </div>
                                <div class="d-flex justify-content-end text-black fs-6">
                                    <a href="{{ route('admin.question-bank-edit', $questionBank->id) }}"
                                        class="btn btn-icon btn-bg-light btn-edit btn-active-color-primary btn-sm me-1"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip" data-bs-title="Edit Data">
                                        <i class="fa-regular fa-pen-to-square fs-3 text-warning"></i> </a>
                                    <div class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete"
                                        data-id="{{ $questionBank->id }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Data">
                                        <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                @else
                    <div class="col-12 mb-5">
                        <div class="card">
                            <label class="flex-stack p-5">
                                <span class="badge badge-light-primary d-flex justify-content-start mb-2"
                                    style="width: 85px;">Soal Essay</span>
                                <div class="d-flex justify-content-start text-black mb-5 fs-5 fw-semibold">
                                    {!! $questionBank->question !!}
                                </div>
                                <div class="d-flex justify-content-end text-black fs-6">
                                    <a href="{{ route('admin.question-bank-edit', $questionBank->id) }}"
                                        class="btn btn-icon btn-bg-light btn-edit btn-active-color-primary btn-sm me-1"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip" data-bs-title="Edit Data">
                                        <i class="fa-regular fa-pen-to-square fs-3 text-warning"></i> </a>
                                    <div class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete delete"
                                        data-id="{{ $questionBank->id }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Data">
                                        <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                @endif
            @empty
            @endforelse
            {{ $questionBanks->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            $(document).on('click', '.delete', function() {
                const url = "{{ route('admin.question-bank.destroy', ':id') }}".replace(':id', $(this).data(
                    'id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })
        });
    </script>
@endsection
