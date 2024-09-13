import AdminLayout from "@/Layouts/AdminLayout";
import { Link } from "@inertiajs/react";

const getGreeting = () => {
    const currentHour = new Date().getHours();
    if (currentHour < 12 ) {
        return 'Good Morning';
    } else if (currentHour < 18) {
        return 'Good Afternoon';
    } else {
        return 'Good Evening';
    }
};


export default function AdminDashboard({ auth }) {
    const user = auth.user;
    return (
        
        <AdminLayout user={auth.user}>
            {/* <div>Hi { user.name } ! </div>
             */}


            <div className="text-xl">
                <span className="text-red-500 text-3xl">{getGreeting()}!</span>{' '}
                <span className="text-black font-semibold">{user.name}</span>
            </div>
        </AdminLayout>
       
    );
}
