@extends('dashboard.admin.layouts.app')
@section('content')
    <!--begin::Alert-->
    <div class="alert alert-warning d-flex align-items-center p-5">
        <!--begin::Icon-->
        <span class="svg-icon svg-icon-2hx svg-icon-primary me-3">
            <span class="svg-icon svg-icon-2hx svg-icon-warning me-4"><svg width="24" height="24" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
            <h4 class="mb-1 text-dark">INFORMASI PENTING</h4>
            <!--end::Title-->
            <!--begin::Content-->
            <ul>
                <li>Harap memilih tipe soal terlebih dahalu
                </li>
                <li>Pilih soal sesuai tipe soal yang anda pilih</li>
            </ul>
            <!--end::Content-->

        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Alert-->

    <form action="">
        <div class="d-flex justify-content-start align-items-end mb-3">
            <div class="me-2">
                <label for="" class="form-label">Tanggal Mulai</label>
                <input type="date" name="start_at" id="" class="form-control form-control-solid" value="{{ request()->start_at }}">
            </div>
            <div class="me-2">
                <label for="" class="form-label">Tanggal Selesai</label>
                <input type="date" name="end_at" id="" class="form-control form-control-solid" value="{{ request()->end_at }}">
            </div>
            <div class="me-2">
                <label for="" class="form-label">Tipe Soal</label>
                <select name="type" class="form-select form-select-solid" id="">
                    <option value="multiple_choice" {{ isset(request()->type) && request()->type == 'multiple_choice'? 'selected': '' }}>Pilihan Ganda</option>
                    <option value="essay" {{ isset(request()->type) && request()->type == 'essay'? 'selected': '' }}>Essay</option>
                </select>
            </div>
            <div class="me-2">
                <button type="submit" class="btn btn-sm btn-primary" style="padding-top: 11px; padding-bottom: 11px;">Filter</button>
            </div>
            <div class="me-2">
                <a href="{{ route('admin.material-exam-question-manual', ['material' => request()->material, 'materialExam' => request()->materialExam]) }}" class="btn btn-sm btn-primary" style="padding-top: 11px; padding-bottom: 11px;    ">Reset</a>
            </div>
        </div>
    </form>

    <div class="content flex-column-fluid" id="kt_content">
        <form action="{{ route('admin.material-questionBank.manual', $materialExam->id) }}" method="post">
            @method('POST')
            @csrf
            <div class="page-title d-flex justify-content-between mb-5">
                <!--begin::Title-->
                <button class="btn btn-sm btn-primary" type="submit">
                    Simpan
                </button>
                <a href="{{ route('admin.materialExam-question', $materialExam->id) }}"
                    class="btn btn-flex btn-warning h-40px fs-7 fw-bold btn-plus">
                    Kembali
                </a>
            </div>

            <div class="content flex-column-fluid" id="kt_content">
                <div class="row">
                    <div class="col">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <div class="text-white fs-4">
                                    Pilih soal manual untuk Test soal {{ $materialExam->material->title }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    @forelse ($materialQuestions as $materialQuestion)
                        @if ($materialQuestion->type == 'multiple_choice')
                            <div class="col-12 mb-5">
                                <!--begin::Radio group-->
                                <div class="card">
                                    <div class="btn btn-outline btn-outline-dashed btn-active-light-primary flex-stack p-5">
                                        <!--end::Description-->

                                        <!--begin::Radio-->
                                        <div
                                            class="form-check form-check-custom form-check-solid form-check-sm d-flex justify-content-between">
                                            <div>
                                                <span class="badge badge-light-warning d-flex justify-content-start mb-2"
                                                    style="width: 85px;">Pilihan Ganda</span>
                                                <div class="text-black d-flex justify-content-start mb-5">
                                                    {!! $materialQuestion->question !!}
                                                </div>
                                                <div class="d-flex justify-content-start text-black">
                                                    <div class="me-2">A .</div> {!! $materialQuestion->option1 !!}
                                                </div>
                                                <div class="d-flex justify-content-start text-black">
                                                    <div class="me-2">B .</div>{!! $materialQuestion->option2 !!}
                                                </div>
                                                <div class="d-flex justify-content-start text-black">
                                                    <div class="me-2">C .</div> {!! $materialQuestion->option3 !!}
                                                </div>
                                                <div class="d-flex justify-content-start text-black">
                                                    <div class="me-2">D .</div> {!! $materialQuestion->option4 !!}
                                                </div>
                                                <div class="d-flex justify-content-start text-black">
                                                    <div class="me-2">E .</div> {!! $materialQuestion->option5 !!}
                                                </div>
                                            </div>
                                            <div class="" style="margin-bottom: 20%;">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $materialQuestion->id }}" name="question_bank_id[]"
                                                    id="flexRadioLg" />
                                                <input type="hidden" name="type" value="multiplechoice" id="">

                                            </div>
                                        </div>

                                        <!--end::Radio-->
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Radio group-->
                            </div>
                        @else
                            <div class="col-12 mb-5">
                                <!--begin::Radio group-->
                                <div class="card">
                                    <div class="btn btn-outline btn-outline-dashed btn-active-light-primary flex-stack p-5">
                                        <!--end::Description-->

                                        <!--begin::Radio-->
                                        <div
                                            class="form-check form-check-custom form-check-solid form-check-sm d-flex justify-content-between">
                                            <div>
                                                <span class="badge badge-light-primary d-flex justify-content-start mb-2"
                                                    style="width: 85px;">Soal Essay</span>
                                                <div class="text-black d-flex justify-content-start mb-5">
                                                    {!! $materialQuestion->question !!}
                                                </div>

                                            </div>
                                            <div>
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $materialQuestion->id }}" name="question_bank_id[]"
                                                    id="flexRadioLg" />

                                            </div>
                                        </div>

                                        <!--end::Radio-->
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Radio group-->
                            </div>
                        @endif

                    @empty
                        <div class="col-lg-12 text-center">
                            <img src="{{ asset('user-assets/media/misc/no-data.png') }}" style="width: 300px;"
                                alt="" />
                            <h4>Soal tidak tersedia</h4>
                        </div>
                    @endforelse
                    {{ $materialQuestions->links('pagination::bootstrap-5') }}
                </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        const cards = document.getElementsByClassName(
            'btn btn-outline btn-outline-dashed btn-active-light-primary flex-stack p-5');

        Array.from(cards).forEach(card => {

            const checkbox = card.querySelector('.form-check-input');

            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    card.classList.add('active');
                } else {
                    card.classList.remove('active');
                }
            });
        });
    </script>
@endsection
