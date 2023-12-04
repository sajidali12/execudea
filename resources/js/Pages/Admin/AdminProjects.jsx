import AdminLayout from "@/Layouts/AdminLayout";
import { Link } from "@inertiajs/react";


export default function AdminDashboard({ auth }) {

    return (
        <AdminLayout user={auth.user}>
            <div>This will Projects</div>
        </AdminLayout>
    );
}
