<header class="navbar shadow" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <a class="navbar-brand" href="{{ url('/') }}">{{config('app.name')}}</a>
            @auth
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    {{-- Settings Dropdown --}}
                    <div class="ml-3 relative">
                        <div class="relative" x-data="{ open: false }" x-on:click.away="open = false">
                            <div x-on:click="open = ! open">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="navbar-toggler inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md focus:outline-none transition">
                                        <div class="text-base font-semibold">{{Str::title(auth()->user()->name)}}</div>

                                        <svg class="navbar-toggler-icon ml-2 -mr-0.5 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </span>
                            </div>
                            <div x-on:click="open = false" x-show="open"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute z-50 mt-2 w-48 rounded-md shadow-lg origin-top-right right-0"
                                style="display: none;"
                            >
                                <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">

                                    @if (Route::currentRouteName() != 'dashboard')
                                        <a class="nav-item" href="{{route('dashboard')}}">
                                            @svg('icon-dashboard', 'mr-1')
                                            {{__('Dashboard')}}
                                        </a>

                                        <div class="border-t border-slate-100"></div>
                                    @endif

                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-slate-400">
                                        {{__('Manage Account')}}
                                    </div>

                                    <a href="{{route('user.edit', auth()->user()->name)}}"
                                        class="nav-item {{(request()->route()->getName() === 'user.edit') ? 'border-l-2 border-uh-indigo-400':''}}">
                                        @svg('icon-user', 'mr-1') {{__('Profile')}}</a>
                                    <a href="{{route('user.change-password', auth()->user()->name)}}"
                                        class="nav-item {{(request()->route()->getName() === 'user.change-password') ? 'border-l-2 border-uh-indigo-400':''}}">
                                        @svg('icon-key', 'mr-1') {{__('Change Password')}}</a>

                                    <div class="border-t border-slate-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{route('logout')}}">
                                    @csrf
                                        <a href="{{route('logout')}}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="nav-item"
                                        >
                                            @svg('icon-sign-out', 'mr-1') {{__('Log Out')}}
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <a href="{{route('login')}}"
                        class="text-xl font-medium text-gray-500 hover:text-gray-900 mr-8">{{__('Log in')}}</a>
                    @if (Route::has('register') and Config::get('urlhub.registration'))
                        <a href="{{route('register')}}"
                            class="text-xl font-medium text-white bg-uh-indigo-600 hover:bg-uh-indigo-700 active:bg-uh-indigo-600
                                px-4 py-2 rounded-md transition ease-in-out duration-150"
                        >
                            {{__('Sign up')}}
                        </a>
                    @endif
                </div>
            @endauth
            {{-- Hamburger --}}
            <div class="-mr-2 flex items-center sm:hidden">
                <button x-on:click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md
                        text-slate-400 hover:text-slate-500 focus:text-slate-500
                        hover:bg-slate-100 focus:bg-slate-100 focus:outline-none transition"
                >
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    {{-- Responsive Navigation Menu --}}
    <div :class="{'block': open, 'hidden': ! open}" x-show="open" x-transition class="navbar-mobile sm:hidden block">
        @auth
            <div class="pt-2 pb-3 space-y-1">
                @if (Route::currentRouteName() != 'dashboard')
                    <a href="{{route('dashboard')}}"
                        class="nav-item {{(request()->route()->getName() === 'dashboard') ? 'border-l-2 border-uh-indigo-400':''}}">
                        @svg('icon-dashboard', 'mr-1') {{__('Dashboard')}}</a>
                @endif
                <a href="{{route('dashboard.allurl')}}"
                    class="nav-item {{(request()->route()->getName() === 'dashboard.allurl') ? 'border-l-2 border-uh-indigo-400':''}}">
                    @svg('icon-link', 'mr-1') {{__('URL List')}}</a>
                <a href="{{route('user.index')}}"
                    class="nav-item {{(request()->route()->getName() === 'user.index') ? 'border-l-2 border-uh-indigo-400':''}}">
                    @svg('icon-users', 'mr-1') {{__('User List')}}</a>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-slate-200">
                <div class="flex items-center px-4">
                    <div>
                        <div class="nav-item-username">{{auth()->user()->name}}</div>
                        <div class="nav-item-email">{{auth()->user()->email}}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <a href="{{route('user.edit', auth()->user()->name)}}"
                        class="nav-item {{(request()->route()->getName() === 'user.edit') ? 'border-l-2 border-uh-indigo-400':''}}">
                        @svg('icon-user', 'mr-1') {{__('Profile')}}</a>
                    <a href="{{route('user.change-password', auth()->user()->name)}}"
                        class="nav-item {{(request()->route()->getName() === 'user.change-password') ? 'border-l-2 border-uh-indigo-400':''}}">
                        @svg('icon-key', 'mr-1') {{__('Change Password')}}</a>

                    <!-- Authentication -->
                    <form method="POST" action="{{route('logout')}}">
                    @csrf
                        <a class="nav-item" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                            @svg('icon-sign-out', 'mr-1') {{__('Log Out')}}
                        </a>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{route('login')}}" class="block pl-3 pr-4 py-2 font-medium transition">
                    {{__('Log in')}}
                </a>
                @if (Route::has('register') and Config::get('urlhub.registration'))
                    <a href="{{route('register')}}" class="block pl-3 pr-4 py-2 font-medium transition">
                        {{__('Sign up')}}
                    </a>
                @endif
            </div>
        @endauth
    </div> {{-- End Responsive Navigation Menu --}}

    {{-- It should only appear on the dashboard page only. --}}
    @if (request()->is('admin*'))
    <nav class="navbar navbar-expand-lg navbar" style="background-color: #0b1320;">
        <div class="container-fluid">
            <a href="/"><img class="logos" src="../assets/images/wiz.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <ul class="navbar-nav topnav" style="margin-left: 244px;">
                    <li class="nav-item">
                        <a class="nav-link active" href="https://www.wizbrand.com/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
                            href="https://www.wizbrand.com/orgslist">Organizations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
                            href="https://www.wizbrand.com/influencers">Influencer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
                            href="https://www.wizbrand.com/about-us">Aboutus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="https://www.wizbrand.com/tutorials/"
                            target="_blank">Tutorials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="https://www.wizbrand.com/tools/">Tools</a>
                     </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="https://www.wizbrand.com/api/service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="https://www.wizbrand.com/register">Register</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link active" href="https://www.wizbrand.com/login">Login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    @endif
</header>
