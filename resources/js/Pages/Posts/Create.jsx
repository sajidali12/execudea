import React from 'react';
import { Head, useForm, Link } from "@inertiajs/react";
import AdminLayout from '@/Layouts/AdminLayout';

export default function Dashboard(props) {
    const { data, setData, errors, post } = useForm({
        title: "",
        body: "",
        image: null, 
    });

    function handleSubmit(e) {
        e.preventDefault();

        // console.log("hello form");
        
        const formData = new FormData();
        formData.append('title', data.title);
        formData.append('body', data.body);
        if (data.image) {
            formData.append('image', data.image);
        }
        post(route("posts.store"), {
            forceFormData: true, 
            onError: (err) => {
                console.error("Error:", err);
            },
        });
        
        
       
    }
    
   
    return (
       <AdminLayout user={props.user}>
            <Head title="Posts" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                             {/* Display success message
                             {props.flash.success && (
                                <div className="mb-4 text-green-600">
                                    {props.flash.success}
                                </div>
                            )} */}
                            <div className="flex items-center justify-between mb-6">
                                <Link className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none" href={ route("posts.index") }>Back</Link>
                            </div>
                            <form name="createForm" onSubmit={handleSubmit} encType='multipart/form-data'>
                                <div className="flex flex-col">
                                    <div className="mb-4">
                                        <label className="">Title</label>
                                        <input type="text" className="w-full px-4 py-2" label="Title" name="title" value={data.title} onChange={(e) => setData("title", e.target.value) }/>
                                        <span className="text-red-600">
                                            {errors.title}
                                        </span>
                                    </div>
                                    <div className="mb-0">
                                        <label className="">Body</label>
                                        <textarea type="text" className="w-full rounded" label="body" name="body" errors={errors.body} value={data.body} onChange={(e) => setData("body", e.target.value) }/>
                                        <span className="text-red-600">
                                            {errors.body}
                                        </span>
                                    </div>
                                    {/* <div className="mb-0">
                                        <label className="">Image</label>
                                        <input type="file" className="w-full rounded" label="image" name="image" errors={errors.image} value={data.image} onChange={(e) => setData("image", e.target.value) }/>
                                        <span className="text-red-600">
                                            {errors.image}
                                        </span>
                                    </div> */}
                                     <div className="mb-0">
                                        <label className="">Image</label>
                                        <input 
                                            type="file" 
                                            className="w-full rounded" 
                                            name="image" 
                                            onChange={(e) => setData("image", e.target.files[0])} 
                                        />
                                        <span className="text-red-600">
                                            {errors.image}
                                        </span>
                                    </div>
                                </div>
                                <div className="mt-4">
                                    <button type="submit" className="px-6 py-2 font-bold text-white bg-green-500 rounded">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
} 