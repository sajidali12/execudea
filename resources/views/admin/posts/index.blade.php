@extends('admin.layout')

@section('title', 'Blog Posts')
@section('page-title', 'Blog Posts')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">All Blog Posts</h2>
    <a href="{{ route('posts.create') }}" class="bg-primary hover:bg-primary text-white px-4 py-2 rounded-lg transition duration-200">
        <i class="fas fa-plus mr-2"></i>Create New Post
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div>
                <span class="text-sm text-gray-600">Total: {{ $posts->total() }} posts</span>
            </div>
            <div>
                <form method="GET" action="{{ route('posts.index') }}" class="flex items-center space-x-2">
                    <label for="perPage" class="text-sm text-gray-600">Show:</label>
                    <select name="perPage" id="perPage" class="border border-gray-300 rounded px-2 py-1 text-sm" onchange="this.form.submit()">
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                        <option value="all" {{ $perPage == 'all' ? 'selected' : '' }}>All</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    @if($posts->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Post</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($posts as $post)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($post->image)
                                        <img src="{{ asset('storage/product/image/' . $post->image) }}" 
                                             alt="{{ $post->title }}" 
                                             class="w-12 h-12 rounded object-cover mr-4">
                                    @else
                                        <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center mr-4">
                                            <i class="fas fa-image text-gray-400"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">{{ $post->title }}</h4>
                                        <p class="text-sm text-gray-500">{{ Str::limit(strip_tags($post->body), 60) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $post->author_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $post->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('blog.show', $post->slug ?: $post->id) }}" 
                                       class="text-blue-600 hover:text-blue-900" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('posts.edit', $post->id) }}" 
                                       class="text-indigo-600 hover:text-indigo-900">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this post?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $posts->appends(request()->query())->links() }}
        </div>
    @else
        <div class="px-6 py-8 text-center">
            <i class="fas fa-blog text-gray-300 text-4xl mb-4"></i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No blog posts yet</h3>
            <p class="text-gray-500 mb-4">Get started by creating your first blog post.</p>
            <a href="{{ route('posts.create') }}" class="bg-primary hover:bg-primary text-white px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-plus mr-2"></i>Create Your First Post
            </a>
        </div>
    @endif
</div>
@endsection