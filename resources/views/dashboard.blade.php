@section('title', 'Dashboard')
<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <h2 class="font-semibold text-xl pt-3 text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>

            <a href="/trash" class="btn-sm btn-danger px-3 py-3 ms-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
                    viewBox="0 0 16 16">
                    <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd"
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
            </a>
        </div>


    </x-slot>
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 ms-2">Daftar Lamaran</span>
        </h3>
        {{-- maintain --}}

        <form action="{{ route('dashboard.index') }}" method="GET" class="search mr-2" role="search">
            <input type="text" size="25%" class="form-control-sm" name="search" placeholder="Cari... " autofocus
                id="search" value="{{ request('search') }}">
            <button class="btn btn-sm btn-secondary mr-3" type="submit" title="Pencarian" id="search">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </form>
    </div>
    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-hover table-row-gray-100 align-middle gs-3 gy-4">
                <thead>
                    <tr>
                        <th scope="col">No.</td>
                        <th scope="col">Nama</td>
                        <th scope="col">No. Telepon</td>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">Posisi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelamarkerja as $plmr)
                        <tr class="p-5">
                            <td scope="row" data-label="No.">
                                {{ ($pelamarkerja->currentpage() - 1) * $pelamarkerja->perpage() + $loop->index + 1 }}
                            </td>
                            <td data-label="Nama">{{ $plmr->nama }}</td>
                            <td data-label="No.Telepon">{{ $plmr->telpon }}</td>
                            <td data-label="Alamat">{{ $plmr->alamat }}</td>
                            <td data-label="Email">{{ $plmr->email }}</td>
                            <td data-label="Posisi">
                                <!-- Button HTML (to Trigger Modal) -->
                                <a href="#modalCenter{{ $plmr->id }}" role="button" class="btn btn-sm btn-info"
                                    data-bs-toggle="modal">{{ $plmr->lowongan->judul }} -
                                    {{ $plmr->jabatan->nama }}</a>

                                <!-- Modal HTML -->
                                <div id="modalCenter{{ $plmr->id }}" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Lamaran</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h3 class="mb-4 mt-2 fw-bold">
                                                                {{ $plmr->lowongan->judul }} -
                                                                {{ $plmr->jabatan->nama }}</h3>

                                                            <h5>File : <a
                                                                    href="{{ url('/storage/pelamar/' . $plmr->pelamarfile->filename) }}"
                                                                    target='_blank'>{{ $plmr->pelamarfile->filename }}</a>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Aksi">
                                <!-- Button HTML (to Trigger Modal) -->
                                <a href="#modalEmail{{ $plmr->id }}" role="button" class="btn btn-sm btn-primary"
                                    data-bs-toggle="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                    </svg>
                                </a>
                                <!-- Modal HTML -->
                                <div id="modalEmail{{ $plmr->id }}" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body p-10 text-center">
                                                <div class="container">
                                                    <div class="row">
                                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                            width="100" height="100" viewBox="0 0 172 172"
                                                            style=" fill:#000000;">
                                                            <g fill="none" fill-rule="nonzero" stroke="none"
                                                                stroke-width="1" stroke-linecap="butt"
                                                                stroke-linejoin="miter" stroke-miterlimit="10"
                                                                stroke-dasharray="" stroke-dashoffset="0"
                                                                font-family="none" font-weight="none"
                                                                font-size="none" text-anchor="none"
                                                                style="mix-blend-mode: normal">
                                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                                <g>
                                                                    <path
                                                                        d="M139.75,97.78805v-1.03805h-10.75v8.5093l-26.42484,18.3657c-0.30174,-1.77572 -0.45233,-3.57383 -0.45016,-5.375c0.00194,-11.5211 6.14878,-22.16643 16.12601,-27.92758c9.97722,-5.76115 22.26976,-5.7633 32.24899,-0.00562z"
                                                                        fill="#3498db"></path>
                                                                    <path d="M120.1682,89.29219l-17.09586,-26.3543"
                                                                        fill="none"></path>
                                                                    <path
                                                                        d="M150.5,90.3168c-12.64149,-7.29928 -28.60953,-5.1978 -38.93204,5.12365c-10.32251,10.32146 -12.42562,26.28928 -5.12764,38.93152c7.29798,12.64224 22.17734,18.80659 36.27769,15.02946c14.10035,-3.77713 23.90584,-16.55394 23.90699,-31.15143c0.04114,-11.53381 -6.11655,-22.20072 -16.125,-27.9332zM139.75,139.75h-10.75v-10.75h10.75zM139.75,120.9375h-10.75v-24.1875h10.75z"
                                                                        fill="#3498db"></path>
                                                                    <g fill="#004fac">
                                                                        <path
                                                                            d="M153.1875,88.82188v-67.32187c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875h-145.125c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v102.125c0,1.48427 1.20323,2.6875 2.6875,2.6875h95.00313c3.62791,15.3213 17.05578,26.32296 32.79137,26.86648c15.73558,0.54351 29.89055,-9.50543 34.56696,-24.5399c4.67641,-15.03447 -1.2813,-31.33938 -14.54895,-39.8172zM8.0625,24.1875h139.75v3.98086l-69.875,49.17117l-69.875,-49.17117zM147.8125,34.7393v51.2607c-8.51862,-3.55047 -18.09637,-3.58429 -26.63984,-0.09406l-14.43859,-22.25922zM11.98289,120.9375h-3.92039v-86.1982l41.21953,29.0082zM99.53828,120.9375h-81.13898l35.28016,-54.09602l22.71273,15.98055c0.92644,0.65392 2.16418,0.65392 3.09063,0l22.85383,-16.08133l14.00859,21.59406c-10.4866,6.32201 -16.90056,17.67038 -16.90773,29.91523c0,0.90367 0.03359,1.79951 0.10078,2.6875zM134.375,147.8125c-16.32692,0 -29.5625,-13.23558 -29.5625,-29.5625c0,-16.32692 13.23558,-29.5625 29.5625,-29.5625c16.32692,0 29.5625,13.23558 29.5625,29.5625c-0.01851,16.31924 -13.24326,29.54399 -29.5625,29.5625z">
                                                                        </path>
                                                                        <path
                                                                            d="M139.75,94.0625h-10.75c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v24.1875c0,1.48427 1.20323,2.6875 2.6875,2.6875h10.75c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-24.1875c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM137.0625,118.25h-5.375v-18.8125h5.375z">
                                                                        </path>
                                                                        <path
                                                                            d="M139.75,126.3125h-10.75c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v10.75c0,1.48427 1.20323,2.6875 2.6875,2.6875h10.75c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-10.75c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM137.0625,137.0625h-5.375v-5.375h5.375z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <h2 class="mt-3">Ingin Mengirim Email?</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Keluar</button>
                                                <form action="{{ route('dashboard.sendemail', $plmr->id) }}"
                                                    method="post" class="mr-1 d-inline-flex">
                                                    @csrf
                                                    <button type="submit" id="acceptButton"
                                                        class="btn btn-primary">Kirim
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button HTML (to Trigger Modal) -->
                                <a href="#modalDelete{{ $plmr->id }}" role="button"
                                    class="btn btn-sm btn-danger" data-bs-toggle="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </a>

                                <!-- Modal HTML -->
                                <div id="modalDelete{{ $plmr->id }}" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body p-10 text-center">
                                                <div class="container">
                                                    <div class="row">
                                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                            width="100" height="100" viewBox="0 0 226 226"
                                                            style=" fill:#000000;">
                                                            <g fill="none" fill-rule="nonzero" stroke="none"
                                                                stroke-width="1" stroke-linecap="butt"
                                                                stroke-linejoin="miter" stroke-miterlimit="10"
                                                                stroke-dasharray="" stroke-dashoffset="0"
                                                                font-family="none" font-weight="none"
                                                                font-size="none" text-anchor="none"
                                                                style="mix-blend-mode: normal">
                                                                <path d="M0,226v-226h226v226z" fill="#ffffff"></path>
                                                                <g fill="#e74c3c">
                                                                    <path
                                                                        d="M108.29167,9.41667c-59.71108,0 -108.29167,48.58058 -108.29167,108.29167c0,59.71108 48.58058,108.29167 108.29167,108.29167c59.71108,0 108.29167,-48.58058 108.29167,-108.29167c0,-59.71108 -48.58058,-108.29167 -108.29167,-108.29167zM108.29167,216.58333c-54.5225,0 -98.875,-44.3525 -98.875,-98.875c0,-54.5225 44.3525,-98.875 98.875,-98.875c54.5225,0 98.875,44.3525 98.875,98.875c0,54.5225 -44.3525,98.875 -98.875,98.875z">
                                                                    </path>
                                                                    <path
                                                                        d="M108.29167,56.5c-2.599,0 -4.70833,2.10933 -4.70833,4.70833v84.75c0,2.599 2.10933,4.70833 4.70833,4.70833c2.599,0 4.70833,-2.10933 4.70833,-4.70833v-84.75c0,-2.599 -2.10933,-4.70833 -4.70833,-4.70833z">
                                                                    </path>
                                                                    <path
                                                                        d="M108.29167,160.08333c-2.599,0 -4.70833,2.10933 -4.70833,4.70833v9.41667c0,2.599 2.10933,4.70833 4.70833,4.70833c2.599,0 4.70833,-2.10933 4.70833,-4.70833v-9.41667c0,-2.599 -2.10933,-4.70833 -4.70833,-4.70833z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <h2 class="mt-5">Yakin ingin menghapus?</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Keluar</button>
                                                <form action="{{ route('dashboard.destroy', $plmr->id) }}"
                                                    method="post" class="d-inline" id="form-delete">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" id="deleteButton"
                                                        class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $pelamarkerja->links() }}
        </div>
    </div>
</x-app-layout>
