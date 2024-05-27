@section('title', 'Buat Lowongan')
<x-app-layout>
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-4 ms-2">Tambah Lowongan</span>
        </h3>
        <div class="kembali">
            <a href="/lowongan" class="btn mr-3 btn-sm btn-secondary">
                Back</a>
        </div>
    </div>
    <div class="card-body py-3">
        <form action="{{ route('lowongan.store') }}" method="post" enctype="multipart/form-data" id="formid">
            @csrf
            <div class="fv-row mb-4 mt-1">
                <label class="form-label fs-6 fw-bolder text-dark">Jabatan</label>
                <select class="jabatan form-select" style="width:100%" data-placeholder="Select Jabatan" name="jabatan"
                    id="jabatan" required>
                    <option></option>
                    @foreach ($lowongan as $jabatan)
                        <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                    @endforeach
                    </optgroup>
                </select>
                @error('jabatan')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--begin::Input group-->
            <div class="fv-row mb-4">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bolder text-dark">Judul</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid @error('judul') is-invalid @enderror"
                    type="text" name="judul" id="judul" placeholder="Masukkan judul" required autofocus
                    value="{{ old('judul') }}" />
                <!--end::Input-->
                @error('judul')
                    <div class="alert alert-danger mt-2 py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-4">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bolder text-dark">Slug</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input class="form-control form-control-lg form-control-solid @error('slug') is-invalid @enderror"
                    type="text" name="slug" id="slug" placeholder="Masukkan slug" required
                    value="{{ old('slug') }}" />
                <!--end::Input-->
                @error('slug')
                    <div class="alert alert-danger mt-2 py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-4">
                <label for="tanggal" class="form-label fs-6 fw-bolder text-dark">Masa Berlaku</label>
                <input class="form-control form-control-lg form-control-solid @error('end_date') is-invalid @enderror"
                    type="date" name="end_date" id="end_date" placeholder="Y/m/d H:i" autocomplete="off" required
                    value="{{ old('end_date') }}" />
                <!--end::Input-->
                @error('end_date')
                    <div class="alert alert-danger mt-2 py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--end::Input-->
            <div class="fv-row mb-4">
                <!--begin::Label-->
                <label class="form-label fs-6 fw-bolder text-dark">Deskripsi</label>
                <!--end::Label-->
                <!--begin::Input-->
                <textarea class="form-control form-control-lg form-control-solid @error('deskripsi') is-invalid @enderror"
                    name="deskripsi" id="deskripsi" placeholder="Optional" rows="7" value="{{ old('deskripsi') }}"></textarea>
                <!--end::Input-->
                @error('deskripsi')
                    <div class="alert alert-danger mt-2 py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="text-center p-10">
                <button class="btn btn-primary btn-active-secondary w-30">Tambah</button>
            </div>
        </form>
    </div>
    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function() {
            fetch('/lowongan/create/checkSlug?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
        });
    </script>
</x-app-layout>
