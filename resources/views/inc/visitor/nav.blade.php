<nav class="flex py-4 px-5 bg-white justify-between">
    <div class="logo flex ">
        <a href="{{ route('home') }}" class="flex text-blue-900">
            <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
                </svg>
            <span class="font-semibold text-xl tracking-tight">Egy Stack</span>
        </a>
    </div>
    <div class="  flex-row  hidden md:flex">
        <a href="{{ route('login') }}" class="btn text-lg  mx-2 px-10 py-2 main-border-blue main-blue">Login</a>
        <a href="{{ route('register') }}" class="btn text-lg  mx-2 px-10 py-2  main-background-blue text-white">Register</a>
        {{-- language section start --}}
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <div class="flex justify-center h-1">
            <div x-data="{ dropdownOpen: false }" class="relative ">
                <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                    {{--<svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>--}}
                    <img src="{{ asset('assets/images/world.svg') }}" style="width: 30px;height: 30px" alt="world" title="change language">
                </button>
                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                <div x-show="dropdownOpen" class="absolute right-0 main-border-blue mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white" hreflang="{{ $localeCode }}"
                               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                    @endforeach

                </div>
            </div>
        </div>
        {{--language section end--}}
    </div>

    <button id="toggle-btn" class="md:hidden"><img src="{{ asset('assets/images/ui.svg') }}" alt="menu"></button>

</nav>
<div class="drop-down hidden opacity-0  flex-col justify-center items-center bg-white py-8 md:hidden ">
    <a href="{{ route('login') }}" class="btn text-lg w-32 text-center py-2 my-4 main-border-blue main-blue">Login</a>
    <a href="{{ route('register') }}" class="btn text-lg w-32 text-center py-2 mb-4  main-background-blue text-white">Register</a>
    <div class="group inline-block ml-5">
        <button class="outline-none min-w-32 focus:outline-none border py-2 btn bg-white rounded-sm flex items-center">
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
