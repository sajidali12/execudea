import React, { useState } from 'react';
import ApplicationLogo from './ApplicationLogo';
import { Link } from '@inertiajs/react';

export default function NavBar() {
    const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

    const toggleMobileMenu = () => {
        setIsMobileMenuOpen(!isMobileMenuOpen);
    };

    return (
<header
                id="navbar"
                className="@@link-color fixed top-0 inset-x-0 flex items-center z-40 w-full lg:bg-transparent bg-white transition-all py-5"
            >
            <div className="container mx-auto px-2 md:px-10 flex items-center justify-between">
                <Link href="/">
                    <ApplicationLogo className="w-32 sm:w-20 md:w-24 lg:w-36 xl:w-40" />
                </Link>

                {/* Desktop Navigation */}
                <div className="hidden lg:flex items-center space-x-6">
                    <Link className="text-gray-800 hover:text-primary" href="/">
                        Home
                    </Link>
                    <Link className="text-gray-800 hover:text-primary" href="about">
                        About
                    </Link>
                    <Link className="text-gray-800 hover:text-primary" href="blog">
                        Blog
                    </Link>
                    <Link className="text-gray-800 hover:text-primary" href="contact">
                        Contact us
                    </Link>
                    <a
                        href="https://calendly.com/execudea-info/30min"
                        target="_blank"
                        className="bg-primary text-white px-4 py-2 rounded transition duration-300 hover:bg-secondary-400"
                    >
                        Book a Meeting
                    </a>
                </div>

                {/* Mobile Menu Button */}
                <div className="lg:hidden flex items-center">
                    <button
                        type="button"
                        onClick={toggleMobileMenu}
                        className="text-gray-500 text-2xl"
                    >
                        <i className="fa-solid fa-bars"></i> 
                    </button>
                </div>
            </div>

            {/* Mobile Menu */}
            <div
                className={`fixed inset-0 bg-white z-50 transition-transform transform ${
                    isMobileMenuOpen ? 'translate-x-0' : 'translate-x-full'
                }`}
            >
                <div className="container mx-auto px-6 py-8">
                    <button
                        type="button"
                        onClick={toggleMobileMenu}
                        className="text-gray-500 text-2xl mb-6"
                    >
                        <i className="fa-solid fa-times"></i> {/* Close icon */}
                    </button>
                    <ul className="space-y-4">
                        <li>
                            <Link className="text-gray-800 text-lg block" href="/">
                                Home
                            </Link>
                        </li>
                        <li>
                            <Link className="text-gray-800 text-lg block" href="about">
                                About
                            </Link>
                        </li>
                        <li>
                            <Link className="text-gray-800 text-lg block" href="blog">
                            
                                Blog
                            </Link>
                        </li>
                        <li>
                            <Link className="text-gray-800 text-lg block" href="contact">
                                Contact us
                            </Link>
                        </li>
                        <li>
                            <a
                                href="https://calendly.com/execudea-info/30min"
                                target="_blank"
                                className="bg-primary text-white px-4 py-2 rounded block text-center"
                            >
                                Book a Meeting
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    );
}
