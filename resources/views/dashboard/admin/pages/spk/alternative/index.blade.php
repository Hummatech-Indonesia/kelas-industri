@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Alternative
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman Alternative
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
       <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

            <!--begin::Button-->
            <a href="{{ route('admin.spk.alternative.create') }}" class="btn btn-dark fw-bold">
                Tambah </a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    @if ($errors->any())
        <x-errors-component />
    @endif
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->
                        @if ($alternatives->count() > 0)
                            <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th data-priority="1">#</th>
                                        <th data-priority="2">Nama</th>
                                        <th data-priority="3">Action</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($alternatives as $alternative)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $alternative->name }}</td>
                                            <td>
                                                <a href="{{route('admin.spk.alternative.edit', [ 'alternative' => $alternative->id])}}"
                                                    class="btn btn-bg-light btn-sm btn-color-warning text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Update</a>
                                                    <a data-id="{{ $alternative->id }}"
                                                        class="btn btn-bg-light btn-sm btn-color-danger text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto delete">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        @else
                            <x-empty-component title="Alternatif" />
                        @endif
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>
    </div>
    <x-delete-modal-component/>
@endsection
@section('script')
<script>
    $("#kt_datatable_responsive").DataTable({
        responsive: true
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {

        $(document).on('click', '.delete', function () {
            const url = "{{ route('admin.spk.alternative.destroy', ':id') }}".replace(':id', $(this).data('id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        // Datatables Responsive
    });
</script>
@endsection
