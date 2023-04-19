@props(['userName', 'language'])
<div class="border-b border-gray-200">
    <div class="relative lg:mx-28 pb-6">
        <div class="flex items-center justify-between pt-6 px-4 w-full">
            <img class="h-8 lg:h-12 inline" src="{{ asset('images/logo.png') }}" alt="logo" />
            <div class="flex items-center">

                <p class="inline lg:text-lg">
                    {{ $language }}
                </p>

                <div class="relative">
                    <img class="ml-2 inline h-[0.4rem] lg:h-[0.46rem] cursor-pointer"
                        src="{{ asset('images/language-switcher.png') }}" id="dropdown-toggle">
                    <div class="w-28 absolute top-0 mt-8 bg-white rounded-md shadow-lg hidden" id="dropdown-content">
                        <ul class="flex flex-col items-center">

                            <li class="hover:bg-gray-100 py-2 text-center w-full text-lg"><a
                                    href="{{ route('lang.switch', ['lang' => 'en']) }}">{{ __('dashboard.english') }}</a>
                            </li>

                            <li class="hover:bg-gray-100 py-2 text-center w-full text-lg"><a
                                    href="{{ route('lang.switch', ['lang' => 'ka']) }}">{{ __('dashboard.georgian') }}</a>
                            </li>

                        </ul>
                    </div>
                </div>

                <img class="ml-8 h-[0.9rem] inline lg:hidden" src="{{ asset('images/burger-menu.png') }}"
                    alt="logo" />
                <p class="hidden lg:inline ml-14 font-semibold text-lg">{{ $userName }}</p>

                <p onclick="document.querySelector('#logout').submit()"
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
</script>
