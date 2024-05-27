@extends('dashboard.exam.layouts.app')

@section('css')
    <style>
        .card .badge {
            width: 30px;
            height: 30px;
            text-align: center;
        }
    </style>
@endsection

@php
    $questions = [
        [
            'id' => '123',
            'question' => 'soal 1',
            'option1' => 'A',
            'option2' => 'B',
            'option3' => 'C',
            'option4' => 'D',
            'option5' => 'E',
            'type' => 'multiple_choice',
        ],
        [
            'id' => '456',
            'question' => 'soal 2',
            'option1' => 'A',
            'option2' => 'B',
            'option3' => 'C',
            'option4' => 'D',
            'option5' => 'E',
            'type' => 'multiple_choice',
        ],
        [
            'id' => '789',
            'question' => 'soal 3',
            'option1' => 'A',
            'option2' => 'B',
            'option3' => 'C',
            'option4' => 'D',
            'option5' => 'E',
            'type' => 'essay',
        ],
    ];

@endphp
@section('content')
    <div class="container mt-10">
        <div class="row gap-3">
            <div class="col col-md-8 p-0">
                <div class="card" style="height: fit-content;">
                    <div class="tab-content" id="myTabContent">
                        @php
                            $number = 1;
                        @endphp
                        @foreach ($questions as $index => $question)
                            <div class="tab-pane fade show {{ $index == 0 ? 'active' : '' }}"
                                id="{{ $question['type'] == 'multiple_choice' ? 'multipleChoice' : 'essay' }}_{{ $index }}"
                                role="tabpanel">
                                <div class="bg-primary mx-0 py-5 px-3 p-0 rounded"><span
                                        class="fw-bold text-white">{{ $number++ }}/{{ count($questions) }} (Pilihan
                                        Ganda)</span>
                                </div>
                                <div class="card-body">
                                    <div class="question mb-9">
                                        <p>{{ $question['question'] }}</p>
                                        {{-- <img src="{{ asset('storage/school-logo/Mask group.png') }}" alt=""> --}}
                                    </div>
                                    <div class="answer">
                                        @if ($question['type'] == 'multiple_choice')
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexRadioLg">
                                                <label class="form-check-label" for="flexRadioLg">
                                                    {{ $question['option1'] }}
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexRadioLg">
                                                <label class="form-check-label" for="flexRadioLg">
                                                    {{ $question['option2'] }}
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexRadioLg">
                                                <label class="form-check-label" for="flexRadioLg">
                                                    {{ $question['option3'] }}
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexRadioLg">
                                                <label class="form-check-label" for="flexRadioLg">
                                                    {{ $question['option4'] }}
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexRadioLg">
                                                <label class="form-check-label" for="flexRadioLg">
                                                    {{ $question['option5'] }}
                                                </label>
                                            </div>
                                        @else
                                            <div class="mb-10">
                                                <label for="exampleFormControlInput1" class="required form-label">Jawaban
                                                    Anda</label>
                                                <input type="email" class="form-control form-control-solid"
                                                    placeholder="Example input" />
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-footer py-5 mt-5">
                                    <div class="d-flex justify-content-end">
                                        <div class="d-flex justify-content-evenly" style="width: 120px">
                                            <span
                                                class="d-flex justify-content-center align-items-center rounded bg-warning text-light"
                                                style="width: 32.5px; height: 32.5px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001" />
                                                </svg>
                                            </span>
                                            <span class="prev svg-icon svg-icon-light svg-icon-2hx bg-primary rounded"
                                                data-multiple-choice="{{ $index }}"
                                                {{ $index == 0 ? "@disabled(true)" : ' ' }}>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.33.o3g/2000/svg">
                                                    <path
                                                        d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <span data-multiple-choice="{{ $index }}"
                                                class="next svg-icon svg-icon-light svg-icon-2hx bg-primary rounded"
                                                {{ $index >= count($questions)-1 ? "@disabled(true)" : ' ' }}><svg width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.33.o3g/2000/svg">
                                                    <path
                                                        d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        {{-- <ul class="nav nav-tabs nav-line-tabs mb-5 p-0 pb-4 fs-6 row row-cols-5 gap-3 w-100">
                                    <div class="col p-0 m-0 h-50px w-50px">
                                        <li class="nav-item border rounded d-flex justify-content-center p-0 m-0 h-100 w-100">
                                            <a class="nav-link {{ $index == 0 ? 'active' : '' }} d-flex align-items-center justify-content-center m-0 p-0 w-100 "
                                                data-bs-toggle="tab" href="#multipleChoice_1">{{ $number++ }}</a>
                                        </li>
                                    </div>
                                </ul> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col card p-0">
                <div class="bg-primary mx-0 py-5 px-3 p-0 rounded"><span class="fw-bold text-white">Nomor Soal</span>
                </div>
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="m-3 d-flex flex-column align-items-center text-warning fw-bolder bg-warning-subtle rounded"
                        style="width: 200px; height: fit-content;">
                        <span>Siswa Waktu</span>
                        <span class="fs-3">00:00:00</span>
                    </div>
                    <p class="w-100 mt-4 text-start">Pilihan Ganda</p>
                    <ul class="nav nav-tabs nav-line-tabs mb-5 p-0 pb-4 fs-6 row row-cols-5 gap-3 w-100">
                        @php
                            $number = 1;
                        @endphp
                        @foreach ($questions as $index => $question)
                            @if ($question['type'] == 'multiple_choice')
                                <div class="col p-0 m-0 h-50px w-50px">
                                    <li class="nav-item border rounded d-flex justify-content-center p-0 m-0 h-100 w-100">
                                        <a class="nav-link {{ $index == 0 ? 'active' : '' }} d-flex align-items-center justify-content-center m-0 p-0 w-100 "
                                            data-bs-toggle="tab" id="btn_multipleChoice_{{ $index }}"
                                            href="#multipleChoice_{{ $index }}">{{ $number++ }}</a>
                                    </li>
                                </div>
                            @endif
                        @endforeach
                        <p class="w-100 text-start">Esai</p>
                        @php
                            $number = 1;
                        @endphp
                        @foreach ($questions as $index => $question)
                            @if ($question['type'] == 'essay')
                                <div class="col p-0 m-0 h-50px w-50px">
                                    <li class="nav-item border rounded d-flex justify-content-center p-0 m-0 h-100 w-100">
                                        <a class="nav-link d-flex align-items-center justify-content-center m-0 p-0 w-100 "
                                            data-bs-toggle="tab"
                                            href="#essay_{{ $index }}">{{ $number++ }}</a>
                                    </li>
                                </div>
                            @endif
                        @endforeach
                    </ul>
                    <button class="btn btn-primary w-100">Selesai Ujian</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click', '.next', function() {
            const index = $(this).data('multiple-choice') + 1;
            const tab = '#multipleChoice_' + $(this).data('multiple-choice');
            const newTab = '#multipleChoice_' + index;
            const btn = '#btn_multipleChoice_' + $(this).data('multiple-choice');
            const newBtn = '#btn_multipleChoice_' + index;
            console.log(tab);
            console.log(newTab);
            console.log(btn);
            console.log(newBtn);
            $(tab).removeClass('active');
            $(newTab).addClass('active');
            $(btn).removeClass('active');
            $(newBtn).addClass('active');
        });
        $(document).on('click', '.prev', function() {
            const index = $(this).data('multiple-choice') - 1;
            if (index > 0) {
                const tab = '#multipleChoice_' + $(this).data('multiple-choice');
                const newTab = '#multipleChoice_' + index;
                const btn = '#btn_multipleChoice_' + $(this).data('multiple-choice');
                const newBtn = '#btn_multipleChoice_' + index;
                console.log(tab);
                console.log(newTab);
                console.log(btn);
                console.log(newBtn);
                $(tab).removeClass('active');
                $(newTab).addClass('active');
                $(btn).removeClass('active');
                $(newBtn).addClass('active');
            }
        });

        // $('.next').click(function() {
        //     const tab = $('#multipleChoice_' + $(this).data('multiplechoice'));
        //     const btn = $('#btn_multipleChoice_' + $(this).data('multiplechoice'));
        //     console.log($(this).data('multiplechoice'));
        //     tab.removeClass('active');
        //     btn.removeClass('active');
        // });
    </script>
@endsection
