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

        .answer {

            p,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            p {
                margin: 0 !important;
            }
        }

        .form-check.form-check-custom span {
            margin-left: 10px;
        }

        label img {
            width: 300px !important
        }

        .question img {
            width: 75%!important;
        }

        /* Contoh CSS untuk menyembunyikan elemen UI browser */
        :-webkit-full-screen-ancestor::-webkit-full-page-media,
        :-webkit-full-screen-ancestor:-webkit-full-screen-ancestor,
        :-webkit-full-screen-ancestor::-webkit-full-page-media-controls,
        :-webkit-full-screen-ancestor::-webkit-full-page-media-controls-enclosure,
        :-webkit-full-screen-ancestor::-webkit-media-controls-enclosure {
            display: none !important;
        }
    </style>
@endsection

@php
    use Carbon\Carbon;
    $start = Carbon::now();
    $end = Carbon::make($student_exam->deadline);

    $time = $start->diffInMinutes($end);

    $hours = floor($time / 60);
    $minutes = $time % 60;
    $seconds = $start->diffInSeconds($end) % 60;

    $questions = [];

    foreach ($question_multiple_choice as $index => $question) {
        array_push($questions, [
            'number' => $index + 1,
            'id' => $question->question_number,
            'question' => $question->questionBank->question,
            'option1' => $question->questionBank->option1,
            'option2' => $question->questionBank->option2,
            'option3' => $question->questionBank->option3,
            'option4' => $question->questionBank->option4,
            'option5' => $question->questionBank->option5,
            'type' => 'multiple_choice',
        ]);
    }
    foreach ($question_essay as $index => $question) {
        array_push($questions, [
            'number' => $index + 1,
            'id' => $question->question_number,
            'question' => $question->questionBank->question,
            'type' => 'essay',
        ]);
    }

    // dd()

@endphp
@section('content')
    <div class="container mt-10">
        <div class="row gap-3">
            <div class="col-12 col-md-8 p-0">
                <div class="card" style="height: fit-content;">
                    <div class="tab-content" id="myTabContent">
                        @php
                            $number = 1;
                        @endphp
                        @foreach ($questions as $index => $question)
                            <div class="tab-pane fade show {{ $index == 0 ? 'active' : '' }}"
                                id="question_{{ $index }}" data-type="{{ $question['type'] }}" role="tabpanel">
                                <div class="bg-primary mx-0 py-5 px-3 p-0 rounded"><span
                                        class="fw-bolder fs-5 text-white">{{ $question['number'] }}/{{ $question['type'] == 'multiple_choice' ? count($question_multiple_choice) : count($question_essay) }}
                                        ({{ $question['type'] == 'multiple_choice' ? 'Pilihan Ganda' : 'Essay' }})
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="question mb-9">
                                        <p class="fs-4">{!! $question['question'] !!}</p>
                                        {{-- <img src="{{ asset('storage/school-logo/Mask group.png') }}" alt=""> --}}
                                    </div>
                                    <div class="answer ">
                                        @if ($question['type'] == 'multiple_choice')
                                            <div
                                                class="form-check form-check-custom form-check-solid align-items-center form-check-sm mb-4">
                                                <input class="form-check-input" type="radio"
                                                    name="answer_{{ $index }}" value="option1"
                                                    id="option1_{{ $index }}"
                                                    data-question_number="{{ $question['number'] }}">
                                                <label class="d-flex form-check-label text-dark fs-5"
                                                    for="option1_{{ $index }}">
                                                    A. {!! '<span></span>' . $question['option1'] !!}
                                                </label>
                                            </div>
                                            <div
                                                class="form-check form-check-custom form-check-solid align-items-center form-check-sm mb-4">
                                                <input class="form-check-input" type="radio"
                                                    name="answer_{{ $index }}" value="option2"
                                                    id="option2_{{ $index }}"
                                                    data-question_number="{{ $question['number'] }}">
                                                <label class="d-flex form-check-label text-dark fs-5"
                                                    for="option2_{{ $index }}">
                                                    B. {!! '<span></span>' . $question['option2'] !!}
                                                </label>
                                            </div>
                                            <div
                                                class="form-check form-check-custom form-check-solid align-items-center form-check-sm mb-4">
                                                <input class="form-check-input" type="radio"
                                                    name="answer_{{ $index }}" value="option3"
                                                    id="option3_{{ $index }}"
                                                    data-question_number="{{ $question['number'] }}">
                                                <label class="d-flex form-check-label text-dark fs-5"
                                                    for="option3_{{ $index }}">
                                                    C. {!! '<span></span>' . $question['option3'] !!}
                                                </label>
                                            </div>
                                            <div
                                                class="form-check form-check-custom form-check-solid align-items-center form-check-sm mb-4">
                                                <input class="form-check-input" type="radio"
                                                    name="answer_{{ $index }}" value="option4"
                                                    id="option4_{{ $index }}"
                                                    data-question_number="{{ $question['number'] }}">
                                                <label class="d-flex form-check-label text-dark fs-5"
                                                    for="option4_{{ $index }}">
                                                    D. {!! '<span></span>' . $question['option4'] !!}
                                                </label>
                                            </div>
                                            <div
                                                class="form-check form-check-custom form-check-solid align-items-center form-check-sm mb-4">
                                                <input class="form-check-input" type="radio"
                                                    name="answer_{{ $index }}" value="option5"
                                                    id="option5_{{ $index }}"
                                                    data-question_number="{{ $question['number'] }}">
                                                <label class="d-flex form-check-label text-dark"
                                                    for="option5_{{ $index }}">
                                                    E. {!! '<span></span>' . $question['option5'] !!}
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
                                                {{-- Selanjutnya --}}
                                            </span>
                                            <span
                                                class="prev svg-icon svg-icon-white svg-icon-2hx bg-primary rounded {{ $index == 0 ? 'bg-secondary' : ' ' }}"
                                                data-index="{{ $index - 1 }}" data-type="{{ $question['type'] }}"
                                                {{ $index == 0 ? 'disabled' : ' ' }}>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.33.o3g/2000/svg">
                                                    <path
                                                        d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                {{-- Kembali --}}
                                            </span>
                                            @if ($index == count($questions) - 1)
                                                <span data-index="{{ $index + 1 }}" data-type="{{ $question['type'] }}"
                                                    class="next bg-primary rounded d-flex align-items-center px-3 submit-btn"
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
                <div class="bg-primary mx-0 py-5 px-3 p-0 text-center rounded"><span
                        class="fw-bolder fs-5 text-white">Nomor
                        Soal</span>
                </div>
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="m-3 d-flex flex-column align-items-center text-warning fw-bolder bg-warning-subtle rounded"
                        id="countdown" style="width: 200px; height: fit-content;">
                        <span>Siswa Waktu</span>
                        <span class="fs-3"><span id="hour">00</span>:<span id="minute">00</span>:<span
                                id="second">00</span></span>
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
                                            data-question_number="{{ $question['number'] }}"
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
                    <button class="btn btn-primary w-100 submit-btn">Selesai Ujian</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const answers =
            localStorage.getItem('answers') == null ? [
                @foreach ($questions as $question)
                    {
                        'student_question_number': '{{ $question['id'] }}',
                        'answer': null,
                        @if ($question['type'] == 'multiple_choice')
                            'type': 'multiple_choice'
                        @else
                            'type': 'essay'
                        @endif
                    },
                @endforeach
            ] : JSON.parse(localStorage.getItem('answers'))
        $(document).ready(function() {

            answers.forEach(function(item) {
                if (item.answer != null) {
                    $(`input[value="${item.answer}"][data-question_number="${item.student_question_number}"]`)
                        .prop('checked', true);
                    $(`a[data-question_number="${item.student_question_number}"]`).addClass('bg-primary')
                    $(`a[data-question_number="${item.student_question_number}"]`).removeClass(
                        'bg-secondary')
                    $(`a[data-question_number="${item.student_question_number}"] .indicator`).addClass(
                        'hide')
                }
            })



            function enterFullscreen() {
                var elem = document.documentElement;
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.mozRequestFullScreen) { // Firefox
                    elem.mozRequestFullScreen();
                } else if (elem.webkitRequestFullscreen) { // Chrome, Safari and Opera
                    elem.webkitRequestFullscreen();
                } else if (elem.msRequestFullscreen) { // IE/Edge
                    elem.msRequestFullscreen();
                }
            }

            // Tampilkan tombol kustom saat halaman sudah siap
            document.addEventListener('click', enterFullscreen);
        })
    </script>
    @if ($student_exam->subMaterialExam->cheating_detector)
        <script>
            let openTab = false;

            function showAllert() {
                let countOpentTab = 0;
                $.ajax({
                    type: "PUT",
                    url: "{{ route('tester.exam.opentab', $student_exam->id) }}",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    dataType: "json", // Mengubah dataType menjadi json
                    success: function(response) {
                        countOpentTab = response.openTab;
                        openTab = false;
                        Swal.fire({
                            html: `<div id="alertElement"><p>Sisa kesempatan anda <span class="chance">${
                    3 - countOpentTab
                }</span></p><p class="message">Mohon kerjakan ujian dengan jujur.</p></div>`,
                            title: "Anda terdeteksi membuka tab baru.",
                            icon: "error",
                            confirmButtonText: "Ok",
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: "btn btn-light-primary",
                            },
                        });

                        if (countOpentTab >= 3) {
                            $(".chance").text("habis");
                            $(".message").text("Ujian Anda akan ditutup");
                            setTimeout(() => {
                                submitExam();
                            }, 3000);
                        }
                    },
                });
            }

            // Deteksi jendela tidak aktif/aktif
            window.addEventListener("blur", () => {
                console.log("Jendela tidak aktif");
                if (openTab == false) {
                    openTab = true;
                    showAllert();
                }
            });
            // Deteksi developer tools terbuka
            let devtoolsOpen = false;
            const threshold = 160;

            setInterval(() => {
                if (window.outerHeight - window.innerHeight > threshold) {
                    if (!devtoolsOpen) {
                        devtoolsOpen = true;
                        console.log("Developer Tools terbuka");
                    }
                } else {
                    if (devtoolsOpen) {
                        devtoolsOpen = false;
                        console.log("Developer Tools tertutup");
                    }
                }
            }, 1000);

            // Deteksi pengguna mencoba meninggalkan halaman
            // window.addEventListener('beforeunload', (event) => {
            //     console.log('Pengguna mencoba meninggalkan halaman');
            //     event.returnValue = 'Are you sure you want to leave?';
            // });

            window.addEventListener("popstate", function(event) {
                alert("Anda mengklik tombol kembali!");
                // Menambahkan state history kosong untuk tetap berada di halaman yang sama
                history.pushState(null, "", location.href);
            });
        </script>
    @endif

    {{-- cout down --}}
    <script>
        const hourEl = document.getElementById('hour');
        const minuteEl = document.getElementById('minute');
        const secondEl = document.getElementById('second');

        let hour = {{ $hours }};
        let minute = {{ $minutes }};
        let second = {{ $seconds }};

        // Fungsi untuk memperbarui elemen waktu
        function updateDisplay() {
            hourEl.innerText = hour < 10 ? '0' + hour : hour;
            minuteEl.innerText = minute < 10 ? '0' + minute : minute;
            secondEl.innerText = second < 10 ? '0' + second : second;

            const countDown = $('#countdown');
            if (hour == 0 && minute <= 1) {
                countDown.toggleClass('bg-danger-subtle');
                countDown.toggleClass('text-danger');
            }
        }

        // Inisialisasi tampilan awal
        updateDisplay();

        let count = setInterval(() => {
            second--;

            if (second < 0) {
                second = 59;
                minute--;
            }

            if (minute < 0) {
                minute = 59;
                hour--;
            }

            if (hour < 0) {
                clearInterval(count);
                hour = 0;
                minute = 0;
                second = 0;
            }

            updateDisplay();

            // Jika waktu habis, hentikan interval
            if (hour === 0 && minute === 0 && second === 0) {
                clearInterval(count);
                setAnswer($('#question_' + prevQuestion).data('type'), prevQuestion);
                submitExam();
            }
        }, 1000);
    </script>
    <script>
        let prevQuestion = 0;

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
                if (answerInput != '') {
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

            localStorage.setItem("answers", JSON.stringify(answers));
            console.log(JSON.parse(localStorage.getItem('answers')));
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

        $('.submit-btn').on('click', function() {
            var type = $('#question_' + prevQuestion).data('type')
            setAnswer(type, prevQuestion)

            Swal.fire({
                title: "Apakah anda yakin ingin mengirim jawaban ujian?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-danger",
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    submitExam();
                }
            });
        })


        function submitExam() {
            localStorage.removeItem('answers')
            const groupBy = (array, key) => {
                return array.reduce((result, currentValue) => {
                    const groupKey = currentValue[key];

                    if (!result[groupKey]) {
                        result[groupKey] = [];
                    }

                    result[groupKey].push(currentValue);

                    return result;
                }, {});

            };

            const grupedType = groupBy(answers, 'type');
            $.ajax({
                type: "patch",
                url: "{{ route('tester.exam.submit', ['subMaterialExam' => $student_exam->sub_material_exam_id, 'studentSubmaterialExam' => $student_exam->id]) }}",
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'answer': grupedType.multiple_choice,
                    'answer_essay': grupedType.essay,
                },
                dataType: "json",
                success: function(response) {
                    window.location.replace(
                        "{{ route('tester.exam.show-finish', ['subMaterialExam' => $student_exam->sub_material_exam_id, 'studentSubmaterialExam' => $student_exam->id]) }}"
                    );
                },
                // error: function(err) {
                // }
            });
        }
    </script>
@endsection
