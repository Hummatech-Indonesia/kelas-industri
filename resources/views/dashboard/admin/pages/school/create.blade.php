@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bold my-1 fs-3">
                Overview
            </h1>
            <!--end::Title-->


            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">
                    <a href="../../index-2.html" class="text-gray-600 text-hover-primary">
                        Home                            </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">
                    User Profile                                            </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-500">
                    Overview                    </li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-2 py-md-1">

            <!--begin::Button-->
            <a href="#" class="btn btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">
                Tambah            </a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    <div class="content flex-column-fluid" id="kt_content">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom card-sticky" id="kt_page_sticky_card">

                    <div class="card-header" style="">

                        <div class="card-title">

                            <h3 class="card-label">

                                Silakan Isi Data Sekolah

                            </h3>

                        </div>

                        <div class="card-toolbar">

                            <a href="https://class.hummasoft.com/admin/sekolah" class="btn btn-light-primary font-weight-bolder me-2">

                                <i class="ki ki-long-arrow-back icon-sm"></i>

                                Kembali

                            </a>

                            <div class="btn-group">

                                <button type="submit" class="btn btn-primary font-weight-bolder">

                                    <i class="ki ki-check icon-sm"></i>

                                    Simpan

                                </button>

                            </div>

                        </div>

                    </div>

                    <div class="card-body">

                       <div class="row">
                           <div class="form-group row mb-3">

                               <label class="col-xl-3 col-lg-3 col-form-label">Nama</label>

                               <div class="col-lg-9 col-xl-9">

                                   <input class="form-control form-control-solid form-control-lg" name="nama" type="text" value="" placeholder="SMK INDUSTRI 1" required="">

                               </div>

                           </div>
                           <div class="form-group row mb-3">

                               <label class="col-xl-3 col-lg-3 col-form-label">Nama Kepala Sekolah</label>

                               <div class="col-lg-9 col-xl-9">

                                   <input class="form-control form-control-solid form-control-lg" name="nama" type="text" value="" placeholder="Afrizal Himawan, S.Kom" required="">

                               </div>

                           </div>
                           <div class="form-group row mb-3">

                               <label class="col-xl-3 col-lg-3 col-form-label">Alamat</label>

                               <div class="col-lg-9 col-xl-9">

                                   <textarea class="form-control form-control-solid form-control-lg" name="nama" type="text" placeholder="Jl. Ramah Tamah Ngijo Karangploso Malang" required=""></textarea>

                               </div>

                           </div>
                           <div class="form-group row mb-3">

                               <label class="col-xl-3 col-lg-3 col-form-label">Telepon</label>

                               <div class="col-lg-9 col-xl-9">

                                   <input class="form-control form-control-solid form-control-lg" name="nama" type="text" value="" placeholder="083000000000" required="">

                               </div>

                           </div>
                           <div class="form-group row mb-3">

                               <label class="col-xl-3 col-lg-3 col-form-label">Email</label>

                               <div class="col-lg-9 col-xl-9">

                                   <input class="form-control form-control-solid form-control-lg" name="nama" type="text" value="" placeholder="smkindustri1@gmail.com" required="">

                               </div>

                           </div>
                           <div class="form-group row mb-3">

                               <label class="col-xl-3 col-lg-3 col-form-label">Password</label>

                               <div class="col-lg-9 col-xl-9">

                                   <input class="form-control form-control-solid form-control-lg" name="nama" type="password" value="" placeholder="password" required="">

                               </div>

                           </div>
                           <div class="form-group row mb-3">

                               <label class="col-xl-3 col-lg-3 col-form-label">Konfirmasi Password</label>

                               <div class="col-lg-9 col-xl-9">

                                   <input class="form-control form-control-solid form-control-lg" name="nama" type="password" value="" placeholder="password" required="">

                               </div>

                           </div>
                           <div class="form-group row mb-3">

                               <label class="col-xl-3 col-lg-3 col-form-label">Logo</label>

                               <div class="col-lg-9 col-xl-9">

                                   <input class="form-control form-control-solid form-control-lg" name="nama" type="file" value="" placeholder="password" required="">

                               </div>

                           </div>
                       </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
