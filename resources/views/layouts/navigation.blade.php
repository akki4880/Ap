<nav x-data="{ open: false, notificationOpen: false }"
    class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/dashboard">
                        <img src="{{ asset('Logo.png') }}" alt="Triumph" class="h-9 w-auto">
                    </a>
                </div>

                @auth
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <!-- Add Status Link -->
                    <x-nav-link :href="route('document.status')" :active="request()->routeIs('document.status')"
                        class="font-bold">
                        {{ __('Status') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Notification Bell -->
            <div class="flex items-center ">

                <!-- User Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="relative mx-3 text-gray-800 id=" bell">
                        <button id="notificationButton" @click="notificationOpen = !notificationOpen" class="relative">
                            <i class="fas fa-bell"></i>

                            @if($notificationCount > 0)
                            <span
                                class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-red-500 text-white rounded-full w-4 h-4 text-xs flex items-center justify-center font-semibold">
                                {{ $notificationCount }}
                            </span>
                            @endif

                        </button>
                        <div id="notificationDropdown" x-show="notificationOpen" @click.away="notificationOpen = false"
                            class="absolute right-0 mt-2 w-56 bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg max-h-80 overflow-y-auto">
                            @php
                            $limitedNotifications = $notifications->reverse()->take(10);
                            @endphp
                            @forelse ($limitedNotifications as $notification)
                            @if ($notification->role == 'Admin')
                            <div class="p-4 hover:bg-gray-50">
                                @php
                                $documentName = \App\Models\Document::getDocumentName($notification->message);
                                @endphp
                                <div class="text-sm font-semibold">
                                    {{ $documentName }} has been
                                    <span
                                        style="color: {{ $notification->status == 'approved' ? 'green' : ($notification->status == 'rejected' ? 'red' : 'inherit') }}">
                                        {{ $notification->status }}
                                    </span>
                                </div>

                                <div class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}
                                </div>
                            </div>
                            @endif
                            @empty
                            <div class="p-4 text-sm text-gray-500">
                                No notifications.
                            </div>
                            @endforelse
                        </div>


                    </div>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-bold text-gray-800 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content" class="mt-4">
                            <x-dropdown-link :href="route('profile.edit')" class="text-gray-800 font-bold">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="text-gray-800 font-bold"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <div class="relative mx-3 text-gray-800">
                    <button id="notificationButton" @click="notificationOpen = !notificationOpen" class="relative">
                        <i class="fas fa-bell"></i> 
                        @if($notificationCount > 0)
                        <span
                            class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-red-500 text-white rounded-full w-4 h-4 text-xs flex items-center justify-center font-semibold">
                            {{ $notificationCount }}
                        </span>
                        @endif 
                    </button>
                    <div id="notificationDropdown" x-show="notificationOpen" @click.away="notificationOpen = false"
                        class="absolute right-0 mt-2 w-56 bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg max-h-80 overflow-y-auto">
                        @php
                        $limitedNotifications = $notifications->reverse()->take(10);
                        @endphp
                        @forelse ($limitedNotifications as $notification)
                        <div class="p-4 hover:bg-gray-50">
                            <div class="text-sm font-semibold text-gray-800">{{ $notification->message }}</div>
                            <div class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</div>
                        </div>
                        @empty
                        <div class="p-4 text-sm text-gray-500">
                            No notifications.
                        </div>
                        @endforelse
                    </div>

                </div>

                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Add your responsive navigation links here -->
        </div>

        @auth
        <!-- Responsive Settings Options -->
        <div class="pb-1 border-t border-gray-200 dark:border-gray-600 mt-4">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>