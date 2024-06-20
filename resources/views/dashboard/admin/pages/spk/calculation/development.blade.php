@extends('dashboard.admin.layouts.app')
@php
    use App\Models\BatchResult;
    use App\Models\AlternativeCriteria;
@endphp

@php
$criterias = $alternative->studentSchool->studentClassroom->classroom->devision->criterias()->where('status',1)->orderBy('id')->get();
$data = [];
foreach($criterias as $criteria)
{
    $array = [];
    
    $item = [
        'name' => $criteria->name ,
        'data' => []
];

    array_push($data,$item);
};
@endphp
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">

        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Perkembangan Siswa  {{ $alternative->studentSchool->student->name }}
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted">
                Perkembangan Siswa {{ $alternative->studentSchool->student->name }}
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
        <div class="row mb-4">
            <div class="card">
                <div id="chart"> </div>
            </div>
        </div>
        <div class="row">
            @foreach($batchs as $i => $batch)
            <div class="card ">
                <div class="card-header card-header-stretch">
                    <h3 class="card-title">Perhitungan {{ $batch->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="tab-pane fade show active" id="kt_tab_pane_uts_ganjil" role="tabpanel">
                        @if ($batch->status == 'SUCCESS')
                            <table class="table table-striped border rounded gy-5 gs-7">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th data-priority="1">Peringkat Di Kelas</th>
                                        <th data-priority="3">Nilai Akhir SPK</th>
                                        @foreach ($batch->classroom->devision->criterias->sortBy('id') as $criteria) 
                                          <th data-priority="{{ $loop->iteration + 3}}">{{ $criteria->name }}</th>
                                        @endforeach
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">
                                    @php
                                        $result = BatchResult::query()
                                                    ->whereRelation('alternative','student_school_id',$alternative->student_school_id)
                                                    ->where('batch_id',$batch->id)
                                                    ->first();

                                        $alternatives = AlternativeCriteria::query()
                                                            ->where('alternative_id',$result?->alternative_id)
                                                            ->orderBy('criteria_id')
                                                            ->get();
                                    @endphp
                                    @if($result)
                                        <tr>
                                            <td>{{ $result->rank }}</td>
                                            <td>{{ $result->final_score }}</td>
                                            @foreach ($alternatives as $criteria)
                                                @php
                                                    foreach ($data as $index => $item) {
                                                        if($item['name'] == $criteria->criteria->name){
                                                            array_push($data[$index]['data'],$criteria->score * 100);
                                                        }
                                                    }
                                                @endphp
                                               <td>{{ $criteria->score * 100 }}</td> 
                                            @endforeach
                                        </tr>
                                    @endif
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        @else
                            <x-empty-component title="report" />
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
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

        var options = {
          series: @json($data),
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
        },
        title: {
          text: 'Statistik Perkembangan',
          align: 'left'
        },
        legend: {
          tooltipHoverFormatter: function(val, opts) {
            return val + ' - <strong>' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + '</strong>'
          }
        },
        markers: {
          size: 0,
          hover: {
            sizeOffset: 6
          }
        },
        xaxis: {
          categories: @json(array_reverse($batch->pluck('name')->toArray())),
        },
        tooltip: {
          y: [
            {
              title: {
                formatter: function (val) {
                  return val + " (mins)"
                }
              }
            },
            {
              title: {
                formatter: function (val) {
                  return val + " per session"
                }
              }
            },
            {
              title: {
                formatter: function (val) {
                  return val;
                }
              }
            }
          ]
        },
        grid: {
          borderColor: '#f1f1f1',
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endsection