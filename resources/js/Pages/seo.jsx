// import TechLogos from "@/Components/TechLogos";
import Guest from "@/Layouts/GuestLayout";
import { Head, Link } from "@inertiajs/react";
import TechLogos from "@/Components/TechLogos";

export default function Services() {
    return (
        <>
            <Head title="Best Web Development Agency" />
            <Guest>
              {/* Hero Section Start */}

    <section class="relative" style={{ background: 'linear-gradient(rgba(0,85,255,.07) 0,rgba(0,85,255,.05) 100%)' }}>

        <section class="relative pt-36 pb-24">
            <div class="container">
                <div class="grid lg:grid-cols-7 grid-cols-1 gap-16 items-center">

                    <div class="lg:col-span-4" data-aos="fade-right">
                        <div class="relative 2xl:-ml-64 lg:-ml-28 2xl:min-w-[130%] lg:w-[113%] w-full">
                            <img src="img/hero/marketing.png" alt="marketing-img" />
                        </div>
                    </div>

                    <div class="lg:col-span-3" data-aos="fade-left">
                        <div class="text-center sm:text-start">
                            <h1 class="text-3xl/snug sm:text-4xl/snug xl:text-5xl/snug font-semibold font-futura-bold mb-7">Boost your <span class="relative after:bg-green-500/50 after:-z-10 after:absolute after:h-6 after:w-full after:bottom-0 after:end-0">sales</span> with Digital Marketing
                            </h1>
                            <p class="text-base/relaxed text-gray-500">At Execudea, we specialize in Search Engine Optimization (SEO), dedicated to enhancing your online visibility and driving organic traffic to your website. Our comprehensive approach begins with an in-depth analysis of your website, identifying strengths, weaknesses, and opportunities for improvement. We conduct thorough keyword research to understand the terms and phrases your target audience uses, ensuring that our SEO strategies align with their search intent and business goals.</p>
                            <div class="flex sm:flex-row flex-col gap-2 mt-10">
                              
                                <button class="bg-primary text-white rounded-md text-sm font-semibold flex-none shadow-lg shadow-primary/30 focus:shadow-none focus:outline focus:outline-primary/40 px-8 py-3">Contact Us</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <div class="absolute bottom-0 inset-x-0 hidden sm:block">
            <img src="img/shapes/white-wave.svg" alt="white-wave-svg" class="w-full -scale-x-100 -scale-y-100" />
        </div>

    </section>
    {/* Hero Section End  */}
  
       
                <section className="py-8 lg:py-8">
                <div class="absolute top-0 inset-x-0 hidden sm:block">
            <img src="img/shapes/white-wave.svg" alt="white-wave-svg" class="w-full -scale-x-100" />
        </div>

                    <div className="container md:px-10 px-4 m-auto">
                    <div class="text-center">
                    <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">Our Services</span>
                    <h2 class="text-3xl font-medium mt-3 mb-4 font-futura-bold">Marketing Solutions that works for everyone</h2>
                    </div>
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-10 mx-4 mt-16">
                            {[
                                { title: "Keyword Research", description: "Identifying relevant keywords and phrases to target for better search visibility.", icon: ""},
                                { title: "Technical SEO", description: "Optimizing individual pages, including meta tags, headers, content, and internal linking.   " },
                                { title: "Continuous Monitoring and Optimization", description: "Ongoing adjustments based on performance data and algorithm updates." },
                                { title: "Social Media Integration", description: "Enhancing SEO efforts through social media engagement and strategy." },
                                { title: "SEO Audits", description: "Comprehensive evaluations of a website's current SEO performance and areas for improvement.    " },
                                { title: "E-commerce SEO", description: "Specialized strategies for online stores, including product optimization and category structuring.  " },
                                
                            ].map((service, index) => (
                                <div>
                                    <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center">
                            <img class="h-8 w-8" src="favicon.png" alt="Execudea Private Limited"/>
                        </div>
                                    <h3 className="mb-3 mt-4 text-lg">{service.title}</h3>
                                    <p className="text-gray-600">{service.description}</p>
                                </div>
                            ))}
                        </div>
                    </div>
                </section>


               
                <section className="py-20">
                    <div className="container md:px-5 px-10">
                        <h2 className="text-3xl font-medium mt-3 mb-8 text-center font-futura-bold">Our Technology Stack</h2>
                        <div className="flex justify-center">
                            <TechLogos />
                        </div>
                    </div>
                </section>

                
            </Guest>
        </>
    );
}
