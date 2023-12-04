import { useEffect } from 'react';
import Checkbox from '@/Components/Checkbox';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('login'));
    };

    return (
        <GuestLayout>
            <Head title="Log in" />

            <div class="min-h-screen flex items-center justify-center pb-16 pt-36">
        <div class="container mx-auto md:px-10 px-0">
            <div >
                <div class="bg-white shadow rounded mb-6">
                    <div class="grid md:grid-cols-12">
                        <div class="bg-white shadow-md p-12 rounded-s xl:col-span-5 md:col-span-6">
                            <div class="mb-12">
                                <a href="index.html">
                                    <img src="assets/images/logo-dark.png" alt="logo-img" class="h-8" />
                                </a>
                            </div>
                            <h6 class="text-base/[1.6] font-semibold text-gray-600 mb-0 mt-4">Welcome back!</h6>
                            <p class="text-gray-500 text-sm/[1.6] mt-1 mb-6">Enter your email address and password to access admin panel.</p>
                            {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

                            <form onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="mt-1 block w-full"
                        autoComplete="username"
                        isFocused={true}
                        onChange={(e) => setData('email', e.target.value)}
                    />

                    <InputError message={errors.email} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        autoComplete="current-password"
                        onChange={(e) => setData('password', e.target.value)}
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div className="block mt-4">
                    <label className="flex items-center">
                        <Checkbox
                            name="remember"
                            checked={data.remember}
                            onChange={(e) => setData('remember', e.target.checked)}
                        />
                        <span className="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <div className="flex items-center justify-end mt-4">
                    {canResetPassword && (
                        <Link
                            href={route('password.request')}
                            className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Forgot your password?
                        </Link>
                    )}

                    <PrimaryButton className="ms-4" disabled={processing}>
                        Log in
                    </PrimaryButton>
                </div>
            </form>
                            <div class="py-4 text-center"><span class="fs-13 fw-bold">OR</span></div>

                            <div class="w-full">
                                <a href="" class="block border text-gray-500 font-medium leading-6 text-center align-middle select-none py-2 px-4 text-sm rounded-md transition-all hover:shadow-md">
                                    <span class="flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github icon icon-xs me-2">
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg>
                                        Github
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="hidden md:block xl:col-span-7 md:col-span-6">
                            <div class="max-w-[80%] mx-auto">
                                <div class="my-12 py-12">
                                    <div class="flex items-center justify-center h-full">
                                        <div class="swiper" id="swiper_one">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="swiper-slide-content">
                                                        <div class="text-center w-3/5 mx-auto">
                                                            <img src="assets/images/hero/saas1.png" class="w-full" />
                                                        </div>
                                                        <div class="text-center my-6 pb-12">
                                                            <h5 class="font-medium text-base/[1.6] text-gray-600 my-2.5">Manage your saas business with ease</h5>
                                                            <p class="text-sm/[1.6] text-gray-500 mb-4">Make your saas application
                                                                stand out with high-quality landing page
                                                                designed and developed by
                                                                professional.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                    
                                                <div class="swiper-slide">
                                                    <div class="swiper-slide-content">
                                                        <div class="text-center w-3/5 mx-auto">
                                                            <img src="assets/images/hero/saas2.png" class="w-full" />
                                                        </div>
                                                        <div class="text-center my-6 pb-12">
                                                            <h5 class="font-medium text-base/[1.6] text-gray-600 my-2.5">The best way to showcase your mobile app</h5>
                                                            <p class="text-sm/[1.6] text-gray-500">
                                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <div class="swiper-slide">
                                                    <div class="swiper-slide-content">
                                                        <div class="text-center w-3/5 mx-auto">
                                                            <img src="assets/images/hero/saas3.png" class="w-full" />
                                                        </div>
                                                        <div class="text-center my-6 pb-12">
                                                            <h5 class="font-medium text-base/[1.6] text-gray-600 my-2.5">Smart Solution that convert Lead to Customer</h5>
                                                            <p class="text-sm/[1.6] text-gray-500">
                                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                          
                                            </div>
                                 
                                            <div class="swiper-pagination !bottom-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full text-center">
                    <p class="text-gray-500 leading-6 text-base">Don't have an account? <a href="account-signup.html" class="text-primary font-semibold ms-1">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>

           
          
        </GuestLayout>
    );
}
