<nav class="flex py-4 px-5 bg-gray-900 justify-between">
    <div class="logo flex ">
        <a href="{{ route('home') }}" class="flex text-white">
            <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
                </svg>
            <span class="font-semibold text-xl tracking-tight">Egy Stack</span>
        </a>
        <div class="group  ml-5 hidden md:inline-block">
            <button
                class="outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                <span class="pr-1 font-semibold flex-1 text-gray-900">Language</span>
                <span>
                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                  transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </span>
            </button>
            <ul class="bg-white border  rounded-sm transform scale-0 group-hover:scale-100 absolute
            transition duration-150 ease-in-out origin-top min-w-32 z-50">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="rounded-sm px-3 py-1 hover:bg-gray-100 z-50">
                        <a class="w-full h-full" rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @auth
        <div class="  flex-row  hidden md:flex">
            <a href="{{ route('logout') }}" class="btn text-gray-200 text-lg italic mr-3">logout</a>
        </div>
    @endauth
    @guest
        <div class="  flex-row  hidden md:flex">
            <a href="{{ route('login') }}" class="btn text-gray-200 text-lg italic mr-3">Login</a>
            <a href="{{ route('register') }}" class="btn btn-yellow">Register</a>
        </div>
    @endguest
    <button id="toggle-btn" class="md:hidden"><img src="{{ asset('assets/images/ui.svg') }}" alt="menu"></button>

</nav>
<div class="drop-down hidden opacity-0  flex-col justify-center items-center bg-gray-900 py-8 md:hidden ">
    <a href="{{ route('login') }}" class="btn text-gray-200 text-lg italic mr-3">Login</a>
    <a href="{{ route('register') }}" class="btn my-4 btn-yellow">Register</a>
    <div class="group inline-block ml-5">
        <button class="outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
            <span class="pr-1 font-semibold flex-1 text-gray-900">Language</span>
            <span>
                <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </span>
        </button>
        <ul class="bg-white border  rounded-sm transform scale-0 group-hover:scale-100 absolute
            transition duration-150 ease-in-out origin-top min-w-32 z-50">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="rounded-sm px-3 py-1 hover:bg-gray-100 z-50">
                    <a class="w-full h-full" rel="alternate" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <ul></ul>
</div>
<style>
    li>ul {
        transform: translatex(100%) scale(0)
    }

    li:hover>ul {
        transform: translatex(101%) scale(1)
    }

    li>button svg {
        transform: rotate(-90deg)
    }

    li:hover>button svg {
        transform: rotate(-270deg)
    }

    .group:hover .group-hover\:scale-100 {
        transform: scale(1)
    }

    .group:hover .group-hover\:-rotate-180 {
        transform: rotate(180deg)
    }

    .scale-0 {
        transform: scale(0)
    }

    .min-w-32 {
        min-width: 8rem
    }

    .display-menu {
        display: flex;
        opacity: 1;
        transition: 0.4s ease-in-out;

    }

</style>
<script>
    window.addEventListener('resize', (e) => {
        if (screen.width > 766) {
            document.querySelector('.drop-down').classList.remove('display-menu');
        }
    })
    document.getElementById('toggle-btn').addEventListener('click', () => {
        document.querySelector('.drop-down').classList.toggle('display-menu');
    })

</script>
