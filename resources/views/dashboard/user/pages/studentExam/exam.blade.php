@extends('dashboard.exam.layouts.app')

@section('css')
    <style>
        .card .badge {
            width: 30px;
            height: 30px;
            text-align: center;
        }

        .hide {
            display: none !important;
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
        [
            'id' => '759',
            'question' => 'soal 4',
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
                                id="question_{{ $index }}" data-type="{{ $question['type'] }}" role="tabpanel">
                                <div class="bg-primary mx-0 py-5 px-3 p-0 rounded"><span
                                        class="fw-bolder fs-5 text-white">{{ $number++ }}/{{ count($questions) }}
                                        ({{ $question['type'] == 'multiple_choice' ? 'Pilihan Ganda' : 'Essay' }})
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="question mb-9">
                                        <p class="fs-4">{{ $question['question'] }}</p>
                                        {{-- <img src="{{ asset('storage/school-logo/Mask group.png') }}" alt=""> --}}
                                    </div>
                                    <div class="answer ">
                                        @if ($question['type'] == 'multiple_choice')
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                                                <input class="form-check-input" type="radio"
                                                    name="answer_{{ $index }}" value="option1"
                                                    id="option1_{{ $index }}">
                                                <label class="form-check-label text-dark fs-5" for="option1_{{ $index }}">
                                                    {{ $question['option1'] }}
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                                                <input class="form-check-input" type="radio"
                                                    name="answer_{{ $index }}" value="option2"
                                                    id="option2_{{ $index }}">
                                                <label class="form-check-label text-dark fs-5" for="option2_{{ $index }}">
                                                    {{ $question['option2'] }}
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                                                <input class="form-check-input" type="radio"
                                                    name="answer_{{ $index }}" value="option3"
                                                    id="option3_{{ $index }}">
                                                <label class="form-check-label text-dark fs-5" for="option3_{{ $index }}">
                                                    {{ $question['option3'] }}
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                                                <input class="form-check-input" type="radio"
                                                    name="answer_{{ $index }}" value="option4"
                                                    id="option4_{{ $index }}">
                                                <label class="form-check-label text-dark fs-5" for="option4_{{ $index }}">
                                                    {{ $question['option4'] }}
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid form-check-sm mb-4">
                                                <input class="form-check-input" type="radio"
                                                    name="answer_{{ $index }}" value="option5"
                                                    id="option5_{{ $index }}">
                                                <label class="form-check-label text-dark" for="option5_{{ $index }}">
                                                    {{ $question['option5'] }}
                                                </label>
                                            </div>
                                        @else
                                            <div class="mb-10">
                                                <label for="exampleFormControlInput1" class="form-label">Jawaban
                                                    Anda</label>
                                                <textarea class="form-control form-control-solid" id="essay_answer_{{ $index }}" placeholder="Example input"></textarea>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-footer py-5 mt-5">
                                    <div class="d-flex justify-content-end">
                                        <div class="d-flex justify-content-evenly gap-3 text-white">
                                            <span
                                                class="mark d-flex justify-content-center align-items-center rounded bg-warning"
                                                style="width: 32.5px; height: 32.5px;" data-index="{{ $index }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001" />
                                                </svg>
                                            </span>
                                            <span class="prev svg-icon svg-icon-white svg-icon-2hx bg-primary rounded"
                                                data-index="{{ $index - 1 }}" data-type="{{ $question['type'] }}"
                                                {{ $index == 0 ? 'disabled' : ' ' }}>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.33.o3g/2000/svg">
                                                    <path
                                                        d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            @if ($index == count($questions) - 1)
                                                <span data-index="{{ $index + 1 }}" data-type="{{ $question['type'] }}"
                                                    class="next bg-primary rounded d-flex align-items-center px-3"
                                                    {{ $index >= count($questions) - 1 ? 'disabled' : ' ' }}>
                                                    Selesai
                                                </span>
                                            @else
                                                <span data-question="{{ $index }}"
                                                    data-type="{{ $question['type'] }}"
                                                    class="next svg-icon svg-icon-white svg-icon-2hx bg-primary rounded"
                                                    data-index="{{ $index + 1 }}"
                                                    {{ $index >= count($questions) - 1 ? 'disabled' : ' ' }}><svg
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.33.o3g/2000/svg">
                                                        <path
                                                            d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col card p-0">
                <div class="bg-primary mx-0 py-5 px-3 p-0 text-center rounded"><span class="fw-bolder fs-5 text-white">Nomor
                        Soal</span>
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
                            $index = 0;
                        @endphp

                        {{-- pilihan ganda btn --}}
                        @foreach ($questions as $question)
                            @if ($question['type'] == 'multiple_choice')
                                <div class="col p-0 m-0 h-50px w-50px position-relative">
                                    <li class="nav-item border rounded d-flex justify-content-end p-0 m-0 h-100 w-100"
                                        onclick="setAnswer('multiple_choice', {{ $index }})">
                                        <a class="nav-link {{ $index == 0 ? 'active' : '' }} d-flex align-items-center justify-content-center bg-secondary text-dark fw-bolder fs-6 rounded fs-bold m-0 p-0 w-100 "
                                            data-bs-toggle="tab" id="btn_multiple_choice_{{ $index }}"
                                            href="#question_{{ $index }}">{{ $number++ }}
                                            <span
                                                class="indicator position-absolute top-0 end-0 translate-middle p-2 m-0 bg-danger border border-light rounded-circle"
                                                style="left: 45px;"></span>
                                        </a>
                                    </li>
                                </div>
                                @php
                                    $index++;
                                @endphp
                            @endif
                        @endforeach
                        <p class="w-100 text-start">Esai</p>
                        @php
                            $number = 1;
                        @endphp

                        {{-- essay btn --}}
                        @foreach ($questions as $question)
                            @if ($question['type'] == 'essay')
                                <div class="col p-0 m-0 h-50px w-50px position-relative">
                                    <li class="nav-item border rounded d-flex justify-content-end p-0 m-0 h-100 w-100"
                                        onclick="setAnswer('essay', {{ $index }})">
                                        <a class="nav-link {{ $index == 0 ? 'active' : '' }} d-flex align-items-center justify-content-center bg-secondary text-dark fw-bolder fs-6 rounded  m-0 p-0 w-100 "
                                            data-bs-toggle="tab" id="btn_essay_{{ $index }}"
                                            href="#question_{{ $index }}">{{ $number++ }}
                                            <span
                                                class="indicator position-absolute top-0 end-0 translate-middle p-2 m-0 bg-danger border border-light rounded-circle"
                                                style="left: 45px;"></span>
                                        </a>
                                    </li>
                                </div>
                                @php
                                    $index++;
                                @endphp
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
        let prevQuestion = 0;

        const answers = [
            @foreach ($questions as $question)
                {
                    'question_id': '{{ $question['id'] }}',
                    'answer': ''
                },
            @endforeach
        ];

        $('.mark').click(function() {
            setMark($(this).data('index'));
        })

        function setMark(index) {
            if ($('#question_' + index).data('type') === 'multiple_choice') {
                answerInput = $("input[name='answer_" + prevQuestion + "']:checked").val();
                if (answerInput != undefined) {
                    $('#btn_multiple_choice_' + index).toggleClass('bg-warning');
                }
            } else {
                answerInput = $('#essay_answer_' + prevQuestion).val();
                if (answerInput != 'undefined') {
                    $('#btn_essay_' + index).toggleClass('bg-warning');
                }
            }
        }

        function setAnswer(type, questionIndex) {
            let answerInput;

            if ($('#question_' + prevQuestion).data('type') === 'multiple_choice') {
                answerInput = $("input[name='answer_" + prevQuestion + "']:checked").val();
            } else {
                answerInput = $('#essay_answer_' + prevQuestion).val();
            }

            if (typeof answerInput !== 'undefined' && answerInput !== '') {
                answers[prevQuestion].answer = answerInput;

                if ($('#question_' + prevQuestion).data('type') === 'multiple_choice') {
                    $('#btn_multiple_choice_' + prevQuestion).removeClass('bg-secondary');
                    $('#btn_multiple_choice_' + prevQuestion).addClass('bg-primary');
                    $('#btn_multiple_choice_' + prevQuestion + ' .indicator').addClass('hide');
                } else {
                    $('#btn_essay_' + prevQuestion).removeClass('bg-secondary');
                    $('#btn_essay_' + prevQuestion).addClass('bg-primary');
                    $('#btn_essay_' + prevQuestion + ' .indicator').addClass('hide');
                }
            } else {
                if ($('#question_' + prevQuestion).data('type') === 'multiple_choice') {
                    $('#btn_multiple_choice_' + prevQuestion).addClass('bg-secondary');
                    $('#btn_multiple_choice_' + prevQuestion).removeClass('bg-primary');
                    $('#btn_multiple_choice_' + prevQuestion + ' .indicator').removeClass('hide');
                } else {
                    $('#btn_multiple_choice_' + prevQuestion).addClass('bg-secondary');
                    $('#btn_essay_' + prevQuestion).removeClass('bg-primary');
                    $('#btn_essay_' + prevQuestion + ' .indicator').removeClass('hide');
                }
            }
            prevQuestion = questionIndex;
        }

        $(document).on('click', '.next', function() {
            const index = $(this).data('index');
            const prevTab = $('#question_' + prevQuestion);
            const nextTab = $('#question_' + index);
            const nextBtn = $('#btn_' + nextTab.data('type') + "_" + index)
            const prevBtn = $('#btn_' + prevTab.data('type') + "_" + prevQuestion)

            if (index <= {{ count($questions) - 1 }}) {
                prevTab.removeClass('active');
                prevTab.removeClass('show');
                nextTab.addClass('active');
                nextTab.addClass('show');
                nextBtn.addClass('active')
                prevBtn.removeClass('active')
                setAnswer($(this).data('type'), index);
            }
        });

        $(document).on('click', '.prev', function() {
            const index = $(this).data('index');
            const prevTab = $('#question_' + prevQuestion);
            const nextTab = $('#question_' + index);
            const nextBtn = $('#btn_' + nextTab.data('type') + "_" + index)
            const prevBtn = $('#btn_' + prevTab.data('type') + "_" + prevQuestion)

            if (index >= 0) {
                prevTab.removeClass('active');
                prevTab.removeClass('show');
                nextTab.addClass('active');
                nextTab.addClass('show');
                nextBtn.addClass('active')
                prevBtn.removeClass('active')
                setAnswer($(this).data('type'), index);
            }
        });
    </script>
@endsection
