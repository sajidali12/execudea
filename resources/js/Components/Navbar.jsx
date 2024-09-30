import React, { useState } from 'react';
import ApplicationLogo from './ApplicationLogo';
import { Link } from '@inertiajs/react';

export default function NavBar() {
    const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);
    const [isDropdownOpen, setIsDropdownOpen] = useState(false);

    const toggleMobileMenu = () => {
        setIsMobileMenuOpen(!isMobileMenuOpen);
    };


    const handleMouseEnter = () => {
        setIsDropdownOpen(true);
    };

    const handleMouseLeave = () => {
        setIsDropdownOpen(false);
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

                <div className="hidden lg:flex items-center space-x-6">
                    <Link className="text-gray-800 hover:text-primary" href="/">
                        Home
                    </Link>
                    <Link className="text-gray-800 hover:text-primary" href="about">
                        About
                    </Link>
                    <div 
                        className="relative"
                        onMouseEnter={handleMouseEnter}
                        onMouseLeave={handleMouseLeave}
                    >
                        <button 
                            className="text-gray-800 hover:text-primary flex items-center" 
                        >
                            Services
                            <i className={`fa-solid fa-chevron-${isDropdownOpen ? 'up' : 'down'} ml-1`}></i>
                        </button>
                        {isDropdownOpen && (
                            <div className="absolute z-10 bg-white shadow-lg rounded-lg w-64"> 
                                <Link className="block px-4 py-2 hover:bg-gray-200 hover:text-primary rounded-lg" href="/User-Experience-Design">User Experience Design</Link>
                                <Link className="block px-4 py-2 hover:bg-gray-200 hover:text-primary rounded-lg" href="/web-development">Web Development</Link>
                                <Link className="block px-4 py-2 hover:bg-gray-200 hover:text-primary rounded-lg" href="/Search-Engine-Optimization">Search Engine Optimization</Link>
                                <Link className="block px-4 py-2 hover:bg-gray-200 hover:text-primary rounded-lg" href="/Wordpress-development">Wordpress Development</Link>
                            </div>
                        )}
                    </div>
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
                        <i className="fa-solid fa-times"></i>
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
                        <li className="relative">
                            <button 
                                className="text-gray-800 text-lg block flex items-center" 
                                onClick={() => setIsDropdownOpen(!isDropdownOpen)}
                            >
                                Services
                                <i className={`fa-solid fa-chevron-${isDropdownOpen ? 'up' : 'down'} ml-1`}></i>
                            </button>
                            {isDropdownOpen && (
                                <div className="bg-white shadow-lg rounded-lg w-64"> 
                                    <Link className="block px-4 py-2 hover:bg-gray-200 hover:text-primary rounded-lg" href="/service">User Experience Design</Link>
                                    <Link className="block px-4 py-2 hover:bg-gray-200 hover:text-primary rounded-lg" href="/service">Front-End Development</Link>
                                    <Link className="block px-4 py-2 hover:bg-gray-200 hover:text-primary rounded-lg" href="/service">Search Engine Optimization</Link>
                                </div>
                            )}
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
