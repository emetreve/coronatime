@props(['userName'])
<div class="border-b border-gray-200">
    <div class="relative lg:mx-28 pb-6">
        <div class="flex items-center justify-between pt-6 px-4 w-full">
            <img class="h-8 lg:h-12 inline" src="{{ asset('images/logo.png') }}" alt="logo" />
            <div class="flex items-center">
                <p class="inline lg:text-lg">English</p>
                <img class="ml-2 inline h-[0.4rem] lg:h-[0.46rem]" src="{{ asset('images/language-switcher.png') }}"
                    alt="language-switched" />
                <img class="ml-8 h-[0.9rem] inline lg:hidden" src="{{ asset('images/burger-menu.png') }}"
                    alt="logo" />
                <p class="hidden lg:inline ml-14 font-semibold text-lg">{{ $userName }}</p>

                <p onclick="document.querySelector('#logout').submit()"
                    class="hidden lg:inline text-lg ml-8 pl-4 py-1 border-l border-gray-100 hover:cursor-pointer">
                    Log Out</p>
                <form class="hidden" method="POST" action="{{ route('logout') }}" novalidate id="logout">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
