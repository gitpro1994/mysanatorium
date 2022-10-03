<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8" />
    <title>Dashboard | UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.ico')}}">
    <!-- Plugins css -->
    <link href="{{asset('backend/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap css -->
    <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{asset('backend/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="{{asset('backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- DataTables css -->
    <link href="{{ asset('backend/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('backend/css/stars.css')}}">
    <link href="{{asset('backend/libs/x-editable/bootstrap-editable/css/bootstrap-editable.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('backend/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{asset('backend/js/head.js')}}"></script>
    <style>
        #loading {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.7;
            background-color: #fff;
            z-index: 99;
        }

        #loading-image {
            z-index: 100;
        }
    </style>
    @yield('styles')

</head>
<!-- body start -->

<body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="dark" data-leftbar-size='default' data-sidebar-user='false'>
    <div id="loading">
        <img id="loading-image" src="{{asset('backend/images/loader.gif')}}" alt="Loading..." />
    </div>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        @include('admin.layouts.partials.header')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.layouts.partials.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <form class="d-flex align-items-center mb-3">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control border" id="dash-daterange">
                                            <span class="input-group-text bg-blue border-blue text-white">
                                                <i class="mdi mdi-calendar-range"></i>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <h4 class="page-title">@yield('page-title')</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            @include('admin.layouts.partials.footer')
            <!-- end Footer -->

        </div>

    </div>


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    @include('sweetalert::alert')
    <!-- Vendor js -->
    <script src="{{asset('backend/js/vendor.min.js')}}"></script>

    <!-- Plugins js-->
    <script src="{{asset('backend/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('backend/libs/apexcharts/apexcharts.min.js')}}"></script>

    <script src="{{asset('backend/libs/selectize/js/standalone/selectize.min.js')}}"></script>

    <!-- Dashboar 1 init js-->
    <script src="{{asset('backend/js/pages/dashboard-1.init.js')}}"></script>

    <!-- App js-->
    <script src="{{asset('backend/js/app.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('backend/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('backend/libs/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{ asset('backend/libs/dropify/js/dropify.min.js')}}"></script>
    <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
    <!-- Init js-->
    <script src="{{ asset('backend/js/pages/form-fileuploads.init.js')}}"></script>

    <!-- Plugins js -->
    <script src="{{ asset('backend/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
    <script src="{{ asset('backend/libs/autonumeric/autoNumeric.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{ asset('backend/js/pages/form-masks.init.js')}}"></script>

    <!-- Plugins js -->
    <script src="{{ asset('backend/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('backend/libs/x-editable/bootstrap-editable/js/bootstrap-editable.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{ asset('backend/js/pages/form-xeditable.init.js')}}"></script>

    <script src="{{ asset('backend/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{ asset('backend/js/pages/form-pickers.init.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#basic-datatable').DataTable();
        });
    </script>
    <script>
        $(window).on('load', function() {
            $('#loading').hide();
        })

        $(document).ajaxStart(function() {
            $("#loading").show();
        });

        $(document).ajaxComplete(function() {
            $("#loading").hide();
        });
    </script>
    @yield('scripts')
</body>

<!-- Mirrored from coderthemes.com/ubold/layouts/purple/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jun 2022 12:05:30 GMT -->

</html>