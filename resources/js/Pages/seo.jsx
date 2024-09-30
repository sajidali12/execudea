// import TechLogos from "@/Components/TechLogos";
import Guest from "@/Layouts/GuestLayout";
import { Head, Link } from "@inertiajs/react";
import Seo from "@/Components/seo";

export default function Services() {
    return (
        <>
            <Head title="Best Web Development Agency" />
            <Guest>
              
                <section className="py-20 mt-10">
                    <div className="container md:px-10 px-4 flex flex-col md:flex-row items-center">
                        <div className="md:w-1/2 mb-10 md:mb-0">
                            <img 
                                src="img/seo.jpeg" 
                                alt="Web Development Intro" 
                                className="rounded-lg shadow-lg w-full h-auto" 
                            />
                        </div>
                        <div className="md:w-1/2 md:pl-10">
                            <h1 className="text-4xl font-medium my-3 font-futura-bold">
                            Search Engine Optimization
                            </h1>
                            <p className="text-lg text-gray-500 mb-5">
                            <p className="text-lg text-gray-500">
                            At Execudea, we specialize in Search Engine Optimization (SEO), dedicated to enhancing your online visibility and driving organic traffic to your website. Our comprehensive approach begins with an in-depth analysis of your website, identifying strengths, weaknesses, and opportunities for improvement. We conduct thorough keyword research to understand the terms and phrases your target audience uses, ensuring that our SEO strategies align with their search intent and business goals.
                            </p>
                            </p>
                            <p className="text-lg text-gray-500">
                            
                            </p>
                        </div>
                    </div>
                    <div class="container m-auto mt-10 md:px-10 px-4" data-aos="fade-up">
                    <p className="text-lg text-gray-500">
                    Our SEO process encompasses both on-page and off-page optimization techniques. We optimize your website’s content, meta tags, and structure to enhance relevance and improve search engine rankings. Additionally, we implement technical SEO practices to ensure that your site is crawlable and user-friendly. Our team also focuses on building high-quality backlinks through strategic outreach and content marketing efforts, which are essential for boosting your website’s authority and credibility in search engines.
                            </p>
                            <p className="text-lg text-gray-500 mt-4">

                            Post-implementation, we provide ongoing monitoring and reporting to track your website’s performance. By analyzing key metrics such as organic traffic, bounce rates, and conversion rates, we continuously refine our strategies to ensure optimal results. Our commitment to staying up-to-date with the latest SEO trends and algorithm changes enables us to adapt your strategy as needed, driving sustained growth and visibility in an ever-evolving digital landscape. Trust Execudea to deliver exceptional SEO services that will elevate your brand and connect you with your target audience effectively.
                                </p>
                    </div>
                </section>

               
            
                <section className="bg-gray-50 py-20 mx-5">
                    <div className="container md:px-10 px-4 m-auto">
                        <h2 className="text-4xl font-medium my-3 font-futura-bold text-center mb-8">Our Services</h2>
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-10 mx-4">
                            {[
                                { title: "Keyword Research", description: "Identifying relevant keywords and phrases to target for better search visibility." },
                                { title: "Technical SEO", description: "Optimizing individual pages, including meta tags, headers, content, and internal linking.   " },
                                { title: "Continuous Monitoring and Optimization", description: "Ongoing adjustments based on performance data and algorithm updates." },
                                { title: "Social Media Integration", description: "Enhancing SEO efforts through social media engagement and strategy." },
                                { title: "SEO Audits", description: "Comprehensive evaluations of a website's current SEO performance and areas for improvement.    " },
                                { title: "E-commerce SEO", description: "Specialized strategies for online stores, including product optimization and category structuring.  " },
                                
                            ].map((service, index) => (
                                <div key={index} className="border rounded-lg shadow-lg p-5 text-center hover:shadow-xl transition-shadow">
                                    <h3 className="font-bold text-xl mb-3">{service.title}</h3>
                                    <p className="text-gray-600">{service.description}</p>
                                </div>
                            ))}
                        </div>
                    </div>
                </section>


               
                <section className="py-20">
                    <div className="container md:px-5 px-10">
                        <h2 className="text-4xl font-medium my-3 font-futura-bold text-center mb-8">Our Technology Stack</h2>
                        <div className="flex justify-center">
                            <Seo />
                        </div>
                    </div>
                </section>

                
            </Guest>
        </>
    );
}
