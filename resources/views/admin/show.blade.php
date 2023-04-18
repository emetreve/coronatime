<x-layout>
    <div class="min-h-screen flex flex-col">
        <x-header userName="{{ $userName }}" language="{{ $language }}" />
        <div class="flex-grow lg:bg-worldwidebg pl-4 lg:pl-32 lg:pt-5">

            <h1 class="font-extrabold py-8 text-lg lg:text-3xl">Worldwide Statistics</h1>

            <div class="border-b border-gray-200 pb-2 lg:pb-4 lg:pt-3">
                <p class="inline mr-5 font-bold border-b-[0.2rem] pb-2 border-black lg:pb-4 lg:text-lg lg:mr-14">
                    Worldwide</p>
                <p class="inline lg:text-lg">By country</p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-3 pt-6 pr-4 lg:pr-28">
                <div
                    class="flex flex-col items-center justify-center lg:col-span-1 col-span-3 h-48 mb-4 bg-blue-opacity-8 rounded-2xl lg:mr-6 lg:h-80">
                    <img class="h-16 lg:scale-150 lg:mb-5" src="{{ asset('images/new-cases.png') }}" alt="logo" />
                    <p class="pt-2 lg:scale-150 lg:mb-6">New cases</p>
                    <h1 class="text-primaryblue font-extrabold text-2xl pt-3 lg:text-3xl lg:scale-150 ">
                        {{ $newCases }}</h1>
                </div>
                <div
                    class="flex flex-col items-center justify-center lg:col-span-1 col-span-1 bg-green-opacity-8 rounded-2xl h-48 mr-2 lg:mr-3 lg:h-80">
                    <img class="h-14 pl-1 lg:scale-150 lg:mb-5" src="{{ asset('images/recovered.png') }}"
                        alt="logo" />
                    <p class="pt-2 lg:scale-150 lg:mb-6">Recovered</p>
                    <h1 class="text-primarygreen font-extrabold text-2xl pt-3 lg:text-3xl lg:scale-150">
                        {{ $recovered }}</h1>
                </div>
                <div
                    class="flex flex-col items-center justify-center lg:col-span-1 col-span-1 bg-yellow-opacity-8 rounded-2xl h-48 ml-2 lg:mr-3 lg:h-80">
                    <img class=" h-14 pl-1 lg:scale-150 lg:mb-5" src="{{ asset('images/death.png') }}" alt="logo" />
                    <p class="pt-2 lg:scale-150 lg:mb-6">Death</p>
                    <h1 class="text-primaryyellow font-extrabold text-2xl pt-3 lg:text-3xl lg:scale-150">
                        {{ $deaths }}</h1>
                </div>
            </div>

        </div>
    </div>
</x-layout>
