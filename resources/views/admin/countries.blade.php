<x-layout>
    <div class="min-h-screen flex flex-col">
        <x-header userName="{{ $userName }}" language="{{ $language }}" />

        <div class="lg:bg-worldwidebg">
            <div class="flex-grow  pl-4 lg:pl-32 lg:pt-5">

                <h1 class="font-extrabold py-8 text-lg lg:text-3xl">{{ __('dashboard.title_countries') }}</h1>

                <div class="border-b border-gray-200 pb-2 lg:pb-4 lg:pt-3">
                    <a href="{{ route('dashboard') }}">
                        <p class="inline mr-5  lg:pb-4 lg:text-lg lg:mr-14">
                            {{ __('dashboard.tab_wordlwide') }}</p>
                    </a>

                    <p class="inline font-bold lg:text-lg border-b-[0.2rem] pb-2 border-black lg:pb-4 ">
                        {{ __('dashboard.tab_country') }}</p>
                </div>

                <div
                    class="mt-4 lg:mt-10 lg:w-fit lg:border lg:border-gray-200 lg:pl-5 lg:py-2 lg:rounded-lg border-gray-300">
                    <form method="GET" action="#">
                        <img class="h-5 inline" src="{{ asset('images/search.png') }}" />
                        <input type="text" name="search" placeholder="{{ __('dashboard.search') }}"
                            class="border-none focus:outline-none focus:ring-0 lg:bg-worldwidebg placeholder-gray-400 text-sm"
                            value="{{ request('search') }}">

                        @if (request('country'))
                            <input type="hidden" name="country" value="{{ request('country') }}">
                        @endif

                        @if (request('confirmed'))
                            <input type="hidden" name="confirmed" value="{{ request('confirmed') }}">
                        @endif

                        @if (request('deaths'))
                            <input type="hidden" name="deaths" value="{{ request('deaths') }}">
                        @endif

                        @if (request('recovered'))
                            <input type="hidden" name="recovered" value="{{ request('recovered') }}">
                        @endif

                    </form>
                </div>

            </div>

            <div
                class="mt-4 lg:max-h-[40rem] lg:overflow-y-scroll lg:mt-10 lg:mx-32 lg:border lg:border-gray-100 lg:rounded-lg">
                <table class="w-full">
                    <thead class="sticky top-0 bg-gray-100 text-center text-xs font-semibold lg:text-base lg:text-left">
                        <th class="py-5 tracking-wider w-1/4 break-all lg:w-2/12 lg:pl-20">
                            <div class="flex justify-center items-center lg:justify-start">
                                <a href="#"
                                    onclick="event.preventDefault(); window.location.href = '{{ route('dashboard.countries', ['country' => request('country') == 'desc' ? 'asc' : 'desc', 'search' => request('search')]) }}' + location.hash;">
                                    {{ __('dashboard.location') }}</a>
                                <x-sort-indicator query="country" />
                            </div>
                        </th>
                        <th class=" py-5 tracking-wider w-1/4 break-all lg:w-2/12 lg:pl-20">
                            <div class="flex justify-center items-center lg:justify-start">
                                <a class="inline" href="#"
                                    onclick="event.preventDefault(); window.location.href = '{{ route('dashboard.countries', ['confirmed' => request('confirmed') == 'desc' ? 'asc' : 'desc', 'search' => request('search')]) }}' + location.hash;">
                                    {{ __('dashboard.new') }} </a>
                                <x-sort-indicator query="confirmed" />
                            </div>
                        </th>
                        <th class="py-5 tracking-wider w-1/4 break-all lg:w-2/12 lg:pl-20">
                            <div class="flex justify-center items-center lg:justify-start">
                                <a href="#"
                                    onclick="event.preventDefault(); window.location.href = '{{ route('dashboard.countries', ['deaths' => request('deaths') == 'desc' ? 'asc' : 'desc', 'search' => request('search')]) }}' + location.hash;">
                                    {{ __('dashboard.death') }}</a>
                                <x-sort-indicator query="deaths" />
                            </div>
                        </th>
                        <th class="py-5 tracking-wider w-1/4 break-all lg:w-2/5 lg:pl-20">
                            <div class="flex justify-center items-center lg:justify-start">
                                <a href="#"
                                    onclick="event.preventDefault(); window.location.href = '{{ route('dashboard.countries', ['recovered' => request('recovered') == 'desc' ? 'asc' : 'desc', 'search' => request('search')]) }}' + location.hash;">
                                    {{ __('dashboard.recovered') }}</a>
                                <x-sort-indicator query="recovered" />
                            </div>
                        </th>
                    </thead>

                    <div
                        class="scrollbar-thin scrollbar-track-transparent scrollbar-thumb-rounded-md scrollbar-thumb-gray-500 lg:max-h-[40rem] lg:overflow-y-scroll lg:mx-32 lg:border lg:border-gray-100 lg:rounded-lg">
                        <tbody>
                            <tr class="text-xs text-left border-b border-gray-100 lg:text-base">
                                <td class="py-3 pl-5 lg:pl-20">{{ __('dashboard.tab_wordlwide') }}</td>
                                <td class="py-3 pl-5 lg:pl-20">{{ $worldwideNew }}</td>
                                <td class="py-3 pl-5 lg:pl-20">{{ $worldwideDeaths }}</td>
                                <td class="py-3 pl-5 lg:pl-20">{{ $worldwideRecovered }}</td>
                            </tr>
                            @foreach ($countries as $country)
                                <tr class="text-xs text-left border-b border-gray-100 lg:text-base">
                                    <td class="py-3 pl-5 lg:pl-20">{{ $country->getTranslation('country', $locale) }}
                                    </td>
                                    <td class="py-3 pl-5 lg:pl-20">{{ number_format($country->confirmed) }}</td>
                                    <td class="py-3 pl-5 lg:pl-20">{{ number_format($country->deaths) }}</td>
                                    <td class="py-3 pl-5 lg:pl-20">{{ number_format($country->recovered) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </div>
                </table>
            </div>

        </div>

    </div>
</x-layout>
