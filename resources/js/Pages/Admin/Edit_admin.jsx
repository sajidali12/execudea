import React, { useEffect } from 'react';
import { useForm } from '@inertiajs/react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import AdminLayout from '@/Layouts/AdminLayout';

export default function ChangePassword({ auth, status }) {
    const { data, setData, put, processing, errors, reset } = useForm({
        current_password: '',
        password: '',
        password_confirmation: '',
    });

    const handleChange = (e) => {
        setData(e.target.name, e.target.value);
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        put(route('passwordUpdate'), {
            onSuccess: () => {
                reset(); 
            },
            onError: (errors) => {
              
            }
        });
    };

    return (
        <AdminLayout user={auth.user}>
            <div className="max-w-xl mx-auto mt-8">
                <h2 className="text-lg font-medium text-gray-900">Change Password</h2>
                <p className="mt-2 text-sm text-gray-600">Update your password using the form below:</p>

                <form onSubmit={handleSubmit} className="mt-6 space-y-4">
                    <div>
                        <InputLabel htmlFor="current_password" value="Current Password" />
                        <TextInput
                            id="current_password"
                            name="current_password"
                            value={data.current_password}
                            onChange={handleChange}
                            type="password"
                            className="mt-1 block w-full"
                            autoComplete="current-password"
                        />
                        {errors.current_password && <InputError message={errors.current_password} className="mt-2" />}
                    </div>

                    <div>
                        <InputLabel htmlFor="password" value="New Password" />
                        <TextInput
                            id="password"
                            name="password"
                            value={data.password}
                            onChange={handleChange}
                            type="password"
                            className="mt-1 block w-full"
                            autoComplete="new-password"
                        />
                        {errors.password && <InputError message={errors.password} className="mt-2" />}
                    </div>

                    <div>
                        <InputLabel htmlFor="password_confirmation" value="Confirm New Password" />
                        <TextInput
                            id="password_confirmation"
                            name="password_confirmation"
                            value={data.password_confirmation}
                            onChange={handleChange}
                            type="password"
                            className="mt-1 block w-full"
                            autoComplete="new-password"
                        />
                        {errors.password_confirmation && <InputError message={errors.password_confirmation} className="mt-2" />}
                    </div>

                    <div className="flex justify-end">
                        <PrimaryButton type="submit" disabled={processing}>Save</PrimaryButton>
                    </div>
                </form>
                {/* Display Success Message */}
                {status && (
                    <div className="mb-4 mx-16 text-xl text-green-600">
                        {status}
                    </div>
                )}
            </div>
        </AdminLayout>
    );
}
