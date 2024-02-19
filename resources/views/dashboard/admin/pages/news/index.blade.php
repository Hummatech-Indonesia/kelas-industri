@extends('dashboard.admin.layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Berita Kelas Industri
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                List Berita pada kelas industri
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <!--end::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ route('admin.news.create') }}" class="btn btn-dark fw-bold h-40px fs-7">
                Tambah
            </a>
        </div>
    </div>
    <div class="card mb-5 mb-xl-8">

        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-50px">No</th>
                            <th class="min-w-150px">Status Utama</th>
                            <th class="min-w-200px">Judul Berita</th>
                            <th class="min-w-150px">Deskripsi</th>
                            <th class="min-w-150px">Tanggal</th>
                            <th class="min-w-100px">Foto</th>
                            <th class="min-w-100px">Aksi</th>

                        </tr>
                    </thead>
                    <!--end::Table head-->

                    <!--begin::Table body-->
                    <tbody>
                        {{-- @dd($newss) --}}
                        @forelse ($newss as $news)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <div class="text-gray-900 fw-bold fs-7">
                                                {{ $loop->iteration }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <form method="POST" action="{{ route('admin.updateStatusNews', $news->id) }}"
                                                onchange="this.submit()">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        name="status" id="flexSwitchCheck{{ $news->id }}"
                                                        {{ $news->status == 'On' ? 'checked' : '' }}
                                                        value="{{ $news->status == 'On' ? 'Off' : 'On' }}">
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheck{{ $news->id }}">
                                                        {{ $news->status == 'Off' ? 'Off' : 'On' }}
                                                    </label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <div class="text-gray-900 fw-bold fs-7">{{ $news->title }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-overflow: ellipsis;overflow: hidden ;max-width: 200px ;white-space: nowrap">
                                    <span class="text-gray-900 fw-bold fs-7">{{ $news->description }}</span>
                                </td>
                                <td>
                                    <span
                                        class="text-gray-900 fw-bold fs-7">{{ Carbon::parse($news->date)->locale('id')->isoFormat('D MMMM YYYY') }}</span>
                                </td>
                                <td>
                                    <div class="symbol symbol-45px me-5">
                                        <img src="{{ asset('storage/' . $news->photo) }}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex ">
                                        <div class="btn btn-icon btn-bg-light btn-active-color-primary btn-detail btn-sm me-1"
                                            data-photo="{{ asset('storage/' . $news->photo) }}"
                                            data-title="{{ $news->title }}" data-description="{{ $news->description }}"
                                            data-date="{{ Carbon::parse($news->date)->locale('id')->isoFormat('D MMMM YYYY') }}"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Lihat Detail">
                                            <i class="fa fa-eye fs-3 text-primary"></i>
                                        </div>

                                        <a href="{{ route('admin.news.edit', $news->id) }}"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Edit Data">
                                            <i class="fonticon-setting fs-2 text-warning"></i> </a>

                                        <div class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn-delete"
                                            data-id="{{ $news->id }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip" data-bs-title="Hapus Data">
                                            <i class="fonticon-trash-bin fs-2 text-danger"></i>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="col-12 text-center">
                                        <!--begin::Illustration-->
                                        <img src="{{ asset('user-assets/media/misc/watch.svg') }}" class="h-150px"
                                            alt="" />
                                        <!--end::Illustration-->

                                        <!--begin::Title-->
                                        <h4 class="fw-bold text-gray-900 my-4">Ups ! Masih Kosong</h4>
                                        <!--end::Title-->

                                        <!--begin::Desctiption-->
                                        <span class="fw-semibold text-gray-700 mb-4 d-block">
                                            anda belum memiliki berita untuk saat ini.
                                        </span>
                                        <!--end::Desctiption-->
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
                {{-- {{ $newss->links() }} --}}
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    <x-delete-modal-component />
    <div class="modal fade" tabindex="-1" id="kt_modal_photo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Detail Berita</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <svg fill="#474761" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960"
                            width="30">
                            <path
                                d="m249-207-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body row">
                    <div class="mb-2" id="date">

                    </div>
                    <div class="text-gray-900 fw-bold fs-3 mb-3" id="title">

                    </div>
                    <p id="description" style="word-break: break-word;">

                    </p>
                    <img src="" id="photo" class="col-12" alt="">
                </div>
            </div>
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
