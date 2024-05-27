@section('title', 'Jabatan')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight d-inline">
            {{ __('Jabatan') }}
        </h2>
    </x-slot>
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 ms-2">Data Jabatan</span>
        </h3>
        <div class="mt-4">
            <a href="{{ route('buatjabatan') }}" class="btn btn-sm btn-primary ml-auto mr-2 d-inline-flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>&nbsp;Jabatan
            </a>
        </div>
    </div>
    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-hover table-row-gray-100 align-middle gs-3 gy-4">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jabatan as $jbtn)
                        <tr class="p-5">
                            <td scope="row" data-label="No.">
                                {{ ($jabatan->currentpage() - 1) * $jabatan->perpage() + $loop->index + 1 }}</td>
                            <td data-label="Jabatan">{{ $jbtn->nama }}</td>
                            <td data-label="Dibuat">{{ $jbtn->created_at->format('d/m/Y') }}</td>
                            <td data-label="Aksi">
                                <!-- Button HTML (to Trigger Modal) -->
                                <a href="#modalDelete{{ $jbtn->id }}" role="button" class="btn btn-sm btn-danger"
                                    data-bs-toggle="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </a>

                                <!-- Modal HTML -->
                                <div id="modalDelete{{ $jbtn->id }}" class="modal fade" tabindex="-1">
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
                                                                font-family="none" font-weight="none" font-size="none"
                                                                text-anchor="none" style="mix-blend-mode: normal">
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
                                                <form action="{{ route('jabatan.destroy', $jbtn->id) }}" method="post"
                                                    class="d-inline">
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
            {{ $jabatan->links() }}
        </div>
</x-app-layout>
