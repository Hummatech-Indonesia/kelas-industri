'schools' => $this->userService->handleGetAllSchool(),
@extends('dashboard.user.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css') }}">
@endsection
@section('content')
    @if ($errors->any())
        <x-errors-component />
    @endif
    <div class="content flex-column-fluid" id="kt_content">
        <div class="card-body p-lg-17">
            <!--begin::About-->
            <div class="mb-18">
                <!--begin::Wrapper-->
                <div class="mb-10">
                    <!--begin::Overlay-->
                    <div class="overlay">
                        <!--begin::Image-->
                        <img class="w-100 card-rounded" src="{{ asset('storage/' . $event->photo) }}" alt="">
                        <!--end::Image-->

                        <!--begin::Links-->
                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25" data-event="{{ $event->id }}">
                            @if (auth()->user()->roles->pluck('name')[0] == 'student')
                                <form action="{{ route('student.events.follow', $event->id) }}" method="POST"
                                    id="form-follow">
                                    @csrf
                                    <button type="button"
                                        class="btn btn-light-primary ms-3 follow-event-btn">Daftar</button>
                                </form>
                            @endif
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Description-->
                <div class="fs-5 fw-semibold text-gray-600">

                    <h1 class="mb-4">{{ $event->title }}</h1>
                    <!--begin::Text-->
                    <div class="mb-8">
                        {!! $event->description !!}
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Description-->
            </div>
            <!--end::About-->

            <!--begin::Section-->
            <div class="mb-16">
                <!--begin::Top-->
                <div class="text-center mb-12">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-gray-900 mb-5">Dokumentasi Event</h3>
                    <!--end::Title-->

                    <!--begin::Text-->
                    {{-- <div class="fs-5 text-muted fw-semibold">
                        Dokumentasi hasil foto
                    </div> --}}
                    <!--end::Text-->
                </div>
                <!--end::Top-->

                <!--begin::Row-->
                <div class="owl-carousel">
                    @foreach ($event->documentations as $documentation)
                        {{-- <div class="col"> --}}
                        <img src="{{ asset('storage/' . $documentation->media) }}" alt=""
                            class="documentation_image col w-300px m-auto"
                            data-image="{{ asset('storage/' . $documentation->media) }}">
                        {{-- </div> --}}
                    @endforeach
                </div>
                <!--end::Row-->
            </div>
            <!--end::Section-->



            <!--begin::Team-->
            <!--end::Team-->



            <!--begin::Card-->

            <!--end::Card-->
        </div>
    </div>

    <div class="modal" tabindex="-1" id="show_image">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <img src="" alt="">
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="add_documentattion">
        <form action="{{ route('admin.eventDocumentation.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title border-0">Modal title</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="photo" class="form-label">Foto Dokumentasi</label>
                            <input type="file" class="form-control" name="photo" id="photo" />
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <x-delete-modal-component />
    @php
        $documentation_count = count($event->documentations);
    @endphp
@endsection
@section('script')
    <script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                items: {{ $documentation_count < 2 ?$documentation_count: 3 }},
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                fixedWidth: 300,
                autoWidth: false,
                center: true,
            });
        });
    </script>

    <script>
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

        $('.documentation_image').click(function() {
            $('#show_image img').attr('src', $(this).data('image'))
            $('#show_image').modal('show')
        })
    </script>
@endsection
