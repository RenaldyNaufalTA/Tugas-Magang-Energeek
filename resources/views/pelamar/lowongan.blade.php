@section('title', 'Lowongan')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight d-inline">
            {{ __('Lowongan') }}
        </h2>
    </x-slot>
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 ms-2">Data Lowongan</span>
        </h3>
        <div class="mt-4">
            <a href="{{ route('buatlowongan') }}" class="btn btn-sm btn-primary ml-auto mr-2 d-inline-flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>&nbsp;Lowongan
            </a>
        </div>
    </div>
    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-hover table-row-gray-100 align-middle gs-3 gy-4">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Tgl. Awal</th>
                        <th scope="col">Tgl. Akhir</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lowongan as $loker)
                        <tr class="p-5">
                            <td scope="row" data-label="No.">
                                {{ ($lowongan->currentpage() - 1) * $lowongan->perpage() + $loop->index + 1 }}</td>
                            <td data-label="Judul">{{ $loker->judul }}</td>
                            <td data-label="Deskripsi">{{ $loker->deskripsi }}</td>
                            <td data-label="Tgl.Awal">{{ $loker->created_at->format('d/m/Y') }}</td>
                            <td data-label="Tgl.Akhir">{{ $loker->end_date->format('d/m/Y') }}</td>
                            <td data-label="Jabatan">{{ $loker->jabatan->nama }}</td>
                            <td data-label="Aksi">
                                <a href="{{ route('lowongan.edit', $loker->id) }}" class="btn btn-sm btn-success"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path
                                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                    </svg></a>

                                <!-- Button HTML (to Trigger Modal) -->
                                <a href="#modalDelete{{ $loker->id }}" role="button" class="btn btn-sm btn-danger"
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
                                <div id="modalDelete{{ $loker->id }}" class="modal fade" tabindex="-1">
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
                                                <form action="{{ route('lowongan.delete', $loker->id) }}"
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
            {{ $lowongan->links() }}
        </div>
</x-app-layout>
