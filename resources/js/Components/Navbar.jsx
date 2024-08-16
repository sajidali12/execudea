import ApplicationLogo from "./ApplicationLogo";
import { Head } from "@inertiajs/react";

export default function NavBar() {
    return (
        <>
            <Head>
                <link rel="icon" type="image/svg+png" href="/favicon.png" />
            </Head>

            <header
                id="navbar"
                className="@@link-color fixed top-0 inset-x-0 flex items-center z-40 w-full lg:bg-transparent bg-white transition-all py-5"
            >
                <div className="container m-auto md:px-10 px-0">
                    <nav className="flex items-center">
                        <a href="/">
                            <ApplicationLogo className="w-40" />
                        </a>

                        <div className="hidden lg:block ms-auto">
                            <ul className="navbar-nav flex gap-x-3 items-center justify-center">
                                <li className="nav-item">
                                    <a className="nav-link" href="/">
                                        Home
                                    </a>
                                </li>

                                <li className="nav-item">
                                    <a className="nav-link" href="blog">
                                        Blog
                                    </a>
                                </li>

                                <li className="nav-item">
                                    <a className="nav-link" href="contact">
                                        Contact us
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div className="hidden lg:flex items-center ms-3">
                            <a
                                href="https://calendly.com/execudea-info/30min"
                                target="_blank"
                                className="bg-primary text-white px-4 py-2 rounded inline-flex items-center text-sm"
                            >
                                Book a Meeting
                            </a>
                        </div>

                        <div className="lg:hidden flex items-center ms-auto px-2.5">
                            <button
                                type="button"
                                data-fc-target="mobileMenu"
                                data-fc-type="offcanvas"
                            >
                                <i className="fa-solid fa-bars text-2xl text-gray-500"></i>
                            </button>
                        </div>
                    </nav>
                </div>
            </header>
        </>
    );
}
