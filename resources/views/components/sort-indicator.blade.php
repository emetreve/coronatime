@props(['query'])
<div class="flex flex-col justify-center items-center ml-1">
    <div
        class="inline w-0 h-0 
            {{ request($query) == 'up' ? 'border-b-gray-700' : 'border-b-gray-400' }}
            border-l-[0.3125rem] border-l-transparent
            border-b-[0.3125rem]
            border-r-[0.3125rem] border-r-transparent mb-[0.1rem]">
    </div>

    <div
        class="w-0 h-0 
            {{ request($query) == 'down' ? 'border-t-gray-700' : 'border-t-gray-400' }}
            border-l-[0.3125rem] border-l-transparent
            border-t-[0.3125rem] 
            border-r-[0.3125rem] border-r-transparent">
    </div>
</div>
