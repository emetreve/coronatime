<x-layout>
    <div class="min-h-screen relative">
        <div class="pt-2 top-0 left-0 w-fullflex flex-col items-center pb-16 lg:pb-32">
            <img class="h-14 px-4 pt-6 lg:h-20 lg:mx-auto" src="{{ asset('images/logo.png') }}" alt="logo" />

            <div class="px-4 w-full flex justify-center items-center">
                <h1 class="font-bold text-[1.4rem] pt-10 lg:pt-32 lg:text-[1.8rem]">{{ __('password-reset.reset') }}</h1>
            </div>

            <form novalidate method="POST" action="{{ route('password.update') }}"
                class="px-4 pt-5 lg:w-1/4 lg:mx-auto lg:pt-10">
                @csrf

                <input hidden name="email" id="email" value="{{ $email }}" />

                <div class="mt-4">
                    <label class="block font-bold text-xs" for="password">{{ __('inputs.password_new') }}</label>
                    <input
                        class="{{ $errors->has('password') ? 'border-red-600' : (old('password') ? 'border-validgreen' : 'border-gray-200') }} block mt-1 border py-4 px-5 text-s rounded-lg w-full placeholder-gray-400 font-light"
                        type="password" name="password" id="password"
                        placeholder="{{ __('inputs.password_placeholder') }}">
                    <div class="mt-1 h-3">
                        @if ($errors->has('password'))
                            <div>
                                <img class="inline h-4" src="{{ asset('images/error.png') }}" />
                                <p class="inline-block ml-1 text-red-600 text-xs">
                                    {{ $errors->first('password') }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-4 mb-4">
                    <label class="block font-bold text-xs"
                        for="password_confirmation">{{ __('inputs.repeat_password') }}</label>
                    <input
                        class="{{ $errors->has('password_confirmation') ? 'border-red-600' : (old('password_confirmation') ? 'border-validgreen' : 'border-gray-200') }} block mt-1 border  py-4 px-5 text-s rounded-lg w-full placeholder-gray-400 font-light"
                        type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="{{ __('inputs.repeat_password_placeholder') }}">
                    <div class="h-5">
                        @error('password_confirmation')
                            <div>
                                <img class="inline h-4" src="{{ asset('images/error.png') }}" />
                                <p class="inline-block ml-1 text-red-600 text-xs">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                </div>

                <input type="hidden" name="token" value="{{ $token }}">
                <x-button text="{{ __('password-reset.reset') }}" />

            </form>

        </div>
    </div>


    </div>
</x-layout>
