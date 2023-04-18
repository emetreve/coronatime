<x-layout>
    <div class="min-h-screen px-4 relative">
        <img class="h-14 pt-6 lg:h-20 lg:mx-auto" src="{{ asset('images/logo.png') }}" alt="logo" />
        <div class="absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center pb-16 lg:pb-32">
            <img class="h-20 pt-6 lg:h-24" src="{{ asset('checkmark.gif') }}" />
            <p class="text-gray-600 mt-4 lg:text-2xl">{{ __('password-reset.updated_successfully') }}</p>
            <div class="w-full px-4 absolute bottom-5 lg:w-1/4 lg:static lg:pt-20">
                <a href="{{ route('login.index') }}">
                    <x-button text="{{ __('login.button_login') }}" />
                </a>
            </div>
        </div>
    </div>
</x-layout>
