<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand fs-4 fw-bold" href="/"><img src="/assets/energeek.png" alt="energeek" class="img-fluid"
            height="50px" width="209px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item">
                    <select class="js-select" data-placeholder="Job" style="width: 290px" name="state" id="select">
                        <option></option>
                        @if ($lowongan->count())
                            <optgroup label="Lowongan yang Tersedia">

                                @foreach ($lowongan as $loker)
                                    <option value="{{ url('recruitment', $loker->slug) }}">{{ $loker->judul }}
                                    </option>
                                @endforeach

                            </optgroup>
                        @else
                            <optgroup label="Lowongan tidak Tersedia">
                            </optgroup>
                        @endif
                    </select>
                </li>
                <li class="nav-item ms-2 me-4">
                    <form method="POST" class="d-inline" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" id="btn-login" class="btn btn-sm btn-outline-danger text-center">
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <select class="js-select" data-placeholder="Lowongan" style="width: 290px" name="state"
                        id="select">
                        <option></option>
                        @if ($lowongan->count())
                            <optgroup label="Lowongan yang Tersedia">

                                @foreach ($lowongan as $loker)
                                    <option value="{{ url('recruitment', $loker->slug) }}">{{ $loker->judul }}
                                    </option>
                                @endforeach

                            </optgroup>
                        @else
                        @endif

                    </select>
                </li>
                <li class="nav-item ms-2 me-4">
                    <a class="btn btn-sm btn-outline-primary text-center" id="btn-login" href="{{ route('login') }}">Login
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
