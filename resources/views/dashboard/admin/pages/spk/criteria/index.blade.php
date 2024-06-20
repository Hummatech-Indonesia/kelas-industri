@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Kriteria
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman Kriteria
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
       <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

            <!--begin::Button-->
            <a href="{{ route('admin.spk.criteria.create') }}" class="btn btn-dark fw-bold">
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
                        @if ($criterias->count() > 0)
                            <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th data-priority="1">#</th>
                                        <th data-priority="2">Nama</th>
                                        <th data-priority="3">Tipe</th>
                                        <th data-priority="4">Bobot</th>
                                        <th data-priority="5">Action</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($criterias as $criteria)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $criteria->name }}</td>
                                            <td> <span class="badge {{ $criteria->type == "BENEFIT" ? "bg-success text-light-success" : "bg-danger text-light-danger"}}">{{ $criteria->type }}</span> </td>
                                            <td>{{ $criteria->weight }}</td>
                                            <td>
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('admin.spk.criteria.edit', [ 'criterion' => $criteria->id])}}"
                                                    class="btn text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#E4A11B
                                                        " d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z"/></svg></a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Hapus" data-id="{{ $criteria->id }}"
                                                        class="btn  text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto delete"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="red" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        @else
                            <x-empty-component title="Kriteria" />
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
            const url = "{{ route('admin.spk.criteria.destroy', ':id') }}".replace(':id', $(this).data('id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })

        // Datatables Responsive
    });
</script>
@endsection
