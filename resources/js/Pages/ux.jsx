import TechLogos from "@/Components/TechLogos";
import Guest from "@/Layouts/GuestLayout";
import { Head, Link } from "@inertiajs/react";

export default function Services() {
    return (
        <>
            <Head title="Best Web Development Agency" />
            <Guest>
                {/* Intro Section */}
                <section className="py-20 mt-10">
                    <div className="container md:px-10 px-4 flex flex-col md:flex-row items-center">
                        <div className="md:w-1/2 mb-10 md:mb-0">
                            <img 
                                src="img/ui-ux.jpg" 
                                alt="Web Development Intro" 
                                className="rounded-lg shadow-lg w-full h-auto" 
                            />
                        </div>
                        <div className="md:w-1/2 md:pl-10">
                            <h1 className="text-3xl sm:text-4xl font-semibold mb-5">
                            User Experience Design
                            </h1>
                            <p className="text-lg text-gray-500 mb-5">
                            <p className="text-lg text-gray-500">
                            At Execudea, we specialize in User Experience (UX) Design, dedicated to creating meaningful and relevant interactions that elevate user satisfaction with your digital products. Our approach begins with comprehensive user research, utilizing techniques such as interviews, surveys, and observational studies to gather valuable insights into your target audience. By understanding user behaviors, needs, and pain points, we develop detailed personas that represent key user segments, ensuring that our design solutions are tailored to meet their specific requirements.
                            </p>
                            </p>
                            <p className="text-lg text-gray-500">
                            
                            </p>
                        </div>
                    </div>
                    <div class="container m-auto mt-10 md:px-10 px-4" data-aos="fade-up">
                    <p className="text-lg text-gray-500">
                    Our UX design process is collaborative and iterative, focusing on ideation and prototyping.
                    We work closely with your team to brainstorm innovative solutions and create low-fidelity wireframes that outline the structure and functionality of your product. Using tools like Figma and Adobe XD, we develop interactive prototypes that allow for usability testing with real users.
                    This process enables us to refine designs based on user feedback, ensuring that each iteration enhances usability and aligns with user expectations.
                            </p>

                            <p className="text-lg text-gray-500 mt-4">

                            After finalizing the design, our team emphasizes seamless collaboration with your development team to implement the vision accurately. 
                            We establish a cohesive design system that ensures consistency across all visual elements while prioritizing accessibility for all users. 
                            Post-launch, we conduct thorough analytics monitoring and gather ongoing user feedback to identify areas for improvement. 
                            Our commitment to continuous enhancement allows us to adapt your product based on user needs, ultimately driving user engagement and loyalty. 
                            Trust Execudea to deliver exceptional UX design services that make a lasting impact on your business and your users.
                            </p>
                    </div>
                </section>

                {/* Services Overview Section */}
                <section className="bg-gray-50 py-20">
                    <div className="container md:px-10 px-4">
                        <h2 className="text-2xl sm:text-3xl font-semibold text-center mb-8">Our Services</h2>
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-10">
                            {["Custom Web Development", "E-commerce Solutions", "Responsive Design"].map((service, index) => (
                                <div key={index} className="border rounded-lg shadow-lg p-5 text-center hover:shadow-xl transition-shadow">
                                    <h3 className="font-bold text-xl mb-3">{service}</h3>
                                    <p className="text-gray-600">
                                        {index === 0 && "Tailored solutions to meet your business needs with a focus on performance and scalability."}
                                        {index === 1 && "Robust e-commerce platforms designed for optimal user experience and conversion rates."}
                                        {index === 2 && "Creating visually stunning and highly functional websites that work seamlessly across all devices."}
                                        {index === 3 && "Creating visually stunning and highly functional websites that work seamlessly across all devices."}
                                        {index === 4 && "Creating visually stunning and highly functional websites that work seamlessly across all devices."}
                                        {index === 6 && "Creating visually stunning and highly functional websites that work seamlessly across all devices."}
                                    </p>
                                </div>
                            ))}
                        </div>
                    </div>
                </section>

                {/* Technology Stack Section */}
                <section className="py-20">
                    <div className="container md:px-5 px-10">
                        <h2 className="text-2xl sm:text-3xl font-semibold text-center mb-8">Our Technology Stack</h2>
                        <div className="flex justify-center">
                            <TechLogos />
                        </div>
                    </div>
                </section>

                
            </Guest>
        </>
    );
}
