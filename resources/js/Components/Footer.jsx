import { Link } from "@inertiajs/react";
import ApplicationLogo from "./ApplicationLogo";

export default function Footer() {
    const today = new Date();
    const year = today.getFullYear();

    return (
        <footer className="bg-gray-100 pt-14 pb-5">
            <div className="container mx-auto md:px-10 px-2">
                <div className="grid grid-cols-1 md:grid-cols-4 gap-10">
                    <div className="col-span-1 text-center md:text-left">
                        <a href="/">
                            <ApplicationLogo className="w-40 mx-auto" />
                        </a>
                        <p className="text-gray-500 mt-5">
                            Office #02, 2nd Floor, Building 140 I&T Center G9/1 Islamabad, Pakistan.
                        </p>
                    </div>
                    <div className="col-span-1 md:col-span-3 flex flex-col md:flex-row md:justify-between">
                        <div className="flex flex-col gap-3">
                            
                            <Link className="text-gray-500 hover:text-primary" href="/">Home</Link>
                            <Link className="text-gray-500 hover:text-primary" href="blog">Blog</Link>
                            <Link className="text-gray-500 hover:text-primary" href="contact">Contact Us</Link>
                            <Link className="text-gray-500 hover:text-primary" href="/about">About</Link>
                        </div>
                        <div className="flex flex-col gap-2 mt-5 md:mt-0">
                            <h5 className="font-semibold">Services</h5>
                            <Link className="text-gray-500 hover:text-primary" href="/User-Experience-Design">User Experience Design</Link>
                            <Link className="text-gray-500 hover:text-primary" href="/web-development">Web Development</Link>
                            <Link className="text-gray-500 hover:text-primary" href="/Search-Engine-Optimization">Search Engine Optimization</Link>
                            <Link className="text-gray-500 hover:text-primary" href="/Wordpress-development">Wordpress Development</Link>
                        </div>
                        
                        <div className="flex flex-col gap-3 mt-5 md:mt-0">
                            <h5 className="font-semibold">Get in touch</h5>
                            <a className="text-gray-500 hover:text-primary" href="mailto:info@execudea.com">info@execudea.com</a>
                            <div className="flex justify-center md:justify-start gap-4 mt-3">
                                <a href="https://www.facebook.com/execudea" aria-label="Facebook">
                                    <svg className="w-7 h-7 text-slate-600 transition-all hover:text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>
                                </a>
                                <a href="https://www.linkedin.com/company/execudea" aria-label="LinkedIn">
                                    <svg className="w-7 h-7 text-slate-600 transition-all hover:text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                        <rect x="2" y="9" width="4" height="12"></rect>
                                        <circle cx="4" cy="4" r="2"></circle>
                                    </svg>
                                </a>
                                <a href="https://www.instagram.com/execudea/" aria-label="Instagram">
                                    <svg className="w-7 h-7 text-slate-600 transition-all hover:text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div className="flex flex-col gap-3 mt-5 md:mt-0">
                            <h5 className="font-semibold">Contacts</h5>
                            <a className="text-gray-500 hover:text-primary" href="javascript:void(0);">+92 336 5707907</a>
                            <a className="text-gray-500 hover:text-primary" href="javascript:void(0);">+92 314 5805849</a>
                        </div>
                    </div>
                </div>
                <div className="border-b my-5"></div>
                <div className="text-center">
                    <p className="text-gray-500 text-sm">
                        {year} © Prompt. All rights reserved. Crafted by{" "}
                        <a href="/" className="text-gray-800 hover:text-primary transition-all">Execudea Team</a>
                    </p>
                </div>
            </div>
        </footer>
    );
}
