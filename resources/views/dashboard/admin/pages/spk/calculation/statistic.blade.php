@extends('dashboard.admin.layouts.app')
@php
    use App\Helpers\SpkHelper;
@endphp
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Statistik 
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                Ranking Perhitungan {{ $batch->name }}
            </p>
            <!--end::Breadcrumb-->
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{ url()->previous() }}"
                class="btn btn-flex btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">
                <i class="bi bi-arrow-left me-2"></i> Kembali
            </a>
        </div>
    </div>
     <!--begin::Content container-->
     <div id="kt_content" class="app-container  container-fluid ">
        <div class="row">
            <div class="card ">
                <div class="card-header card-header-stretch">
                    <h3 class="card-title">Statistik Nilai Kelas {{ $batch->classroom->name }} - {{ $batch->classroom->school->name }}</h3>
                </div>
                <div class="card-body">
                    <div id="chart-criteria">

                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header card-header-stretch">
                    <h3 class="card-title">Ranking Kelas {{ $batch->classroom->name }} - {{ $batch->classroom->school->name }}</h3>
                </div>
                <div class="card-body overflow-x-scroll">
                    <div class="tab-pane fade show active" id="kt_tab_pane_uts_ganjil" role="tabpanel">
                        @if ($alternatives->count() > 0)
                            <table id="kt_datatable_responsive" class="table table-striped border rounded gy-5 gs-7">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th data-priority="1">Peringkat</th>
                                        <th data-priority="2">Nama</th>
                                        <th data-priority="3">Nilai Akhir SPK</th>
                                        @foreach ($batch->classroom->devision->criterias->sortBy('id') as $criteria) 
                                          <th data-priority="{{ $loop->iteration + 3}}">{{ $criteria->name }}</th>
                                        @endforeach
                                            <th>Aksi</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($results as $result)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $result->alternative->studentSchool->student->name }}</td>
                                            <td>{{ $result->final_score }}</td>
                                            @foreach ($alternatives->where('id',$result->alternative_id)->first()->alternative_criterias as $criteria)
                                               <td>{{ $criteria->score * 100 }}</td> 
                                            @endforeach
                                                <td>
                                                    <a href="{{Route('admin.spk.development',$result->alternative_id)}}">
                                                        <button class="btn btn-primary btn-sm p-1">
                                                            Lihat Perkembangan
                                                        </button>
                                                    </a>
                                                </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        @else
                            <x-empty-component title="report" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <x-delete-modal-component />
    </div>
    <!--end::Content container-->

    <!--end::Page title-->

    <!--begin::Actions-->
    <!--end::Actions-->

@endsection
@section('script')
    <script>
        $("#kt_datatable_responsive").DataTable({
            responsive: true
        });

        $("#kt_datatable").DataTable({
            responsive: true
        });


        $('.btn-delete').click(function() {
            const url = "{{ route('admin.exam.destroy', ':id') }}".replace(':id', $(this).data('id'))
            $('#form-delete').attr('action', url)

            $('#kt_modal_delete').modal('show')
        })
        
    </script>
    @php
    $stats = SpkHelper::stats($batch->id);
@endphp
<script>
    var options = {
        series: [{
            name: 'Rata Rata',
            data: @json($stats['score'])
        }],
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 10,
                dataLabels: {
                    position: 'top', // top, center, bottom
                },
            }
        },
        dataLabels: {
            enabled: true,
            offsetY: -20,
            style: {
                fontSize: '12px',
                colors: ["#304758"]
            }
        },

        xaxis: {
            categories: @json($stats['name']),
            position: 'top',
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            },
            crosshairs: {
                fill: {
                    type: 'gradient',
                    gradient: {
                        colorFrom: '#D8E3F0',
                        colorTo: '#BED1E6',
                        stops: [0, 100],
                        opacityFrom: 0.4,
                        opacityTo: 0.5,
                    }
                }
            },
            tooltip: {
                enabled: true,
            }
        },
        yaxis: {
            axisBorder: {
                show: true
            },
            axisTicks: {
                show: true,
            },
            labels: {
                show: true,
            }

        },
        title: {
            text: 'Kriteria Dengan Rata - Rata Tertinggi',
            floating: true,
            offsetY: 330,
            align: 'center',
            style: {
                color: '#444'
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart-criteria"), options);
    chart.render();
</script>
@endsection
