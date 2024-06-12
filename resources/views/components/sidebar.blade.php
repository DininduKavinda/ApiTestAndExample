<nav class="bg-gray-800 p-4 mb-6">
    <div class="flex justify-between items-cetnter">
        <form class="flex" role="search" method="GET" action="{{ route('user.search') }}">
            <label for="topbar-search" class="sr-only">Search</label>
            <div class="relative mt-1 lg:w-96 ">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input name="username" type="search" id="topbar-search"
                    class="bg-gray-700 border border-gray-600 text-gray-300 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block
                     w-full pl-9 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Search">
            </div>
            <button class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-r-md text-white" hidden
            type="submit">Search</button>
        </form>

    </div>

</nav>
