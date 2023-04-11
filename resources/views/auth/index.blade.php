<x-layout>
    <div class="min-h-screen px-3">

        <img class="h-8 mt-6" src="{{ asset('images/logo.png') }}" />
        <div class="pt-8 ">
            <p class="font-bold text-xl">{{ __('login.welcome') }}</p>
            <p class="text-gray-400 font-light pt-1">{{ __('login.welcome_full') }}</p>

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
            </div>
        </form>

    </div>
</x-layout>
