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

            <div class="grid grid-cols-2 lg:grid-cols-3 pt-6 pr-4 lg:pr-28">
                <div
                    class="flex flex-col items-center justify-center lg:col-span-1 col-span-3 h-48 mb-4 bg-blue-opacity-8 rounded-2xl lg:mr-6 lg:h-80">
                    <img class="h-20" src="{{ asset('images/new-cases.png') }}" alt="logo" />
                    <p>New cases</p>
                    <h1>715,523</h1>
                </div>
                <div class="lg:col-span-1 col-span-1 bg-green-opacity-8 rounded-2xl h-52 mr-2 lg:mr-3 lg:h-80">
                    hello2
                </div>
                <div class="lg:col-span-1 col-span-1 bg-yellow-opacity-8 rounded-2xl h-52 ml-2 lg:mr-3 lg:h-80">
                    hello3
                </div>
            </div>

        </div>
    </div>
</x-layout>
