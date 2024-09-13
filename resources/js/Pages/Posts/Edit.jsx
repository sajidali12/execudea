import React from 'react';
import { Head, useForm, Link } from "@inertiajs/react";
import AdminLayout from '@/Layouts/AdminLayout';

export default function EditPost({ auth, post }) {
    const { data, setData, errors, put } = useForm({
        title: post?.title || "",
        body: post?.body || "",
        image: null,
        oldImage: post?.image || "", 
    });

    function handleSubmit(e) {
        e.preventDefault();

        const formData = new FormData();
        formData.append('title', data.title);
        formData.append('body', data.body);

        if (data.image) {
            formData.append('image', data.image);
        } else {
            formData.append('oldImage', data.oldImage); 
        }

        put(route("posts.update", post.id), formData, {
            forceFormData: true,
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        });
    }

    return (
        <AdminLayout user={auth.user}>
            <Head title="Edit Post" />
            <div className="children">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                            <div className="flex items-center justify-between mb-6">
                                <Link className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none" href={route("posts.index")}>
                                    Back
                                </Link>
                            </div>
                            <form name="editForm" onSubmit={handleSubmit} encType="multipart/form-data">
                                <div className="flex flex-col">
                                    <div className="mb-4">
                                        <label>Title</label>
                                        <input 
                                            type="text" 
                                            className="w-full px-4 py-2" 
                                            name="title" 
                                            value={data.title} 
                                            onChange={(e) => setData("title", e.target.value)} 
                                        />
                                        <span className="text-red-600">{errors.title}</span>
                                    </div>

                                    <div className="mb-4">
                                        <label>Body</label>
                                        <textarea 
                                            className="w-full rounded" 
                                            name="body" 
                                            value={data.body} 
                                            onChange={(e) => setData("body", e.target.value)} 
                                        />
                                        <span className="text-red-600">{errors.body}</span>
                                    </div>

                                    <div className="mb-4">
                                        <label>Image</label>
                                        {post.image && (
                                            <div className="mb-4">
                                                <img 
                                                    src={`/storage/product/image/${post.image}`} 
                                                    alt="Current Post Image" 
                                                    className="w-32 h-32" 
                                                />
                                            </div>
                                        )}

                                        <input 
                                            type="file" 
                                            className="w-full rounded" 
                                            name="image" 
                                            onChange={(e) => setData("image", e.target.files[0])} 
                                        />

                                        <input 
                                            type="hidden" 
                                            name="oldImage" 
                                            value={data.oldImage}  
                                        />
                                    </div>

                                    <div className="mt-4">
                                        <button 
                                            type="submit" 
                                            className="px-6 py-2 font-bold text-white bg-green-500 rounded"
                                        >
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}


// import React from 'react';
// import { Head, useForm, Link } from "@inertiajs/react";
// import AdminLayout from '@/Layouts/AdminLayout';

// export default function EditPost({  post }) {
//     const { data, setData, errors, put } = useForm({
//         title: post.title || "",
//         body: post.body || "",
//     });

//     function handleSubmit(e) {
//         e.preventDefault();

//         put(route("posts.update", post.id), {
//             _method: 'put',
//             data: data,
//         });
//     }

//     return (
//         <AdminLayout>
//             <Head title="Edit Post" />
//             <div className="py-12">
//                 <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
//                     <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
//                         <div className="p-6 bg-white border-b border-gray-200">
//                             <div className="flex items-center justify-between mb-6">
//                                 <Link className="px-6 py-2 text-white bg-blue-500 rounded-md focus:outline-none" href={route("posts.index")}>
//                                     Back
//                                 </Link>
//                             </div>
//                             <form name="editForm" onSubmit={handleSubmit}>
//                                 <div className="flex flex-col">
//                                     <div className="mb-4">
//                                         <label>Title</label>
//                                         <input 
//                                             type="text" 
//                                             className="w-full px-4 py-2" 
//                                             name="title" 
//                                             value={data.title} 
//                                             onChange={(e) => setData("title", e.target.value)} 
//                                         />
//                                         <span className="text-red-600">{errors.title}</span>
//                                     </div>

//                                     <div className="mb-4">
//                                         <label>Body</label>
//                                         <textarea 
//                                             className="w-full rounded" 
//                                             name="body" 
//                                             value={data.body} 
//                                             onChange={(e) => setData("body", e.target.value)} 
//                                         />
//                                         <span className="text-red-600">{errors.body}</span>
//                                     </div>

//                                     <div className="mt-4">
//                                         <button 
//                                             type="submit" 
//                                             className="px-6 py-2 font-bold text-white bg-green-500 rounded"
//                                         >
//                                             Update
//                                         </button>
//                                     </div>
//                                 </div>
//                             </form>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//         </AdminLayout>
//     );
// }

