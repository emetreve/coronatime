@props(['userName', 'language'])
<div class="border-b border-gray-200">
    <div class="relative lg:mx-28 pb-6">
        <div class="flex items-center justify-between pt-6 px-4 w-full">
            <img class="h-8 lg:h-12 inline" src="{{ asset('images/logo.png') }}" alt="logo" />
            <div class="flex items-center">
                <span id="dropdown-toggle" class="cursor-pointer flex items-center">
                    <p class="inline lg:text-lg">
                        {{ $language }}
                    </p>

                    <div class="relative">
                        <img class="ml-2 inline h-[0.4rem] lg:h-[0.46rem]"
                            src="{{ asset('images/language-switcher.png') }}">
                        <div class="w-28 absolute top-0 mt-8 bg-white rounded-md shadow-lg hidden -right-4"
                            id="dropdown-content">
                            <ul class="flex flex-col items-center">

                                <li class="hover:bg-gray-100 py-2 text-center w-full text-sm lg:text-lg"><a
                                        href="{{ route('lang.switch', ['lang' => 'en']) }}">English</a>
                                </li>

                                <li class="hover:bg-gray-100 py-2 text-center w-full text-sm lg:text-lg"><a
                                        href="{{ route('lang.switch', ['lang' => 'ka']) }}">ქართული</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </span>

                <img id="burger-toggle" class="ml-8 h-[0.9rem] inline hover:cursor-pointer lg:hidden"
                    src="{{ asset('images/burger-menu.png') }}" alt="logo" />
                <div class="absolute top-5 mt-8 bg-white rounded-md shadow-lg hidden right-1" id="burger-content">
                    <ul class="flex flex-col items-center">
                        <li class="px-5 py-2 text-center w-full text-sm font-semibold lg:text-lg">
                            {{ $userName }}</p>
                        </li>
                        <li class="hover:bg-gray-100 px-5 py-2 hover:cursor-pointer text-center w-full text-sm lg:text-lg"
                            onclick="logout()">
                            {{ __('dashboard.log_out') }}</p>
                        </li>
                    </ul>
                </div>

                <p class="hidden lg:inline ml-14 font-semibold text-lg">{{ $userName }}</p>

                <p onclick="logout()"
                    class="hidden lg:inline text-lg ml-8 pl-4 py-1 border-l border-gray-100 hover:cursor-pointer">
                    {{ __('dashboard.log_out') }}</p>
                <form class="hidden" method="POST" action="{{ route('logout') }}" novalidate id="logout">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var dropdownToggle = document.getElementById('dropdown-toggle');
    var dropdownContent = document.getElementById('dropdown-content');

    dropdownToggle.addEventListener('click', function() {
        dropdownContent.classList.toggle('hidden');
    });

    var burgerToggle = document.getElementById('burger-toggle');
    var burgerContent = document.getElementById('burger-content');

    burgerToggle.addEventListener('click', function() {
        burgerContent.classList.toggle('hidden');
    });

    function logout() {
        document.querySelector('#logout').submit();
    }
</script>
