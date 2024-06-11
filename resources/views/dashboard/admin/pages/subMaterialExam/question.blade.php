@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <div class="page-title d-flex justify-content-start">
            <!--begin::Title-->
            <div class="">
                <a href="{{ route('admin.exam-question-manual', ['submaterial' => $subMaterialExam->sub_material_id, 'submaterialExam' => $subMaterialExam->id]) }}"
                    class="btn btn-sm btn-primary">
                    Isi Manual
                </a>

                <div class="btn btn-sm btn-success btn-create" data-bs-toggle="modal" data-bs-target="#kt_modal_create">
                    Isi Otomatis
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('admin.sub-material-exam.index') }}"
                class="btn btn-flex btn-warning h-40px fs-7 fw-bold btn-plus">
                Kembali
            </a>
        </div>

    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="text-white fs-4">
                            Terisi {{ count($subMaterialExam->subMaterialExamQuestions) }} Soal
                            Terisi Dari {{ $subMaterialExam->total_multiple_choice + $subMaterialExam->total_essay }} Soal
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            @forelse ($examQuestions as $examQuestion)
                @if ($examQuestion->questionBank->type == 'multiple_choice')
                    <div class="col-12 mb-5">
                        <div class="card">
                            <label class="flex-stack p-5">
                                <span class="badge badge-light-warning d-flex justify-content-start mb-2"
                                    style="width: 85px;">Pilihan Ganda</span>
                                <div class="d-flex justify-content-start text-black mb-5 fs-5 fw-semibold">
                                    <div class="me-3">{{ $loop->iteration }} .</div> {!! $examQuestion->questionBank->question !!}
                                </div>
                                <div class="d-flex justify-content-start text-black mb-2 fs-6">
                                    <div class="me-3">A .</div> {!! $examQuestion->questionBank->option1 !!}
                                </div>
                                <div class="d-flex justify-content-start text-black mb-2 fs-6">
                                    <div class="me-3">B .</div> {!! $examQuestion->questionBank->option2 !!}
                                </div>
                                <div class="d-flex justify-content-start text-black mb-2 fs-6">
                                    <div class="me-3">C .</div> {!! $examQuestion->questionBank->option3 !!}
                                </div>
                                <div class="d-flex justify-content-start text-black fs-6">
                                    <div class="me-3">D .</div> {!! $examQuestion->questionBank->option4 !!}
                                </div>
                                <div class="d-flex justify-content-start text-black fs-6">
                                    <div class="me-3">E .</div> {!! $examQuestion->questionBank->option5 !!}
                                </div>
                                <div class="d-flex justify-content-end text-black fs-6">

                                    <div class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete delete"
                                        data-id="{{ $examQuestion->id }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Hapus Data">
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
                                    <div class="me-3">{{ $loop->iteration }} .</div> {!! $examQuestion->questionBank->question !!}
                                </div>
                                <div class="d-flex justify-content-end text-black fs-6">

                                    <div class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete delete"
                                        data-id="{{ $examQuestion->id }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Hapus Data">
                                        <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                @endif

            @empty
                <div class="col-lg-12 text-center">
                    <img src="{{ asset('user-assets/media/misc/no-data.png') }}" style="width: 300px;" alt="" />
                    <h4>Belum ada soal yang ditambahkan</h4>
                </div>
            @endforelse
            {{ $examQuestions->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="kt_modal_create">
        <div class="modal-dialog modal-md">
            <form action="{{ route('admin.questionBank.auto', $subMaterialExam->id) }}" method="post">
                @method('POST')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Informasi Isi Otomatis</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="d-flex justify-content-center">
                        <img width="50%" src="{{ asset('app-assets/media/illustrations/sigma-1/17-dark.png') }}"
                            alt="" srcset="">
                    </div>
                    <div class="text-center mt-4 fs-4 fw-semibold ms-5 me-5">Soal Ujian akan terisi acak secara
                        otomatis
                        sesuai jumlah belum di isi.
                        <div class="row">
                            <div class="fs-6 mb-4 mt-3">
                                tolong isi filter dibawah untuk menfilter soal berdasarkan waktu diinputkannya soalnya.
                            </div>
                            <div class="col-6">
                                <input type="date" name="start_date" class="form-control form-control-solid" id="">
                            </div>
                            <div class="col-6">
                                <input type="date" name="end_date" class="form-control form-control-solid" id="">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer row d-flex justify-content-center">
                        <button type="button" class="btn btn-danger col-5" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary col-5">Isi Otomatis</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            $(document).on('click', '.delete', function() {
                const url = "{{ route('admin.submaterialExamQuestion.destroy', ':id') }}".replace(':id',
                    $(this).data(
                        'id'))
                $('#form-delete').attr('action', url)

                $('#kt_modal_delete').modal('show')
            })
        });
    </script>
@endsection
