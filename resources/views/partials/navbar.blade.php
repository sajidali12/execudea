<header
    id="navbar"
    class="fixed top-0 inset-x-0 flex items-center z-40 w-full lg:bg-transparent bg-white transition-all duration-500 ease-in-out py-5 backdrop-blur-sm"
>
    <div class="container mx-auto px-2 md:px-10 flex items-center justify-between">
        <a href="{{ route('home') }}">
            <img src="{{ App\Models\SiteSetting::get('site_logo') ? asset('storage/' . App\Models\SiteSetting::get('site_logo')) : asset('img/execudea.png') }}" 
                 alt="{{ App\Models\SiteSetting::get('company_name', 'Execudea') }} Logo" 
                 class="w-32 sm:w-20 md:w-24 lg:w-36 xl:w-40">
        </a>

        <div class="hidden lg:flex items-center space-x-6">
            <a class="text-gray-800 hover:text-primary" href="{{ route('home') }}">
                Home
            </a>
            <a class="text-gray-800 hover:text-primary" href="{{ route('about') }}">
                About
            </a>
            <div 
                class="relative group"
            >
                <button 
                    class="text-gray-800 hover:text-primary flex items-center gap-2 py-2 px-3 rounded-lg transition-all duration-300 hover:bg-gray-50" 
                >
                    Services
                    <i class="fa-solid fa-chevron-down text-xs group-hover:rotate-180 transition-all duration-300 ease-in-out"></i>
                </button>
                <div class="absolute top-full left-0 mt-2 z-10 bg-white shadow-xl rounded-xl w-[450px] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out transform translate-y-2 group-hover:translate-y-0 border border-gray-100"> 
                    <div class="py-2">
                        <a class="flex items-center px-4 py-3 hover:bg-gradient-to-r hover:from-primary/5 hover:to-primary/10 hover:text-primary transition-all duration-200 group/item" href="{{ route('service.ux') }}">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center mr-3 group-hover/item:scale-110 transition-transform duration-200">
                                <i class="fas fa-palette text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="font-medium">User Experience Design</div>
                                <div class="text-xs text-gray-500">Create meaningful experiences</div>
                            </div>
                        </a>
                        <a class="flex items-center px-4 py-3 hover:bg-gradient-to-r hover:from-primary/5 hover:to-primary/10 hover:text-primary transition-all duration-200 group/item" href="{{ route('service.web') }}">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-lg flex items-center justify-center mr-3 group-hover/item:scale-110 transition-transform duration-200">
                                <i class="fas fa-code text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="font-medium">Web Development</div>
                                <div class="text-xs text-gray-500">Build scalable applications</div>
                            </div>
                        </a>
                        <a class="flex items-center px-4 py-3 hover:bg-gradient-to-r hover:from-primary/5 hover:to-primary/10 hover:text-primary transition-all duration-200 group/item" href="{{ route('service.seo') }}">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3 group-hover/item:scale-110 transition-transform duration-200">
                                <i class="fas fa-search text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="font-medium">Search Engine Optimization</div>
                                <div class="text-xs text-gray-500">Improve your visibility</div>
                            </div>
                        </a>
                        <a class="flex items-center px-4 py-3 hover:bg-gradient-to-r hover:from-primary/5 hover:to-primary/10 hover:text-primary transition-all duration-200 group/item" href="{{ route('service.wordpress') }}">
                            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center mr-3 group-hover/item:scale-110 transition-transform duration-200">
                                <i class="fab fa-wordpress text-white text-sm"></i>
                            </div>
                            <div>
                                <div class="font-medium">WordPress Development</div>
                                <div class="text-xs text-gray-500">Custom CMS solutions</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <a class="text-gray-800 hover:text-primary" href="{{ route('courses.index') }}">
                Courses
            </a>
            <a class="text-gray-800 hover:text-primary" href="{{ route('blog') }}">
                Blog
            </a>
            <a class="text-gray-800 hover:text-primary" href="{{ route('contact') }}">
                Contact us
            </a>
            <a
                href="https://calendly.com/execudea-info/30min"
                target="_blank"
                class="bg-primary text-white px-4 py-2 rounded transition duration-300 hover:bg-secondary-400"
            >
                Book a Meeting
            </a>
        </div>

        
        <div class="lg:hidden flex items-center">
            <button
                type="button"
                onclick="toggleMobileMenu()"
                class="text-gray-500 text-2xl"
            >
                <i class="fa-solid fa-bars"></i> 
            </button>
        </div>
    </div>

   
    <div
        id="mobileMenu"
        class="fixed inset-0 bg-white z-50 transition-transform transform translate-x-full"
    >
        <div class="container mx-auto px-6 py-8">
            <button
                type="button"
                onclick="toggleMobileMenu()"
                class="text-gray-500 text-2xl mb-6"
            >
                <i class="fa-solid fa-times"></i>
            </button>
            <ul class="space-y-4">
                <li>
                    <a class="text-gray-800 text-lg block" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a class="text-gray-800 text-lg block" href="{{ route('about') }}">
                        About
                    </a>
                </li>
                <li class="relative">
                    <button 
                        class="text-gray-800 text-lg block flex items-center w-full text-left" 
                        onclick="toggleDropdown()"
                    >
                        Services
                        <i id="dropdownIcon" class="fa-solid fa-chevron-down ml-1"></i>
                    </button>
                    <div id="servicesDropdown" class="bg-white shadow-lg rounded-lg w-64 hidden"> 
                        <a class="block px-4 py-2 hover:bg-gray-200 hover:text-primary rounded-lg" href="{{ route('service.ux') }}">User Experience Design</a>
                        <a class="block px-4 py-2 hover:bg-gray-200 hover:text-primary rounded-lg" href="{{ route('service.web') }}">Web Development</a>
                        <a class="block px-4 py-2 hover:bg-gray-200 hover:text-primary rounded-lg" href="{{ route('service.seo') }}">Search Engine Optimization</a>
                        <a class="block px-4 py-2 hover:bg-gray-200 hover:text-primary rounded-lg" href="{{ route('service.wordpress') }}">Wordpress Development</a>
                    </div>
                </li>
                <li>
                    <a class="text-gray-800 text-lg block" href="{{ route('courses.index') }}">
                        Courses
                    </a>
                </li>
                <li>
                    <a class="text-gray-800 text-lg block" href="{{ route('blog') }}">
                        Blog
                    </a>
                </li>
                <li>
                    <a class="text-gray-800 text-lg block" href="{{ route('contact') }}">
                        Contact us
                    </a>
                </li>
                <li>
                    <a
                        href="https://calendly.com/execudea-info/30min"
                        target="_blank"
                        class="bg-primary text-white px-4 py-2 rounded block text-center"
                    >
                        Book a Meeting
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

<script>
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        mobileMenu.classList.toggle('translate-x-full');
        mobileMenu.classList.toggle('translate-x-0');
    }

    function toggleDropdown() {
        const dropdown = document.getElementById('servicesDropdown');
        const icon = document.getElementById('dropdownIcon');
        
        dropdown.classList.toggle('hidden');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
    }

    // Enhanced sticky navbar with smooth transitions
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        const logo = navbar.querySelector('img');
        
        if (window.scrollY > 50) {
            // Sticky state
            navbar.classList.add('nav-sticky');
            navbar.classList.remove('lg:bg-transparent');
            navbar.classList.add('bg-white', 'shadow-lg', 'border-b', 'border-gray-100');
            navbar.style.paddingTop = '0.75rem';
            navbar.style.paddingBottom = '0.75rem';
            
            // Slightly smaller logo when sticky
            logo.classList.add('scale-90');
        } else {
            // Default state
            navbar.classList.remove('nav-sticky');
            navbar.classList.add('lg:bg-transparent');
            navbar.classList.remove('shadow-lg', 'border-b', 'border-gray-100');
            navbar.style.paddingTop = '1.25rem';
            navbar.style.paddingBottom = '1.25rem';
            
            // Normal logo size
            logo.classList.remove('scale-90');
        }
    });

    // Add smooth scroll behavior for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>