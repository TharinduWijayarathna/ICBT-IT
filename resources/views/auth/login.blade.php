<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>


        <div class="row justify-content-center">
            <div class="col-md-8 card">
                <div class="card-body p-5">
                    <x-validation-errors class="mb-4" />
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="d-flex  mt-4">

                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}"
                                style="color:rgb(0, 0, 0); text-decoration:none;">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-button class="ml-4" style="color:white; border-color: #215e83;
                            background-color: #215e83; margin-left:auto;">
                                {{ __('LOG IN') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
