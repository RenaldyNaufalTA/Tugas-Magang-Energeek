@extends('layouts.form')
@section('title', 'Login')
@section('content')

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <!--begin::Wrapper-->
    <div class="container p-5">
        <div class="row justify-content-center mx-5 my-5">
            <div class="col-lg-6 bg-white p-5 main shadow-lg">
                <div class="text-center">
                    <h2>Login</h2>
                </div>
                <div class="alert mt-0">
                    <x-jet-validation-errors class="text-danger" />
                </div>
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="fv-row mb-4">
                        <!--begin::Wrapper-->
                        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="input-group">
                            <input
                                class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                type="email" name="email" id="email" :value="old('email')" required autofocus
                                placeholder="Email" />
                        </div>
                    </div>
                    <div class="fv-row mb-4">
                        <!--begin::Wrapper-->
                        <label class="form-label fs-6 fw-bolder text-dark">Password</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div class="input-group">
                            <input
                                class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                type="password" name="password" id="password" :value="old('password')" required autofocus
                                placeholder="Password" autocomplete="current-password" />
                        </div>
                    </div>
                    <div class="text-center rounded">
                        <button class="btn btn-md btn-primary mt-3">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
