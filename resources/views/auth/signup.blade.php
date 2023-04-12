<x-layout>
    <div class="flex">

        <div class="min-h-screen px-4 flex-1 lg:min-h-full lg:pt-32 lg:pl-52">

            <div class="lg:w-2/5 lg:scale-125">

                <img class="h-14 pt-6" src="{{ asset('images/logo.png') }}" />
                <div class="pt-10 ">
                    <p class="font-bold text-xl">{{ __('signup.welcome') }}</p>
                    <p class="text-gray-400 font-light pt-1">{{ __('signup.welcome_full') }}</p>

                </div>

                <form class="mt-5">
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
                            <label class="block font-bold text-xs" for="email">{{ __('inputs.email') }}</label>
                            <input
                                class="block mt-1 border border-gray-200 py-4 px-5 text-s rounded-lg w-full placeholder-gray-400 font-light"
                                type="email" name="email" id="email"
                                placeholder="{{ __('inputs.email_placeholder') }}">
                            <div class="">
                                @error('email')
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

                        <div class="mt-4">
                            <label class="block font-bold text-xs"
                                for="repeatpassword">{{ __('inputs.repeat_password') }}</label>
                            <input
                                class="block mt-1 border border-gray-200 py-4 px-5 text-s rounded-lg w-full placeholder-gray-400 font-light"
                                type="password" name="repeatpassword" id="repeatpassword"
                                placeholder="{{ __('inputs.repeat_password_placeholder') }}">
                            <div class="">
                                @error('repeatpassword')
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 relative flex">
                            <input class="w-5 h-5 rounded border-gray-200 text-green-500" type="checkbox"
                                name="remember" id="remember">
                            <label class="ml-2 mt-2 font-bold text-xs inline relative bottom-[0.3rem]"
                                for="remember">{{ __('signup.remember_device') }}</label>
                        </div>

                        <x-button type="submit" text="{{ __('signup.button_signup') }}"></x-button>

                        <div class="pt-5 py-9 flex justify-center">
                            <div>
                                <p class="text-gray-500 text-xs inline">{{ __('signup.already_have_account') }}</p>
                                <p class="inline text-xs font-bold hover:cursor-pointer"><a
                                        href="{{ route('signup.index') }}">{{ __('signup.sign_in') }}</a></p>
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
