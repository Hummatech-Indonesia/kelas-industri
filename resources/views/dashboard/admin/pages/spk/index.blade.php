@php
    use App\Helpers\SpkHelper;
    use App\Models\Batch;
@endphp
@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="row justify-content-end mb-4">
        <form action="" class="col-4 d-flex g-2">
            <select name="batches[]" multiple class="form-select form-select-solid me-5 mt-3"
            data-control="select2" id="">
                @foreach ($batches as $batch)
                    <option value="{{ $batch->id }}" {{ in_array($batch->id,request()->batches ? request()->batches : []) ? 'selected' : '' }}>
                        {{ $batch->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary mr-2">
                Cari
            </button>
        </form>
    </div>
    @foreach ($selectedBatches as $batch)  
        <div class="row mt-8">
            <div class="col-lg-4 col-12">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <h5 class="">5 Siswa Dengan Nilai Terbaik {{Batch::findOrFail($batch)->name }}</h5>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="{{ route('admin.spk.statistic', $batch) }}" class="btn btn-primary mb-3">Lihat Statistik</a>
                </div>
                @forelse (SpkHelper::topStudents($batch) as $student)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fs-3 fw-semibold ">{{ $student->alternative->studentSchool->student->name }}</p>
                                </div>
                                <div>
                                    <span class="badge bg-success text-light-success">{{ $student->final_score }}</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fs-5 fw-semibold ">Kelas {{ Batch::findOrFail($batch)->classroom->name }} - {{ $student->alternative->studentSchool->school->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty 
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fs-3 fw-semibold ">Tidak ada data</p>
                                </div>
                                <div>
                                    <span class="badge bg-success text-light-danger">!!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="chart-criteria-{{$batch}}">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('script')
    @foreach ($selectedBatches as $batch)
        @php
            $stats = SpkHelper::stats($batch);
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

            var chart = new ApexCharts(document.querySelector("#chart-criteria-{{$batch}}"), options);
            chart.render();
        </script>
    @endforeach
@endsection
