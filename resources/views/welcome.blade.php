<x-guest-layout>
    <!-- header -->
    <header class="header my-8">
        <!-- container -->
        <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">
            <!-- header wrapper -->
            <div class="header-wrapper flex items-center justify-between">

                <!-- header logo -->
                <div class="header-logo">
                    {{-- <h1 class="font-semibold text-black leading-relaxed"><a href="">RLExport</a></h1> --}}

                    <x-application-logo></x-application-logo>


                </div>

                <!-- mobile toggle -->
                <div class="toggle md:hidden">
                    <button @click=" isOpen = true" @keydown.escape=" isOpen = false">
                        <svg class="h-6 w-6 fill-current text-black" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <!-- Navbar -->
                <navbar class="navbar hidden md:block">
                    <ul class="flex space-x-8 text-sm font-semibold">
                        <li><a href="#" class="active border-b-2 border-[#5DA035] pb-2">Active</a></li>
                        <li><a href="#" class="hover:text-[#5DA035]">Test</a></li>
                        <li>
                            <a href="{{route('login')}}"
                                class="cta bg-[#2A4523] hover:bg-[#5DA035] px-3 py-2 rounded text-white font-normal">
                                {{__('Entrance')}}
                            </a>
                        </li>
                    </ul>
                </navbar>

            </div>
        </div>

    </header>
    <!-- end header -->

    <!-- slider -->
    <div class="w-full overflow-hidden flex flex-nowrap text-center" id="slider">
        <div class="bg-[#2A4523] text-white space-y-4 flex-none w-full flex flex-col items-start justify-center p-20">
            <h2 class="text-4xl max-w-md">Пиломатериалы от производителя</h2>
            <p class="max-w-md">
                Мы производим пиломатериалы на собственном производстве в Сланцевском районе и осуществляем доставку по
                Санкт-Петербургу
                и Ленинградской области, а также : Вологодской, Тверской, Псковской, Новгородской и другим ближайшим
                областям.
            </p>
        </div>
        <div class="bg-[#5DA035] text-white space-y-4 flex-none w-full flex flex-col items-center justify-center">
            <h2 class="text-4xl max-w-md">Пиломатериалы от производителя</h2>
            <p class="max-w-md">
                Мы производим пиломатериалы на собственном производстве в Сланцевском районе и осуществляем доставку по
                Санкт-Петербургу
                и Ленинградской области, а также : Вологодской, Тверской, Псковской, Новгородской и другим ближайшим
                областям.
            </p>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
        const slider = document.querySelector('#slider');
        setTimeout(function moveSlide() {
            const max = slider.scrollWidth - slider.clientWidth;
            const left = slider.clientWidth;

            if (max === slider.scrollLeft) {
                slider.scrollTo({left: 0, behavior: 'smooth'})
            } else {
                slider.scrollBy({left, behavior: 'smooth'})
            }

            setTimeout(moveSlide, 4000)
        }, 4000)

    })
    </script>
    <!-- end slider -->

    <!-- mobile navbar -->
    <div class="mobile-navbar">

        <!-- navbar wrapper -->
        <div class="navbar-wrapper fixed top-0 left-0 h-full bg-white z-30 w-64 shadow-lg p-5" x-show="isOpen"
            @click.away=" isOpen = false" x-transition:enter="transition duration-300 -ml-64"
            x-transition:enter-start="" x-transition:enter-end="transform translate-x-64"
            x-transition:leave="transition duration-300" x-transition:enter-start=""
            x-transition:leave-end="transform -translate-x-64">
            <div class="close">
                <button class="absolute top-0 right-0 mt-4 mr-4" @click=" isOpen = false">
                    <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <ul class="divide-y">
                <li><a href="#" class="my-4 inline-block active font-bold">Active</a></li>
                <li><a href="#" class="my-4 inline-block hover:text-[#5DA035]">Test</a></li>
                <li>
                    <a href="{{route('login')}}"
                        class="my-8 w-full text-center font-semibold cta inline-block bg-[#2A4523] hover:bg-[#5DA035] px-3 py-2 rounded text-white font-normal">
                        {{__('Entrance')}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end mobile navbar -->


    <footer class="bg-[#f2e8cf]" aria-labelledby="footer-heading">
        <div class="mx-auto max-w-7xl px-6 pb-8 lg:px-8">
            <div class="border-t border-gray-900/10 pt-8">
                <p class="text-xs leading-5 text-gray-500">&copy; {{ date('Y')}} RLExport, Inc. All rights reserved.</p>
            </div>
        </div>
    </footer>

</x-guest-layout>
