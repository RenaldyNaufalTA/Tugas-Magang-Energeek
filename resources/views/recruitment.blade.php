{{-- <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20" id="content-body">
                <!--begin::Wrapper-->
                <div class="w-lg-550px bg-body rounded shadow-sm p-10 p-lg-15 " id="bodyform">
                    <a href="{{ url('/') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="primary"
                            class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                        </svg>
                    </a>
                    <div class="text-center mb-15">
                        <!--begin::Title-->
                        <h2 class="text-dark mb-3">Recruitment</h2>
                        <!--end::Title-->
                    </div>
                    <!--begin::Form-->
                    <form id="myForm" action="{{ route('recruitment.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <!--begin::Input group-->
                        <input type="hidden" name="id_posisi" value="{{ $lowongan->jabatan }}">
                        <div class="fv-row mb-4">
                            <label class="form-label fs-6 fw-bolder text-dark">Lowongan</label>
                            <select
                                class="form-select form-select-lg form-select-solid @error('lowongan') is-invalid @enderror"
                                name="lowongan" id="lowongan">
                                <option value="{{ $lowongan->judul }}">
                                    {{ $lowongan->judul }}</option>
                            </select>
                            @error('lowongan')
                                <div class="alert alert-danger mt-2 py-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="fv-row mb-4">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Nama</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input
                                class="form-control form-control-lg form-control-solid @error('nama') is-invalid @enderror"
                                type="text" name="nama" id="nama" autocomplete="off" placeholder="Masukkan Nama"
                                required autofocus value="{{ old('nama') }}" />
                            <!--end::Input-->
                            @error('nama')
                                <div class="alert alert-danger mt-2 py-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-4">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">No. Telepon</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input
                                class="form-control form-control-lg form-control-solid @error('telpon') is-invalid @enderror"
                                type="text" name="telpon" id="telpon" autocomplete="off"
                                placeholder="Masukkan No Telepon" required value="{{ old('telpon') }}" />
                            <!--end::Input-->
                            @error('telpon')
                                <div class="alert alert-danger mt-2 py-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-4">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Alamat</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input
                                class="form-control form-control-lg form-control-solid @error('alamat') is-invalid @enderror"
                                type="text" name="alamat" id="alamat" autocomplete="off" placeholder="Masukkan Alamat"
                                required value="{{ old('alamat') }}" />
                            <!--end::Input-->
                            @error('alamat')
                                <div class="alert alert-danger mt-2 py-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-4">
                            <!--begin::Wrapper-->
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input
                                class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                type="email" name="email" id="email" autocomplete="off" placeholder="nama@contoh.com"
                                required value="{{ old('email') }}" />
                            @error('email')
                                <div class="alert alert-danger mt-2 py-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--end::Actions-->
                        <!--begin::Dropzone-->
                        <div class="fv-row mb-4">
                            <label for="document" class="form-label fs-6 fw-bolder text-dark">Berkas Pendukung</label>

                            <div class="dropzone dropzone-file-area" id="fileUpload">
                                <div class="dz-default dz-message">
                                    <div class="fallback">
                                        <input name="file" id="file" type="file" required
                                            class="@error('file') is-invalid @enderror" />
                                    </div>
                                    <div class="mx-auto">
                                        <img class="addfile-icon" src="../assets/addfile.png">
                                        <h5 class="mt-3">Drop files here to upload</h5>
                                    </div>
                                </div>
                                @error('file')
                                    <div class="alert alert-danger mt-2 py-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-xs-10">
                                <p class="text-danger text-small">Catatan: MaxFile:1, Max:1MB, Ekstensi:.pdf, .jpg,
                                    .jpeg, .png, .docx <br>Jika file salah, upload ulang file dan otomatis file terganti
                                </p>
                                <p id="output"></p>
                            </div>
                        </div>
                        <!--end::Dropzone-->
                        <!--reChatpcha-->
                        <div class="fv-row mb-4 mt-4">
                            <div>
                                <input name="g-recaptcha-response" type="hidden" required
                                    class="@error('g-recaptcha-response') is-invalid @enderror" />
                                <div class="g-recaptcha" data-sitekey="6LdLtFUdAAAAAHrSPOEEBBpSekr5DucmG1ABWEzu">
                                </div>
                            </div>
                            @error('g-recaptcha-response')
                                <div class="alert alert-danger mt-2 py-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!--end::reChaptcha-->

                        <!--begin::Submit button-->
                        <div class="text-center mt-5" id="btn-kirim">
                            <button type="submit" name="simpan" id="submit-all" class="btn btn-md btn-primary w-30">
                                <span class="indicator-label">Kirim</span>
                            </button>
                            <!--end::Submit button-->
                        </div>
                    </form>

                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
    </div> --}}
@extends('layouts.form')
@section('title', 'Apply Lamaran')
@section('content')
    <div class="container">
        <div class="row justify-content-center mx-3">
            <div class="col-lg-6 bg-white p-5 main shadow-sm">
                <div class="text-center mb-5">
                    <h3>Apply Lamaran</h3>
                </div>
                <form id="myForm" action="{{ route('recruitment.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Input group-->
                    <input type="hidden" name="jabatan_id" value="{{ $lowongan->jabatan_id }}">
                    <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">
                    <div class="fv-row mb-4">
                        <label class="form-label fs-6 fw-bolder text-dark">Lowongan</label>
                        <input class="form-select form-select-lg form-select-solid @error('lowongan') is-invalid @enderror"
                            value="{{ $lowongan->judul }}" readonly name="lowongan" id="lowongan">
                        @error('lowongan')
                            <div class="alert alert-danger mt-2 py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="fv-row mb-4">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">Nama</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid @error('nama') is-invalid @enderror"
                            type="text" name="nama" id="nama" autocomplete="off" placeholder="Masukkan Nama"
                            required autofocus value="{{ old('nama') }}" />
                        <!--end::Input-->
                        @error('nama')
                            <div class="alert alert-danger mt-2 py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-4">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">Telepon</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="input-group">
                            <input
                                class="form-control form-control-lg form-control-solid @error('telpon') is-invalid @enderror"
                                type="text" name="telpon" id="telpon" value="{{ old('telpon') }}" autocomplete="off"
                                placeholder="Masukkan No Telepon" required />
                            <span class="input-group-text px-3" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                        </div>
                        <!--end::Input-->
                        @error('telpon')
                            <div class="alert alert-danger mt-2 py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-4">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">Alamat</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="input-group">
                            <input
                                class="form-control form-control-lg form-control-solid @error('alamat') is-invalid @enderror"
                                type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" autocomplete="off"
                                placeholder="Masukkan Alamat" required />
                            <span class="input-group-text px-3" id="basic-addon1">
                                <i class="bi bi-house"></i></span>
                        </div>
                        <!--end::Input-->

                        @error('alamat')
                            <div class="alert alert-danger mt-2 py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-4">
                        <!--begin::Wrapper-->
                        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="input-group">
                            <input
                                class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="off"
                                placeholder="nama@contoh.com" required />
                            <span class="input-group-text px-3" id="basic-addon1">
                                <i class="bi bi-envelope"></i></span>
                        </div>
                        @error('email')
                            <div class="alert alert-danger mt-2 py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--end::Actions-->
                    <!--begin::Dropzone-->
                    <div class="fv-row mb-4">
                        <label for="document" class="form-label fs-6 fw-bolder text-dark">Berkas Pendukung</label>
                        <input id="input-id" name="input-id" type="file" class="file" data-preview-file-type="text">
                        {{-- <div class="dropzone dropzone-file-area text-center" id="fileUpload">
                            <div class="dz-default dz-message">
                                <div class="fallback">
                                    <input name="file" id="file" type="file" required
                                        class="@error('file') is-invalid @enderror" />
                                </div>
                                <div class="mx-auto text-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37"
                                        fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                        <path
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                                    </svg>
                                    <p class="mt-1 fs-6 text-dark fw-bold">Drop files here or click to upload</p>
                                    <p class="catatan mt-1 fs-10">MaxFile:1, Max:1MB, Ekstensi:.pdf, .jpg,
                                        .jpeg, .png, .docx. <br>Jika file salah, upload ulang file dan otomatis file
                                        terganti</p>
                                </div>
                            </div>
                            @error('file')
                                <div class="alert alert-danger mt-2 py-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        {{-- <div class="col-xs-10">
                            <p class="text-danger text-small">Catatan: MaxFile:1, Max:1MB, Ekstensi:.pdf, .jpg,
                                .jpeg, .png, .docx <br>Jika file salah, upload ulang file dan otomatis file terganti
                            </p>
                        </div> --}}
                        <p id="output"></p>

                    </div>
                    <!--end::Dropzone-->
                    <!--reChatpcha-->
                    <div class="fv-row mb-4 mt-4">
                        <div>
                            <input name="g-recaptcha-response" type="hidden"
                                class="@error('g-recaptcha-response') is-invalid @enderror" />
                            <div class="g-recaptcha " data-sitekey="6LdLtFUdAAAAAHrSPOEEBBpSekr5DucmG1ABWEzu">
                            </div>
                        </div>
                        @error('g-recaptcha-response')
                            <div class="alert alert-danger mt-2 py-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!--end::reChaptcha-->

                    <!--begin::Submit button-->
                    <div class="text-center">
                        <button type="submit" id="submit-all" class="btn">Apply
                        </button>
                        <!--end::Submit button-->
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('background')
    <div class="delivery">
        <img src="/assets/delivery.png" alt="delivery">
    </div>
    <div class="response">
        <img src="/assets/response.png" alt="response" srcset="">
    </div>
@endsection
