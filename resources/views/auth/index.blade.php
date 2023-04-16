<x-layout>
    <div class="flex">
        <div class="min-h-screen px-4 flex-1 lg:min-h-full lg:pt-32 lg:pl-52">

            <div class="lg:w-2/5 lg:scale-125">

                <img class="h-14 pt-6" src="{{ asset('images/logo.png') }}" />
                <div class="pt-10 ">
                    <p class="font-bold text-xl">{{ __('login.welcome') }}</p>
                    <p class="text-gray-400 font-light pt-1">{{ __('login.welcome_full') }}</p>

                </div>

                <form class="mt-5" novalidate method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>

                        <div>
                            <label class="relative block font-bold text-xs" for="username">{{ __('inputs.username') }}
                                <input
                                    class="{{ $errors->has('username') ? 'border-red-600' : (old('username') ? 'border-validgreen ' : 'border-gray-200') }} block mt-1 border py-4 px-5 text-s rounded-lg w-full placeholder-gray-400 font-light"
                                    type="text" name="username" id="username" value="{{ old('username') }}"
                                    placeholder="{{ __('inputs.username_placeholder') }}">
                                @if (!$errors->has('username') && old('username'))
                                    <img class="absolute top-10 right-5 h-4" src="{{ asset('images/valid.png') }}" />
                                @endif
                            </label>
                            <div class="mt-1 h-2">
                                @if ($errors->has('username'))
                                    <div>
                                        <img class="inline h-4" src="{{ asset('images/error.png') }}" />
                                        <p class="inline-block ml-1 text-red-600 text-xs">
                                            {{ $errors->first('username') }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="block font-bold text-xs" for="password">{{ __('inputs.password') }}</label>
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

                        <div class="mt-4 relative flex">
                            <input class="w-5 h-5 rounded border-gray-200 text-green-500" type="checkbox"
                                name="remember" id="remember">
                            <label class="ml-2 mt-2 font-bold text-xs inline relative bottom-[0.3rem]"
                                for="remember">{{ __('login.remember_device') }}</label>
                            <a href="{{ route('password.request') }}"
                                class="ml-auto text-xs mt-1 text-right text-blue-600 font-bold hover:cursor-pointer">
                                <p>{{ __('login.forgot_password') }}</p>
                            </a>
                        </div>

                        <x-button type="submit" text="{{ __('login.button_login') }}"></x-button>

                        <div class="mt-5 flex justify-center">
                            <div>
                                <p class="text-gray-500 text-xs inline">{{ __('login.dont_have_account') }}</p>
                                <p class="inline text-xs font-bold hover:cursor-pointer"><a
                                        href="{{ route('signup.index') }}">{{ __('login.sign_up') }}</a></p>
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
