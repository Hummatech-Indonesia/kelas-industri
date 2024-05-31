'schools' => $this->userService->handleGetAllSchool(),
@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Tambah Event
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman tambah event
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('admin.events.schools') }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
        <!--end::Actions-->
    </div>

    @if ($errors->any())
        <x-errors-component />
    @endif
    <div class="content flex-column-fluid" id="kt_content">
        <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data"
            id="update-form">
            <div class="row">
                @method('PATCH')
                @csrf
                <div class="col-12">
                    <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                        <div class="card-header" style="">

                            <div class="card-title">

                                <h3 class="card-label">

                                    Event

                                </h3>

                            </div>

                            <div class="card-toolbar">
                                <div class="btn-group">

                                    <button type="button" class="btn btn-primary font-weight-bolder" id="submit-btn">

                                        <i class="ki ki-check icon-sm"></i>

                                        Simpan

                                    </button>

                                </div>

                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col col-sm-6 row">
                                    {{-- <div class="form-group row mb-3">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Sekolah</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <select name="school_id" class="form-select form-select-solid me-5"
                                                data-control="select2" data-placeholder="Pilih Sekolah (opsional)">
                                                <option value=""></option>
                                                @foreach ($schools as $school)
                                                    @if ($school->id == $event->sschool_id)
                                                        <option value="{{ $school->id }}" selected>{{ $school->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="form-group row mb-3">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Judul</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input class="form-control form-control-solid form-control-lg" name="title"
                                                type="text" value="{{ $event->title }}" placeholder="judul event"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">

                                        <label class="col-xl-3 col-lg-3 col-form-label">Deskripsi</label>

                                        <div class="col-lg-9 col-xl-9">

                                            <textarea rows="5" name="description" type="text" class="form-control form-control-solid"
                                                placeholder="deskripsi tantangan">{{ $event->description }}</textarea>

                                        </div>

                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Foto</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input class="form-control form-control-solid form-control-lg" name="photo"
                                                type="file" placeholder="Masukkan Foto" value="{{ $event->photo }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">

                                        <label class="col-xl-3 col-lg-3 col-form-label">Batas Peserta</label>

                                        <div class="col-lg-9 col-xl-9">
                                            <input class="form-control form-control-solid form-control-lg"
                                                name="limit_participant" type="number"
                                                placeholder="Batas peserta (opsional)" min="1"
                                                value="{{ $event->limit_participant }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Tanggal Mulai</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="input-group" id="kt_td_picker_simple" data-td-target-input="nearest"
                                                data-td-target-toggle="nearest">
                                                <input id="kt_td_picker_basic_2" name="start_date" type="text"
                                                    class="form-control" data-td-target="#kt_td_picker_basic"
                                                    placeholder="{{ $event->start_date }}" autocomplete="off"
                                                    value="{{ $event->start_date }}" />
                                                <span class="input-group-text" data-td-target="#kt_td_picker_basic"
                                                    data-td-toggle="datetimepicker">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Tanggal Berakhir</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="input-group" id="kt_td_picker_simple" data-td-target-input="nearest"
                                                data-td-target-toggle="nearest">
                                                <input id="kt_td_picker_basic_2" name="end_date" type="text"
                                                    class="form-control" data-td-target="#kt_td_picker_basic"
                                                    placeholder="{{ $event->end_date }}" autocomplete="off"
                                                    value="{{ $event->end_date }}" />
                                                <span class="input-group-text" data-td-target="#kt_td_picker_basic"
                                                    data-td-toggle="datetimepicker">
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-6 border-start">
                                    <!--begin::Repeater-->
                                    {{-- <div id="kt_docs_repeater_basic"> --}}
                                    <!--begin::Form group-->
                                    <div class="form-group px-6 row justify-content-center">
                                        <div class="d-flex justify-content-between ps-0">
                                            <!--begin::Title-->
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold text-gray-800">Foto Dokumentasi</span>
                                            </h3>

                                            {{-- <span
                                                class="badge bg-hover-success text-hover-white badge-light-success cursor-pointer"
                                                id="save-documentation">simpan</span> --}}
                                            <!--end::Title-->
                                        </div>

                                        <div class="row row-cols-3 w-100 mt-3" id="documentation-list">
                                            @foreach ($event->documentations as $documentation)
                                                <div class="col wraper position-relative rounded p-0">
                                                    <span
                                                        class="delete-documentation position-absolute bg-danger text-white m-1 top-0 end-0 rounded-1"
                                                        data-id="{{ $documentation->id }}"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor" class="bi bi-dash-lg"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8" />
                                                        </svg></span>
                                                    <img class="w-100 rounded"
                                                        src="{{ asset('storage/' . $documentation->media) }}"
                                                        alt="">
                                                </div>
                                            @endforeach
                                        </div>

                                        <!--begin::Dropzone-->
                                        <div class="dropzone mt-5" id="kt_dropzonejs_example_1">
                                            <!--begin::Message-->
                                            <div class="dz-message needsclick">
                                                <i class="ki-duotone ki-file-up fs-3x text-primary"><span
                                                        class="path1"></span><span class="path2"></span></i>

                                                <!--begin::Info-->
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or
                                                        click to upload.</h3>
                                                    <span class="fs-7 fw-semibold text-gray-500">Upload up to 10
                                                        files</span>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                        </div>
                                        <!--end::Dropzone-->
                                    </div>
                                    <!--end::Form group-->
                                    {{-- </div> --}}
                                    <!--end::Repeater-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3">

                    <div class="card">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <x-delete-modal-component />
@endsection
@section('script')
    <script src="{{ asset('app-assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        // handleGetMentorClassrooms()

        ClassicEditor
            .create(document.querySelector('#kt_docs_ckeditor_classic'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });


        $(document).on('click', '.delete', function() {
            const url = "{{ route('admin.rollingMentor.deleteRollingMentor', ':id') }}".replace(':id', $(this)
                .data(
                    'id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        $(document).ready(function() {
            const datepicker = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic"));
            datepicker.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
            const datepicker2 = new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic_2"));
            datepicker2.dates.formatInput = date => moment(date).format('YYYY-MM-DD H:m:s')
        })
    </script>


    <script src="{{ asset('app-assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('app-assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('app-assets/plugins/custom/draggable/draggable.bundle.js') }}"></script>
    <script src="{{ asset('app-assets/js/custom/documentation/general/draggable/multiple-containers.js') }}"></script>
    <script>
        $("#kt_datepicker_3").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d",
        });

        $("#kt_datepicker_2").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d",
        });

        $("#kt_datepicker_1").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        $('#kt_docs_repeater_basic').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    </script>
    <script>
        function initializeDeleteButtons() {
            $('a[data-repeater-delete]').off('click').on('click', function(e) {
                e.preventDefault();
                $(this).closest('div[data-repeater-item]').remove();
            });
        }

        //     function addNewNoteInput(description = '') {
        //         var $container = $('#notes-container');
        //         var newItem = `
    //     <div data-repeater-item class="form-group row mb-3">
    //         <div class="col-md-10">
    //             <label class="form-label">Foto :</label>
    //             <input type="file" name="documentation" class="form-control mb-2 mb-md-0" placeholder="Masukkan catatan" value="${description}">
    //         </div>
    //         <div class="col-md-2">
    //             <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
    //                 <span class="svg-icon svg-icon-muted svg-icon-3"><svg
    //                                                                         width="24" height="24"
    //                                                                         viewBox="0 0 24 24" fill="none"
    //                                                                         xmlns="http://www.w3.org/2000/svg">
    //                                                                         <path
    //                                                                             d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
    //                                                                             fill="currentColor" />
    //                                                                         <path opacity="0.5"
    //                                                                             d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
    //                                                                             fill="currentColor" />
    //                                                                         <path opacity="0.5"
    //                                                                             d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
    //                                                                             fill="currentColor" />
    //                                                                     </svg>
    //                                                                 </span>Hapus
    //             </a>
    //         </div>
    //     </div>
    // `;
        //         $container.append(newItem);
        //         initializeDeleteButtons();
        //     }

        $('.delete-documentation').click(function(param) {
            var id = $(this).data('id');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Menampilkan konfirmasi SweetAlert
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan tindakan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus saja!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('admin.eventDocumentation.destroy', '') }}/" + id,
                        data: {
                            '_token': csrfToken,
                            'id': id
                        },
                        dataType: "dataType",
                        success: function(response) {
                            location.reload();
                        }
                    });
                }
            });
        });


        var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
            url: "{{ route('admin.eventDocumentation.store-img', $event->id) }}",
            autoProcessQueue: false,
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            parallelUploads: 5,
            accept: function(file, done) {
                if (file.name == "wow.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                this.on("complete", function(file) {
                    if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                        $('#update-form').submit();
                    }
                });
            }
        });

        $('#submit-btn').click(function() {
            if(myDropzone.getQueuedFiles().length > 0) {
                myDropzone.processQueue();
            } else {
                $('#update-form').submit();
            }
        })
    </script>
@endsection
