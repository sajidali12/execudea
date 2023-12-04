import ApplicationLogo from "@/Components/ApplicationLogo";
import Footer from "@/Components/Footer";
import NavBar from "@/Components/Navbar";
import { Link } from "@inertiajs/react";

export default function Guest({ children }) {
    return (
        <div className="">
            <NavBar />
            <div>{children}</div>
            <Footer />
        </div>
    );
}
