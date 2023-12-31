<x-layout>
    <div class="flex">

        <div class="min-h-screen px-4 flex-1 lg:min-h-full lg:pt-32 lg:pl-52">

            <div class="lg:w-2/5 lg:scale-125">

                <img class="h-14 pt-6" src="{{ asset('images/logo.png') }}" alt="logo" />
                <div class="pt-10 ">
                    <p class="font-bold text-xl">{{ __('signup.welcome') }}</p>
                    <p class="text-gray-400 font-light pt-1">{{ __('signup.welcome_full') }}</p>

                </div>

                <form class="mt-5" method="POST" action="{{ route('signup') }}" novalidate>
                    @csrf
                    <div>

                        <div>
                            <label class="relative block font-bold text-xs" for="name">{{ __('inputs.username') }}
                                @if (!$errors->has('name') && old('name'))
                                    <img class="absolute top-10 right-5 h-4" src="{{ asset('images/valid.png') }}" />
                                @endif
                                <input
                                    class="{{ $errors->has('name') ? 'border-red-600' : (old('name') ? 'border-validgreen' : 'border-gray-200') }} block mt-1 border  py-4 px-5 text-s rounded-lg w-full placeholder-gray-400 font-light"
                                    type="text" name="name" id="name" value="{{ old('name') }}"
                                    placeholder="{{ __('inputs.username_placeholder') }}">
                            </label>
                            <div class="mt-1 h-5">
                                @if ($errors->has('name'))
                                    <div>
                                        <img class="inline h-4" src="{{ asset('images/error.png') }}" />
                                        <p class=" inline-block ml-1 text-red-600 text-xs">{{ $errors->first('name') }}
                                        </p>
                                    </div>
                                @else
                                    <p class="text-gray-400 text-xs">{{ __('inputs.username_validation') }}</p>
                                @endif

                            </div>
                        </div>

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

                        <div class="mt-4">
                            <label class="block font-bold text-xs" for="password">{{ __('inputs.password') }}
                                <input
                                    class="{{ $errors->has('password') ? 'border-red-600' : (old('password') ? 'border-validgreen' : 'border-gray-200') }} block mt-1 border  py-4 px-5 text-s rounded-lg w-full placeholder-gray-400 font-light"
                                    type="password" name="password" id="password"
                                    placeholder="{{ __('inputs.password_placeholder') }}">
                            </label>
                            <div class="h-5">
                                @error('password')
                                    <div>
                                        <img class="inline h-4" src="{{ asset('images/error.png') }}" />
                                        <p class="inline-block ml-1 text-red-600 text-xs">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 -mb-1">
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

                        <x-button type="submit" text="{{ __('signup.button_signup') }}"></x-button>

                        <div class="pt-5 py-9 flex justify-center">
                            <div>
                                <p class="text-gray-500 text-xs inline">{{ __('signup.already_have_account') }}</p>
                                <p class="inline text-xs font-bold hover:cursor-pointer"><a
                                        href="{{ route('login.index') }}">{{ __('signup.sign_in') }}</a></p>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="hidden lg:block flex-none h-screen">
            <img class="hidden lg:block w-full h-full" src="{{ asset('images/vaccine.png') }}" />
        </div>
    </div>
</x-layout>
