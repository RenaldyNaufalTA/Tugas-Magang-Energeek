<nav class="navbar navbar-expand-lg navbar-light bg-white ">
    <a class="navbar-brand" href="/"><img src="/assets/energeek.png" alt="energeek" class="img-fluid" height="50px"
            width="209px"></a>
    {{-- <div class="navbar-collapse collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav ms-auto ">
            @auth
                <li class="nav-item mx-2 mt-1">
                    <select class="js-select" data-placeholder="Lowongan" style="width: 250px" name="state" id="select">
                        <option></option>
                        <optgroup id="label-judul" label="Lowongan yang Tersedia">

                            @foreach ($lowongan as $loker)
                                <option value="{{ url('recruitment', $loker->slug) }}">{{ $loker->judul }}
                                </option>
                            @endforeach

                        </optgroup>
                    </select>
                </li>
                <li class="nav-item dropdown mx-2">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/dashboard"> My Dashboard
                                </a>
                            </li>
                            <hr class="dropdown-divider">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                </li>
            @else
                <li class="nav-item mx-2">
                    <select class="js-select" data-placeholder="Lowongan" style="width: 250px" name="state"
                        id="select">
                        <option></option>
                        <optgroup id="label-judul" label="Lowongan yang Tersedia">

                            @foreach ($lowongan as $loker)
                                <option value="{{ url('recruitment', $loker->slug) }}">{{ $loker->judul }}
                                </option>
                            @endforeach

                        </optgroup>
                    </select>
                </li>
                <li class="nav-item mx-2">
                    <a class="btn btn-sm btn-outline-primary" id="btn" href="{{ route('login') }}">Login
                    </a>
                </li>
            @endauth
        </ul>
    </div> --}}
</nav>
