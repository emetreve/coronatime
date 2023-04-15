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
                            <label class="block font-bold text-xs" for="username">{{ __('inputs.username') }}</label>
                            <input
                                class="block mt-1 border border-gray-200 py-4 px-5 text-s rounded-lg w-full placeholder-gray-400 font-light"
                                type="text" name="username" id="username"
                                placeholder="{{ __('inputs.username_placeholder') }}">
                            <div class="">
                                @error('username')
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="block font-bold text-xs" for="password">{{ __('inputs.password') }}</label>
                            <input
                                class="block mt-1 border border-gray-200 py-4 px-5 text-s rounded-lg w-full placeholder-gray-400 font-light"
                                type="password" name="password" id="password"
                                placeholder="{{ __('inputs.password_placeholder') }}">
                            <div class="">
                                @error('password')
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 relative flex">
                            <input class="w-5 h-5 rounded border-gray-200 text-green-500" type="checkbox"
                                name="remember" id="remember">
                            <label class="ml-2 mt-2 font-bold text-xs inline relative bottom-[0.3rem]"
                                for="remember">{{ __('login.remember_device') }}</label>
                            <p class="ml-auto text-xs mt-1 text-right text-blue-600 font-bold hover:cursor-pointer">
                                <a>{{ __('login.forgot_password') }}</a>
                            </p>
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

        @if ($errors)
            {{ dd($errors) }}
        @endif

        <div class="hidden lg:block flex-none h-screen">
            <img class="hidden lg:block w-full h-full" src="{{ asset('images/vaccine.png') }}" />
        </div>
    </div>
</x-layout>
