<x-layout>
    <div class="min-h-screen flex flex-col">
        <x-header userName="{{ $userName }}" language="{{ $language }}" />

        <div>
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

                <div class="mt-4">
                    <form method="GET" action="#">
                        <img class="h-5 inline" src="{{ asset('images/search.png') }}" />
                        <input type="text" name="search" placeholder="Search by country"
                            class="border-none focus:outline-none focus:ring-0 placeholder-gray-400 text-sm"
                            value="{{ request('search') }}">
                    </form>
                </div>

            </div>

            <div class="mt-4">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <th class="text-center py-5 text-xs font-semibold tracking-wider relative">
                            <p class="inline mr-1">Location</p>
                        </th>
                        <th class="py-5 text-center text-xs font-semibold tracking-wider">
                            New Cases
                        </th>
                        <th class="py-5 text-center text-xs font-semibold tracking-wider">
                            Deaths
                        </th>
                        <th class="py-5 text-center text-xs font-semibold tracking-wider">
                            Recovered
                        </th>
                    </thead>
                </table>
            </div>

        </div>

    </div>
</x-layout>
