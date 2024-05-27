<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link rel="stylesheet" href="/css/recruitment.css">
    <!--end::Global Stylesheets Bundle-->
    <!--Bootstrap Css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- the fileinput plugin styling CSS file -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <!--Recaphta-->
    <!-- dropzone -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="body">

    <header>
        @include('partials.navbarform')
    </header>
    @yield('content')
    @yield('background')


    @include('sweetalert::alert')
    {{-- Recaptcha --}}
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    {{-- JS assets at the bottom --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- ...Some more scripts... --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script> --}}

    <!-- the main fileinput plugin script JS file -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>

    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/LANG.js"></script>
    <script>
        // initialize plugin with defaults
        $("#input-id").fileinput();

        // with plugin options
        $("#input-id").fileinput({
            'showUpload': false,
            'previewFileType': 'any'
        });
        // $('#lowongan').prop('disabled', true);
        // $('#submit-all').prop('disabled', true);

        // $('#myForm').on('submit', function() {
        //     $('input, select').prop('disabled', false);
        // });
    </script>
    {{-- <script>
        Dropzone.options.fileUpload = {
            // url: "{{ route('recruitment.storeMedia') }}",
            url: "/",
            paramName: "file",
            autoProcessQueue: true,
            maxFiles: 1,
            parallelUploads: 1,
            maxFilesize: 1,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            acceptedFiles: ".jpg,.jpeg,.png,.pdf,.docx",
            // addRemoveLinks: true,
            // timeout: 50000,

            accept: function(file, done) {
                console.log("uploaded");
                done();

            },

            init: function() {
                var submitButton = document.querySelector("#submit-all");
                var wrapperThis = this;

                wrapperThis.on("addedfile", function() {
                    var count = this.files.length;
                    var upload = "Uploaded";

                    if (count > 0) {
                        $('#submit-all').prop('disabled', false);
                    }


                    if (this.files[1] != null) {
                        this.removeFile(this.files[0]);
                    }

                });

                this.on('sending', function(data, xhr, 
            ) {
                    formData.append("lowongan", $("#lowongan").val());
                    formData.append("nama", $("#nama").val());
                    formData.append("telpon", $("#telpon").val());
                    formData.append("alamat", $("#alamat").val());
                });
                this.on("success", function(files, response) {
                    $(file.previewElement).addClass("dz-success").find('.dz-success-message');
                });

                this.on("error", function(file, message) {
                    $('#submit-all').prop('disabled', true);
                    $(file.previewElement).addClass("dz-error").find('.dz-error-message').text(
                        message);
                    // alert(message);
                    // this.removeFile(file);
                });

                submitButton.addEventListener("click", function() {
                    setTimeout(function() {
                        wrapperThis.processQueue();
                    }, 1000);
                });
            },
            removedfile: function(file) {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type: 'POST',
                    url: "{{ route('recruitment.fileDestroy') }}",
                    data: {
                        filename: name
                    },
                    success: function(data) {
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },

            success: function(file, response) {
                console.log(response);
            },
            error: function(file, response) {
                return false;
            }
        };
    </script> --}}
    <script src="../js/telpon.js"></script>
</body>

</html>
