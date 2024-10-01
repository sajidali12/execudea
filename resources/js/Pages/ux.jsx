import TechLogos from "@/Components/TechLogos";
import Guest from "@/Layouts/GuestLayout";
import { Head, Link } from "@inertiajs/react";
import User from "@/Components/user"
export default function Services() {
    return (
        <>
            <Head title="Best UI/UX company in pakistan" />
            <Guest>
               
            <section class="relative" style={{ background: 'linear-gradient(rgba(0,85,255,.07) 0,rgba(0,85,255,.05) 100%)' }}>
                       <section class="relative pt-20 pb-24">
                            <div class="container">
                                <div class="grid lg:grid-cols-7 grid-cols-1 gap-16 items-center">

                                    <div class="lg:col-span-4" data-aos="fade-right">
                                        <div class="relative 2xl:-ml-64 lg:-ml-28 2xl:min-w-[130%] lg:w-[113%] w-full">
                                            <img src="img/hero/marketing.png" alt="marketing-img" />
                                        </div>
                                    </div>

                                    <div class="lg:col-span-3" data-aos="fade-left">
                                        <div class="text-center sm:text-start">
                                            <h1 class="text-3xl/snug sm:text-4xl/snug xl:text-5xl/snug font-semibold font-futura-bold mb-7">Make<span class="relative after:bg-yellow-500/50 after:-z-10 after:absolute after:h-6 after:w-full after:bottom-0 after:end-0"> User Experience Design</span> with Execudea.
                                            </h1>
                                            <p class="text-base/relaxed text-gray-500">  At Execudea, we specialize in <b>User Experience (UX) Design</b>, dedicated to creating meaningful and relevant interactions that elevate user satisfaction with your digital products. 
                                            Our approach begins with comprehensive user research, utilizing techniques such as interviews, surveys, and observational studies to gather valuable insights into your target audience. 
                                            By understanding user behaviors, needs, and pain points, we develop detailed personas that represent key user segments, ensuring that our design solutions are tailored to meet their specific requirements.</p>
                                            <div class="flex sm:flex-row flex-col gap-2 mt-10">
                                            
                                                <div className="flex sm:flex-row flex-col gap-2 mt-10">
                                                <Link href="/contact" className="bg-primary text-white px-4 py-2 rounded inline-flex items-center text-sm md:m-0 m-auto transition duration-300 hover:bg-secondary-400">Contact Us <i class="fa-solid fa-arrow-right ms-2"></i></Link>
                                                </div>
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
               
               
                <div className="container md:px-10 px-4 m-auto mt-10">
                    <div className="text-center">
                        <span className="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">Our Services</span>
                        <h2 className="text-3xl font-medium mt-5 mb-4 font-futura-bold mb-5">User Experience (UX) Design</h2>
                    </div>
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-8 mx-4 mt-14">
                        {[
                            { title: "Interaction Design", description: "Designing subtle animations and feedback mechanisms that enhance user engagement." },
                            { title: "User Research", description: " Conducting interviews to understand user needs and pain points. Collecting quantitative data to inform design decisions." },
                            { title: "Responsive Design", description: " Ensuring that designs function well across various screen sizes and devices." },
                        ].map((service, index) => (
                            <div key={index} className="border-2 border-transparent rounded-lg p-6  hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                                <div className="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                                    <img className="h-8 w-8" src="favicon.png" alt="Execudea Private Limited" />
                                </div>
                                <h3 className="mb-3 mt-4 text-lg font-semibold">{service.title}</h3>
                                <p className="text-gray-600">{service.description}</p>
                            </div>
                        ))}
                    </div>
                </div>
              



               
                <section className="py-20">
                    <div className="container md:px-5 px-10">
                        <h2 className="text-4xl font-medium my-3 font-futura-bold text-center mb-8">Our Technology Stack</h2>
                        <div className="flex justify-center">
                            <User />
                        </div>
                    </div>
                </section>

                
            </Guest>
        </>
    );
}
