<x-layout>
    <div class="min-h-screen px-4">
        <img class="h-14 pt-6 lg:h-20 lg:mx-auto" src="{{ asset('images/logo.png') }}" />
        <div class="absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center pb-16 lg:pb-32">
            <img class="h-20 pt-6 lg:h-24" src="{{ asset('checkmark.gif') }}" />
            <p class="text-gray-600 mt-4 lg:text-2xl">{{ __('password-reset.sent_email') }}</p>
        </div>
    </div>
</x-layout>
