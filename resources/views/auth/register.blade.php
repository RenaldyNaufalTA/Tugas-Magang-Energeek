@section('title', 'Register')
<x-guest-layout>
    <!--begin::Wrapper-->
        <div class="w-lg-550px bg-body rounded shadow-lg p-10 p-lg-15 " id="bodyform">
            <a href="{{url('/')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="primary" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
            </a>
                <div class="mt-10 text-center">
                    <!--begin::Title-->
                    <h2 class="text-dark mb-3 fw-bold fs-30">Registration</h2>
                    <!--end::Title-->
                    <div class="text-gray-400 fw-bold fs-4">Already registered?
                        <a href="{{ route('login') }}" class="link-primary fw-bolder">Log in here</a>
                    </div>
                </div>
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                        <div class="alert mt-0">
                            <x-jet-validation-errors class="mb-1 text-danger" id="error" />
                            </div>
                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" class="form-label fw-bolder text-dark fs-6" />
                            <x-jet-input id="name" class="form-control form-control-lg form-control-solid" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" class="form-label fw-bolder text-dark fs-6"/>
                            <x-jet-input id="email" class="form-control form-control-lg form-control-solid" type="email" name="email" :value="old('email')" required />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" class="form-label fw-bolder text-dark fs-6"/>
                            <x-jet-input id="password" class="form-control form-control-lg form-control-solid" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="form-label fw-bolder text-dark fs-6"/>
                            <x-jet-input id="password_confirmation" class="form-control form-control-lg form-control-solid" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms"/>

                                        <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif

                        <div class="text-center pt-10">
                            <button class="btn btn-m btn-primary btn-active-secondary text-center">
                                    {{ __('Register') }}
                            </button>
                        </div>
                    </form>
            </div>
</x-guest-layout>
