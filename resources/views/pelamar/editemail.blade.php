@section('title', 'Edit Email')
<x-app-layout>
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-3">Edit Email</span>
        </h3>
        <div class="kembali">
            <a href="/dashboard" class="btn mr-3 btn-sm btn-secondary">
                Back
            </a>
        </div>
    </div>
    <div class="card-body py-3">
        <form action="{{ route('update.email') }}" method="post" enctype="multipart/form-data" id="formid">
            @csrf
            <div class="fv-row mb-4">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                    type="email" name="email" id="email" autocomplete="off" placeholder="Masukkan email" required
                    value="{{ $email }}" />
                <!--end::Input-->
                @error('email')
                    <div class="alert alert-danger mt-2 py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-4">
                <label for="password" class="form-label fs-6 fw-bolder text-dark">Password</label>
                <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                    type="password" name="password" id="password" placeholder="Masukkan Password" autocomplete="off"
                    value="{{ $pass }}" required />
                <!--end::Input-->
                @error('password')
                    <div class="alert alert-danger mt-2 py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-xs-10 text-danger text-small">
                <p> <strong> Catatan:</strong> Merubah Email akan menyebabkan koneksi web terputus!.<br>Kembalilah
                    kehalaman sebelumnya!, Perubahan akan otomatis disimpan!</p>
            </div>
            <!--end::Input-->
            <div class="text-center p-10">
                <button type="submit" class="btn btn-primary w-30" id="e1">Ubah</button>
            </div>
        </form>
    </div>
</x-app-layout>
