@section('title', 'Buat Jabatan')
<x-app-layout>
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-4">Tambah Jabatan</span>
        </h3>
        <div class="kembali">
            <a href="{{ route('jabatan.view') }}" class="btn mr-3 btn-sm btn-secondary">
                Back</a>
        </div>
    </div>
    <div class="card-body py-3">
        <form action="{{ route('jabatan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="fv-row">
                <!--begin::Label-->
                <label class="form-label fs-5 fw-bolder text-dark">Jabatan</label>
                <!--end::Label-->
                <div class="input-group mb-3">
                    <!--begin::Input-->
                    <input class="form-control d-block @error('jabatan') is-invalid @enderror" name="jabatan"
                        id="jabatan" autofocus placeholder="Masukkan jabatan" value="{{ old('jabatan') }}" />
                    <button class="btn btn-primary" type="sumbit">Tambah</button>
                    <!--end::Input-->

                </div>
                @error('jabatan')
                    <div class="alert alert-danger mt-2 py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </form>
    </div>
</x-app-layout>
