@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Perhitungan
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman Topsis
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    @if ($errors->any())
        <x-errors-component />
    @endif
    <!--begin::Stepper-->
    <div class="stepper stepper-pills" id="kt_stepper_example_clickable">
        <!--begin::Nav-->
        <div class="stepper-nav flex-center flex-wrap mb-10">

            <!--begin::Step 2-->
            <div class="stepper-item mx-8 my-4 current" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                <!--begin::Wrapper-->
                <div class="stepper-wrapper d-flex align-items-center">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">1</span>
                    </div>
                    <!--begin::Icon-->

                    <!--begin::Label-->
                    <div class="stepper-label">
                        <h3 class="stepper-title">
                            Step 1
                        </h3>

                        <div class="stepper-desc">
                            Upload Dataset
                        </div>
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Line-->
                <div class="stepper-line h-40px"></div>
                <!--end::Line-->
            </div>
            <!--end::Step 2-->

            <!--begin::Step 3-->
            <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                <!--begin::Wrapper-->
                <div class="stepper-wrapper d-flex align-items-center">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">2</span>
                    </div>
                    <!--begin::Icon-->

                    <!--begin::Label-->
                    <div class="stepper-label">
                        <h3 class="stepper-title">
                            Step 2
                        </h3>

                        <div class="stepper-desc">
                            verifikasi Data
                        </div>
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Line-->
                <div class="stepper-line h-40px"></div>
                <!--end::Line-->
            </div>
            <!--end::Step 3-->
            <!--begin::Step 3-->
            <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                <!--begin::Wrapper-->
                <div class="stepper-wrapper d-flex align-items-center">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">3</span>
                    </div>
                    <!--begin::Icon-->

                    <!--begin::Label-->
                    <div class="stepper-label">
                        <h3 class="stepper-title">
                            Step 3
                        </h3>

                        <div class="stepper-desc">
                            Konfirmasi Perhitungan
                        </div>
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Line-->
                <div class="stepper-line h-40px"></div>
                <!--end::Line-->
            </div>
            <!--end::Step 3-->
        </div>
        <!--end::Nav-->

        <!--begin::Form-->
        <div class="form mx-auto" novalidate="novalidate" id="kt_stepper_example_basic_form">
            <!--begin::Group-->
            <div class="mb-5">

                <!--begin::Step 1-->
                <div class="flex-column current" data-kt-stepper-element="content">
                    <form id="excelUploadForm" method="POST" action="{{ route('admin.spk.batch.import-excel', $id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <div class="col-lg-10 alert alert-warning" role="alert">
                                <div class="alert-message">
                                    <strong>Catatan:</strong>
                                    <ul>
                                        <li>Silahkan download format file excel di bawah ini.</li>
                                        <li>Isi data sesuai dengan format.</li>
                                        <li>Pilih file, dan klik tombol upload file.</li>
                                        <li>Pastikan anda mendownload ulang format excel jika terdapat perubahan
                                            kriteria maupun alternatif.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-3 text-sm-right">Contoh Format Excel<small
                                    class="text-danger">*</small> </label>
                            <div class="col-sm-6">
                                <a id="download-format" class="btn btn-success cursor-pointer">Download
                                    Format Excel
                                </a>
                            </div>
                        </div>
                        <div class="mb-3 row" hidden>
                            <label class="col-form-label col-sm-3 text-sm-right">Upload Dataset Excel<small
                                    class="text-danger">*</small> </label>
                            <div class="col-sm-6">
                                <input value="{{ $id }}" id="submission_id" autocomplete="off"
                                    name="submission_id" readonly type="text" class="form-control">
                            </div>
                    </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-3 text-sm-right">Upload Dataset <small
                                    class="text-danger">*</small> </label>
                            <div class="col-sm-6">
                                <input id="excel_file" autocomplete="off" name="excel_file" type="file"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-3 text-sm-right"><small
                                    class="text-danger"></small></label>
                            <div class="col-sm-6">
                                <div class="progress">
                                    <div id="upload-progress-bar"
                                        class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                        role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 0"></div>
                                </div>
                                <h5 id="upload-msg" style="display: none" class="mt-3 text-success">File
                                    Berhasil
                                    di
                                    upload</h5>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-sm-3 text-sm-right"><small
                                    class="text-danger"></small></label>
                            <div class="col-sm-6">
                                <button id="btn_excel_file" type="submit" name="submit_excel"
                                    class="btn btn-success">Upload
                                    File
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <!--begin::Step 1-->

                <!--begin::Step 2-->
                <div class="flex-column" data-kt-stepper-element="content" style="min-height: 600px">
                    <div class="mb-3 row">
                        <div class="col-12">
                            <button class="btn btn-danger" type="button" id="load-dataset">Tampilkan data</button>
                            <button class="btn btn-success" type="submit" id="save-dataset">Simpan Perubahan
                            </button>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-12">
                            <table id="datatables-responsive" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama Siswa</th>
                                        <th>Kriteria</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--begin::Step 2-->

                <!--begin::Step 3-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <div class="mb-3 row">
                        <label class="col-form-label col-sm-3 text-sm-right">Catatan <small
                                class="text-danger">*</small> </label>
                        <div class="col-12">
                            <textarea readonly class="form-control" name="terms"
                                      rows="3">"Dengan melakukan konfirmasi dan submit, maka data tidak akan dapat dirubah kembali"</textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="form-check m-0">
                            <input id="confirmation_checkbox" type="checkbox" name="data_confirmation"
                                   class="form-check-input">
                            <span class="form-check-label">Dataset telah benar dan lakukan perhitungan
                                    <small class="text-danger">*</small></span>
                        </label>
                    </div>
                    <div class="mb-3 row">
                        <label class="form-check m-0">
                            <button id="submit-form-button" type="button" class="btn btn-primary" disabled>Submit
                                Data
                            </button>
                        </label>
                    </div>
                </div>
                <!--begin::Step 3-->

            </div>
            <!--end::Group-->

            <!--begin::Actions-->
            <div class="d-flex flex-stack">
                <!--begin::Wrapper-->
                <div class="me-2">
                    <button type="button" class="btn btn-light btn-active-light-primary"
                        data-kt-stepper-action="previous">
                        Back
                    </button>
                </div>
                <!--end::Wrapper-->

                <!--begin::Wrapper-->
                <div>
                    <button type="button" class="btn btn-primary" data-kt-stepper-action="submit">
                        <span class="indicator-label">
                            Submit
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>

                    <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                        Continue
                    </button>
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Form-->
    </div>
    <!--end::Stepper-->
@endsection
@section('script')
    <script>
        // Stepper lement
        var element = document.querySelector("#kt_stepper_example_clickable");

        // Initialize Stepper
        var stepper = new KTStepper(element);

        // Handle navigation click
        stepper.on("kt.stepper.click", function(stepper) {
            stepper.goTo(stepper.getClickedStepIndex()); // go to clicked step
        });

        // Handle next step
        stepper.on("kt.stepper.next", function(stepper) {
            stepper.goNext(); // go next step
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function(stepper) {
            stepper.goPrevious(); // go previous step
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let upload_msg = $('#upload-msg')
            let datatable = null
            let id = `{{ $id }}`


            const showSweetAlert = (title, data) => {
                alert(data.meta.message)
            }

            $('#excel_file').change(() => {
            upload_msg.css('display', 'none')
            $('.progress .progress-bar').css("width", 0 + '%', function() {
                return $(this).attr("aria-valuenow", 0) + "%";
            })

            $('#upload-progress-bar').attr('class',
                'progress-bar progress-bar-striped progress-bar-animated bg-success')
            upload_msg.attr('class', 'mt-3 text-success')
            upload_msg.text("Berhasil Upload File")
        })

        $('#excelUploadForm').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    upload_msg.css('display', 'block');
                    upload_msg.text("Mengupload file...");
                    $('#upload-progress-bar').attr('class', 'progress-bar progress-bar-striped progress-bar-animated bg-primary');
                },
                success: function(response) {
                    upload_msg.attr('class', 'mt-3 text-success');
                    upload_msg.text("Berhasil Upload File");
                    $('.progress .progress-bar').css("width", 100 + '%').attr("aria-valuenow", 100);
                },
                error: function(xhr, status, error) {
                    upload_msg.attr('class', 'mt-3 text-danger');
                    upload_msg.text("Gagal Upload File");
                    $('.progress .progress-bar').css("width", 0 + '%').attr("aria-valuenow", 0);
                }
            });
        });


        $('#load-dataset').on('click', () => {
            let url = `{{ route('admin.spk.retrieve-dataset', ':id') }}`.replace(':id', id);
            datatable = $("#datatables-responsive").DataTable({
                scrollX: true,
                scrollY: '380px',
                paging: true,
                pageLength: `{{ $totalCriterias }}`,
                responsive: true,
                processing: true,
                serverSide: true,
                searching: true,
                ajax: url,
                columns: [{
                        data: 'alternative',
                        name: 'alternative'
                    },
                    {
                        data: 'criteria.name',
                        name: 'criteria.name'
                    },

                    {
                        data: 'score',
                        name: 'score'
                    },
                ]
            });

            $('#load-dataset').attr('disabled', true)
        });

        $('#save-dataset').on('click', function(e) {
            e.preventDefault()

            let array = {}

            let table = document.getElementById('datatables-responsive')
            let tbody = table.childNodes[3]
            let tr = tbody.children
            for (let i = 0; i < tr.length; i++) {
                array[tr[i].getAttribute('id')] = {}
                let td = tr[i].getElementsByTagName('td')
                for (let j = 0; j < td.length; j++) {
                    if (td[j].childNodes[0].name !== undefined) {
                        array[tr[i].getAttribute('id')][td[j].childNodes[0].name] = td[j].childNodes[0].value
                    }

                }
            }
            $.ajax({
                url: `{{ route('admin.spk.update-dataset') }}`,
                method: 'post',
                data: {
                    _token: CSRF_TOKEN,
                    datasets: array
                },
                success: (data) => {
                    showSweetAlert("Berhasil", data)
                },
                error: (err) => {
                    swal({
                        icon: 'error',
                        title: "Terjadi Kesalahan!",
                        text: err.responseJSON.message || err.responseJSON.meta.message,
                    })
                }
            })

        })

        $('#confirmation_checkbox').change((e) => {

            if ($('#confirmation_checkbox').is(':checked')) {
                $('#submit-form-button').attr('disabled', false)
            } else {
                $('#submit-form-button').attr('disabled', true)
            }
        })

        $('#submit-form-button').on('click', () => {
            $.ajax({
                url: `{{ route('admin.spk.batch-results.update', ':id') }}`.replace(':id', id),
                type: 'PUT',
                data: {
                    _token: CSRF_TOKEN
                },
                success: (data) => {
                    window.location.href = `{{ route('admin.spk.batch-results.show', ':id') }}`
                        .replace(':id', id);
                },
                error: (err) => {
                    swal({
                        icon: 'error',
                        title: "Terjadi Kesalahan!",
                        text: err.responseJSON.message || err.responseJSON.meta.message,
                    })
                }
            })
        })
        });
    </script>
    <script>
        $('#download-format').click(function(event) {
            event.preventDefault
            let generationId = $('#generation_id').val()
            let batchId = '{{ $id }}'
            let url = "{{ route('admin.spk.batch.export-excel',['generation' => ':generationId', 'batch' => ':batchId']) }}".replace(':generationId', generationId).replace(':batchId', batchId)

            window.location.href = url
        })
    </script>
@endsection
