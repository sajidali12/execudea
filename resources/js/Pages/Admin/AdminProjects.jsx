import React, { useState, useEffect } from 'react';
import axios from 'axios';
import AdminLayout from "@/Layouts/AdminLayout";

export default function AdminDashboard({ auth }) {
    const [messages, setMessages] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const [currentPage, setCurrentPage] = useState(1);
    const [totalPages, setTotalPages] = useState(1);

    useEffect(() => {
        fetchMessages(currentPage);
    }, [currentPage]);

    const fetchMessages = (page) => {
        setLoading(true);
        axios.get(`/admin/messages?page=${page}`)
            .then(response => {
                setMessages(response.data.data);
                setTotalPages(response.data.last_page);
                setLoading(false);
            })
            .catch(error => {
                console.error('Error fetching messages:', error);
                setError('Failed to fetch messages.');
                setLoading(false);
            });
    };

    const deleteMessage = (id) => {
        axios.delete(`/admin/messages/${id}`)
            .then(response => {
                console.log(response.data.message);
                fetchMessages(currentPage); 
            })
            .catch(error => {
                console.error('Error deleting message:', error);
                setError('Failed to delete message.');
            });
    };

    return (
        <AdminLayout user={auth.user}>
            <div className="container mx-auto py-8 px-4 mt-0">

                <section className='mt-0'>
                    <h2 className="text-xl font-semibold mb-4 text-gray-700 text-center text-size-2xl">Messages</h2>
                    {loading && <p className="text-gray-500">Loading...</p>}
                    {error && <p className="text-red-500 mb-4">{error}</p>}
                    {messages.length === 0 && !loading && !error && <p className="text-gray-500">No messages found.</p>}
                    
                    {messages.length > 0 && (
                        <div className="overflow-x-auto">
                            <div className="bg-white shadow-md rounded-lg">
                                <table className="min-w-full divide-y divide-gray-200 border border-gray-300">
                                    <thead className="bg-gray-50">
                                        <tr>
                                            <th className="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-300">Name</th>
                                            <th className="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-300">Subject</th>
                                            <th className="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-300">Email</th>
                                            <th className="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-300">Message</th>
                                            <th className="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-300">Received At</th>
                                            <th className="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b border-gray-300">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody className="bg-white">
                                        {messages.map((message) => (
                                            <tr key={message.id}>
                                                <td className="py-4 px-6 text-sm font-medium text-gray-900 border-b border-gray-300 border-r border-gray-300">{message.name}</td>
                                                <td className="py-4 px-6 text-sm text-gray-500 border-b border-gray-300 border-r border-gray-300">{message.subject}</td>
                                                <td className="py-4 px-6 text-sm text-gray-500 border-b border-gray-300 border-r border-gray-300">{message.email}</td>
                                                <td className="py-4 px-6 border-b border-gray-300 border-r border-gray-300">
                                                    <div className="max-h-24 overflow-y-auto text-sm text-gray-500">{message.message}</div>
                                                </td>
                                                <td className="py-4 px-6 text-sm text-gray-500 border-b border-gray-300 border-r border-gray-300">{new Date(message.created_at).toLocaleString()}</td>
                                                <td className="py-4 px-6 text-sm text-gray-500 border-b border-gray-300">
                                                    <button
                                                        onClick={() => deleteMessage(message.id)}
                                                         className="mx-1 px-4 py-2 ml-6  text-sm text-white bg-red-500 rounded"
                                                    >
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        ))}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    )}
                </section>

                <div className="flex justify-between items-center mt-6">
                    <button
                        onClick={() => setCurrentPage(prev => Math.max(prev - 1, 1))}
                        disabled={currentPage === 1}
                        className="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50"
                    >
                        <i className="fas fa-chevron-left mr-2"></i> Previous
                    </button>
                    <span className="text-sm text-gray-700">
                        Page {currentPage} of {totalPages}
                    </span>
                    <button
                        onClick={() => setCurrentPage(prev => Math.min(prev + 1, totalPages))}
                        disabled={currentPage === totalPages}
                        className="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50"
                    >
                        Next <i className="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
        </AdminLayout>
    );
}
