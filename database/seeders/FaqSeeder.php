<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            // WordPress Development FAQs
            [
                'question' => 'How much does WordPress website development cost in Pakistan?',
                'answer' => 'WordPress website development costs in Pakistan range from PKR 25,000 for basic websites to PKR 500,000 for complex e-commerce sites. The cost depends on design complexity, custom features, and functionality requirements.',
                'category' => 'wordpress',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'How long does it take to develop a WordPress website?',
                'answer' => 'A typical WordPress website takes 2-8 weeks to develop, depending on complexity. Simple business websites take 2-3 weeks, while custom e-commerce sites may take 6-8 weeks including testing and optimization.',
                'category' => 'wordpress',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Do you provide WordPress maintenance services?',
                'answer' => 'Yes, we offer comprehensive WordPress maintenance services including security updates, backups, performance optimization, and technical support. Our maintenance packages start from PKR 5,000 per month.',
                'category' => 'wordpress',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Can you migrate my existing website to WordPress?',
                'answer' => 'Yes, we specialize in website migration to WordPress. We can migrate from any platform while preserving your content, SEO rankings, and ensuring minimal downtime. Migration projects typically take 1-2 weeks.',
                'category' => 'wordpress',
                'sort_order' => 4,
                'is_active' => true,
            ],

            // Web Development FAQs
            [
                'question' => 'What web development technologies do you use?',
                'answer' => 'We use modern technologies including Laravel, PHP, Node.js, React, Vue.js, and Angular for web development. We select the best technology stack based on your project requirements and business goals.',
                'category' => 'web-development',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Do you develop mobile-responsive websites?',
                'answer' => 'Yes, all our websites are mobile-responsive and optimized for all devices. We follow mobile-first design principles to ensure your website looks perfect on smartphones, tablets, and desktops.',
                'category' => 'web-development',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Can you integrate payment gateways for Pakistani businesses?',
                'answer' => 'Yes, we integrate popular Pakistani payment gateways including JazzCash, EasyPaisa, HBL Konnect, and international gateways like PayPal and Stripe for your e-commerce needs.',
                'category' => 'web-development',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Do you provide website hosting services?',
                'answer' => 'We can recommend and set up reliable hosting solutions for your website. We work with reputable hosting providers and can handle the complete setup including domain configuration and SSL certificates.',
                'category' => 'web-development',
                'sort_order' => 4,
                'is_active' => true,
            ],

            // SEO FAQs
            [
                'question' => 'How long does it take to see SEO results?',
                'answer' => 'SEO results typically start showing in 3-6 months, with significant improvements visible in 6-12 months. The timeline depends on website age, competition, and the current state of your SEO.',
                'category' => 'seo',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'What is included in your SEO packages?',
                'answer' => 'Our SEO packages include keyword research, on-page optimization, technical SEO, content optimization, link building, Google My Business optimization, and monthly progress reports.',
                'category' => 'seo',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Do you guarantee first-page Google rankings?',
                'answer' => 'While we cannot guarantee specific rankings (no ethical SEO company can), we guarantee improved visibility, increased organic traffic, and better search engine performance using proven SEO strategies.',
                'category' => 'seo',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'How much do SEO services cost in Pakistan?',
                'answer' => 'Our SEO services range from PKR 15,000 to PKR 50,000 per month depending on website size, competition level, and service scope. We offer customized packages to fit your budget and goals.',
                'category' => 'seo',
                'sort_order' => 4,
                'is_active' => true,
            ],

            // UI/UX Design FAQs
            [
                'question' => 'What is the difference between UI and UX design?',
                'answer' => 'UI (User Interface) focuses on visual elements like colors, typography, and layouts. UX (User Experience) focuses on the overall user journey and how users interact with your product to achieve their goals.',
                'category' => 'ui-ux',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'How long does UI/UX design take for a website?',
                'answer' => 'UI/UX design typically takes 2-6 weeks depending on project complexity. Simple websites require 2-3 weeks, while complex applications may take 4-6 weeks including research, wireframing, and testing.',
                'category' => 'ui-ux',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Do you provide mobile app UI/UX design?',
                'answer' => 'Yes, we design user interfaces and experiences for mobile apps on both iOS and Android platforms. We follow platform-specific design guidelines to ensure optimal user experience.',
                'category' => 'ui-ux',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'What tools do you use for UI/UX design?',
                'answer' => 'We use industry-standard tools including Figma, Adobe XD, Sketch for design, and Canva and Photoshop for graphics. We also use prototyping tools for interactive demonstrations.',
                'category' => 'ui-ux',
                'sort_order' => 4,
                'is_active' => true,
            ],

            // SaaS FAQs
            [
                'question' => 'What is SaaS and how can it benefit my business?',
                'answer' => 'SaaS (Software as a Service) delivers software over the internet, eliminating installation and maintenance hassles. It offers cost savings, scalability, automatic updates, and accessibility from anywhere.',
                'category' => 'saas',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'How much does custom SaaS development cost?',
                'answer' => 'Custom SaaS development costs vary from PKR 500,000 for MVP to PKR 5,000,000+ for enterprise solutions. Costs depend on features, complexity, user capacity, and integration requirements.',
                'category' => 'saas',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'How long does it take to develop a SaaS application?',
                'answer' => 'SaaS development timeline ranges from 3-12 months. MVP development takes 3-6 months, while full-featured applications may take 6-12 months including testing, security, and deployment.',
                'category' => 'saas',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Do you provide ongoing support for SaaS applications?',
                'answer' => 'Yes, we provide comprehensive ongoing support including server maintenance, security updates, feature enhancements, bug fixes, and 24/7 technical support for your SaaS application.',
                'category' => 'saas',
                'sort_order' => 4,
                'is_active' => true,
            ],

            // General FAQs
            [
                'question' => 'What industries do you serve?',
                'answer' => 'We serve various industries including healthcare, education, e-commerce, real estate, manufacturing, hospitality, finance, and startups. Our solutions are customized for each industry\'s specific requirements.',
                'category' => 'general',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Do you sign Non-Disclosure Agreements (NDAs)?',
                'answer' => 'Yes, we sign NDAs to protect your business ideas and confidential information. We maintain strict confidentiality throughout the project and beyond completion.',
                'category' => 'general',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'What are your payment terms?',
                'answer' => 'We typically work with 50% upfront and 50% on completion for smaller projects. For larger projects, we can arrange milestone-based payments. We accept bank transfers, online payments, and checks.',
                'category' => 'general',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Do you provide post-launch support?',
                'answer' => 'Yes, we provide 3 months of free support after project completion, including bug fixes and minor updates. Extended support packages are available for ongoing maintenance and enhancements.',
                'category' => 'general',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'question' => 'How do you ensure project quality?',
                'answer' => 'We follow rigorous quality assurance processes including code reviews, testing at multiple stages, client feedback incorporation, and final quality checks before delivery. All projects undergo thorough testing.',
                'category' => 'general',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faqData) {
            Faq::create($faqData);
        }
    }
}