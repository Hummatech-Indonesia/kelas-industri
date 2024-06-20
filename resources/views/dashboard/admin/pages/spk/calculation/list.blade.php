@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Batch
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman List Batch
            </p>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    @if ($errors->any())
        <x-errors-component />
    @endif
    <div class="card card-table">
        <div class="card-body">

            <div class="table-responsive table table-product">
                <table class="table theme-table" id="table_id">
                    <thead>
                        <tr>
                            <th>Nama Batch</th>
                            <th>Jumlah Kriteria</th>
                            <th>Jumlah Alternatif</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let table = null

            // Datatables Responsive
            table = $("#table_id").DataTable({
                scrollX: false,
                scrollY: '500px',
                paging: true,
                ordering: true,
                responsive: true,
                pageLength: 10,
                processing: true,
                serverSide: true,
                searching: true,
                ajax: "{{ route('admin.spk.batch.index') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'through_criterias_count',
                        name: 'through_criterias_count'
                    },
                    {
                        data: 'through_alternatives_count',
                        name: 'through_alternatives_count'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row) {
                            let cek;
                            const lines = data.split('\n');
                            const statuses = lines.map(line => {
                                const startIndex = line.indexOf('>') + 1;
                                const endIndex = line.indexOf('</span>');
                                return line.substring(startIndex, endIndex);
                            });

                            statuses[1]
                                if (statuses[1] == 'PENDING') {
                                    cek =
                                        `<span class="badge bg-warning text-light-warning">${statuses[1]}</span>`;
                                } else if (statuses[1]== 'SUCCESS') {
                                    cek =
                                        `<span class="badge bg-success text-light-success">${statuses[1]}</span>`;
                                } else {
                                    cek =
                                        `<span class="badge bg-danger text-light-danger">${statuses[1]}</span>`;
                                }                            
                            return cek;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false
                    }
                ]
            })

            const showSweetAlert = (data) => {
                alert(data.meta.message)
                table.ajax.reload()
            }

            $(document).on('click', '.delete', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: "Apa Anda Yakin?",
                    text: "Klik ya untuk hapus data",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya",
                    dangerMode: true,
                }).then((act) => {
                    if (act.isConfirmed) {
                        $.ajax({
                            url: `{{ route('admin.spk.batch.destroy', ':id') }}`
                                .replace(
                                    ':id', id),
                            responseType: "json",
                            type: 'DELETE',
                            data: {
                                _token: CSRF_TOKEN
                            },
                            success: (data) => {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    icon: 'success',
                                    text: 'Berhasil Menghapus Data'
                                })
                                table.ajax.reload()
                            }
                        })
                    }

                });
            });

        });
    </script>
@endsection
