import ApplicationLogo from "./ApplicationLogo";


export default function Footer() {
    const today = new Date();
  const year = today.getFullYear();
    return (
        <>
      <footer className="bg-gray-100 pt-14 pb-5">
                <div className="container m-auto md:px-10 px-0">
                    <div className="grid grid-cols-4 gap-14">
                        <div className="xl:col-span-1 col-span-4">
                            <a href="index.html">
                            <ApplicationLogo className="w-40"/>
                            </a>
                            <p className="text-gray-500/80 mt-5">
                            Office #02, 2nd Floor, Building 140 I&T Center G9/1 Islamabad, Pakistan.
                            </p>
                        
                        </div>
                        <div className="xl:col-span-3 col-span-4 xl:mx-20">
                            <div className="flex flex-col sm:flex-row gap-14 flex-wrap justify-between">
                                <div>
                                    <div className="flex flex-col gap-3">
                                        <h5 className="mb-3">About</h5>
                                        <div className="text-gray-500/80">
                                            <a href="/">
                                                Home
                                            </a>
                                        </div>
                                        <div className="text-gray-500/80">
                                            <a href="javascript:void(0);">
                                                Portfolio
                                            </a>
                                        </div>
                                       
                                        <div className="text-gray-500/80">
                                            <a href="blog">
                                                Blog
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div className="flex flex-col gap-3">
                                        <h5 className="mb-3">Company</h5>
                                        <div className="text-gray-500/80">
                                            <a href="javascript:void(0);">
                                                About
                                            </a>
                                        </div>
                                        <div className="text-gray-500/80">
                                            <a href="javascript:void(0);">
                                                Career
                                            </a>
                                        </div>
                                        <div className="text-gray-500/80">
                                            <a href="contact">
                                                Contact Us
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div className="flex flex-col gap-3">
                                        <h5 className="mb-3">Get in touch</h5>
                                        <div className="text-gray-500/80">
                                            <a href="javascript:void(0);">
                                                info@execudea.com
                                            </a>
                                        </div>
                                        <div className="flex sm:justify-center gap-7">
                                            <div>
                                                <a href="https://www.facebook.com/execudea">
                                                    <svg
                                                        className="w-5 h-5 text-slate-400 transition-all"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    >
                                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="https://www.linkedin.com/company/execudea">
                                                    <svg
                                                        className="w-5 h-5 text-slate-400 transition-all"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    >
                                                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                                        <rect
                                                            x="2"
                                                            y="9"
                                                            width="4"
                                                            height="12"
                                                        ></rect>
                                                        <circle
                                                            cx="4"
                                                            cy="4"
                                                            r="2"
                                                        ></circle>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="https://www.instagram.com/execudea/">
                                                    <svg
                                                        className="w-5 h-5 text-slate-400 transition-all"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    >
                                                        <rect
                                                            x="2"
                                                            y="2"
                                                            width="20"
                                                            height="20"
                                                            rx="5"
                                                            ry="5"
                                                        ></rect>
                                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                        <line
                                                            x1="17.5"
                                                            y1="6.5"
                                                            x2="17.51"
                                                            y2="6.5"
                                                        ></line>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div className="flex flex-col gap-3">
                                        <h5 className="mb-3">Contacts</h5>
                                        <div className="text-gray-500/80">
                                            <a href="javascript:void(0);">
                                                +92 336 5707907
                                            </a>
                                        </div>
                                        <div className="text-gray-500/80">
                                            <a href="javascript:void(0);">
                                                +92 314 5805849
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="border-b my-5"></div>
                    <div className="text-center">
                        <p className="text-gray-500/80 text-sm">
                           { year }{' '}
                             © Prompt. All rights reserved. Crafted by{" "}
                            <a
                                href="/"
                                className="text-gray-800 hover:text-primary transition-all"
                            >
                                Execudea Team
                            </a>
                        </p>
                    </div>
                </div>
            </footer>
        </>
    );
}





