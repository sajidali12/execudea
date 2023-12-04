import AdminLayout from "@/Layouts/AdminLayout";
import { Link } from "@inertiajs/react";


export default function AdminDashboard({ auth }) {
    const user = auth.user;
    return (
        <AdminLayout user={auth.user}>
            <div>Hi { user.name } ! </div>
        </AdminLayout>
    );
}
