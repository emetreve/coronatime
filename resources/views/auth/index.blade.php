<x-layout>
    <div class="min-h-screen px-3">

        <img class="h-8 mt-6" src="{{ asset('images/logo.png') }}" />
        <div class="pt-8 ">
            <p class="font-bold text-xl">{{ __('login.welcome') }}</p>
            <p class="text-gray-400 font-light pt-1">{{ __('login.welcome_full') }}</p>

        </div>

        <form class="mt-5">
            <div>

                <div>
                    <label class="block font-bold text-xs" for="username">{{ __('inputs.username') }}</label>
                    <input
                        class="block mt-1 border border-gray-200 py-4 px-5 text-s rounded-lg w-full placeholder-gray-400 font-light"
                        type="text" name="username" id="username"
                        placeholder="{{ __('inputs.username_placeholder') }}">
                    <div class="">
                        @error('username')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block font-bold text-xs" for="password">{{ __('inputs.password') }}</label>
                    <input
                        class="block mt-1 border border-gray-200 py-4 px-5 text-s rounded-lg w-full placeholder-gray-400 font-light"
                        type="password" name="password" id="password"
                        placeholder="{{ __('inputs.password_placeholder') }}">
                    <div class="">
                        @error('password')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 relative">
                    <input
                        class="peer relative h-5 w-5 shrink-0 appearance-none rounded-md border after:absolute after:left-0 after:top-0 after:h-full after:w-full after:bg-[url('data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9JzMwMHB4JyB3aWR0aD0nMzAwcHgnICBmaWxsPSIjZmZmZmZmIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgdmVyc2lvbj0iMS4xIiB4PSIwcHgiIHk9IjBweCI+PHRpdGxlPmljb25fYnlfUG9zaGx5YWtvdjEwPC90aXRsZT48ZGVzYz5DcmVhdGVkIHdpdGggU2tldGNoLjwvZGVzYz48ZyBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48ZyBmaWxsPSIjZmZmZmZmIj48ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgyNi4wMDAwMDAsIDI2LjAwMDAwMCkiPjxwYXRoIGQ9Ik0xNy45OTk5ODc4LDMyLjQgTDEwLjk5OTk4NzgsMjUuNCBDMTAuMjI2Nzg5MSwyNC42MjY4MDE0IDguOTczMTg2NDQsMjQuNjI2ODAxNCA4LjE5OTk4Nzc5LDI1LjQgTDguMTk5OTg3NzksMjUuNCBDNy40MjY3ODkxNCwyNi4xNzMxOTg2IDcuNDI2Nzg5MTQsMjcuNDI2ODAxNCA4LjE5OTk4Nzc5LDI4LjIgTDE2LjU4NTc3NDIsMzYuNTg1Nzg2NCBDMTcuMzY2ODIyOCwzNy4zNjY4MzUgMTguNjMzMTUyOCwzNy4zNjY4MzUgMTkuNDE0MjAxNCwzNi41ODU3ODY0IEw0MC41OTk5ODc4LDE1LjQgQzQxLjM3MzE4NjQsMTQuNjI2ODAxNCA0MS4zNzMxODY0LDEzLjM3MzE5ODYgNDAuNTk5OTg3OCwxMi42IEw0MC41OTk5ODc4LDEyLjYgQzM5LjgyNjc4OTEsMTEuODI2ODAxNCAzOC41NzMxODY0LDExLjgyNjgwMTQgMzcuNzk5OTg3OCwxMi42IEwxNy45OTk5ODc4LDMyLjQgWiI+PC9wYXRoPjwvZz48L2c+PC9nPjwvc3ZnPg==')] after:bg-[length:40px] after:bg-center after:bg-no-repeat after:content-[''] checked:bg-green-500 focus:outline-none"
                        type="checkbox" name="remember" id="remember">
                    <label class="absolute top-[0.2rem] ml-2  font-bold text-xs"
                        for="remember">{{ __('login.remember_device') }}</label>
                    <div class="">
                        @error('password')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </form>

    </div>
</x-layout>
