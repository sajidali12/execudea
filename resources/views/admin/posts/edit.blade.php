@extends('admin.layout')

@section('title', 'Edit Post')
@section('page-title', 'Edit Post')

@push('styles')
<style>
    .seo-preview {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 16px;
        margin-top: 16px;
    }
    .seo-title {
        color: #1a73e8;
        font-size: 20px;
        line-height: 1.3;
        margin: 0 0 4px 0;
        text-decoration: none;
    }
    .seo-url {
        color: #006621;
        font-size: 14px;
        margin: 0 0 4px 0;
    }
    .seo-description {
        color: #545454;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
    }
</style>
@endpush

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center mb-6">
        <a href="{{ route('posts.index') }}" class="text-gray-600 hover:text-gray-800 mr-4">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2 class="text-2xl font-bold text-gray-800">Edit Blog Post</h2>
    </div>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="bg-white rounded-lg shadow-sm p-6">
            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Post Title</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $post->title) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('title') border-red-300 @enderror"
                       placeholder="Enter post title..."
                       required>
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Author Name -->
            <div class="mb-6">
                <label for="author_name" class="block text-sm font-medium text-gray-700 mb-2">Author Name</label>
                <input type="text" 
                       id="author_name" 
                       name="author_name" 
                       value="{{ old('author_name', $post->author_name) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('author_name') border-red-300 @enderror"
                       placeholder="Enter author name..."
                       required>
                @error('author_name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Image -->
            @if($post->image)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Featured Image</label>
                    <div class="flex items-start space-x-4">
                        <img src="{{ asset('storage/product/image/' . $post->image) }}" 
                             alt="{{ $post->title }}" 
                             class="w-32 h-32 object-cover rounded-lg">
                        <div class="flex-1">
                            <p class="text-sm text-gray-600 mb-2">Current image will be kept if no new image is uploaded.</p>
                            <button type="button" 
                                    onclick="deleteImage({{ $post->id }})"
                                    class="text-red-600 hover:text-red-800 text-sm">
                                <i class="fas fa-trash mr-1"></i>Delete current image
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <!-- New Image Upload -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                    {{ $post->image ? 'Replace Featured Image' : 'Featured Image' }}
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md @error('image') border-red-300 @enderror">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-primary focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary">
                                <span>Upload a new file</span>
                                <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
                @error('image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Excerpt -->
            <div class="mb-6">
                <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                <textarea id="excerpt" 
                          name="excerpt" 
                          rows="3"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('excerpt') border-red-300 @enderror"
                          placeholder="Brief description of the post">{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content with Rich Text Editor -->
            <div class="mb-6">
                <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Post Content</label>
                <div id="quill-editor" style="height: 400px;" class="@error('body') border-red-300 @enderror"></div>
                <textarea id="body" name="body" style="display: none;" required>{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- SEO Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Settings</h3>
            
            <!-- SEO Title -->
            <div class="mb-6">
                <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">SEO Title</label>
                <input type="text" 
                       id="meta_title" 
                       name="meta_title" 
                       value="{{ old('meta_title', $post->meta_title) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('meta_title') border-red-300 @enderror"
                       placeholder="Leave empty to use post title"
                       maxlength="60">
                <p class="text-sm text-gray-500 mt-1">Recommended: 50-60 characters. <span id="meta-title-count">{{ strlen($post->meta_title ?? '') }}</span>/60</p>
                @error('meta_title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- SEO Description -->
            <div class="mb-6">
                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">SEO Description</label>
                <textarea id="meta_description" 
                          name="meta_description" 
                          rows="3"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('meta_description') border-red-300 @enderror"
                          placeholder="Leave empty to use excerpt"
                          maxlength="160">{{ old('meta_description', $post->meta_description) }}</textarea>
                <p class="text-sm text-gray-500 mt-1">Recommended: 150-160 characters. <span id="meta-desc-count">{{ strlen($post->meta_description ?? '') }}</span>/160</p>
                @error('meta_description')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Meta Keywords -->
            <div class="mb-6">
                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                <input type="text" 
                       id="meta_keywords" 
                       name="meta_keywords" 
                       value="{{ old('meta_keywords', $post->meta_keywords) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('meta_keywords') border-red-300 @enderror"
                       placeholder="Separate keywords with commas">
                @error('meta_keywords')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- URL Slug -->
            <div class="mb-6">
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">URL Slug</label>
                <input type="text" 
                       id="slug" 
                       name="slug" 
                       value="{{ old('slug', $post->slug) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('slug') border-red-300 @enderror"
                       placeholder="Leave empty to auto-generate from title">
                <p class="text-sm text-gray-500 mt-1">URL: <span id="slug-preview">{{ url('/blog/') }}/{{ $post->slug ?: 'your-post-title' }}</span></p>
                @error('slug')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- SEO Preview -->
            <div class="seo-preview">
                <h4 class="text-sm font-medium text-gray-700 mb-3">Google Search Preview:</h4>
                <div class="seo-title" id="seo-preview-title">{{ $post->getSeoTitle() }}</div>
                <div class="seo-url" id="seo-preview-url">{{ url('/blog/' . ($post->slug ?: 'your-post-title')) }}</div>
                <div class="seo-description" id="seo-preview-description">{{ $post->getSeoDescription() }}</div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-3">
            <a href="{{ route('posts.index') }}" 
               class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Cancel
            </a>
            <button type="submit" 
                    class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                <i class="fas fa-save mr-2"></i>Update Post
            </button>
        </div>
    </form>
</div>

<!-- Quill.js -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Quill
        var quill = new Quill('#quill-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'font': [] }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],
                    [{ 'align': [] }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            },
            placeholder: 'Write your post content here...'
        });

        // Sync Quill content with hidden textarea
        var bodyTextarea = document.getElementById('body');
        quill.on('text-change', function() {
            bodyTextarea.value = quill.root.innerHTML;
            updateSeoPreview();
        });

        // Set initial content if editing
        if (bodyTextarea.value) {
            quill.root.innerHTML = bodyTextarea.value;
        }

        // Character counting and SEO preview functionality
        const metaTitleInput = document.getElementById('meta_title');
        const metaDescInput = document.getElementById('meta_description');
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        const excerptInput = document.getElementById('excerpt');

        // Character counters
        metaTitleInput.addEventListener('input', function() {
            document.getElementById('meta-title-count').textContent = this.value.length;
            updateSeoPreview();
        });

        metaDescInput.addEventListener('input', function() {
            document.getElementById('meta-desc-count').textContent = this.value.length;
            updateSeoPreview();
        });

        // Auto-generate slug from title (only if currently empty or auto-generated)
        titleInput.addEventListener('input', function() {
            updateSeoPreview();
        });

        // Manual slug editing
        slugInput.addEventListener('input', function() {
            updateSlugPreview();
            updateSeoPreview();
        });

        excerptInput.addEventListener('input', updateSeoPreview);

        function generateSlug(text) {
            return text.toLowerCase()
                .replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
        }

        function updateSlugPreview() {
            const slug = slugInput.value || generateSlug(titleInput.value) || 'your-post-title';
            document.getElementById('slug-preview').textContent = '{{ url("/blog/") }}/' + slug;
        }

        function updateSeoPreview() {
            // Title
            const title = metaTitleInput.value || titleInput.value || 'Your Post Title';
            document.getElementById('seo-preview-title').textContent = title;

            // URL
            const slug = slugInput.value || generateSlug(titleInput.value) || 'your-post-title';
            document.getElementById('seo-preview-url').textContent = '{{ url("/blog/") }}/' + slug;

            // Description
            let description = metaDescInput.value;
            if (!description) {
                description = excerptInput.value;
            }
            if (!description && quill) {
                const bodyContent = quill.getText();
                description = bodyContent.substring(0, 160);
            }
            if (!description) {
                description = 'Your post description will appear here...';
            }
            document.getElementById('seo-preview-description').textContent = description;
        }

        // Delete image functionality
        window.deleteImage = function(postId) {
            if (confirm('Are you sure you want to delete the current image?')) {
                fetch(`/posts/${postId}/image`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error deleting image');
                });
            }
        };

        // Initial SEO preview update
        updateSeoPreview();
    });
</script>
@endsection