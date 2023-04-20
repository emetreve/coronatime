@props(['query'])
<div class="flex flex-col justify-center items-center ml-1 lg:ml-2">
    <div
        class="inline w-0 h-0 
            {{ request($query) == 'up' ? 'border-b-gray-700' : 'border-b-gray-400' }}
            border-l-3 border-l-transparent
            border-b-3
            border-r-3 border-r-transparent mb-[0.1rem] lg:mb-[0.2rem]
            lg:border-l-4
            lg:border-b-4
            lg:border-r-4
            ">

    </div>

    <div
        class="w-0 h-0 
            {{ request($query) == 'down' ? 'border-t-gray-700' : 'border-t-gray-400' }}
            border-l-3 border-l-transparent
            border-t-3 
            border-r-3 border-r-transparent
            lg:border-l-4
            lg:border-t-4
            lg:border-r-4
            ">
    </div>
</div>
