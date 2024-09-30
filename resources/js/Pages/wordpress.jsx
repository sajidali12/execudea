import TechLogos from "@/Components/TechLogos";
import Guest from "@/Layouts/GuestLayout";
import { Head, Link } from "@inertiajs/react";
import Wordpresslog from "@/Components/Wordpresslog";

export default function Services() {
    return (
        <>
            <Head title="Best Web Development Agency" />
            <Guest>
               
                <section className="py-20 mt-10">
                    <div className="container md:px-10 px-4 flex flex-col md:flex-row items-center">
                        <div className="md:w-1/2 mb-10 md:mb-0">
                            <img 
                                src="img/wordpress1.jpg" 
                                alt="Web Development Intro" 
                                className="rounded-lg shadow-lg w-full h-auto" 
                            />
                        </div>
                        <div className="md:w-1/2 md:pl-10">
                            <h1 className="text-4xl font-medium my-3 font-futura-bold">
                            Wordpress
                            </h1>
                            <p className="text-lg text-gray-500 mb-5">
                            <p className="text-lg text-gray-500">
                           At Execudea, we specialize in WordPress development, creating robust, visually appealing, and highly interactive websites tailored to your needs. 
                           Our skilled team transforms design mockups into functional WordPress sites using popular themes and plugins. 
                           We prioritize performance and optimization, ensuring your WordPress site loads quickly and provides exceptional user experiences across all devices.
                            </p>
                            </p>
                            <p className="text-lg text-gray-500">
                            
                            </p>
                        </div>
                    </div>
                    <div class="container m-auto mt-10 md:px-10 px-4" data-aos="fade-up">
                          
                            <p className="text-lg text-gray-500 mt-2">
                            Our WordPress development process begins with a deep understanding of your business requirements and close collaboration with your design team. 
                            We utilize popular page builders and frameworks, including Elementor and Gutenberg, to build dynamic, engaging content that reflects your brand. Our commitment to responsive design guarantees that your site performs flawlessly across various devices and screen sizes, while accessibility remains a key focus in all our projects.
                            </p>
                            <p className="text-lg text-gray-500 mt-2">
                            We leverage powerful WordPress features like custom post types, taxonomies, and user roles to create scalable and efficient solutions. Our development ensures seamless integration of plugins, API connections, and database management, allowing for a smooth flow of information across your site. This comprehensive approach ensures your WordPress site is not only user-friendly but also reliable and performant.
                            </p>
                            <p className="text-lg text-gray-500 mt-2">
                            Once the initial development phase is complete, we conduct rigorous testing and debugging to ensure compatibility with various browsers and adherence to industry standards. After launching your site, we offer ongoing maintenance and updates, continuously improving your WordPress presence based on user feedback and analytics. Trust Execudea to elevate your WordPress development experience, delivering outstanding results that drive success for your business.
                            </p>
                    </div>
                </section>

               
                <section className="bg-gray-50 py-20 mx-5">
                    <div className="container md:px-10 px-4 m-auto">
                        <h2 className="text-4xl font-medium my-3 font-futura-bold text-center mb-8">Our Services</h2>
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-10 mx-4">
                            {[
                                { title: "Website Building", description: "Easy-to-use interface for creating and managing websites without needing extensive coding skills." },
                                { title: "Plugins", description: "Access to thousands of plugins that extend functionality, including SEO tools, security features, and e-commerce solutions." },
                                { title: "Content Management", description: "Robust content management system (CMS) for creating, editing, and organizing posts and pages." },
                                { title: "E-commerce Support", description: "Integration with plugins like WooCommerce for setting up online stores." },
                                { title: "Mobile Responsiveness ", description: "Themes and design tools that ensure websites are mobile-friendly." },
                                { title: "User Management", description: "Tools for managing user roles and permissions, allowing multiple contributors." }
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
                    <div className="container md:px-3 px-8">
                        <h2 className="text-4xl font-medium my-3 font-futura-bold text-center mb-8">Our Technology Stack</h2>
                        <div className="flex justify-center">
                            <Wordpresslog />
                        </div>
                    </div>
                </section>

                
            </Guest>
        </>
    );
}
