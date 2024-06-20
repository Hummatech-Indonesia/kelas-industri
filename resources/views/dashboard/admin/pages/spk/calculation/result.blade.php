@php use App\Enums\CriteriaTypeEnum; @endphp
@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Topsis
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <p class="text-muted m-0">
                Halaman Perhitungan Topsis
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
            <!--begin::Step 1-->
            <div class="stepper-item mx-8 my-4 current" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                <!--begin::Wrapper-->
                <div class="stepper-wrapper d-flex align-items-center">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">1</span>
                    </div>
                    <!--end::Icon-->

                    <!--begin::Label-->
                    <div class="stepper-label">
                        <h3 class="stepper-title">
                            1
                        </h3>

                        <div class="stepper-desc">
                            Data Awal
                        </div>
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Line-->
                <div class="stepper-line h-40px"></div>
                <!--end::Line-->
            </div>
            <!--end::Step 1-->

            <!--begin::Step 2-->
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
                            2
                        </h3>

                        <div class="stepper-desc">
                            Normalisasi nilai
                            ke-n
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
                        <span class="stepper-number">3</span>
                    </div>
                    <!--begin::Icon-->

                    <!--begin::Label-->
                    <div class="stepper-label">
                        <h3 class="stepper-title">
                            3
                        </h3>

                        <div class="stepper-desc">
                            Nilai rij
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
            <!--begin::Step 4-->
            <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                <!--begin::Wrapper-->
                <div class="stepper-wrapper d-flex align-items-center">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">4</span>
                    </div>
                    <!--begin::Icon-->

                    <!--begin::Label-->
                    <div class="stepper-label">
                        <h3 class="stepper-title">
                            4
                        </h3>

                        <div class="stepper-desc">
                            Nilai yij (Matriks Normalisasi Terbobot)
                        </div>
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Line-->
                <div class="stepper-line h-40px"></div>
                <!--end::Line-->
            </div>
            <!--end::Step 4-->
            <!--begin::Step 5-->
            <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                <!--begin::Wrapper-->
                <div class="stepper-wrapper d-flex align-items-center">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">5</span>
                    </div>
                    <!--begin::Icon-->

                    <!--begin::Label-->
                    <div class="stepper-label">
                        <h3 class="stepper-title">
                            5
                        </h3>

                        <div class="stepper-desc">
                            Menentukan A+ dan A-
                        </div>
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Line-->
                <div class="stepper-line h-40px"></div>
                <!--end::Line-->
            </div>
            <!--end::Step 5-->
            <!--begin::Step 6-->
            <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                <!--begin::Wrapper-->
                <div class="stepper-wrapper d-flex align-items-center">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">6</span>
                    </div>
                    <!--begin::Icon-->

                    <!--begin::Label-->
                    <div class="stepper-label">
                        <h3 class="stepper-title">
                            6
                        </h3>

                        <div class="stepper-desc">
                            Menentukan D+ dan D-
                        </div>
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Line-->
                <div class="stepper-line h-40px"></div>
                <!--end::Line-->
            </div>
            <!--end::Step 6-->
            <!--begin::Step 7-->
            <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                <!--begin::Wrapper-->
                <div class="stepper-wrapper d-flex align-items-center">
                    <!--begin::Icon-->
                    <div class="stepper-icon w-40px h-40px">
                        <i class="stepper-check fas fa-check"></i>
                        <span class="stepper-number">7</span>
                    </div>
                    <!--begin::Icon-->

                    <!--begin::Label-->
                    <div class="stepper-label">
                        <h3 class="stepper-title">
                            7
                        </h3>

                        <div class="stepper-desc">
                            Menentukan Nilai Preferensi
                        </div>
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Line-->
                <div class="stepper-line h-40px"></div>
                <!--end::Line-->
            </div>
            <!--end::Step 7-->
        </div>
        <!--end::Nav-->

        <!--begin::Form-->
        <div class="form mx-auto" novalidate="novalidate" id="kt_stepper_example_basic_form">
            <!--begin::Group-->
            <div class="mb-5">
                <!--begin::Step 1-->
                <div class="flex-column current" data-kt-stepper-element="content">
                    <div id="dataset" class="tab-pane" role="tabpanel">
                        <h4>Kriteria Awal</h4>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="table-responsive table-product mb-3">
                                    <table class="table theme-table" id="table_id">
                                        <thead>
                                            <tr class="fw-bold">
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Type</th>
                                                <th>Bobot</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($criterias as $criteria)
                                                <tr>
                                                    <td class="fw-bolder">{{ 'C' . $loop->iteration }}</td>
                                                    <td>{{ $criteria->name }}</td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $criteria->type == CriteriaTypeEnum::BENEFIT->value ? 'bg-success text-light-success' : 'bg-danger text-light-danger' }}">{{ $criteria->type }}</span>
                                                    </td>
                                                    <td>{{ $criteria->weight }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <h4>Tabel Perbandingan Alternatif</h4>
                        <div class="table-responsive  table-product">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table theme-table">
                                        <thead class="fw-bold">
                                            <tr>
                                                <th rowspan="1">
                                                    <div class="text-center">Alternatif</div>
                                                </th>
                                                <th colspan="{{ count($criterias) }}">
                                                    <div class="text-center">Criteria</div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="1" class=""></th>
                                                @foreach ($criterias as $criteria)
                                                    <th class="text-primary">{{ 'C' . $loop->iteration }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($alternatives as $alternative)
                                                <tr>
                                                    <td class="text-center fw-bolder text-danger">
                                                        {{ $alternative->studentSchool->student->name }}</td>
                                                    @foreach ($alternative->alternative_criterias as $score)
                                                        <td>{{ $score->score * 100 }}</td>
                                                    @endforeach
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Step 1-->

                <!--begin::Step 2-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <div id="process-squareroot" class="tab-pane" role="tabpanel">
                        <div class="alert alert-warning" role="alert">
                            <div class="alert-message">
                                <strong>Catatan:</strong>
                                <ul>
                                    <li>Rumus Xn = √(∑(w_i * (x_ij / √(∑(x_ij^2)))))</li>
                                    <li>Xn adalah nilai normalisasi dari alternatif ke-n.</li>
                                    <li>w_i adalah bobot kriteria ke-i.</li>
                                    <li> x_ij adalah nilai kriteria ke-i dari alternatif ke-n.</li>

                                </ul>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-product mb-3">
                                    <table class="table theme-table" id="table_id" style="table-layout: fixed;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Normalisasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($xn_datas as $xn_data)
                                                <tr>
                                                    <td class="fw-bolder">{{ 'X' . $loop->iteration }}</td>
                                                    <td>{{ number_format($xn_data, 5, '.', '') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Step 2-->

                <!--begin::Step 3-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <div id="process-rij" class="tab-pane" role="tabpanel">
                        <div class="col-lg-12 alert alert-warning" role="alert">
                            <div class="alert-message">
                                <strong>Catatan:</strong>
                                <ul>
                                    <li>Rumus Rij = Xi / Xn</li>
                                    <li>Xi adalah nilai alternatif pada kriteria tertentu.</li>
                                    <li>Xn adalah nilai Xn sebelumnya yang telah dihitung.</li>

                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-product mb-3">
                                    <div class="row">
                                        @foreach ($relative_weight_datas as $criteria => $rij_datas)
                                            <div class="col-12 col-md-2 mb-3 mt-3" style="flex-grow: 1;">
                                                <table class="table theme-table w-100" id="table_id">
                                                    <tbody>
                                                        @foreach ($rij_datas as $alternative => $score)
                                                            <tr>
                                                                <td class="fw-bolder">
                                                                    {{ 'R(' . $alternative . ',' . $criteria . ')' }}</td>
                                                                <td>{{ $score }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--begin::Step 3-->

                <!--begin::Step 4-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <div id="process-yij" class="tab-pane" role="tabpanel">
                        <div class="alert alert-warning" role="alert">
                            <div class="alert-message">
                                <strong>Catatan:</strong>
                                <ul>
                                    <li>Rumus Yij = Rij * Wi</li>
                                    <li>Rij adalah nilai Rij yang telah dihitung sebelumnya.</li>
                                    <li>Wi adalah bobot (weight) dari kriteria yang terkait dengan Rij.</li>

                                </ul>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-product mb-3">
                                    <div class="row">
                                        @foreach ($yij_datas as $criteria => $data)
                                            <div class="col-12 col-md-2 mb-3 mt-3" style="flex-grow: 1;">
                                                <table class="table theme-table w-100" id="table_id">
                                                    <tbody>
                                                        @foreach ($data as $alternative => $score)
                                                            <tr>
                                                                <td class="fw-bolder">
                                                                    {{ 'Y(' . $alternative . ',' . $criteria . ')' }}</td>
                                                                <td>{{ $score }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--begin::Step 4-->

                <!--begin::Step 5-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <div id="process-ideal" class="tab-pane" role="tabpanel">
                        <div class="alert alert-warning" role="alert">
                            <div class="alert-message">
                                <strong>Catatan:</strong>
                                <ul>
                                    <li>Hitung solusi ideal positif (A+): max(y) jika j adalah benefit, dan min(y) jika
                                        j adalah cost.
                                    </li>
                                    <li>Hitung solusi ideal negatif (A-): max(y) jika j adalah cost, dan min(y) jika j
                                        adalah benefit.
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <h4>Solusi ideal positif A+</h4>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="table-responsive table-product mb-5">
                                    <table class="table theme-table">
                                        <thead>
                                            <tr>
                                                @foreach ($ideal_solution_datas['idealPositive'] as $index => $positive)
                                                    <th class="text-center">{{ 'A' . $index }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($ideal_solution_datas['idealPositive'] as $positive)
                                                    <td class="text-center">{{ $positive }}</td>
                                                @endforeach
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <h4>Solusi ideal negatif A-</h4>
                       <div class="card">
                        <div class="card-body">
                            <div class="table-responsive table-product">
                                <table class="table theme-table">
                                    <thead>
                                        <tr>
                                            @foreach ($ideal_solution_datas['idealNegative'] as $index => $negative)
                                                <th class="text-center">{{ 'A' . $index }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($ideal_solution_datas['idealNegative'] as $negative)
                                                <td class="text-center">{{ $negative }}</td>
                                            @endforeach
                                        </tr>
    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       </div>
                    </div>
                </div>
                <!--begin::Step 5-->

                <!--begin::Step 6-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <div id="process-d" class="tab-pane" role="tabpanel">
                        <div class="alert alert-warning" role="alert">
                            <div class="alert-message">
                                <strong>Catatan:</strong>
                                <ul>
                                    <li>Hitung D+ = sqrt(sum((Xij - A+ij)^2))</li>
                                    <li>Hitung D- = sqrt(sum((Xij - A-ij)^2))</li>
                                    <li>Xij adalah nilai alternatif pada kriteria ke-j</li>
                                    <li>A+ij adalah nilai solusi ideal positif pada kriteria ke-j</li>
                                    <li>A-ij adalah nilai solusi ideal negatif pada kriteria ke-j</li>
                                </ul>
                            </div>
                        </div>

                        <h4>Nilai D+</h4>
                        <div class="card mb-3">
                            <div class="table-responsive table-product mb-5">
                                <div class="card-body">
                                    <table class="table theme-table">
                                        <thead>
                                            <tr>
                                                @foreach ($distance_datas['dPlus'] as $index => $positive)
                                                    <th class="text-center">{{ 'D' . $index }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($distance_datas['dPlus'] as $positive)
                                                    <td class="text-center">{{ $positive }}</td>
                                                @endforeach
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <h4>Nilai D-</h4>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-product">
                                    <table class="table theme-table">
                                        <thead>
                                            <tr>
                                                @foreach ($distance_datas['dMinus'] as $index => $negative)
                                                    <th>{{ 'D' . $index }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($distance_datas['dMinus'] as $negative)
                                                    <td class="text-center">{{ $negative }}</td>
                                                @endforeach
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Step 6-->

                <!--begin::Step 7-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <div id="process-preference" class="tab-pane" role="tabpanel">
                        <div class="alert alert-warning" role="alert">
                            <div class="alert-message">
                                <strong>Catatan:</strong>
                                <ul>
                                    <li>Rumus menghitung nilai preferensi V = D- / (D+ + D-)</li>
                                    <li>D- adalah jarak negatif terdekat dari solusi ideal.</li>
                                    <li>D+ adalah jarak positif terdekat dari solusi ideal</li>

                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-product mt-5">
                                    <h4>Hasil Ranking Alternatif</h4>
                                    <table class="table theme-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Peringkat</th>
                                                <th class="text-center">Alternatif</th>
                                                <th class="text-center">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($batch_preferences as $index => $preference)
                                                <tr class="{{ $loop->first ? 'bg-success' : '' }}">
                                                    <td class="text-center {{ $loop->first ? 'text-white' : '' }}">
                                                        {{ $preference->rank }}</td>
                                                    <td class="text-center {{ $loop->first ? 'text-white' : '' }}">
                                                        {{ $preference->alternative->studentSchool->student->name }}</td>
                                                    <td class="text-center {{ $loop->first ? 'text-white' : '' }}">
                                                        {{ $preference->final_score }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Step 7-->

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
@endsection
