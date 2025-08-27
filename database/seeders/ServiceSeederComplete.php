<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeederComplete extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'User Experience Design',
                'slug' => 'user-experience-design',
                'description' => 'Professional UI/UX design services in Pakistan. We create intuitive user experiences and beautiful interfaces that engage users and drive business growth.',
                'content' => '
                <section class="py-20 bg-gray-50/30">
                    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
                        <div class="text-center mb-16">
                            <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">Our Services</span>
                            <h2 class="text-3xl font-medium mt-5 mb-4 font-futura-bold">User Experience (UX) Design</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                                    <img class="h-8 w-8" src="/favicon.png" alt="Execudea Private Limited" />
                                </div>
                                <h3 class="mb-3 mt-4 text-lg font-semibold">Interaction Design</h3>
                                <p class="text-gray-600">Designing subtle animations and feedback mechanisms that enhance user engagement.</p>
                            </div>
                            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                                    <img class="h-8 w-8" src="/favicon.png" alt="Execudea Private Limited" />
                                </div>
                                <h3 class="mb-3 mt-4 text-lg font-semibold">User Research</h3>
                                <p class="text-gray-600">Conducting interviews to understand user needs and pain points. Collecting quantitative data to inform design decisions.</p>
                            </div>
                            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                                    <img class="h-8 w-8" src="/favicon.png" alt="Execudea Private Limited" />
                                </div>
                                <h3 class="mb-3 mt-4 text-lg font-semibold">Responsive Design</h3>
                                <p class="text-gray-600">Ensuring that designs function well across various screen sizes and devices.</p>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="py-20 bg-gray-50/30">
                    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Frequently Asked Questions</h2>
                            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                                Get answers to common questions about our UI/UX design services
                            </p>
                        </div>
                        <div class="max-w-4xl mx-auto">
                            <div class="space-y-4">
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">What is the difference between UI and UX design?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">UI (User Interface) design focuses on the visual elements like buttons, colors, and layout, while UX (User Experience) design focuses on the overall user journey, research, and how users interact with your product to achieve their goals.</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">How long does a typical UI/UX design project take?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">A standard UI/UX design project takes 4-8 weeks depending on complexity. This includes user research, wireframing, prototyping, visual design, and user testing. We provide detailed timelines during project planning.</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Do you conduct user research and testing?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">Yes, we conduct comprehensive user research including interviews, surveys, usability testing, and competitor analysis. This helps us create designs based on real user needs and behaviors rather than assumptions.</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Can you redesign our existing website or app?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">Absolutely! We specialize in redesigning existing digital products to improve user experience, increase conversions, and modernize the interface while maintaining brand consistency.</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Do you provide design systems and style guides?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">Yes, we create comprehensive design systems including color palettes, typography guidelines, component libraries, and style guides to ensure consistency across all your digital touchpoints.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>',
                'icon' => 'img/ui-ux.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Custom web development services using modern technologies. We build responsive, fast, and scalable web applications tailored to your business needs.',
                'content' => '
                <section class="py-20 bg-gray-50/30">
                    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
                        <div class="text-center mb-16">
                            <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">Our Services</span>
                            <h2 class="text-3xl font-medium mt-5 mb-4 font-futura-bold">Web Development Services</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                                    <img class="h-8 w-8" src="/favicon.png" alt="Execudea Private Limited" />
                                </div>
                                <h3 class="mb-3 mt-4 text-lg font-semibold">Frontend Development</h3>
                                <p class="text-gray-600">Modern responsive websites using React, Vue.js, and cutting-edge frontend technologies.</p>
                            </div>
                            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                                    <img class="h-8 w-8" src="/favicon.png" alt="Execudea Private Limited" />
                                </div>
                                <h3 class="mb-3 mt-4 text-lg font-semibold">Backend Development</h3>
                                <p class="text-gray-600">Robust server-side solutions using Laravel, Node.js, and scalable database architectures.</p>
                            </div>
                            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                                    <img class="h-8 w-8" src="/favicon.png" alt="Execudea Private Limited" />
                                </div>
                                <h3 class="mb-3 mt-4 text-lg font-semibold">E-commerce Solutions</h3>
                                <p class="text-gray-600">Complete online store development with secure payment integration and inventory management.</p>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="py-20 bg-gray-50/30">
                    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Frequently Asked Questions</h2>
                            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                                Get answers to common questions about our web development services
                            </p>
                        </div>
                        <div class="max-w-4xl mx-auto">
                            <div class="space-y-4">
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">What technologies do you use for web development?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">We use modern technologies including Laravel, React, Vue.js, Node.js, and PHP for backend development, with responsive frontend frameworks and secure database solutions.</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">How long does it take to develop a website?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">Development time varies based on complexity. A simple website takes 2-4 weeks, while complex web applications can take 8-16 weeks. We provide detailed timelines during project planning.</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Do you provide website maintenance and support?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">Yes, we offer ongoing maintenance packages including security updates, performance optimization, content updates, and technical support to keep your website running smoothly.</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Will my website be mobile-responsive?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">Yes, all our websites are built with mobile-first approach ensuring perfect display and functionality across all devices including desktops, tablets, and smartphones.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>',
                'icon' => 'img/tech/web.jpeg',
                'is_active' => true,
            ],
            [
                'name' => 'Search Engine Optimization',
                'slug' => 'search-engine-optimization',
                'description' => 'Comprehensive SEO services to improve your website\'s visibility and rankings in search engines. Drive more organic traffic to your business.',
                'content' => '
                <section class="py-20 bg-gray-50/30">
                    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
                        <div class="text-center mb-16">
                            <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">Our Services</span>
                            <h2 class="text-3xl font-medium mt-5 mb-4 font-futura-bold">SEO Services</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                                    <img class="h-8 w-8" src="/favicon.png" alt="Execudea Private Limited" />
                                </div>
                                <h3 class="mb-3 mt-4 text-lg font-semibold">Keyword Research</h3>
                                <p class="text-gray-600">In-depth keyword analysis to target the most valuable search terms for your business.</p>
                            </div>
                            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                                    <img class="h-8 w-8" src="/favicon.png" alt="Execudea Private Limited" />
                                </div>
                                <h3 class="mb-3 mt-4 text-lg font-semibold">Technical SEO</h3>
                                <p class="text-gray-600">Website optimization for search engine crawlers including site speed and mobile responsiveness.</p>
                            </div>
                            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                                    <img class="h-8 w-8" src="/favicon.png" alt="Execudea Private Limited" />
                                </div>
                                <h3 class="mb-3 mt-4 text-lg font-semibold">Content Marketing</h3>
                                <p class="text-gray-600">Strategic content creation that ranks well and engages your target audience effectively.</p>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="py-20 bg-gray-50/30">
                    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Frequently Asked Questions</h2>
                            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                                Get answers to common questions about our SEO services
                            </p>
                        </div>
                        <div class="max-w-4xl mx-auto">
                            <div class="space-y-4">
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">How long does it take to see SEO results?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">SEO is a long-term strategy. You can typically see initial improvements in 2-3 months, with significant results appearing in 6-12 months depending on competition and current website status.</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Do you guarantee first page rankings?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">While no one can guarantee specific rankings due to constantly changing search algorithms, we focus on proven white-hat techniques that consistently improve organic visibility and traffic.</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">What SEO tools do you use?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">We use industry-leading tools including SEMrush, Ahrefs, Google Analytics, Google Search Console, and Screaming Frog for comprehensive SEO analysis and optimization.</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Do you work with local SEO?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">Yes, we specialize in local SEO including Google My Business optimization, local citations, and location-based keyword targeting to help businesses dominate local search results.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>',
                'icon' => 'img/seo.jpeg',
                'is_active' => true,
            ],
            [
                'name' => 'WordPress Development',
                'slug' => 'wordpress-development',
                'description' => 'Expert WordPress development services including custom themes, plugins, and website optimization. Build powerful WordPress websites that grow with your business.',
                'content' => '
                <section class="py-20 bg-gray-50/30">
                    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
                        <div class="text-center mb-16">
                            <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">Our Services</span>
                            <h2 class="text-3xl font-medium mt-5 mb-4 font-futura-bold">WordPress Development</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                                    <img class="h-8 w-8" src="/favicon.png" alt="Execudea Private Limited" />
                                </div>
                                <h3 class="mb-3 mt-4 text-lg font-semibold">Custom Themes</h3>
                                <p class="text-gray-600">Bespoke WordPress themes designed specifically for your brand and business requirements.</p>
                            </div>
                            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                                    <img class="h-8 w-8" src="/favicon.png" alt="Execudea Private Limited" />
                                </div>
                                <h3 class="mb-3 mt-4 text-lg font-semibold">Plugin Development</h3>
                                <p class="text-gray-600">Custom WordPress plugins to extend functionality and meet your specific business needs.</p>
                            </div>
                            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                                    <img class="h-8 w-8" src="/favicon.png" alt="Execudea Private Limited" />
                                </div>
                                <h3 class="mb-3 mt-4 text-lg font-semibold">WooCommerce</h3>
                                <p class="text-gray-600">Complete e-commerce solutions using WooCommerce with custom functionality and integrations.</p>
                            </div>
                        </div>
                    </div>
                </section>
                
                <section class="py-20 bg-gray-50/30">
                    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
                        <div class="text-center mb-16">
                            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Frequently Asked Questions</h2>
                            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                                Get answers to common questions about our WordPress development services
                            </p>
                        </div>
                        <div class="max-w-4xl mx-auto">
                            <div class="space-y-4">
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Why choose WordPress for my website?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">WordPress powers 43% of all websites globally. It\'s user-friendly, SEO-friendly, highly customizable, and has a vast ecosystem of themes and plugins to extend functionality.</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Can you migrate my existing website to WordPress?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">Yes, we offer complete website migration services from any platform to WordPress, ensuring zero data loss and minimal downtime during the transition process.</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Do you provide WordPress maintenance services?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">Yes, we offer comprehensive WordPress maintenance including security updates, plugin updates, backups, performance optimization, and content updates to keep your site secure and fast.</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                                    <div class="px-6 py-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Can you create custom WordPress plugins?</h3>
                                        <p class="text-gray-600 leading-relaxed mt-2">Absolutely! We develop custom WordPress plugins tailored to your specific business needs, whether it\'s for e-commerce, membership sites, booking systems, or any other functionality.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>',
                'icon' => 'img/wordpress.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'Payload CMS Development',
                'slug' => 'payload-cms-development',
                'description' => 'Professional Payload CMS development services in Pakistan. Build modern headless CMS applications with TypeScript, React admin panels, and scalable content management solutions.',
                'content' => null,
                'icon' => 'img/tech/payload-top-banner-image.jpg',
                'is_active' => true,
            ],
            [
                'name' => 'AI Development',
                'slug' => 'ai-development',
                'description' => 'Professional AI development services in Pakistan. Build intelligent applications with machine learning, natural language processing, computer vision, and custom AI solutions using Python, TensorFlow, and modern AI frameworks.',
                'content' => null,
                'icon' => 'img/tech/ai.png',
                'is_active' => false,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}