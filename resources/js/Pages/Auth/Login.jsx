import { useEffect } from "react";
import Checkbox from "@/Components/Checkbox";
import GuestLayout from "@/Layouts/GuestLayout";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import { Head, Link, useForm } from "@inertiajs/react";

export default function Login({ status, canResetPassword }) {
  const { data, setData, post, processing, errors, reset } = useForm({
    email: "",
    password: "",
    remember: false,
  });

  useEffect(() => {
    return () => {
      reset("password");
    };
  }, []);

  const submit = (e) => {
    e.preventDefault();

    post(route("login"));
  };

  return (
    <GuestLayout>
      <Head title="Log in" />

      <div className="min-h-screen flex items-center justify-center pb-16 pt-36">
        <div className="container mx-auto md:px-10 px-0">
          <div>
            <div className="bg-white shadow rounded mb-6">
              <div className="flex item-center justify-center">
                <div className="bg-white shadow-md p-12 rounded-s xl:col-span-5 align-center md:col-span-6">
                  <h6 className="text-base/[1.6] font-semibold text-gray-600 mb-0 mt-4">
                    Welcome back!
                  </h6>
                  <p className="text-gray-500 text-sm/[1.6] mt-1 mb-6">
                    Enter your email address and password to access admin panel.
                  </p>
                  {status && (
                    <div className="mb-4 font-medium text-sm text-green-600">
                      {status}
                    </div>
                  )}

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
                        onChange={(e) => setData("email", e.target.value)}
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
                        onChange={(e) => setData("password", e.target.value)}
                      />

                      <InputError message={errors.password} className="mt-2" />
                    </div>

                    <div className="block mt-4">
                      <label className="flex items-center"></label>
                    </div>

                    <div className="flex items-center justify-end mt-4">
                      {canResetPassword && (
                        <Link
                          href={route("password.request")}
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </GuestLayout>
  );
}
