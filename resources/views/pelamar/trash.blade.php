@section('title', 'Hapus Data')
<x-app-layout>
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 ms-2">Hapus Data</span>
        </h3>
        <div class="kembali">
            <a href="/dashboard" class="btn mr-3 btn-sm btn-secondary">
                Back
            </a>
        </div>
    </div>
    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-hover table-row-gray-100 align-middle gs-3 gy-4">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Nama</td>
                        <td>No. Telepon</td>
                        <td>Alamat</td>
                        <td>Email</td>
                        <td>Posisi</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelamarkerja as $plmr)
                        <tr>
                            <td scope="row" data-label="No.">
                                {{ ($pelamarkerja->currentpage() - 1) * $pelamarkerja->perpage() + $loop->index + 1 }}
                            </td>
                            <td data-label="Nama">{{ $plmr->nama }}</td>
                            <td data-label="No.Telepon">{{ $plmr->telpon }}</td>
                            <td data-label="Alamat">{{ $plmr->alamat }}</td>
                            <td data-label="Email">{{ $plmr->email }}</td>
                            <td data-label="Posisi">
                                <!-- Button HTML (to Trigger Modal) -->
                                <a href="#modalCenter{{ $plmr->id }}" role="button" class="btn btn-sm btn-primary"
                                    data-bs-toggle="modal">{{ $plmr->lowongan->judul }} -
                                    {{ $plmr->jabatan->nama }}</a>

                                <!-- Modal HTML -->
                                <!-- Modal HTML -->
                                <div id="modalCenter{{ $plmr->id }}" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h3>{{ $plmr->lowongan->judul }}</h3>
                                                            <hr>
                                                            File : <a
                                                                href="{{ url('/storage/pelamar/' . $plmr->pelamarfile->filename) }}"
                                                                target='_blank'>{{ $plmr->pelamarfile->filename }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Aksi">
                                <a href="#modalRestore{{ $plmr->id }}" role="button"
                                    class="btn btn-sm btn-success" data-bs-toggle="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                        <path
                                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        <path fill-rule="evenodd"
                                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                </a>

                                <!-- Modal HTML -->
                                <div id="modalRestore{{ $plmr->id }}" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body p-10 text-center">
                                                <div class="container">
                                                    <div class="row">
                                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                            width="110" height="110" viewBox="0 0 172 172"
                                                            style=" fill:#000000;">
                                                            <g fill="none" fill-rule="nonzero" stroke="none"
                                                                stroke-width="1" stroke-linecap="butt"
                                                                stroke-linejoin="miter" stroke-miterlimit="10"
                                                                stroke-dasharray="" stroke-dashoffset="0"
                                                                font-family="none" font-weight="none" font-size="none"
                                                                text-anchor="none" style="mix-blend-mode: normal">
                                                                <path d="M0,172v-172h172v172z" fill="none"></path>
                                                                <g>
                                                                    <path
                                                                        d="M86,86c-17.81118,0 -32.25,14.43882 -32.25,32.25c-0.00217,1.80117 0.14842,3.59928 0.45016,5.375h63.59969c0.30174,-1.77572 0.45233,-3.57383 0.45016,-5.375c0,-17.81118 -14.43882,-32.25 -32.25,-32.25zM91.375,120.9375h-10.75v-24.1875h10.75z"
                                                                        fill="#57a4ff"></path>
                                                                    <path
                                                                        d="M86,86c-17.81118,0 -32.25,14.43882 -32.25,32.25c-0.00217,1.80117 0.14842,3.59928 0.45016,5.375c2.62054,15.51941 16.06074,26.88042 31.79984,26.88042c15.7391,0 29.1793,-11.361 31.79984,-26.88042c0.30174,-1.77572 0.45233,-3.57383 0.45016,-5.375c0,-17.81118 -14.43882,-32.25 -32.25,-32.25zM91.375,139.75h-10.75v-10.75h10.75zM80.625,96.75h10.75v24.1875h-10.75z"
                                                                        fill="#57a4ff"></path>
                                                                    <g fill="#004fac">
                                                                        <path
                                                                            d="M147.42281,54.50586c-1.00781,-19.84047 -17.5057,-35.69336 -37.57125,-35.69336c-12.74186,0.02226 -24.6129,6.47004 -31.56805,17.14625c-16.75083,-4.13921 -34.01741,4.55613 -40.66523,20.47875c-18.57862,-0.0003 -33.9081,14.53961 -34.88931,33.09231c-0.98121,18.55269 12.72906,34.62846 31.20408,36.58785c0.31888,0.12993 0.66012,0.19613 1.00445,0.19484h17.06563c3.73726,15.75285 17.80677,26.875 33.99687,26.875c16.1901,0 30.25962,-11.12215 33.99688,-26.875h14.37812c0.32463,0.00057 0.6467,-0.05747 0.9507,-0.17133c16.91748,-1.64608 30.63139,-14.4283 33.46168,-31.18838c2.83029,-16.76008 -5.92575,-33.33682 -21.36457,-40.44693zM86,147.8125c-16.32692,0 -29.5625,-13.23558 -29.5625,-29.5625c0,-16.32692 13.23558,-29.5625 29.5625,-29.5625c16.32692,0 29.5625,13.23558 29.5625,29.5625c-0.01851,16.31924 -13.24326,29.54399 -29.5625,29.5625zM155.29719,110.65781c-5.50716,5.93629 -13.0528,9.57413 -21.12711,10.18563c-0.17738,0.01383 -0.35294,0.04534 -0.52406,0.09406h-12.8093c0.06719,-0.88688 0.10078,-1.78271 0.10078,-2.6875c0,-19.29545 -15.64205,-34.9375 -34.9375,-34.9375c-19.29545,0 -34.9375,15.64205 -34.9375,34.9375c0,0.90367 0.03359,1.79951 0.10078,2.6875h-15.45984c-0.17737,-0.05257 -0.35978,-0.08635 -0.54422,-0.10078c-15.80335,-1.30819 -27.7598,-14.85207 -27.09792,-30.69565c0.66188,-15.84358 13.70631,-28.34303 29.56371,-28.32857c0.52742,0 1.075,0.0168 1.66961,0.05039c1.19542,0.06746 2.29129,-0.66404 2.6875,-1.79391c5.29584,-15.02037 21.52786,-23.15717 36.73141,-18.41273c1.20311,0.37906 2.50779,-0.13134 3.1343,-1.22617c7.24585,-12.67186 22.09933,-18.89732 36.21489,-15.17856c14.11556,3.71876 23.97369,16.45454 24.0355,31.05161c0.00404,1.09177 0.66775,2.07274 1.67969,2.48258c9.83976,3.98022 17.09146,12.54672 19.39253,22.90858c2.30107,10.36186 -0.64307,21.19256 -7.87324,28.96352z">
                                                                        </path>
                                                                        <path
                                                                            d="M48.375,129h-18.8125c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875c0,1.48427 1.20323,2.6875 2.6875,2.6875h18.8125c1.48427,0 2.6875,-1.20323 2.6875,-2.6875c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875z">
                                                                        </path>
                                                                        <path
                                                                            d="M147.8125,129h-24.1875c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875c0,1.48427 1.20323,2.6875 2.6875,2.6875h24.1875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875z">
                                                                        </path>
                                                                        <path
                                                                            d="M91.375,126.3125h-10.75c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v10.75c0,1.48427 1.20323,2.6875 2.6875,2.6875h10.75c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-10.75c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM88.6875,137.0625h-5.375v-5.375h5.375z">
                                                                        </path>
                                                                        <path
                                                                            d="M91.375,94.0625h-10.75c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v24.1875c0,1.48427 1.20323,2.6875 2.6875,2.6875h10.75c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-24.1875c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM88.6875,118.25h-5.375v-18.8125h5.375z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <h2 class="mt-3">Pulihkan Data?</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Keluar</button>
                                                <a href="{{ route('dashboard.restore', $plmr->id) }}"
                                                    class="btn btn-primary">Pulihkan</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button HTML (to Trigger Modal) -->
                                <a href="#modalDelete{{ $plmr->id }}" role="button" class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal">
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
                                                        <h2 class="mt-5">Yakin ingin menghapus Data Permanen?
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Keluar</button>
                                                <form action="{{ route('dashboard.delete', $plmr->id) }}"
                                                    method="post" class="d-inline">
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
