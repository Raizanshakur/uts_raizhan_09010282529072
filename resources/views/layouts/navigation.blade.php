<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <div class="flex">

                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}"
                       class="font-bold text-xl text-blue-700">
                        Perpustakaan
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                    >
                        Dashboard
                    </x-nav-link>

                    <x-nav-link
                        :href="route('books.index')"
                        :active="request()->routeIs('books.index')"
                    >
                        Daftar Buku
                    </x-nav-link>

                    <x-nav-link
                        :href="route('books.create')"
                        :active="request()->routeIs('books.create')"
                    >
                        Tambah Buku
                    </x-nav-link>

                    <x-nav-link
                        :href="route('categories.index')"
                        :active="request()->routeIs('categories.*')"
                    >
                        Kategori
                    </x-nav-link>

                </div>

            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <div class="me-4 text-sm text-gray-600">
                    {{ Auth::user()->name }}
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg"
                    >
                        Logout
                    </button>
                </form>

            </div>

            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100"
                >
                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>

            </div>

        </div>

    </div>

    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden"
    >

        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
            >
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('books.index')"
                :active="request()->routeIs('books.index')"
            >
                Daftar Buku
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('books.create')"
                :active="request()->routeIs('books.create')"
            >
                Tambah Buku
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('categories.index')"
                :active="request()->routeIs('categories.*')"
            >
                Kategori
            </x-responsive-nav-link>

        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="px-4">
                <div class="font-medium text-base text-gray-800">
                    {{ Auth::user()->name }}
                </div>

                <div class="font-medium text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <div class="mt-3 space-y-1">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        Logout
                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>
</nav>