import React from 'react';
import { Head, useForm, Link } from "@inertiajs/react";
import AdminLayout from '@/Layouts/AdminLayout';
import ReactQuill from 'react-quill'; 
import 'react-quill/dist/quill.snow.css'; 

export default function EditPost({ auth, post }) {
    const { data, setData, errors, put } = useForm({
        title: post?.title || "",
        body: post?.body || "",
        author_name: post?.author_name || "",
    });

    function handleSubmit(e) {
        e.preventDefault();

        const formData = new FormData();
        formData.append('title', data.title);
        formData.append('body', data.body);
        formData.append('author_name', data.author_name); 

        put(route("posts.update", post.id), formData, {
            forceFormData: true,
            onError: (err) => {
                console.error("Error:", err);
            },
        });
    }

    return (
        <AdminLayout user={auth.user}>
            <Head title="Edit Post" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                            <div className="flex items-center justify-between mb-6">
                                <Link className="px-6 py-2 text-white bg-blue-500 rounded-md" href={route("posts.index")}>
                                    Back
                                </Link>
                            </div>
                            <form onSubmit={handleSubmit}>
                                <div className="flex flex-col">
                                    <div className="mb-4">
                                        <label>Title ('avoid using html tags here!')</label>
                                        <input 
                                            type="text" 
                                            className="w-full px-4 py-2" 
                                            name="title" 
                                            value={data.title} 
                                            onChange={(e) => setData("title", e.target.value)} 
                                        />
                                        {errors.title && <span className="text-red-600">{errors.title}</span>}
                                    </div>
                                    <div className="mb-4">
                                        <label>Body</label>
                                        <ReactQuill 
                                            value={data.body} 
                                            onChange={(content) => setData("body", content)} 
                                            className="react-quill" 
                                        />
                                        {errors.body && <span className="text-red-600">{errors.body}</span>}
                                    </div>
                                   
                                    <div className="mb-4">
                                        <label>Author Name</label>
                                        <input 
                                            type="text" 
                                            className="w-full px-4 py-2" 
                                            name="author_name" 
                                            value={data.author_name} 
                                            onChange={(e) => setData("author_name", e.target.value)} 
                                        />
                                        {errors.author_name && <span className="text-red-600">{errors.author_name}</span>}
                                    </div>
                                </div>
                                <div className="mt-4">
                                    <button type="submit" className="px-6 py-2 font-bold text-white bg-green-500 rounded">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}
