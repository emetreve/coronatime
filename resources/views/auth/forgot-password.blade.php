<x-layout>
    <div class="min-h-screen relative">
        <div class="pt-2 top-0 left-0 w-fullflex flex-col items-center pb-16 lg:pb-32">
            <img class="h-14 px-4 pt-6 lg:h-20 lg:mx-auto" src="{{ asset('images/logo.png') }}" alt="logo" />

            <div class="px-4 w-full flex justify-center items-center">
                <h1 class="font-bold text-[1.4rem] pt-10 lg:pt-32 lg:text-[1.8rem]">{{ __('password-reset.reset') }}</h1>
            </div>

            <form novalidate method="POST" action="{{ route('password.email') }}"
                class="px-4 pt-5 lg:w-1/4 lg:mx-auto lg:pt-10">
                @csrf
                <div class="mt-4">
                    <label class="relative block font-bold text-xs" for="email">{{ __('inputs.email') }}
                        @if (!$errors->has('email') && old('email'))
                            <img class="absolute top-10 right-5 h-4" src="{{ asset('images/valid.png') }}" />
                        @endif
                        <input
                            class="{{ $errors->has('email') ? 'border-red-600' : (old('email') ? 'border-validgreen' : 'border-gray-200') }} block mt-1 border py-4 px-5 text-s rounded-lg w-full placeholder-gray-400 font-light"
                            type="email" name="email" id="email" value="{{ old('email') }}"
                            placeholder="{{ __('inputs.email_placeholder') }}">
                    </label>
                    <div class="h-5">
                        @error('email')
                            <div>
                                <img class="inline h-4" src="{{ asset('images/error.png') }}" />
                                <p class="inline-block ml-1 text-red-600 text-xs">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                </div>

                <x-button text="{{ __('password-reset.reset') }}" />
            </form>


        </div>


    </div>
</x-layout>
