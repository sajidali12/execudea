import TechLogos from "@/Components/TechLogos";
import Guest from "@/Layouts/GuestLayout";
import { Head, Link } from "@inertiajs/react";

export default function Services() {
    return (
        <>
            <Head title="Best Web Development Agency" />
            <Guest>
               
                <section className="py-20 mt-10">
                    <div className="container md:px-10 px-4 flex flex-col md:flex-row items-center">
                        <div className="md:w-1/2 mb-10 md:mb-0">
                            <img 
                                src="img/tech/web.jpeg" 
                                alt="Web Development Intro" 
                                className="rounded-lg shadow-lg w-full h-auto" 
                            />
                        </div>
                        <div className="md:w-1/2 md:pl-10">
                            <h1 className="text-4xl font-medium my-3 font-futura-bold">
                            Web Development
                            </h1>
                            <p className="text-md text-gray-500 mb-5">
                            <p className="text-md text-gray-500">
                            At Execudea, we specialize in Web Development, seamlessly integrating both Front-End and Back-End technologies to create robust, visually appealing, and highly interactive websites and applications.
                            Our skilled team transforms design mockups into functional code using cutting-edge front-end technologies such as <b>HTML, CSS, and JavaScript</b>.
                            We prioritize performance and optimization, ensuring your applications load quickly and provide exceptional user experiences across all devices.
                            </p>
                            </p>
                            <p className="text-md text-gray-500">
                            
                            </p>
                        </div>
                    </div>
                    <div class="container m-auto mt-10 md:px-10 px-4" data-aos="fade-up">
                           <p className="text-md text-gray-500">
                                Our front-end development process begins with a deep understanding of your business requirements and close collaboration with your design team. We utilize popular frameworks and libraries, including<b> React, Angular, and Vue.js</b>, to build dynamic, interactive applications tailored to your specific needs.
                                Our commitment to responsive design guarantees that your application performs flawlessly across various devices and screen sizes, while accessibility remains a key focus in all our projects.
                            </p>
                            <p className="text-md text-gray-500 mt-2">
                            On the back end, we leverage powerful technologies like <b>Node.js, Laravel,</b> and<b> PHP</b> to create scalable and efficient server-side solutions. 
                            Our back-end development ensures that data handling, API integrations, and database management are seamless and secure, allowing for a smooth flow of information between the client and server. 
                            This comprehensive approach ensures your application is not only user-friendly but also reliable and performant.
                            </p>
                            <p className="text-md text-gray-500 mt-2">
                            Once the initial development phase is complete, we conduct rigorous testing and debugging to ensure cross-browser compatibility and adherence to industry standards. After launching your product, we offer ongoing maintenance and updates, continuously improving your application based on user feedback and analytics. Trust Execudea to elevate your web development experience, delivering outstanding results that drive success for your business.

                            </p>
                    </div>
                </section>

               
                <section className="bg-gray-50 py-20 mx-5">
                    <div className="container md:px-10 px-4 m-auto">
                        <h2 className="text-4xl font-medium my-3 font-futura-bold text-center mb-8">Our Services</h2>
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-10 mx-4">
                            {[
                                { title: "Front-End Development", description: "We use HTML, CSS, Tailwind, bootstap, Javascript, React js, Vue js, Angular js and many more to make your site look more attractive and faster." },
                                { title: "Back-End Development", description: "We leverage powerful technologies like Node.js, Express js, Next js, Laravel, and PHP to create scalable and efficient server-side solutions." },
                                { title: "Responsive Design", description: "Creating visually stunning and highly functional websites that work seamlessly across all devices." },
                                { title: "Cloud Services", description: "We used many cloud services like AWS, Azure, GCP, DigitalOcean and many more to utlize your traffic deploy your site live." },
                                { title: "API Development and Integration ", description: "We make custom APIs and third party APIs to connect through various platforms." },
                                { title: "DevOps Services", description: "Tools and practices that facilitate continuous integration and continuous deployment (CI/CD) for software development." }
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
                            <TechLogos />
                        </div>
                    </div>
                </section>

                
            </Guest>
        </>
    );
}
