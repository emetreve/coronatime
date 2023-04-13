<x-layout>
    <div class="min-h-screen px-4">
        <img class="h-14 pt-6" src="{{ asset('images/logo.png') }}" />
        <div class="absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center">
            <img class="h-20 pt-6" src="{{ asset('checkmark.gif') }}" />
            <p class="text-gray-600 mt-4">{{ __('email-verification.sent_email') }}</p>
        </div>
    </div>
</x-layout>
