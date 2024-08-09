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
                class="@@link-color fixed top-0 inset-x-0 flex items-center z-40 w-full lg:bg-transparent bg-white transition-all py-5"
            >
                <div class="container m-auto md:px-10 px-0">
                    <nav class="flex items-center">
                        <a href="/">
                            <ApplicationLogo class="w-40" />
                        </a>

                        <div class="hidden lg:block ms-auto">
                            <ul class="navbar-nav flex gap-x-3 items-center justify-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">
                                        Home
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="blog">
                                        Blog
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="contact">
                                        Contact us
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="hidden lg:flex items-center ms-3">
                            <a
                                href="https://calendly.com/execudea-info/30min"
                                target="_blank"
                                class="bg-primary text-white px-4 py-2 rounded inline-flex items-center text-sm"
                            >
                                Book a Meeting
                            </a>
                        </div>

                        <div class="lg:hidden flex items-center ms-auto px-2.5">
                            <button
                                type="button"
                                data-fc-target="mobileMenu"
                                data-fc-type="offcanvas"
                            >
                                <i class="fa-solid fa-bars text-2xl text-gray-500"></i>
                            </button>
                        </div>
                    </nav>
                </div>
            </header>
        </>
    );
}
