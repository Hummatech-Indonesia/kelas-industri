<!DOCTYPE html>
<html lang="en" >
<!--begin::Head-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo31/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 14:27:54 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>Kelas Industri</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:description" content="Improve your skill with hummatech internship.">
    <link rel="icon" href="{{ asset('app-assets/logo_file/Logo-Kelas-Industri.png') }}" type="image/png" />
    <link rel="shortcut icon" href="{{asset('app-assets/logo_file/Logo-Kelas-Industri.png')}}"/>

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>        <!--end::Fonts-->


    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('user-assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('user-assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->

{{--    Plugin Stylesheets --}}
    <link href="{{ asset('user-assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>

    @yield('css')
{{--    End Plugin Styleshets --}}
</head>
<!--end::Head-->

<!--begin::Body-->
<body  id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-sidebar-stacked="true" data-kt-app-sidebar-secondary-enabled="true"  class="app-default" >
<!--begin::Theme mode setup on page load-->
<script>
    var defaultThemeMode = "light";
    var themeMode;

    if ( document.documentElement ) {
        if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if ( localStorage.getItem("data-bs-theme") !== null ) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }

        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }

        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
</script>
<!--end::Theme mode setup on page load-->


<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">

        <!--begin::Header-->
            @include('dashboard.user.layouts.navbar')
        <!--end::Header-->
    <!--begin::Wrapper-->
    <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">





        <!--begin::Sidebar-->
        @include('dashboard.user.layouts.sidebar')
        <!--end::Sidebar-->


        <!--begin::Main-->
        @yield('content')
        <!--end:::Main-->


    </div>
    <!--end::Wrapper-->


</div>
<!--end::Page-->
</div>
<!--end::App-->

<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"/>
<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"/>
</svg>
</span>
    <!--end::Svg Icon--></div>
<!--end::Scrolltop-->

<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('user-assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('user-assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('app-assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('app-assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('app-assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('app-assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('app-assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
<script src="{{ asset('app-assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!--end::Custom Javascript-->

{{--Plugin Javascript --}}
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
{{--End Plugin Javascript --}}
@yield('script')
@stack('script')
<!--end::Javascript-->
<script>
    @if(Session::has('success'))
    Swal.fire({
        text: "{{ Session::get('success') }}",
        icon: "success",
        buttonsStyling: false,
        confirmButtonText: "Ok!",
        customClass: {
            confirmButton: "btn btn-primary"
        }
    });
    @endif
    @if(Session::has('error'))
    Swal.fire({
        text: "{{ Session::get('error') }}",
        icon: "error",
        buttonsStyling: false,
        confirmButtonText: "Ok!",
        customClass: {
            confirmButton: "btn btn-danger"
        }
    });
    @endif


    $('.notification-link').click(function(e) {
        $.ajax({
            url: '/delete-notification/' + e.target.id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // success: function(response) {
            //     // Redirect ke halaman tujuan setelah penghapusan berhasil
            //     window.location.href = $(this).attr('href');
            // },
            error: function(xhr) {
                // Tangani kesalahan jika terjadi
                console.error(xhr.responseText);
            }
        });
    })
</script>
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo31/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 14:30:13 GMT -->
</html>
