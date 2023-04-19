<x-layout>
    <div class="min-h-screen flex flex-col">
        <x-header userName="{{ $userName }}" language="{{ $language }}" />
        <div class="flex-grow lg:bg-worldwidebg pl-4 lg:pl-32 lg:pt-5">

            <h1 class="font-extrabold py-8 text-lg lg:text-3xl">{{ __('dashboard.title_countries') }}</h1>

            <div class="border-b border-gray-200 pb-2 lg:pb-4 lg:pt-3">
                <a href="{{ route('dashboard') }}">
                    <p class="inline mr-5  lg:pb-4 lg:text-lg lg:mr-14">
                        {{ __('dashboard.tab_wordlwide') }}</p>
                </a>

                <p class="inline font-bold lg:text-lg border-b-[0.2rem] pb-2 border-black lg:pb-4">
                    {{ __('dashboard.tab_country') }}</p>
            </div>
        </div>
    </div>
</x-layout>
