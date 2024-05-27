<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="/css/penerimaanpegawai.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <!--Bootstrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @livewireStyles
    <!--end::Global Stylesheets Bundle-->

    <link href="/css/style.css" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#myBtn").click(function() {
                $("#myModal").modal("show");
            });
        });
    </script>
</head>

<body class="font-sans antialiased daftarpelamar">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif


        <!-- Page Content -->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="post d-flex flex-column-fluid" id="kt_post">

                            <!--begin::Container-->
                            <div id="kt_content_container" class="container-xxl">
                                <!--begin::Row-->
                                <div class="row gy-5 g-xl-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-8 w-100">
                                        <!--begin::Tables Widget 9-->
                                        @if (session('error'))
                                            <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
                                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                                            <main>
                                                {{ $slot }}
                                            </main>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="../../select2/selectlowongan.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- sweet alert --}}
    {{-- <script>
            $('button#deleteButton').on('click', function(e){
                var id = $(this).data('id');
                e.preventDefault();
                swal({
                    title: "Hapus Data",
                    text: "Yakin ingin menghapus? ",
                    icon: "warning",
                    dangerMode: true,
                    buttons: {
                    cancel: "Tidak",
                    confirm: "Iya",
                    },
                })
                .then ((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });
            });
        </script>
        <script>
            $('button#acceptButton').on('click', function(e){
                e.preventDefault();
                swal({
                    title: "Kirim Email",
                    text: "Terima Pegawai?",
                    icon: "info",
                    buttons: {
                    cancel: "Tidak",
                    confirm: "Iya",
                    },
                })
                .then ((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });
            });
        </script> --}}
    {{-- end sweet alert --}}
    <script>
        $('button#e1').on('click', function(e) {
            e.preventDefault();
            swal({
                    title: "Yakin ingin merubah email?",
                    text: "Server akan otomatis terRefresh jika anda merubahnya!",
                    icon: "info",
                    buttons: {
                        cancel: "Tidak",
                        confirm: "Iya",
                    },
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });
        });
    </script>
    <script>
        $(document).on('mouseenter click', '.popup-link', function() {
            var popupContent = $(this).parent('.popup-container').find('.popup-body');
            popupContent.addClass('show-popup');
        })

        $(document).on('mouseleave', '.popup-body', function() {
            $(".popup-body").removeClass('show-popup');
        })

        $(document).on('click touch', function(e) {
            if (!e.target.classList.contains(".popup-body")) {
                $(".popup-body").removeClass('show-popup');
            }
        });
    </script>
    @include('sweetalert::alert')

</body>

</html>
