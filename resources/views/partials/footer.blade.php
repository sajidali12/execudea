<footer class="bg-gray-100 pt-14 pb-5">
    <div class="container mx-auto md:px-10 px-2">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            <div class="col-span-1 text-left">
                <a href="{{ route('home') }}">
                    <img src="{{ App\Models\SiteSetting::get('footer_logo') ? asset('storage/' . App\Models\SiteSetting::get('footer_logo')) : (App\Models\SiteSetting::get('site_logo') ? asset('storage/' . App\Models\SiteSetting::get('site_logo')) : asset('img/execudea.png')) }}" 
                         alt="{{ App\Models\SiteSetting::get('company_name', 'Execudea') }} Logo" 
                         class="w-40">
                </a>
                <p class="text-gray-500 mt-5">
                    {{ App\Models\SiteSetting::get('footer_description', 'We are helping businesses to develop their web applications with innovative solutions and cutting-edge technology.') }}
                </p>
                <p class="text-gray-500 mt-3">
                    {{ App\Models\SiteSetting::get('contact_address', 'Office #02, 2nd Floor, Building 140 I&T Center G9/1 Islamabad, Pakistan.') }}
                </p>
            </div>
            <div class="col-span-1 md:col-span-3 flex flex-col md:flex-row md:justify-between">
                <div class="flex flex-col gap-3">
                    <a class="text-gray-500 hover:text-primary" href="{{ route('home') }}">Home</a>
                    <a class="text-gray-500 hover:text-primary" href="{{ route('courses.index') }}">Courses</a>
                    <a class="text-gray-500 hover:text-primary" href="{{ route('blog') }}">Blog</a>
                    <a class="text-gray-500 hover:text-primary" href="{{ route('contact') }}">Contact Us</a>
                    <a class="text-gray-500 hover:text-primary" href="{{ route('about') }}">About</a>
                </div>
                <div class="flex flex-col gap-2 mt-5 md:mt-0">
                    <h5 class="font-semibold">Services</h5>
                    <a class="text-gray-500 hover:text-primary" href="{{ route('services.show', 'user-experience-design') }}">User Experience Design</a>
                    <a class="text-gray-500 hover:text-primary" href="{{ route('services.show', 'web-development') }}">Web Development</a>
                    <a class="text-gray-500 hover:text-primary" href="{{ route('services.show', 'search-engine-optimization') }}">Search Engine Optimization</a>
                    <a class="text-gray-500 hover:text-primary" href="{{ route('services.show', 'wordpress-development') }}">WordPress Development</a>
                </div>
                
                <div class="flex flex-col gap-3 mt-5 md:mt-0">
                    <h5 class="font-semibold">Get in touch</h5>
                    <a class="text-gray-500 hover:text-primary" href="mailto:{{ App\Models\SiteSetting::get('contact_email', 'info@execudea.com') }}">{{ App\Models\SiteSetting::get('contact_email', 'info@execudea.com') }}</a>
                    <div class="flex justify-center md:justify-start gap-4 mt-3">
                        <a href="{{ App\Models\SiteSetting::get('social_facebook', 'https://www.facebook.com/execudea') }}" aria-label="Facebook">
                            <svg class="w-7 h-7 text-slate-600 transition-all hover:text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <a href="{{ App\Models\SiteSetting::get('social_linkedin', 'https://www.linkedin.com/company/execudea') }}" aria-label="LinkedIn">
                            <svg class="w-7 h-7 text-slate-600 transition-all hover:text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg>
                        </a>
                        <a href="{{ App\Models\SiteSetting::get('social_instagram', 'https://www.instagram.com/execudea/') }}" aria-label="Instagram">
                            <svg class="w-7 h-7 text-slate-600 transition-all hover:text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col gap-3 mt-5 md:mt-0">
                    <h5 class="font-semibold">Contacts</h5>
                    <a class="text-gray-500 hover:text-primary" href="tel:{{ App\Models\SiteSetting::get('contact_phone', '+92 336 5707907') }}">{{ App\Models\SiteSetting::get('contact_phone', '+92 336 5707907') }}</a>
                    <a class="text-gray-500 hover:text-primary" href="tel:{{ App\Models\SiteSetting::get('contact_phone_2', '+92 314 5805849') }}">{{ App\Models\SiteSetting::get('contact_phone_2', '+92 314 5805849') }}</a>
                </div>
            </div>
        </div>
        <div class="border-b my-5"></div>
        <div class="text-center">
            <p class="text-gray-500 text-sm">
                {{ App\Models\SiteSetting::get('footer_copyright', '© ' . date('Y') . ' Execudea. All rights reserved.') }}
            </p>
        </div>
    </div>
</footer>