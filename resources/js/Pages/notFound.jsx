// resources/js/Pages/NotFound.jsx

import { Link } from "@inertiajs/react";
import Guest from "@/Layouts/GuestLayout"; 

export default function NotFound() {
    return (
        <Guest>
            <div className="flex flex-col items-center justify-center min-h-screen p-6 bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300">
                {/* Illustration or Image */}
                <div className="relative mb-8">
                   
                    <div className="absolute inset-0 bg-gradient-to-t from-transparent to-blue-100 opacity-50 rounded-full" />
                </div>
                <h1 className="text-9xl font-extrabold text-red-600 mb-4 drop-shadow-2xl animate-fade-in-up">404</h1>
                <p className="text-2xl font-semibold text-gray-800 mb-4 animate-fade-in-up">
                    Oops! Page Not Found
                </p>
                <p className="text-gray-600 mb-8 animate-fade-in-up">
                    Sorry, the page you’re looking for doesn’t exist or has been moved.
                </p>
                <Link 
                    href="/" 
                    className="text-primary py-3 px-6 rounded border border-primary hover:border-black hover:bg-primary hover:text-white hover:shadow-lg hover:shadow-black/50 focus:outline focus:outline-black/50 transition-all duration-500"
                >
                    Go to Home
                </Link>
            </div>
        </Guest>
    );
}
