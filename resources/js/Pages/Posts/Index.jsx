import React, { useState, useEffect } from 'react';
import { Head, usePage, Link } from "@inertiajs/react";
import AdminLayout from '@/Layouts/AdminLayout';
import { Inertia } from '@inertiajs/inertia';

export default function Dashboard(props) {
    const { posts, perPage } = usePage().props;
    const [itemsPerPage, setItemsPerPage] = useState(perPage);

    useEffect(() => {
        setItemsPerPage(perPage);
    }, [perPage]);

    function handlePerPageChange(e) {
        const newPerPage = e.target.value;
        setItemsPerPage(newPerPage);
        Inertia.get(route('posts.index'), { perPage: newPerPage, page: 1 }, { preserveState: true });
    }

    function handlePageChange(page) {
        Inertia.get(route('posts.index'), { perPage: itemsPerPage, page }, { preserveState: true });
    }

    function destroy(e) {
        e.preventDefault();
        const postId = e.currentTarget.id;

        if (confirm('Are you sure you want to delete this post?')) {
            Inertia.delete(route('posts.destroy', postId));
        }
    }

    const from = posts.from;
    const to = posts.to;
    const total = posts.total;
    const currentPage = posts.current_page;
    const lastPage = posts.last_page;

    return (
        <AdminLayout user={props.user}>
            <Head title="Posts" />

            <div className="py-12 mt-0">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="flex items-center justify-between mb-6">
                        <div>
                            <Link className="mt-10 px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none" href={route("posts.create")}>Create Post</Link>
                        </div>
                        <div className="flex items-center space-x-4">
                            <span className="text-gray-700">Posts per page:</span>
                            <select
                                value={itemsPerPage}
                                onChange={handlePerPageChange}
                                className="border rounded-md"
                            >
                                <option value="10">10 posts</option>
                                <option value="20">20 posts</option>
                                <option value="30">30 posts</option>
                                <option value="40">40 posts</option>
                                <option value="50">50 posts</option>
                                <option value="all">All</option>
                            </select>
                        </div>
                    </div>
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">
                            <table className="table-fixed w-full">
                                <thead>
                                    <tr className="bg-gray-100">
                                        <th className="px-4 py-2 w-20">No.</th>
                                        <th className="px-4 py-2">Title</th>
                                        <th className="px-4 py-2">Body</th>
                                        <th className="px-4 py-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {posts.data.map(({ id, title, body }) => (
                                        <tr key={id}>
                                            <td className="border px-4 py-2">{id}</td>
                                            <td className="border px-4 py-2">{title}</td>
                                            <td className="border px-4 py-2">
                                                <div className="h-24 overflow-auto">
                                                    <div className="whitespace-pre-wrap">{body}</div>
                                                </div>
                                            </td>
                                            <td className="border px-4 py-2">
                                                <Link className="px-6 py-2 ml-12 text-sm text-white bg-blue-500 rounded" href={route("posts.edit", id)}>Edit</Link>
                                                <button onClick={destroy} id={id} tabIndex="-1" type="button" className="mx-1 px-4 py-2 ml-6 text-sm text-white bg-red-500 rounded">Delete</button>
                                            </td>
                                        </tr>
                                    ))}
                                    {posts.data.length === 0 && (
                                        <tr>
                                            <td className="px-6 py-4 border-t" colSpan="4">No posts found.</td>
                                        </tr>
                                    )}
                                </tbody>
                            </table>
                            <div className="mt-4 flex justify-between items-center">
                                <span className="text-gray-700">Showing {from} to {to} of {total} posts</span>
                                <div className="flex space-x-2">
                                    <button 
                                        onClick={() => handlePageChange(currentPage - 1)}
                                        disabled={currentPage === 1}
                                        className="px-4 py-2 bg-gray-300 text-gray-700 rounded"
                                    >
                                        Previous
                                    </button>
                                    {currentPage < lastPage && (
                                        <button 
                                            onClick={() => handlePageChange(currentPage + 1)}
                                            className="px-4 py-2 bg-gray-300 text-gray-700 rounded"
                                        >
                                            Next
                                        </button>
                                    )}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}
