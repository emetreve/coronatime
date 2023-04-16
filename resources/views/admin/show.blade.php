<x-layout>
    <div class="min-h-screen flex flex-col">
        <x-header />
        <div class="flex-grow lg:bg-worldwidebg pl-4 lg:pl-32 lg:pt-5">

            <h1 class="font-extrabold py-8 text-lg lg:text-3xl">Worldwide Statistics</h1>

            <div class="border-b border-gray-200 pb-2 lg:pb-4 lg:pt-3">
                <p class="inline mr-5 font-bold border-b-[0.2rem] pb-2 border-black lg:pb-4 lg:text-lg lg:mr-14">
                    Worldwide</p>
                <p class="inline lg:text-lg">By country</p>
            </div>

            {{-- <x-new-cases />
    <x-recovered />
    <x-death /> --}}
        </div>
    </div>
</x-layout>
